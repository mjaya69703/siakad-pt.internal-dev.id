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
                        <i class="fas fa-plus-circle me-2"></i>Tambah Ruang
                    </button>
                </div>
                <div class="card-body">
                    <!-- Quick Stats -->
                    <div class="row mb-4">
                        <div class="col-md-4 mb-2">
                            <div class="p-3 bg-light-primary rounded">
                                <h6 class="mb-2">Total Ruang</h6>
                                <h3 class="mb-0">{{ count($ruangs) }}</h3>
                            </div>
                        </div>
                        <div class="col-md-4 mb-2">
                            <div class="p-3 bg-light-success rounded">
                                <h6 class="mb-2">Ruang Kelas</h6>
                                <h3 class="mb-0">{{ $ruangs->where('type', 'Ruang Kelas')->count() }}</h3>
                            </div>
                        </div>
                        <div class="col-md-4 mb-2">
                            <div class="p-3 bg-light-warning rounded">
                                <h6 class="mb-2">Ruang Publik</h6>
                                <h3 class="mb-0">{{ $ruangs->where('type', 'Ruang Publik')->count() }}</h3>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Collapsible Form -->
                    <div class="collapse" id="collapseForm">
                        <div class="card card-body border">
                            <h5 class="card-title mb-3">Tambah Ruang Baru</h5>
                            <form action="{{ route($spref . 'infrastruktur.ruang-handle') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="name" class="form-label">Nama Ruang</label>
                                        <input type="text" class="form-control" name="name" id="name" required>
                                        @error('name')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="gedung_id" class="form-label">Gedung</label>
                                        <select class="form-select" name="gedung_id" id="gedung_id" required>
                                            <option value="">Pilih Gedung</option>
                                            @foreach ($gedungs as $gedung)
                                                <option value="{{ $gedung->id }}">{{ $gedung->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('gedung_id')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="floor" class="form-label">Lantai</label>
                                        <input type="number" class="form-control" name="floor" id="floor" required>
                                        @error('floor')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="capacity" class="form-label">Kapasitas</label>
                                        <input type="number" class="form-control" name="capacity" id="capacity" required>
                                        @error('capacity')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="type" class="form-label">Tipe Ruang</label>
                                        <select class="form-select" name="type" id="type" required>
                                            <option value="">Pilih Tipe</option>
                                            <option value="Ruang Publik">Ruang Publik</option>
                                            <option value="Ruang Kelas">Ruang Kelas</option>
                                            <option value="Ruang Pelayanan">Ruang Pelayanan</option>
                                            <option value="Ruang Khusus">Ruang Khusus</option>
                                            <option value="Gudang">Gudang</option>
                                        </select>
                                        @error('type')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="photo" class="form-label">Foto Ruang</label>
                                        <input type="file" class="form-control" name="photo" id="photo" accept="image/*" onchange="previewImage(this)">
                                        <img id="preview" class="image-preview d-none">
                                        @error('photo')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-12 mb-3">
                                        <label for="desc" class="form-label">Deskripsi</label>
                                        <textarea name="desc" id="desc" class="form-control" rows="3"></textarea>
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
                                    <th>Nama Ruang</th>
                                    <th>Gedung</th>
                                    <th>Lantai</th>
                                    <th>Tipe</th>
                                    <th>Kapasitas</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($ruangs as $key => $item)
                                    <tr>
                                        <td data-label="No">{{ ++$key }}</td>
                                        <td data-label="Nama Ruang">
                                            <div class="d-flex flex-column">
                                                <span class="fw-bold">{{ $item->name }}</span>
                                                @if($item->desc)
                                                    <small class="text-muted">{{ Str::limit($item->desc, 50) }}</small>
                                                @endif
                                            </div>
                                        </td>
                                        <td data-label="Gedung">{{ $item->gedung->name }}</td>
                                        <td data-label="Lantai">{{ $item->floor }}</td>
                                        <td data-label="Tipe">
                                            <span class="badge bg-{{ $item->type == 'Ruang Kelas' ? 'success' : ($item->type == 'Ruang Publik' ? 'warning' : 'info') }}">
                                                {{ $item->type }}
                                            </span>
                                        </td>
                                        <td data-label="Kapasitas">{{ $item->capacity }} orang</td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <a href="#" data-bs-toggle="modal" data-bs-target="#editData{{ $item->code }}" class="btn btn-sm btn-primary" data-bs-toggle="tooltip" title="Edit Ruang">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <form action="{{ route($spref . 'infrastruktur.ruang-delete', $item->code) }}" method="POST" class="d-inline" id="delete-form-{{ $item->code }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="button" class="btn btn-sm btn-danger" data-confirm-delete="true" data-bs-toggle="tooltip" title="Hapus Ruang" onclick="confirmDelete('{{ $item->code }}')">
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
                    <h5 class="card-title">Informasi Ruang</h5>
                </div>
                <div class="card-body">
                    <p>Bagian ini menampilkan informasi umum dan petunjuk terkait pengelolaan Ruang.</p>
                    
                    <div class="alert alert-light-success">
                        <h6 class="">Petunjuk Penggunaan:</h6>
                        <ul class="mb-0">
                            <li>Klik tombol "Tambah Ruang" untuk menambahkan ruang baru</li>
                            <li>Klik ikon <i class="fas fa-edit"></i> untuk mengedit data ruang</li>
                            <li>Klik ikon <i class="fas fa-trash"></i> untuk menghapus ruang</li>
                        </ul>
                    </div>
                    
                    @if(count($ruangs) > 0)
                        <div class="mt-4">
                            <h6>Ruang Terbaru</h6>
                            <div class="list-group">
                                @foreach($ruangs->sortByDesc('created_at')->take(3) as $ruang)
                                    <div class="list-group-item list-group-item-action">
                                        <div class="d-flex w-100 justify-content-between">
                                            <h6 class="mb-1">{{ $ruang->name }}</h6>
                                            <small class="text-muted">{{ $ruang->created_at->diffForHumans() }}</small>
                                        </div>
                                        <p class="mb-1">{{ $ruang->gedung->name }} - Lantai {{ $ruang->floor }}</p>
                                        <small class="text-muted">{{ $ruang->type }}</small>
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
    @foreach ($ruangs as $item)
        <div class="modal fade" id="editData{{ $item->code }}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel{{ $item->code }}" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <form action="{{ route($spref . 'infrastruktur.ruang-update', $item->code) }}" method="POST" enctype="multipart/form-data">
                        @method('patch')
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title" id="editModalLabel{{ $item->code }}">Edit Ruang - {{ $item->name }}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="edit_name{{ $item->code }}" class="form-label">Nama Ruang</label>
                                    <input type="text" class="form-control" name="name" id="edit_name{{ $item->code }}" value="{{ $item->name }}" required>
                                    @error('name')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="edit_gedung_id{{ $item->code }}" class="form-label">Gedung</label>
                                    <select class="form-select" name="gedung_id" id="edit_gedung_id{{ $item->code }}" required>
                                        <option value="">Pilih Gedung</option>
                                        @foreach ($gedungs as $gedung)
                                            <option value="{{ $gedung->id }}" {{ $item->gedung_id == $gedung->id ? 'selected' : '' }}>{{ $gedung->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('gedung_id')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="edit_floor{{ $item->code }}" class="form-label">Lantai</label>
                                    <input type="number" class="form-control" name="floor" id="edit_floor{{ $item->code }}" value="{{ $item->floor }}" required>
                                    @error('floor')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="edit_capacity{{ $item->code }}" class="form-label">Kapasitas</label>
                                    <input type="number" class="form-control" name="capacity" id="edit_capacity{{ $item->code }}" value="{{ $item->capacity }}" required>
                                    @error('capacity')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="edit_type{{ $item->code }}" class="form-label">Tipe Ruang</label>
                                    <select class="form-select" name="type" id="edit_type{{ $item->code }}" required>
                                        <option value="">Pilih Tipe</option>
                                        <option value="Ruang Publik" {{ $item->type == 'Ruang Publik' ? 'selected' : '' }}>Ruang Publik</option>
                                        <option value="Ruang Kelas" {{ $item->type == 'Ruang Kelas' ? 'selected' : '' }}>Ruang Kelas</option>
                                        <option value="Ruang Pelayanan" {{ $item->type == 'Ruang Pelayanan' ? 'selected' : '' }}>Ruang Pelayanan</option>
                                        <option value="Ruang Khusus" {{ $item->type == 'Ruang Khusus' ? 'selected' : '' }}>Ruang Khusus</option>
                                        <option value="Gudang" {{ $item->type == 'Gudang' ? 'selected' : '' }}>Gudang</option>
                                    </select>
                                    @error('type')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="edit_photo{{ $item->code }}" class="form-label">Foto Ruang</label>
                                    <input type="file" class="form-control" name="photo" id="edit_photo{{ $item->code }}" accept="image/*" onchange="previewImage(this, 'preview{{ $item->code }}')">
                                    @if($item->photo)
                                        <img src="{{ asset('storage/images/ruang/' . $item->photo) }}" id="preview{{ $item->code }}" class="image-preview">
                                    @else
                                        <img id="preview{{ $item->code }}" class="image-preview d-none">
                                    @endif
                                    @error('photo')
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
                lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "Semua"]]
            });
        });

        // Image preview
        function previewImage(input, previewId = 'preview') {
            const preview = document.getElementById(previewId);
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.classList.remove('d-none');
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        // Konfirmasi delete dengan SweetAlert
        function confirmDelete(code) {
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Data ruang yang dihapus tidak dapat dikembalikan!",
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