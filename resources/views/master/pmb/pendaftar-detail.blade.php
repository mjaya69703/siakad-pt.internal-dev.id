@extends('core-themes.core-backpage')

@section('custom-css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        /* Card styling */
        .card {
            border: none;
            box-shadow: 0 0 10px rgba(0,0,0,0.05);
            border-radius: 10px;
            margin-bottom: 1.5rem;
        }

        .card-header {
            background: none;
            border-bottom: 1px solid rgba(0,0,0,0.05);
            padding: 1.5rem;
        }

        .card-body {
            padding: 1.5rem;
        }

        /* Badge styling */
        .badge {
            padding: 0.5em 0.75em;
            font-weight: 500;
        }

        /* Info list styling */
        .info-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .info-list li {
            padding: 0.75rem 0;
            border-bottom: 1px solid rgba(0,0,0,0.05);
        }

        .info-list li:last-child {
            border-bottom: none;
        }

        .info-list .label {
            font-weight: 600;
            color: #6c757d;
            min-width: 150px;
            display: inline-block;
        }

        /* Document card styling */
        .document-card {
            border: 1px solid rgba(0,0,0,0.1);
            border-radius: 8px;
            padding: 1rem;
            margin-bottom: 1rem;
            transition: all 0.3s ease;
        }

        .document-card:hover {
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        .document-card .document-icon {
            font-size: 2rem;
            color: #435ebe;
            margin-bottom: 0.5rem;
        }

        /* Status badge colors */
        .badge.bg-light-success {
            background-color: rgba(40, 167, 69, 0.1);
            color: #28a745;
        }

        .badge.bg-light-warning {
            background-color: rgba(255, 193, 7, 0.1);
            color: #ffc107;
        }

        .badge.bg-light-danger {
            background-color: rgba(220, 53, 69, 0.1);
            color: #dc3545;
        }

        .badge.bg-light-secondary {
            background-color: rgba(108, 117, 125, 0.1);
            color: #6c757d;
        }

        /* Action buttons */
        .btn-action {
            padding: 0.5rem 1rem;
            border-radius: 5px;
            margin-right: 0.5rem;
        }

        .btn-action:last-child {
            margin-right: 0;
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .info-list .label {
                min-width: 120px;
            }
        }
    </style>
@endsection

@section('content')
    <div class="row">
        <!-- Main Content -->
        <div class="col-lg-8 col-12">
            <!-- Header Card -->
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Detail Pendaftar</h5>
                    <div class="d-flex gap-5">
                        <a href="{{ route($spref . 'pmb.pendaftar-render') }}" class="btn btn-secondary btn-action me-2">
                            <i class="fas fa-arrow-left me-2"></i>Kembali
                        </a>
                        <a href="#" data-bs-toggle="modal" data-bs-target="#editData{{ $pendaftar->code }}" class="btn btn-primary btn-action">
                            <i class="fas fa-edit me-2"></i>Edit
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                            <h4 class="mb-3">{{ $pendaftar->name }}</h4>
                            <div class="d-flex align-items-center mb-3">
                                <span class="badge {{ $pendaftar->status == 'Lulus' ? 'bg-light-success' : 
                                                    ($pendaftar->status == 'Pending' ? 'bg-light-warning' : 
                                                    ($pendaftar->status == 'Gagal' ? 'bg-light-danger' : 'bg-light-secondary')) }} me-2">
                                    {{ $pendaftar->status }}
                                </span>
                                <span class="text-muted">No. Registrasi: {{ $pendaftar->numb_reg }}</span>
                            </div>
                        </div>
                        <div class="col-md-4 text-md-end">
                            <p class="mb-1"><strong>Jalur:</strong> {{ $pendaftar->jalur->name }}</p>
                            <p class="mb-0"><strong>Gelombang:</strong> {{ $pendaftar->gelombang->name }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Data Pribadi -->
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Data Pribadi</h5>
                </div>
                <div class="card-body">
                    <ul class="info-list">
                        <li>
                            <span class="label">Nama Lengkap</span>
                            <span class="value">{{ $pendaftar->name }}</span>
                        </li>
                        <li>
                            <span class="label">Email</span>
                            <span class="value">{{ $pendaftar->email }}</span>
                        </li>
                        <li>
                            <span class="label">Nomor Telepon</span>
                            <span class="value">{{ $pendaftar->phone }}</span>
                        </li>
                        <li>
                            <span class="label">NIK</span>
                            <span class="value">{{ $pendaftar->numb_ktp }}</span>
                        </li>
                        <li>
                            <span class="label">Jenis Kelamin</span>
                            <span class="value">{{ $pendaftar->bio_gender }}</span>
                        </li>
                        <li>
                            <span class="label">Agama</span>
                            <span class="value">{{ $pendaftar->bio_religion }}</span>
                        </li>
                        <li>
                            <span class="label">Tempat Lahir</span>
                            <span class="value">{{ $pendaftar->bio_placebirth }}</span>
                        </li>
                        <li>
                            <span class="label">Tanggal Lahir</span>
                            <span class="value">{{ \Carbon\Carbon::parse($pendaftar->bio_datebirth)->format('d F Y') }}</span>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Data Alamat -->
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Data Alamat</h5>
                </div>
                <div class="card-body">
                    <ul class="info-list">
                        <li>
                            <span class="label">Alamat Lengkap</span>
                            <span class="value">{{ $pendaftar->ktp_addres }}</span>
                        </li>
                        <li>
                            <span class="label">RT/RW</span>
                            <span class="value">{{ $pendaftar->ktp_rt }}/{{ $pendaftar->ktp_rw }}</span>
                        </li>
                        <li>
                            <span class="label">Desa/Kelurahan</span>
                            <span class="value">{{ $pendaftar->ktp_village }}</span>
                        </li>
                        <li>
                            <span class="label">Kecamatan</span>
                            <span class="value">{{ $pendaftar->ktp_subdistrict }}</span>
                        </li>
                        <li>
                            <span class="label">Kota/Kabupaten</span>
                            <span class="value">{{ $pendaftar->ktp_city }}</span>
                        </li>
                        <li>
                            <span class="label">Provinsi</span>
                            <span class="value">{{ $pendaftar->ktp_province }}</span>
                        </li>
                        <li>
                            <span class="label">Kode Pos</span>
                            <span class="value">{{ $pendaftar->ktp_poscode }}</span>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Dokumen Pendaftaran -->
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Dokumen Pendaftaran</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        @foreach($pendaftar->dokumen as $dokumen)
                            <div class="col-md-6 col-lg-4">
                                <div class="document-card">
                                    <div class="text-center">
                                        <i class="fas fa-file-pdf document-icon"></i>
                                        <h6 class="mb-2">{{ $dokumen->syarat->name }}</h6>
                                        <p class="text-muted small mb-2">
                                            {{ \Carbon\Carbon::parse($dokumen->created_at)->format('d M Y H:i') }}
                                        </p>
                                        <div class="mb-2">
                                            <span class="badge {{ $dokumen->status == 'Valid' ? 'bg-light-success' : 
                                                                ($dokumen->status == 'Pending' ? 'bg-light-warning' : 'bg-light-danger') }}">
                                                {{ $dokumen->status }}
                                            </span>
                                        </div>
                                        <div class="d-flex justify-content-center">
                                            <a href="{{ asset($dokumen->path) }}" class="btn btn-sm btn-primary me-2" target="_blank">
                                                <i class="fas fa-eye me-1"></i>Lihat
                                            </a>
                                            <a href="{{ asset($dokumen->path) }}" class="btn btn-sm btn-success" download>
                                                <i class="fas fa-download me-1"></i>Download
                                            </a>
                                        </div>
                                        @if($dokumen->desc)
                                            <div class="mt-2">
                                                <small class="text-muted">{{ $dokumen->desc }}</small>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <!-- Sidebar Content -->
        <div class="col-lg-4 col-12">
            <!-- Status Card -->
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Status Pendaftaran</h5>
                </div>
                <div class="card-body">
                    <div class="text-center mb-4">
                        <span class="badge {{ $pendaftar->status == 'Lulus' ? 'bg-light-success' : 
                                            ($pendaftar->status == 'Pending' ? 'bg-light-warning' : 
                                            ($pendaftar->status == 'Gagal' ? 'bg-light-danger' : 'bg-light-secondary')) }} p-2">
                            {{ $pendaftar->status }}
                        </span>
                    </div>
                    <ul class="info-list">
                        <li>
                            <span class="label">Tanggal Daftar</span>
                            <span class="value">{{ \Carbon\Carbon::parse($pendaftar->created_at)->format('d M Y H:i') }}</span>
                        </li>
                        <li>
                            <span class="label">Terakhir Diupdate</span>
                            <span class="value">{{ \Carbon\Carbon::parse($pendaftar->updated_at)->format('d M Y H:i') }}</span>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Validasi Dokumen -->
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Validasi Dokumen</h5>
                </div>
                <div class="card-body">
                    @foreach($pendaftar->dokumen as $dokumen)
                        <form action="{{ route($spref . 'pmb.pendaftar-validasi', $dokumen->code) }}" method="POST" class="mb-4">
                            @method('PATCH')
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">{{ $dokumen->syarat->name }}</label>
                                <select class="form-select" name="status" required>
                                    <option value="Pending" {{ $dokumen->status == 'Pending' ? 'selected' : '' }}>Pending</option>
                                    <option value="Valid" {{ $dokumen->status == 'Valid' ? 'selected' : '' }}>Valid</option>
                                    <option value="Tidak Valid" {{ $dokumen->status == 'Tidak Valid' ? 'selected' : '' }}>Tidak Valid</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Catatan (Opsional)</label>
                                <textarea class="form-control" name="catatan" rows="2" placeholder="Tambahkan catatan jika diperlukan">{{ $dokumen->desc }}</textarea>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">
                                <i class="fas fa-check me-2"></i>Update Status Dokumen
                            </button>
                        </form>
                        @if(!$loop->last)
                            <hr class="my-4">
                        @endif
                    @endforeach
                </div>
            </div>

            <!-- Informasi Tambahan -->
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Informasi Tambahan</h5>
                </div>
                <div class="card-body">
                    <div class="alert alert-light-info">
                        <h6 class="alert-heading">Petunjuk:</h6>
                        <ul class="mb-0">
                            <li>Pastikan semua dokumen telah diupload dengan benar</li>
                            <li>Verifikasi data pribadi dan alamat pendaftar</li>
                            <li>Update status pendaftaran sesuai hasil validasi</li>
                            <li>Tambahkan catatan jika diperlukan</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Modal -->
    <div class="modal fade" id="editData{{ $pendaftar->code }}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel{{ $pendaftar->code }}" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <form action="{{ route($spref . 'pmb.pendaftar-update', $pendaftar->code) }}" method="POST">
                    @method('patch')
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel{{ $pendaftar->code }}">Edit Pendaftar - {{ $pendaftar->name }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="edit_name{{ $pendaftar->code }}" class="form-label">Nama Lengkap</label>
                                <input type="text" class="form-control" name="name" id="edit_name{{ $pendaftar->code }}" value="{{ $pendaftar->name }}" required>
                                @error('name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="edit_email{{ $pendaftar->code }}" class="form-label">Email</label>
                                <input type="email" class="form-control" name="email" id="edit_email{{ $pendaftar->code }}" value="{{ $pendaftar->email }}" required>
                                @error('email')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="edit_phone{{ $pendaftar->code }}" class="form-label">Nomor Telepon</label>
                                <input type="text" class="form-control" name="phone" id="edit_phone{{ $pendaftar->code }}" value="{{ $pendaftar->phone }}" required>
                                @error('phone')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="edit_status{{ $pendaftar->code }}" class="form-label">Status</label>
                                <select class="form-select" name="status" id="edit_status{{ $pendaftar->code }}" required>
                                    <option value="Pending" {{ $pendaftar->status == 'Pending' ? 'selected' : '' }}>Pending</option>
                                    <option value="Lulus" {{ $pendaftar->status == 'Lulus' ? 'selected' : '' }}>Lulus</option>
                                    <option value="Gagal" {{ $pendaftar->status == 'Gagal' ? 'selected' : '' }}>Gagal</option>
                                    <option value="Batal" {{ $pendaftar->status == 'Batal' ? 'selected' : '' }}>Batal</option>
                                </select>
                                @error('status')
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
@endsection

@section('custom-js')
    <script src="{{ asset('dist') }}/assets/extensions/jquery/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        // Initialize tooltips
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        });
    </script>
@endsection 