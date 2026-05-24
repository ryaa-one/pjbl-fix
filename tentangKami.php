<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Tentang Kami - EvenTura</title>
    <link rel="stylesheet" type="text/css" href="css/tentangKami.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet" />
  </head>

  <?php
    $navMode = "profile";
    $navActive = "about";
    include 'templates/navbar.php';
  ?>

    <div class="hero-section">
      <img class="gambar-hero" src="assets/images/hero-tentangKami.svg" />
    </div>

    <section class="definisi-website">
      <div class="teks-definisi">
        <p>
          EvenTura, website ini dibuat untuk mampu menjadi jembatan antara
          masyarakat dan wisatawan dalam event daerah Indonesia. Masyarakat
          serta wisatawan dapat<br />
          dengan mudah mengakses informasi mengenai budaya di Indonesia dan
          dapat mengakses jadwal event budaya tersebut melalui platform ini.<br />
        </p>
        <br />
        <p>
          Website ini bertujuan untuk memberikan pengguna informasi yang detail
          dan lengkap mengenai berbagai event di setiap daerah di Indonesia,
          seperti budaya,<br />
          pertunjukan seni tari, teater, dan musik. Memberikan kemudahan bagi
          masyarakat dan wisatawan untuk menemukan dan mengikuti event-event
          yang ada di<br />
          Nusantara sesuai lokasi yang diinginkan oleh masyarakat ataupun
          wisatawan untuk berkunjung.<br />
        </p>
      </div>
    </section>

    <section class="filosofi-kami">
      <h2 class="teks-h2">Filosofi Kami</h2>
      <p>
        Indonesia dikenal sebagai negara yang kaya akan keberagaman budaya dari
        setiap suku bangsa dan tradisi yang tersebar di setiap tempat. Setiap
        daerah pastinya<br />
        memiliki event daerahnya masing-masing. Sayangnya, di era sekarang
        informasi mengenai event event daerah tersebut mulai terpinggirkan dan
        kurang dikenal oleh<br />
        generasi muda saat ini.<br />
      </p>
      <br />
      <p>
        Platform ini dibuat untuk mampu menjadi jembatan antara masyarakat dan
        wisatawan dalam event budaya Indonesia. Masyarakat serta wisatawan dapat
        dengan<br />
        mudah mengakses informasi mengenai event daerah di Indonesia dan dapat
        mengakses jadwal event daerah tersebut melalui platform ini.
      </p>
    </section>

    <section class="proses-kami">
      <h2 class="teks-h2">Proses Kami</h2>
      <section class="all-list">
        <div class="list-gambar">
          <ul>
            <li><img src="assets/images/gambar-au1.png" /></li>
            <li><img src="assets/images/gambar-au2.png" /></li>
            <li><img src="assets/images/gambar-au3.png" /></li>
            <li><img src="assets/images/gambar-au4.png" /></li>
          </ul>
        </div>
        <div class="list-teks">
          <ul>
            <li>
              <p class="one">Pencarian Referensi</p>
              Kami mencari referensi pada website website, diantaranya yaitu Dribbble, Pinterest, dan dari teman-teman.
            </li>
            <li>
              <p class="one">Perencanaan Desain</p>
              Dari referensi yang telah saya dapatkan saya mulai merencanakan mockup yang akan saya pakai untuk website ini.
            </li>
            <li>
              <p class="one">Pelaksanaan Pengerjaan</p>
              Kami mulai mengerjakan mockup website ini setelah perencanaan mockup website yang telah matang
            </li>
            <li>
              <p class="one">Penyelesaian Desain Secara Penuh</p>
              Kami mengerjakan penuh mockup web ini setelah adanya pembetulan pembetulan dari mockup sebelumnya
            </li>
          </ul>
        </div>
      </section>
    </section>

    <?php include("templates/footer.php"); ?>
  </body>
</html>
