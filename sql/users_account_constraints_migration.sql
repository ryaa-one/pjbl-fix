-- Pastikan data email duplikat dibersihkan sebelum menjalankan migration ini.
ALTER TABLE users
  MODIFY whatsapp VARCHAR(30) NULL DEFAULT NULL,
  MODIFY instagram VARCHAR(50) NULL DEFAULT NULL,
  MODIFY profile_photo VARCHAR(255) NULL DEFAULT NULL,
  ADD UNIQUE KEY uq_users_email (email);

