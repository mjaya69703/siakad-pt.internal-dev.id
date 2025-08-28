@extends('core-themes.core-backpage')

@section('custom-css')
<style>
    .profile-header {
        background: linear-gradient(135deg, #3b82f6, #1e40af);
        border-radius: 12px;
        padding: 2rem;
        color: white;
        margin-bottom: 2rem;
    }

    .profile-avatar {
        width: 120px;
        height: 120px;
        border-radius: 50%;
        background: rgba(255,255,255,0.2);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 3rem;
        font-weight: 600;
        border: 4px solid rgba(255,255,255,0.3);
    }

    .info-card {
        background: white;
        border-radius: 8px;
        border: 1px solid #e5e7eb;
        padding: 1.5rem;
        margin-bottom: 1.5rem;
        box-shadow: 0 1px 3px rgba(0,0,0,0.1);
    }

    .status-badge {
        padding: 0.5rem 1rem;
        border-radius: 25px;
        font-weight: 600;
        font-size: 0.875rem;
    }

    .status-active { background: #dcfce7; color: #166534; }
    .status-inactive { background: #fef3c7; color: #92400e; }
    .status-graduated { background: #ddd6fe; color: #5b21b6; }
    .status-cuti { background: #fecaca; color: #991b1b; }

    .billing-item {
        background: #f8fafc;
        border-radius: 6px;
        padding: 1rem;
        margin-bottom: 0.75rem;
        border-left: 4px solid #3b82f6;
    }

    .billing-paid {
        border-left-color: #10b981;
        background: #ecfdf5;
    }

    .billing-pending {
        border-left-color: #f59e0b;
        background: #fffbeb;
    }

    .billing-overdue {
        border-left-color: #ef4444;
        background: #fef2f2;
    }

    .timeline-item {
        border-left: 2px solid #e5e7eb;
        padding-left: 1rem;
        padding-bottom: 1rem;
        position: relative;
    }

    .timeline-item::before {
        content: '';
        position: absolute;
        left: -6px;
        top: 0;
        width: 10px;
        height: 10px;
        background: #3b82f6;
        border-radius: 50%;
    }

    .timeline-item:last-child {
        border-left: none;
    }
</style>
@endsection

@section('content')
<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <div class="page-pretitle">
                    <a href="{{ route('master.registrasi.manajemen-mahasiswa') }}" class="text-decoration-none">
                        {{ $menus }}
                    </a>
                </div>
                <h2 class="page-title">Detail Mahasiswa</h2>
            </div>
            <div class="col-auto ms-auto">
                <div class="btn-list">
                    <button class="btn btn-outline-primary" onclick="editStudent()">
                        <i class="fas fa-edit me-1"></i>Edit Data
                    </button>
                    <div class="dropdown">
                        <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                            Aksi
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#" onclick="changeStatus()">
                                <i class="fas fa-exchange-alt me-2"></i>Ubah Status
                            </a></li>
                            <li><a class="dropdown-item" href="#" onclick="generateKTM()">
                                <i class="fas fa-id-card me-2"></i>Generate KTM
                            </a></li>
                            <li><a class="dropdown-item" href="#" onclick="printTranscript()">
                                <i class="fas fa-file-pdf me-2"></i>Cetak Transkrip
                            </a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="page-body">
    <div class="container-xl">
        <!-- Profile Header -->
        <div class="profile-header">
            <div class="row align-items-center">
                <div class="col-auto">
                    <div class="profile-avatar">
                        {{ substr($mahasiswa->name, 0, 1) }}
                    </div>
                </div>
                <div class="col">
                    <h3 class="mb-1">{{ $mahasiswa->name }}</h3>
                    <div class="text-white-50 mb-2">
                        NIM: {{ $mahasiswa->nim }} | 
                        {{ $mahasiswa->programStudi->name ?? 'N/A' }}
                    </div>
                    <div>
                        @switch($mahasiswa->type)
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
                        @endswitch
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <!-- Left Column -->
            <div class="col-lg-8">
                <!-- Personal Information -->
                <div class="info-card">
                    <h4 class="mb-3">
                        <i class="fas fa-user me-2 text-primary"></i>Informasi Personal
                    </h4>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <strong>Nama Lengkap:</strong><br>
                            {{ $mahasiswa->name }}
                        </div>
                        <div class="col-md-6">
                            <strong>Email:</strong><br>
                            {{ $mahasiswa->email ?? 'Belum ada' }}
                        </div>
                        <div class="col-md-6">
                            <strong>No. Telepon:</strong><br>
                            {{ $mahasiswa->phone ?? 'Belum ada' }}
                        </div>
                        <div class="col-md-6">
                            <strong>Jenis Kelamin:</strong><br>
                            {{ $mahasiswa->gender ?? 'Belum ada' }}
                        </div>
                        <div class="col-md-6">
                            <strong>Tanggal Lahir:</strong><br>
                            {{ $mahasiswa->birth_date ? \Carbon\Carbon::parse($mahasiswa->birth_date)->format('d F Y') : 'Belum ada' }}
                        </div>
                        <div class="col-md-6">
                            <strong>Alamat:</strong><br>
                            {{ $mahasiswa->address ?? 'Belum ada' }}
                        </div>
                    </div>
                </div>

                <!-- Academic Information -->
                <div class="info-card">
                    <h4 class="mb-3">
                        <i class="fas fa-graduation-cap me-2 text-primary"></i>Informasi Akademik
                    </h4>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <strong>Program Studi:</strong><br>
                            {{ $mahasiswa->programStudi->name ?? 'N/A' }}
                        </div>
                        <div class="col-md-6">
                            <strong>Fakultas:</strong><br>
                            {{ $mahasiswa->programStudi->fakultas->name ?? 'N/A' }}
                        </div>
                        <div class="col-md-6">
                            <strong>Kelas:</strong><br>
                            {{ $mahasiswa->kelas->name ?? 'Belum ada kelas' }}
                        </div>
                        <div class="col-md-6">
                            <strong>Semester:</strong><br>
                            {{ $mahasiswa->semester ?? 'N/A' }}
                        </div>
                        <div class="col-md-6">
                            <strong>Tahun Masuk:</strong><br>
                            {{ $mahasiswa->tahunAkademikRegistrasi->name ?? 'N/A' }}
                        </div>
                        <div class="col-md-6">
                            <strong>Tahun Akademik Aktif:</strong><br>
                            {{ $mahasiswa->tahunAkademikAktif->name ?? 'N/A' }}
                        </div>
                        <div class="col-md-6">
                            <strong>IPK:</strong><br>
                            {{ number_format($mahasiswa->ipk ?? 0, 2) }}
                        </div>
                        <div class="col-md-6">
                            <strong>Total SKS:</strong><br>
                            {{ $mahasiswa->total_sks ?? 0 }}
                        </div>
                    </div>
                </div>

                <!-- Billing History -->
                <div class="info-card">
                    <h4 class="mb-3">
                        <i class="fas fa-credit-card me-2 text-primary"></i>Riwayat Tagihan
                    </h4>
                    @if($tagihans->count() > 0)
                        @foreach($tagihans->take(5) as $tagihan)
                        <div class="billing-item {{ $tagihan->status === 'Paid' ? 'billing-paid' : ($tagihan->status === 'Pending' ? 'billing-pending' : 'billing-overdue') }}">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <strong>{{ $tagihan->description ?? 'Tagihan Kuliah' }}</strong><br>
                                    <small class="text-muted">
                                        {{ $tagihan->tahunAkademik->name ?? 'N/A' }} | 
                                        Jatuh Tempo: {{ \Carbon\Carbon::parse($tagihan->due_date)->format('d M Y') }}
                                    </small>
                                </div>
                                <div class="text-end">
                                    <div class="h5 mb-0">Rp {{ number_format($tagihan->amount) }}</div>
                                    <small class="text-muted">{{ ucfirst($tagihan->status) }}</small>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @if($tagihans->count() > 5)
                        <div class="text-center">
                            <a href="#" class="btn btn-outline-primary btn-sm" onclick="showAllBilling()">
                                Lihat Semua Tagihan
                            </a>
                        </div>
                        @endif
                    @else
                        <div class="text-center py-3 text-muted">
                            <i class="fas fa-inbox fa-2x mb-2"></i><br>
                            Belum ada riwayat tagihan
                        </div>
                    @endif
                </div>
            </div>

            <!-- Right Column -->
            <div class="col-lg-4">
                <!-- Quick Actions -->
                <div class="info-card">
                    <h5 class="mb-3">Aksi Cepat</h5>
                    <div class="d-grid gap-2">
                        <button class="btn btn-outline-primary" onclick="generateKTM()">
                            <i class="fas fa-id-card me-2"></i>Generate KTM
                        </button>
                        <button class="btn btn-outline-success" onclick="printTranscript()">
                            <i class="fas fa-file-pdf me-2"></i>Cetak Transkrip
                        </button>
                        <button class="btn btn-outline-info" onclick="viewAcademicRecord()">
                            <i class="fas fa-chart-line me-2"></i>Rekap Nilai
                        </button>
                        <button class="btn btn-outline-warning" onclick="changeStatus()">
                            <i class="fas fa-exchange-alt me-2"></i>Ubah Status
                        </button>
                    </div>
                </div>

                <!-- Recent Activities -->
                <div class="info-card">
                    <h5 class="mb-3">Aktivitas Terbaru</h5>
                    <div class="timeline">
                        @if($academicHistory)
                            @foreach($academicHistory['status_changes'] as $activity)
                            <div class="timeline-item">
                                <div class="small text-muted">{{ $activity['date'] ?? 'N/A' }}</div>
                                <div>{{ $activity['description'] ?? 'No description' }}</div>
                            </div>
                            @endforeach
                        @else
                            <div class="timeline-item">
                                <div class="small text-muted">{{ $mahasiswa->created_at->format('d M Y') }}</div>
                                <div>Pendaftaran mahasiswa</div>
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Statistics -->
                <div class="info-card">
                    <h5 class="mb-3">Statistik Akademik</h5>
                    <div class="row g-2 text-center">
                        <div class="col-6">
                            <div class="h4 mb-1">{{ number_format($mahasiswa->ipk ?? 0, 2) }}</div>
                            <div class="small text-muted">IPK</div>
                        </div>
                        <div class="col-6">
                            <div class="h4 mb-1">{{ $mahasiswa->total_sks ?? 0 }}</div>
                            <div class="small text-muted">Total SKS</div>
                        </div>
                        <div class="col-6">
                            <div class="h4 mb-1">{{ $mahasiswa->semester ?? 0 }}</div>
                            <div class="small text-muted">Semester</div>
                        </div>
                        <div class="col-6">
                            <div class="h4 mb-1">{{ $tagihans->where('status', 'Pending')->count() }}</div>
                            <div class="small text-muted">Tagihan Pending</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('custom-js')
<script>
function editStudent() {
    window.location.href = `{{ route('master.registrasi.manajemen-mahasiswa') }}?edit={{ $mahasiswa->id }}`;
}

function changeStatus() {
    Swal.fire({
        title: 'Ubah Status Mahasiswa',
        html: `
            <div class="mb-3">
                <label class="form-label">Status Baru:</label>
                <select class="form-select" id="newStatus">
                    <option value="1" {{ $mahasiswa->type == 1 ? 'selected' : '' }}>Aktif</option>
                    <option value="2" {{ $mahasiswa->type == 2 ? 'selected' : '' }}>Tidak Aktif</option>
                    <option value="3" {{ $mahasiswa->type == 3 ? 'selected' : '' }}>Lulus</option>
                    <option value="4" {{ $mahasiswa->type == 4 ? 'selected' : '' }}>Cuti</option>
                    <option value="5" {{ $mahasiswa->type == 5 ? 'selected' : '' }}>Pindah</option>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Keterangan:</label>
                <textarea class="form-control" id="statusKeterangan" rows="3" placeholder="Alasan perubahan status..."></textarea>
            </div>
        `,
        showCancelButton: true,
        confirmButtonText: 'Ubah Status',
        preConfirm: () => {
            const status = document.getElementById('newStatus').value;
            const keterangan = document.getElementById('statusKeterangan').value;
            
            return { status, keterangan };
        }
    }).then((result) => {
        if (result.isConfirmed) {
            const form = document.createElement('form');
            form.method = 'POST';
            form.action = `{{ route('master.registrasi.update-status', $mahasiswa->id) }}`;
            form.innerHTML = `
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="status" value="${result.value.status}">
                <input type="hidden" name="keterangan" value="${result.value.keterangan}">
            `;
            document.body.appendChild(form);
            form.submit();
        }
    });
}

function generateKTM() {
    fetch(`{{ route('master.registrasi.generate-ktm', $mahasiswa->id) }}`, {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
            'Content-Type': 'application/json'
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            Swal.fire('Berhasil!', data.message, 'success');
        } else {
            Swal.fire('Error!', data.message || 'Terjadi kesalahan', 'error');
        }
    });
}

function printTranscript() {
    window.open(`{{ route('master.registrasi.transcript', $mahasiswa->id) }}`, '_blank');
}

function viewAcademicRecord() {
    window.location.href = `{{ route('master.registrasi.academic-record', $mahasiswa->id) }}`;
}

function showAllBilling() {
    window.location.href = `{{ route('master.registrasi.billing-history', $mahasiswa->id) }}`;
}
</script>
@endsection