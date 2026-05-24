<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>EvenTura</title>
  <link rel="stylesheet" type="text/css" href="css/detailEvent.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
</head>
<body>

<?php
    $navActive = "event";
    include 'templates/navbar.php';
?>

  <section class="event">
    <div class="event-header">
      <a href="jelajah.php"><span class="event-label">Event </span></a>
      <span class="event-title">Tari Kecak</span>
    </div>
    <div class="event-gallery-top">
      <div class="gallery-main-wrapper">
        <img src="assets/images/tk1.png" class="gallery-main" alt="Tari Kecak utama">
        <button class="gallery-like" type="button" aria-label="Simpan ke favorit">♡</button>
      </div>

      <div class="gallery-right">
        <div class="gallery-right-item">
          <img src="assets/images/tk2.jpg" class="gallery-sub" alt="Suasana pertunjukan Tari Kecak">
        </div>
        <div class="gallery-right-item">
          <img src="assets/images/tk3.jpg" class="gallery-sub" alt="Penari Tari Kecak">
        </div>
      </div>
    </div>
  </section>

  <div class="content-wrapper">
    <div class="detail-content">
      <h1>Tari Kecak</h1>
      <p>Tari Kecak adalah pertunjukan drama tari khas Bali yang mengangkat kisah Ramayana.
        Tarian ini ditarikan oleh puluhan penari laki-laki yang duduk secara melingkar.
        Mereka menyerukan "cak cak cak" sambil mengangkat kedua lengan.
        Pada satu segmen, mereka menirukan adegan saat barisan kera membantu Rama dalam pertempuran melawan Rahwana yang menculik Dewi Sita.</p>
    </div>
    <div class="sidebar">
      <button class="btn btn-fav">Tambahkan ke Favorit</button>
      <button class="btn btn-share">
        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
          <circle cx="18" cy="5" r="3"></circle>
          <circle cx="6" cy="12" r="3"></circle>
          <circle cx="18" cy="19" r="3"></circle>
          <line x1="8.59" y1="13.51" x2="15.42" y2="17.49"></line>
          <line x1="15.41" y1="6.51" x2="8.59" y2="10.49"></line>
        </svg>
        Bagikan
      </button>
    </div>
  </div>

  <div class="divider"></div>

  <div class="info-gallery-container">
    <div class="carousel-wrapper">
      <div class="event-gallery">
        <button class="carousel-btn carousel-btn-prev" onclick="prevSlide()">❮</button>
        <img id="slider" src="assets/images/tk1.png" alt="Event Gallery">
        <button class="carousel-btn carousel-btn-next" onclick="nextSlide()">❯</button>
      </div>
      <div class="slider-dots" id="sliderDots"></div>
    </div>
    <div class="info-boxes">
      <div class="info-box">
        <h3><span class="info-icon">◷</span>Tanggal & Waktu</h3>
        <p><strong>Setiap Hari</strong></p>
        <p class="info-highlight">18:00-19:00 WITA</p>
        <p class="info-highlight">19:00-20:00 WITA</p>
      </div>
      <div class="info-box">
        <h3><span class="info-icon">◉</span>Lokasi</h3>
        <p><strong>Pura Uluwatu, Pantai Melasti</strong></p>
        <p>Bali, Indonesia</p>
      </div>
    </div>
  </div>

  <div class="reviews">
    <h2>Ulasan</h2>
    <form>
      <div class="review-card">
        <div class="review-header">
          <div class="review-user">
            <div class="review-avatar"></div>
              <div class="review-info">
                <h4>Naufal</h4>
              <p class="review-tgl">7 Agustus 2021</p>
            </div>
          </div>
          <div class="stars">★★★★★</div>
        </div>
          <textarea class="input-review" placeholder="Tulis ulasan anda"></textarea>
          <button class="btn-submit" type="submit" name="submit-review">Kirim Ulasan</button>
      </div>
    </form>
    <div class="review-card">
      <div class="review-header">
        <div class="review-user">
          <div class="review-avatar"></div>
          <div class="review-info">
            <h4>Naufal</h4>
            <p class="review-tgl">7 Agustus 2021</p>
          </div>
        </div>
        <div class="stars">★★★★★</div>
      </div>
      <p class="review-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
    </div>
    <div class="review-card">
      <div class="review-header">
        <div class="review-user">
          <div class="review-avatar"></div>
          <div class="review-info">
            <h4>Nar</h4>
            <p class="review-tgl">7 Agustus 2021</p>
          </div>
        </div>
        <div class="stars">★★★★★</div>
      </div>
      <p class="review-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
    </div>
    <div class="review-card">
      <div class="review-header">
        <div class="review-user">
          <div class="review-avatar"></div>
          <div class="review-info">
            <h4>Zidan</h4>
            <p class="review-tgl">7 Agustus 2021</p>
          </div>
        </div>
        <div class="stars">★★★★★</div>
      </div>
      <p class="review-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
    </div>
  </div>

  <?php include("templates/footer.php"); ?>
  <script src="js/gallery.js"></script>
</body>
</html>
