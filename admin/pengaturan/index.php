<?php
$currentLevel = "admin";
include '../../process/checkAuth.php';
?>

<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Pengaturan Akun Admin - EvenTura</title>
    <link rel="stylesheet" type="text/css" href="../../css/pengaturanAkunAdmin.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet" />
  </head>
  <body>
  <?php
    $navMode = "profile";
    include '../../templates/navbar.php';
  ?>

    <div class="admin-layout">
      <?php
        $adminActive = "pengaturan";
        include '../../templates/adminSidebar.php';
      ?>

      <main class="admin-content settings-content">
        <h1 class="admin-page-title settings-title">Pengaturan Akun</h1>
        <p class="settings-subtitle">Ubah informasi pribadi Anda di bawah ini.</p>

        <form class="admin-form settings-form">
          <div class="profile-field">
            <p class="profile-field__label">Foto Profil</p>
            <div class="profile-field__row">
              <img class="profile-avatar" src="../../assets/images/foto-profil.svg" alt="Foto profil" />
              <button class="change-photo-button" type="button">Ganti</button>
            </div>
          </div>
          <div class="admin-form__group">
            <label class="admin-label" for="username">Nama Pengguna</label>
            <input class="admin-field" id="username" type="text" placeholder="Masukkan nama pengguna Anda" />
          </div>
          <div class="admin-form__group">
            <label class="admin-label" for="email">Email</label>
            <input class="admin-field" id="email" type="email" placeholder="you@example.com" />
          </div>
          <div class="admin-form__group">
            <label class="admin-label" for="password">Kata Sandi</label>
            <input class="admin-field" id="password" type="password" placeholder="Masukkan kata sandi baru" />
          </div>
          <div class="admin-form__actions settings-actions">
            <button class="admin-button admin-button--primary settings-save-button" type="submit">Simpan Perubahan</button>
          </div>
        </form>
      </main>
    </div>

    <?php include("../../templates/footer.php"); ?>
  </body>
</html>
