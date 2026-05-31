<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar - EvenTura</title>
    <link rel="stylesheet" href="css/register.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="container-kiri">
            <img src="assets/images/gambar-login1.png" class="image-1">
        </div>
        <div class="container-kanan">
            <div class="main-content">
                <form action="process/register.php" method="post">
                    <h1 class="title">Daftar</h1>
                    <div class="form-group">
                        <div class="input-wrapper">
                            <img src="assets/images/logo-email.png" class="icon">
                            <input type="email" placeholder="email" name="email" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-wrapper">
                            <img src="assets/images/logo-kataSandi.png" class="icon">
                            <input type="password" placeholder="kata sandi" name="password" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-wrapper">
                            <img src="assets/images/logo-namaPengguna.png" class="icon">
                            <input type="text" placeholder="nama pengguna" name="nama" required>
                        </div>
                    </div>
                    <button type="submit" class="btn-login" name="submit-register">Daftar</button>
                </form>
                <div class="footer-text">
                    Sudah Punya Akun? <a href="login.php">Masuk</a>
                </div>
                <div class="divider">
                    <div class="divider-line"></div>
                    <span class="divider-text">atau</span>
                    <div class="divider-line"></div>
                </div>
                <button type="button" class="btn-google" onclick="window.location.href='google-login.php'">
                    <span class="google-icon">G</span>
                    Daftar dengan google
                </button>
                <div class="logo">
                    <ul>
                        <li><a href="#"><img src="assets/images/logo-fb.png"></a></li>
                        <li><a href="#"><img src="assets/images/logo-twitter.png"></a></li>
                        <li><a href="#"><img src="assets/images/logo-linkedin.png"></a></li>
                        <li><a href="#"><img src="assets/images/logo-ig.png"></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
