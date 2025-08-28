@extends('core-themes.core-backpage')

@section('custom-css')
<style>
    .applicant-card {
        background: white;
        border-radius: 8px;
        border: 1px solid #e5e7eb;
        margin-bottom: 1rem;
        transition: all 0.3s ease;
    }

    .applicant-card:hover {
        box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        transform: translateY(-1px);
    }

    .applicant-header {
        padding: 1rem;
        border-bottom: 1px solid #f3f4f6;
        background: #f9fafb;
        border-radius: 8px 8px 0 0;
    }

    .applicant-body {
        padding: 1rem;
    }

    .status-badge {
        padding: 0.25rem 0.75rem;
        border-radius: 20px;
        font-size: 0.75rem;
        font-weight: 600;
    }

    .status-lulus { background: #dcfce7; color: #166534; }
    .status-pending { background: #fef3c7; color: #92400e; }

    .batch-action-panel {
        background: #f8fafc;
        border: 1px solid #e2e8f0;
        border-radius: 8px;
        padding: 1rem;
        margin-bottom: 1rem;
        display: none;
    }

    .batch-action-panel.show {
        display: block;
    }

    .selection-counter {
        background: #3b82f6;
        color: white;
        padding: 0.5rem 1rem;
        border-radius: 20px;
        font-size: 0.875rem;
        font-weight: 600;
    }

    .document-list {
        font-size: 0.875rem;
    }

    .document-item {
        padding: 0.25rem 0;
    }

    .document-item.complete {
        color: #059669;
    }

    .document-item.missing {
        color: #dc2626;
    }

    .filter-card {
        background: white;
        border-radius: 8px;
        border: 1px solid #e5e7eb;
        padding: 1rem;
        margin-bottom: 1rem;
    }
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
                    Migrasi PMB ke Mahasiswa
                </h2>
            </div>
            <div class="col-auto ms-auto d-print-none">
                <div class="btn-list">
                    <button type="button" class="btn btn-outline-secondary" onclick="refreshData()">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon me-1" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                            <path d="M20 11a8.1 8.1 0 0 0 -15.5 -2m-.5 -4v4h4"/>
                            <path d="M4 13a8.1 8.1 0 0 0 15.5 2m.5 4v-4h-4"/>
                        </svg>
                        Refresh
                    </button>
                    <button type="button" class="btn btn-success" onclick="showBulkMigration()">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon me-1" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                            <line x1="12" y1="5" x2="12" y2="19"/>
                            <line x1="5" y1="12" x2="19" y2="12"/>
                        </svg>
                        Migrasi Terpilih
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="page-body">
    <div class="container-xl">
        <!-- Filter Section -->
        <div class="filter-card">
            <form method="GET" action="{{ route('master.registrasi.pending-pmb') }}">
                <div class="row g-3">
                    <div class="col-md-4">
                        <label class="form-label">Cari Pendaftar</label>
                        <input type="text" name="search" class="form-control" 
                               placeholder="Nama, No. Registrasi, NIK..." 
                               value="{{ request('search') }}">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Jalur Pendaftaran</label>
                        <select name="jalur_id" class="form-select">
                            <option value="">Semua Jalur</option>
                            @foreach($jalurs ?? [] as $jalur)
                                <option value="{{ $jalur->id }}" 
                                        {{ request('jalur_id') == $jalur->id ? 'selected' : '' }}>
                                    {{ $jalur->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Program Studi</label>
                        <select name="prodi_id" class="form-select">
                            <option value="">Semua Prodi</option>
                            @foreach($programStudis ?? [] as $prodi)
                                <option value="{{ $prodi->id }}" 
                                        {{ request('prodi_id') == $prodi->id ? 'selected' : '' }}>
                                    {{ $prodi->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label class="form-label">&nbsp;</label>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">Filter</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <!-- Batch Action Panel -->
        <div class="batch-action-panel" id="batchActionPanel">
            <div class="row align-items-center">
                <div class="col">
                    <div class="d-flex align-items-center">
                        <span class="selection-counter" id="selectionCounter">0 dipilih</span>
                        <span class="ms-3 text-muted">Pilih pendaftar untuk migrasi massal</span>
                    </div>
                </div>
                <div class="col-auto">
                    <div class="btn-list">
                        <button type="button" class="btn btn-outline-danger" onclick="clearSelection()">
                            Batal
                        </button>
                        <button type="button" class="btn btn-success" onclick="processBulkMigration()">
                            Migrasi Terpilih
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Results Summary -->
        @if($pendingApplicants->count() > 0)
        <div class="row mb-3">
            <div class="col">
                <div class="alert alert-info">
                    <div class="d-flex align-items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon me-2" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                            <circle cx="12" cy="12" r="9"/>
                            <path d="M12 8v4"/>
                            <path d="M12 16h.01"/>
                        </svg>
                        <div>
                            <strong>{{ $pendingApplicants->total() }}</strong> pendaftar siap untuk dimigrasi menjadi mahasiswa.
                            Pastikan data telah diverifikasi sebelum melakukan migrasi.
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif

        <!-- Applicants List -->
        @if($pendingApplicants->count() > 0)
            <form id="bulkMigrationForm" method="POST" action="{{ route('master.registrasi.migrate-bulk') }}">
                @csrf
                @foreach($pendingApplicants as $applicant)
                <div class="applicant-card">
                    <div class="applicant-header">
                        <div class="row align-items-center">
                            <div class="col-auto">
                                <input type="checkbox" class="form-check-input applicant-checkbox" 
                                       name="selected_applicants[]" 
                                       value="{{ $applicant->id }}"
                                       onchange="updateSelection()">
                            </div>
                            <div class="col">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div>
                                        <h4 class="mb-1">{{ $applicant->name }}</h4>
                                        <div class="text-muted">
                                            <span class="me-3">No. Reg: <strong>{{ $applicant->numb_reg }}</strong></span>
                                            <span class="me-3">NIK: {{ $applicant->nik ?? 'N/A' }}</span>
                                            <span class="status-badge status-lulus">{{ $applicant->status }}</span>
                                        </div>
                                    </div>
                                    <div class="text-end">
                                        <button type="button" class="btn btn-primary btn-sm" 
                                                onclick="migrateSingle({{ $applicant->id }})">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon me-1" width="16" height="16" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                                <line x1="12" y1="5" x2="12" y2="19"/>
                                                <line x1="5" y1="12" x2="19" y2="12"/>
                                            </svg>
                                            Migrasi
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="applicant-body">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <h6 class="mb-2">Informasi Akademik</h6>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <small class="text-muted">Pilihan 1:</small><br>
                                        <strong>{{ $applicant->programStudi1->name ?? 'N/A' }}</strong>
                                    </div>
                                    <div class="col-sm-6">
                                        <small class="text-muted">Jalur:</small><br>
                                        {{ $applicant->jalur->name ?? 'N/A' }}
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-sm-6">
                                        <small class="text-muted">Gelombang:</small><br>
                                        {{ $applicant->gelombang->name ?? 'N/A' }}
                                    </div>
                                    <div class="col-sm-6">
                                        <small class="text-muted">Tahun Daftar:</small><br>
                                        {{ $applicant->created_at->format('Y') }}
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <h6 class="mb-2">Kontak</h6>
                                <div class="mb-1">
                                    <small class="text-muted">Email:</small><br>
                                    <span class="text-primary">{{ $applicant->email ?? 'N/A' }}</span>
                                </div>
                                <div>
                                    <small class="text-muted">Phone:</small><br>
                                    {{ $applicant->phone ?? 'N/A' }}
                                </div>
                            </div>
                            <div class="col-md-3">
                                <h6 class="mb-2">Status Dokumen</h6>
                                <div class="document-list">
                                    @php
                                        $documents = [
                                            'Ijazah' => $applicant->dokumen_ijazah ?? false,
                                            'Transkrip' => $applicant->dokumen_transkrip ?? false,
                                            'KTP' => $applicant->dokumen_ktp ?? false,
                                            'Foto' => $applicant->dokumen_foto ?? false,
                                        ];
                                    @endphp
                                    @foreach($documents as $docName => $docStatus)
                                    <div class="document-item {{ $docStatus ? 'complete' : 'missing' }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-sm me-1" width="16" height="16" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            @if($docStatus)
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                                <path d="M5 12l5 5l10 -10"/>
                                            @else
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                                <path d="M18 6l-12 12"/>
                                                <path d="M6 6l12 12"/>
                                            @endif
                                        </svg>
                                        {{ $docName }}
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col">
                                <div class="d-flex align-items-center text-muted">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon me-2" width="16" height="16" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                        <circle cx="12" cy="12" r="9"/>
                                        <polyline points="12,7 12,12 15,15"/>
                                    </svg>
                                    Lulus seleksi: {{ $applicant->updated_at->format('d M Y, H:i') }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </form>

            <!-- Pagination -->
            <div class="d-flex justify-content-center">
                {{ $pendingApplicants->appends(request()->query())->links() }}
            </div>
        @else
            <div class="empty">
                <div class="empty-img">
                    <img src="{{ asset('images/empty-state.svg') }}" height="128" alt="No data">
                </div>
                <p class="empty-title">Tidak ada pendaftar yang siap migrasi</p>
                <p class="empty-subtitle text-muted">
                    Belum ada pendaftar dengan status "Lulus" yang siap untuk dimigrasi menjadi mahasiswa.
                </p>
                <div class="empty-action">
                    <a href="{{ route('pmb.index') }}" class="btn btn-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon me-1" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                            <path d="M12 5l0 14"/>
                            <path d="M5 12l14 0"/>
                        </svg>
                        Kelola PMB
                    </a>
                </div>
            </div>
        @endif
    </div>
</div>
@endsection

@section('custom-js')
<script>
let selectedApplicants = [];

function updateSelection() {
    selectedApplicants = [];
    document.querySelectorAll('.applicant-checkbox:checked').forEach(checkbox => {
        selectedApplicants.push(checkbox.value);
    });
    
    const counter = document.getElementById('selectionCounter');
    const panel = document.getElementById('batchActionPanel');
    
    if (selectedApplicants.length > 0) {
        counter.textContent = `${selectedApplicants.length} dipilih`;
        panel.classList.add('show');
    } else {
        panel.classList.remove('show');
    }
}

function clearSelection() {
    document.querySelectorAll('.applicant-checkbox').forEach(checkbox => {
        checkbox.checked = false;
    });
    updateSelection();
}

function showBulkMigration() {
    if (selectedApplicants.length === 0) {
        Swal.fire({
            title: 'Pilih Pendaftar',
            text: 'Silakan pilih minimal satu pendaftar untuk migrasi massal.',
            icon: 'warning',
            confirmButtonText: 'OK'
        });
        return;
    }
    
    processBulkMigration();
}

function processBulkMigration() {
    if (selectedApplicants.length === 0) {
        Swal.fire({
            title: 'Tidak Ada yang Dipilih',
            text: 'Silakan pilih pendaftar yang akan dimigrasi.',
            icon: 'warning'
        });
        return;
    }
    
    Swal.fire({
        title: 'Konfirmasi Migrasi Massal',
        html: `
            <p>Anda akan melakukan migrasi <strong>${selectedApplicants.length} pendaftar</strong> menjadi mahasiswa.</p>
            <div class="alert alert-warning mt-3">
                <strong>Perhatian:</strong> Proses ini tidak dapat dibatalkan. 
                Pastikan data sudah benar sebelum melanjutkan.
            </div>
        `,
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, Migrasi!',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            // Show loading
            Swal.fire({
                title: 'Memproses Migrasi...',
                text: 'Mohon tunggu, sedang memproses migrasi pendaftar.',
                allowOutsideClick: false,
                showConfirmButton: false,
                willOpen: () => {
                    Swal.showLoading();
                }
            });
            
            // Submit form
            document.getElementById('bulkMigrationForm').submit();
        }
    });
}

function migrateSingle(applicantId) {
    Swal.fire({
        title: 'Konfirmasi Migrasi',
        text: 'Apakah Anda yakin ingin melakukan migrasi pendaftar ini menjadi mahasiswa?',
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, Migrasi!',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            // Show loading
            Swal.fire({
                title: 'Memproses Migrasi...',
                text: 'Mohon tunggu, sedang memproses migrasi pendaftar.',
                allowOutsideClick: false,
                showConfirmButton: false,
                willOpen: () => {
                    Swal.showLoading();
                }
            });
            
            // Redirect to single migration
            window.location.href = `{{ route('master.registrasi.migrate-single', '') }}/${applicantId}`;
        }
    });
}

function refreshData() {
    window.location.reload();
}

// Select all checkbox functionality
document.addEventListener('DOMContentLoaded', function() {
    // Add select all checkbox if needed
    const selectAllBtn = document.createElement('button');
    selectAllBtn.type = 'button';
    selectAllBtn.className = 'btn btn-outline-primary btn-sm';
    selectAllBtn.innerHTML = '<i class="fas fa-check-square me-1"></i>Pilih Semua';
    selectAllBtn.onclick = function() {
        const checkboxes = document.querySelectorAll('.applicant-checkbox');
        const allChecked = Array.from(checkboxes).every(cb => cb.checked);
        
        checkboxes.forEach(checkbox => {
            checkbox.checked = !allChecked;
        });
        
        updateSelection();
        
        selectAllBtn.innerHTML = allChecked ? 
            '<i class="fas fa-check-square me-1"></i>Pilih Semua' : 
            '<i class="fas fa-square me-1"></i>Batal Pilih';
    };
    
    // Add to filter section if applicants exist
    const filterCard = document.querySelector('.filter-card');
    if (filterCard && {{ $pendingApplicants->count() > 0 ? 'true' : 'false' }}) {
        const selectAllContainer = document.createElement('div');
        selectAllContainer.className = 'col-md-2';
        selectAllContainer.innerHTML = '<label class="form-label">&nbsp;</label><div class="d-grid"></div>';
        selectAllContainer.querySelector('.d-grid').appendChild(selectAllBtn);
        
        filterCard.querySelector('.row').appendChild(selectAllContainer);
    }
});
</script>
@endsection