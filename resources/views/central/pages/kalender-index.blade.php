@extends('core-themes.core-mainpage')

@section('custom-css')
    <style>
        .hero-section {
            background: linear-gradient(135deg, rgba(var(--tblr-success-rgb), 0.8), rgba(var(--tblr-primary-rgb), 0.9)), url('https://images.unsplash.com/photo-1434030216411-0b793f4b4173?q=80&w=2070&auto=format&fit=crop') no-repeat center center;
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

        .calendar-card {
            border: none;
            border-radius: 1rem;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            margin-bottom: 2rem;
            position: relative;
        }

        .calendar-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
        }

        .calendar-header {
            background: var(--tblr-bg-surface-secondary);
            padding: 1.5rem;
            border-bottom: 1px solid var(--tblr-border-color);
        }

        .date-badge {
            position: absolute;
            top: 1rem;
            right: 1rem;
            background: var(--tblr-primary);
            color: white;
            border-radius: 0.75rem;
            padding: 0.5rem 1rem;
            font-weight: 600;
            font-size: 0.875rem;
        }

        .event-type {
            display: inline-block;
            padding: 0.25rem 0.75rem;
            border-radius: 2rem;
            font-size: 0.75rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }

        .type-ujian {
            background: rgba(var(--tblr-danger-rgb), 0.1);
            color: var(--tblr-danger);
        }

        .type-libur {
            background: rgba(var(--tblr-success-rgb), 0.1);
            color: var(--tblr-success);
        }

        .type-pendaftaran {
            background: rgba(var(--tblr-info-rgb), 0.1);
            color: var(--tblr-info);
        }

        .type-wisuda {
            background: rgba(var(--tblr-warning-rgb), 0.1);
            color: var(--tblr-warning);
        }

        .type-orientasi {
            background: rgba(var(--tblr-purple-rgb), 0.1);
            color: var(--tblr-purple);
        }

        .filter-section {
            background: var(--tblr-card-bg);
            border-radius: 1rem;
            padding: 1.5rem;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
            margin-bottom: 2rem;
        }

        .mini-calendar {
            background: var(--tblr-card-bg);
            border-radius: 1rem;
            padding: 1.5rem;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
        }

        .calendar-grid {
            display: grid;
            grid-template-columns: repeat(7, 1fr);
            gap: 0.5rem;
            margin-top: 1rem;
        }

        .calendar-day {
            aspect-ratio: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 0.5rem;
            font-size: 0.875rem;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .calendar-day:hover {
            background: var(--tblr-primary-lt);
        }

        .calendar-day.has-event {
            background: var(--tblr-primary);
            color: white;
            font-weight: 600;
        }

        .calendar-day.today {
            background: var(--tblr-success);
            color: white;
            font-weight: 600;
        }

        .calendar-header-day {
            font-weight: 600;
            color: var(--tblr-text-muted);
            text-align: center;
            padding: 0.5rem;
            font-size: 0.75rem;
        }

        .timeline-view {
            position: relative;
            padding-left: 3rem;
        }

        .timeline-view::before {
            content: '';
            position: absolute;
            left: 1.25rem;
            top: 0;
            bottom: 0;
            width: 3px;
            background: linear-gradient(to bottom, var(--tblr-primary-lt), var(--tblr-info), var(--tblr-primary));
            border-radius: 1.5px;
            opacity: 0.7;
            box-shadow: 0 0 8px rgba(var(--tblr-primary-rgb), 0.3);
        }

        .timeline-item {
            position: relative;
            margin-bottom: 2.5rem;
            opacity: 0;
            transform: translateX(-20px);
            animation: timeline-fade-in 0.5s ease forwards;
            animation-delay: calc(var(--item-index, 0) * 0.1s);
        }

        @keyframes timeline-fade-in {
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        .timeline-marker {
            position: absolute;
            left: -2.5rem;
            top: 1rem;
            width: 1.5rem;
            height: 1.5rem;
            border-radius: 50%;
            border: 3px solid white;
            box-shadow: 0 0 0 3px rgba(var(--tblr-primary-rgb), 0.2), 0 0 8px rgba(0, 0, 0, 0.2);
            z-index: 2;
            transform: scale(1);
            transition: transform 0.3s ease;
        }
        
        .timeline-item:hover .timeline-marker {
            transform: scale(1.2);
        }
        
        .timeline-date {
            position: absolute;
            left: -7rem;
            top: 1rem;
            color: var(--tblr-text-muted);
            font-weight: 500;
            font-size: 0.875rem;
            background: var(--tblr-bg-surface);
            padding: 0.25rem 0.75rem;
            border-radius: 1rem;
            box-shadow: 0 3px 6px rgba(0, 0, 0, 0.1);
            opacity: 0.8;
        }

        .view-toggle {
            display: flex;
            border-radius: 0.75rem;
            overflow: hidden;
            border: 1px solid var(--tblr-border-color);
        }

        .view-toggle button {
            flex: 1;
            padding: 0.75rem 1rem;
            border: none;
            background: var(--tblr-card-bg);
            color: var(--tblr-text-muted);
            transition: all 0.3s ease;
        }

        .view-toggle button.active {
            background: var(--tblr-primary);
            color: white;
        }

        /* Timeline Specific Styles */
        .timeline-card {
            border-radius: 1rem;
            overflow: hidden;
            transition: all 0.3s ease;
            border-left: 4px solid var(--tblr-primary);
        }
        
        .timeline-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
        }
        
        .timeline-card-header {
            padding: 1.5rem 1.5rem 0.5rem;
            background: var(--tblr-bg-surface-secondary);
        }
        
        .timeline-title {
            margin: 0.75rem 0;
            font-weight: 600;
        }
        
        .timeline-date-range {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 0.875rem;
            margin-bottom: 1rem;
        }
        
        .timeline-card-body {
            padding: 1.5rem;
        }
        
        .timeline-description {
            color: var(--tblr-text-muted);
            margin-bottom: 1.25rem;
        }
        
        .timeline-action {
            display: flex;
            justify-content: flex-end;
        }
        
        .timeline-status {
            font-size: 0.75rem;
        }
        
        .status {
            display: inline-flex;
            align-items: center;
            padding: 0.25rem 0.75rem;
            border-radius: 2rem;
            font-weight: 600;
        }
        
        .status-sm {
            font-size: 0.75rem;
            padding: 0.2rem 0.6rem;
        }
        
        .status-success {
            background: rgba(var(--tblr-success-rgb), 0.1);
            color: var(--tblr-success);
        }
        
        .status-warning {
            background: rgba(var(--tblr-warning-rgb), 0.1);
            color: var(--tblr-warning);
        }
        
        .status-info {
            background: rgba(var(--tblr-info-rgb), 0.1);
            color: var(--tblr-info);
        }

        /* Type-specific timeline card borders */
        .timeline-item[data-type="ujian"] .timeline-card {
            border-left-color: var(--tblr-danger);
        }
        
        .timeline-item[data-type="libur"] .timeline-card {
            border-left-color: var(--tblr-success);
        }
        
        .timeline-item[data-type="pendaftaran"] .timeline-card {
            border-left-color: var(--tblr-info);
        }
        
        .timeline-item[data-type="wisuda"] .timeline-card {
            border-left-color: var(--tblr-warning);
        }
        
        .timeline-item[data-type="orientasi"] .timeline-card {
            border-left-color: var(--tblr-purple);
        }

        @media (max-width: 768px) {
            .hero-section {
                min-height: 40vh;
            }
            
            .calendar-card {
                margin-bottom: 1.5rem;
            }
            
            .timeline-view {
                padding-left: 1.5rem;
            }
            
            .timeline-marker {
                left: -1.75rem;
                width: 1.25rem;
                height: 1.25rem;
            }
            
            .timeline-date {
                position: relative;
                left: 0;
                top: 0;
                margin-bottom: 0.75rem;
                margin-left: 0;
                display: inline-block;
            }
        }
    </style>
@endsection

@section('content')
    <!-- Hero Section -->
    <section class="hero-section text-center text-white">
        <div class="container hero-content">
            <h1 class="display-4 fw-bold mb-3">Kalender Akademik</h1>
            <p class="fs-5 mb-4">Jadwal kegiatan akademik dan penting sepanjang tahun</p>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center">
                    <li class="breadcrumb-item"><a href="/" class="text-white">Beranda</a></li>
                    <li class="breadcrumb-item active text-white" aria-current="page">Kalender Akademik</li>
                </ol>
            </nav>
        </div>
    </section>

    <!-- Filter & Search Section -->
    <section class="py-5">
        <div class="container">
            <div class="filter-section">
                <div class="row g-3 align-items-end">
                    <div class="col-lg-3">
                        <label class="form-label">Cari Event</label>
                        <input type="text" class="form-control" placeholder="Cari kegiatan..." id="searchInput">
                    </div>
                    <div class="col-lg-2">
                        <label class="form-label">Tahun</label>
                        <select class="form-select" id="yearFilter">
                            <option value="">Semua Tahun</option>
                            @for($year = date('Y'); $year <= date('Y') + 2; $year++)
                                <option value="{{ $year }}" {{ $year == date('Y') ? 'selected' : '' }}>{{ $year }}</option>
                            @endfor
                        </select>
                    </div>
                    <div class="col-lg-2">
                        <label class="form-label">Bulan</label>
                        <select class="form-select" id="monthFilter">
                            <option value="">Semua Bulan</option>
                            @foreach(['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'] as $index => $month)
                                <option value="{{ $index + 1 }}">{{ $month }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-lg-3">
                        <label class="form-label">Jenis Kegiatan</label>
                        <select class="form-select" id="typeFilter">
                            <option value="">Semua Jenis</option>
                            <option value="ujian">Ujian</option>
                            <option value="libur">Libur</option>
                            <option value="pendaftaran">Pendaftaran</option>
                            <option value="wisuda">Wisuda</option>
                            <option value="orientasi">Orientasi</option>
                        </select>
                    </div>
                    <div class="col-lg-2">
                        <label class="form-label">Tampilan</label>
                        <div class="view-toggle">
                            <button type="button" class="active" data-view="grid">Grid</button>
                            <button type="button" data-view="timeline">Timeline</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Calendar Content -->
    <section class="pb-6">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-8">
                    <!-- Grid View -->
                    <div id="grid-view">
                        @forelse($kalenderAkademik ?? [] as $item)
                            <div class="card calendar-card" data-type="{{ $item->type }}" data-date="{{ $item->start_date }}" data-name="{{ $item->name }}">
                                <div class="date-badge">
                                    {{ \Carbon\Carbon::parse($item->start_date)->format('d M') }}
                                </div>
                                <div class="card-header calendar-header">
                                    <div class="d-flex align-items-center gap-3 mb-2">
                                    <span class="event-type type-{{ $item->type }}">{{ ucfirst($item->type) }}</span> <br>
                                        
                                    </div>
                                    <h3 class="h4 mb-2">
                                        {{ $item->name }} <br>
                                        <span class="text-muted">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                                                <line x1="16" y1="2" x2="16" y2="6"></line>
                                                <line x1="8" y1="2" x2="8" y2="6"></line>
                                                <line x1="3" y1="10" x2="21" y2="10"></line>
                                            </svg>
                                            {{ \Carbon\Carbon::parse($item->start_date)->format('d F Y') }}
                                            @if($item->ended_date && $item->ended_date != $item->start_date)
                                                - {{ \Carbon\Carbon::parse($item->ended_date)->format('d F Y') }}
                                            @endif
                                        </span>
                                    </h3>
   
                                </div>
                                <div class="card-body">

                                    <p class="text-muted mb-3">{{ $item->desc }}</p>
                                    <div class="d-flex justify-content-between align-items-center">

                                        <a href="{{ route('root.kalender-akademik-view', $item->code) }}" class="btn btn-primary">
                                            Lihat Detail
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                <path d="m9 18 6-6-6-6"></path>
                                            </svg>

                                        </a>
                                        <small class="text-muted">
                                            @if(\Carbon\Carbon::parse($item->start_date)->isPast())
                                                <span class="text-success">Selesai</span>
                                            @elseif(\Carbon\Carbon::parse($item->start_date)->isToday())
                                                <span class="text-warning">Hari Ini</span>
                                            @else
                                                {{ \Carbon\Carbon::parse($item->start_date)->diffForHumans() }}
                                            @endif
                                        </small>
                                        
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="text-center py-5">
                                <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" class="text-muted mb-3">
                                    <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                                    <line x1="16" y1="2" x2="16" y2="6"></line>
                                    <line x1="8" y1="2" x2="8" y2="6"></line>
                                    <line x1="3" y1="10" x2="21" y2="10"></line>
                                </svg>
                                <h4 class="text-muted">Belum ada kegiatan</h4>
                                <p class="text-muted">Kegiatan akademik akan ditampilkan di sini ketika tersedia.</p>
                            </div>
                        @endforelse
                    </div>

                    <!-- Timeline View -->
                    <div id="timeline-view" style="display: none;">
                        <div class="timeline-view">
                            @foreach($kalenderAkademik ?? [] as $item)
                                <div class="timeline-item" data-type="{{ $item->type }}" data-date="{{ $item->start_date }}" data-name="{{ $item->name }}" style="--item-index: {{ $loop->index }}">
                                    <div class="timeline-marker type-{{ $item->type }}"></div>
                                    <div class="timeline-date">{{ \Carbon\Carbon::parse($item->start_date)->format('d M Y') }}</div>
                                    <div class="card calendar-card timeline-card">
                                        <div class="card-body p-0">
                                            <div class="timeline-card-header">
                                                <div class="d-flex align-items-center justify-content-between">
                                                    <span class="event-type type-{{ $item->type }}">{{ ucfirst($item->type) }}</span>
                                                    <span class="timeline-status">
                                                        @if(\Carbon\Carbon::parse($item->start_date)->isPast())
                                                            <span class="status status-sm status-success">Selesai</span>
                                                        @elseif(\Carbon\Carbon::parse($item->start_date)->isToday())
                                                            <span class="status status-sm status-warning">Hari Ini</span>
                                                        @else
                                                            <span class="status status-sm status-info">{{ \Carbon\Carbon::parse($item->start_date)->diffForHumans() }}</span>
                                                        @endif
                                                    </span>
                                                </div>
                                                <h4 class="timeline-title">{{ $item->name }}</h4>
                                                <div class="timeline-date-range text-muted">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                        <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                                                        <line x1="16" y1="2" x2="16" y2="6"></line>
                                                        <line x1="8" y1="2" x2="8" y2="6"></line>
                                                        <line x1="3" y1="10" x2="21" y2="10"></line>
                                                    </svg>
                                                    {{ \Carbon\Carbon::parse($item->start_date)->format('d F Y') }}
                                                    @if($item->ended_date && $item->ended_date != $item->start_date)
                                                        - {{ \Carbon\Carbon::parse($item->ended_date)->format('d F Y') }}
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="timeline-card-body">
                                                <p class="timeline-description">{{ $item->desc }}</p>
                                                <div class="timeline-action">
                                                    <a href="{{ route('root.kalender-akademik-view', $item->code) }}" class="btn btn-primary btn-sm">
                                                        Lihat Detail
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                            <path d="m9 18 6-6-6-6"></path>
                                                        </svg>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Pagination -->
                    @if(isset($kalenderAkademik) && method_exists($kalenderAkademik, 'hasPages') && $kalenderAkademik->hasPages())
                        <div class="d-flex justify-content-center mt-4">
                            {{ $kalenderAkademik->links() }}
                        </div>
                    @endif
                </div>

                <!-- Sidebar -->
                <div class="col-lg-4">
                    <!-- Mini Calendar -->
                    <div class="mini-calendar mb-4">
                        <h5 class="mb-3">{{ date('F Y') }}</h5>
                        <div class="calendar-grid">
                            <div class="calendar-header-day">Min</div>
                            <div class="calendar-header-day">Sen</div>
                            <div class="calendar-header-day">Sel</div>
                            <div class="calendar-header-day">Rab</div>
                            <div class="calendar-header-day">Kam</div>
                            <div class="calendar-header-day">Jum</div>
                            <div class="calendar-header-day">Sab</div>
                            
                            @php
                                $startDate = \Carbon\Carbon::now()->startOfMonth();
                                $endDate = \Carbon\Carbon::now()->endOfMonth();
                                $currentDate = $startDate->copy()->startOfWeek();
                                $eventDates = collect($kalenderAkademik ?? [])->pluck('start_date')->map(function($date) {
                                    return \Carbon\Carbon::parse($date)->format('Y-m-d');
                                })->toArray();
                            @endphp
                            
                            @while($currentDate <= $endDate->endOfWeek())
                                @php
                                    $isCurrentMonth = $currentDate->month == $startDate->month;
                                    $isToday = $currentDate->isToday();
                                    $hasEvent = in_array($currentDate->format('Y-m-d'), $eventDates);
                                @endphp
                                <div class="calendar-day {{ $isToday ? 'today' : '' }} {{ $hasEvent ? 'has-event' : '' }} {{ !$isCurrentMonth ? 'text-muted' : '' }}">
                                    {{ $currentDate->day }}
                                </div>
                                @php $currentDate->addDay(); @endphp
                            @endwhile
                        </div>
                    </div>

                    <!-- Quick Stats -->
                    <div class="mini-calendar mb-4">
                        <h5 class="mb-3">Statistik Kegiatan</h5>
                        <div class="row g-3">
                            <div class="col-6">
                                <div class="text-center">
                                    <div class="fs-2 fw-bold text-primary">{{ collect($kalenderAkademik ?? [])->count() }}</div>
                                    <small class="text-muted">Total Kegiatan</small>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="text-center">
                                    <div class="fs-2 fw-bold text-success">
                                        {{ collect($kalenderAkademik ?? [])->filter(function($item) {
                                            return \Carbon\Carbon::parse($item->start_date)->isCurrentMonth();
                                        })->count() }}
                                    </div>
                                    <small class="text-muted">Bulan Ini</small>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="text-center">
                                    <div class="fs-2 fw-bold text-warning">
                                        {{ collect($kalenderAkademik ?? [])->filter(function($item) {
                                            return \Carbon\Carbon::parse($item->start_date)->isFuture();
                                        })->count() }}
                                    </div>
                                    <small class="text-muted">Mendatang</small>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="text-center">
                                    <div class="fs-2 fw-bold text-info">
                                        {{ collect($kalenderAkademik ?? [])->groupBy('type')->count() }}
                                    </div>
                                    <small class="text-muted">Jenis Kegiatan</small>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Event Types Legend -->
                    <div class="mini-calendar">
                        <h5 class="mb-3">Jenis Kegiatan</h5>
                        <div class="list-group list-group-flush">
                            <div class="list-group-item border-0 px-0 d-flex align-items-center gap-3">
                                <span class="event-type type-ujian">Ujian</span>
                                <span class="text-muted">Ujian dan evaluasi</span>
                            </div>
                            <div class="list-group-item border-0 px-0 d-flex align-items-center gap-3">
                                <span class="event-type type-libur">Libur</span>
                                <span class="text-muted">Hari libur dan cuti</span>
                            </div>
                            <div class="list-group-item border-0 px-0 d-flex align-items-center gap-3">
                                <span class="event-type type-pendaftaran">Pendaftaran</span>
                                <span class="text-muted">Pendaftaran mahasiswa</span>
                            </div>
                            <div class="list-group-item border-0 px-0 d-flex align-items-center gap-3">
                                <span class="event-type type-wisuda">Wisuda</span>
                                <span class="text-muted">Upacara wisuda</span>
                            </div>
                            <div class="list-group-item border-0 px-0 d-flex align-items-center gap-3">
                                <span class="event-type type-orientasi">Orientasi</span>
                                <span class="text-muted">Orientasi mahasiswa</span>
                            </div>
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
            const yearFilter = document.getElementById('yearFilter');
            const monthFilter = document.getElementById('monthFilter');
            const typeFilter = document.getElementById('typeFilter');
            
            function filterEvents() {
                const searchTerm = searchInput.value.toLowerCase();
                const selectedYear = yearFilter.value;
                const selectedMonth = monthFilter.value;
                const selectedType = typeFilter.value;
                
                const events = document.querySelectorAll('.calendar-card');
                
                events.forEach(event => {
                    const name = event.getAttribute('data-name').toLowerCase();
                    const type = event.getAttribute('data-type');
                    const date = new Date(event.getAttribute('data-date'));
                    const year = date.getFullYear().toString();
                    const month = (date.getMonth() + 1).toString();
                    const dateString = date.toLocaleDateString('id-ID').toLowerCase();
                    
                    // Search hanya pada name dan tanggal
                    const matchesSearch = name.includes(searchTerm) || dateString.includes(searchTerm);
                    const matchesYear = !selectedYear || year === selectedYear;
                    const matchesMonth = !selectedMonth || month === selectedMonth;
                    const matchesType = !selectedType || type === selectedType;
                    
                    if (matchesSearch && matchesYear && matchesMonth && matchesType) {
                        event.style.display = 'block';
                        event.closest('.timeline-item')?.style.setProperty('display', 'block');
                    } else {
                        event.style.display = 'none';
                        event.closest('.timeline-item')?.style.setProperty('display', 'none');
                    }
                });
            }
            
            searchInput.addEventListener('input', filterEvents);
            yearFilter.addEventListener('change', filterEvents);
            monthFilter.addEventListener('change', filterEvents);
            typeFilter.addEventListener('change', filterEvents);
            
            // View toggle
            const viewButtons = document.querySelectorAll('.view-toggle button');
            const gridView = document.getElementById('grid-view');
            const timelineView = document.getElementById('timeline-view');
            
            viewButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const view = this.getAttribute('data-view');
                    
                    // Update button states
                    viewButtons.forEach(btn => btn.classList.remove('active'));
                    this.classList.add('active');
                    
                    // Toggle views
                    if (view === 'grid') {
                        gridView.style.display = 'block';
                        timelineView.style.display = 'none';
                    } else {
                        gridView.style.display = 'none';
                        timelineView.style.display = 'block';
                        
                        // Reset animations when switching to timeline view
                        document.querySelectorAll('.timeline-item').forEach((item, index) => {
                            item.style.setProperty('--item-index', index);
                            item.style.animation = 'none';
                            item.offsetHeight; // Force reflow
                            item.style.animation = null;
                        });
                    }
                });
            });
            
            // Calendar day hover effect
            const calendarDays = document.querySelectorAll('.calendar-day');
            calendarDays.forEach(day => {
                day.addEventListener('click', function() {
                    if (this.classList.contains('has-event')) {
                        // Could implement a modal or highlight related events
                        console.log('Day with events clicked:', this.textContent);
                    }
                });
            });
        });
    </script>
@endsection
