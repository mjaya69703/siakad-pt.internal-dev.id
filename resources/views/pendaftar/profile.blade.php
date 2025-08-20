@extends('pendaftar.layouts.app')

@section('title', 'Profil Saya')
@section('page-pretitle', 'Akun')
@section('page-title', 'Profil Saya')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="fas fa-user me-2"></i>
                    Informasi Profil
                </h3>
            </div>
            <div class="card-body">
                <form action="{{ route('pendaftar.profile.update') }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Nama Lengkap <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" 
                                   name="name" value="{{ old('name', $user->name) }}" required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Email <span class="text-danger">*</span></label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" 
                                   name="email" value="{{ old('email', $user->email) }}" required>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Nomor HP <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('phone') is-invalid @enderror" 
                                   name="phone" value="{{ old('phone', $user->phone) }}" required>
                            @error('phone')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Status Akun</label>
                            <input type="text" class="form-control" value="{{ ucfirst($user->status) }}" readonly>
                        </div>
                        
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Terdaftar Sejak</label>
                            <input type="text" class="form-control" value="{{ $user->created_at->format('d F Y') }}" readonly>
                        </div>
                        
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Email Terverifikasi</label>
                            <input type="text" class="form-control" 
                                   value="{{ $user->email_verified_at ? 'Ya (' . $user->email_verified_at->format('d M Y') . ')' : 'Belum' }}" readonly>
                        </div>
                    </div>
                    
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save me-2"></i>
                                    Simpan Perubahan
                                </button>
                                <a href="{{ route('pendaftar.dashboard') }}" class="btn btn-secondary ms-2">
                                    <i class="fas fa-arrow-left me-2"></i>
                                    Kembali
                                </a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Change Password Card -->
<div class="row mt-4">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="fas fa-lock me-2"></i>
                    Ganti Password
                </h3>
            </div>
            <div class="card-body">
                <form action="{{ route('pendaftar.password.change') }}" method="POST" id="changePasswordForm">
                    @csrf
                    @method('PUT')
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Password Baru <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <input type="password" class="form-control @error('password') is-invalid @enderror" 
                                       name="password" id="password" required>
                                <button class="btn btn-outline-secondary" type="button" onclick="togglePassword('password')">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <small class="text-muted">Minimal 8 karakter</small>
                        </div>
                        
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Konfirmasi Password <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" 
                                       name="password_confirmation" id="password_confirmation" required>
                                <button class="btn btn-outline-secondary" type="button" onclick="togglePassword('password_confirmation')">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                            @error('password_confirmation')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="card-footer">
                        <button type="submit" class="btn btn-warning">
                            <i class="fas fa-key me-2"></i>
                            Ganti Password
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Account Statistics -->
<div class="row mt-4">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="fas fa-chart-bar me-2"></i>
                    Statistik Akun
                </h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3 text-center">
                        <div class="mb-2">
                            <span class="badge bg-primary fs-4">1</span>
                        </div>
                        <h6>Akun Aktif</h6>
                        <small class="text-muted">Status aktif</small>
                    </div>
                    
                    <div class="col-md-3 text-center">
                        <div class="mb-2">
                            <span class="badge bg-info fs-4">{{ $user->pendaftaran ? '1' : '0' }}</span>
                        </div>
                        <h6>Pendaftaran</h6>
                        <small class="text-muted">Form pendaftaran</small>
                    </div>
                    
                    <div class="col-md-3 text-center">
                        <div class="mb-2">
                            <span class="badge bg-success fs-4">{{ $user->pendaftaran && $user->pendaftaran->dokumen ? $user->pendaftaran->dokumen->count() : 0 }}</span>
                        </div>
                        <h6>Dokumen</h6>
                        <small class="text-muted">File terupload</small>
                    </div>
                    
                    <div class="col-md-3 text-center">
                        <div class="mb-2">
                            <span class="badge bg-warning fs-4">{{ $user->created_at->diffInDays(now()) }}</span>
                        </div>
                        <h6>Hari</h6>
                        <small class="text-muted">Sejak mendaftar</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
function togglePassword(fieldId) {
    const field = document.getElementById(fieldId);
    const button = field.nextElementSibling;
    const icon = button.querySelector('i');
    
    if (field.type === 'password') {
        field.type = 'text';
        icon.classList.remove('fa-eye');
        icon.classList.add('fa-eye-slash');
    } else {
        field.type = 'password';
        icon.classList.remove('fa-eye-slash');
        icon.classList.add('fa-eye');
    }
}

// Password strength validation
document.getElementById('password').addEventListener('input', function() {
    const password = this.value;
    const confirmPassword = document.getElementById('password_confirmation');
    
    // Basic strength check
    let strength = 0;
    if (password.length >= 8) strength++;
    if (password.match(/[a-z]/)) strength++;
    if (password.match(/[A-Z]/)) strength++;
    if (password.match(/[0-9]/)) strength++;
    if (password.match(/[^a-zA-Z0-9]/)) strength++;
    
    // Clear confirmation if passwords don't match
    if (confirmPassword.value && confirmPassword.value !== password) {
        confirmPassword.setCustomValidity("Password tidak cocok");
    } else {
        confirmPassword.setCustomValidity("");
    }
});

document.getElementById('password_confirmation').addEventListener('input', function() {
    const password = document.getElementById('password').value;
    if (this.value !== password) {
        this.setCustomValidity("Password tidak cocok");
    } else {
        this.setCustomValidity("");
    }
});
</script>
@endsection
