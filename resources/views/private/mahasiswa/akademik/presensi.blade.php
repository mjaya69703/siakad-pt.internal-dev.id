@extends('core-theme::layouts.app')

@section('title', 'Presensi')

@push('styles')
<style>
    .attendance-card {
        transition: all 0.2s ease-in-out;
        margin-bottom: 1rem;
    }
    .attendance-card:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
    }
    .progress-thin {
        height: 6px;
    }
    .attendance-status {
        font-size: 0.75rem;
        font-weight: 600;
        padding: 0.25rem 0.5rem;
        border-radius: 4px;
    }
    .status-hadir { background-color: #dcfce7; color: #166534; }
    .status-izin { background-color: #dbeafe; color: #1e40af; }
    .status-sakit { background-color: #fef3c7; color: #92400e; }
    .status-alpha { background-color: #fee2e2; color: #991b1b; }
    .status-pending { background-color: #f3f4f6; color: #4b5563; }
    .course-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 0.5rem;
    }
    .course-title {
        font-weight: 600;
        margin: 0;
    }
    .course-code {
        font-size: 0.8125rem;
        color: #6b7280;
        margin-bottom: 0.5rem;
    }
    .lecturer-info {
        font-size: 0.8125rem;
        color: #4b5563;
        margin-bottom: 0.75rem;
    }
    .attendance-stats {
        display: flex;
        gap: 1rem;
        margin-top: 0.75rem;
    }
    .stat-item {
        text-align: center;
    }
    .stat-value {
        font-weight: 700;
        font-size: 1.125rem;
        line-height: 1;
    }
    .stat-label {
        font-size: 0.75rem;
        color: #6b7280;
        margin-top: 0.25rem;
    }
    .no-presence {
        text-align: center;
        padding: 2rem;
        background-color: #f9fafb;
        border-radius: 8px;
        color: #6b7280;
    }
</style>
@endpush

@section('content')
<div class="container-fluid">
    <!-- Page title -->
    <div class="page-header d-print-none">
        <div class="row align-items-center">
            <div class="col">
                <h2 class="page-title">
                    Presensi Perkuliahan
                </h2>
                <div class="text-muted mt-1">
                    Semester {{ $currentSemester->nama }} - {{ $currentSemester->tahun_ajaran }}
                </div>
            </div>
            <div class="col-auto ms-auto d-print-none">
                <div class="btn-list">
                    <a href="#" class="btn btn-outline-primary d-none d-sm-inline-block" onclick="window.print()">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                            <path d="M17 17h2a2 2 0 0 0 2 -2v-4a2 2 0 0 0 -2 -2h-14a2 2 0 0 0 -2 2v4a2 2 0 0 0 2 2h2" />
                            <path d="M17 9v-4a2 2 0 0 0 -2 -2h-6a2 2 0 0 0 -2 2v4" />
                            <rect x="7" y="13" width="10" height="8" rx="2" />
                        </svg>
                        Cetak Presensi
                    </a>
                    <a href="#" class="btn btn-primary d-sm-none btn-icon" onclick="window.print()">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                            <path d="M17 17h2a2 2 0 0 0 2 -2v-4a2 2 0 0 0 -2 -2h-14a2 2 0 0 0 -2 2v4a2 2 0 0 0 2 2h2" />
                            <path d="M17 9v-4a2 2 0 0 0 -2 -2h-6a2 2 0 0 0 -2 2v4" />
                            <rect x="7" y="13" width="10" height="8" rx="2" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            @if(empty($summary) || count($summary) == 0)
                <div class="card">
                    <div class="card-body">
                        <div class="empty">
                            <div class="empty-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                    <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
                                    <path d="M9 10l.01 0" />
                                    <path d="M15 10l.01 0" />
                                    <path d="M9.5 15.25a3.5 3.5 0 0 1 5 0" />
                                </svg>
                            </div>
                            <p class="empty-title">Tidak ada data presensi</p>
                            <p class="empty-subtitle text-muted">
                                Belum ada data presensi untuk semester ini.
                            </p>
                        </div>
                    </div>
                </div>
            @else
                @foreach($summary as $jadwalId => $data)
                    <div class="card attendance-card">
                        <div class="card-body">
                            <div class="course-header">
                                <h3 class="course-title">{{ $data['mata_kuliah'] }}</h3>
                                <span class="badge bg-{{ $data['persentase'] >= 80 ? 'success' : ($data['persentase'] >= 60 ? 'warning' : 'danger') }}">
                                    {{ $data['persentase'] }}%
                                </span>
                            </div>
                            
                            <div class="progress progress-thin mb-3">
                                @php
                                    $progressClass = $data['persentase'] >= 80 ? 'bg-success' : 
                                                   ($data['persentase'] >= 60 ? 'bg-warning' : 'bg-danger');
                                @endphp
                                <div class="progress-bar {{ $progressClass }}" 
                                     role="progressbar" 
                                     style="width: {{ $data['persentase'] }}%" 
                                     aria-valuenow="{{ $data['persentase'] }}" 
                                     aria-valuemin="0" 
                                     aria-valuemax="100">
                                </div>
                            </div>
                            
                            <div class="attendance-stats">
                                <div class="stat-item">
                                    <div class="stat-value text-success">{{ $data['hadir'] }}</div>
                                    <div class="stat-label">Hadir</div>
                                </div>
                                <div class="stat-item">
                                    <div class="stat-value text-primary">{{ $data['izin'] }}</div>
                                    <div class="stat-label">Izin</div>
                                </div>
                                <div class="stat-item">
                                    <div class="stat-value text-warning">{{ $data['sakit'] }}</div>
                                    <div class="stat-label">Sakit</div>
                                </div>
                                <div class="stat-item">
                                    <div class="stat-value text-danger">{{ $data['alpha'] }}</div>
                                    <div class="stat-label">Alpha</div>
                                </div>
                                <div class="stat-item">
                                    <div class="stat-value">{{ $data['total'] }}</div>
                                    <div class="stat-label">Total</div>
                                </div>
                            </div>
                            
                            <div class="d-flex justify-content-end mt-3">
                                <a href="{{ route('mahasiswa.akademik.detail-presensi', ['kode' => $data['kode_mk']]) }}" class="btn btn-sm btn-outline-primary">
                                    Lihat Detail Presensi
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Add tooltips to progress bars
        document.querySelectorAll('.progress').forEach(progress => {
            progress.addEventListener('mousemove', function(e) {
                const rect = this.getBoundingClientRect();
                const x = e.clientX - rect.left;
                const percentage = Math.round((x / rect.width) * 100);
                
                // Show a tooltip with the percentage
                // You can use a library like tippy.js for better tooltips
                this.setAttribute('title', `${percentage}%`);
            });
        });
    });
</script>
@endpush
