<?php
$currentLevel = "admin";

include '../../process/checkAuth.php';
include '../../config/database.php';
include '../../process/getEvent.php';

$statusMessage = "";
$statusType = "success";

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_event_id'])) {

    $deleteEventId = (int) $_POST['delete_event_id'];

    $queryDeleteEvent = "DELETE FROM events WHERE id = $deleteEventId";

    $execDeleteEvent = mysqli_query($koneksi, $queryDeleteEvent);

    if ($execDeleteEvent) {
        header("Location: index.php?status=deleted");
        exit();
    }

    $statusMessage = "Data event gagal dihapus.";
    $statusType = "error";
}

if ($statusMessage === "" && isset($_GET['status'])) {

    if ($_GET['status'] === 'deleted') {
        $statusMessage = "Data event berhasil dihapus.";
    } elseif ($_GET['status'] === 'created') {
        $statusMessage = "Event baru berhasil ditambahkan.";
    } elseif ($_GET['status'] === 'updated') {
        $statusMessage = "Data event berhasil diperbarui.";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>EvenTura - Events</title>

    <link rel="stylesheet" href="../../css/event.css" />

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
        $adminActive = "event";
        include '../../templates/adminSidebar.php';
      ?>

      <main class="admin-content">

        <div class="admin-page-header events-header">
          <h1 class="admin-page-title">Events</h1>

          <a 
            class="admin-button admin-button--primary add-event-button" 
            href="create.php"
          >
            <span aria-hidden="true">+</span>
            Add Event
          </a>
        </div>

        <?php if ($statusMessage !== ""): ?>
          <div class="admin-alert admin-alert--<?= htmlspecialchars($statusType) ?>">
            <?= htmlspecialchars($statusMessage) ?>
          </div>
        <?php endif; ?>

        <form class="admin-search" method="get" action="">

          <svg 
            class="admin-search__icon" 
            viewBox="0 0 24 24" 
            fill="none" 
            stroke="currentColor" 
            stroke-width="1.8" 
            aria-hidden="true"
          >
            <circle cx="11" cy="11" r="7"></circle>
            <path d="m16 16 4 4"></path>
          </svg>

          <input
            class="admin-search__input"
            type="search"
            name="search"
            placeholder="Search events"
            value="<?= htmlspecialchars($search) ?>"
          />
        </form>

        <div class="events-table-wrap">

          <table class="events-table">

            <thead>
              <tr>
                <th>Event Name</th>
                <th>Category</th>
                <th>Date</th>
                <th>Location</th>
                <th>Actions</th>
              </tr>
            </thead>

            <tbody>

              <?php if ($execEvents && mysqli_num_rows($execEvents) > 0): ?>

                <?php while ($event = mysqli_fetch_assoc($execEvents)): ?>

                  <tr>

                    <td>
                      <?= htmlspecialchars($event['title']) ?>
                    </td>

                    <td>
                      <span class="category-badge">
                        <?= htmlspecialchars($event['category']) ?>
                      </span>
                    </td>

                    <td class="events-table__muted">
                      <?= htmlspecialchars(date('Y-m-d', strtotime($event['start_date']))) ?>
                    </td>

                    <td class="events-table__muted">
                      <?= htmlspecialchars($event['location']) ?>
                    </td>

                    <td>

                      <div class="table-actions">

                        <a
                          class="table-action table-action--edit"
                          href="edit.php?id=<?= htmlspecialchars($event['id']) ?>"
                        >
                          Edit
                        </a>

                        <span class="table-action-separator"></span>

                        <form
                          method="post"
                          action=""
                          onsubmit="return confirm('Hapus event ini?');"
                        >

                          <input
                            type="hidden"
                            name="delete_event_id"
                            value="<?= htmlspecialchars($event['id']) ?>"
                          />

                          <button
                            class="table-action table-action--delete"
                            type="submit"
                          >
                            Delete
                          </button>

                        </form>

                      </div>

                    </td>

                  </tr>

                <?php endwhile; ?>

              <?php else: ?>

                <tr>
                  <td class="empty-state" colspan="5">
                    Belum ada data event yang cocok.
                  </td>
                </tr>

              <?php endif; ?>

            </tbody>

          </table>

        </div>

      </main>

    </div>

    <?php include("../../templates/footer.php"); ?>

  </body>
</html>
