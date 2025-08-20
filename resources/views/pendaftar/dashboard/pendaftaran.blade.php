@extends('pendaftar.layouts.app')

@section('title', 'Form Pendaftaran')
@section('page-pretitle', 'PMB')
@section('page-title', 'Form Pendaftaran')

@section('content')
<div class="row">
    <div class="col-12">
        <!-- Step Indicator -->
        <div class="card mb-4">
            <div class="card-body">
                <div class="steps">
                    <div class="step-item {{ !$pendaftaran ? 'active' : 'completed' }}">
                        <div class="step-counter">1</div>
                        <div class="step-display">
                            <h6>Data Pribadi</h6>
                            <p class="text-muted">Isi data pribadi dan pilih program studi</p>
                        </div>
                    </div>
                    <div class="step-item {{ $pendaftaran && !$pendaftaran->bukti_pembayaran ? 'active' : ($pendaftaran && $pendaftaran->bukti_pembayaran ? 'completed' : '') }}">
                        <div class="step-counter">2</div>
                        <div class="step-display">
                            <h6>Pembayaran</h6>
                            <p class="text-muted">Upload bukti pembayaran biaya pendaftaran</p>
                        </div>
                    </div>
                    <div class="step-item {{ $pendaftaran && $pendaftaran->bukti_pembayaran && $pendaftaran->status != 'pending' ? 'active' : '' }}">
                        <div class="step-counter">3</div>
                        <div class="step-display">
                            <h6>Verifikasi</h6>
                            <p class="text-muted">Menunggu verifikasi admin</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Form Pendaftaran -->
        @if(!$pendaftaran)
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="fas fa-user-plus me-2"></i>
                    Data Pendaftaran
                </h3>
            </div>
            <div class="card-body">
                <form action="{{ route('pendaftar.pendaftaran.store') }}" method="POST">
                    @csrf
                    
                    <div class="row">
                        <div class="col-12 mb-4">
                            <h5 class="text-primary">
                                <i class="fas fa-graduation-cap me-2"></i>
                                Pilih Program Studi
                            </h5>
                            <hr>
                        </div>
                        
                        <div class="col-md-12 mb-3">
                            <label class="form-label" for="jenjang_id">Jenjang Pendidikan <span class="text-danger">*</span></label>
                            <select class="form-control @error('jenjang_id') is-invalid @enderror" name="jenjang_id" id="jenjang_id" required>
                                <option value="">Pilih Jenjang Pendidikan</option>
                                @foreach($jenjangs as $jenjang)
                                    <option value="{{ $jenjang->id }}" {{ old('jenjang_id') == $jenjang->id ? 'selected' : '' }}>
                                        {{ $jenjang->nama }} ({{ $jenjang->singkatan }})
                                    </option>
                                @endforeach
                            </select>
                            @error('jenjang_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="col-md-12 mb-3">
                            <label class="form-label" for="program_studi_id">Program Studi <span class="text-danger">*</span></label>
                            <select class="form-control @error('program_studi_id') is-invalid @enderror" name="program_studi_id" id="program_studi_id" required>
                                <option value="">Pilih Jenjang Dulu</option>
                            </select>
                            @error('program_studi_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="col-12 mb-4 mt-3">
                            <h5 class="text-primary">
                                <i class="fas fa-user me-2"></i>
                                Data Pribadi
                            </h5>
                            <hr>
                        </div>
                        
                        <div class="col-md-6 mb-3">
                            <label class="form-label" for="nama_lengkap">Nama Lengkap <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('nama_lengkap') is-invalid @enderror" 
                                   name="nama_lengkap" id="nama_lengkap" value="{{ old('nama_lengkap', $user->name) }}" required>
                            @error('nama_lengkap')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="col-md-6 mb-3">
                            <label class="form-label" for="email">Email <span class="text-danger">*</span></label>
                            <input type="email" class="form-control" id="email" value="{{ $user->email }}" readonly>
                            <small class="text-muted">Email tidak dapat diubah di form ini. Silakan update di profil.</small>
                        </div>
                        
                        <div class="col-md-6 mb-3">
                            <label class="form-label" for="no_hp">Nomor HP <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('no_hp') is-invalid @enderror" 
                                   name="no_hp" id="no_hp" value="{{ old('no_hp', $user->phone) }}" required>
                            @error('no_hp')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="col-md-6 mb-3">
                            <label class="form-label" for="nik">NIK <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('nik') is-invalid @enderror" 
                                   name="nik" id="nik" value="{{ old('nik') }}" maxlength="16" required>
                            @error('nik')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="col-md-6 mb-3">
                            <label class="form-label" for="jenis_kelamin">Jenis Kelamin <span class="text-danger">*</span></label>
                            <select class="form-control @error('jenis_kelamin') is-invalid @enderror" name="jenis_kelamin" id="jenis_kelamin" required>
                                <option value="">Pilih Jenis Kelamin</option>
                                <option value="Laki-laki" {{ old('jenis_kelamin') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                <option value="Perempuan" {{ old('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                            </select>
                            @error('jenis_kelamin')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="col-md-6 mb-3">
                            <label class="form-label" for="agama">Agama <span class="text-danger">*</span></label>
                            <select class="form-control @error('agama') is-invalid @enderror" name="agama" id="agama" required>
                                <option value="">Pilih Agama</option>
                                <option value="Islam" {{ old('agama') == 'Islam' ? 'selected' : '' }}>Islam</option>
                                <option value="Kristen" {{ old('agama') == 'Kristen' ? 'selected' : '' }}>Kristen</option>
                                <option value="Katolik" {{ old('agama') == 'Katolik' ? 'selected' : '' }}>Katolik</option>
                                <option value="Hindu" {{ old('agama') == 'Hindu' ? 'selected' : '' }}>Hindu</option>
                                <option value="Buddha" {{ old('agama') == 'Buddha' ? 'selected' : '' }}>Buddha</option>
                                <option value="Konghucu" {{ old('agama') == 'Konghucu' ? 'selected' : '' }}>Konghucu</option>
                            </select>
                            @error('agama')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Tempat Lahir <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('tempat_lahir') is-invalid @enderror" 
                                   name="tempat_lahir" value="{{ old('tempat_lahir') }}" required>
                            @error('tempat_lahir')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Tanggal Lahir <span class="text-danger">*</span></label>
                            <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror" 
                                   name="tanggal_lahir" value="{{ old('tanggal_lahir') }}" required>
                            @error('tanggal_lahir')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="col-12 mb-4 mt-3">
                            <h5 class="text-primary">
                                <i class="fas fa-map-marker-alt me-2"></i>
                                Data Alamat
                            </h5>
                            <hr>
                        </div>
                        
                        <div class="col-12 mb-3">
                            <label class="form-label">Alamat Lengkap <span class="text-danger">*</span></label>
                            <textarea class="form-control @error('alamat_lengkap') is-invalid @enderror" 
                                      name="alamat_lengkap" rows="3" required>{{ old('alamat_lengkap') }}</textarea>
                            @error('alamat_lengkap')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="col-md-2 mb-3">
                            <label class="form-label">RT <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('rt') is-invalid @enderror" 
                                   name="rt" value="{{ old('rt') }}" maxlength="3" required>
                            @error('rt')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="col-md-2 mb-3">
                            <label class="form-label">RW <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('rw') is-invalid @enderror" 
                                   name="rw" value="{{ old('rw') }}" maxlength="3" required>
                            @error('rw')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Desa/Kelurahan <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('desa_kelurahan') is-invalid @enderror" 
                                   name="desa_kelurahan" value="{{ old('desa_kelurahan') }}" required>
                            @error('desa_kelurahan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Kecamatan <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('kecamatan') is-invalid @enderror" 
                                   name="kecamatan" value="{{ old('kecamatan') }}" required>
                            @error('kecamatan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Kota/Kabupaten <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('kota_kabupaten') is-invalid @enderror" 
                                   name="kota_kabupaten" value="{{ old('kota_kabupaten') }}" required>
                            @error('kota_kabupaten')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Provinsi <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('provinsi') is-invalid @enderror" 
                                   name="provinsi" value="{{ old('provinsi') }}" required>
                            @error('provinsi')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Kode Pos <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('kode_pos') is-invalid @enderror" 
                                   name="kode_pos" value="{{ old('kode_pos') }}" maxlength="5" required>
                            @error('kode_pos')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-12 mb-4 mt-3">
                            <h5 class="text-primary">
                                <i class="fas fa-university me-2"></i>
                                Data PMB
                            </h5>
                            <hr>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label class="form-label">Jalur Pendaftaran <span class="text-danger">*</span></label>
                            <select class="form-control @error('jalur_id') is-invalid @enderror" name="jalur_id" required>
                                <option value="">Pilih Jalur</option>
                                @foreach($jalurs as $jalur)
                                    <option value="{{ $jalur->id }}" {{ old('jalur_id') == $jalur->id ? 'selected' : '' }}>
                                        {{ $jalur->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('jalur_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Gelombang <span class="text-danger">*</span></label>
                            <select class="form-control @error('gelombang_id') is-invalid @enderror" name="gelombang_id" required>
                                <option value="">Pilih Gelombang</option>
                                @foreach($gelombangs as $gelombang)
                                    <option value="{{ $gelombang->id }}" {{ old('gelombang_id') == $gelombang->id ? 'selected' : '' }}>
                                        {{ $gelombang->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('gelombang_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Jenis Kelas <span class="text-danger">*</span></label>
                            <select class="form-control @error('jenis_id') is-invalid @enderror" name="jenis_id" required>
                                <option value="">Pilih Jenis Kelas</option>
                                @foreach($jenisKelas as $jenis)
                                    <option value="{{ $jenis->id }}" {{ old('jenis_id') == $jenis->id ? 'selected' : '' }}>
                                        {{ $jenis->name }} ({{ $jenis->code }})
                                    </option>
                                @endforeach
                            </select>
                            @error('jenis_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save me-2"></i>
                            Simpan Data Pendaftaran
                        </button>
                        <a href="{{ route('pendaftar.dashboard') }}" class="btn btn-secondary ms-2">
                            <i class="fas fa-arrow-left me-2"></i>
                            Kembali ke Dashboard
                        </a>
                    </div>
                </form>
            </div>
        </div>
        @else
        <!-- Data Pendaftaran Sudah Ada -->
        <div class="card mb-4">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="fas fa-check-circle me-2 text-success"></i>
                    Data Pendaftaran
                </h3>
                <div class="card-actions">
                    <button type="button" class="btn btn-outline-primary btn-sm" onclick="toggleEdit()">
                        <i class="fas fa-edit me-2"></i>
                        Edit Data
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div id="viewMode">
                    <div class="row">
                        <div class="col-md-6">
                            <table class="table table-borderless">
                                <tr>
                                    <td width="40%"><strong>Program Studi:</strong></td>
                                    <td>{{ $pendaftaran->prodi1->name ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Jenjang:</strong></td>
                                    <td>{{ $pendaftaran->prodi1->jenjang->nama ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Nama Lengkap:</strong></td>
                                    <td>{{ $pendaftaran->name ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Email:</strong></td>
                                    <td>{{ $pendaftaran->email ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <td><strong>No. HP:</strong></td>
                                    <td>{{ $pendaftaran->phone ?? '-' }}</td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-6">
                            <table class="table table-borderless">
                                <tr>
                                    <td width="40%"><strong>Jenis Kelamin:</strong></td>
                                    <td>{{ $pendaftaran->jenis_kelamin ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Tempat, Tgl Lahir:</strong></td>
                                    <td>{{ ($pendaftaran->tempat_lahir ?? '-') . ', ' . ($pendaftaran->tanggal_lahir ? date('d F Y', strtotime($pendaftaran->tanggal_lahir)) : '-') }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Alamat:</strong></td>
                                    <td>{{ $pendaftaran->alamat_lengkap ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <td><strong>NIK:</strong></td>
                                    <td>{{ $pendaftaran->nik ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Status:</strong></td>
                                    <td>
                                        <span class="status-badge status-{{ strtolower($pendaftaran->status) }}">
                                            {{ ucfirst($pendaftaran->status) }}
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td><strong>No. Pendaftaran:</strong></td>
                                    <td><code>{{ $pendaftaran->nomor_pendaftaran }}</code></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                
                <div id="editMode" style="display: none;">
                    <form action="{{ route('pendaftar.pendaftaran.update', $pendaftaran->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Jenjang Pendidikan</label>
                                <select class="form-control" name="jenjang_id" id="edit_jenjang_id">
                                    @foreach($jenjangs as $jenjang)
                                        <option value="{{ $jenjang->id }}" {{ $pendaftaran->jenjang_id == $jenjang->id ? 'selected' : '' }}>
                                            {{ $jenjang->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Program Studi</label>
                                <select class="form-control" name="prodi_id" id="edit_prodi_id">
                                    @foreach($prodis as $prodi)
                                        <option value="{{ $prodi->id }}" {{ $pendaftaran->prodi_id == $prodi->id ? 'selected' : '' }}>
                                            {{ $prodi->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Nama Lengkap</label>
                                <input type="text" class="form-control" name="nama_lengkap" value="{{ $pendaftaran->nama_lengkap }}">
                            </div>
                            
                            <div class="col-md-6 mb-3">
                                <label class="form-label">No. HP</label>
                                <input type="text" class="form-control" name="no_hp" value="{{ $pendaftaran->no_hp }}">
                            </div>
                            
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Jenis Kelamin</label>
                                <select class="form-control" name="jenis_kelamin">
                                    <option value="Laki-laki" {{ $pendaftaran->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                    <option value="Perempuan" {{ $pendaftaran->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                                </select>
                            </div>
                            
                            <div class="col-md-3 mb-3">
                                <label class="form-label">Tempat Lahir</label>
                                <input type="text" class="form-control" name="tempat_lahir" value="{{ $pendaftaran->tempat_lahir }}">
                            </div>
                            
                            <div class="col-md-3 mb-3">
                                <label class="form-label">Tanggal Lahir</label>
                                <input type="date" class="form-control" name="tanggal_lahir" value="{{ $pendaftaran->tanggal_lahir }}">
                            </div>
                            
                            <div class="col-12 mb-3">
                                <label class="form-label">Alamat</label>
                                <textarea class="form-control" name="alamat" rows="3">{{ $pendaftaran->alamat }}</textarea>
                            </div>
                        </div>
                        
                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-success">
                                <i class="fas fa-save me-2"></i>
                                Simpan Perubahan
                            </button>
                            <button type="button" class="btn btn-secondary" onclick="toggleEdit()">
                                <i class="fas fa-times me-2"></i>
                                Batal
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Upload Bukti Pembayaran -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="fas fa-credit-card me-2"></i>
                    Pembayaran Biaya Pendaftaran
                </h3>
            </div>
            <div class="card-body">
                @if(!$pendaftaran->bukti_pembayaran)
                    <div class="alert alert-info" role="alert">
                        <div class="d-flex">
                            <div class="me-3">
                                <i class="fas fa-info-circle fs-2"></i>
                            </div>
                            <div>
                                <h4 class="alert-title">Informasi Pembayaran</h4>
                                <p class="mb-2">Silakan lakukan pembayaran biaya pendaftaran sebesar:</p>
                                <h3 class="text-primary">Rp 150.000</h3>
                                <p class="mt-2 mb-3">Transfer ke rekening berikut:</p>
                                <div class="row">
                                    <div class="col-md-6">
                                        <strong>Bank BRI</strong><br>
                                        No. Rekening: <code>1234-5678-9012-3456</code><br>
                                        Atas Nama: <strong>YAYASAN NECO</strong>
                                    </div>
                                    <div class="col-md-6">
                                        <strong>Bank BCA</strong><br>
                                        No. Rekening: <code>9876-5432-1098-7654</code><br>
                                        Atas Nama: <strong>YAYASAN NECO</strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <form action="{{ route('pendaftar.pembayaran.upload') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Bank Tujuan Transfer <span class="text-danger">*</span></label>
                                <select class="form-control @error('bank_tujuan') is-invalid @enderror" name="bank_tujuan" required>
                                    <option value="">Pilih Bank</option>
                                    <option value="BRI" {{ old('bank_tujuan') == 'BRI' ? 'selected' : '' }}>BRI - 1234-5678-9012-3456</option>
                                    <option value="BCA" {{ old('bank_tujuan') == 'BCA' ? 'selected' : '' }}>BCA - 9876-5432-1098-7654</option>
                                </select>
                                @error('bank_tujuan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Bank Pengirim <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('bank_pengirim') is-invalid @enderror" 
                                       name="bank_pengirim" value="{{ old('bank_pengirim') }}" 
                                       placeholder="Contoh: BRI, BCA, Mandiri" required>
                                @error('bank_pengirim')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Nama Pengirim <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('nama_pengirim') is-invalid @enderror" 
                                       name="nama_pengirim" value="{{ old('nama_pengirim', $pendaftaran->nama_lengkap) }}" required>
                                @error('nama_pengirim')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Jumlah Transfer <span class="text-danger">*</span></label>
                                <input type="number" class="form-control @error('jumlah_transfer') is-invalid @enderror" 
                                       name="jumlah_transfer" value="{{ old('jumlah_transfer', '150000') }}" required>
                                @error('jumlah_transfer')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Tanggal Transfer <span class="text-danger">*</span></label>
                                <input type="date" class="form-control @error('tanggal_transfer') is-invalid @enderror" 
                                       name="tanggal_transfer" value="{{ old('tanggal_transfer', date('Y-m-d')) }}" required>
                                @error('tanggal_transfer')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Bukti Transfer <span class="text-danger">*</span></label>
                                <input type="file" class="form-control @error('bukti_pembayaran') is-invalid @enderror" 
                                       name="bukti_pembayaran" accept="image/*,application/pdf" required>
                                <small class="text-muted">Format: JPG, PNG, PDF. Maksimal 2MB</small>
                                @error('bukti_pembayaran')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="col-12 mb-3">
                                <label class="form-label">Catatan (Opsional)</label>
                                <textarea class="form-control" name="catatan_transfer" rows="2" 
                                          placeholder="Catatan tambahan mengenai transfer">{{ old('catatan_transfer') }}</textarea>
                            </div>
                        </div>
                        
                        <div class="card-footer">
                            <button type="submit" class="btn btn-success">
                                <i class="fas fa-upload me-2"></i>
                                Upload Bukti Pembayaran
                            </button>
                        </div>
                    </form>
                @else
                    <div class="alert alert-success" role="alert">
                        <div class="d-flex">
                            <div class="me-3">
                                <i class="fas fa-check-circle fs-2"></i>
                            </div>
                            <div>
                                <h4 class="alert-title">Bukti Pembayaran Telah Diupload</h4>
                                <p class="mb-0">Bukti pembayaran Anda sedang dalam proses verifikasi admin.</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <h5>Detail Pembayaran</h5>
                            <table class="table table-borderless">
                                <tr>
                                    <td width="40%">Bank Tujuan:</td>
                                    <td>{{ $pendaftaran->bank_tujuan ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <td>Bank Pengirim:</td>
                                    <td>{{ $pendaftaran->bank_pengirim ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <td>Nama Pengirim:</td>
                                    <td>{{ $pendaftaran->nama_pengirim ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <td>Jumlah:</td>
                                    <td>Rp {{ number_format($pendaftaran->jumlah_transfer ?? 0, 0, ',', '.') }}</td>
                                </tr>
                                <tr>
                                    <td>Tanggal Transfer:</td>
                                    <td>{{ $pendaftaran->tanggal_transfer ? date('d F Y', strtotime($pendaftaran->tanggal_transfer)) : '-' }}</td>
                                </tr>
                                <tr>
                                    <td>Status Verifikasi:</td>
                                    <td>
                                        <span class="status-badge status-{{ $pendaftaran->status_pembayaran ?? 'pending' }}">
                                            {{ ucfirst($pendaftaran->status_pembayaran ?? 'Pending') }}
                                        </span>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-6">
                            <h5>Bukti Transfer</h5>
                            @if($pendaftaran->bukti_pembayaran)
                                <div class="text-center">
                                    @if(in_array(pathinfo($pendaftaran->bukti_pembayaran, PATHINFO_EXTENSION), ['jpg', 'jpeg', 'png', 'gif']))
                                        <img src="{{ asset('storage/' . $pendaftaran->bukti_pembayaran) }}" 
                                             class="img-fluid rounded" style="max-height: 300px;" alt="Bukti Transfer">
                                    @else
                                        <div class="border rounded p-4">
                                            <i class="fas fa-file-pdf fs-1 text-danger"></i>
                                            <p class="mt-2">Dokumen PDF</p>
                                        </div>
                                    @endif
                                    <div class="mt-2">
                                        <a href="{{ asset('storage/' . $pendaftaran->bukti_pembayaran) }}" 
                                           target="_blank" class="btn btn-sm btn-outline-primary">
                                            <i class="fas fa-eye me-2"></i>
                                            Lihat File
                                        </a>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                @endif
            </div>
        </div>
        @endif
    </div>
</div>
@endsection

@section('styles')
<style>
/* Jenjang Buttons Styling */
.jenjang-buttons {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 1rem;
    margin-bottom: 1rem;
}

.steps {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 1rem;
}

.step-item {
    display: flex;
    align-items: center;
    flex: 1;
    position: relative;
}

.step-item:not(:last-child)::after {
    content: '';
    position: absolute;
    top: 15px;
    right: -50%;
    width: 100%;
    height: 2px;
    background-color: #e5e5e5;
    z-index: 1;
}

.step-item.completed:not(:last-child)::after {
    background-color: var(--tblr-success);
}

.step-counter {
    width: 30px;
    height: 30px;
    border-radius: 50%;
    background-color: #e5e5e5;
    color: #666;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: bold;
    margin-right: 1rem;
    z-index: 2;
    position: relative;
}

.step-item.active .step-counter {
    background-color: var(--tblr-primary);
    color: white;
}

.step-item.completed .step-counter {
    background-color: var(--tblr-success);
    color: white;
}

.step-display h6 {
    margin-bottom: 0.25rem;
    font-weight: 600;
}

.step-display p {
    margin-bottom: 0;
    font-size: 0.875rem;
}

/* Fix dropdown text color */
.form-control option {
    color: #333 !important;
    background-color: #fff !important;
}

.form-control select {
    color: #333 !important;
}

select.form-control {
    color: #333 !important;
    background-color: #fff !important;
}

select.form-control option {
    color: #333 !important;
    background-color: #fff !important;
}

/* Dark mode override for dropdowns */
:where(.theme-dark, [data-bs-theme="dark"]) select.form-control {
    color: #333 !important;
    background-color: #fff !important;
}

:where(.theme-dark, [data-bs-theme="dark"]) select.form-control option {
    color: #333 !important;
    background-color: #fff !important;
}

@media (max-width: 768px) {
    .steps {
        flex-direction: column;
        align-items: flex-start;
    }
    
    .step-item {
        margin-bottom: 1rem;
    }
    
    .step-item:not(:last-child)::after {
        display: none;
    }
}
</style>
@endsection

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const jenjangSelect = document.getElementById('jenjang_id');
    const prodiSelect = document.getElementById('program_studi_id');
    
    if (jenjangSelect && prodiSelect) {
        jenjangSelect.addEventListener('change', function() {
            const jenjangId = this.value;
            
            // Clear dropdown
            prodiSelect.innerHTML = '<option value="">Loading...</option>';
            
            if (jenjangId) {
                const url = '{{ url("/test-prodi") }}/' + jenjangId;
                
                fetch(url)
                    .then(response => response.json())
                    .then(data => {
                        // Clear options
                        prodiSelect.innerHTML = '<option value="">Pilih Program Studi</option>';
                        
                        // Add options
                        data.forEach(prodi => {
                            const option = document.createElement('option');
                            option.value = prodi.id;
                            option.textContent = prodi.name + ' (' + prodi.code + ')';
                            prodiSelect.appendChild(option);
                        });
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        prodiSelect.innerHTML = '<option value="">Error loading data</option>';
                    });
            } else {
                prodiSelect.innerHTML = '<option value="">Pilih Jenjang Dulu</option>';
            }
        });
    }
});
</script>

<script>
function toggleEdit() {
    const viewMode = document.getElementById('viewMode');
    const editMode = document.getElementById('editMode');
    
    if (viewMode.style.display === 'none') {
        viewMode.style.display = 'block';
        editMode.style.display = 'none';
    } else {
        viewMode.style.display = 'none';
        editMode.style.display = 'block';
    }
}

// File upload preview
document.querySelector('input[name="bukti_pembayaran"]')?.addEventListener('change', function(e) {
    const file = e.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            // You can add preview functionality here
        };
        reader.readAsDataURL(file);
    }
});
</script>
@endsection
