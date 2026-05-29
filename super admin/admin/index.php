<?php
$currentLevel = "super_admin";
include '../../process/checkAuth.php';
include '../../config/database.php';
include '../../process/getAdmin.php';

$statusMessage = "";
$statusType = "success";

function buildAdminPaginationUrl(int $page): string
{
    $params = $_GET;
    $params['page'] = $page;
    return 'index.php?' . http_build_query($params);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_admin_id'])) {
    $deleteAdminId = (int) $_POST['delete_admin_id'];

    if ($deleteAdminId === (int) $_SESSION['user_id']) {
        $statusMessage = "Akun yang sedang login tidak bisa dihapus.";
        $statusType = "error";
    } else {
        mysqli_begin_transaction($koneksi);

        $stmtReassignEvents = mysqli_prepare($koneksi, "UPDATE events SET user_id = ? WHERE user_id = ?");
        $stmtDeleteAdmin = mysqli_prepare($koneksi, "DELETE FROM users WHERE id = ? AND level = 'admin'");

        $execReassignEvents = false;
        $execDeleteAdmin = false;
        $affectedRows = 0;

        if ($stmtReassignEvents && $stmtDeleteAdmin) {
            $currentSuperAdminId = (int) $_SESSION['user_id'];
            mysqli_stmt_bind_param($stmtReassignEvents, 'ii', $currentSuperAdminId, $deleteAdminId);
            $execReassignEvents = mysqli_stmt_execute($stmtReassignEvents);
            mysqli_stmt_close($stmtReassignEvents);

            mysqli_stmt_bind_param($stmtDeleteAdmin, 'i', $deleteAdminId);
            $execDeleteAdmin = mysqli_stmt_execute($stmtDeleteAdmin);
            $affectedRows = mysqli_stmt_affected_rows($stmtDeleteAdmin);
            mysqli_stmt_close($stmtDeleteAdmin);
        }

        if ($execReassignEvents && $execDeleteAdmin && $affectedRows > 0) {
            mysqli_commit($koneksi);
            header("Location: index.php?status=deleted");
            exit();
        }

        mysqli_rollback($koneksi);

        $statusMessage = "Data admin gagal dihapus.";
        $statusType = "error";
    }
}

if ($statusMessage === "" && isset($_GET['status'])) {
    if ($_GET['status'] === 'created') {
        $statusMessage = "Admin baru berhasil ditambahkan.";
    } elseif ($_GET['status'] === 'updated') {
        $statusMessage = "Data admin berhasil diperbarui.";
    } elseif ($_GET['status'] === 'deleted') {
        $statusMessage = "Data admin berhasil dihapus.";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>EvenTura - Admin</title>
    <link rel="stylesheet" href="../../css/user.css" />
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
        $adminActive = "admin";
        include '../../templates/superAdminSidebar.php';
      ?>

      <main class="admin-content">
        <div class="admin-page-header events-header">
          <h1 class="admin-page-title">Admin</h1>
          <a class="admin-button admin-button--primary add-event-button" href="create.php">
            <span aria-hidden="true">+</span>
            Add Admin
          </a>
        </div>

        <?php if ($statusMessage !== ""): ?>
          <div class="admin-alert admin-alert--<?= htmlspecialchars($statusType) ?>">
            <?= htmlspecialchars($statusMessage) ?>
          </div>
        <?php endif; ?>

        <form class="admin-toolbar" method="get" action="">
          <div class="admin-search">
            <svg class="admin-search__icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true">
              <circle cx="11" cy="11" r="7"></circle>
              <path d="m16 16 4 4"></path>
            </svg>
            <input class="admin-search__input" type="search" name="search" placeholder="Search admin" value="<?= htmlspecialchars($search) ?>" />
          </div>
          <input type="hidden" name="filter_level" value="admin" />
          <select class="admin-field admin-toolbar__select" name="sort">
            <option value="id" <?= $sort === 'id' ? 'selected' : '' ?>>Urutkan: ID</option>
            <option value="name" <?= $sort === 'name' ? 'selected' : '' ?>>Urutkan: Nama</option>
            <option value="email" <?= $sort === 'email' ? 'selected' : '' ?>>Urutkan: Email</option>
            <option value="level" <?= $sort === 'level' ? 'selected' : '' ?>>Urutkan: Level</option>
          </select>
          <select class="admin-field admin-toolbar__select" name="direction">
            <option value="asc" <?= $direction === 'asc' ? 'selected' : '' ?>>A-Z / Kecil-Besar</option>
            <option value="desc" <?= $direction === 'desc' ? 'selected' : '' ?>>Z-A / Besar-Kecil</option>
          </select>
          <button class="admin-button admin-button--secondary admin-toolbar__button" type="submit">Terapkan</button>
        </form>

        <div class="events-table-wrap">
          <table class="events-table">
            <thead>
              <tr>
                <th class="col-number">No</th>
                <th class="col-title">Full Name</th>
                <th class="col-email">Email</th>
                <th class="col-level">Level</th>
                <th class="col-user-id">Admin ID</th>
                <th class="col-actions">Actions</th>
              </tr>
            </thead>
            <tbody>
              <?php if ($execAdmin && mysqli_num_rows($execAdmin) > 0): ?>
                <?php $rowNumber = (($currentPage - 1) * $perPage) + 1; ?>
                <?php while ($admin = mysqli_fetch_assoc($execAdmin)): ?>
                  <tr>
                    <td class="events-table__muted col-number"><?= $rowNumber++ ?></td>
                    <td class="col-title"><?= htmlspecialchars($admin['name']) ?></td>
                    <td class="events-table__muted col-email"><?= htmlspecialchars($admin['email']) ?></td>
                    <td class="col-level"><span class="category-badge category-badge--<?= htmlspecialchars($admin['level']) ?>"><?= htmlspecialchars(ucfirst($admin['level'])) ?></span></td>
                    <td class="events-table__muted col-user-id">#<?= htmlspecialchars($admin['id']) ?></td>
                    <td class="col-actions">
                      <div class="table-actions">
                        <a
                          class="table-action table-action--edit js-admin-edit-modal"
                          href="edit.php?id=<?= htmlspecialchars($admin['id']) ?>&modal=1"
                          data-modal-title="Edit Admin"
                        >Edit</a>
                        <span class="table-action-separator"></span>
                        
                        <form method="post" action="" onsubmit="return confirm('Hapus admin ini?');">
                          <input type="hidden" name="delete_admin_id" value="<?= htmlspecialchars($admin['id']) ?>">
                          <button class="table-action table-action--delete" type="submit">Delete</button>
                        </form>
                      </div>
                    </td>
                  </tr>
                <?php endwhile; ?>
              <?php else: ?>
                <tr>
                  <td class="empty-state" colspan="6">Belum ada data admin yang cocok.</td>
                </tr>
              <?php endif; ?>
            </tbody>
          </table>
        </div>

        <?php if ($totalAdminPages > 1): ?>
          <nav class="admin-pagination" aria-label="Pagination admin">
            <a class="admin-pagination__link<?= $currentPage <= 1 ? ' is-disabled' : '' ?>" href="<?= $currentPage <= 1 ? '#' : htmlspecialchars(buildAdminPaginationUrl($currentPage - 1)) ?>">Previous</a>
            <?php for ($page = 1; $page <= $totalAdminPages; $page++): ?>
              <a class="admin-pagination__link<?= $page === $currentPage ? ' is-active' : '' ?>" href="<?= htmlspecialchars(buildAdminPaginationUrl($page)) ?>"><?= $page ?></a>
            <?php endfor; ?>
            <a class="admin-pagination__link<?= $currentPage >= $totalAdminPages ? ' is-disabled' : '' ?>" href="<?= $currentPage >= $totalAdminPages ? '#' : htmlspecialchars(buildAdminPaginationUrl($currentPage + 1)) ?>">Next</a>
          </nav>
        <?php endif; ?>
      </main>
    </div>

    <div class="admin-edit-modal" id="admin-edit-modal" aria-hidden="true">
      <div class="admin-edit-modal__backdrop" data-close-edit-modal></div>
      <section class="admin-edit-modal__dialog" role="dialog" aria-modal="true" aria-labelledby="admin-edit-modal-title">
        <div class="admin-edit-modal__header">
          <h2 class="admin-edit-modal__title" id="admin-edit-modal-title">Edit Admin</h2>
          <button class="admin-edit-modal__close" type="button" aria-label="Tutup modal edit" data-close-edit-modal>&times;</button>
        </div>
        <iframe class="admin-edit-modal__frame" id="admin-edit-modal-frame" title="Form edit admin"></iframe>
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
            if (frameUrl.pathname.endsWith('/admin/admin/index.php') && frameUrl.searchParams.get('status') === 'updated') {
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
