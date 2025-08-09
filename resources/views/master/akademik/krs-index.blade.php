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
                        <button class="btn btn-success btn-sm" onclick="bulkAction('approve')">
                            <i class="fas fa-check-circle me-2"></i>Approve Terpilih
                        </button>
                        <button class="btn btn-info btn-sm" onclick="bulkAction('publish')">
                            <i class="fas fa-share me-2"></i>Publish Terpilih
                        </button>
                        <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseForm" aria-expanded="false" aria-controls="collapseForm">
                            <i class="fas fa-plus-circle me-2"></i>Tambah KRS
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <!-- Quick Stats -->
                    <div class="row mb-4">
                        <div class="col-lg-2 col-md-4 mb-2">
                            <div class="p-3 bg-light-primary rounded">
                                <h6 class="mb-2">Total KRS</h6>
                                <h3 class="mb-0">{{ count($krs_list) }}</h3>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-4 mb-2">
                            <div class="p-3 bg-light-warning rounded">
                                <h6 class="mb-2">Draft</h6>
                                <h3 class="mb-0">{{ $krs_list->where('status', 'draft')->count() }}</h3>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-4 mb-2">
                            <div class="p-3 bg-light-info rounded">
                                <h6 class="mb-2">Diajukan</h6>
                                <h3 class="mb-0">{{ $krs_list->where('status', 'submitted')->count() }}</h3>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-4 mb-2">
                            <div class="p-3 bg-light-success rounded">
                                <h6 class="mb-2">Disetujui</h6>
                                <h3 class="mb-0">{{ $krs_list->where('status', 'approved')->count() }}</h3>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-4 mb-2">
                            <div class="p-3 bg-light-danger rounded">
                                <h6 class="mb-2">Ditolak</h6>
                                <h3 class="mb-0">{{ $krs_list->where('status', 'rejected')->count() }}</h3>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-4 mb-2">
                            <div class="p-3 bg-light-success rounded">
                                <h6 class="mb-2">Dipublish</h6>
                                <h3 class="mb-0">{{ $krs_list->where('status', 'published')->count() }}</h3>
                            </div>
                        </div>
                    </div>

                    <!-- Collapsible Form -->
                    <div class="collapse" id="collapseForm">
                        <div class="card card-body border">
                            <h5 class="card-title mb-3">Tambah KRS Baru</h5>
                            <form action="{{ route($spref . 'akademik.krs-handle') }}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="mahasiswa_id" class="form-label">Mahasiswa</label>
                                        <select class="form-select" name="mahasiswa_id" id="mahasiswa_id" required>
                                            <option value="">Pilih Mahasiswa</option>
                                            @foreach ($mahasiswa as $m)
                                                <option value="{{ $m->id }}">{{ $m->numb_nim }} - {{ $m->name }}</option>
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
                                                    {{ $ta->name }}
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
                                        <label for="dosen_wali_id" class="form-label">Dosen Wali (Opsional)</label>
                                        <select class="form-select" name="dosen_wali_id" id="dosen_wali_id">
                                            <option value="">Pilih Dosen Wali</option>
                                            @foreach ($dosens as $dosen)
                                                <option value="{{ $dosen->id }}">{{ $dosen->numb_nidn ?? 'NIDN Tidak Tersedia' }} - {{ $dosen->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('dosen_wali_id')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-12 mb-3">
                                        <label for="catatan" class="form-label">Catatan</label>
                                        <textarea class="form-control" name="catatan" id="catatan" rows="3" placeholder="Catatan untuk KRS..."></textarea>
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
                                        <i class="fas fa-save me-2"></i>Simpan KRS
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
                                <option value="submitted">Diajukan</option>
                                <option value="approved">Disetujui</option>
                                <option value="rejected">Ditolak</option>
                                <option value="published">Dipublish</option>
                                <option value="locked">Dikunci</option>
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

                    <!-- KRS Table -->
                    <div class="table-responsive">
                        <table class="table table-hover" id="krsTable">
                            <thead>
                                <tr>
                                    <th class="text-center">
                                        <input type="checkbox" id="selectAll" onchange="toggleSelectAll()">
                                    </th>
                                    <th>Mahasiswa</th>
                                    <th>Tahun Akademik</th>
                                    <th class="text-center">Semester</th>
                                    <th class="text-center">Total SKS</th>
                                    <th class="text-center">Status</th>
                                    <th>Tanggal Dibuat</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($krs_list as $krs)
                                    <tr>
                                        <td class="text-center" data-label="Pilih">
                                            <input type="checkbox" class="krs-checkbox" value="{{ $krs->code }}">
                                        </td>
                                        <td data-label="Mahasiswa">
                                            <div class="d-flex flex-column">
                                                <strong>{{ $krs->mahasiswa->name }}</strong>
                                                <small class="text-muted">{{ $krs->mahasiswa->numb_nim }}</small>
                                            </div>
                                        </td>
                                        <td data-label="Tahun Akademik">
                                            {{ $krs->tahunAkademik->name }}
                                        </td>
                                        <td class="text-center" data-label="Semester">
                                            {{ $krs->semester }}
                                        </td>
                                        <td class="text-center" data-label="Total SKS">
                                            <span class="badge bg-info">{{ $krs->total_sks }} SKS</span>
                                        </td>
                                        <td class="text-center" data-label="Status">
                                            @php
                                                $statusColors = [
                                                    'draft' => 'secondary',
                                                    'submitted' => 'warning',
                                                    'approved' => 'success',
                                                    'rejected' => 'danger',
                                                    'published' => 'primary',
                                                    'locked' => 'dark'
                                                ];
                                                $statusLabels = [
                                                    'draft' => 'Draft',
                                                    'submitted' => 'Diajukan',
                                                    'approved' => 'Disetujui',
                                                    'rejected' => 'Ditolak',
                                                    'published' => 'Dipublish',
                                                    'locked' => 'Dikunci'
                                                ];
                                            @endphp
                                            <span class="badge bg-{{ $statusColors[$krs->status] ?? 'secondary' }}">
                                                {{ $statusLabels[$krs->status] ?? ucfirst($krs->status) }}
                                            </span>
                                        </td>
                                        <td data-label="Tanggal Dibuat">
                                            {{ $krs->created_at->format('d/m/Y H:i') }}
                                        </td>
                                        <td class="text-center" data-label="Aksi">
                                            <div class="btn-group" role="group">
                                                <a href="{{ route($spref . 'akademik.krs-detail', $krs->code) }}" class="btn btn-sm btn-info" title="Detail">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                @if (in_array($krs->status, ['draft', 'submitted']))
                                                    <button class="btn btn-sm btn-warning" onclick="editKRS('{{ $krs->code }}')" title="Edit">
                                                        <i class="fas fa-edit"></i>
                                                    </button>
                                                @endif
                                                @if ($krs->status == 'submitted')
                                                    <button class="btn btn-sm btn-success" onclick="approveKRS('{{ $krs->code }}')" title="Approve">
                                                        <i class="fas fa-check"></i>
                                                    </button>
                                                    <button class="btn btn-sm btn-danger" onclick="rejectKRS('{{ $krs->code }}')" title="Reject">
                                                        <i class="fas fa-times"></i>
                                                    </button>
                                                @endif
                                                @if ($krs->status == 'approved')
                                                    <button class="btn btn-sm btn-primary" onclick="publishKRS('{{ $krs->code }}')" title="Publish">
                                                        <i class="fas fa-share"></i>
                                                    </button>
                                                @endif
                                                @if (in_array($krs->status, ['published']))
                                                    <a href="{{ route($spref . 'akademik.krs-print', $krs->code) }}" class="btn btn-sm btn-secondary" target="_blank" title="Cetak">
                                                        <i class="fas fa-print"></i>
                                                    </a>
                                                    <button class="btn btn-sm btn-dark" onclick="lockKRS('{{ $krs->code }}')" title="Kunci">
                                                        <i class="fas fa-lock"></i>
                                                    </button>
                                                @endif
                                                @if (in_array($krs->status, ['draft', 'rejected']))
                                                    <button class="btn btn-sm btn-danger" onclick="deleteKRS('{{ $krs->code }}')" title="Hapus">
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
                    <h6 class="mb-0">Informasi KRS</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 mb-3">
                            <h6 class="text-muted">Status Workflow</h6>
                            <ol class="list-group list-group-numbered">
                                <li class="list-group-item d-flex justify-content-between align-items-start">
                                    <div class="ms-2 me-auto">
                                        <div class="fw-bold">Draft</div>
                                        KRS dalam tahap penyusunan
                                    </div>
                                    <span class="badge bg-secondary rounded-pill">{{ $krs_list->where('status', 'draft')->count() }}</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-start">
                                    <div class="ms-2 me-auto">
                                        <div class="fw-bold">Diajukan</div>
                                        Menunggu persetujuan dosen wali
                                    </div>
                                    <span class="badge bg-warning rounded-pill">{{ $krs_list->where('status', 'submitted')->count() }}</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-start">
                                    <div class="ms-2 me-auto">
                                        <div class="fw-bold">Disetujui</div>
                                        Siap untuk dipublish
                                    </div>
                                    <span class="badge bg-success rounded-pill">{{ $krs_list->where('status', 'approved')->count() }}</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-start">
                                    <div class="ms-2 me-auto">
                                        <div class="fw-bold">Dipublish</div>
                                        KRS aktif dan dapat dicetak
                                    </div>
                                    <span class="badge bg-primary rounded-pill">{{ $krs_list->where('status', 'published')->count() }}</span>
                                </li>
                            </ol>
                        </div>

                        <div class="col-12 mb-3">
                            <h6 class="text-muted">Statistik Semester</h6>
                            @for ($sem = 1; $sem <= 8; $sem++)
                                @php $count = $krs_list->where('semester', $sem)->count(); @endphp
                                @if ($count > 0)
                                    <div class="d-flex justify-content-between align-items-center mb-1">
                                        <span>Semester {{ $sem }}</span>
                                        <span class="badge bg-primary">{{ $count }}</span>
                                    </div>
                                @endif
                            @endfor
                        </div>

                        <div class="col-12">
                            <h6 class="text-muted">Aksi Bulk</h6>
                            <div class="d-grid gap-2">
                                <button class="btn btn-outline-success btn-sm" onclick="bulkAction('approve')">
                                    <i class="fas fa-check-circle me-2"></i>Approve Terpilih
                                </button>
                                <button class="btn btn-outline-info btn-sm" onclick="bulkAction('publish')">
                                    <i class="fas fa-share me-2"></i>Publish Terpilih
                                </button>
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
        function filterTable() {
            const tahunAkademik = document.getElementById('filterTahunAkademik').value.toLowerCase();
            const status = document.getElementById('filterStatus').value.toLowerCase();
            const semester = document.getElementById('filterSemester').value;
            const search = document.getElementById('searchInput').value.toLowerCase();
            const table = document.getElementById('krsTable');
            const rows = table.getElementsByTagName('tbody')[0].getElementsByTagName('tr');

            for (let i = 0; i < rows.length; i++) {
                const row = rows[i];
                const mahasiswaText = row.cells[1].textContent.toLowerCase();
                const tahunAkademikText = row.cells[2].textContent.toLowerCase();
                const semesterText = row.cells[3].textContent;
                const statusText = row.cells[5].textContent.toLowerCase();

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
            const checkboxes = document.querySelectorAll('.krs-checkbox');

            checkboxes.forEach(checkbox => {
                checkbox.checked = selectAll.checked;
            });
        }

        function bulkAction(action) {
            const checkboxes = document.querySelectorAll('.krs-checkbox:checked');
            const codes = Array.from(checkboxes).map(cb => cb.value);

            if (codes.length === 0) {
                alert('Pilih minimal satu KRS untuk diproses!');
                return;
            }

            const actionText = action === 'approve' ? 'menyetujui' : 'mempublish';
            if (confirm(`Apakah Anda yakin ingin ${actionText} ${codes.length} KRS yang dipilih?`)) {
                const form = document.createElement('form');
                form.method = 'POST';
                form.action = action === 'approve'
                    ? '{{ route($spref . "akademik.krs-bulk-approve") }}'
                    : '{{ route($spref . "akademik.krs-bulk-publish") }}';

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

        function approveKRS(code) {
            if (confirm('Apakah Anda yakin ingin menyetujui KRS ini?')) {
                const form = document.createElement('form');
                form.method = 'POST';
                form.action = `{{ route($spref . 'akademik.krs-approve', ':code') }}`.replace(':code', code);

                const csrfToken = document.createElement('input');
                csrfToken.type = 'hidden';
                csrfToken.name = '_token';
                csrfToken.value = '{{ csrf_token() }}';
                form.appendChild(csrfToken);

                document.body.appendChild(form);
                form.submit();
            }
        }

        function rejectKRS(code) {
            const reason = prompt('Masukkan alasan penolakan:');
            if (reason) {
                const form = document.createElement('form');
                form.method = 'POST';
                form.action = `{{ route($spref . 'akademik.krs-reject', ':code') }}`.replace(':code', code);

                const csrfToken = document.createElement('input');
                csrfToken.type = 'hidden';
                csrfToken.name = '_token';
                csrfToken.value = '{{ csrf_token() }}';
                form.appendChild(csrfToken);

                const reasonInput = document.createElement('input');
                reasonInput.type = 'hidden';
                reasonInput.name = 'reason';
                reasonInput.value = reason;
                form.appendChild(reasonInput);

                document.body.appendChild(form);
                form.submit();
            }
        }

        function publishKRS(code) {
            if (confirm('Apakah Anda yakin ingin mempublish KRS ini?')) {
                const form = document.createElement('form');
                form.method = 'POST';
                form.action = `{{ route($spref . 'akademik.krs-publish', ':code') }}`.replace(':code', code);

                const csrfToken = document.createElement('input');
                csrfToken.type = 'hidden';
                csrfToken.name = '_token';
                csrfToken.value = '{{ csrf_token() }}';
                form.appendChild(csrfToken);

                document.body.appendChild(form);
                form.submit();
            }
        }

        function lockKRS(code) {
            if (confirm('Apakah Anda yakin ingin mengunci KRS ini? KRS yang dikunci tidak dapat diubah lagi.')) {
                const form = document.createElement('form');
                form.method = 'POST';
                form.action = `{{ route($spref . 'akademik.krs-lock', ':code') }}`.replace(':code', code);

                const csrfToken = document.createElement('input');
                csrfToken.type = 'hidden';
                csrfToken.name = '_token';
                csrfToken.value = '{{ csrf_token() }}';
                form.appendChild(csrfToken);

                document.body.appendChild(form);
                form.submit();
            }
        }

        function deleteKRS(code) {
            if (confirm('Apakah Anda yakin ingin menghapus KRS ini?')) {
                const form = document.createElement('form');
                form.method = 'POST';
                form.action = `{{ route($spref . 'akademik.krs-delete', ':code') }}`.replace(':code', code);

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

        function editKRS(code) {
            window.location.href = `{{ route($spref . 'akademik.krs-detail', ':code') }}`.replace(':code', code);
        }
    </script>
@endsection
