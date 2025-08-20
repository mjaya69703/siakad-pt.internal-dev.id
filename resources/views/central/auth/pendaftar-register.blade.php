@extends('core-themes.core-mainpage')
@section('content')
    <div class="page page-center">
        <div class="container container-normal py-4">
            <div class="row align-items-center g-4">
                <div class="col-lg">
                    <div class="container-tight">
                        <div class="text-center mb-4">
                            <!-- BEGIN NAVBAR LOGO -->
                            <a href="." aria-label="Tabler" class="navbar-brand navbar-brand-autodark">
                                <img src="{{ $webs->school_logo_hori }}" style="height: 64px; width:200px;" alt="Neco Siakad Logo">
                            </a>
                            <!-- END NAVBAR LOGO -->
                        </div>
                        <div class="card card-md">
                            <div class="card-body">
                                <h2 class="h2 text-center mb-4">Daftar Akun Calon Mahasiswa</h2>
                                <p class="text-center text-muted mb-4">
                                    Daftarkan diri Anda untuk mengakses portal PMB
                                </p>
                                
                                <form action="{{ route('pendaftar.register.submit') }}" method="post" autocomplete="on" novalidate>
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Nama Lengkap <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="name" placeholder="Nama lengkap Anda" value="{{ old('name') }}" required />
                                            @error('name')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Email <span class="text-danger">*</span></label>
                                            <input type="email" class="form-control" name="email" placeholder="Email Anda" value="{{ old('email') }}" required />
                                            @error('email')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    
                                    <div class="mb-3">
                                        <label class="form-label">Nomor HP/WhatsApp <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="phone" placeholder="Contoh: 08123456789" value="{{ old('phone') }}" required />
                                        @error('phone')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Password <span class="text-danger">*</span></label>
                                            <div class="input-group input-group-flat">
                                                <input type="password" class="form-control" name="password" id="password" placeholder="Minimal 8 karakter" required />
                                                <span class="input-group-text">
                                                    <a href="javascript:void(0)" class="link-secondary toggle-password" title="Tampilkan password" data-bs-toggle="tooltip">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-1">
                                                            <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                                                            <path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6" />
                                                        </svg>
                                                    </a>
                                                </span>
                                            </div>
                                            @error('password')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Konfirmasi Password <span class="text-danger">*</span></label>
                                            <div class="input-group input-group-flat">
                                                <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" placeholder="Ulangi password" required />
                                                <span class="input-group-text">
                                                    <a href="javascript:void(0)" class="link-secondary toggle-password-confirm" title="Tampilkan password" data-bs-toggle="tooltip">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-1">
                                                            <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                                                            <path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6" />
                                                        </svg>
                                                    </a>
                                                </span>
                                            </div>
                                            @error('password_confirmation')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-check">
                                            <input type="checkbox" class="form-check-input" name="terms" required />
                                            <span class="form-check-label">
                                                Saya menyetujui <a href="#" class="text-primary">syarat dan ketentuan</a> yang berlaku
                                            </span>
                                        </label>
                                        @error('terms')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    @if($webs->enable_captcha == true || $webs->enable_captcha == 1 || $webs->enable_captcha == "1")
                                    <div class="mb-3">
                                        <x-turnstile-widget theme="auto" language="id"/>
                                        @error('cf-turnstile-response')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    @endif

                                    <div class="form-footer">
                                        <button type="submit" class="btn btn-primary w-100">
                                            <i class="fas fa-user-plus me-1"></i> Daftar Sekarang
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        
                        <div class="text-center text-secondary mt-3">
                            Sudah punya akun? 
                            <a href="{{ route('auth.render-signin') }}" class="text-primary fw-bold">
                                Login di sini
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg d-none d-lg-block">
                    <svg class="img d-block mx-auto" xmlns="http://www.w3.org/2000/svg" height="400" fill="none" viewBox="0 0 800 600">
                        <!-- SVG illustration similar to login page -->
                        <style>
                            :where(.theme-dark, [data-bs-theme="dark"]) .register-illustration-a {
                                fill: black;
                                opacity: 0.07;
                            }
                            :where(.theme-dark, [data-bs-theme="dark"]) .register-illustration-b {
                                fill: #454c5e;
                            }
                        </style>
                        <circle cx="400" cy="300" r="200" fill="#F7F8FC" class="register-illustration-a"/>
                        <path d="M300 250 Q400 150 500 250 Q450 350 400 300 Q350 350 300 250" fill="#0455A4"/>
                        <text x="400" y="320" text-anchor="middle" fill="#232B41" font-size="24" font-weight="bold">PMB</text>
                        <text x="400" y="350" text-anchor="middle" fill="#232B41" font-size="16">Registration</text>
                    </svg>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('custom-js')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Toggle password visibility
        const togglePassword = document.querySelector('.toggle-password');
        const passwordInput = document.querySelector('#password');
        
        if (togglePassword && passwordInput) {
            togglePassword.addEventListener('click', function() {
                const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                passwordInput.setAttribute('type', type);
                
                const icon = this.querySelector('svg');
                if (type === 'password') {
                    icon.innerHTML = `
                        <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                        <path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6" />
                    `;
                } else {
                    icon.innerHTML = `
                        <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                        <path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6" />
                        <path d="M3 3l18 18" />
                    `;
                }
            });
        }

        // Toggle confirm password visibility
        const togglePasswordConfirm = document.querySelector('.toggle-password-confirm');
        const passwordConfirmInput = document.querySelector('#password_confirmation');
        
        if (togglePasswordConfirm && passwordConfirmInput) {
            togglePasswordConfirm.addEventListener('click', function() {
                const type = passwordConfirmInput.getAttribute('type') === 'password' ? 'text' : 'password';
                passwordConfirmInput.setAttribute('type', type);
                
                const icon = this.querySelector('svg');
                if (type === 'password') {
                    icon.innerHTML = `
                        <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                        <path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6" />
                    `;
                } else {
                    icon.innerHTML = `
                        <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                        <path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6" />
                        <path d="M3 3l18 18" />
                    `;
                }
            });
        }

        // Password validation
        const password = document.getElementById('password');
        const confirmPassword = document.getElementById('password_confirmation');
        
        function validatePassword() {
            if (password.value !== confirmPassword.value) {
                confirmPassword.setCustomValidity("Password tidak cocok");
            } else {
                confirmPassword.setCustomValidity('');
            }
        }
        
        password.addEventListener('change', validatePassword);
        confirmPassword.addEventListener('keyup', validatePassword);
    });
</script>
@endsection
