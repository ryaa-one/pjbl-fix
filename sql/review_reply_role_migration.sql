-- Tambahkan metadata pembalas ulasan.
-- Jalankan setelah kolom event_reviews.admin_reply tersedia.

ALTER TABLE event_reviews
ADD COLUMN reply_by_role ENUM('user', 'admin') NULL AFTER admin_reply;

-- Balasan lama diasumsikan berasal dari pemilik event karena sebelumnya
-- hanya pemilik event yang memiliki tombol balas pada halaman detail.
UPDATE event_reviews
SET reply_by_role = 'user'
WHERE admin_reply IS NOT NULL
  AND TRIM(admin_reply) <> ''
  AND reply_by_role IS NULL;
