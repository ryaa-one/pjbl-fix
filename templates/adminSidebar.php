<?php
$adminActive = $adminActive ?? "";
$path_prefix = '';
if (strpos($_SERVER['PHP_SELF'], '/admin/') !== false) {
    $path_prefix = '../';
}

if ($adminActive === '') {
    $currentPage = basename($_SERVER['PHP_SELF']);
    $currentDir = dirname($_SERVER['PHP_SELF']);

    if ($currentPage === 'dashboard.php') {
        $adminActive = 'dashboard';
    } elseif (in_array($currentPage, ['event.php', 'create.php', 'edit.php'], true)) {
        $adminActive = 'event';
    } elseif (strpos($currentDir, '/admin/user') !== false || in_array($currentPage, ['index.php', 'create.php', 'edit.php'], true)) {
        $adminActive = 'user';
    } elseif ($currentPage === 'pengaturanAkunAdmin.php') {
        $adminActive = 'pengaturan';
    }
}
?>
<aside class="admin-sidebar" aria-label="Navigasi admin">
    <nav class="admin-sidebar__nav">
        <a class="admin-sidebar__link <?= $adminActive === 'dashboard' ? 'is-active' : '' ?>" href="<?= $path_prefix ?>dashboard">
            <img src="<?= $path_prefix ?>../assets/images/iconDashboard.png" alt="Dashboard">
            Dashboard
        </a>
        <a class="admin-sidebar__link <?= $adminActive === 'event' ? 'is-active' : '' ?>" href="<?= $path_prefix ?>event">
            <img src="<?= $path_prefix ?>../assets/images/IconEvent.png" alt="Event">
            Event
        </a>
        <a class="admin-sidebar__link <?= $adminActive === 'user' ? 'is-active' : '' ?>" href="<?= $path_prefix ?>user">
            <img src="<?= $path_prefix ?>../assets/images/logo-namaPengguna.png" alt="User">
            User
        </a>
        <a class="admin-sidebar__link <?= $adminActive === 'pengaturan' ? 'is-active' : '' ?>" href="<?= $path_prefix ?>pengaturan">
            <img src="<?= $path_prefix ?>../assets/images/IconPengaturan.png" alt="Pengaturan">
            Pengaturan
        </a>
        <a class="admin-sidebar__link" href="<?= $path_prefix ?>../process/logout.php">
            <img src="<?= $path_prefix ?>../assets/images/IconLogout.png" alt="Logout">
            Logout
        </a>
    </nav>
</aside>
