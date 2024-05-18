<p align="center"><a href="https://siakad-pt.internal-dev.id" target="_blank"><img src="https://siakad-pt.internal-dev.id/storage/images/website/site-logo.png" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="CHANGELOG.MD">Test</a>
</p>
<p align="center">
<a href="https://github.com/mjaya69703"><img src="https://img.shields.io/badge/github-%23121011.svg?style=for-the-badge&logo=github&logoColor=white" alt="GitHub"></a>
<a href="https://facebook.com/kyouma052"><img src="https://img.shields.io/badge/Facebook-%231877F2.svg?style=for-the-badge&logo=Facebook&logoColor=white" alt="Facebook"></a>
<a href="https://instagram.com/mjaya69703"><img src="https://img.shields.io/badge/Instagram-%23E4405F.svg?style=for-the-badge&logo=Instagram&logoColor=white" alt="Instagram"></a>
<a href="mailto:admin@internal-dev.id"><img src="https://img.shields.io/badge/Gmail-D14836?style=for-the-badge&logo=gmail&logoColor=white" alt="Gmail"></a>
</p>

## About Project SiakadPT By Internal-Dev

<img src="https://siakad-pt.internal-dev.id/storage/images/web/Picture1.png" style="width: 100%;" align="center">

Web Siakad Perguruan Tinggi yang dibuat oleh Muhamad Jaya Kusuma menggunakan Base Framework Laravel 10 yang kini telah diupdate ke Laravel 11. Siakad ini dibangun untuk mempermudah para mahasiswa, dosen dan para staff dalam melakukan akvitas pekerjaannya dilingkungan kampus.

## Feature Project Siakad PT ( In Development )

Pada project yang saya buat ini akan memiliki 3 Model Utama sebagai basis authentikasi yaitu User, Mahasiswa dan Dosen. Berikut deretan fitur yang sudah dibangun pada SiakadPT ini:

<b>Fitur Role Web Admininstrator</b>

-   Authentikasi User / Staff / Admin, Mahasiswa dan Dosen
-   Fitur Umum Untuk Semua Akun ( Dashboard, Profile, Update Profile, Change Password )
-   Fitur Kelola Data Akademik

    -   ( CRUD ) Data Fakultas
    -   ( CRUD ) Data Program Studi
    -   ( CRUD ) Data Tahun Akademik
    -   ( CRUD ) Data Program Kuliah
    -   ( CRUD ) Data Kelas
    -   ( CRUD ) Data Kurikulum
    -   ( CRUD ) Data MataKuliah
    -   ( CRUD ) Data JadwalKuliah

-   Fitur Kelola Data Inventaris

    -   ( CRUD ) Data Gedung
    -   ( CRUD ) Data Ruang

-   Fitur Kelola Data Pengguna

    -   ( CRUD ) Data Admin
    -   ( CRUD ) Data Staff ( Web Administrator, Staff Akademik , Staff Administrasi & Keuangan, Staff SarPras )
    -   ( CRUD ) Data Dosen
    -   ( CRUD ) Data Mahasiswa

-   Fitur Kelola Data Keuangan
    -   ( CRUD ) Data Tagihan ( New )
    -   ( CRUD ) Data Pembayaran ( New )
    -   ( CRUD ) Data Keuangan ( New )
    -   Pembayaran Biaya Kuliah via MidTrans

<b>Fitur Role Finance Departement ( New )</b>

-   Fitur Dasar
    -   Halaman Profile , Edit Profile dan Ubah Password
    -   Halaman Jurnal Presensi ( Absensi )
-   Fitur Kelola Data Keuangan
    -   Menerbitkan Tagihan ( Personal / Group By Program Studi or Program Kuliah )
    -   Lihat Data Pembayaran Mahasiswa
    -   ( CRUD ) Data Keuangan Income, Expense, Pending, Sisa Saldo

<b>Fitur Role Mahasiswa Aktif</b>

-   Fitur Umum Untuk Semua Akun ( Dashboard, Profile, Update Profile, Change Password )
-   Fitur Lihat Jadwal Kuliah dan Absensi
-   Fitur Lihat Tagihan dan Lihat Riwayat Pembayaran

## How to Install

1. Persyaratan Install

    - Sudah Menginstall Composer
    - Sudah Menginstall PHP 8.2 atau diatasnya
    - Sudah Menginstall MySQL atau MariaDB
    - Sudah Menginstall Git / GitBash

2. Clone Repository

```
git clone https://github.com/mjaya69703/siakad-pt.internal-dev.id.git
cd siakad-pt.internal-dev.id

// Apabila Menggunakan Windows
setup.bash

// Apabila Menggunakan Linux
chmod +x setup.sh
./setup.sh
```

3. Edit File Environment ( .env )

-   Sesuaikan Database Kamu

```
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=
```

-   Sesuaikan Konfigurasi Email ( .env )

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

-   Sesuaikan Konfigurasi MidTrans ( .env )

```
MIDTRANS_CLIENT_KEY=SB-Mid-client-xxxx   ##   => Input your MidTrans clientKey
MIDTRANS_SERVER_KEY=SB-Mid-server-xxxx   ##   => Input your MidTrans serverKey
MIDTRANS_IS_PRODUCTION=false             ##   => false or true => Choose your condition
MIDTRANS_IS_SANITIZED=true
MIDTRANS_IS_3DS=true
```

4. Menjalankan Project

```
php artisan serve
```

## SHORTCUT

```
For Windows ( Execute In Terminal )
- Run Migrate Refresh Seed
seed.bat
- Run Clear Cache
clear.bat
- Run Installer Windows
setup.bat

For Linux ( Execute In Terminal )
- Run Migrate Refresh Seed
seed.bat
- Run Clear Cache
clear.bat
- Run Installer Linux
setup.bat
```

## CREDITS

-   Framework PHP <a href="https://laravel.com">Laravel 11</a>
-   Themes Authentication <a href="https://www.creative-tim.com/product/argon-dashboard">Argon Dashboard 2 By Creative Tim</a>
-   Themes BackEnd <a href="https://github.com/zuramai/mazer">Mazer Dashboard By zuramai</a>

## CHANGE-LOGS

<b>17/05/2024 - Update v.0.0003a - alpha</b>

```
-   Initialisasi Invoice Pembayaran Mahasiswa
```

<b>16/05/2024 - Update v.0.0002 - alpha</b>

```
-   Update Dashboard Mahasiswa
-   Restructure Type User
-   Initialisasi Role Finance
-   Restructure Dashboard Finance
-   Fix Installer Windows ( setup.bat )
-   Create Shortcut Command For Windows and Linux
```

<b>14/05/2024 - Update v.0.0001 - alpha</b>

```
-   Tambah Menu Data Tagihan ( CRUD )
-   Tambah Menu Data Pembayaran ( VIEW ONLY )
-   Tambah Menu Data Keuangan ( CRUD )
-   Fix Lihat Tagihan Pada Sisi Mahasiswa
-   Fix Duplikat script js
-   Rename Kode Bayar Pada Menu Data Tagihan
-   Integrasi Data pembayaran mahasiswa ke Data Keuangan
```
