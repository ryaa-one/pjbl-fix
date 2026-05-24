<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$navActive = $navActive ?? "";

$path_prefix = '';
if (strpos($_SERVER['PHP_SELF'], '/akun/') !== false) {
    $path_prefix = '../';
} elseif (strpos($_SERVER['PHP_SELF'], '/admin/') !== false) {
    $path_prefix = '../../';
}
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
                    <a href="<?= $path_prefix ?>akun/eventfavorit.php">Profil</a>
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
        <a href="<?= $_SESSION['level'] === 'admin' ? $path_prefix . 'admin/dashboard' : $path_prefix . 'akun/eventfavorit.php' ?>" class="container-logo desktop-only">
            <span class="nama-pengguna"><?= htmlspecialchars($_SESSION['nama']) ?></span>
            <img class="gambar-menu" src="<?= $path_prefix ?>assets/images/logo-profil.svg" alt="Profil" />
        </a>
    <?php endif; ?>
</header>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const hamburger = document.getElementById("hamburger");
        const nav = document.getElementById("nav");
        if (!hamburger || !nav) return;
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
        document.addEventListener("click", function(event) {
            if (!nav.contains(event.target) && !hamburger.contains(event.target) && nav.classList.contains("active")) {
                hamburger.classList.remove("active");
                nav.classList.remove("active");
                hamburger.setAttribute("aria-expanded", "false");
            }
        });
    });
</script>