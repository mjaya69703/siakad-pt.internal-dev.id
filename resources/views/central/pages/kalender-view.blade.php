@extends('core-themes.core-mainpage')

@section('custom-css')
    <style>
        .event-header {
            background: linear-gradient(135deg, rgba(var(--tblr-success-rgb), 0.8), rgba(var(--tblr-primary-rgb), 0.9));
            color: white;
            padding: 3rem 0;
            margin-bottom: 3rem;
            position: relative;
            overflow: hidden;
        }

        .event-header::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="calendar-pattern" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse"><rect width="20" height="20" fill="none" stroke="rgba(255,255,255,0.1)" stroke-width="0.5"/></pattern></defs><rect width="100%" height="100%" fill="url(%23calendar-pattern)"/></svg>');
            animation: float 20s ease-in-out infinite;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
        }

        .event-content {
            background: var(--tblr-card-bg);
            border-radius: 1rem;
            padding: 2rem;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            margin-bottom: 2rem;
            position: relative;
        }

        .event-meta {
            background: var(--tblr-bg-surface-secondary);
            border-radius: 1rem;
            padding: 2rem;
            margin-bottom: 2rem;
        }

        .meta-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1.5rem;
        }

        .meta-item {
            display: flex;
            align-items: flex-start;
            gap: 1rem;
        }

        .meta-icon {
            width: 48px;
            height: 48px;
            background: var(--tblr-primary);
            border-radius: 0.75rem;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            flex-shrink: 0;
        }

        .event-type-badge {
            display: inline-block;
            padding: 0.5rem 1.5rem;
            border-radius: 2rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            font-size: 0.875rem;
        }

        .type-ujian .meta-icon {
            background: var(--tblr-danger);
        }
        .type-ujian .event-type-badge {
            background: rgba(var(--tblr-danger-rgb), 0.1);
            color: var(--tblr-danger);
        }

        .type-libur .meta-icon {
            background: var(--tblr-success);
        }
        .type-libur .event-type-badge {
            background: rgba(var(--tblr-success-rgb), 0.1);
            color: var(--tblr-success);
        }

        .type-pendaftaran .meta-icon {
            background: var(--tblr-info);
        }
        .type-pendaftaran .event-type-badge {
            background: rgba(var(--tblr-info-rgb), 0.1);
            color: var(--tblr-info);
        }

        .type-wisuda .meta-icon {
            background: var(--tblr-warning);
        }
        .type-wisuda .event-type-badge {
            background: rgba(var(--tblr-warning-rgb), 0.1);
            color: var(--tblr-warning);
        }

        .type-orientasi .meta-icon {
            background: var(--tblr-purple);
        }
        .type-orientasi .event-type-badge {
            background: rgba(var(--tblr-purple-rgb), 0.1);
            color: var(--tblr-purple);
        }

        .countdown-card {
            background: linear-gradient(135deg, var(--tblr-primary), var(--tblr-info));
            color: white;
            border-radius: 1rem;
            padding: 2rem;
            text-align: center;
            margin-bottom: 2rem;
        }

        .countdown-timer {
            display: flex;
            justify-content: center;
            gap: 1rem;
            margin-top: 1rem;
        }

        .countdown-item {
            background: rgba(255, 255, 255, 0.2);
            border-radius: 0.75rem;
            padding: 1rem;
            min-width: 80px;
        }

        .countdown-number {
            font-size: 2rem;
            font-weight: bold;
            display: block;
        }

        .countdown-label {
            font-size: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }

        .timeline-card {
            background: var(--tblr-card-bg);
            border-radius: 1rem;
            padding: 1.5rem;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
            position: relative;
        }

        .related-events {
            background: var(--tblr-card-bg);
            border-radius: 1rem;
            padding: 1.5rem;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
        }

        .related-item {
            border-bottom: 1px solid var(--tblr-border-color);
            padding: 1rem 0;
            transition: all 0.2s ease;
        }

        .related-item:last-child {
            border-bottom: none;
        }

        .related-item:hover {
            background: var(--tblr-bg-surface-secondary);
            margin: 0 -1rem;
            padding: 1rem;
            border-radius: 0.5rem;
        }

        .action-buttons {
            position: sticky;
            top: 2rem;
            z-index: 100;
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

        .status-indicator {
            position: absolute;
            top: 1rem;
            right: 1rem;
            padding: 0.5rem 1rem;
            border-radius: 2rem;
            font-weight: 600;
            font-size: 0.875rem;
            text-transform: uppercase;
        }

        .status-upcoming {
            background: rgba(var(--tblr-info-rgb), 0.1);
            color: var(--tblr-info);
        }

        .status-ongoing {
            background: rgba(var(--tblr-warning-rgb), 0.1);
            color: var(--tblr-warning);
        }

        .status-completed {
            background: rgba(var(--tblr-success-rgb), 0.1);
            color: var(--tblr-success);
        }

        @media (max-width: 768px) {
            .back-button {
                display: none;
            }
            
            .event-header {
                padding: 2rem 0;
            }
            
            .event-content, .event-meta {
                padding: 1.5rem;
            }
            
            .meta-grid {
                grid-template-columns: 1fr;
            }
            
            .countdown-timer {
                flex-wrap: wrap;
                gap: 0.5rem;
            }
            
            .countdown-item {
                min-width: 70px;
                padding: 0.75rem;
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

    @if(isset($kalenderAkademik))
        @php
            $startDate = \Carbon\Carbon::parse($kalenderAkademik->start_date);
            $endDate = $kalenderAkademik->ended_date ? \Carbon\Carbon::parse($kalenderAkademik->ended_date) : $startDate;
            $now = \Carbon\Carbon::now();
            
            if ($now->lt($startDate)) {
                $status = 'upcoming';
                $statusText = 'Akan Datang';
            } elseif ($now->between($startDate, $endDate)) {
                $status = 'ongoing';
                $statusText = 'Sedang Berlangsung';
            } else {
                $status = 'completed';
                $statusText = 'Selesai';
            }
        @endphp

        <!-- Header -->
        <header class="event-header type-{{ $kalenderAkademik->type }}">
            <div class="status-indicator status-{{ $status }}">{{ $statusText }}</div>
            <div class="container position-relative">
                <nav aria-label="breadcrumb" class="mb-3">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/" class="text-white-50">Beranda</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('root.kalender-akademik-index') }}" class="text-white-50">Kalender Akademik</a></li>
                        <li class="breadcrumb-item active text-white" aria-current="page">Detail</li>
                    </ol>
                </nav>
                
                <div class="row align-items-center">
                    <div class="col-lg-8">
                        <span class="event-type-badge type-{{ $kalenderAkademik->type }} mb-3">
                            {{ ucfirst($kalenderAkademik->type) }}
                        </span>
                        <h1 class="display-5 fw-bold mb-3">{{ $kalenderAkademik->name }}</h1>
                        <p class="fs-5 mb-3 opacity-75">{{ $kalenderAkademik->desc }}</p>
                        <div class="d-flex flex-wrap gap-3 text-white-50">
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                                    <line x1="16" y1="2" x2="16" y2="6"></line>
                                    <line x1="8" y1="2" x2="8" y2="6"></line>
                                    <line x1="3" y1="10" x2="21" y2="10"></line>
                                </svg>
                                {{ $startDate->format('d F Y') }}
                                @if($kalenderAkademik->ended_date && $kalenderAkademik->ended_date != $kalenderAkademik->start_date)
                                    - {{ $endDate->format('d F Y') }}
                                @endif
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
                                Diperbarui {{ \Carbon\Carbon::parse($kalenderAkademik->updated_at)->diffForHumans() }}
                            </span>
                        </div>
                    </div>
                    <div class="col-lg-4 text-lg-end mt-3 mt-lg-0">
                        <span class="badge bg-success-lt fs-6 px-3 py-2">{{ ucfirst($kalenderAkademik->status) }}</span>
                    </div>
                </div>
            </div>
        </header>

        <!-- Content -->
        <section class="pb-6">
            <div class="container">
                <div class="row g-4">
                    <div class="col-lg-8">
                        <!-- Countdown Timer (Only for upcoming events) -->
                        @if($status === 'upcoming')
                            <div class="countdown-card">
                                <h4 class="mb-0">Waktu Tersisa</h4>
                                <div class="countdown-timer" id="countdown-timer" data-target="{{ $startDate->toISOString() }}">
                                    <div class="countdown-item">
                                        <span class="countdown-number" id="days">0</span>
                                        <span class="countdown-label">Hari</span>
                                    </div>
                                    <div class="countdown-item">
                                        <span class="countdown-number" id="hours">0</span>
                                        <span class="countdown-label">Jam</span>
                                    </div>
                                    <div class="countdown-item">
                                        <span class="countdown-number" id="minutes">0</span>
                                        <span class="countdown-label">Menit</span>
                                    </div>
                                    <div class="countdown-item">
                                        <span class="countdown-number" id="seconds">0</span>
                                        <span class="countdown-label">Detik</span>
                                    </div>
                                </div>
                            </div>
                        @endif

                        <!-- Event Meta Information -->
                        <div class="event-meta type-{{ $kalenderAkademik->type }}">
                            <h5 class="mb-4">Informasi Detail</h5>
                            <div class="meta-grid">
                                <div class="meta-item">
                                    <div class="meta-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                            <path d="M8 2v4"></path>
                                            <path d="M16 2v4"></path>
                                            <rect width="18" height="18" x="3" y="4" rx="2"></rect>
                                            <path d="M3 10h18"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <small class="text-muted d-block">Tanggal Mulai</small>
                                        <strong>{{ $startDate->format('d F Y') }}</strong>
                                        <small class="text-muted d-block">{{ $startDate->format('l') }}</small>
                                    </div>
                                </div>

                                @if($kalenderAkademik->ended_date && $kalenderAkademik->ended_date != $kalenderAkademik->start_date)
                                    <div class="meta-item">
                                        <div class="meta-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                <path d="M8 2v4"></path>
                                                <path d="M16 2v4"></path>
                                                <rect width="18" height="18" x="3" y="4" rx="2"></rect>
                                                <path d="M3 10h18"></path>
                                                <path d="M8 14h.01"></path>
                                                <path d="M12 14h.01"></path>
                                                <path d="M16 14h.01"></path>
                                                <path d="M8 18h.01"></path>
                                                <path d="M12 18h.01"></path>
                                                <path d="M16 18h.01"></path>
                                            </svg>
                                        </div>
                                        <div>
                                            <small class="text-muted d-block">Tanggal Selesai</small>
                                            <strong>{{ $endDate->format('d F Y') }}</strong>
                                            <small class="text-muted d-block">{{ $endDate->format('l') }}</small>
                                        </div>
                                    </div>
                                @endif

                                <div class="meta-item">
                                    <div class="meta-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                            <circle cx="12" cy="12" r="10"></circle>
                                            <path d="M12 6v6l4 2"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <small class="text-muted d-block">Durasi</small>
                                        <strong>
                                            @if($kalenderAkademik->ended_date && $kalenderAkademik->ended_date != $kalenderAkademik->start_date)
                                                {{ $startDate->diffInDays($endDate) + 1 }} hari
                                            @else
                                                1 hari
                                            @endif
                                        </strong>
                                        <small class="text-muted d-block">
                                            {{ $startDate->diffForHumans($now) }}
                                        </small>
                                    </div>
                                </div>

                                <div class="meta-item">
                                    <div class="meta-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                            <path d="M4 15s1-1 4-1 5 2 8 2 4-1 4-1V3s-1 1-4 1-5-2-8-2-4 1-4 1z"></path>
                                            <line x1="4" y1="22" x2="4" y2="15"></line>
                                        </svg>
                                    </div>
                                    <div>
                                        <small class="text-muted d-block">Jenis Kegiatan</small>
                                        <strong>{{ ucfirst($kalenderAkademik->type) }}</strong>
                                        <small class="text-muted d-block">Kegiatan {{ strtolower($kalenderAkademik->type) }}</small>
                                    </div>
                                </div>

                                <div class="meta-item">
                                    <div class="meta-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                            <circle cx="12" cy="12" r="3"></circle>
                                            <circle cx="12" cy="1" r="1"></circle>
                                            <circle cx="12" cy="23" r="1"></circle>
                                            <circle cx="20.2" cy="7.8" r="1"></circle>
                                            <circle cx="3.8" cy="16.2" r="1"></circle>
                                            <circle cx="23" cy="12" r="1"></circle>
                                            <circle cx="1" cy="12" r="1"></circle>
                                            <circle cx="20.2" cy="16.2" r="1"></circle>
                                            <circle cx="3.8" cy="7.8" r="1"></circle>
                                        </svg>
                                    </div>
                                    <div>
                                        <small class="text-muted d-block">Status</small>
                                        <strong class="text-{{ $status === 'upcoming' ? 'info' : ($status === 'ongoing' ? 'warning' : 'success') }}">
                                            {{ $statusText }}
                                        </strong>
                                        <small class="text-muted d-block">{{ ucfirst($kalenderAkademik->status) }}</small>
                                    </div>
                                </div>

                                <div class="meta-item">
                                    <div class="meta-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                            <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"></path>
                                            <circle cx="9" cy="7" r="4"></circle>
                                            <path d="m22 21-3-3"></path>
                                            <circle cx="19" cy="11" r="2"></circle>
                                        </svg>
                                    </div>
                                    <div>
                                        <small class="text-muted d-block">Dibuat Oleh</small>
                                        <strong>{{ $kalenderAkademik->user->name ?? 'Admin' }}</strong>
                                        <small class="text-muted d-block">{{ \Carbon\Carbon::parse($kalenderAkademik->created_at)->format('d M Y') }}</small>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Event Description -->
                        @if($kalenderAkademik->content)
                            <div class="event-content">
                                <h5 class="mb-3">Deskripsi Lengkap</h5>
                                <div class="content-body">
                                    {!! $kalenderAkademik->content !!}
                                </div>
                            </div>
                        @endif

                        <!-- Additional Information -->
                        <div class="event-content">
                            <h5 class="mb-3">Informasi Tambahan</h5>
                            <div class="row g-4">
                                <div class="col-md-6">
                                    <div class="d-flex align-items-center gap-3 p-3 bg-light rounded">
                                        <div class="avatar bg-primary text-white">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                <circle cx="12" cy="12" r="10"></circle>
                                                <path d="m9 12 2 2 4-4"></path>
                                            </svg>
                                        </div>
                                        <div>
                                            <div class="fw-semibold">Status Publikasi</div>
                                            <small class="text-muted">{{ ucfirst($kalenderAkademik->status) }}</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="d-flex align-items-center gap-3 p-3 bg-light rounded">
                                        <div class="avatar bg-success text-white">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                <path d="M12 2v20M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path>
                                            </svg>
                                        </div>
                                        <div>
                                            <div class="fw-semibold">Kategori</div>
                                            <small class="text-muted">Kalender Akademik</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Sidebar -->
                    <div class="col-lg-4">
                        <div class="action-buttons">
                            <!-- Quick Actions -->
                            <div class="timeline-card mb-4">
                                <h5 class="mb-3">Aksi Cepat</h5>
                                <div class="d-grid gap-2">
                                    <a href="{{ route('root.kalender-akademik-index') }}" class="btn btn-outline-primary">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                            <path d="m12 19-7-7 7-7"></path>
                                            <path d="m19 12H5"></path>
                                        </svg>
                                        Semua Kalender
                                    </a>
                                    <button class="btn btn-outline-secondary" onclick="window.print()">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                            <polyline points="6,9 6,2 18,2 18,9"></polyline>
                                            <path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"></path>
                                            <rect width="12" height="8" x="6" y="14"></rect>
                                        </svg>
                                        Cetak
                                    </button>
                                    <button class="btn btn-outline-info" onclick="shareEvent()">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                            <path d="M4 12v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-8"></path>
                                            <polyline points="16,6 12,2 8,6"></polyline>
                                            <line x1="12" y1="2" x2="12" y2="15"></line>
                                        </svg>
                                        Bagikan
                                    </button>
                                </div>
                            </div>

                            @if(isset($relatedEvents) && $relatedEvents->count() > 0)
                                <!-- Related Events -->
                                <div class="related-events">
                                    <h5 class="mb-3">Kegiatan Terkait</h5>
                                    @foreach($relatedEvents as $related)
                                        <div class="related-item">
                                            <span class="badge bg-{{ $related->type == 'ujian' ? 'danger' : ($related->type == 'libur' ? 'success' : 'info') }}-lt mb-2">
                                                {{ ucfirst($related->type) }}
                                            </span>
                                            <h6 class="mb-2">
                                                <a href="{{ route('root.kalender-akademik-view', $related->id) }}" class="text-decoration-none">
                                                    {{ Str::limit($related->name, 50) }}
                                                </a>
                                            </h6>
                                            <small class="text-muted">
                                                {{ \Carbon\Carbon::parse($related->start_date)->format('d M Y') }}
                                            </small>
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @else
        <!-- Not Found -->
        <section class="py-6">
            <div class="container">
                <div class="text-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" class="text-muted mb-3">
                        <circle cx="12" cy="12" r="10"></circle>
                        <line x1="15" y1="9" x2="9" y2="15"></line>
                        <line x1="9" y1="9" x2="15" y2="15"></line>
                    </svg>
                    <h4 class="text-muted">Kegiatan Tidak Ditemukan</h4>
                    <p class="text-muted">Kegiatan yang Anda cari tidak tersedia atau telah dihapus.</p>
                    <a href="{{ route('root.kalender-akademik-index') }}" class="btn btn-primary">Kembali ke Kalender Akademik</a>
                </div>
            </div>
        </section>
    @endif
@endsection

@section('custom-js')
    <script>
        // Countdown Timer
        function updateCountdown() {
            const countdownElement = document.getElementById('countdown-timer');
            if (!countdownElement) return;
            
            const targetDate = new Date(countdownElement.getAttribute('data-target'));
            const now = new Date();
            const diff = targetDate - now;
            
            if (diff > 0) {
                const days = Math.floor(diff / (1000 * 60 * 60 * 24));
                const hours = Math.floor((diff % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                const minutes = Math.floor((diff % (1000 * 60 * 60)) / (1000 * 60));
                const seconds = Math.floor((diff % (1000 * 60)) / 1000);
                
                document.getElementById('days').textContent = days;
                document.getElementById('hours').textContent = hours;
                document.getElementById('minutes').textContent = minutes;
                document.getElementById('seconds').textContent = seconds;
            } else {
                // Event has started, hide countdown
                countdownElement.closest('.countdown-card').style.display = 'none';
            }
        }
        
        // Update countdown every second
        if (document.getElementById('countdown-timer')) {
            updateCountdown();
            setInterval(updateCountdown, 1000);
        }
        
        // Share Event Function
        function shareEvent() {
            if (navigator.share) {
                navigator.share({
                    title: document.title,
                    text: 'Lihat kegiatan akademik ini',
                    url: window.location.href
                }).catch(console.error);
            } else {
                // Fallback to copy URL
                navigator.clipboard.writeText(window.location.href).then(function() {
                    // Show success message
                    const button = event.target.closest('button');
                    const originalText = button.innerHTML;
                    button.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16"><path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z"/></svg> Link Tersalin!';
                    button.classList.remove('btn-outline-info');
                    button.classList.add('btn-success');
                    
                    setTimeout(() => {
                        button.innerHTML = originalText;
                        button.classList.remove('btn-success');
                        button.classList.add('btn-outline-info');
                    }, 2000);
                }, function(err) {
                    console.error('Could not copy text: ', err);
                    alert('Gagal menyalin link. Silakan salin URL secara manual.');
                });
            }
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
