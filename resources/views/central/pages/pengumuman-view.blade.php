@extends('core-themes.core-mainpage')

@section('custom-css')
    <style>
        .pengumuman-header {
            background: linear-gradient(135deg, rgba(var(--tblr-primary-rgb), 0.8), rgba(var(--tblr-info-rgb), 0.9));
            color: white;
            padding: 3rem 0;
            margin-bottom: 3rem;
        }

        .pengumuman-content {
            background: var(--tblr-card-bg);
            border-radius: 1rem;
            padding: 2rem;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            margin-bottom: 2rem;
        }

        .pengumuman-meta {
            background: var(--tblr-bg-surface-secondary);
            border-radius: 0.75rem;
            padding: 1.5rem;
            margin-bottom: 2rem;
        }

        .meta-item {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            margin-bottom: 1rem;
        }

        .meta-item:last-child {
            margin-bottom: 0;
        }

        .meta-icon {
            width: 40px;
            height: 40px;
            background: var(--tblr-primary);
            border-radius: 0.5rem;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
        }

        .content-body {
            line-height: 1.8;
        }

        .content-body h1, .content-body h2, .content-body h3,
        .content-body h4, .content-body h5, .content-body h6 {
            color: var(--tblr-text);
            margin-top: 2rem;
            margin-bottom: 1rem;
        }

        .content-body p {
            margin-bottom: 1.5rem;
        }

        .content-body ul, .content-body ol {
            margin-bottom: 1.5rem;
            padding-left: 2rem;
        }

        .content-body blockquote {
            border-left: 4px solid var(--tblr-primary);
            padding-left: 1.5rem;
            margin: 2rem 0;
            font-style: italic;
            color: var(--tblr-text-muted);
        }

        .share-section {
            background: var(--tblr-bg-surface-secondary);
            border-radius: 1rem;
            padding: 1.5rem;
            text-align: center;
        }

        .share-button {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.5rem 1rem;
            border-radius: 0.5rem;
            text-decoration: none;
            transition: all 0.3s ease;
            margin: 0.25rem;
        }

        .share-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        .related-pengumuman {
            background: var(--tblr-card-bg);
            border-radius: 1rem;
            padding: 1.5rem;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
        }

        .related-item {
            border-bottom: 1px solid var(--tblr-border-color);
            padding: 1rem 0;
        }

        .related-item:last-child {
            border-bottom: none;
        }

        .back-button {
            position: fixed;
            top: 50%;
            left: 2rem;
            transform: translateY(-50%);
            z-index: 1000;
            background: var(--tblr-primary);
            color: white;
            border: none;
            border-radius: 50%;
            width: 50px;
            height: 50px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
            transition: all 0.3s ease;
        }

        .back-button:hover {
            background: var(--tblr-primary-dark);
            transform: translateY(-50%) scale(1.1);
        }

        @media (max-width: 768px) {
            .back-button {
                display: none;
            }
            
            .pengumuman-header {
                padding: 2rem 0;
            }
            
            .pengumuman-content {
                padding: 1.5rem;
            }
        }
    </style>
@endsection

@section('content')
    <!-- Back Button -->
    <button class="back-button" onclick="history.back()" title="Kembali">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <path d="m12 19-7-7 7-7"></path>
            <path d="m19 12H5"></path>
        </svg>
    </button>

    <!-- Header -->
    <header class="pengumuman-header">
        <div class="container">
            <nav aria-label="breadcrumb" class="mb-3">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/" class="text-white-50">Beranda</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('root.pengumuman-index') }}" class="text-white-50">Pengumuman</a></li>
                    <li class="breadcrumb-item active text-white" aria-current="page">Detail</li>
                </ol>
            </nav>
            
            @if(isset($pengumuman))
                <div class="row align-items-center">
                    <div class="col-lg-8">
                        <span class="badge bg-{{ $pengumuman->kategori->name == 'Akademik' ? 'success' : ($pengumuman->kategori->name == 'Beasiswa' ? 'warning' : 'info') }} mb-3">
                            {{ $pengumuman->kategori->name }}
                        </span>
                        <h1 class="display-5 fw-bold mb-3">{{ $pengumuman->name }}</h1>
                        <div class="d-flex flex-wrap gap-3 text-white-50">
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                                    <line x1="16" y1="2" x2="16" y2="6"></line>
                                    <line x1="8" y1="2" x2="8" y2="6"></line>
                                    <line x1="3" y1="10" x2="21" y2="10"></line>
                                </svg>
                                {{ $pengumuman->created_at->format('d F Y') }}
                            </span>
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <circle cx="12" cy="12" r="3"></circle>
                                    <path d="m12 1 0 6"></path>
                                    <path d="m12 17 0 6"></path>
                                    <path d="m20.2 7.8-4.2 4.2"></path>
                                    <path d="m7.8 16.2-4.2 4.2"></path>
                                    <path d="m1 12 6 0"></path>
                                    <path d="m17 12 6 0"></path>
                                    <path d="m20.2 16.2-4.2-4.2"></path>
                                    <path d="m7.8 7.8-4.2-4.2"></path>
                                </svg>
                                {{ $pengumuman->updated_at->diffForHumans() }}
                            </span>
                        </div>
                    </div>
                    <div class="col-lg-4 text-lg-end mt-3 mt-lg-0">
                        <span class="badge bg-success-lt fs-6 px-3 py-2">{{ $pengumuman->status }}</span>
                    </div>
                </div>
            @endif
        </div>
    </header>

    <!-- Content -->
    <section class="pb-6">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-8">
                    @if(isset($pengumuman))
                        <!-- Meta Information -->
                        <div class="pengumuman-meta">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <div class="meta-item">
                                        <div class="meta-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                <path d="M8 2v4"></path>
                                                <path d="M16 2v4"></path>
                                                <rect width="18" height="18" x="3" y="4" rx="2"></rect>
                                                <path d="M3 10h18"></path>
                                            </svg>
                                        </div>
                                        <div>
                                            <small class="text-muted d-block">Tanggal Publikasi</small>
                                            <strong>{{ $pengumuman->created_at->format('d F Y, H:i') }} WIB</strong>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="meta-item">
                                        <div class="meta-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"></path>
                                                <circle cx="9" cy="7" r="4"></circle>
                                                <path d="m22 21-3-3"></path>
                                                <circle cx="19" cy="11" r="2"></circle>
                                            </svg>
                                        </div>
                                        <div>
                                            <small class="text-muted d-block">Penulis</small>
                                            <strong>{{ $pengumuman->author->name ?? 'Admin' }}</strong>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="meta-item">
                                        <div class="meta-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                <path d="M4 15s1-1 4-1 5 2 8 2 4-1 4-1V3s-1 1-4 1-5-2-8-2-4 1-4 1z"></path>
                                                <line x1="4" y1="22" x2="4" y2="15"></line>
                                            </svg>
                                        </div>
                                        <div>
                                            <small class="text-muted d-block">Kategori</small>
                                            <strong>{{ $pengumuman->kategori->name }}</strong>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="meta-item">
                                        <div class="meta-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                <circle cx="12" cy="12" r="10"></circle>
                                                <path d="M12 6v6l4 2"></path>
                                            </svg>
                                        </div>
                                        <div>
                                            <small class="text-muted d-block">Terakhir Diperbarui</small>
                                            <strong>{{ $pengumuman->updated_at->format('d F Y, H:i') }} WIB</strong>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Content Body -->
                        <div class="pengumuman-content">
                            <div class="content-body">
                                {!! $pengumuman->content !!}
                            </div>
                        </div>

                        <!-- Share Section -->
                        <div class="share-section">
                            <h5 class="mb-3">Bagikan Pengumuman Ini</h5>
                            <div class="d-flex flex-wrap justify-content-center gap-2">
                                <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->fullUrl()) }}" 
                                   target="_blank" class="share-button btn btn-facebook">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                        <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"/>
                                    </svg>
                                    Facebook
                                </a>
                                <a href="https://twitter.com/intent/tweet?text={{ urlencode($pengumuman->name) }}&url={{ urlencode(request()->fullUrl()) }}" 
                                   target="_blank" class="share-button btn btn-twitter">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                        <path d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z"/>
                                    </svg>
                                    Twitter
                                </a>
                                <a href="https://wa.me/?text={{ urlencode($pengumuman->name . ' - ' . request()->fullUrl()) }}" 
                                   target="_blank" class="share-button btn btn-success">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                        <path d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.78-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.336-.445-.342-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z"/>
                                    </svg>
                                    WhatsApp
                                </a>
                                <button class="share-button btn btn-secondary" onclick="copyToClipboard()">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                        <path d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1v-1z"/>
                                        <path d="M9.5 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5h3zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3z"/>
                                    </svg>
                                    Salin Link
                                </button>
                            </div>
                        </div>
                    @else
                        <div class="text-center py-5">
                            <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" class="text-muted mb-3">
                                <circle cx="12" cy="12" r="10"></circle>
                                <line x1="15" y1="9" x2="9" y2="15"></line>
                                <line x1="9" y1="9" x2="15" y2="15"></line>
                            </svg>
                            <h4 class="text-muted">Pengumuman Tidak Ditemukan</h4>
                            <p class="text-muted">Pengumuman yang Anda cari tidak tersedia atau telah dihapus.</p>
                            <a href="{{ route('root.pengumuman-index') }}" class="btn btn-primary">Kembali ke Daftar Pengumuman</a>
                        </div>
                    @endif
                </div>

                <!-- Sidebar -->
                <div class="col-lg-4">
                    @if(isset($relatedPengumuman) && $relatedPengumuman->count() > 0)
                        <div class="related-pengumuman">
                            <h5 class="mb-3">Pengumuman Terkait</h5>
                            @foreach($relatedPengumuman as $related)
                                <div class="related-item">
                                    <span class="badge bg-{{ $related->kategori->name == 'Akademik' ? 'primary' : ($related->kategori->name == 'Beasiswa' ? 'success' : 'info') }}-lt mb-2">
                                        {{ $related->kategori->name }}
                                    </span>
                                    <h6 class="mb-2">
                                        <a href="{{ route('root.pengumuman-view', $related->slug) }}" class="text-decoration-none">
                                            {{ Str::limit($related->name, 60) }}
                                        </a>
                                    </h6>
                                    <small class="text-muted">{{ $related->created_at->format('d M Y') }}</small>
                                </div>
                            @endforeach
                        </div>
                    @endif

                    <!-- Quick Actions -->
                    <div class="related-pengumuman mt-4">
                        <h5 class="mb-3">Aksi Cepat</h5>
                        <div class="d-grid gap-2">
                            <a href="{{ route('root.pengumuman-index') }}" class="btn btn-outline-primary">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="m12 19-7-7 7-7"></path>
                                    <path d="m19 12H5"></path>
                                </svg>
                                Semua Pengumuman
                            </a>
                            <a href="/" class="btn btn-outline-secondary">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="m3 9 9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                                    <polyline points="9,22 9,12 15,12 15,22"></polyline>
                                </svg>
                                Beranda
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
        function copyToClipboard() {
            navigator.clipboard.writeText(window.location.href).then(function() {
                // Show success message
                const button = event.target.closest('.share-button');
                const originalText = button.innerHTML;
                button.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16"><path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z"/></svg> Tersalin!';
                button.classList.remove('btn-secondary');
                button.classList.add('btn-success');
                
                setTimeout(() => {
                    button.innerHTML = originalText;
                    button.classList.remove('btn-success');
                    button.classList.add('btn-secondary');
                }, 2000);
            }, function(err) {
                console.error('Could not copy text: ', err);
            });
        }

        // Smooth scroll for anchor links
        document.addEventListener('DOMContentLoaded', function() {
            const links = document.querySelectorAll('a[href^="#"]');
            links.forEach(link => {
                link.addEventListener('click', function(e) {
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
        });
    </script>
@endsection
