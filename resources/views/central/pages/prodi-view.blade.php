@extends('core-themes.core-mainpage')

@section('custom-css')
    <style>
        .hero-section {
            background: linear-gradient(135deg, rgba(var(--tblr-primary-rgb), 0.6), rgba(var(--tblr-info-rgb), 0.7)), url('https://images.unsplash.com/photo-1497366216548-37526070297c?q=80&w=2069&auto=format&fit=crop') no-repeat center center;
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
            background: rgba(0, 0, 0, 0.2);
            backdrop-filter: blur(0.5px);
            z-index: 1;
        }

        .hero-content {
            position: relative;
            z-index: 2;
            width: 100%;
        }

        /* Breadcrumb styling */
        .breadcrumb-item a,
        .breadcrumb-item.active {
            text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.5);
        }

        .prodi-content-card {
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

        .prodi-content-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 12px 40px rgba(0, 0, 0, 0.15);
        }

        .prodi-header-card {
            background: linear-gradient(135deg, var(--tblr-primary), var(--tblr-info));
            color: white;
            padding: 2.5rem;
            border-radius: 1.5rem 1.5rem 0 0;
            position: relative;
            overflow: hidden;
        }

        .prodi-header-card::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -50%;
            width: 120%;
            height: 120%;
            background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, transparent 70%);
            transform: rotate(45deg);
        }

        .prodi-header-content {
            position: relative;
            z-index: 2;
        }

        .prodi-meta-badge {
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

        .prodi-code {
            font-family: 'JetBrains Mono', 'Courier New', monospace;
            font-size: 1.1rem;
            background: rgba(255, 255, 255, 0.2);
            padding: 0.75rem 1.25rem;
            border-radius: 0.75rem;
            display: inline-block;
            margin-bottom: 1.5rem;
            border: 1px solid rgba(255, 255, 255, 0.2);
            font-weight: 700;
            color: white;
            text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.3);
        }

        .prodi-title {
            font-size: 3rem;
            font-weight: 800;
            margin-bottom: 1rem;
            line-height: 1.1;
            text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.5);
            color: white;
        }

        .prodi-subtitle {
            font-size: 1.2rem;
            opacity: 0.95;
            margin-bottom: 2rem;
            font-weight: 500;
            text-shadow: 1px 1px 4px rgba(0, 0, 0, 0.4);
            color: white;
        }

        .prodi-stats {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(140px, 1fr));
            gap: 1.25rem;
        }

        .prodi-stat-item {
            text-align: center;
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(15px);
            padding: 1.5rem 1rem;
            border-radius: 1rem;
            border: 1px solid rgba(255, 255, 255, 0.2);
            transition: all 0.3s ease;
        }

        .prodi-stat-item:hover {
            background: rgba(255, 255, 255, 0.25);
            transform: translateY(-2px);
        }

        .prodi-stat-value {
            font-size: 1.75rem;
            font-weight: 800;
            margin-bottom: 0.5rem;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.2);
        }

        .prodi-stat-label {
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
            font-size: 1.05rem;
            line-height: 1.8;
            color: var(--tblr-text-secondary);
        }

        .info-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2rem;
        }

        .info-item {
            background: linear-gradient(135deg, var(--tblr-bg-surface-secondary), rgba(var(--tblr-primary-rgb), 0.03));
            padding: 2rem;
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
            font-size: 1.25rem;
            font-weight: 700;
            color: var(--tblr-text-dark);
            position: relative;
            z-index: 2;
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

        .related-prodi-item {
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

        .related-prodi-item:hover {
            background: var(--tblr-primary);
            color: white;
            transform: translateY(-2px) translateX(4px);
            box-shadow: 0 8px 25px rgba(var(--tblr-primary-rgb), 0.3);
            border-color: var(--tblr-primary);
        }

        .related-prodi-icon {
            width: 52px;
            height: 52px;
            background: var(--tblr-primary);
            border-radius: 0.75rem;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 700;
            flex-shrink: 0;
            font-size: 0.9rem;
        }

        .related-prodi-item:hover .related-prodi-icon {
            background: rgba(255, 255, 255, 0.2);
        }

        .related-prodi-content h6 {
            margin-bottom: 0.5rem;
            font-weight: 700;
            font-size: 1rem;
        }

        .related-prodi-content small {
            opacity: 0.8;
            font-size: 0.85rem;
        }

        .contact-card {
            background: linear-gradient(135deg, var(--tblr-success), var(--tblr-info));
            color: white;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .contact-card::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -50%;
            width: 100%;
            height: 100%;
            background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, transparent 70%);
            transform: rotate(45deg);
        }

        .contact-card .btn {
            background: rgba(255, 255, 255, 0.2);
            border: 1px solid rgba(255, 255, 255, 0.3);
            color: white;
            backdrop-filter: blur(10px);
            font-weight: 600;
            padding: 0.75rem 1.5rem;
            border-radius: 0.75rem;
            transition: all 0.3s ease;
        }

        .contact-card .btn:hover {
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

        .prodi-content-card {
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
            
            .prodi-title {
                font-size: 2.2rem;
            }
            
            .prodi-subtitle {
                font-size: 1rem;
            }
            
            .content-section {
                padding: 1.5rem;
            }
            
            .sidebar-card {
                padding: 1.5rem;
            }
            
            .prodi-stats {
                grid-template-columns: repeat(2, 1fr);
            }
            
            .info-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
@endsection

@section('content')
    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container hero-content">
            <div class="back-navigation">
                <a href="{{ route('root.prodi-index') }}" class="btn-back">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="m15 18-6-6 6-6"></path>
                    </svg>
                    Kembali ke Program Studi
                </a>
            </div>
            
            <nav aria-label="breadcrumb" class="mb-4">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/" class="text-white">Beranda</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('root.prodi-index') }}" class="text-white">Program Studi</a></li>
                    <li class="breadcrumb-item active text-white" aria-current="page">{{ $programStudi->name }}</li>
                </ol>
            </nav>

            <div class="prodi-meta-badge">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"></path>
                    <path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"></path>
                </svg>
                {{ $programStudi->level }} - {{ $programStudi->title }}
            </div>

            <div class="prodi-code">{{ $programStudi->code }}</div>
            
            <h1 class="prodi-title">{{ $programStudi->name }}</h1>
            
            <p class="prodi-subtitle">
                {{ $programStudi->fakultas->name ?? 'Fakultas' }}
                @if($programStudi->kaprodi)
                    <br><strong>Ketua Program Studi:</strong> {{ $programStudi->kaprodi->name }}
                @endif
            </p>

            <div class="prodi-stats">
                @if($programStudi->duration)
                    <div class="prodi-stat-item">
                        <div class="prodi-stat-value">{{ $programStudi->duration }}</div>
                        <div class="prodi-stat-label">Semester</div>
                    </div>
                @endif
                @if($programStudi->accreditation)
                    <div class="prodi-stat-item">
                        <div class="prodi-stat-value">{{ $programStudi->accreditation }}</div>
                        <div class="prodi-stat-label">Akreditasi</div>
                    </div>
                @endif
                <div class="prodi-stat-item">
                    <div class="prodi-stat-value">{{ $programStudi->status }}</div>
                    <div class="prodi-stat-label">Status</div>
                </div>
                @if($programStudi->title_start && $programStudi->title_ended)
                    <div class="prodi-stat-item">
                        <div class="prodi-stat-value">{{ $programStudi->title_start }} - {{ $programStudi->title_ended }}</div>
                        <div class="prodi-stat-label">Gelar</div>
                    </div>
                @endif
            </div>
        </div>
    </section>

    <!-- Main Content -->
    <section class="py-6" style="position: relative; z-index: 10;">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-8">
                    <!-- Description Section -->
                    @if($programStudi->desc)
                        <div class="prodi-content-card">
                            <div class="content-section">
                                <h3>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                                        <polyline points="14,2 14,8 20,8"></polyline>
                                        <line x1="16" y1="13" x2="8" y2="13"></line>
                                        <line x1="16" y1="17" x2="8" y2="17"></line>
                                        <polyline points="10,9 9,9 8,9"></polyline>
                                    </svg>
                                    Deskripsi Program Studi
                                </h3>
                                <div class="content-text">
                                    {!! nl2br(e($programStudi->desc)) !!}
                                </div>
                            </div>
                        </div>
                    @endif

                    <!-- Objectives Section -->
                    @if($programStudi->objectives)
                        <div class="prodi-content-card">
                            <div class="content-section">
                                <h3>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <path d="M9 11H1l2-2 2 2"></path>
                                        <path d="M23 11H15l2-2 2 2"></path>
                                        <path d="M12 16v6"></path>
                                        <path d="M9 19h6"></path>
                                        <circle cx="12" cy="11" r="2"></circle>
                                    </svg>
                                    Tujuan Program Studi
                                </h3>
                                <div class="content-text">
                                    {!! nl2br(e($programStudi->objectives)) !!}
                                </div>
                            </div>
                        </div>
                    @endif

                    <!-- Career Prospects Section -->
                    @if($programStudi->careers)
                        <div class="prodi-content-card">
                            <div class="content-section">
                                <h3>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"></path>
                                        <rect x="8" y="2" width="8" height="4" rx="1" ry="1"></rect>
                                        <path d="M9 14l2 2 4-4"></path>
                                    </svg>
                                    Prospek Karir
                                </h3>
                                <div class="content-text">
                                    {!! nl2br(e($programStudi->careers)) !!}
                                </div>
                            </div>
                        </div>
                    @endif

                    <!-- Program Information -->
                    <div class="prodi-content-card">
                        <div class="content-section">
                            <h3>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <circle cx="12" cy="12" r="3"></circle>
                                    <path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1 1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path>
                                </svg>
                                Informasi Program
                            </h3>
                            <div class="info-grid">
                                <div class="info-item">
                                    <div class="info-label">Kode Program Studi</div>
                                    <div class="info-value">{{ $programStudi->code }}</div>
                                </div>
                                <div class="info-item">
                                    <div class="info-label">Jenjang Pendidikan</div>
                                    <div class="info-value">{{ $programStudi->level }} ({{ $programStudi->title }})</div>
                                </div>
                                @if($programStudi->duration)
                                    <div class="info-item">
                                        <div class="info-label">Durasi Studi</div>
                                        <div class="info-value">{{ $programStudi->duration }} Semester</div>
                                    </div>
                                @endif
                                @if($programStudi->accreditation)
                                    <div class="info-item">
                                        <div class="info-label">Akreditasi</div>
                                        <div class="info-value">{{ $programStudi->accreditation }}</div>
                                    </div>
                                @endif
                                @if($programStudi->title_start)
                                    <div class="info-item">
                                        <div class="info-label">Gelar Awal</div>
                                        <div class="info-value">{{ $programStudi->title_start }}</div>
                                    </div>
                                @endif
                                @if($programStudi->title_ended)
                                    <div class="info-item">
                                        <div class="info-label">Gelar Akhir</div>
                                        <div class="info-value">{{ $programStudi->title_ended }}</div>
                                    </div>
                                @endif
                                <div class="info-item">
                                    <div class="info-label">Status Program</div>
                                    <div class="info-value">{{ $programStudi->status }}</div>
                                </div>
                                <div class="info-item">
                                    <div class="info-label">Fakultas</div>
                                    <div class="info-value">{{ $programStudi->fakultas->name ?? 'Tidak diketahui' }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Sidebar -->
                <div class="col-lg-4">
                    <!-- Contact Information -->
                    <div class="sidebar-card contact-card">
                        <h5>
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="me-2">
                                <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                                <polyline points="22,6 12,13 2,6"></polyline>
                            </svg>
                            Informasi Kontak
                        </h5>
                        @if($programStudi->kaprodi)
                            <div class="mb-4">
                                <h6 class="mb-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="me-2">
                                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                        <circle cx="12" cy="7" r="4"></circle>
                                    </svg>
                                    Ketua Program Studi
                                </h6>
                                <p class="mb-1 fs-5 fw-bold">{{ $programStudi->kaprodi->name }}</p>
                                @if($programStudi->kaprodi->email)
                                    <small class="opacity-75">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="me-1">
                                            <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                                            <polyline points="22,6 12,13 2,6"></polyline>
                                        </svg>
                                        {{ $programStudi->kaprodi->email }}
                                    </small>
                                @endif
                            </div>
                        @endif
                        <div class="d-grid gap-2">
                            <a href="#" class="btn">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="me-2">
                                    <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
                                </svg>
                                Hubungi Program Studi
                            </a>
                            <a href="#" class="btn">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="me-2">
                                    <circle cx="12" cy="12" r="3"></circle>
                                    <path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1 1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path>
                                </svg>
                                Info Pendaftaran
                            </a>
                        </div>
                    </div>

                    <!-- Related Program Studi from Same Faculty -->
                    @if($relatedProdi->count() > 0)
                        <div class="sidebar-card">
                            <h5>Program Studi Lainnya di {{ $programStudi->fakultas->name }}</h5>
                            @foreach($relatedProdi as $related)
                                <a href="{{ route('root.prodi-view', $related->slug) }}" class="related-prodi-item">
                                    <div class="related-prodi-icon">
                                        {{ $related->title }}
                                    </div>
                                    <div class="related-prodi-content">
                                        <h6>{{ Str::limit($related->name, 40) }}</h6>
                                        <small>{{ $related->level }} • {{ $related->code }}</small>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    @endif

                    <!-- Same Level Programs -->
                    @if($sameLevelProdi->count() > 0)
                        <div class="sidebar-card">
                            <h5>Program {{ $programStudi->level }} Lainnya</h5>
                            @foreach($sameLevelProdi as $similar)
                                <a href="{{ route('root.prodi-view', $similar->slug) }}" class="related-prodi-item">
                                    <div class="related-prodi-icon">
                                        {{ $similar->title }}
                                    </div>
                                    <div class="related-prodi-content">
                                        <h6>{{ Str::limit($similar->name, 40) }}</h6>
                                        <small>{{ $similar->fakultas->name ?? 'Fakultas' }} • {{ $similar->code }}</small>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    @endif

                    <!-- Quick Actions -->
                    <div class="sidebar-card">
                        <h5>Aksi Cepat</h5>
                        <div class="d-grid gap-2">
                            <a href="{{ route('root.prodi-index') }}" class="btn btn-outline-primary">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"></path>
                                    <path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"></path>
                                </svg>
                                Lihat Semua Program Studi
                            </a>
                            <a href="#" class="btn btn-outline-success">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"></path>
                                    <rect x="8" y="2" width="8" height="4" rx="1" ry="1"></rect>
                                </svg>
                                Download Brosur
                            </a>
                            <a href="#" class="btn btn-outline-info">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                                    <line x1="16" y1="2" x2="16" y2="6"></line>
                                    <line x1="8" y1="2" x2="8" y2="6"></line>
                                    <line x1="3" y1="10" x2="21" y2="10"></line>
                                </svg>
                                Kalender Akademik
                            </a>
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
            document.querySelectorAll('.prodi-content-card, .sidebar-card, .info-item').forEach((element, index) => {
                element.style.opacity = '0';
                element.style.transform = 'translateY(30px)';
                element.style.transition = 'opacity 0.8s cubic-bezier(0.25, 0.46, 0.45, 0.94), transform 0.8s cubic-bezier(0.25, 0.46, 0.45, 0.94)';
                observer.observe(element);
            });

            // Enhanced hover effects for related prodi items
            document.querySelectorAll('.related-prodi-item').forEach(item => {
                item.addEventListener('mouseenter', function() {
                    this.style.transform = 'translateY(-4px) translateX(8px) scale(1.02)';
                });
                
                item.addEventListener('mouseleave', function() {
                    this.style.transform = 'translateY(0) translateX(0) scale(1)';
                });
            });

            // Add loading states for buttons
            document.querySelectorAll('.btn').forEach(btn => {
                btn.addEventListener('click', function(e) {
                    if (this.getAttribute('href') === '#') {
                        e.preventDefault();
                        
                        // Add loading state
                        const originalText = this.innerHTML;
                        this.innerHTML = '<div class="spinner-border spinner-border-sm me-2" role="status"></div>Loading...';
                        this.disabled = true;
                        
                        // Simulate loading
                        setTimeout(() => {
                            this.innerHTML = originalText;
                            this.disabled = false;
                        }, 2000);
                    }
                });
            });

            // Add copy to clipboard functionality for program code
            const prodiCode = document.querySelector('.prodi-code');
            if (prodiCode) {
                prodiCode.style.cursor = 'pointer';
                prodiCode.title = 'Klik untuk menyalin kode';
                
                prodiCode.addEventListener('click', function() {
                    navigator.clipboard.writeText(this.textContent).then(() => {
                        // Show tooltip
                        const tooltip = document.createElement('div');
                        tooltip.textContent = 'Kode berhasil disalin!';
                        tooltip.style.cssText = `
                            position: absolute;
                            background: var(--tblr-success);
                            color: white;
                            padding: 0.5rem 1rem;
                            border-radius: 0.5rem;
                            font-size: 0.875rem;
                            z-index: 1000;
                            top: -50px;
                            left: 50%;
                            transform: translateX(-50%);
                            white-space: nowrap;
                            opacity: 0;
                            transition: opacity 0.3s ease;
                        `;
                        
                        this.style.position = 'relative';
                        this.appendChild(tooltip);
                        
                        setTimeout(() => tooltip.style.opacity = '1', 100);
                        setTimeout(() => {
                            tooltip.style.opacity = '0';
                            setTimeout(() => tooltip.remove(), 300);
                        }, 2000);
                    });
                });
            }

            // Enhanced stats animation
            document.querySelectorAll('.prodi-stat-value').forEach((stat, index) => {
                const observer = new IntersectionObserver((entries) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            const finalValue = entry.target.textContent;
                            const isNumeric = /^\d+$/.test(finalValue);
                            
                            if (isNumeric) {
                                let currentValue = 0;
                                const increment = Math.ceil(finalValue / 50);
                                const timer = setInterval(() => {
                                    currentValue += increment;
                                    if (currentValue >= finalValue) {
                                        currentValue = finalValue;
                                        clearInterval(timer);
                                    }
                                    entry.target.textContent = currentValue;
                                }, 30);
                            }
                            observer.unobserve(entry.target);
                        }
                    });
                });
                observer.observe(stat);
            });

            // Back button enhancement
            const backBtn = document.querySelector('.btn-back');
            if (backBtn) {
                backBtn.addEventListener('click', function(e) {
                    e.preventDefault();
                    
                    // Add smooth transition out
                    document.body.style.opacity = '0.8';
                    document.body.style.transform = 'scale(0.98)';
                    document.body.style.transition = 'all 0.3s ease';
                    
                    setTimeout(() => {
                        window.location.href = this.getAttribute('href');
                    }, 300);
                });
            }
        });
    </script>
@endsection
