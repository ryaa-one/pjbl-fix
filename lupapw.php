<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lupa Password - EvenTura</title>
    <link rel="stylesheet" href="css/lupapw.css">
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
                <h1 class="title">Lupa Password</h1>
                <?php if (($_GET['status'] ?? '') === 'sent'): ?>
                    <p class="form-message form-message-success">Jika email terdaftar, link reset password telah dikirim.</p>
                <?php elseif (($_GET['status'] ?? '') === 'invalid'): ?>
                    <p class="form-message form-message-error">Masukkan alamat email yang valid.</p>
                <?php endif; ?>
                <form action="process/forgot_password.php" method="post">
                    <div class="form-group">
                        <div class="input-wrapper">
                            <img src="assets/images/logo-email.png" class="icon">
                            <input type="email" placeholder="email" name="email" required>
                        </div>
                    </div>
                    <div class="footer-text">
                        <a href="login.php">Kembali ke Masuk</a>
                    </div>
                    <button class="btn-login" type="submit">Verifikasi Email</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
