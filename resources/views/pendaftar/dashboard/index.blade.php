@extends('pendaftar.layouts.app')

@section('title', 'Dashboard')
@section('page-pretitle', 'Selamat datang')
@section('page-title', 'Dashboard Calon Mahasiswa')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h1 class="h3 mb-0">Dashboard</h1>
                <p class="text-muted">Selamat datang, {{ auth('pendaftar')->user()->name }}!</p>
            </div>
            <div class="text-end">
                <span class="badge bg-primary">{{ now()->format('d M Y') }}</span>
            </div>
        </div>
    </div>
</div>

<div class="row g-4">
    <!-- Status Cards -->
    <div class="col-md-3">
        <div class="card text-center">
            <div class="card-body">
                <div class="display-6 text-primary mb-2">
                    <i class="fas fa-user-graduate"></i>
                </div>
                <h5 class="card-title">Status Akun</h5>
                <p class="card-text">
                    <span class="badge bg-success">Aktif</span>
                </p>
            </div>
        </div>
    </div>
    
    <div class="col-md-3">
        <div class="card text-center">
            <div class="card-body">
                <div class="display-6 text-info mb-2">
                    <i class="fas fa-file-alt"></i>
                </div>
                <h5 class="card-title">Pendaftaran</h5>
                <p class="card-text">
                    @if($pendaftaran)
                        <span class="badge bg-info">{{ $pendaftaran->status ?? 'Belum Submit' }}</span>
                    @else
                        <span class="badge bg-secondary">Belum Daftar</span>
                    @endif
                </p>
            </div>
        </div>
    </div>
    
    <div class="col-md-3">
        <div class="card text-center">
            <div class="card-body">
                <div class="display-6 text-warning mb-2">
                    <i class="fas fa-folder"></i>
                </div>
                <h5 class="card-title">Dokumen</h5>
                <p class="card-text">
                    <span class="badge bg-warning">{{ $dokumentCount }} File</span>
                </p>
            </div>
        </div>
    </div>
    
    <div class="col-md-3">
        <div class="card text-center">
            <div class="card-body">
                <div class="display-6 text-success mb-2">
                    <i class="fas fa-check-circle"></i>
                </div>
                <h5 class="card-title">Verifikasi</h5>
                <p class="card-text">
                    @if($pendaftaran && $pendaftaran->status == 'verified')
                        <span class="badge bg-success">Terverifikasi</span>
                    @else
                        <span class="badge bg-secondary">Belum Verifikasi</span>
                    @endif
                </p>
            </div>
        </div>
    </div>
</div>

<div class="row g-4 mt-4">
    <!-- Quick Actions -->
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">
                    <i class="fas fa-rocket me-2"></i> Aksi Cepat
                </h5>
            </div>
            <div class="card-body">
                <div class="row g-3">
                    @if(!$pendaftaran)
                    <div class="col-md-6">
                        <div class="d-grid">
                            <a href="{{ route('pendaftar.pendaftaran') }}" class="btn btn-primary">
                                <i class="fas fa-plus me-2"></i> Mulai Pendaftaran
                            </a>
                        </div>
                    </div>
                    @else
                    <div class="col-md-6">
                        <div class="d-grid">
                            <a href="{{ route('pendaftar.pendaftaran') }}" class="btn btn-outline-primary">
                                <i class="fas fa-edit me-2"></i> Edit Pendaftaran
                            </a>
                        </div>
                    </div>
                    @endif
                    
                    <div class="col-md-6">
                        <div class="d-grid">
                            <a href="{{ route('pendaftar.dokumen') }}" class="btn btn-outline-secondary">
                                <i class="fas fa-upload me-2"></i> Upload Dokumen
                            </a>
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="d-grid">
                            <a href="{{ route('pendaftar.profile') }}" class="btn btn-outline-info">
                                <i class="fas fa-user me-2"></i> Update Profil
                            </a>
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="d-grid">
                            <a href="{{ route('pendaftar.status') }}" class="btn btn-outline-success">
                                <i class="fas fa-info-circle me-2"></i> Cek Status
                            </a>
                        </div>
                    </div>

                    @if($pendaftaran && $pendaftaran->status == 'Lulus')
                    <div class="col-md-6">
                        <div class="d-grid">
                            <a href="https://wa.me/6282110975474?text=Halo%20Admin,%20saya%20sudah%20lulus%20PMB%20dan%20ingin%20bertanya%20mengenai%20proses%20selanjutnya" 
                               target="_blank" class="btn btn-success">
                                <i class="fas fa-whatsapp me-2"></i> Kontak CS Admin
                            </a>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    
    <!-- Progress -->
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">
                    <i class="fas fa-chart-line me-2"></i> Progress Pendaftaran
                </h5>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <div class="d-flex justify-content-between">
                        <span>Lengkapi Profil</span>
                        <span class="text-success"><i class="fas fa-check"></i></span>
                    </div>
                    <div class="progress mt-1" style="height: 5px;">
                        <div class="progress-bar bg-success" style="width: 100%"></div>
                    </div>
                </div>
                
                <div class="mb-3">
                    <div class="d-flex justify-content-between">
                        <span>Isi Data Pendaftaran</span>
                        @if($pendaftaran)
                            <span class="text-success"><i class="fas fa-check"></i></span>
                        @else
                            <span class="text-muted"><i class="fas fa-times"></i></span>
                        @endif
                    </div>
                    <div class="progress mt-1" style="height: 5px;">
                        <div class="progress-bar bg-{{ $pendaftaran ? 'success' : 'secondary' }}" style="width: {{ $pendaftaran ? '100' : '0' }}%"></div>
                    </div>
                </div>
                
                <div class="mb-3">
                    <div class="d-flex justify-content-between">
                        <span>Upload Dokumen</span>
                        @if($dokumentCount > 0)
                            <span class="text-success"><i class="fas fa-check"></i></span>
                        @else
                            <span class="text-muted"><i class="fas fa-times"></i></span>
                        @endif
                    </div>
                    <div class="progress mt-1" style="height: 5px;">
                        <div class="progress-bar bg-{{ $dokumentCount > 0 ? 'success' : 'secondary' }}" style="width: {{ $dokumentCount > 0 ? '100' : '0' }}%"></div>
                    </div>
                </div>
                
                <div class="mb-3">
                    <div class="d-flex justify-content-between">
                        <span>Verifikasi Admin</span>
                        @if($pendaftaran && ($pendaftaran->status == 'Lulus' || $pendaftaran->status == 'verified'))
                            <span class="text-success"><i class="fas fa-check"></i></span>
                        @elseif($pendaftaran && $pendaftaran->status == 'Pending')
                            <span class="text-warning"><i class="fas fa-clock"></i></span>
                        @else
                            <span class="text-muted"><i class="fas fa-times"></i></span>
                        @endif
                    </div>
                    <div class="progress mt-1" style="height: 5px;">
                        <div class="progress-bar bg-{{ $pendaftaran && ($pendaftaran->status == 'Lulus' || $pendaftaran->status == 'verified') ? 'success' : ($pendaftaran && $pendaftaran->status == 'Pending' ? 'warning' : 'secondary') }}" style="width: {{ $pendaftaran && ($pendaftaran->status == 'Lulus' || $pendaftaran->status == 'verified') ? '100' : ($pendaftaran && $pendaftaran->status == 'Pending' ? '75' : '0') }}%"></div>
                    </div>
                </div>
                
                @php
                    $totalProgress = 25; // Profil sudah lengkap
                    if($pendaftaran) $totalProgress += 25;
                    if($dokumentCount > 0) $totalProgress += 25;
                    if($pendaftaran && ($pendaftaran->status == 'Lulus' || $pendaftaran->status == 'verified')) $totalProgress += 25;
                @endphp
                
                <div class="mt-3 pt-3 border-top">
                    <div class="text-center">
                        <h4 class="text-primary">{{ $totalProgress }}%</h4>
                        <small class="text-muted">Kelengkapan Data</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@if($pendaftaran)
<div class="row g-4 mt-4">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">
                    <i class="fas fa-info-circle me-2"></i> Informasi Pendaftaran
                </h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <table class="table table-borderless">
                            <tr>
                                <td><strong>Program Studi:</strong></td>
                                <td>{{ $pendaftaran->program_studi ?? '-' }}</td>
                            </tr>
                            <tr>
                                <td><strong>Jenjang:</strong></td>
                                <td>{{ $pendaftaran->jenjang ?? '-' }}</td>
                            </tr>
                            <tr>
                                <td><strong>Tanggal Daftar:</strong></td>
                                <td>{{ $pendaftaran->created_at ? $pendaftaran->created_at->format('d M Y H:i') : '-' }}</td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-6">
                        <table class="table table-borderless">
                            <tr>
                                <td><strong>Status:</strong></td>
                                <td>
                                    @if($pendaftaran->status == 'pending')
                                        <span class="badge bg-warning">Menunggu Verifikasi</span>
                                    @elseif($pendaftaran->status == 'verified')
                                        <span class="badge bg-success">Terverifikasi</span>
                                    @elseif($pendaftaran->status == 'rejected')
                                        <span class="badge bg-danger">Ditolak</span>
                                    @else
                                        <span class="badge bg-secondary">{{ $pendaftaran->status }}</span>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td><strong>No. Pendaftaran:</strong></td>
                                <td><code>{{ $pendaftaran->nomor_pendaftaran ?? 'Akan dibuat setelah submit' }}</code></td>
                            </tr>
                            <tr>
                                <td><strong>Update Terakhir:</strong></td>
                                <td>{{ $pendaftaran->updated_at ? $pendaftaran->updated_at->format('d M Y H:i') : '-' }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
@endsection
