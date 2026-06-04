# Audit Pra-Cleanup EvenTura

Tanggal audit: 2026-06-02

## Aman Dirapikan

- Folder `admin/` saat ini dipakai oleh role `user`; rename menjadi `user/`.
- Folder `super admin/` saat ini dipakai oleh role `admin`; rename menjadi `admin/`.
- Template `templates/adminSidebar.php` adalah sidebar role `user`; rename menjadi `templates/userSidebar.php`.
- Template `templates/superAdminSidebar.php` adalah sidebar role `admin`; rename menjadi `templates/adminSidebar.php`.
- Endpoint `process/getSuperAdminEvent.php` dan `process/getSuperAdminUsers.php` masih digunakan role `admin`; rename untuk menghapus istilah role lama.

## Masih Digunakan

- Folder `assets/uploads/events/` dan `uploads/profile/` berisi upload runtime. Referensi file dapat tersimpan di database, sehingga tidak boleh dihapus hanya berdasarkan pencarian source code.
- CSS, JS, gambar, include, route, dan helper yang memiliki minimal satu referensi source code dipertahankan.
- Migrasi SQL lama dipertahankan sebagai histori database.

## Perlu Pengecekan Manual

- `gbut.php`, `nyobaLandingPage.php`, `lp1.php`, dan folder `desain populer/` terlihat seperti hasil eksperimen atau desain lama, tetapi tidak dihapus tanpa konfirmasi route eksternal/manual.
- File upload event yang identik secara byte tidak dihapus karena database dapat menunjuk nama file yang berbeda.
- Asset gambar statis yang tidak ditemukan pada referensi source code belum dihapus sampai data database dan route eksternal diperiksa.

## Batasan Verifikasi

- PHP CLI tidak tersedia pada environment audit, sehingga `php -l` dan smoke test berbasis server PHP belum dapat dijalankan dari shell ini.
