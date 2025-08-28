@extends('core-themes.core-backpage')

@section('custom-css')
<style>
    .stats-card {
        background: white;
        border-radius: 12px;
        padding: 1.5rem;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        transition: transform 0.3s ease;
        border-left: 4px solid #3b82f6;
    }

    .stats-card:hover {
        transform: translateY(-2px);
    }

    .stats-number {
        font-size: 2.5rem;
        font-weight: 700;
        color: #3b82f6;
        margin-bottom: 0.5rem;
    }

    .stats-label {
        font-size: 0.875rem;
        color: #64748b;
        font-weight: 500;
    }

    .quick-action-card {
        background: white;
        border-radius: 12px;
        padding: 1.5rem;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        transition: transform 0.3s ease;
        text-align: center;
        border: none;
        cursor: pointer;
    }

    .quick-action-card:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 20px rgba(0,0,0,0.15);
    }

    .action-icon {
        width: 60px;
        height: 60px;
        background: linear-gradient(135deg, #3b82f6, #1e40af);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 1rem;
        color: white;
        font-size: 1.5rem;
    }

    .recent-item {
        background: white;
        border-radius: 8px;
        padding: 1rem;
        margin-bottom: 0.75rem;
        box-shadow: 0 1px 3px rgba(0,0,0,0.1);
        border-left: 3px solid #e5e7eb;
    }

    .recent-item.new {
        border-left-color: #10b981;
    }

    .status-badge {
        padding: 0.25rem 0.75rem;
        border-radius: 20px;
        font-size: 0.75rem;
        font-weight: 600;
    }

    .status-active { background: #dcfce7; color: #166534; }
    .status-inactive { background: #fef3c7; color: #92400e; }
    .status-graduated { background: #ddd6fe; color: #5b21b6; }
    .status-cuti { background: #fecaca; color: #991b1b; }
</style>
@endsection

@section('content')
<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <div class="page-pretitle">
                    {{ $menus }}
                </div>
                <h2 class="page-title">
                    Dashboard Registrasi
                </h2>
            </div>
            <div class="col-auto ms-auto d-print-none">
                <div class="btn-list">
                    <a href="{{ route('master.registrasi.pending-pmb') }}" class="btn btn-primary d-none d-sm-inline-block">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon me-1" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                            <line x1="12" y1="5" x2="12" y2="19"/>
                            <line x1="5" y1="12" x2="19" y2="12"/>
                        </svg>
                        Migrasi PMB
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="page-body">
    <div class="container-xl">
        <!-- Statistics Overview -->
        <div class="row g-3 mb-4">
            <div class="col-md-6 col-xl-3">
                <div class="stats-card">
                    <div class="stats-number">{{ number_format($statistics['total_mahasiswa']) }}</div>
                    <div class="stats-label">Total Mahasiswa</div>
                </div>
            </div>
            <div class="col-md-6 col-xl-3">
                <div class="stats-card">
                    <div class="stats-number">{{ number_format($statistics['mahasiswa_aktif']) }}</div>
                    <div class="stats-label">Mahasiswa Aktif</div>
                </div>
            </div>
            <div class="col-md-6 col-xl-3">
                <div class="stats-card">
                    <div class="stats-number">{{ number_format($statistics['mahasiswa_baru']) }}</div>
                    <div class="stats-label">Mahasiswa Baru {{ date('Y') }}</div>
                </div>
            </div>
            <div class="col-md-6 col-xl-3">
                <div class="stats-card">
                    <div class="stats-number">{{ number_format($statistics['pending_pmb']) }}</div>
                    <div class="stats-label">PMB Siap Migrasi</div>
                </div>
            </div>
        </div>

        <div class="row g-3 mb-4">
            <div class="col-md-6 col-xl-3">
                <div class="stats-card">
                    <div class="stats-number">{{ number_format($statistics['registrasi_hari_ini']) }}</div>
                    <div class="stats-label">Registrasi Hari Ini</div>
                </div>
            </div>
            <div class="col-md-6 col-xl-3">
                <div class="stats-card">
                    <div class="stats-number">{{ number_format($statistics['mahasiswa_cuti']) }}</div>
                    <div class="stats-label">Mahasiswa Cuti</div>
                </div>
            </div>
            <div class="col-md-6 col-xl-3">
                <div class="stats-card">
                    <div class="stats-number">{{ number_format($statistics['mahasiswa_lulus']) }}</div>
                    <div class="stats-label">Mahasiswa Lulus</div>
                </div>
            </div>
            <div class="col-md-6 col-xl-3">
                <div class="stats-card">
                    <div class="stats-number">{{ number_format($statistics['mahasiswa_tidak_aktif']) }}</div>
                    <div class="stats-label">Tidak Aktif</div>
                </div>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="row g-3 mb-4">
            <div class="col-md-6 col-xl-3">
                <a href="{{ route('master.registrasi.pending-pmb') }}" class="quick-action-card text-decoration-none">
                    <div class="action-icon">
                        <i class="fas fa-user-plus"></i>
                    </div>
                    <h4 class="text-dark mb-1">Migrasi PMB</h4>
                    <p class="text-muted mb-0">Proses pendaftar menjadi mahasiswa</p>
                </a>
            </div>
            <div class="col-md-6 col-xl-3">
                <a href="{{ route('master.registrasi.manajemen-mahasiswa') }}" class="quick-action-card text-decoration-none">
                    <div class="action-icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <h4 class="text-dark mb-1">Manajemen Mahasiswa</h4>
                    <p class="text-muted mb-0">Kelola data mahasiswa</p>
                </a>
            </div>
            <div class="col-md-6 col-xl-3">
                <a href="#" class="quick-action-card text-decoration-none" onclick="generateKTMBulk()">
                    <div class="action-icon">
                        <i class="fas fa-id-card"></i>
                    </div>
                    <h4 class="text-dark mb-1">Generate KTM</h4>
                    <p class="text-muted mb-0">Cetak kartu mahasiswa</p>
                </a>
            </div>
            <div class="col-md-6 col-xl-3">
                <a href="#" class="quick-action-card text-decoration-none" onclick="exportReport()">
                    <div class="action-icon">
                        <i class="fas fa-file-excel"></i>
                    </div>
                    <h4 class="text-dark mb-1">Laporan</h4>
                    <p class="text-muted mb-0">Export data registrasi</p>
                </a>
            </div>
        </div>

        <!-- Recent Registrations -->
        <div class="row g-3">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon me-2" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                <path d="M12 12m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0" />
                                <path d="M3 12h1m8 -9v1m8 8h1m-9 8v1m-6.4 -15.4l.7 .7m12.1 -.7l-.7 .7m0 11.4l.7 .7m-12.1 -.7l-.7 .7" />
                            </svg>
                            Registrasi Terbaru
                        </h3>
                        <div class="card-actions">
                            <a href="{{ route('master.registrasi.manajemen-mahasiswa') }}" class="btn btn-outline-primary btn-sm">
                                Lihat Semua
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        @if($recentRegistrations->count() > 0)
                            @foreach($recentRegistrations as $registration)
                            <div class="recent-item {{ $registration->created_at->isToday() ? 'new' : '' }}">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <div class="d-flex align-items-center">
                                            <div class="avatar bg-primary text-white me-3">
                                                {{ substr($registration->name, 0, 1) }}
                                            </div>
                                            <div>
                                                <div class="fw-bold">{{ $registration->name }}</div>
                                                <div class="text-muted small">
                                                    NIM: {{ $registration->nim }} | 
                                                    {{ $registration->programStudi->name ?? 'N/A' }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <div class="text-end">
                                            @switch($registration->type)
                                                @case(1)
                                                    <span class="status-badge status-active">Aktif</span>
                                                    @break
                                                @case(2)
                                                    <span class="status-badge status-inactive">Tidak Aktif</span>
                                                    @break
                                                @case(3)
                                                    <span class="status-badge status-graduated">Lulus</span>
                                                    @break
                                                @case(4)
                                                    <span class="status-badge status-cuti">Cuti</span>
                                                    @break
                                                @default
                                                    <span class="status-badge">{{ $registration->type }}</span>
                                            @endswitch
                                            <div class="text-muted small mt-1">
                                                {{ $registration->created_at->diffForHumans() }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        @else
                            <div class="text-center py-4">
                                <div class="empty-icon mb-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-lg text-muted" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                        <circle cx="12" cy="12" r="9"/>
                                        <path d="M9 12l2 2l4 -4"/>
                                    </svg>
                                </div>
                                <h3 class="text-muted">Belum ada registrasi terbaru</h3>
                                <p class="text-muted">Registrasi mahasiswa baru akan ditampilkan di sini</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('custom-js')
<script>
function generateKTMBulk() {
    Swal.fire({
        title: 'Generate KTM Massal',
        text: 'Apakah Anda ingin generate KTM untuk semua mahasiswa aktif?',
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, Generate!',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            // Implementation for bulk KTM generation
            Swal.fire(
                'Berhasil!',
                'Proses generate KTM telah dimulai. Anda akan mendapat notifikasi setelah selesai.',
                'success'
            );
        }
    });
}

function exportReport() {
    Swal.fire({
        title: 'Export Laporan',
        html: `
            <div class="mb-3">
                <label class="form-label">Format Export:</label>
                <select class="form-select" id="export-format">
                    <option value="excel">Excel (.xlsx)</option>
                    <option value="pdf">PDF</option>
                    <option value="csv">CSV</option>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Periode:</label>
                <select class="form-select" id="export-period">
                    <option value="current">Tahun Akademik Aktif</option>
                    <option value="all">Semua Data</option>
                    <option value="custom">Periode Kustom</option>
                </select>
            </div>
        `,
        showCancelButton: true,
        confirmButtonText: 'Export',
        cancelButtonText: 'Batal',
        preConfirm: () => {
            const format = document.getElementById('export-format').value;
            const period = document.getElementById('export-period').value;
            
            return { format, period };
        }
    }).then((result) => {
        if (result.isConfirmed) {
            const { format, period } = result.value;
            
            // Implementation for report export
            window.location.href = `{{ route('master.registrasi.export') }}?format=${format}&period=${period}`;
        }
    });
}

// Auto refresh statistics every 30 seconds
setInterval(() => {
    // Implementation for auto-refresh statistics
}, 30000);
</script>
@endsection