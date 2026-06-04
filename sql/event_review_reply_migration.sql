ALTER TABLE event_reviews
ADD COLUMN admin_reply TEXT NULL AFTER rating,
ADD COLUMN reply_by_role ENUM('user', 'admin') NULL AFTER admin_reply;
