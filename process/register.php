<?php
require_once __DIR__ . '/../includes/auth.php';
auth_start_session();
require_request_method('POST');

include_once '../includes/profile_photo.php';

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

http_response_code(400);
echo 'Permintaan registrasi tidak valid.';
exit();

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
    $queryCreateUser = "INSERT INTO users (email, password, name, whatsapp, instagram, profile_photo, level) VALUES ('$email', '$password', '$nama', '', '', '', 'user')";
    $execCreateUser = mysqli_query($koneksi, $queryCreateUser);
    if ($execCreateUser) {

        // ambil data user
        $queryGetUser = "SELECT * FROM users WHERE email = '$email'";
        $execGetUser = mysqli_query($koneksi, $queryGetUser);
        $user = mysqli_fetch_assoc($execGetUser);

        // masukkan data user ke session
     
        session_regenerate_id(true);
        syncUserSession($user);
        header("Location: ../index.php");
        exit();
    } else {
        echo mysqli_errno($koneksi) === 1062 ? "Email sudah digunakan" : "Data gagal ditambahkan";
    }
}
