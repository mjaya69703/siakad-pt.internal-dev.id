@extends('core-themes.core-mainpage')

@section('custom-css')
    <style>
        .hero-section {
            background: linear-gradient(135deg, rgba(var(--tblr-primary-rgb), 0.8), rgba(var(--tblr-info-rgb), 0.9)), url('https://images.unsplash.com/photo-1504868584819-f8e8b4b6d7e3?q=80&w=2072&auto=format&fit=crop') no-repeat center center;
            background-size: cover;
            min-height: 50vh;
            display: flex;
            align-items: center;
            position: relative;
            border-radius: 0 0 3rem 3rem;
        }

        .hero-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.3);
            z-index: 1;
        }

        .hero-content {
            position: relative;
            z-index: 2;
        }

        .pengumuman-card {
            background: var(--tblr-card-bg);
            border: 1px solid var(--tblr-border-color-light);
            border-radius: 1rem;
            overflow: hidden;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            transition: all 0.3s ease;
            margin-bottom: 1.5rem;
        }

        .pengumuman-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.12);
            border-color: var(--tblr-primary);
        }

        .pengumuman-header {
            padding: 1.25rem 1.5rem 0;
        }

        .pengumuman-body {
            padding: 1rem 1.5rem 1.5rem;
        }

        .pengumuman-meta {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            margin-bottom: 1rem;
            flex-wrap: wrap;
        }

        .pengumuman-category {
            font-size: 0.75rem;
            font-weight: 600;
            padding: 0.375rem 0.75rem;
            border-radius: 0.5rem;
        }

        .pengumuman-date {
            display: flex;
            align-items: center;
            gap: 0.375rem;
            font-size: 0.875rem;
            color: var(--tblr-text-muted);
        }

        .pengumuman-status {
            margin-left: auto;
            font-size: 0.75rem;
            padding: 0.25rem 0.625rem;
        }

        .pengumuman-title {
            font-size: 1.25rem;
            font-weight: 600;
            line-height: 1.4;
            margin-bottom: 0.75rem;
        }

        .pengumuman-title a {
            color: var(--tblr-text-dark);
            text-decoration: none;
            transition: color 0.2s ease;
        }

        .pengumuman-title a:hover {
            color: var(--tblr-primary);
        }

        .pengumuman-excerpt {
            color: var(--tblr-text-muted);
            line-height: 1.6;
            margin-bottom: 1.25rem;
        }

        .pengumuman-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-top: 1rem;
            border-top: 1px solid var(--tblr-border-color-light);
        }

        .btn-read-more {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 0.875rem;
            font-weight: 500;
            padding: 0.5rem 1rem;
            border-radius: 0.5rem;
        }

        .pengumuman-time {
            font-size: 0.8125rem;
            color: var(--tblr-text-muted);
        }

        .category-filter {
            background: var(--tblr-card-bg);
            border-radius: 1rem;
            padding: 1.5rem;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
        }

        .search-box {
            border-radius: 0.75rem;
            border: 2px solid var(--tblr-border-color);
            transition: border-color 0.3s ease;
        }

        .search-box:focus {
            border-color: var(--tblr-primary);
            box-shadow: 0 0 0 0.2rem rgba(var(--tblr-primary-rgb), 0.25);
        }
    </style>
@endsection

@section('content')
    <!-- Hero Section -->
    <section class="hero-section text-center text-white">
        <div class="container hero-content">
            <h1 class="display-4 fw-bold mb-3">Pengumuman Resmi</h1>
            <p class="fs-5 mb-4">Informasi terkini dan pengumuman penting dari Universitas Masa Depan</p>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center">
                    <li class="breadcrumb-item"><a href="/" class="text-white">Beranda</a></li>
                    <li class="breadcrumb-item active text-white" aria-current="page">Pengumuman</li>
                </ol>
            </nav>
        </div>
    </section>

    <!-- Search & Filter Section -->
    <section class="py-5">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-8">
                    <div class="d-flex gap-3 mb-4">
                        <div class="flex-fill">
                            <input type="text" class="form-control search-box" placeholder="Cari pengumuman..." id="searchInput">
                        </div>
                        <button class="btn btn-primary">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <circle cx="11" cy="11" r="8"></circle>
                                <path d="m21 21-4.35-4.35"></path>
                            </svg>
                        </button>
                    </div>
                </div>
                <div class="col-lg-4">
                    <select class="form-select" id="categoryFilter">
                        <option value="">Semua Kategori</option>
                        <option value="akademik">Akademik</option>
                        <option value="kemahasiswaan">Kemahasiswaan</option>
                        <option value="beasiswa">Beasiswa</option>
                        <option value="event">Event</option>
                        <option value="wisuda">Wisuda</option>
                    </select>
                </div>
            </div>
        </div>
    </section>

    <!-- Pengumuman List -->
    <section class="pb-6">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-8">
                    @forelse($pengumuman as $item)
                        <article class="pengumuman-card">
                            <div class="pengumuman-header">
                                <div class="pengumuman-meta">
                                    <span class="pengumuman-category badge bg-{{ $item->kategori->name == 'Akademik' ? 'primary' : ($item->kategori->name == 'Beasiswa' ? 'success' : 'info') }}">
                                        {{ $item->kategori->name }}
                                    </span>
                                    <div class="pengumuman-date">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                            <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                                            <line x1="16" y1="2" x2="16" y2="6"></line>
                                            <line x1="8" y1="2" x2="8" y2="6"></line>
                                            <line x1="3" y1="10" x2="21" y2="10"></line>
                                        </svg>
                                        {{ $item->created_at->format('d F Y') }}
                                    </div>
                                    <span class="pengumuman-status badge bg-success-lt">{{ $item->status }}</span>
                                </div>
                                
                                <h3 class="pengumuman-title">
                                    <a href="{{ route('root.pengumuman-view', $item->slug) }}">
                                        {{ $item->name }}
                                    </a>
                                </h3>
                            </div>
                            
                            <div class="pengumuman-body">
                                <div class="pengumuman-excerpt">
                                    {!! Str::limit(strip_tags($item->content), 180) !!}
                                </div>
                                
                                <div class="pengumuman-footer">
                                    <a href="{{ route('root.pengumuman-view', $item->slug) }}" class="btn btn-primary btn-read-more">
                                        Baca Selengkapnya
                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                            <path d="m9 18 6-6-6-6"></path>
                                        </svg>
                                    </a>
                                    <span class="pengumuman-time">
                                        {{ $item->created_at->diffForHumans() }}
                                    </span>
                                </div>
                            </div>
                        </article>
                    @empty
                        <div class="text-center py-5">
                            <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" class="text-muted mb-3">
                                <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                                <polyline points="14,2 14,8 20,8"></polyline>
                                <line x1="16" y1="13" x2="8" y2="13"></line>
                                <line x1="16" y1="17" x2="8" y2="17"></line>
                                <polyline points="10,9 9,9 8,9"></polyline>
                            </svg>
                            <h4 class="text-muted">Belum ada pengumuman</h4>
                            <p class="text-muted">Pengumuman akan ditampilkan di sini ketika tersedia.</p>
                        </div>
                    @endforelse

                    <!-- Pagination -->
                    @if(isset($pengumuman) && $pengumuman->hasPages())
                        <div class="d-flex justify-content-center mt-4">
                            {{ $pengumuman->links() }}
                        </div>
                    @endif
                </div>

                <!-- Sidebar -->
                <div class="col-lg-4">
                    <div class="category-filter mb-4">
                        <h5 class="mb-3">Kategori Pengumuman</h5>
                        <div class="list-group list-group-flush">
                            <a href="#" class="list-group-item list-group-item-action border-0 px-0">
                                <div class="d-flex justify-content-between">
                                    <span>Semua Pengumuman</span>
                                    <span class="badge bg-primary-lt">{{ $pengumuman->total() ?? 0 }}</span>
                                </div>
                            </a>
                            @if(isset($kategoris))
                                @foreach($kategoris as $kategori)
                                    <a href="#" class="list-group-item list-group-item-action border-0 px-0">
                                        <div class="d-flex justify-content-between">
                                            <span>{{ $kategori->name }}</span>
                                            <span class="badge bg-secondary-lt">{{ $kategori->pengumumans_count ?? 0 }}</span>
                                        </div>
                                    </a>
                                @endforeach
                            @endif
                        </div>
                    </div>

                    <!-- Recent Announcements -->
                    <div class="category-filter">
                        <h5 class="mb-3">Pengumuman Terbaru</h5>
                        @if(isset($recentPengumuman))
                            @foreach($recentPengumuman->take(5) as $recent)
                                <div class="d-flex gap-3 mb-3 pb-3 border-bottom">
                                    <div class="avatar bg-primary-lt">
                                        <span class="avatar-text">{{ strtoupper(substr($recent->name, 0, 2)) }}</span>
                                    </div>
                                    <div class="flex-fill">
                                        <h6 class="mb-1">
                                            <a href="{{ route('root.pengumuman-view', $recent->slug) }}" class="text-decoration-none">
                                                {{ Str::limit($recent->name, 50) }}
                                            </a>
                                        </h6>
                                        <small class="text-muted">{{ $recent->created_at->format('d M Y') }}</small>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('custom-js')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Search functionality
            const searchInput = document.getElementById('searchInput');
            const categoryFilter = document.getElementById('categoryFilter');
            
            function filterPengumuman() {
                const searchTerm = searchInput.value.toLowerCase();
                const selectedCategory = categoryFilter.value.toLowerCase();
                const cards = document.querySelectorAll('.pengumuman-card');
                
                cards.forEach(card => {
                    const title = card.querySelector('.card-title').textContent.toLowerCase();
                    const content = card.querySelector('.text-muted').textContent.toLowerCase();
                    const category = card.querySelector('.badge').textContent.toLowerCase();
                    
                    const matchesSearch = title.includes(searchTerm) || content.includes(searchTerm);
                    const matchesCategory = !selectedCategory || category.includes(selectedCategory);
                    
                    if (matchesSearch && matchesCategory) {
                        card.style.display = 'block';
                    } else {
                        card.style.display = 'none';
                    }
                });
            }
            
            searchInput.addEventListener('input', filterPengumuman);
            categoryFilter.addEventListener('change', filterPengumuman);
        });
    </script>
@endsection
