<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Event Yang Disukai - EvenTura</title>
    <link rel="stylesheet" type="text/css" href="css/eventYangDisukai.css" />
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
        <div class="foto-profil"><img src="assets/images/foto-profil.svg" /></div>
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
          <div class="navigation">
            <div class="nav-item"><a href="eventfavorit.php">Event Favorit</a></div>
            <div class="nav-item active"><a href="eventYangDisukai.php">Event Yang Disukai</a></div>
            <div class="nav-item"><a href="pengaturanAkun.php">Pengaturan Akun</a></div>
          </div>

          <div class="event-section">
            <h1 class="section-title">Event Yang Disukai</h1>
          </div>

          <div class="card-container">
            <div class="card">
              <div class="card-image"><img src="assets/images/gambar-eyd1.png" /></div>
              <div class="card-text"><h3>Gandrung Sewu</h3><p>Banyuwangi, 23 Oktober 2025</p></div>
            </div>
            <div class="card">
              <div class="card-image"><img src="assets/images/gambar-eyd2.png" /></div>
              <div class="card-text"><h3>Sawahlunto Internasional..</h3><p>Sawahlunto, 10 Oktober 2025</p></div>
            </div>
            <div class="card">
              <div class="card-image"><img src="assets/images/gambar-eyd3.png" /></div>
              <div class="card-text"><h3>Art Jakarta</h3><p>Jakarta, 3 Oktober 2025</p></div>
            </div>
          </div>
        </section>
      </section>
    </section>

    <?php include("templates/footer.php"); ?>
  </body>
</html>
