<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masuk - EvenTura</title>
    <link rel="stylesheet" href="css/login.css">
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
                <?php if (($_GET['password_reset'] ?? '') === 'success'): ?>
                    <p class="form-message form-message-success">Password berhasil diubah. Silakan masuk dengan password baru.</p>
                <?php endif; ?>
                <form action="process/login.php" method="post">
                    <h1 class="title">Masuk</h1>
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
                        <a href="lupapw.php" class="forgot-password">Lupa Password?</a>
                    </div>
                    <button type="submit" class="btn-login" name="submit-login">Masuk</button>
                </form>
                <div class="footer-text">
                    Tidak Memiliki Akun? <a href="register.php">Daftar</a>
                </div>
                <div class="divider">
                    <div class="divider-line"></div>
                    <span class="divider-text">atau</span>
                    <div class="divider-line"></div>
                </div>
                <button type="button" class="btn-google" onclick="window.location.href='google-login.php'">
                    <img src="assets/images/logo-google.png" class="google-icon" alt="Logo Google">
                    <span>Masuk dengan Google</span>
                </button>
            </div>
        </div>
    </div>
</body>
</html>
