<?php
$currentLevel = "admin";
include '../../process/checkAuth.php';
include '../../config/database.php';


$errors = [];
$formData = [
    'name' => '',
    'email' => '',
    'level' => 'user',
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
    } elseif (! filter_var($formData['email'], FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Format email tidak valid.";
    }

    if ($password === '') {
        $errors[] = "Password wajib diisi.";
    }

    if (! in_array($formData['level'], ['admin', 'user'], true)) {
        $errors[] = "Level user tidak valid.";
    }

    if (empty($errors)) {
        $nameEscaped = mysqli_real_escape_string($koneksi, $formData['name']);
        $emailEscaped = mysqli_real_escape_string($koneksi, $formData['email']);
        $levelEscaped = mysqli_real_escape_string($koneksi, $formData['level']);

        $queryExistingUser = "SELECT id FROM users WHERE email = '$emailEscaped'";
        $execExistingUser = mysqli_query($koneksi, $queryExistingUser);

        if ($execExistingUser && mysqli_num_rows($execExistingUser) > 0) {
            $errors[] = "Email sudah terdaftar.";
        } else {
            $passwordHashed = password_hash($password, PASSWORD_DEFAULT);
            $passwordEscaped = mysqli_real_escape_string($koneksi, $passwordHashed);

            $queryCreateUser = "INSERT INTO users (name, email, password, whatsapp, instagram, profile_photo, level) VALUES ('$nameEscaped', '$emailEscaped', '$passwordEscaped', '', '', '', '$levelEscaped')";
            $execCreateUser = mysqli_query($koneksi, $queryCreateUser);

            if ($execCreateUser) {
                header("Location: index.php?status=created");
                exit();
            }

            $errors[] = mysqli_errno($koneksi) === 1062
                ? "Email sudah digunakan."
                : "Data user gagal ditambahkan.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>EvenTura - Buat User Baru</title>
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
        $adminActive = "user";
        include '../../templates/adminSidebar.php';
      ?>

      <main class="admin-content event-form-content">
        <div class="admin-back-title">
          <a class="admin-back-link" href="index.php" aria-label="Kembali ke daftar user">
            <svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="m15 18-6-6 6-6"></path></svg>
          </a>
          <h1 class="admin-page-title">Buat User Baru</h1>
        </div>

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
              <label class="admin-label" for="password">Password</label>
              <input class="admin-field" id="password" name="password" type="password" placeholder="Masukkan password user" />
            </div>
            <div>
              <label class="admin-label" for="level">Level</label>
              <select class="admin-field" id="level" name="level">
                <option value="user" <?= $formData['level'] === 'user' ? 'selected' : '' ?>>User</option>
                <option value="admin" <?= $formData['level'] === 'admin' ? 'selected' : '' ?>>Admin</option>
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
