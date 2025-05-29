@extends('core-themes.core-backpage')

@section('custom-css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
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
                        <i class="fas fa-plus-circle me-2"></i>Tambah Program Studi
                    </button>
                </div>
                <div class="card-body">
                    <!-- Quick Stats -->
                    <div class="row mb-4">
                        <div class="col-md-4 mb-2">
                            <div class="p-3 bg-light-primary rounded">
                                <h6 class="mb-2">Total Program Studi</h6>
                                <h3 class="mb-0">{{ count($prodi) }}</h3>
                            </div>
                        </div>
                        <div class="col-md-4 mb-2">
                            <div class="p-3 bg-light-success rounded">
                                <h6 class="mb-2">Program Studi Aktif</h6>
                                <h3 class="mb-0">{{ $prodi->where('status', 'Aktif')->count() }}</h3>
                            </div>
                        </div>
                        <div class="col-md-4 mb-2">
                            <div class="p-3 bg-light-warning rounded">
                                <h6 class="mb-2">Program Studi Tidak Aktif</h6>
                                <h3 class="mb-0">{{ $prodi->where('status', 'Tidak Aktif')->count() }}</h3>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Collapsible Form -->
                    <div class="collapse" id="collapseForm">
                        <div class="card card-body border">
                            <h5 class="card-title mb-3">Tambah Program Studi Baru</h5>
                            <form action="{{ route($spref . 'akademik.prodi-handle') }}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="fakultas_id" class="form-label">Fakultas</label>
                                        <select class="form-select" name="fakultas_id" id="fakultas_id">
                                            <option value="">Pilih Fakultas</option>
                                            @foreach ($fakultas as $f)
                                                <option value="{{ $f->id }}">{{ $f->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('fakultas_id')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="kaprodi_id" class="form-label">Kaprodi</label>
                                        <select class="form-select" name="kaprodi_id" id="kaprodi_id">
                                            <option value="">Pilih Kaprodi</option>
                                            @foreach ($dosens as $dosen)
                                                <option value="{{ $dosen->id }}">{{ $dosen->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('kaprodi_id')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="name" class="form-label">Nama Program Studi</label>
                                        <input type="text" class="form-control" name="name" id="name" placeholder="Contoh: Teknik Informatika">
                                        @error('name')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                     <div class="col-md-6 mb-3">
                                        <label for="code" class="form-label">Kode Program Studi</label>
                                        <input type="text" class="form-control" name="code" id="code" placeholder="Contoh: TI" disabled>
                                        @error('code')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="level" class="form-label">Jenjang Pendidikan</label>
                                        <select class="form-select" name="level" id="level">
                                            <option value="">Pilih Jenjang</option>
                                            <option value="Diploma">Diploma</option>
                                            <option value="Sarjana">Sarjana</option>
                                            <option value="Magister">Magister</option>
                                            <option value="Doktoral">Doktoral</option>
                                        </select>
                                        @error('level')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                     <div class="col-md-6 mb-3">
                                        <label for="title" class="form-label">Gelar</label>
                                        <select class="form-select" name="title" id="title">
                                             <option value="">Pilih Gelar</option>
                                            <option value="D3">D3</option>
                                            <option value="S1">S1</option>
                                            <option value="S2">S2</option>
                                            <option value="S3">S3</option>
                                        </select>
                                        @error('title')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                     <div class="col-md-6 mb-3">
                                        <label for="title_start" class="form-label">Gelar Awal (Opsional)</label>
                                        <input type="text" class="form-control" name="title_start" id="title_start" placeholder="Contoh: A.Md.">
                                        @error('title_start')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                     <div class="col-md-6 mb-3">
                                        <label for="title_ended" class="form-label">Gelar Akhir (Opsional)</label>
                                        <input type="text" class="form-control" name="title_ended" id="title_ended" placeholder="Contoh: S.Kom.">
                                        @error('title_ended')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                     <div class="col-md-6 mb-3">
                                        <label for="accreditation" class="form-label">Akreditasi (Opsional)</label>
                                        <input type="text" class="form-control" name="accreditation" id="accreditation" placeholder="Contoh: A">
                                        @error('accreditation')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                     <div class="col-md-6 mb-3">
                                        <label for="duration" class="form-label">Durasi (Tahun, Opsional)</label>
                                        <input type="number" class="form-control" name="duration" id="duration" placeholder="Contoh: 4">
                                        @error('duration')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-12 mb-3">
                                        <label for="desc" class="form-label">Deskripsi (Opsional)</label>
                                        <textarea name="desc" id="desc" class="form-control" rows="3" placeholder="Deskripsi singkat program studi"></textarea>
                                        @error('desc')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                     <div class="col-12 mb-3">
                                        <label for="objectives" class="form-label">Tujuan (Opsional)</label>
                                        <textarea name="objectives" id="objectives" class="form-control" rows="3" placeholder="Tujuan program studi"></textarea>
                                        @error('objectives')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                     <div class="col-12 mb-3">
                                        <label for="careers" class="form-label">Prospek Karir (Opsional)</label>
                                        <textarea name="careers" id="careers" class="form-control" rows="3" placeholder="Prospek karir lulusan"></textarea>
                                        @error('careers')
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
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th>Nama Program Studi</th>
                                    <th>Kode</th>
                                    <th>Jenjang</th>
                                    <th>Gelar</th>
                                    <th>Status</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($prodi as $key => $item)
                                    <tr>
                                        <td data-label="No" class="text-center">{{ ++$key }}</td>
                                        <td data-label="Nama Program Studi">
                                            <div class="d-flex flex-column">
                                                <span class="fw-bold">{{ $item->name }}</span>
                                                @if($item->slug)
                                                    <small class="text-muted">{{ $item->slug }}</small>
                                                @endif
                                            </div>
                                        </td>
                                        <td data-label="Kode">{{ $item->code }}</td>
                                        <td data-label="Jenjang">{{ $item->level }}</td>
                                        <td data-label="Gelar">{{ $item->title }}</td>
                                        <td data-label="Status">
                                            <span class="badge {{ $item->status == 'Aktif' ? 'bg-light-success text-success' : 'bg-light-warning text-warning' }}">
                                                {{ $item->status }}
                                            </span>
                                        </td>
                                        <td data-label="Aksi" class="text-center">
                                            <div class="btn-group" role="group">
                                                <a href="#" data-bs-toggle="modal" data-bs-target="#editData{{ $item->code }}" class="btn btn-sm btn-primary" data-bs-toggle="tooltip" title="Edit Program Studi">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <form action="{{ route($spref . 'akademik.prodi-delete', $item->code) }}" method="POST" class="d-inline" id="delete-form-{{ $item->code }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="button" class="btn btn-sm btn-danger" data-confirm-delete="true" data-bs-toggle="tooltip" title="Hapus Program Studi" onclick="confirmDelete('{{ $item->code }}')">
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
                    <h5 class="card-title">Informasi Program Studi</h5>
                </div>
                <div class="card-body">
                    <p>Bagian ini menampilkan informasi umum dan petunjuk terkait pengelolaan Program Studi.</p>
                    
                    <div class="alert alert-light-success">
                        <h6 class="">Petunjuk Penggunaan:</h6>
                        <ul class="mb-0">
                            <li>Klik tombol "Tambah Program Studi" untuk menambahkan program studi baru</li>
                            <li>Klik ikon <i class="fas fa-edit"></i> untuk mengedit data program studi</li>
                            <li>Klik ikon <i class="fas fa-trash"></i> untuk menghapus program studi</li>
                        </ul>
                    </div>
                    
                    @if(count($prodi) > 0)
                        <div class="mt-4">
                            <h6>Program Studi Aktif</h6>
                            <div class="list-group">
                                @foreach($prodi->where('status', 'Aktif')->take(5) as $active)
                                    <div class="list-group-item list-group-item-action">
                                        <div class="d-flex w-100 justify-content-between">
                                            <h6 class="mb-1">{{ $active->name }} ({{ $active->title }})</h6>
                                            <small class="text-muted">{{ $active->level }}</small>
                                        </div>
                                        <p class="mb-1">{{ Str::limit($active->desc, 50) }}</p>
                                         <small>Akreditasi: {{ $active->accreditation ?? '-' }}</small>
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
    @foreach ($prodi as $item)
        <div class="modal fade" id="editData{{ $item->code }}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel{{ $item->code }}" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document"> {{-- Added modal-lg for wider modal --}}
                <div class="modal-content">
                    <form action="{{ route($spref . 'akademik.prodi-update', $item->code) }}" method="POST">
                        @method('patch')
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title" id="editModalLabel{{ $item->code }}">Edit Program Studi - {{ $item->name }}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                             <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="edit_fakultas_id{{ $item->code }}" class="form-label">Fakultas</label>
                                    <select class="form-select" name="fakultas_id" id="edit_fakultas_id{{ $item->code }}">
                                        <option value="">Pilih Fakultas</option>
                                        @foreach ($fakultas as $f)
                                            <option value="{{ $f->id }}" {{ $item->fakultas_id == $f->id ? 'selected' : '' }}>{{ $f->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('fakultas_id')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="edit_kaprodi_id{{ $item->code }}" class="form-label">Kaprodi</label>
                                    <select class="form-select" name="kaprodi_id" id="edit_kaprodi_id{{ $item->code }}">
                                        <option value="">Pilih Kaprodi</option>
                                        @foreach ($dosens as $dosen)
                                            <option value="{{ $dosen->id }}" {{ $item->kaprodi_id == $dosen->id ? 'selected' : '' }}>{{ $dosen->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('kaprodi_id')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="edit_name{{ $item->code }}" class="form-label">Nama Program Studi</label>
                                    <input type="text" class="form-control" name="name" id="edit_name{{ $item->code }}" value="{{ $item->name }}" placeholder="Contoh: Teknik Informatika">
                                    @error('name')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="edit_code{{ $item->code }}" class="form-label">Kode Program Studi</label>
                                    <input type="text" class="form-control" name="code" id="edit_code{{ $item->code }}" value="{{ $item->code }}" placeholder="Contoh: TI" disabled>
                                    @error('code')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                 <div class="col-md-6 mb-3">
                                    <label for="edit_level{{ $item->code }}" class="form-label">Jenjang Pendidikan</label>
                                    <select class="form-select" name="level" id="edit_level{{ $item->code }}">
                                        <option value="Diploma" {{ $item->level == 'Diploma' ? 'selected' : '' }}>Diploma</option>
                                        <option value="Sarjana" {{ $item->level == 'Sarjana' ? 'selected' : '' }}>Sarjana</option>
                                        <option value="Magister" {{ $item->level == 'Magister' ? 'selected' : '' }}>Magister</option>
                                        <option value="Doktoral" {{ $item->level == 'Doktoral' ? 'selected' : '' }}>Doktoral</option>
                                    </select>
                                    @error('level')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                 <div class="col-md-6 mb-3">
                                    <label for="edit_title{{ $item->code }}" class="form-label">Gelar</label>
                                    <select class="form-select" name="title" id="edit_title{{ $item->code }}">
                                        <option value="D3" {{ $item->title == 'D3' ? 'selected' : '' }}>D3</option>
                                        <option value="S1" {{ $item->title == 'S1' ? 'selected' : '' }}>S1</option>
                                        <option value="S2" {{ $item->title == 'S2' ? 'selected' : '' }}>S2</option>
                                        <option value="S3" {{ $item->title == 'S3' ? 'selected' : '' }}>S3</option>
                                    </select>
                                    @error('title')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                 <div class="col-md-6 mb-3">
                                    <label for="edit_title_start{{ $item->code }}" class="form-label">Gelar Awal (Opsional)</label>
                                    <input type="text" class="form-control" name="title_start" id="edit_title_start{{ $item->code }}" value="{{ $item->title_start }}" placeholder="Contoh: A.Md.">
                                    @error('title_start')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                 <div class="col-md-6 mb-3">
                                    <label for="edit_title_ended{{ $item->code }}" class="form-label">Gelar Akhir (Opsional)</label>
                                    <input type="text" class="form-control" name="title_ended" id="edit_title_ended{{ $item->code }}" value="{{ $item->title_ended }}" placeholder="Contoh: S.Kom.">
                                    @error('title_ended')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                 <div class="col-md-6 mb-3">
                                    <label for="edit_accreditation{{ $item->code }}" class="form-label">Akreditasi (Opsional)</label>
                                    <input type="text" class="form-control" name="accreditation" id="edit_accreditation{{ $item->code }}" value="{{ $item->accreditation }}" placeholder="Contoh: A">
                                    @error('accreditation')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                 <div class="col-md-6 mb-3">
                                    <label for="edit_duration{{ $item->code }}" class="form-label">Durasi (Tahun, Opsional)</label>
                                    <input type="number" class="form-control" name="duration" id="edit_duration{{ $item->code }}" value="{{ $item->duration }}" placeholder="Contoh: 4">
                                    @error('duration')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="edit_desc{{ $item->code }}" class="form-label">Deskripsi (Opsional)</label>
                                    <textarea name="desc" id="edit_desc{{ $item->code }}" class="form-control" rows="3" placeholder="Deskripsi singkat program studi">{{ $item->desc }}</textarea>
                                    @error('desc')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                 <div class="col-12 mb-3">
                                    <label for="edit_objectives{{ $item->code }}" class="form-label">Tujuan (Opsional)</label>
                                    <textarea name="objectives" id="edit_objectives{{ $item->code }}" class="form-control" rows="3" placeholder="Tujuan program studi">{{ $item->objectives }}</textarea>
                                    @error('objectives')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                 <div class="col-12 mb-3">
                                    <label for="edit_careers{{ $item->code }}" class="form-label">Prospek Karir (Opsional)</label>
                                    <textarea name="careers" id="edit_careers{{ $item->code }}" class="form-control" rows="3" placeholder="Prospek karir lulusan">{{ $item->careers }}</textarea>
                                    @error('careers')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="edit_status{{ $item->code }}" class="form-label">Status</label>
                                    <select class="form-select" name="status" id="edit_status{{ $item->code }}">
                                        <option value="Aktif" {{ $item->status == 'Aktif' ? 'selected' : '' }}>Aktif</option>
                                        <option value="Tidak Aktif" {{ $item->status == 'Tidak Aktif' ? 'selected' : '' }}>Tidak Aktif</option>
                                    </select>
                                    @error('status')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                             </div> {{-- End row --}}
                        </div> {{-- End modal-body --}}
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

    <script>


        // Konfirmasi delete dengan SweetAlert
        function confirmDelete(code) {
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Data program studi yang dihapus tidak dapat dikembalikan!",
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