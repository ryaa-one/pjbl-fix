# Laporan Cleanup EvenTura

Tanggal: 2026-06-02

## File dan Folder Dihapus

- Tidak ada. Asset dan upload runtime tidak dihapus tanpa verifikasi database.

## Folder Di-Rename

- `admin/` lama -> `user/`
- `super admin/` -> `admin/`

## File Di-Rename

- `templates/adminSidebar.php` lama -> `templates/userSidebar.php`
- `templates/superAdminSidebar.php` -> `templates/adminSidebar.php`
- `process/getSuperAdminEvent.php` -> `process/getAdminEvent.php`
- `process/getSuperAdminUsers.php` -> `process/getAdminUsers.php`

## Route dan Path Diperbaiki

- Login password dan Google login: role `admin` -> `admin/dashboard`, role `user` -> `user/dashboard`.
- Navbar: dashboard dan pengaturan akun disesuaikan untuk folder `admin/` dan `user/`.
- Redirect kompatibilitas halaman akun: favorit, disukai, dan pengaturan diarahkan ke folder `user/`.
- Include sidebar seluruh halaman role diperbarui.
- Endpoint daftar event admin diperbarui ke `process/getAdminEvent.php`.
- Deteksi prefix path asset diperbarui untuk folder `admin/` dan `user/`.
- URL modal refresh event user diperbarui ke `/user/event/index.php`.

## Referensi Role Diperbarui

- Kode aktif hanya memakai role `admin` dan `user`.
- Fallback runtime `super_admin` dihapus dari auth, Google OAuth, dan sinkronisasi session profil.
- Referensi `super_admin` pada SQL migrasi dipertahankan sebagai histori upgrade database.

## Asset dan Kandidat Manual

- Tidak ada asset atau gambar dihapus.
- Upload event dan profil wajib diverifikasi terhadap database sebelum penghapusan.
- `gbut.php`, `nyobaLandingPage.php`, `lp1.php`, dan `desain populer/` perlu pengecekan route eksternal/manual sebelum dapat dihapus.
- `.agents/` dan `.codex/` kosong, tetapi tidak dihapus karena merupakan folder metadata workspace.

## Hasil Pengecekan

- Validator lokal memastikan seluruh literal `include` dan `require` PHP menunjuk file yang tersedia.
- Scan kode aktif memastikan tidak ada referensi `super_admin`, `super admin`, `super%20admin`, `superAdmin`, atau `getSuperAdmin`.
- `node --check` lulus untuk `js/gallery.js` dan `js/navbar.js`.
- PHP lint dan smoke test aplikasi belum dapat dijalankan dari WSL: PHP Linux tidak tersedia dan PHP Windows gagal dijalankan melalui WSL interop socket.
- Smoke test HTTP ke `localhost:80` tidak dapat dijalankan karena Laragon tidak sedang melayani port tersebut.
- Pengujian fitur berbasis login, database, upload, Google OAuth, dan browser perlu dijalankan pada Laragon aktif.
