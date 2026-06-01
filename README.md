# DoubleTap Agency

DoubleTap Agency adalah website company profile dan sistem dashboard sederhana untuk agensi digital marketing berbasis Laravel. Website ini dibuat untuk menampilkan informasi layanan, portfolio, paket layanan, kontak konsultasi, login klien, serta dashboard admin untuk mengelola pengguna atau klien terdaftar.

Project ini menggunakan framework **Laravel 13** dan database **MySQL**.

---

## Fitur Utama

### 1. Halaman Publik

Website memiliki beberapa halaman utama, yaitu:

- Beranda
- Layanan
- Tentang Kami
- Kontak / Konsultasi
- Login Klien

Isi website mengambil data dari database, bukan hardcode langsung di halaman.

### 2. Login Klien

Klien dapat login menggunakan akun yang sudah dibuat oleh admin. Setelah login, klien dapat melihat dashboard performa bisnisnya.

### 3. Dashboard Klien

Dashboard klien menampilkan data seperti:

- Statistik performa media sosial
- Konten terbaru
- Insight bulanan
- Rekomendasi strategi
- Data tambahan khusus paket Growth

### 4. Login Admin

Admin dapat login melalui halaman login yang sama dengan klien. Data akun admin disimpan di database melalui seeder.

### 5. Dashboard Admin

Dashboard admin digunakan untuk mengelola data klien terdaftar.

Fitur admin:

- Melihat total klien terdaftar
- Melihat total paket layanan
- Melihat jumlah pesan konsultasi
- Menampilkan klien terbaru
- Menambah data klien
- Mengedit data klien
- Menghapus data klien

---

## Teknologi yang Digunakan

- Laravel 13
- PHP
- MySQL
- Blade Template
- HTML
- CSS
- JavaScript

---

## Instalasi Project

Clone repository:

```bash
git clone https://github.com/AhmadUlyani/DoubleTap-Agency.git
```

Masuk ke folder project:

```bash
cd DoubleTap_Agency
```

Install dependency Laravel:

```bash
composer install
```

Copy file environment:

```bash
cp .env.example .env
```

Generate application key:

```bash
php artisan key:generate
```

---

## Konfigurasi Database

Buat database baru di MySQL, contoh:

```text
doubletap
```

Lalu atur file `.env`:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=doubletap
DB_USERNAME=root
DB_PASSWORD=
```

Sesuaikan `DB_USERNAME` dan `DB_PASSWORD` dengan konfigurasi MySQL di komputer masing-masing.

---

## Menjalankan Migration dan Seeder

Jalankan perintah:

```bash
php artisan migrate:fresh --seed
```

---

## Menjalankan Website

Jalankan server Laravel:

```bash
php artisan serve
```

Buka di browser:

```text
http://127.0.0.1:8000
```

---

## Akun Login

### Admin

```text
Username: admin
Password: admin123
```

### Klien Starter

```text
Username: kopi_nusantara
Password: starter123
```

### Klien Growth

```text
Username: thrift_borneo
Password: growth123
```

---

## Route Penting

```text
/                       Halaman beranda
/layanan                Halaman layanan
/tentang-kami           Halaman tentang kami
/kontak                 Halaman kontak
/login                  Halaman login klien dan admin
/dashboard              Dashboard klien
/admin/dashboard        Dashboard admin
/admin/clients          Kelola data klien
/admin/clients/create   Tambah data klien
```

---