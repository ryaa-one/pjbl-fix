-- Master data: categories, provinces, cities
-- Jalankan sekali saat setup database.
-- category_id: 0 = reserved untuk filter "Semua", 1=Budaya, 2=Musik, 3=Seni

-- ── Tabel categories ──────────────────────────────────────────────────────────
CREATE TABLE IF NOT EXISTS categories (
    id   INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL
);

INSERT INTO categories (id, name) VALUES
    (1, 'Budaya'),
    (2, 'Musik'),
    (3, 'Seni')
ON DUPLICATE KEY UPDATE name = VALUES(name);

-- ── Tabel provinces ───────────────────────────────────────────────────────────
CREATE TABLE IF NOT EXISTS provinces (
    id   INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL
);

INSERT INTO provinces (id, name) VALUES
    (1,  'Aceh'),
    (2,  'Sumatera Utara'),
    (3,  'Sumatera Barat'),
    (4,  'Riau'),
    (5,  'Jambi'),
    (6,  'Sumatera Selatan'),
    (7,  'Bengkulu'),
    (8,  'Lampung'),
    (9,  'Kepulauan Bangka Belitung'),
    (10, 'Kepulauan Riau'),
    (11, 'DKI Jakarta'),
    (12, 'Jawa Barat'),
    (13, 'Jawa Tengah'),
    (14, 'DI Yogyakarta'),
    (15, 'Jawa Timur'),
    (16, 'Banten'),
    (17, 'Bali'),
    (18, 'Nusa Tenggara Barat'),
    (19, 'Nusa Tenggara Timur'),
    (20, 'Kalimantan Barat'),
    (21, 'Kalimantan Tengah'),
    (22, 'Kalimantan Selatan'),
    (23, 'Kalimantan Timur'),
    (24, 'Kalimantan Utara'),
    (25, 'Sulawesi Utara'),
    (26, 'Sulawesi Tengah'),
    (27, 'Sulawesi Selatan'),
    (28, 'Sulawesi Tenggara'),
    (29, 'Gorontalo'),
    (30, 'Sulawesi Barat'),
    (31, 'Maluku'),
    (32, 'Maluku Utara'),
    (33, 'Papua Barat'),
    (34, 'Papua')
ON DUPLICATE KEY UPDATE name = VALUES(name);

-- ── Tabel cities (dengan province_id) ────────────────────────────────────────
-- Hapus tabel lama jika strukturnya belum punya kolom province_id,
-- atau jalankan ALTER berikut jika sudah ada:
--   ALTER TABLE cities ADD COLUMN IF NOT EXISTS province_id INT UNSIGNED NULL;
-- Untuk instalasi baru, buat ulang:
CREATE TABLE IF NOT EXISTS cities (
    id          INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    province_id INT UNSIGNED NOT NULL,
    name        VARCHAR(100) NOT NULL,
    INDEX idx_province_id (province_id)
);

-- Contoh data kota (tambahkan sesuai kebutuhan)
INSERT INTO cities (province_id, name) VALUES
    -- DKI Jakarta (11)
    (11, 'Jakarta Pusat'),
    (11, 'Jakarta Utara'),
    (11, 'Jakarta Barat'),
    (11, 'Jakarta Selatan'),
    (11, 'Jakarta Timur'),
    -- Jawa Barat (12)
    (12, 'Bandung'),
    (12, 'Bogor'),
    (12, 'Bekasi'),
    (12, 'Depok'),
    (12, 'Cimahi'),
    (12, 'Tasikmalaya'),
    (12, 'Sukabumi'),
    -- Jawa Tengah (13)
    (13, 'Semarang'),
    (13, 'Solo'),
    (13, 'Magelang'),
    (13, 'Pekalongan'),
    (13, 'Tegal'),
    -- DI Yogyakarta (14)
    (14, 'Yogyakarta'),
    (14, 'Sleman'),
    (14, 'Bantul'),
    (14, 'Gunungkidul'),
    (14, 'Kulonprogo'),
    -- Jawa Timur (15)
    (15, 'Surabaya'),
    (15, 'Malang'),
    (15, 'Kediri'),
    (15, 'Blitar'),
    (15, 'Madiun'),
    (15, 'Mojokerto'),
    (15, 'Pasuruan'),
    (15, 'Probolinggo'),
    -- Bali (17)
    (17, 'Denpasar'),
    (17, 'Badung'),
    (17, 'Gianyar'),
    (17, 'Tabanan'),
    (17, 'Buleleng'),
    -- Sumatera Utara (2)
    (2, 'Medan'),
    (2, 'Binjai'),
    (2, 'Pematangsiantar'),
    (2, 'Tebing Tinggi'),
    -- Sumatera Barat (3)
    (3, 'Padang'),
    (3, 'Bukittinggi'),
    (3, 'Payakumbuh'),
    -- Kalimantan Timur (23)
    (23, 'Samarinda'),
    (23, 'Balikpapan'),
    (23, 'Bontang'),
    -- Sulawesi Selatan (27)
    (27, 'Makassar'),
    (27, 'Parepare'),
    (27, 'Palopo')
ON DUPLICATE KEY UPDATE name = VALUES(name);

-- ── Tabel event_reviews ───────────────────────────────────────────────────────
CREATE TABLE IF NOT EXISTS event_reviews (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    event_id INT UNSIGNED NOT NULL,
    user_id INT UNSIGNED NOT NULL,
    review_description TEXT NOT NULL,
    rating TINYINT UNSIGNED NOT NULL,
    admin_reply TEXT NULL,
    created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    INDEX idx_event_reviews_event_id (event_id),
    INDEX idx_event_reviews_user_id (user_id)
);

-- ── Tabel event_favourites ────────────────────────────────────────────────────
CREATE TABLE IF NOT EXISTS event_favourites (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    event_id INT UNSIGNED NOT NULL,
    user_id INT UNSIGNED NOT NULL,
    created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    INDEX idx_event_favourites_event_id (event_id),
    INDEX idx_event_favourites_user_id (user_id)
);

-- ── Tabel event_likes ─────────────────────────────────────────────────────────
CREATE TABLE IF NOT EXISTS event_likes (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    event_id INT UNSIGNED NOT NULL,
    user_id INT UNSIGNED NOT NULL,
    created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    INDEX idx_event_likes_event_id (event_id),
    INDEX idx_event_likes_user_id (user_id)
);
