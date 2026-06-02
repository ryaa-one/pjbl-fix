<?php
require_once __DIR__ . '/../includes/auth.php';
auth_start_session();

include '../config/database.php';
include_once '../includes/review_reply.php';

ensureReviewReplyColumn($koneksi);

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    auth_json_error(405, 'Metode request tidak valid.');
}

require_login_json();

$action = trim((string) ($_POST['action'] ?? ''));
$reviewId = isset($_POST['review_id']) ? (int) $_POST['review_id'] : 0;
$eventId = isset($_POST['event_id']) ? (int) $_POST['event_id'] : 0;
$currentUserId = (int) $_SESSION['user_id'];
$currentRole = (string) ($_SESSION['level'] ?? '');

if ($reviewId <= 0 || $eventId <= 0) {
    auth_json_error(422, 'Data ulasan tidak valid.');
}

$stmtReview = mysqli_prepare(
    $koneksi,
    "
    SELECT event_reviews.id, event_reviews.admin_reply, events.user_id AS event_owner_id
    FROM event_reviews
    INNER JOIN events ON events.id = event_reviews.event_id
    WHERE event_reviews.id = ?
      AND events.id = ?
    LIMIT 1
    "
);

if (! $stmtReview) {
    auth_json_error(500, 'Gagal memeriksa ulasan.');
}

mysqli_stmt_bind_param($stmtReview, 'ii', $reviewId, $eventId);
mysqli_stmt_execute($stmtReview);
$reviewResult = mysqli_stmt_get_result($stmtReview);
$review = $reviewResult ? mysqli_fetch_assoc($reviewResult) : null;
mysqli_stmt_close($stmtReview);

if (! $review) {
    auth_json_error(404, 'Ulasan tidak ditemukan.');
}

if ($action === 'save_reply') {
    if ($currentRole !== 'admin' || (int) $review['event_owner_id'] !== $currentUserId) {
        auth_json_error(403, 'Anda tidak memiliki akses untuk membalas ulasan event ini.');
    }

    $adminReply = trim((string) ($_POST['admin_reply'] ?? ''));
    if ($adminReply === '') {
        auth_json_error(422, 'Balasan ulasan tidak boleh kosong.');
    }

    $stmtUpdateReply = mysqli_prepare(
        $koneksi,
        "
        UPDATE event_reviews
        INNER JOIN events ON events.id = event_reviews.event_id
        SET event_reviews.admin_reply = ?
        WHERE event_reviews.id = ?
          AND events.id = ?
          AND events.user_id = ?
        "
    );

    if (! $stmtUpdateReply) {
        auth_json_error(500, 'Gagal menyiapkan penyimpanan balasan.');
    }

    mysqli_stmt_bind_param($stmtUpdateReply, 'siii', $adminReply, $reviewId, $eventId, $currentUserId);
    $updated = mysqli_stmt_execute($stmtUpdateReply);
    mysqli_stmt_close($stmtUpdateReply);

    if (! $updated) {
        auth_json_error(500, 'Balasan ulasan gagal disimpan.');
    }

    echo json_encode([
        'success' => true,
        'message' => 'Balasan ulasan berhasil disimpan.',
        'admin_reply' => $adminReply,
    ]);
    exit();
}

if ($action === 'delete_review') {
    $canDeleteReview = $currentRole === 'super_admin'
        || ($currentRole === 'admin' && (int) $review['event_owner_id'] === $currentUserId);

    if (! $canDeleteReview) {
        auth_json_error(403, 'Anda tidak memiliki akses untuk menghapus ulasan event ini.');
    }

    $stmtDeleteReview = mysqli_prepare(
        $koneksi,
        "DELETE FROM event_reviews WHERE id = ? AND event_id = ? LIMIT 1"
    );

    if (! $stmtDeleteReview) {
        auth_json_error(500, 'Gagal menyiapkan penghapusan ulasan.');
    }

    mysqli_stmt_bind_param($stmtDeleteReview, 'ii', $reviewId, $eventId);
    $deleted = mysqli_stmt_execute($stmtDeleteReview);
    $affectedRows = mysqli_stmt_affected_rows($stmtDeleteReview);
    mysqli_stmt_close($stmtDeleteReview);

    if (! $deleted || $affectedRows < 1) {
        auth_json_error(500, 'Ulasan gagal dihapus.');
    }

    echo json_encode([
        'success' => true,
        'message' => 'Ulasan berhasil dihapus.',
    ]);
    exit();
}

auth_json_error(422, 'Aksi ulasan tidak valid.');
