# Aplikasi Blog - Mukhammad Nuruddin Alhaffaf

## Identitas

- **Nama:** Salsabilla Fadillah Safina
- **NIM:** 240605110242
- **Mata Kuliah:** Web Programming A

## Deskripsi Aplikasi

Sistem Manajemen Blog (CMS) berbasis Laravel yang memiliki dua bagian:

1. **Halaman CMS** (membutuhkan login) — untuk mengelola artikel, penulis, dan kategori
2. **Halaman Publik** (tanpa login) — untuk pengunjung membaca artikel

## Teknologi

- Laravel 10+
- PHP 8.1+
- MySQL
- Bootstrap 5

## Cara Menjalankan Secara Lokal

### Prasyarat

- XAMPP (PHP 8.1+, MySQL)
- Composer

### Langkah-langkah

```bash
# 1. Clone repositori
git clone https://github.com/Cheeszu/aplikasi-blog-240605110259.git
cd aplikasi-blog-240605110259

# 2. Install dependensi
composer install

# 3. Salin file .env
cp .env.example .env
php artisan key:generate

# 4. Konfigurasi database di .env
# DB_DATABASE=db_blog
# DB_USERNAME=root
# DB_PASSWORD=

# 5. Import database
# Import file db_blog.sql ke phpMyAdmin

# 6. Buat symbolic link storage
php artisan storage:link

# 7. Jalankan server
php artisan serve
```

### Akses Aplikasi

- **Halaman Publik:** http://localhost:8000
- **Login CMS:** http://localhost:8000/login
- **Username:** budi | **Password:** password123

## Demo Video
[Tonton di YouTube Cheeszu]([https://youtu.be/Mcgj3QyJDsw])