@extends('core-themes.core-mainpage')

@section('custom-css')
<style>
  /* ======= Modern Pro News Page ======= */
  :root{
    --primary: var(--tblr-primary);
    --muted: var(--tblr-text-muted);
    --line: var(--tblr-border-color-light);
    --card: var(--tblr-card-bg);
    --surface: var(--tblr-bg-surface-secondary);
  }
    /* Original-like hero visuals */
    .hero-section {
    background: linear-gradient(135deg, rgba(var(--tblr-info-rgb), 0.85), rgba(var(--tblr-primary-rgb), 0.9)),
                url('{{ $heroImage ?? "https://images.unsplash.com/photo-1504711434969-e33886168f5c?q=80&w=2070&auto=format&fit=crop" }}') no-repeat center center;
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
    content: "";
    position: absolute;
    inset: 0;
    background: rgba(0,0,0,.4);
    backdrop-filter: blur(1px);
    z-index: 1;
    }
    .hero-content { position: relative; z-index: 2; text-align: center; width: 100%; }


  /* Filters */
  .filter-wrap{background:var(--card);border:1px solid var(--line);border-radius:1rem;padding:1rem 1.25rem;box-shadow:0 6px 18px rgba(0,0,0,.04)}

  /* Cards */
  .news-card{background:var(--card);border:1px solid var(--line);border-radius:1rem;overflow:hidden;display:flex;flex-direction:column;height:100%;transition:transform .15s ease, box-shadow .15s ease}
  .news-card:hover{transform:translateY(-3px);box-shadow:0 14px 30px rgba(0,0,0,.10)}
  .news-thumb{position:relative}
  .news-thumb .ratio{--bs-aspect-ratio:56%;}
  .news-thumb img{width:100%;height:100%;object-fit:cover}
  .news-chip{position:absolute;left:.75rem;bottom:.75rem;background:rgba(255,255,255,.92);backdrop-filter:blur(6px);color:var(--primary);font-weight:700;border-radius:999px;padding:.25rem .6rem;font-size:.75rem}
  .news-body{padding:1rem 1rem 1.25rem}
  .news-meta{display:flex;gap:.75rem;align-items:center;color:var(--muted);font-size:.85rem;margin-bottom:.5rem}
  .news-title{font-size:1.1rem;font-weight:800;line-height:1.25;margin:.25rem 0 .5rem}
  .news-title a{text-decoration:none;color:inherit}
  .news-title a:hover{color:var(--primary)}
  .news-excerpt{color:var(--muted)}
  .badge-status{position:absolute;top:.75rem;right:.75rem;border-radius:999px;padding:.25rem .6rem;font-weight:700;font-size:.7rem;color:#fff}
  .status-publish{background:var(--tblr-success)}
  .status-draft{background:var(--tblr-warning)}
  .status-archive{background:var(--tblr-secondary)}

  /* Sidebar */
  .side-card{background:var(--card);border:1px solid var(--line);border-radius:1rem;padding:1rem 1.25rem;box-shadow:0 6px 18px rgba(0,0,0,.04)}
  .side-card h5{display:flex;align-items:center;gap:.5rem;font-weight:800;color:var(--primary)}
  .topic-badge{border-radius:999px}
  .recent-item{display:flex;gap:.75rem;padding:.5rem;border-radius:.75rem;text-decoration:none;color:inherit}
  .recent-item:hover{background:var(--surface)}
  .recent-thumb{width:64px;height:64px;border-radius:.5rem;overflow:hidden;flex-shrink:0}
  .recent-thumb img{width:100%;height:100%;object-fit:cover}

  /* Helpers */
  .object-cover{object-fit:cover}
  @media (max-width:768px){.hero .inner{padding:3rem 0}}
</style>
@endsection

@section('content')
@php
  // Reliable image fallback generator
  function news_fallback($w=1200,$h=630,$text='Berita'){
    return 'https://placehold.co/'.intval($w).'x'.intval($h).'?text='.urlencode($text);
  }
  $heroImage = $heroImage ?? null;
@endphp

<!-- Hero -->
<!-- Hero Section (revert to original style) -->
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


<!-- Filters -->
<section class="py-4">
  <div class="container">
    <div class="filter-wrap">
      <div class="row g-3 align-items-end">
        <div class="col-lg-4">
          <label for="searchInput" class="form-label">Cari Berita</label>
          <input type="text" id="searchInput" class="form-control" placeholder="Judul berita atau kata kunci...">
        </div>
        <div class="col-lg-3">
          <label for="categoryFilter" class="form-label">Kategori</label>
          <select id="categoryFilter" class="form-select">
            <option value="">Semua Kategori</option>
            @foreach(($kategoris ?? []) as $kategori)
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

<!-- Content -->
<section class="pb-6">
  <div class="container">
    <div class="row g-4">
      <div class="col-lg-8">
        <div class="row g-3" id="news-container">
          @forelse(($beritas ?? []) as $berita)
            @php
              $thumb = $berita->photo ? asset('storage/'.$berita->photo) : news_fallback(960,540,$berita->kategori->name ?? 'Berita');
            @endphp
            <div class="col-12" data-category="{{ $berita->kategori_id }}" data-title="{{ strtolower($berita->name) }}" data-date="{{ $berita->created_at }}">
              <article class="news-card">
                <div class="news-thumb">
                  <div class="ratio">
                    <img src="{{ $thumb }}" alt="{{ $berita->name }}" loading="lazy"
                         onerror="this.onerror=null;this.src='{{ news_fallback(960,540,'Berita') }}'">
                  </div>
                  @if($berita->kategori)
                    <span class="news-chip">{{ $berita->kategori->name }}</span>
                  @endif
                  @if($berita->status)
                    <span class="badge-status status-{{ strtolower($berita->status) }}">{{ $berita->status }}</span>
                  @endif
                </div>
                <div class="news-body">
                  <div class="news-meta">
                    <span>
                      <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                      {{ \Carbon\Carbon::parse($berita->created_at)->format('d F Y') }}
                    </span>
                    @if($berita->author)
                      <span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                        {{ $berita->author->name }}
                      </span>
                    @endif
                  </div>
                  <h3 class="news-title"><a href="{{ route('root.berita-view', $berita->slug) }}">{{ $berita->name }}</a></h3>
                  <p class="news-excerpt">{{ Str::limit(strip_tags($berita->content), 160) }}</p>
                  <a href="{{ route('root.berita-view', $berita->slug) }}" class="btn btn-sm btn-primary">Baca Selengkapnya</a>
                </div>
              </article>
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

        @if(isset($beritas) && method_exists($beritas, 'hasPages') && $beritas->hasPages())
          <div class="d-flex justify-content-center mt-4">
            {{ $beritas->links() }}
          </div>
        @endif
      </div>

      <!-- Sidebar -->
      <aside class="col-lg-4">
        <div class="side-card mb-3">
          <h5>
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="text-primary"><circle cx="12" cy="12" r="10"></circle><path d="M12 6v6l4 2"></path></svg>
            Statistik Berita
          </h5>
          <div class="row g-2 text-center">
            <div class="col-6">
              <div class="p-3 rounded" style="background:var(--surface)">
                <div class="fw-black fs-3 text-primary">{{ $totalBerita ?? 0 }}</div>
                <div class="small text-muted">Total Berita</div>
              </div>
            </div>
            <div class="col-6">
              <div class="p-3 rounded" style="background:var(--surface)">
                <div class="fw-black fs-3 text-primary">{{ collect($kategoris ?? [])->count() }}</div>
                <div class="small text-muted">Kategori</div>
              </div>
            </div>
          </div>
        </div>

        <div class="side-card mb-3">
          <h5>Kategori Berita</h5>
          <div class="list-group list-group-flush">
            @foreach(($kategoris ?? []) as $kategori)
              <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center category-link" data-category="{{ $kategori->id }}">
                <span>{{ $kategori->name }}</span>
                <span class="badge bg-primary rounded-pill">{{ $kategori->beritas_count }}</span>
              </a>
            @endforeach
          </div>
        </div>

        @if(isset($recentBerita) && $recentBerita->count() > 0)
          <div class="side-card mb-3">
            <h5>Berita Terbaru</h5>
            @foreach($recentBerita as $recent)
              @php $rthumb = $recent->photo ? asset('storage/'.$recent->photo) : news_fallback(128,128,'Berita'); @endphp
              <a href="{{ route('root.berita-view', $recent->slug) }}" class="recent-item">
                <span class="recent-thumb"><img src="{{ $rthumb }}" alt="{{ $recent->name }}" loading="lazy" onerror="this.onerror=null;this.src='{{ news_fallback(128,128,'Berita') }}'"></span>
                <span>
                  <div class="fw-semibold">{{ Str::limit($recent->name, 60) }}</div>
                  <small class="text-muted">{{ \Carbon\Carbon::parse($recent->created_at)->diffForHumans() }}</small>
                </span>
              </a>
            @endforeach
          </div>
        @endif

        <div class="side-card">
          <h5>Topik Populer</h5>
          <div class="d-flex flex-wrap gap-2">
            <span class="badge topic-badge bg-primary-lt">Pendidikan</span>
            <span class="badge topic-badge bg-info-lt">Teknologi</span>
            <span class="badge topic-badge bg-success-lt">Penelitian</span>
            <span class="badge topic-badge bg-warning-lt">Mahasiswa</span>
            <span class="badge topic-badge bg-danger-lt">Akademik</span>
            <span class="badge topic-badge bg-purple-lt">Kampus</span>
          </div>
        </div>
      </aside>
    </div>
  </div>
</section>
@endsection

@section('custom-js')
<script>
  document.addEventListener('DOMContentLoaded', function(){
    const searchInput = document.getElementById('searchInput');
    const categoryFilter = document.getElementById('categoryFilter');
    const sortFilter = document.getElementById('sortFilter');

    window.filterNews = function(){
      const term = (searchInput?.value || '').toLowerCase();
      const cat = categoryFilter?.value || '';
      const sort = sortFilter?.value || 'newest';

      const items = Array.from(document.querySelectorAll('#news-container > .col-12'));
      items.forEach(el=>{
        const title = el.getAttribute('data-title') || '';
        const c = el.getAttribute('data-category') || '';
        const match = (!term || title.includes(term)) && (!cat || c === cat);
        el.style.display = match ? '' : 'none';
      });

      const visible = items.filter(el => el.style.display !== 'none');
      visible.sort((a,b)=>{
        if(sort==='title') return (a.getAttribute('data-title')||'').localeCompare(b.getAttribute('data-title')||'');
        const da = new Date(a.getAttribute('data-date')), db = new Date(b.getAttribute('data-date'));
        return sort==='oldest' ? (da - db) : (db - da);
      });
      const container = document.getElementById('news-container');
      visible.forEach(el=>container.appendChild(el));
    }

    searchInput?.addEventListener('input', filterNews);
    categoryFilter?.addEventListener('change', filterNews);
    sortFilter?.addEventListener('change', filterNews);

    document.querySelectorAll('.category-link').forEach(a=>{
      a.addEventListener('click', (e)=>{e.preventDefault();categoryFilter.value=a.dataset.category;filterNews();});
    });
  });
</script>
@endsection