<?php
$currentLevel = "admin";
include '../../process/checkAuth.php';
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
              <p class="stats-card__value">12,345</p>
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
              <p class="stats-card__value">6,789</p>
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
              <p class="stats-card__value">23,456</p>
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
                <span class="overview-card__value">12,345</span>
                <span class="overview-card__trend">~ +15%</span>
              </div>
            </div>
            <div class="chart-grid" aria-label="Grafik performa event 30 hari terakhir">
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
  </body>
</html>
