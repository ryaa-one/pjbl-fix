ALTER TABLE users
  ADD COLUMN google_id VARCHAR(255) NULL DEFAULT NULL AFTER email,
  ADD COLUMN avatar VARCHAR(500) NULL DEFAULT NULL AFTER profile_photo,
  ADD UNIQUE KEY uq_users_google_id (google_id);

