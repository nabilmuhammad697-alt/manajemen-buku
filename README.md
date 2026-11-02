# Aplikasi Manajemen Buku

Aplikasi Manajemen Buku merupakan aplikasi berbasis web yang dibangun menggunakan Laravel 12. Aplikasi ini digunakan untuk mengelola data buku dengan menerapkan sistem autentikasi dan pengaturan hak akses berdasarkan tiga role pengguna, yaitu Admin, Dosen, dan Mahasiswa.

## Teknologi yang Digunakan

- Laravel 12
- PHP 8.3
- MySQL
- Laravel Breeze (Blade)
- Spatie Laravel Permission
- HTML, CSS, dan JavaScript
- Node.js dan NPM

## Fitur Aplikasi

### 1. Autentikasi
- Login dan logout pengguna.
- Sistem autentikasi menggunakan Laravel Breeze.
- Halaman aplikasi dilindungi agar hanya dapat diakses pengguna yang sudah login.

### 2. Manajemen Buku
- Menampilkan daftar buku.
- Menambahkan data buku.
- Mengedit data buku.
- Menghapus data buku.

### 3. Manajemen Hak Akses
- Pengaturan role pengguna.
- Pembatasan akses menggunakan permission.
- Proteksi halaman dan route berdasarkan hak akses.
- Penolakan akses langsung melalui URL bagi pengguna yang tidak memiliki izin.

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

Pastikan perangkat telah memiliki:

- PHP 8.3 atau versi yang kompatibel dengan Laravel 12.
- Composer.
- MySQL.
- Node.js dan NPM.
- Laragon atau web server lokal lainnya.

## Cara Instalasi

### 1. Clone Repository

```bash
git clone https://github.com/nabilmuhammad697-alt/manajemen-buku.git
```

### 2. Masuk ke Folder Project

```bash
cd manajemen-buku
```

### 3. Install Dependency Laravel

```bash
composer install
```

### 4. Salin File Konfigurasi

```bash
cp .env.example .env
```

Pada Windows, file `.env.example` juga dapat disalin secara manual dan diubah namanya menjadi `.env`.

### 5. Buat Application Key

```bash
php artisan key:generate
```

### 6. Konfigurasi Database

Buat database MySQL, kemudian sesuaikan konfigurasi pada file `.env`.

Contoh:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=manajemen_buku
DB_USERNAME=root
DB_PASSWORD=
```

Sesuaikan nama database dan kredensial dengan konfigurasi komputer masing-masing.

### 7. Jalankan Migrasi dan Seeder

```bash
php artisan migrate --seed
```

Perintah tersebut menjalankan migrasi dan seeder yang telah didaftarkan pada `DatabaseSeeder`.

### 8. Install Dependency Frontend

```bash
npm install
```

### 9. Build Frontend

```bash
npm run build
```

### 10. Jalankan Aplikasi

```bash
php artisan serve
```

### 11. Buka Aplikasi

Akses alamat berikut melalui browser:

```text
http://127.0.0.1:8000
```

## Akun Pengujian

Aplikasi menyediakan akun pengujian untuk masing-masing role yang dibuat melalui seeder.

| Role | Email |
|---|---|
| Admin | admin@gmail.com |
| Dosen | dosen@gmail.com |
| Mahasiswa | mahasiswa@gmail.com |

Password akun pengujian tidak dicantumkan dalam repository publik.

## Pengujian Hak Akses

Pengujian dilakukan menggunakan tiga akun dengan role berbeda.

- **Admin:** Menguji akses melihat, menambah, mengedit, dan menghapus buku serta mengelola role pengguna.
- **Dosen:** Menguji akses melihat, menambah, dan mengedit buku serta memastikan tidak dapat menghapus buku.
- **Mahasiswa:** Menguji akses melihat buku dan memastikan tidak dapat menambah, mengedit, atau menghapus buku.
- **Guest:** Menguji pengalihan ke halaman login ketika mencoba mengakses halaman yang memerlukan autentikasi.
- **Pengujian URL langsung:** Memastikan pengguna tanpa permission mendapatkan respons HTTP 403 ketika mencoba membuka halaman yang dibatasi.

## Struktur Fitur Utama

- `app/Models` — Model User dan Book.
- `app/Http/Controllers` — Controller aplikasi.
- `database/migrations` — Struktur tabel database.
- `database/seeders` — Data awal role, permission, dan akun pengguna.
- `resources/views/books` — Halaman daftar, tambah, dan edit buku.
- `resources/views/users/roles` — Halaman pengelolaan role pengguna.
- `routes/web.php` — Pengaturan route aplikasi.
- `bootstrap/app.php` — Konfigurasi middleware aplikasi.

## Lisensi

Proyek ini dibuat untuk keperluan pembelajaran dan tugas akademik. Framework Laravel menggunakan lisensi MIT.
