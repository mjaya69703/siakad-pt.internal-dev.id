@extends('core-themes.core-mainpage')

@section('custom-css')
    <style>
        .hero-section {
            background: linear-gradient(135deg, rgba(var(--tblr-info-rgb), 0.7), rgba(var(--tblr-primary-rgb), 0.8)), url('https://images.unsplash.com/photo-1504711434969-e33886168f5c?q=80&w=2070&auto=format&fit=crop') no-repeat center center;
            background-size: cover;
            background-position: center;
            background-attachment: scroll;
            min-height: 70vh;
            display: flex;
            align-items: center;
            position: relative;
            border-radius: 0 0 3rem 3rem;
            overflow: hidden;
            z-index: 1;
            margin-bottom: 3rem;
        }

        .hero-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.3);
            backdrop-filter: blur(0.5px);
            z-index: 1;
        }

        .hero-content {
            position: relative;
            z-index: 2;
            width: 100%;
        }

        .breadcrumb-item a,
        .breadcrumb-item.active {
            text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.5);
        }

        .news-content-card {
            background: var(--tblr-card-bg);
            border: 1px solid var(--tblr-border-color-light);
            border-radius: 1.5rem;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.1);
            margin-bottom: 2rem;
            overflow: hidden;
            transition: all 0.3s ease;
            position: relative;
            z-index: 2;
        }

        .news-content-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 12px 40px rgba(0, 0, 0, 0.15);
        }

        .news-header-card {
            background: linear-gradient(135deg, var(--tblr-info), var(--tblr-primary));
            color: white;
            padding: 2.5rem;
            border-radius: 1.5rem 1.5rem 0 0;
            position: relative;
            overflow: hidden;
        }

        .news-header-card::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -50%;
            width: 120%;
            height: 120%;
            background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, transparent 70%);
            transform: rotate(45deg);
        }

        .news-header-content {
            position: relative;
            z-index: 2;
        }

        .news-meta-badge {
            display: inline-flex;
            align-items: center;
            gap: 0.75rem;
            background: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(15px);
            padding: 0.75rem 1.25rem;
            border-radius: 2rem;
            font-size: 0.95rem;
            margin-bottom: 1.5rem;
            font-weight: 600;
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .news-code {
            font-family: 'JetBrains Mono', 'Courier New', monospace;
            font-size: 1rem;
            background: rgba(255, 255, 255, 0.2);
            padding: 0.75rem 1.25rem;
            border-radius: 0.75rem;
            display: inline-block;
            margin-bottom: 1.5rem;
            border: 1px solid rgba(255, 255, 255, 0.2);
            font-weight: 600;
            color: white;
            text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.3);
        }

        .news-title {
            font-size: 2.8rem;
            font-weight: 800;
            margin-bottom: 1rem;
            line-height: 1.1;
            text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.5);
            color: white;
        }

        .news-subtitle {
            font-size: 1.1rem;
            opacity: 0.95;
            margin-bottom: 2rem;
            font-weight: 500;
            text-shadow: 1px 1px 4px rgba(0, 0, 0, 0.4);
            color: white;
        }

        .news-stats {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(140px, 1fr));
            gap: 1.25rem;
        }

        .news-stat-item {
            text-align: center;
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(15px);
            padding: 1.5rem 1rem;
            border-radius: 1rem;
            border: 1px solid rgba(255, 255, 255, 0.2);
            transition: all 0.3s ease;
        }

        .news-stat-item:hover {
            background: rgba(255, 255, 255, 0.25);
            transform: translateY(-2px);
        }

        .news-stat-value {
            font-size: 1.5rem;
            font-weight: 800;
            margin-bottom: 0.5rem;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.2);
        }

        .news-stat-label {
            font-size: 0.85rem;
            opacity: 0.9;
            font-weight: 500;
        }

        .content-section {
            padding: 2.5rem;
        }

        .content-section h3 {
            color: var(--tblr-primary);
            font-weight: 700;
            margin-bottom: 2rem;
            display: flex;
            align-items: center;
            gap: 1rem;
            font-size: 1.5rem;
        }

        .content-section h3::before {
            content: '';
            width: 4px;
            height: 2rem;
            background: linear-gradient(135deg, var(--tblr-primary), var(--tblr-info));
            border-radius: 2px;
        }

        .content-text {
            font-size: 1.1rem;
            line-height: 1.8;
            color: var(--tblr-text-secondary);
        }

        .content-text p {
            margin-bottom: 1.5rem;
        }

        .content-text img {
            max-width: 100%;
            height: auto;
            border-radius: 1rem;
            margin: 2rem 0;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
        }

        .featured-image {
            width: 100%;
            height: 400px;
            background-size: cover;
            background-position: center;
            border-radius: 1.5rem;
            margin-bottom: 2rem;
            position: relative;
            overflow: hidden;
            box-shadow: 0 12px 35px rgba(0, 0, 0, 0.15);
        }

        .featured-image::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(180deg, transparent 0%, rgba(0,0,0,0.3) 100%);
        }

        .sidebar-card {
            background: var(--tblr-card-bg);
            border: 1px solid var(--tblr-border-color-light);
            border-radius: 1.25rem;
            padding: 2rem;
            box-shadow: 0 6px 25px rgba(0, 0, 0, 0.08);
            margin-bottom: 2rem;
            transition: all 0.3s ease;
            position: relative;
            z-index: 2;
        }

        .sidebar-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 35px rgba(0, 0, 0, 0.12);
        }

        .sidebar-card h5 {
            color: var(--tblr-primary);
            margin-bottom: 1.5rem;
            font-weight: 700;
            font-size: 1.2rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .sidebar-card h5::before {
            content: '';
            width: 4px;
            height: 1.5rem;
            background: linear-gradient(135deg, var(--tblr-primary), var(--tblr-info));
            border-radius: 2px;
        }

        .related-news-item {
            display: flex;
            gap: 1rem;
            padding: 1.25rem;
            background: var(--tblr-bg-surface-secondary);
            border-radius: 1rem;
            margin-bottom: 1rem;
            transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            text-decoration: none;
            color: inherit;
            border: 1px solid transparent;
        }

        .related-news-item:hover {
            background: var(--tblr-primary);
            color: white;
            transform: translateY(-2px) translateX(4px);
            box-shadow: 0 8px 25px rgba(var(--tblr-primary-rgb), 0.3);
            border-color: var(--tblr-primary);
        }

        .related-news-image {
            width: 80px;
            height: 80px;
            background-size: cover;
            background-position: center;
            border-radius: 0.75rem;
            flex-shrink: 0;
        }

        .related-news-content h6 {
            margin-bottom: 0.5rem;
            font-weight: 700;
            font-size: 1rem;
            line-height: 1.3;
        }

        .related-news-content small {
            opacity: 0.8;
            font-size: 0.85rem;
        }

        .share-card {
            background: linear-gradient(135deg, var(--tblr-success), var(--tblr-info));
            color: white;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .share-card::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -50%;
            width: 100%;
            height: 100%;
            background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, transparent 70%);
            transform: rotate(45deg);
        }

        .share-card .btn {
            background: rgba(255, 255, 255, 0.2);
            border: 1px solid rgba(255, 255, 255, 0.3);
            color: white;
            backdrop-filter: blur(10px);
            font-weight: 600;
            padding: 0.75rem 1.5rem;
            border-radius: 0.75rem;
            transition: all 0.3s ease;
            margin: 0.25rem;
        }

        .share-card .btn:hover {
            background: rgba(255, 255, 255, 0.3);
            border-color: rgba(255, 255, 255, 0.5);
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }

        .back-navigation {
            margin-bottom: 2rem;
        }

        .btn-back {
            display: inline-flex;
            align-items: center;
            gap: 0.75rem;
            background: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(15px);
            border: 1px solid rgba(255, 255, 255, 0.3);
            color: white;
            padding: 1rem 1.75rem;
            border-radius: 1rem;
            text-decoration: none;
            transition: all 0.3s ease;
            font-weight: 600;
        }

        .btn-back:hover {
            background: rgba(255, 255, 255, 0.3);
            border-color: rgba(255, 255, 255, 0.5);
            color: white;
            transform: translateY(-2px) translateX(-2px);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }

        .breadcrumb {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(15px);
            border-radius: 2rem;
            padding: 0.75rem 1.5rem;
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .breadcrumb-item + .breadcrumb-item::before {
            color: rgba(255, 255, 255, 0.7);
        }

        .info-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2rem;
        }

        .info-item {
            background: linear-gradient(135deg, var(--tblr-bg-surface-secondary), rgba(var(--tblr-primary-rgb), 0.03));
            padding: 1.5rem;
            border-radius: 1rem;
            border-left: 4px solid var(--tblr-primary);
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .info-item::before {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            width: 60px;
            height: 60px;
            background: rgba(var(--tblr-primary-rgb), 0.1);
            border-radius: 0 0 0 60px;
        }

        .info-item:hover {
            transform: translateY(-4px);
            box-shadow: 0 8px 25px rgba(var(--tblr-primary-rgb), 0.15);
            border-left-color: var(--tblr-info);
        }

        .info-label {
            font-size: 0.9rem;
            color: var(--tblr-text-muted);
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 0.75rem;
            font-weight: 700;
        }

        .info-value {
            font-size: 1.1rem;
            font-weight: 700;
            color: var(--tblr-text-dark);
            position: relative;
            z-index: 2;
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

        .news-content-card {
            animation: fadeInUp 0.6s ease-out;
        }

        .sidebar-card {
            animation: fadeInUp 0.6s ease-out;
        }

        @media (max-width: 768px) {
            .hero-section {
                min-height: 60vh;
                background-attachment: scroll;
                position: relative;
            }
            
            .news-title {
                font-size: 2.2rem;
            }
            
            .news-subtitle {
                font-size: 1rem;
            }
            
            .content-section {
                padding: 1.5rem;
            }
            
            .sidebar-card {
                padding: 1.5rem;
            }
            
            .news-stats {
                grid-template-columns: repeat(2, 1fr);
            }
            
            .info-grid {
                grid-template-columns: 1fr;
            }

            .featured-image {
                height: 250px;
            }
        }
    </style>
@endsection

@section('content')
    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container hero-content">
            <div class="back-navigation">
                <a href="{{ route('root.berita-index') }}" class="btn-back">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="m15 18-6-6 6-6"></path>
                    </svg>
                    Kembali ke Berita
                </a>
            </div>
            
            <nav aria-label="breadcrumb" class="mb-4">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/" class="text-white">Beranda</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('root.berita-index') }}" class="text-white">Berita</a></li>
                    <li class="breadcrumb-item active text-white" aria-current="page">{{ $berita->name }}</li>
                </ol>
            </nav>

            <div class="news-meta-badge">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M4 22h16a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H8a2 2 0 0 0-2 2v16a2 2 0 0 1-2 2Zm0 0a2 2 0 0 1-2-2v-9c0-1.1.9-2 2-2h2"></path>
                    <path d="M18 14h-8"></path>
                    <path d="M15 18h-5"></path>
                    <path d="M10 6h8"></path>
                </svg>
                @if($berita->kategori)
                    {{ $berita->kategori->name }}
                @else
                    Berita
                @endif
            </div>

            <div class="news-code">{{ $berita->code }}</div>
            
            <h1 class="news-title">{{ $berita->name }}</h1>
            
            <p class="news-subtitle">
                @if($berita->author)
                    <strong>Penulis:</strong> {{ $berita->author->name }} •
                @endif
                <strong>Dipublikasikan:</strong> {{ \Carbon\Carbon::parse($berita->created_at)->format('d F Y') }}
            </p>

            <div class="news-stats">
                <div class="news-stat-item">
                    <div class="news-stat-value">{{ $berita->status }}</div>
                    <div class="news-stat-label">Status</div>
                </div>
                <div class="news-stat-item">
                    <div class="news-stat-value">{{ \Carbon\Carbon::parse($berita->created_at)->format('M Y') }}</div>
                    <div class="news-stat-label">Publikasi</div>
                </div>
                @if($berita->kategori)
                    <div class="news-stat-item">
                        <div class="news-stat-value">{{ Str::limit($berita->kategori->name, 10) }}</div>
                        <div class="news-stat-label">Kategori</div>
                    </div>
                @endif
                <div class="news-stat-item">
                    <div class="news-stat-value">{{ str_word_count(strip_tags($berita->content)) }}</div>
                    <div class="news-stat-label">Kata</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Main Content -->
    <section class="py-6" style="position: relative; z-index: 10;">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-8">
                    <!-- Featured Image -->
                    @if($berita->photo)
                        <div class="featured-image" style="background-image: url('{{ asset('storage/' . $berita->photo) }}')"></div>
                    @endif

                    <!-- Content Section -->
                    <div class="news-content-card">
                        <div class="content-section">
                            <h3>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M4 22h16a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H8a2 2 0 0 0-2 2v16a2 2 0 0 1-2 2Zm0 0a2 2 0 0 1-2-2v-9c0-1.1.9-2 2-2h2"></path>
                                    <path d="M18 14h-8"></path>
                                    <path d="M15 18h-5"></path>
                                    <path d="M10 6h8"></path>
                                </svg>
                                Isi Berita
                            </h3>
                            <div class="content-text">
                                {!! $berita->content !!}
                            </div>
                        </div>
                    </div>

                    <!-- Article Information -->
                    <div class="news-content-card">
                        <div class="content-section">
                            <h3>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <circle cx="12" cy="12" r="3"></circle>
                                    <path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1 1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path>
                                </svg>
                                Informasi Artikel
                            </h3>
                            <div class="info-grid">
                                <div class="info-item">
                                    <div class="info-label">Kode Berita</div>
                                    <div class="info-value">{{ $berita->code }}</div>
                                </div>
                                <div class="info-item">
                                    <div class="info-label">Slug URL</div>
                                    <div class="info-value">{{ $berita->slug }}</div>
                                </div>
                                @if($berita->kategori)
                                    <div class="info-item">
                                        <div class="info-label">Kategori</div>
                                        <div class="info-value">{{ $berita->kategori->name }}</div>
                                    </div>
                                @endif
                                <div class="info-item">
                                    <div class="info-label">Status Publikasi</div>
                                    <div class="info-value">
                                        <span class="badge bg-{{ $berita->status == 'Publish' ? 'success' : ($berita->status == 'Draft' ? 'warning' : 'secondary') }}">
                                            {{ $berita->status }}
                                        </span>
                                    </div>
                                </div>
                                <div class="info-item">
                                    <div class="info-label">Tanggal Dibuat</div>
                                    <div class="info-value">{{ \Carbon\Carbon::parse($berita->created_at)->format('d F Y, H:i') }}</div>
                                </div>
                                <div class="info-item">
                                    <div class="info-label">Terakhir Diperbarui</div>
                                    <div class="info-value">{{ \Carbon\Carbon::parse($berita->updated_at)->diffForHumans() }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Sidebar -->
                <div class="col-lg-4">
                    <!-- Share Article -->
                    <div class="sidebar-card share-card">
                        <h5>
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="me-2">
                                <path d="M4 12v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-8"></path>
                                <polyline points="16,6 12,2 8,6"></polyline>
                                <line x1="12" y1="2" x2="12" y2="15"></line>
                            </svg>
                            Bagikan Artikel
                        </h5>
                        <div class="d-grid gap-2">
                            <button class="btn" onclick="shareToFacebook()">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path>
                                </svg>
                                Facebook
                            </button>
                            <button class="btn" onclick="shareToTwitter()">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"></path>
                                </svg>
                                Twitter
                            </button>
                            <button class="btn" onclick="shareToWhatsApp()">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"></path>
                                </svg>
                                WhatsApp
                            </button>
                            <button class="btn" onclick="copyToClipboard()">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect>
                                    <path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path>
                                </svg>
                                Salin Link
                            </button>
                        </div>
                    </div>

                    <!-- Related News from Same Category -->
                    @if($relatedBerita->count() > 0)
                        <div class="sidebar-card">
                            <h5>Berita Terkait</h5>
                            @foreach($relatedBerita as $related)
                                <a href="{{ route('root.berita-view', $related->slug) }}" class="related-news-item">
                                    <div class="related-news-image" style="background-image: url('{{ asset('storage/' . $related->photo) }}')"></div>
                                    <div class="related-news-content">
                                        <h6>{{ Str::limit($related->name, 60) }}</h6>
                                        <small>{{ \Carbon\Carbon::parse($related->created_at)->diffForHumans() }}</small>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    @endif

                    <!-- Quick Actions -->
                    <div class="sidebar-card">
                        <h5>Aksi Cepat</h5>
                        <div class="d-grid gap-2">
                            <a href="{{ route('root.berita-index') }}" class="btn btn-outline-primary">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M4 22h16a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H8a2 2 0 0 0-2 2v16a2 2 0 0 1-2 2Zm0 0a2 2 0 0 1-2-2v-9c0-1.1.9-2 2-2h2"></path>
                                    <path d="M18 14h-8"></path>
                                    <path d="M15 18h-5"></path>
                                    <path d="M10 6h8"></path>
                                </svg>
                                Lihat Semua Berita
                            </a>
                            <button class="btn btn-outline-info" onclick="window.print()">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <polyline points="6,9 6,2 18,2 18,9"></polyline>
                                    <path d="M6 18H4a2 2 0 01-2-2v-5a2 2 0 012-2h16a2 2 0 012 2v5a2 2 0 01-2 2h-2"></path>
                                    <rect x="6" y="14" width="12" height="8"></rect>
                                </svg>
                                Cetak Artikel
                            </button>
                            <button class="btn btn-outline-secondary" onclick="window.history.back()">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="m12 19-7-7 7-7"></path>
                                    <path d="m19 12H5"></path>
                                </svg>
                                Kembali
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('custom-js')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Enhanced smooth scrolling for anchor links
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

            // Enhanced animation on scroll with stagger effect
            const observerOptions = {
                threshold: 0.1,
                rootMargin: '0px 0px -80px 0px'
            };

            const observer = new IntersectionObserver(function(entries) {
                entries.forEach((entry, index) => {
                    if (entry.isIntersecting) {
                        setTimeout(() => {
                            entry.target.style.opacity = '1';
                            entry.target.style.transform = 'translateY(0)';
                        }, index * 100);
                        observer.unobserve(entry.target);
                    }
                });
            }, observerOptions);

            // Observe all content cards with enhanced animations
            document.querySelectorAll('.news-content-card, .sidebar-card, .info-item').forEach((element, index) => {
                element.style.opacity = '0';
                element.style.transform = 'translateY(30px)';
                element.style.transition = 'opacity 0.8s cubic-bezier(0.25, 0.46, 0.45, 0.94), transform 0.8s cubic-bezier(0.25, 0.46, 0.45, 0.94)';
                observer.observe(element);
            });

            // Enhanced hover effects for related news items
            document.querySelectorAll('.related-news-item').forEach(item => {
                item.addEventListener('mouseenter', function() {
                    this.style.transform = 'translateY(-4px) translateX(8px) scale(1.02)';
                });
                
                item.addEventListener('mouseleave', function() {
                    this.style.transform = 'translateY(0) translateX(0) scale(1)';
                });
            });
        });

        // Share functions
        function shareToFacebook() {
            const url = encodeURIComponent(window.location.href);
            const title = encodeURIComponent('{{ $berita->name }}');
            window.open(`https://www.facebook.com/sharer/sharer.php?u=${url}&t=${title}`, '_blank', 'width=600,height=400');
        }

        function shareToTwitter() {
            const url = encodeURIComponent(window.location.href);
            const title = encodeURIComponent('{{ $berita->name }}');
            window.open(`https://twitter.com/intent/tweet?url=${url}&text=${title}`, '_blank', 'width=600,height=400');
        }

        function shareToWhatsApp() {
            const url = encodeURIComponent(window.location.href);
            const title = encodeURIComponent('{{ $berita->name }}');
            window.open(`https://wa.me/?text=${title}%20${url}`, '_blank');
        }

        function copyToClipboard() {
            navigator.clipboard.writeText(window.location.href).then(() => {
                // Show notification
                const notification = document.createElement('div');
                notification.textContent = 'Link berhasil disalin!';
                notification.style.cssText = `
                    position: fixed;
                    top: 20px;
                    right: 20px;
                    background: var(--tblr-success);
                    color: white;
                    padding: 1rem 1.5rem;
                    border-radius: 0.5rem;
                    z-index: 1000;
                    font-weight: 600;
                    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
                    opacity: 0;
                    transform: translateY(-20px);
                    transition: all 0.3s ease;
                `;
                
                document.body.appendChild(notification);
                
                setTimeout(() => {
                    notification.style.opacity = '1';
                    notification.style.transform = 'translateY(0)';
                }, 100);
                
                setTimeout(() => {
                    notification.style.opacity = '0';
                    notification.style.transform = 'translateY(-20px)';
                    setTimeout(() => notification.remove(), 300);
                }, 3000);
            });
        }
    </script>
@endsection
