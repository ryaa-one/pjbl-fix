<?php
$currentLevel = "admin";

include '../../process/checkAuth.php';
include '../../config/database.php';
include_once '../../includes/review_reply.php';
include_once '../../includes/pagination.php';

$statusMessage = "";
$statusType = "success";
$filterEventId = isset($_GET['event_id']) ? (int) $_GET['event_id'] : 0;
$perPage = getRowsPerPage('admin_reviews');
$currentPage = isset($_GET['page']) ? max(1, (int) $_GET['page']) : 1;
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

    return 'index.php?' . http_build_query($params);
}

ensureReviewReplyColumn($koneksi);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['review_id'], $_POST['action'])) {
    $reviewId = (int) $_POST['review_id'];
    $action = trim((string) $_POST['action']);
    $reviewExists = false;

    if ($reviewId > 0 && in_array($action, ['save_reply', 'delete_reply'], true)) {
        $stmtReviewExists = mysqli_prepare($koneksi, "SELECT id FROM event_reviews WHERE id = ? LIMIT 1");
        if ($stmtReviewExists) {
            mysqli_stmt_bind_param($stmtReviewExists, 'i', $reviewId);
            mysqli_stmt_execute($stmtReviewExists);
            $reviewExistsResult = mysqli_stmt_get_result($stmtReviewExists);
            $reviewExists = $reviewExistsResult && mysqli_fetch_assoc($reviewExistsResult) !== null;
            mysqli_stmt_close($stmtReviewExists);
        }
    }

    if ($reviewId <= 0 || ! in_array($action, ['save_reply', 'delete_reply'], true)) {
        $statusMessage = "Permintaan balasan ulasan tidak valid.";
        $statusType = "error";
    } elseif (! $reviewExists) {
        $statusMessage = "Ulasan tidak ditemukan.";
        $statusType = "error";
    } elseif ($action === 'save_reply') {
        $adminReply = trim((string) ($_POST['admin_reply'] ?? ''));

        if ($adminReply === '') {
            $statusMessage = "Balasan ulasan tidak boleh kosong.";
            $statusType = "error";
        } else {
            $stmtReply = mysqli_prepare(
                $koneksi,
                "
                UPDATE event_reviews
                SET admin_reply = ?,
                    reply_by_role = 'admin'
                WHERE id = ?
                "
            );

            if ($stmtReply) {
                mysqli_stmt_bind_param($stmtReply, 'si', $adminReply, $reviewId);
                $updated = mysqli_stmt_execute($stmtReply);
                mysqli_stmt_close($stmtReply);
            } else {
                $updated = false;
            }

            if ($updated) {
                header("Location: " . buildReviewRedirectUrl('reply_saved'));
                exit();
            }

            $statusMessage = "Balasan ulasan gagal disimpan.";
            $statusType = "error";
        }
    } else {
        $stmtDeleteReply = mysqli_prepare(
            $koneksi,
            "
            UPDATE event_reviews
            SET admin_reply = NULL,
                reply_by_role = NULL
            WHERE id = ?
            "
        );

        if ($stmtDeleteReply) {
            mysqli_stmt_bind_param($stmtDeleteReply, 'i', $reviewId);
            $updated = mysqli_stmt_execute($stmtDeleteReply);
            mysqli_stmt_close($stmtDeleteReply);
        } else {
            $updated = false;
        }

        if ($updated) {
            header("Location: " . buildReviewRedirectUrl('reply_deleted'));
            exit();
        }

        $statusMessage = "Balasan ulasan gagal dihapus.";
        $statusType = "error";
    }
}

if ($statusMessage === "" && $_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_review_id'])) {
    $reviewId = (int) $_POST['delete_review_id'];

    $stmtDeleteReview = mysqli_prepare(
        $koneksi,
        "
        DELETE FROM event_reviews WHERE id = ?
        "
    );

    if ($stmtDeleteReview) {
        mysqli_stmt_bind_param($stmtDeleteReview, 'i', $reviewId);
        $execDeleteReview = mysqli_stmt_execute($stmtDeleteReview);
        $affectedRows = mysqli_stmt_affected_rows($stmtDeleteReview);
        mysqli_stmt_close($stmtDeleteReview);
    } else {
        $execDeleteReview = false;
        $affectedRows = 0;
    }

    if ($execDeleteReview && $affectedRows > 0) {
        header("Location: " . buildReviewRedirectUrl('deleted'));
        exit();
    }

    $statusMessage = "Ulasan gagal dihapus.";
    $statusType = "error";
}

if ($statusMessage === "" && isset($_GET['status'])) {
    if ($_GET['status'] === 'deleted') {
        $statusMessage = "Ulasan berhasil dihapus.";
    } elseif ($_GET['status'] === 'reply_saved') {
        $statusMessage = "Balasan ulasan berhasil disimpan.";
    } elseif ($_GET['status'] === 'reply_deleted') {
        $statusMessage = "Balasan ulasan berhasil dihapus.";
    }
}

$adminEvents = [];
$stmtEvents = mysqli_prepare(
    $koneksi,
    "SELECT id, title FROM events ORDER BY title ASC"
);

if ($stmtEvents) {
    mysqli_stmt_execute($stmtEvents);
    $eventResult = mysqli_stmt_get_result($stmtEvents);

    if ($eventResult) {
        while ($event = mysqli_fetch_assoc($eventResult)) {
            $adminEvents[] = $event;
        }
    }

    mysqli_stmt_close($stmtEvents);
}

$totalReviews = 0;
if ($filterEventId > 0) {
    $stmtCount = mysqli_prepare(
        $koneksi,
        "
        SELECT COUNT(*) AS total
        FROM event_reviews
        INNER JOIN events ON events.id = event_reviews.event_id
        INNER JOIN users ON users.id = event_reviews.user_id
        WHERE events.id = ?
        "
    );

    if ($stmtCount) {
        mysqli_stmt_bind_param($stmtCount, 'i', $filterEventId);
        mysqli_stmt_execute($stmtCount);
        $countResult = mysqli_stmt_get_result($stmtCount);
        $countRow = $countResult ? mysqli_fetch_assoc($countResult) : null;
        $totalReviews = (int) ($countRow['total'] ?? 0);
        mysqli_stmt_close($stmtCount);
    }
} else {
    $stmtCount = mysqli_prepare(
        $koneksi,
        "
        SELECT COUNT(*) AS total
        FROM event_reviews
        INNER JOIN events ON events.id = event_reviews.event_id
        INNER JOIN users ON users.id = event_reviews.user_id
        "
    );

    if ($stmtCount) {
        mysqli_stmt_execute($stmtCount);
        $countResult = mysqli_stmt_get_result($stmtCount);
        $countRow = $countResult ? mysqli_fetch_assoc($countResult) : null;
        $totalReviews = (int) ($countRow['total'] ?? 0);
        mysqli_stmt_close($stmtCount);
    }
}

$totalReviewPages = max(1, (int) ceil($totalReviews / $perPage));
if ($currentPage > $totalReviewPages) {
    $currentPage = $totalReviewPages;
    $offset = ($currentPage - 1) * $perPage;
}

$reviews = [];
if ($filterEventId > 0) {
    $stmtReviews = mysqli_prepare(
        $koneksi,
        "
        SELECT
            event_reviews.id,
            event_reviews.review_description,
            event_reviews.rating,
            event_reviews.admin_reply,
            event_reviews.reply_by_role,
            event_reviews.created_at,
            events.id AS event_id,
            events.title AS event_title,
            event_admin.name AS admin_name,
            users.name AS user_name,
            users.email AS user_email
        FROM event_reviews
        INNER JOIN events ON events.id = event_reviews.event_id
        INNER JOIN users ON users.id = event_reviews.user_id
        LEFT JOIN users AS event_admin ON event_admin.id = events.user_id
        WHERE events.id = ?
        ORDER BY event_reviews.created_at DESC, event_reviews.id DESC
        LIMIT ? OFFSET ?
        "
    );

    if ($stmtReviews) {
        mysqli_stmt_bind_param($stmtReviews, 'iii', $filterEventId, $perPage, $offset);
        mysqli_stmt_execute($stmtReviews);
        $reviewsResult = mysqli_stmt_get_result($stmtReviews);

        if ($reviewsResult) {
            while ($review = mysqli_fetch_assoc($reviewsResult)) {
                $reviews[] = $review;
            }
        }

        mysqli_stmt_close($stmtReviews);
    }
} else {
    $stmtReviews = mysqli_prepare(
        $koneksi,
        "
        SELECT
            event_reviews.id,
            event_reviews.review_description,
            event_reviews.rating,
            event_reviews.admin_reply,
            event_reviews.reply_by_role,
            event_reviews.created_at,
            events.id AS event_id,
            events.title AS event_title,
            event_admin.name AS admin_name,
            users.name AS user_name,
            users.email AS user_email
        FROM event_reviews
        INNER JOIN events ON events.id = event_reviews.event_id
        INNER JOIN users ON users.id = event_reviews.user_id
        LEFT JOIN users AS event_admin ON event_admin.id = events.user_id
        ORDER BY event_reviews.created_at DESC, event_reviews.id DESC
        LIMIT ? OFFSET ?
        "
    );

    if ($stmtReviews) {
        mysqli_stmt_bind_param($stmtReviews, 'ii', $perPage, $offset);
        mysqli_stmt_execute($stmtReviews);
        $reviewsResult = mysqli_stmt_get_result($stmtReviews);

        if ($reviewsResult) {
            while ($review = mysqli_fetch_assoc($reviewsResult)) {
                $reviews[] = $review;
            }
        }

        mysqli_stmt_close($stmtReviews);
    }
}
?>

<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>EvenTura - Ulasan</title>
    <link rel="stylesheet" href="../../css/ulasan.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=Montserrat:wght@400;500;600;700;800&display=swap"
      rel="stylesheet"
    />
  </head>

  <body>
    <?php
      $navMode = "profile";
      include '../../templates/navbar.php';
    ?>

    <div class="admin-layout">
      <?php
        $adminActive = "ulasan";
        include '../../templates/adminSidebar.php';
      ?>

      <main class="admin-content">
        <div class="admin-page-header events-header">
          <h1 class="admin-page-title">Ulasan</h1>
        </div>

        <?php if ($statusMessage !== ""): ?>
          <div class="admin-alert admin-alert--<?= htmlspecialchars($statusType) ?>">
            <?= htmlspecialchars($statusMessage) ?>
          </div>
        <?php endif; ?>

        <form class="admin-toolbar reviews-toolbar" method="get" action="">
          <div class="admin-search">
            <svg
              class="admin-search__icon"
              viewBox="0 0 24 24"
              fill="none"
              stroke="currentColor"
              stroke-width="1.8"
              aria-hidden="true"
            >
              <circle cx="11" cy="11" r="7"></circle>
              <path d="m16 16 4 4"></path>
            </svg>
            <input
              class="admin-search__input"
              type="text"
              value="<?= htmlspecialchars(number_format($totalReviews) . ' ulasan ditemukan') ?>"
              readonly
            />
          </div>

          <select class="admin-field admin-toolbar__select" name="event_id">
            <option value="">Semua event</option>
            <?php foreach ($adminEvents as $event): ?>
              <option value="<?= htmlspecialchars($event['id']) ?>" <?= $filterEventId === (int) $event['id'] ? 'selected' : '' ?>>
                <?= htmlspecialchars($event['title']) ?>
              </option>
            <?php endforeach; ?>
          </select>

          <?php renderRowsPerPageSelect($perPage); ?>
          <button class="admin-button admin-button--secondary admin-toolbar__button" type="submit">Terapkan</button>
        </form>

        <div class="events-table-wrap">
          <table class="events-table reviews-table">
            <thead>
              <tr>
                <th class="col-number">No</th>
                <th class="col-review-event">Event</th>
                <th class="col-review-user">User</th>
                <th class="col-review-user">Pemilik Event</th>
                <th class="col-review-rating">Rating</th>
                <th class="col-review-text">Ulasan</th>
                <th class="col-review-reply">Balasan Admin</th>
                <th class="col-review-actions">Actions</th>
              </tr>
            </thead>
            <tbody>
              <?php if (!empty($reviews)): ?>
                <?php $rowNumber = (($currentPage - 1) * $perPage) + 1; ?>

                <?php foreach ($reviews as $review): ?>
                  <tr>
                    <td class="events-table__muted col-number"><?= $rowNumber++ ?></td>
                    <td class="col-review-event">
                      <?= htmlspecialchars($review['event_title']) ?>
                      <div class="review-meta">#<?= htmlspecialchars($review['event_id']) ?></div>
                    </td>
                    <td class="col-review-user">
                      <?= htmlspecialchars($review['user_name']) ?>
                      <div class="review-meta"><?= htmlspecialchars($review['user_email']) ?></div>
                    </td>
                    <td class="col-review-user">
                      <?= htmlspecialchars($review['admin_name'] ?? 'Tanpa user') ?>
                    </td>
                    <td class="col-review-rating">
                      <span class="review-rating">
                        <?= htmlspecialchars(str_repeat('★', (int) $review['rating'])) ?>
                      </span>
                    </td>
                    <td class="col-review-text">
                      <p class="review-text"><?= nl2br(htmlspecialchars($review['review_description'])) ?></p>
                      <div class="review-meta"><?= htmlspecialchars(date('d M Y H:i', strtotime((string) $review['created_at']))) ?></div>
                    </td>
                    <td class="col-review-reply">
                      <?php if (! empty($review['admin_reply'])): ?>
                        <p class="review-text"><?= nl2br(htmlspecialchars($review['admin_reply'])) ?></p>
                        <?php if (! empty($review['reply_by_role'])): ?>
                          <div class="review-meta">Dibalas oleh <?= htmlspecialchars($review['reply_by_role'] === 'admin' ? 'Admin' : 'Pemilik Event') ?></div>
                        <?php endif; ?>
                      <?php else: ?>
                        <span class="reply-empty">Belum dibalas</span>
                      <?php endif; ?>
                    </td>
                    <td class="col-review-actions">
                      <form class="reply-form" method="post" action="">
                        <input type="hidden" name="review_id" value="<?= htmlspecialchars($review['id']) ?>" />
                        <textarea class="admin-field reply-field" name="admin_reply" placeholder="Tulis balasan admin..."><?= htmlspecialchars($review['admin_reply'] ?? '') ?></textarea>
                        <div class="reply-actions">
                          <button class="admin-button admin-button--primary reply-save-button" type="submit" name="action" value="save_reply">
                            <?= empty($review['admin_reply']) ? 'Balas' : 'Update Balasan' ?>
                          </button>
                          <?php if (! empty($review['admin_reply'])): ?>
                            <button class="table-action table-action--delete" type="submit" name="action" value="delete_reply" onclick="return confirm('Hapus balasan ini?')">Hapus Balasan</button>
                          <?php endif; ?>
                        </div>
                      </form>
                      <div class="table-actions">
                        <a class="table-action table-action--edit" href="../../detailEvent.php?id=<?= htmlspecialchars($review['event_id']) ?>">
                          Lihat
                        </a>
                        <span class="table-action-separator"></span>
                        <form method="post" action="" onsubmit="return confirm('Hapus ulasan ini?');">
                          <input type="hidden" name="delete_review_id" value="<?= htmlspecialchars($review['id']) ?>" />
                          <button class="table-action table-action--delete" type="submit">Delete</button>
                        </form>
                      </div>
                    </td>
                  </tr>
                <?php endforeach; ?>
              <?php else: ?>
                <tr>
                  <td class="empty-state" colspan="8">Belum ada ulasan untuk event yang dipilih.</td>
                </tr>
              <?php endif; ?>
            </tbody>
          </table>
        </div>

        <?php if ($totalReviewPages > 1): ?>
          <nav class="admin-pagination" aria-label="Pagination ulasan">
            <a class="admin-pagination__link<?= $currentPage <= 1 ? ' is-disabled' : '' ?>" href="<?= $currentPage <= 1 ? '#' : htmlspecialchars(buildReviewPaginationUrl($currentPage - 1)) ?>">Previous</a>
            <?php for ($page = 1; $page <= $totalReviewPages; $page++): ?>
              <a class="admin-pagination__link<?= $page === $currentPage ? ' is-active' : '' ?>" href="<?= htmlspecialchars(buildReviewPaginationUrl($page)) ?>"><?= $page ?></a>
            <?php endfor; ?>
            <a class="admin-pagination__link<?= $currentPage >= $totalReviewPages ? ' is-disabled' : '' ?>" href="<?= $currentPage >= $totalReviewPages ? '#' : htmlspecialchars(buildReviewPaginationUrl($currentPage + 1)) ?>">Next</a>
          </nav>
        <?php endif; ?>
      </main>
    </div>

    <?php include("../../templates/footer.php"); ?>
  </body>
</html>
