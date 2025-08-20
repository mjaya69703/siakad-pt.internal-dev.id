@extends('pendaftar.layouts.app')

@section('title', 'Status Pendaftaran')
@section('page-pretitle', 'PMB')
@section('page-title', 'Status Pendaftaran')

@section('content')
<div class="row">
    <div class="col-12">
        @if(!$pendaftaran)
            <div class="card">
                <div class="card-body text-center py-5">
                    <div class="mb-3">
                        <i class="fas fa-exclamation-triangle text-warning" style="font-size: 4rem;"></i>
                    </div>
                    <h3>Belum Ada Data Pendaftaran</h3>
                    <p class="text-muted">Anda belum melengkapi form pendaftaran. Silakan isi form pendaftaran terlebih dahulu.</p>
                    <a href="{{ route('pendaftar.pendaftaran') }}" class="btn btn-primary">
                        <i class="fas fa-plus me-2"></i>
                        Isi Form Pendaftaran
                    </a>
                </div>
            </div>
        @else
            <!-- Status Overview -->
            <div class="card mb-4">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-info-circle me-2"></i>
                        Status Pendaftaran
                    </h3>
                </div>
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-md-3 text-center">
                            <div class="mb-2">
                                @if($pendaftaran->status == 'Pending')
                                    <i class="fas fa-clock text-warning" style="font-size: 3rem;"></i>
                                @elseif($pendaftaran->status == 'Lulus')
                                    <i class="fas fa-check-circle text-success" style="font-size: 3rem;"></i>
                                @elseif($pendaftaran->status == 'Gagal')
                                    <i class="fas fa-times-circle text-danger" style="font-size: 3rem;"></i>
                                @elseif($pendaftaran->status == 'Batal')
                                    <i class="fas fa-ban text-secondary" style="font-size: 3rem;"></i>
                                @else
                                    <i class="fas fa-question-circle text-muted" style="font-size: 3rem;"></i>
                                @endif
                            </div>
                            <h4 class="mb-1">
                                @if($pendaftaran->status == 'Pending')
                                    Menunggu Verifikasi
                                @elseif($pendaftaran->status == 'Lulus')
                                    Lulus
                                @elseif($pendaftaran->status == 'Gagal')
                                    Tidak Lulus
                                @elseif($pendaftaran->status == 'Batal')
                                    Dibatalkan
                                @else
                                    {{ ucfirst($pendaftaran->status) }}
                                @endif
                            </h4>
                            <span class="status-badge status-{{ $pendaftaran->status }}">
                                {{ ucfirst($pendaftaran->status) }}
                            </span>
                        </div>
                        <div class="col-md-9">
                            <div class="row">
                                <div class="col-md-6">
                                    <h6>Informasi Pendaftaran</h6>
                                    <table class="table table-sm table-borderless">
                                        <tr>
                                            <td width="50%">No. Pendaftaran:</td>
                                            <td><code>{{ $pendaftaran->numb_reg ?? $pendaftaran->code ?? '-' }}</code></td>
                                        </tr>
                                        <tr>
                                            <td>Tanggal Daftar:</td>
                                            <td>{{ $pendaftaran->register_date ? date('d F Y', strtotime($pendaftaran->register_date)) : '-' }}</td>
                                        </tr>
                                        <tr>
                                            <td>Program Studi:</td>
                                            <td>{{ $pendaftaran->prodi1->name ?? '-' }}</td>
                                        </tr>
                                        <tr>
                                            <td>Jenjang:</td>
                                            <td>{{ $pendaftaran->prodi1->jenjang->nama ?? '-' }}</td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="col-md-6">
                                    <h6>Status Pembayaran</h6>
                                    <table class="table table-sm table-borderless">
                                        <tr>
                                            <td width="50%">Status Bayar:</td>
                                            <td>
                                                @if($pendaftaran->bukti_pembayaran)
                                                    <span class="status-badge status-verified">Terverifikasi</span>
                                                @else
                                                    <span class="status-badge status-pending">Belum Upload</span>
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Jumlah Bayar:</td>
                                            <td>Rp {{ number_format($pendaftaran->jumlah_transfer ?? 150000, 0, ',', '.') }}</td>
                                        </tr>
                                        <tr>
                                            <td>Tanggal Transfer:</td>
                                            <td>{{ $pendaftaran->tanggal_transfer ? date('d F Y', strtotime($pendaftaran->tanggal_transfer)) : '-' }}</td>
                                        </tr>
                                        <tr>
                                            <td>Bank Pengirim:</td>
                                            <td>{{ $pendaftaran->bank_pengirim ?? '-' }}</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Timeline Progress -->
            <div class="card mb-4">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-history me-2"></i>
                        Timeline Proses
                    </h3>
                </div>
                <div class="card-body">
                    <div class="timeline">
                        <!-- Registrasi Akun -->
                        <div class="timeline-item">
                            <div class="timeline-marker timeline-marker-success"></div>
                            <div class="timeline-content">
                                <div class="timeline-time">{{ $pendaftaran->created_at->format('d M Y, H:i') }}</div>
                                <div class="timeline-title">Registrasi Akun</div>
                                <div class="timeline-subtitle">Akun pendaftar berhasil dibuat</div>
                            </div>
                        </div>

                        <!-- Form Pendaftaran -->
                        @if($pendaftaran->register_date)
                        <div class="timeline-item">
                            <div class="timeline-marker timeline-marker-success"></div>
                            <div class="timeline-content">
                                <div class="timeline-time">{{ date('d M Y', strtotime($pendaftaran->register_date)) }}</div>
                                <div class="timeline-title">Form Pendaftaran Diisi</div>
                                <div class="timeline-subtitle">Data pendaftaran lengkap untuk {{ $pendaftaran->prodi1->name ?? 'Program Studi' }}</div>
                            </div>
                        </div>
                        @endif

                        <!-- Upload Pembayaran -->
                        @if($pendaftaran->bukti_pembayaran)
                        <div class="timeline-item">
                            <div class="timeline-marker timeline-marker-success"></div>
                            <div class="timeline-content">
                                <div class="timeline-time">{{ $pendaftaran->tanggal_transfer ? date('d M Y', strtotime($pendaftaran->tanggal_transfer)) : 'Upload' }}</div>
                                <div class="timeline-title">Bukti Pembayaran Diupload</div>
                                <div class="timeline-subtitle">Bukti transfer sebesar Rp {{ number_format($pendaftaran->jumlah_transfer ?? 0, 0, ',', '.') }} - Status: Terverifikasi</div>
                            </div>
                        </div>
                        @endif

                        <!-- Status Final -->
                        @if($pendaftaran->status == 'Lulus')
                        <div class="timeline-item">
                            <div class="timeline-marker timeline-marker-success"></div>
                            <div class="timeline-content">
                                <div class="timeline-time">{{ $pendaftaran->updated_at->format('d M Y, H:i') }}</div>
                                <div class="timeline-title">Pendaftaran Diterima - Lulus</div>
                                <div class="timeline-subtitle">Selamat! Anda telah diterima sebagai mahasiswa baru</div>
                            </div>
                        </div>
                        @elseif($pendaftaran->status == 'Gagal')
                        <div class="timeline-item">
                            <div class="timeline-marker timeline-marker-danger"></div>
                            <div class="timeline-content">
                                <div class="timeline-time">{{ $pendaftaran->updated_at->format('d M Y, H:i') }}</div>
                                <div class="timeline-title">Pendaftaran Tidak Lulus</div>
                                <div class="timeline-subtitle">{{ $pendaftaran->catatan_penolakan ?? 'Silakan hubungi admin untuk informasi lebih lanjut' }}</div>
                            </div>
                        </div>
                        @elseif($pendaftaran->status == 'Batal')
                        <div class="timeline-item">
                            <div class="timeline-marker timeline-marker-secondary"></div>
                            <div class="timeline-content">
                                <div class="timeline-time">{{ $pendaftaran->updated_at->format('d M Y, H:i') }}</div>
                                <div class="timeline-title">Pendaftaran Dibatalkan</div>
                                <div class="timeline-subtitle">{{ $pendaftaran->catatan_pembatalan ?? 'Pendaftaran telah dibatalkan' }}</div>
                            </div>
                        </div>
                        @else
                        <div class="timeline-item">
                            <div class="timeline-marker timeline-marker-warning"></div>
                            <div class="timeline-content">
                                <div class="timeline-time">Menunggu</div>
                                <div class="timeline-title">Review Admin</div>
                                <div class="timeline-subtitle">Menunggu keputusan final dari admin</div>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Action Cards -->
            <div class="row">
                @if(!$pendaftaran->bukti_pembayaran)
                <div class="col-md-6 mb-4">
                    <div class="card border-warning">
                        <div class="card-body text-center">
                            <i class="fas fa-upload text-warning mb-3" style="font-size: 2rem;"></i>
                            <h5>Upload Bukti Pembayaran</h5>
                            <p class="text-muted">Lengkapi proses dengan upload bukti transfer</p>
                            <a href="{{ route('pendaftar.pendaftaran') }}" class="btn btn-warning">
                                <i class="fas fa-credit-card me-2"></i>
                                Upload Sekarang
                            </a>
                        </div>
                    </div>
                </div>
                @endif

                <div class="col-md-6 mb-4">
                    <div class="card border-info">
                        <div class="card-body text-center">
                            <i class="fas fa-folder text-info mb-3" style="font-size: 2rem;"></i>
                            <h5>Upload Dokumen</h5>
                            <p class="text-muted">Upload dokumen pendukung lainnya</p>
                            <a href="{{ route('pendaftar.dokumen') }}" class="btn btn-info">
                                <i class="fas fa-file-upload me-2"></i>
                                Kelola Dokumen
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 mb-4">
                    <div class="card border-primary">
                        <div class="card-body text-center">
                            <i class="fas fa-edit text-primary mb-3" style="font-size: 2rem;"></i>
                            <h5>Edit Data</h5>
                            <p class="text-muted">Perbaharui data pendaftaran Anda</p>
                            <a href="{{ route('pendaftar.pendaftaran') }}" class="btn btn-primary">
                                <i class="fas fa-pencil-alt me-2"></i>
                                Edit Data
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 mb-4">
                    <div class="card border-secondary">
                        <div class="card-body text-center">
                            <i class="fas fa-print text-secondary mb-3" style="font-size: 2rem;"></i>
                            <h5>Cetak Kartu</h5>
                            <p class="text-muted">Download kartu peserta pendaftaran</p>
                            <a href="{{ route('pendaftar.kartu.download') }}" class="btn btn-secondary" target="_blank">
                                <i class="fas fa-download me-2"></i>
                                Download Kartu
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Additional Information -->
            @if($pendaftaran->status == 'Lulus')
            <div class="card border-success">
                <div class="card-header bg-success text-white">
                    <h3 class="card-title mb-0">
                        <i class="fas fa-check-circle me-2"></i>
                        Selamat! Anda Lulus
                    </h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                            <h5>Langkah Selanjutnya:</h5>
                            <ol>
                                <li>Download dan cetak kartu peserta</li>
                                <li>Hubungi CS Admin untuk informasi detail proses selanjutnya</li>
                                <li>Datang ke kampus untuk pembayaran biaya kuliah</li>
                                <li>Persiapan untuk masa orientasi mahasiswa baru (TAARUF)</li>
                                <li>Mengikuti kegiatan perkenalan kampus</li>
                            </ol>
                        </div>
                        <div class="col-md-4 text-center">
                            <h6 class="mb-3">Hubungi CS Admin Sekarang</h6>
                            <a href="https://wa.me/6282110975474?text=Halo%20Admin,%20saya%20sudah%20lulus%20PMB%20dengan%20nomor%20pendaftaran%20{{ $pendaftaran->numb_reg ?? $pendaftaran->code ?? '-' }}%20dan%20ingin%20bertanya%20mengenai%20proses%20selanjutnya%20seperti%20pembayaran%20biaya%20kuliah%20dan%20persiapan%20TAARUF" 
                               target="_blank" class="btn btn-success btn-lg mb-2">
                                <i class="fab fa-whatsapp me-2"></i>
                                WhatsApp CS Admin
                            </a>
                            <p class="small text-muted">+62 821-1097-5474</p>
                        </div>
                    </div>
                    <div class="alert alert-info mt-3">
                        <strong>Informasi Penting:</strong> Silakan hubungi CS Admin melalui WhatsApp untuk mendapatkan informasi detail mengenai jadwal pembayaran biaya kuliah, persiapan TAARUF (Masa Orientasi Mahasiswa Baru), dan langkah-langkah selanjutnya.
                    </div>
                </div>
            </div>
            @elseif($pendaftaran->status == 'Gagal')
            <div class="card border-danger">
                <div class="card-header bg-danger text-white">
                    <h3 class="card-title mb-0">
                        <i class="fas fa-times-circle me-2"></i>
                        Pendaftaran Tidak Lulus
                    </h3>
                </div>
                <div class="card-body">
                    @if($pendaftaran->catatan_penolakan)
                    <div class="alert alert-warning">
                        <strong>Catatan:</strong><br>
                        {{ $pendaftaran->catatan_penolakan }}
                    </div>
                    @endif
                    <p>Jangan berkecil hati! Anda dapat:</p>
                    <ul>
                        <li>Menghubungi admin untuk klarifikasi</li>
                        <li>Memperbaiki dokumen yang diperlukan</li>
                        <li>Mendaftar ulang di periode berikutnya</li>
                    </ul>
                    <div class="alert alert-info">
                        <strong>Kontak Admin:</strong> Silakan hubungi bagian admisi untuk informasi lebih lanjut.
                    </div>
                </div>
            </div>
            @elseif($pendaftaran->status == 'Batal')
            <div class="card border-secondary">
                <div class="card-header bg-secondary text-white">
                    <h3 class="card-title mb-0">
                        <i class="fas fa-ban me-2"></i>
                        Pendaftaran Dibatalkan
                    </h3>
                </div>
                <div class="card-body">
                    @if($pendaftaran->catatan_pembatalan)
                    <div class="alert alert-warning">
                        <strong>Alasan Pembatalan:</strong><br>
                        {{ $pendaftaran->catatan_pembatalan }}
                    </div>
                    @endif
                    <p>Pendaftaran Anda telah dibatalkan. Untuk informasi lebih lanjut, silakan hubungi admin.</p>
                    <div class="alert alert-info">
                        <strong>Kontak Admin:</strong> Silakan hubungi bagian admisi untuk informasi lebih lanjut.
                    </div>
                </div>
            </div>
            @endif
        @endif
    </div>
</div>
@endsection

@section('styles')
<style>
.timeline {
    position: relative;
    padding-left: 1.5rem;
}

.timeline::before {
    content: '';
    position: absolute;
    left: 0.625rem;
    top: 0;
    bottom: 0;
    width: 2px;
    background: var(--tblr-border-color);
}

.timeline-item {
    position: relative;
    margin-bottom: 1.5rem;
}

.timeline-marker {
    position: absolute;
    left: -0.75rem;
    width: 0.75rem;
    height: 0.75rem;
    border-radius: 50%;
    border: 2px solid white;
    background: var(--tblr-border-color);
}

.timeline-marker-success { background: var(--tblr-success); }
.timeline-marker-info { background: var(--tblr-info); }
.timeline-marker-warning { background: var(--tblr-warning); }
.timeline-marker-danger { background: var(--tblr-danger); }
.timeline-marker-secondary { background: var(--tblr-secondary); }

.timeline-content {
    margin-left: 1rem;
}

.timeline-time {
    font-size: 0.75rem;
    color: var(--tblr-muted);
}

.timeline-title {
    font-weight: 600;
    margin-bottom: 0.25rem;
}

.timeline-subtitle {
    color: var(--tblr-muted);
    font-size: 0.875rem;
}

.status-badge {
    padding: 0.25rem 0.5rem;
    border-radius: 0.375rem;
    font-size: 0.75rem;
    font-weight: 600;
    text-transform: uppercase;
}

.status-pending {
    background-color: #fef3cd;
    color: #664d03;
}

.status-verified {
    background-color: #d1e7dd;
    color: #0f5132;
}

.status-Pending {
    background-color: #fef3cd;
    color: #664d03;
}

.status-Lulus {
    background-color: #d1e7dd;
    color: #0f5132;
}

.status-Gagal {
    background-color: #f8d7da;
    color: #721c24;
}

.status-Batal {
    background-color: #e2e3e5;
    color: #41464b;
}
</style>
@endsection
