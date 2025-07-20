@extends('core-themes.core-backpage')

@section('custom-css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
    <style>
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
        }

        .table td {
            vertical-align: middle;
            padding-top: 0.75rem;
            padding-bottom: 0.75rem;
        }

        .badge {
            padding: 0.5em 0.75em;
            font-weight: 500;
        }

        .btn {
            padding: 0.5rem 1rem;
            border-radius: 5px;
        }

        .btn-sm {
            padding: 0.25rem 0.5rem;
        }

        .form-control, .form-select {
            border-radius: 5px;
            border: 1px solid rgba(0,0,0,0.1);
            padding: 0.5rem 1rem;
        }

        .info-item {
            margin-bottom: 1rem;
        }

        .info-label {
            font-weight: 600;
            color: #6c757d;
            margin-bottom: 0.25rem;
        }

        .info-value {
            font-size: 1.1rem;
            color: #495057;
        }

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
        <div class="col-12 mb-3">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h4 class="mb-1">Detail KRS - {{ $krs->mahasiswa->name }}</h4>
                    <p class="text-muted mb-0">{{ $krs->mahasiswa->nim }} | {{ $krs->tahunAkademik->name }} - {{ $krs->tahunAkademik->semester }}</p>
                </div>
                <div class="d-flex gap-2">
                    <a href="{{ route($spref . 'akademik.krs-render') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left me-2"></i>Kembali
                    </a>
                    @if (in_array($krs->status, ['published']))
                        <a href="{{ route($spref . 'akademik.krs-print', $krs->code) }}" class="btn btn-primary" target="_blank">
                            <i class="fas fa-print me-2"></i>Cetak KRS
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- KRS Information -->
        <div class="col-lg-4 col-12 mb-3">
            <div class="card">
                <div class="card-header">
                    <h6 class="mb-0">Informasi KRS</h6>
                </div>
                <div class="card-body">
                    <div class="info-item">
                        <div class="info-label">Mahasiswa</div>
                        <div class="info-value">{{ $krs->mahasiswa->name }}</div>
                    </div>
                    <div class="info-item">
                        <div class="info-label">NIM</div>
                        <div class="info-value">{{ $krs->mahasiswa->nim }}</div>
                    </div>
                    <div class="info-item">
                        <div class="info-label">Program Studi</div>
                        <div class="info-value">{{ $krs->mahasiswa->programStudi->name ?? '-' }}</div>
                    </div>
                    <div class="info-item">
                        <div class="info-label">Tahun Akademik</div>
                        <div class="info-value">{{ $krs->tahunAkademik->name }} - {{ $krs->tahunAkademik->semester }}</div>
                    </div>
                    <div class="info-item">
                        <div class="info-label">Semester</div>
                        <div class="info-value">{{ $krs->semester }}</div>
                    </div>
                    <div class="info-item">
                        <div class="info-label">Dosen Wali</div>
                        <div class="info-value">{{ $krs->dosenWali->name ?? '-' }}</div>
                    </div>
                    <div class="info-item">
                        <div class="info-label">Total SKS</div>
                        <div class="info-value">
                            <span class="badge bg-info fs-6">{{ $krs->total_sks }} SKS</span>
                        </div>
                    </div>
                    <div class="info-item">
                        <div class="info-label">Status</div>
                        <div class="info-value">
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
                            <span class="badge bg-{{ $statusColors[$krs->status] ?? 'secondary' }} fs-6">
                                {{ $statusLabels[$krs->status] ?? ucfirst($krs->status) }}
                            </span>
                        </div>
                    </div>
                    @if ($krs->catatan)
                        <div class="info-item">
                            <div class="info-label">Catatan</div>
                            <div class="info-value">{{ $krs->catatan }}</div>
                        </div>
                    @endif
                    @if ($krs->rejection_reason)
                        <div class="info-item">
                            <div class="info-label">Alasan Penolakan</div>
                            <div class="info-value text-danger">{{ $krs->rejection_reason }}</div>
                        </div>
                    @endif
                    <div class="info-item">
                        <div class="info-label">Dibuat</div>
                        <div class="info-value">{{ $krs->created_at->format('d/m/Y H:i') }}</div>
                    </div>
                    @if ($krs->approved_at)
                        <div class="info-item">
                            <div class="info-label">Disetujui</div>
                            <div class="info-value">{{ $krs->approved_at->format('d/m/Y H:i') }}</div>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Action Card -->
            @if (in_array($krs->status, ['submitted', 'approved', 'published']) && !in_array($krs->status, ['locked']))
                <div class="card mt-3">
                    <div class="card-header">
                        <h6 class="mb-0">Aksi</h6>
                    </div>
                    <div class="card-body">
                        <div class="d-grid gap-2">
                            @if ($krs->status == 'submitted')
                                <button class="btn btn-success" onclick="approveKRS()">
                                    <i class="fas fa-check me-2"></i>Setujui KRS
                                </button>
                                <button class="btn btn-danger" onclick="rejectKRS()">
                                    <i class="fas fa-times me-2"></i>Tolak KRS
                                </button>
                            @endif
                            @if ($krs->status == 'approved')
                                <button class="btn btn-primary" onclick="publishKRS()">
                                    <i class="fas fa-share me-2"></i>Publish KRS
                                </button>
                            @endif
                            @if ($krs->status == 'published')
                                <button class="btn btn-dark" onclick="lockKRS()">
                                    <i class="fas fa-lock me-2"></i>Kunci KRS
                                </button>
                            @endif
                        </div>
                    </div>
                </div>
            @endif
        </div>

        <!-- KRS Details -->
        <div class="col-lg-8 col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h6 class="mb-0">Detail Mata Kuliah</h6>
                    @if (in_array($krs->status, ['draft', 'submitted']))
                        <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addMataKuliahModal">
                            <i class="fas fa-plus me-2"></i>Tambah Mata Kuliah
                        </button>
                    @endif
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Kode MK</th>
                                    <th>Mata Kuliah</th>
                                    <th class="text-center">SKS</th>
                                    <th>Kelas</th>
                                    <th>Jadwal</th>
                                    <th>Dosen</th>
                                    @if (in_array($krs->status, ['draft', 'submitted']))
                                        <th class="text-center">Aksi</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($krs->details as $detail)
                                    <tr>
                                        <td data-label="Kode MK">{{ $detail->mataKuliah->code }}</td>
                                        <td data-label="Mata Kuliah">
                                            <div class="d-flex flex-column">
                                                <strong>{{ $detail->mataKuliah->name }}</strong>
                                                <small class="text-muted">Semester {{ $detail->mataKuliah->semester }}</small>
                                            </div>
                                        </td>
                                        <td class="text-center" data-label="SKS">
                                            <span class="badge bg-info">{{ $detail->mataKuliah->sks }}</span>
                                        </td>
                                        <td data-label="Kelas">{{ $detail->kelas->name ?? '-' }}</td>
                                        <td data-label="Jadwal">
                                            @if ($detail->jadwalKuliah)
                                                <div class="d-flex flex-column">
                                                    <span>{{ $detail->jadwalKuliah->hari }}</span>
                                                    <small class="text-muted">{{ $detail->jadwalKuliah->jam_mulai }} - {{ $detail->jadwalKuliah->jam_selesai }}</small>
                                                </div>
                                            @else
                                                -
                                            @endif
                                        </td>
                                        <td data-label="Dosen">
                                            <div class="d-flex flex-column">
                                                @if ($detail->mataKuliah->dosen1)
                                                    <span>{{ $detail->mataKuliah->dosen1->name }}</span>
                                                @endif
                                                @if ($detail->mataKuliah->dosen2)
                                                    <small class="text-muted">{{ $detail->mataKuliah->dosen2->name }}</small>
                                                @endif
                                            </div>
                                        </td>
                                        @if (in_array($krs->status, ['draft', 'submitted']))
                                            <td class="text-center" data-label="Aksi">
                                                <button class="btn btn-sm btn-danger" onclick="removeDetail('{{ $detail->id }}')">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </td>
                                        @endif
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="{{ in_array($krs->status, ['draft', 'submitted']) ? '7' : '6' }}" class="text-center text-muted">
                                            Belum ada mata kuliah yang dipilih
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                            @if ($krs->details->count() > 0)
                                <tfoot>
                                    <tr class="table-light">
                                        <td colspan="2"><strong>Total SKS</strong></td>
                                        <td class="text-center"><strong>{{ $krs->total_sks }}</strong></td>
                                        <td colspan="{{ in_array($krs->status, ['draft', 'submitted']) ? '4' : '3' }}"></td>
                                    </tr>
                                </tfoot>
                            @endif
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Mata Kuliah Modal -->
    @if (in_array($krs->status, ['draft', 'submitted']))
        <div class="modal fade" id="addMataKuliahModal" tabindex="-1">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Tambah Mata Kuliah</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <form action="{{ route($spref . 'akademik.krs-handle') }}" method="post">
                        @csrf
                        <input type="hidden" name="krs_id" value="{{ $krs->id }}">
                        <input type="hidden" name="action" value="add_detail">
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="mata_kuliah_id" class="form-label">Mata Kuliah</label>
                                    <select class="form-select" name="mata_kuliah_id" id="mata_kuliah_id" required onchange="loadKelas()">
                                        <option value="">Pilih Mata Kuliah</option>
                                        @foreach ($available_matakuliah as $mk)
                                            <option value="{{ $mk->id }}" data-sks="{{ $mk->sks }}">
                                                {{ $mk->code }} - {{ $mk->name }} ({{ $mk->sks }} SKS)
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="kelas_id" class="form-label">Kelas</label>
                                    <select class="form-select" name="kelas_id" id="kelas_id" onchange="loadJadwal()">
                                        <option value="">Pilih Kelas</option>
                                    </select>
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="jadwal_kuliah_id" class="form-label">Jadwal</label>
                                    <select class="form-select" name="jadwal_kuliah_id" id="jadwal_kuliah_id">
                                        <option value="">Pilih Jadwal</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Tambah Mata Kuliah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endif
@endsection

@section('custom-js')
    <script>
        function approveKRS() {
            if (confirm('Apakah Anda yakin ingin menyetujui KRS ini?')) {
                const form = document.createElement('form');
                form.method = 'POST';
                form.action = '{{ route($spref . "akademik.krs-approve", $krs->code) }}';

                const csrfToken = document.createElement('input');
                csrfToken.type = 'hidden';
                csrfToken.name = '_token';
                csrfToken.value = '{{ csrf_token() }}';
                form.appendChild(csrfToken);

                document.body.appendChild(form);
                form.submit();
            }
        }

        function rejectKRS() {
            const reason = prompt('Masukkan alasan penolakan:');
            if (reason) {
                const form = document.createElement('form');
                form.method = 'POST';
                form.action = '{{ route($spref . "akademik.krs-reject", $krs->code) }}';

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

        function publishKRS() {
            if (confirm('Apakah Anda yakin ingin mempublish KRS ini?')) {
                const form = document.createElement('form');
                form.method = 'POST';
                form.action = '{{ route($spref . "akademik.krs-publish", $krs->code) }}';

                const csrfToken = document.createElement('input');
                csrfToken.type = 'hidden';
                csrfToken.name = '_token';
                csrfToken.value = '{{ csrf_token() }}';
                form.appendChild(csrfToken);

                document.body.appendChild(form);
                form.submit();
            }
        }

        function lockKRS() {
            if (confirm('Apakah Anda yakin ingin mengunci KRS ini? KRS yang dikunci tidak dapat diubah lagi.')) {
                const form = document.createElement('form');
                form.method = 'POST';
                form.action = '{{ route($spref . "akademik.krs-lock", $krs->code) }}';

                const csrfToken = document.createElement('input');
                csrfToken.type = 'hidden';
                csrfToken.name = '_token';
                csrfToken.value = '{{ csrf_token() }}';
                form.appendChild(csrfToken);

                document.body.appendChild(form);
                form.submit();
            }
        }

        function removeDetail(detailId) {
            if (confirm('Apakah Anda yakin ingin menghapus mata kuliah ini dari KRS?')) {
                const form = document.createElement('form');
                form.method = 'POST';
                form.action = '{{ route($spref . "akademik.krs-handle") }}';

                const csrfToken = document.createElement('input');
                csrfToken.type = 'hidden';
                csrfToken.name = '_token';
                csrfToken.value = '{{ csrf_token() }}';
                form.appendChild(csrfToken);

                const actionInput = document.createElement('input');
                actionInput.type = 'hidden';
                actionInput.name = 'action';
                actionInput.value = 'remove_detail';
                form.appendChild(actionInput);

                const detailIdInput = document.createElement('input');
                detailIdInput.type = 'hidden';
                detailIdInput.name = 'detail_id';
                detailIdInput.value = detailId;
                form.appendChild(detailIdInput);

                document.body.appendChild(form);
                form.submit();
            }
        }

        function loadKelas() {
            const mataKuliahId = document.getElementById('mata_kuliah_id').value;
            const kelasSelect = document.getElementById('kelas_id');
            const jadwalSelect = document.getElementById('jadwal_kuliah_id');

            // Reset kelas and jadwal
            kelasSelect.innerHTML = '<option value="">Pilih Kelas</option>';
            jadwalSelect.innerHTML = '<option value="">Pilih Jadwal</option>';

            if (mataKuliahId) {
                // In a real implementation, you would make an AJAX call here
                // For now, we'll just enable the select
                kelasSelect.disabled = false;
            } else {
                kelasSelect.disabled = true;
                jadwalSelect.disabled = true;
            }
        }

        function loadJadwal() {
            const kelasId = document.getElementById('kelas_id').value;
            const jadwalSelect = document.getElementById('jadwal_kuliah_id');

            // Reset jadwal
            jadwalSelect.innerHTML = '<option value="">Pilih Jadwal</option>';

            if (kelasId) {
                // In a real implementation, you would make an AJAX call here
                // For now, we'll just enable the select
                jadwalSelect.disabled = false;
            } else {
                jadwalSelect.disabled = true;
            }
        }
    </script>
@endsection
