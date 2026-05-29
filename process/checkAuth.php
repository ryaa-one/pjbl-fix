<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$currentPath = $_SERVER['PHP_SELF'] ?? '';
$isNestedAdminPath = strpos($currentPath, '/admin/') !== false
    || strpos($currentPath, '/super admin/') !== false
    || strpos($currentPath, '/super%20admin/') !== false;
$loginPath = dirname($currentPath) === '/akun' ? '../login.php' : ($isNestedAdminPath ? '../../login.php' : 'login.php');

// Cegah browser menyimpan halaman ini di cache
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
header("Expires: Sat, 01 Jan 2000 00:00:00 GMT");

// jika belum login, redirect ke login
if (! isset($_SESSION['nama'])) {
    header("Location: " . $loginPath);
    exit();
}

// jika sudah login, cocokkan dengan levelnya, jika tidak cocok, tolak akses
else if ($_SESSION['level'] != $currentLevel) {
    echo "Kamu tidak punya akses ke halaman ini";
    exit();
}
