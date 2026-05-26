<?php
include 'config/database.php';

function formatPopularEventDateRange(?string $startDate, ?string $endDate): string
{
  if (empty($startDate)) {
    return 'Tanggal belum tersedia';
  }

  if (!empty($endDate) && $endDate !== $startDate) {
    return $startDate . ' - ' . $endDate;
  }

  return $startDate;
}

function buildIndexCategoryUrl(int $categoryId): string
{
  return 'jelajah.php?category=' . urlencode((string) $categoryId);
}

$indexCategories = [];
$queryIndexCategories = "
  SELECT
    categories.id,
    categories.name,
    COUNT(events.id) AS total_events
  FROM categories
  INNER JOIN events ON events.category_id = categories.id
  GROUP BY categories.id, categories.name
  HAVING COUNT(events.id) > 0
  ORDER BY categories.name ASC
";

$resultIndexCategories = mysqli_query($koneksi, $queryIndexCategories);
if ($resultIndexCategories) {
  while ($category = mysqli_fetch_assoc($resultIndexCategories)) {
    $indexCategories[] = [
      'id' => (int) $category['id'],
      'name' => $category['name'],
    ];
  }
}

$popularEvents = [];
$queryPopularEvents = "
  SELECT
    events.id,
    events.title,
    events.start_date,
    events.end_date,
    events.thumnail,
    COALESCE(categories.name, 'Tanpa kategori') AS category_name,
    COUNT(event_likes.id) AS total_likes
  FROM events
  LEFT JOIN categories ON events.category_id = categories.id
  LEFT JOIN event_likes ON event_likes.event_id = events.id
  GROUP BY
    events.id,
    events.title,
    events.start_date,
    events.end_date,
    events.thumnail,
    categories.name
  ORDER BY total_likes DESC, events.id DESC
  LIMIT 3
";

$resultPopularEvents = mysqli_query($koneksi, $queryPopularEvents);
if ($resultPopularEvents) {
  while ($event = mysqli_fetch_assoc($resultPopularEvents)) {
    $popularEvents[] = $event;
  }
}
?>
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
        <?php foreach ($indexCategories as $category): ?>
          <li>
            <a href="<?= htmlspecialchars(buildIndexCategoryUrl($category['id'])) ?>">
              <?= htmlspecialchars(strtoupper($category['name'])) ?>
            </a>
          </li>
        <?php endforeach; ?>
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

    <h2 class="eventakandatang">Event Populer</h2>
    <div class="event-grid">
      <?php foreach ($popularEvents as $event): ?>
        <div class="event-card">
          <img
            src="<?= htmlspecialchars(!empty($event['thumnail']) ? $event['thumnail'] : 'assets/images/gambar-tk1.png') ?>"
            alt="<?= htmlspecialchars($event['title']) ?>"
            class="gambar"
          />
          <div class="event-overlay">
            <span class="kategori"><?= htmlspecialchars($event['category_name']) ?></span>
            <h2><?= htmlspecialchars($event['title']) ?></h2>
            <div class="tanggal"><?= htmlspecialchars(formatPopularEventDateRange($event['start_date'] ?? null, $event['end_date'] ?? null)) ?></div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>

    <?php include("templates/footer.php"); ?>
  </body>
</html>
