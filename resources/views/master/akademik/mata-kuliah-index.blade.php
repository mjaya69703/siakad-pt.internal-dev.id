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
            padding-top: 1rem;    /* Added padding top */
            padding-bottom: 0.75rem;
            text-align: left;     /* Default left align for headers */
        }

        .table td {
            vertical-align: middle;
            padding-top: 0.75rem;
            padding-bottom: 0.75rem;
            text-align: left; /* Default left align for cells */
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
                text-align: left !important; /* Ensure left alignment in mobile view */
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
                        <i class="fas fa-plus-circle me-2"></i>Tambah Mata Kuliah
                    </button>
                </div>
                <div class="card-body">
                    <!-- Quick Stats -->
                    <div class="row mb-4">
                        <div class="col-md-4 mb-2">
                            <div class="p-3 bg-light-primary rounded">
                                <h6 class="mb-2">Total Mata Kuliah</h6>
                                <h3 class="mb-0">{{ count($mata_kuliah) }}</h3>
                            </div>
                        </div>
                        <div class="col-md-4 mb-2">
                            <div class="p-3 bg-light-success rounded">
                                <h6 class="mb-2">Mata Kuliah Aktif</h6>
                                <h3 class="mb-0">{{ $mata_kuliah->where('status', 'Aktif')->count() }}</h3>
                            </div>
                        </div>
                        <div class="col-md-4 mb-2">
                            <div class="p-3 bg-light-warning rounded">
                                <h6 class="mb-2">Mata Kuliah Tidak Aktif</h6>
                                <h3 class="mb-0">{{ $mata_kuliah->where('status', 'Tidak Aktif')->count() }}</h3>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Collapsible Form -->
                    <div class="collapse" id="collapseForm">
                        <div class="card card-body border">
                            <h5 class="card-title mb-3">Tambah Mata Kuliah Baru</h5>
                            <form action="{{ route($spref . 'akademik.mata-kuliah-handle') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="kurikulum_id" class="form-label">Kurikulum</label>
                                        <select class="form-select" name="kurikulum_id" id="kurikulum_id">
                                            <option value="">Pilih Kurikulum</option>
                                            @foreach ($kurikulum as $k)
                                                <option value="{{ $k->id }}">{{ $k->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('kurikulum_id')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="prodi_id" class="form-label">Program Studi</label>
                                        <select class="form-select" name="prodi_id" id="prodi_id">
                                            <option value="">Pilih Program Studi</option>
                                            @foreach ($program_studi as $p)
                                                <option value="{{ $p->id }}">{{ $p->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('prodi_id')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="requi_id" class="form-label">Prasyarat (Opsional)</label>
                                        <select class="form-select" name="requi_id" id="requi_id">
                                            <option value="">Pilih Mata Kuliah Prasyarat</option>
                                            @foreach ($mata_kuliah as $mk)
                                                <option value="{{ $mk->id }}">{{ $mk->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('requi_id')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="dosen1_id" class="form-label">Dosen 1</label>
                                        <select class="form-select" name="dosen1_id" id="dosen1_id">
                                            <option value="">Pilih Dosen 1</option>
                                            @foreach ($dosens as $dosen)
                                                <option value="{{ $dosen->id }}">{{ $dosen->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('dosen1_id')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="dosen2_id" class="form-label">Dosen 2 (Opsional)</label>
                                        <select class="form-select" name="dosen2_id" id="dosen2_id">
                                            <option value="">Pilih Dosen 2</option>
                                            @foreach ($dosens as $dosen)
                                                <option value="{{ $dosen->id }}">{{ $dosen->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('dosen2_id')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="dosen3_id" class="form-label">Dosen 3 (Opsional)</label>
                                        <select class="form-select" name="dosen3_id" id="dosen3_id">
                                            <option value="">Pilih Dosen 3</option>
                                            @foreach ($dosens as $dosen)
                                                <option value="{{ $dosen->id }}">{{ $dosen->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('dosen3_id')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="semester" class="form-label">Semester</label>
                                        <input type="number" class="form-control" name="semester" id="semester" min="1" max="14" placeholder="Contoh: 1">
                                        @error('semester')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="bsks" class="form-label">Beban SKS</label>
                                        <input type="text" class="form-control" name="bsks" id="bsks" placeholder="Contoh: 3">
                                        @error('bsks')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="name" class="form-label">Nama Mata Kuliah</label>
                                        <input type="text" class="form-control" name="name" id="name" placeholder="Contoh: Pemrograman Web">
                                        @error('name')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="photo" class="form-label">Foto (Opsional)</label>
                                        <input type="file" class="form-control" name="photo" id="photo" accept="image/*">
                                        @error('photo')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="docs_rps" class="form-label">Dokumen RPS (Opsional)</label>
                                        <input type="file" class="form-control" name="docs_rps" id="docs_rps" accept=".pdf">
                                        @error('docs_rps')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="docs_kontrak_kuliah" class="form-label">Dokumen Kontrak Kuliah (Opsional)</label>
                                        <input type="file" class="form-control" name="docs_kontrak_kuliah" id="docs_kontrak_kuliah" accept=".pdf">
                                        @error('docs_kontrak_kuliah')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-12 mb-3">
                                        <label for="desc" class="form-label">Deskripsi</label>
                                        <textarea name="desc" id="desc" class="form-control" rows="3" placeholder="Deskripsi mata kuliah"></textarea>
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
                                    <th>Nama Mata Kuliah</th>
                                    <th>Kode</th>
                                    <th>Program Studi</th>
                                    <th>Semester</th>
                                    <th>SKS</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($mata_kuliah as $key => $item)
                                    <tr>
                                        <td data-label="No">{{ ++$key }}</td>
                                        <td data-label="Nama Mata Kuliah">
                                            <div class="d-flex flex-column">
                                                <span class="fw-bold">{{ $item->name }}</span>
                                                <small class="text-muted">{{ $item->programStudi->name }}</small>
                                            </div>
                                        </td>
                                        <td data-label="Kode">{{ $item->code }}</td>
                                        <td data-label="Program Studi">{{ $item->programStudi->name }}</td>
                                        <td data-label="Semester">{{ $item->semester }}</td>
                                        <td data-label="SKS">{{ $item->bsks }}</td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <a href="#" data-bs-toggle="modal" data-bs-target="#editData{{ $item->code }}" class="btn btn-sm btn-primary" data-bs-toggle="tooltip" title="Edit Mata Kuliah">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <form action="{{ route($spref . 'akademik.mata-kuliah-delete', $item->code) }}" method="POST" class="d-inline" id="delete-form-{{ $item->code }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="button" class="btn btn-sm btn-danger" data-confirm-delete="true" data-bs-toggle="tooltip" title="Hapus Mata Kuliah" onclick="confirmDelete('{{ $item->code }}')">
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
                    <h5 class="card-title">Informasi Mata Kuliah</h5>
                </div>
                <div class="card-body">
                    <p>Bagian ini menampilkan informasi umum dan petunjuk terkait pengelolaan Mata Kuliah.</p>
                    
                    <div class="alert alert-light-success">
                        <h6 class="">Petunjuk Penggunaan:</h6>
                        <ul class="mb-0">
                            <li>Klik tombol "Tambah Mata Kuliah" untuk menambahkan mata kuliah baru</li>
                            <li>Klik ikon <i class="fas fa-edit"></i> untuk mengedit data mata kuliah</li>
                            <li>Klik ikon <i class="fas fa-trash"></i> untuk menghapus mata kuliah</li>
                        </ul>
                    </div>
                    
                    @if(count($mata_kuliah) > 0)
                        <div class="mt-4">
                            <h6>Mata Kuliah Terbaru</h6>
                            <div class="list-group">
                                @foreach($mata_kuliah->take(5) as $mk)
                                    <div class="list-group-item list-group-item-action">
                                        <div class="d-flex w-100 justify-content-between">
                                            <h6 class="mb-1">{{ $mk->name }}</h6>
                                            <small class="text-muted">{{ $mk->bsks }} SKS</small>
                                        </div>
                                        <p class="mb-1">{{ Str::limit($mk->desc, 50) }}</p>
                                        <small>Semester: {{ $mk->semester }}</small>
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
    @foreach ($mata_kuliah as $item)
        <div class="modal fade" id="editData{{ $item->code }}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel{{ $item->code }}" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <form action="{{ route($spref . 'akademik.mata-kuliah-update', $item->code) }}" method="POST" enctype="multipart/form-data">
                        @method('patch')
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title" id="editModalLabel{{ $item->code }}">Edit Mata Kuliah - {{ $item->name }}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="edit_kurikulum_id{{ $item->code }}" class="form-label">Kurikulum</label>
                                    <select class="form-select" name="kurikulum_id" id="edit_kurikulum_id{{ $item->code }}">
                                        <option value="">Pilih Kurikulum</option>
                                        @foreach ($kurikulum as $k)
                                            <option value="{{ $k->id }}" {{ $item->kurikulum_id == $k->id ? 'selected' : '' }}>{{ $k->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('kurikulum_id')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="edit_prodi_id{{ $item->code }}" class="form-label">Program Studi</label>
                                    <select class="form-select" name="prodi_id" id="edit_prodi_id{{ $item->code }}">
                                        <option value="">Pilih Program Studi</option>
                                        @foreach ($program_studi as $p)
                                            <option value="{{ $p->id }}" {{ $item->prodi_id == $p->id ? 'selected' : '' }}>{{ $p->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('prodi_id')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="edit_requi_id{{ $item->code }}" class="form-label">Prasyarat (Opsional)</label>
                                    <select class="form-select" name="requi_id" id="edit_requi_id{{ $item->code }}">
                                        <option value="">Pilih Mata Kuliah Prasyarat</option>
                                        @foreach ($mata_kuliah as $mk)
                                            <option value="{{ $mk->id }}" {{ $item->requi_id == $mk->id ? 'selected' : '' }}>{{ $mk->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('requi_id')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="edit_dosen1_id{{ $item->code }}" class="form-label">Dosen 1</label>
                                    <select class="form-select" name="dosen1_id" id="edit_dosen1_id{{ $item->code }}">
                                        <option value="">Pilih Dosen 1</option>
                                        @foreach ($dosens as $dosen)
                                            <option value="{{ $dosen->id }}" {{ $item->dosen1_id == $dosen->id ? 'selected' : '' }}>{{ $dosen->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('dosen1_id')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="edit_dosen2_id{{ $item->code }}" class="form-label">Dosen 2 (Opsional)</label>
                                    <select class="form-select" name="dosen2_id" id="edit_dosen2_id{{ $item->code }}">
                                        <option value="">Pilih Dosen 2</option>
                                        @foreach ($dosens as $dosen)
                                            <option value="{{ $dosen->id }}" {{ $item->dosen2_id == $dosen->id ? 'selected' : '' }}>{{ $dosen->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('dosen2_id')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="edit_dosen3_id{{ $item->code }}" class="form-label">Dosen 3 (Opsional)</label>
                                    <select class="form-select" name="dosen3_id" id="edit_dosen3_id{{ $item->code }}">
                                        <option value="">Pilih Dosen 3</option>
                                        @foreach ($dosens as $dosen)
                                            <option value="{{ $dosen->id }}" {{ $item->dosen3_id == $dosen->id ? 'selected' : '' }}>{{ $dosen->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('dosen3_id')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="edit_semester{{ $item->code }}" class="form-label">Semester</label>
                                    <input type="number" class="form-control" name="semester" id="edit_semester{{ $item->code }}" min="1" max="14" value="{{ $item->semester }}">
                                    @error('semester')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="edit_bsks{{ $item->code }}" class="form-label">Beban SKS</label>
                                    <input type="text" class="form-control" name="bsks" id="edit_bsks{{ $item->code }}" value="{{ $item->bsks }}">
                                    @error('bsks')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="edit_name{{ $item->code }}" class="form-label">Nama Mata Kuliah</label>
                                    <input type="text" class="form-control" name="name" id="edit_name{{ $item->code }}" value="{{ $item->name }}">
                                    @error('name')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="edit_photo{{ $item->code }}" class="form-label">Foto (Opsional)</label>
                                    <input type="file" class="form-control" name="photo" id="edit_photo{{ $item->code }}" accept="image/*">
                                    @error('photo')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="edit_docs_rps{{ $item->code }}" class="form-label">Dokumen RPS (Opsional)</label>
                                    <input type="file" class="form-control" name="docs_rps" id="edit_docs_rps{{ $item->code }}" accept=".pdf">
                                    @error('docs_rps')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="edit_docs_kontrak_kuliah{{ $item->code }}" class="form-label">Dokumen Kontrak Kuliah (Opsional)</label>
                                    <input type="file" class="form-control" name="docs_kontrak_kuliah" id="edit_docs_kontrak_kuliah{{ $item->code }}" accept=".pdf">
                                    @error('docs_kontrak_kuliah')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="edit_desc{{ $item->code }}" class="form-label">Deskripsi</label>
                                    <textarea name="desc" id="edit_desc{{ $item->code }}" class="form-control" rows="3">{{ $item->desc }}</textarea>
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
                text: "Data mata kuliah yang dihapus tidak dapat dikembalikan!",
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