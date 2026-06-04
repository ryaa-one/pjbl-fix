<?php
require_once __DIR__ . '/../includes/auth.php';
auth_start_session();
require_request_method('POST');

include_once '../includes/profile_photo.php';

if (isset($_POST['submit-login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    include '../config/database.php';

    $user = checkExistingAccount($email);
    checkPassword($password, $user['password']);
    session_regenerate_id(true);
    saveUserToSession($user);

    $userLevel = auth_normalize_role((string) $user['level']);

    if ($userLevel === 'admin') {
        header("Location: ../admin/dashboard");
    } elseif ($userLevel === 'user') {
        header("Location: ../index.php");
    } else {
        session_unset();
        session_destroy();
        http_response_code(403);
        echo "Level akun tidak valid. Jalankan migrasi role terlebih dahulu.";
        exit();
    }
    exit();
}

http_response_code(400);
echo 'Permintaan login tidak valid.';
exit();

function checkExistingAccount($email)
{
    global $koneksi;

    $stmt = mysqli_prepare($koneksi, "SELECT * FROM users WHERE email = ? LIMIT 1");
    if (! $stmt) {
        echo "Login gagal diproses";
        exit();
    }

    mysqli_stmt_bind_param($stmt, 's', $email);
    mysqli_stmt_execute($stmt);
    $exec = mysqli_stmt_get_result($stmt);
    $user = $exec ? mysqli_fetch_assoc($exec) : null;
    mysqli_stmt_close($stmt);

    if (! $user) {
        echo "Email belum terdaftar";
        exit();
    }

    return $user;
}

function checkPassword($passwordInput, $passwordUser)
{
    if (! password_verify($passwordInput, $passwordUser)) {
        echo "Password salah";
        exit();
    }
}

function saveUserToSession($user)
{
    syncUserSession($user);
}
