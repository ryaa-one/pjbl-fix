<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (isset($_POST['submit-login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    include '../config/database.php';

    $user = checkExistingAccount($email);
    checkPassword($password, $user['password']);
    saveUserToSession($user);

    if ($user['level'] == 'admin') {
        header("Location: ../admin/dashboard");
    } else {
        header("Location: ../index.php");
    }
    exit();
}

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
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['email'] = $user['email'];
    $_SESSION['nama'] = $user['name'];
    $_SESSION['level'] = $user['level'];
}
