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

        /* Specific text alignment for certain columns */
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
        @media screen and (max-width: 768px) {
            .table td[data-label] .d-flex.align-items-center,
            .table td[data-label] .d-flex.flex-column.align-items-center {
                align-items: flex-end !important;
                text-align: right;
            }
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
        <!-- Main Content -->
        <div class="col-lg-8 col-12 mb-2">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">{{ $pages }}</h5>
                    <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseForm" aria-expanded="false" aria-controls="collapseForm">
                        <i class="fas fa-plus-circle me-2"></i>Tambah Group Tagihan
                    </button>
                </div>
                <div class="card-body">
                    <!-- Quick Stats -->
                    <div class="row mb-4">
                        <div class="col-md-4 mb-2">
                            <div class="p-3 bg-light-primary rounded">
                                <h6 class="mb-2">Total Group</h6>
                                <h3 class="mb-0">{{ count($groups) }}</h3>
                            </div>
                        </div>
                        <div class="col-md-4 mb-2">
                            <div class="p-3 bg-light-success rounded">
                                <h6 class="mb-2">Published</h6>
                                <h3 class="mb-0">{{ $groups->where('status', 'Published')->count() }}</h3>
                            </div>
                        </div>
                        <div class="col-md-4 mb-2">
                            <div class="p-3 bg-light-warning rounded">
                                <h6 class="mb-2">Draft</h6>
                                <h3 class="mb-0">{{ $groups->where('status', 'Draft')->count() }}</h3>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Collapsible Form -->
                    <div class="collapse" id="collapseForm">
                        <div class="card card-body border">
                            <h5 class="card-title mb-3">Tambah Group Tagihan Baru</h5>
                            <form action="{{ route($spref . 'keuangan.tagihan-kuliah-group-handle') }}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="name" class="form-label">Nama Group</label>
                                        <input type="text" class="form-control" name="name" id="name" required>
                                        @error('name')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="taka_id" class="form-label">Tahun Akademik</label>
                                        <select class="form-select" name="taka_id" id="taka_id" required>
                                            <option value="">Pilih Tahun Akademik</option>
                                            @foreach($tahunAkademiks as $taka)
                                                <option value="{{ $taka->id }}">{{ $taka->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('taka_id')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="amount" class="form-label">Jumlah Tagihan</label>
                                        <input type="number" class="form-control" name="amount" id="amount" min="0" required>
                                        @error('amount')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="due_date" class="form-label">Tenggat Waktu</label>
                                        <input type="date" class="form-control" name="due_date" id="due_date" required>
                                        @error('due_date')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="prodi_id" class="form-label">Program Studi (Opsional)</label>
                                        <select class="form-select" name="prodi_id" id="prodi_id">
                                            <option value="">Pilih Program Studi</option>
                                            @foreach($prodis as $prodi)
                                                <option value="{{ $prodi->id }}">{{ $prodi->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('prodi_id')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="kelas_id" class="form-label">Kelas (Opsional)</label>
                                        <select class="form-select" name="kelas_id" id="kelas_id">
                                            <option value="">Pilih Kelas</option>
                                            @foreach($kelas as $k)
                                                <option value="{{ $k->id }}">{{ $k->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('kelas_id')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="gelombang_id" class="form-label">Gelombang (Opsional)</label>
                                        <select class="form-select" name="gelombang_id" id="gelombang_id">
                                            <option value="">Pilih Gelombang</option>
                                            @foreach($gelombangs as $gelombang)
                                                <option value="{{ $gelombang->id }}">{{ $gelombang->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('gelombang_id')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="jalur_id" class="form-label">Jalur (Opsional)</label>
                                        <select class="form-select" name="jalur_id" id="jalur_id">
                                            <option value="">Pilih Jalur</option>
                                            @foreach($jalurs as $jalur)
                                                <option value="{{ $jalur->id }}">{{ $jalur->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('jalur_id')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="semester" class="form-label">Semester (Opsional)</label>
                                        <select class="form-select" name="semester" id="semester">
                                            <option value="">Pilih Semester</option>
                                            @for($i = 1; $i <= 14; $i++)
                                                <option value="{{ $i }}">Semester {{ $i }}</option>
                                            @endfor
                                        </select>
                                        @error('semester')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-12 mb-3">
                                        <label for="desc" class="form-label">Deskripsi (Opsional)</label>
                                        <textarea name="desc" id="desc" class="form-control" rows="3" placeholder="Deskripsi group tagihan"></textarea>
                                        @error('desc')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-12 d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fas fa-save me-2"></i>Simpan
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    
                    <!-- Table -->
                    <div class="table-responsive mt-3">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th>Kode</th>
                                    <th>Nama</th>
                                    <th>Jumlah</th>
                                    <th>Status</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($groups as $key => $group)
                                    <tr>
                                        <td data-label="No">{{ ++$key }}</td>
                                        <td data-label="Kode">
                                            <div class="d-flex flex-column">
                                                <span class="fw-bold">{{ $group->code }}</span>
                                                <small class="text-muted">{{ $group->tahunAkademik->name }}</small>
                                            </div>
                                        </td>
                                        <td data-label="Nama">
                                            <div class="d-flex flex-column">
                                                <span class="fw-bold">{{ $group->name }}</span>
                                                <small class="text-muted">
                                                    @if($group->prodi)
                                                        {{ $group->prodi->name }}
                                                    @endif
                                                    @if($group->kelas)
                                                        {{ $group->kelas->name }}
                                                    @endif
                                                    @if($group->gelombang)
                                                        {{ $group->gelombang->name }}
                                                    @endif
                                                    @if($group->jalur)
                                                        {{ $group->jalur->name }}
                                                    @endif
                                                </small>
                                            </div>
                                        </td>
                                        <td data-label="Jumlah">
                                            <div class="d-flex flex-column">
                                                <span class="fw-bold">Rp {{ number_format($group->amount, 0, ',', '.') }}</span>
                                                <small class="text-muted">Due: {{ \Carbon\Carbon::parse($group->due_date)->format('d M Y') }}</small>
                                            </div>
                                        </td>
                                        <td data-label="Status">
                                            <span class="badge {{ $group->status == 'Published' ? 'bg-light-success text-success' : ($group->status == 'Draft' ? 'bg-light-warning text-warning' : 'bg-light-info text-info') }}">
                                                {{ $group->status }}
                                            </span>
                                        </td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                @if($group->status == 'Draft')
                                                    <form action="{{ route($spref . 'keuangan.tagihan-kuliah-group-publish', $group->code) }}" method="POST" class="d-inline">
                                                        @csrf
                                                        <button type="submit" class="btn btn-sm btn-success" data-bs-toggle="tooltip" title="Publish Group">
                                                            <i class="fas fa-check"></i>
                                                        </button>
                                                    </form>
                                                @endif
                                                @if($group->status == 'Published')
                                                    <a href="{{ route($spref . 'keuangan.tagihan-kuliah-group-detail', $group->code) }}" class="btn btn-sm btn-info" data-bs-toggle="tooltip" title="Lihat Detail Tagihan">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                @endif
                                                <a href="#" data-bs-toggle="modal" data-bs-target="#editData{{ $group->code }}" class="btn btn-sm btn-primary" data-bs-toggle="tooltip" title="Edit Group">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <form action="{{ route($spref . 'keuangan.tagihan-kuliah-group-delete', $group->code) }}" method="POST" class="d-inline" id="delete-form-{{ $group->code }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="button" class="btn btn-sm btn-danger" data-confirm-delete="true" data-bs-toggle="tooltip" title="Hapus Group" onclick="confirmDelete('{{ $group->code }}')">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
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
        
        <!-- Sidebar Content -->
        <div class="col-lg-4 col-12 mb-2">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Informasi Group Tagihan</h5>
                </div>
                <div class="card-body">
                    <p>Bagian ini menampilkan informasi umum dan petunjuk terkait pengelolaan Group Tagihan.</p>
                    
                    <div class="alert alert-light-success">
                        <h6 class="">Petunjuk Penggunaan:</h6>
                        <ul class="mb-0">
                            <li>Klik tombol "Tambah Group Tagihan" untuk membuat group tagihan baru</li>
                            <li>Klik ikon <i class="fas fa-check"></i> untuk mempublish group tagihan</li>
                            <li>Klik ikon <i class="fas fa-edit"></i> untuk mengedit data group</li>
                            <li>Klik ikon <i class="fas fa-trash"></i> untuk menghapus group</li>
                        </ul>
                    </div>
                    
                    @if(count($groups) > 0)
                        <div class="mt-4">
                            <h6>Group Tagihan Terbaru</h6>
                            <div class="list-group">
                                @foreach($groups->take(5) as $recent)
                                    <div class="list-group-item list-group-item-action">
                                        <div class="d-flex w-100 justify-content-between">
                                            <h6 class="mb-1">{{ $recent->name }}</h6>
                                            <small class="text-muted">{{ $recent->created_at->diffForHumans() }}</small>
                                        </div>
                                        <p class="mb-1">
                                            <span class="badge {{ $recent->status == 'Published' ? 'bg-light-success text-success' : ($recent->status == 'Draft' ? 'bg-light-warning text-warning' : 'bg-light-info text-info') }}">
                                                {{ $recent->status }}
                                            </span>
                                            Rp {{ number_format($recent->amount, 0, ',', '.') }}
                                        </p>
                                        <small class="text-muted">
                                            @if($recent->prodi)
                                                {{ $recent->prodi->name }}
                                            @endif
                                            @if($recent->kelas)
                                                - {{ $recent->kelas->name }}
                                            @endif
                                        </small>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Modals -->
    @foreach ($groups as $group)
        <div class="modal fade" id="editData{{ $group->code }}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel{{ $group->code }}" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <form action="{{ route($spref . 'keuangan.tagihan-kuliah-group-update', $group->code) }}" method="POST">
                        @method('patch')
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title" id="editModalLabel{{ $group->code }}">Edit Group Tagihan - {{ $group->code }}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="edit_name{{ $group->code }}" class="form-label">Nama Group</label>
                                    <input type="text" class="form-control" name="name" id="edit_name{{ $group->code }}" value="{{ $group->name }}" required>
                                    @error('name')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="edit_taka_id{{ $group->code }}" class="form-label">Tahun Akademik</label>
                                    <select class="form-select" name="taka_id" id="edit_taka_id{{ $group->code }}" required>
                                        <option value="">Pilih Tahun Akademik</option>
                                        @foreach($tahunAkademiks as $taka)
                                            <option value="{{ $taka->id }}" {{ $group->taka_id == $taka->id ? 'selected' : '' }}>{{ $taka->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('taka_id')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="edit_amount{{ $group->code }}" class="form-label">Jumlah Tagihan</label>
                                    <input type="number" class="form-control" name="amount" id="edit_amount{{ $group->code }}" value="{{ $group->amount }}" min="0" required>
                                    @error('amount')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="edit_due_date{{ $group->code }}" class="form-label">Tenggat Waktu</label>
                                    <input type="date" class="form-control" name="due_date" id="edit_due_date{{ $group->code }}" value="{{ $group->due_date }}" required>
                                    @error('due_date')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="edit_prodi_id{{ $group->code }}" class="form-label">Program Studi (Opsional)</label>
                                    <select class="form-select" name="prodi_id" id="edit_prodi_id{{ $group->code }}">
                                        <option value="">Pilih Program Studi</option>
                                        @foreach($prodis as $prodi)
                                            <option value="{{ $prodi->id }}" {{ $group->prodi_id == $prodi->id ? 'selected' : '' }}>{{ $prodi->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('prodi_id')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="edit_kelas_id{{ $group->code }}" class="form-label">Kelas (Opsional)</label>
                                    <select class="form-select" name="kelas_id" id="edit_kelas_id{{ $group->code }}">
                                        <option value="">Pilih Kelas</option>
                                        @foreach($kelas as $k)
                                            <option value="{{ $k->id }}" {{ $group->kelas_id == $k->id ? 'selected' : '' }}>{{ $k->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('kelas_id')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="edit_gelombang_id{{ $group->code }}" class="form-label">Gelombang (Opsional)</label>
                                    <select class="form-select" name="gelombang_id" id="edit_gelombang_id{{ $group->code }}">
                                        <option value="">Pilih Gelombang</option>
                                        @foreach($gelombangs as $gelombang)
                                            <option value="{{ $gelombang->id }}" {{ $group->gelombang_id == $gelombang->id ? 'selected' : '' }}>{{ $gelombang->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('gelombang_id')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="edit_jalur_id{{ $group->code }}" class="form-label">Jalur (Opsional)</label>
                                    <select class="form-select" name="jalur_id" id="edit_jalur_id{{ $group->code }}">
                                        <option value="">Pilih Jalur</option>
                                        @foreach($jalurs as $jalur)
                                            <option value="{{ $jalur->id }}" {{ $group->jalur_id == $jalur->id ? 'selected' : '' }}>{{ $jalur->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('jalur_id')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="edit_semester{{ $group->code }}" class="form-label">Semester (Opsional)</label>
                                    <select class="form-select" name="semester" id="edit_semester{{ $group->code }}">
                                        <option value="">Pilih Semester</option>
                                        @for($i = 1; $i <= 14; $i++)
                                            <option value="{{ $i }}" {{ $group->semester == $i ? 'selected' : '' }}>Semester {{ $i }}</option>
                                        @endfor
                                    </select>
                                    @error('semester')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="edit_status{{ $group->code }}" class="form-label">Status</label>
                                    <select class="form-select" name="status" id="edit_status{{ $group->code }}" required>
                                        <option value="Draft" {{ $group->status == 'Draft' ? 'selected' : '' }}>Draft</option>
                                        <option value="Published" {{ $group->status == 'Published' ? 'selected' : '' }}>Published</option>
                                        <option value="Archived" {{ $group->status == 'Archived' ? 'selected' : '' }}>Archived</option>
                                    </select>
                                    @error('status')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="edit_desc{{ $group->code }}" class="form-label">Deskripsi (Opsional)</label>
                                    <textarea name="desc" id="edit_desc{{ $group->code }}" class="form-control" rows="3">{{ $group->desc }}</textarea>
                                    @error('desc')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save me-1"></i> Simpan Perubahan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
@endsection

@section('custom-js')
    <script src="{{ asset('dist') }}/assets/extensions/jquery/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>

    <script>
        // Initialize DataTable
        $(document).ready(function() {
            $('.table').DataTable({
                language: {
                    search: "Cari:",
                    lengthMenu: "Tampilkan _MENU_ data per halaman",
                    zeroRecords: "Data tidak ditemukan",
                    info: "Menampilkan halaman _PAGE_ dari _PAGES_",
                    infoEmpty: "Tidak ada data yang tersedia",
                    infoFiltered: "(difilter dari _MAX_ total data)",
                    paginate: {
                        first: "Pertama",
                        last: "Terakhir",
                        next: "Selanjutnya",
                        previous: "Sebelumnya"
                    }
                },
                responsive: true,
                pageLength: 10,
                lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "Semua"]],
                order: [[0, 'asc']],
                columnDefs: [
                    { orderable: false, targets: -1 }
                ]
            });
        });

        // Konfirmasi delete dengan SweetAlert
        function confirmDelete(code) {
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Data group tagihan yang dihapus tidak dapat dikembalikan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete-form-' + code).submit();
                }
            });
        }
    </script>
@endsection