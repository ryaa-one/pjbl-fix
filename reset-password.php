<?php

include __DIR__ . '/config/database.php';
include __DIR__ . '/includes/password_reset.php';

$token = trim((string) ($_GET['token'] ?? ''));
$resetError = getPasswordResetError(getPasswordResetByToken($token));
$status = $_GET['status'] ?? '';

if ($status === 'short') {
    $formError = 'Password minimal terdiri dari 8 karakter.';
} elseif ($status === 'mismatch') {
    $formError = 'Konfirmasi password tidak sesuai.';
} elseif ($status === 'invalid') {
    $formError = 'Link reset password tidak valid atau sudah tidak dapat digunakan.';
} else {
    $formError = null;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password - EvenTura</title>
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
                <h1 class="title">Reset Password</h1>
                <?php if ($resetError !== null): ?>
                    <p class="form-message form-message-error"><?= htmlspecialchars($resetError) ?></p>
                    <div class="footer-text"><a href="lupapw.php">Minta link reset baru</a></div>
                <?php else: ?>
                    <?php if ($formError !== null): ?>
                        <p class="form-message form-message-error"><?= htmlspecialchars($formError) ?></p>
                    <?php endif; ?>
                    <form action="process/reset_password.php" method="post">
                        <input type="hidden" name="token" value="<?= htmlspecialchars($token) ?>">
                        <div class="form-group">
                            <div class="input-wrapper">
                                <img src="assets/images/logo-kataSandi.png" class="icon">
                                <input type="password" name="password" placeholder="kata sandi baru" minlength="8" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-wrapper">
                                <img src="assets/images/logo-kataSandi.png" class="icon">
                                <input type="password" name="password_confirmation" placeholder="konfirmasi kata sandi" minlength="8" required>
                            </div>
                        </div>
                        <button class="btn-login" type="submit">Simpan Password</button>
                    </form>
                <?php endif; ?>
            </div>
        </div>
    </div>
</body>
</html>
