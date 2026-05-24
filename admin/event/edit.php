<?php
$currentLevel = "admin";
include '../../process/checkAuth.php';
include '../../config/database.php';

$eventId = isset($_GET['id']) ? (int) $_GET['id'] : 0;
$errors = [];

if ($eventId <= 0) {
    header("Location: index.php");
    exit();
}

$queryEvent = "
    SELECT
        id,
        title,
        description,
        category_id,
        city_id,
        start_date,
        end_date,
        location,
        thumnail
    FROM events
    WHERE id = $eventId
";

$execEvent = mysqli_query($koneksi, $queryEvent);
$event = $execEvent ? mysqli_fetch_assoc($execEvent) : null;

if (! $event) {
    header("Location: index.php");
    exit();
}

$categories = [];
$cities = [];

$execCategories = mysqli_query($koneksi, "SELECT id, name FROM categories ORDER BY name ASC");
if ($execCategories) {
    while ($category = mysqli_fetch_assoc($execCategories)) {
        $categories[] = $category;
    }
}

$execCities = mysqli_query($koneksi, "SELECT id, name FROM cities ORDER BY name ASC");
if ($execCities) {
    while ($city = mysqli_fetch_assoc($execCities)) {
        $cities[] = $city;
    }
}

$formData = [
    'title' => $event['title'],
    'description' => $event['description'],
    'category_id' => (string) $event['category_id'],
    'city_id' => (string) $event['city_id'],
    'start_date' => $event['start_date'],
    'end_date' => $event['end_date'],
    'location' => $event['location'],
    'thumnail' => $event['thumnail'],
];

$uploadDir = '../../assets/uploads/events/';
$uploadUrlBase = 'assets/uploads/events/';

function uploadEventThumbnail(array $file, string $uploadDir, string $uploadUrlBase): ?string
{
    if (!isset($file['error']) || $file['error'] === UPLOAD_ERR_NO_FILE) {
        return null;
    }

    if ($file['error'] !== UPLOAD_ERR_OK) {
        return null;
    }

    $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
    $originalName = $file['name'] ?? '';
    $extension = strtolower(pathinfo($originalName, PATHINFO_EXTENSION));

    if (!in_array($extension, $allowedExtensions, true)) {
        return null;
    }

    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    $fileName = uniqid('event_', true) . '.' . $extension;
    $targetPath = $uploadDir . $fileName;

    if (!move_uploaded_file($file['tmp_name'], $targetPath)) {
        return null;
    }

    return $uploadUrlBase . $fileName;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $formData['title'] = trim($_POST['title'] ?? '');
    $formData['description'] = trim($_POST['description'] ?? '');
    $formData['category_id'] = (string) (int) ($_POST['category_id'] ?? 0);
    $formData['city_id'] = (string) (int) ($_POST['city_id'] ?? 0);
    $formData['start_date'] = trim($_POST['start_date'] ?? '');
    $formData['end_date'] = trim($_POST['end_date'] ?? '');
    $formData['location'] = trim($_POST['location'] ?? '');
    $formData['thumnail'] = trim($_POST['thumnail'] ?? '');

    if ($formData['title'] === '') {
        $errors[] = "Nama event wajib diisi.";
    }

    if ($formData['description'] === '') {
        $errors[] = "Deskripsi event wajib diisi.";
    }

    if ((int) $formData['category_id'] <= 0) {
        $errors[] = "Kategori event wajib dipilih.";
    }

    if ((int) $formData['city_id'] <= 0) {
        $errors[] = "Kota event wajib dipilih.";
    }

    if ($formData['start_date'] === '') {
        $errors[] = "Tanggal mulai wajib diisi.";
    }

    if ($formData['location'] === '') {
        $errors[] = "Lokasi event wajib diisi.";
    }

    if ($formData['end_date'] !== '' && strtotime($formData['end_date']) < strtotime($formData['start_date'])) {
        $errors[] = "Tanggal selesai tidak boleh lebih awal dari tanggal mulai.";
    }

    if (empty($errors)) {
        $uploadedThumbnail = uploadEventThumbnail($_FILES['thumnail_file'] ?? [], $uploadDir, $uploadUrlBase);

        if ($uploadedThumbnail !== null) {
            $formData['thumnail'] = $uploadedThumbnail;
        } elseif ($formData['thumnail'] === '') {
            $errors[] = "Thumbnail event wajib diupload atau diisi path/URL.";
        }
    }

    if (empty($errors)) {
        $titleEscaped = mysqli_real_escape_string($koneksi, $formData['title']);
        $descriptionEscaped = mysqli_real_escape_string($koneksi, $formData['description']);
        $locationEscaped = mysqli_real_escape_string($koneksi, $formData['location']);
        $thumnailEscaped = mysqli_real_escape_string($koneksi, $formData['thumnail']);
        $startDateEscaped = mysqli_real_escape_string($koneksi, $formData['start_date']);
        $endDateEscaped = $formData['end_date'] !== '' ? "'" . mysqli_real_escape_string($koneksi, $formData['end_date']) . "'" : "NULL";
        $categoryId = (int) $formData['category_id'];
        $cityId = (int) $formData['city_id'];

        $queryUpdateEvent = "
            UPDATE events
            SET
                title = '$titleEscaped',
                description = '$descriptionEscaped',
                category_id = $categoryId,
                city_id = $cityId,
                start_date = '$startDateEscaped',
                end_date = $endDateEscaped,
                location = '$locationEscaped',
                thumnail = '$thumnailEscaped'
            WHERE id = $eventId
        ";

        $execUpdateEvent = mysqli_query($koneksi, $queryUpdateEvent);

        if ($execUpdateEvent) {
            header("Location: index.php?status=updated");
            exit();
        }

        $errors[] = "Data event gagal diperbarui.";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>EvenTura - Edit Event</title>
    <link rel="stylesheet" href="../../css/editEvent.css" />
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

      <main class="admin-content event-form-content">
        <div class="admin-back-title">
          <a class="admin-back-link" href="index.php" aria-label="Kembali ke daftar event">
            <svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="m15 18-6-6 6-6"></path></svg>
          </a>
          <h1 class="admin-page-title">Edit Event</h1>
        </div>

        <?php if (! empty($errors)): ?>
          <div class="admin-alert admin-alert--error">
            <?= htmlspecialchars(implode(' ', $errors)) ?>
          </div>
        <?php endif; ?>

        <form class="admin-form" method="post" action="" enctype="multipart/form-data">
          <div class="admin-form__group">
            <label class="admin-label" for="title">Event Name</label>
            <input class="admin-field" id="title" name="title" type="text" value="<?= htmlspecialchars($formData['title']) ?>" placeholder="Festival Danau Toba" />
          </div>
          <div class="admin-form__group">
            <label class="admin-label" for="description">Description</label>
            <textarea class="admin-field" id="description" name="description" placeholder="Festival Danau Toba adalah acara tahunan yang menampilkan budaya Batak, termasuk pertunjukan seni, pameran kerajinan, dan kompetisi perahu tradisional."><?= htmlspecialchars($formData['description']) ?></textarea>
          </div>
          <div class="admin-form__row">
            <div>
              <label class="admin-label" for="category_id">Category</label>
              <select class="admin-field" id="category_id" name="category_id">
                <option value="">Pilih kategori</option>
                <?php foreach ($categories as $category): ?>
                  <option value="<?= htmlspecialchars($category['id']) ?>" <?= $formData['category_id'] === (string) $category['id'] ? 'selected' : '' ?>>
                    <?= htmlspecialchars($category['name']) ?>
                  </option>
                <?php endforeach; ?>
              </select>
            </div>
            <div>
              <label class="admin-label" for="city_id">City</label>
              <select class="admin-field" id="city_id" name="city_id">
                <option value="">Pilih kota</option>
                <?php foreach ($cities as $city): ?>
                  <option value="<?= htmlspecialchars($city['id']) ?>" <?= $formData['city_id'] === (string) $city['id'] ? 'selected' : '' ?>>
                    <?= htmlspecialchars($city['name']) ?>
                  </option>
                <?php endforeach; ?>
              </select>
            </div>
          </div>
          <div class="admin-form__row">
            <div>
              <label class="admin-label" for="start_date">Start Date</label>
              <input class="admin-field" id="start_date" name="start_date" type="date" value="<?= htmlspecialchars($formData['start_date']) ?>" />
            </div>
            <div>
              <label class="admin-label" for="end_date">End Date</label>
              <input class="admin-field" id="end_date" name="end_date" type="date" value="<?= htmlspecialchars($formData['end_date']) ?>" />
            </div>
          </div>
          <div class="admin-form__group">
            <label class="admin-label" for="location">Location</label>
            <input class="admin-field" id="location" name="location" type="text" value="<?= htmlspecialchars($formData['location']) ?>" placeholder="Lake Toba, North Sumatra" />
          </div>
          <div class="admin-form__group">
            <label class="admin-label" for="thumnail_file">Event Image</label>
            <div class="admin-upload">
              <div class="admin-upload__preview">
                <div class="admin-upload__preview-thumb">
                  <?php if ($formData['thumnail'] !== ''): ?>
                    <img src="<?= htmlspecialchars($formData['thumnail']) ?>" alt="Preview thumbnail event" id="thumbnail-preview">
                  <?php else: ?>
                    <div class="admin-upload__preview-placeholder" id="thumbnail-placeholder">
                      <svg class="admin-upload__preview-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" aria-hidden="true">
                        <rect x="3" y="4" width="18" height="16" rx="2"></rect>
                        <path d="m3 16 5-5 4 4 3-3 6 6"></path>
                        <path d="M15 8h.01"></path>
                      </svg>
                    </div>
                    <img src="" alt="" id="thumbnail-preview" style="display:none;">
                  <?php endif; ?>
                </div>
                <div class="admin-upload__meta">
                  <div class="admin-upload__eyebrow">Image Preview</div>
                  <div class="admin-upload__title" id="thumbnail-file-name">
                    <?= $formData['thumnail'] !== '' ? htmlspecialchars(basename($formData['thumnail'])) : 'Belum ada gambar dipilih' ?>
                  </div>
                  <div class="admin-upload__text">Upload gambar baru jika ingin mengganti thumbnail event ini. Gambar lama tetap dipakai bila tidak ada file baru.</div>
                </div>
              </div>
              <div class="admin-upload__controls">
                <label class="admin-upload__button" for="thumnail_file">
                  <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true">
                    <path d="M12 16V4"></path>
                    <path d="m7 9 5-5 5 5"></path>
                    <path d="M4 20h16"></path>
                  </svg>
                  Pilih gambar baru
                </label>
                <input class="admin-upload__input" id="thumnail_file" name="thumnail_file" type="file" accept=".jpg,.jpeg,.png,.gif,.webp,image/*" />
                <input type="hidden" name="thumnail" value="<?= htmlspecialchars($formData['thumnail']) ?>" />
                <div class="admin-upload__file" id="thumbnail-file-label">
                  <?= $formData['thumnail'] !== '' ? htmlspecialchars($formData['thumnail']) : 'Format yang didukung: JPG, PNG, GIF, WEBP.' ?>
                </div>
                <div class="admin-upload__hint">Jika upload gambar baru, thumbnail lama akan diganti.</div>
              </div>
            </div>
          </div>
          <div class="admin-form__actions">
            <a class="admin-button admin-button--secondary" href="index.php">Cancel</a>
            <button class="admin-button admin-button--primary" type="submit">Save Changes</button>
          </div>
        </form>
      </main>
    </div>

    <script>
      const thumbnailInput = document.getElementById('thumnail_file');
      const thumbnailPreview = document.getElementById('thumbnail-preview');
      const thumbnailPlaceholder = document.getElementById('thumbnail-placeholder');
      const thumbnailFileName = document.getElementById('thumbnail-file-name');
      const thumbnailFileLabel = document.getElementById('thumbnail-file-label');

      if (thumbnailInput) {
        thumbnailInput.addEventListener('change', function () {
          const file = this.files && this.files[0];

          if (!file) {
            return;
          }

          thumbnailFileName.textContent = file.name;
          thumbnailFileLabel.textContent = file.name;

          const reader = new FileReader();
          reader.onload = function (event) {
            if (thumbnailPreview) {
              thumbnailPreview.src = event.target.result;
              thumbnailPreview.style.display = 'block';
            }

            if (thumbnailPlaceholder) {
              thumbnailPlaceholder.style.display = 'none';
            }
          };

          reader.readAsDataURL(file);
        });
      }
    </script>

    <?php include("../../templates/footer.php"); ?>
  </body>
</html>
