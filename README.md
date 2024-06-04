<p align="center"><a href="https://siakad-pt.internal-dev.id" target="_blank"><img src="https://siakad-pt.internal-dev.id/storage/images/website/site-logo.png" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="CHANGELOG.MD">ESEC Academy - Open Source Project | v.0.0003n - Changelogs</a>
<br>
<span>Latest Update: 5 Juni 2024</span>
</p>
<p align="center">
<a href="https://github.com/mjaya69703"><img src="https://img.shields.io/badge/github-%23121011.svg?style=for-the-badge&logo=github&logoColor=white" alt="GitHub"></a>
<a href="https://facebook.com/kyouma052"><img src="https://img.shields.io/badge/Facebook-%231877F2.svg?style=for-the-badge&logo=Facebook&logoColor=white" alt="Facebook"></a>
<a href="https://instagram.com/mjaya69703"><img src="https://img.shields.io/badge/Instagram-%23E4405F.svg?style=for-the-badge&logo=Instagram&logoColor=white" alt="Instagram"></a>
<a href="mailto:jaya.kusuma@internal-dev.id"><img src="https://img.shields.io/badge/Gmail-D14836?style=for-the-badge&logo=gmail&logoColor=white" alt="Gmail"></a>
</p>

## About Project SiakadPT By Internal-Dev

<img src="https://siakad-pt.internal-dev.id/storage/images/web/Picture1.png" style="width: 100%;" align="center">

Web Siakad Perguruan Tinggi yang dibuat oleh Muhamad Jaya Kusuma menggunakan Base Framework Laravel 10 yang kini telah diupdate ke Laravel 11. Siakad ini dibangun untuk mempermudah para mahasiswa, dosen dan para staff dalam melakukan akvitas pekerjaannya dilingkungan kampus serta saling terintegrasi.

## Feature Project Siakad PT ( In Development )

Pada project yang saya buat ini akan memiliki 3 Model Utama sebagai basis authentikasi yaitu User, Mahasiswa dan Dosen. Berikut deretan fitur yang sudah dibangun pada SiakadPT ini:

<b>Fitur Role Web Admininstrator</b>

-   Authentikasi User / Staff / Admin, Mahasiswa dan Dosen
-   Fitur Dasar

    -   Halaman Profile , Edit Profile dan Ubah Password
    -   Halaman Jurnal Presensi ( Absensi )
    -   Halaman Support Ticket
    -   Halaman Kelola Notifikasi

-   Fitur Kelola Data Akademik

    -   ( CRUD ) Data Fakultas
    -   ( CRUD ) Data Program Studi
    -   ( CRUD ) Data Tahun Akademik
    -   ( CRUD ) Data Program Kuliah
    -   ( CRUD ) Data Kelas
    -   ( CRUD ) Data Kurikulum
    -   ( CRUD ) Data Mata Kuliah
    -   ( CRUD ) Data JadwalKuliah

-   Fitur Kelola Data Inventaris

    -   ( CRUD ) Data Gedung
    -   ( CRUD ) Data Ruang

-   Fitur Kelola Data Pengguna

    -   ( CRUD ) Data Admin
    -   ( CRUD ) Data Staff ( Role Generated By Departement )
    -   ( CRUD ) Data Dosen
    -   ( CRUD ) Data Mahasiswa

-   Fitur Kelola Data Keuangan
    -   ( CRUD ) Data Tagihan
    -   ( CRUD ) Data Pembayaran
    -   ( CRUD ) Data Keuangan
    -   Pembayaran Biaya Kuliah via MidTrans

<b>Fitur Role Departement Finance</b>

-   Fitur Dasar

    -   Halaman Profile , Edit Profile dan Ubah Password
    -   Halaman Jurnal Presensi ( Absensi )
    -   Halaman Support Ticket
    -   Halaman Kelola Notifikasi

-   Fitur Kelola Data Keuangan
    -   Menerbitkan Tagihan ( Personal / Group By Program Studi or Program Kuliah )
    -   Lihat Data Pembayaran Mahasiswa
    -   ( CRUD ) Data Keuangan Income, Expense, Pending, Sisa Saldo
-   Fitur Data Approval - Approve and Reject Data Absensi Cuti, Izin dan Sakit Karyawan

<b>Fitur Role Departement Officer</b>

-   Fitur Dasar
    -   Halaman Profile , Edit Profile dan Ubah Password
    -   Halaman Jurnal Presensi ( Absensi )
    -   Halaman Support Ticket
    -   Halaman Kelola Notifikasi

<b>Fitur Role Departement Akademik</b>

-   Fitur Dasar

    -   Halaman Profile , Edit Profile dan Ubah Password
    -   Halaman Jurnal Presensi ( Absensi )
    -   Halaman Support Ticket
    -   Halaman Kelola Notifikasi

-   Fitur Kelola Data Pengguna

    -   ( CRUD ) Data Mahasiswa

-   Fitur Kelola Data Akademik
    -   ( CRUD ) Data Kelas
    -   ( CRUD ) Data Kurikulum
    -   ( CRUD ) Data Mata Kuliah
    -   ( CRUD ) Data JadwalKuliah

<b>Fitur Role Departement Support ( New )</b>

-   Fitur Dasar

    -   Halaman Profile , Edit Profile dan Ubah Password
    -   Halaman Jurnal Presensi ( Absensi )
    -   Halaman Support Ticket
    -   Halaman Kelola Notifikasi

-   Fitur Kelola Data Inventory
    -   ( CRUD ) Data Gedung
    -   ( CRUD ) Data Ruangan

<b>Fitur Role Mahasiswa Aktif</b>

-   Fitur Dasar
-   Halaman Profile , Edit Profile dan Ubah Password
-   Fitur Lihat Jadwal Kuliah dan Absensi
-   Fitur Lihat Tagihan dan Lihat Riwayat Pembayaran
-   Fitur Lihat Support dan Membuat Support Tiket Ke Berbagai Departement
-   Lihat Pengumuman Pada Dashboard

<b>Fitur Role Dosen Aktif</b>

-   Fitur Dasar
    -   Halaman Profile , Edit Profile dan Ubah Password
-   Fitur Lihat Jadwal Mengajar dan Verifikasi Absen Mahasiswa

<b>Fitur Home Page</b>

-   Fitur Kotak Saran Delivery to Email Developer

## How to Install

1. Persyaratan Software

    A. Khusus Windows

    - Sudah Menginstall Composer
    - Sudah Menginstall WAMP Stack ( Rekomendasi Laragon )

    B. Khusus Linux

    - Sudah Menginstall Git / GitBash
    - Sudah Menginstall Composer
    - Sudah Menginstall PHP 8.2 atau diatasnya
    - Sudah Menginstall MySQL atau MariaDB
    - Sudah Menginstall WebServer Nginx or apache

    C. Khusus Docker

    - Sudah Menginstall Docker

2. Clone Repository

```
git clone https://github.com/mjaya69703/siakad-pt.internal-dev.id.git
cd siakad-pt.internal-dev.id

// Apabila Menggunakan Windows
setup.bash

// Apabila Menggunakan Linux
chmod +x setup.sh
./setup.sh

// Apabila Menggunakan Docker
chmod +x docker.sh
./docker.sh
```

3. Edit File Environment ( .env )

-   Sesuaikan Database Kamu ( For Windows and Linux Installation)

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

-   Addons Cloudflare Turnstile Capctha ( Opsional )

```
1. Change This File In .env
TURNSTILE_SITE_KEY=2x00000000000000000000AB                 ## TURNSTILE SITE KEY
TURNSTILE_SECRET_KEY=2x0000000000000000000000000000000AA    ## TURNSTILE SECRET KEY

2. Enable This Script In
a. resource/auth/auth-admin-signin.blade.php
b. resource/auth/auth-dsn-signin.blade.php
c. resource/auth/auth-mhs-signin.blade.php

<div class="">
    <x-turnstile-widget theme="auto" language="id"/>
    @error('cf-turnstile-response')
        <p class="error">{{ $message }}</p>
    @enderror
</div>

3. Enable This Script In
a. app/Http/Controllers/Admin/AuthController/ In Function AuthSignInPost
b. app/Http/Controllers/Dosen/AuthController/ In Function AuthSignInPost
c. app/Http/Controllers/Mahasiswa/AuthController/ In Function AuthSignInPost

'cf-turnstile-response' => ['required', new TurnstileCheck()],  // ENABLE THIS IF YOU WANT USE TURNSTILE
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

For Docker
- Run Installer Docker
docker.bat
```

## CREDITS

-   Framework PHP <a href="https://laravel.com">Laravel 11</a>
-   Themes Authentication <a href="https://www.creative-tim.com/product/argon-dashboard">Argon Dashboard 2 By Creative Tim</a>
-   Themes BackEnd <a href="https://github.com/zuramai/mazer">Mazer Dashboard By zuramai</a>
-   Dockerize Script <a href="https://github.com/refactorian/laravel-docker">Laravel Docker</a>
