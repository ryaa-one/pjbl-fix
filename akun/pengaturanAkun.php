<?php
$currentLevel = "user";
include '../process/checkAuth.php';
include '../config/database.php';
include_once '../includes/profile_photo.php';

$userId = isset($_SESSION['user_id']) ? (int) $_SESSION['user_id'] : 0;
$errors = [];
$successMessage = '';

function fetchCurrentUserProfile($koneksi, $userId)
{
    $stmtUser = mysqli_prepare($koneksi, "SELECT id, name, email, level, profile_photo FROM users WHERE id = ? LIMIT 1");

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
    header("Location: ../login.php");
    exit();
}

$user = fetchCurrentUserProfile($koneksi, $userId);

if (! $user) {
    $errors[] = "Data akun user tidak ditemukan.";
}

$formData = [
    'name' => '',
    'email' => '',
    'profile_photo' => '',
];

if ($user) {
    $formData['name'] = $user['name'];
    $formData['email'] = $user['email'];
    $formData['profile_photo'] = $user['profile_photo'] ?? '';
}

if (isset($_GET['status']) && $_GET['status'] === 'updated') {
    $successMessage = "Pengaturan akun berhasil diperbarui.";
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $user && ($_POST['form_type'] ?? '') === 'upload_photo') {
    $uploadResult = validateAndUploadProfilePhoto($_FILES['profile_photo'] ?? [], dirname(__DIR__));

    if (! $uploadResult['success']) {
        $errors[] = $uploadResult['message'];
    }

    if (empty($errors) && ! empty($uploadResult['path'])) {
        $newProfilePhoto = $uploadResult['path'];
        $stmtUpdatePhoto = mysqli_prepare($koneksi, "UPDATE users SET profile_photo = ? WHERE id = ?");

        if (! $stmtUpdatePhoto) {
            deleteProfilePhotoFile($newProfilePhoto, dirname(__DIR__));
            $errors[] = "Update foto profil gagal diproses: " . mysqli_error($koneksi);
        } else {
            mysqli_stmt_bind_param($stmtUpdatePhoto, "si", $newProfilePhoto, $userId);
            $execUpdatePhoto = mysqli_stmt_execute($stmtUpdatePhoto);
            mysqli_stmt_close($stmtUpdatePhoto);

            if (! $execUpdatePhoto) {
                deleteProfilePhotoFile($newProfilePhoto, dirname(__DIR__));
                $errors[] = "Update foto profil gagal: " . mysqli_error($koneksi);
            } else {
                $updatedUser = fetchCurrentUserProfile($koneksi, $userId);

                if ($updatedUser) {
                    syncUserSession($updatedUser);
                }

                header("Location: pengaturanAkun.php?status=updated");
                exit();
            }
        }
    }

    $user = fetchCurrentUserProfile($koneksi, $userId);
    if ($user) {
        $formData['name'] = $user['name'];
        $formData['email'] = $user['email'];
        $formData['profile_photo'] = $user['profile_photo'] ?? '';
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $user && ($_POST['form_type'] ?? '') === 'update_profile') {
    $formData['name'] = trim($_POST['name'] ?? '');
    $formData['email'] = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';

    if ($formData['name'] === '') {
        $errors[] = "Nama wajib diisi.";
    }

    if ($formData['email'] === '') {
        $errors[] = "Email wajib diisi.";
    } elseif (! filter_var($formData['email'], FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Format email tidak valid.";
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
            $sql = "UPDATE users SET name = ?, email = ?";
            $types = "ss";
            $params = [$formData['name'], $formData['email']];

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
                    $updatedUser = fetchCurrentUserProfile($koneksi, $userId);

                    if ($updatedUser) {
                        syncUserSession($updatedUser);
                    }

                    header("Location: pengaturanAkun.php?status=updated");
                    exit();
                }

                $errors[] = "Pengaturan akun gagal diperbarui: " . mysqli_error($koneksi);
            }
        }
    }

    $user = fetchCurrentUserProfile($koneksi, $userId);
    if ($user) {
        $formData['name'] = $user['name'];
        $formData['email'] = $user['email'];
        $formData['profile_photo'] = $user['profile_photo'] ?? '';
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Pengaturan Akun - EvenTura</title>
    <link rel="stylesheet" type="text/css" href="../css/pengaturanAkun.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet"/>
</head>
<body>
<?php
    $navMode = "profile";
    include '../templates/navbar.php';
?>
    <section class="all-frame">
        <section class="card-profil">
            <div class="foto-profil">
                <img id="profile-avatar-card" src="<?= htmlspecialchars(getProfilePhotoUrl($formData['profile_photo'] ?? '', '../')) ?>" alt="Foto profil" />
            </div>
            <div class="teks-profil">
                <h2 class="nama-profil"><?= htmlspecialchars($formData['name']) ?></h2>
                <p class="deskripsi-profil">Kelola informasi akun Anda</p>
                <p class="jenis-akun">pengguna</p>
            </div>
            <a href="pengaturanAkun.php">
                <div class="button-profil"><p class="edit-profil">Edit Profil</p></div>
            </a>
            <div class="container-logout">
                <p class="logo-logout"><img src="../assets/images/logo-logout.svg" alt="Logout" /></p>
                <a href="../process/logout.php"><p class="teks-logout">Logout</p></a>
            </div>
        </section>

        <section class="main-content">
            <section class="container">
                <?php
                    $akunActive = "pengaturan";
                    include '../templates/akunNav.php';
                ?>

                <?php if ($successMessage !== ''): ?>
                    <div class="alert alert-success"><?= htmlspecialchars($successMessage) ?></div>
                <?php endif; ?>

                <?php if (! empty($errors)): ?>
                    <div class="alert alert-error"><?= htmlspecialchars(implode(' ', $errors)) ?></div>
                <?php endif; ?>

                <div class="form-group">
                    <label class="form-label" for="profile-photo-input">Foto Profil</label>
                    <form id="photo-upload-form" action="" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="form_type" value="upload_photo" />
                        <div class="profile-upload-row">
                            <img id="profile-avatar-form" class="profile-avatar-form" src="<?= htmlspecialchars(getProfilePhotoUrl($formData['profile_photo'] ?? '', '../')) ?>" alt="Foto profil" />
                            <input id="profile-photo-input" name="profile_photo" type="file" accept=".jpg,.jpeg,.png" hidden />
                            <button id="change-photo-button" class="btn btn-secondary" type="button">Ganti</button>
                        </div>
                    </form>
                </div>
                <form action="" method="post">
                    <input type="hidden" name="form_type" value="update_profile" />
                    <div class="form-group">
                        <label class="form-label" for="name">Nama</label>
                        <input id="name" name="name" type="text" class="form-input" value="<?= htmlspecialchars($formData['name']) ?>" />
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="email">Email</label>
                        <input id="email" name="email" type="email" class="form-input" value="<?= htmlspecialchars($formData['email']) ?>" />
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="password">Kata Sandi Baru</label>
                        <input id="password" name="password" type="password" class="form-input" value="" placeholder="Kosongkan jika tidak ingin diubah" />
                    </div>
                    <div class="actions">
                        <button class="btn btn-primary" type="submit">Simpan Perubahan</button>
                    </div>
                </form>
            </section>
        </section>
    </section>

    <?php include("../templates/footer.php"); ?>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const input = document.getElementById("profile-photo-input");
            const button = document.getElementById("change-photo-button");
            const photoForm = document.getElementById("photo-upload-form");
            const previewTargets = [
                document.getElementById("profile-avatar-card"),
                document.getElementById("profile-avatar-form")
            ].filter(Boolean);

            if (!input || !button || !photoForm || previewTargets.length === 0) {
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

                const previewUrl = URL.createObjectURL(file);
                previewTargets.forEach(function (target) {
                    target.src = previewUrl;
                });

                photoForm.submit();
            });
        });
    </script>
</body>
</html>
