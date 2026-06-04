<?php
require_once __DIR__ . '/../includes/auth.php';
auth_start_session();

include '../config/database.php';
include_once '../includes/event_metrics.php';

ensureEventMetricsColumns($koneksi);

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode([
        'success' => false,
        'message' => 'Metode request tidak valid.',
    ]);
    exit();
}

require_role_json('user');

$eventId = isset($_POST['event_id']) ? (int) $_POST['event_id'] : 0;
$userId = (int) $_SESSION['user_id'];

if ($eventId <= 0) {
    http_response_code(422);
    echo json_encode([
        'success' => false,
        'message' => 'Event tidak valid.',
    ]);
    exit();
}

$queryCheckEvent = "SELECT id FROM events WHERE id = ? AND status = 'approved' LIMIT 1";
$stmtCheckEvent = mysqli_prepare($koneksi, $queryCheckEvent);

if (! $stmtCheckEvent) {
    http_response_code(500);
    echo json_encode([
        'success' => false,
        'message' => 'Gagal memvalidasi event.',
    ]);
    exit();
}

mysqli_stmt_bind_param($stmtCheckEvent, 'i', $eventId);
mysqli_stmt_execute($stmtCheckEvent);
$eventResult = mysqli_stmt_get_result($stmtCheckEvent);
$event = $eventResult ? mysqli_fetch_assoc($eventResult) : null;
mysqli_stmt_close($stmtCheckEvent);

if (! $event) {
    http_response_code(404);
    echo json_encode([
        'success' => false,
        'message' => 'Event tidak ditemukan.',
    ]);
    exit();
}

$queryExisting = "SELECT id FROM event_likes WHERE event_id = ? AND user_id = ? LIMIT 1";
$stmtExisting = mysqli_prepare($koneksi, $queryExisting);

if (! $stmtExisting) {
    http_response_code(500);
    echo json_encode([
        'success' => false,
        'message' => 'Gagal memeriksa status suka.',
    ]);
    exit();
}

mysqli_stmt_bind_param($stmtExisting, 'ii', $eventId, $userId);
mysqli_stmt_execute($stmtExisting);
$existingResult = mysqli_stmt_get_result($stmtExisting);
$existingLike = $existingResult ? mysqli_fetch_assoc($existingResult) : null;
mysqli_stmt_close($stmtExisting);

if ($existingLike) {
    $queryDelete = "DELETE FROM event_likes WHERE event_id = ? AND user_id = ?";
    $stmtDelete = mysqli_prepare($koneksi, $queryDelete);

    if (! $stmtDelete) {
        http_response_code(500);
        echo json_encode([
            'success' => false,
            'message' => 'Gagal membatalkan suka.',
        ]);
        exit();
    }

    mysqli_stmt_bind_param($stmtDelete, 'ii', $eventId, $userId);
    $deleted = mysqli_stmt_execute($stmtDelete);
    mysqli_stmt_close($stmtDelete);

    if (! $deleted) {
        http_response_code(500);
        echo json_encode([
            'success' => false,
            'message' => 'Status suka gagal dibatalkan.',
        ]);
        exit();
    }

    echo json_encode([
        'success' => true,
        'is_active' => false,
        'message' => 'Suka pada event dibatalkan.',
    ]);
    exit();
}

$queryInsert = "INSERT INTO event_likes (event_id, user_id) VALUES (?, ?)";
$stmtInsert = mysqli_prepare($koneksi, $queryInsert);

if (! $stmtInsert) {
    http_response_code(500);
    echo json_encode([
        'success' => false,
        'message' => 'Gagal menyimpan status suka.',
    ]);
    exit();
}

mysqli_stmt_bind_param($stmtInsert, 'ii', $eventId, $userId);
$inserted = mysqli_stmt_execute($stmtInsert);
$insertError = mysqli_stmt_errno($stmtInsert);
mysqli_stmt_close($stmtInsert);

if (! $inserted) {
    if ($insertError === 1062) {
        echo json_encode([
            'success' => true,
            'is_active' => true,
            'message' => 'Event sudah ditandai sebagai disukai.',
        ]);
        exit();
    }

    http_response_code(500);
    echo json_encode([
        'success' => false,
        'message' => 'Event gagal ditandai sebagai disukai.',
    ]);
    exit();
}

echo json_encode([
    'success' => true,
    'is_active' => true,
    'message' => 'Event ditandai sebagai disukai.',
]);
