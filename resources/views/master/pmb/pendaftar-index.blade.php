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

        /* Filter dropdown styling */
        .dropdown-toggle.btn-outline-primary:hover {
            background-color: #435ebe;
            border-color: #435ebe;
            color: white;
        }

        .dropdown-toggle.btn-outline-secondary:hover {
            background-color: #6c757d;
            border-color: #6c757d;
            color: white;
        }

        .dropdown-item.active {
            background-color: #435ebe;
            color: white;
        }

        .badge.bg-success {
            background-color: #28a745 !important;
        }

        .alert-light-info {
            background-color: rgba(23, 162, 184, 0.1);
            border-color: rgba(23, 162, 184, 0.2);
            color: #0c5460;
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
            
            /* Responsive filter section */
            .filter-section {
                flex-direction: column !important;
                gap: 0.5rem !important;
            }
            
            .filter-section .dropdown {
                width: 100% !important;
            }
            
            .filter-section .dropdown-toggle {
                width: 100% !important;
                justify-content: space-between !important;
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
                    <div class="d-flex gap-2 align-items-center">
                        <!-- Filter Section -->
                        <div class="d-flex gap-2 align-items-center me-3 filter-section">
                            <!-- Tahun Akademik Aktif -->
                            <div class="dropdown">
                                <button class="btn btn-outline-primary dropdown-toggle d-flex align-items-center" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fas fa-calendar-alt me-2"></i>
                                    <span class="flex-grow-1">{{ $activeTaka ? $activeTaka->name : 'Pilih Tahun Aktif' }}</span>
                                    @if($activeTaka) <span class="badge bg-success ms-1">Aktif</span> @endif
                                </button>
                                <ul class="dropdown-menu">
                                    @foreach($takas as $taka)
                                        <li>
                                            <form action="{{ route($spref . 'pmb.set-active-tahun') }}" method="POST" class="d-inline">
                                                @csrf
                                                <input type="hidden" name="taka_id" value="{{ $taka->id }}">
                                                <button type="submit" class="dropdown-item {{ $activeTaka && $activeTaka->id == $taka->id ? 'active' : '' }}">
                                                    {{ $taka->name }}
                                                    @if($activeTaka && $activeTaka->id == $taka->id) 
                                                        <span class="badge bg-success ms-1">Aktif</span> 
                                                    @endif
                                                </button>
                                            </form>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>

                            <!-- Filter Periode -->
                            <div class="dropdown">
                                <button class="btn btn-outline-secondary dropdown-toggle d-flex align-items-center" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fas fa-filter me-2"></i>
                                    <span class="flex-grow-1">Filter Periode</span>
                                </button>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a class="dropdown-item {{ !$selectedPeriodeId ? 'active' : '' }}" href="{{ route($spref . 'pmb.pendaftar-render') }}">
                                            <i class="fas fa-globe me-2"></i>Semua Periode
                                        </a>
                                    </li>
                                    @if($periodes->count() > 0)
                                        <li><hr class="dropdown-divider"></li>
                                        @foreach($periodes as $periode)
                                            <li>
                                                <a class="dropdown-item {{ $selectedPeriodeId == $periode->id ? 'active' : '' }}" 
                                                   href="{{ route($spref . 'pmb.pendaftar-render', ['periode_id' => $periode->id]) }}">
                                                    <i class="fas fa-calendar me-2"></i>{{ $periode->name }}
                                                    @if($periode->taka)
                                                        <small class="text-muted d-block ms-4">{{ $periode->taka->name }}</small>
                                                    @else
                                                        <small class="text-muted d-block ms-4">Tahun Akademik tidak ditemukan</small>
                                                    @endif
                                                </a>
                                            </li>
                                        @endforeach
                                    @endif
                                </ul>
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="d-flex gap-2">
                            <div class="dropdown">
                                <button class="btn btn-success dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fas fa-file-export me-2"></i>Export
                                </button>
                                <ul class="dropdown-menu">
                                    <li>
                                        <form action="{{ route($spref . 'pmb.pendaftar-export-excel') }}" method="GET" class="d-inline">
                                            @if($selectedPeriodeId)
                                                <input type="hidden" name="periode_id" value="{{ $selectedPeriodeId }}">
                                            @endif
                                            <button type="submit" class="dropdown-item">
                                                <i class="fas fa-file-excel me-2"></i>Export Excel
                                            </button>
                                        </form>
                                    </li>
                                    <li>
                                        <form action="{{ route($spref . 'pmb.pendaftar-export-pdf') }}" method="GET" class="d-inline">
                                            @if($selectedPeriodeId)
                                                <input type="hidden" name="periode_id" value="{{ $selectedPeriodeId }}">
                                            @endif
                                            <button type="submit" class="dropdown-item">
                                                <i class="fas fa-file-pdf me-2"></i>Export PDF
                                            </button>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                            <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseForm" aria-expanded="false" aria-controls="collapseForm">
                                <i class="fas fa-plus-circle me-2"></i>Tambah Pendaftar
                            </button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <!-- Filter Info -->
                    @if($selectedPeriodeId || $activeTaka)
                        <div class="alert alert-light-info mb-4">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-info-circle me-2"></i>
                                <div>
                                    <strong>Filter Aktif:</strong>
                                    @if($selectedPeriodeId)
                                        @php $selectedPeriode = $periodes->where('id', $selectedPeriodeId)->first(); @endphp
                                        Menampilkan data untuk periode <strong>{{ $selectedPeriode->name ?? 'Tidak diketahui' }}</strong>
                                        @if($selectedPeriode && $selectedPeriode->taka) 
                                            ({{ $selectedPeriode->taka->name }}) 
                                        @endif
                                    @elseif($activeTaka)
                                        Menampilkan data untuk tahun akademik aktif <strong>{{ $activeTaka->name }}</strong>
                                    @endif
                                    <a href="{{ route($spref . 'pmb.pendaftar-render') }}" class="btn btn-sm btn-outline-secondary ms-2">
                                        <i class="fas fa-times me-1"></i>Reset Filter
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endif
                    
                    <!-- Quick Stats -->
                    <div class="row mb-4">
                        <div class="col-md-3 mb-2">
                            <div class="p-3 bg-light-primary rounded">
                                <h6 class="mb-2">Total Pendaftar</h6>
                                <h3 class="mb-0">{{ count($pendaftars) }}</h3>
                            </div>
                        </div>
                        <div class="col-md-3 mb-2">
                            <div class="p-3 bg-light-success rounded">
                                <h6 class="mb-2">Lulus</h6>
                                <h3 class="mb-0">{{ $pendaftars->where('status', 'Lulus')->count() }}</h3>
                            </div>
                        </div>
                        <div class="col-md-3 mb-2">
                            <div class="p-3 bg-light-warning rounded">
                                <h6 class="mb-2">Pending</h6>
                                <h3 class="mb-0">{{ $pendaftars->where('status', 'Pending')->count() }}</h3>
                            </div>
                        </div>
                        <div class="col-md-3 mb-2">
                            <div class="p-3 bg-light-info rounded">
                                <h6 class="mb-2">Gagal</h6>
                                <h3 class="mb-0">{{ $pendaftars->where('status', 'Gagal')->count() }}</h3>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Collapsible Form -->
                    <div class="collapse" id="collapseForm">
                        <div class="card card-body border">
                            <h5 class="card-title mb-3">Tambah Pendaftar Baru</h5>
                            <form action="{{ route($spref . 'pmb.pendaftar-handle') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <!-- Data Pribadi -->
                                    <div class="col-md-6 mb-3">
                                        <label for="name" class="form-label">Nama Lengkap</label>
                                        <input type="text" class="form-control" name="name" id="name" required>
                                        @error('name')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" class="form-control" name="email" id="email" required>
                                        @error('email')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="phone" class="form-label">Nomor Telepon</label>
                                        <input type="text" class="form-control" name="phone" id="phone" required>
                                        @error('phone')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="numb_ktp" class="form-label">NIK</label>
                                        <input type="text" class="form-control" name="numb_ktp" id="numb_ktp" required>
                                        @error('numb_ktp')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <!-- Data Biodata -->
                                    <div class="col-md-6 mb-3">
                                        <label for="bio_gender" class="form-label">Jenis Kelamin</label>
                                        <select class="form-select" name="bio_gender" id="bio_gender" required>
                                            <option value="">Pilih Jenis Kelamin</option>
                                            <option value="Laki-laki">Laki-laki</option>
                                            <option value="Perempuan">Perempuan</option>
                                        </select>
                                        @error('bio_gender')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="bio_religion" class="form-label">Agama</label>
                                        <select class="form-select" name="bio_religion" id="bio_religion" required>
                                            <option value="">Pilih Agama</option>
                                            <option value="Islam">Islam</option>
                                            <option value="Kristen">Kristen</option>
                                            <option value="Katolik">Katolik</option>
                                            <option value="Hindu">Hindu</option>
                                            <option value="Buddha">Buddha</option>
                                            <option value="Konghucu">Konghucu</option>
                                        </select>
                                        @error('bio_religion')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="bio_placebirth" class="form-label">Tempat Lahir</label>
                                        <input type="text" class="form-control" name="bio_placebirth" id="bio_placebirth" required>
                                        @error('bio_placebirth')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="bio_datebirth" class="form-label">Tanggal Lahir</label>
                                        <input type="date" class="form-control" name="bio_datebirth" id="bio_datebirth" required>
                                        @error('bio_datebirth')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <!-- Data Alamat -->
                                    <div class="col-12 mb-3">
                                        <label for="ktp_addres" class="form-label">Alamat Lengkap</label>
                                        <textarea class="form-control" name="ktp_addres" id="ktp_addres" rows="3" required></textarea>
                                        @error('ktp_addres')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="ktp_rt" class="form-label">RT</label>
                                        <input type="text" class="form-control" name="ktp_rt" id="ktp_rt" required>
                                        @error('ktp_rt')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="ktp_rw" class="form-label">RW</label>
                                        <input type="text" class="form-control" name="ktp_rw" id="ktp_rw" required>
                                        @error('ktp_rw')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="ktp_village" class="form-label">Desa/Kelurahan</label>
                                        <input type="text" class="form-control" name="ktp_village" id="ktp_village" required>
                                        @error('ktp_village')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="ktp_subdistrict" class="form-label">Kecamatan</label>
                                        <input type="text" class="form-control" name="ktp_subdistrict" id="ktp_subdistrict" required>
                                        @error('ktp_subdistrict')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="ktp_city" class="form-label">Kota/Kabupaten</label>
                                        <input type="text" class="form-control" name="ktp_city" id="ktp_city" required>
                                        @error('ktp_city')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="ktp_province" class="form-label">Provinsi</label>
                                        <input type="text" class="form-control" name="ktp_province" id="ktp_province" required>
                                        @error('ktp_province')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="ktp_poscode" class="form-label">Kode Pos</label>
                                        <input type="text" class="form-control" name="ktp_poscode" id="ktp_poscode" required>
                                        @error('ktp_poscode')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <!-- Data Pendaftaran -->
                                    <div class="col-md-6 mb-3">
                                        <label for="jenjang_id" class="form-label">Jenjang Pendidikan</label>
                                        <select class="form-select" name="jenjang_id" id="jenjang_id" required>
                                            <option value="">Pilih Jenjang Pendidikan</option>
                                            @foreach($jenjangs as $jenjang)
                                                <option value="{{ $jenjang->id }}">{{ $jenjang->nama }} ({{ $jenjang->singkatan }})</option>
                                            @endforeach
                                        </select>
                                        @error('jenjang_id')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="jalur_id" class="form-label">Jalur Pendaftaran</label>
                                        <select class="form-select" name="jalur_id" id="jalur_id" required>
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
                                        <label for="gelombang_id" class="form-label">Gelombang</label>
                                        <select class="form-select" name="gelombang_id" id="gelombang_id" required>
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
                                        <label for="jenis_id" class="form-label">Jenis Kelas</label>
                                        <select class="form-select" name="jenis_id" id="jenis_id" required>
                                            <option value="">Pilih Jenis Kelas</option>
                                            @foreach($jenisKelas as $jenis)
                                                <option value="{{ $jenis->id }}">{{ $jenis->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('jenis_id')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="prodi_1" class="form-label">Prodi Pilihan 1</label>
                                        <select class="form-select" name="prodi_1" id="prodi_1" required>
                                            <option value="">Pilih Prodi Pilihan 1</option>
                                            @foreach($prodis as $prodi)
                                                <option value="{{ $prodi->id }}" data-jenjang="{{ $prodi->jenjang_id }}" style="display:none;">{{ $prodi->name }} ({{ $prodi->jenjang ? $prodi->jenjang->singkatan : $prodi->title }})</option>
                                            @endforeach
                                        </select>
                                        @error('prodi_1')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="prodi_2" class="form-label">Prodi Pilihan 2</label>
                                        <select class="form-select" name="prodi_2" id="prodi_2" required>
                                            <option value="">Pilih Prodi Pilihan 2</option>
                                            @foreach($prodis as $prodi)
                                                <option value="{{ $prodi->id }}" data-jenjang="{{ $prodi->jenjang_id }}" style="display:none;">{{ $prodi->name }} ({{ $prodi->jenjang ? $prodi->jenjang->singkatan : $prodi->title }})</option>
                                            @endforeach
                                        </select>
                                        @error('prodi_2')
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
                                    <th>Nama</th>
                                    <th>No. Registrasi</th>
                                    <th>Prodi Pilihan</th>
                                    <th>Jalur</th>
                                    <th>Gelombang</th>
                                    <th>Status</th>
                                    <th>Verifikasi Pembayaran</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pendaftars as $key => $item)
                                    <tr>
                                        <td data-label="No">{{ ++$key }}</td>
                                        <td data-label="Nama">
                                            <div class="d-flex flex-column">
                                                <span class="fw-bold">{{ $item->name }}</span>
                                                <small class="text-muted">{{ $item->email }}</small>
                                            </div>
                                        </td>
                                        <td data-label="No. Registrasi">{{ $item->numb_reg }}</td>

                                        <td data-label="Prodi">
                                            <div class="d-flex flex-column">
                                                <span class="fw-bold">
                                                   1. {{ $item->prodi1->name }} <br>
                                                   2. {{ $item->prodi2->name }} 
                                                </span>
                                                <small class="text-muted">Kelas {{ $item->jenisKelas->name }}</small>
                                            </div>
                                        </td>
                                        <td data-label="Jalur">{{ $item->jalur->name }}</td>
                                        <td data-label="Gelombang">{{ $item->gelombang->name }}</td>
                                        <td data-label="Status">
                                            <span class="badge {{ $item->status == 'Lulus' ? 'bg-light-success text-success' : 
                                                                ($item->status == 'Pending' ? 'bg-light-warning text-warning' : 
                                                                ($item->status == 'Gagal' ? 'bg-light-danger text-danger' : 'bg-light-secondary text-secondary')) }}">
                                                {{ $item->status }}
                                            </span>
                                        </td>
                                        <td data-label="Verifikasi Pembayaran">
                                            @if($item->bukti_pembayaran)
                                                <div class="d-flex flex-column">
                                                    @if($item->status_pembayaran == 'verified')
                                                        <span class="badge bg-success mb-1">
                                                            <i class="fas fa-check-circle me-1"></i>
                                                            Terverifikasi
                                                        </span>
                                                        @if($item->tanggal_verifikasi_pembayaran)
                                                            <small class="text-muted">{{ date('d M Y H:i', strtotime($item->tanggal_verifikasi_pembayaran)) }}</small>
                                                        @endif
                                                    @elseif($item->status_pembayaran == 'rejected')
                                                        <span class="badge bg-danger mb-1">
                                                            <i class="fas fa-times-circle me-1"></i>
                                                            Ditolak
                                                        </span>
                                                        @if($item->catatan_verifikasi)
                                                            <small class="text-danger">{{ $item->catatan_verifikasi }}</small>
                                                        @endif
                                                    @else
                                                        <span class="badge bg-warning mb-1">
                                                            <i class="fas fa-clock me-1"></i>
                                                            Pending Verifikasi
                                                        </span>
                                                    @endif
                                                    <small class="text-muted">
                                                        <strong>Bank:</strong> {{ $item->bank_pengirim ?? '-' }} → {{ $item->bank_tujuan ?? '-' }}<br>
                                                        <strong>Nama:</strong> {{ $item->nama_pengirim ?? '-' }}<br>
                                                        <strong>Jumlah:</strong> Rp {{ number_format($item->jumlah_transfer ?? 0, 0, ',', '.') }}<br>
                                                        <strong>Tanggal:</strong> {{ $item->tanggal_transfer ? date('d M Y', strtotime($item->tanggal_transfer)) : '-' }}
                                                    </small>
                                                    
                                                    @if($item->bukti_pembayaran)
                                                        <a href="{{ asset('storage/' . $item->bukti_pembayaran) }}" target="_blank" class="btn btn-sm btn-outline-info mt-1">
                                                            <i class="fas fa-file-image me-1"></i>
                                                            Lihat Bukti
                                                        </a>
                                                    @endif
                                                    
                                                    @if($item->status_pembayaran == 'pending' || is_null($item->status_pembayaran))
                                                        <div class="btn-group mt-2" role="group">
                                                            <form action="{{ route($spref . 'pmb.verify-pembayaran', $item->code) }}" method="POST" class="d-inline">
                                                                @csrf
                                                                <button type="submit" class="btn btn-sm btn-success" title="Verifikasi Pembayaran">
                                                                    <i class="fas fa-check me-1"></i>
                                                                    Verifikasi
                                                                </button>
                                                            </form>
                                                            <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#rejectPayment{{ $item->code }}" title="Tolak Pembayaran">
                                                                <i class="fas fa-times me-1"></i>
                                                                Tolak
                                                            </button>
                                                        </div>
                                                    @endif
                                                </div>
                                            @else
                                                <span class="badge bg-secondary">
                                                    <i class="fas fa-upload me-1"></i>
                                                    Belum Upload
                                                </span>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <a href="{{ route($spref . 'pmb.pendaftar-detail', $item->code) }}" class="btn btn-sm btn-info" data-bs-toggle="tooltip" title="Detail Pendaftar">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                <a href="#" data-bs-toggle="modal" data-bs-target="#editData{{ $item->code }}" class="btn btn-sm btn-primary" data-bs-toggle="tooltip" title="Edit Pendaftar">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <form action="{{ route($spref . 'pmb.pendaftar-delete', $item->code) }}" method="POST" class="d-inline" id="delete-form-{{ $item->code }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="button" class="btn btn-sm btn-danger" data-confirm-delete="true" data-bs-toggle="tooltip" title="Hapus Pendaftar" onclick="confirmDelete('{{ $item->code }}')">
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
                    <h5 class="card-title">Informasi Pendaftaran</h5>
                </div>
                <div class="card-body">
                    <p>Bagian ini menampilkan informasi umum dan petunjuk terkait pengelolaan Pendaftaran.</p>
                    
                    <div class="alert alert-light-success">
                        <h6 class="">Petunjuk Penggunaan:</h6>
                        <ul class="mb-0">
                            <li>Klik tombol "Tambah Pendaftar" untuk menambahkan pendaftar baru</li>
                            <li>Klik ikon <i class="fas fa-eye"></i> untuk melihat detail pendaftar</li>
                            <li>Klik ikon <i class="fas fa-edit"></i> untuk mengedit data pendaftar</li>
                            <li>Klik ikon <i class="fas fa-trash"></i> untuk menghapus pendaftar</li>
                        </ul>
                    </div>
                    
                    @if(count($pendaftars) > 0)
                        <div class="mt-4">
                            <h6>Pendaftar Terbaru</h6>
                            <div class="list-group">
                                @foreach($pendaftars->take(5) as $recent)
                                    <div class="list-group-item list-group-item-action">
                                        <div class="d-flex w-100 justify-content-between">
                                            <h6 class="mb-1">{{ $recent->name }}</h6>
                                            <small class="text-muted">{{ $recent->jalur->name }}</small>
                                        </div>
                                        <p class="mb-1">{{ $recent->email }}</p>
                                        <small class="text-muted">No. Registrasi: {{ $recent->numb_reg }}</small>
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
    @foreach ($pendaftars as $item)
        <!-- Edit Modal -->
        <div class="modal fade" id="editData{{ $item->code }}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel{{ $item->code }}" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <form action="{{ route($spref . 'pmb.pendaftar-update', $item->code) }}" method="POST">
                        @method('patch')
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title" id="editModalLabel{{ $item->code }}">Edit Pendaftar - {{ $item->name }}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="edit_name{{ $item->code }}" class="form-label">Nama Lengkap</label>
                                    <input type="text" class="form-control" name="name" id="edit_name{{ $item->code }}" value="{{ $item->name }}" required>
                                    @error('name')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="edit_email{{ $item->code }}" class="form-label">Email</label>
                                    <input type="email" class="form-control" name="email" id="edit_email{{ $item->code }}" value="{{ $item->email }}" required>
                                    @error('email')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="edit_phone{{ $item->code }}" class="form-label">Nomor Telepon</label>
                                    <input type="text" class="form-control" name="phone" id="edit_phone{{ $item->code }}" value="{{ $item->phone }}" required>
                                    @error('phone')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="edit_status{{ $item->code }}" class="form-label">Status</label>
                                    <select class="form-select" name="status" id="edit_status{{ $item->code }}" required>
                                        <option value="Pending" {{ $item->status == 'Pending' ? 'selected' : '' }}>Pending</option>
                                        <option value="Lulus" {{ $item->status == 'Lulus' ? 'selected' : '' }}>Lulus</option>
                                        <option value="Gagal" {{ $item->status == 'Gagal' ? 'selected' : '' }}>Gagal</option>
                                        <option value="Batal" {{ $item->status == 'Batal' ? 'selected' : '' }}>Batal</option>
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

        <!-- Reject Payment Modal -->
        @if($item->bukti_pembayaran && ($item->status_pembayaran == 'pending' || is_null($item->status_pembayaran)))
        <div class="modal fade" id="rejectPayment{{ $item->code }}" tabindex="-1" role="dialog" aria-labelledby="rejectPaymentLabel{{ $item->code }}" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <form action="{{ route($spref . 'pmb.reject-pembayaran', $item->code) }}" method="POST">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title" id="rejectPaymentLabel{{ $item->code }}">Tolak Pembayaran - {{ $item->name }}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="alert alert-warning">
                                <i class="fas fa-exclamation-triangle me-2"></i>
                                Anda akan menolak pembayaran dari <strong>{{ $item->name }}</strong>
                            </div>
                            <div class="mb-3">
                                <label for="catatan_verifikasi{{ $item->code }}" class="form-label">Alasan Penolakan <span class="text-danger">*</span></label>
                                <textarea class="form-control" name="catatan_verifikasi" id="catatan_verifikasi{{ $item->code }}" rows="4" required placeholder="Masukkan alasan penolakan pembayaran..."></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-danger">
                                <i class="fas fa-times me-1"></i> Tolak Pembayaran
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @endif
    @endforeach
@endsection

@section('custom-js')
    <script src="{{ asset('dist') }}/assets/extensions/jquery/jquery.min.js"></script>
    <script>
    // Filter prodi berdasarkan jenjang pendidikan
    $(document).ready(function() {
        function filterProdiByJenjang() {
            var jenjangId = $('#jenjang_id').val();
            $('#prodi_1 option, #prodi_2 option').each(function() {
                var optionJenjang = $(this).data('jenjang');
                if ($(this).val() === '') {
                    $(this).show(); // Always show the default "Pilih" option
                } else if (!jenjangId || jenjangId == optionJenjang) {
                    $(this).show();
                } else {
                    $(this).hide();
                }
            });
            $('#prodi_1').val('');
            $('#prodi_2').val('');
        }
        $('#jenjang_id').on('change', filterProdiByJenjang);
        filterProdiByJenjang();
    });
    </script>
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
                text: "Data pendaftar yang dihapus tidak dapat dikembalikan!",
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