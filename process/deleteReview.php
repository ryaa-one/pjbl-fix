<?php
require_once __DIR__ . '/../includes/auth.php';
auth_start_session();

include '../config/database.php';

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

$reviewId = isset($_POST['review_id']) ? (int) $_POST['review_id'] : 0;
$eventId = isset($_POST['event_id']) ? (int) $_POST['event_id'] : 0;
$userId = (int) $_SESSION['user_id'];

if ($reviewId <= 0 || $eventId <= 0) {
    http_response_code(422);
    echo json_encode([
        'success' => false,
        'message' => 'Data ulasan tidak valid.',
    ]);
    exit();
}

$queryReview = "
    SELECT id, user_id
    FROM event_reviews
    WHERE id = ? AND event_id = ?
    LIMIT 1
";

$stmtReview = mysqli_prepare($koneksi, $queryReview);

if (! $stmtReview) {
    http_response_code(500);
    echo json_encode([
        'success' => false,
        'message' => 'Gagal memeriksa ulasan.',
    ]);
    exit();
}

mysqli_stmt_bind_param($stmtReview, 'ii', $reviewId, $eventId);
mysqli_stmt_execute($stmtReview);
$reviewResult = mysqli_stmt_get_result($stmtReview);
$review = $reviewResult ? mysqli_fetch_assoc($reviewResult) : null;
mysqli_stmt_close($stmtReview);

if (! $review) {
    http_response_code(404);
    echo json_encode([
        'success' => false,
        'message' => 'Ulasan tidak ditemukan.',
    ]);
    exit();
}

if ((int) $review['user_id'] !== $userId) {
    http_response_code(403);
    echo json_encode([
        'success' => false,
        'message' => 'Anda tidak dapat menghapus ulasan milik user lain.',
    ]);
    exit();
}

$queryDelete = "DELETE FROM event_reviews WHERE id = ? AND user_id = ? LIMIT 1";
$stmtDelete = mysqli_prepare($koneksi, $queryDelete);

if (! $stmtDelete) {
    http_response_code(500);
    echo json_encode([
        'success' => false,
        'message' => 'Gagal menyiapkan penghapusan ulasan.',
    ]);
    exit();
}

mysqli_stmt_bind_param($stmtDelete, 'ii', $reviewId, $userId);
$deleted = mysqli_stmt_execute($stmtDelete);
$affectedRows = mysqli_stmt_affected_rows($stmtDelete);
mysqli_stmt_close($stmtDelete);

if (! $deleted || $affectedRows < 1) {
    http_response_code(500);
    echo json_encode([
        'success' => false,
        'message' => 'Ulasan gagal dihapus.',
    ]);
    exit();
}

echo json_encode([
    'success' => true,
    'message' => 'Ulasan berhasil dihapus.',
]);
