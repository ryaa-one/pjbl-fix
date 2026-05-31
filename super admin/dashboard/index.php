<?php
$currentLevel = "super_admin";
include '../../process/checkAuth.php';
include '../../config/database.php';
include_once '../../includes/event_metrics.php';

ensureEventMetricsColumns($koneksi);
ensureEventEngagementColumns($koneksi);

$currentAdminId = isset($_SESSION['user_id']) ? (int) $_SESSION['user_id'] : 0;
$totalFavourites = 0;
$totalLikes = 0;
$totalViews = 0;
$likesChartLabels = [];
$likesChartValues = [];
$likesLast30Days = 0;
$likesPrevious30Days = 0;
$dashboardEventPage = isset($_GET['event_page']) ? max(1, (int) $_GET['event_page']) : 1;
$dashboardEventPerPage = 10;
$totalDashboardEvents = 0;
$dashboardEvents = [];

function buildDashboardEventPaginationUrl(int $page): string
{
    $params = $_GET;
    $params['event_page'] = $page;

    return 'index.php?' . http_build_query($params);
}

$labelsByDate = [];
$valuesByDate = [];

for ($dayOffset = 29; $dayOffset >= 0; $dayOffset--) {
    $dateKey = date('Y-m-d', strtotime("-{$dayOffset} days"));
    $labelsByDate[$dateKey] = date('d M', strtotime($dateKey));
    $valuesByDate[$dateKey] = 0;
}

$stmtDashboardTotals = mysqli_prepare(
    $koneksi,
    "
    SELECT
        COALESCE(SUM(events.view_count), 0) AS total_views,
        (
            SELECT COUNT(*)
            FROM event_likes
            INNER JOIN events AS liked_events ON liked_events.id = event_likes.event_id
            WHERE liked_events.user_id = ?
        ) AS total_likes,
        (
            SELECT COUNT(*)
            FROM event_favourites
            INNER JOIN events AS favourite_events ON favourite_events.id = event_favourites.event_id
            WHERE favourite_events.user_id = ?
        ) AS total_favourites
    FROM events
    WHERE events.user_id = ?
    "
);

if ($stmtDashboardTotals) {
    mysqli_stmt_bind_param($stmtDashboardTotals, 'iii', $currentAdminId, $currentAdminId, $currentAdminId);
    mysqli_stmt_execute($stmtDashboardTotals);
    $dashboardTotalsResult = mysqli_stmt_get_result($stmtDashboardTotals);
    $dashboardTotals = $dashboardTotalsResult ? mysqli_fetch_assoc($dashboardTotalsResult) : null;
    mysqli_stmt_close($stmtDashboardTotals);

    if ($dashboardTotals) {
        $totalFavourites = (int) ($dashboardTotals['total_favourites'] ?? 0);
        $totalLikes = (int) ($dashboardTotals['total_likes'] ?? 0);
        $totalViews = (int) ($dashboardTotals['total_views'] ?? 0);
    }
}

$stmtLikesCurrent = mysqli_prepare(
    $koneksi,
    "
    SELECT COUNT(*) AS total
    FROM event_likes
    INNER JOIN events ON events.id = event_likes.event_id
    WHERE events.user_id = ?
      AND DATE(event_likes.created_at) >= DATE_SUB(CURDATE(), INTERVAL 29 DAY)
    "
);

if ($stmtLikesCurrent) {
    mysqli_stmt_bind_param($stmtLikesCurrent, 'i', $currentAdminId);
    mysqli_stmt_execute($stmtLikesCurrent);
    $likesCurrentResult = mysqli_stmt_get_result($stmtLikesCurrent);
    $likesCurrentRow = $likesCurrentResult ? mysqli_fetch_assoc($likesCurrentResult) : null;
    $likesLast30Days = (int) ($likesCurrentRow['total'] ?? 0);
    mysqli_stmt_close($stmtLikesCurrent);
}

$stmtLikesPrevious = mysqli_prepare(
    $koneksi,
    "
    SELECT COUNT(*) AS total
    FROM event_likes
    INNER JOIN events ON events.id = event_likes.event_id
    WHERE events.user_id = ?
      AND DATE(event_likes.created_at) >= DATE_SUB(CURDATE(), INTERVAL 59 DAY)
      AND DATE(event_likes.created_at) < DATE_SUB(CURDATE(), INTERVAL 29 DAY)
    "
);

if ($stmtLikesPrevious) {
    mysqli_stmt_bind_param($stmtLikesPrevious, 'i', $currentAdminId);
    mysqli_stmt_execute($stmtLikesPrevious);
    $likesPreviousResult = mysqli_stmt_get_result($stmtLikesPrevious);
    $likesPreviousRow = $likesPreviousResult ? mysqli_fetch_assoc($likesPreviousResult) : null;
    $likesPrevious30Days = (int) ($likesPreviousRow['total'] ?? 0);
    mysqli_stmt_close($stmtLikesPrevious);
}

$stmtLikesChart = mysqli_prepare(
    $koneksi,
    "
    SELECT DATE(event_likes.created_at) AS like_date, COUNT(*) AS total_likes
    FROM event_likes
    INNER JOIN events ON events.id = event_likes.event_id
    WHERE events.user_id = ?
      AND DATE(event_likes.created_at) >= DATE_SUB(CURDATE(), INTERVAL 29 DAY)
    GROUP BY DATE(event_likes.created_at)
    ORDER BY like_date ASC
    "
);

if ($stmtLikesChart) {
    mysqli_stmt_bind_param($stmtLikesChart, 'i', $currentAdminId);
    mysqli_stmt_execute($stmtLikesChart);
    $likesChartResult = mysqli_stmt_get_result($stmtLikesChart);

    if ($likesChartResult) {
        while ($chartRow = mysqli_fetch_assoc($likesChartResult)) {
            $dateKey = $chartRow['like_date'];
            if (isset($valuesByDate[$dateKey])) {
                $valuesByDate[$dateKey] = (int) $chartRow['total_likes'];
            }
        }
    }

    mysqli_stmt_close($stmtLikesChart);
}

$likesChartLabels = array_values($labelsByDate);
$likesChartValues = array_values($valuesByDate);

$trendPercentage = 0;
if ($likesPrevious30Days > 0) {
    $trendPercentage = (($likesLast30Days - $likesPrevious30Days) / $likesPrevious30Days) * 100;
} elseif ($likesLast30Days > 0) {
    $trendPercentage = 100;
}

$trendPrefix = $trendPercentage >= 0 ? '+' : '-';
$trendLabel = '~ ' . $trendPrefix . abs((int) round($trendPercentage)) . '%';

$stmtDashboardEventCount = mysqli_prepare(
    $koneksi,
    "
    SELECT COUNT(*) AS total
    FROM events
    WHERE events.user_id = ?
    "
);

if ($stmtDashboardEventCount) {
    mysqli_stmt_bind_param($stmtDashboardEventCount, 'i', $currentAdminId);
    mysqli_stmt_execute($stmtDashboardEventCount);
    $dashboardEventCountResult = mysqli_stmt_get_result($stmtDashboardEventCount);
    $dashboardEventCountRow = $dashboardEventCountResult ? mysqli_fetch_assoc($dashboardEventCountResult) : null;
    $totalDashboardEvents = (int) ($dashboardEventCountRow['total'] ?? 0);
    mysqli_stmt_close($stmtDashboardEventCount);
}

$totalDashboardEventPages = max(1, (int) ceil($totalDashboardEvents / $dashboardEventPerPage));
if ($dashboardEventPage > $totalDashboardEventPages) {
    $dashboardEventPage = $totalDashboardEventPages;
}

$dashboardEventOffset = ($dashboardEventPage - 1) * $dashboardEventPerPage;
$stmtDashboardEvents = mysqli_prepare(
    $koneksi,
    "
    SELECT
        events.id,
        events.title,
        COALESCE(categories.name, 'Tanpa kategori') AS category,
        events.start_date,
        COALESCE(events.view_count, 0) AS view_count,
        COUNT(DISTINCT event_likes.id) AS total_likes,
        COUNT(DISTINCT event_favourites.id) AS total_favourites
    FROM events
    LEFT JOIN categories ON categories.id = events.category_id
    LEFT JOIN event_likes ON event_likes.event_id = events.id
    LEFT JOIN event_favourites ON event_favourites.event_id = events.id
    WHERE events.user_id = ?
    GROUP BY events.id, events.title, categories.name, events.start_date, events.view_count
    ORDER BY events.start_date DESC, events.id DESC
    LIMIT ? OFFSET ?
    "
);

if ($stmtDashboardEvents) {
    mysqli_stmt_bind_param($stmtDashboardEvents, 'iii', $currentAdminId, $dashboardEventPerPage, $dashboardEventOffset);
    mysqli_stmt_execute($stmtDashboardEvents);
    $dashboardEventsResult = mysqli_stmt_get_result($stmtDashboardEvents);

    if ($dashboardEventsResult) {
        while ($event = mysqli_fetch_assoc($dashboardEventsResult)) {
            $dashboardEvents[] = $event;
        }
    }

    mysqli_stmt_close($stmtDashboardEvents);
}

$totalUsers = 0;
$totalAdmins = 0;
$totalEvents = 0;
$totalReviews = 0;
$popularEvents = [];
$topAdmins = [];
$dashboardEvents = [];

$summaryResult = mysqli_query(
    $koneksi,
    "
    SELECT
        (SELECT COUNT(*) FROM users WHERE level = 'user') AS total_users,
        (SELECT COUNT(*) FROM users WHERE level = 'admin') AS total_admins,
        (SELECT COUNT(*) FROM events) AS total_events,
        (SELECT COUNT(*) FROM event_reviews) AS total_reviews
    "
);
$summaryRow = $summaryResult ? mysqli_fetch_assoc($summaryResult) : null;
if ($summaryRow) {
    $totalUsers = (int) ($summaryRow['total_users'] ?? 0);
    $totalAdmins = (int) ($summaryRow['total_admins'] ?? 0);
    $totalEvents = (int) ($summaryRow['total_events'] ?? 0);
    $totalReviews = (int) ($summaryRow['total_reviews'] ?? 0);
}

$popularResult = mysqli_query(
    $koneksi,
    "
    SELECT
        events.id,
        events.title,
        COALESCE(users.name, 'Tanpa admin') AS admin_name,
        COALESCE(events.view_count, 0) AS view_count,
        COUNT(DISTINCT event_likes.id) AS total_likes,
        COUNT(DISTINCT event_favourites.id) AS total_favourites
    FROM events
    LEFT JOIN users ON users.id = events.user_id
    LEFT JOIN event_likes ON event_likes.event_id = events.id
    LEFT JOIN event_favourites ON event_favourites.event_id = events.id
    GROUP BY events.id, events.title, users.name, events.view_count
    ORDER BY view_count DESC, total_likes DESC, total_favourites DESC, events.id DESC
    LIMIT 5
    "
);
if ($popularResult) {
    while ($row = mysqli_fetch_assoc($popularResult)) {
        $popularEvents[] = $row;
    }
}

$topAdminResult = mysqli_query(
    $koneksi,
    "
    SELECT users.id, users.name, users.email, COUNT(events.id) AS total_events
    FROM users
    LEFT JOIN events ON events.user_id = users.id
    WHERE users.level = 'admin'
    GROUP BY users.id, users.name, users.email
    ORDER BY total_events DESC, users.name ASC
    LIMIT 5
    "
);
if ($topAdminResult) {
    while ($row = mysqli_fetch_assoc($topAdminResult)) {
        $topAdmins[] = $row;
    }
}

$totalDashboardEvents = $totalEvents;
$totalDashboardEventPages = max(1, (int) ceil($totalDashboardEvents / $dashboardEventPerPage));
if ($dashboardEventPage > $totalDashboardEventPages) {
    $dashboardEventPage = $totalDashboardEventPages;
}
$dashboardEventOffset = ($dashboardEventPage - 1) * $dashboardEventPerPage;
$latestResult = mysqli_query(
    $koneksi,
    "
    SELECT
        events.id,
        events.title,
        COALESCE(categories.name, 'Tanpa kategori') AS category,
        COALESCE(users.name, 'Tanpa admin') AS admin_name,
        events.start_date,
        COALESCE(events.view_count, 0) AS view_count,
        COUNT(DISTINCT event_likes.id) AS total_likes,
        COUNT(DISTINCT event_favourites.id) AS total_favourites
    FROM events
    LEFT JOIN categories ON categories.id = events.category_id
    LEFT JOIN users ON users.id = events.user_id
    LEFT JOIN event_likes ON event_likes.event_id = events.id
    LEFT JOIN event_favourites ON event_favourites.event_id = events.id
    GROUP BY events.id, events.title, categories.name, users.name, events.start_date, events.view_count
    ORDER BY events.id DESC
    LIMIT $dashboardEventPerPage OFFSET $dashboardEventOffset
    "
);
if ($latestResult) {
    while ($row = mysqli_fetch_assoc($latestResult)) {
        $dashboardEvents[] = $row;
    }
}
?>

<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>EvenTura - Dashboard</title>
    <link rel="stylesheet" href="../../css/dashboard.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=Montserrat:wght@400;500;600;700;800&display=swap"
      rel="stylesheet"
    />
  </head>
  <body>
  <?php
    $navMode = "profile";
    include '../../templates/navbar.php';
  ?>

    <div class="admin-layout">
      <?php
        $adminActive = "dashboard";
        include '../../templates/superAdminSidebar.php';
      ?>

      <main class="admin-content">
        <h1 class="admin-page-title dashboard-title">Dashboard</h1>

        <section class="stats-grid super-stats-grid" aria-label="Ringkasan super admin">
          <article class="stats-card">
            <span class="stats-card__icon">
              <svg viewBox="0 0 24 24" fill="none" stroke-width="1.8" aria-hidden="true">
                <path d="M6 4.5A2.5 2.5 0 0 1 8.5 2h7A2.5 2.5 0 0 1 18 4.5V21l-6-4-6 4V4.5Z"></path>
              </svg>
            </span>
            <div>
              <p class="stats-card__label">Total User</p>
              <p class="stats-card__value"><?= number_format($totalUsers) ?></p>
            </div>
          </article>
          <article class="stats-card">
            <span class="stats-card__icon">
              <svg viewBox="0 0 24 24" fill="none" stroke-width="1.8" aria-hidden="true">
                <path d="M20.8 4.6a5.5 5.5 0 0 0-7.8 0L12 5.7l-1-1.1a5.5 5.5 0 0 0-7.8 7.8l1 1L12 21l7.8-7.6 1-1a5.5 5.5 0 0 0 0-7.8Z"></path>
              </svg>
            </span>
            <div>
              <p class="stats-card__label">Total Admin</p>
              <p class="stats-card__value"><?= number_format($totalAdmins) ?></p>
            </div>
          </article>
          <article class="stats-card">
            <span class="stats-card__icon">
              <svg viewBox="0 0 24 24" fill="none" stroke-width="1.8" aria-hidden="true">
                <path d="M2 12s3.5-6 10-6 10 6 10 6-3.5 6-10 6S2 12 2 12Z"></path>
                <circle cx="12" cy="12" r="3"></circle>
              </svg>
            </span>
            <div>
              <p class="stats-card__label">Total Event</p>
              <p class="stats-card__value"><?= number_format($totalEvents) ?></p>
            </div>
          </article>
          <article class="stats-card">
            <span class="stats-card__icon">
              <svg viewBox="0 0 24 24" fill="none" stroke-width="1.8" aria-hidden="true">
                <path d="M21 15a4 4 0 0 1-4 4H8l-5 3V7a4 4 0 0 1 4-4h10a4 4 0 0 1 4 4v8Z"></path>
              </svg>
            </span>
            <div>
              <p class="stats-card__label">Total Ulasan</p>
              <p class="stats-card__value"><?= number_format($totalReviews) ?></p>
            </div>
          </article>
        </section>

        <style>.super-stats-grid{grid-template-columns:repeat(4,minmax(0,1fr))}.super-overview-grid{display:grid;grid-template-columns:1fr 1fr;gap:24px}.super-list{display:grid;gap:14px}.super-list__item{display:flex;justify-content:space-between;gap:16px;padding:14px 0;border-bottom:1px solid #eceef3}.super-list__item:last-child{border-bottom:0}.super-list__title{font-weight:700;color:var(--admin-text)}.super-list__meta{margin-top:4px;color:#8a94a6;font-size:13px}.super-list__value{font-weight:800;color:#1b2033;white-space:nowrap}@media(max-width:900px){.super-stats-grid,.super-overview-grid{grid-template-columns:1fr}}</style>

        <section class="super-overview-grid" aria-labelledby="overview-title">
          <div>
          <h2 class="overview-title" id="overview-title">Event Terpopuler</h2>
          <div class="overview-card">
            <div class="super-list">
              <?php foreach ($popularEvents as $event): ?>
                <div class="super-list__item">
                  <div>
                    <div class="super-list__title"><?= htmlspecialchars($event['title']) ?></div>
                    <div class="super-list__meta"><?= htmlspecialchars($event['admin_name']) ?> · <?= number_format((int) $event['total_likes']) ?> likes</div>
                  </div>
                  <div class="super-list__value"><?= number_format((int) $event['view_count']) ?> views</div>
                </div>
              <?php endforeach; ?>
              <?php if (empty($popularEvents)): ?><div class="empty-state">Belum ada event.</div><?php endif; ?>
            </div>
          </div>
          </div>
          <div>
          <h2 class="overview-title">Admin Event Terbanyak</h2>
          <div class="overview-card">
            <div class="super-list">
              <?php foreach ($topAdmins as $admin): ?>
                <div class="super-list__item">
                  <div>
                    <div class="super-list__title"><?= htmlspecialchars($admin['name']) ?></div>
                    <div class="super-list__meta"><?= htmlspecialchars($admin['email']) ?></div>
                  </div>
                  <div class="super-list__value"><?= number_format((int) $admin['total_events']) ?> event</div>
                </div>
              <?php endforeach; ?>
              <?php if (empty($topAdmins)): ?><div class="empty-state">Belum ada admin.</div><?php endif; ?>
            </div>
          </div>
          </div>
        </section>

        <section class="dashboard-table-section" aria-labelledby="dashboard-events-title">
          <h2 class="overview-title" id="dashboard-events-title">Daftar Event Terbaru</h2>
          <div class="events-table-wrap">
            <table class="events-table dashboard-events-table super-dashboard-events-table">
              <thead>
                <tr>
                  <th class="col-number">No</th>
                  <th class="col-super-event">Event Name</th>
                  <th class="col-super-category">Category</th>
                  <th class="col-super-admin">Admin</th>
                  <th class="col-super-date">Date</th>
                  <th class="col-metric">Views</th>
                  <th class="col-metric">Likes</th>
                  <th class="col-metric">Favorit</th>
                </tr>
              </thead>
              <tbody>
                <?php if (! empty($dashboardEvents)): ?>
                  <?php $rowNumber = (($dashboardEventPage - 1) * $dashboardEventPerPage) + 1; ?>
                  <?php foreach ($dashboardEvents as $event): ?>
                    <tr>
                      <td class="events-table__muted col-number"><?= $rowNumber++ ?></td>
                      <td class="col-super-event"><?= htmlspecialchars($event['title']) ?></td>
                      <td class="col-super-category">
                        <span class="category-badge"><?= htmlspecialchars($event['category']) ?></span>
                      </td>
                      <td class="col-super-admin">
                        <span class="category-badge category-badge--admin"><?= htmlspecialchars($event['admin_name']) ?></span>
                      </td>
                      <td class="events-table__muted col-super-date"><?= htmlspecialchars(date('Y-m-d', strtotime($event['start_date']))) ?></td>
                      <td class="events-table__muted col-metric"><?= number_format((int) $event['view_count']) ?></td>
                      <td class="events-table__muted col-metric"><?= number_format((int) $event['total_likes']) ?></td>
                      <td class="events-table__muted col-metric"><?= number_format((int) $event['total_favourites']) ?></td>
                    </tr>
                  <?php endforeach; ?>
                <?php else: ?>
                  <tr>
                    <td class="empty-state" colspan="8">Belum ada data event.</td>
                  </tr>
                <?php endif; ?>
              </tbody>
            </table>
          </div>

          <?php if ($totalDashboardEventPages > 1): ?>
            <nav class="admin-pagination" aria-label="Pagination event dashboard">
              <a class="admin-pagination__link<?= $dashboardEventPage <= 1 ? ' is-disabled' : '' ?>" href="<?= $dashboardEventPage <= 1 ? '#' : htmlspecialchars(buildDashboardEventPaginationUrl($dashboardEventPage - 1)) ?>">Previous</a>
              <?php for ($page = 1; $page <= $totalDashboardEventPages; $page++): ?>
                <a class="admin-pagination__link<?= $page === $dashboardEventPage ? ' is-active' : '' ?>" href="<?= htmlspecialchars(buildDashboardEventPaginationUrl($page)) ?>"><?= $page ?></a>
              <?php endfor; ?>
              <a class="admin-pagination__link<?= $dashboardEventPage >= $totalDashboardEventPages ? ' is-disabled' : '' ?>" href="<?= $dashboardEventPage >= $totalDashboardEventPages ? '#' : htmlspecialchars(buildDashboardEventPaginationUrl($dashboardEventPage + 1)) ?>">Next</a>
            </nav>
          <?php endif; ?>
        </section>
      </main>
    </div>

    <?php include("../../templates/footer.php"); ?>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
      document.addEventListener("DOMContentLoaded", function () {
        const chartCanvas = document.getElementById("likesOverviewChart");
        if (!chartCanvas || typeof Chart === "undefined") {
          return;
        }

        const labels = <?= json_encode($likesChartLabels, JSON_UNESCAPED_UNICODE) ?>;
        const values = <?= json_encode($likesChartValues, JSON_UNESCAPED_UNICODE) ?>;

        new Chart(chartCanvas, {
          type: "line",
          data: {
            labels: labels,
            datasets: [
              {
                data: values,
                borderColor: "#111111",
                backgroundColor: "rgba(17, 17, 17, 0.08)",
                fill: true,
                tension: 0.35,
                borderWidth: 2,
                pointRadius: 0,
                pointHoverRadius: 4
              }
            ]
          },
          options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
              legend: {
                display: false
              },
              tooltip: {
                displayColors: false
              }
            },
            scales: {
              x: {
                display: false,
                grid: {
                  display: false
                },
                border: {
                  display: false
                }
              },
              y: {
                beginAtZero: true,
                ticks: {
                  display: false,
                  precision: 0
                },
                grid: {
                  color: "#edf0f5"
                },
                border: {
                  display: false
                }
              }
            },
            elements: {
              line: {
                capBezierPoints: true
              }
            }
          }
        });
      });
    </script>
  </body>
</html>
