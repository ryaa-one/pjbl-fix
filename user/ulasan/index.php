<?php
$currentLevel = 'user';
include '../../process/checkAuth.php';
include '../../config/database.php';
include_once '../../includes/review_reply.php';
include_once '../../includes/pagination.php';

ensureReviewReplyColumn($koneksi);

$userId = (int) $_SESSION['user_id'];
$statusMessage = '';
$statusType = 'success';
$filterEventId = max(0, (int) ($_GET['event_id'] ?? 0));
$currentPage = max(1, (int) ($_GET['page'] ?? 1));
$perPage = getRowsPerPage('user_reviews');
$offset = ($currentPage - 1) * $perPage;

function buildReviewPaginationUrl(int $page): string
{
    $params = $_GET;
    $params['page'] = $page;
    unset($params['status']);
    return 'index.php?' . http_build_query($params);
}

function buildReviewRedirectUrl(string $status): string
{
    $params = $_GET;
    $params['status'] = $status;
    unset($params['page']);
    return 'index.php?' . http_build_query($params);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $reviewId = (int) ($_POST['review_id'] ?? 0);
    $action = trim((string) ($_POST['action'] ?? ''));

    if ($reviewId <= 0 || ! in_array($action, ['save_reply', 'delete_reply'], true)) {
        $statusMessage = 'Permintaan balasan ulasan tidak valid.';
        $statusType = 'error';
    } elseif ($action === 'save_reply') {
        $adminReply = trim((string) ($_POST['admin_reply'] ?? ''));

        if ($adminReply === '') {
            $statusMessage = 'Balasan ulasan tidak boleh kosong.';
            $statusType = 'error';
        } else {
            $stmtReply = mysqli_prepare(
                $koneksi,
                "
                UPDATE event_reviews
                INNER JOIN events ON events.id = event_reviews.event_id
                SET event_reviews.admin_reply = ?,
                    event_reviews.reply_by_role = 'user'
                WHERE event_reviews.id = ?
                  AND events.user_id = ?
                "
            );

            if ($stmtReply) {
                mysqli_stmt_bind_param($stmtReply, 'sii', $adminReply, $reviewId, $userId);
                $updated = mysqli_stmt_execute($stmtReply);
                $affectedRows = mysqli_stmt_affected_rows($stmtReply);
                mysqli_stmt_close($stmtReply);
            } else {
                $updated = false;
                $affectedRows = 0;
            }

            if ($updated && $affectedRows > 0) {
                header('Location: ' . buildReviewRedirectUrl('saved'));
                exit();
            }

            $statusMessage = 'Balasan gagal disimpan atau ulasan bukan milik event Anda.';
            $statusType = 'error';
        }
    } else {
        $stmtDeleteReply = mysqli_prepare(
            $koneksi,
            "
            UPDATE event_reviews
            INNER JOIN events ON events.id = event_reviews.event_id
            SET event_reviews.admin_reply = NULL,
                event_reviews.reply_by_role = NULL
            WHERE event_reviews.id = ?
              AND events.user_id = ?
            "
        );

        if ($stmtDeleteReply) {
            mysqli_stmt_bind_param($stmtDeleteReply, 'ii', $reviewId, $userId);
            $updated = mysqli_stmt_execute($stmtDeleteReply);
            $affectedRows = mysqli_stmt_affected_rows($stmtDeleteReply);
            mysqli_stmt_close($stmtDeleteReply);
        } else {
            $updated = false;
            $affectedRows = 0;
        }

        if ($updated && $affectedRows > 0) {
            header('Location: ' . buildReviewRedirectUrl('deleted'));
            exit();
        }

        $statusMessage = 'Balasan gagal dihapus atau ulasan bukan milik event Anda.';
        $statusType = 'error';
    }
}

if ($statusMessage === '' && isset($_GET['status'])) {
    if ($_GET['status'] === 'saved') {
        $statusMessage = 'Balasan ulasan berhasil disimpan.';
    } elseif ($_GET['status'] === 'deleted') {
        $statusMessage = 'Balasan ulasan berhasil dihapus.';
    }
}

$events = [];
$stmtEvents = mysqli_prepare($koneksi, 'SELECT id, title FROM events WHERE user_id = ? ORDER BY title ASC');
if ($stmtEvents) {
    mysqli_stmt_bind_param($stmtEvents, 'i', $userId);
    mysqli_stmt_execute($stmtEvents);
    $eventResult = mysqli_stmt_get_result($stmtEvents);
    while ($eventResult && $event = mysqli_fetch_assoc($eventResult)) {
        $events[] = $event;
    }
    mysqli_stmt_close($stmtEvents);
}

$filterSql = $filterEventId > 0 ? ' AND events.id = ?' : '';
$countSql = "
    SELECT COUNT(*) AS total
    FROM event_reviews
    INNER JOIN events ON events.id = event_reviews.event_id
    INNER JOIN users ON users.id = event_reviews.user_id
    WHERE events.user_id = ?
      AND event_reviews.user_id != ?
    {$filterSql}
";
$stmtCount = mysqli_prepare($koneksi, $countSql);
if ($stmtCount) {
    if ($filterEventId > 0) {
        mysqli_stmt_bind_param($stmtCount, 'iii', $userId, $userId, $filterEventId);
    } else {
        mysqli_stmt_bind_param($stmtCount, 'ii', $userId, $userId);
    }
    mysqli_stmt_execute($stmtCount);
    $countResult = mysqli_stmt_get_result($stmtCount);
    $countRow = $countResult ? mysqli_fetch_assoc($countResult) : null;
    mysqli_stmt_close($stmtCount);
}
$totalReviews = (int) ($countRow['total'] ?? 0);
$totalPages = max(1, (int) ceil($totalReviews / $perPage));
if ($currentPage > $totalPages) {
    $currentPage = $totalPages;
    $offset = ($currentPage - 1) * $perPage;
}

$reviews = [];
$reviewsSql = "
    SELECT
        event_reviews.id,
        event_reviews.review_description,
        event_reviews.rating,
        event_reviews.admin_reply,
        event_reviews.created_at,
        events.title AS event_title,
        users.name AS reviewer_name
    FROM event_reviews
    INNER JOIN events ON events.id = event_reviews.event_id
    INNER JOIN users ON users.id = event_reviews.user_id
    WHERE events.user_id = ?
      AND event_reviews.user_id != ?
    {$filterSql}
    ORDER BY event_reviews.created_at DESC, event_reviews.id DESC
    LIMIT ? OFFSET ?
";
$stmtReviews = mysqli_prepare($koneksi, $reviewsSql);
if ($stmtReviews) {
    if ($filterEventId > 0) {
        mysqli_stmt_bind_param($stmtReviews, 'iiiii', $userId, $userId, $filterEventId, $perPage, $offset);
    } else {
        mysqli_stmt_bind_param($stmtReviews, 'iiii', $userId, $userId, $perPage, $offset);
    }
    mysqli_stmt_execute($stmtReviews);
    $reviewsResult = mysqli_stmt_get_result($stmtReviews);
    while ($reviewsResult && $review = mysqli_fetch_assoc($reviewsResult)) {
        $reviews[] = $review;
    }
    mysqli_stmt_close($stmtReviews);
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>EvenTura - Ulasan Event</title>
  <link rel="stylesheet" href="../../css/ulasan.css">
</head>
<body>
<?php include '../../templates/navbar.php'; ?>
<div class="admin-layout">
  <?php $adminActive = 'ulasan'; include '../../templates/userSidebar.php'; ?>
  <main class="admin-content">
    <div class="admin-page-header events-header"><h1 class="admin-page-title">Ulasan</h1></div>
    <?php if ($statusMessage !== ''): ?>
      <div class="admin-alert admin-alert--<?= htmlspecialchars($statusType) ?>"><?= htmlspecialchars($statusMessage) ?></div>
    <?php endif; ?>
    <form class="admin-toolbar reviews-toolbar" method="get">
      <div class="admin-search">
        <input class="admin-search__input" type="text" value="<?= htmlspecialchars(number_format($totalReviews) . ' ulasan ditemukan') ?>" readonly>
      </div>
      <select class="admin-field admin-toolbar__select" name="event_id">
        <option value="">Semua event</option>
        <?php foreach ($events as $event): ?>
          <option value="<?= (int) $event['id'] ?>" <?= $filterEventId === (int) $event['id'] ? 'selected' : '' ?>><?= htmlspecialchars($event['title']) ?></option>
        <?php endforeach; ?>
      </select>
      <?php renderRowsPerPageSelect($perPage); ?>
      <button class="admin-button admin-button--secondary admin-toolbar__button" type="submit">Terapkan</button>
    </form>
    <div class="events-table-wrap">
      <table class="events-table reviews-table reviews-table--owner">
        <thead>
          <tr>
            <th class="col-review-number">No</th>
            <th class="col-review-event">Event</th>
            <th class="col-review-user">Pemberi Ulasan</th>
            <th class="col-review-text">Ulasan</th>
            <th class="col-review-rating">Rating</th>
            <th class="col-review-date">Tanggal</th>
            <th class="col-review-reply">Balasan Pemilik Event</th>
            <th class="col-review-actions">Aksi</th>
          </tr>
        </thead>
        <tbody>
        <?php if ($reviews): $rowNumber = (($currentPage - 1) * $perPage) + 1; ?>
          <?php foreach ($reviews as $review): ?>
            <tr>
              <td class="col-review-number events-table__muted"><?= $rowNumber++ ?></td>
              <td class="col-review-event"><strong><?= htmlspecialchars($review['event_title']) ?></strong></td>
              <td class="col-review-user"><?= htmlspecialchars($review['reviewer_name']) ?></td>
              <td class="col-review-text"><p class="review-text"><?= nl2br(htmlspecialchars($review['review_description'])) ?></p></td>
              <td class="col-review-rating">
                <span class="review-rating"><?= htmlspecialchars(str_repeat('★', max(0, min(5, (int) $review['rating'])))) ?></span>
                <span class="review-rating__value"><?= (int) $review['rating'] ?>/5</span>
              </td>
              <td class="col-review-date"><?= htmlspecialchars(date('d M Y', strtotime((string) $review['created_at']))) ?><span class="review-date__time"><?= htmlspecialchars(date('H:i', strtotime((string) $review['created_at']))) ?></span></td>
              <td class="col-review-reply">
                <?php if (! empty($review['admin_reply'])): ?>
                  <p class="review-text"><?= nl2br(htmlspecialchars($review['admin_reply'])) ?></p>
                <?php else: ?>
                  <span class="reply-empty">Belum dibalas</span>
                <?php endif; ?>
              </td>
              <td class="col-review-actions">
                <form class="reply-form" method="post">
                  <input type="hidden" name="review_id" value="<?= (int) $review['id'] ?>">
                  <textarea class="admin-field reply-field" name="admin_reply" placeholder="Tulis balasan..."><?= htmlspecialchars($review['admin_reply'] ?? '') ?></textarea>
                  <div class="reply-actions">
                    <button class="admin-button admin-button--primary reply-save-button" type="submit" name="action" value="save_reply"><?= empty($review['admin_reply']) ? 'Balas' : 'Edit Balasan' ?></button>
                    <?php if (! empty($review['admin_reply'])): ?>
                      <button class="table-action table-action--delete" type="submit" name="action" value="delete_reply" onclick="return confirm('Hapus balasan ini?')">Hapus Balasan</button>
                    <?php endif; ?>
                  </div>
                </form>
              </td>
            </tr>
          <?php endforeach; ?>
        <?php else: ?>
          <tr><td class="empty-state" colspan="8">Belum ada ulasan untuk event Anda.</td></tr>
        <?php endif; ?>
        </tbody>
      </table>
    </div>
    <?php if ($totalPages > 1): ?>
      <nav class="admin-pagination" aria-label="Pagination ulasan">
        <?php for ($page = 1; $page <= $totalPages; $page++): ?>
          <a class="admin-pagination__link<?= $page === $currentPage ? ' is-active' : '' ?>" href="<?= htmlspecialchars(buildReviewPaginationUrl($page)) ?>"><?= $page ?></a>
        <?php endfor; ?>
      </nav>
    <?php endif; ?>
  </main>
</div>
</body>
</html>
