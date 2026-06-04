<?php
$currentLevel = "admin";
include '../../process/checkAuth.php';
include '../../config/database.php';

$adminId = isset($_GET['id']) ? (int) $_GET['id'] : 0;
$isModal = isset($_GET['modal']) && $_GET['modal'] === '1';
$errors = [];

if ($adminId <= 0) {
    header("Location: index.php");
    exit();
}

$stmtAdmin = mysqli_prepare($koneksi, "SELECT id, name, email, level FROM users WHERE id = ? AND level = 'user' LIMIT 1");
mysqli_stmt_bind_param($stmtAdmin, 'i', $adminId);
mysqli_stmt_execute($stmtAdmin);
$execAdmin = mysqli_stmt_get_result($stmtAdmin);
$admin = $execAdmin ? mysqli_fetch_assoc($execAdmin) : null;
mysqli_stmt_close($stmtAdmin);

if (! $admin) {
    header("Location: index.php");
    exit();
}

$formData = [
    'name' => $admin['name'],
    'email' => $admin['email'],
    'level' => $admin['level'],
];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $formData['name'] = trim($_POST['name'] ?? '');
    $formData['email'] = trim($_POST['email'] ?? '');
    $formData['level'] = trim($_POST['level'] ?? 'user');
    $password = $_POST['password'] ?? '';

    if ($formData['name'] === '') {
        $errors[] = "Nama user wajib diisi.";
    }

    if ($formData['email'] === '') {
        $errors[] = "Email wajib diisi.";
    }

    if ($formData['level'] !== 'user') {
        $errors[] = "Level user tidak valid.";
    }

    if (empty($errors)) {
        $stmtExistingAdmin = mysqli_prepare($koneksi, "SELECT id FROM users WHERE email = ? AND id != ? LIMIT 1");
        mysqli_stmt_bind_param($stmtExistingAdmin, 'si', $formData['email'], $adminId);
        mysqli_stmt_execute($stmtExistingAdmin);
        $execExistingAdmin = mysqli_stmt_get_result($stmtExistingAdmin);
        $existingAdmin = $execExistingAdmin ? mysqli_fetch_assoc($execExistingAdmin) : null;
        mysqli_stmt_close($stmtExistingAdmin);

        if ($existingAdmin) {
            $errors[] = "Email sudah dipakai user lain.";
        } else {
            if ($password !== '') {
                $passwordHashed = password_hash($password, PASSWORD_DEFAULT);
                $stmtUpdateAdmin = mysqli_prepare($koneksi, "UPDATE users SET name = ?, email = ?, password = ? WHERE id = ? AND level = 'user'");
                mysqli_stmt_bind_param($stmtUpdateAdmin, 'sssi', $formData['name'], $formData['email'], $passwordHashed, $adminId);
            } else {
                $stmtUpdateAdmin = mysqli_prepare($koneksi, "UPDATE users SET name = ?, email = ? WHERE id = ? AND level = 'user'");
                mysqli_stmt_bind_param($stmtUpdateAdmin, 'ssi', $formData['name'], $formData['email'], $adminId);
            }

            $execUpdateAdmin = mysqli_stmt_execute($stmtUpdateAdmin);
            mysqli_stmt_close($stmtUpdateAdmin);

            if ($execUpdateAdmin) {
                if ($adminId === (int) $_SESSION['user_id']) {
                    $_SESSION['email'] = $formData['email'];
                    $_SESSION['nama'] = $formData['name'];
                    $_SESSION['level'] = $formData['level'];
                }

                header("Location: index.php?status=updated" . ($isModal ? "&modal=1" : ""));
                exit();
            }

            $errors[] = "Data user gagal diperbarui.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>EvenTura - Edit User</title>
    <link rel="stylesheet" href="../../css/editUser.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=Montserrat:wght@400;500;600;700;800&display=swap"
      rel="stylesheet"
    />
  </head>
  <body class="<?= $isModal ? 'admin-edit-modal-page' : '' ?>">
  <?php if (! $isModal): ?>
    <?php
      $navMode = "profile";
      include '../../templates/navbar.php';
    ?>
  <?php endif; ?>

    <div class="admin-layout">
      <?php if (! $isModal): ?>
        <?php
          $adminActive = "admin";
          include '../../templates/adminSidebar.php';
        ?>
      <?php endif; ?>

      <main class="admin-content event-form-content">
        <?php if (! $isModal): ?>
          <div class="admin-back-title">
            <a class="admin-back-link" href="index.php" aria-label="Kembali ke daftar user">
              <svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="m15 18-6-6 6-6"></path></svg>
            </a>
            <h1 class="admin-page-title">Edit User</h1>
          </div>
        <?php endif; ?>

        <?php if (! empty($errors)): ?>
          <div class="admin-alert admin-alert--error">
            <?= htmlspecialchars(implode(' ', $errors)) ?>
          </div>
        <?php endif; ?>

        <form class="admin-form" method="post" action="">
          <div class="admin-form__group">
            <label class="admin-label" for="name">Full Name</label>
            <input class="admin-field" id="name" name="name" type="text" value="<?= htmlspecialchars($formData['name']) ?>" placeholder="Masukkan nama lengkap user" />
          </div>
          <div class="admin-form__group">
            <label class="admin-label" for="email">Email</label>
            <input class="admin-field" id="email" name="email" type="email" value="<?= htmlspecialchars($formData['email']) ?>" placeholder="Masukkan email user" />
          </div>
          <div class="admin-form__row">
            <div>
              <label class="admin-label" for="password">Password Baru</label>
              <input class="admin-field" id="password" name="password" type="password" placeholder="Kosongkan jika tidak ingin diubah" />
            </div>
            <div>
              <label class="admin-label" for="level">Level</label>
              <select class="admin-field" id="level" name="level">
                <option value="user" selected>User</option>
              </select>
            </div>
          </div>
          <div class="admin-form__actions">
            <?php if ($isModal): ?>
              <button class="admin-button admin-button--secondary" type="button" onclick="window.parent && window.parent.closeAdminEditModal ? window.parent.closeAdminEditModal() : window.location.href='index.php'">Cancel</button>
            <?php else: ?>
              <a class="admin-button admin-button--secondary" href="index.php">Cancel</a>
            <?php endif; ?>
            <button class="admin-button admin-button--primary" type="submit">Simpan</button>
          </div>
        </form>
      </main>
    </div>

    <?php if (! $isModal): ?>
      <?php include("../../templates/footer.php"); ?>
    <?php endif; ?>
  </body>
</html>
