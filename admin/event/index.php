<?php
$currentLevel = "admin";

include '../../process/checkAuth.php';
include '../../config/database.php';
include_once '../../includes/event_metrics.php';
include_once '../../includes/event_moderation.php';
ensureEventMetricsColumns($koneksi);
ensureEventModerationTables($koneksi);
include '../../process/getAdminEvent.php';
include_once '../../includes/event_images.php';

$statusMessage = "";
$statusType = "success";
$currentAdminId = (int) $_SESSION['user_id'];

function buildEventPaginationUrl(int $page): string
{
    $params = $_GET;
    $params['page'] = $page;
    return 'index.php?' . http_build_query($params);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['moderate_event_id'], $_POST['moderation_action'])) {
    $moderateEventId = (int) $_POST['moderate_event_id'];
    $moderationAction = $_POST['moderation_action'] === 'approve' ? 'approved' : 'rejected';
    $rejectionReason = trim($_POST['rejection_reason'] ?? '');

    if ($moderationAction === 'rejected' && $rejectionReason === '') {
        $statusMessage = "Alasan penolakan wajib diisi.";
        $statusType = "error";
    } else {
        $stmtModerate = mysqli_prepare(
            $koneksi,
            "
            UPDATE events
            INNER JOIN users ON users.id = events.user_id
            SET events.status = ?,
                events.rejection_reason = ?
            WHERE events.id = ?
              AND users.level = 'user'
              AND events.status = 'pending'
            "
        );

        if ($stmtModerate) {
            $reasonValue = $moderationAction === 'rejected' ? $rejectionReason : null;
            mysqli_stmt_bind_param($stmtModerate, 'ssi', $moderationAction, $reasonValue, $moderateEventId);
            $moderated = mysqli_stmt_execute($stmtModerate);
            $moderatedRows = mysqli_stmt_affected_rows($stmtModerate);
            mysqli_stmt_close($stmtModerate);
        } else {
            $reasonValue = null;
            $moderated = false;
            $moderatedRows = 0;
        }

        if ($moderated && $moderatedRows > 0) {
            $historyAction = $moderationAction === 'approved' ? 'event_approved' : 'event_rejected';
            $stmtHistory = mysqli_prepare($koneksi, "INSERT INTO event_moderation_history (event_id, admin_id, action, reason) VALUES (?, ?, ?, ?)");
            mysqli_stmt_bind_param($stmtHistory, 'iiss', $moderateEventId, $currentAdminId, $historyAction, $reasonValue);
            mysqli_stmt_execute($stmtHistory);
            mysqli_stmt_close($stmtHistory);
            header("Location: index.php?status=moderated");
            exit();
        }

        $statusMessage = "Status event gagal diperbarui atau event tidak membutuhkan approval.";
        $statusType = "error";
    }
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_event_id'])) {

    $deleteEventId = (int) $_POST['delete_event_id'];

    $execDeleteEvent = deleteEventWithRelations($koneksi, $deleteEventId, dirname(__DIR__, 2));

    if ($execDeleteEvent) {
        header("Location: index.php?status=deleted");
        exit();
    }

    $statusMessage = "Data event gagal dihapus.";
    $statusType = "error";
}

if ($statusMessage === "" && isset($_GET['status'])) {

    if ($_GET['status'] === 'deleted') {
        $statusMessage = "Data event berhasil dihapus.";
    } elseif ($_GET['status'] === 'created') {
        $statusMessage = "Event baru berhasil ditambahkan.";
    } elseif ($_GET['status'] === 'updated') {
        $statusMessage = "Data event berhasil diperbarui.";
    } elseif ($_GET['status'] === 'moderated') {
        $statusMessage = "Status event berhasil diperbarui.";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>EvenTura - Events</title>

    <link rel="stylesheet" href="../../css/event.css" />

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
        $adminActive = "event";
        include '../../templates/adminSidebar.php';
      ?>

      <main class="admin-content">

        <div class="admin-page-header events-header">
          <h1 class="admin-page-title">Events</h1>

          <div class="events-header__actions">
            <a
              class="admin-button admin-button--primary add-event-button"
              href="create.php"
            >
              <span aria-hidden="true">+</span>
              Add Event
            </a>
            <a class="admin-button admin-button--secondary add-event-button" href="requests.php">Request Edit & Riwayat</a>
          </div>
        </div>

        <?php if ($statusMessage !== ""): ?>
          <div class="admin-alert admin-alert--<?= htmlspecialchars($statusType) ?>">
            <?= htmlspecialchars($statusMessage) ?>
          </div>
        <?php endif; ?>

        <form class="admin-toolbar" method="get" action="">
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
              type="search"
              name="search"
              placeholder="Search events"
              value="<?= htmlspecialchars($search) ?>"
            />
          </div>
          <select class="admin-field admin-toolbar__select" name="filter_category">
            <option value="">Semua kategori</option>
            <?php foreach ($eventCategoryOptions as $categoryId => $categoryName): ?>
              <option value="<?= htmlspecialchars($categoryId) ?>" <?= $filterCategory === (string) $categoryId ? 'selected' : '' ?>>
                <?= htmlspecialchars($categoryName) ?>
              </option>
            <?php endforeach; ?>
          </select>
          <select class="admin-field admin-toolbar__select" name="sort">
            <option value="id" <?= $sort === 'id' ? 'selected' : '' ?>>Urutkan: ID</option>
            <option value="title" <?= $sort === 'title' ? 'selected' : '' ?>>Urutkan: Nama</option>
            <option value="category" <?= $sort === 'category' ? 'selected' : '' ?>>Urutkan: Kategori</option>
            <option value="date" <?= $sort === 'date' ? 'selected' : '' ?>>Urutkan: Tanggal</option>
            <option value="location" <?= $sort === 'location' ? 'selected' : '' ?>>Urutkan: Lokasi</option>
            <option value="admin" <?= $sort === 'admin' ? 'selected' : '' ?>>Urutkan: Penginput</option>
          </select>
          <select class="admin-field admin-toolbar__select" name="direction">
            <option value="asc" <?= $direction === 'asc' ? 'selected' : '' ?>>A-Z / Lama-Baru</option>
            <option value="desc" <?= $direction === 'desc' ? 'selected' : '' ?>>Z-A / Baru-Lama</option>
          </select>
          <?php renderRowsPerPageSelect($perPage); ?>
          <button class="admin-button admin-button--secondary admin-toolbar__button" type="submit">Terapkan</button>
        </form>

        <?php $pendingEditEvents = []; ?>

        <div class="events-table-wrap">

          <table class="events-table">

            <thead>
              <tr>
                <th class="col-number">No</th>
                <th class="col-title">Event Name</th>
                <th class="col-category">Category</th>
                <th class="col-date">Date</th>
                <th class="col-location">Location</th>
                <th class="col-category">Penginput</th>
                <th class="col-category">Status</th>
                <th class="col-actions">Actions</th>
              </tr>
            </thead>

            <tbody>

              <?php if ($execEvents && mysqli_num_rows($execEvents) > 0): ?>
                <?php $rowNumber = (($currentPage - 1) * $perPage) + 1; ?>

                <?php while ($event = mysqli_fetch_assoc($execEvents)): ?>

                  <tr>
                    <td class="events-table__muted col-number"><?= $rowNumber++ ?></td>

                    <td class="col-title">
                      <?= htmlspecialchars($event['title']) ?>
                    </td>

                    <td class="col-category">
                      <span class="category-badge">
                        <?= htmlspecialchars($event['category'] ?? 'Tanpa kategori') ?>
                      </span>
                    </td>

                    <td class="events-table__muted col-date">
                      <?= htmlspecialchars(date('Y-m-d', strtotime($event['start_date']))) ?>
                    </td>

                    <td class="events-table__muted col-location">
                      <?= htmlspecialchars($event['location']) ?>
                    </td>
                    <td class="col-category">
                      <span class="category-badge category-badge--admin">
                        <?= htmlspecialchars($event['admin_name']) ?>
                      </span>
                    </td>
                    <td class="col-category">
                      <?php
                        $pendingEditRequestId = (int) ($event['pending_edit_request_id'] ?? 0);
                        $eventStatusLabel = $pendingEditRequestId > 0 ? 'Pending Edit' : ucfirst((string) $event['status']);
                        if ($pendingEditRequestId > 0) {
                            $pendingEditEvents[] = [
                                'request_id' => $pendingEditRequestId,
                                'event_title' => $event['title'],
                                'submitted_title' => $event['pending_edit_title'] ?: $event['title'],
                                'admin_name' => $event['admin_name'],
                            ];
                        }
                      ?>
                      <span class="category-badge"><?= htmlspecialchars($eventStatusLabel) ?></span>
                      <?php if (! empty($event['rejection_reason'])): ?><small><?= htmlspecialchars($event['rejection_reason']) ?></small><?php endif; ?>
                    </td>

                    <td class="col-actions">

                      <div class="table-actions">

                        <a
                          class="table-action table-action--edit js-admin-edit-modal"
                          href="edit.php?id=<?= htmlspecialchars($event['id']) ?>&modal=1"
                          data-modal-title="Edit Event"
                        >
                          Edit
                        </a>

                        <?php if ($pendingEditRequestId > 0): ?>
                          <span class="table-action-separator"></span>

                          <a
                            class="table-action table-action--edit"
                            href="requests.php?request_id=<?= $pendingEditRequestId ?>"
                          >
                            Review Edit
                          </a>
                        <?php endif; ?>

                        <span class="table-action-separator"></span>

                        <form
                          method="post"
                          action=""
                          onsubmit="return confirm('Hapus event ini?');"
                        >

                          <input
                            type="hidden"
                            name="delete_event_id"
                            value="<?= htmlspecialchars($event['id']) ?>"
                          />

                          <button
                            class="table-action table-action--delete"
                            type="submit"
                          >
                            Delete
                          </button>

                        </form>

                        <?php if (($event['creator_level'] ?? '') === 'user' && ($event['status'] ?? '') === 'pending' && $pendingEditRequestId <= 0): ?>
                          <form method="post" action="">
                            <input type="hidden" name="moderate_event_id" value="<?= (int) $event['id'] ?>">
                            <input type="hidden" name="moderation_action" value="approve">
                            <button class="table-action table-action--edit" type="submit">Approve</button>
                          </form>
                          <form method="post" action="" onsubmit="const reason = prompt('Alasan penolakan event:'); if (!reason) return false; this.rejection_reason.value = reason;">
                            <input type="hidden" name="moderate_event_id" value="<?= (int) $event['id'] ?>">
                            <input type="hidden" name="moderation_action" value="reject">
                            <input type="hidden" name="rejection_reason" value="">
                            <button class="table-action table-action--delete" type="submit">Reject</button>
                          </form>
                        <?php endif; ?>

                      </div>

                    </td>

                  </tr>

                <?php endwhile; ?>

              <?php else: ?>

                <tr>
                  <td class="empty-state" colspan="8">
                    Belum ada data event yang cocok.
                  </td>
                </tr>

              <?php endif; ?>

            </tbody>

          </table>

        </div>

        <?php if (! empty($pendingEditEvents)): ?>
          <section class="pending-edit-summary" aria-labelledby="pending-edit-summary-title">
            <div class="pending-edit-summary__header">
              <h2 id="pending-edit-summary-title">Pengajuan Edit Event</h2>
            </div>
            <div class="pending-edit-summary__table-wrap">
              <table class="events-table pending-edit-summary__table">
                <thead>
                  <tr>
                    <th class="col-number">No</th>
                    <th>Event Saat Ini</th>
                    <th>Edit Diajukan</th>
                    <th>Penginput</th>
                    <th>Status</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($pendingEditEvents as $index => $pendingEdit): ?>
                    <tr>
                      <td class="events-table__muted col-number"><?= $index + 1 ?></td>
                      <td><?= htmlspecialchars($pendingEdit['event_title']) ?></td>
                      <td><?= htmlspecialchars($pendingEdit['submitted_title']) ?></td>
                      <td>
                        <span class="category-badge category-badge--admin"><?= htmlspecialchars($pendingEdit['admin_name']) ?></span>
                      </td>
                      <td>
                        <span class="category-badge">Pending Edit</span>
                      </td>
                      <td>
                        <a class="table-action table-action--edit" href="requests.php?request_id=<?= (int) $pendingEdit['request_id'] ?>">Review Edit</a>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </section>
        <?php endif; ?>

        <?php if ($totalEventPages > 1): ?>
          <nav class="admin-pagination" aria-label="Pagination event">
            <a class="admin-pagination__link<?= $currentPage <= 1 ? ' is-disabled' : '' ?>" href="<?= $currentPage <= 1 ? '#' : htmlspecialchars(buildEventPaginationUrl($currentPage - 1)) ?>">Previous</a>
            <?php for ($page = 1; $page <= $totalEventPages; $page++): ?>
              <a class="admin-pagination__link<?= $page === $currentPage ? ' is-active' : '' ?>" href="<?= htmlspecialchars(buildEventPaginationUrl($page)) ?>"><?= $page ?></a>
            <?php endfor; ?>
            <a class="admin-pagination__link<?= $currentPage >= $totalEventPages ? ' is-disabled' : '' ?>" href="<?= $currentPage >= $totalEventPages ? '#' : htmlspecialchars(buildEventPaginationUrl($currentPage + 1)) ?>">Next</a>
          </nav>
        <?php endif; ?>

      </main>

    </div>

    <div class="admin-edit-modal" id="admin-edit-modal" aria-hidden="true">
      <div class="admin-edit-modal__backdrop" data-close-edit-modal></div>
      <section class="admin-edit-modal__dialog admin-edit-modal__dialog--wide" role="dialog" aria-modal="true" aria-labelledby="admin-edit-modal-title">
        <div class="admin-edit-modal__header">
          <h2 class="admin-edit-modal__title" id="admin-edit-modal-title">Edit Event</h2>
          <button class="admin-edit-modal__close" type="button" aria-label="Tutup modal edit" data-close-edit-modal>&times;</button>
        </div>
        <iframe class="admin-edit-modal__frame" id="admin-edit-modal-frame" title="Form edit event"></iframe>
      </section>
    </div>

    <script>
      (function () {
        const modal = document.getElementById('admin-edit-modal');
        const frame = document.getElementById('admin-edit-modal-frame');
        const title = document.getElementById('admin-edit-modal-title');

        if (!modal || !frame || !title) {
          return;
        }

        function openModal(src, modalTitle) {
          title.textContent = modalTitle || 'Edit';
          frame.src = src;
          modal.classList.add('is-open');
          modal.setAttribute('aria-hidden', 'false');
          document.body.classList.add('admin-edit-modal-open');
        }

        window.closeAdminEditModal = function () {
          modal.classList.remove('is-open');
          modal.setAttribute('aria-hidden', 'true');
          document.body.classList.remove('admin-edit-modal-open');
          frame.removeAttribute('src');
        };

        document.querySelectorAll('.js-admin-edit-modal').forEach((trigger) => {
          trigger.addEventListener('click', function (event) {
            event.preventDefault();
            openModal(this.href, this.dataset.modalTitle);
          });
        });

        document.querySelectorAll('[data-close-edit-modal]').forEach((trigger) => {
          trigger.addEventListener('click', window.closeAdminEditModal);
        });

        document.addEventListener('keydown', function (event) {
          if (event.key === 'Escape' && modal.classList.contains('is-open')) {
            window.closeAdminEditModal();
          }
        });

        frame.addEventListener('load', function () {
          try {
            const frameUrl = new URL(frame.contentWindow.location.href);
            if (frameUrl.pathname.endsWith('/admin/event/index.php') && frameUrl.searchParams.get('status') === 'updated') {
              window.location.href = 'index.php?status=updated';
            }
          } catch (error) {
            return;
          }
        });
      })();
    </script>

    <?php include("../../templates/footer.php"); ?>

  </body>
</html>
