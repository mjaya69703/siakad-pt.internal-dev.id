@extends('core-themes.core-mainpage')

@section('custom-css')
    <style>
        .hero-section {
            background: linear-gradient(135deg, rgba(var(--tblr-primary-rgb), 0.8), rgba(var(--tblr-info-rgb), 0.9)), url('https://images.unsplash.com/photo-1568992687947-868a62a9f521?q=80&w=2069&auto=format&fit=crop') no-repeat center center;
            background-size: cover;
            background-position: center;
            min-height: 50vh;
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
            background: rgba(0, 0, 0, 0.3);
            z-index: 1;
        }

        .hero-content {
            position: relative;
            z-index: 2;
        }

        .gallery-card {
            border: none;
            border-radius: 1.5rem;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            margin-bottom: 2.5rem;
            position: relative;
            height: 100%;
        }

        .gallery-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.15);
        }

        .gallery-card .card-img-top {
            height: 280px;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .gallery-card:hover .card-img-top {
            transform: scale(1.05);
        }

        .gallery-card .card-body {
            padding: 1.5rem;
        }

        .gallery-card .card-title {
            font-weight: 600;
            margin-bottom: 0.75rem;
        }

        .gallery-card .card-text {
            color: var(--tblr-text-muted);
            margin-bottom: 1.25rem;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .gallery-card .card-footer {
            background: transparent;
            border-top: 1px solid var(--tblr-border-color);
            padding: 1rem 1.5rem;
        }

        .gallery-badge {
            position: absolute;
            top: 1rem;
            right: 1rem;
            background: var(--tblr-primary);
            color: white;
            border-radius: 0.75rem;
            padding: 0.5rem 1rem;
            font-weight: 600;
            font-size: 0.875rem;
            z-index: 2;
        }

        .gallery-category {
            display: inline-block;
            padding: 0.25rem 0.75rem;
            border-radius: 2rem;
            font-size: 0.75rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            background: rgba(var(--tblr-info-rgb), 0.1);
            color: var(--tblr-info);
        }

        .gallery-count {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 0.875rem;
            color: var(--tblr-text-muted);
        }

        .filter-section {
            background: var(--tblr-card-bg);
            border-radius: 1rem;
            padding: 1.5rem;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
            margin-bottom: 2rem;
        }

        .gallery-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 1.5rem;
        }

        .gallery-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(to top, rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.1));
            display: flex;
            align-items: flex-end;
            padding: 1.5rem;
            opacity: 0;
            transition: opacity 0.3s ease;
            z-index: 1;
        }

        .gallery-card:hover .gallery-overlay {
            opacity: 1;
        }

        .gallery-actions {
            width: 100%;
            display: flex;
            gap: 0.5rem;
        }

        .gallery-action-btn {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: white;
            color: var(--tblr-primary);
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
            border: none;
        }

        .gallery-action-btn:hover {
            background: var(--tblr-primary);
            color: white;
        }

        .status {
            display: inline-flex;
            align-items: center;
            padding: 0.25rem 0.75rem;
            border-radius: 2rem;
            font-weight: 600;
            font-size: 0.75rem;
        }

        .status-publish {
            background: rgba(var(--tblr-success-rgb), 0.1);
            color: var(--tblr-success);
        }

        .status-draft {
            background: rgba(var(--tblr-warning-rgb), 0.1);
            color: var(--tblr-warning);
        }

        .status-archive {
            background: rgba(var(--tblr-muted-rgb), 0.1);
            color: var(--tblr-muted);
        }

        @media (max-width: 992px) {
            .gallery-grid {
                grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            }
            
            .gallery-card .card-img-top {
                height: 220px;
            }
        }

        @media (max-width: 768px) {
            .hero-section {
                min-height: 40vh;
            }
            
            .gallery-card {
                margin-bottom: 1.5rem;
            }
            
            .gallery-grid {
                grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
                gap: 1rem;
            }
        }
    </style>
@endsection

@section('content')
    <!-- Hero Section -->
    <section class="hero-section text-center text-white">
        <div class="container hero-content">
            <h1 class="display-4 fw-bold mb-3">Galeri Kampus</h1>
            <p class="fs-5 mb-4">Koleksi foto dan dokumentasi kegiatan kampus</p>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center">
                    <li class="breadcrumb-item"><a href="/" class="text-white">Beranda</a></li>
                    <li class="breadcrumb-item active text-white" aria-current="page">Galeri</li>
                </ol>
            </nav>
        </div>
    </section>

    <!-- Filter & Search Section -->
    <section class="py-5">
        <div class="container">
            <div class="filter-section">
                <div class="row g-3 align-items-end">
                    <div class="col-lg-5">
                        <label class="form-label">Cari Galeri</label>
                        <input type="text" class="form-control" placeholder="Cari galeri berdasarkan judul..." id="searchInput">
                    </div>
                    <div class="col-lg-4">
                        <label class="form-label">Kategori</label>
                        <select class="form-select" id="categoryFilter">
                            <option value="">Semua Kategori</option>
                            @foreach($kategori ?? [] as $kat)
                                <option value="{{ $kat->id }}">{{ $kat->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-lg-3">
                        <label class="form-label">Urutkan Berdasarkan</label>
                        <select class="form-select" id="sortFilter">
                            <option value="newest">Terbaru</option>
                            <option value="oldest">Terlama</option>
                            <option value="name_asc">Nama A-Z</option>
                            <option value="name_desc">Nama Z-A</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Gallery Content -->
    <section class="pb-6">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Gallery Grid -->
                    <div class="gallery-grid" id="galleryGrid">
                        @forelse($galeris ?? [] as $galeri)
                            <div class="gallery-card card" data-category="{{ $galeri->kategori_id }}" data-name="{{ $galeri->name }}">
                                @if($galeri->status == 'Publish')
                                    <div class="gallery-badge status-publish">Publish</div>
                                @elseif($galeri->status == 'Draft')
                                    <div class="gallery-badge status-draft">Draft</div>
                                @else
                                    <div class="gallery-badge status-archive">Archive</div>
                                @endif
                                <img src="{{ asset('storage/images/galeri/' . $galeri->photo) }}" class="card-img-top" alt="{{ $galeri->name }}">
                                <div class="gallery-overlay">
                                    <div class="gallery-actions">
                                        <a href="{{ route('root.galeri-view', $galeri->code) }}" class="btn btn-light">
                                            Lihat Galeri <i class="ti ti-arrow-right ms-1"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="d-flex align-items-center gap-2 mb-2">
                                        <span class="gallery-category">{{ $galeri->kategori->name ?? 'Umum' }}</span>
                                    </div>
                                    <h5 class="card-title">{{ $galeri->name }}</h5>
                                    <div class="gallery-count mb-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                            <path d="M15 8h.01" />
                                            <path d="M3 6a3 3 0 0 1 3 -3h12a3 3 0 0 1 3 3v12a3 3 0 0 1 -3 3h-12a3 3 0 0 1 -3 -3v-12z" />
                                            <path d="M3 16l5 -5c.928 -.893 2.072 -.893 3 0l5 5" />
                                            <path d="M14 14l1 -1c.928 -.893 2.072 -.893 3 0l3 3" />
                                        </svg>
                                        {{ $galeri->fotos->count() }} foto
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <a href="{{ route('root.galeri-view', $galeri->code) }}" class="btn btn-primary">
                                            Lihat Detail
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                <path d="m9 18 6-6-6-6"></path>
                                            </svg>
                                        </a>
                                        <small class="text-muted">
                                            {{ \Carbon\Carbon::parse($galeri->created_at)->format('d M Y') }}
                                        </small>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="col-12 text-center py-5">
                                <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" class="text-muted mb-3">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                    <path d="M15 8h.01" />
                                    <path d="M3 6a3 3 0 0 1 3 -3h12a3 3 0 0 1 3 3v12a3 3 0 0 1 -3 3h-12a3 3 0 0 1 -3 -3v-12z" />
                                    <path d="M3 16l5 -5c.928 -.893 2.072 -.893 3 0l5 5" />
                                    <path d="M14 14l1 -1c.928 -.893 2.072 -.893 3 0l3 3" />
                                </svg>
                                <h4 class="text-muted">Belum ada galeri</h4>
                                <p class="text-muted">Galeri foto akan ditampilkan di sini ketika tersedia.</p>
                            </div>
                        @endforelse
                    </div>

                    <!-- Pagination -->
                    @if(isset($galeris) && method_exists($galeris, 'hasPages') && $galeris->hasPages())
                        <div class="d-flex justify-content-center mt-4">
                            {{ $galeris->links() }}
                        </div>
                    @endif
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
            const galleryGrid = document.getElementById('galleryGrid');
            const galleryCards = document.querySelectorAll('.gallery-card');
            
            function filterGallery() {
                const searchTerm = searchInput.value.toLowerCase();
                const selectedCategory = categoryFilter.value;
                
                galleryCards.forEach(card => {
                    const name = card.getAttribute('data-name').toLowerCase();
                    const category = card.getAttribute('data-category');
                    
                    const matchesSearch = name.includes(searchTerm);
                    const matchesCategory = !selectedCategory || category === selectedCategory;
                    
                    if (matchesSearch && matchesCategory) {
                        card.style.display = 'block';
                    } else {
                        card.style.display = 'none';
                    }
                });
                
                // Sort galleries after filtering
                sortGalleries();
            }
            
            function sortGalleries() {
                const sortBy = sortFilter.value;
                const cards = Array.from(galleryCards).filter(card => card.style.display !== 'none');
                
                cards.sort((a, b) => {
                    if (sortBy === 'newest') {
                        return new Date(b.querySelector('.text-muted').textContent.trim()) - 
                               new Date(a.querySelector('.text-muted').textContent.trim());
                    } else if (sortBy === 'oldest') {
                        return new Date(a.querySelector('.text-muted').textContent.trim()) - 
                               new Date(b.querySelector('.text-muted').textContent.trim());
                    } else if (sortBy === 'name_asc') {
                        return a.getAttribute('data-name').localeCompare(b.getAttribute('data-name'));
                    } else if (sortBy === 'name_desc') {
                        return b.getAttribute('data-name').localeCompare(a.getAttribute('data-name'));
                    }
                });
                
                // Reorder cards in the DOM
                cards.forEach(card => galleryGrid.appendChild(card));
            }
            
            searchInput.addEventListener('input', filterGallery);
            categoryFilter.addEventListener('change', filterGallery);
            sortFilter.addEventListener('change', filterGallery);
            
            // Initialize filters
            filterGallery();
        });
    </script>
@endsection
