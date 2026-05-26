<?php
$currentLevel = "admin";
include '../../process/checkAuth.php';
include '../../config/database.php';
include '../../process/category.php';
include_once '../../includes/event_metrics.php';

ensureEventMetricsColumns($koneksi);

$errors = [];
$currentAdminId = isset($_SESSION['user_id']) ? (int) $_SESSION['user_id'] : 0;
$formData = [
    'title'           => '',
    'description'     => '',
    'category_name'   => '',
    'province_id'     => 0,
    'city_id'         => 0,
    'start_date'      => '',
    'end_date'        => '',
    'location'        => '',
    'thumnail'        => '',
    'gallery_carousel'=> '[]',
];

$uploadDir    = '../../assets/uploads/events/';
$uploadUrlBase = 'assets/uploads/events/';

function uploadEventImage(array $file, string $uploadDir, string $uploadUrlBase): ?string
{
    if (!isset($file['error']) || $file['error'] === UPLOAD_ERR_NO_FILE) return null;
    if ($file['error'] !== UPLOAD_ERR_OK) return null;

    $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
    $extension = strtolower(pathinfo($file['name'] ?? '', PATHINFO_EXTENSION));
    if (!in_array($extension, $allowedExtensions, true)) return null;

    if (!is_dir($uploadDir)) mkdir($uploadDir, 0777, true);

    $fileName   = uniqid('event_', true) . '.' . $extension;
    $targetPath = $uploadDir . $fileName;

    if (!move_uploaded_file($file['tmp_name'], $targetPath)) return null;

    return $uploadUrlBase . $fileName;
}

function uploadEventImages(array $files, string $uploadDir, string $uploadUrlBase): array
{
    $uploaded = [];
    $names    = $files['name']    ?? [];
    $tmpNames = $files['tmp_name'] ?? [];
    $errs     = $files['error']   ?? [];

    if (!is_array($names)) return $uploaded;

    foreach ($names as $index => $name) {
        $file = [
            'name'     => $name,
            'tmp_name' => $tmpNames[$index] ?? '',
            'error'    => $errs[$index]     ?? UPLOAD_ERR_NO_FILE,
        ];
        $path = uploadEventImage($file, $uploadDir, $uploadUrlBase);
        if ($path !== null) $uploaded[] = $path;
    }

    return $uploaded;
}

// Ambil semua provinsi
$provinceOptions = [];
$execProvinces = mysqli_query($koneksi, "SELECT id, name FROM provinces ORDER BY name ASC");
if ($execProvinces) {
    while ($row = mysqli_fetch_assoc($execProvinces)) {
        $provinceOptions[(int) $row['id']] = $row['name'];
    }
}

// Kota untuk re-populate saat POST gagal validasi
$cityOptions = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $postedProvince = (int) ($_POST['province_id'] ?? 0);
    if ($postedProvince > 0) {
        $stmtCities = mysqli_prepare($koneksi, "SELECT id, name FROM cities WHERE province_id = ? ORDER BY name ASC");
        if ($stmtCities) {
            mysqli_stmt_bind_param($stmtCities, 'i', $postedProvince);
            mysqli_stmt_execute($stmtCities);
            $resCities = mysqli_stmt_get_result($stmtCities);
            while ($row = mysqli_fetch_assoc($resCities)) {
                $cityOptions[(int) $row['id']] = $row['name'];
            }
            mysqli_stmt_close($stmtCities);
        }
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $formData['title']            = trim($_POST['title']       ?? '');
    $formData['description']      = trim($_POST['description'] ?? '');
    $formData['category_name']    = normalizeCategoryName($_POST['category_name'] ?? '');
    $formData['province_id']      = (int) ($_POST['province_id']  ?? 0);
    $formData['city_id']          = (int) ($_POST['city_id']      ?? 0);
    $formData['start_date']       = trim($_POST['start_date']  ?? '');
    $formData['end_date']         = trim($_POST['end_date']    ?? '');
    $formData['location']         = trim($_POST['location']    ?? '');
    $formData['thumnail']         = trim($_POST['thumnail']    ?? '');
    $formData['gallery_carousel'] = trim($_POST['gallery_carousel'] ?? '[]');

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
        $uploadedImages  = uploadEventImages($_FILES['event_images'] ?? [], $uploadDir, $uploadUrlBase);
        $submittedGallery = json_decode($formData['gallery_carousel'], true);
        if (!is_array($submittedGallery)) $submittedGallery = [];

        $finalImages = array_values(array_filter(
            array_merge($uploadedImages, $submittedGallery),
            fn($item) => is_string($item) && trim($item) !== ''
        ));

        if (!empty($finalImages)) {
            $formData['thumnail']         = $finalImages[0];
            $formData['gallery_carousel'] = json_encode($finalImages, JSON_UNESCAPED_SLASHES);
        } elseif ($formData['thumnail'] === '') {
            $errors[] = "Thumbnail event wajib diupload atau diisi path/URL.";
        }
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

        $stmtCreateEvent = mysqli_prepare(
            $koneksi,
            "
            INSERT INTO events (
                title, description, category_id, city_id, user_id,
                start_date, end_date, location, thumnail, gallery_carousel
            ) VALUES (
                ?, ?, ?, ?, ?, ?, ?, ?, ?, ?
            )
        "
        );

        if ($stmtCreateEvent) {
            mysqli_stmt_bind_param(
                $stmtCreateEvent,
                'ssiiisssss',
                $formData['title'],
                $formData['description'],
                $categoryId,
                $cityId,
                $currentAdminId,
                $formData['start_date'],
                $endDate,
                $formData['location'],
                $formData['thumnail'],
                $formData['gallery_carousel']
            );

            $execCreateEvent = mysqli_stmt_execute($stmtCreateEvent);
            mysqli_stmt_close($stmtCreateEvent);
        } else {
            $execCreateEvent = false;
        }

        if ($execCreateEvent) {
            header("Location: index.php?status=created");
            exit();
        }

        $errors[] = "Data event gagal ditambahkan.";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>EvenTura - Buat Event Baru</title>
    <link rel="stylesheet" href="../../css/eventBaru.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=Montserrat:wght@400;500;600;700;800&display=swap" rel="stylesheet"/>
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
            <svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
              <path d="m15 18-6-6 6-6"></path>
            </svg>
          </a>
          <h1 class="admin-page-title">Buat Event Baru</h1>
        </div>

        <?php if (!empty($errors)): ?>
          <div class="admin-alert admin-alert--error">
            <?= htmlspecialchars(implode(' ', $errors)) ?>
          </div>
        <?php endif; ?>

        <form class="admin-form" method="post" action="" enctype="multipart/form-data">
          <div class="admin-form__group">
            <label class="admin-label" for="title">Event Name</label>
            <input class="admin-field" id="title" name="title" type="text"
              value="<?= htmlspecialchars($formData['title']) ?>"
              placeholder="Festival Danau Toba" />
          </div>

          <div class="admin-form__group">
            <label class="admin-label" for="description">Description</label>
            <textarea class="admin-field" id="description" name="description"
              placeholder="Deskripsi singkat tentang event..."><?= htmlspecialchars($formData['description']) ?></textarea>
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
              <select class="admin-field" id="city_id" name="city_id"
                <?= empty($cityOptions) ? 'disabled' : '' ?>>
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
              <input class="admin-field" id="start_date" name="start_date" type="date"
                value="<?= htmlspecialchars($formData['start_date']) ?>" />
            </div>
            <div>
              <label class="admin-label" for="end_date">End Date</label>
              <input class="admin-field" id="end_date" name="end_date" type="date"
                value="<?= htmlspecialchars($formData['end_date']) ?>" />
            </div>
          </div>

          <div class="admin-form__group">
            <label class="admin-label" for="location">Location</label>
            <input class="admin-field" id="location" name="location" type="text"
              value="<?= htmlspecialchars($formData['location']) ?>"
              placeholder="Lake Toba, North Sumatra" />
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
                  Pilih gambar
                </label>
                <input class="admin-upload__input" id="thumnail_file" name="event_images[]" type="file"
                  accept=".jpg,.jpeg,.png,.gif,.webp,image/*" multiple />
                <input type="hidden" name="thumnail" value="<?= htmlspecialchars($formData['thumnail']) ?>" />
                <input type="hidden" name="gallery_carousel" value="<?= htmlspecialchars($formData['gallery_carousel']) ?>" />
                <div class="admin-upload__file" id="thumbnail-file-label">
                  <?= $formData['thumnail'] !== '' ? htmlspecialchars($formData['thumnail']) : 'Format yang didukung: JPG, PNG, GIF, WEBP.' ?>
                </div>
                <div class="admin-upload__hint">Gambar pertama jadi thumbnail, seluruh gambar disimpan ke gallery carousel.</div>
              </div>
            </div>
            <div class="admin-upload__hint" id="selected-count">Belum ada file dipilih.</div>
          </div>

          <div class="admin-form__actions">
            <a class="admin-button admin-button--secondary" href="index.php">Cancel</a>
            <button class="admin-button admin-button--primary" type="submit">Save Changes</button>
          </div>
        </form>
      </main>
    </div>

    <script>
      /* ── Thumbnail preview ── */
      const thumbnailInput    = document.getElementById('thumnail_file');
      const thumbnailPreview  = document.getElementById('thumbnail-preview');
      const thumbnailPlaceholder = document.getElementById('thumbnail-placeholder');
      const thumbnailFileName = document.getElementById('thumbnail-file-name');
      const thumbnailFileLabel= document.getElementById('thumbnail-file-label');
      const selectedCount     = document.getElementById('selected-count');

      if (thumbnailInput) {
        thumbnailInput.addEventListener('change', function () {
          const files = this.files ? Array.from(this.files) : [];
          if (files.length === 0) return;

          thumbnailFileName.textContent = files[0].name;
          thumbnailFileLabel.textContent = files.map(f => f.name).join(', ');
          if (selectedCount) selectedCount.textContent = `${files.length} file dipilih.`;

          const reader = new FileReader();
          reader.onload = function (e) {
            if (thumbnailPreview) {
              thumbnailPreview.src = e.target.result;
              thumbnailPreview.style.display = 'block';
            }
            if (thumbnailPlaceholder) thumbnailPlaceholder.style.display = 'none';
          };
          reader.readAsDataURL(files[0]);
        });
      }

      /* ── Dependent dropdown: Provinsi → Kota ── */
      const provinceSelect = document.getElementById('province_id');
      const citySelect     = document.getElementById('city_id');

      function resetCitySelect(placeholder) {
        citySelect.innerHTML = `<option value="">${placeholder}</option>`;
        citySelect.disabled  = true;
      }

      provinceSelect.addEventListener('change', function () {
        const provinceId = this.value;

        if (!provinceId) {
          resetCitySelect('Pilih provinsi terlebih dahulu');
          return;
        }

        citySelect.disabled  = true;
        citySelect.innerHTML = '<option value="">Memuat kota...</option>';

        fetch(`getCities.php?province_id=${encodeURIComponent(provinceId)}`)
          .then(res => {
            if (!res.ok) throw new Error('Network error');
            return res.json();
          })
          .then(cities => {
            if (cities.length === 0) {
              resetCitySelect('Tidak ada kota tersedia');
              return;
            }
            citySelect.innerHTML = '<option value="">Pilih kota/kabupaten</option>';
            cities.forEach(city => {
              const opt = document.createElement('option');
              opt.value       = city.id;
              opt.textContent = city.name;
              citySelect.appendChild(opt);
            });
            citySelect.disabled = false;
          })
          .catch(() => {
            resetCitySelect('Gagal memuat kota');
          });
      });
    </script>

    <?php include("../../templates/footer.php"); ?>
  </body>
</html>
