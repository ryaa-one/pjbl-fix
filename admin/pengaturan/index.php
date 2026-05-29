<?php
$currentLevel = "admin";
include '../../process/checkAuth.php';
include '../../config/database.php';
include_once '../../includes/profile_photo.php';
include_once '../../includes/user_social.php';

ensureUserSocialColumns($koneksi);

$userId = isset($_SESSION['user_id']) ? (int) $_SESSION['user_id'] : 0;
$errors = [];
$successMessage = '';

function fetchCurrentAdminProfile($koneksi, $userId)
{
    $stmtUser = mysqli_prepare($koneksi, "SELECT id, name, email, level, profile_photo, whatsapp, instagram FROM users WHERE id = ? LIMIT 1");

    if (! $stmtUser) {
        return null;
    }

    mysqli_stmt_bind_param($stmtUser, "i", $userId);
    mysqli_stmt_execute($stmtUser);
    $resultUser = mysqli_stmt_get_result($stmtUser);
    $currentUser = $resultUser ? mysqli_fetch_assoc($resultUser) : null;
    mysqli_stmt_close($stmtUser);

    return $currentUser;
}

if ($userId <= 0) {
    header("Location: ../../login.php");
    exit();
}

$user = fetchCurrentAdminProfile($koneksi, $userId);

if (! $user) {
    $errors[] = "Data akun admin tidak ditemukan.";
}

$formData = [
    'name' => '',
    'email' => '',
    'profile_photo' => '',
    'whatsapp' => '',
    'instagram' => '',
];

if ($user) {
    $formData['name'] = $user['name'];
    $formData['email'] = $user['email'];
    $formData['profile_photo'] = $user['profile_photo'] ?? '';
    $formData['whatsapp'] = $user['whatsapp'] ?? '';
    $formData['instagram'] = $user['instagram'] ?? '';
}

if (isset($_GET['status']) && $_GET['status'] === 'updated') {
    $successMessage = "Pengaturan akun berhasil diperbarui.";
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $user && ($_POST['form_type'] ?? '') === 'upload_photo') {
    $uploadResult = validateAndUploadProfilePhoto($_FILES['profile_photo'] ?? [], dirname(__DIR__, 2));

    if (! $uploadResult['success']) {
        $errors[] = $uploadResult['message'];
    }

    if (empty($errors) && ! empty($uploadResult['path'])) {
        $newProfilePhoto = $uploadResult['path'];
        $stmtUpdatePhoto = mysqli_prepare($koneksi, "UPDATE users SET profile_photo = ? WHERE id = ?");

        if (! $stmtUpdatePhoto) {
            deleteProfilePhotoFile($newProfilePhoto, dirname(__DIR__, 2));
            $errors[] = "Update foto profil gagal diproses: " . mysqli_error($koneksi);
        } else {
            mysqli_stmt_bind_param($stmtUpdatePhoto, "si", $newProfilePhoto, $userId);
            $execUpdatePhoto = mysqli_stmt_execute($stmtUpdatePhoto);
            mysqli_stmt_close($stmtUpdatePhoto);

            if (! $execUpdatePhoto) {
                deleteProfilePhotoFile($newProfilePhoto, dirname(__DIR__, 2));
                $errors[] = "Update foto profil gagal: " . mysqli_error($koneksi);
            } else {
                $updatedUser = fetchCurrentAdminProfile($koneksi, $userId);

                if ($updatedUser) {
                    syncUserSession($updatedUser);
                }

                header("Location: index.php?status=updated");
                exit();
            }
        }
    }

    $user = fetchCurrentAdminProfile($koneksi, $userId);
    if ($user) {
        $formData['name'] = $user['name'];
        $formData['email'] = $user['email'];
        $formData['profile_photo'] = $user['profile_photo'] ?? '';
        $formData['whatsapp'] = $user['whatsapp'] ?? '';
        $formData['instagram'] = $user['instagram'] ?? '';
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $user && ($_POST['form_type'] ?? '') === 'update_profile') {
    $formData['name'] = trim($_POST['name'] ?? '');
    $formData['email'] = trim($_POST['email'] ?? '');
    $formData['whatsapp'] = normalizeWhatsappNumber($_POST['whatsapp'] ?? '');
    $formData['instagram'] = normalizeInstagramUsername($_POST['instagram'] ?? '');
    $password = $_POST['password'] ?? '';

    if ($formData['name'] === '') {
        $errors[] = "Nama tidak boleh kosong.";
    }

    if ($formData['email'] === '') {
        $errors[] = "Email wajib diisi.";
    } elseif (! filter_var($formData['email'], FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Format email tidak valid.";
    }

    if ($formData['whatsapp'] !== '' && strlen($formData['whatsapp']) < 8) {
        $errors[] = "Nomor WhatsApp tidak valid.";
    }

    if ($formData['instagram'] !== '' && ! preg_match('/^[A-Za-z0-9._]{1,30}$/', $formData['instagram'])) {
        $errors[] = "Username Instagram tidak valid.";
    }

    if (empty($errors)) {
        $stmtExistingUser = mysqli_prepare($koneksi, "SELECT id FROM users WHERE email = ? AND id != ? LIMIT 1");

        if (! $stmtExistingUser) {
            $errors[] = "Validasi email gagal diproses.";
        } else {
            mysqli_stmt_bind_param($stmtExistingUser, "si", $formData['email'], $userId);
            mysqli_stmt_execute($stmtExistingUser);
            $existingResult = mysqli_stmt_get_result($stmtExistingUser);

            if ($existingResult && mysqli_num_rows($existingResult) > 0) {
                $errors[] = "Email sudah digunakan oleh akun lain.";
            }

            mysqli_stmt_close($stmtExistingUser);
        }

        if (empty($errors)) {
            $sql = "UPDATE users SET name = ?, email = ?, whatsapp = ?, instagram = ?";
            $types = "ssss";
            $params = [$formData['name'], $formData['email'], $formData['whatsapp'], $formData['instagram']];

            if ($password !== '') {
                $passwordHashed = password_hash($password, PASSWORD_DEFAULT);
                $sql .= ", password = ?";
                $types .= "s";
                $params[] = $passwordHashed;
            }

            $sql .= " WHERE id = ?";
            $types .= "i";
            $params[] = $userId;

            $stmtUpdateUser = mysqli_prepare($koneksi, $sql);

            if (! $stmtUpdateUser) {
                $errors[] = "Pengaturan akun gagal diperbarui: " . mysqli_error($koneksi);
            } else {
                mysqli_stmt_bind_param($stmtUpdateUser, $types, ...$params);
                $execUpdateUser = mysqli_stmt_execute($stmtUpdateUser);
                mysqli_stmt_close($stmtUpdateUser);

                if ($execUpdateUser) {
                    $updatedUser = fetchCurrentAdminProfile($koneksi, $userId);

                    if ($updatedUser) {
                        syncUserSession($updatedUser);
                    }

                    header("Location: index.php?status=updated");
                    exit();
                }

                $errors[] = "Pengaturan akun gagal diperbarui: " . mysqli_error($koneksi);
            }
        }
    }

    $user = fetchCurrentAdminProfile($koneksi, $userId);
    if ($user) {
        $formData['name'] = $user['name'];
        $formData['email'] = $user['email'];
        $formData['profile_photo'] = $user['profile_photo'] ?? '';
        $formData['whatsapp'] = $user['whatsapp'] ?? '';
        $formData['instagram'] = $user['instagram'] ?? '';
    }
}
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

        <?php if ($successMessage !== ''): ?>
          <div class="admin-alert admin-alert--success">
            <?= htmlspecialchars($successMessage) ?>
          </div>
        <?php endif; ?>

        <?php if (! empty($errors)): ?>
          <div class="admin-alert admin-alert--error">
            <?= htmlspecialchars(implode(' ', $errors)) ?>
          </div>
        <?php endif; ?>

        <div class="admin-form settings-form">
          <div class="profile-field">
            <p class="profile-field__label">Foto Profil</p>
            <form id="photo-upload-form" method="post" action="" enctype="multipart/form-data">
              <input type="hidden" name="form_type" value="upload_photo" />
              <div class="profile-field__row">
                <img class="profile-avatar" id="profile-avatar" src="<?= htmlspecialchars(getProfilePhotoUrl($formData['profile_photo'] ?? '', '../../')) ?>" alt="Foto profil" />
                <input id="profile-photo-input" name="profile_photo" type="file" accept=".jpg,.jpeg,.png" hidden />
                <button class="change-photo-button" id="change-photo-button" type="button">Ganti</button>
              </div>
            </form>
          </div>
          <form method="post" action="">
            <input type="hidden" name="form_type" value="update_profile" />
          <div class="admin-form__group">
            <label class="admin-label" for="name">Nama Pengguna</label>
            <input class="admin-field" id="name" name="name" type="text" value="<?= htmlspecialchars($formData['name']) ?>" />
          </div>
          <div class="admin-form__group">
            <label class="admin-label" for="email">Email</label>
            <input class="admin-field" id="email" name="email" type="email" value="<?= htmlspecialchars($formData['email']) ?>" placeholder="you@example.com" />
          </div>
          <div class="admin-form__group">
            <label class="admin-label" for="whatsapp">Nomor WhatsApp</label>
            <input class="admin-field" id="whatsapp" name="whatsapp" type="tel" value="<?= htmlspecialchars($formData['whatsapp']) ?>" placeholder="6281234567890" />
          </div>
          <div class="admin-form__group">
            <label class="admin-label" for="instagram">Username Instagram</label>
            <input class="admin-field" id="instagram" name="instagram" type="text" value="<?= htmlspecialchars($formData['instagram']) ?>" placeholder="username_instagram" />
          </div>
          <div class="admin-form__group">
            <label class="admin-label" for="password">Kata Sandi</label>
            <input class="admin-field" id="password" name="password" type="password" value="" placeholder="Masukkan kata sandi baru" />
          </div>
          <div class="admin-form__actions settings-actions">
            <button class="admin-button admin-button--primary settings-save-button" type="submit">Simpan Perubahan</button>
          </div>
          </form>
        </div>
      </main>
    </div>

    <?php include("../../templates/footer.php"); ?>
    <script>
      document.addEventListener("DOMContentLoaded", function () {
        const input = document.getElementById("profile-photo-input");
        const button = document.getElementById("change-photo-button");
        const photoForm = document.getElementById("photo-upload-form");
        const avatar = document.getElementById("profile-avatar");

        if (!input || !button || !photoForm || !avatar) {
          return;
        }

        button.addEventListener("click", function () {
          input.click();
        });

        input.addEventListener("change", function () {
          const file = input.files && input.files[0];
          if (!file) {
            return;
          }

          avatar.src = URL.createObjectURL(file);
          photoForm.submit();
        });
      });
    </script>
  </body>
</html>
