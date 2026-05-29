<?php
include 'config/database.php';
include_once 'includes/event_metrics.php';

ensureEventMetricsColumns($koneksi);

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

function getIndexEventImage(array $event): string
{
  return !empty($event['thumnail']) ? $event['thumnail'] : 'assets/images/gambar-tk1.png';
}

function buildIndexEventDescription(?string $description, int $limit = 210): string
{
  $text = trim(strip_tags((string) $description));

  if ($text === '') {
    return 'Deskripsi event belum tersedia.';
  }

  if (strlen($text) <= $limit) {
    return $text;
  }

  return rtrim(substr($text, 0, $limit), " \t\n\r\0\x0B.,") . '...';
}

function getIndexEventViewColumn($koneksi): string
{
  $resultViews = mysqli_query($koneksi, "SHOW COLUMNS FROM events LIKE 'views'");

  if ($resultViews && mysqli_num_rows($resultViews) > 0) {
    return 'views';
  }

  return 'view_count';
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
$popularEventViewColumn = getIndexEventViewColumn($koneksi);
$queryPopularEvents = "
  SELECT
    events.*,
    COALESCE(categories.name, 'Tanpa kategori') AS category_name,
    events.{$popularEventViewColumn} AS total_views
  FROM (
    SELECT *
    FROM events
    ORDER BY {$popularEventViewColumn} DESC, id DESC
    LIMIT 3
  ) AS events
  LEFT JOIN categories ON events.category_id = categories.id
  ORDER BY events.{$popularEventViewColumn} DESC, events.id DESC
";

$resultPopularEvents = mysqli_query($koneksi, $queryPopularEvents);
if ($resultPopularEvents) {
  while ($event = mysqli_fetch_assoc($resultPopularEvents)) {
    $popularEvents[] = $event;
  }
}

$popularEventCount = min(count($popularEvents), 3);

$popularSectionLayouts = [
  [
    'boxes' => ['box1', 'box2', 'box3'],
    'title' => 'event1-title',
    'line' => 'event1-line',
    'desc' => 'event1-desc',
    'stop_desc' => 'stop1',
    'detail' => 'event1-detail',
    'stop_detail' => 'stop2',
  ],
  [
    'boxes' => ['box4', 'box5', 'box6'],
    'title' => 'event2-title',
    'line' => 'event2-line',
    'desc' => 'event2-desc',
    'stop_desc' => 'stop3',
    'detail' => 'event2-detail',
    'stop_detail' => 'stop4',
  ],
  [
    'boxes' => ['box7'],
    'title' => 'event3-title',
    'line' => 'event3-line',
    'desc' => 'event3-desc',
    'stop_desc' => 'stop5',
    'detail' => 'event3-detail',
    'stop_detail' => 'stop6',
  ],
];
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

    <div class="frame-96 frame-96--events-<?= $popularEventCount ?>">
      <div class="populer populer--events-<?= $popularEventCount ?>">
        <!-- Header -->
        <h1 class="title">POPULER</h1>
        <div class="line-horizontal line-left"></div>
        <div class="line-horizontal line-right"></div>
        <div class="line-vertical"></div>

        <?php foreach ($popularEvents as $index => $event): ?>
          <?php
            $layout = $popularSectionLayouts[$index];
            $eventImage = getIndexEventImage($event);
            $eventDate = formatPopularEventDateRange($event['start_date'] ?? null, $event['end_date'] ?? null);
            $eventLocation = !empty($event['location']) ? $event['location'] : 'Lokasi belum tersedia';
          ?>
          <?php foreach ($layout['boxes'] as $boxClass): ?>
            <div class="placeholder-box <?= htmlspecialchars($boxClass) ?>">
              <img
                src="<?= htmlspecialchars($eventImage) ?>"
                alt="<?= htmlspecialchars($event['title']) ?>"
              />
            </div>
          <?php endforeach; ?>

          <div class="event-title <?= htmlspecialchars($layout['title']) ?>">
            <?= htmlspecialchars($event['title']) ?>
          </div>
          <div class="event-line <?= htmlspecialchars($layout['line']) ?>"></div>
          <p class="event-description <?= htmlspecialchars($layout['desc']) ?>">
            <?= htmlspecialchars(buildIndexEventDescription($event['description'] ?? null)) ?>
          </p>
          <div class="full-stop <?= htmlspecialchars($layout['stop_desc']) ?>"></div>
          <p class="event-description <?= htmlspecialchars($layout['detail']) ?>">
            <?= htmlspecialchars($eventDate) ?><br />
            <?= htmlspecialchars($eventLocation) ?>
          </p>
          <div class="full-stop <?= htmlspecialchars($layout['stop_detail']) ?>"></div>
        <?php endforeach; ?>

        <!-- Bottom Line -->
        <div class="line-bottom"></div>
      </div>
    </div>

    <h2 class="eventakandatang">Event Populer</h2>
    <div class="event-grid">
      <?php foreach ($popularEvents as $event): ?>
        <div class="event-card">
          <img
            src="<?= htmlspecialchars(getIndexEventImage($event)) ?>"
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
