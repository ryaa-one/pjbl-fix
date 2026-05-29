<?php
$currentLevel = "super_admin";
include '../../process/checkAuth.php';
include '../../config/database.php';


$errors = [];
$formData = [
    'name' => '',
    'email' => '',
    'level' => 'admin',
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

    if ($password === '') {
        $errors[] = "Password wajib diisi.";
    }

    if ($formData['level'] !== 'admin') {
        $errors[] = "Level admin tidak valid.";
    }

    if (empty($errors)) {
        $nameEscaped = mysqli_real_escape_string($koneksi, $formData['name']);
        $emailEscaped = mysqli_real_escape_string($koneksi, $formData['email']);
        $levelEscaped = mysqli_real_escape_string($koneksi, $formData['level']);

        $queryExistingAdmin = "SELECT id FROM users WHERE email = '$emailEscaped'";
        $execExistingAdmin = mysqli_query($koneksi, $queryExistingAdmin);

        if ($execExistingAdmin && mysqli_num_rows($execExistingAdmin) > 0) {
            $errors[] = "Email sudah terdaftar.";
        } else {
            $passwordHashed = password_hash($password, PASSWORD_DEFAULT);
            $passwordEscaped = mysqli_real_escape_string($koneksi, $passwordHashed);

            $queryCreateAdmin = "INSERT INTO users (name, email, password, level) VALUES ('$nameEscaped', '$emailEscaped', '$passwordEscaped', '$levelEscaped')";
            $execCreateAdmin = mysqli_query($koneksi, $queryCreateAdmin);

            if ($execCreateAdmin) {
                header("Location: index.php?status=created");
                exit();
            }

            $errors[] = "Data admin gagal ditambahkan.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>EvenTura - Buat Admin Baru</title>
    <link rel="stylesheet" href="../../css/userBaru.css" />
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

      <main class="admin-content event-form-content">
        <div class="admin-back-title">
          <a class="admin-back-link" href="index.php" aria-label="Kembali ke daftar admin">
            <svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="m15 18-6-6 6-6"></path></svg>
          </a>
          <h1 class="admin-page-title">Buat Admin Baru</h1>
        </div>

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
              <label class="admin-label" for="password">Password</label>
              <input class="admin-field" id="password" name="password" type="password" placeholder="Masukkan password admin" />
            </div>
            <div>
              <label class="admin-label" for="level">Level</label>
              <select class="admin-field" id="level" name="level">
                <option value="admin" selected>Admin</option>
              </select>
            </div>
          </div>
          <div class="admin-form__actions">
            <a class="admin-button admin-button--secondary" href="index.php">Cancel</a>
            <button class="admin-button admin-button--primary" type="submit">Save Changes</button>
          </div>
        </form>
      </main>
    </div>

    <?php include("../../templates/footer.php"); ?>
  </body>
</html>
