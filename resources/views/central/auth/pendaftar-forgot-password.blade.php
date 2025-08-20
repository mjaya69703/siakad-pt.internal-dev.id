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
                                <h2 class="h2 text-center mb-4">Lupa Password Pendaftar</h2>
                                <p class="text-center text-muted mb-4">
                                    Masukkan email Anda dan kami akan mengirimkan link untuk reset password
                                </p>
                                
                                <form action="{{ route('pendaftar.password.email') }}" method="post" autocomplete="on" novalidate>
                                    @csrf
                                    <div class="mb-3">
                                        <label class="form-label">Email Address</label>
                                        <input type="email" class="form-control" name="email" placeholder="Email Anda" value="{{ old('email') }}" required autofocus />
                                        @error('email')
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
                                            <i class="fas fa-paper-plane me-1"></i> Kirim Link Reset Password
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        
                        <div class="text-center text-secondary mt-3">
                            Sudah ingat password? 
                            <a href="{{ route('auth.render-signin') }}" class="text-primary fw-bold">
                                Kembali ke Login
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg d-none d-lg-block">
                    <svg class="img d-block mx-auto" xmlns="http://www.w3.org/2000/svg" height="400" fill="none" viewBox="0 0 800 600">
                        <!-- Forgot Password Illustration -->
                        <style>
                            :where(.theme-dark, [data-bs-theme="dark"]) .forgot-illustration-a {
                                fill: black;
                                opacity: 0.07;
                            }
                            :where(.theme-dark, [data-bs-theme="dark"]) .forgot-illustration-b {
                                fill: #454c5e;
                            }
                        </style>
                        <circle cx="400" cy="300" r="200" fill="#F7F8FC" class="forgot-illustration-a"/>
                        <path d="M350 250 Q400 200 450 250 Q420 320 400 300 Q380 320 350 250" fill="#0455A4"/>
                        <text x="400" y="320" text-anchor="middle" fill="#232B41" font-size="24" font-weight="bold">📧</text>
                        <text x="400" y="350" text-anchor="middle" fill="#232B41" font-size="16">Reset Password</text>
                    </svg>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('custom-js')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Focus on email input
        const emailInput = document.querySelector('input[name="email"]');
        if (emailInput) {
            emailInput.focus();
        }
    });
</script>
@endsection
