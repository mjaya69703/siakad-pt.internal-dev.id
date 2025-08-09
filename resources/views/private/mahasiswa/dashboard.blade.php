@extends('core-themes.core-backpage')

@section('custom-css')
<style>
    .card-hover {
        transition: all 0.3s ease;
    }
    .card-hover:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0,0,0,0.1);
    }
    .status-indicator {
        width: 8px;
        height: 8px;
        border-radius: 50%;
        display: inline-block;
        margin-right: 5px;
    }
    .status-active { background-color: #28a745; }
    .status-pending { background-color: #ffc107; }
    .status-danger { background-color: #dc3545; }
    .progress-ring {
        width: 60px;
        height: 60px;
    }
    .weather-widget {
        background: linear-gradient(135deg, #74b9ff 0%, #0984e3 100%);
        color: white;
    }
    .academic-card {
        background: linear-gradient(135deg, #6c5ce7 0%, #a29bfe 100%);
        color: white;
    }
    .schedule-item {
        border-left: 4px solid #74b9ff;
        padding-left: 15px;
        margin-bottom: 15px;
    }
    .notification-dot {
        position: absolute;
        top: -5px;
        right: -5px;
        width: 10px;
        height: 10px;
        background: #dc3545;
        border-radius: 50%;
    }
</style>
@endsection

@section('content')
<div class="row g-3">
    <!-- Welcome Banner -->
    <div class="col-12">
        <div class="card academic-card">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col">
                        <h2 class="mb-1">Selamat datang, {{ $user->name }}! 👋</h2>
                        <p class="mb-2 opacity-75">{{ $user->numb_nim }} - Semester {{ $user->semester }}</p>
                        <div class="row g-2">
                            <div class="col-auto">
                                <div class="d-flex align-items-center">
                                    <svg class="icon me-1" width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                                        <path d="M12 12m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0" />
                                        <path d="M12 1l3 6l6 3l-6 3l-3 6l-3 -6l-6 -3l6 -3z" />
                                    </svg>
                                    <span class="text-white-75">IPK: <strong>{{ $ipk ?? '0.00' }}</strong></span>
                                </div>
                            </div>
                            <div class="col-auto">
                                <div class="d-flex align-items-center">
                                    <svg class="icon me-1" width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                                        <path d="M9 5h-2a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-12a2 2 0 0 0 -2 -2h-2" />
                                        <path d="M9 3m0 2a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v0a2 2 0 0 1 -2 2h-2a2 2 0 0 1 -2 -2z" />
                                    </svg>
                                    <span class="text-white-75">SKS: <strong>{{ $total_sks_lulus ?? 0 }}/{{ $sks_kebutuhan ?? 144 }}</strong></span>
                                </div>
                            </div>
                            <div class="col-auto">
                                <div class="d-flex align-items-center">
                                    <svg class="icon me-1" width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                                        <path d="M4 7a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12z" />
                                        <path d="M16 3v4" />
                                        <path d="M8 3v4" />
                                        <path d="M4 11h16" />
                                    </svg>
                                    <span class="text-white-75">Status: <strong>{{ $user->type }}</strong></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-auto d-none d-md-block">
                        <div class="avatar avatar-xl" style="background-image: url({{ $user->photo }})"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Stats -->
    <div class="col-lg-3 col-md-6">
        <div class="card card-hover">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="subheader">IPK Semester</div>
                    <div class="ms-auto lh-1">
                        <div class="dropdown">
                            <a class="dropdown-toggle text-secondary" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Semester ini</a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item active" href="#">Semester ini</a>
                                <a class="dropdown-item" href="#">Semester lalu</a>
                                <a class="dropdown-item" href="#">Kumulatif</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="h1 mb-3">{{ $ips ?? '0.00' }}</div>
                <div class="d-flex mb-2">
                    <div>IPS</div>
                    <div class="ms-auto">
                        <span class="text-green d-inline-flex align-items-center lh-1">
                            8% <svg xmlns="http://www.w3.org/2000/svg" class="icon ms-1" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="m3 17l6 -6l4 4l8 -8" /><path d="m14 7l7 0l0 7" /></svg>
                        </span>
                    </div>
                </div>
                <div class="progress progress-sm">
                    <div class="progress-bar bg-primary" style="width: 73.4%" role="progressbar" aria-valuenow="73.4" aria-valuemin="0" aria-valuemax="100">
                        <span class="visually-hidden">73.4% Complete</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-6">
        <div class="card card-hover">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="subheader">SKS Tempuh</div>
                    <div class="ms-auto lh-1">
                        <span class="badge badge-outline text-green">83%</span>
                    </div>
                </div>
                <div class="d-flex align-items-baseline">
                    <div class="h1 mb-3 me-2">{{ $total_sks_lulus ?? 0 }}</div>
                    <div class="me-auto">
                        <span class="text-secondary">/{{ $sks_kebutuhan ?? 144 }} SKS</span>
                    </div>
                </div>
                <div class="progress progress-sm">
                    <div class="progress-bar bg-success" style="width: {{ $progress_sks ?? 0 }}%" role="progressbar" aria-valuenow="{{ $progress_sks ?? 0 }}" aria-valuemin="0" aria-valuemax="100">
                        <span class="visually-hidden">{{ $progress_sks ?? 0 }}% Complete</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-6">
        <div class="card card-hover">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="subheader">Tagihan Aktif</div>
                    <div class="ms-auto">
                        <span class="status-indicator status-pending"></span>
                    </div>
                </div>
                <div class="d-flex align-items-baseline">
                    <div class="h1 mb-0 me-2">Rp</div>
                    <div class="h1 mb-3">{{ number_format(($total_tagihan ?? 2500000)/1000000, 1) }}jt</div>
                </div>
                <div class="text-secondary">
                    <span class="text-orange">{{ count($tagihan_aktif ?? []) }} tagihan</span> belum dibayar
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-6">
        <div class="card card-hover">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="subheader">Kehadiran</div>
                    <div class="ms-auto">
                        <span class="badge badge-outline text-blue">Bulan ini</span>
                    </div>
                </div>
                <div class="d-flex align-items-baseline">
                    <div class="h1 mb-3 me-2">92</div>
                    <div class="me-auto">
                        <span class="text-secondary">%</span>
                    </div>
                </div>
                <div class="text-secondary">
                    <span class="text-green">23 hadir</span> dari 25 pertemuan
                </div>
            </div>
        </div>
    </div>

    <!-- Jadwal Hari Ini -->
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon me-2" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                        <path d="M4 7a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12z" />
                        <path d="M16 3v4" />
                        <path d="M8 3v4" />
                        <path d="M4 11h16" />
                    </svg>
                    Jadwal Kuliah Hari Ini
                </h3>
                <div class="card-actions">
                    <span class="badge bg-blue text-white">{{ now()->format('l, d F Y') }}</span>
                </div>
            </div>
            <div class="card-body">
                <div class="divide-y">
                    @forelse($jadwal_hari_ini ?? [] as $jadwal)
                    <div class="schedule-item">
                        <div class="row align-items-center">
                            <div class="col">
                                <h4 class="mb-1">{{ $jadwal['mata_kuliah'] }}</h4>
                                <div class="text-secondary">
                                    <span class="badge badge-outline me-2">{{ $jadwal['bsks'] }} SKS</span>
                                    {{ $jadwal['ruang'] }} • {{ $jadwal['dosen'] }}
                                </div>
                            </div>
                            <div class="col-auto">
                                <div class="text-end">
                                    <div class="h4 mb-0">{{ $jadwal['time_start'] }} - {{ $jadwal['time_ended'] }}</div>
                                    @php
                                        $now = \Carbon\Carbon::now();
                                        $start = \Carbon\Carbon::createFromTimeString($jadwal['time_start']);
                                        $end = \Carbon\Carbon::createFromTimeString($jadwal['time_ended']);
                                        
                                        if ($now->between($start, $end)) {
                                            $status = 'Sedang Berlangsung';
                                            $badgeColor = 'bg-green';
                                        } elseif ($now->lt($start)) {
                                            $status = 'Akan Datang';
                                            $badgeColor = 'bg-orange';
                                        } else {
                                            $status = 'Selesai';
                                            $badgeColor = 'bg-gray';
                                        }
                                    @endphp
                                    <span class="badge {{ $badgeColor }} text-white">{{ $status }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="text-center py-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-calendar-off mb-2" width="48" height="48" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                            <path d="M9 5h9a2 2 0 0 1 2 2v9m-.184 3.839a2 2 0 0 1 -1.816 1.161h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2h1" />
                            <path d="M16 3v4" />
                            <path d="M8 3v1" />
                            <path d="M4 11h7m4 0h5" />
                            <path d="M3 3l18 18" />
                        </svg>
                        <h4 class="text-muted">Tidak ada jadwal hari ini</h4>
                        <p class="text-muted">Hari ini tidak ada jadwal kuliah untuk Anda</p>
                    </div>
                    @endforelse
                </div>
                <div class="mt-3">
                    <a href="#" class="btn btn-outline-primary w-100">
                        Lihat Jadwal Lengkap
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon ms-1" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                            <path d="M9 6l6 6l-6 6" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Actions & Notifications -->
    <div class="col-lg-4">
        <div class="row g-3">
            <!-- Quick Actions -->
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon me-2" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                <path d="M9 5h-2a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-12a2 2 0 0 0 -2 -2h-2" />
                                <path d="M9 3m0 2a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v0a2 2 0 0 1 -2 2h-2a2 2 0 0 1 -2 -2z" />
                                <path d="M9 12l2 2l4 -4" />
                            </svg>
                            Aksi Cepat
                        </h3>
                    </div>
                    <div class="card-body p-2">
                        <div class="row g-2">
                            <div class="col-6">
                                <a href="#" class="btn btn-outline-primary w-100 d-flex flex-column align-items-center py-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon mb-2" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                        <path d="M9 5h-2a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-12a2 2 0 0 0 -2 -2h-2" />
                                        <path d="M9 3m0 2a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v0a2 2 0 0 1 -2 2h-2a2 2 0 0 1 -2 -2z" />
                                        <path d="M9 12l2 2l4 -4" />
                                    </svg>
                                    <small>KRS</small>
                                </a>
                            </div>
                            <div class="col-6">
                                <a href="#" class="btn btn-outline-success w-100 d-flex flex-column align-items-center py-3 position-relative">
                                    <div class="notification-dot"></div>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon mb-2" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                        <path d="M17 8v-3a1 1 0 0 0 -1 -1h-10a2 2 0 0 0 0 4h12a1 1 0 0 1 1 1v3m0 4v3a1 1 0 0 1 -1 1h-12a2 2 0 0 1 -2 -2v-12" />
                                        <path d="M20 12v4h-4a2 2 0 0 1 0 -4h4" />
                                    </svg>
                                    <small>Pembayaran</small>
                                </a>
                            </div>
                            <div class="col-6">
                                <a href="#" class="btn btn-outline-info w-100 d-flex flex-column align-items-center py-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon mb-2" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                        <path d="M9 11a3 3 0 1 0 6 0a3 3 0 0 0 -6 0" />
                                        <path d="M17.657 16.657l-4.243 4.243a2 2 0 0 1 -2.827 0l-4.244 -4.243a8 8 0 1 1 11.314 0z" />
                                    </svg>
                                    <small>Absensi</small>
                                </a>
                            </div>
                            <div class="col-6">
                                <a href="#" class="btn btn-outline-warning w-100 d-flex flex-column align-items-center py-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon mb-2" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                        <path d="M14 3v4a1 1 0 0 0 1 1h4" />
                                        <path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z" />
                                        <path d="M9 17h6" />
                                        <path d="M9 13h6" />
                                    </svg>
                                    <small>Transkrip</small>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pengumuman -->
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon me-2" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                <path d="M10 5a2 2 0 1 1 4 0a7 7 0 0 1 4 6v3a4 4 0 0 0 2 3h-16a4 4 0 0 0 2 -3v-3a7 7 0 0 1 4 -6" />
                                <path d="M9 17v1a3 3 0 0 0 6 0v-1" />
                            </svg>
                            Pengumuman Terbaru
                        </h3>
                        <div class="card-actions">
                            <span class="badge bg-red text-white">3 Baru</span>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <div class="list-group list-group-flush">
                            @forelse($pengumuman ?? [] as $announce)
                            <div class="list-group-item">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <span class="status-dot status-danger"></span>
                                    </div>
                                    <div class="col text-truncate">
                                        <strong>{{ $announce['name'] ?? 'Pengumuman' }}</strong>
                                        <div class="text-secondary">{{ \Illuminate\Support\Str::limit(strip_tags($announce['content'] ?? ''), 60) }}</div>
                                        <small class="text-muted">{{ \Carbon\Carbon::parse($announce['created_at'])->diffForHumans() }}</small>
                                    </div>
                                </div>
                            </div>
                            @empty
                            <div class="list-group-item text-center py-4">
                                <div class="text-muted">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-bell-off mb-2" width="48" height="48" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                        <path d="M9.346 5.353c.21 -.129 .428 -.246 .654 -.353a2 2 0 1 1 4 0a7 7 0 0 1 4 6v3c0 .327 .013 .653 .04 .977m.96 2.023a4 4 0 0 0 2 3h-16a4 4 0 0 0 2 -3v-3a7 7 0 0 1 .643 -2.775" />
                                        <path d="M9 17v1a3 3 0 0 0 6 0v-1" />
                                        <path d="M3 3l18 18" />
                                    </svg>
                                    <h5>Tidak ada pengumuman</h5>
                                    <p class="mb-0">Belum ada pengumuman terbaru</p>
                                </div>
                            </div>
                            @endforelse
                        </div>
                        <div class="card-footer">
                            <a href="#" class="btn btn-outline-primary btn-sm w-100">Lihat Semua Pengumuman</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Tagihan & Progress -->
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon me-2" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                        <path d="M17 8v-3a1 1 0 0 0 -1 -1h-10a2 2 0 0 0 0 4h12a1 1 0 0 1 1 1v3m0 4v3a1 1 0 0 1 -1 1h-12a2 2 0 0 1 -2 -2v-12" />
                        <path d="M20 12v4h-4a2 2 0 0 1 0 -4h4" />
                    </svg>
                    Tagihan Keuangan
                </h3>
                <div class="card-actions">
                    <a href="#" class="btn btn-primary btn-sm">Bayar Sekarang</a>
                </div>
            </div>
            <div class="card-body">
                <div class="divide-y">
                    @forelse($tagihan_aktif ?? [] as $tagihan)
                    <div class="row mb-3">
                        <div class="col">
                            <div class="d-flex align-items-center">
                                <span class="status-indicator status-pending me-2"></span>
                                <div>
                                    <strong>{{ $tagihan['desc'] ?? 'UKT Semester' }}</strong>
                                    <div class="text-secondary">Jatuh tempo: {{ \Carbon\Carbon::parse($tagihan['due_date'])->format('d F Y') }}</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <div class="text-end">
                                <div class="h4 mb-0 text-orange">Rp {{ number_format($tagihan['amount'], 0, ',', '.') }}</div>
                                <span class="badge bg-orange text-white">Belum Dibayar</span>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="text-center py-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-wallet mb-2" width="48" height="48" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                            <path d="M17 8v-3a1 1 0 0 0 -1 -1h-10a2 2 0 0 0 0 4h12a1 1 0 0 1 1 1v3m0 4v3a1 1 0 0 1 -1 1h-12a2 2 0 0 1 -2 -2v-12" />
                            <path d="M20 12v4h-4a2 2 0 0 1 0 -4h4" />
                        </svg>
                        <h5 class="text-success">Tidak ada tagihan aktif</h5>
                        <p class="text-muted mb-0">Semua tagihan sudah lunas</p>
                    </div>
                    @endforelse
                    
                    @if($riwayat_pembayaran && count($riwayat_pembayaran) > 0)
                    <div class="row pt-3">
                        <div class="col">
                            <div class="d-flex align-items-center">
                                <span class="status-indicator status-active me-2"></span>
                                <div>
                                    <strong>{{ $riwayat_pembayaran[0]['desc'] ?? 'Pembayaran Terakhir' }}</strong>
                                    <div class="text-secondary">Dibayar: {{ \Carbon\Carbon::parse($riwayat_pembayaran[0]['updated_at'])->format('d F Y') }}</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <div class="text-end">
                                <div class="h4 mb-0 text-success">Rp {{ number_format($riwayat_pembayaran[0]['amount'], 0, ',', '.') }}</div>
                                <span class="badge bg-success text-white">Lunas</span>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
                <div class="mt-3">
                    <div class="row g-2">
                        <div class="col">
                            <a href="#" class="btn btn-outline-success w-100 btn-sm">Riwayat Pembayaran</a>
                        </div>
                        <div class="col">
                            <a href="#" class="btn btn-outline-primary w-100 btn-sm">Virtual Account</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Progress Studi -->
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon me-2" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                        <path d="M22 9l-10 -4l-10 4l10 4l10 -4v6" />
                        <path d="M6 10.6v5.4a6 3 0 0 0 12 0v-5.4" />
                    </svg>
                    Progress Studi
                </h3>
                <div class="card-actions">
                    <span class="badge bg-blue text-white">Semester 7</span>
                </div>
            </div>
            <div class="card-body">
                <div class="row g-3">
                    <div class="col-6">
                        <div class="text-center">
                            <div class="h1 mb-1">{{ $progress_sks ?? 83 }}%</div>
                            <div class="text-secondary">SKS Selesai</div>
                            <div class="progress progress-sm mt-2">
                                <div class="progress-bar bg-primary" style="width: {{ $progress_sks ?? 83 }}%" role="progressbar"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="text-center">
                            <div class="h1 mb-1">{{ $ipk ?? '3.45' }}</div>
                            <div class="text-secondary">IPK Kumulatif</div>
                            <div class="mt-2">
                                @php
                                    $ipk_val = floatval($ipk ?? 3.45);
                                    if ($ipk_val >= 3.5) {
                                        $predikat = 'Cum Laude';
                                        $color = 'success';
                                    } elseif ($ipk_val >= 3.0) {
                                        $predikat = 'Sangat Baik';
                                        $color = 'primary';
                                    } elseif ($ipk_val >= 2.5) {
                                        $predikat = 'Baik';
                                        $color = 'info';
                                    } else {
                                        $predikat = 'Cukup';
                                        $color = 'warning';
                                    }
                                @endphp
                                <span class="badge bg-{{ $color }}">{{ $predikat }}</span>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row g-2 text-center">
                    <div class="col-4">
                        <div class="text-secondary">Semester</div>
                        <div class="h4">{{ $user->semester ?? 7 }}/8</div>
                    </div>
                    <div class="col-4">
                        <div class="text-secondary">SKS</div>
                        <div class="h4">{{ $total_sks_lulus ?? 120 }}/{{ $sks_kebutuhan ?? 144 }}</div>
                    </div>
                    <div class="col-4">
                        <div class="text-secondary">Sisa</div>
                        <div class="h4">{{ ($sks_kebutuhan ?? 144) - ($total_sks_lulus ?? 120) }} SKS</div>
                    </div>
                </div>
                <div class="mt-3">
                    <a href="#" class="btn btn-outline-info w-100 btn-sm">Lihat Transkrip Lengkap</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Aktivitas Terbaru -->
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon me-2" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                        <path d="M4 7a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12z" />
                        <path d="M16 3v4" />
                        <path d="M8 3v4" />
                        <path d="M4 11h16" />
                        <path d="M8 15h2v2h-2z" />
                    </svg>
                    Aktivitas Akademik Terbaru
                </h3>
                <div class="card-actions">
                    <a href="#" class="btn btn-outline-primary btn-sm">Lihat Semua</a>
                </div>
            </div>
            <div class="card-body">
                <div class="timeline">
                    @forelse($aktivitas_terbaru ?? [] as $aktivitas)
                    <div class="timeline-item">
                        <div class="timeline-marker timeline-marker-{{ $aktivitas['badge_color'] ?? 'primary' }}"></div>
                        <div class="timeline-content">
                            <div class="d-flex justify-content-between align-items-start">
                                <div>
                                    <h4 class="timeline-title">{{ $aktivitas['title'] }}</h4>
                                    <p class="text-secondary mb-1">{{ $aktivitas['description'] }}</p>
                                    <small class="text-muted">{{ \Carbon\Carbon::parse($aktivitas['time'])->diffForHumans() }}</small>
                                </div>
                                <span class="badge bg-{{ $aktivitas['badge_color'] ?? 'primary' }}">{{ $aktivitas['badge'] }}</span>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="text-center py-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-activity mb-2" width="48" height="48" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                            <path d="M3 12h4l3 8l4 -16l3 8h4" />
                        </svg>
                        <h5 class="text-muted">Tidak ada aktivitas</h5>
                        <p class="text-muted mb-0">Belum ada aktivitas akademik terbaru</p>
                    </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('custom-js')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Auto refresh data setiap 5 menit
    setInterval(function() {
        // Refresh hanya data yang diperlukan
        console.log('Refreshing dashboard data...');
    }, 300000);

    // Animasi progress bars
    const progressBars = document.querySelectorAll('.progress-bar');
    progressBars.forEach(bar => {
        const width = bar.style.width;
        bar.style.width = '0';
        setTimeout(() => {
            bar.style.width = width;
        }, 500);
    });

    // Notification click handler
    document.querySelectorAll('.list-group-item').forEach(item => {
        item.addEventListener('click', function() {
            this.style.backgroundColor = '#f8f9fa';
        });
    });
});

// Real time clock
function updateClock() {
    const now = new Date();
    const options = { 
        weekday: 'long', 
        year: 'numeric', 
        month: 'long', 
        day: 'numeric',
        hour: '2-digit',
        minute: '2-digit'
    };
    document.querySelector('.badge.bg-blue').textContent = now.toLocaleDateString('id-ID', options);
}

setInterval(updateClock, 1000);
</script>
@endsection
