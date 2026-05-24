<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Event Favorit - EvenTura</title>
    <link rel="stylesheet" type="text/css" href="css/eventfavorit.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet" />
  </head>
  <body>

  <?php
    $navMode = "profile";
    include 'templates/navbar.php';
  ?>

    <section class="all-frame">
      <!-- CARD-PROFIL -->
      <section class="card-profil">
        <div class="foto-profil">
          <img src="assets/images/foto-profil.svg" />
        </div>
        <div class="teks-profil">
          <h2 class="nama-profil">Fadiyah</h2>
          <p class="deskripsi-profil">Penggemar Seni dan Budaya</p>
          <p class="jenis-akun">pengguna</p>
        </div>
        <a href="#"><div class="button-profil"><p class="edit-profil">Edit Profil</p></div></a>
        <a href="#"><div class="container-logout">
          <p class="logo-logout"><img src="assets/images/logo-logout.svg" /></p>
          <a href="process/logout.php"><p class="teks-logout">Logout</p></a>
        </div></a>
      </section>

      <!-- KONTEN UTAMA -->
      <section class="main-content">
        <section class="container">
          <!-- NAVIGATION ATAS -->
          <div class="navigation">
            <div class="nav-item active"><a href="eventfavorit.php">Event Favorit</a></div>
            <div class="nav-item"><a href="eventYangDisukai.php">Event Yang Disukai</a></div>
            <div class="nav-item"><a href="pengaturanAkun.php">Pengaturan Akun</a></div>
          </div>

          <div class="event-section">
            <h1 class="section-title">Event Favorit</h1>

            <div class="card">
              <div class="card-img"><img src="assets/images/gambar-ef1.png" /></div>
              <div class="card-content">
                <span class="category">Budaya</span>
                <h2 class="card-title">Tari Kecak</h2>
                <p class="card-desc">Ikuti keindahan tarian tradisional dari berbagai daerah di Nusantara.</p>
                <button class="btn-detail">Lihat Detail</button>
              </div>
              <div class="icon"><img src="assets/images/logo-favorit.svg" /></div>
            </div>

            <div class="card">
              <div class="card-img"><img src="assets/images/gambar-ef2.png" /></div>
              <div class="card-content">
                <span class="category">Musik</span>
                <h2 class="card-title">Solo Keroncong Festival</h2>
                <p class="card-desc">Nikmati alunan musik etnik yang memukau dari berbagai suku di Nusantara.</p>
                <button class="btn-detail">Lihat Detail</button>
              </div>
              <div class="icon"><img src="assets/images/logo-favorit.svg" /></div>
            </div>

            <div class="card">
              <div class="card-img"><img src="assets/images/gambar-ef3.png" /></div>
              <div class="card-content">
                <span class="category">Seni</span>
                <h2 class="card-title">ARTJOG</h2>
                <p class="card-desc">Saksikan karya seni rupa dari seniman-seniman berbakat di seluruh Nusantara.</p>
                <button class="btn-detail">Lihat Detail</button>
              </div>
              <div class="icon"><img src="assets/images/logo-favorit.svg" /></div>
            </div>
          </div>
        </section>
      </section>
    </section>

    <?php include("templates/footer.php"); ?>
  </body>
</html>
