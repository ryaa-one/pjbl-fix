-- Bersihkan duplikasi sebelum menambahkan unique key.
DELETE duplicate_likes
FROM event_likes AS duplicate_likes
INNER JOIN event_likes AS original_likes
    ON original_likes.event_id = duplicate_likes.event_id
   AND original_likes.user_id = duplicate_likes.user_id
   AND original_likes.id < duplicate_likes.id;

DELETE duplicate_favourites
FROM event_favourites AS duplicate_favourites
INNER JOIN event_favourites AS original_favourites
    ON original_favourites.event_id = duplicate_favourites.event_id
   AND original_favourites.user_id = duplicate_favourites.user_id
   AND original_favourites.id < duplicate_favourites.id;

ALTER TABLE event_likes
  ADD UNIQUE KEY uq_event_likes_event_user (event_id, user_id);

ALTER TABLE event_favourites
  ADD UNIQUE KEY uq_event_favourites_event_user (event_id, user_id);
