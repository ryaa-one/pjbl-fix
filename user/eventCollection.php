<?php
require_once __DIR__ . '/../includes/auth.php';
require_role('user', '../../login.php');
include __DIR__ . '/../config/database.php';
include_once __DIR__ . '/../includes/event_metrics.php';
include_once __DIR__ . '/../includes/pagination.php';

ensureEventMetricsColumns($koneksi);

$collectionType = $collectionType ?? '';
$isFavouriteCollection = $collectionType === 'favorit';
$table = $isFavouriteCollection ? 'event_favourites' : 'event_likes';
$title = $isFavouriteCollection ? 'Event Favorit' : 'Event Disukai';
$activeMenu = $isFavouriteCollection ? 'favorit' : 'disukai';
$userId = (int) $_SESSION['user_id'];
$page = max(1, (int) ($_GET['page'] ?? 1));
$perPage = getRowsPerPage('user_' . ($isFavouriteCollection ? 'favorites' : 'likes'));
$offset = ($page - 1) * $perPage;
$events = [];
$totalEvents = 0;

function buildCollectionPaginationUrl(int $page): string
{
    $params = $_GET;
    $params['page'] = $page;

    return '?' . http_build_query($params);
}

$stmtCount = mysqli_prepare(
    $koneksi,
    "SELECT COUNT(*) AS total
     FROM {$table}
     INNER JOIN events ON events.id = {$table}.event_id
     WHERE {$table}.user_id = ? AND events.status = 'approved'"
);
if ($stmtCount) {
    mysqli_stmt_bind_param($stmtCount, 'i', $userId);
    mysqli_stmt_execute($stmtCount);
    $countResult = mysqli_stmt_get_result($stmtCount);
    $countRow = $countResult ? mysqli_fetch_assoc($countResult) : null;
    $totalEvents = (int) ($countRow['total'] ?? 0);
    mysqli_stmt_close($stmtCount);
}

$stmtEvents = mysqli_prepare(
    $koneksi,
    "SELECT events.id, events.title, events.start_date, events.location, events.thumnail
     FROM {$table}
     INNER JOIN events ON events.id = {$table}.event_id
     WHERE {$table}.user_id = ? AND events.status = 'approved'
     ORDER BY {$table}.id DESC
     LIMIT ? OFFSET ?"
);
if ($stmtEvents) {
    mysqli_stmt_bind_param($stmtEvents, 'iii', $userId, $perPage, $offset);
    mysqli_stmt_execute($stmtEvents);
    $resultEvents = mysqli_stmt_get_result($stmtEvents);
    while ($resultEvents && $event = mysqli_fetch_assoc($resultEvents)) {
        $events[] = $event;
    }
    mysqli_stmt_close($stmtEvents);
}

$totalPages = max(1, (int) ceil($totalEvents / $perPage));
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= htmlspecialchars($title) ?> - EvenTura</title>
  <link rel="stylesheet" href="../../css/event.css">
  <link rel="stylesheet" href="../../css/eventCollection.css">
</head>
<body>
<?php include __DIR__ . '/../templates/navbar.php'; ?>
<div class="admin-layout">
  <?php $adminActive = $activeMenu; include __DIR__ . '/../templates/userSidebar.php'; ?>
  <main class="admin-content">
    <div class="admin-page-header events-header"><h1 class="admin-page-title"><?= htmlspecialchars($title) ?></h1></div>
    <form class="rows-per-page-form" method="get" action="">
      <?php renderRowsPerPageSelect($perPage); ?>
      <button class="admin-button admin-button--secondary admin-toolbar__button" type="submit">Terapkan</button>
    </form>
    <?php if ($events): ?>
      <div class="collection-grid">
        <?php foreach ($events as $event): ?>
          <article class="collection-card">
            <a class="collection-card__image-link" href="../../detailEvent.php?id=<?= (int) $event['id'] ?>">
              <img
                class="collection-card__image"
                src="../../<?= htmlspecialchars($event['thumnail'] ?: 'assets/images/hero-event.svg') ?>"
                alt="<?= htmlspecialchars($event['title']) ?>"
              >
            </a>
            <div class="collection-card__body">
              <span class="collection-card__badge"><?= htmlspecialchars($isFavouriteCollection ? 'Favorit' : 'Disukai') ?></span>
              <h2 class="collection-card__title">
                <a href="../../detailEvent.php?id=<?= (int) $event['id'] ?>"><?= htmlspecialchars($event['title']) ?></a>
              </h2>
              <div class="collection-card__meta">
                <p><span aria-hidden="true">&#128197;</span><?= htmlspecialchars(date('d M Y', strtotime($event['start_date']))) ?></p>
                <p><span aria-hidden="true">&#128205;</span><?= htmlspecialchars($event['location']) ?></p>
              </div>
              <a class="collection-card__button" href="../../detailEvent.php?id=<?= (int) $event['id'] ?>">Lihat Detail</a>
            </div>
          </article>
        <?php endforeach; ?>
      </div>
    <?php else: ?>
      <div class="collection-empty">Belum ada <?= strtolower(htmlspecialchars($title)) ?>.</div>
    <?php endif; ?>
    <?php if ($totalPages > 1): ?>
      <nav class="admin-pagination" aria-label="Pagination">
        <?php for ($paginationPage = 1; $paginationPage <= $totalPages; $paginationPage++): ?>
          <a class="admin-pagination__link<?= $paginationPage === $page ? ' is-active' : '' ?>" href="<?= htmlspecialchars(buildCollectionPaginationUrl($paginationPage)) ?>"><?= $paginationPage ?></a>
        <?php endfor; ?>
      </nav>
    <?php endif; ?>
  </main>
</div>
</body>
</html>
