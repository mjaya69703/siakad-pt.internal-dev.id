@extends('core-themes.core-mainpage')

@section('custom-css')
    <style>
        .hero-section {
            background: linear-gradient(135deg, rgba(var(--tblr-primary-rgb), 0.85), rgba(var(--tblr-info-rgb), 0.9)), url('https://images.unsplash.com/photo-1498243691581-b145c3f54a5a?q=80&w=1470&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D') no-repeat center center;
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            min-height: 60vh;
            display: flex;
            align-items: center;
            position: relative;
            border-radius: 0 0 3rem 3rem;
            overflow: hidden;
        }

        .hero-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.4);
            backdrop-filter: blur(1px);
            z-index: 1;
        }

        .hero-content {
            position: relative;
            z-index: 2;
            text-align: center;
            width: 100%;
        }

        .hero-title {
            font-size: 3.5rem;
            font-weight: 800;
            margin-bottom: 1.5rem;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
            animation: fadeInUp 1s ease-out;
        }

        .hero-subtitle {
            font-size: 1.25rem;
            margin-bottom: 2rem;
            opacity: 0.95;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.3);
            animation: fadeInUp 1s ease-out 0.2s both;
        }

        .breadcrumb {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border-radius: 2rem;
            padding: 0.75rem 1.5rem;
            display: inline-flex;
            animation: fadeInUp 1s ease-out 0.4s both;
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

        .prodi-card {
            background: var(--tblr-card-bg);
            border: 1px solid var(--tblr-border-color-light);
            border-radius: 1.25rem;
            overflow: hidden;
            box-shadow: 0 4px 25px rgba(0, 0, 0, 0.08);
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            margin-bottom: 1.5rem;
            height: 100%;
            position: relative;
        }

        .prodi-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, var(--tblr-primary), var(--tblr-info));
            transform: scaleX(0);
            transition: transform 0.3s ease;
        }

        .prodi-card:hover {
            transform: translateY(-8px) scale(1.02);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.15);
            border-color: var(--tblr-primary);
        }

        .prodi-card:hover::before {
            transform: scaleX(1);
        }

        .prodi-header {
            padding: 1.5rem 1.75rem 1rem;
            background: linear-gradient(135deg, var(--tblr-bg-surface-secondary), var(--tblr-card-bg));
        }

        .prodi-body {
            padding: 1rem 1.75rem 1.75rem;
        }

        .prodi-meta {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            margin-bottom: 1.25rem;
            flex-wrap: wrap;
        }

        .prodi-level {
            font-size: 0.8rem;
            font-weight: 700;
            padding: 0.5rem 1rem;
            border-radius: 2rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        .prodi-accreditation {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 0.875rem;
            color: var(--tblr-warning);
            font-weight: 600;
            background: rgba(var(--tblr-warning-rgb), 0.1);
            padding: 0.375rem 0.75rem;
            border-radius: 1rem;
        }

        .prodi-status {
            margin-left: auto;
            font-size: 0.75rem;
            padding: 0.375rem 0.75rem;
            border-radius: 1rem;
            font-weight: 600;
        }

        .prodi-title {
            font-size: 1.35rem;
            font-weight: 700;
            line-height: 1.3;
            margin-bottom: 0.75rem;
            color: var(--tblr-text-dark);
        }

        .prodi-title a {
            color: inherit;
            text-decoration: none;
            transition: all 0.3s ease;
            background: linear-gradient(135deg, var(--tblr-primary), var(--tblr-info));
            -webkit-background-clip: text;
            background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .prodi-title a:hover {
            transform: translateX(2px);
            text-shadow: 0 2px 4px rgba(var(--tblr-primary-rgb), 0.3);
        }

        .prodi-code {
            font-family: 'JetBrains Mono', 'Courier New', monospace;
            font-size: 0.9rem;
            color: var(--tblr-primary);
            font-weight: 700;
            margin-bottom: 0.75rem;
            background: rgba(var(--tblr-primary-rgb), 0.1);
            padding: 0.5rem 0.75rem;
            border-radius: 0.5rem;
            display: inline-block;
            border-left: 3px solid var(--tblr-primary);
        }

        .prodi-description {
            color: var(--tblr-text-muted);
            line-height: 1.7;
            margin-bottom: 1.5rem;
            font-size: 0.95rem;
        }

        .prodi-details {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(100px, 1fr));
            gap: 0.75rem;
            margin-bottom: 1.5rem;
        }

        .prodi-detail-item {
            text-align: center;
            padding: 1rem 0.75rem;
            background: linear-gradient(135deg, var(--tblr-bg-surface-secondary), rgba(var(--tblr-primary-rgb), 0.05));
            border-radius: 0.75rem;
            border: 1px solid rgba(var(--tblr-primary-rgb), 0.1);
            transition: all 0.3s ease;
        }

        .prodi-detail-item:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(var(--tblr-primary-rgb), 0.15);
            border-color: rgba(var(--tblr-primary-rgb), 0.3);
        }

        .prodi-detail-value {
            font-size: 1.1rem;
            font-weight: 700;
            color: var(--tblr-primary);
            margin-bottom: 0.25rem;
            display: block;
        }

        .prodi-detail-label {
            font-size: 0.7rem;
            color: var(--tblr-text-muted);
            text-transform: uppercase;
            letter-spacing: 0.8px;
            font-weight: 600;
        }

        .prodi-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-top: 1.25rem;
            border-top: 2px solid var(--tblr-border-color-light);
        }

        .btn-view-more {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 0.875rem;
            font-weight: 600;
            padding: 0.75rem 1.25rem;
            border-radius: 0.75rem;
            transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            text-decoration: none;
            background: linear-gradient(135deg, var(--tblr-primary), var(--tblr-info));
            border: none;
            color: white;
            box-shadow: 0 4px 15px rgba(var(--tblr-primary-rgb), 0.3);
        }

        .btn-view-more:hover {
            transform: translateY(-2px) scale(1.05);
            box-shadow: 0 6px 20px rgba(var(--tblr-primary-rgb), 0.4);
            color: white;
        }

        .prodi-faculty {
            font-size: 0.85rem;
            color: var(--tblr-text-muted);
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 0.375rem;
        }

        .prodi-faculty::before {
            content: '';
            width: 4px;
            height: 4px;
            background: var(--tblr-primary);
            border-radius: 50%;
        }

        .filter-section {
            background: var(--tblr-card-bg);
            border-radius: 1.25rem;
            padding: 2rem;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
            border: 1px solid var(--tblr-border-color-light);
            transition: all 0.3s ease;
        }

        .filter-section:hover {
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.12);
            transform: translateY(-2px);
        }

        .search-box {
            border-radius: 1rem;
            border: 2px solid var(--tblr-border-color);
            transition: all 0.3s ease;
            padding: 0.875rem 1.25rem;
            font-size: 0.95rem;
            background: var(--tblr-card-bg);
        }

        .search-box:focus {
            border-color: var(--tblr-primary);
            box-shadow: 0 0 0 0.25rem rgba(var(--tblr-primary-rgb), 0.15);
            transform: translateY(-1px);
        }

        .search-box::placeholder {
            color: var(--tblr-text-muted);
            opacity: 0.7;
        }

        .btn-search {
            border-radius: 1rem;
            padding: 0.875rem 1.25rem;
            background: linear-gradient(135deg, var(--tblr-primary), var(--tblr-info));
            border: none;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(var(--tblr-primary-rgb), 0.3);
        }

        .btn-search:hover {
            transform: translateY(-2px) scale(1.05);
            box-shadow: 0 6px 20px rgba(var(--tblr-primary-rgb), 0.4);
        }

        .stats-card {
            background: linear-gradient(135deg, var(--tblr-primary), var(--tblr-info));
            border-radius: 1.25rem;
            padding: 2rem;
            color: white;
            text-align: center;
            position: relative;
            overflow: hidden;
            box-shadow: 0 8px 30px rgba(var(--tblr-primary-rgb), 0.3);
        }

        .stats-card::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -50%;
            width: 100%;
            height: 100%;
            background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, transparent 70%);
            transform: rotate(45deg);
        }

        .stats-number {
            font-size: 3rem;
            font-weight: 800;
            margin-bottom: 0.5rem;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
            position: relative;
            z-index: 2;
        }

        .stats-label {
            font-size: 0.95rem;
            opacity: 0.95;
            font-weight: 500;
            position: relative;
            z-index: 2;
        }

        .filter-section h5 {
            color: var(--tblr-primary);
            font-weight: 700;
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .filter-section h5::before {
            content: '';
            width: 4px;
            height: 1.5rem;
            background: linear-gradient(135deg, var(--tblr-primary), var(--tblr-info));
            border-radius: 2px;
        }

        .list-group-item {
            border: none !important;
            border-radius: 0.75rem !important;
            margin-bottom: 0.5rem;
            transition: all 0.3s ease;
            background: var(--tblr-bg-surface-secondary);
        }

        .list-group-item:hover {
            background: var(--tblr-primary);
            color: white;
            transform: translateX(5px);
        }

        .list-group-item:hover .badge {
            background: rgba(255, 255, 255, 0.2) !important;
            color: white !important;
        }

        .empty-state {
            text-align: center;
            padding: 4rem 2rem;
            background: var(--tblr-card-bg);
            border-radius: 1.25rem;
            border: 2px dashed var(--tblr-border-color);
        }

        .empty-state svg {
            opacity: 0.6;
            margin-bottom: 1.5rem;
        }

        .empty-state h4 {
            color: var(--tblr-text-muted);
            margin-bottom: 1rem;
        }

        @media (max-width: 768px) {
            .hero-title {
                font-size: 2.5rem;
            }
            
            .hero-subtitle {
                font-size: 1.1rem;
            }
            
            .prodi-card {
                margin-bottom: 1.25rem;
            }
            
            .search-box, .btn-search {
                border-radius: 0.75rem;
                padding: 0.75rem 1rem;
            }
        }

        .search-box {
            border-radius: 1rem;
            border: 2px solid var(--tblr-border-color);
            transition: all 0.3s ease;
            padding: 0.875rem 1.25rem;
            font-size: 0.95rem;
            background: var(--tblr-card-bg);
        }

        .search-box:focus {
            border-color: var(--tblr-primary);
            box-shadow: 0 0 0 0.25rem rgba(var(--tblr-primary-rgb), 0.15);
            transform: translateY(-1px);
        }

        .search-box::placeholder {
            color: var(--tblr-text-muted);
            opacity: 0.7;
        }

        .btn-search {
            border-radius: 1rem;
            padding: 0.875rem 1.25rem;
            background: linear-gradient(135deg, var(--tblr-primary), var(--tblr-info));
            border: none;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(var(--tblr-primary-rgb), 0.3);
        }

        .btn-search:hover {
            transform: translateY(-2px) scale(1.05);
            box-shadow: 0 6px 20px rgba(var(--tblr-primary-rgb), 0.4);
        }

        .stats-card {
            background: linear-gradient(135deg, var(--tblr-primary), var(--tblr-info));
            border-radius: 1.25rem;
            padding: 2rem;
            color: white;
            text-align: center;
            position: relative;
            overflow: hidden;
            box-shadow: 0 8px 30px rgba(var(--tblr-primary-rgb), 0.3);
        }

        .stats-card::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -50%;
            width: 100%;
            height: 100%;
            background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, transparent 70%);
            transform: rotate(45deg);
        }

        .stats-number {
            font-size: 3rem;
            font-weight: 800;
            margin-bottom: 0.5rem;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
            position: relative;
            z-index: 2;
        }

        .stats-label {
            font-size: 0.95rem;
            opacity: 0.95;
            font-weight: 500;
            position: relative;
            z-index: 2;
        }

        .filter-section h5 {
            color: var(--tblr-primary);
            font-weight: 700;
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .filter-section h5::before {
            content: '';
            width: 4px;
            height: 1.5rem;
            background: linear-gradient(135deg, var(--tblr-primary), var(--tblr-info));
            border-radius: 2px;
        }

        .list-group-item {
            border: none !important;
            border-radius: 0.75rem !important;
            margin-bottom: 0.5rem;
            transition: all 0.3s ease;
            background: var(--tblr-bg-surface-secondary);
        }

        .list-group-item:hover {
            background: var(--tblr-primary);
            color: white;
            transform: translateX(5px);
        }

        .list-group-item:hover .badge {
            background: rgba(255, 255, 255, 0.2) !important;
            color: white !important;
        }

        .empty-state {
            text-align: center;
            padding: 4rem 2rem;
            background: var(--tblr-card-bg);
            border-radius: 1.25rem;
            border: 2px dashed var(--tblr-border-color);
        }

        .empty-state svg {
            opacity: 0.6;
            margin-bottom: 1.5rem;
        }

        .empty-state h4 {
            color: var(--tblr-text-muted);
            margin-bottom: 1rem;
        }

        @media (max-width: 768px) {
            .hero-title {
                font-size: 2.5rem;
            }
            
            .hero-subtitle {
                font-size: 1.1rem;
            }
            
            .prodi-card {
                margin-bottom: 1.25rem;
            }
            
            .search-box, .btn-search {
                border-radius: 0.75rem;
                padding: 0.75rem 1rem;
            }
        }
    </style>
@endsection

@section('content')
    <!-- Hero Section -->
        <!-- Hero Section -->
    <section class="hero-section text-white">
        <div class="container hero-content">
            <h1 class="hero-title">Program Studi</h1>
            <p class="hero-subtitle">Temukan program studi yang sesuai dengan minat dan bakat Anda di universitas terpercaya</p>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center">
                    <li class="breadcrumb-item"><a href="/" class="text-white text-decoration-none">Beranda</a></li>
                    <li class="breadcrumb-item active text-white" aria-current="page">Program Studi</li>
                </ol>
            </nav>
        </div>
    </section>

    <!-- Search & Filter Section -->
        <!-- Search & Filter Section -->
    <section class="py-5">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-8">
                    <div class="d-flex gap-3 mb-4">
                        <div class="flex-fill">
                            <input type="text" class="form-control search-box" placeholder="Cari program studi atau kode..." id="searchInput">
                        </div>
                        <button class="btn btn-primary btn-search">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <circle cx="11" cy="11" r="8"></circle>
                                <path d="m21 21-4.35-4.35"></path>
                            </svg>
                        </button>
                    </div>
                </div>
                <div class="col-lg-4">
                    <select class="form-select search-box" id="levelFilter">
                        <option value="">Semua Jenjang</option>
                        <option value="Diploma">Diploma</option>
                        <option value="Sarjana">Sarjana</option>
                        <option value="Magister">Magister</option>
                        <option value="Doktoral">Doktoral</option>
                    </select>
                </div>
            </div>
        </div>
    </section>

    <!-- Program Studi List -->
    <section class="pb-6">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-8">
                    <div class="row g-4" id="prodiContainer">
                        @forelse($programStudis as $prodi)
                            <div class="col-md-6 prodi-item" 
                                 data-level="{{ strtolower($prodi->level) }}" 
                                 data-name="{{ strtolower($prodi->name) }}"
                                 data-code="{{ strtolower($prodi->code) }}">
                                <article class="prodi-card">
                                    <div class="prodi-header">
                                        <div class="prodi-meta">
                                            <span class="prodi-level badge bg-{{ $prodi->level == 'Sarjana' ? 'primary' : ($prodi->level == 'Magister' ? 'success' : ($prodi->level == 'Doktoral' ? 'warning' : 'info')) }}">
                                                {{ $prodi->title }} - {{ $prodi->level }}
                                            </span>
                                            @if($prodi->accreditation)
                                                <div class="prodi-accreditation">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                        <polygon points="12,2 15.09,8.26 22,9 17,14.14 18.18,21.02 12,17.77 5.82,21.02 7,14.14 2,9 8.91,8.26"></polygon>
                                                    </svg>
                                                    Akreditasi {{ $prodi->accreditation }}
                                                </div>
                                            @endif
                                            <span class="prodi-status badge bg-{{ $prodi->status == 'Aktif' ? 'success' : 'secondary' }}-lt">
                                                {{ $prodi->status }}
                                            </span>
                                        </div>
                                        
                                        <div class="prodi-code">{{ $prodi->code }}</div>
                                        <h3 class="prodi-title">
                                            <a href="{{ route('root.prodi-view', $prodi->slug) }}">
                                                {{ $prodi->name }}
                                            </a>
                                        </h3>
                                    </div>
                                    
                                    <div class="prodi-body">
                                        @if($prodi->desc)
                                            <div class="prodi-description">
                                                {!! Str::limit(strip_tags($prodi->desc), 120) !!}
                                            </div>
                                        @endif
                                        
                                        <div class="prodi-details">
                                            @if($prodi->duration)
                                                <div class="prodi-detail-item">
                                                    <div class="prodi-detail-value">{{ $prodi->duration }}</div>
                                                    <div class="prodi-detail-label">Semester</div>
                                                </div>
                                            @endif
                                            @if($prodi->title_start && $prodi->title_ended)
                                                <div class="prodi-detail-item">
                                                    <div class="prodi-detail-value">{{ $prodi->title_start }}</div>
                                                    <div class="prodi-detail-label">Gelar Awal</div>
                                                </div>
                                                <div class="prodi-detail-item">
                                                    <div class="prodi-detail-value">{{ $prodi->title_ended }}</div>
                                                    <div class="prodi-detail-label">Gelar Akhir</div>
                                                </div>
                                            @endif
                                        </div>
                                        
                                        <div class="prodi-footer">
                                            <a href="{{ route('root.prodi-view', $prodi->slug) }}" class="btn btn-primary btn-view-more">
                                                Lihat Detail
                                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                    <path d="m9 18 6-6-6-6"></path>
                                                </svg>
                                            </a>
                                            @if(isset($prodi->fakultas))
                                                <span class="prodi-faculty">
                                                    {{ $prodi->fakultas->name ?? 'Fakultas' }}
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </article>
                            </div>
                        @empty
                            <div class="col-12">
                                <div class="empty-state">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" class="text-muted mb-3">
                                        <path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"></path>
                                        <path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"></path>
                                    </svg>
                                    <h4 class="text-muted">Belum Ada Program Studi</h4>
                                    <p class="text-muted mb-0">Program studi akan ditampilkan di sini ketika tersedia. Silakan hubungi administrasi untuk informasi lebih lanjut.</p>
                                </div>
                            </div>
                        @endforelse
                    </div>

                    <!-- Pagination -->
                    @if(isset($programStudis) && $programStudis->hasPages())
                        <div class="d-flex justify-content-center mt-4">
                            {{ $programStudis->links() }}
                        </div>
                    @endif
                </div>

                <!-- Sidebar -->
                <div class="col-lg-4">
                    <!-- Statistics -->
                    <div class="stats-card mb-4">
                        <div class="stats-number">{{ $programStudis->total() ?? 0 }}</div>
                        <div class="stats-label">Total Program Studi</div>
                    </div>

                    <!-- Filter by Level -->
                    <div class="filter-section mb-4">
                        <h5 class="mb-3">Filter Berdasarkan Jenjang</h5>
                        <div class="list-group list-group-flush">
                            <a href="#" class="list-group-item list-group-item-action border-0 px-0 filter-link" data-level="">
                                <div class="d-flex justify-content-between">
                                    <span>Semua Jenjang</span>
                                    <span class="badge bg-primary-lt">{{ $programStudis->total() ?? 0 }}</span>
                                </div>
                            </a>
                            @if(isset($levelStats))
                                @foreach($levelStats as $level => $count)
                                    <a href="#" class="list-group-item list-group-item-action border-0 px-0 filter-link" data-level="{{ strtolower($level) }}">
                                        <div class="d-flex justify-content-between">
                                            <span>{{ $level }}</span>
                                            <span class="badge bg-secondary-lt">{{ $count }}</span>
                                        </div>
                                    </a>
                                @endforeach
                            @endif
                        </div>
                    </div>

                    <!-- Filter by Faculty -->
                    @if(isset($fakultas))
                        <div class="filter-section mb-4">
                            <h5 class="mb-3">Filter Berdasarkan Fakultas</h5>
                            <div class="list-group list-group-flush">
                                @foreach($fakultas as $fak)
                                    <a href="#" class="list-group-item list-group-item-action border-0 px-0">
                                        <div class="d-flex justify-content-between">
                                            <span>{{ $fak->name }}</span>
                                            <span class="badge bg-info-lt">{{ $fak->program_studis_count ?? 0 }}</span>
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    <!-- Quick Info -->
                    <div class="filter-section">
                        <h5 class="mb-3">Informasi Pendaftaran</h5>
                        <div class="alert alert-info">
                            <h6 class="alert-heading">Periode Pendaftaran</h6>
                            <p class="mb-1">Pendaftaran mahasiswa baru untuk tahun akademik {{ date('Y') }}/{{ date('Y')+1 }} sedang dibuka.</p>
                            <hr>
                            <p class="mb-0">
                                <a href="#" class="btn btn-info btn-sm">Info Pendaftaran</a>
                            </p>
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
            const searchInput = document.getElementById('searchInput');
            const levelFilter = document.getElementById('levelFilter');
            const filterLinks = document.querySelectorAll('.filter-link');
            const prodiItems = document.querySelectorAll('.prodi-item');
            
            // Enhanced filter function
            function filterProgramStudi() {
                const searchTerm = searchInput.value.toLowerCase().trim();
                const selectedLevel = levelFilter.value.toLowerCase();
                let visibleCount = 0;
                
                prodiItems.forEach(item => {
                    const name = item.getAttribute('data-name') || '';
                    const code = item.getAttribute('data-code') || '';
                    const level = item.getAttribute('data-level') || '';
                    
                    const matchesSearch = !searchTerm || 
                        name.includes(searchTerm) || 
                        code.includes(searchTerm);
                    const matchesLevel = !selectedLevel || level === selectedLevel;
                    
                    if (matchesSearch && matchesLevel) {
                        item.style.display = 'block';
                        item.style.animation = 'fadeInUp 0.3s ease-out';
                        visibleCount++;
                    } else {
                        item.style.display = 'none';
                    }
                });
                
                // Show/hide no results message
                updateNoResultsMessage(visibleCount);
            }
            
            function updateNoResultsMessage(visibleCount) {
                const container = document.getElementById('prodiContainer');
                let noResultsMsg = container.querySelector('.no-results-message');
                
                if (visibleCount === 0 && prodiItems.length > 0) {
                    if (!noResultsMsg) {
                        noResultsMsg = document.createElement('div');
                        noResultsMsg.className = 'col-12 no-results-message';
                        noResultsMsg.innerHTML = `
                            <div class="empty-state">
                                <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" class="text-muted mb-3">
                                    <circle cx="11" cy="11" r="8"></circle>
                                    <path d="m21 21-4.35-4.35"></path>
                                </svg>
                                <h5 class="text-muted">Tidak Ada Hasil</h5>
                                <p class="text-muted mb-0">Tidak ditemukan program studi yang sesuai dengan pencarian Anda.</p>
                            </div>
                        `;
                        container.appendChild(noResultsMsg);
                    }
                    noResultsMsg.style.display = 'block';
                } else if (noResultsMsg) {
                    noResultsMsg.style.display = 'none';
                }
            }
            
            // Event listeners
            searchInput.addEventListener('input', debounce(filterProgramStudi, 300));
            levelFilter.addEventListener('change', filterProgramStudi);
            
            // Sidebar filter links
            filterLinks.forEach(link => {
                link.addEventListener('click', function(e) {
                    e.preventDefault();
                    const level = this.getAttribute('data-level');
                    levelFilter.value = level;
                    filterProgramStudi();
                    
                    // Update active state
                    filterLinks.forEach(l => l.classList.remove('active'));
                    this.classList.add('active');
                });
            });
            
            // Debounce function for better performance
            function debounce(func, wait) {
                let timeout;
                return function executedFunction(...args) {
                    const later = () => {
                        clearTimeout(timeout);
                        func(...args);
                    };
                    clearTimeout(timeout);
                    timeout = setTimeout(later, wait);
                };
            }
            
            // Add smooth scroll animation for cards
            const observerOptions = {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            };
            
            const observer = new IntersectionObserver(function(entries) {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.style.opacity = '1';
                        entry.target.style.transform = 'translateY(0)';
                    }
                });
            }, observerOptions);
            
            // Observe all prodi cards
            prodiItems.forEach((item, index) => {
                item.style.opacity = '0';
                item.style.transform = 'translateY(20px)';
                item.style.transition = `opacity 0.6s ease ${index * 0.1}s, transform 0.6s ease ${index * 0.1}s`;
                observer.observe(item);
            });
            
            // Search button functionality
            document.querySelector('.btn-search').addEventListener('click', function(e) {
                e.preventDefault();
                filterProgramStudi();
                searchInput.focus();
            });
            
            // Enter key support for search
            searchInput.addEventListener('keypress', function(e) {
                if (e.key === 'Enter') {
                    e.preventDefault();
                    filterProgramStudi();
                }
            });
        });
    </script>
@endsection
