-- Migrasi EvenTura: super_admin lama -> admin, admin lama -> user.
-- Backup database sebelum menjalankan file ini.

START TRANSACTION;

-- ENUM sementara tetap memuat nilai lama agar update data tidak terpotong.
ALTER TABLE users
  MODIFY level ENUM('user', 'admin', 'super_admin') NOT NULL DEFAULT 'user';

CREATE TABLE IF NOT EXISTS app_migrations (
  name VARCHAR(190) PRIMARY KEY,
  applied_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
);

UPDATE users
SET level = 'user'
WHERE level = 'admin'
  AND NOT EXISTS (SELECT 1 FROM app_migrations WHERE name = 'two_role_event_moderation');
UPDATE users
SET level = 'admin'
WHERE level = 'super_admin'
  AND NOT EXISTS (SELECT 1 FROM app_migrations WHERE name = 'two_role_event_moderation');
INSERT IGNORE INTO app_migrations (name) VALUES ('two_role_event_moderation');

ALTER TABLE users
  MODIFY level ENUM('user', 'admin') NOT NULL DEFAULT 'user';

SET @events_status_existed = (
  SELECT COUNT(*)
  FROM information_schema.COLUMNS
  WHERE TABLE_SCHEMA = DATABASE()
    AND TABLE_NAME = 'events'
    AND COLUMN_NAME = 'status'
);

SET @add_events_status_sql = IF(
  @events_status_existed = 0,
  "ALTER TABLE events ADD COLUMN status ENUM('pending', 'approved', 'rejected') NOT NULL DEFAULT 'pending'",
  'SELECT 1'
);
PREPARE add_events_status_statement FROM @add_events_status_sql;
EXECUTE add_events_status_statement;
DEALLOCATE PREPARE add_events_status_statement;

SET @events_rejection_reason_existed = (
  SELECT COUNT(*)
  FROM information_schema.COLUMNS
  WHERE TABLE_SCHEMA = DATABASE()
    AND TABLE_NAME = 'events'
    AND COLUMN_NAME = 'rejection_reason'
);
SET @add_events_rejection_reason_sql = IF(
  @events_rejection_reason_existed = 0,
  'ALTER TABLE events ADD COLUMN rejection_reason TEXT NULL',
  'SELECT 1'
);
PREPARE add_events_rejection_reason_statement FROM @add_events_rejection_reason_sql;
EXECUTE add_events_rejection_reason_statement;
DEALLOCATE PREPARE add_events_rejection_reason_statement;

-- Jalankan sebelum aplikasi baru menerima submission: event lama tetap publik.
UPDATE events SET status = 'approved' WHERE @events_status_existed = 0 AND status = 'pending';

CREATE TABLE IF NOT EXISTS event_update_requests (
  id INT AUTO_INCREMENT PRIMARY KEY,
  event_id INT NOT NULL,
  user_id INT NOT NULL,
  title VARCHAR(255),
  description TEXT,
  category_id INT,
  city_id INT,
  start_date DATETIME,
  end_date DATETIME,
  location VARCHAR(255),
  thumbnail VARCHAR(255),
  gallery_carousel TEXT,
  status ENUM('pending', 'approved', 'rejected') NOT NULL DEFAULT 'pending',
  rejection_reason TEXT NULL,
  created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  INDEX idx_event_update_requests_event_id (event_id),
  INDEX idx_event_update_requests_user_id (user_id),
  INDEX idx_event_update_requests_status (status)
);

CREATE TABLE IF NOT EXISTS event_moderation_history (
  id INT AUTO_INCREMENT PRIMARY KEY,
  event_id INT NOT NULL,
  update_request_id INT NULL,
  admin_id INT NOT NULL,
  action ENUM('event_approved', 'event_rejected', 'edit_approved', 'edit_rejected') NOT NULL,
  reason TEXT NULL,
  created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  INDEX idx_event_moderation_history_event_id (event_id),
  INDEX idx_event_moderation_history_admin_id (admin_id)
);

-- Bersihkan duplikasi sebelum menambah unique key engagement.
CREATE TABLE IF NOT EXISTS event_likes_duplicate_archive (
  original_id BIGINT UNSIGNED,
  event_id INT UNSIGNED,
  user_id INT UNSIGNED,
  created_at TIMESTAMP NULL,
  archived_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
);
INSERT INTO event_likes_duplicate_archive (original_id, event_id, user_id, created_at)
SELECT duplicate_likes.id, duplicate_likes.event_id, duplicate_likes.user_id, duplicate_likes.created_at
FROM event_likes AS duplicate_likes
INNER JOIN event_likes AS original_likes
  ON original_likes.event_id = duplicate_likes.event_id
 AND original_likes.user_id = duplicate_likes.user_id
 AND original_likes.id < duplicate_likes.id;

DELETE duplicate_likes FROM event_likes AS duplicate_likes
INNER JOIN event_likes AS original_likes
  ON original_likes.event_id = duplicate_likes.event_id
 AND original_likes.user_id = duplicate_likes.user_id
 AND original_likes.id < duplicate_likes.id;

CREATE TABLE IF NOT EXISTS event_favourites_duplicate_archive (
  original_id BIGINT UNSIGNED,
  event_id INT UNSIGNED,
  user_id INT UNSIGNED,
  created_at TIMESTAMP NULL,
  archived_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
);
INSERT INTO event_favourites_duplicate_archive (original_id, event_id, user_id, created_at)
SELECT duplicate_favourites.id, duplicate_favourites.event_id, duplicate_favourites.user_id, duplicate_favourites.created_at
FROM event_favourites AS duplicate_favourites
INNER JOIN event_favourites AS original_favourites
  ON original_favourites.event_id = duplicate_favourites.event_id
 AND original_favourites.user_id = duplicate_favourites.user_id
 AND original_favourites.id < duplicate_favourites.id;

DELETE duplicate_favourites FROM event_favourites AS duplicate_favourites
INNER JOIN event_favourites AS original_favourites
  ON original_favourites.event_id = duplicate_favourites.event_id
 AND original_favourites.user_id = duplicate_favourites.user_id
 AND original_favourites.id < duplicate_favourites.id;

COMMIT;

DELIMITER //
DROP PROCEDURE IF EXISTS add_two_role_constraint_if_missing//
DROP PROCEDURE IF EXISTS add_two_role_index_if_missing//
CREATE PROCEDURE add_two_role_constraint_if_missing(
  IN constraint_name_value VARCHAR(128),
  IN alter_statement TEXT
)
BEGIN
  IF NOT EXISTS (
    SELECT 1
    FROM information_schema.TABLE_CONSTRAINTS
    WHERE CONSTRAINT_SCHEMA = DATABASE()
      AND CONSTRAINT_NAME = constraint_name_value
  ) THEN
    SET @constraint_sql = alter_statement;
    PREPARE constraint_statement FROM @constraint_sql;
    EXECUTE constraint_statement;
    DEALLOCATE PREPARE constraint_statement;
  END IF;
END//

CREATE PROCEDURE add_two_role_index_if_missing(
  IN table_name_value VARCHAR(128),
  IN index_name_value VARCHAR(128),
  IN alter_statement TEXT
)
BEGIN
  IF NOT EXISTS (
    SELECT 1
    FROM information_schema.STATISTICS
    WHERE TABLE_SCHEMA = DATABASE()
      AND TABLE_NAME = table_name_value
      AND INDEX_NAME = index_name_value
  ) THEN
    SET @index_sql = alter_statement;
    PREPARE index_statement FROM @index_sql;
    EXECUTE index_statement;
    DEALLOCATE PREPARE index_statement;
  END IF;
END//
DELIMITER ;

CALL add_two_role_index_if_missing('event_likes', 'uq_event_likes_event_user', 'ALTER TABLE event_likes ADD UNIQUE KEY uq_event_likes_event_user (event_id, user_id)');
CALL add_two_role_index_if_missing('event_favourites', 'uq_event_favourites_event_user', 'ALTER TABLE event_favourites ADD UNIQUE KEY uq_event_favourites_event_user (event_id, user_id)');
CALL add_two_role_constraint_if_missing('fk_event_update_requests_event', 'ALTER TABLE event_update_requests ADD CONSTRAINT fk_event_update_requests_event FOREIGN KEY (event_id) REFERENCES events(id) ON DELETE CASCADE');
CALL add_two_role_constraint_if_missing('fk_event_update_requests_user', 'ALTER TABLE event_update_requests ADD CONSTRAINT fk_event_update_requests_user FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE');
CALL add_two_role_constraint_if_missing('fk_event_moderation_history_event', 'ALTER TABLE event_moderation_history ADD CONSTRAINT fk_event_moderation_history_event FOREIGN KEY (event_id) REFERENCES events(id) ON DELETE CASCADE');
CALL add_two_role_constraint_if_missing('fk_event_moderation_history_admin', 'ALTER TABLE event_moderation_history ADD CONSTRAINT fk_event_moderation_history_admin FOREIGN KEY (admin_id) REFERENCES users(id) ON DELETE RESTRICT');
CALL add_two_role_constraint_if_missing('fk_event_moderation_history_request', 'ALTER TABLE event_moderation_history ADD CONSTRAINT fk_event_moderation_history_request FOREIGN KEY (update_request_id) REFERENCES event_update_requests(id) ON DELETE SET NULL');

DROP PROCEDURE add_two_role_index_if_missing;
DROP PROCEDURE add_two_role_constraint_if_missing;
