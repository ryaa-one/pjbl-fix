-- Sample event data for detail page testing
-- Adjust category_id and city_id if your master data uses different IDs.

INSERT INTO events (
  title,
  description,
  category_id,
  city_id,
  user_id,
  start_date,
  end_date,
  location,
  thumnail,
  gallery_carousel,
  view_count,
  is_favourite
) VALUES (
  'Tari Kecak',
  'Tari Kecak adalah pertunjukan drama tari khas Bali yang mengangkat kisah Ramayana. Tarian ini ditarikan oleh puluhan penari laki-laki yang duduk secara melingkar sambil menyerukan "cak cak cak".',
  1,
  1,
  1,
  '2025-06-20',
  '2025-06-20',
  'Pura Uluwatu, Bali',
  'assets/images/tk1.png',
  '["assets/images/tk1.png","assets/images/tk2.jpg","assets/images/tk3.jpg","assets/images/tk1.png"]',
  0,
  0
);
