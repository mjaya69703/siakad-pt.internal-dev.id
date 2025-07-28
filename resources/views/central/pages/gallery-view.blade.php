@extends('core-themes.core-mainpage')

@section('custom-css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.7.1/css/lightgallery.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.7.1/css/lg-zoom.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.7.1/css/lg-thumbnail.min.css">
    <style>
        .hero-section {
            background-size: cover;
            background-position: center;
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
            z-index: 1;
        }

        .hero-content {
            position: relative;
            z-index: 2;
        }

        .gallery-meta {
            background: var(--tblr-card-bg);
            border-radius: 1rem;
            padding: 1.5rem;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
            margin-bottom: 2rem;
        }

        .gallery-meta-item {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin-bottom: 1rem;
            padding-bottom: 1rem;
            border-bottom: 1px solid var(--tblr-border-color);
        }

        .gallery-meta-item:last-child {
            margin-bottom: 0;
            padding-bottom: 0;
            border-bottom: none;
        }

        .gallery-meta-icon {
            width: 40px;
            height: 40px;
            min-width: 40px;
            border-radius: 50%;
            background: rgba(var(--tblr-primary-rgb), 0.1);
            color: var(--tblr-primary);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .gallery-content {
            background: var(--tblr-card-bg);
            border-radius: 1rem;
            padding: 2rem;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
            margin-bottom: 2rem;
        }

        .gallery-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 1rem;
            margin-top: 2rem;
        }

        .gallery-item {
            position: relative;
            border-radius: 1rem;
            overflow: hidden;
            aspect-ratio: 1;
            cursor: pointer;
        }

        .gallery-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .gallery-item:hover img {
            transform: scale(1.05);
        }

        .gallery-item-overlay {
            position: absolute;
            inset: 0;
            background: rgba(0, 0, 0, 0.3);
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .gallery-item:hover .gallery-item-overlay {
            opacity: 1;
        }

        .gallery-item-icon {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background: white;
            color: var(--tblr-primary);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.25rem;
            transform: scale(0.8);
            transition: transform 0.3s ease;
        }

        .gallery-item:hover .gallery-item-icon {
            transform: scale(1);
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

        .gallery-meta-label {
            font-size: 0.875rem;
            color: var(--tblr-text-muted);
            margin-bottom: 0.25rem;
        }

        .gallery-meta-value {
            font-weight: 500;
        }

        /* Responsive styles */
        @media (max-width: 992px) {
            .gallery-grid {
                grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            }
        }

        @media (max-width: 768px) {
            .hero-section {
                min-height: 40vh;
            }
            
            .gallery-grid {
                grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
            }
        }
    </style>
@endsection

@section('content')
    <!-- Hero Section -->
    <section class="hero-section text-center text-white" style="background-image: url('{{ asset('storage/images/galeri/' . ($galeri->photo ?? 'default.jpg')) }}');">
        <div class="container hero-content">
            <div class="gallery-category mb-3">{{ $galeri->kategori->name ?? 'Umum' }}</div>
            <h1 class="display-4 fw-bold mb-3">{{ $galeri->name ?? 'Detail Galeri' }}</h1>
            <p class="fs-5 mb-4">{{ \Carbon\Carbon::parse($galeri->created_at ?? now())->format('d F Y') }}</p>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center">
                    <li class="breadcrumb-item"><a href="/" class="text-white">Beranda</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('root.galeri-index') }}" class="text-white">Galeri</a></li>
                    <li class="breadcrumb-item active text-white" aria-current="page">{{ $galeri->name ?? 'Detail' }}</li>
                </ol>
            </nav>
        </div>
    </section>

    <section class="py-5">
        <div class="container">
            <div class="row g-4">
                <!-- Main Content -->
                <div class="col-lg-8">
                    <div class="gallery-content">
                        <h2 class="mb-4">Deskripsi</h2>
                        <div class="rich-text mb-5">
                            {!! $galeri->content ?? 'Tidak ada deskripsi' !!}
                        </div>

                        <h3 class="mb-4">Foto-foto</h3>
                        @if(isset($galeri) && $galeri->fotos->count() > 0)
                            <div class="gallery-grid" id="lightgallery">
                                @foreach($galeri->fotos as $foto)
                                    <a href="{{ asset('storage/images/galeri/foto/' . $foto->photo) }}" class="gallery-item" data-sub-html="<h4>{{ $galeri->name }}</h4><p>{{ $foto->desc }}</p>">
                                        <img src="{{ asset('storage/images/galeri/foto/' . $foto->photo) }}" alt="{{ $foto->desc ?? $galeri->name }}">
                                        <div class="gallery-item-overlay">
                                            <div class="gallery-item-icon">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                                    <path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0" />
                                                    <path d="M21 21l-6 -6" />
                                                    <path d="M12 7h.01" />
                                                </svg>
                                            </div>
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                        @else
                            <div class="text-center py-5">
                                <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" class="text-muted mb-3">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                    <path d="M15 8h.01" />
                                    <path d="M3 6a3 3 0 0 1 3 -3h12a3 3 0 0 1 3 3v12a3 3 0 0 1 -3 3h-12a3 3 0 0 1 -3 -3v-12z" />
                                    <path d="M3 16l5 -5c.928 -.893 2.072 -.893 3 0l5 5" />
                                    <path d="M14 14l1 -1c.928 -.893 2.072 -.893 3 0l3 3" />
                                </svg>
                                <h4 class="text-muted">Tidak ada foto</h4>
                                <p class="text-muted">Belum ada foto yang tersedia untuk galeri ini.</p>
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Sidebar -->
                <div class="col-lg-4">
                    <div class="gallery-meta mb-4">
                        <h4 class="mb-3">Informasi Galeri</h4>
                        
                        <div class="gallery-meta-item">
                            <div class="gallery-meta-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                    <path d="M3 19a9 9 0 0 1 9 0a9 9 0 0 1 9 0" />
                                    <path d="M3 6a9 9 0 0 1 9 0a9 9 0 0 1 9 0" />
                                    <path d="M3 6l0 13" />
                                    <path d="M12 6l0 13" />
                                    <path d="M21 6l0 13" />
                                </svg>
                            </div>
                            <div>
                                <div class="gallery-meta-label">Kategori</div>
                                <div class="gallery-meta-value">{{ $galeri->kategori->name ?? 'Umum' }}</div>
                            </div>
                        </div>
                        
                        <div class="gallery-meta-item">
                            <div class="gallery-meta-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                    <path d="M4 5m0 2a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2z" />
                                    <path d="M16 3l0 4" />
                                    <path d="M8 3l0 4" />
                                    <path d="M4 11l16 0" />
                                    <path d="M8 15h2v2h-2z" />
                                </svg>
                            </div>
                            <div>
                                <div class="gallery-meta-label">Tanggal Publikasi</div>
                                <div class="gallery-meta-value">{{ \Carbon\Carbon::parse($galeri->created_at ?? now())->format('d F Y') }}</div>
                            </div>
                        </div>
                        
                        <div class="gallery-meta-item">
                            <div class="gallery-meta-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                    <path d="M15 8h.01" />
                                    <path d="M3 6a3 3 0 0 1 3 -3h12a3 3 0 0 1 3 3v12a3 3 0 0 1 -3 3h-12a3 3 0 0 1 -3 -3v-12z" />
                                    <path d="M3 16l5 -5c.928 -.893 2.072 -.893 3 0l5 5" />
                                    <path d="M14 14l1 -1c.928 -.893 2.072 -.893 3 0l3 3" />
                                </svg>
                            </div>
                            <div>
                                <div class="gallery-meta-label">Jumlah Foto</div>
                                <div class="gallery-meta-value">{{ $galeri->fotos->count() ?? 0 }} foto</div>
                            </div>
                        </div>
                        
                        <div class="gallery-meta-item">
                            <div class="gallery-meta-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                    <path d="M9 11a3 3 0 1 0 6 0a3 3 0 0 0 -6 0" />
                                    <path d="M17.657 16.657l-4.243 4.243a2 2 0 0 1 -2.827 0l-4.244 -4.243a8 8 0 1 1 11.314 0z" />
                                </svg>
                            </div>
                            <div>
                                <div class="gallery-meta-label">Status</div>
                                <div class="gallery-meta-value">
                                    @if(isset($galeri))
                                        @if($galeri->status == 'Publish')
                                            <span class="status status-publish">Publish</span>
                                        @elseif($galeri->status == 'Draft')
                                            <span class="status status-draft">Draft</span>
                                        @else
                                            <span class="status status-archive">Archive</span>
                                        @endif
                                    @else
                                        -
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="gallery-meta">
                        <h4 class="mb-3">Bagikan</h4>
                        <div class="d-flex gap-2 mt-3">
                            <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}" target="_blank" class="btn btn-outline-primary btn-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                    <path d="M7 10v4h3v7h4v-7h3l1 -4h-4v-2a1 1 0 0 1 1 -1h3v-4h-3a5 5 0 0 0 -5 5v2h-3" />
                                </svg>
                            </a>
                            <a href="https://twitter.com/intent/tweet?text={{ urlencode($galeri->name ?? 'Galeri Kampus') }}&url={{ urlencode(url()->current()) }}" target="_blank" class="btn btn-outline-info btn-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                    <path d="M22 4.01c-1 .49 -1.98 .689 -3 .99c-1.121 -1.265 -2.783 -1.335 -4.38 -.737s-2.643 2.06 -2.62 3.737v1c-3.245 .083 -6.135 -1.395 -8 -4c0 0 -4.182 7.433 4 11c-1.872 1.247 -3.739 2.088 -6 2c3.308 1.803 6.913 2.423 10.034 1.517c3.58 -1.04 6.522 -3.723 7.651 -7.742a13.84 13.84 0 0 0 .497 -3.753c0 -.249 1.51 -2.772 1.818 -4.013z" />
                                </svg>
                            </a>
                            <a href="https://wa.me/?text={{ urlencode($galeri->name ?? 'Galeri Kampus') }}%20{{ urlencode(url()->current()) }}" target="_blank" class="btn btn-outline-success btn-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                    <path d="M3 21l1.65 -3.8a9 9 0 1 1 3.4 2.9l-5.05 .9" />
                                    <path d="M9 10a.5 .5 0 0 0 1 0v-1a.5 .5 0 0 0 -1 0v1a5 5 0 0 0 5 5h1a.5 .5 0 0 0 0 -1h-1a.5 .5 0 0 0 0 1" />
                                </svg>
                            </a>
                            <button onclick="navigator.clipboard.writeText(window.location.href)" class="btn btn-outline-secondary btn-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                    <path d="M9 15l6 -6" />
                                    <path d="M11 6l.463 -.536a5 5 0 0 1 7.071 7.072l-.534 .464" />
                                    <path d="M13 18l-.397 .534a5.068 5.068 0 0 1 -7.127 0a4.972 4.972 0 0 1 0 -7.071l.524 -.463" />
                                </svg>
                            </button>
                        </div>
                    </div>

                    <!-- Recent Galleries -->
                    @if(isset($recent_galleries) && count($recent_galleries) > 0)
                        <div class="gallery-meta">
                            <h4 class="mb-3">Galeri Lainnya</h4>
                            <div class="list-group list-group-flush">
                                @foreach($recent_galleries as $recent)
                                    <a href="{{ route('root.galeri-view', $recent->code) }}" class="list-group-item border-0 px-0">
                                        <div class="row g-2 align-items-center">
                                            <div class="col-auto">
                                                <img src="{{ asset('storage/images/galeri/' . $recent->photo) }}" class="rounded" width="40" height="40" alt="{{ $recent->name }}" style="object-fit: cover;">
                                            </div>
                                            <div class="col">
                                                <div class="text-truncate">{{ $recent->name }}</div>
                                                <div class="text-muted text-truncate small">{{ $recent->fotos->count() }} foto · {{ \Carbon\Carbon::parse($recent->created_at)->format('d M Y') }}</div>
                                            </div>
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection

@section('custom-js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.7.1/lightgallery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.7.1/plugins/zoom/lg-zoom.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.7.1/plugins/thumbnail/lg-thumbnail.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize lightGallery
            const galleryElement = document.getElementById('lightgallery');
            if (galleryElement) {
                lightGallery(galleryElement, {
                    selector: '.gallery-item',
                    plugins: [lgZoom, lgThumbnail],
                    speed: 500,
                    download: false,
                    counter: true,
                    mousewheel: true,
                    zoomFromOrigin: true,
                    mobileSettings: {
                        controls: true,
                        showCloseIcon: true
                    }
                });
            }
            
            // Clipboard copy notification
            const copyButtons = document.querySelectorAll('[onclick="navigator.clipboard.writeText(window.location.href)"]');
            copyButtons.forEach(button => {
                button.addEventListener('click', function() {
                    // Create toast notification
                    const toast = document.createElement('div');
                    toast.style.position = 'fixed';
                    toast.style.bottom = '20px';
                    toast.style.right = '20px';
                    toast.style.backgroundColor = 'rgba(0, 0, 0, 0.8)';
                    toast.style.color = 'white';
                    toast.style.padding = '12px 24px';
                    toast.style.borderRadius = '4px';
                    toast.style.zIndex = '9999';
                    toast.style.transition = 'opacity 0.3s ease';
                    toast.innerText = 'URL disalin ke clipboard!';
                    
                    document.body.appendChild(toast);
                    
                    // Remove after 2 seconds
                    setTimeout(() => {
                        toast.style.opacity = '0';
                        setTimeout(() => {
                            document.body.removeChild(toast);
                        }, 300);
                    }, 2000);
                });
            });
        });
    </script>
@endsection
