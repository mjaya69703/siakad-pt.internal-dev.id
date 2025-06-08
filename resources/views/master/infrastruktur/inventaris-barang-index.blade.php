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

        /* Image preview */
        .image-preview {
            max-width: 200px;
            max-height: 200px;
            margin-top: 10px;
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
                        <i class="fas fa-plus-circle me-2"></i>Tambah Inventaris
                    </button>
                </div>
                <div class="card-body">
                    <!-- Quick Stats -->
                    <div class="row mb-4">
                        <div class="col-md-6 mb-2">
                            <div class="p-3 bg-light-primary rounded">
                                <h6 class="mb-2">Total Inventaris</h6>
                                <h3 class="mb-0">{{ count($inventarisBarangs) }}</h3>
                            </div>
                        </div>
                        <div class="col-md-6 mb-2">
                            <div class="p-3 bg-light-success rounded">
                                <h6 class="mb-2">Total Aktif</h6>
                                <h3 class="mb-0">{{ $inventarisBarangs->where('status', 'Aktif')->count() }}</h3>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Collapsible Form -->
                    <div class="collapse" id="collapseForm">
                        <div class="card card-body border">
                            <h5 class="card-title mb-3">Tambah Inventaris Baru</h5>
                            <form action="{{ route($spref . 'infrastruktur.inventaris-barang-handle') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="barang_id" class="form-label">Barang</label>
                                        <select class="form-select" name="barang_id" id="barang_id" required>
                                            <option value="">Pilih Barang</option>
                                            @foreach ($barangs as $barang)
                                                <option value="{{ $barang->id }}">{{ $barang->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('barang_id')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="lokasi_id" class="form-label">Lokasi</label>
                                        <select class="form-select" name="lokasi_id" id="lokasi_id" required>
                                            <option value="">Pilih Lokasi</option>
                                            @foreach ($ruangs as $ruang)
                                                <option value="{{ $ruang->id }}">{{ $ruang->name }} ({{ $ruang->gedung->name }})</option>
                                            @endforeach
                                        </select>
                                        @error('lokasi_id')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="jumlah" class="form-label">Jumlah</label>
                                        <input type="number" class="form-control" name="jumlah" id="jumlah" min="1" required>
                                        @error('jumlah')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="photo" class="form-label">Foto</label>
                                        <input type="file" class="form-control" name="photo" id="photo" accept="image/*" onchange="previewImage(this)">
                                        <img id="preview" class="image-preview d-none">
                                        @error('photo')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="kondisi" class="form-label">Kondisi</label>
                                        <select class="form-select" name="kondisi" id="kondisi" required>
                                            <option value="Baik">Baik</option>
                                            <option value="Rusak Ringan">Rusak Ringan</option>
                                            <option value="Rusak Berat">Rusak Berat</option>
                                        </select>
                                        @error('kondisi')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="code" class="form-label">Kode Inventaris</label>
                                        <input type="text" class="form-control" name="code" id="code" required>
                                        @error('code')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="status" class="form-label">Status</label>
                                        <select class="form-select" name="status" id="status" required>
                                            <option value="Aktif" selected>Aktif</option>
                                            <option value="Tidak Aktif">Tidak Aktif</option>
                                            <option value="Dihapus">Dihapus</option>
                                        </select>
                                        @error('status')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-12 mb-3">
                                        <label for="desc" class="form-label">Deskripsi (Opsional)</label>
                                        <textarea name="desc" id="desc" class="form-control" rows="3" placeholder="Deskripsi singkat inventaris"></textarea>
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
                                    <th>Barang</th>
                                    <th>Lokasi</th>
                                    <th>Jumlah</th>
                                    <th>Kode</th>
                                    <th>Kondisi</th>
                                    <th>Status</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($inventarisBarangs as $key => $item)
                                    <tr>
                                        <td data-label="No">{{ ++$key }}</td>
                                        <td data-label="Barang">
                                            <div class="d-flex flex-column">
                                                <span class="fw-bold">{{ $item->barang->name }}</span>
                                                <small class="text-muted">{{ $item->barang->kategori->name }}</small>
                                            </div>
                                        </td>
                                        <td data-label="Lokasi">
                                            <div class="d-flex flex-column">
                                                <span class="fw-bold">{{ $item->lokasi->name }}</span>
                                                <small class="text-muted">{{ $item->lokasi->gedung->name }}</small>
                                            </div>
                                        </td>
                                        <td data-label="Jumlah">{{ $item->jumlah }}</td>
                                        <td data-label="Kode">{{ $item->code }}</td>
                                        <td data-label="Kondisi">
                                            @if($item->kondisi == 'Baik')
                                                <span class="badge bg-success">Baik</span>
                                            @elseif($item->kondisi == 'Rusak Ringan')
                                                <span class="badge bg-warning">Rusak Ringan</span>
                                            @else
                                                <span class="badge bg-danger">Rusak Berat</span>
                                            @endif
                                        </td>
                                        <td data-label="Status">
                                            @if($item->status == 'Aktif')
                                                <span class="badge bg-success">Aktif</span>
                                            @elseif($item->status == 'Tidak Aktif')
                                                <span class="badge bg-warning">Tidak Aktif</span>
                                            @else
                                                <span class="badge bg-danger">Dihapus</span>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <a href="#" data-bs-toggle="modal" data-bs-target="#editData{{ $item->code }}" class="btn btn-sm btn-primary" data-bs-toggle="tooltip" title="Edit Inventaris">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <form action="{{ route($spref . 'infrastruktur.inventaris-barang-delete', $item->code) }}" method="POST" class="d-inline" id="delete-form-{{ $item->code }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="button" class="btn btn-sm btn-danger" data-confirm-delete="true" data-bs-toggle="tooltip" title="Hapus Inventaris" onclick="confirmDelete('{{ $item->code }}')">
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
                    <h5 class="card-title">Informasi Inventaris</h5>
                </div>
                <div class="card-body">
                    <p>Bagian ini menampilkan informasi umum dan petunjuk terkait pengelolaan Inventaris Barang.</p>
                    
                    <div class="alert alert-light-success">
                        <h6 class="">Petunjuk Penggunaan:</h6>
                        <ul class="mb-0">
                            <li>Klik tombol "Tambah Inventaris" untuk menambahkan inventaris baru</li>
                            <li>Klik ikon <i class="fas fa-edit"></i> untuk mengedit data inventaris</li>
                            <li>Klik ikon <i class="fas fa-trash"></i> untuk menghapus inventaris</li>
                        </ul>
                    </div>
                    
                    @if(count($inventarisBarangs) > 0)
                        <div class="mt-4">
                            <h6>Inventaris Terbaru</h6>
                            <div class="list-group">
                                @foreach($inventarisBarangs->take(5) as $inventaris)
                                    <div class="list-group-item list-group-item-action">
                                        <div class="d-flex w-100 justify-content-between">
                                            <h6 class="mb-1">{{ $inventaris->barang->name }}</h6>
                                            <small class="text-muted">{{ $inventaris->code }}</small>
                                        </div>
                                        <p class="mb-1">{{ $inventaris->lokasi->name }} ({{ $inventaris->lokasi->gedung->name }})</p>
                                        <small class="text-muted">Jumlah: {{ $inventaris->jumlah }}</small>
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
    @foreach ($inventarisBarangs as $item)
        <div class="modal fade" id="editData{{ $item->code }}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel{{ $item->code }}" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <form action="{{ route($spref . 'infrastruktur.inventaris-barang-update', $item->code) }}" method="POST" enctype="multipart/form-data">
                        @method('patch')
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title" id="editModalLabel{{ $item->code }}">Edit Inventaris - {{ $item->barang->name }}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="edit_barang_id{{ $item->code }}" class="form-label">Barang</label>
                                    <select class="form-select" name="barang_id" id="edit_barang_id{{ $item->code }}" required>
                                        <option value="">Pilih Barang</option>
                                        @foreach ($barangs as $barang)
                                            <option value="{{ $barang->id }}" {{ $item->barang_id == $barang->id ? 'selected' : '' }}>{{ $barang->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('barang_id')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="edit_lokasi_id{{ $item->code }}" class="form-label">Lokasi</label>
                                    <select class="form-select" name="lokasi_id" id="edit_lokasi_id{{ $item->code }}" required>
                                        <option value="">Pilih Lokasi</option>
                                        @foreach ($ruangs as $ruang)
                                            <option value="{{ $ruang->id }}" {{ $item->lokasi_id == $ruang->id ? 'selected' : '' }}>{{ $ruang->name }} ({{ $ruang->gedung->name }})</option>
                                        @endforeach
                                    </select>
                                    @error('lokasi_id')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="edit_jumlah{{ $item->code }}" class="form-label">Jumlah</label>
                                    <input type="number" class="form-control" name="jumlah" id="edit_jumlah{{ $item->code }}" min="1" value="{{ $item->jumlah }}" required>
                                    @error('jumlah')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="edit_photo{{ $item->code }}" class="form-label">Foto</label>
                                    <input type="file" class="form-control" name="photo" id="edit_photo{{ $item->code }}" accept="image/*" onchange="previewImage(this, 'preview{{ $item->code }}')">
                                    @if($item->photo)
                                        <img src="{{ asset('storage/images/inventaris/' . $item->photo) }}" id="preview{{ $item->code }}" class="image-preview">
                                    @else
                                        <img id="preview{{ $item->code }}" class="image-preview d-none">
                                    @endif
                                    @error('photo')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="edit_kondisi{{ $item->code }}" class="form-label">Kondisi</label>
                                    <select class="form-select" name="kondisi" id="edit_kondisi{{ $item->code }}" required>
                                        <option value="Baik" {{ $item->kondisi == 'Baik' ? 'selected' : '' }}>Baik</option>
                                        <option value="Rusak Ringan" {{ $item->kondisi == 'Rusak Ringan' ? 'selected' : '' }}>Rusak Ringan</option>
                                        <option value="Rusak Berat" {{ $item->kondisi == 'Rusak Berat' ? 'selected' : '' }}>Rusak Berat</option>
                                    </select>
                                    @error('kondisi')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="edit_status{{ $item->code }}" class="form-label">Status</label>
                                    <select class="form-select" name="status" id="edit_status{{ $item->code }}" required>
                                        <option value="Aktif" {{ $item->status == 'Aktif' ? 'selected' : '' }}>Aktif</option>
                                        <option value="Tidak Aktif" {{ $item->status == 'Tidak Aktif' ? 'selected' : '' }}>Tidak Aktif</option>
                                        <option value="Dihapus" {{ $item->status == 'Dihapus' ? 'selected' : '' }}>Dihapus</option>
                                    </select>
                                    @error('status')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="edit_desc{{ $item->code }}" class="form-label">Deskripsi (Opsional)</label>
                                    <textarea name="desc" id="edit_desc{{ $item->code }}" class="form-control" rows="3" placeholder="Deskripsi singkat inventaris">{{ $item->desc }}</textarea>
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
                text: "Data inventaris yang dihapus tidak dapat dikembalikan!",
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