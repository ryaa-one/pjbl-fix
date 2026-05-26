<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include '../config/database.php';

$userId = isset($_SESSION['user_id']) ? (int) $_SESSION['user_id'] : 0;
$likedEvents = [];

if ($userId > 0) {
    $queryLikedEvents = "
        SELECT
            events.id,
            events.title,
            events.start_date,
            events.location,
            events.thumnail
        FROM event_likes
        INNER JOIN events ON event_likes.event_id = events.id
        WHERE event_likes.user_id = ?
        ORDER BY events.id DESC
    ";

    $stmtLikedEvents = mysqli_prepare($koneksi, $queryLikedEvents);

    if ($stmtLikedEvents) {
        mysqli_stmt_bind_param($stmtLikedEvents, 'i', $userId);
        mysqli_stmt_execute($stmtLikedEvents);
        $likedResult = mysqli_stmt_get_result($stmtLikedEvents);

        if ($likedResult) {
            while ($likedRow = mysqli_fetch_assoc($likedResult)) {
                $likedEvents[] = $likedRow;
            }
        }

        mysqli_stmt_close($stmtLikedEvents);
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Event Yang Disukai - EvenTura</title>
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
                    $akunActive = "disukai";
                    include '../templates/akunNav.php';
                ?>
                <div class="event-section">
                    <h1 class="section-title">Event Yang Disukai</h1>
                </div>

                <?php if ($userId <= 0): ?>
                    <div class="auth-card">
                        <p class="auth-card__text">Login diperlukan untuk melihat event yang Anda sukai.</p>
                        <a class="auth-card__button" href="../login.php">Login untuk melihat event disukai</a>
                    </div>
                <?php elseif (! empty($likedEvents)): ?>
                    <div class="card-container">
                        <?php foreach ($likedEvents as $event): ?>
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
                    <div class="empty-card">Belum ada event yang Anda sukai.</div>
                <?php endif; ?>
            </section>
        </section>
    </section>

    <?php include("../templates/footer.php"); ?>
</body>
</html>
