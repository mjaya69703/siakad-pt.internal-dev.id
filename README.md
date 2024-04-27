<p align="center"><a href="https://siakad-pt.internal-dev.id" target="_blank"><img src="https://siakad-pt.internal-dev.id/storage/images/website/site-logo.png" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Project SiakadPT By Internal-Dev
Web Siakad Perguruan Tinggi yang dibuat oleh Muhamad Jaya Kusuma menggunakan Base Framework Laravel 10 yang kini telah diupdate ke Laravel 11. Siakad ini dibangun untuk mempermudah para mahasiswa, dosen dan para staff dalam melakukan akvitas pekerjaannya dilingkungan kampus.


## Feature Project Siakad PT ( IN DEVELOPMENT )

Pada project yang saya buat ini akan memiliki 3 Model Utama sebagai basis authentikasi yaitu User, Mahasiswa dan Dosen. Berikut deretan fitur yang sudah dibangun pada SiakadPT ini:

- Authentikasi User / Staff / Admin, Mahasiswa dan Dosen
- Fitur Umum Untuk Semua Akun ( Dashboard, Profile, Update Profile, Change Password )
- Fitur Kelola Data Akademik
    - ( CRUD ) Data Fakultas ( CRUD )
    - ( CRUD ) Data Program Studi ( CRUD )
    - ( CRUD ) Data Tahun Akademik ( CRUD )
    - ( CRUD ) Data Program Kuliah ( CRUD )
    - ( CRUD ) Data Kelas 

- Fitur Kelola Data Inventaris
    - ( CRUD ) Data Fakultas 

- Fitur Kelola Data Users
    - ( CRUD ) Data Admin 
    - ( CRUD ) Data Staff ( Web Administrator, Staff Akademik , Staff Administrasi & Keuangan, Staff SarPras) 
    - ( CRUD ) Data Dosen



## How to Install
1. Persyaratan Install
    - Support Windows and Linux
    - Sudah Menginstall Composer
    - Sudah Menginstall PHP 8.2 atau diatasnya
    - Sudah Menginstall MySQL atau MariaDB
    - Sudah Menginstall Git / GitBash

2. Clone Repository
```
git clone https://github.com/mjaya69703/siakad-pt.internal-dev.id.git
cd siakad-pt.internal-dev.id
composer install
npm install
cp .env.example .env
```

3. Edit File Environment ( .env )
- Sesuaikan Database Kamu
```
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=
```
- Sesuaikan Konfigurasi Email
```
# BILA MENGGUNAKAN BREVO
MAIL_DRIVER=smtp
MAIL_HOST="smtp-relay.brevo.com"
MAIL_PORT=587
MAIL_USERNAME="your@email.xyz"
MAIL_PASSWORD="yourpassword"
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS="${MAIL_USERNAME}"
MAIL_FROM_NAME="${APP_NAME}"
```
4. Installasi Project 
```
php artisan key:generate
php artisan migrate --seed
```
5. Menjalankan Project
```
php artisan serve
```


## CREDITS
- Framework PHP <a href="https://laravel.com">Laravel 11</a>
- Themes Authentication <a href="https://www.creative-tim.com/product/argon-dashboard">Argon Dashboard 2 By Creative Tim</a>
- Themes BackEnd <a href="https://github.com/zuramai/mazer">Mazer Dashboard By zuramai</a>
