<?php
$adminActive = $adminActive ?? "";
$path_prefix = '../';
?>
<aside class="admin-sidebar" aria-label="Navigasi admin">
    <nav class="admin-sidebar__nav">
        <a class="admin-sidebar__link <?= $adminActive === 'dashboard' ? 'is-active' : '' ?>" href="<?= $path_prefix ?>dashboard">
            <img src="<?= $path_prefix ?>../assets/images/iconDashboard.png" alt="Dashboard">
            Dashboard
        </a>
        <a class="admin-sidebar__link <?= $adminActive === 'admin' ? 'is-active' : '' ?>" href="<?= $path_prefix ?>admin">
            <img src="<?= $path_prefix ?>../assets/images/IconPengaturan.png" alt="User">
            Kelola User
        </a>
        <a class="admin-sidebar__link <?= $adminActive === 'event' ? 'is-active' : '' ?>" href="<?= $path_prefix ?>event">
            <img src="<?= $path_prefix ?>../assets/images/IconEvent.png" alt="Event">
            Kelola Event
        </a>
        <a class="admin-sidebar__link <?= $adminActive === 'ulasan' ? 'is-active' : '' ?>" href="<?= $path_prefix ?>ulasan">
            <img src="<?= $path_prefix ?>../assets/images/logo-review.svg" alt="Ulasan">
            Kelola Ulasan
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
