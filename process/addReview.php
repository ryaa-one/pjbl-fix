<?php
require_once __DIR__ . '/../includes/auth.php';
require_once __DIR__ . '/../includes/profile_photo.php';
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

require_login_json();

if (! in_array(($_SESSION['level'] ?? ''), ['user', 'admin'], true)) {
    auth_json_error(403, 'Anda tidak memiliki akses untuk menambahkan ulasan.');
}

$eventId = isset($_POST['event_id']) ? (int) $_POST['event_id'] : 0;
$userId = (int) $_SESSION['user_id'];
$rating = isset($_POST['rating']) ? (int) $_POST['rating'] : 0;
$reviewDescription = trim($_POST['review_description'] ?? '');

if ($eventId <= 0) {
    http_response_code(422);
    echo json_encode([
        'success' => false,
        'message' => 'Event tidak valid.',
    ]);
    exit();
}

if ($rating < 1 || $rating > 5) {
    http_response_code(422);
    echo json_encode([
        'success' => false,
        'message' => 'Rating harus antara 1 sampai 5.',
    ]);
    exit();
}

if ($reviewDescription === '') {
    http_response_code(422);
    echo json_encode([
        'success' => false,
        'message' => 'Ulasan tidak boleh kosong.',
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
$eventExists = mysqli_stmt_get_result($stmtCheckEvent);
$eventRow = $eventExists ? mysqli_fetch_assoc($eventExists) : null;
mysqli_stmt_close($stmtCheckEvent);

if (! $eventRow) {
    http_response_code(404);
    echo json_encode([
        'success' => false,
        'message' => 'Event tidak ditemukan.',
    ]);
    exit();
}

$queryInsertReview = "
    INSERT INTO event_reviews (event_id, user_id, review_description, rating)
    VALUES (?, ?, ?, ?)
";

$stmtInsertReview = mysqli_prepare($koneksi, $queryInsertReview);

if (! $stmtInsertReview) {
    http_response_code(500);
    echo json_encode([
        'success' => false,
        'message' => 'Gagal menyiapkan penyimpanan ulasan.',
    ]);
    exit();
}

mysqli_stmt_bind_param($stmtInsertReview, 'iisi', $eventId, $userId, $reviewDescription, $rating);
$inserted = mysqli_stmt_execute($stmtInsertReview);
$reviewId = mysqli_insert_id($koneksi);
mysqli_stmt_close($stmtInsertReview);

if (! $inserted) {
    http_response_code(500);
    echo json_encode([
        'success' => false,
        'message' => 'Gagal menyimpan ulasan.',
    ]);
    exit();
}

$queryReview = "
    SELECT
        event_reviews.id,
        event_reviews.review_description,
        event_reviews.rating,
        event_reviews.created_at,
        users.name AS user_name,
        users.profile_photo AS user_profile_photo
    FROM event_reviews
    INNER JOIN users ON event_reviews.user_id = users.id
    WHERE event_reviews.id = ?
    LIMIT 1
";

$stmtReview = mysqli_prepare($koneksi, $queryReview);

if (! $stmtReview) {
    http_response_code(201);
    echo json_encode([
        'success' => true,
        'message' => 'Ulasan berhasil dikirim.',
        'review' => [
            'id' => $reviewId,
            'user_name' => $_SESSION['nama'] ?? 'User',
            'user_profile_photo_url' => getProfilePhotoUrl($_SESSION['profile_photo'] ?? ''),
            'review_description' => $reviewDescription,
            'rating' => $rating,
            'stars' => str_repeat('★', $rating) . str_repeat('☆', 5 - $rating),
            'created_at_label' => date('d M Y H:i'),
            'admin_reply' => null,
            'reply_by_role' => null,
            'can_delete' => true,
        ],
    ]);
    exit();
}

mysqli_stmt_bind_param($stmtReview, 'i', $reviewId);
mysqli_stmt_execute($stmtReview);
$reviewResult = mysqli_stmt_get_result($stmtReview);
$review = $reviewResult ? mysqli_fetch_assoc($reviewResult) : null;
mysqli_stmt_close($stmtReview);

if (! $review) {
    $review = [
        'id' => $reviewId,
        'user_name' => $_SESSION['nama'] ?? 'User',
        'user_profile_photo' => $_SESSION['profile_photo'] ?? '',
        'review_description' => $reviewDescription,
        'rating' => $rating,
        'created_at' => date('Y-m-d H:i:s'),
    ];
}

echo json_encode([
    'success' => true,
    'message' => 'Ulasan berhasil dikirim.',
    'review' => [
        'id' => (int) $review['id'],
        'user_name' => $review['user_name'],
        'user_profile_photo_url' => getProfilePhotoUrl($review['user_profile_photo'] ?? ''),
        'review_description' => $review['review_description'],
        'rating' => (int) $review['rating'],
        'stars' => str_repeat('★', (int) $review['rating']) . str_repeat('☆', 5 - (int) $review['rating']),
        'created_at_label' => date('d M Y H:i', strtotime((string) $review['created_at'])),
        'admin_reply' => null,
        'reply_by_role' => null,
        'can_delete' => true,
    ],
]);
