<!DOCTYPE html>
<html lang="id" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Dashboard') - {{ config('app.name', 'Neco Siakad') }}</title>
    <meta name="msapplication-TileColor" content="#0455A4">
    <meta name="theme-color" content="#0455A4">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="HandheldFriendly" content="True">
    <meta name="MobileOptimized" content="320">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <!-- CSS files -->
    <link href="{{ asset('dashboard/dist/css/tabler.min.css') }}" rel="stylesheet">
    <link href="{{ asset('dashboard/dist/css/tabler-flags.min.css') }}" rel="stylesheet">
    <link href="{{ asset('dashboard/dist/css/tabler-payments.min.css') }}" rel="stylesheet">
    <link href="{{ asset('dashboard/dist/css/tabler-vendors.min.css') }}" rel="stylesheet">
    <link href="{{ asset('dashboard/dist/css/demo.min.css') }}" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    
    <style>
        :root {
            --tblr-primary: #0455A4;
            --tblr-primary-rgb: 4, 85, 164;
        }
        .navbar-brand img {
            height: 40px;
        }
        .page-wrapper {
            background: #f8fafc;
        }
        .card {
            box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
            border: 1px solid rgba(0, 0, 0, 0.125);
        }
        .status-badge {
            display: inline-block;
            padding: 0.25rem 0.5rem;
            font-size: 0.75rem;
            font-weight: 500;
            border-radius: 0.25rem;
        }
        .status-pending { background-color: #fff3cd; color: #856404; }
        .status-verified { background-color: #d1ecf1; color: #0c5460; }
        .status-approved { background-color: #d4edda; color: #155724; }
        .status-rejected { background-color: #f8d7da; color: #721c24; }
        
        .sidebar-nav .nav-link {
            color: #6c757d;
            border-radius: 0.375rem;
            margin-bottom: 0.25rem;
        }
        .sidebar-nav .nav-link:hover,
        .sidebar-nav .nav-link.active {
            background-color: var(--tblr-primary);
            color: white;
        }
        .sidebar-nav .nav-link i {
            width: 1.25rem;
            text-align: center;
        }
        
        /* Fix dropdown text color */
        select.form-control,
        select.form-select {
            color: #495057 !important;
            background-color: #fff !important;
        }
        
        select.form-control option,
        select.form-select option {
            color: #495057 !important;
            background-color: #fff !important;
        }
        
        input.form-control {
            color: #495057 !important;
        }
    </style>
    
    @yield('styles')
</head>

<body>
    <div class="page">
        <!-- Navbar -->
        <header class="navbar navbar-expand-md d-print-none">
            <div class="container-xl">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu" aria-controls="navbar-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <h1 class="navbar-brand navbar-brand-autodark d-none-navbar-horizontal pe-0 pe-md-3">
                    <a href="{{ route('pendaftar.dashboard') }}">
                        <img src="{{ asset('assets/img/logo-horizontal.png') }}" width="110" height="32" alt="Neco Siakad" class="navbar-brand-image">
                    </a>
                </h1>
                <div class="navbar-nav flex-row order-md-last">
                    <div class="d-none d-md-flex">
                        <a href="?theme=dark" class="nav-link px-0 hide-theme-dark" title="Enable dark mode" data-bs-toggle="tooltip" data-bs-placement="bottom">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M12 3c.132 0 .263 0 .393 0a7.5 7.5 0 0 0 7.92 12.446a9 9 0 1 1 -8.313 -12.454z"></path>
                            </svg>
                        </a>
                        <a href="?theme=light" class="nav-link px-0 hide-theme-light" title="Enable light mode" data-bs-toggle="tooltip" data-bs-placement="bottom">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <circle cx="12" cy="12" r="4"></circle>
                                <path d="M3 12h1m8 -9v1m8 8h1m-9 8v1m-6.4 -15.4l.7 .7m12.1 -.7l-.7 .7m0 11.4l.7 .7m-12.1 -.7l-.7 .7"></path>
                            </svg>
                        </a>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown" aria-label="Open user menu">
                            <span class="avatar avatar-sm" style="background-image: url('{{ asset('assets/img/default-avatar.png') }}')"></span>
                            <div class="d-none d-xl-block ps-2">
                                <div>{{ Auth::guard('pendaftar')->user()->name }}</div>
                                <div class="mt-1 small text-muted">Calon Mahasiswa</div>
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                            <a href="{{ route('pendaftar.profile') }}" class="dropdown-item">
                                <i class="fas fa-user me-2"></i>
                                Profil Saya
                            </a>
                            <div class="dropdown-divider"></div>
                            <form action="{{ route('pendaftar.logout') }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="dropdown-item text-danger">
                                    <i class="fas fa-sign-out-alt me-2"></i>
                                    Logout
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        
        <div class="page-wrapper">
            <!-- Page header -->
            <div class="page-header d-print-none">
                <div class="container-xl">
                    <div class="row g-2 align-items-center">
                        <div class="col">
                            <div class="page-pretitle">
                                @yield('page-pretitle', 'Dashboard')
                            </div>
                            <h2 class="page-title">
                                @yield('page-title', 'Calon Mahasiswa')
                            </h2>
                        </div>
                        @yield('page-actions')
                    </div>
                </div>
            </div>
            
            <!-- Page body -->
            <div class="page-body">
                <div class="container-xl">
                    <div class="row">
                        <!-- Sidebar -->
                        <div class="col-md-3 mb-4">
                            <div class="card">
                                <div class="card-body">
                                    <div class="text-center mb-3">
                                        <div class="avatar avatar-xl" style="background-image: url('{{ asset('assets/img/default-avatar.png') }}')"></div>
                                        <h4 class="mt-2 mb-1">{{ Auth::guard('pendaftar')->user()->name }}</h4>
                                        <p class="text-muted">{{ Auth::guard('pendaftar')->user()->email }}</p>
                                    </div>
                                    
                                    <nav class="nav nav-pills nav-vertical sidebar-nav">
                                        <a href="{{ route('pendaftar.dashboard') }}" class="nav-link {{ request()->routeIs('pendaftar.dashboard') ? 'active' : '' }}">
                                            <i class="fas fa-tachometer-alt me-2"></i>
                                            Dashboard
                                        </a>
                                        <a href="{{ route('pendaftar.profile') }}" class="nav-link {{ request()->routeIs('pendaftar.profile') ? 'active' : '' }}">
                                            <i class="fas fa-user me-2"></i>
                                            Profil Saya
                                        </a>
                                        <a href="{{ route('pendaftar.pendaftaran') }}" class="nav-link {{ request()->routeIs('pendaftar.pendaftaran') ? 'active' : '' }}">
                                            <i class="fas fa-file-alt me-2"></i>
                                            Form Pendaftaran
                                        </a>
                                        <a href="{{ route('pendaftar.dokumen') }}" class="nav-link {{ request()->routeIs('pendaftar.dokumen') ? 'active' : '' }}">
                                            <i class="fas fa-folder me-2"></i>
                                            Upload Dokumen
                                        </a>
                                        <a href="{{ route('pendaftar.status') }}" class="nav-link {{ request()->routeIs('pendaftar.status') ? 'active' : '' }}">
                                            <i class="fas fa-info-circle me-2"></i>
                                            Status Pendaftaran
                                        </a>
                                    </nav>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Content -->
                        <div class="col-md-9">
                            @if(session('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('success') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif
                            
                            @if(session('error'))
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    {{ session('error') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif
                            
                            @yield('content')
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Footer -->
            <footer class="footer footer-transparent d-print-none">
                <div class="container-xl">
                    <div class="row text-center align-items-center flex-row-reverse">
                        <div class="col-lg-auto ms-lg-auto">
                            <ul class="list-inline list-inline-dots mb-0">
                                <li class="list-inline-item">
                                    <a href="#" class="link-secondary">PMB {{ date('Y') }}</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-12 col-lg-auto mt-3 mt-lg-0">
                            <ul class="list-inline list-inline-dots mb-0">
                                <li class="list-inline-item">
                                    Copyright © {{ date('Y') }}
                                    <a href="#" class="link-secondary">Neco Siakad</a>.
                                    All rights reserved.
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    
    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('dashboard/dist/js/tabler.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <script>
        // Auto hide alerts after 5 seconds
        setTimeout(function() {
            $('.alert').fadeOut();
        }, 5000);
        
        // CSRF token for AJAX requests
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
    
    @yield('scripts')
</body>
</html>
