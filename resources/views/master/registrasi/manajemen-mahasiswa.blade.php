@extends('core-themes.core-backpage')

@section('custom-css')
<style>
    .student-card {
        background: white;
        border-radius: 8px;
        border: 1px solid #e5e7eb;
        margin-bottom: 1rem;
        transition: all 0.3s ease;
    }

    .student-card:hover {
        box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        transform: translateY(-1px);
    }

    .student-avatar {
        width: 60px;
        height: 60px;
        border-radius: 50%;
        background: linear-gradient(135deg, #3b82f6, #1e40af);
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-weight: 600;
        font-size: 1.25rem;
    }

    .status-badge {
        padding: 0.25rem 0.75rem;
        border-radius: 20px;
        font-size: 0.75rem;
        font-weight: 600;
        border: none;
    }

    .status-active { background: #dcfce7; color: #166534; }
    .status-inactive { background: #fef3c7; color: #92400e; }
    .status-graduated { background: #ddd6fe; color: #5b21b6; }
    .status-cuti { background: #fecaca; color: #991b1b; }
    .status-pindah { background: #e0e7ff; color: #3730a3; }

    .filter-section {
        background: white;
        border-radius: 8px;
        border: 1px solid #e5e7eb;
        padding: 1.5rem;
        margin-bottom: 1.5rem;
    }

    .quick-stats {
        background: linear-gradient(135deg, #f8fafc, #e2e8f0);
        border-radius: 8px;
        padding: 1rem;
        margin-bottom: 1.5rem;
    }

    .stat-item {
        text-align: center;
        padding: 0.5rem;
    }

    .stat-number {
        font-size: 1.5rem;
        font-weight: 700;
        color: #1e40af;
    }

    .stat-label {
        font-size: 0.75rem;
        color: #64748b;
        font-weight: 500;
    }

    .action-dropdown .dropdown-menu {
        min-width: 200px;
    }

    .search-highlight {
        background-color: #fef3c7;
        padding: 0.125rem 0.25rem;
        border-radius: 3px;
    }

    .table-responsive-custom {
        max-height: 70vh;
        overflow-y: auto;
    }

    .table-fixed-header thead th {
        position: sticky;
        top: 0;
        background: white;
        z-index: 10;
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
                    Manajemen Mahasiswa
                </h2>
            </div>
            <div class="col-auto ms-auto d-print-none">
                <div class="btn-list">
                    <div class="dropdown">
                        <button class="btn btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon me-1" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                <path d="M14 3v4a1 1 0 0 0 1 1h4"/>
                                <path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z"/>
                            </svg>
                            Export
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#" onclick="exportData('excel')">
                                <i class="fas fa-file-excel me-2 text-success"></i>Excel
                            </a></li>
                            <li><a class="dropdown-item" href="#" onclick="exportData('pdf')">
                                <i class="fas fa-file-pdf me-2 text-danger"></i>PDF
                            </a></li>
                            <li><a class="dropdown-item" href="#" onclick="exportData('csv')">
                                <i class="fas fa-file-csv me-2 text-info"></i>CSV
                            </a></li>
                        </ul>
                    </div>
                    <button type="button" class="btn btn-primary" onclick="showImportModal()">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon me-1" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                            <line x1="12" y1="5" x2="12" y2="19"/>
                            <line x1="5" y1="12" x2="19" y2="12"/>
                        </svg>
                        Import Data
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="page-body">
    <div class="container-xl">
        
        <!-- Quick Statistics -->
        <div class="quick-stats">
            <div class="row text-center">
                <div class="col-6 col-md-3">
                    <div class="stat-item">
                        <div class="stat-number">{{ $mahasiswas->total() }}</div>
                        <div class="stat-label">Total Mahasiswa</div>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="stat-item">
                        <div class="stat-number">{{ $mahasiswas->where('type', 1)->count() }}</div>
                        <div class="stat-label">Aktif</div>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="stat-item">
                        <div class="stat-number">{{ $mahasiswas->where('type', 4)->count() }}</div>
                        <div class="stat-label">Cuti</div>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="stat-item">
                        <div class="stat-number">{{ $mahasiswas->where('type', 3)->count() }}</div>
                        <div class="stat-label">Lulus</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Filter Section -->
        <div class="filter-section">
            <form method="GET" action="{{ route('master.registrasi.manajemen-mahasiswa') }}">
                <div class="row g-3">
                    <div class="col-md-3">
                        <label class="form-label">Cari Mahasiswa</label>
                        <input type="text" name="search" class="form-control" 
                               placeholder="Nama, NIM, Email..." 
                               value="{{ request('search') }}">
                    </div>
                    <div class="col-md-2">
                        <label class="form-label">Program Studi</label>
                        <select name="prodi_id" class="form-select">
                            <option value="">Semua Prodi</option>
                            @foreach($programStudis as $prodi)
                                <option value="{{ $prodi->id }}" 
                                        {{ request('prodi_id') == $prodi->id ? 'selected' : '' }}>
                                    {{ $prodi->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label class="form-label">Status</label>
                        <select name="status" class="form-select">
                            <option value="">Semua Status</option>
                            <option value="1" {{ request('status') == '1' ? 'selected' : '' }}>Aktif</option>
                            <option value="2" {{ request('status') == '2' ? 'selected' : '' }}>Tidak Aktif</option>
                            <option value="3" {{ request('status') == '3' ? 'selected' : '' }}>Lulus</option>
                            <option value="4" {{ request('status') == '4' ? 'selected' : '' }}>Cuti</option>
                            <option value="5" {{ request('status') == '5' ? 'selected' : '' }}>Pindah</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label class="form-label">Tahun Masuk</label>
                        <select name="tahun_masuk" class="form-select">
                            <option value="">Semua Tahun</option>
                            @foreach($tahunAkademiks as $taka)
                                <option value="{{ $taka->id }}" 
                                        {{ request('tahun_masuk') == $taka->id ? 'selected' : '' }}>
                                    {{ $taka->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label class="form-label">Aksi</label>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">Filter</button>
                        </div>
                    </div>
                    <div class="col-md-1">
                        <label class="form-label">&nbsp;</label>
                        <div class="d-grid">
                            <a href="{{ route('master.registrasi.manajemen-mahasiswa') }}" class="btn btn-outline-secondary">Reset</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <!-- Results -->
        @if($mahasiswas->count() > 0)
            <!-- View Toggle -->
            <div class="row mb-3">
                <div class="col">
                    <div class="btn-group" role="group">
                        <input type="radio" class="btn-check" name="viewType" id="cardView" autocomplete="off" checked onchange="toggleView('card')">
                        <label class="btn btn-outline-primary" for="cardView">
                            <i class="fas fa-th-large me-1"></i>Card
                        </label>
                        
                        <input type="radio" class="btn-check" name="viewType" id="tableView" autocomplete="off" onchange="toggleView('table')">
                        <label class="btn btn-outline-primary" for="tableView">
                            <i class="fas fa-table me-1"></i>Table
                        </label>
                    </div>
                </div>
                <div class="col-auto">
                    <span class="text-muted">
                        Menampilkan {{ $mahasiswas->firstItem() ?? 0 }}-{{ $mahasiswas->lastItem() ?? 0 }} 
                        dari {{ $mahasiswas->total() }} mahasiswa
                    </span>
                </div>
            </div>

            <!-- Card View -->
            <div id="cardViewContainer">
                @foreach($mahasiswas as $mahasiswa)
                <div class="student-card">
                    <div class="card-body p-3">
                        <div class="row align-items-center">
                            <div class="col-auto">
                                <div class="student-avatar">
                                    {{ substr($mahasiswa->name, 0, 1) }}
                                </div>
                            </div>
                            <div class="col">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h4 class="mb-1">
                                            <a href="{{ route('master.registrasi.detail-mahasiswa', $mahasiswa->id) }}" 
                                               class="text-decoration-none">
                                                {{ $mahasiswa->name }}
                                            </a>
                                        </h4>
                                        <div class="text-muted mb-2">
                                            <span class="me-3">NIM: <strong>{{ $mahasiswa->nim }}</strong></span>
                                            <span class="me-3">{{ $mahasiswa->programStudi->name ?? 'N/A' }}</span>
                                        </div>
                                        <div class="mb-2">
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
                                                @case(5)
                                                    <span class="status-badge status-pindah">Pindah</span>
                                                    @break
                                                @default
                                                    <span class="status-badge">{{ $mahasiswa->type }}</span>
                                            @endswitch
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-2">
                                            <small class="text-muted">Email:</small><br>
                                            <span class="text-primary">{{ $mahasiswa->email ?? 'N/A' }}</span>
                                        </div>
                                        <div class="mb-2">
                                            <small class="text-muted">Kelas:</small><br>
                                            {{ $mahasiswa->kelas->name ?? 'Belum ada kelas' }}
                                        </div>
                                        <div>
                                            <small class="text-muted">Tahun Masuk:</small><br>
                                            {{ $mahasiswa->tahunAkademikRegistrasi->name ?? 'N/A' }}
                                        </div>
                                    </div>
                                    <div class="col-md-2 text-end">
                                        <div class="action-dropdown">
                                            <div class="dropdown">
                                                <button class="btn btn-outline-primary btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                                    Aksi
                                                </button>
                                                <ul class="dropdown-menu">
                                                    <li>
                                                        <a class="dropdown-item" href="{{ route('master.registrasi.detail-mahasiswa', $mahasiswa->id) }}">
                                                            <i class="fas fa-eye me-2"></i>Detail
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item" href="#" onclick="editStudent({{ $mahasiswa->id }})">
                                                            <i class="fas fa-edit me-2"></i>Edit
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item" href="#" onclick="changeStatus({{ $mahasiswa->id }}, '{{ $mahasiswa->name }}')">
                                                            <i class="fas fa-exchange-alt me-2"></i>Ubah Status
                                                        </a>
                                                    </li>
                                                    <li><hr class="dropdown-divider"></li>
                                                    <li>
                                                        <a class="dropdown-item" href="#" onclick="generateKTM({{ $mahasiswa->id }})">
                                                            <i class="fas fa-id-card me-2"></i>Generate KTM
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item" href="#" onclick="printTranscript({{ $mahasiswa->id }})">
                                                            <i class="fas fa-file-pdf me-2"></i>Transkrip
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <!-- Table View (Hidden by default) -->
            <div id="tableViewContainer" style="display: none;">
                <div class="card">
                    <div class="table-responsive table-responsive-custom">
                        <table class="table table-vcenter table-fixed-header">
                            <thead>
                                <tr>
                                    <th>NIM</th>
                                    <th>Nama</th>
                                    <th>Program Studi</th>
                                    <th>Kelas</th>
                                    <th>Status</th>
                                    <th>Tahun Masuk</th>
                                    <th>Email</th>
                                    <th class="w-1">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($mahasiswas as $mahasiswa)
                                <tr>
                                    <td>{{ $mahasiswa->nim }}</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <span class="avatar bg-primary text-white me-2">
                                                {{ substr($mahasiswa->name, 0, 1) }}
                                            </span>
                                            <strong>{{ $mahasiswa->name }}</strong>
                                        </div>
                                    </td>
                                    <td>{{ $mahasiswa->programStudi->name ?? 'N/A' }}</td>
                                    <td>{{ $mahasiswa->kelas->name ?? '-' }}</td>
                                    <td>
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
                                            @case(5)
                                                <span class="status-badge status-pindah">Pindah</span>
                                                @break
                                        @endswitch
                                    </td>
                                    <td>{{ $mahasiswa->tahunAkademikRegistrasi->name ?? 'N/A' }}</td>
                                    <td>{{ $mahasiswa->email ?? 'N/A' }}</td>
                                    <td>
                                        <div class="dropdown">
                                            <button class="btn btn-outline-primary btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                                Aksi
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <a class="dropdown-item" href="{{ route('master.registrasi.detail-mahasiswa', $mahasiswa->id) }}">
                                                        <i class="fas fa-eye me-2"></i>Detail
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="#" onclick="changeStatus({{ $mahasiswa->id }}, '{{ $mahasiswa->name }}')">
                                                        <i class="fas fa-exchange-alt me-2"></i>Ubah Status
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Pagination -->
            <div class="d-flex justify-content-center mt-3">
                {{ $mahasiswas->appends(request()->query())->links() }}
            </div>
        @else
            <div class="empty">
                <div class="empty-img">
                    <img src="{{ asset('images/empty-state.svg') }}" height="128" alt="No data">
                </div>
                <p class="empty-title">Tidak ada mahasiswa yang ditemukan</p>
                <p class="empty-subtitle text-muted">
                    Coba ubah kriteria pencarian atau filter yang digunakan.
                </p>
            </div>
        @endif
    </div>
</div>
@endsection

@section('custom-js')
<script>
function toggleView(viewType) {
    const cardContainer = document.getElementById('cardViewContainer');
    const tableContainer = document.getElementById('tableViewContainer');
    
    if (viewType === 'table') {
        cardContainer.style.display = 'none';
        tableContainer.style.display = 'block';
    } else {
        cardContainer.style.display = 'block';
        tableContainer.style.display = 'none';
    }
}

function changeStatus(studentId, studentName) {
    Swal.fire({
        title: `Ubah Status Mahasiswa`,
        html: `
            <p class="mb-3">Mahasiswa: <strong>${studentName}</strong></p>
            <div class="mb-3">
                <label class="form-label">Status Baru:</label>
                <select class="form-select" id="newStatus">
                    <option value="1">Aktif</option>
                    <option value="2">Tidak Aktif</option>
                    <option value="3">Lulus</option>
                    <option value="4">Cuti</option>
                    <option value="5">Pindah</option>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Keterangan:</label>
                <textarea class="form-control" id="statusKeterangan" rows="3" placeholder="Alasan perubahan status..."></textarea>
            </div>
        `,
        showCancelButton: true,
        confirmButtonText: 'Ubah Status',
        cancelButtonText: 'Batal',
        preConfirm: () => {
            const status = document.getElementById('newStatus').value;
            const keterangan = document.getElementById('statusKeterangan').value;
            
            if (!keterangan.trim()) {
                Swal.showValidationMessage('Keterangan harus diisi');
                return false;
            }
            
            return { status, keterangan };
        }
    }).then((result) => {
        if (result.isConfirmed) {
            const { status, keterangan } = result.value;
            
            // Create form and submit
            const form = document.createElement('form');
            form.method = 'POST';
            form.action = `{{ route('master.registrasi.update-status', '') }}/${studentId}`;
            
            const csrfToken = document.createElement('input');
            csrfToken.type = 'hidden';
            csrfToken.name = '_token';
            csrfToken.value = '{{ csrf_token() }}';
            
            const statusInput = document.createElement('input');
            statusInput.type = 'hidden';
            statusInput.name = 'status';
            statusInput.value = status;
            
            const keteranganInput = document.createElement('input');
            keteranganInput.type = 'hidden';
            keteranganInput.name = 'keterangan';
            keteranganInput.value = keterangan;
            
            form.appendChild(csrfToken);
            form.appendChild(statusInput);
            form.appendChild(keteranganInput);
            
            document.body.appendChild(form);
            form.submit();
        }
    });
}

function generateKTM(studentId) {
    Swal.fire({
        title: 'Generate KTM',
        text: 'Apakah Anda yakin ingin generate KTM untuk mahasiswa ini?',
        icon: 'question',
        showCancelButton: true,
        confirmButtonText: 'Ya, Generate!',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            fetch(`{{ route('master.registrasi.generate-ktm', '') }}/${studentId}`, {
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
            })
            .catch(error => {
                Swal.fire('Error!', 'Terjadi kesalahan saat generate KTM', 'error');
            });
        }
    });
}

function editStudent(studentId) {
    window.location.href = `{{ route('master.registrasi.detail-mahasiswa', '') }}/${studentId}?mode=edit`;
}

function printTranscript(studentId) {
    window.open(`{{ route('master.registrasi.transcript', '') }}/${studentId}`, '_blank');
}

function exportData(format) {
    const params = new URLSearchParams(window.location.search);
    params.set('export', format);
    
    window.location.href = `{{ route('master.registrasi.export') }}?${params.toString()}`;
}

function showImportModal() {
    Swal.fire({
        title: 'Import Data Mahasiswa',
        html: `
            <div class="mb-3">
                <label class="form-label">Template Excel:</label>
                <div class="d-grid">
                    <a href="{{ route('master.registrasi.download-template') }}" class="btn btn-outline-primary btn-sm">
                        <i class="fas fa-download me-1"></i>Download Template
                    </a>
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label">File Excel:</label>
                <input type="file" class="form-control" id="importFile" accept=".xlsx,.xls">
            </div>
        `,
        showCancelButton: true,
        confirmButtonText: 'Import',
        cancelButtonText: 'Batal',
        preConfirm: () => {
            const file = document.getElementById('importFile').files[0];
            if (!file) {
                Swal.showValidationMessage('Pilih file yang akan diimport');
                return false;
            }
            return file;
        }
    }).then((result) => {
        if (result.isConfirmed) {
            const formData = new FormData();
            formData.append('file', result.value);
            formData.append('_token', '{{ csrf_token() }}');
            
            fetch('{{ route("master.registrasi.import") }}', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    Swal.fire('Berhasil!', data.message, 'success')
                        .then(() => location.reload());
                } else {
                    Swal.fire('Error!', data.message || 'Terjadi kesalahan', 'error');
                }
            })
            .catch(error => {
                Swal.fire('Error!', 'Terjadi kesalahan saat import data', 'error');
            });
        }
    });
}

// Auto-submit form on filter change
document.addEventListener('DOMContentLoaded', function() {
    const filterForm = document.querySelector('.filter-section form');
    const selectElements = filterForm.querySelectorAll('select');
    
    selectElements.forEach(select => {
        select.addEventListener('change', function() {
            if (this.value !== '' || document.querySelector('input[name="search"]').value !== '') {
                filterForm.submit();
            }
        });
    });
});
</script>
@endsection