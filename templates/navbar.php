<?php
include_once __DIR__ . '/../includes/auth.php';
include_once __DIR__ . '/../includes/profile_photo.php';
auth_start_session();
$navActive = $navActive ?? "";

$path_prefix = '';
if (strpos($_SERVER['PHP_SELF'], '/akun/') !== false) {
    $path_prefix = '../';
} elseif (strpos($_SERVER['PHP_SELF'], '/admin/') !== false || strpos($_SERVER['PHP_SELF'], '/user/') !== false) {
    $path_prefix = '../../';
}

$profileUrl = $path_prefix . 'user/dashboard';
$settingsUrl = $path_prefix . 'user/pengaturan';
if (($_SESSION['level'] ?? '') === 'admin') {
    $profileUrl = $path_prefix . 'admin/dashboard';
    $settingsUrl = $path_prefix . 'admin/pengaturan';
}
$logoutUrl = $path_prefix . 'process/logout.php';
?>

<link rel="stylesheet" type="text/css" href="<?= $path_prefix ?>css/navbar.css" />

<header>
    <a href="<?= $path_prefix ?>index.php">
        <img class="gambar-logo" src="<?= $path_prefix ?>assets/images/logo-web.svg" alt="EvenTura" />
    </a>
    <a href="<?= $path_prefix ?>index.php">
        <h1 class="EvenTura">EvenTura</h1>
    </a>

    <div class="hamburger" id="hamburger" aria-label="Buka navigasi" aria-expanded="false">
        <span></span>
        <span></span>
        <span></span>
    </div>

    <nav id="nav">
        <ul>
            <?php if (isset($_SESSION['user_id'])): ?>
                <li class="mobile-only">
                    <a href="<?= $profileUrl ?>">Dashboard</a>
                </li>
                <li class="mobile-only">
                    <a href="<?= $settingsUrl ?>">Pengaturan Akun</a>
                </li>
                <li class="mobile-only">
                    <a href="<?= $logoutUrl ?>">Logout</a>
                </li>
            <?php endif; ?>
            <li class="<?= $navActive === 'home' ? 'beranda' : '' ?>">
                <a href="<?= $path_prefix ?>index.php">Beranda</a>
            </li>
            <li class="<?= $navActive === 'event' ? 'beranda' : '' ?>">
                <a href="<?= $path_prefix ?>jelajah.php">Event</a>
            </li>
            <li class="<?= $navActive === 'about' ? 'beranda' : '' ?>">
                <a href="<?= $path_prefix ?>tentangKami.php">Tentang kami</a>
            </li>
        </ul>

        <?php if (!isset($_SESSION['user_id'])): ?>
            <div class="button-navbar">
                <a href="<?= $path_prefix ?>login.php"><button class="masuk">Masuk</button></a>
                <a href="<?= $path_prefix ?>register.php"><button class="daftar">Daftar</button></a>
            </div>
        <?php endif; ?>
    </nav>

    <?php if (isset($_SESSION['user_id'])): ?>
        <div class="profile-dropdown desktop-only" data-profile-dropdown>
            <button class="container-logo profile-dropdown__trigger" type="button" aria-expanded="false" aria-haspopup="true" data-profile-dropdown-trigger>
                <span class="nama-pengguna"><?= htmlspecialchars($_SESSION['nama']) ?></span>
                <img class="gambar-menu gambar-menu--avatar" src="<?= htmlspecialchars(getProfilePhotoUrl($_SESSION['profile_photo'] ?? '', $path_prefix)) ?>" alt="Profil" />
            </button>
            <div class="profile-dropdown__menu" data-profile-dropdown-menu hidden>
                <a class="profile-dropdown__item" href="<?= $profileUrl ?>">Dashboard</a>
                <a class="profile-dropdown__item" href="<?= $settingsUrl ?>">Pengaturan Akun</a>
                <a class="profile-dropdown__item profile-dropdown__item--logout" href="<?= $logoutUrl ?>">Logout</a>
            </div>
        </div>
    <?php endif; ?>
</header>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const hamburger = document.getElementById("hamburger");
        const nav = document.getElementById("nav");
        const profileDropdown = document.querySelector("[data-profile-dropdown]");
        const profileTrigger = document.querySelector("[data-profile-dropdown-trigger]");
        const profileMenu = document.querySelector("[data-profile-dropdown-menu]");

        if (hamburger && nav) {
            hamburger.addEventListener("click", function() {
                hamburger.classList.toggle("active");
                nav.classList.toggle("active");
                hamburger.setAttribute("aria-expanded", nav.classList.contains("active") ? "true" : "false");
            });
            nav.querySelectorAll("a").forEach((link) => {
                link.addEventListener("click", function() {
                    hamburger.classList.remove("active");
                    nav.classList.remove("active");
                    hamburger.setAttribute("aria-expanded", "false");
                });
            });
        }

        if (profileDropdown && profileTrigger && profileMenu) {
            profileTrigger.addEventListener("click", function() {
                const willOpen = profileMenu.hidden;
                profileMenu.hidden = !willOpen;
                profileTrigger.setAttribute("aria-expanded", willOpen ? "true" : "false");
            });
        }

        document.addEventListener("click", function(event) {
            if (nav && hamburger && !nav.contains(event.target) && !hamburger.contains(event.target) && nav.classList.contains("active")) {
                hamburger.classList.remove("active");
                nav.classList.remove("active");
                hamburger.setAttribute("aria-expanded", "false");
            }
            if (profileDropdown && profileTrigger && profileMenu && !profileDropdown.contains(event.target)) {
                profileMenu.hidden = true;
                profileTrigger.setAttribute("aria-expanded", "false");
            }
        });

        document.addEventListener("keydown", function(event) {
            if (event.key === "Escape" && profileTrigger && profileMenu) {
                profileMenu.hidden = true;
                profileTrigger.setAttribute("aria-expanded", "false");
            }
        });
    });
</script>
