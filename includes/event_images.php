<?php

function decodeStoredEventImages($galleryValue, string $thumbnail = ''): array
{
    $decodedGallery = json_decode((string) $galleryValue, true);
    $images = is_array($decodedGallery) ? $decodedGallery : [];

    if ($thumbnail !== '') {
        $images[] = $thumbnail;
    }

    return array_values(array_unique(array_filter(
        $images,
        fn($item) => is_string($item) && trim($item) !== ''
    )));
}

function deleteStoredEventImageFile($koneksi, string $imagePath, string $projectRoot): void
{
    $uploadUrlBase = 'assets/uploads/events/';
    $imagePath = trim($imagePath);

    if ($imagePath === '' || strpos($imagePath, $uploadUrlBase) !== 0) {
        return;
    }

    $stmtUsage = mysqli_prepare(
        $koneksi,
        "
        SELECT id FROM events WHERE thumnail = ? OR gallery_carousel LIKE ?
        UNION
        SELECT id FROM event_update_requests WHERE thumbnail = ? OR gallery_carousel LIKE ?
        LIMIT 1
        "
    );
    if ($stmtUsage) {
        $gallerySearch = '%"' . $imagePath . '"%';
        mysqli_stmt_bind_param($stmtUsage, 'ssss', $imagePath, $gallerySearch, $imagePath, $gallerySearch);
        mysqli_stmt_execute($stmtUsage);
        $usageResult = mysqli_stmt_get_result($stmtUsage);
        $isUsed = $usageResult && mysqli_fetch_assoc($usageResult);
        mysqli_stmt_close($stmtUsage);

        if ($isUsed) {
            return;
        }
    }

    $fileName = basename(parse_url($imagePath, PHP_URL_PATH) ?: $imagePath);
    if ($fileName === '' || $fileName === '.' || $fileName === '..') {
        return;
    }

    $targetPath = rtrim($projectRoot, DIRECTORY_SEPARATOR)
        . DIRECTORY_SEPARATOR . 'assets'
        . DIRECTORY_SEPARATOR . 'uploads'
        . DIRECTORY_SEPARATOR . 'events'
        . DIRECTORY_SEPARATOR . $fileName;

    if (is_file($targetPath)) {
        unlink($targetPath);
    }
}

function deleteEventWithRelations($koneksi, int $eventId, string $projectRoot, ?int $ownerId = null): bool
{
    $queryEvent = "SELECT thumnail, gallery_carousel FROM events WHERE id = ?";
    $types = 'i';
    $params = [$eventId];

    if ($ownerId !== null) {
        $queryEvent .= " AND user_id = ?";
        $types .= 'i';
        $params[] = $ownerId;
    }

    $queryEvent .= " LIMIT 1";
    $stmtEvent = mysqli_prepare($koneksi, $queryEvent);
    if (! $stmtEvent) {
        return false;
    }

    mysqli_stmt_bind_param($stmtEvent, $types, ...$params);
    mysqli_stmt_execute($stmtEvent);
    $eventResult = mysqli_stmt_get_result($stmtEvent);
    $event = $eventResult ? mysqli_fetch_assoc($eventResult) : null;
    mysqli_stmt_close($stmtEvent);

    if (! $event) {
        return false;
    }

    mysqli_begin_transaction($koneksi);

    try {
        foreach (['event_reviews', 'event_likes', 'event_favourites', 'event_update_requests', 'event_moderation_history'] as $table) {
            $stmtDeleteRelation = mysqli_prepare($koneksi, "DELETE FROM {$table} WHERE event_id = ?");
            if (! $stmtDeleteRelation) {
                throw new RuntimeException('Gagal menyiapkan penghapusan relasi event.');
            }

            mysqli_stmt_bind_param($stmtDeleteRelation, 'i', $eventId);
            if (! mysqli_stmt_execute($stmtDeleteRelation)) {
                mysqli_stmt_close($stmtDeleteRelation);
                throw new RuntimeException('Gagal menghapus relasi event.');
            }

            mysqli_stmt_close($stmtDeleteRelation);
        }

        $queryDeleteEvent = "DELETE FROM events WHERE id = ?";
        $deleteTypes = 'i';
        $deleteParams = [$eventId];

        if ($ownerId !== null) {
            $queryDeleteEvent .= " AND user_id = ?";
            $deleteTypes .= 'i';
            $deleteParams[] = $ownerId;
        }

        $stmtDeleteEvent = mysqli_prepare($koneksi, $queryDeleteEvent);
        if (! $stmtDeleteEvent) {
            throw new RuntimeException('Gagal menyiapkan penghapusan event.');
        }

        mysqli_stmt_bind_param($stmtDeleteEvent, $deleteTypes, ...$deleteParams);
        $deleted = mysqli_stmt_execute($stmtDeleteEvent);
        $affectedRows = mysqli_stmt_affected_rows($stmtDeleteEvent);
        mysqli_stmt_close($stmtDeleteEvent);

        if (! $deleted || $affectedRows !== 1) {
            throw new RuntimeException('Event gagal dihapus.');
        }

        mysqli_commit($koneksi);
    } catch (Throwable $exception) {
        mysqli_rollback($koneksi);
        return false;
    }

    foreach (decodeStoredEventImages($event['gallery_carousel'] ?? '[]', $event['thumnail'] ?? '') as $imagePath) {
        deleteStoredEventImageFile($koneksi, $imagePath, $projectRoot);
    }

    return true;
}
