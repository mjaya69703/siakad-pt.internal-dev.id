@extends('core-themes.core-backpage')

@section('custom-css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
<style>
    .dashboard-header {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        border-radius: 15px;
        padding: 2rem;
        margin-bottom: 2rem;
    }
    
    .metric-card {
        background: white;
        border-radius: 15px;
        padding: 1.5rem;
        box-shadow: 0 5px 15px rgba(0,0,0,0.08);
        border: none;
        transition: transform 0.3s ease;
        height: 100%;
    }
    
    .metric-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0,0,0,0.15);
    }
    
    .metric-number {
        font-size: 2.5rem;
        font-weight: 700;
        color: #2d3748;
        margin: 0;
    }
    
    .metric-label {
        color: #718096;
        font-weight: 500;
        margin: 0.5rem 0;
    }
    
    .growth-indicator {
        padding: 0.25rem 0.75rem;
        border-radius: 20px;
        font-size: 0.875rem;
        font-weight: 600;
    }
    
    .growth-positive {
        background: #c6f6d5;
        color: #22543d;
    }
    
    .growth-negative {
        background: #fed7d7;
        color: #742a2a;
    }
    
    .progress-ring {
        width: 120px;
        height: 120px;
        margin: 0 auto;
    }
    
    .section-title {
        font-size: 1.5rem;
        font-weight: 600;
        color: #2d3748;
        margin-bottom: 1.5rem;
        display: flex;
        align-items: center;
    }
    
    .section-title i {
        margin-right: 0.75rem;
        color: #667eea;
    }
    
    .status-badge {
        padding: 0.375rem 0.75rem;
        border-radius: 20px;
        font-size: 0.875rem;
        font-weight: 600;
    }
    
    .status-success {
        background: #c6f6d5;
        color: #22543d;
    }
    
    .status-warning {
        background: #fefcbf;
        color: #744210;
    }
    
    .status-danger {
        background: #fed7d7;
        color: #742a2a;
    }
    
    .refresh-btn {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border: none;
        color: white;
        padding: 0.75rem 1.5rem;
        border-radius: 25px;
        font-weight: 600;
        transition: all 0.3s ease;
    }
    
    .refresh-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(102, 126, 234, 0.4);
    }
    
    .chart-container {
        position: relative;
        height: 300px;
        margin: 1rem 0;
    }
    
    .loading-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(255, 255, 255, 0.8);
        display: flex;
        align-items: center;
        justify-content: center;
        z-index: 1000;
        border-radius: 15px;
    }
    
    .academic-year-selector {
        background: white;
        border: 2px solid #667eea;
        border-radius: 10px;
        padding: 0.75rem;
        font-weight: 600;
        color: #667eea;
    }
    
    .table-modern {
        background: white;
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 5px 15px rgba(0,0,0,0.08);
    }
    
    .table-modern thead th {
        background: #f7fafc;
        border: none;
        padding: 1rem;
        font-weight: 600;
        color: #4a5568;
    }
    
    .table-modern tbody td {
        padding: 1rem;
        border: none;
        border-bottom: 1px solid #e2e8f0;
    }
    
    .warning-notice {
        background: #fff5b4;
        border: 1px solid #f6e05e;
        border-radius: 10px;
        padding: 1rem;
        margin: 1rem 0;
        color: #744210;
        font-weight: 500;
    }
</style>
@endsection

@section('content')
<div class="container-fluid">
    <!-- Dashboard Header -->
    <div class="dashboard-header">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h1 class="mb-1">Dashboard dan Pelaporan</h1>
                <h2 class="mb-1">{{ $webs->school_name ?? 'Universitas Ibn Khaldun' }}</h2>
                <h3 class="mb-2">Dashboard Pimpinan</h3>
                <p class="mb-0">
                    <i class="fas fa-clock me-2"></i>
                    Terakhir diperbarui: <span id="lastUpdated">{{ $generalStats['lastUpdated'] }}</span>
                </p>
            </div>
            <div class="col-md-4 text-end">
                <div class="mb-3">
                    <select id="tahunAkademikSelector" class="form-select academic-year-selector">
                        @foreach($tahunAkademiks as $taka)
                            <option value="{{ $taka->id }}" {{ $taka->id == $currentTahunAkademik->id ? 'selected' : '' }}>
                                {{ $taka->tahun }} {{ $taka->semester }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <button id="refreshBtn" class="btn refresh-btn">
                    <i class="fas fa-sync-alt me-2"></i>Perbarui Data
                </button>
            </div>
        </div>
    </div>

    <!-- Warning Notice -->
    @if($currentTahunAkademik && $currentTahunAkademik->is_active)
    <div class="warning-notice">
        <i class="fas fa-exclamation-triangle me-2"></i>
        <strong>Perhatian!</strong> Periode {{ $currentTahunAkademik->tahun }} {{ $currentTahunAkademik->semester }} sedang berjalan, maka data dapat berubah setiap saat.
    </div>
    @endif

    @if(!$currentTahunAkademik)
    <div class="alert alert-warning" role="alert">
        <i class="fas fa-exclamation-triangle me-2"></i>
        <strong>Perhatian!</strong> Belum ada tahun akademik yang aktif. Silakan pilih tahun akademik dari dropdown di atas.
    </div>
    @else

    <div class="row" id="dashboardContent">
        <!-- Student Statistics -->
        <div class="col-12 mb-4">
            <div class="section-title">
                <i class="fas fa-graduation-cap"></i>
                Mahasiswa {{ $currentTahunAkademik->tahun }} {{ $currentTahunAkademik->semester }}
            </div>
        </div>

        <div class="col-xl-3 col-lg-6 col-md-6 mb-4">
            <div class="card metric-card">
                <div class="card-body text-center">
                    <div class="metric-number text-success">{{ number_format($studentStats['active']) }}</div>
                    <div class="metric-label">Aktif</div>
                    <small class="text-muted">Mahasiswa</small>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-lg-6 col-md-6 mb-4">
            <div class="card metric-card">
                <div class="card-body text-center">
                    <div class="metric-number text-info">{{ number_format($studentStats['kampusMerdeka']) }}</div>
                    <div class="metric-label">Kampus Merdeka</div>
                    <small class="text-muted">Mahasiswa</small>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-lg-6 col-md-6 mb-4">
            <div class="card metric-card">
                <div class="card-body text-center">
                    <div class="metric-number text-warning">{{ number_format($studentStats['inactive']) }}</div>
                    <div class="metric-label">Non Aktif</div>
                    <small class="text-muted">Mahasiswa</small>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-lg-6 col-md-6 mb-4">
            <div class="card metric-card">
                <div class="card-body text-center">
                    <div class="metric-number text-secondary">{{ number_format($studentStats['cuti']) }}</div>
                    <div class="metric-label">Cuti</div>
                    <small class="text-muted">Mahasiswa</small>
                </div>
            </div>
        </div>

        <!-- Additional Student Metrics -->
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="card metric-card">
                <div class="card-body">
                    <h5 class="card-title">Mahasiswa Aktif (Student Body)</h5>
                    <div class="metric-number">{{ number_format($studentStats['totalActive']) }}</div>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-6 mb-4">
            <div class="card metric-card">
                <div class="card-body">
                    <h5 class="card-title">Rerata IPS Mahasiswa</h5>
                    <div class="metric-number">{{ number_format($studentStats['averageIPS'], 2) }}</div>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-12 mb-4">
            <div class="card metric-card">
                <div class="card-body">
                    <h5 class="card-title">Mutasi Mahasiswa</h5>
                    <div class="row text-center">
                        <div class="col-6 mb-2">
                            <div><strong>{{ $studentStats['mutations']['graduated'] }}</strong></div>
                            <small class="text-muted">Lulus</small>
                        </div>
                        <div class="col-6 mb-2">
                            <div><strong>{{ $studentStats['mutations']['dropout'] }}</strong></div>
                            <small class="text-muted">Keluar</small>
                        </div>
                        <div class="col-6">
                            <div><strong>{{ $studentStats['mutations']['transfer'] }}</strong></div>
                            <small class="text-muted">Mutasi</small>
                        </div>
                        <div class="col-6">
                            <div><strong>{{ $studentStats['mutations']['deceased'] }}</strong></div>
                            <small class="text-muted">Wafat</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Course Realization -->
        <div class="col-lg-6 col-md-12 mb-4">
            <div class="card metric-card">
                <div class="card-body">
                    <h5 class="card-title">Rerata Realisasi Perkuliahan {{ $currentTahunAkademik->tahun }} {{ $currentTahunAkademik->semester }}</h5>
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <div class="metric-number">{{ $courseRealization['percentage'] }}%</div>
                            <small class="text-muted">sampai pekan ke-{{ $courseRealization['weekProgress'] }}</small>
                            <div class="progress mt-3" style="height: 10px;">
                                <div class="progress-bar" role="progressbar" style="width: {{ $courseRealization['percentage'] }}%" aria-valuenow="{{ $courseRealization['percentage'] }}" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            @foreach($courseRealization['programDetails'] as $program)
                            <div class="mb-2">
                                <div class="d-flex justify-content-between">
                                    <small><strong>{{ $program['name'] }}</strong></small>
                                    <small>{{ $program['percentage'] }}%</small>
                                </div>
                                <small class="text-muted">perkuliahan terlaksana</small>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- PDDikti Reporting -->
        <div class="col-lg-6 col-md-12 mb-4">
            <div class="card metric-card">
                <div class="card-body">
                    <h5 class="card-title">Pelaporan PDDikti {{ $currentTahunAkademik->tahun }} {{ $currentTahunAkademik->semester }}</h5>
                    <div class="metric-number">{{ $pddiktiReporting['percentage'] }}%</div>
                    <div class="metric-label">Pelaporan</div>
                    @if($pddiktiReporting['status'] == 'warning')
                    <div class="alert alert-warning mt-3" role="alert">
                        <small>{{ $pddiktiReporting['message'] }}</small>
                    </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Human Resources -->
        <div class="col-12 mb-4">
            <div class="section-title">
                <i class="fas fa-users"></i>
                Sumber Daya Manusia {{ $currentTahunAkademik->tahun }} {{ $currentTahunAkademik->semester }}
            </div>
        </div>

        <div class="col-lg-6 col-md-12 mb-4">
            <div class="card metric-card">
                <div class="card-body">
                    <h5 class="card-title">SDM Dosen</h5>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="metric-number">{{ $humanResources['dosen']['total'] }}</div>
                            <div class="metric-label">Total Dosen</div>
                        </div>
                        <div class="col-md-4">
                            <div class="metric-number">{{ $humanResources['dosen']['ratio'] }}</div>
                            <div class="metric-label">Rasio Dosen</div>
                        </div>
                        <div class="col-md-4">
                            <small class="text-warning"><strong>{{ $humanResources['dosen']['withoutNIDN'] }}</strong> Dosen belum memiliki NIDN atau NIDK</small>
                            <br>
                            <small class="text-info"><strong>{{ $humanResources['dosen']['incompleteEducation'] }}</strong> Dosen belum mengisi data Pendidikan Terakhir, Homebase, Hubungan Kerja</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-6 col-md-12 mb-4">
            <div class="card metric-card">
                <div class="card-body">
                    <h5 class="card-title">SDM Tendik</h5>
                    <div class="metric-number mb-3">{{ $humanResources['tendik']['total'] }}</div>
                    <h6>Hubungan Kerja Tendik</h6>
                    @foreach($humanResources['tendik']['hubunganKerja'] as $key => $value)
                    <div class="d-flex justify-content-between mb-2">
                        <span>{{ $loop->iteration }}. {{ $key }}</span>
                        <strong>{{ $value }}</strong>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Additional sections would continue here following the same pattern -->
        
        <!-- Student Attendance -->
        <div class="col-lg-6 col-md-12 mb-4">
            <div class="card metric-card">
                <div class="card-body">
                    <h5 class="card-title">Rerata Kehadiran Mhs {{ $currentTahunAkademik->tahun }} {{ $currentTahunAkademik->semester }}</h5>
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <div class="metric-number">{{ $studentAttendance['averagePercentage'] }}%</div>
                            <small class="text-muted">dari Realisasi Perkuliahan</small>
                            <div class="progress mt-3" style="height: 10px;">
                                <div class="progress-bar bg-info" role="progressbar" style="width: {{ $studentAttendance['averagePercentage'] }}%"></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            @foreach($studentAttendance['programDetails'] as $program)
                            <div class="mb-2">
                                <div class="d-flex justify-content-between">
                                    <small><strong>{{ $program['name'] }}</strong></small>
                                    <small>{{ $program['percentage'] }}%</small>
                                </div>
                                <small class="text-muted">mahasiswa hadir</small>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Accreditation -->
        <div class="col-lg-6 col-md-12 mb-4">
            <div class="card metric-card">
                <div class="card-body">
                    <h5 class="card-title">Akreditasi PT</h5>
                    <div class="text-center mb-3">
                        <div class="metric-number">{{ $accreditation['universityAccreditation'] }}</div>
                        <div class="metric-label">Akreditasi Universitas</div>
                    </div>
                    
                    <h6>Akreditasi Program Studi</h6>
                    <div class="row text-center">
                        @foreach($accreditation['programAccreditation'] as $level => $count)
                        <div class="col-6 mb-2">
                            <div><strong>{{ $count }}</strong></div>
                            <small class="text-muted">{{ $level }}</small>
                        </div>
                        @endforeach
                    </div>
                    <div class="text-center mt-2">
                        <strong>{{ $accreditation['total'] }}</strong> <small class="text-muted">Total Prodi</small>
                    </div>
                    <div class="alert alert-warning mt-3 py-2" role="alert">
                        <small>{{ $accreditation['expiringCount'] }} Prodi akan berakhir akreditasi dan {{ $accreditation['conversionNeeded'] }} Prodi perlu melakukan konversi akreditasi</small>
                    </div>
                </div>
            </div>
        </div>

        <!-- Financial Academic -->
        <div class="col-12 mb-4">
            <div class="section-title">
                <i class="fas fa-money-bill-wave"></i>
                Keuangan Akademik {{ $currentTahunAkademik->tahun }} {{ $currentTahunAkademik->semester }}
            </div>
        </div>

        <div class="col-lg-6 col-md-12 mb-4">
            <div class="card metric-card">
                <div class="card-body">
                    <h5 class="card-title">Pendapatan</h5>
                    <div class="metric-number">Rp{{ number_format($financialAcademic['pendapatan']['amount']) }}</div>
                    <div class="d-flex align-items-center mt-2">
                        <span class="growth-indicator {{ $financialAcademic['pendapatan']['growth'] >= 0 ? 'growth-positive' : 'growth-negative' }}">
                            {{ $financialAcademic['pendapatan']['growth'] }}% dari periode sebelumnya
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-6 col-md-12 mb-4">
            <div class="card metric-card">
                <div class="card-body">
                    <h5 class="card-title">Piutang</h5>
                    <div class="metric-number">Rp{{ number_format($financialAcademic['piutang']['amount']) }}</div>
                    <div class="d-flex align-items-center mt-2">
                        <span class="growth-indicator {{ $financialAcademic['piutang']['growth'] >= 0 ? 'growth-positive' : 'growth-negative' }}">
                            {{ $financialAcademic['piutang']['growth'] }}% dari periode sebelumnya
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Student Admission (PMB) -->
        <div class="col-12 mb-4">
            <div class="section-title">
                <i class="fas fa-user-graduate"></i>
                Penerimaan Mahasiswa Baru Tahun Akademik {{ $currentTahunAkademik->tahun }}
            </div>
        </div>

        <div class="col-xl-3 col-lg-6 col-md-6 mb-4">
            <div class="card metric-card">
                <div class="card-body text-center">
                    <div class="metric-number">{{ number_format($studentAdmission['peminat']) }}</div>
                    <div class="metric-label">Peminat</div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-lg-6 col-md-6 mb-4">
            <div class="card metric-card">
                <div class="card-body text-center">
                    <div class="metric-number">{{ number_format($studentAdmission['pendaftar']) }}</div>
                    <div class="metric-label">Pendaftar</div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-lg-6 col-md-6 mb-4">
            <div class="card metric-card">
                <div class="card-body text-center">
                    <div class="metric-number">{{ number_format($studentAdmission['lulusSeleksi']) }}</div>
                    <div class="metric-label">Lulus Seleksi</div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-lg-6 col-md-6 mb-4">
            <div class="card metric-card">
                <div class="card-body text-center">
                    <div class="metric-number">{{ number_format($studentAdmission['daftarUlang']) }}</div>
                    <div class="metric-label">Daftar Ulang</div>
                </div>
            </div>
        </div>

        <div class="col-lg-6 col-md-12 mb-4">
            <div class="card metric-card">
                <div class="card-body">
                    <h5 class="card-title">Tingkat Konversi</h5>
                    <div class="row text-center">
                        <div class="col-6">
                            <div class="metric-number text-primary">{{ $studentAdmission['konversiSeleksi'] }}%</div>
                            <small class="text-muted">Seleksi</small>
                        </div>
                        <div class="col-6">
                            <div class="metric-number text-success">{{ $studentAdmission['konversiDaftarUlang'] }}%</div>
                            <small class="text-muted">Daftar Ulang</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Graduate Statistics -->
        <div class="col-lg-6 col-md-12 mb-4">
            <div class="card metric-card">
                <div class="card-body">
                    <h5 class="card-title">Rerata IPK Lulusan</h5>
                    <h6 class="text-muted">Tahun Selesai {{ $currentTahunAkademik->tahun }}</h6>
                    <div class="metric-number">{{ $graduateStats['averageIPK'] }}</div>
                    <small class="text-muted">dari tahun akademik lalu</small>
                    @if($graduateStats['averageIPK'] == 0)
                    <div class="alert alert-info mt-3 py-2" role="alert">
                        <small>Pada Tahun Akademik {{ $currentTahunAkademik->tahun }} belum ada data IPK Lulusan</small>
                    </div>
                    @endif
                </div>
            </div>
        </div>

        <div class="col-lg-6 col-md-12 mb-4">
            <div class="card metric-card">
                <div class="card-body">
                    <h5 class="card-title">Rerata Masa Studi Lulusan</h5>
                    <h6 class="text-muted">Tahun Selesai {{ $currentTahunAkademik->tahun }}</h6>
                    <div class="metric-number">{{ $graduateStats['averageStudyPeriod'] }} Tahun</div>
                    <small class="text-muted">dari tahun akademik lalu</small>
                    @if($graduateStats['averageStudyPeriod'] == 0)
                    <div class="alert alert-info mt-3 py-2" role="alert">
                        <small>Pada Tahun Akademik {{ $currentTahunAkademik->tahun }} belum ada data Masa Studi Lulusan</small>
                    </div>
                    @endif
                </div>
            </div>
        </div>

        <div class="col-lg-6 col-md-12 mb-4">
            <div class="card metric-card">
                <div class="card-body">
                    <h5 class="card-title">Waktu Tunggu Lulusan</h5>
                    <h6 class="text-muted">Tahun Selesai {{ $currentTahunAkademik->tahun }}</h6>
                    <div class="metric-number">{{ $graduateStats['waitingTime'] }} Bulan</div>
                    <small class="text-muted">berdasarkan survei dari {{ $graduateStats['surveyResponse'] }}/{{ $graduateStats['surveyResponse'] }} lulusan</small>
                </div>
            </div>
        </div>

        <div class="col-lg-6 col-md-12 mb-4">
            <div class="card metric-card">
                <div class="card-body">
                    <h5 class="card-title">Kesesuaian Bidang Kerja</h5>
                    <h6 class="text-muted">Tahun Selesai {{ $currentTahunAkademik->tahun }}</h6>
                    
                    <div class="row text-center mt-3">
                        <div class="col-4">
                            <div class="metric-number text-success">{{ $graduateStats['fieldSuitability']['tinggi'] }}%</div>
                            <small class="text-muted">Tinggi</small>
                        </div>
                        <div class="col-4">
                            <div class="metric-number text-warning">{{ $graduateStats['fieldSuitability']['sedang'] }}%</div>
                            <small class="text-muted">Sedang</small>
                        </div>
                        <div class="col-4">
                            <div class="metric-number text-danger">{{ $graduateStats['fieldSuitability']['rendah'] }}%</div>
                            <small class="text-muted">Rendah</small>
                        </div>
                    </div>
                    
                    @if($graduateStats['surveyResponse'] == 0)
                    <div class="alert alert-warning mt-3 py-2" role="alert">
                        <small>Kesesuaian Bidang Kerja kurang valid karena responden hanya 0%, yaitu 0/0 lulusan</small>
                    </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Footer -->
        <div class="col-12">
            <div class="text-center py-4">
                <p class="text-muted mb-0">© 2025 SIAKADKU</p>
            </div>
        </div>
        
    @endif
        
    </div>
</div>

<div class="loading-overlay d-none" id="loadingOverlay">
    <div class="spinner-border text-primary" role="status">
        <span class="visually-hidden">Loading...</span>
    </div>
</div>
@endsection

@section('custom-js')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const refreshBtn = document.getElementById('refreshBtn');
    const tahunSelector = document.getElementById('tahunAkademikSelector');
    const loadingOverlay = document.getElementById('loadingOverlay');
    
    // Refresh button functionality
    refreshBtn.addEventListener('click', function() {
        refreshDashboard();
    });
    
    // Academic year change functionality
    tahunSelector.addEventListener('change', function() {
        const selectedTahunId = this.value;
        window.location.href = `{{ route('dashboard.leadership') }}?tahun_akademik_id=${selectedTahunId}`;
    });
    
    function refreshDashboard() {
        const tahunAkademikId = tahunSelector.value;
        
        loadingOverlay.classList.remove('d-none');
        refreshBtn.disabled = true;
        
        fetch('{{ route("dashboard.refresh") }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({
                tahun_akademik_id: tahunAkademikId
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                document.getElementById('lastUpdated').textContent = data.lastUpdated;
                // Update other dashboard elements as needed
                location.reload(); // Simplified - reload page with fresh data
            }
        })
        .catch(error => {
            console.error('Error refreshing dashboard:', error);
        })
        .finally(() => {
            loadingOverlay.classList.add('d-none');
            refreshBtn.disabled = false;
        });
    }
    
    // Auto-refresh every 5 minutes
    setInterval(refreshDashboard, 300000);
});
</script>
@endsection