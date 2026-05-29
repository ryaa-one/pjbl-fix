<?php
$path_prefix = '';
if (strpos($_SERVER['PHP_SELF'], '/akun/') !== false) {
    $path_prefix = '../';
} elseif (strpos($_SERVER['PHP_SELF'], '/admin/') !== false || strpos($_SERVER['PHP_SELF'], '/super admin/') !== false || strpos($_SERVER['PHP_SELF'], '/super%20admin/') !== false) {
    $path_prefix = '../../';
}
?>
<link rel="stylesheet" type="text/css" href="<?= $path_prefix ?>css/footer.css" />

<section class="footer">
    <div class="footer-atas">
        <div class="kiri-atas">
            <div class="logo_eventura">
                <img src="<?= $path_prefix ?>assets/images/logo-web.svg" alt="EvenTura">
                <p id="satu">EvenTura</p>
            </div>
            <div>
                <p id="dua">
                    Website yang berfungsi untuk memberikan kemudahan bagi masyarakat
                    dan wisatawan dalam menemukan event event<br />
                    pada setiap daerah di Nusantara. Selain itu website ini berfungsi
                    untuk memberikan pemahaman terhadap keberagaman<br />
                    event di Nusantara
                </p>
            </div>
        </div>
        <div class="kanan-atas">
            <ul class="navigasi">
                <li class="kanan-satu">Navigasi</li>
                <li><a href="<?= $path_prefix ?>index.php">Beranda</a></li>
                <li><a href="<?= $path_prefix ?>jelajah.php">Event</a></li>
                <li><a href="<?= $path_prefix ?>tentangKami.php">Tentang</a></li>
            </ul>
            <ul class="contact">
                <li class="kanan-dua">Contact</li>
                <li>+1 (234) 567-890</li>
                <li>contact@islandevents.com</li>
            </ul>
        </div>
    </div>
    <div class="footer-bawah">
        <div class="kiri-bawah">
            <img src="<?= $path_prefix ?>assets/images/vector-ig.png" alt="Instagram" />
            <img src="<?= $path_prefix ?>assets/images/vector-fb.png" alt="Facebook" />
            <img src="<?= $path_prefix ?>assets/images/vector-twit.png" alt="Twitter" />
        </div>
        <div class="kanan-bawah">
            <p>© 2026 EvenTura.</p>
        </div>
    </div>
</section>
