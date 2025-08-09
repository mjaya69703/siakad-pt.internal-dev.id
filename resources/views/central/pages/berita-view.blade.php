@extends('core-themes.core-mainpage')

@section('custom-css')
    <style>
        /* === HERO (KEEP EXACT STYLE) === */
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
        .hero-section::before { content: ''; position: absolute; inset: 0; background: rgba(0,0,0,.3); backdrop-filter: blur(.5px); z-index: 1; }
        .hero-content { position: relative; z-index: 2; width: 100%; }
        .breadcrumb-item a, .breadcrumb-item.active { text-shadow: 1px 1px 3px rgba(0,0,0,.5); }

        /* === POLISH THE REST === */
        .news-content-card { background: var(--tblr-card-bg); border: 1px solid var(--tblr-border-color-light); border-radius: 1.5rem; box-shadow: 0 8px 30px rgba(0,0,0,.1); margin-bottom: 2rem; overflow: hidden; transition: transform .3s ease, box-shadow .3s ease; position: relative; z-index: 2; }
        .news-content-card:hover { transform: translateY(-4px); box-shadow: 0 12px 40px rgba(0,0,0,.15); }

        .news-header-card { background: linear-gradient(135deg, var(--tblr-info), var(--tblr-primary)); color:#fff; padding: 2.5rem; border-radius: 1.5rem 1.5rem 0 0; position: relative; overflow: hidden; }
        .news-header-card::before { content:''; position:absolute; top:-50%; right:-50%; width:120%; height:120%; background: radial-gradient(circle, rgba(255,255,255,.1) 0%, transparent 70%); transform: rotate(45deg); }
        .news-header-content { position: relative; z-index: 2; }

        .news-meta-badge { display:inline-flex; align-items:center; gap:.75rem; background: rgba(255,255,255,.2); backdrop-filter: blur(15px); padding:.75rem 1.25rem; border-radius:2rem; font-size:.95rem; margin-bottom:1.5rem; font-weight:600; border:1px solid rgba(255,255,255,.2); }
        .news-code { font-family: 'JetBrains Mono','Courier New',monospace; font-size:1rem; background: rgba(255,255,255,.2); padding:.75rem 1.25rem; border-radius:.75rem; display:inline-block; margin-bottom:1.5rem; border:1px solid rgba(255,255,255,.2); font-weight:600; color:#fff; text-shadow:1px 1px 3px rgba(0,0,0,.3); }
        .news-title { font-size: clamp(2rem, 3.5vw, 2.8rem); font-weight:800; margin-bottom:1rem; line-height:1.1; text-shadow:2px 2px 8px rgba(0,0,0,.5); color:#fff; }
        .news-subtitle { font-size:1.05rem; opacity:.95; margin-bottom:2rem; font-weight:500; text-shadow: 1px 1px 4px rgba(0,0,0,.4); color:#fff; }

        .news-stats { display:grid; grid-template-columns: repeat(auto-fit,minmax(140px,1fr)); gap:1.25rem; }
        .news-stat-item { text-align:center; background: rgba(255,255,255,.15); backdrop-filter: blur(15px); padding:1.25rem 1rem; border-radius:1rem; border:1px solid rgba(255,255,255,.2); transition:all .25s ease; }
        .news-stat-item:hover { background: rgba(255,255,255,.25); transform: translateY(-2px); }
        .news-stat-value { font-size:1.3rem; font-weight:800; margin-bottom:.35rem; text-shadow:1px 1px 2px rgba(0,0,0,.2); }
        .news-stat-label { font-size:.8rem; opacity:.9; font-weight:600; }

        .content-section { padding: 2rem 2rem 2.25rem; }
        .content-section h3 { color: var(--tblr-primary); font-weight:700; margin-bottom:1.25rem; display:flex; align-items:center; gap:.75rem; font-size:1.35rem; }
        .content-section h3::before { content:''; width:4px; height:1.5rem; background: linear-gradient(135deg, var(--tblr-primary), var(--tblr-info)); border-radius:2px; }
        .content-text { font-size:1.05rem; line-height:1.8; color: var(--tblr-text-secondary); }
        .content-text p { margin-bottom:1rem; }
        .content-text img { max-width:100%; height:auto; border-radius:1rem; margin:1.25rem 0; box-shadow:0 8px 25px rgba(0,0,0,.08); }

        /* Featured media uses <img> with fallback */
        .featured-image { border-radius:1.5rem; overflow:hidden; margin-bottom:1.5rem; box-shadow:0 12px 35px rgba(0,0,0,.15); }
        .featured-image .ratio { --bs-aspect-ratio: 56%; }
        .featured-image img { width:100%; height:100%; object-fit:cover; }

        /* Sidebar */
        .sidebar-card { background: var(--tblr-card-bg); border:1px solid var(--tblr-border-color-light); border-radius:1.25rem; padding:2rem; box-shadow:0 6px 25px rgba(0,0,0,.08); margin-bottom:2rem; transition: transform .25s ease, box-shadow .25s ease; position:relative; z-index:2; }
        .sidebar-card:hover { transform: translateY(-2px); box-shadow:0 10px 35px rgba(0,0,0,.12); }
        .sidebar-card h5 { color: var(--tblr-primary); margin-bottom:1.25rem; font-weight:700; font-size:1.15rem; display:flex; align-items:center; gap:.5rem; }
        .sidebar-card h5::before { content:''; width:4px; height:1.25rem; background: linear-gradient(135deg, var(--tblr-primary), var(--tblr-info)); border-radius:2px; }

        .related-news-item { display:flex; gap:1rem; padding:1rem; background: var(--tblr-bg-surface-secondary); border-radius:1rem; margin-bottom:1rem; transition: transform .2s ease, box-shadow .2s ease, background .2s ease; text-decoration:none; color:inherit; border:1px solid transparent; }
        .related-news-item:hover { background: var(--tblr-primary); color:#fff; transform: translateY(-2px) translateX(4px); box-shadow:0 8px 25px rgba(var(--tblr-primary-rgb), .3); border-color: var(--tblr-primary); }
        .related-thumb { width:84px; height:84px; border-radius:.75rem; overflow:hidden; flex-shrink:0; }
        .related-thumb img { width:100%; height:100%; object-fit:cover; }

        .share-card { background: linear-gradient(135deg, var(--tblr-success), var(--tblr-info)); color:#fff; text-align:center; position:relative; overflow:hidden; }
        .share-card::before { content:''; position:absolute; top:-50%; right:-50%; width:100%; height:100%; background: radial-gradient(circle, rgba(255,255,255,.1) 0%, transparent 70%); transform: rotate(45deg); }
        .share-card .btn { background: rgba(255,255,255,.2); border:1px solid rgba(255,255,255,.3); color:#fff; backdrop-filter: blur(10px); font-weight:600; padding:.65rem 1.25rem; border-radius:.75rem; transition: all .2s ease; margin:.25rem; }
        .share-card .btn:hover { background: rgba(255,255,255,.3); border-color: rgba(255,255,255,.5); transform: translateY(-2px); box-shadow:0 4px 15px rgba(0,0,0,.2); }

        .back-navigation { margin-bottom: 1.25rem; }
        .btn-back { display:inline-flex; align-items:center; gap:.6rem; background: rgba(255,255,255,.2); backdrop-filter: blur(15px); border:1px solid rgba(255,255,255,.3); color:#fff; padding:.8rem 1.25rem; border-radius:.9rem; text-decoration:none; transition: all .2s ease; font-weight:600; }
        .btn-back:hover { background: rgba(255,255,255,.3); border-color: rgba(255,255,255,.5); color:#fff; transform: translateY(-2px) translateX(-2px); box-shadow:0 4px 15px rgba(0,0,0,.2); }

        .breadcrumb { background: rgba(255,255,255,.1); backdrop-filter: blur(15px); border-radius: 2rem; padding:.65rem 1.25rem; border:1px solid rgba(255,255,255,.2); }
        .breadcrumb-item + .breadcrumb-item::before { color: rgba(255,255,255,.7); }

        .info-grid { display:grid; grid-template-columns: repeat(auto-fit, minmax(220px,1fr)); gap:1.25rem; margin-bottom: .25rem; }
        .info-item { background: linear-gradient(135deg, var(--tblr-bg-surface-secondary), rgba(var(--tblr-primary-rgb), .03)); padding:1.25rem; border-radius:1rem; border-left:4px solid var(--tblr-primary); transition: all .2s ease; position:relative; overflow:hidden; }
        .info-item::before { content:''; position:absolute; top:0; right:0; width:60px; height:60px; background: rgba(var(--tblr-primary-rgb), .08); border-radius: 0 0 0 60px; }
        .info-item:hover { transform: translateY(-3px); box-shadow: 0 8px 25px rgba(var(--tblr-primary-rgb), .12); border-left-color: var(--tblr-info); }
        .info-label { font-size:.8rem; color: var(--tblr-text-muted); text-transform: uppercase; letter-spacing:.06em; margin-bottom:.5rem; font-weight:700; }
        .info-value { font-size:1rem; font-weight:700; color: var(--tblr-text-dark); position:relative; z-index:2; }

        .article-nav { display:flex; justify-content:space-between; gap:1rem; }
        .article-nav a { display:block; padding:1rem 1.25rem; border:1px solid var(--tblr-border-color-light); border-radius:.9rem; background:var(--tblr-card-bg); text-decoration:none; transition:transform .2s ease, box-shadow .2s ease; }
        .article-nav a:hover { transform: translateY(-2px); box-shadow:0 10px 25px rgba(0,0,0,.08); }

        @keyframes fadeInUp { from { opacity:0; transform: translateY(30px);} to { opacity:1; transform:none; } }
        .news-content-card, .sidebar-card { animation: fadeInUp .6s ease-out; }

        @media (max-width: 768px) {
            .hero-section { min-height: 60vh; background-attachment: scroll; }
            .content-section { padding: 1.25rem; }
            .sidebar-card { padding: 1.5rem; }
            .news-stats { grid-template-columns: repeat(2, 1fr); }
            .info-grid { grid-template-columns: 1fr; }
        }
    </style>
@endsection

@section('content')
@php
    // helper fallback for images
    function news_fallback($w=1200,$h=675,$text='Gambar Berita'){
        return 'https://placehold.co/'.intval($w).'x'.intval($h).'?text='.urlencode($text);
    }
    $wordCount = str_word_count(strip_tags($berita->content ?? ''));
    $readingTime = max(1, ceil($wordCount / 200));
@endphp

    <!-- Hero Section (unchanged) -->
    <section class="hero-section">
        <div class="container hero-content">
            <div class="back-navigation">
                <a href="{{ route('root.berita-index') }}" class="btn-back">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="m15 18-6-6 6-6"></path></svg>
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
                @if($berita->kategori) {{ $berita->kategori->name }} @else Berita @endif
                <span class="ms-2">•</span>
                <span>± {{ $readingTime }} menit baca</span>
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
                <div class="news-stat-item"><div class="news-stat-value">{{ $berita->status }}</div><div class="news-stat-label">Status</div></div>
                <div class="news-stat-item"><div class="news-stat-value">{{ \Carbon\Carbon::parse($berita->created_at)->format('M Y') }}</div><div class="news-stat-label">Publikasi</div></div>
                @if($berita->kategori)
                    <div class="news-stat-item"><div class="news-stat-value">{{ Str::limit($berita->kategori->name, 10) }}</div><div class="news-stat-label">Kategori</div></div>
                @endif
                <div class="news-stat-item"><div class="news-stat-value">{{ $wordCount }}</div><div class="news-stat-label">Kata</div></div>
            </div>
        </div>
    </section>

    <!-- Main Content -->
    <section class="py-6" style="position: relative; z-index: 10;">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-8">
                    <!-- Featured Image (with reliable fallback) -->
                    @if($berita->photo)
                        <figure class="featured-image">
                            <div class="ratio">
                                <img src="{{ asset('storage/' . $berita->photo) }}" alt="{{ $berita->name }}" loading="lazy" onerror="this.onerror=null;this.src='{{ news_fallback(1200,675,'Gambar Berita') }}'">
                            </div>
                        </figure>
                    @endif

                    <!-- Content Section -->
                    <article class="news-content-card">
                        <div class="content-section">
                            <h3>
                                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 22h16a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H8a2 2 0 0 0-2 2v16a2 2 0 0 1-2 2Zm0 0a2 2 0 0 1-2-2v-9c0-1.1.9-2 2-2h2"></path><path d="M18 14H6"></path><path d="M15 18H9"></path><path d="M10 6h8"></path></svg>
                                Isi Berita
                            </h3>
                            <div class="content-text">
                                {!! $berita->content !!}
                            </div>
                        </div>
                    </article>

                    <!-- Article Info -->
                    <div class="news-content-card">
                        <div class="content-section">
                            <h3>
                                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="3"></circle><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1 1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path></svg>
                                Informasi Artikel
                            </h3>
                            <div class="info-grid">
                                <div class="info-item"><div class="info-label">Kode Berita</div><div class="info-value">{{ $berita->code }}</div></div>
                                <div class="info-item"><div class="info-label">Slug URL</div><div class="info-value">{{ $berita->slug }}</div></div>
                                @if($berita->kategori)
                                    <div class="info-item"><div class="info-label">Kategori</div><div class="info-value">{{ $berita->kategori->name }}</div></div>
                                @endif
                                <div class="info-item"><div class="info-label">Status Publikasi</div><div class="info-value"><span class="badge bg-{{ $berita->status == 'Publish' ? 'success' : ($berita->status == 'Draft' ? 'warning' : 'secondary') }}">{{ $berita->status }}</span></div></div>
                                <div class="info-item"><div class="info-label">Tanggal Dibuat</div><div class="info-value">{{ \Carbon\Carbon::parse($berita->created_at)->format('d F Y, H:i') }}</div></div>
                                <div class="info-item"><div class="info-label">Terakhir Diperbarui</div><div class="info-value">{{ \Carbon\Carbon::parse($berita->updated_at)->diffForHumans() }}</div></div>
                            </div>
                        </div>
                    </div>

                    @if(isset($prev) || isset($next))
                    <div class="article-nav">
                        <div class="flex-grow-1">
                            @if(isset($prev))
                                <a href="{{ route('root.berita-view', $prev->slug) }}" class="d-block">
                                    ← Sebelumnya: {{ Str::limit($prev->name, 60) }}
                                </a>
                            @endif
                        </div>
                        <div class="flex-grow-1 text-end">
                            @if(isset($next))
                                <a href="{{ route('root.berita-view', $next->slug) }}" class="d-block">
                                    Berikutnya: {{ Str::limit($next->name, 60) }} →
                                </a>
                            @endif
                        </div>
                    </div>
                    @endif
                </div>

                <!-- Sidebar -->
                <div class="col-lg-4">
                    <!-- Share Article -->
                    <div class="sidebar-card share-card">
                        <h5>
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="me-2"><path d="M4 12v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-8"></path><polyline points="16,6 12,2 8,6"></polyline><line x1="12" y1="2" x2="12" y2="15"></line></svg>
                            Bagikan Artikel
                        </h5>
                        <div class="d-grid gap-2">
                            <button class="btn" onclick="shareToFacebook()">Facebook</button>
                            <button class="btn" onclick="shareToTwitter()">Twitter</button>
                            <button class="btn" onclick="shareToWhatsApp()">WhatsApp</button>
                            <button class="btn" onclick="copyToClipboard()">Salin Link</button>
                        </div>
                    </div>

                    <!-- Related News -->
                    @if($relatedBerita->count() > 0)
                        <div class="sidebar-card">
                            <h5>Berita Terkait</h5>
                            @foreach($relatedBerita as $related)
                                @php $rimg = $related->photo ? asset('storage/' . $related->photo) : news_fallback(200,200,'Berita'); @endphp
                                <a href="{{ route('root.berita-view', $related->slug) }}" class="related-news-item">
                                    <span class="related-thumb"><img src="{{ $rimg }}" alt="{{ $related->name }}" loading="lazy" onerror="this.onerror=null;this.src='{{ news_fallback(200,200,'Berita') }}'"></span>
                                    <span class="related-news-content">
                                        <h6>{{ Str::limit($related->name, 60) }}</h6>
                                        <small>{{ \Carbon\Carbon::parse($related->created_at)->diffForHumans() }}</small>
                                    </span>
                                </a>
                            @endforeach
                        </div>
                    @endif

                    <!-- Quick Actions -->
                    <div class="sidebar-card">
                        <h5>Aksi Cepat</h5>
                        <div class="d-grid gap-2">
                            <a href="{{ route('root.berita-index') }}" class="btn btn-outline-primary">Lihat Semua Berita</a>
                            <button class="btn btn-outline-info" onclick="window.print()">Cetak Artikel</button>
                            <button class="btn btn-outline-secondary" onclick="window.history.back()">Kembali</button>
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
            // entrance animations
            const observer = new IntersectionObserver((entries)=>{
                entries.forEach((entry, idx)=>{
                    if(entry.isIntersecting){
                        entry.target.style.opacity = '1';
                        entry.target.style.transform = 'translateY(0)';
                        observer.unobserve(entry.target);
                    }
                });
            }, {threshold: .12, rootMargin: '0px 0px -80px 0px'});

            document.querySelectorAll('.news-content-card, .sidebar-card, .info-item').forEach(el=>{
                el.style.opacity = '0';
                el.style.transform = 'translateY(24px)';
                el.style.transition = 'opacity .6s ease, transform .6s ease';
                observer.observe(el);
            });
        });

        // Share helpers
        function shareToFacebook(){ const u = encodeURIComponent(location.href); const t = encodeURIComponent('{{ $berita->name }}'); window.open(`https://www.facebook.com/sharer/sharer.php?u=${u}&t=${t}`,'_blank','width=600,height=400'); }
        function shareToTwitter(){ const u = encodeURIComponent(location.href); const t = encodeURIComponent('{{ $berita->name }}'); window.open(`https://twitter.com/intent/tweet?url=${u}&text=${t}`,'_blank','width=600,height=400'); }
        function shareToWhatsApp(){ const u = encodeURIComponent(location.href); const t = encodeURIComponent('{{ $berita->name }}'); window.open(`https://wa.me/?text=${t}%20${u}`,'_blank'); }
        function copyToClipboard(){ navigator.clipboard.writeText(location.href).then(()=>{ const n=document.createElement('div'); n.textContent='Link berhasil disalin!'; n.style.cssText='position:fixed;top:20px;right:20px;background:var(--tblr-success);color:#fff;padding:1rem 1.25rem;border-radius:.6rem;z-index:1000;font-weight:700;box-shadow:0 4px 15px rgba(0,0,0,.2);opacity:0;transform:translateY(-20px);transition:all .3s ease'; document.body.appendChild(n); setTimeout(()=>{n.style.opacity='1';n.style.transform='translateY(0)';},50); setTimeout(()=>{n.style.opacity='0';n.style.transform='translateY(-20px)'; setTimeout(()=>n.remove(),300);},2400); }); }
    </script>
@endsection
