<?php
require_once '../includes/auth.php';
require_role('user', '../login.php');

include '../config/database.php';

$userId = isset($_SESSION['user_id']) ? (int) $_SESSION['user_id'] : 0;
$favoriteEvents = [];

if ($userId > 0) {
    $queryFavoriteEvents = "
        SELECT
            events.id,
            events.title,
            events.start_date,
            events.location,
            events.thumnail
        FROM event_favourites
        INNER JOIN events ON event_favourites.event_id = events.id
        WHERE event_favourites.user_id = ?
        ORDER BY events.id DESC
    ";

    $stmtFavoriteEvents = mysqli_prepare($koneksi, $queryFavoriteEvents);

    if ($stmtFavoriteEvents) {
        mysqli_stmt_bind_param($stmtFavoriteEvents, 'i', $userId);
        mysqli_stmt_execute($stmtFavoriteEvents);
        $favoriteResult = mysqli_stmt_get_result($stmtFavoriteEvents);

        if ($favoriteResult) {
            while ($favoriteRow = mysqli_fetch_assoc($favoriteResult)) {
                $favoriteEvents[] = $favoriteRow;
            }
        }

        mysqli_stmt_close($stmtFavoriteEvents);
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Event Favorit - EvenTura</title>
    <link rel="stylesheet" type="text/css" href="../css/eventYangDisukai.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet"/>
</head>
<body>
<?php
    $navMode = "profile";
    include '../templates/navbar.php';
?>
    <section class="all-frame">
        <?php if ($userId > 0): ?>
            <section class="card-profil">
                <div class="foto-profil">
                    <img src="../assets/images/foto-profil.svg" alt="Foto profil" />
                </div>
                <div class="teks-profil">
                    <h2 class="nama-profil"><?= htmlspecialchars($_SESSION['nama']) ?></h2>
                    <p class="deskripsi-profil">Penggemar Seni dan Budaya</p>
                    <p class="jenis-akun">pengguna</p>
                </div>
                <a href="pengaturanAkun.php">
                    <div class="button-profil"><p class="edit-profil">Edit Profil</p></div>
                </a>
                <div class="container-logout">
                    <p class="logo-logout"><img src="../assets/images/logo-logout.svg" alt="Logout" /></p>
                    <a href="../process/logout.php"><p class="teks-logout">Logout</p></a>
                </div>
            </section>
        <?php endif; ?>

        <section class="main-content">
            <section class="container<?= $userId <= 0 ? ' container--full' : '' ?>">
                <?php
                    $akunActive = "favorit";
                    include '../templates/akunNav.php';
                ?>
                <div class="event-section">
                    <h1 class="section-title">Event Favorit</h1>
                </div>

                <?php if ($userId <= 0): ?>
                    <div class="auth-card">
                        <p class="auth-card__text">Login diperlukan untuk melihat daftar event favorit Anda.</p>
                        <a class="auth-card__button" href="../login.php">Login untuk melihat favorit</a>
                    </div>
                <?php elseif (! empty($favoriteEvents)): ?>
                    <div class="card-container">
                        <?php foreach ($favoriteEvents as $event): ?>
                            <a class="card-link" href="../detailEvent.php?id=<?= (int) $event['id'] ?>">
                                <div class="card">
                                    <div class="card-image">
                                        <img src="../<?= htmlspecialchars($event['thumnail'] ?: 'assets/images/hero-event.svg') ?>" alt="<?= htmlspecialchars($event['title']) ?>" />
                                    </div>
                                    <div class="card-text">
                                        <h3><?= htmlspecialchars($event['title']) ?></h3>
                                        <p><?= htmlspecialchars($event['location']) ?>, <?= htmlspecialchars($event['start_date']) ?></p>
                                    </div>
                                </div>
                            </a>
                        <?php endforeach; ?>
                    </div>
                <?php else: ?>
                    <div class="empty-card">Belum ada event favorit yang tersimpan di akun Anda.</div>
                <?php endif; ?>
            </section>
        </section>
    </section>

    <?php include("../templates/footer.php"); ?>
</body>
</html>
