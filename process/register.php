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

    $stmt = mysqli_prepare($koneksi, "SELECT id FROM users WHERE email = ? LIMIT 1");
    if (! $stmt) {
        echo "Registrasi gagal diproses";
        exit();
    }

    mysqli_stmt_bind_param($stmt, 's', $email);
    mysqli_stmt_execute($stmt);
    $exec = mysqli_stmt_get_result($stmt);
    $existingUser = $exec ? mysqli_fetch_assoc($exec) : null;
    mysqli_stmt_close($stmt);

    if ($existingUser) {
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
    $stmtCreateUser = mysqli_prepare(
        $koneksi,
        "INSERT INTO users (email, password, name, whatsapp, instagram, profile_photo, level) VALUES (?, ?, ?, '', '', '', 'user')"
    );
    if (! $stmtCreateUser) {
        echo "Data gagal ditambahkan";
        exit();
    }

    mysqli_stmt_bind_param($stmtCreateUser, 'sss', $email, $password, $nama);
    $execCreateUser = mysqli_stmt_execute($stmtCreateUser);
    mysqli_stmt_close($stmtCreateUser);

    if ($execCreateUser) {

        // ambil data user
        $stmtGetUser = mysqli_prepare($koneksi, "SELECT * FROM users WHERE email = ? LIMIT 1");
        if (! $stmtGetUser) {
            echo "Data user gagal dimuat";
            exit();
        }

        mysqli_stmt_bind_param($stmtGetUser, 's', $email);
        mysqli_stmt_execute($stmtGetUser);
        $execGetUser = mysqli_stmt_get_result($stmtGetUser);
        $user = $execGetUser ? mysqli_fetch_assoc($execGetUser) : null;
        mysqli_stmt_close($stmtGetUser);

        // masukkan data user ke session
     
        if (! $user) {
            echo "Data user gagal dimuat";
            exit();
        }

        session_regenerate_id(true);
        syncUserSession($user);
        header("Location: ../index.php");
        exit();
    } else {
        echo mysqli_errno($koneksi) === 1062 ? "Email sudah digunakan" : "Data gagal ditambahkan";
    }
}
