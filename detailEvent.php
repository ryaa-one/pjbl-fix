<?php
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}

include 'config/database.php';

$eventId = isset($_GET['id']) ? (int) $_GET['id'] : 0;
$currentUserId = isset($_SESSION['user_id']) ? (int) $_SESSION['user_id'] : 0;

if ($eventId <= 0) {
  header('Location: jelajah.php');
  exit();
}

$queryEvent = "
  SELECT
    events.id,
    events.title,
    events.description,
    events.start_date,
    events.end_date,
    events.location,
    events.thumnail,
    events.gallery_carousel,
    COALESCE(categories.name, 'Tanpa kategori') AS category,
    COALESCE(cities.name, '-') AS city
  FROM events
  LEFT JOIN categories ON events.category_id = categories.id
  LEFT JOIN cities ON events.city_id = cities.id
  WHERE events.id = ?
  LIMIT 1
";

$stmtEvent = mysqli_prepare($koneksi, $queryEvent);
if ($stmtEvent) {
  mysqli_stmt_bind_param($stmtEvent, 'i', $eventId);
}

if ($stmtEvent) {
  mysqli_stmt_execute($stmtEvent);
  $execEvent = mysqli_stmt_get_result($stmtEvent);
  $event = $execEvent ? mysqli_fetch_assoc($execEvent) : null;
  mysqli_stmt_close($stmtEvent);
} else {
  $event = null;
}

if (! $event) {
  header('Location: jelajah.php');
  exit();
}

$isFavorited = false;
$isLiked = false;

if ($currentUserId > 0) {
  $queryFavoriteStatus = "SELECT id FROM event_favourites WHERE event_id = ? AND user_id = ? LIMIT 1";
  $stmtFavoriteStatus = mysqli_prepare($koneksi, $queryFavoriteStatus);
  if ($stmtFavoriteStatus) {
    mysqli_stmt_bind_param($stmtFavoriteStatus, 'ii', $eventId, $currentUserId);
    mysqli_stmt_execute($stmtFavoriteStatus);
    $favoriteStatusResult = mysqli_stmt_get_result($stmtFavoriteStatus);
    $isFavorited = $favoriteStatusResult && mysqli_fetch_assoc($favoriteStatusResult) !== null;
    mysqli_stmt_close($stmtFavoriteStatus);
  }

  $queryLikeStatus = "SELECT id FROM event_likes WHERE event_id = ? AND user_id = ? LIMIT 1";
  $stmtLikeStatus = mysqli_prepare($koneksi, $queryLikeStatus);
  if ($stmtLikeStatus) {
    mysqli_stmt_bind_param($stmtLikeStatus, 'ii', $eventId, $currentUserId);
    mysqli_stmt_execute($stmtLikeStatus);
    $likeStatusResult = mysqli_stmt_get_result($stmtLikeStatus);
    $isLiked = $likeStatusResult && mysqli_fetch_assoc($likeStatusResult) !== null;
    mysqli_stmt_close($stmtLikeStatus);
  }
}

$queryReviews = "
  SELECT
    event_reviews.id,
    event_reviews.user_id,
    event_reviews.review_description,
    event_reviews.rating,
    event_reviews.created_at,
    users.name AS user_name
  FROM event_reviews
  INNER JOIN users ON event_reviews.user_id = users.id
  WHERE event_reviews.event_id = ?
  ORDER BY event_reviews.created_at DESC, event_reviews.id DESC
";

$reviews = [];
$stmtReviews = mysqli_prepare($koneksi, $queryReviews);
if ($stmtReviews) {
  mysqli_stmt_bind_param($stmtReviews, 'i', $eventId);
  mysqli_stmt_execute($stmtReviews);
  $execReviews = mysqli_stmt_get_result($stmtReviews);

  if ($execReviews) {
    while ($reviewRow = mysqli_fetch_assoc($execReviews)) {
      $reviews[] = $reviewRow;
    }
  }

  mysqli_stmt_close($stmtReviews);
}

$carouselImages = [];

if (!empty($event['gallery_carousel'])) {
  $decoded = json_decode($event['gallery_carousel'], true);
  if (is_array($decoded)) {
    $carouselImages = array_values(array_filter($decoded, fn($item) => is_string($item) && trim($item) !== ''));
  }
}

if (empty($carouselImages) && !empty($event['thumnail'])) {
  $carouselImages[] = $event['thumnail'];
}

if (empty($carouselImages)) {
  $carouselImages[] = 'assets/images/hero-event.svg';
}

$galleryTop = array_slice($carouselImages, 0, 3);
$galleryTopCount = count($galleryTop);
while ($galleryTopCount < 3) {
  $galleryTop[] = $galleryTop[$galleryTopCount - 1] ?? 'assets/images/hero-event.svg';
  $galleryTopCount++;
}

$eventDateLabel = $event['start_date'];
if (!empty($event['end_date']) && $event['end_date'] !== $event['start_date']) {
  $eventDateLabel .= ' - ' . $event['end_date'];
}

function renderStars($rating)
{
  $rating = max(1, min(5, (int) $rating));
  return str_repeat('★', $rating) . str_repeat('☆', 5 - $rating);
}

function formatReviewDate($value)
{
  $timestamp = strtotime((string) $value);
  if (! $timestamp) {
    return htmlspecialchars((string) $value);
  }

  return date('d M Y H:i', $timestamp);
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= htmlspecialchars($event['title']) ?> - EvenTura</title>
  <link rel="stylesheet" type="text/css" href="css/detailEvent.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
</head>
<body>

<?php
  $navMode = "profile";
  $navActive = "event";
  include 'templates/navbar.php';
?>

  <section class="event">
    <div class="event-header">
      <a href="jelajah.php"><span class="event-label">Event </span></a>
      <span class="event-title"><?= htmlspecialchars($event['title']) ?></span>
    </div>
    <div class="event-gallery-top">
      <div class="gallery-main-wrapper">
        <button class="gallery-select gallery-main-select<?= 0 === 0 ? ' is-active' : '' ?>" type="button" data-slide="0" aria-label="Tampilkan gambar pertama">
          <img src="<?= htmlspecialchars($galleryTop[0]) ?>" class="gallery-main" alt="<?= htmlspecialchars($event['title']) ?>">
        </button>
      </div>

      <div class="gallery-right">
        <div class="gallery-right-item">
          <button class="gallery-select gallery-sub-select" type="button" data-slide="1" aria-label="Tampilkan gambar kedua">
            <img src="<?= htmlspecialchars($galleryTop[1] ?? $galleryTop[0]) ?>" class="gallery-sub" alt="<?= htmlspecialchars($event['title']) ?>">
          </button>
        </div>
        <div class="gallery-right-item">
          <button class="gallery-select gallery-sub-select" type="button" data-slide="2" aria-label="Tampilkan gambar ketiga">
            <img src="<?= htmlspecialchars($galleryTop[2] ?? $galleryTop[0]) ?>" class="gallery-sub" alt="<?= htmlspecialchars($event['title']) ?>">
          </button>
        </div>
      </div>
    </div>
  </section>

  <div class="content-wrapper">
    <div class="detail-content">
      <h1><?= htmlspecialchars($event['title']) ?></h1>
      <p><?= nl2br(htmlspecialchars($event['description'])) ?></p>
    </div>
    <div class="sidebar">
      <?php if ($currentUserId > 0): ?>
        <button
          class="btn btn-fav<?= $isFavorited ? ' is-active' : '' ?>"
          id="favoriteButton"
          type="button"
          data-event-id="<?= $eventId ?>"
          data-active-label="Hapus dari Favorit"
          data-inactive-label="Tambahkan ke Favorit"
          aria-pressed="<?= $isFavorited ? 'true' : 'false' ?>"
        ><?= $isFavorited ? 'Hapus dari Favorit' : 'Tambahkan ke Favorit' ?></button>
        <button
          class="btn btn-like<?= $isLiked ? ' is-active' : '' ?>"
          id="likeButton"
          type="button"
          data-event-id="<?= $eventId ?>"
          data-active-label="Batalkan Suka"
          data-inactive-label="Sukai"
          aria-pressed="<?= $isLiked ? 'true' : 'false' ?>"
        ><?= $isLiked ? 'Batalkan Suka' : 'Sukai' ?></button>
        <button class="btn btn-share" type="button">
          <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <circle cx="18" cy="5" r="3"></circle>
            <circle cx="6" cy="12" r="3"></circle>
            <circle cx="18" cy="19" r="3"></circle>
            <line x1="8.59" y1="13.51" x2="15.42" y2="17.49"></line>
            <line x1="15.41" y1="6.51" x2="8.59" y2="10.49"></line>
          </svg>
          Bagikan
        </button>
        <p class="sidebar-feedback" id="sidebarFeedback" aria-live="polite"></p>
      <?php else: ?>
        <div class="review-login-card review-login-card--sidebar">
          <p class="review-login-text">Login diperlukan untuk menyimpan event ke favorit atau daftar suka.</p>
          <a class="review-login-button" href="login.php">Login untuk menyimpan event</a>
        </div>
      <?php endif; ?>
    </div>
  </div>

  <div class="divider"></div>

  <div class="info-gallery-container">
    <div class="carousel-wrapper">
      <div class="event-gallery">
        <button class="carousel-btn carousel-btn-prev" type="button" onclick="prevSlide()">❮</button>
        <img id="slider" src="<?= htmlspecialchars($carouselImages[0]) ?>" alt="Event Gallery">
        <button class="carousel-btn carousel-btn-next" type="button" onclick="nextSlide()">❯</button>
      </div>
      <div class="slider-dots" id="sliderDots"></div>
    </div>
    <div class="info-boxes">
      <div class="info-box">
        <h3><span class="info-icon">◷</span>Tanggal & Waktu</h3>
        <p><strong><?= htmlspecialchars($eventDateLabel) ?></strong></p>
        <p class="info-highlight"><?= htmlspecialchars($event['category']) ?></p>
      </div>
      <div class="info-box">
        <h3><span class="info-icon">◉</span>Lokasi</h3>
        <p><strong><?= htmlspecialchars($event['location']) ?></strong></p>
        <p><?= htmlspecialchars($event['city']) ?></p>
      </div>
    </div>
  </div>

  <div class="reviews">
    <h2>Ulasan</h2>
    <?php if (isset($_SESSION['user_id'])): ?>
      <form class="review-form" id="reviewForm">
        <input type="hidden" name="event_id" value="<?= $eventId ?>">
        <div class="review-compose">
          <div class="review-compose__top">
            <div>
              <p class="review-compose__eyebrow">Bagikan pengalaman Anda</p>
              <h3 class="review-compose__title">Tulis ulasan untuk event ini</h3>
            </div>
            <div class="star-picker" id="starPicker" aria-label="Pilih rating">
              <?php for ($ratingValue = 1; $ratingValue <= 5; $ratingValue++): ?>
                <button class="star-picker__button" type="button" data-rating="<?= $ratingValue ?>" aria-label="Beri rating <?= $ratingValue ?> bintang">★</button>
              <?php endfor; ?>
            </div>
          </div>
          <input type="hidden" name="rating" id="ratingInput" value="0">
          <textarea class="input-review" id="reviewDescription" name="review_description" placeholder="Tulis ulasan Anda tentang event ini"></textarea>
          <div class="review-compose__footer">
            <p class="review-feedback" id="reviewFeedback" aria-live="polite"></p>
            <button class="btn-submit" type="submit" name="submit-review">Kirim Ulasan</button>
          </div>
        </div>
      </form>
    <?php else: ?>
      <div class="review-login-card">
        <p class="review-login-text">Login diperlukan untuk menambahkan ulasan pada event ini.</p>
        <a class="review-login-button" href="login.php">Login untuk memberi ulasan</a>
      </div>
    <?php endif; ?>

    <div class="review-list" id="reviewList">
      <?php if (! empty($reviews)): ?>
        <?php foreach ($reviews as $review): ?>
          <article class="review-card" data-review-id="<?= (int) $review['id'] ?>">
            <div class="review-header">
              <div class="review-user">
                <div class="review-avatar"></div>
                <div class="review-info">
                  <h4><?= htmlspecialchars($review['user_name']) ?></h4>
                  <p class="review-tgl"><?= htmlspecialchars(formatReviewDate($review['created_at'])) ?></p>
                </div>
              </div>
              <div class="stars" aria-label="Rating <?= (int) $review['rating'] ?> dari 5">
                <?= htmlspecialchars(renderStars($review['rating'])) ?>
              </div>
            </div>
            <p class="review-text"><?= nl2br(htmlspecialchars($review['review_description'])) ?></p>
            <?php if (isset($_SESSION['user_id']) && (int) $_SESSION['user_id'] === (int) $review['user_id']): ?>
              <div class="review-actions">
                <button class="review-delete-button" type="button" data-review-delete="<?= (int) $review['id'] ?>">Hapus</button>
              </div>
            <?php endif; ?>
          </article>
        <?php endforeach; ?>
      <?php else: ?>
        <div class="review-empty" id="reviewEmpty">Belum ada ulasan untuk event ini.</div>
      <?php endif; ?>
    </div>
  </div>

  <?php include("templates/footer.php"); ?>
  <script>
    const carouselImages = <?= json_encode(array_values($carouselImages), JSON_UNESCAPED_SLASHES) ?>;
    const isLoggedIn = <?= $currentUserId > 0 ? 'true' : 'false' ?>;
    let currentSlide = 0;

    function renderSlide() {
      const slider = document.getElementById('slider');
      const dots = document.getElementById('sliderDots');
      if (!slider || !dots || carouselImages.length === 0) return;

      slider.src = carouselImages[currentSlide];
      dots.innerHTML = '';

      carouselImages.forEach((_, index) => {
        const dot = document.createElement('button');
        dot.type = 'button';
        dot.className = 'slider-dot' + (index === currentSlide ? ' active' : '');
        dot.addEventListener('click', () => {
          currentSlide = index;
          renderSlide();
        });
        dots.appendChild(dot);
      });

      document.querySelectorAll('[data-slide]').forEach((button) => {
        const slideIndex = Number(button.getAttribute('data-slide'));
        button.classList.toggle('is-active', slideIndex === currentSlide);
        button.addEventListener('click', () => {
          currentSlide = slideIndex;
          renderSlide();
        });
      });
    }

    function prevSlide() {
      currentSlide = (currentSlide - 1 + carouselImages.length) % carouselImages.length;
      renderSlide();
    }

    function nextSlide() {
      currentSlide = (currentSlide + 1) % carouselImages.length;
      renderSlide();
    }

    renderSlide();

    if (isLoggedIn) {
      const sidebarFeedback = document.getElementById('sidebarFeedback');

      async function toggleEventState(button, endpoint) {
        if (!button) {
          return;
        }

        button.disabled = true;
        if (sidebarFeedback) {
          sidebarFeedback.textContent = 'Memproses...';
          sidebarFeedback.classList.remove('is-error');
        }

        try {
          const formData = new FormData();
          formData.append('event_id', button.dataset.eventId);

          const response = await fetch(endpoint, {
            method: 'POST',
            body: formData,
            headers: {
              'X-Requested-With': 'XMLHttpRequest'
            }
          });

          const result = await response.json();

          if (!response.ok || !result.success) {
            throw new Error(result.message || 'Permintaan gagal diproses.');
          }

          const isActive = Boolean(result.is_active);
          button.classList.toggle('is-active', isActive);
          button.setAttribute('aria-pressed', isActive ? 'true' : 'false');
          button.textContent = isActive ? button.dataset.activeLabel : button.dataset.inactiveLabel;

          if (sidebarFeedback) {
            sidebarFeedback.textContent = result.message;
            sidebarFeedback.classList.remove('is-error');
          }
        } catch (error) {
          if (sidebarFeedback) {
            sidebarFeedback.textContent = error.message;
            sidebarFeedback.classList.add('is-error');
          }
        } finally {
          button.disabled = false;
        }
      }

      const favoriteButton = document.getElementById('favoriteButton');
      const likeButton = document.getElementById('likeButton');

      if (favoriteButton) {
        favoriteButton.addEventListener('click', () => {
          toggleEventState(favoriteButton, 'process/toggleFavorite.php');
        });
      }

      if (likeButton) {
        likeButton.addEventListener('click', () => {
          toggleEventState(likeButton, 'process/toggleLike.php');
        });
      }
    }

    if (isLoggedIn) {
      const reviewForm = document.getElementById('reviewForm');
      const starPicker = document.getElementById('starPicker');
      const ratingInput = document.getElementById('ratingInput');
      const reviewFeedback = document.getElementById('reviewFeedback');
      const reviewList = document.getElementById('reviewList');
      const reviewDescription = document.getElementById('reviewDescription');
      let activeRating = 0;

      function escapeHtml(value) {
        return String(value)
          .replace(/&/g, '&amp;')
          .replace(/</g, '&lt;')
          .replace(/>/g, '&gt;')
          .replace(/"/g, '&quot;')
          .replace(/'/g, '&#039;');
      }

      function renderStarPicker(rating) {
        starPicker.querySelectorAll('[data-rating]').forEach((button) => {
          const buttonRating = Number(button.dataset.rating);
          button.classList.toggle('is-active', buttonRating <= rating);
        });
      }

      function buildReviewCard(review) {
        return `
          <article class="review-card review-card--new" data-review-id="${review.id}">
            <div class="review-header">
              <div class="review-user">
                <div class="review-avatar"></div>
                <div class="review-info">
                  <h4>${escapeHtml(review.user_name)}</h4>
                  <p class="review-tgl">${escapeHtml(review.created_at_label)}</p>
                </div>
              </div>
              <div class="stars" aria-label="Rating ${review.rating} dari 5">${escapeHtml(review.stars)}</div>
            </div>
            <p class="review-text">${escapeHtml(review.review_description).replace(/\n/g, '<br>')}</p>
            ${review.can_delete ? `<div class="review-actions"><button class="review-delete-button" type="button" data-review-delete="${review.id}">Hapus</button></div>` : ''}
          </article>
        `;
      }

      async function handleDeleteReview(button) {
        const reviewId = Number(button.dataset.reviewDelete);
        if (!reviewId) {
          return;
        }

        const confirmed = window.confirm('Hapus ulasan ini?');
        if (!confirmed) {
          return;
        }

        button.disabled = true;

        try {
          const formData = new FormData();
          formData.append('review_id', String(reviewId));
          formData.append('event_id', '<?= $eventId ?>');

          const response = await fetch('process/deleteReview.php', {
            method: 'POST',
            body: formData,
            headers: {
              'X-Requested-With': 'XMLHttpRequest'
            }
          });

          const result = await response.json();

          if (!response.ok || !result.success) {
            throw new Error(result.message || 'Gagal menghapus ulasan.');
          }

          const reviewCard = reviewList.querySelector(`[data-review-id="${reviewId}"]`);
          if (reviewCard) {
            reviewCard.remove();
          }

          if (!reviewList.querySelector('.review-card')) {
            reviewList.innerHTML = '<div class="review-empty" id="reviewEmpty">Belum ada ulasan untuk event ini.</div>';
          }

          reviewFeedback.textContent = result.message;
          reviewFeedback.classList.remove('is-error');
        } catch (error) {
          reviewFeedback.textContent = error.message;
          reviewFeedback.classList.add('is-error');
          button.disabled = false;
        }
      }

      starPicker.querySelectorAll('[data-rating]').forEach((button) => {
        button.addEventListener('click', () => {
          activeRating = Number(button.dataset.rating);
          ratingInput.value = String(activeRating);
          renderStarPicker(activeRating);
          reviewFeedback.textContent = '';
        });
      });

      reviewForm.addEventListener('submit', async (event) => {
        event.preventDefault();

        if (Number(ratingInput.value) < 1 || Number(ratingInput.value) > 5) {
          reviewFeedback.textContent = 'Pilih rating bintang terlebih dahulu.';
          reviewFeedback.classList.add('is-error');
          return;
        }

        if (reviewDescription.value.trim() === '') {
          reviewFeedback.textContent = 'Ulasan tidak boleh kosong.';
          reviewFeedback.classList.add('is-error');
          return;
        }

        reviewFeedback.textContent = 'Mengirim ulasan...';
        reviewFeedback.classList.remove('is-error');

        const formData = new FormData(reviewForm);

        try {
          const response = await fetch('process/addReview.php', {
            method: 'POST',
            body: formData,
            headers: {
              'X-Requested-With': 'XMLHttpRequest'
            }
          });

          const result = await response.json();

          if (!response.ok || !result.success) {
            throw new Error(result.message || 'Gagal menyimpan ulasan.');
          }

          const emptyState = document.getElementById('reviewEmpty');
          if (emptyState) {
            emptyState.remove();
          }

          reviewList.insertAdjacentHTML('afterbegin', buildReviewCard(result.review));
          reviewForm.reset();
          activeRating = 0;
          ratingInput.value = '0';
          renderStarPicker(activeRating);
          reviewFeedback.textContent = result.message;
        } catch (error) {
          reviewFeedback.textContent = error.message;
          reviewFeedback.classList.add('is-error');
        }
      });

      reviewList.addEventListener('click', (event) => {
        const button = event.target.closest('[data-review-delete]');
        if (!button) {
          return;
        }

        handleDeleteReview(button);
      });
    }
  </script>
</body>
</html>
