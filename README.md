<p align="center"><a href="https://siakad-pt.idev-fun.org" target="_blank"><img src="https://siakad-pt.idev-fun.org/storage/images/website/site-logo.png" width="400" alt="Siakad PT Logo"></a></p>

<p align="center">
<a href="changelog.md">ESEC Academy - Siakad PT Open Source Project | v2.0 - Changelogs</a>
<br>
<span>Latest Update: 27 Mei 2025</span>
</p>

<p align="center">
<a href="https://github.com/mjaya69703"><img src="https://img.shields.io/badge/github-%23121011.svg?style=for-the-badge&logo=github&logoColor=white" alt="GitHub"></a>
<a href="https://facebook.com/kyouma052"><img src="https://img.shields.io/badge/Facebook-%231877F2.svg?style=for-the-badge&logo=Facebook&logoColor=white" alt="Facebook"></a>
<a href="https://instagram.com/mjaya69703"><img src="https://img.shields.io/badge/Instagram-%23E4405F.svg?style=for-the-badge&logo=Instagram&logoColor=white" alt="Instagram"></a>
<a href="mailto:mjaya69703@gmail.com"><img src="https://img.shields.io/badge/Gmail-D14836?style=for-the-badge&logo=gmail&logoColor=white" alt="Gmail"></a>
</p>

## Status Pengembangan
> **Catatan Penting**: Proyek ini sedang dalam proses re-adaptasi total dan migrasi ke source code baru. Saat ini, hanya fitur-fitur berikut yang sudah berfungsi penuh:
> - Dashboard/Home
> - Manajemen Profil
> - Sistem Absensi
>
> Fitur-fitur lainnya masih dalam tahap pengembangan dan akan diimplementasikan secara bertahap.

## Preview Images
<img src="./storage/demo/demo-homepage.png" style="width: 100%;" align="center">
<p align="center">Halaman Utama</p>
<hr>
<img src="./storage/demo/demo-signin.png" style="width: 100%;" align="center">
<p align="center">Halaman Login Authentikasi</p>
<hr>
<img src="./storage/demo/demo-profile.png" style="width: 100%;" align="center">
<p align="center">Halaman Profile User</p>

## About Project
Siakad PT adalah Sistem Informasi Akademik modern yang dirancang khusus untuk perguruan tinggi. Dibangun dengan Laravel 12, sistem ini menyediakan solusi komprehensif untuk manajemen akademik, mulai dari absensi, manajemen dosen dan mahasiswa, hingga pengelolaan kurikulum dan penjadwalan.

## Fitur yang Sudah Tersedia

### Staff / Karyawan
1. **Dashboard Admin** ✅
   - Statistik real-time
   - Grafik kinerja
   - Notifikasi sistem

2. **Manajemen Profil** ✅
   - Edit data pribadi
   - Ubah password
   - Upload foto profil

3. **Menu Rutinitas**
   - Absensi harian (Check-in/Check-out) ✅
   - Manajemen izin dan cuti 🔄
   - Support ticket online 🔄

4. **Menu Publikasi** 🔄
   - Pengumuman
   - Manajemen berita
   - Galeri foto

5. **Menu Finansial** 🔄
   - Tagihan online
   - Pembayaran digital
   - Approval absensi

6. **Menu Pusat Informasi** 🔄
   - Manajemen pengguna
   - Data akademik
   - PMB online
   - KBM digital
   - Inventaris

### Dosen 🔄
1. **Dashboard Dosen**
   - Jadwal mengajar
   - Statistik kehadiran
   - Notifikasi tugas

2. **Manajemen Profil**
   - Edit data pribadi
   - Ubah password
   - Upload foto profil

3. **Menu Akademik**
   - Jadwal perkuliahan
   - Manajemen absensi
   - Penilaian tugas
   - Feedback mahasiswa

### Mahasiswa 🔄
1. **Dashboard Mahasiswa**
   - Jadwal kuliah
   - Status kehadiran
   - Notifikasi tugas

2. **Manajemen Profil**
   - Edit data pribadi
   - Ubah password
   - Upload foto profil

3. **Menu Akademik**
   - Absensi online
   - Pengumpulan tugas
   - Feedback dosen

4. **Menu Finansial**
   - Tagihan online
   - Pembayaran digital
   - Riwayat transaksi

5. **Menu Bantuan**
   - Support ticket
   - FAQ
   - Panduan sistem

> **Keterangan Status**:
> - ✅ Fitur sudah tersedia dan berfungsi penuh
> - 🔄 Fitur dalam tahap pengembangan
> - ⏳ Fitur akan segera diimplementasikan

## Demo
```
Link: https://siakad-pt.idev-fun.org

Demo Admin:
Link: https://siakad-pt.idev-fun.org/signin
1. Super Admin
   User: admin
   Pass: Admin123

2. Admin Staff
   User: admin2
   Pass: Admin123

3. Finance Staff
   User: finance
   Pass: Admin123

4. Academic Staff
   User: academic
   Pass: Admin123

5. Officer Staff
   User: officer
   Pass: Admin123

6. Support Staff
   User: support
   Pass: Admin123

Demo Dosen:
Link: https://siakad-pt.idev-fun.org/dosen/auth-signin
User: dosen.a@example.com (a-d)
Pass: Dosen123

Demo Mahasiswa:
Link: https://siakad-pt.idev-fun.org/mahasiswa/auth-signin
User: mahasiswa.a@example.com (a-d)
Pass: Mahasiswa123
```

## Persyaratan Sistem
- PHP v8.2+
- MariaDB v10.5+ / MySQL v8.0+
- Docker v27.0+ (Opsional)

## Instalasi

1. Clone Repository
```bash
git clone https://github.com/mjaya69703/siakad-pt.internal-dev.id.git
cd siakad-pt.internal-dev.id
```

2. Install Dependencies
```bash
# Windows
setup.bat

# Linux
chmod +x setup.sh
./setup.sh

# Docker
chmod +x docker.sh
./docker.sh
```

3. Konfigurasi Environment
```env
# Database
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=

# Email (Brevo)
MAIL_DRIVER=smtp
MAIL_HOST="smtp-relay.brevo.com"
MAIL_PORT=587
MAIL_USERNAME="your@email.xyz"
MAIL_PASSWORD="yourpassword"
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS="${MAIL_USERNAME}"
MAIL_FROM_NAME="${APP_NAME}"

# Midtrans
MIDTRANS_CLIENT_KEY=SB-Mid-client-xxxx
MIDTRANS_SERVER_KEY=SB-Mid-server-xxxx
MIDTRANS_IS_PRODUCTION=false
MIDTRANS_IS_SANITIZED=true
MIDTRANS_IS_3DS=true

# Security
SIAKAD_SECRET_KEY=xxxxxxxx
```

4. Jalankan Aplikasi
```bash
php artisan serve
```

## Shortcut Commands

### Windows
```bash
# Migrate & Seed
seed.bat

# Clear Cache
clear.bat

# Install
setup.bat
```

### Linux
```bash
# Migrate & Seed
./seed.sh

# Clear Cache
./clear.sh

# Install
./setup.sh
```

### Docker
```bash
# Install
./docker.sh
```

## Keamanan
- Implementasi Cloudflare Turnstile (Opsional)
- Validasi input
- Sanitasi data
- Enkripsi password
- Rate limiting
- CSRF protection

## Credits
- Framework: [Laravel 11](https://laravel.com)
- UI/UX: 
  - [Argon Dashboard 2](https://www.creative-tim.com/product/argon-dashboard)
  - [Mazer Dashboard](https://github.com/zuramai/mazer)
  - [Tabler Dashboard](https://github.com/tabler/tabler)
- Docker: [Laravel Docker](https://github.com/refactorian/laravel-docker)
- Payment: [Midtrans](https://midtrans.com)

## Lisensi
Proyek ini dilisensikan di bawah [MIT License](LICENSE.md).
