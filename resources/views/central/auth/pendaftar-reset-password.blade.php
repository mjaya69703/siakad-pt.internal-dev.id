@extends('core-themes.core-mainpage')
@section('content')
    <div class="page page-center">
        <div class="container container-normal py-4">
            <div class="row align-items-center g-4">
                <div class="col-lg">
                    <div class="container-tight">
                        <div class="text-center mb-4">
                            <!-- BEGIN NAVBAR LOGO -->
                            <a href="{{ route('auth.render-signin') }}" aria-label="Back to Login" class="navbar-brand navbar-brand-autodark">
                                <img src="{{ $webs->school_logo_hori }}" style="height: 64px; width:200px;" alt="Neco Siakad Logo">
                            </a>
                            <!-- END NAVBAR LOGO -->
                        </div>
                        <div class="card card-md">
                            <div class="card-body">
                                <h2 class="h2 text-center mb-4">Reset Password</h2>
                                <p class="text-center text-muted mb-4">
                                    Masukkan password baru untuk akun Anda
                                </p>
                                
                                <form action="{{ route('pendaftar.password.update') }}" method="post" autocomplete="on" novalidate>
                                    @csrf
                                    <input type="hidden" name="token" value="{{ $token }}">
                                    <input type="hidden" name="email" value="{{ $email }}">

                                    <div class="mb-3">
                                        <label class="form-label">Email Address</label>
                                        <input type="email" class="form-control" value="{{ $email }}" readonly />
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Password Baru</label>
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
                                            <label class="form-label">Konfirmasi Password</label>
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

                                    <div class="form-footer">
                                        <button type="submit" class="btn btn-primary w-100">
                                            <i class="fas fa-key me-1"></i> Reset Password
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        
                        <div class="text-center text-secondary mt-3">
                            Kembali ke 
                            <a href="{{ route('auth.render-signin') }}" class="text-primary fw-bold">
                                Halaman Login
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg d-none d-lg-block">
                    <svg class="img d-block mx-auto" xmlns="http://www.w3.org/2000/svg" height="400" fill="none" viewBox="0 0 800 600">
                        <!-- Reset Password Illustration -->
                        <style>
                            :where(.theme-dark, [data-bs-theme="dark"]) .reset-illustration-a {
                                fill: black;
                                opacity: 0.07;
                            }
                            :where(.theme-dark, [data-bs-theme="dark"]) .reset-illustration-b {
                                fill: #454c5e;
                            }
                        </style>
                        <circle cx="400" cy="300" r="200" fill="#F7F8FC" class="reset-illustration-a"/>
                        <path d="M350 250 Q400 200 450 250 Q420 320 400 300 Q380 320 350 250" fill="#0455A4"/>
                        <text x="400" y="320" text-anchor="middle" fill="#232B41" font-size="24" font-weight="bold">🔑</text>
                        <text x="400" y="350" text-anchor="middle" fill="#232B41" font-size="16">New Password</text>
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

        // Focus on first password input
        password.focus();
    });
</script>
@endsection
