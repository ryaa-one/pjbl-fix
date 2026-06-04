<?php

use PHPMailer\PHPMailer\PHPMailer;

require_once __DIR__ . '/env.php';

function getPasswordResetByToken($token)
{
    global $koneksi;

    if (! is_string($token) || ! preg_match('/^[a-f0-9]{64}$/', $token)) {
        return null;
    }

    $tokenHash = hash('sha256', $token);
    $statement = mysqli_prepare(
        $koneksi,
        'SELECT id, user_id, expires_at, used_at, expires_at <= NOW() AS is_expired
         FROM password_resets
         WHERE token_hash = ?
         LIMIT 1'
    );
    mysqli_stmt_bind_param($statement, 's', $tokenHash);
    mysqli_stmt_execute($statement);
    $reset = mysqli_fetch_assoc(mysqli_stmt_get_result($statement));
    mysqli_stmt_close($statement);

    return $reset ?: null;
}

function getPasswordResetError($reset)
{
    if (! $reset) {
        return 'Link reset password tidak valid.';
    }

    if ($reset['used_at'] !== null) {
        return 'Link reset password sudah pernah digunakan.';
    }

    if ((int) $reset['is_expired'] === 1) {
        return 'Link reset password sudah kadaluarsa.';
    }

    return null;
}

function sendPasswordResetEmail($recipientEmail, $recipientName, $token)
{
    require_once __DIR__ . '/../vendor/autoload.php';

    $smtp = require __DIR__ . '/../config/smtp.php';
    if ($smtp['username'] === '' || $smtp['password'] === '' || $smtp['from_email'] === '') {
        throw new RuntimeException('Konfigurasi SMTP belum lengkap.');
    }
    $resetUrl = (getenv('APP_URL') ?: 'http://localhost/PJBL_NEW')
        . '/reset-password.php?token=' . urlencode($token);

    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host = $smtp['host'];
    $mail->Port = $smtp['port'];
    $mail->SMTPAuth = true;
    $mail->Username = $smtp['username'];
    $mail->Password = $smtp['password'];
    $mail->SMTPSecure = $smtp['encryption'];
    $mail->CharSet = 'UTF-8';
    $mail->setFrom($smtp['from_email'], $smtp['from_name']);
    $mail->addAddress($recipientEmail, $recipientName);
    $mail->isHTML(true);
    $mail->Subject = 'Reset Password EvenTura';
    $mail->Body = '
        <h2>Reset Password EvenTura</h2>
        <p>Kami menerima permintaan reset password untuk akun Anda.</p>
        <p><a href="' . htmlspecialchars($resetUrl, ENT_QUOTES, 'UTF-8') . '">Reset password EvenTura</a></p>
        <p>Link ini hanya berlaku selama 1 jam dan hanya dapat digunakan satu kali.</p>
        <p>Jika Anda tidak meminta reset password, abaikan email ini.</p>';
    $mail->AltBody = "Reset Password EvenTura\n\n"
        . "Buka link berikut untuk mengatur password baru:\n$resetUrl\n\n"
        . "Link ini hanya berlaku selama 1 jam dan hanya dapat digunakan satu kali.\n"
        . "Jika Anda tidak meminta reset password, abaikan email ini.";
    $mail->send();
}
