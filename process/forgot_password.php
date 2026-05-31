<?php

include __DIR__ . '/../config/database.php';
include __DIR__ . '/../includes/password_reset.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: ../lupapw.php');
    exit();
}

$email = trim((string) ($_POST['email'] ?? ''));

if (! filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header('Location: ../lupapw.php?status=invalid');
    exit();
}

$statement = mysqli_prepare($koneksi, 'SELECT id, name, email FROM users WHERE email = ? LIMIT 1');
mysqli_stmt_bind_param($statement, 's', $email);
mysqli_stmt_execute($statement);
$user = mysqli_fetch_assoc(mysqli_stmt_get_result($statement));
mysqli_stmt_close($statement);

if ($user) {
    $token = bin2hex(random_bytes(32));
    $tokenHash = hash('sha256', $token);

    $statement = mysqli_prepare(
        $koneksi,
        'UPDATE password_resets SET used_at = NOW() WHERE user_id = ? AND used_at IS NULL'
    );
    mysqli_stmt_bind_param($statement, 'i', $user['id']);
    mysqli_stmt_execute($statement);
    mysqli_stmt_close($statement);

    $statement = mysqli_prepare(
        $koneksi,
        'INSERT INTO password_resets (user_id, token_hash, expires_at) VALUES (?, ?, DATE_ADD(NOW(), INTERVAL 1 HOUR))'
    );
    mysqli_stmt_bind_param($statement, 'is', $user['id'], $tokenHash);
    mysqli_stmt_execute($statement);
    mysqli_stmt_close($statement);

    try {
        sendPasswordResetEmail($user['email'], $user['name'], $token);
    } catch (Throwable $exception) {
        error_log('EvenTura password reset email failed: ' . $exception->getMessage());
    }
}

header('Location: ../lupapw.php?status=sent');
exit();
