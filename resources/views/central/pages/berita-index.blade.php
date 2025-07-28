@extends('core-themes.core-mainpage')

@section('custom-css')
    <style>
        .hero-section {
            background: linear-gradient(135deg, rgba(var(--tblr-info-rgb), 0.85), rgba(var(--tblr-primary-rgb), 0.9)), url('https://images.unsplash.com/photo-1504711434969-e33886168f5c?q=80&w=2070&auto=format&fit=crop') no-repeat center center;
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

        .news-card {
            background: var(--tblr-card-bg);
            border: 1px solid var(--tblr-border-color-light);
            border-radius: 1.5rem;
            overflow: hidden;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.08);
            transition: all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
            margin-bottom: 2rem;
            position: relative;
        }

        .news-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 16px 40px rgba(0, 0, 0, 0.15);
            border-color: var(--tblr-primary);
        }

        .news-image {
            height: 250px;
            background-size: cover;
            background-position: center;
            position: relative;
            overflow: hidden;
        }

        .news-image::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(180deg, transparent 0%, rgba(0,0,0,0.3) 100%);
            z-index: 1;
        }

        .news-badge {
            position: absolute;
            top: 1rem;
            right: 1rem;
            background: var(--tblr-primary);
            color: white;
            padding: 0.5rem 1rem;
            border-radius: 2rem;
            font-size: 0.8rem;
            font-weight: 600;
            z-index: 2;
            box-shadow: 0 4px 15px rgba(var(--tblr-primary-rgb), 0.3);
        }

        .news-category {
            position: absolute;
            bottom: 1rem;
            left: 1rem;
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
            color: var(--tblr-primary);
            padding: 0.5rem 1rem;
            border-radius: 1.5rem;
            font-size: 0.8rem;
            font-weight: 600;
            z-index: 2;
        }

        .news-content {
            padding: 2rem;
        }

        .news-meta {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin-bottom: 1rem;
            font-size: 0.875rem;
            color: var(--tblr-text-muted);
        }

        .news-meta-item {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .news-title {
            font-size: 1.4rem;
            font-weight: 700;
            margin-bottom: 1rem;
            line-height: 1.3;
            color: var(--tblr-text-dark);
        }

        .news-title a {
            color: inherit;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .news-title a:hover {
            color: var(--tblr-primary);
        }

        .news-excerpt {
            color: var(--tblr-text-muted);
            line-height: 1.6;
            margin-bottom: 1.5rem;
        }

        .read-more-btn {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            color: var(--tblr-primary);
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .read-more-btn:hover {
            color: var(--tblr-primary);
            transform: translateX(4px);
        }

        .filter-section {
            background: var(--tblr-card-bg);
            border: 1px solid var(--tblr-border-color-light);
            border-radius: 1.5rem;
            padding: 1.5rem;
            margin-bottom: 2rem;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
        }

        .sidebar-card {
            background: var(--tblr-card-bg);
            border: 1px solid var(--tblr-border-color-light);
            border-radius: 1.25rem;
            padding: 1.5rem;
            margin-bottom: 2rem;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
        }

        .sidebar-card h5 {
            color: var(--tblr-primary);
            margin-bottom: 1.5rem;
            font-weight: 700;
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

        .recent-news-item {
            display: flex;
            gap: 1rem;
            padding: 1rem;
            background: var(--tblr-bg-surface-secondary);
            border-radius: 1rem;
            margin-bottom: 1rem;
            transition: all 0.3s ease;
            text-decoration: none;
            color: inherit;
        }

        .recent-news-item:hover {
            background: var(--tblr-primary);
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(var(--tblr-primary-rgb), 0.3);
        }

        .recent-news-image {
            width: 60px;
            height: 60px;
            background-size: cover;
            background-position: center;
            border-radius: 0.75rem;
            flex-shrink: 0;
        }

        .recent-news-content h6 {
            margin-bottom: 0.5rem;
            font-weight: 600;
            font-size: 0.9rem;
            line-height: 1.3;
        }

        .recent-news-content small {
            opacity: 0.8;
            font-size: 0.8rem;
        }

        .category-item {
            display: flex;
            justify-content: between;
            align-items: center;
            padding: 0.75rem 0;
            border-bottom: 1px solid var(--tblr-border-color-light);
            color: var(--tblr-text-dark);
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .category-item:last-child {
            border-bottom: none;
        }

        .category-item:hover {
            color: var(--tblr-primary);
            padding-left: 1rem;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 1rem;
        }

        .stat-item {
            text-align: center;
            padding: 1rem;
            background: var(--tblr-bg-surface-secondary);
            border-radius: 1rem;
        }

        .stat-number {
            font-size: 1.8rem;
            font-weight: 800;
            color: var(--tblr-primary);
            margin-bottom: 0.25rem;
        }

        .stat-label {
            font-size: 0.8rem;
            color: var(--tblr-text-muted);
            font-weight: 600;
        }

        .featured-badge {
            background: linear-gradient(135deg, var(--tblr-warning), var(--tblr-orange));
            color: white;
        }

        .status-publish {
            background: var(--tblr-success);
        }

        .status-draft {
            background: var(--tblr-warning);
        }

        .status-archive {
            background: var(--tblr-secondary);
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

        .news-card {
            animation: fadeInUp 0.6s ease-out;
        }

        @media (max-width: 768px) {
            .hero-section {
                min-height: 50vh;
                background-attachment: scroll;
            }
            
            .news-image {
                height: 200px;
            }
            
            .news-content {
                padding: 1.5rem;
            }
            
            .filter-section {
                padding: 1rem;
            }
            
            .stats-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
@endsection

@section('content')
    <!-- Hero Section -->
    <section class="hero-section text-center text-white">
        <div class="container hero-content">
            <h1 class="display-4 fw-bold mb-3">Berita & Artikel</h1>
            <p class="fs-5 mb-4">Informasi terkini dan artikel menarik seputar dunia pendidikan</p>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center">
                    <li class="breadcrumb-item"><a href="/" class="text-white">Beranda</a></li>
                    <li class="breadcrumb-item active text-white" aria-current="page">Berita</li>
                </ol>
            </nav>
        </div>
    </section>

    <!-- Filter & Search Section -->
    <section class="py-5">
        <div class="container">
            <div class="filter-section">
                <div class="row g-3 align-items-end">
                    <div class="col-lg-4">
                        <label for="searchInput" class="form-label">Cari Berita</label>
                        <input type="text" id="searchInput" class="form-control" placeholder="Judul berita atau kata kunci...">
                    </div>
                    <div class="col-lg-3">
                        <label for="categoryFilter" class="form-label">Kategori</label>
                        <select id="categoryFilter" class="form-select">
                            <option value="">Semua Kategori</option>
                            @foreach($kategoris as $kategori)
                                <option value="{{ $kategori->id }}">{{ $kategori->name }} ({{ $kategori->beritas_count }})</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-lg-2">
                        <label for="sortFilter" class="form-label">Urutkan</label>
                        <select id="sortFilter" class="form-select">
                            <option value="newest">Terbaru</option>
                            <option value="oldest">Terlama</option>
                            <option value="title">A-Z</option>
                        </select>
                    </div>
                    <div class="col-lg-3">
                        <button type="button" class="btn btn-primary w-100" onclick="filterNews()">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <circle cx="11" cy="11" r="8"></circle>
                                <path d="m21 21-4.35-4.35"></path>
                            </svg>
                            Cari Berita
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- News Content -->
    <section class="pb-6">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-8">
                    <div class="row g-4" id="news-container">
                        @forelse($beritas ?? [] as $berita)
                            <div class="col-12" data-category="{{ $berita->kategori_id }}" data-title="{{ strtolower($berita->name) }}" data-date="{{ $berita->created_at }}">
                                <div class="news-card">
                                    <div class="news-image" style="background-image: url('{{ asset('storage/' . $berita->photo) }}')">
                                        <div class="news-badge status-{{ strtolower($berita->status) }}">
                                            {{ $berita->status }}
                                        </div>
                                        @if($berita->kategori)
                                            <div class="news-category">
                                                {{ $berita->kategori->name }}
                                            </div>
                                        @endif
                                    </div>
                                    <div class="news-content">
                                        <div class="news-meta">
                                            <div class="news-meta-item">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                    <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                                                    <line x1="16" y1="2" x2="16" y2="6"></line>
                                                    <line x1="8" y1="2" x2="8" y2="6"></line>
                                                    <line x1="3" y1="10" x2="21" y2="10"></line>
                                                </svg>
                                                {{ \Carbon\Carbon::parse($berita->created_at)->format('d F Y') }}
                                            </div>
                                            @if($berita->author)
                                                <div class="news-meta-item">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                                        <circle cx="12" cy="7" r="4"></circle>
                                                    </svg>
                                                    {{ $berita->author->name }}
                                                </div>
                                            @endif
                                        </div>
                                        
                                        <h3 class="news-title">
                                            <a href="{{ route('root.berita-view', $berita->slug) }}">{{ $berita->name }}</a>
                                        </h3>
                                        
                                        <div class="news-excerpt">
                                            {{ Str::limit(strip_tags($berita->content), 150) }}
                                        </div>
                                        
                                        <a href="{{ route('root.berita-view', $berita->slug) }}" class="read-more-btn">
                                            Baca Selengkapnya
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                <path d="m9 18 6-6-6-6"></path>
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="col-12">
                                <div class="text-center py-5">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" class="text-muted mb-3">
                                        <path d="M4 22h16a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H8a2 2 0 0 0-2 2v16a2 2 0 0 1-2 2Zm0 0a2 2 0 0 1-2-2v-9c0-1.1.9-2 2-2h2"></path>
                                        <path d="M18 14h-8"></path>
                                        <path d="M15 18h-5"></path>
                                        <path d="M10 6h8"></path>
                                    </svg>
                                    <h4 class="text-muted">Belum ada berita</h4>
                                    <p class="text-muted">Berita dan artikel akan ditampilkan di sini ketika tersedia.</p>
                                </div>
                            </div>
                        @endforelse
                    </div>

                    <!-- Pagination -->
                    @if(isset($beritas) && method_exists($beritas, 'hasPages') && $beritas->hasPages())
                        <div class="d-flex justify-content-center mt-4">
                            {{ $beritas->links() }}
                        </div>
                    @endif
                </div>

                <!-- Sidebar -->
                <div class="col-lg-4">
                    <!-- Search Stats -->
                    <div class="sidebar-card">
                        <h5>Statistik Berita</h5>
                        <div class="stats-grid">
                            <div class="stat-item">
                                <div class="stat-number">{{ $totalBerita ?? 0 }}</div>
                                <div class="stat-label">Total Berita</div>
                            </div>
                            <div class="stat-item">
                                <div class="stat-number">{{ collect($kategoris ?? [])->count() }}</div>
                                <div class="stat-label">Kategori</div>
                            </div>
                        </div>
                    </div>

                    <!-- Categories -->
                    <div class="sidebar-card">
                        <h5>Kategori Berita</h5>
                        <div class="list-group list-group-flush">
                            @foreach($kategoris ?? [] as $kategori)
                                <a href="#" class="category-item" data-category="{{ $kategori->id }}">
                                    <span>{{ $kategori->name }}</span>
                                    <span class="badge bg-primary rounded-pill">{{ $kategori->beritas_count }}</span>
                                </a>
                            @endforeach
                        </div>
                    </div>

                    <!-- Recent News -->
                    @if(isset($recentBerita) && $recentBerita->count() > 0)
                        <div class="sidebar-card">
                            <h5>Berita Terbaru</h5>
                            @foreach($recentBerita as $recent)
                                <a href="{{ route('root.berita-view', $recent->slug) }}" class="recent-news-item">
                                    <div class="recent-news-image" style="background-image: url('{{ asset('storage/' . $recent->photo) }}')"></div>
                                    <div class="recent-news-content">
                                        <h6>{{ Str::limit($recent->name, 50) }}</h6>
                                        <small>{{ \Carbon\Carbon::parse($recent->created_at)->diffForHumans() }}</small>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    @endif

                    <!-- Tags or Topics -->
                    <div class="sidebar-card">
                        <h5>Topik Populer</h5>
                        <div class="d-flex flex-wrap gap-2">
                            <span class="badge bg-primary-lt">Pendidikan</span>
                            <span class="badge bg-info-lt">Teknologi</span>
                            <span class="badge bg-success-lt">Penelitian</span>
                            <span class="badge bg-warning-lt">Mahasiswa</span>
                            <span class="badge bg-danger-lt">Akademik</span>
                            <span class="badge bg-purple-lt">Kampus</span>
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
            // Filter functionality
            const searchInput = document.getElementById('searchInput');
            const categoryFilter = document.getElementById('categoryFilter');
            const sortFilter = document.getElementById('sortFilter');
            
            function filterNews() {
                const searchTerm = searchInput.value.toLowerCase();
                const selectedCategory = categoryFilter.value;
                const sortBy = sortFilter.value;
                
                const newsItems = document.querySelectorAll('#news-container > div');
                const itemsArray = Array.from(newsItems);
                
                // Filter items
                itemsArray.forEach(item => {
                    const title = item.getAttribute('data-title');
                    const category = item.getAttribute('data-category');
                    
                    const matchesSearch = title.includes(searchTerm);
                    const matchesCategory = !selectedCategory || category === selectedCategory;
                    
                    if (matchesSearch && matchesCategory) {
                        item.style.display = 'block';
                        item.style.animation = 'fadeInUp 0.6s ease-out';
                    } else {
                        item.style.display = 'none';
                    }
                });
                
                // Sort items
                const visibleItems = itemsArray.filter(item => item.style.display !== 'none');
                const container = document.getElementById('news-container');
                
                visibleItems.sort((a, b) => {
                    if (sortBy === 'newest') {
                        return new Date(b.getAttribute('data-date')) - new Date(a.getAttribute('data-date'));
                    } else if (sortBy === 'oldest') {
                        return new Date(a.getAttribute('data-date')) - new Date(b.getAttribute('data-date'));
                    } else if (sortBy === 'title') {
                        return a.getAttribute('data-title').localeCompare(b.getAttribute('data-title'));
                    }
                });
                
                // Reorder items
                visibleItems.forEach(item => container.appendChild(item));
            }
            
            // Event listeners
            searchInput.addEventListener('input', filterNews);
            categoryFilter.addEventListener('change', filterNews);
            sortFilter.addEventListener('change', filterNews);
            
            // Category filter from sidebar
            document.querySelectorAll('.category-item').forEach(item => {
                item.addEventListener('click', function(e) {
                    e.preventDefault();
                    const categoryId = this.getAttribute('data-category');
                    categoryFilter.value = categoryId;
                    filterNews();
                });
            });
            
            // Smooth scrolling for read more buttons
            document.querySelectorAll('.read-more-btn').forEach(btn => {
                btn.addEventListener('click', function(e) {
                    // Add some visual feedback
                    this.style.transform = 'translateX(8px)';
                    setTimeout(() => {
                        this.style.transform = 'translateX(4px)';
                    }, 150);
                });
            });

            // Search on Enter key
            searchInput.addEventListener('keypress', function(e) {
                if (e.key === 'Enter') {
                    filterNews();
                }
            });

            // Enhanced card hover effects
            document.querySelectorAll('.news-card').forEach(card => {
                card.addEventListener('mouseenter', function() {
                    this.style.transform = 'translateY(-8px) scale(1.02)';
                });
                
                card.addEventListener('mouseleave', function() {
                    this.style.transform = 'translateY(0) scale(1)';
                });
            });
        });
    </script>
@endsection
