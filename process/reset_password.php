<?php

include __DIR__ . '/../config/database.php';
include __DIR__ . '/../includes/password_reset.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: ../login.php');
    exit();
}

$token = trim((string) ($_POST['token'] ?? ''));
$password = (string) ($_POST['password'] ?? '');
$passwordConfirmation = (string) ($_POST['password_confirmation'] ?? '');
$reset = getPasswordResetByToken($token);
$resetError = getPasswordResetError($reset);

if ($resetError !== null) {
    header('Location: ../reset-password.php?token=' . urlencode($token) . '&status=invalid');
    exit();
}

if (strlen($password) < 8) {
    header('Location: ../reset-password.php?token=' . urlencode($token) . '&status=short');
    exit();
}

if ($password !== $passwordConfirmation) {
    header('Location: ../reset-password.php?token=' . urlencode($token) . '&status=mismatch');
    exit();
}

mysqli_begin_transaction($koneksi);

try {
    $statement = mysqli_prepare(
        $koneksi,
        'UPDATE password_resets
         SET used_at = NOW()
         WHERE id = ? AND used_at IS NULL AND expires_at > NOW()'
    );
    mysqli_stmt_bind_param($statement, 'i', $reset['id']);
    mysqli_stmt_execute($statement);

    if (mysqli_stmt_affected_rows($statement) !== 1) {
        throw new RuntimeException('Reset token is no longer valid.');
    }

    mysqli_stmt_close($statement);

    $passwordHash = password_hash($password, PASSWORD_DEFAULT);
    $statement = mysqli_prepare($koneksi, 'UPDATE users SET password = ? WHERE id = ?');
    mysqli_stmt_bind_param($statement, 'si', $passwordHash, $reset['user_id']);
    mysqli_stmt_execute($statement);
    mysqli_stmt_close($statement);

    mysqli_commit($koneksi);
} catch (Throwable $exception) {
    mysqli_rollback($koneksi);
    error_log('EvenTura password reset failed: ' . $exception->getMessage());
    header('Location: ../reset-password.php?token=' . urlencode($token) . '&status=invalid');
    exit();
}

header('Location: ../login.php?password_reset=success');
exit();
