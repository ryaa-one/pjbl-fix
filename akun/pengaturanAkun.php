<?php
$currentLevel = "user";
include '../process/checkAuth.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Pengaturan Akun - EvenTura</title>
    <link rel="stylesheet" type="text/css" href="../css/pengaturanAkun.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet"/>
</head>
<?php
    $navMode = "profile";
    include '../templates/navbar.php';
?>
    <section class="all-frame">
        <section class="card-profil">
            <div class="foto-profil">
                <img src="../assets/images/foto-profil.svg" />
            </div>
            <div class="teks-profil">
                <h2 class="nama-profil"><?= htmlspecialchars($_SESSION['nama']) ?></h2>
                <p class="deskripsi-profil">Penggemar Seni dan Budaya</p>
                <p class="jenis-akun">pengguna</p>
            </div>
            <a href="#"><div class="button-profil"><p class="edit-profil">Edit Profil</p></div></a>
            <div class="container-logout">
                <p class="logo-logout"><img src="../assets/images/logo-logout.svg" /></p>
                <a href="../process/logout.php"><p class="teks-logout">Logout</p></a>
            </div>
        </section>

        <section class="main-content">
            <section class="container">
                <?php
                    $akunActive = "pengaturan";
                    include '../templates/akunNav.php';
                ?>
                <form action="" method="">
                    <div class="form-group">
                        <label class="form-label">Nama</label>
                        <input type="text" class="form-input" placeholder="<?= htmlspecialchars($_SESSION['nama']) ?>" />
                    </div>
                    <div class="form-group">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-input" placeholder="<?= htmlspecialchars($_SESSION['email']) ?>" />
                    </div>
                    <div class="actions">
                        <button class="btn btn-primary">Simpan Perubahan</button>
                        <button class="btn btn-secondary">Ubah Kata Sandi</button>
                    </div>
                </form>
            </section>
        </section>
    </section>

    <?php include("../templates/footer.php"); ?>
</body>
</html>
