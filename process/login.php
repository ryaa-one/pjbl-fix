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

    if ($user['level'] == 'super_admin') {
        header("Location: ../super%20admin/dashboard");
    } elseif ($user['level'] == 'admin') {
        header("Location: ../admin/dashboard");
    } else {
        header("Location: ../index.php");
    }
    exit();
}

http_response_code(400);
echo 'Permintaan login tidak valid.';
exit();

function checkExistingAccount($email)
{
    global $koneksi;

    $query = "SELECT * FROM users WHERE email = '$email'";
    $exec = mysqli_query($koneksi, $query);

    if (mysqli_num_rows($exec) == 0) {
        echo "Email belum terdaftar";
        exit();
    } else {
        $user = mysqli_fetch_assoc($exec);
        return $user;
    }
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
