<?php
$currentLevel = "admin";
include '../../process/checkAuth.php';
include '../../config/database.php';
include '../../process/category.php';

$eventId = isset($_GET['id']) ? (int) $_GET['id'] : 0;
$currentAdminId = isset($_SESSION['user_id']) ? (int) $_SESSION['user_id'] : 0;
$isModal = isset($_GET['modal']) && $_GET['modal'] === '1';
$errors = [];

if ($eventId <= 0) {
    header("Location: index.php");
    exit();
}

$queryEvent = "
    SELECT
        events.id,
        events.title,
        events.description,
        events.category_id,
        categories.name AS category_name,
        events.city_id,
        cities.province_id,
        events.start_date,
        events.end_date,
        events.location,
        events.thumnail,
        events.gallery_carousel
    FROM events
    LEFT JOIN categories ON events.category_id = categories.id
    LEFT JOIN cities ON events.city_id = cities.id
    WHERE events.id = ?
      AND events.user_id = ?
    LIMIT 1
";

$stmtEvent = mysqli_prepare($koneksi, $queryEvent);
if ($stmtEvent) {
    mysqli_stmt_bind_param($stmtEvent, 'ii', $eventId, $currentAdminId);
    mysqli_stmt_execute($stmtEvent);
    $execEvent = mysqli_stmt_get_result($stmtEvent);
    $event = $execEvent ? mysqli_fetch_assoc($execEvent) : null;
    mysqli_stmt_close($stmtEvent);
} else {
    $event = null;
}

if (! $event) {
    header("Location: index.php");
    exit();
}

$provinceOptions = [];
$execProvinces = mysqli_query($koneksi, "SELECT id, name FROM provinces ORDER BY name ASC");
if ($execProvinces) {
    while ($province = mysqli_fetch_assoc($execProvinces)) {
        $provinceOptions[(int) $province['id']] = $province['name'];
    }
}

$selectedProvinceId = (int) ($event['province_id'] ?? 0);
$cityOptions = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $selectedProvinceId = (int) ($_POST['province_id'] ?? 0);
}

if ($selectedProvinceId > 0) {
    $stmtCities = mysqli_prepare($koneksi, "SELECT id, name FROM cities WHERE province_id = ? ORDER BY name ASC");
    if ($stmtCities) {
        mysqli_stmt_bind_param($stmtCities, 'i', $selectedProvinceId);
        mysqli_stmt_execute($stmtCities);
        $resCities = mysqli_stmt_get_result($stmtCities);
        while ($city = mysqli_fetch_assoc($resCities)) {
            $cityOptions[(int) $city['id']] = $city['name'];
        }
        mysqli_stmt_close($stmtCities);
    }
}

$formData = [
    'title' => $event['title'],
    'description' => $event['description'],
    'category_name' => $event['category_name'] ?? '',
    'province_id' => $selectedProvinceId,
    'city_id' => (int) ($event['city_id'] ?? 0),
    'start_date' => $event['start_date'],
    'end_date' => $event['end_date'],
    'location' => $event['location'],
    'thumnail' => $event['thumnail'],
    'gallery_carousel' => $event['gallery_carousel'] ?? '[]',
];


$uploadDir = '../../assets/uploads/events/';
$uploadUrlBase = 'assets/uploads/events/';

function decodeEventGallery($galleryValue, string $thumbnail = ''): array
{
    $decodedGallery = json_decode((string) $galleryValue, true);
    if (!is_array($decodedGallery)) {
        $decodedGallery = [];
    }

    $images = array_values(array_filter($decodedGallery, fn($item) => is_string($item) && trim($item) !== ''));
    if (empty($images) && $thumbnail !== '') {
        $images[] = $thumbnail;
    }

    return $images;
}

function getIndexedUploadFile(array $files, int $index): array
{
    return [
        'name' => $files['name'][$index] ?? '',
        'tmp_name' => $files['tmp_name'][$index] ?? '',
        'error' => $files['error'][$index] ?? UPLOAD_ERR_NO_FILE,
    ];
}

function deleteEventImageFile(string $imagePath, string $uploadDir, string $uploadUrlBase): void
{
    $imagePath = trim($imagePath);
    if ($imagePath === '' || strpos($imagePath, $uploadUrlBase) !== 0) {
        return;
    }

    $uploadRoot = realpath($uploadDir);
    if ($uploadRoot === false) {
        return;
    }

    $fileName = basename(parse_url($imagePath, PHP_URL_PATH) ?: $imagePath);
    if ($fileName === '' || $fileName === '.' || $fileName === '..') {
        return;
    }

    $targetPath = $uploadRoot . DIRECTORY_SEPARATOR . $fileName;
    if (is_file($targetPath)) {
        unlink($targetPath);
    }
}

function uploadEventImage(array $file, string $uploadDir, string $uploadUrlBase): ?string
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

function uploadEventImages(array $files, string $uploadDir, string $uploadUrlBase): array
{
    $uploaded = [];
    $names = $files['name'] ?? [];
    $tmpNames = $files['tmp_name'] ?? [];
    $errors = $files['error'] ?? [];

    if (!is_array($names)) {
        return $uploaded;
    }

    foreach ($names as $index => $name) {
        $file = [
            'name' => $name,
            'tmp_name' => $tmpNames[$index] ?? '',
            'error' => $errors[$index] ?? UPLOAD_ERR_NO_FILE,
        ];

        $uploadedPath = uploadEventImage($file, $uploadDir, $uploadUrlBase);
        if ($uploadedPath !== null) {
            $uploaded[] = $uploadedPath;
        }
    }

    return $uploaded;
}

$currentGalleryImages = decodeEventGallery($formData['gallery_carousel'], $formData['thumnail']);
$originalGallerySet = array_fill_keys($currentGalleryImages, true);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $uploadedImages = [];
    $oldImagesToDelete = [];

    $formData['title'] = trim($_POST['title'] ?? '');
    $formData['description'] = trim($_POST['description'] ?? '');
    $formData['category_name'] = normalizeCategoryName($_POST['category_name'] ?? '');
    $formData['province_id'] = (int) ($_POST['province_id'] ?? 0);
    $formData['city_id'] = (int) ($_POST['city_id'] ?? 0);
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

    if ($formData['category_name'] === '') {
        $errors[] = "Kategori event wajib diisi.";
    }

    if ($formData['province_id'] === 0 || !isset($provinceOptions[$formData['province_id']])) {
        $errors[] = "Provinsi event wajib dipilih.";
    }

    if ($formData['city_id'] === 0 || !isset($cityOptions[$formData['city_id']])) {
        $errors[] = "Kota/Kabupaten event wajib dipilih.";
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
        $submittedGallery = $_POST['gallery_existing'] ?? [];
        if (!is_array($submittedGallery)) {
            $submittedGallery = [];
        }

        $deleteIndexes = $_POST['gallery_delete'] ?? [];
        if (!is_array($deleteIndexes)) {
            $deleteIndexes = [];
        }

        $replacementFiles = $_FILES['gallery_replace'] ?? [];
        $managedImages = [];

        foreach ($submittedGallery as $index => $imagePath) {
            $imagePath = trim((string) $imagePath);
            if ($imagePath === '' || !isset($originalGallerySet[$imagePath])) {
                continue;
            }

            $galleryIndex = (int) $index;
            if (isset($deleteIndexes[$galleryIndex])) {
                $oldImagesToDelete[] = $imagePath;
                continue;
            }

            $replacementPath = uploadEventImage(getIndexedUploadFile($replacementFiles, $galleryIndex), $uploadDir, $uploadUrlBase);
            if ($replacementPath !== null) {
                $uploadedImages[] = $replacementPath;
                $oldImagesToDelete[] = $imagePath;
                $managedImages[] = $replacementPath;
                continue;
            }

            $managedImages[] = $imagePath;
        }

        $newGalleryImages = uploadEventImages($_FILES['event_images'] ?? [], $uploadDir, $uploadUrlBase);
        $uploadedImages = array_merge($uploadedImages, $newGalleryImages);
        $finalImages = array_values(array_filter(array_merge($managedImages, $newGalleryImages), fn($item) => is_string($item) && trim($item) !== ''));

        if (!empty($finalImages)) {
            $formData['thumnail'] = $finalImages[0];
            $formData['gallery_carousel'] = json_encode($finalImages, JSON_UNESCAPED_SLASHES);
        } else {
            $formData['thumnail'] = '';
            $formData['gallery_carousel'] = '[]';
            $errors[] = "Thumbnail event wajib diupload atau diisi path/URL.";
        }

        $currentGalleryImages = $finalImages;
    }

    if (empty($errors)) {
        $categoryId = getOrCreateCategoryId($koneksi, $formData['category_name']);
        if ($categoryId === null) {
            $errors[] = "Kategori event gagal disimpan.";
        }
    }

    if (empty($errors)) {
        $cityId = $formData['city_id'];
        $endDate = $formData['end_date'] !== '' ? $formData['end_date'] : null;

        $stmtUpdateEvent = mysqli_prepare(
            $koneksi,
            "
            UPDATE events
            SET
                title = ?,
                description = ?,
                category_id = ?,
                city_id = ?,
                start_date = ?,
                end_date = ?,
                location = ?,
                thumnail = ?,
                gallery_carousel = ?
            WHERE events.id = ?
              AND events.user_id = ?
        "
        );

        if ($stmtUpdateEvent) {
            mysqli_stmt_bind_param(
                $stmtUpdateEvent,
                'ssiisssssii',
                $formData['title'],
                $formData['description'],
                $categoryId,
                $cityId,
                $formData['start_date'],
                $endDate,
                $formData['location'],
                $formData['thumnail'],
                $formData['gallery_carousel'],
                $eventId,
                $currentAdminId
            );

            $execUpdateEvent = mysqli_stmt_execute($stmtUpdateEvent);
            mysqli_stmt_close($stmtUpdateEvent);
        } else {
            $execUpdateEvent = false;
        }

        if ($execUpdateEvent) {
            $finalImageSet = array_fill_keys($currentGalleryImages, true);
            foreach (array_unique($oldImagesToDelete) as $imagePath) {
                if (!isset($finalImageSet[$imagePath])) {
                    deleteEventImageFile($imagePath, $uploadDir, $uploadUrlBase);
                }
            }

            header("Location: index.php?status=updated" . ($isModal ? "&modal=1" : ""));
            exit();
        }

        foreach ($uploadedImages as $imagePath) {
            deleteEventImageFile($imagePath, $uploadDir, $uploadUrlBase);
        }

        $errors[] = "Data event gagal diperbarui.";
    }

    if (!empty($errors) && !empty($uploadedImages)) {
        foreach ($uploadedImages as $imagePath) {
            deleteEventImageFile($imagePath, $uploadDir, $uploadUrlBase);
        }
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
  <body class="<?= $isModal ? 'admin-edit-modal-page' : '' ?>">
  <?php if (! $isModal): ?>
    <?php
      $navMode = "profile";
      include '../../templates/navbar.php';
    ?>
  <?php endif; ?>

    <div class="admin-layout">
      <?php if (! $isModal): ?>
        <?php
          $adminActive = "event";
          include '../../templates/adminSidebar.php';
        ?>
      <?php endif; ?>

      <main class="admin-content event-form-content">
        <?php if (! $isModal): ?>
          <div class="admin-back-title">
            <a class="admin-back-link" href="index.php" aria-label="Kembali ke daftar event">
              <svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="m15 18-6-6 6-6"></path></svg>
            </a>
            <h1 class="admin-page-title">Edit Event</h1>
          </div>
        <?php endif; ?>

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
              <label class="admin-label" for="category_name">Category</label>
              <input
                class="admin-field"
                id="category_name"
                name="category_name"
                type="text"
                value="<?= htmlspecialchars($formData['category_name']) ?>"
                placeholder="Budaya"
              />
            </div>
          </div>
          <div class="admin-form__row">
            <div>
              <label class="admin-label" for="province_id">Provinsi</label>
              <select class="admin-field" id="province_id" name="province_id">
                <option value="">Pilih provinsi</option>
                <?php foreach ($provinceOptions as $id => $label): ?>
                  <option value="<?= $id ?>" <?= $formData['province_id'] === $id ? 'selected' : '' ?>>
                    <?= htmlspecialchars($label) ?>
                  </option>
                <?php endforeach; ?>
              </select>
            </div>
            <div>
              <label class="admin-label" for="city_id">Kota / Kabupaten</label>
              <select class="admin-field" id="city_id" name="city_id" <?= empty($cityOptions) ? 'disabled' : '' ?>>
                <?php if (empty($cityOptions)): ?>
                  <option value="">Pilih provinsi terlebih dahulu</option>
                <?php else: ?>
                  <option value="">Pilih kota/kabupaten</option>
                  <?php foreach ($cityOptions as $id => $label): ?>
                    <option value="<?= $id ?>" <?= $formData['city_id'] === $id ? 'selected' : '' ?>>
                      <?= htmlspecialchars($label) ?>
                    </option>
                  <?php endforeach; ?>
                <?php endif; ?>
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
                  <div class="admin-upload__text">Upload banyak gambar sekaligus. File pertama otomatis menjadi thumbnail utama.</div>
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
                <input class="admin-upload__input" id="thumnail_file" name="event_images[]" type="file" accept=".jpg,.jpeg,.png,.gif,.webp,image/*" multiple />
                <input type="hidden" name="thumnail" value="<?= htmlspecialchars($formData['thumnail']) ?>" />
                <div class="admin-upload__file" id="thumbnail-file-label">
                  <?= $formData['thumnail'] !== '' ? htmlspecialchars($formData['thumnail']) : 'Format yang didukung: JPG, PNG, GIF, WEBP.' ?>
                </div>
                <div class="admin-upload__hint">Gambar baru akan ditambahkan ke gallery setelah gambar lama yang masih aktif.</div>
              </div>
            </div>
            <?php if (!empty($currentGalleryImages)): ?>
              <div class="gallery-manager">
                <div class="gallery-manager__header">
                  <div>
                    <h2>Gallery event</h2>
                    <p>Kelola gambar yang sudah tersimpan. Gambar pertama yang aktif menjadi thumbnail utama.</p>
                  </div>
                  <span><?= count($currentGalleryImages) ?> gambar</span>
                </div>
                <div class="gallery-manager__grid">
                  <?php foreach ($currentGalleryImages as $index => $imagePath): ?>
                    <article class="gallery-manager__item">
                      <input type="hidden" name="gallery_existing[<?= (int) $index ?>]" value="<?= htmlspecialchars($imagePath) ?>">
                      <div class="gallery-manager__thumb">
                        <img src="../../<?= htmlspecialchars($imagePath) ?>" alt="Gallery image <?= (int) $index + 1 ?>">
                        <?php if ($index === 0): ?>
                          <span class="gallery-manager__cover">Thumbnail</span>
                        <?php endif; ?>
                      </div>
                      <div class="gallery-manager__body">
                        <div class="gallery-manager__name"><?= htmlspecialchars(basename($imagePath)) ?></div>
                        <div class="gallery-manager__actions">
                          <label class="gallery-manager__replace" for="gallery_replace_<?= (int) $index ?>">
                            Ganti image
                          </label>
                          <input
                            class="gallery-manager__input"
                            id="gallery_replace_<?= (int) $index ?>"
                            name="gallery_replace[<?= (int) $index ?>]"
                            type="file"
                            accept=".jpg,.jpeg,.png,.gif,.webp,image/*"
                            data-replace-label="gallery_replace_label_<?= (int) $index ?>"
                          >
                          <label class="gallery-manager__delete">
                            <input type="checkbox" name="gallery_delete[<?= (int) $index ?>]" value="1">
                            <span>Hapus</span>
                          </label>
                        </div>
                        <div class="gallery-manager__file" id="gallery_replace_label_<?= (int) $index ?>">Belum ada file pengganti.</div>
                      </div>
                    </article>
                  <?php endforeach; ?>
                </div>
              </div>
            <?php endif; ?>
            <div class="admin-upload__hint" id="selected-count">Belum ada file dipilih.</div>
          </div>
          <div class="admin-form__actions">
            <?php if ($isModal): ?>
              <button class="admin-button admin-button--secondary" type="button" onclick="window.parent && window.parent.closeAdminEditModal ? window.parent.closeAdminEditModal() : window.location.href='index.php'">Cancel</button>
            <?php else: ?>
              <a class="admin-button admin-button--secondary" href="index.php">Cancel</a>
            <?php endif; ?>
            <button class="admin-button admin-button--primary" type="submit">Simpan</button>
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
      const selectedCount = document.getElementById('selected-count');

      if (thumbnailInput) {
        thumbnailInput.addEventListener('change', function () {
          const files = this.files ? Array.from(this.files) : [];
          if (files.length === 0) {
            return;
          }

          thumbnailFileName.textContent = files[0].name;
          thumbnailFileLabel.textContent = files.map((file) => file.name).join(', ');
          if (selectedCount) {
            selectedCount.textContent = `${files.length} file dipilih.`;
          }

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

          reader.readAsDataURL(files[0]);
        });
      }

      document.querySelectorAll('.gallery-manager__input').forEach((input) => {
        input.addEventListener('change', function () {
          const label = document.getElementById(this.dataset.replaceLabel);
          const fileName = this.files && this.files[0] ? this.files[0].name : 'Belum ada file pengganti.';
          if (label) {
            label.textContent = fileName;
          }
        });
      });

      document.querySelectorAll('.gallery-manager__delete input').forEach((checkbox) => {
        checkbox.addEventListener('change', function () {
          const item = this.closest('.gallery-manager__item');
          if (item) {
            item.classList.toggle('is-marked-delete', this.checked);
          }
        });
      });

      const provinceSelect = document.getElementById('province_id');
      const citySelect = document.getElementById('city_id');

      function resetCitySelect(placeholder) {
        if (!citySelect) {
          return;
        }

        citySelect.innerHTML = `<option value="">${placeholder}</option>`;
        citySelect.disabled = true;
      }

      if (provinceSelect && citySelect) {
        provinceSelect.addEventListener('change', function () {
          const provinceId = this.value;

          if (!provinceId) {
            resetCitySelect('Pilih provinsi terlebih dahulu');
            return;
          }

          citySelect.disabled = true;
          citySelect.innerHTML = '<option value="">Memuat kota...</option>';

          fetch(`getCities.php?province_id=${encodeURIComponent(provinceId)}`)
            .then((response) => {
              if (!response.ok) {
                throw new Error('Network error');
              }

              return response.json();
            })
            .then((cities) => {
              if (cities.length === 0) {
                resetCitySelect('Tidak ada kota tersedia');
                return;
              }

              citySelect.innerHTML = '<option value="">Pilih kota/kabupaten</option>';
              cities.forEach((city) => {
                const option = document.createElement('option');
                option.value = city.id;
                option.textContent = city.name;
                citySelect.appendChild(option);
              });
              citySelect.disabled = false;
            })
            .catch(() => {
              resetCitySelect('Gagal memuat kota');
            });
        });
      }
    </script>

    <?php if (! $isModal): ?>
      <?php include("../../templates/footer.php"); ?>
    <?php endif; ?>
  </body>
</html>
