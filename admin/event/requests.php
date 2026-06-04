<?php
$currentLevel = 'admin';
include '../../process/checkAuth.php';
include '../../config/database.php';
include_once '../../includes/event_moderation.php';

ensureEventModerationTables($koneksi);

$adminId = (int) $_SESSION['user_id'];
$message = '';
$messageType = 'success';
$focusedRequestId = max(0, (int) ($_GET['request_id'] ?? 0));

function formatEventRequestDate($value): string
{
    $value = trim((string) $value);
    if ($value === '') {
        return '-';
    }

    $timestamp = strtotime($value);
    return $timestamp ? date('Y-m-d', $timestamp) : $value;
}

function summarizeEventRequestValue($value): string
{
    $value = trim((string) $value);
    if ($value === '') {
        return '-';
    }

    $value = preg_replace('/\s+/', ' ', $value);
    return strlen($value) > 80 ? substr($value, 0, 77) . '...' : $value;
}

function summarizeEventRequestGallery($value): string
{
    $decoded = json_decode((string) $value, true);
    if (! is_array($decoded)) {
        return '-';
    }

    $images = array_values(array_filter($decoded, fn($item) => is_string($item) && trim($item) !== ''));
    if (empty($images)) {
        return '-';
    }

    return count($images) . ' gambar';
}

function buildEventRequestChanges(array $request): array
{
    $fields = [
        'Judul' => [summarizeEventRequestValue($request['current_title'] ?? ''), summarizeEventRequestValue($request['title'] ?? '')],
        'Deskripsi' => [summarizeEventRequestValue($request['current_description'] ?? ''), summarizeEventRequestValue($request['description'] ?? '')],
        'Kategori' => [summarizeEventRequestValue($request['current_category'] ?? ''), summarizeEventRequestValue($request['requested_category'] ?? '')],
        'Kota' => [summarizeEventRequestValue($request['current_city'] ?? ''), summarizeEventRequestValue($request['requested_city'] ?? '')],
        'Mulai' => [formatEventRequestDate($request['current_start_date'] ?? ''), formatEventRequestDate($request['start_date'] ?? '')],
        'Selesai' => [formatEventRequestDate($request['current_end_date'] ?? ''), formatEventRequestDate($request['end_date'] ?? '')],
        'Lokasi' => [summarizeEventRequestValue($request['current_location'] ?? ''), summarizeEventRequestValue($request['location'] ?? '')],
        'Thumbnail' => [summarizeEventRequestValue(basename((string) ($request['current_thumbnail'] ?? ''))), summarizeEventRequestValue(basename((string) ($request['thumbnail'] ?? '')))],
        'Gallery' => [summarizeEventRequestGallery($request['current_gallery_carousel'] ?? ''), summarizeEventRequestGallery($request['gallery_carousel'] ?? '')],
    ];

    $changes = [];
    foreach ($fields as $label => [$oldValue, $newValue]) {
        if ($oldValue !== $newValue) {
            $changes[] = $label . ': ' . $oldValue . ' -> ' . $newValue;
        }
    }

    return $changes ?: ['Tidak ada perubahan data utama.'];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $requestId = (int) ($_POST['request_id'] ?? 0);
    $action = ($_POST['action'] ?? '') === 'approve' ? 'approved' : 'rejected';
    $reason = trim($_POST['rejection_reason'] ?? '');

    if ($requestId <= 0 || ($action === 'rejected' && $reason === '')) {
        $message = 'Request tidak valid atau alasan penolakan belum diisi.';
        $messageType = 'error';
    } else {
        $stmtRequest = mysqli_prepare($koneksi, "SELECT * FROM event_update_requests WHERE id = ? AND status = 'pending' LIMIT 1");
        if (! $stmtRequest) {
            $request = null;
            $message = 'Request edit gagal divalidasi.';
            $messageType = 'error';
        } else {
            mysqli_stmt_bind_param($stmtRequest, 'i', $requestId);
            mysqli_stmt_execute($stmtRequest);
            $requestResult = mysqli_stmt_get_result($stmtRequest);
            $request = $requestResult ? mysqli_fetch_assoc($requestResult) : null;
            mysqli_stmt_close($stmtRequest);
        }

        if ($message !== '') {
            // Message already set above.
        } elseif (! $request) {
            $message = 'Request edit sudah diproses atau tidak ditemukan.';
            $messageType = 'error';
        } else {
            mysqli_begin_transaction($koneksi);
            try {
                if ($action === 'approved') {
                    $stmtLatestRequest = mysqli_prepare(
                        $koneksi,
                        "SELECT MAX(id) AS latest_request_id FROM event_update_requests WHERE event_id = ? AND user_id = ? AND status = 'pending'"
                    );
                    if (! $stmtLatestRequest) {
                        throw new RuntimeException('Request edit terbaru gagal divalidasi.');
                    }
                    mysqli_stmt_bind_param($stmtLatestRequest, 'ii', $request['event_id'], $request['user_id']);
                    mysqli_stmt_execute($stmtLatestRequest);
                    $latestRequestResult = mysqli_stmt_get_result($stmtLatestRequest);
                    $latestRequest = $latestRequestResult ? mysqli_fetch_assoc($latestRequestResult) : null;
                    mysqli_stmt_close($stmtLatestRequest);

                    if ((int) ($latestRequest['latest_request_id'] ?? 0) !== $requestId) {
                        throw new RuntimeException('Ada request edit yang lebih baru. Approve request terbaru agar data event sesuai edit terakhir.');
                    }

                    $stmtEventExists = mysqli_prepare($koneksi, "SELECT id, status FROM events WHERE id = ? AND user_id = ? LIMIT 1");
                    if (! $stmtEventExists) {
                        throw new RuntimeException('Event asli gagal divalidasi.');
                    }
                    mysqli_stmt_bind_param($stmtEventExists, 'ii', $request['event_id'], $request['user_id']);
                    mysqli_stmt_execute($stmtEventExists);
                    $eventExistsResult = mysqli_stmt_get_result($stmtEventExists);
                    $eventExists = $eventExistsResult ? mysqli_fetch_assoc($eventExistsResult) : null;
                    mysqli_stmt_close($stmtEventExists);

                    if (! $eventExists) {
                        throw new RuntimeException('Event asli tidak ditemukan atau bukan milik user pengaju.');
                    }

                    $stmtUpdateEvent = mysqli_prepare(
                        $koneksi,
                        "UPDATE events SET title = ?, description = ?, category_id = ?, city_id = ?,
                         start_date = ?, end_date = ?, location = ?, thumnail = ?, gallery_carousel = ?,
                         status = CASE WHEN status = 'rejected' THEN 'pending' ELSE status END,
                         rejection_reason = CASE WHEN status = 'rejected' THEN NULL ELSE rejection_reason END
                         WHERE id = ? AND user_id = ?"
                    );
                    if (! $stmtUpdateEvent) {
                        throw new RuntimeException('Event gagal disiapkan untuk diperbarui.');
                    }
                    mysqli_stmt_bind_param(
                        $stmtUpdateEvent,
                        'ssiisssssii',
                        $request['title'],
                        $request['description'],
                        $request['category_id'],
                        $request['city_id'],
                        $request['start_date'],
                        $request['end_date'],
                        $request['location'],
                        $request['thumbnail'],
                        $request['gallery_carousel'],
                        $request['event_id'],
                        $request['user_id']
                    );
                    if (! mysqli_stmt_execute($stmtUpdateEvent)) {
                        throw new RuntimeException('Event gagal diperbarui.');
                    }
                    mysqli_stmt_close($stmtUpdateEvent);

                    $supersededReason = 'Digantikan request edit yang disetujui.';
                    $stmtRejectOlder = mysqli_prepare(
                        $koneksi,
                        "UPDATE event_update_requests
                         SET status = 'rejected', rejection_reason = ?
                         WHERE event_id = ? AND user_id = ? AND status = 'pending' AND id <> ?"
                    );
                    if (! $stmtRejectOlder) {
                        throw new RuntimeException('Request edit lain gagal diproses.');
                    }
                    mysqli_stmt_bind_param($stmtRejectOlder, 'siii', $supersededReason, $request['event_id'], $request['user_id'], $requestId);
                    if (! mysqli_stmt_execute($stmtRejectOlder)) {
                        throw new RuntimeException('Request edit lain gagal diproses.');
                    }
                    mysqli_stmt_close($stmtRejectOlder);
                }

                $reasonValue = $action === 'rejected' ? $reason : null;
                $stmtUpdateRequest = mysqli_prepare($koneksi, "UPDATE event_update_requests SET status = ?, rejection_reason = ? WHERE id = ? AND status = 'pending'");
                if (! $stmtUpdateRequest) {
                    throw new RuntimeException('Status request gagal disiapkan.');
                }
                mysqli_stmt_bind_param($stmtUpdateRequest, 'ssi', $action, $reasonValue, $requestId);
                if (! mysqli_stmt_execute($stmtUpdateRequest)) {
                    throw new RuntimeException('Status request gagal diperbarui.');
                }
                mysqli_stmt_close($stmtUpdateRequest);

                $historyAction = $action === 'approved' ? 'edit_approved' : 'edit_rejected';
                $stmtHistory = mysqli_prepare($koneksi, "INSERT INTO event_moderation_history (event_id, update_request_id, admin_id, action, reason) VALUES (?, ?, ?, ?, ?)");
                if (! $stmtHistory) {
                    throw new RuntimeException('Riwayat moderasi gagal disiapkan.');
                }
                mysqli_stmt_bind_param($stmtHistory, 'iiiss', $request['event_id'], $requestId, $adminId, $historyAction, $reasonValue);
                if (! mysqli_stmt_execute($stmtHistory)) {
                    throw new RuntimeException('Riwayat moderasi gagal disimpan.');
                }
                mysqli_stmt_close($stmtHistory);
                mysqli_commit($koneksi);
                header('Location: requests.php?status=updated');
                exit();
            } catch (Throwable $exception) {
                mysqli_rollback($koneksi);
                $message = $exception->getMessage() ?: 'Request edit gagal diproses.';
                $messageType = 'error';
            }
        }
    }
}

if (isset($_GET['status']) && $_GET['status'] === 'updated') {
    $message = 'Request edit berhasil diproses.';
}

$requestsSql = "
    SELECT
        event_update_requests.*,
        events.title AS current_title,
        events.description AS current_description,
        events.start_date AS current_start_date,
        events.end_date AS current_end_date,
        events.location AS current_location,
        events.thumnail AS current_thumbnail,
        events.gallery_carousel AS current_gallery_carousel,
        current_categories.name AS current_category,
        current_cities.name AS current_city,
        requested_categories.name AS requested_category,
        requested_cities.name AS requested_city,
        users.name AS user_name
    FROM event_update_requests
    INNER JOIN events ON events.id = event_update_requests.event_id
    INNER JOIN users ON users.id = event_update_requests.user_id
    LEFT JOIN categories AS current_categories ON current_categories.id = events.category_id
    LEFT JOIN cities AS current_cities ON current_cities.id = events.city_id
    LEFT JOIN categories AS requested_categories ON requested_categories.id = event_update_requests.category_id
    LEFT JOIN cities AS requested_cities ON requested_cities.id = event_update_requests.city_id
";

if ($focusedRequestId > 0) {
    $requestsSql .= " WHERE event_update_requests.id = ?";
}

$requestsSql .= " ORDER BY event_update_requests.id DESC";
$stmtRequests = mysqli_prepare($koneksi, $requestsSql);
if ($stmtRequests && $focusedRequestId > 0) {
    mysqli_stmt_bind_param($stmtRequests, 'i', $focusedRequestId);
}
if ($stmtRequests) {
    mysqli_stmt_execute($stmtRequests);
    $requests = mysqli_stmt_get_result($stmtRequests);
} else {
    $requests = false;
}

$history = mysqli_query($koneksi, "SELECT event_moderation_history.*, events.title, users.name AS admin_name FROM event_moderation_history INNER JOIN events ON events.id = event_moderation_history.event_id INNER JOIN users ON users.id = event_moderation_history.admin_id ORDER BY event_moderation_history.id DESC LIMIT 100");
?>
<!DOCTYPE html>
<html lang="id">
<head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0"><title>Moderasi Event - EvenTura</title><link rel="stylesheet" href="../../css/event.css"></head>
<body>
<?php include '../../templates/navbar.php'; ?>
<div class="admin-layout">
  <?php $adminActive = 'event'; include '../../templates/adminSidebar.php'; ?>
  <main class="admin-content">
    <div class="admin-page-header events-header"><h1 class="admin-page-title">Request Edit Event</h1><a class="admin-button admin-button--secondary" href="index.php">Kembali</a></div>
    <?php if ($message !== ''): ?><div class="admin-alert admin-alert--<?= htmlspecialchars($messageType) ?>"><?= htmlspecialchars($message) ?></div><?php endif; ?>
    <?php if ($focusedRequestId > 0): ?><div class="admin-alert admin-alert--success">Menampilkan request edit #<?= (int) $focusedRequestId ?>.</div><?php endif; ?>
    <div class="events-table-wrap"><table class="events-table"><thead><tr><th>Event</th><th>User</th><th>Judul Baru</th><th>Perubahan</th><th>Status</th><th>Alasan</th><th>Aksi</th></tr></thead><tbody>
    <?php while ($requests && $request = mysqli_fetch_assoc($requests)): ?><tr>
      <td><?= htmlspecialchars($request['current_title']) ?></td><td><?= htmlspecialchars($request['user_name']) ?></td><td><?= htmlspecialchars($request['title']) ?></td><td><?php foreach (buildEventRequestChanges($request) as $change): ?><small><?= htmlspecialchars($change) ?></small><br><?php endforeach; ?></td><td><?= htmlspecialchars($request['status']) ?></td><td><?= htmlspecialchars($request['rejection_reason'] ?? '') ?></td>
      <td><?php if ($request['status'] === 'pending'): ?><form method="post"><input type="hidden" name="request_id" value="<?= (int) $request['id'] ?>"><button class="table-action table-action--edit" name="action" value="approve">Approve</button><input name="rejection_reason" placeholder="Alasan reject"><button class="table-action table-action--delete" name="action" value="reject">Reject</button></form><?php endif; ?></td>
    </tr><?php endwhile; ?>
    </tbody></table></div>
    <h2>Riwayat Approve / Reject</h2>
    <div class="events-table-wrap"><table class="events-table"><thead><tr><th>Event</th><th>Admin</th><th>Aksi</th><th>Alasan</th><th>Waktu</th></tr></thead><tbody>
    <?php while ($history && $item = mysqli_fetch_assoc($history)): ?><tr><td><?= htmlspecialchars($item['title']) ?></td><td><?= htmlspecialchars($item['admin_name']) ?></td><td><?= htmlspecialchars($item['action']) ?></td><td><?= htmlspecialchars($item['reason'] ?? '') ?></td><td><?= htmlspecialchars($item['created_at']) ?></td></tr><?php endwhile; ?>
    </tbody></table></div>
  </main>
</div>
</body></html>
