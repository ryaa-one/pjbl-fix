-- Migrasi role EvenTura:
--   super_admin lama -> admin
--   admin lama       -> user
--
-- Backup database sebelum menjalankan file ini.
-- File ini hanya mengubah role pada tabel users.

START TRANSACTION;

-- Pertahankan nilai lama sementara agar konversi tidak terpotong oleh ENUM.
ALTER TABLE users
  MODIFY level ENUM('user', 'admin', 'super_admin') NOT NULL DEFAULT 'user';

CREATE TABLE IF NOT EXISTS app_migrations (
  name VARCHAR(190) PRIMARY KEY,
  applied_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
);

-- Jalankan konversi hanya satu kali agar admin baru tidak berubah menjadi user
-- jika file migrasi dijalankan ulang.
UPDATE users
SET level = 'user'
WHERE level = 'admin'
  AND NOT EXISTS (
    SELECT 1
    FROM app_migrations
    WHERE name = 'two_role_only'
  );

UPDATE users
SET level = 'admin'
WHERE level = 'super_admin'
  AND NOT EXISTS (
    SELECT 1
    FROM app_migrations
    WHERE name = 'two_role_only'
  );

INSERT IGNORE INTO app_migrations (name)
VALUES ('two_role_only');

-- Setelah konversi selesai, database hanya menerima role baru.
ALTER TABLE users
  MODIFY level ENUM('user', 'admin') NOT NULL DEFAULT 'user';

COMMIT;

-- Verifikasi hasil migrasi.
SELECT level, COUNT(*) AS total
FROM users
GROUP BY level
ORDER BY level;
