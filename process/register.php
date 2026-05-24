<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if(isset($_POST['submit-register'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];
    $nama = $_POST['nama'];

    include '../config/database.php';

    // check existing account
    checkExistingAccount($email);

    // create user
    createUser($email, $password, $nama);
}


function checkExistingAccount($email)
{
    global $koneksi;

    $query = "SELECT * FROM users WHERE email = '$email'";
    $exec = mysqli_query($koneksi, $query);

    if (mysqli_num_rows($exec) > 0) {
        echo "Email sudah terdaftar";
        exit();
    }
}

function createUser($email, $password, $nama)
{
    global $koneksi;

    // enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    // create user
    $queryCreateUser = "INSERT INTO users (email, password, name, level) VALUES ('$email', '$password', '$nama', 'user')";
    $execCreateUser = mysqli_query($koneksi, $queryCreateUser);
    if ($execCreateUser) {

        // ambil data user
        $queryGetUser = "SELECT * FROM users WHERE email = '$email'";
        $execGetUser = mysqli_query($koneksi, $queryGetUser);
        $user = mysqli_fetch_assoc($execGetUser);

        // masukkan data user ke session
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['nama'] = $user['name'];
        $_SESSION['level'] = $user['level'];
        header("Location: ../EvenTura.php");
    } else {
        echo "Data gagal ditambahkan";
    }
}
