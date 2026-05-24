<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" type="image/png" href="assets/images/logo-web.svg" />
    <title>EvenTura</title>
    <link rel="stylesheet" type="text/css" href="css/styleEvenTura.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap"
      rel="stylesheet"
    />
  </head>
  <body>
    <?php $navActive = 'home'; ?>
    <?php include("templates/navbar.php"); ?>

    <div class="hero">
      <h2>
        Jelajahi Keindahan<br />
        Nusantara Melalui Event<br />
        Daerah<br />
      </h2>
      <p>
        Temukan beragam event daerah dari kategori<br />
        budaya hingga seni yang memukau di<br />
        Nusantara<br />
      </p>
      <a href="jelajah.php"><button>Jelajahi Event</button></a>
    </div>

    <div class="kategori-event">
      <p>Kategori Event</p>
      <ul>
        <li>BUDAYA</li>
        <li>MUSIK</li>
        <li>SENI</li>
      </ul>
    </div>

    <div class="frame-96">
      <div class="populer">
        <!-- Header -->
        <h1 class="title">POPULER</h1>
        <div class="line-horizontal line-left"></div>
        <div class="line-horizontal line-right"></div>
        <div class="line-vertical"></div>

        <!-- Event 1: Tari Kecak -->
        <div class="placeholder-box box1">
          <img src="assets/images/gambar-tk1.png" />
        </div>
        <div class="placeholder-box box2">
          <img src="assets/images/gambar-tk2.png" />
        </div>
        <div class="placeholder-box box3">
          <img src="assets/images/gambar-tk3.png" />
        </div>

        <div class="event-title event1-title">Event Tari Kecak</div>
        <div class="event-line event1-line"></div>
        <p class="event-description event1-desc">
          drama tari yang mementaskan kisah epos Ramayana dengan alunan suara
          "cak" dari puluhan penari laki-laki sebagai musik pengiring utama, dan
          diiringi gerakan serta tarian yang memukau.
        </p>
        <div class="full-stop stop1"></div>
        <p class="event-description event1-detail">
          Festival ini dilaksanan setiap hari dengan dua sesi pertunjukkan:
          pukul 18:00-19:00 dan pukul 19:00-20:00 WITA.<br />
          Lokasi paling populernya di Pura Uluwatu.
        </p>
        <div class="full-stop stop2"></div>

        <!-- Event 2: Sawahlunto International Music Festival -->
        <div class="placeholder-box box4">
          <img src="assets/images/gambar-simf1.png" />
        </div>
        <div class="placeholder-box box5">
          <img src="assets/images/gambar-simf2.png" />
        </div>
        <div class="placeholder-box box6">
          <img src="assets/images/gambar-simf3.png" />
        </div>

        <div class="event-title event2-title">
          Sawahlunto International Music Festival
        </div>
        <div class="event-line event2-line"></div>
        <p class="event-description event2-desc">
          festival musik etnik, modern, dan kontemporer, sebagai bagian dari
          perayaan ulang tahun kota dan upaya mempromosikan Sawahlunto sebagai
          kota warisan dunia.
        </p>
        <div class="full-stop stop3"></div>
        <p class="event-description event2-detail">
          Festival ini dilaksanakan pada tanggal 10-11 Oktober 2025, yang
          bertempat di Kota Sawahlunto, Sumatera Barat
        </p>
        <div class="full-stop stop4"></div>

        <!-- Event 3: Art Jog -->
        <div class="placeholder-box box7">
          <img src="assets/images/gambar-aj1.png" />
        </div>

        <div class="event-title event3-title">Art Jog</div>
        <div class="event-line event3-line"></div>
        <p class="event-description event3-desc">
          festival seni rupa kontemporer tahunan internasional yang berfungsi
          sebagai pameran seni, ruang berbagi pengetahuan dan estetika, serta
          ajang untuk mempertemukan seniman, publik, dan berbagai pemangku
          kebijakan.
        </p>
        <div class="full-stop stop5"></div>
        <p class="event-description event3-detail">
          Festival ini dilaksanakan pada tanggal 10-11 Oktober 2025, yang
          bertempat di Kota Sawahlunto, Sumatera Barat
        </p>
        <div class="full-stop stop6"></div>

        <!-- Bottom Line -->
        <div class="line-bottom"></div>
      </div>
    </div>

    <h2 class="eventakandatang">Event Yang Akan Datang</h2>
    <div class="event-grid">
      <div class="event-card">
        <img
          src="https://images.unsplash.com/photo-1533174072545-7a4b6ad7a6c3?w=800&h=800&fit=crop"
          alt="Festival Teluk Tomini"
          class="gambar"
        />
        <div class="event-overlay">
          <span class="kategori">Budaya</span>
          <h2>Festival Teluk Tomini</h2>
          <div class="tanggal">20-22 November 2025</div>
        </div>
      </div>

      <div class="event-card">
        <img
          src="https://images.unsplash.com/photo-1501281668745-f7f57925c3b4?w=800&h=800&fit=crop"
          alt="Ngayogjazz"
          class="gambar"
        />
        <div class="event-overlay">
          <span class="kategori">Musik</span>
          <h2>Ngayogjazz</h2>
          <div class="tanggal">15 November 2025</div>
        </div>
      </div>

      <div class="event-card">
        <img
          src="https://images.unsplash.com/photo-1492684223066-81342ee5ff30?w=800&h=800&fit=crop"
          alt="Festival Nusa Dua"
          class="gambar"
        />
        <div class="event-overlay">
          <span class="kategori">Seni</span>
          <h2>Festival Nusa Dua</h2>
          <div class="tanggal">25-26 Oktober 2025</div>
        </div>
      </div>
    </div>

    <?php include("templates/footer.php"); ?>
  </body>
</html>
