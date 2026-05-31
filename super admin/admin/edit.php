<?php
$currentLevel = "super_admin";
include '../../process/checkAuth.php';
include '../../config/database.php';

$adminId = isset($_GET['id']) ? (int) $_GET['id'] : 0;
$isModal = isset($_GET['modal']) && $_GET['modal'] === '1';
$errors = [];

if ($adminId <= 0) {
    header("Location: index.php");
    exit();
}

$queryAdmin = "SELECT id, name, email, level FROM users WHERE id = $adminId AND level = 'admin'";
$execAdmin = mysqli_query($koneksi, $queryAdmin);
$admin = $execAdmin ? mysqli_fetch_assoc($execAdmin) : null;

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
    $formData['level'] = trim($_POST['level'] ?? 'admin');
    $password = $_POST['password'] ?? '';

    if ($formData['name'] === '') {
        $errors[] = "Nama admin wajib diisi.";
    }

    if ($formData['email'] === '') {
        $errors[] = "Email wajib diisi.";
    }

    if ($formData['level'] !== 'admin') {
        $errors[] = "Level admin tidak valid.";
    }

    if (empty($errors)) {
        $nameEscaped = mysqli_real_escape_string($koneksi, $formData['name']);
        $emailEscaped = mysqli_real_escape_string($koneksi, $formData['email']);
        $levelEscaped = mysqli_real_escape_string($koneksi, $formData['level']);

        $queryExistingAdmin = "SELECT id FROM users WHERE email = '$emailEscaped' AND id != $adminId";
        $execExistingAdmin = mysqli_query($koneksi, $queryExistingAdmin);

        if ($execExistingAdmin && mysqli_num_rows($execExistingAdmin) > 0) {
            $errors[] = "Email sudah dipakai admin lain.";
        } else {
            $queryUpdateAdmin = "UPDATE users SET name = '$nameEscaped', email = '$emailEscaped', level = '$levelEscaped'";

            if ($password !== '') {
                $passwordHashed = password_hash($password, PASSWORD_DEFAULT);
                $passwordEscaped = mysqli_real_escape_string($koneksi, $passwordHashed);
                $queryUpdateAdmin .= ", password = '$passwordEscaped'";
            }

            $queryUpdateAdmin .= " WHERE id = $adminId";
            $execUpdateAdmin = mysqli_query($koneksi, $queryUpdateAdmin);

            if ($execUpdateAdmin) {
                if ($adminId === (int) $_SESSION['user_id']) {
                    $_SESSION['email'] = $formData['email'];
                    $_SESSION['nama'] = $formData['name'];
                    $_SESSION['level'] = $formData['level'];
                }

                header("Location: index.php?status=updated" . ($isModal ? "&modal=1" : ""));
                exit();
            }

            $errors[] = "Data admin gagal diperbarui.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>EvenTura - Edit Admin</title>
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
          include '../../templates/superAdminSidebar.php';
        ?>
      <?php endif; ?>

      <main class="admin-content event-form-content">
        <?php if (! $isModal): ?>
          <div class="admin-back-title">
            <a class="admin-back-link" href="index.php" aria-label="Kembali ke daftar admin">
              <svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="m15 18-6-6 6-6"></path></svg>
            </a>
            <h1 class="admin-page-title">Edit Admin</h1>
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
            <input class="admin-field" id="name" name="name" type="text" value="<?= htmlspecialchars($formData['name']) ?>" placeholder="Masukkan nama lengkap admin" />
          </div>
          <div class="admin-form__group">
            <label class="admin-label" for="email">Email</label>
            <input class="admin-field" id="email" name="email" type="email" value="<?= htmlspecialchars($formData['email']) ?>" placeholder="Masukkan email admin" />
          </div>
          <div class="admin-form__row">
            <div>
              <label class="admin-label" for="password">Password Baru</label>
              <input class="admin-field" id="password" name="password" type="password" placeholder="Kosongkan jika tidak ingin diubah" />
            </div>
            <div>
              <label class="admin-label" for="level">Level</label>
              <select class="admin-field" id="level" name="level">
                <option value="admin" selected>Admin</option>
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
