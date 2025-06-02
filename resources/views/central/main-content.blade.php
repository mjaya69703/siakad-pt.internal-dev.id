@extends('core-themes.core-mainpage')
@section('custom-css')
    <style>
        :root {
            --primary-color: var(--tblr-primary);
            --secondary-color: var(--tblr-secondary);
            --accent-color: var(--tblr-info);
            --primary-color-rgb: var(--tblr-primary-rgb);
            --accent-color-rgb: var(--tblr-info-rgb);
        }

        .hero-section {
            background: linear-gradient(135deg, rgba(var(--primary-color-rgb), 0.25), rgba(var(--accent-color-rgb), 0.9)), url('https://images.unsplash.com/photo-1576495199011-eb94736d05d6?q=80&w=2072&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D') no-repeat center center fixed;
            background-size: cover;
            min-height: 90vh;
            display: flex;
            align-items: center;
            position: relative;
            overflow: hidden;
            border-radius: 0 0 3rem 3rem;
        }

        .hero-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: radial-gradient(circle at center, transparent 0%, rgba(0, 0, 0, 0.3) 100%);
            z-index: 1;
        }

        .hero-content {
            position: relative;
            z-index: 2;
            opacity: 0;
            transform: translateY(30px);
            animation: fadeInUp 1s ease-out forwards;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .floating-stats {
            background: var(--tblr-card-bg);
            border: 1px solid var(--tblr-border-color);
            border-radius: 1.5rem;
            padding: 2.5rem;
            margin-top: -7rem;
            position: relative;
            z-index: 3;
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.15);
            backdrop-filter: blur(10px);
            transition: transform 0.3s ease;
        }

        .floating-stats:hover {
            transform: translateY(-5px);
        }

        .feature-card {
            border: none;
            border-radius: 1.5rem;
            transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
            overflow: hidden;
            background: var(--tblr-card-bg);
            position: relative;
            opacity: 0;
            transform: translateY(30px);
        }

        .feature-card.visible {
            opacity: 1;
            transform: translateY(0);
        }

        .feature-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
        }

        .feature-icon {
            width: 72px;
            height: 72px;
            background: linear-gradient(135deg, var(--primary-color), var(--accent-color));
            border-radius: 1.25rem;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 1.5rem;
            transition: transform 0.3s ease;
        }

        .feature-card:hover .feature-icon {
            transform: scale(1.1) rotate(5deg);
        }

        .news-card {
            border: none;
            border-radius: 1.5rem;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
            opacity: 0;
            transform: translateY(30px);
        }

        .news-card.visible {
            opacity: 1;
            transform: translateY(0);
        }

        .news-card img {
            transition: transform 0.3s ease;
        }

        .news-card:hover img {
            transform: scale(1.05);
        }

        .cta-section {
            background: linear-gradient(135deg, var(--primary-color), var(--accent-color));
            border-radius: 2rem;
            padding: 5rem 3rem;
            position: relative;
            overflow: hidden;
            box-shadow: 0 20px 40px rgba(var(--primary-color-rgb), 0.3);
        }

        .cta-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url("data:image/svg+xml,%3Csvg width='100' height='100' viewBox='0 0 100 100' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M11 18c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm48 25c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm-43-7c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm63 31c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM34 90c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm56-76c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM12 86c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm28-65c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm23-11c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-6 60c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm29 22c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zM32 63c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm57-13c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-9-21c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM60 91c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM35 41c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM12 60c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2z' fill='rgba(255,255,255,0.1)' fill-rule='evenodd'/%3E%3C/svg%3E") center center;
            opacity: 0.1;
        }

        .achievement-counter {
            font-size: 3rem;
            font-weight: bold;
            color: var(--primary-color);
            margin-bottom: 0.5rem;
        }
    </style>
@endsection

@section('content')
    <!-- Hero Section -->
    <section class="hero-section text-center text-white">
        <div class="container hero-content">
            <h1 class="display-1 fw-bold mb-4">Universitas Masa Depan</h1>
            <p class="text-white fs-3 mb-5">Membentuk Pemimpin Digital untuk Era Transformasi Global</p>
            <div class="d-flex gap-3 justify-content-center">
                <a href="#programs" class="btn btn-lg btn-primary">Program Studi</a>
                <a href="{{ route('auth.render-signin') }}" class="btn btn-lg btn-white">SIAKAD Portal</a>
            </div>
        </div>
    </section>

    <!-- Quick Access Section -->
    <div class="container position-relative mb-5">
        <div class="floating-stats">
            <div class="row g-4">
                <div class="col-lg-8">
                    <div class="row g-4 text-center">
                        <div class="col-md-3">
                            <div class="achievement-counter">50+</div>
                            <div class="text-muted">Program Studi</div>
                        </div>
                        <div class="col-md-3">
                            <div class="achievement-counter">15K+</div>
                            <div class="text-muted">Mahasiswa Aktif</div>
                        </div>
                        <div class="col-md-3">
                            <div class="achievement-counter">500+</div>
                            <div class="text-muted">Dosen Berkualitas</div>
                        </div>
                        <div class="col-md-3">
                            <div class="achievement-counter">100+</div>
                            <div class="text-muted">Mitra Industri</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="d-flex flex-column gap-2">
                        <h4 class="mb-3">Akses Cepat</h4>
                        <a href="/siakad/jadwal" class="btn btn-primary d-flex align-items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-calendar-event" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none">
                                <path d="M4 5m0 2a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2z" />
                                <path d="M16 3l0 4" />
                                <path d="M8 3l0 4" />
                                <path d="M4 11l16 0" />
                                <path d="M8 15h2v2h-2z" />
                            </svg>
                            Jadwal Kuliah
                        </a>
                        <a href="/siakad/nilai" class="btn btn-primary d-flex align-items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-certificate" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none">
                                <path d="M15 15m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0" />
                                <path d="M13 17.5v4.5l2 -1.5l2 1.5v-4.5" />
                                <path d="M10 19h-5a2 2 0 0 1 -2 -2v-10c0 -1.1 .9 -2 2 -2h14a2 2 0 0 1 2 2v10a2 2 0 0 1 -1 1.73" />
                                <path d="M6 9l12 0" />
                                <path d="M6 12l3 0" />
                                <path d="M6 15l2 0" />
                            </svg>
                            Nilai & Transkrip
                        </a>
                        <a href="/siakad/pembayaran" class="btn btn-primary d-flex align-items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-credit-card" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none">
                                <path d="M3 5m0 3a3 3 0 0 1 3 -3h12a3 3 0 0 1 3 3v8a3 3 0 0 1 -3 3h-12a3 3 0 0 1 -3 -3z" />
                                <path d="M3 10l18 0" />
                                <path d="M7 15l.01 0" />
                                <path d="M11 15l2 0" />
                            </svg>
                            Info Pembayaran
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Announcement & Calendar Section -->
    <section class="py-4">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Pengumuman Penting</h3>
                        </div>
                        <div class="list-group list-group-flush">
                            <a href="#" class="list-group-item list-group-item-action">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <span class="badge bg-red"></span>
                                    </div>
                                    <div class="col-auto">
                                        <span class="avatar">UTS</span>
                                    </div>
                                    <div class="col text-truncate">
                                        <span class="text-reset d-block">Jadwal UTS Semester Ganjil 2024/2025</span>
                                        <div class="d-block text-muted text-truncate mt-n1">Pelaksanaan UTS akan dimulai tanggal 15 Oktober 2024</div>
                                    </div>
                                </div>
                            </a>
                            <a href="#" class="list-group-item list-group-item-action">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <span class="badge bg-yellow"></span>
                                    </div>
                                    <div class="col-auto">
                                        <span class="avatar">REG</span>
                                    </div>
                                    <div class="col text-truncate">
                                        <span class="text-reset d-block">Registrasi Semester Genap 2024/2025</span>
                                        <div class="d-block text-muted text-truncate mt-n1">Pembayaran dan pengisian KRS dimulai 1 Januari 2025</div>
                                    </div>
                                </div>
                            </a>
                            <a href="#" class="list-group-item list-group-item-action">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <span class="badge bg-green"></span>
                                    </div>
                                    <div class="col-auto">
                                        <span class="avatar">BEA</span>
                                    </div>
                                    <div class="col text-truncate">
                                        <span class="text-reset d-block">Program Beasiswa Prestasi 2024</span>
                                        <div class="d-block text-muted text-truncate mt-n1">Pendaftaran beasiswa prestasi dibuka sampai 30 September 2024</div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-header d-flex align-items-center justify-content-between">
                            <h3 class="card-title m-0">Kalender Akademik</h3>
                            <a href="#" class="btn btn-sm btn-primary">Lihat Semua</a>
                        </div>
                        <div class="list-group list-group-flush">
                            <div class="list-group-item">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <div class="avatar bg-primary-lt">
                                            <span class="avatar-text">SEP</span>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="text-truncate">Awal Perkuliahan</div>
                                        <div class="text-muted">Semester Ganjil 2024/2025</div>
                                    </div>
                                    <div class="col-auto">
                                        <span class="badge bg-primary-lt">4 Sep</span>
                                    </div>
                                </div>
                            </div>
                            <div class="list-group-item">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <div class="avatar bg-yellow-lt">
                                            <span class="avatar-text">OKT</span>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="text-truncate">Ujian Tengah Semester</div>
                                        <div class="text-muted">15-26 Oktober 2024</div>
                                    </div>
                                    <div class="col-auto">
                                        <span class="badge bg-yellow-lt">15 Okt</span>
                                    </div>
                                </div>
                            </div>
                            <div class="list-group-item">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <div class="avatar bg-red-lt">
                                            <span class="avatar-text">DES</span>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="text-truncate">Ujian Akhir Semester</div>
                                        <div class="text-muted">11-22 Desember 2024</div>
                                    </div>
                                    <div class="col-auto">
                                        <span class="badge bg-red-lt">11 Des</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="py-6">
        <div class="container">
            <h2 class="text-center mb-5">Keunggulan Kami</h2>
            <div class="row g-4">
                <div class="col-lg-4">
                    <div class="feature-card p-4">
                        <div class="feature-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-device-laptop text-white" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none">
                                <path d="M3 19l18 0" />
                                <path d="M5 6m0 1a1 1 0 0 1 1 -1h12a1 1 0 0 1 1 1v8a1 1 0 0 1 -1 1h-12a1 1 0 0 1 -1 -1z" />
                            </svg>
                        </div>
                        <h3 class="h4 mb-3">Pembelajaran Digital</h3>
                        <p class="text-muted">Platform pembelajaran digital terintegrasi dengan akses 24/7 ke materi perkuliahan</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="feature-card p-4">
                        <div class="feature-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-certificate text-white" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none">
                                <path d="M15 15m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0" />
                                <path d="M13 17.5v4.5l2 -1.5l2 1.5v-4.5" />
                                <path d="M10 19h-5a2 2 0 0 1 -2 -2v-10c0 -1.1 .9 -2 2 -2h14a2 2 0 0 1 2 2v10a2 2 0 0 1 -1 1.73" />
                                <path d="M6 9l12 0" />
                                <path d="M6 12l3 0" />
                                <path d="M6 15l2 0" />
                            </svg>
                        </div>
                        <h3 class="h4 mb-3">Sertifikasi Industri</h3>
                        <p class="text-muted">Program sertifikasi profesional dari mitra industri terkemuka</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="feature-card p-4">
                        <div class="feature-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-world text-white" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none">
                                <path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0" />
                                <path d="M3.6 9h16.8" />
                                <path d="M3.6 15h16.8" />
                                <path d="M11.5 3a17 17 0 0 0 0 18" />
                                <path d="M12.5 3a17 17 0 0 1 0 18" />
                            </svg>
                        </div>
                        <h3 class="h4 mb-3">Jaringan Global</h3>
                        <p class="text-muted">Kesempatan pertukaran pelajar dan kolaborasi internasional</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Programs Section -->
    <section id="programs" class="py-6">
        <div class="container">
            <h2 class="text-center mb-5">Program Studi Unggulan</h2>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card news-card h-100">
                        <img src="https://images.unsplash.com/photo-1517694712202-14dd9538aa97?auto=format&fit=crop&q=80&w=400&h=250" class="card-img-top" alt="Teknik Informatika">
                        <div class="card-body">
                            <h5 class="card-title">Fakultas Teknologi</h5>
                            <p class="card-text">Teknik Informatika, Sistem Informasi, Data Science</p>
                            <a href="#" class="btn btn-primary">Selengkapnya</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card news-card h-100">
                        <img src="https://images.unsplash.com/photo-1664575602276-acd073f104c1?auto=format&fit=crop&q=80&w=400&h=250" class="card-img-top" alt="Business">
                        <div class="card-body">
                            <h5 class="card-title">Fakultas Bisnis</h5>
                            <p class="card-text">Manajemen, Akuntansi, Digital Business</p>
                            <a href="#" class="btn btn-primary">Selengkapnya</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card news-card h-100">
                        <img src="https://images.unsplash.com/photo-1626785774573-4b799315345d?auto=format&fit=crop&q=80&w=400&h=250" class="card-img-top" alt="Creative">
                        <div class="card-body">
                            <h5 class="card-title">Fakultas Industri Kreatif</h5>
                            <p class="card-text">Desain Komunikasi Visual, Animasi, Game Development</p>
                            <a href="#" class="btn btn-primary">Selengkapnya</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- News Section -->
    <section class="py-6">
        <div class="container">
            <h2 class="text-center mb-5">Berita & Kegiatan</h2>
            <div class="row g-4">
                <div class="col-lg-8">
                    <div class="card news-card">
                        <img src="https://images.unsplash.com/photo-1540575467063-178a50c2df87?auto=format&fit=crop&q=80&w=1200&h=500" class="card-img-top" alt="Main Event">
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-3">
                                <span class="badge bg-primary me-2">Event</span>
                                <small class="text-muted">21 Juli 2024</small>
                            </div>
                            <h3 class="card-title h4">International Technology Conference 2024</h3>
                            <p class="card-text">Konferensi teknologi tahunan dengan pembicara dari perusahaan teknologi global</p>
                            <a href="#" class="btn btn-primary">Baca Selengkapnya</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="row g-4">
                        <div class="col-12">
                            <div class="card news-card">
                                <div class="card-body">
                                    <div class="d-flex align-items-center mb-3">
                                        <span class="badge bg-success me-2">Prestasi</span>
                                        <small class="text-muted">19 Juli 2024</small>
                                    </div>
                                    <h5 class="card-title">Tim Robotika Juara Internasional</h5>
                                    <p class="card-text">Mahasiswa teknik meraih juara di kompetisi robotika internasional</p>
                                    <a href="#" class="btn btn-primary btn-sm">Baca Selengkapnya</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="card news-card">
                                <div class="card-body">
                                    <div class="d-flex align-items-center mb-3">
                                        <span class="badge bg-info me-2">Akademik</span>
                                        <small class="text-muted">18 Juli 2024</small>
                                    </div>
                                    <h5 class="card-title">Pembukaan Program Magister AI</h5>
                                    <p class="card-text">Program magister baru fokus pada Artificial Intelligence dan Machine Learning</p>
                                    <a href="#" class="btn btn-primary btn-sm">Baca Selengkapnya</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Gallery Section -->
    <section class="py-6">
        <div class="container">
            <div class="d-flex align-items-center justify-content-between mb-5">
                <h2 class="mb-0">Galeri Kampus</h2>
                <a href="/gallery" class="btn btn-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-photo" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M15 8h.01"></path>
                        <path d="M3 6a3 3 0 0 1 3 -3h12a3 3 0 0 1 3 3v12a3 3 0 0 1 -3 3h-12a3 3 0 0 1 -3 -3v-12z"></path>
                        <path d="M3 16l5 -5c.928 -.893 2.072 -.893 3 0l5 5"></path>
                        <path d="M14 14l1 -1c.928 -.893 2.072 -.893 3 0l3 3"></path>
                    </svg>
                    Lihat Semua Galeri
                </a>
            </div>
            <div class="row g-4">
                <div class="col-lg-4 col-md-6">
                    <div class="card rounded-4 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1562774053-701939374585?auto=format&fit=crop&q=80&w=800&h=600" class="card-img-top" alt="Campus Life">
                        <div class="card-body">
                            <h5 class="card-title">Kehidupan Kampus</h5>
                            <p class="text-muted">Suasana akademik yang mendukung</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="card rounded-4 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1523050854058-8df90110c9f1?auto=format&fit=crop&q=80&w=800&h=600" class="card-img-top" alt="Library">
                        <div class="card-body">
                            <h5 class="card-title">Perpustakaan Modern</h5>
                            <p class="text-muted">Pusat sumber daya pembelajaran</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="card rounded-4 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1523050854058-8df90110c9f1?auto=format&fit=crop&q=80&w=800&h=600" class="card-img-top" alt="Laboratory">
                        <div class="card-body">
                            <h5 class="card-title">Laboratorium Canggih</h5>
                            <p class="text-muted">Fasilitas penelitian terkini</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="py-6">
        <div class="container">
            <h2 class="text-center mb-5">Frequently Asked Questions</h2>
            <div class="accordion" id="faqAccordion">
                <div class="accordion-item rounded-4 mb-3">
                    <h2 class="accordion-header">
                        <button class="accordion-button rounded-4" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">
                            Bagaimana cara mendaftar kuliah?
                        </button>
                    </h2>
                    <div id="faq1" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            Pendaftaran dapat dilakukan secara online melalui website PMB kami. Ikuti langkah-langkah yang tersedia dan siapkan dokumen yang diperlukan.
                        </div>
                    </div>
                </div>
                <div class="accordion-item rounded-4 mb-3">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed rounded-4" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">
                            Apa saja program beasiswa yang tersedia?
                        </button>
                    </h2>
                    <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            Kami menyediakan berbagai program beasiswa, termasuk beasiswa akademik, beasiswa prestasi non-akademik, dan beasiswa kemitraan dengan industri.
                        </div>
                    </div>
                </div>
                <div class="accordion-item rounded-4 mb-3">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed rounded-4" type="button" data-bs-toggle="collapse" data-bs-target="#faq3">
                            Bagaimana sistem perkuliahan hybrid?
                        </button>
                    </h2>
                    <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            Sistem perkuliahan hybrid menggabungkan pembelajaran tatap muka dan online, didukung platform digital yang memudahkan akses materi dan interaksi.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta-section py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8 text-lg-start text-center">
                    <h2 class="mb-3">Siap Bergabung dengan Kami?</h2>
                    <p class="text-white mb-0">Daftar sekarang dan mulai perjalanan akademik Anda bersama kami.</p>
                </div>
                <div class="col-lg-4 text-lg-end text-center mt-4 mt-lg-0">
                    <a href="#" class="btn btn-primary btn-lg">Daftar Sekarang</a>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('custom-js')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Animasi counter untuk statistik
            const animateCounter = (counter) => {
                const target = parseInt(counter.innerText);
                let count = 0;
                const duration = 2000;
                const increment = target / (duration / 16);
                const updateCount = () => {
                    count += increment;
                    if (count < target) {
                        counter.innerText = Math.ceil(count) + '+';
                        requestAnimationFrame(updateCount);
                    } else {
                        counter.innerText = target + '+';
                    }
                };
                updateCount();
            };

            // Intersection Observer untuk animasi scroll
            const animateOnScroll = (elements, className, callback = null) => {
                const observer = new IntersectionObserver((entries) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            entry.target.classList.add(className);
                            if (callback) callback(entry.target);
                            observer.unobserve(entry.target);
                        }
                    });
                }, {
                    threshold: 0.2,
                    rootMargin: '0px 0px -50px 0px'
                });

                elements.forEach(el => observer.observe(el));
            };

            // Inisialisasi animasi untuk berbagai elemen
            const counters = document.querySelectorAll('.achievement-counter');
            const featureCards = document.querySelectorAll('.feature-card');
            const newsCards = document.querySelectorAll('.news-card');

            animateOnScroll(counters, 'visible', animateCounter);
            animateOnScroll(featureCards, 'visible');
            animateOnScroll(newsCards, 'visible');

            // Smooth scroll untuk navigasi
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function(e) {
                    e.preventDefault();
                    const target = document.querySelector(this.getAttribute('href'));
                    if (target) {
                        target.scrollIntoView({
                            behavior: 'smooth',
                            block: 'start'
                        });
                    }
                });
            });

            // Parallax effect untuk hero section
            const heroSection = document.querySelector('.hero-section');
            window.addEventListener('scroll', () => {
                const scroll = window.pageYOffset;
                if (heroSection) {
                    heroSection.style.backgroundPositionY = `${scroll * 0.5}px`;
                }
            });
        });
    </script>
@endsection
