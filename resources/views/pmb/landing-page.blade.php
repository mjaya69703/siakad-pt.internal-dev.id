@extends('core-themes.core-mainpage')

@section('custom-css')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css">
<style>
    .hero-section {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        min-height: 100vh;
        display: flex;
        align-items: center;
        position: relative;
        overflow: hidden;
    }
    
    .hero-content {
        position: relative;
        z-index: 2;
    }
    
    .hero-bg-pattern {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        opacity: 0.1;
        background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.1'%3E%3Ccircle cx='30' cy='30' r='4'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
    }

    .slideshow-section {
        padding: 4rem 0;
        background: #f8f9fa;
    }

    .swiper {
        width: 100%;
        height: 400px;
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 10px 30px rgba(0,0,0,0.2);
    }

    .swiper-slide img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .slide-content {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        background: linear-gradient(transparent, rgba(0,0,0,0.8));
        color: white;
        padding: 2rem;
    }

    .stats-card {
        background: white;
        border-radius: 15px;
        padding: 2rem;
        text-align: center;
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        transition: transform 0.3s ease;
    }

    .stats-card:hover {
        transform: translateY(-5px);
    }

    .stats-number {
        font-size: 3rem;
        font-weight: 700;
        color: #667eea;
        margin-bottom: 0.5rem;
    }

    .guide-card {
        background: white;
        border-radius: 15px;
        padding: 2rem;
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        transition: transform 0.3s ease;
        height: 100%;
    }

    .guide-card:hover {
        transform: translateY(-5px);
    }

    .guide-icon {
        width: 80px;
        height: 80px;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 1.5rem;
        font-size: 2rem;
        color: white;
    }

    .agenda-item {
        background: white;
        border-radius: 10px;
        padding: 1.5rem;
        margin-bottom: 1rem;
        border-left: 4px solid #667eea;
        box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    }

    .agenda-date {
        background: #667eea;
        color: white;
        padding: 0.5rem 1rem;
        border-radius: 20px;
        font-size: 0.875rem;
        display: inline-block;
        margin-bottom: 0.5rem;
    }

    .cta-section {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        padding: 4rem 0;
        color: white;
    }

    .cta-button {
        background: white;
        color: #667eea;
        padding: 1rem 2rem;
        border-radius: 50px;
        text-decoration: none;
        font-weight: 600;
        display: inline-block;
        transition: all 0.3s ease;
        box-shadow: 0 5px 15px rgba(0,0,0,0.2);
    }

    .cta-button:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(0,0,0,0.3);
        color: #667eea;
        text-decoration: none;
    }

    .faculty-card {
        background: white;
        border-radius: 15px;
        padding: 2rem;
        text-align: center;
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        transition: transform 0.3s ease;
        height: 100%;
    }

    .faculty-card:hover {
        transform: translateY(-5px);
    }

    .payment-info-card {
        background: white;
        border-radius: 15px;
        padding: 2rem;
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        margin-bottom: 2rem;
    }

    .announcement-item {
        background: white;
        border-radius: 10px;
        padding: 1.5rem;
        margin-bottom: 1rem;
        box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        transition: transform 0.3s ease;
    }

    .announcement-item:hover {
        transform: translateY(-2px);
    }

    .floating-action {
        position: fixed;
        bottom: 2rem;
        right: 2rem;
        z-index: 1000;
    }

    .floating-button {
        background: #667eea;
        color: white;
        width: 60px;
        height: 60px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        text-decoration: none;
        box-shadow: 0 5px 15px rgba(102, 126, 234, 0.4);
        transition: all 0.3s ease;
    }

    .floating-button:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 25px rgba(102, 126, 234, 0.6);
        color: white;
        text-decoration: none;
    }
</style>
@endsection

@section('content')
<!-- Hero Section -->
<section class="hero-section">
    <div class="hero-bg-pattern"></div>
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="hero-content text-white">
                    <h1 class="display-4 fw-bold mb-4">
                        Bergabunglah dengan <span class="text-warning">{{ $webs->school_name ?? 'Universitas Ibn Khaldun' }}</span>
                    </h1>
                    <p class="lead mb-4">
                        Wujudkan impian akademis Anda bersama kami. Dapatkan pendidikan berkualitas dengan fasilitas modern dan dosen profesional.
                    </p>
                    <div class="d-flex flex-wrap gap-3">
                        <a href="{{ route('pmb.registration-form') }}" class="cta-button">
                            <i class="fas fa-user-plus me-2"></i>Daftar Sekarang
                        </a>
                        <a href="{{ route('pmb.check-status') }}" class="cta-button">
                            <i class="fas fa-search me-2"></i>Cek Status
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="text-center">
                    <img src="{{ asset('images/hero-education.png') }}" alt="Education" class="img-fluid" style="max-height: 500px;">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Statistics Section -->
<section class="py-5">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-3 col-md-6">
                <div class="stats-card">
                    <div class="stats-number">{{ number_format($statistics['total_pendaftar']) }}</div>
                    <h5 class="mb-0">Total Pendaftar</h5>
                    <small class="text-muted">Tahun {{ date('Y') }}</small>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="stats-card">
                    <div class="stats-number">{{ number_format($statistics['pendaftar_hari_ini']) }}</div>
                    <h5 class="mb-0">Pendaftar Hari Ini</h5>
                    <small class="text-muted">{{ $currentDate->format('d F Y') }}</small>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="stats-card">
                    <div class="stats-number">{{ number_format($statistics['lulus_seleksi']) }}</div>
                    <h5 class="mb-0">Lulus Seleksi</h5>
                    <small class="text-muted">Tahun {{ date('Y') }}</small>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="stats-card">
                    <div class="stats-number">{{ $faculties->count() }}</div>
                    <h5 class="mb-0">Fakultas</h5>
                    <small class="text-muted">Program Studi Tersedia</small>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Slideshow Section -->
@if($slideshows->count() > 0)
<section class="slideshow-section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="text-center mb-5">Berita & Informasi Terkini</h2>
                <div class="swiper">
                    <div class="swiper-wrapper">
                        @foreach($slideshows as $slide)
                        <div class="swiper-slide">
                            <img src="{{ $slide->image_url ?? asset('images/default-news.jpg') }}" alt="{{ $slide->title }}">
                            <div class="slide-content">
                                <h4>{{ $slide->title }}</h4>
                                <p>{{ Str::limit($slide->description, 150) }}</p>
                                <small><i class="fas fa-calendar-alt me-2"></i>{{ $slide->created_at->format('d F Y') }}</small>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="swiper-pagination"></div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>
            </div>
        </div>
    </div>
</section>
@endif

<!-- Registration Guides Section -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="text-center mb-5">Panduan Pendaftaran</h2>
            </div>
        </div>
        <div class="row g-4">
            @foreach($guides as $guide)
            <div class="col-lg-4 col-md-6">
                <div class="guide-card">
                    <div class="guide-icon">
                        <i class="{{ $guide['icon'] }}"></i>
                    </div>
                    <h4 class="text-center mb-3">{{ $guide['title'] }}</h4>
                    <ol class="list-unstyled">
                        @foreach($guide['steps'] as $step)
                        <li class="mb-2">
                            <i class="fas fa-check text-success me-2"></i>{{ $step }}
                        </li>
                        @endforeach
                    </ol>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Faculties & Programs Section -->
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="text-center mb-5">Fakultas & Program Studi</h2>
            </div>
        </div>
        <div class="row g-4">
            @foreach($faculties as $faculty)
            <div class="col-lg-4 col-md-6">
                <div class="faculty-card">
                    <div class="mb-3">
                        <i class="fas fa-university text-primary" style="font-size: 3rem;"></i>
                    </div>
                    <h4 class="mb-3">{{ $faculty->name }}</h4>
                    <p class="text-muted mb-3">{{ $faculty->description ?? 'Fakultas dengan program studi berkualitas' }}</p>
                    
                    @if($faculty->programStudis->count() > 0)
                    <div class="text-start">
                        <strong>Program Studi:</strong>
                        <ul class="list-unstyled mt-2">
                            @foreach($faculty->programStudis->take(3) as $prodi)
                            <li class="mb-1">
                                <i class="fas fa-graduation-cap text-primary me-2"></i>{{ $prodi->name }}
                            </li>
                            @endforeach
                            @if($faculty->programStudis->count() > 3)
                            <li class="text-muted">
                                <small>dan {{ $faculty->programStudis->count() - 3 }} program lainnya...</small>
                            </li>
                            @endif
                        </ul>
                    </div>
                    @endif
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Agenda & Announcements Section -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-6">
                <h3 class="mb-4">
                    <i class="fas fa-calendar-alt text-primary me-2"></i>Agenda PMB
                </h3>
                @if($agendas->count() > 0)
                    @foreach($agendas as $agenda)
                    <div class="agenda-item">
                        <div class="agenda-date">
                            {{ Carbon\Carbon::parse($agenda->tanggal)->format('d M Y') }}
                        </div>
                        <h5>{{ $agenda->nama_kegiatan }}</h5>
                        <p class="text-muted mb-2">{{ $agenda->deskripsi }}</p>
                        <small class="text-primary">
                            <i class="fas fa-clock me-1"></i>{{ $agenda->waktu ?? 'Waktu akan diumumkan' }}
                        </small>
                    </div>
                    @endforeach
                @else
                    <div class="alert alert-info">
                        <i class="fas fa-info-circle me-2"></i>
                        Agenda akan segera diumumkan
                    </div>
                @endif
            </div>
            
            <div class="col-lg-6">
                <h3 class="mb-4">
                    <i class="fas fa-bullhorn text-primary me-2"></i>Pengumuman
                </h3>
                @if($announcements->count() > 0)
                    @foreach($announcements as $announcement)
                    <div class="announcement-item">
                        <h5>{{ $announcement->title }}</h5>
                        <p class="text-muted mb-2">{{ Str::limit($announcement->content, 100) }}</p>
                        <small class="text-muted">
                            <i class="fas fa-calendar-alt me-1"></i>{{ $announcement->created_at->format('d F Y') }}
                        </small>
                    </div>
                    @endforeach
                @else
                    <div class="alert alert-info">
                        <i class="fas fa-info-circle me-2"></i>
                        Belum ada pengumuman terbaru
                    </div>
                @endif
            </div>
        </div>
    </div>
</section>

<!-- Payment Information Section -->
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="text-center mb-5">Informasi Biaya Pendaftaran</h2>
            </div>
        </div>
        
        @if($paymentInfo->count() > 0)
        <div class="row g-4">
            @foreach($paymentInfo as $jalurName => $biayaList)
            <div class="col-lg-6">
                <div class="payment-info-card">
                    <h4 class="text-primary mb-3">{{ $jalurName }}</h4>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Jenjang</th>
                                    <th>Biaya Daftar</th>
                                    <th>Biaya Tes</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($biayaList as $biaya)
                                <tr>
                                    <td>{{ $biaya->jenjang->nama ?? 'N/A' }}</td>
                                    <td>Rp {{ number_format($biaya->biaya_pendaftaran) }}</td>
                                    <td>Rp {{ number_format($biaya->biaya_tes) }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @else
        <div class="text-center">
            <div class="alert alert-info d-inline-block">
                <i class="fas fa-info-circle me-2"></i>
                Informasi biaya akan segera diumumkan
            </div>
        </div>
        @endif
        
        <div class="text-center mt-4">
            <a href="{{ route('pmb.payment-info') }}" class="btn btn-outline-primary btn-lg">
                <i class="fas fa-credit-card me-2"></i>Lihat Detail Pembayaran
            </a>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="cta-section">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h2 class="mb-4">Siap Memulai Perjalanan Pendidikan Anda?</h2>
                <p class="lead mb-4">
                    Bergabunglah dengan ribuan mahasiswa yang telah memilih {{ $webs->school_name ?? 'Universitas Ibn Khaldun' }} sebagai tempat menimba ilmu
                </p>
                <div class="d-flex flex-wrap justify-content-center gap-3">
                    <a href="{{ route('pmb.registration-form') }}" class="cta-button">
                        <i class="fas fa-user-plus me-2"></i>Daftar Sekarang
                    </a>
                    <a href="{{ route('pmb.check-status') }}" class="cta-button">
                        <i class="fas fa-search me-2"></i>Cek Status Pendaftaran
                    </a>
                    <a href="{{ route('pmb.selection-results') }}" class="cta-button">
                        <i class="fas fa-trophy me-2"></i>Hasil Seleksi
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Floating Action Button -->
<div class="floating-action">
    <a href="{{ route('pmb.registration-form') }}" class="floating-button" title="Daftar Sekarang">
        <i class="fas fa-plus"></i>
    </a>
</div>
@endsection

@section('custom-js')
<script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Initialize Swiper
    const swiper = new Swiper('.swiper', {
        loop: true,
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        autoplay: {
            delay: 5000,
            disableOnInteraction: false,
        },
        effect: 'fade',
        fadeEffect: {
            crossFade: true
        }
    });

    // Smooth scrolling for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
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

    // Animate counters
    const animateCounters = () => {
        const counters = document.querySelectorAll('.stats-number');
        counters.forEach(counter => {
            const target = parseInt(counter.textContent.replace(/,/g, ''));
            const increment = target / 100;
            let current = 0;
            
            const updateCounter = () => {
                if (current < target) {
                    current += increment;
                    counter.textContent = Math.floor(current).toLocaleString();
                    requestAnimationFrame(updateCounter);
                } else {
                    counter.textContent = target.toLocaleString();
                }
            };
            
            updateCounter();
        });
    };

    // Trigger counter animation when in viewport
    const observerOptions = {
        threshold: 0.5
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                animateCounters();
                observer.unobserve(entry.target);
            }
        });
    }, observerOptions);

    const statsSection = document.querySelector('.stats-card');
    if (statsSection) {
        observer.observe(statsSection.parentElement);
    }
});
</script>
@endsection