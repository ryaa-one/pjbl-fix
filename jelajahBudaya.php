<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>EvenTura</title>
    <link rel="stylesheet" type="text/css" href="css/jelajah.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet" />
  </head>

  <?php
    $navMode = "profile";
    $navActive = "event";
    include 'templates/navbar.php';
  ?>

    <section class="hero">
      <h2>Jelajahi Keindahan Nusantara Melalui Event Daerah</h2>
      <p>Temukan berbagai event daerah dari kategori budaya hingga seni yang memukau di Nusantara</p>
    </section>

    <div class="header">
      <div class="search-bar">
        <input type="text" placeholder="Cari event..." />
      </div>
      <div class="filter-group">
        <a href="jelajah.php"><button class="filter-btn">Semua</button></a>
        <a href="jelajahBudaya.php"><button class="filter-btn active">Budaya</button></a>
        <a href="jelajahMusik.php"><button class="filter-btn">Musik</button></a>
        <a href="jelajahSeni.php"><button class="filter-btn">Seni</button></a>
      </div>
    </div>

    <div class="event-grid">
      <a href="detailEvent.php">
      <div class="event-card">
        <img src="assets/images/tk1.png" />
        <div class="event-content">
          <h3 class="event-title">Tari Kecak</h3>
          <p class="event-info">Setiap hari, 18:00-20:00 - Bali</p>
          <div class="event-header">
            <span class="category">Budaya</span>
            <span class="detail-link">Lihat Detail</span>
          </div>
        </div>
      </div></a>

      <a href="detailEvent.php">
      <div class="event-card">
        <img src="assets/images/gandrungSewu.jpeg" />
        <div class="event-content">
          <h3 class="event-title">Gandrung Sewu</h3>
          <p class="event-info">Oktober 2025 - Banyuwangi</p>
          <div class="event-header">
            <span class="category">Budaya</span>
            <span class="detail-link">Lihat Detail</span>
          </div>
        </div>
      </div></a>

      <a href="detailEvent.php">
      <div class="event-card">
        <img src="assets/images/PerangTopat.jpg" />
        <div class="event-content">
          <h3 class="event-title">Perang Topat</h3>
          <p class="event-info">29 November 2025 - Lombok Barat</p>
          <div class="event-header">
            <span class="category">Budaya</span>
            <span class="detail-link">Lihat Detail</span>
          </div>
        </div>
      </div></a>
    </div>

    <?php include("templates/footer.php"); ?>
  </body>
</html>
