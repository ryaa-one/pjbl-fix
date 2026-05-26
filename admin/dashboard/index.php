<?php
$currentLevel = "admin";
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
        include '../../templates/adminSidebar.php';
      ?>

      <main class="admin-content">
        <h1 class="admin-page-title dashboard-title">Dashboard</h1>

        <section class="stats-grid" aria-label="Ringkasan event">
          <article class="stats-card">
            <span class="stats-card__icon">
              <svg viewBox="0 0 24 24" fill="none" stroke-width="1.8" aria-hidden="true">
                <path d="M6 4.5A2.5 2.5 0 0 1 8.5 2h7A2.5 2.5 0 0 1 18 4.5V21l-6-4-6 4V4.5Z"></path>
              </svg>
            </span>
            <div>
              <p class="stats-card__label">Total Event Favorit</p>
              <p class="stats-card__value"><?= number_format($totalFavourites) ?></p>
            </div>
          </article>
          <article class="stats-card">
            <span class="stats-card__icon">
              <svg viewBox="0 0 24 24" fill="none" stroke-width="1.8" aria-hidden="true">
                <path d="M20.8 4.6a5.5 5.5 0 0 0-7.8 0L12 5.7l-1-1.1a5.5 5.5 0 0 0-7.8 7.8l1 1L12 21l7.8-7.6 1-1a5.5 5.5 0 0 0 0-7.8Z"></path>
              </svg>
            </span>
            <div>
              <p class="stats-card__label">Total Event Likes</p>
              <p class="stats-card__value"><?= number_format($totalLikes) ?></p>
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
              <p class="stats-card__label">Total Event Views</p>
              <p class="stats-card__value"><?= number_format($totalViews) ?></p>
            </div>
          </article>
        </section>

        <section aria-labelledby="overview-title">
          <h2 class="overview-title" id="overview-title">Event Overview</h2>
          <div class="overview-card">
            <div class="overview-card__header">
              <div>
                <h3 class="overview-card__name">Performa Event</h3>
                <p class="overview-card__period">30 Hari Terakhir</p>
              </div>
              <div class="overview-card__metric">
                <span class="overview-card__value"><?= number_format($likesLast30Days) ?></span>
                <span class="overview-card__trend"><?= htmlspecialchars($trendLabel) ?></span>
              </div>
            </div>
            <div class="chart-grid" aria-label="Grafik performa event 30 hari terakhir">
              <canvas id="likesOverviewChart" aria-label="Grafik like event 30 hari terakhir"></canvas>
              <div class="chart-grid__labels">
                <span>Minggu 1</span>
                <span>Minggu 2</span>
                <span>Minggu 3</span>
                <span>Minggu 4</span>
              </div>
            </div>
          </div>
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
