# Dokumentasi Alur Sistem EvenTura

Tanggal dokumentasi: 3 Juni 2026  
Sumber analisis: kode project PHP EvenTura pada workspace saat ini.

## Daftar Isi

1. [Ringkasan Sistem](#ringkasan-sistem)
2. [Struktur Role dan Hak Akses](#struktur-role-dan-hak-akses)
3. [Navigasi dan Menu](#navigasi-dan-menu)
4. [Alur Publik](#alur-publik)
5. [Autentikasi Manual](#autentikasi-manual)
6. [Google OAuth](#google-oauth)
7. [Forgot Password dan Reset Password](#forgot-password-dan-reset-password)
8. [Jelajah, Search, Filter, dan Pagination](#jelajah-search-filter-dan-pagination)
9. [Detail Event, Views, Like, Favorit, dan Ulasan](#detail-event-views-like-favorit-dan-ulasan)
10. [Area User](#area-user)
11. [Area Admin](#area-admin)
12. [Status Event dan Moderasi](#status-event-dan-moderasi)
13. [Upload Gambar dan File](#upload-gambar-dan-file)
14. [Pengaturan Akun](#pengaturan-akun)
15. [Dashboard dan Statistik](#dashboard-dan-statistik)
16. [Keamanan, Session, dan Redirect](#keamanan-session-dan-redirect)
17. [Relasi Antar Fitur](#relasi-antar-fitur)
18. [Batasan Sistem Saat Ini](#batasan-sistem-saat-ini)
19. [Referensi File Penting](#referensi-file-penting)

## Ringkasan Sistem

EvenTura adalah website pengelolaan dan eksplorasi event daerah. Sistem memiliki area publik untuk melihat event, area user untuk membuat dan mengelola event miliknya, serta area admin untuk mengelola user, semua event, ulasan, dan proses approval.

Ringkasan fitur utama:

- Publik dapat membuka beranda, jelajah event, filter kategori, search, pagination, detail event, login, register, forgot password, dan Google OAuth.
- User dapat membuat event, mengajukan edit event, menghapus event miliknya, melihat dashboard performa event, menyimpan favorit, menyukai event, memberi ulasan, serta membalas ulasan pada event miliknya.
- Admin dapat mengelola semua event, approve/reject event baru, approve/reject request edit event, membuat/edit/delete event secara langsung, mengelola user, menghapus ulasan, dan melihat dashboard global.

Alur besar:

```text
Pengunjung publik
  -> melihat Beranda/Jelajah/Detail approved event
  -> login/register/Google OAuth jika ingin fitur akun

User
  -> membuat event
  -> event masuk status pending
  -> admin approve/reject
  -> jika approved, event muncul di publik
  -> jika user edit event, perubahan masuk request pending edit
  -> admin approve/reject request edit

Admin
  -> mengelola user
  -> mengelola semua event
  -> moderasi event dan request edit
  -> melihat statistik global
```

## Struktur Role dan Hak Akses

Role yang dipakai:

- `user`: pemilik/pembuat event.
- `admin`: pengelola sistem.

Catatan:

- Role lama `super_admin` dinormalisasi menjadi `admin` melalui `auth_normalize_role`.
- Proteksi halaman memakai `require_role`.
- Proteksi endpoint JSON memakai `require_role_json`.
- Jika belum login, halaman biasa redirect ke login, sedangkan endpoint JSON mengembalikan HTTP 401.
- Jika role tidak sesuai, halaman biasa mengembalikan HTTP 403, endpoint JSON mengembalikan HTTP 403 JSON.

Hak akses ringkas:

| Fitur | Publik | User | Admin |
| --- | --- | --- | --- |
| Beranda | Ya | Ya | Ya |
| Jelajah approved event | Ya | Ya | Ya |
| Detail approved event | Ya | Ya | Ya |
| Like/favorit | Tidak | Ya | Tidak |
| Tambah ulasan | Tidak | Ya | Ya, lewat endpoint |
| Hapus ulasan sendiri | Tidak | Ya | Tidak |
// | Balas ulasan event milik sendiri | Tidak | Ya | Tidak |
| Balas/hapus ulasan via endpoint manage | Tidak | Terbatas event miliknya | Ya |
// | CRUD event milik sendiri | Tidak | Ya | Tidak |
| CRUD semua event langsung | Tidak | Tidak | Ya |
| Approval event | Tidak | Tidak | Ya |
| Approval edit event | Tidak | Tidak | Ya |
| Kelola user | Tidak | Tidak | Ya |
| Pengaturan akun sendiri | Tidak | Ya | Ya |

## Navigasi dan Menu

Navbar publik:

- Beranda: `index.php`
- Event: `jelajah.php`
- Tentang kami: `tentangKami.php`
- Masuk: `login.php`
- Daftar: `register.php`

Jika sudah login:

- Nama dan avatar tampil di profile dropdown.
- Dropdown berisi Dashboard, Pengaturan Akun, Logout.
- Jika role `user`, dashboard menuju `user/dashboard`.
- Jika role `admin`, dashboard menuju `admin/dashboard`.

Sidebar user:

- Dashboard
- Event
- Event Favorit
- Event Disukai
- Ulasan
- Pengaturan
- Logout

Sidebar admin:

- Dashboard
- Kelola User
- Kelola Event
- Kelola Ulasan
- Pengaturan
- Logout

## Alur Publik

### Beranda

File utama: `index.php`

Data yang diproses:

- Kategori event dari tabel `categories` yang memiliki minimal 1 event `approved`.
- Event populer dari tabel `events`, hanya `status = 'approved'`.
- Event akan datang, hanya `status = 'approved'` dan `start_date > NOW()`.

Alur:

1. Sistem memastikan kolom metric event tersedia melalui `ensureEventMetricsColumns`.
2. Kategori diambil dari kategori yang punya event approved.
3. Kategori ditampilkan sebagai link ke `jelajah.php?category=ID`.
4. Event populer diambil maksimal 3 event, urut berdasarkan kolom views jika ada, fallback ke `view_count`.
5. Event akan datang diambil maksimal 3 event berdasarkan tanggal terdekat.

Syarat sukses:

- Koneksi database tersedia.
- Data event/kategori ada.

Kondisi kosong:

- Jika tidak ada kategori/event, bagian dinamis tidak menampilkan item.

Ringkasan:

- Beranda hanya menampilkan event yang sudah approved.
- Klik kategori membawa user ke Jelajah dengan filter kategori.

### Tentang Kami

File: `tentangKami.php`

Halaman publik statis untuk informasi tentang website.

## Autentikasi Manual

### Register

Form: `register.php`  
Proses: `process/register.php`

Data input:

- Nama
- Email
- Password

Alur belakang layar:

1. Request harus POST.
2. Email dicek di tabel `users`.
3. Jika email sudah ada, proses berhenti dengan pesan "Email sudah terdaftar".
4. Password di-hash memakai `password_hash`.
5. User baru dibuat dengan:
   - `level = 'user'`
   - `whatsapp = ''`
   - `instagram = ''`
   - `profile_photo = ''`
6. Setelah berhasil, user langsung dimasukkan ke session.
7. `session_regenerate_id(true)` dipanggil.
8. Redirect ke `index.php`.

Kondisi sukses:

- Email belum terdaftar.
- Insert ke tabel `users` berhasil.

Kondisi gagal:

- Method bukan POST.
- Email sudah ada.
- Query gagal.

Ringkasan:

- Register otomatis membuat akun role user dan langsung login.

### Login

Form: `login.php`  
Proses: `process/login.php`

Data input:

- Email
- Password

Alur belakang layar:

1. Request harus POST.
2. Sistem mencari user berdasarkan email.
3. Jika tidak ditemukan, muncul "Email belum terdaftar".
4. Password dicek dengan `password_verify`.
5. Jika salah, muncul "Password salah".
6. Jika benar, session ID diregenerasi.
7. Data user disimpan ke session:
   - `user_id`
   - `email`
   - `nama`
   - `level`
   - `profile_photo`
8. Redirect:
   - admin ke `admin/dashboard`
   - user ke `index.php`

Kondisi gagal:

- Email tidak ditemukan.
- Password salah.
- Level akun selain admin/user menghasilkan 403 dan session dihancurkan.

### Logout

File: `process/logout.php`

Alur:

1. User harus login.
2. `session_unset()`.
3. `session_destroy()`.
4. Cookie session dihapus.
5. Cache header dinonaktifkan.
6. Redirect ke `login.php`.

Ringkasan:

- Logout membersihkan session dan mencegah halaman protected tersimpan cache.

## Google OAuth

File:

- `google-login.php`
- `google-callback.php`
- `includes/google_oauth.php`

Konfigurasi yang dibutuhkan:

- `GOOGLE_CLIENT_ID`
- `GOOGLE_CLIENT_SECRET`
- `GOOGLE_REDIRECT_URI`

Alur login Google:

1. User klik tombol Google di login/register.
2. `google-login.php` membuat Google OAuth client.
3. Sistem membuat state acak 32 byte.
4. State disimpan ke session sebagai `google_oauth_state`.
5. User diarahkan ke Google.

Alur callback:

1. Jika ada `error`, login dibatalkan.
2. State dari Google harus cocok dengan session.
3. Harus ada `code`.
4. Sistem menukar code dengan token.
5. Sistem mengambil Google user info.
6. Email Google harus verified.
7. Sistem mencari user berdasarkan `google_id` jika kolom ada, lalu fallback email.
8. Jika user ditemukan, metadata Google di-update.
9. Jika belum ditemukan, user baru dibuat dengan role `user`.
10. Session dibuat dan ID session diregenerasi.
11. Redirect:
    - admin ke `admin/dashboard`
    - user ke `index.php`

Kondisi gagal:

- Konfigurasi env tidak lengkap.
- State tidak valid.
- Code tidak ada.
- Token gagal dibuat.
- Email Google tidak terverifikasi.
- Insert user Google gagal.

Ringkasan:

- Google OAuth memakai state anti-CSRF.
- Akun Google baru otomatis menjadi role user.

## Forgot Password dan Reset Password

File:

- `lupapw.php`
- `process/forgot_password.php`
- `reset-password.php`
- `process/reset_password.php`
- `includes/password_reset.php`

### Forgot Password

Data input:

- Email

Alur:

1. Request harus POST.
2. Email divalidasi formatnya.
3. Jika format salah, redirect ke `lupapw.php?status=invalid`.
4. Jika format benar, sistem mencari user.
5. Jika user ada:
   - token random 32 byte dibuat.
   - token di-hash SHA-256.
   - token reset lama yang belum dipakai ditandai used.
   - token baru disimpan, expired dalam 1 jam.
   - email reset dikirim via SMTP.
6. Apakah email ditemukan atau tidak, user tetap diarahkan ke `lupapw.php?status=sent`.

Aturan khusus:

- Sistem tidak memberi tahu apakah email terdaftar atau tidak. Ini mengurangi risiko enumerasi email.

### Reset Password

Data input:

- Token
- Password baru
- Konfirmasi password

Validasi:

- Token harus format hex 64 karakter.
- Token harus ada di database.
- Token belum dipakai.
- Token belum expired.
- Password minimal 8 karakter.
- Konfirmasi harus sama.

Alur sukses:

1. Token ditandai `used_at = NOW()`.
2. Password user di-hash.
3. Password user di-update.
4. Redirect ke `login.php?password_reset=success`.

Kondisi gagal:

- Token invalid/expired/used.
- Password terlalu pendek.
- Konfirmasi tidak cocok.
- Update gagal.

Ringkasan:

- Token reset berlaku 1 jam dan hanya sekali pakai.

## Jelajah, Search, Filter, dan Pagination

File: `jelajah.php`

Data URL:

- `category`
- `search`
- `page`

Aturan utama:

- Hanya event `approved` yang ditampilkan.
- Maksimal 9 event per halaman.
- Pagination memakai `LIMIT 9 OFFSET`.
- Jika page lebih kecil dari 1, dipaksa menjadi 1.
- Jika page lebih besar dari total halaman, dipaksa menjadi halaman terakhir.

Search publik Jelajah mendukung:

- `events.title`
- `categories.name`
- `cities.name`
- `events.location`

Search publik Jelajah tidak mendukung:

- `events.description`
- nama penginput
- ID event

Filter kategori:

- Jika `category > 0`, query menambahkan `events.category_id = ?`.
- Link kategori menjaga parameter search.
- Link pagination menjaga parameter category dan search.

Alur:

1. Ambil kategori yang memiliki event approved.
2. Susun kondisi query berdasarkan approved, kategori aktif, search aktif.
3. Hitung total event dengan kondisi yang sama.
4. Hitung total halaman.
5. Ambil event dengan `ORDER BY events.start_date ASC, events.id DESC LIMIT 9 OFFSET`.
6. Render card event.
7. Jika total halaman lebih dari 1, tampilkan Prev, nomor halaman, Next.

Halaman kategori lama:

- `jelajahBudaya.php`
- `jelajahMusik.php`
- `jelajahSeni.php`

Ketiganya mencari ID kategori berdasarkan nama, lalu redirect ke `jelajah.php?category=...`. Parameter `search` dan `page` ikut diteruskan jika ada.

Ringkasan:

- Jelajah adalah pusat listing publik.
- Semua kategori publik akhirnya memakai `jelajah.php`.

## Detail Event, Views, Like, Favorit, dan Ulasan

File: `detailEvent.php`

### Detail Event

Syarat event tampil:

- Parameter `id` valid.
- Event ada.
- Event `status = 'approved'`.

Jika tidak memenuhi:

- Redirect ke `jelajah.php`.

Data yang ditampilkan:

- Judul
- Deskripsi
- Tanggal mulai dan selesai
- Lokasi
- Kota
- Kategori
- Gallery
- WhatsApp/Instagram pemilik event jika tersedia
- Ulasan dan balasan

### Views

Alur:

1. Session menyimpan array `event_views`.
2. Jika event belum pernah dilihat pada session yang sama, `view_count` bertambah 1.
3. Jika event sudah pernah dilihat pada session yang sama, tidak bertambah lagi.

Ringkasan:

- View dihitung sekali per event per session.

### Like

Endpoint: `process/toggleLike.php`

Aturan:

- Request harus POST.
- Harus login sebagai role `user`.
- Event ID wajib valid.
- Event harus approved.

Alur:

1. Cek event approved.
2. Cek apakah user sudah like.
3. Jika sudah, delete like.
4. Jika belum, insert like.
5. Response JSON mengembalikan `is_active`.

Kondisi gagal:

- Method bukan POST: 405.
- Belum login: 401.
- Role bukan user: 403.
- Event ID invalid: 422.
- Event tidak approved/tidak ditemukan: 404.
- Query gagal: 500.

### Favorit

Endpoint: `process/toggleFavorite.php`

Aturan dan alur sama dengan like, tetapi memakai tabel `event_favourites`.

### Ulasan

Endpoint tambah ulasan: `process/addReview.php`

Aturan:

- Harus login.
- Role yang boleh: `user` dan `admin`.
- Event harus approved.
- Rating 1 sampai 5.
- Deskripsi ulasan wajib.

Alur:

1. Validasi login dan role.
2. Validasi event approved.
3. Validasi rating.
4. Validasi isi ulasan.
5. Insert ke `event_reviews`.
6. Response JSON berisi data review baru.

Hapus ulasan sendiri:

- Endpoint: `process/deleteReview.php`
- Hanya role `user`.
- User hanya bisa menghapus ulasan yang `user_id`-nya sama dengan session.

### Balasan Ulasan

Endpoint: `process/manageReview.php`

Role admin:

- Bisa membalas ulasan event apa pun.
- Bisa menghapus ulasan event apa pun.

Role user:

- Bisa membalas ulasan pada event miliknya.
- Bisa menghapus ulasan pada event miliknya.
- Tidak boleh mengelola ulasan yang dibuat oleh dirinya sendiri pada event tersebut.

Field:

- `admin_reply`
- `reply_by_role`, berisi `user` atau `admin`.

Ringkasan:

- Like/favorit hanya untuk user.
- Ulasan dapat dibuat user/admin, tetapi pengelolaan balasan dibatasi berdasarkan role dan kepemilikan event.

## Area User


//pelajari
### Dashboard User

File: `user/dashboard/index.php`

Data yang dihitung:

- Total favorit pada event milik user.
- Total like pada event milik user.
- Total views dari event milik user.
- Likes 30 hari terakhir.
- Likes 30 hari sebelumnya.
- Grafik likes per tanggal dalam 30 hari terakhir.
- Daftar event milik user dengan pagination.

Alur:

1. Sistem mengambil `user_id` dari session.
2. Query agregasi hanya untuk `events.user_id = user_id`.
3. Chart dibuat dari data likes 30 hari terakhir.
4. Daftar event ditampilkan dengan rows per page.

Ringkasan:

- Dashboard user fokus pada performa event milik user login.

### Event User

File listing:

- `user/event/index.php`
- Query helper: `process/getEvent.php`

Fitur:

- List event milik user.
- Search.
- Filter kategori.
- Sort.
- Rows per page.
- Pagination.
- Add event.
- Edit event.
- Delete event.

Search user event mendukung:

- Judul event
- Kategori
- Kota
- Lokasi
- ID event

Filter:

- Berdasarkan kategori.

Sort:

- ID
- Title
- Category
- Date
- Location

Aturan kepemilikan:

- Semua query list user memakai `events.user_id = session user_id`.
- Edit user event juga memvalidasi `events.id = ? AND events.user_id = ?`.
- Delete user event memakai owner ID.

### Create Event User

File: `user/event/create.php`

Status event baru:

- `pending`

Validasi:

- Nama event wajib.
- Deskripsi wajib.
- Kategori wajib.
- Provinsi wajib dan harus ada dalam pilihan.
- Kota/kabupaten wajib dan harus sesuai pilihan.
- Tanggal mulai wajib.
- Lokasi wajib.
- Tanggal selesai tidak boleh lebih awal dari tanggal mulai.
- Thumbnail/gambar wajib.

Upload:

- Multiple upload didukung.
- File pertama menjadi thumbnail.
- Gallery disimpan JSON.

Alur sukses:

1. Validasi form.
2. Upload gambar.
3. Buat kategori jika belum ada.
4. Insert event dengan `status = 'pending'`.
5. Redirect ke `index.php?status=created`.

### Edit Event User

File: `user/event/edit.php`

Aturan:

- User hanya bisa membuka event miliknya.
- Jika event tidak valid/bukan milik user, redirect ke `index.php`.
- Edit tidak langsung mengubah data utama event.

Alur:

1. Ambil event berdasarkan ID dan user login.
2. Validasi form sama seperti create.
3. Kelola gambar lama:
   - tetap dipakai
   - diganti
   - dihapus
4. Upload gambar baru jika ada.
5. Request edit pending lama untuk event/user sama ditolak otomatis dengan alasan "Digantikan request edit terbaru."
6. Insert request baru ke `event_update_requests` dengan `status = 'pending'`.
7. Redirect ke `index.php?status=updated`.

Ringkasan:

- Edit user adalah pengajuan perubahan, bukan update langsung.

### Delete Event User

Alur:

1. User submit delete event ID.
2. Sistem memastikan event milik user.
3. Relasi event dihapus:
   - event_reviews
   - event_likes
   - event_favourites
   - event_update_requests
   - event_moderation_history
4. Event dihapus.
5. File gambar dihapus jika tidak dipakai event/request lain.
6. Redirect `status=deleted`.

### Event Favorit dan Disukai

File:

- `user/favorit/index.php`
- `user/disukai/index.php`
- `user/eventCollection.php`

Aturan:

- Hanya role user.
- Hanya event approved.
- Pagination dan rows per page.

Data:

- Favorit memakai `event_favourites`.
- Disukai memakai `event_likes`.

### Ulasan User

File: `user/ulasan/index.php`

Fitur:

- Menampilkan ulasan yang diberikan orang lain pada event milik user.
- Filter berdasarkan event.
- Rows per page.
- Pagination.
- Balas/edit balasan.
- Hapus balasan.

Aturan:

- Ulasan yang dibuat user pemilik event sendiri tidak ditampilkan.
- Balasan disimpan dengan `reply_by_role = 'user'`.

## Area Admin

### Dashboard Admin

File: `admin/dashboard/index.php`

Data global:

- Total user role user.
- Total event.
- Total ulasan.
- Total pending event, termasuk pending edit.
- Total rejected event.
- Total approved event.
- Event terpopuler berdasarkan views, likes, favorit.
- User dengan event terbanyak.
- Daftar event terbaru.

Catatan:

- File ini juga sempat menghitung metric berbasis admin login, tetapi data tampilan utama admin kemudian memakai agregasi global.

### Kelola Event

File listing:

- `admin/event/index.php`
- Query helper: `process/getAdminEvent.php`

Fitur:

- Melihat semua event.
- Search.
- Filter kategori.
- Sort.
- Pagination.
- Rows per page.
- Create event langsung approved.
- Edit event langsung update.
- Delete event.
- Approve/reject event.
- Review request edit.

Search admin event mendukung:

- Judul
- Kategori
- Kota
- Lokasi
- Nama penginput
- Literal `admin` untuk event yang penginputnya admin/null
- ID event

Sort:

- ID
- Title
- Category
- Date
- Location
- Admin/penginput

### Create Event Admin

File: `admin/event/create.php`

Perbedaan utama dari create user:

- Event admin langsung `status = 'approved'`.
- Tidak perlu approval.

Validasi:

- Sama dengan create event user.

### Edit Event Admin

File: `admin/event/edit.php`

Aturan:

- Admin bisa edit event mana pun.
- Edit langsung update tabel `events`.
- Tidak membuat request edit.

Validasi:

- Sama dengan edit event user.

### Delete Event Admin

Aturan:

- Admin bisa delete event mana pun.
- Relasi dan gambar dihapus melalui helper `deleteEventWithRelations`.

### Kelola User

File:

- `admin/admin/index.php`
- `admin/admin/create.php`
- `admin/admin/edit.php`
- Query helper: `process/getAdmin.php`

Fitur:

- List user dengan `level = 'user'`.
- Search.
- Sort.
- Pagination.
- Create user.
- Edit user.
- Delete user.

Search user admin mendukung:

- Nama
- Email
- ID

Create user:

- Nama wajib.
- Email wajib dan format valid.
- Password wajib.
- Role selalu `user`.
- Email harus unik.
- Password di-hash.

Edit user:

- Hanya user level `user`.
- Nama wajib.
- Email wajib.
- Email tidak boleh dipakai user lain.
- Password baru opsional.
- Role harus tetap `user`.

Delete user:

- Tidak boleh menghapus akun yang sedang login.
- Sebelum user dihapus, event milik user tersebut dipindahkan ke admin yang sedang login.
- Delete hanya akun `level = 'user'`.

### Kelola Ulasan Admin

File: `admin/ulasan/index.php`

Fitur:

- Melihat semua ulasan.
- Filter berdasarkan event.
- Rows per page.
- Pagination.
- Delete ulasan.

Aturan:

- Admin tidak mengedit balasan dari halaman ini.
- Jika ada request POST untuk save/delete reply dari halaman ini, sistem mengembalikan pesan 403: "Gunakan detail event untuk mengubah balasan ulasan."

## Status Event dan Moderasi

### Status Event Utama

Kolom: `events.status`

Nilai:

- `pending`: event baru user menunggu approval.
- `approved`: event sudah tampil di publik.
- `rejected`: event ditolak admin.

Kolom alasan:

- `events.rejection_reason`

### Approval Event Baru

Dilakukan oleh admin di `admin/event/index.php`.

Approve:

1. Admin submit action approve.
2. `events.status` menjadi `approved`.
3. `rejection_reason` menjadi null.
4. History dicatat sebagai `event_approved`.

Reject:

1. Admin submit action reject.
2. Alasan wajib.
3. `events.status` menjadi `rejected`.
4. `rejection_reason` diisi.
5. History dicatat sebagai `event_rejected`.

### Status Request Edit

Tabel: `event_update_requests`

Nilai status:

- `pending`
- `approved`
- `rejected`

### Approval Edit Event

File: `admin/event/requests.php`

Alur approve request edit:

1. Admin memilih request pending.
2. Sistem memastikan request masih pending.
3. Sistem memastikan request tersebut adalah request pending terbaru untuk event/user tersebut.
4. Sistem memastikan event asli masih ada dan milik user pengaju.
5. Data event utama di-update dari data request.
6. Jika event utama sedang rejected, status event diubah menjadi pending dan rejection reason dihapus.
7. Request lain yang masih pending untuk event/user sama ditolak.
8. Request yang dipilih diubah menjadi approved.
9. History dicatat sebagai `edit_approved`.

Alur reject request edit:

1. Admin memilih reject.
2. Alasan wajib.
3. Request diubah menjadi rejected.
4. History dicatat sebagai `edit_rejected`.

Aturan khusus:

- Request edit lama tidak bisa di-approve jika ada request pending yang lebih baru.
- User edit baru otomatis menolak request pending lama sebagai digantikan request terbaru.

Ringkasan:

- Event baru user perlu approval event.
- Perubahan event user perlu approval edit.
- Admin dapat mengubah event langsung tanpa approval.

## Upload Gambar dan File

### Upload Event

Lokasi penyimpanan:

- `assets/uploads/events/`

Aturan validasi:

- Ukuran maksimal 5MB.
- Ekstensi: jpg, jpeg, png, gif, webp.
- MIME: image/jpeg, image/png, image/gif, image/webp.
- `getimagesize` harus valid.

Aturan gallery:

- Multiple file dapat dipilih.
- File pertama menjadi thumbnail utama.
- Gallery disimpan dalam format JSON di `gallery_carousel`.

Saat edit:

- Gambar lama bisa dipertahankan.
- Gambar lama bisa diganti.
- Gambar lama bisa dihapus.
- Jika tidak ada gambar tersisa, validasi gagal karena thumbnail wajib.

Saat delete:

- Sistem menghapus file gambar hanya jika tidak dipakai event/request lain.

### Upload Foto Profil

Lokasi:

- `uploads/profile/`

Aturan:

- Maksimal 2MB.
- Format JPG/JPEG/PNG.
- MIME valid.
- `getimagesize` valid.

Saat berhasil:

- Path baru disimpan ke `users.profile_photo`.
- Session disinkronkan.
- Foto lama dihapus jika berbeda.

## Pengaturan Akun

File:

- User: `user/pengaturan/index.php`
- Admin: `admin/pengaturan/index.php`

Field:

- Foto profil
- Nama
- Email
- WhatsApp
- Instagram
- Password baru

Validasi:

- Nama tidak boleh kosong.
- Email wajib.
- Email harus format valid.
- Email tidak boleh dipakai akun lain.
- WhatsApp dinormalisasi hanya angka.
- WhatsApp jika diisi minimal 8 digit.
- Instagram dinormalisasi dari URL/username.
- Instagram jika diisi harus cocok pola `[A-Za-z0-9._]` dan maksimal 30 karakter.
- Password hanya diubah jika field diisi.

Perbedaan user/admin:

- User update berdasarkan `id`.
- Admin update berdasarkan `id` dan `level = 'admin'`.

Sukses:

- Redirect ke `index.php?status=updated`.
- Data ditampilkan ulang dari database.

## Dashboard dan Statistik

### Dashboard User

Fokus:

- Performa event milik user.

Metrik:

- Total favorit.
- Total likes.
- Total views.
- Likes 30 hari terakhir.
- Tren dibanding 30 hari sebelumnya.
- Daftar event milik user.

### Dashboard Admin

Fokus:

- Kondisi global sistem.

Metrik:

- Total user.
- Total event.
- Total ulasan.
- Total pending event.
- Total rejected event.
- Total approved event.
- Event terpopuler.
- User dengan event terbanyak.
- Daftar event terbaru.

## Keamanan, Session, dan Redirect

### Session

Session menyimpan:

- `user_id`
- `email`
- `nama`
- `level`
- `profile_photo`

Aturan:

- Session dimulai melalui `auth_start_session`.
- Role `super_admin` dinormalisasi menjadi `admin`.
- Login/register/OAuth memanggil `session_regenerate_id(true)`.

### Proteksi Halaman

Halaman protected memakai:

- `process/checkAuth.php`
- `require_role`

Jika belum login:

- Redirect ke login path yang sesuai lokasi file.

Jika role salah:

- HTTP 403.

### Proteksi Endpoint JSON

Endpoint memakai:

- `require_login_json`
- `require_role_json`

Response:

- 401 jika belum login.
- 403 jika role salah.
- 405 jika method salah.
- 422 jika data invalid.
- 500 jika proses server/query gagal.

### Redirect Penting

- `pengaturanAkun.php` redirect ke `user/pengaturan`.
- `eventfavorit.php` dan `eventYangDisukai.php` memakai route kompatibilitas ke area user.
- Detail event invalid redirect ke `jelajah.php`.
- Edit event invalid redirect ke list event.
- Setelah create/update/delete umumnya redirect dengan query `status`.

### Output dan Query

Praktik keamanan yang terlihat:

- Banyak output memakai `htmlspecialchars`.
- Banyak query input user memakai prepared statement.
- Password di-hash.
- Reset token disimpan sebagai hash.
- OAuth memakai state.

Catatan:

- Tidak terlihat CSRF token pada form POST biasa.

## Relasi Antar Fitur

Relasi utama:

```text
users
  -> events.user_id
  -> event_reviews.user_id
  -> event_likes.user_id
  -> event_favourites.user_id

events
  -> categories.id melalui category_id
  -> cities.id melalui city_id
  -> event_reviews.event_id
  -> event_likes.event_id
  -> event_favourites.event_id
  -> event_update_requests.event_id
  -> event_moderation_history.event_id

event_update_requests
  -> events.id
  -> users.id
  -> diproses admin menjadi update events

event_moderation_history
  -> events.id
  -> users.id sebagai admin_id
```

Alur relasi fitur:

1. User membuat event.
2. Event masuk tabel `events` dengan status pending.
3. Admin approve event.
4. Event approved tampil di Beranda, Jelajah, Detail.
5. Pengunjung login dapat memberi like/favorit/review.
6. Like/favorit/review masuk ke tabel relasi.
7. Dashboard user membaca relasi tersebut untuk statistik event miliknya.
8. Admin dashboard membaca semua event dan relasi untuk statistik global.
9. Jika user edit event, data masuk `event_update_requests`.
10. Admin approve edit, lalu data request diterapkan ke `events`.

## Batasan Sistem Saat Ini

Batasan berdasarkan kode:

- Publik hanya dapat melihat event approved.
- Search Jelajah tidak mencari deskripsi event.
- Like/favorit hanya untuk role user.
- Pemilik event tidak ditampilkan tombol like/favorit pada event miliknya.
- User edit event tidak langsung mengubah event utama.
- Admin edit event langsung mengubah event utama.
- Admin halaman Kelola Ulasan tidak mengubah balasan; balasan diarahkan lewat detail/endpoint manage.
- Tidak terlihat CSRF token untuk form POST.
- Beberapa error masih berupa teks langsung, bukan halaman error terstruktur.
- Helper migrasi otomatis dapat menambah kolom/tabel saat halaman dipanggil, misalnya kolom metric, social, reply, dan tabel moderation.
- Google OAuth bergantung pada env yang benar.
- Forgot password bergantung pada konfigurasi SMTP.
- Rows per page tersimpan di session dan hanya menerima pilihan 5, 10, 25, 50, 100.

## Referensi File Penting

Publik:

- `index.php`
- `jelajah.php`
- `detailEvent.php`
- `tentangKami.php`

Auth:

- `login.php`
- `register.php`
- `process/login.php`
- `process/register.php`
- `process/logout.php`
- `google-login.php`
- `google-callback.php`
- `process/forgot_password.php`
- `process/reset_password.php`

User:

- `user/dashboard/index.php`
- `user/event/index.php`
- `user/event/create.php`
- `user/event/edit.php`
- `user/favorit/index.php`
- `user/disukai/index.php`
- `user/ulasan/index.php`
- `user/pengaturan/index.php`

Admin:

- `admin/dashboard/index.php`
- `admin/event/index.php`
- `admin/event/create.php`
- `admin/event/edit.php`
- `admin/event/requests.php`
- `admin/admin/index.php`
- `admin/admin/create.php`
- `admin/admin/edit.php`
- `admin/ulasan/index.php`
- `admin/pengaturan/index.php`

Endpoint proses:

- `process/toggleLike.php`
- `process/toggleFavorite.php`
- `process/addReview.php`
- `process/deleteReview.php`
- `process/manageReview.php`
- `process/getEvent.php`
- `process/getAdminEvent.php`
- `process/getAdmin.php`

Helper:

- `includes/auth.php`
- `includes/event_metrics.php`
- `includes/event_moderation.php`
- `includes/event_images.php`
- `includes/pagination.php`
- `includes/profile_photo.php`
- `includes/review_reply.php`
- `includes/user_social.php`
- `includes/google_oauth.php`
- `includes/password_reset.php`

## Ringkasan Presentasi Singkat

Jika perlu menjelaskan sistem dalam 1 menit:

EvenTura adalah platform event daerah dengan tiga alur utama. Pengunjung publik bisa melihat event approved melalui Beranda, Jelajah, dan Detail Event. User bisa mendaftar/login, membuat event yang masuk pending, mengajukan edit event, serta melihat performa event miliknya melalui dashboard. Admin bertugas mengelola user, semua event, approval event baru, approval request edit, dan ulasan. Sistem memakai session dan role untuk membatasi akses, mendukung Google OAuth, forgot password, upload gambar, pagination, search, filter kategori, like, favorit, review, dan balasan ulasan. Event hanya tampil publik setelah status approved.

