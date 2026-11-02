# Aplikasi Manajemen Buku

Aplikasi Manajemen Buku adalah aplikasi berbasis web yang dibangun menggunakan Laravel 12. Aplikasi ini digunakan untuk mengelola data buku dengan menerapkan sistem autentikasi dan hak akses berdasarkan tiga role pengguna, yaitu Admin, Dosen, dan Mahasiswa.

## Teknologi yang Digunakan

- Laravel 12
- PHP 8.3
- MySQL
- Laravel Breeze (Blade)
- Spatie Laravel Permission
- HTML, CSS, dan JavaScript
- Node.js dan NPM

## Fitur Aplikasi

1. **Autentikasi**
   - Login dan logout pengguna.
   - Halaman aplikasi hanya dapat diakses oleh pengguna yang sudah login.

2. **Manajemen Buku**
   - Menampilkan daftar buku.
   - Menambahkan data buku.
   - Mengedit data buku.
   - Menghapus data buku.

3. **Manajemen Hak Akses**
   - Pengaturan hak akses berdasarkan role pengguna.
   - Pembatasan akses menggunakan permission.
   - Proteksi akses langsung melalui URL.

## Role dan Hak Akses

| Fitur | Admin | Dosen | Mahasiswa |
|---|---|---|---|
| Melihat buku | Ya | Ya | Ya |
| Menambah buku | Ya | Ya | Tidak |
| Mengedit buku | Ya | Ya | Tidak |
| Menghapus buku | Ya | Tidak | Tidak |
| Mengelola role pengguna | Ya | Tidak | Tidak |

## Daftar Permission

- `books.view` — Melihat data buku.
- `books.create` — Menambahkan data buku.
- `books.edit` — Mengedit data buku.
- `books.delete` — Menghapus data buku.
- `users.manage-roles` — Mengelola role pengguna.

## Persyaratan Sistem

Pastikan perangkat sudah memiliki:

- PHP 8.3 atau versi yang kompatibel dengan Laravel 12.
- Composer.
- MySQL.
- Node.js dan NPM.
- Laragon atau web server lokal lainnya.

## Cara Instalasi

1. Clone repository:

   ```bash
   git clone URL_REPOSITORY
   ```

2. Masuk ke folder proyek:

   ```bash
   cd manajemen-buku
   ```

3. Install dependency Laravel:

   ```bash
   composer install
   ```

4. Salin file konfigurasi:

   ```bash
   cp .env.example .env
   ```

   Pada Windows, file `.env.example` juga dapat disalin secara manual dan diubah namanya menjadi `.env`.

5. Buat application key:

   ```bash
   php artisan key:generate
   ```

6. Atur koneksi database pada file `.env` sesuai konfigurasi MySQL lokal.

   Contoh:

   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=manajemen_buku
   DB_USERNAME=root
   DB_PASSWORD=
   ```

   Sesuaikan nama database dan username/password dengan konfigurasi komputer masing-masing.

7. Jalankan migrasi dan seeder:

   ```bash
   php artisan migrate --seed
   ```

   Perintah tersebut menjalankan migrasi dan data awal aplikasi. Jika seeder belum digabungkan ke `DatabaseSeeder`, jalankan seeder yang diperlukan secara terpisah sesuai konfigurasi proyek.

8. Install dependency frontend:

   ```bash
   npm install
   ```

9. Build frontend:

   ```bash
   npm run build
   ```

10. Jalankan aplikasi:

    ```bash
    php artisan serve
    ```

11. Buka aplikasi melalui browser:

    ```text
    http://127.0.0.1:8000
    ```

## Akun Pengujian

Akun berikut digunakan untuk pengujian hak akses aplikasi:

| Role | Email | Password |
|---|---|---|
| Admin | admin@gmail.com | password123 |
| Dosen | dosen@gmail.com | password123 |
| Mahasiswa | mahasiswa@gmail.com | password123 |

**Catatan:** Akun tersebut merupakan akun pengujian lokal yang dibuat melalui seeder. Jangan gunakan password ini untuk aplikasi produksi.

## Pengujian Hak Akses

Pengujian dilakukan menggunakan tiga akun dengan role berbeda.

- **Admin:** Menguji akses melihat, menambah, mengedit, dan menghapus buku.
- **Dosen:** Menguji akses melihat, menambah, dan mengedit buku serta memastikan tidak dapat menghapus buku.
- **Mahasiswa:** Menguji akses melihat buku dan memastikan tidak dapat menambah, mengedit, atau menghapus buku.
- **Pengujian URL langsung:** Memastikan pengguna yang tidak memiliki permission mendapatkan respons HTTP 403 ketika mencoba membuka halaman yang dibatasi.

## Struktur Fitur Utama

- `app/Models` — Model User dan Book.
- `app/Http/Controllers` — Controller aplikasi.
- `database/migrations` — Struktur tabel database.
- `database/seeders` — Data awal role, permission, dan akun pengguna.
- `resources/views/books` — Halaman daftar, tambah, dan edit buku.
- `routes/web.php` — Pengaturan route aplikasi.

## Lisensi

Proyek ini dibuat untuk keperluan pembelajaran dan tugas akademik. Framework Laravel menggunakan lisensi MIT.
