<?php
$currentLevel = "admin";
include '../../process/checkAuth.php';
include '../../config/database.php';
include '../../process/getUser.php';

$statusMessage = "";
$statusType = "success";

function buildUserPaginationUrl(int $page): string
{
    $params = $_GET;
    $params['page'] = $page;
    return 'index.php?' . http_build_query($params);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_user_id'])) {
    $deleteUserId = (int) $_POST['delete_user_id'];

    if ($deleteUserId === (int) $_SESSION['user_id']) {
        $statusMessage = "Akun admin yang sedang login tidak bisa dihapus.";
        $statusType = "error";
    } else {
        $queryDeleteUser = "DELETE FROM users WHERE id = $deleteUserId";
        $execDeleteUser = mysqli_query($koneksi, $queryDeleteUser);

        if ($execDeleteUser) {
            header("Location: index.php?status=deleted");
            exit();
        }

        $statusMessage = "Data user gagal dihapus.";
        $statusType = "error";
    }
}

if ($statusMessage === "" && isset($_GET['status'])) {
    if ($_GET['status'] === 'created') {
        $statusMessage = "User baru berhasil ditambahkan.";
    } elseif ($_GET['status'] === 'updated') {
        $statusMessage = "Data user berhasil diperbarui.";
    } elseif ($_GET['status'] === 'deleted') {
        $statusMessage = "Data user berhasil dihapus.";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>EvenTura - Users</title>
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
        $adminActive = "user";
        include '../../templates/adminSidebar.php';
      ?>

      <main class="admin-content">
        <div class="admin-page-header events-header">
          <h1 class="admin-page-title">Users</h1>
          <a class="admin-button admin-button--primary add-event-button" href="create.php">
            <span aria-hidden="true">+</span>
            Add User
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
            <input class="admin-search__input" type="search" name="search" placeholder="Search users" value="<?= htmlspecialchars($search) ?>" />
          </div>
          <select class="admin-field admin-toolbar__select" name="filter_level">
            <option value="">Semua level</option>
            <option value="admin" <?= $filterLevel === 'admin' ? 'selected' : '' ?>>Admin</option>
            <option value="user" <?= $filterLevel === 'user' ? 'selected' : '' ?>>User</option>
          </select>
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
                <th class="col-user-id">User ID</th>
                <th class="col-actions">Actions</th>
              </tr>
            </thead>
            <tbody>
              <?php if ($execUsers && mysqli_num_rows($execUsers) > 0): ?>
                <?php $rowNumber = (($currentPage - 1) * $perPage) + 1; ?>
                <?php while ($user = mysqli_fetch_assoc($execUsers)): ?>
                  <tr>
                    <td class="events-table__muted col-number"><?= $rowNumber++ ?></td>
                    <td class="col-title"><?= htmlspecialchars($user['name']) ?></td>
                    <td class="events-table__muted col-email"><?= htmlspecialchars($user['email']) ?></td>
                    <td class="col-level"><span class="category-badge category-badge--<?= htmlspecialchars($user['level']) ?>"><?= htmlspecialchars(ucfirst($user['level'])) ?></span></td>
                    <td class="events-table__muted col-user-id">#<?= htmlspecialchars($user['id']) ?></td>
                    <td class="col-actions">
                      <div class="table-actions">
                        <a class="table-action table-action--edit" href="edit.php?id=<?= htmlspecialchars($user['id']) ?>">Edit</a>
                        <span class="table-action-separator"></span>
                        
                        <form method="post" action="" onsubmit="return confirm('Hapus user ini?');">
                          <input type="hidden" name="delete_user_id" value="<?= htmlspecialchars($user['id']) ?>">
                          <button class="table-action table-action--delete" type="submit">Delete</button>
                        </form>
                      </div>
                    </td>
                  </tr>
                <?php endwhile; ?>
              <?php else: ?>
                <tr>
                  <td class="empty-state" colspan="6">Belum ada data user yang cocok.</td>
                </tr>
              <?php endif; ?>
            </tbody>
          </table>
        </div>

        <?php if ($totalUserPages > 1): ?>
          <nav class="admin-pagination" aria-label="Pagination user">
            <a class="admin-pagination__link<?= $currentPage <= 1 ? ' is-disabled' : '' ?>" href="<?= $currentPage <= 1 ? '#' : htmlspecialchars(buildUserPaginationUrl($currentPage - 1)) ?>">Previous</a>
            <?php for ($page = 1; $page <= $totalUserPages; $page++): ?>
              <a class="admin-pagination__link<?= $page === $currentPage ? ' is-active' : '' ?>" href="<?= htmlspecialchars(buildUserPaginationUrl($page)) ?>"><?= $page ?></a>
            <?php endfor; ?>
            <a class="admin-pagination__link<?= $currentPage >= $totalUserPages ? ' is-disabled' : '' ?>" href="<?= $currentPage >= $totalUserPages ? '#' : htmlspecialchars(buildUserPaginationUrl($currentPage + 1)) ?>">Next</a>
          </nav>
        <?php endif; ?>
      </main>
    </div>

    <?php include("../../templates/footer.php"); ?>
  </body>
</html>
