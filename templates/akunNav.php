<?php
$akunActive = $akunActive ?? "";
?>
<div class="navigation">
    <div class="nav-item <?= $akunActive === 'favorit' ? 'active' : '' ?>">
        <a href="eventfavorit.php">Event Favorit</a>
    </div>
    <div class="nav-item <?= $akunActive === 'disukai' ? 'active' : '' ?>">
        <a href="eventYangDisukai.php">Event Yang Disukai</a>
    </div>
    <div class="nav-item <?= $akunActive === 'pengaturan' ? 'active' : '' ?>">
        <a href="pengaturanAkun.php">Pengaturan Akun</a>
    </div>
</div>
