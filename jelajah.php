<?php
include 'config/database.php';

$activeCategoryId = isset($_GET['category']) ? (int) $_GET['category'] : 0;
$search = trim($_GET['search'] ?? '');

function formatEventDateRange(?string $startDate, ?string $endDate): string
{
    if (empty($startDate)) {
        return 'Tanggal belum tersedia';
    }

    if (!empty($endDate) && $endDate !== $startDate) {
        return $startDate . ' - ' . $endDate;
    }

    return $startDate;
}

function buildJelajahUrl(int $categoryId = 0, string $search = ''): string
{
    $params = [];

    if ($categoryId > 0) {
        $params['category'] = $categoryId;
    }

    if ($search !== '') {
        $params['search'] = $search;
    }

    if (empty($params)) {
        return 'jelajah.php';
    }

    return 'jelajah.php?' . http_build_query($params);
}

$categories = [];
$resultCategories = mysqli_query(
    $koneksi,
    "
    SELECT categories.id, categories.name, COUNT(events.id) AS total_events
    FROM categories
    INNER JOIN events ON events.category_id = categories.id
    GROUP BY categories.id, categories.name
    HAVING COUNT(events.id) > 0
    ORDER BY categories.name ASC
    "
);
if ($resultCategories) {
    while ($category = mysqli_fetch_assoc($resultCategories)) {
        $categories[] = [
            'id' => (int) $category['id'],
            'name' => $category['name'],
        ];
    }
}

$queryEvents = "
    SELECT
        events.id,
        events.title,
        events.start_date,
        events.end_date,
        events.location,
        events.thumnail,
        COALESCE(categories.id, 0) AS category_id,
        COALESCE(categories.name, 'Tanpa kategori') AS category_name,
        COALESCE(cities.name, '-') AS city_name
    FROM events
    LEFT JOIN categories ON events.category_id = categories.id
    LEFT JOIN cities ON events.city_id = cities.id
";

$conditions = [];
$bindTypes = '';
$bindValues = [];

if ($activeCategoryId > 0) {
    $conditions[] = "events.category_id = ?";
    $bindTypes .= 'i';
    $bindValues[] = $activeCategoryId;
}

if ($search !== '') {
    $conditions[] = "(
        LOWER(events.title) LIKE LOWER(?)
        OR LOWER(COALESCE(categories.name, '')) LIKE LOWER(?)
        OR LOWER(COALESCE(cities.name, '')) LIKE LOWER(?)
        OR LOWER(events.location) LIKE LOWER(?)
    )";
    $searchLike = '%' . $search . '%';
    $bindTypes .= 'ssss';
    $bindValues[] = $searchLike;
    $bindValues[] = $searchLike;
    $bindValues[] = $searchLike;
    $bindValues[] = $searchLike;
}

if (!empty($conditions)) {
    $queryEvents .= ' WHERE ' . implode(' AND ', $conditions);
}

$queryEvents .= " ORDER BY events.start_date ASC, events.id DESC";

if (!empty($bindValues)) {
    $stmtEvents = mysqli_prepare($koneksi, $queryEvents);
    if ($stmtEvents) {
        mysqli_stmt_bind_param($stmtEvents, $bindTypes, ...$bindValues);
        mysqli_stmt_execute($stmtEvents);
        $resultEvents = mysqli_stmt_get_result($stmtEvents);
    } else {
        $resultEvents = false;
    }
} else {
    $resultEvents = mysqli_query($koneksi, $queryEvents);
}

$events = [];
if ($resultEvents) {
    while ($event = mysqli_fetch_assoc($resultEvents)) {
        $events[] = $event;
    }
}

if (isset($stmtEvents) && $stmtEvents) {
    mysqli_stmt_close($stmtEvents);
}
?>
<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>EvenTura</title>
    <link rel="stylesheet" type="text/css" href="css/jelajah.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet" />
  </head>
  <body>
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
      <form class="search-bar" method="get" action="jelajah.php">
        <?php if ($activeCategoryId > 0): ?>
          <input type="hidden" name="category" value="<?= htmlspecialchars((string) $activeCategoryId) ?>" />
        <?php endif; ?>
        <input
          type="search"
          name="search"
          value="<?= htmlspecialchars($search) ?>"
          placeholder="Cari event, kategori, kota, atau lokasi..."
        />
        <button class="search-button" type="submit">Cari</button>
      </form>
      <div class="filter-group">
        <a href="<?= htmlspecialchars(buildJelajahUrl(0, $search)) ?>" class="filter-btn<?= $activeCategoryId === 0 ? ' active' : '' ?>">Semua</a>
        <?php foreach ($categories as $category): ?>
          <a
            href="<?= htmlspecialchars(buildJelajahUrl($category['id'], $search)) ?>"
            class="filter-btn<?= $activeCategoryId === $category['id'] ? ' active' : '' ?>"
          >
            <?= htmlspecialchars($category['name']) ?>
          </a>
        <?php endforeach; ?>
      </div>
    </div>

    <div class="search-meta">
      <?= count($events) ?> event<?= count($events) !== 1 ? 's' : '' ?> ditemukan
      <?php if ($search !== ''): ?>
        untuk kata kunci "<?= htmlspecialchars($search) ?>"
      <?php endif; ?>
    </div>

    <?php if (!empty($events)): ?>
      <div class="event-grid">
        <?php foreach ($events as $event): ?>
          <?php
            $thumbnail = !empty($event['thumnail']) ? $event['thumnail'] : 'assets/images/hero-event.svg';
            $eventInfo = formatEventDateRange($event['start_date'] ?? null, $event['end_date'] ?? null) . ' - ' . ($event['city_name'] ?: '-');
          ?>
          <a class="event-card-link" href="detailEvent.php?id=<?= urlencode((string) $event['id']) ?>">
            <div class="event-card">
              <img src="<?= htmlspecialchars($thumbnail) ?>" alt="<?= htmlspecialchars($event['title']) ?>" />
              <div class="event-content">
                <h3 class="event-title"><?= htmlspecialchars($event['title']) ?></h3>
                <p class="event-info"><?= htmlspecialchars($eventInfo) ?></p>
                <div class="event-header">
                  <span class="category"><?= htmlspecialchars($event['category_name']) ?></span>
                  <span class="detail-link">Lihat Detail</span>
                </div>
              </div>
            </div>
          </a>
        <?php endforeach; ?>
      </div>
    <?php else: ?>
      <div class="empty-events">
        Tidak ada event yang cocok dengan filter atau pencarian ini.
      </div>
    <?php endif; ?>

    <?php include("templates/footer.php"); ?>
  </body>
</html>
