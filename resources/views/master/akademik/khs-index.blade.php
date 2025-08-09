@extends('core-themes.core-backpage')

@section('custom-css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
    <style>
        /* Stats cards */
        .bg-light-primary {
            background-color: rgba(67, 94, 190, 0.1);
        }

        .bg-light-success {
            background-color: rgba(40, 167, 69, 0.1);
        }

        .bg-light-warning {
            background-color: rgba(255, 193, 7, 0.1);
        }

        .bg-light-info {
            background-color: rgba(23, 162, 184, 0.1);
        }

        .bg-light-danger {
            background-color: rgba(220, 53, 69, 0.1);
        }

        /* Card styling */
        .card {
            border: none;
            box-shadow: 0 0 10px rgba(0,0,0,0.05);
            border-radius: 10px;
        }

        .card-header {
            background: none;
            border-bottom: 1px solid rgba(0,0,0,0.05);
            padding: 1.5rem;
        }

        .card-body {
            padding: 1.5rem;
        }

        /* Table styling */
        .table {
            margin-bottom: 0;
        }

        .table thead th {
            border-top: none;
            border-bottom: 2px solid rgba(0,0,0,0.05);
            font-weight: 600;
            color: #6c757d;
            padding-top: 1rem;
            padding-bottom: 0.75rem;
            text-align: left;
        }

        .table td {
            vertical-align: middle;
            padding-top: 0.75rem;
            padding-bottom: 0.75rem;
            text-align: left;
        }

        .table th.text-center, .table td.text-center {
            text-align: center !important;
        }

        /* Button styling */
        .btn {
            padding: 0.5rem 1rem;
            border-radius: 5px;
        }

        .btn-sm {
            padding: 0.25rem 0.5rem;
        }

        /* Form styling */
        .form-control, .form-select {
            border-radius: 5px;
            border: 1px solid rgba(0,0,0,0.1);
            padding: 0.5rem 1rem;
        }

        .form-control:focus, .form-select:focus {
            border-color: #435ebe;
            box-shadow: 0 0 0 0.2rem rgba(67, 94, 190, 0.25);
        }

        /* Badge styling */
        .badge {
            padding: 0.5em 0.75em;
            font-weight: 500;
        }

        /* IPK display */
        .ipk-display {
            font-size: 1.5rem;
            font-weight: bold;
        }

        /* Collapsible form */
        .collapse {
            transition: all 0.3s ease;
        }

        .collapse.show {
            margin-top: 1rem;
        }

        /* Responsive styling */
        @media (max-width: 768px) {
            .table-responsive table,
            .table-responsive thead,
            .table-responsive tbody,
            .table-responsive th,
            .table-responsive td,
            .table-responsive tr {
                display: block;
                width: 100%;
            }
            .table-responsive thead {
                display: none;
            }
            .table-responsive tr {
                margin-bottom: 1rem;
                border-bottom: 2px solid #eee;
            }
            .table-responsive td {
                position: relative;
                padding-left: 50%;
                text-align: left !important;
                border: none;
                border-bottom: 1px solid #eee;
            }
            .table-responsive td:before {
                position: absolute;
                top: 0;
                left: 0;
                width: 48%;
                padding-left: 1rem;
                white-space: nowrap;
                font-weight: bold;
                color: #888;
                content: attr(data-label);
            }
        }
    </style>
@endsection

@section('content')
    <div class="row">
        <!-- Main Content -->
        <div class="col-lg-8 col-12 mb-2">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">{{ $pages }}</h5>
                    <div class="d-flex gap-2">
                        <button class="btn btn-info btn-sm" onclick="showGenerateModal()">
                            <i class="fas fa-cog me-2"></i>Generate KHS
                        </button>
                        <button class="btn btn-success btn-sm" onclick="bulkAction('publish')">
                            <i class="fas fa-share me-2"></i>Publish Terpilih
                        </button>
                        <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseForm" aria-expanded="false" aria-controls="collapseForm">
                            <i class="fas fa-plus-circle me-2"></i>Tambah KHS
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <!-- Quick Stats -->
                    <div class="row mb-4">
                        <div class="col-lg-2 col-md-4 mb-2">
                            <div class="p-3 bg-light-primary rounded">
                                <h6 class="mb-2">Total KHS</h6>
                                <h3 class="mb-0">{{ count($khs_list) }}</h3>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-4 mb-2">
                            <div class="p-3 bg-light-warning rounded">
                                <h6 class="mb-2">Draft</h6>
                                <h3 class="mb-0">{{ $khs_list->where('status', 'draft')->count() }}</h3>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-4 mb-2">
                            <div class="p-3 bg-light-success rounded">
                                <h6 class="mb-2">Published</h6>
                                <h3 class="mb-0">{{ $khs_list->where('status', 'published')->count() }}</h3>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-4 mb-2">
                            <div class="p-3 bg-light-info rounded">
                                <h6 class="mb-2">Rata-rata IPK</h6>
                                <h3 class="mb-0">{{ number_format($khs_list->avg('ipk'), 2) }}</h3>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-4 mb-2">
                            <div class="p-3 bg-light-success rounded">
                                <h6 class="mb-2">IPK ≥ 3.0</h6>
                                <h3 class="mb-0">{{ $khs_list->where('ipk', '>=', 3.0)->count() }}</h3>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-4 mb-2">
                            <div class="p-3 bg-light-danger rounded">
                                <h6 class="mb-2">IPK < 3.0</h6>
                                <h3 class="mb-0">{{ $khs_list->where('ipk', '<', 3.0)->count() }}</h3>
                            </div>
                        </div>
                    </div>

                    <!-- Collapsible Form -->
                    <div class="collapse" id="collapseForm">
                        <div class="card card-body border">
                            <h5 class="card-title mb-3">Tambah KHS Baru</h5>
                            <form action="{{ route($spref . 'akademik.khs-handle') }}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="mahasiswa_id" class="form-label">Mahasiswa</label>
                                        <select class="form-select" name="mahasiswa_id" id="mahasiswa_id" required>
                                            <option value="">Pilih Mahasiswa</option>
                                            @foreach ($mahasiswa as $m)
                                                <option value="{{ $m->id }}">{{ $m->nim }} - {{ $m->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('mahasiswa_id')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="tahun_akademik_id" class="form-label">Tahun Akademik</label>
                                        <select class="form-select" name="tahun_akademik_id" id="tahun_akademik_id" required>
                                            <option value="">Pilih Tahun Akademik</option>

                                            @foreach ($tahun_akademik as $ta)
                                                <option value="{{ $ta->id }}" {{ $ta->status == 'Aktif' ? 'selected' : '' }}>
                                                    {{ $ta->name }} - {{ $ta->type }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('tahun_akademik_id')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="semester" class="form-label">Semester</label>
                                        <select class="form-select" name="semester" id="semester" required>
                                            <option value="">Pilih Semester</option>
                                            @for ($i = 1; $i <= 8; $i++)
                                                <option value="{{ $i }}">Semester {{ $i }}</option>
                                            @endfor
                                        </select>
                                        @error('semester')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="krs_id" class="form-label">KRS</label>
                                        <select class="form-select" name="krs_id" id="krs_id">
                                            <option value="">Pilih KRS (Opsional)</option>
                                            @foreach ($krs_list as $krs)
                                                <option value="{{ $krs->id }}">
                                                    {{ $krs->mahasiswa->name }} - {{ $krs->tahunAkademik->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('krs_id')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end gap-2">
                                    <button type="button" class="btn btn-secondary" data-bs-toggle="collapse" data-bs-target="#collapseForm">
                                        <i class="fas fa-times me-2"></i>Batal
                                    </button>
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-save me-2"></i>Simpan KHS
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- Filter Section -->
                    <div class="row mb-3">
                        <div class="col-md-3">
                            <select class="form-select" id="filterTahunAkademik" onchange="filterTable()">
                                <option value="">Semua Tahun Akademik</option>
                                @foreach ($tahun_akademik as $ta)
                                    <option value="{{ $ta->name }}">{{ $ta->name }} - {{ $ta->semester }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3">
                            <select class="form-select" id="filterStatus" onchange="filterTable()">
                                <option value="">Semua Status</option>
                                <option value="draft">Draft</option>
                                <option value="published">Published</option>
                                <option value="locked">Locked</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <select class="form-select" id="filterSemester" onchange="filterTable()">
                                <option value="">Semua Semester</option>
                                @for ($i = 1; $i <= 8; $i++)
                                    <option value="{{ $i }}">Semester {{ $i }}</option>
                                @endfor
                            </select>
                        </div>
                        <div class="col-md-3">
                            <input type="text" class="form-control" id="searchInput" placeholder="Cari mahasiswa..." onkeyup="filterTable()">
                        </div>
                    </div>

                    <!-- KHS Table -->
                    <div class="table-responsive">
                        <table class="table table-hover" id="khsTable">
                            <thead>
                                <tr>
                                    <th class="text-center">
                                        <input type="checkbox" id="selectAll" onchange="toggleSelectAll()">
                                    </th>
                                    <th>Mahasiswa</th>
                                    <th>Tahun Akademik</th>
                                    <th class="text-center">Semester</th>
                                    <th class="text-center">SKS Tempuh</th>
                                    <th class="text-center">SKS Lulus</th>
                                    <th class="text-center">IPS</th>
                                    <th class="text-center">IPK</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($khs_list as $khs)
                                    <tr>
                                        <td class="text-center" data-label="Pilih">
                                            <input type="checkbox" class="khs-checkbox" value="{{ $khs->code }}">
                                        </td>
                                        <td data-label="Mahasiswa">
                                            <div class="d-flex flex-column">
                                                <strong>{{ $khs->mahasiswa->name }}</strong>
                                                <small class="text-muted">{{ $khs->mahasiswa->nim }}</small>
                                            </div>
                                        </td>
                                        <td data-label="Tahun Akademik">
                                            {{ $khs->tahunAkademik->name }} - {{ $khs->tahunAkademik->semester }}
                                        </td>
                                        <td class="text-center" data-label="Semester">
                                            {{ $khs->semester }}
                                        </td>
                                        <td class="text-center" data-label="SKS Tempuh">
                                            <span class="badge bg-info">{{ $khs->total_sks_tempuh }}</span>
                                        </td>
                                        <td class="text-center" data-label="SKS Lulus">
                                            <span class="badge bg-success">{{ $khs->total_sks_lulus }}</span>
                                        </td>
                                        <td class="text-center" data-label="IPS">
                                            @php
                                                $ipsColor = 'danger';
                                                if ($khs->ips >= 3.5) $ipsColor = 'success';
                                                elseif ($khs->ips >= 3.0) $ipsColor = 'info';
                                                elseif ($khs->ips >= 2.5) $ipsColor = 'warning';
                                            @endphp
                                            <span class="badge bg-{{ $ipsColor }}">{{ number_format($khs->ips, 2) }}</span>
                                        </td>
                                        <td class="text-center" data-label="IPK">
                                            @php
                                                $ipkColor = 'danger';
                                                if ($khs->ipk >= 3.5) $ipkColor = 'success';
                                                elseif ($khs->ipk >= 3.0) $ipkColor = 'info';
                                                elseif ($khs->ipk >= 2.5) $ipkColor = 'warning';
                                            @endphp
                                            <span class="badge bg-{{ $ipkColor }}">{{ number_format($khs->ipk, 2) }}</span>
                                        </td>
                                        <td class="text-center" data-label="Status">
                                            @php
                                                $statusColors = [
                                                    'draft' => 'secondary',
                                                    'published' => 'primary',
                                                    'locked' => 'dark'
                                                ];
                                                $statusLabels = [
                                                    'draft' => 'Draft',
                                                    'published' => 'Published',
                                                    'locked' => 'Locked'
                                                ];
                                            @endphp
                                            <span class="badge bg-{{ $statusColors[$khs->status] ?? 'secondary' }}">
                                                {{ $statusLabels[$khs->status] ?? ucfirst($khs->status) }}
                                            </span>
                                        </td>
                                        <td class="text-center" data-label="Aksi">
                                            <div class="btn-group" role="group">
                                                <a href="{{ route($spref . 'akademik.khs-detail', $khs->code) }}" class="btn btn-sm btn-info" title="Detail">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                @if ($khs->status == 'draft')
                                                    <button class="btn btn-sm btn-warning" onclick="editKHS('{{ $khs->code }}')" title="Edit">
                                                        <i class="fas fa-edit"></i>
                                                    </button>
                                                    <button class="btn btn-sm btn-success" onclick="publishKHS('{{ $khs->code }}')" title="Publish">
                                                        <i class="fas fa-share"></i>
                                                    </button>
                                                @endif
                                                @if (in_array($khs->status, ['published']))
                                                    <a href="{{ route($spref . 'akademik.khs-print', $khs->code) }}" class="btn btn-sm btn-secondary" target="_blank" title="Cetak">
                                                        <i class="fas fa-print"></i>
                                                    </a>
                                                    <button class="btn btn-sm btn-dark" onclick="lockKHS('{{ $khs->code }}')" title="Kunci">
                                                        <i class="fas fa-lock"></i>
                                                    </button>
                                                @endif
                                                @if ($khs->status == 'draft')
                                                    <button class="btn btn-sm btn-danger" onclick="deleteKHS('{{ $khs->code }}')" title="Hapus">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                @endif
                                                <a href="{{ route($spref . 'akademik.khs-transkrip', $khs->mahasiswa->code) }}" class="btn btn-sm btn-primary" target="_blank" title="Transkrip">
                                                    <i class="fas fa-file-alt"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sidebar -->
        <div class="col-lg-4 col-12">
            <div class="card">
                <div class="card-header">
                    <h6 class="mb-0">Statistik Akademik</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 mb-3">
                            <h6 class="text-muted">Distribusi IPK</h6>
                            @php
                                $ipkStats = [
                                    'Sangat Memuaskan (3.5-4.0)' => $khs_list->where('ipk', '>=', 3.5)->count(),
                                    'Memuaskan (3.0-3.49)' => $khs_list->whereBetween('ipk', [3.0, 3.49])->count(),
                                    'Cukup (2.5-2.99)' => $khs_list->whereBetween('ipk', [2.5, 2.99])->count(),
                                    'Kurang (< 2.5)' => $khs_list->where('ipk', '<', 2.5)->count(),
                                ];
                            @endphp
                            @foreach ($ipkStats as $label => $count)
                                @if ($count > 0)
                                    <div class="d-flex justify-content-between align-items-center mb-1">
                                        <small>{{ $label }}</small>
                                        <span class="badge bg-primary">{{ $count }}</span>
                                    </div>
                                @endif
                            @endforeach
                        </div>

                        <div class="col-12 mb-3">
                            <h6 class="text-muted">Status KHS</h6>
                            <div class="d-flex justify-content-between align-items-center mb-1">
                                <span>Draft</span>
                                <span class="badge bg-secondary">{{ $khs_list->where('status', 'draft')->count() }}</span>
                            </div>
                            <div class="d-flex justify-content-between align-items-center mb-1">
                                <span>Published</span>
                                <span class="badge bg-primary">{{ $khs_list->where('status', 'published')->count() }}</span>
                            </div>
                            <div class="d-flex justify-content-between align-items-center mb-1">
                                <span>Locked</span>
                                <span class="badge bg-dark">{{ $khs_list->where('status', 'locked')->count() }}</span>
                            </div>
                        </div>

                        <div class="col-12 mb-3">
                            <h6 class="text-muted">Statistik Semester</h6>
                            @for ($sem = 1; $sem <= 8; $sem++)
                                @php $count = $khs_list->where('semester', $sem)->count(); @endphp
                                @if ($count > 0)
                                    <div class="d-flex justify-content-between align-items-center mb-1">
                                        <span>Semester {{ $sem }}</span>
                                        <span class="badge bg-info">{{ $count }}</span>
                                    </div>
                                @endif
                            @endfor
                        </div>

                        <div class="col-12">
                            <h6 class="text-muted">Aksi Bulk</h6>
                            <div class="d-grid gap-2">
                                <button class="btn btn-outline-info btn-sm" onclick="showGenerateModal()">
                                    <i class="fas fa-cog me-2"></i>Generate KHS
                                </button>
                                <button class="btn btn-outline-success btn-sm" onclick="bulkAction('publish')">
                                    <i class="fas fa-share me-2"></i>Publish Terpilih
                                </button>
                                <button class="btn btn-outline-primary btn-sm" onclick="bulkAction('generate')">
                                    <i class="fas fa-magic me-2"></i>Generate Terpilih
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Generate KHS Modal -->
    <div class="modal fade" id="generateKHSModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Generate KHS</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form action="{{ route($spref . 'akademik.khs-generate') }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12 mb-3">
                                <label for="gen_tahun_akademik_id" class="form-label">Tahun Akademik</label>
                                <select class="form-select" name="tahun_akademik_id" id="gen_tahun_akademik_id" required>
                                    <option value="">Pilih Tahun Akademik</option>
                                    @foreach ($tahun_akademik as $ta)
                                        <option value="{{ $ta->id }}" {{ $ta->status == 'Aktif' ? 'selected' : '' }}>
                                            {{ $ta->name }} - {{ $ta->semester }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-12 mb-3">
                                <label for="gen_semester" class="form-label">Semester</label>
                                <select class="form-select" name="semester" id="gen_semester" required>
                                    <option value="">Pilih Semester</option>
                                    @for ($i = 1; $i <= 8; $i++)
                                        <option value="{{ $i }}">Semester {{ $i }}</option>
                                    @endfor
                                </select>
                            </div>
                            <div class="col-12 mb-3">
                                <label for="gen_program_studi_id" class="form-label">Program Studi (Opsional)</label>
                                <select class="form-select" name="program_studi_id" id="gen_program_studi_id">
                                    <option value="">Semua Program Studi</option>
                                    @foreach ($program_studi as $prodi)
                                        <option value="{{ $prodi->id }}">{{ $prodi->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="regenerate" id="regenerate" value="1">
                                    <label class="form-check-label" for="regenerate">
                                        Regenerate existing KHS
                                    </label>
                                    <div class="form-text">Centang jika ingin menggenerate ulang KHS yang sudah ada</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Generate KHS</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('custom-js')
    <script>
        function filterTable() {
            const tahunAkademik = document.getElementById('filterTahunAkademik').value.toLowerCase();
            const status = document.getElementById('filterStatus').value.toLowerCase();
            const semester = document.getElementById('filterSemester').value;
            const search = document.getElementById('searchInput').value.toLowerCase();
            const table = document.getElementById('khsTable');
            const rows = table.getElementsByTagName('tbody')[0].getElementsByTagName('tr');

            for (let i = 0; i < rows.length; i++) {
                const row = rows[i];
                const mahasiswaText = row.cells[1].textContent.toLowerCase();
                const tahunAkademikText = row.cells[2].textContent.toLowerCase();
                const semesterText = row.cells[3].textContent;
                const statusText = row.cells[8].textContent.toLowerCase();

                let showRow = true;

                if (tahunAkademik && !tahunAkademikText.includes(tahunAkademik)) {
                    showRow = false;
                }
                if (status && !statusText.includes(status)) {
                    showRow = false;
                }
                if (semester && semesterText !== semester) {
                    showRow = false;
                }
                if (search && !mahasiswaText.includes(search)) {
                    showRow = false;
                }

                row.style.display = showRow ? '' : 'none';
            }
        }

        function toggleSelectAll() {
            const selectAll = document.getElementById('selectAll');
            const checkboxes = document.querySelectorAll('.khs-checkbox');

            checkboxes.forEach(checkbox => {
                checkbox.checked = selectAll.checked;
            });
        }

        function showGenerateModal() {
            const modal = new bootstrap.Modal(document.getElementById('generateKHSModal'));
            modal.show();
        }

        function bulkAction(action) {
            const checkboxes = document.querySelectorAll('.khs-checkbox:checked');
            const codes = Array.from(checkboxes).map(cb => cb.value);

            if (codes.length === 0) {
                alert('Pilih minimal satu KHS untuk diproses!');
                return;
            }

            let actionText, actionUrl;
            switch(action) {
                case 'publish':
                    actionText = 'mempublish';
                    actionUrl = '{{ route($spref . "akademik.khs-bulk-publish") }}';
                    break;
                case 'generate':
                    actionText = 'menggenerate';
                    actionUrl = '{{ route($spref . "akademik.khs-bulk-generate") }}';
                    break;
                default:
                    return;
            }

            if (confirm(`Apakah Anda yakin ingin ${actionText} ${codes.length} KHS yang dipilih?`)) {
                const form = document.createElement('form');
                form.method = 'POST';
                form.action = actionUrl;

                const csrfToken = document.createElement('input');
                csrfToken.type = 'hidden';
                csrfToken.name = '_token';
                csrfToken.value = '{{ csrf_token() }}';
                form.appendChild(csrfToken);

                codes.forEach(code => {
                    const input = document.createElement('input');
                    input.type = 'hidden';
                    input.name = 'codes[]';
                    input.value = code;
                    form.appendChild(input);
                });

                document.body.appendChild(form);
                form.submit();
            }
        }

        function publishKHS(code) {
            if (confirm('Apakah Anda yakin ingin mempublish KHS ini?')) {
                const form = document.createElement('form');
                form.method = 'POST';
                form.action = `{{ route($spref . 'akademik.khs-publish', ':code') }}`.replace(':code', code);

                const csrfToken = document.createElement('input');
                csrfToken.type = 'hidden';
                csrfToken.name = '_token';
                csrfToken.value = '{{ csrf_token() }}';
                form.appendChild(csrfToken);

                document.body.appendChild(form);
                form.submit();
            }
        }

        function lockKHS(code) {
            if (confirm('Apakah Anda yakin ingin mengunci KHS ini? KHS yang dikunci tidak dapat diubah lagi.')) {
                const form = document.createElement('form');
                form.method = 'POST';
                form.action = `{{ route($spref . 'akademik.khs-lock', ':code') }}`.replace(':code', code);

                const csrfToken = document.createElement('input');
                csrfToken.type = 'hidden';
                csrfToken.name = '_token';
                csrfToken.value = '{{ csrf_token() }}';
                form.appendChild(csrfToken);

                document.body.appendChild(form);
                form.submit();
            }
        }

        function deleteKHS(code) {
            if (confirm('Apakah Anda yakin ingin menghapus KHS ini?')) {
                const form = document.createElement('form');
                form.method = 'POST';
                form.action = `{{ route($spref . 'akademik.khs-delete', ':code') }}`.replace(':code', code);

                const csrfToken = document.createElement('input');
                csrfToken.type = 'hidden';
                csrfToken.name = '_token';
                csrfToken.value = '{{ csrf_token() }}';
                form.appendChild(csrfToken);

                const methodInput = document.createElement('input');
                methodInput.type = 'hidden';
                methodInput.name = '_method';
                methodInput.value = 'DELETE';
                form.appendChild(methodInput);

                document.body.appendChild(form);
                form.submit();
            }
        }

        function editKHS(code) {
            window.location.href = `{{ route($spref . 'akademik.khs-detail', ':code') }}`.replace(':code', code);
        }
    </script>
@endsection
