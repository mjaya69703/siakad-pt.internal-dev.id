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

        /* Grade input styling */
        .grade-input {
            width: 80px;
            text-align: center;
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
                        <a href="{{ route($spref . 'akademik.nilai-import') }}" class="btn btn-info btn-sm">
                            <i class="fas fa-upload me-2"></i>Import Nilai
                        </a>
                        <a href="{{ route($spref . 'akademik.nilai-export') }}" class="btn btn-success btn-sm">
                            <i class="fas fa-download me-2"></i>Export Nilai
                        </a>
                        <button class="btn btn-warning btn-sm" onclick="bulkUpdate()">
                            <i class="fas fa-edit me-2"></i>Update Terpilih
                        </button>
                        <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseForm" aria-expanded="false" aria-controls="collapseForm">
                            <i class="fas fa-plus-circle me-2"></i>Tambah Nilai
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <!-- Quick Stats -->
                    <div class="row mb-4">
                        <div class="col-lg-3 col-md-6 mb-2">
                            <div class="p-3 bg-light-primary rounded">
                                <h6 class="mb-2">Total Nilai</h6>
                                <h3 class="mb-0">{{ count($nilai_list) }}</h3>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 mb-2">
                            <div class="p-3 bg-light-success rounded">
                                <h6 class="mb-2">Lulus (≥ C)</h6>
                                <h3 class="mb-0">{{ $nilai_list->where('grade_point', '>=', 2.0)->count() }}</h3>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 mb-2">
                            <div class="p-3 bg-light-danger rounded">
                                <h6 class="mb-2">Tidak Lulus (< C)</h6>
                                <h3 class="mb-0">{{ $nilai_list->where('grade_point', '<', 2.0)->count() }}</h3>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 mb-2">
                            <div class="p-3 bg-light-warning rounded">
                                <h6 class="mb-2">Belum Publish</h6>
                                <h3 class="mb-0">{{ $nilai_list->where('is_published', false)->count() }}</h3>
                            </div>
                        </div>
                    </div>

                    <!-- Collapsible Form -->
                    <div class="collapse" id="collapseForm">
                        <div class="card card-body border">
                            <h5 class="card-title mb-3">Tambah Nilai Baru</h5>
                            <form action="{{ route($spref . 'akademik.nilai-handle') }}" method="post">
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
                                        <label for="mata_kuliah_id" class="form-label">Mata Kuliah</label>
                                        <select class="form-select" name="mata_kuliah_id" id="mata_kuliah_id" required>
                                            <option value="">Pilih Mata Kuliah</option>
                                            @foreach ($mata_kuliah as $mk)
                                                <option value="{{ $mk->id }}">{{ $mk->code }} - {{ $mk->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('mata_kuliah_id')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="tahun_akademik_id" class="form-label">Tahun Akademik</label>
                                        <select class="form-select" name="tahun_akademik_id" id="tahun_akademik_id" required>
                                            <option value="">Pilih Tahun Akademik</option>
                                            @foreach ($tahun_akademik as $ta)
                                                <option value="{{ $ta->id }}" {{ $ta->status == 'Aktif' ? 'selected' : '' }}>
                                                    {{ $ta->name }} - {{ $ta->semester }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('tahun_akademik_id')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="dosen_id" class="form-label">Dosen</label>
                                        <select class="form-select" name="dosen_id" id="dosen_id">
                                            <option value="">Pilih Dosen</option>
                                            @foreach ($dosens as $dosen)
                                                <option value="{{ $dosen->id }}">{{ $dosen->nidn }} - {{ $dosen->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('dosen_id')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="nilai_angka" class="form-label">Nilai Angka</label>
                                        <input type="number" class="form-control" name="nilai_angka" id="nilai_angka"
                                               min="0" max="100" step="0.1" placeholder="0-100" onchange="calculateGrade()">
                                        @error('nilai_angka')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="nilai_huruf" class="form-label">Nilai Huruf</label>
                                        <select class="form-select" name="nilai_huruf" id="nilai_huruf" onchange="calculatePoint()">
                                            <option value="">Pilih Grade</option>
                                            <option value="A">A</option>
                                            <option value="A-">A-</option>
                                            <option value="B+">B+</option>
                                            <option value="B">B</option>
                                            <option value="B-">B-</option>
                                            <option value="C+">C+</option>
                                            <option value="C">C</option>
                                            <option value="D">D</option>
                                            <option value="E">E</option>
                                        </select>
                                        @error('nilai_huruf')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="grade_point" class="form-label">Grade Point</label>
                                        <input type="number" class="form-control" name="grade_point" id="grade_point"
                                               min="0" max="4" step="0.1" readonly>
                                        @error('grade_point')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="status_lulus" class="form-label">Status</label>
                                        <select class="form-select" name="status_lulus" id="status_lulus">
                                            <option value="lulus">Lulus</option>
                                            <option value="tidak_lulus">Tidak Lulus</option>
                                            <option value="mengulang">Mengulang</option>
                                        </select>
                                        @error('status_lulus')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-12 mb-3">
                                        <label for="catatan" class="form-label">Catatan</label>
                                        <textarea class="form-control" name="catatan" id="catatan" rows="3" placeholder="Catatan untuk nilai..."></textarea>
                                        @error('catatan')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end gap-2">
                                    <button type="button" class="btn btn-secondary" data-bs-toggle="collapse" data-bs-target="#collapseForm">
                                        <i class="fas fa-times me-2"></i>Batal
                                    </button>
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-save me-2"></i>Simpan Nilai
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
                            <select class="form-select" id="filterMataKuliah" onchange="filterTable()">
                                <option value="">Semua Mata Kuliah</option>
                                @foreach ($mata_kuliah as $mk)
                                    <option value="{{ $mk->name }}">{{ $mk->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3">
                            <select class="form-select" id="filterGrade" onchange="filterTable()">
                                <option value="">Semua Grade</option>
                                <option value="A">A</option>
                                <option value="A-">A-</option>
                                <option value="B+">B+</option>
                                <option value="B">B</option>
                                <option value="B-">B-</option>
                                <option value="C+">C+</option>
                                <option value="C">C</option>
                                <option value="D">D</option>
                                <option value="E">E</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <input type="text" class="form-control" id="searchInput" placeholder="Cari mahasiswa..." onkeyup="filterTable()">
                        </div>
                    </div>

                    <!-- Nilai Table -->
                    <div class="table-responsive">
                        <table class="table table-hover" id="nilaiTable">
                            <thead>
                                <tr>
                                    <th class="text-center">
                                        <input type="checkbox" id="selectAll" onchange="toggleSelectAll()">
                                    </th>
                                    <th>Mahasiswa</th>
                                    <th>Mata Kuliah</th>
                                    <th>Tahun Akademik</th>
                                    <th class="text-center">Nilai</th>
                                    <th class="text-center">Grade</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Published</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($nilai_list as $nilai)
                                    <tr>
                                        <td class="text-center" data-label="Pilih">
                                            <input type="checkbox" class="nilai-checkbox" value="{{ $nilai->code }}">
                                        </td>
                                        <td data-label="Mahasiswa">
                                            <div class="d-flex flex-column">
                                                <strong>{{ $nilai->mahasiswa->name }}</strong>
                                                <small class="text-muted">{{ $nilai->mahasiswa->nim }}</small>
                                            </div>
                                        </td>
                                        <td data-label="Mata Kuliah">
                                            <div class="d-flex flex-column">
                                                <strong>{{ $nilai->mataKuliah->name }}</strong>
                                                <small class="text-muted">{{ $nilai->mataKuliah->code }} ({{ $nilai->mataKuliah->sks }} SKS)</small>
                                            </div>
                                        </td>
                                        <td data-label="Tahun Akademik">
                                            {{ $nilai->tahunAkademik->name }} - {{ $nilai->tahunAkademik->semester }}
                                        </td>
                                        <td class="text-center" data-label="Nilai">
                                            @if ($nilai->is_locked)
                                                <span class="badge bg-secondary">{{ $nilai->nilai_angka ?? 'N/A' }}</span>
                                            @else
                                                <input type="number" class="form-control grade-input"
                                                       value="{{ $nilai->nilai_angka }}"
                                                       onchange="updateNilai('{{ $nilai->code }}', 'nilai_angka', this.value)"
                                                       min="0" max="100" step="0.1">
                                            @endif
                                        </td>
                                        <td class="text-center" data-label="Grade">
                                            @php
                                                $gradeColors = [
                                                    'A' => 'success', 'A-' => 'success',
                                                    'B+' => 'info', 'B' => 'info', 'B-' => 'info',
                                                    'C+' => 'warning', 'C' => 'warning',
                                                    'D' => 'danger', 'E' => 'danger'
                                                ];
                                            @endphp
                                            @if ($nilai->is_locked)
                                                <span class="badge bg-{{ $gradeColors[$nilai->nilai_huruf] ?? 'secondary' }}">
                                                    {{ $nilai->nilai_huruf }} ({{ $nilai->grade_point }})
                                                </span>
                                            @else
                                                <select class="form-select form-select-sm"
                                                        onchange="updateNilai('{{ $nilai->code }}', 'nilai_huruf', this.value)"
                                                        style="width: 100px;">
                                                    <option value="">-</option>
                                                    <option value="A" {{ $nilai->nilai_huruf == 'A' ? 'selected' : '' }}>A</option>
                                                    <option value="A-" {{ $nilai->nilai_huruf == 'A-' ? 'selected' : '' }}>A-</option>
                                                    <option value="B+" {{ $nilai->nilai_huruf == 'B+' ? 'selected' : '' }}>B+</option>
                                                    <option value="B" {{ $nilai->nilai_huruf == 'B' ? 'selected' : '' }}>B</option>
                                                    <option value="B-" {{ $nilai->nilai_huruf == 'B-' ? 'selected' : '' }}>B-</option>
                                                    <option value="C+" {{ $nilai->nilai_huruf == 'C+' ? 'selected' : '' }}>C+</option>
                                                    <option value="C" {{ $nilai->nilai_huruf == 'C' ? 'selected' : '' }}>C</option>
                                                    <option value="D" {{ $nilai->nilai_huruf == 'D' ? 'selected' : '' }}>D</option>
                                                    <option value="E" {{ $nilai->nilai_huruf == 'E' ? 'selected' : '' }}>E</option>
                                                </select>
                                            @endif
                                        </td>
                                        <td class="text-center" data-label="Status">
                                            @php
                                                $statusColors = [
                                                    'lulus' => 'success',
                                                    'tidak_lulus' => 'danger',
                                                    'mengulang' => 'warning'
                                                ];
                                                $statusLabels = [
                                                    'lulus' => 'Lulus',
                                                    'tidak_lulus' => 'Tidak Lulus',
                                                    'mengulang' => 'Mengulang'
                                                ];
                                            @endphp
                                            <span class="badge bg-{{ $statusColors[$nilai->status_lulus] ?? 'secondary' }}">
                                                {{ $statusLabels[$nilai->status_lulus] ?? ucfirst($nilai->status_lulus) }}
                                            </span>
                                        </td>
                                        <td class="text-center" data-label="Published">
                                            @if ($nilai->is_published)
                                                <span class="badge bg-success">
                                                    <i class="fas fa-check"></i> Published
                                                </span>
                                            @else
                                                <span class="badge bg-warning">
                                                    <i class="fas fa-clock"></i> Draft
                                                </span>
                                            @endif
                                        </td>
                                        <td class="text-center" data-label="Aksi">
                                            <div class="btn-group" role="group">
                                                @if (!$nilai->is_published)
                                                    <button class="btn btn-sm btn-warning" onclick="editNilai('{{ $nilai->code }}')" title="Edit">
                                                        <i class="fas fa-edit"></i>
                                                    </button>
                                                    <button class="btn btn-sm btn-success" onclick="approveNilai('{{ $nilai->code }}')" title="Approve">
                                                        <i class="fas fa-check"></i>
                                                    </button>
                                                @endif
                                                @if ($nilai->is_approved && !$nilai->is_published)
                                                    <button class="btn btn-sm btn-primary" onclick="publishNilai('{{ $nilai->code }}')" title="Publish">
                                                        <i class="fas fa-share"></i>
                                                    </button>
                                                @endif
                                                @if ($nilai->is_published && !$nilai->is_locked)
                                                    <button class="btn btn-sm btn-dark" onclick="lockNilai('{{ $nilai->code }}')" title="Kunci">
                                                        <i class="fas fa-lock"></i>
                                                    </button>
                                                @endif
                                                @if (!$nilai->is_published)
                                                    <button class="btn btn-sm btn-danger" onclick="deleteNilai('{{ $nilai->code }}')" title="Hapus">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                @endif
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
                    <h6 class="mb-0">Statistik Nilai</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 mb-3">
                            <h6 class="text-muted">Distribusi Grade</h6>
                            @php
                                $gradeDistribution = [
                                    'A' => $nilai_list->where('nilai_huruf', 'A')->count(),
                                    'A-' => $nilai_list->where('nilai_huruf', 'A-')->count(),
                                    'B+' => $nilai_list->where('nilai_huruf', 'B+')->count(),
                                    'B' => $nilai_list->where('nilai_huruf', 'B')->count(),
                                    'B-' => $nilai_list->where('nilai_huruf', 'B-')->count(),
                                    'C+' => $nilai_list->where('nilai_huruf', 'C+')->count(),
                                    'C' => $nilai_list->where('nilai_huruf', 'C')->count(),
                                    'D' => $nilai_list->where('nilai_huruf', 'D')->count(),
                                    'E' => $nilai_list->where('nilai_huruf', 'E')->count(),
                                ];
                            @endphp
                            @foreach ($gradeDistribution as $grade => $count)
                                @if ($count > 0)
                                    <div class="d-flex justify-content-between align-items-center mb-1">
                                        <span>Grade {{ $grade }}</span>
                                        <span class="badge bg-primary">{{ $count }}</span>
                                    </div>
                                @endif
                            @endforeach
                        </div>

                        <div class="col-12 mb-3">
                            <h6 class="text-muted">Status Workflow</h6>
                            <div class="d-flex justify-content-between align-items-center mb-1">
                                <span>Draft</span>
                                <span class="badge bg-warning">{{ $nilai_list->where('is_published', false)->count() }}</span>
                            </div>
                            <div class="d-flex justify-content-between align-items-center mb-1">
                                <span>Published</span>
                                <span class="badge bg-success">{{ $nilai_list->where('is_published', true)->count() }}</span>
                            </div>
                            <div class="d-flex justify-content-between align-items-center mb-1">
                                <span>Locked</span>
                                <span class="badge bg-dark">{{ $nilai_list->where('is_locked', true)->count() }}</span>
                            </div>
                        </div>

                        <div class="col-12">
                            <h6 class="text-muted">Aksi Cepat</h6>
                            <div class="d-grid gap-2">
                                <button class="btn btn-outline-warning btn-sm" onclick="bulkUpdate()">
                                    <i class="fas fa-edit me-2"></i>Update Terpilih
                                </button>
                                <a href="{{ route($spref . 'akademik.nilai-import') }}" class="btn btn-outline-info btn-sm">
                                    <i class="fas fa-upload me-2"></i>Import Nilai
                                </a>
                                <a href="{{ route($spref . 'akademik.nilai-export') }}" class="btn btn-outline-success btn-sm">
                                    <i class="fas fa-download me-2"></i>Export Nilai
                                </a>
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
        // Grade mapping
        const gradeMapping = {
            'A': { point: 4.0, min: 85 },
            'A-': { point: 3.7, min: 80 },
            'B+': { point: 3.3, min: 75 },
            'B': { point: 3.0, min: 70 },
            'B-': { point: 2.7, min: 65 },
            'C+': { point: 2.3, min: 60 },
            'C': { point: 2.0, min: 55 },
            'D': { point: 1.0, min: 40 },
            'E': { point: 0.0, min: 0 }
        };

        function calculateGrade() {
            const nilaiAngka = parseFloat(document.getElementById('nilai_angka').value);
            const nilaiHurufSelect = document.getElementById('nilai_huruf');
            const gradePointInput = document.getElementById('grade_point');
            const statusSelect = document.getElementById('status_lulus');

            if (nilaiAngka >= 0) {
                let grade = 'E';
                for (const [g, data] of Object.entries(gradeMapping)) {
                    if (nilaiAngka >= data.min) {
                        grade = g;
                        break;
                    }
                }

                nilaiHurufSelect.value = grade;
                gradePointInput.value = gradeMapping[grade].point;
                statusSelect.value = gradeMapping[grade].point >= 2.0 ? 'lulus' : 'tidak_lulus';
            }
        }

        function calculatePoint() {
            const nilaiHuruf = document.getElementById('nilai_huruf').value;
            const gradePointInput = document.getElementById('grade_point');
            const statusSelect = document.getElementById('status_lulus');

            if (nilaiHuruf && gradeMapping[nilaiHuruf]) {
                gradePointInput.value = gradeMapping[nilaiHuruf].point;
                statusSelect.value = gradeMapping[nilaiHuruf].point >= 2.0 ? 'lulus' : 'tidak_lulus';
            }
        }

        function filterTable() {
            const tahunAkademik = document.getElementById('filterTahunAkademik').value.toLowerCase();
            const mataKuliah = document.getElementById('filterMataKuliah').value.toLowerCase();
            const grade = document.getElementById('filterGrade').value.toLowerCase();
            const search = document.getElementById('searchInput').value.toLowerCase();
            const table = document.getElementById('nilaiTable');
            const rows = table.getElementsByTagName('tbody')[0].getElementsByTagName('tr');

            for (let i = 0; i < rows.length; i++) {
                const row = rows[i];
                const mahasiswaText = row.cells[1].textContent.toLowerCase();
                const mataKuliahText = row.cells[2].textContent.toLowerCase();
                const tahunAkademikText = row.cells[3].textContent.toLowerCase();
                const gradeText = row.cells[5].textContent.toLowerCase();

                let showRow = true;

                if (tahunAkademik && !tahunAkademikText.includes(tahunAkademik)) {
                    showRow = false;
                }
                if (mataKuliah && !mataKuliahText.includes(mataKuliah)) {
                    showRow = false;
                }
                if (grade && !gradeText.includes(grade)) {
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
            const checkboxes = document.querySelectorAll('.nilai-checkbox');

            checkboxes.forEach(checkbox => {
                checkbox.checked = selectAll.checked;
            });
        }

        function updateNilai(code, field, value) {
            const formData = new FormData();
            formData.append('_token', '{{ csrf_token() }}');
            formData.append('_method', 'PATCH');
            formData.append(field, value);

            fetch(`{{ route($spref . 'akademik.nilai-update', ':code') }}`.replace(':code', code), {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    location.reload();
                } else {
                    alert('Gagal mengupdate nilai: ' + (data.message || 'Unknown error'));
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Terjadi kesalahan saat mengupdate nilai');
            });
        }

        function bulkUpdate() {
            const checkboxes = document.querySelectorAll('.nilai-checkbox:checked');
            const codes = Array.from(checkboxes).map(cb => cb.value);

            if (codes.length === 0) {
                alert('Pilih minimal satu nilai untuk diupdate!');
                return;
            }

            if (confirm(`Apakah Anda yakin ingin mengupdate ${codes.length} nilai yang dipilih?`)) {
                const form = document.createElement('form');
                form.method = 'POST';
                form.action = '{{ route($spref . "akademik.nilai-bulk-update") }}';

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

        function approveNilai(code) {
            if (confirm('Apakah Anda yakin ingin menyetujui nilai ini?')) {
                const form = document.createElement('form');
                form.method = 'POST';
                form.action = `{{ route($spref . 'akademik.nilai-approve', ':code') }}`.replace(':code', code);

                const csrfToken = document.createElement('input');
                csrfToken.type = 'hidden';
                csrfToken.name = '_token';
                csrfToken.value = '{{ csrf_token() }}';
                form.appendChild(csrfToken);

                document.body.appendChild(form);
                form.submit();
            }
        }

        function publishNilai(code) {
            if (confirm('Apakah Anda yakin ingin mempublish nilai ini?')) {
                const form = document.createElement('form');
                form.method = 'POST';
                form.action = `{{ route($spref . 'akademik.nilai-publish', ':code') }}`.replace(':code', code);

                const csrfToken = document.createElement('input');
                csrfToken.type = 'hidden';
                csrfToken.name = '_token';
                csrfToken.value = '{{ csrf_token() }}';
                form.appendChild(csrfToken);

                document.body.appendChild(form);
                form.submit();
            }
        }

        function lockNilai(code) {
            if (confirm('Apakah Anda yakin ingin mengunci nilai ini? Nilai yang dikunci tidak dapat diubah lagi.')) {
                const form = document.createElement('form');
                form.method = 'POST';
                form.action = `{{ route($spref . 'akademik.nilai-lock', ':code') }}`.replace(':code', code);

                const csrfToken = document.createElement('input');
                csrfToken.type = 'hidden';
                csrfToken.name = '_token';
                csrfToken.value = '{{ csrf_token() }}';
                form.appendChild(csrfToken);

                document.body.appendChild(form);
                form.submit();
            }
        }

        function deleteNilai(code) {
            if (confirm('Apakah Anda yakin ingin menghapus nilai ini?')) {
                const form = document.createElement('form');
                form.method = 'POST';
                form.action = `{{ route($spref . 'akademik.nilai-delete', ':code') }}`.replace(':code', code);

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

        function editNilai(code) {
            // In a real implementation, this would open an edit modal or redirect to edit page
            console.log('Edit nilai:', code);
        }
    </script>
@endsection
