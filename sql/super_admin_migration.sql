ALTER TABLE users
  MODIFY level ENUM('user', 'admin', 'super_admin') NOT NULL DEFAULT 'user';

-- Ganti email dan password hash sesuai akun super admin yang akan dipakai.
-- Password harus dibuat dengan password_hash() dari PHP.
-- INSERT INTO users (name, email, password, level)
-- VALUES ('Super Admin', 'superadmin@example.com', '$2y$10$replace_with_php_password_hash', 'super_admin');
