<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    @PwaHead

    <title>{{ (isset($menus) ? $menus . ' - ' : '') . $pages . ' - ' . $academy }}</title>
    <!-- BEGIN PAGE LEVEL STYLES -->
    <link href="./libs/jsvectormap/dist/jsvectormap.css?1747482948" rel="stylesheet" />
    <!-- END PAGE LEVEL STYLES -->
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="{{ asset('dashboard') }}/dist/css/tabler.css?1747482948" rel="stylesheet" />
    <!-- END GLOBAL MANDATORY STYLES -->
    <!-- BEGIN PLUGINS STYLES -->
    <link href="{{ asset('dashboard') }}/dist/css/tabler-flags.css?1747482948" rel="stylesheet" />
    <link href="{{ asset('dashboard') }}/dist/css/tabler-socials.css?1747482948" rel="stylesheet" />
    <link href="{{ asset('dashboard') }}/dist/css/tabler-payments.css?1747482948" rel="stylesheet" />
    <link href="{{ asset('dashboard') }}/dist/css/tabler-vendors.css?1747482948" rel="stylesheet" />
    <link href="{{ asset('dashboard') }}/dist/css/tabler-marketing.css?1747482948" rel="stylesheet" />
    <link href="{{ asset('dashboard') }}/dist/css/tabler-themes.css?1747482948" rel="stylesheet" />
    <!-- END PLUGINS STYLES -->
    <!-- BEGIN DEMO STYLES -->
    <link href="./preview/css/demo.css?1747482948" rel="stylesheet" />
    <!-- END DEMO STYLES -->
    @yield('custom-css')
    <style>
        .form-label,
        .form-control {
            margin-top: 0 !important;
        }
    </style>


    <!-- BEGIN CUSTOM FONT -->
    <style>
        @import url("https://rsms.me/inter/inter.css");
    </style>
    <!-- END CUSTOM FONT -->
</head>

<body class="layout-fluid">
    <!-- BEGIN GLOBAL THEME SCRIPT -->
    <script src="{{ asset('dashboard') }}/dist/js/tabler-theme.min.js?1747482948"></script>
    <!-- END GLOBAL THEME SCRIPT -->
    <div class="page">
        <!--  BEGIN SIDEBAR  -->
        <aside class="navbar navbar-vertical navbar-expand-lg" data-bs-theme="dark">
            <div class="container-fluid">
                <!-- BEGIN NAVBAR TOGGLER -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#sidebar-menu" aria-controls="sidebar-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <!-- END NAVBAR TOGGLER -->
                <!-- BEGIN NAVBAR LOGO -->
                <div class="navbar-brand navbar-brand-autodark">
                    <a href="{{ route('root.home-index') }}" aria-label="Tabler">
                        <img src="{{ $webs->school_logo_hori }}" style="height: 64px; width:200px;" alt="Neco Siakad Logo">
                    </a>
                </div>
                <!-- END NAVBAR LOGO -->
                <div class="navbar-nav flex-row d-lg-none">
                    <div class="nav-item d-none d-lg-flex me-3">
                        <div class="btn-list">
                            <a href="https://github.com/tabler/tabler" class="btn btn-5" target="_blank" rel="noreferrer">
                                <!-- Download SVG icon from http://tabler.io/icons/icon/brand-github -->
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-2">
                                    <path d="M9 19c-4.3 1.4 -4.3 -2.5 -6 -3m12 5v-3.5c0 -1 .1 -1.4 -.5 -2c2.8 -.3 5.5 -1.4 5.5 -6a4.6 4.6 0 0 0 -1.3 -3.2a4.2 4.2 0 0 0 -.1 -3.2s-1.1 -.3 -3.5 1.3a12.3 12.3 0 0 0 -6.2 0c-2.4 -1.6 -3.5 -1.3 -3.5 -1.3a4.2 4.2 0 0 0 -.1 3.2a4.6 4.6 0 0 0 -1.3 3.2c0 4.6 2.7 5.7 5.5 6c-.6 .6 -.6 1.2 -.5 2v3.5" />
                                </svg>
                                Source code
                            </a>
                            <a href="https://github.com/sponsors/codecalm" class="btn btn-6" target="_blank" rel="noreferrer">
                                <!-- Download SVG icon from http://tabler.io/icons/icon/heart -->
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon text-pink icon-2">
                                    <path d="M19.5 12.572l-7.5 7.428l-7.5 -7.428a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572" />
                                </svg>
                                Sponsor
                            </a>
                        </div>
                    </div>
                    <div class="d-none d-lg-flex">
                        <div class="nav-item">
                            <a href="?theme=dark" class="nav-link px-0 hide-theme-dark" title="Enable dark mode" data-bs-toggle="tooltip" data-bs-placement="bottom">
                                <!-- Download SVG icon from http://tabler.io/icons/icon/moon -->
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-1">
                                    <path d="M12 3c.132 0 .263 0 .393 0a7.5 7.5 0 0 0 7.92 12.446a9 9 0 1 1 -8.313 -12.454z" />
                                </svg>
                            </a>
                            <a href="?theme=light" class="nav-link px-0 hide-theme-light" title="Enable light mode" data-bs-toggle="tooltip" data-bs-placement="bottom">
                                <!-- Download SVG icon from http://tabler.io/icons/icon/sun -->
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-1">
                                    <path d="M12 12m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0" />
                                    <path d="M3 12h1m8 -9v1m8 8h1m-9 8v1m-6.4 -15.4l.7 .7m12.1 -.7l-.7 .7m0 11.4l.7 .7m-12.1 -.7l-.7 .7" />
                                </svg>
                            </a>
                        </div>
                        <div class="nav-item dropdown d-none d-md-flex">
                            <a href="#" class="nav-link px-0" data-bs-toggle="dropdown" tabindex="-1" aria-label="Show notifications" data-bs-auto-close="outside" aria-expanded="false">
                                <!-- Download SVG icon from http://tabler.io/icons/icon/bell -->
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-1">
                                    <path d="M10 5a2 2 0 1 1 4 0a7 7 0 0 1 4 6v3a4 4 0 0 0 2 3h-16a4 4 0 0 0 2 -3v-3a7 7 0 0 1 4 -6" />
                                    <path d="M9 17v1a3 3 0 0 0 6 0v-1" />
                                </svg>
                                <span class="badge bg-red"></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-end dropdown-menu-card">
                                <div class="card">
                                    <div class="card-header d-flex">
                                        <h3 class="card-title">Notifications</h3>
                                        <div class="btn-close ms-auto" data-bs-dismiss="dropdown"></div>
                                    </div>
                                    <div class="list-group list-group-flush list-group-hoverable">
                                        <div class="list-group-item">
                                            <div class="row align-items-center">
                                                <div class="col-auto"><span class="status-dot status-dot-animated bg-red d-block"></span></div>
                                                <div class="col text-truncate">
                                                    <a href="#" class="text-body d-block">Example 1</a>
                                                    <div class="d-block text-secondary text-truncate mt-n1">Change deprecated html tags to text decoration classes (#29604)</div>
                                                </div>
                                                <div class="col-auto">
                                                    <a href="#" class="list-group-item-actions">
                                                        <!-- Download SVG icon from http://tabler.io/icons/icon/star -->
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon text-muted icon-2">
                                                            <path d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z" />
                                                        </svg>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="list-group-item">
                                            <div class="row align-items-center">
                                                <div class="col-auto"><span class="status-dot d-block"></span></div>
                                                <div class="col text-truncate">
                                                    <a href="#" class="text-body d-block">Example 2</a>
                                                    <div class="d-block text-secondary text-truncate mt-n1">justify-content:between ⇒ justify-content:space-between (#29734)</div>
                                                </div>
                                                <div class="col-auto">
                                                    <a href="#" class="list-group-item-actions show">
                                                        <!-- Download SVG icon from http://tabler.io/icons/icon/star -->
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon text-yellow icon-2">
                                                            <path d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z" />
                                                        </svg>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="list-group-item">
                                            <div class="row align-items-center">
                                                <div class="col-auto"><span class="status-dot d-block"></span></div>
                                                <div class="col text-truncate">
                                                    <a href="#" class="text-body d-block">Example 3</a>
                                                    <div class="d-block text-secondary text-truncate mt-n1">Update change-version.js (#29736)</div>
                                                </div>
                                                <div class="col-auto">
                                                    <a href="#" class="list-group-item-actions">
                                                        <!-- Download SVG icon from http://tabler.io/icons/icon/star -->
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon text-muted icon-2">
                                                            <path d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z" />
                                                        </svg>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="list-group-item">
                                            <div class="row align-items-center">
                                                <div class="col-auto"><span class="status-dot status-dot-animated bg-green d-block"></span></div>
                                                <div class="col text-truncate">
                                                    <a href="#" class="text-body d-block">Example 4</a>
                                                    <div class="d-block text-secondary text-truncate mt-n1">Regenerate package-lock.json (#29730)</div>
                                                </div>
                                                <div class="col-auto">
                                                    <a href="#" class="list-group-item-actions">
                                                        <!-- Download SVG icon from http://tabler.io/icons/icon/star -->
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon text-muted icon-2">
                                                            <path d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z" />
                                                        </svg>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col">
                                                <a href="#" class="btn btn-2 w-100"> Archive all </a>
                                            </div>
                                            <div class="col">
                                                <a href="#" class="btn btn-2 w-100"> Mark all as read </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link d-flex lh-1 p-0 px-2" data-bs-toggle="dropdown" aria-label="Open user menu">
                            <span class="avatar avatar-sm" style="background-image: url({{ $user == null ? '' : $user->photo }})"> </span>
                            <div class="d-none d-xl-block ps-2">
                                <div>{{ $user == null ? '' : $user->name }}</div>
                                <div class="mt-1 small text-secondary">{{ $user == null ? '' : $user->name }}</div>
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                            <a href="#" class="dropdown-item">Status</a>
                            <a href="{{ route($spref . 'profile-render') }}" class="dropdown-item">Profile</a>
                            <a href="#" class="dropdown-item">Feedback</a>
                            <div class="dropdown-divider"></div>
                            <a href="./settings.html" class="dropdown-item">Settings</a>
                            <a href="{{ route($spref . 'handle-logout') }}" class="dropdown-item">Logout</a>
                        </div>
                    </div>
                </div>
                <div class="collapse navbar-collapse" id="sidebar-menu">
                    <!-- BEGIN NAVBAR MENU -->
                    <ul class="navbar-nav pt-lg-3">
                        <li class="nav-item">
                            <a class="nav-link {{ Route::is($spref . 'dashboard-render', request()->path()) ? 'active' : '' }}" href="{{ route($spref . 'dashboard-render') }}">
                                <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler.io/icons/icon/home -->
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-1">
                                        <path d="M5 12l-2 0l9 -9l9 9l-2 0" />
                                        <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" />
                                        <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" />
                                    </svg>
                                </span>
                                <span class="nav-link-title"> Homes </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Route::is($spref . 'profile-render', request()->path()) ? 'active' : '' }}" href="{{ route($spref . 'profile-render') }}">
                                <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler.io/icons/icon/home -->
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-user-edit">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" />
                                        <path d="M6 21v-2a4 4 0 0 1 4 -4h3.5" />
                                        <path d="M18.42 15.61a2.1 2.1 0 0 1 2.97 2.97l-3.39 3.42h-3v-3l3.42 -3.39z" />
                                    </svg>
                                </span>
                                <span class="nav-link-title"> Profile </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Route::is($spref . 'absensi-render', request()->path()) ? 'active' : '' }}" href="{{ route($spref . 'absensi-render') }}">
                                <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler.io/icons/icon/home -->
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-user-check">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" />
                                        <path d="M6 21v-2a4 4 0 0 1 4 -4h4" />
                                        <path d="M15 19l2 2l4 -4" />
                                    </svg>
                                </span>
                                <span class="nav-link-title"> Absensi </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <span class="nav-link" href="">
                                <span class="nav-link-title"> Data Master </span>
                            </span>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link {{ Route::is($spref . 'pengguna.*', request()->path()) ? 'active' : '' }} dropdown-toggle" href="#navbar-form" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false">
                                <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler.io/icons/icon/home -->
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-users">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M9 7m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0" />
                                        <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
                                        <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                                        <path d="M21 21v-2a4 4 0 0 0 -3 -3.85" />
                                    </svg>
                                </span>
                                <span class="nav-link-title"> Master Pengguna </span>
                            </a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item {{ Route::is($spref . 'pengguna.users-*', request()->path()) ? 'active' : '' }}" href="{{ route($spref . 'pengguna.users-render') }}">
                                    Staff
                                </a>
                                <a class="dropdown-item {{ Route::is($spref . 'pengguna.dosen-*', request()->path()) ? 'active' : '' }}" href="{{ route($spref . 'pengguna.dosen-render') }}">
                                    Dosen
                                </a>
                                <a class="dropdown-item {{ Route::is($spref . 'pengguna.mahasiswa-*', request()->path()) ? 'active' : '' }}" href="{{ route($spref . 'pengguna.mahasiswa-render') }}">
                                    Mahasiswa
                                </a>

                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link {{ Route::is($spref . 'publikasi.*', request()->path()) ? 'active' : '' }} dropdown-toggle" href="#navbar-form" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false">
                                <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler.io/icons/icon/home -->
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-news">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M16 6h3a1 1 0 0 1 1 1v11a2 2 0 0 1 -4 0v-13a1 1 0 0 0 -1 -1h-10a1 1 0 0 0 -1 1v12a3 3 0 0 0 3 3h11" />
                                        <path d="M8 8l4 0" />
                                        <path d="M8 12l4 0" />
                                        <path d="M8 16l4 0" />
                                    </svg> </span>
                                <span class="nav-link-title"> Master Publikasi </span>
                            </a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item {{ Route::is($spref . 'publikasi.kategori-*', request()->path()) ? 'active' : '' }}" href="{{ route($spref . 'publikasi.kategori-render') }}">
                                    Kategori
                                </a>
                                <a class="dropdown-item {{ Route::is($spref . 'publikasi.berita-*', request()->path()) ? 'active' : '' }}" href="{{ route($spref . 'publikasi.berita-render') }}">
                                    Berita
                                </a>
                                <a class="dropdown-item {{ Route::is($spref . 'publikasi.pengumuman-*', request()->path()) ? 'active' : '' }}" href="{{ route($spref . 'publikasi.pengumuman-render') }}">
                                    Pengumuman
                                </a>
                                <a class="dropdown-item {{ Route::is($spref . 'publikasi.galeri-*', request()->path()) ? 'active' : '' }}" href="{{ route($spref . 'publikasi.galeri-render') }}">
                                    Galeri
                                </a>

                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link {{ Route::is($spref . 'akademik.*', request()->path()) ? 'active' : '' }} dropdown-toggle" href="#navbar-form" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false">
                                <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler.io/icons/icon/home -->
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-school">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M22 9l-10 -4l-10 4l10 4l10 -4v6" />
                                        <path d="M6 10.6v5.4a6 3 0 0 0 12 0v-5.4" />
                                    </svg>
                                </span>
                                <span class="nav-link-title"> Master Akademik </span>
                            </a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item {{ Route::is($spref . 'akademik.taka-*', request()->path()) ? 'active' : '' }}" href="{{ route($spref . 'akademik.taka-render') }}">
                                    Tahun Akademik
                                </a>
                                <a class="dropdown-item {{ Route::is($spref . 'akademik.fakultas-*', request()->path()) ? 'active' : '' }}" href="{{ route($spref . 'akademik.fakultas-render') }}">
                                    Fakultas
                                </a>
                                <a class="dropdown-item {{ Route::is($spref . 'akademik.prodi-*', request()->path()) ? 'active' : '' }}" href="{{ route($spref . 'akademik.prodi-render') }}">
                                    Program Studi
                                </a>
                                <a class="dropdown-item {{ Route::is($spref . 'akademik.kurikulum-*', request()->path()) ? 'active' : '' }}" href="{{ route($spref . 'akademik.kurikulum-render') }}">
                                    Kurikulum
                                </a>
                                <a class="dropdown-item {{ Route::is($spref . 'akademik.mata-kuliah-*', request()->path()) ? 'active' : '' }}" href="{{ route($spref . 'akademik.mata-kuliah-render') }}">
                                    Mata Kuliah
                                </a>
                                <a class="dropdown-item {{ Route::is($spref . 'akademik.jenis-kelas-*', request()->path()) ? 'active' : '' }}" href="{{ route($spref . 'akademik.jenis-kelas-render') }}">
                                    Jenis Kelas
                                </a>
                                <a class="dropdown-item {{ Route::is($spref . 'akademik.kelas-*', request()->path()) ? 'active' : '' }}" href="{{ route($spref . 'akademik.kelas-render') }}">
                                    Kelas
                                </a>
                                <a class="dropdown-item {{ Route::is($spref . 'akademik.waktu-kuliah-*', request()->path()) ? 'active' : '' }}" href="{{ route($spref . 'akademik.waktu-kuliah-render') }}">
                                    Waktu Kuliah
                                </a>
                                <a class="dropdown-item {{ Route::is($spref . 'akademik.jadwal-kuliah-*', request()->path()) ? 'active' : '' }}" href="{{ route($spref . 'akademik.jadwal-kuliah-render') }}">
                                    Jadwal Kuliah
                                </a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link {{ Route::is($spref . 'pmb.*', request()->path()) ? 'active' : '' }} dropdown-toggle" href="#navbar-form" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false">
                                <span class="nav-link-icon d-md-none d-lg-inline-block">
                                <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-settings-plus"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12.483 20.935c-.862 .239 -1.898 -.178 -2.158 -1.252a1.724 1.724 0 0 0 -2.573 -1.066c-1.543 .94 -3.31 -.826 -2.37 -2.37a1.724 1.724 0 0 0 -1.065 -2.572c-1.756 -.426 -1.756 -2.924 0 -3.35a1.724 1.724 0 0 0 1.066 -2.573c-.94 -1.543 .826 -3.31 2.37 -2.37c1 .608 2.296 .07 2.572 -1.065c.426 -1.756 2.924 -1.756 3.35 0a1.724 1.724 0 0 0 2.573 1.066c1.543 -.94 3.31 .826 2.37 2.37a1.724 1.724 0 0 0 1.065 2.572c1.08 .262 1.496 1.308 1.247 2.173" /><path d="M16 19h6" /><path d="M19 16v6" /><path d="M9 12a3 3 0 1 0 6 0a3 3 0 0 0 -6 0" /></svg>
                                </span>
                                <span class="nav-link-title"> Master PMB </span>
                            </a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item {{ Route::is($spref . 'pmb.periode-*', request()->path()) ? 'active' : '' }}" href="{{ route($spref . 'pmb.periode-render') }}">
                                    Periode Pendaftaran
                                </a>
                                <a class="dropdown-item {{ Route::is($spref . 'pmb.jalur-*', request()->path()) ? 'active' : '' }}" href="{{ route($spref . 'pmb.jalur-render') }}">
                                    Jalur Pendaftaran
                                </a>
                                <a class="dropdown-item {{ Route::is($spref . 'pmb.biaya-*', request()->path()) ? 'active' : '' }}" href="{{ route($spref . 'pmb.biaya-render') }}">
                                    Biaya Pendaftaran
                                </a>
                                <a class="dropdown-item {{ Route::is($spref . 'pmb.syarat-*', request()->path()) ? 'active' : '' }}" href="{{ route($spref . 'pmb.syarat-render') }}">
                                    Syarat Pendaftaran
                                </a>
                                <a class="dropdown-item {{ Route::is($spref . 'pmb.gelombang-*', request()->path()) ? 'active' : '' }}" href="{{ route($spref . 'pmb.gelombang-render') }}">
                                    Gelombang
                                </a>
                                <a class="dropdown-item {{ Route::is($spref . 'pmb.jadwal-*', request()->path()) ? 'active' : '' }}" href="{{ route($spref . 'pmb.jadwal-render') }}">
                                    Jadwal PMB
                                </a>
                                <a class="dropdown-item {{ Route::is($spref . 'pmb.pendaftar-*', request()->path()) ? 'active' : '' }}" href="{{ route($spref . 'pmb.pendaftar-render') }}">
                                    Calon Mahasiswa
                                </a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link {{ Route::is($spref . 'keuangan.*', request()->path()) ? 'active' : '' }} dropdown-toggle" href="#navbar-form" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false">
                                <span class="nav-link-icon d-md-none d-lg-inline-block">
                                <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-adjustments-dollar"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 10a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" /><path d="M6 4v4" /><path d="M6 12v8" /><path d="M13.366 14.54a2 2 0 1 0 -.216 3.097" /><path d="M12 4v10" /><path d="M12 18v2" /><path d="M16 7a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" /><path d="M18 4v1" /><path d="M18 9v1" /><path d="M21 15h-2.5a1.5 1.5 0 0 0 0 3h1a1.5 1.5 0 0 1 0 3h-2.5" /><path d="M19 21v1m0 -8v1" /></svg>                                </span>
                                <span class="nav-link-title"> Master Keuangan </span>
                            </a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item {{ Route::is($spref . 'keuangan.saldo-*', request()->path()) ? 'active' : '' }}" href="{{ route($spref . 'keuangan.saldo-render') }}">
                                    Saldo
                                    <span class="badge badge-sm bg-green-lt text-uppercase ms-auto">New</span>
                                </a>
                                <a class="dropdown-item {{ Route::is($spref . 'keuangan.tagihan-kuliah-group-*', request()->path()) ? 'active' : '' }}" href="{{ route($spref . 'keuangan.tagihan-kuliah-group-render') }}">
                                    Tagihan Kuliah
                                    <span class="badge badge-sm bg-green-lt text-uppercase ms-auto">New</span>
                                </a>
       
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link {{ Route::is($spref . 'infrastruktur.*', request()->path()) ? 'active' : '' }} dropdown-toggle" href="#navbar-form" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false">
                                <span class="nav-link-icon d-md-none d-lg-inline-block">
                                <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-building"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M3 21l18 0" /><path d="M9 8l1 0" /><path d="M9 12l1 0" /><path d="M9 16l1 0" /><path d="M14 8l1 0" /><path d="M14 12l1 0" /><path d="M14 16l1 0" /><path d="M5 21v-16a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2v16" /></svg>
                                </span>
                                <span class="nav-link-title"> Master Infrastruktur </span>
                            </a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item {{ Route::is($spref . 'infrastruktur.gedung-*', request()->path()) ? 'active' : '' }}" href="{{ route($spref . 'infrastruktur.gedung-render') }}">
                                    Gedung
                                </a>
                                <a class="dropdown-item {{ Route::is($spref . 'infrastruktur.ruang-*', request()->path()) ? 'active' : '' }}" href="{{ route($spref . 'infrastruktur.ruang-render') }}">
                                    Ruang
                                </a>
                                <a class="dropdown-item {{ Route::is($spref . 'infrastruktur.kategori-barang-*', request()->path()) ? 'active' : '' }}" href="{{ route($spref . 'infrastruktur.kategori-barang-render') }}">
                                    Kategori Barang
                                </a>
                                <a class="dropdown-item {{ Route::is($spref . 'infrastruktur.barang-*', request()->path()) ? 'active' : '' }}" href="{{ route($spref . 'infrastruktur.barang-render') }}">
                                    Barang
                                </a>
                                <a class="dropdown-item {{ Route::is($spref . 'infrastruktur.mutasi-barang-*', request()->path()) ? 'active' : '' }}" href="{{ route($spref . 'infrastruktur.mutasi-barang-render') }}">
                                    Mutasi Barang
                                </a>
                                <a class="dropdown-item {{ Route::is($spref . 'infrastruktur.pengadaan-barang-*', request()->path()) ? 'active' : '' }}" href="{{ route($spref . 'infrastruktur.pengadaan-barang-render') }}">
                                    Pengadaan Barang
                                </a>
                                <a class="dropdown-item {{ Route::is($spref . 'infrastruktur.inventaris-barang-*', request()->path()) ? 'active' : '' }}" href="{{ route($spref . 'infrastruktur.inventaris-barang-render') }}">
                                    Inventaris Barang
                                </a>
                            </div>
                        </li>

                        <li class="nav-item">
                            <span class="nav-link" href="">
                                <span class="nav-link-title"> Pengaturan </span>
                            </span>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link {{ Route::is($spref . 'pengaturan.*', request()->path()) ? 'active' : '' }} dropdown-toggle" href="#navbar-form" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false">
                                <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler.io/icons/icon/home -->
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-settings">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M10.325 4.317c.426 -1.756 2.924 -1.756 3.35 0a1.724 1.724 0 0 0 2.573 1.066c1.543 -.94 3.31 .826 2.37 2.37a1.724 1.724 0 0 0 1.065 2.572c1.756 .426 1.756 2.924 0 3.35a1.724 1.724 0 0 0 -1.066 2.573c.94 1.543 -.826 3.31 -2.37 2.37a1.724 1.724 0 0 0 -2.572 1.065c-.426 1.756 -2.924 1.756 -3.35 0a1.724 1.724 0 0 0 -2.573 -1.066c-1.543 .94 -3.31 -.826 -2.37 -2.37a1.724 1.724 0 0 0 -1.065 -2.572c-1.756 -.426 -1.756 -2.924 0 -3.35a1.724 1.724 0 0 0 1.066 -2.573c-.94 -1.543 .826 -3.31 2.37 -2.37c1 .608 2.296 .07 2.572 -1.065z" />
                                        <path d="M9 12a3 3 0 1 0 6 0a3 3 0 0 0 -6 0" />
                                    </svg>
                                </span>
                                <span class="nav-link-title"> Pengaturan </span>
                            </a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item {{ Route::is($spref . 'pengaturan.log-aktivitas-*', request()->path()) ? 'active' : '' }}" href="{{ route($spref . 'pengaturan.log-aktivitas-render') }}">
                                    Log Aktivitas
                                </a>
                                <a class="dropdown-item {{ Route::is($spref . 'pengaturan.web-settings-*', request()->path()) ? 'active' : '' }}" href="{{ route($spref . 'pengaturan.web-settings-render') }}">
                                    Pengaturan Web
                                </a>

                            </div>
                        </li>

                    </ul>
                    <!-- END NAVBAR MENU -->
                </div>
            </div>
        </aside>
        <!--  END SIDEBAR  -->
        <!-- BEGIN NAVBAR  -->
        <header class="navbar navbar-expand-md d-none d-lg-flex d-print-none">
            <div class="container-xl">
                <!-- BEGIN NAVBAR TOGGLER -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu" aria-controls="navbar-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <!-- END NAVBAR TOGGLER -->
                <div class="navbar-nav flex-row order-md-last">
                    <div class="d-none d-md-flex">
                        <div class="nav-item">
                            <a href="?theme=dark" class="nav-link px-0 hide-theme-dark" title="Enable dark mode" data-bs-toggle="tooltip" data-bs-placement="bottom">
                                <!-- Download SVG icon from http://tabler.io/icons/icon/moon -->
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-1">
                                    <path d="M12 3c.132 0 .263 0 .393 0a7.5 7.5 0 0 0 7.92 12.446a9 9 0 1 1 -8.313 -12.454z" />
                                </svg>
                            </a>
                            <a href="?theme=light" class="nav-link px-0 hide-theme-light" title="Enable light mode" data-bs-toggle="tooltip" data-bs-placement="bottom">
                                <!-- Download SVG icon from http://tabler.io/icons/icon/sun -->
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-1">
                                    <path d="M12 12m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0" />
                                    <path d="M3 12h1m8 -9v1m8 8h1m-9 8v1m-6.4 -15.4l.7 .7m12.1 -.7l-.7 .7m0 11.4l.7 .7m-12.1 -.7l-.7 .7" />
                                </svg>
                            </a>
                        </div>
                        <div class="nav-item dropdown d-none d-md-flex">
                            <a href="#" class="nav-link px-0" data-bs-toggle="dropdown" tabindex="-1" aria-label="Show notifications" data-bs-auto-close="outside" aria-expanded="false">
                                <!-- Download SVG icon from http://tabler.io/icons/icon/bell -->
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-1">
                                    <path d="M10 5a2 2 0 1 1 4 0a7 7 0 0 1 4 6v3a4 4 0 0 0 2 3h-16a4 4 0 0 0 2 -3v-3a7 7 0 0 1 4 -6" />
                                    <path d="M9 17v1a3 3 0 0 0 6 0v-1" />
                                </svg>
                                <span class="badge bg-red"></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-end dropdown-menu-card">
                                <div class="card">
                                    <div class="card-header d-flex">
                                        <h3 class="card-title">Notifications</h3>
                                        <div class="btn-close ms-auto" data-bs-dismiss="dropdown"></div>
                                    </div>
                                    <div class="list-group list-group-flush list-group-hoverable">
                                        <div class="list-group-item">
                                            <div class="row align-items-center">
                                                <div class="col-auto"><span class="status-dot status-dot-animated bg-red d-block"></span>
                                                </div>
                                                <div class="col text-truncate">
                                                    <a href="#" class="text-body d-block">Pengumuman: Jadwal UTS</a>
                                                    <div class="d-block text-secondary text-truncate mt-n1">Jadwal UTS Semester Ganjil 2023/2024 telah dirilis</div>
                                                </div>
                                                <div class="col-auto">
                                                    <a href="#" class="list-group-item-actions">
                                                        <!-- Download SVG icon from http://tabler.io/icons/icon/star -->
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon text-muted icon-2">
                                                            <path d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z" />
                                                        </svg>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="list-group-item">
                                            <div class="row align-items-center">
                                                <div class="col-auto"><span class="status-dot d-block"></span></div>
                                                <div class="col text-truncate">
                                                    <a href="#" class="text-body d-block">Info: Pembayaran UKT</a>
                                                    <div class="d-block text-secondary text-truncate mt-n1">Pengingat: Batas akhir pembayaran UKT tanggal 30 September 2023</div>
                                                </div>
                                                <div class="col-auto">
                                                    <a href="#" class="list-group-item-actions show">
                                                        <!-- Download SVG icon from http://tabler.io/icons/icon/star -->
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon text-yellow icon-2">
                                                            <path d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z" />
                                                        </svg>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="list-group-item">
                                            <div class="row align-items-center">
                                                <div class="col-auto"><span class="status-dot d-block"></span></div>
                                                <div class="col text-truncate">
                                                    <a href="#" class="text-body d-block">Akademik: KRS</a>
                                                    <div class="d-block text-secondary text-truncate mt-n1">Pengisian KRS akan dibuka pada tanggal 15 September 2023</div>
                                                </div>
                                                <div class="col-auto">
                                                    <a href="#" class="list-group-item-actions">
                                                        <!-- Download SVG icon from http://tabler.io/icons/icon/star -->
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon text-muted icon-2">
                                                            <path d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z" />
                                                        </svg>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="list-group-item">
                                            <div class="row align-items-center">
                                                <div class="col-auto"><span class="status-dot status-dot-animated bg-green d-block"></span>
                                                </div>
                                                <div class="col text-truncate">
                                                    <a href="#" class="text-body d-block">Info: Beasiswa</a>
                                                    <div class="d-block text-secondary text-truncate mt-n1">Pendaftaran beasiswa prestasi telah dibuka</div>
                                                </div>
                                                <div class="col-auto">
                                                    <a href="#" class="list-group-item-actions">
                                                        <!-- Download SVG icon from http://tabler.io/icons/icon/star -->
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon text-muted icon-2">
                                                            <path d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z" />
                                                        </svg>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col">
                                                <a href="#" class="btn btn-2 w-100"> Archive all </a>
                                            </div>
                                            <div class="col">
                                                <a href="#" class="btn btn-2 w-100"> Mark all as read </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="nav-item dropdown d-none d-md-flex me-3">
                            <a href="#" class="nav-link px-0" data-bs-toggle="dropdown" tabindex="-1" aria-label="Show app menu" data-bs-auto-close="outside" aria-expanded="false">
                                <!-- Download SVG icon from http://tabler.io/icons/icon/apps -->
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-1">
                                    <path d="M4 4m0 1a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v4a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1z" />
                                    <path d="M4 14m0 1a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v4a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1z" />
                                    <path d="M14 14m0 1a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v4a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1z" />
                                    <path d="M14 7l6 0" />
                                    <path d="M17 4l0 6" />
                                </svg>
                            </a>
                            <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-end dropdown-menu-card">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="card-title">Aplikasi Kampus</div>
                                        <div class="card-actions btn-actions">
                                            <a href="#" class="btn-action">
                                                <!-- Download SVG icon from http://tabler.io/icons/icon/settings -->
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-1">
                                                    <path d="M10.325 4.317c.426 -1.756 2.924 -1.756 3.35 0a1.724 1.724 0 0 0 2.573 1.066c1.543 -.94 3.31 .826 2.37 2.37a1.724 1.724 0 0 0 1.065 2.572c1.756 .426 1.756 2.924 0 3.35a1.724 1.724 0 0 0 -1.066 2.573c.94 1.543 -.826 3.31 -2.37 2.37a1.724 1.724 0 0 0 -2.572 1.065c-.426 1.756 -2.924 1.756 -3.35 0a1.724 1.724 0 0 0 -2.573 -1.066c-1.543 .94 -3.31 -.826 -2.37 -2.37a1.724 1.724 0 0 0 -1.065 -2.572c-1.756 -.426 -1.756 -2.924 0 -3.35a1.724 1.724 0 0 0 1.066 -2.573c-.94 -1.543 .826 -3.31 2.37 -2.37c1 .608 2.296 .07 2.572 -1.065z" />
                                                    <path d="M9 12a3 3 0 1 0 6 0a3 3 0 0 0 -6 0" />
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="card-body scroll-y p-2" style="max-height: 50vh">
                                        <div class="row g-0">
                                            <div class="col-4">
                                                <a href="/siakad" class="d-flex flex-column flex-center text-center text-secondary py-2 px-2 link-hoverable">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-school w-6 h-6 mx-auto mb-2" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                        <path d="M22 9l-10 -4l-10 4l10 4l10 -4v6" />
                                                        <path d="M6 10.6v5.4a6 3 0 0 0 12 0v-5.4" />
                                                    </svg>
                                                    <span class="h5">SIAKAD</span>
                                                </a>
                                            </div>
                                            <div class="col-4">
                                                <a href="/e-learning" class="d-flex flex-column flex-center text-center text-secondary py-2 px-2 link-hoverable">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-device-laptop w-6 h-6 mx-auto mb-2" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                        <path d="M3 19l18 0" />
                                                        <path d="M5 6m0 1a1 1 0 0 1 1 -1h12a1 1 0 0 1 1 1v8a1 1 0 0 1 -1 1h-12a1 1 0 0 1 -1 -1z" />
                                                    </svg>
                                                    <span class="h5">E-Learning</span>
                                                </a>
                                            </div>
                                            <div class="col-4">
                                                <a href="/perpustakaan" class="d-flex flex-column flex-center text-center text-secondary py-2 px-2 link-hoverable">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-books w-6 h-6 mx-auto mb-2" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                        <path d="M5 4m0 1a1 1 0 0 1 1 -1h2a1 1 0 0 1 1 1v14a1 1 0 0 1 -1 1h-2a1 1 0 0 1 -1 -1z" />
                                                        <path d="M9 4m0 1a1 1 0 0 1 1 -1h2a1 1 0 0 1 1 1v14a1 1 0 0 1 -1 1h-2a1 1 0 0 1 -1 -1z" />
                                                        <path d="M5 8h4" />
                                                        <path d="M9 16h4" />
                                                        <path d="M13.803 4.56l2.184 -.53c.562 -.135 1.133 .19 1.282 .732l3.695 13.418a1.02 1.02 0 0 1 -.634 1.219l-.133 .041l-2.184 .53c-.562 .135 -1.133 -.19 -1.282 -.732l-3.695 -13.418a1.02 1.02 0 0 1 .634 -1.219l.133 -.041z" />
                                                        <path d="M14 9l4 -1" />
                                                        <path d="M16 16l3.923 -.98" />
                                                    </svg>
                                                    <span class="h5">Perpustakaan</span>
                                                </a>
                                            </div>
                                            <div class="col-4">
                                                <a href="/laboratorium" class="d-flex flex-column flex-center text-center text-secondary py-2 px-2 link-hoverable">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-test-pipe w-6 h-6 mx-auto mb-2" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                        <path d="M20 8.04l-12.122 12.124a2.857 2.857 0 1 1 -4.041 -4.04l12.122 -12.124" />
                                                        <path d="M7 13h8" />
                                                        <path d="M19 15l1.5 1.6a2 2 0 1 1 -3 0l1.5 -1.6z" />
                                                        <path d="M15 3l6 6" />
                                                    </svg>
                                                    <span class="h5">Laboratorium</span>
                                                </a>
                                            </div>
                                            <div class="col-4">
                                                <a href="/kemahasiswaan" class="d-flex flex-column flex-center text-center text-secondary py-2 px-2 link-hoverable">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-users w-6 h-6 mx-auto mb-2" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                        <path d="M9 7m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0" />
                                                        <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
                                                        <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                                                        <path d="M21 21v-2a4 4 0 0 0 -3 -3.85" />
                                                    </svg>
                                                    <span class="h5">Kemahasiswaan</span>
                                                </a>
                                            </div>
                                            <div class="col-4">
                                                <a href="/keuangan" class="d-flex flex-column flex-center text-center text-secondary py-2 px-2 link-hoverable">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-wallet w-6 h-6 mx-auto mb-2" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                        <path d="M17 8v-3a1 1 0 0 0 -1 -1h-10a2 2 0 0 0 0 4h12a1 1 0 0 1 1 1v3m0 4v3a1 1 0 0 1 -1 1h-12a2 2 0 0 1 -2 -2v-12" />
                                                        <path d="M20 12v4h-4a2 2 0 0 1 0 -4h4" />
                                                    </svg>
                                                    <span class="h5">Keuangan</span>
                                                </a>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link d-flex lh-1 p-0 px-2" data-bs-toggle="dropdown" aria-label="Open user menu">
                            <span class="avatar avatar-sm" style="background-image: url({{ $user == null ? '' : $user->photo }})"> </span>
                            <div class="d-none d-xl-block ps-2">
                                <div>{{ $user == null ? 'Guest Name' : $user->name }}</div>
                                <div class="mt-1 small text-secondary">{{ $user == null ? 'Guest Position' : $user->type }}</div>
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                            <a href="#" class="dropdown-item">Status</a>
                            <a href="{{ route($spref . 'profile-render') }}" class="dropdown-item">Profile</a>
                            <a href="#" class="dropdown-item">Feedback</a>
                            <div class="dropdown-divider"></div>
                            <a href="./settings.html" class="dropdown-item">Settings</a>
                            <a href="{{ route($spref . 'handle-logout') }}" class="dropdown-item">Logout</a>
                        </div>
                    </div>
                </div>
                <div class="collapse navbar-collapse" id="navbar-menu">
                    <!-- BEGIN NAVBAR MENU -->
                    <ul class="navbar-nav">


                        <select class="form-select form-select-sm form-select-navbar" aria-label="Select theme">
                            <option value="" selected>Pilih tahun akademik</option>
                            <option value="light">Light</option>
                            <option value="dark">Dark</option>
                        </select>
                    </ul>
                    <!-- END NAVBAR MENU -->
                </div>
            </div>
        </header>
        <!-- END NAVBAR  -->
        <div class="page-wrapper">
            <!-- BEGIN PAGE HEADER -->
            <div class="page-header d-print-none" aria-label="Page header">
                <div class="container-xl">
                    <div class="row g-2 align-items-center">
                        <div class="col">
                            <!-- Page pre-title -->
                            <div class="page-pretitle">{{ $menus }}</div>
                            <h2 class="page-title">{{ $pages }}</h2>
                        </div>
                        <!-- Page title actions -->
                        <div class="col-auto ms-auto d-print-none">
                            <div class="btn-list">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END PAGE HEADER -->
            <!-- BEGIN PAGE BODY -->
            <div class="page-body">
                <div class="container-xl">
                    @include('core-themes.components.alerts')
                    @yield('content')
                    @include('sweetalert::alert')
                </div>
            </div>
            <!-- END PAGE BODY -->
            <!--  BEGIN FOOTER  -->
            <footer class="footer footer-transparent d-print-none">
                <div class="container-xl">
                    <div class="row text-center align-items-center flex-row-reverse">
                        <div class="col-lg-auto ms-lg-auto">
                            <ul class="list-inline list-inline-dots mb-0">
                                <li class="list-inline-item"><a href="https://docs.tabler.io" target="_blank" class="link-secondary" rel="noopener">Documentation</a></li>
                                <li class="list-inline-item"><a href="./license.html" class="link-secondary">License</a></li>
                                <li class="list-inline-item">
                                    <a href="https://github.com/tabler/tabler" target="_blank" class="link-secondary" rel="noopener">Source code</a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="https://github.com/sponsors/codecalm" target="_blank" class="link-secondary" rel="noopener">
                                        <!-- Download SVG icon from http://tabler.io/icons/icon/heart -->
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon text-pink icon-inline icon-4">
                                            <path d="M19.5 12.572l-7.5 7.428l-7.5 -7.428a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572" />
                                        </svg>
                                        Sponsor
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-12 col-lg-auto mt-3 mt-lg-0">
                            <ul class="list-inline list-inline-dots mb-0">
                                <li class="list-inline-item">
                                    Copyright &copy; {{ \Carbon\Carbon::now()->translatedFormat('F Y') }}
                                    <a href="." class="link-secondary">{{ $academy }}</a>. All rights reserved.
                                </li>
                                <li class="list-inline-item">
                                    <a href="./changelog.html" class="link-secondary" rel="noopener">Tabler v1.2.0 </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </footer>
            <!--  END FOOTER  -->
        </div>
    </div>

    <div class="settings">
        <a href="#" class="btn btn-floating btn-icon btn-primary" data-bs-toggle="offcanvas" data-bs-target="#offcanvasSettings" aria-controls="offcanvasSettings" aria-label="Theme Builder">
            <!-- Download SVG icon from http://tabler.io/icons/icon/brush -->
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-1">
                <path d="M3 21v-4a4 4 0 1 1 4 4h-4" />
                <path d="M21 3a16 16 0 0 0 -12.8 10.2" />
                <path d="M21 3a16 16 0 0 1 -10.2 12.8" />
                <path d="M10.6 9a9 9 0 0 1 4.4 4.4" />
            </svg>
        </a>
        <form class="offcanvas offcanvas-start offcanvas-narrow" tabindex="-1" id="offcanvasSettings">
            <div class="offcanvas-header">
                <h2 class="offcanvas-title">Theme Builder</h2>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body d-flex flex-column">
                <div>
                    <div class="mb-4">
                        <label class="form-label">Color mode</label>
                        <p class="form-hint">Choose the color mode for your app.</p>
                        <label class="form-check">
                            <div class="form-selectgroup-item">
                                <input type="radio" name="theme" value="light" class="form-check-input" checked />
                                <div class="form-check-label">Light</div>
                            </div>
                        </label>
                        <label class="form-check">
                            <div class="form-selectgroup-item">
                                <input type="radio" name="theme" value="dark" class="form-check-input" />
                                <div class="form-check-label">Dark</div>
                            </div>
                        </label>
                    </div>
                    <div class="mb-4">
                        <label class="form-label">Color scheme</label>
                        <p class="form-hint">The perfect color mode for your app.</p>
                        <div class="row g-2">
                            <div class="col-auto">
                                <label class="form-colorinput">
                                    <input name="theme-primary" type="radio" value="blue" class="form-colorinput-input" />
                                    <span class="form-colorinput-color bg-blue"></span>
                                </label>
                            </div>
                            <div class="col-auto">
                                <label class="form-colorinput">
                                    <input name="theme-primary" type="radio" value="azure" class="form-colorinput-input" />
                                    <span class="form-colorinput-color bg-azure"></span>
                                </label>
                            </div>
                            <div class="col-auto">
                                <label class="form-colorinput">
                                    <input name="theme-primary" type="radio" value="indigo" class="form-colorinput-input" />
                                    <span class="form-colorinput-color bg-indigo"></span>
                                </label>
                            </div>
                            <div class="col-auto">
                                <label class="form-colorinput">
                                    <input name="theme-primary" type="radio" value="purple" class="form-colorinput-input" />
                                    <span class="form-colorinput-color bg-purple"></span>
                                </label>
                            </div>
                            <div class="col-auto">
                                <label class="form-colorinput">
                                    <input name="theme-primary" type="radio" value="pink" class="form-colorinput-input" />
                                    <span class="form-colorinput-color bg-pink"></span>
                                </label>
                            </div>
                            <div class="col-auto">
                                <label class="form-colorinput">
                                    <input name="theme-primary" type="radio" value="red" class="form-colorinput-input" />
                                    <span class="form-colorinput-color bg-red"></span>
                                </label>
                            </div>
                            <div class="col-auto">
                                <label class="form-colorinput">
                                    <input name="theme-primary" type="radio" value="orange" class="form-colorinput-input" />
                                    <span class="form-colorinput-color bg-orange"></span>
                                </label>
                            </div>
                            <div class="col-auto">
                                <label class="form-colorinput">
                                    <input name="theme-primary" type="radio" value="yellow" class="form-colorinput-input" />
                                    <span class="form-colorinput-color bg-yellow"></span>
                                </label>
                            </div>
                            <div class="col-auto">
                                <label class="form-colorinput">
                                    <input name="theme-primary" type="radio" value="lime" class="form-colorinput-input" />
                                    <span class="form-colorinput-color bg-lime"></span>
                                </label>
                            </div>
                            <div class="col-auto">
                                <label class="form-colorinput">
                                    <input name="theme-primary" type="radio" value="green" class="form-colorinput-input" />
                                    <span class="form-colorinput-color bg-green"></span>
                                </label>
                            </div>
                            <div class="col-auto">
                                <label class="form-colorinput">
                                    <input name="theme-primary" type="radio" value="teal" class="form-colorinput-input" />
                                    <span class="form-colorinput-color bg-teal"></span>
                                </label>
                            </div>
                            <div class="col-auto">
                                <label class="form-colorinput">
                                    <input name="theme-primary" type="radio" value="cyan" class="form-colorinput-input" />
                                    <span class="form-colorinput-color bg-cyan"></span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="mb-4">
                        <label class="form-label">Font family</label>
                        <p class="form-hint">Choose the font family that fits your app.</p>
                        <div>
                            <label class="form-check">
                                <div class="form-selectgroup-item">
                                    <input type="radio" name="theme-font" value="sans-serif" class="form-check-input" checked />
                                    <div class="form-check-label">Sans-serif</div>
                                </div>
                            </label>
                            <label class="form-check">
                                <div class="form-selectgroup-item">
                                    <input type="radio" name="theme-font" value="serif" class="form-check-input" />
                                    <div class="form-check-label">Serif</div>
                                </div>
                            </label>
                            <label class="form-check">
                                <div class="form-selectgroup-item">
                                    <input type="radio" name="theme-font" value="monospace" class="form-check-input" />
                                    <div class="form-check-label">Monospace</div>
                                </div>
                            </label>
                            <label class="form-check">
                                <div class="form-selectgroup-item">
                                    <input type="radio" name="theme-font" value="comic" class="form-check-input" />
                                    <div class="form-check-label">Comic</div>
                                </div>
                            </label>
                        </div>
                    </div>
                    <div class="mb-4">
                        <label class="form-label">Theme base</label>
                        <p class="form-hint">Choose the gray shade for your app.</p>
                        <div>
                            <label class="form-check">
                                <div class="form-selectgroup-item">
                                    <input type="radio" name="theme-base" value="slate" class="form-check-input" />
                                    <div class="form-check-label">Slate</div>
                                </div>
                            </label>
                            <label class="form-check">
                                <div class="form-selectgroup-item">
                                    <input type="radio" name="theme-base" value="gray" class="form-check-input" checked />
                                    <div class="form-check-label">Gray</div>
                                </div>
                            </label>
                            <label class="form-check">
                                <div class="form-selectgroup-item">
                                    <input type="radio" name="theme-base" value="zinc" class="form-check-input" />
                                    <div class="form-check-label">Zinc</div>
                                </div>
                            </label>
                            <label class="form-check">
                                <div class="form-selectgroup-item">
                                    <input type="radio" name="theme-base" value="neutral" class="form-check-input" />
                                    <div class="form-check-label">Neutral</div>
                                </div>
                            </label>
                            <label class="form-check">
                                <div class="form-selectgroup-item">
                                    <input type="radio" name="theme-base" value="stone" class="form-check-input" />
                                    <div class="form-check-label">Stone</div>
                                </div>
                            </label>
                        </div>
                    </div>
                    <div class="mb-4">
                        <label class="form-label">Corner Radius</label>
                        <p class="form-hint">Choose the border radius factor for your app.</p>
                        <div>
                            <label class="form-check">
                                <div class="form-selectgroup-item">
                                    <input type="radio" name="theme-radius" value="0" class="form-check-input" />
                                    <div class="form-check-label">0</div>
                                </div>
                            </label>
                            <label class="form-check">
                                <div class="form-selectgroup-item">
                                    <input type="radio" name="theme-radius" value="0.5" class="form-check-input" />
                                    <div class="form-check-label">0.5</div>
                                </div>
                            </label>
                            <label class="form-check">
                                <div class="form-selectgroup-item">
                                    <input type="radio" name="theme-radius" value="1" class="form-check-input" checked />
                                    <div class="form-check-label">1</div>
                                </div>
                            </label>
                            <label class="form-check">
                                <div class="form-selectgroup-item">
                                    <input type="radio" name="theme-radius" value="1.5" class="form-check-input" />
                                    <div class="form-check-label">1.5</div>
                                </div>
                            </label>
                            <label class="form-check">
                                <div class="form-selectgroup-item">
                                    <input type="radio" name="theme-radius" value="2" class="form-check-input" />
                                    <div class="form-check-label">2</div>
                                </div>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="mt-auto space-y">
                    <button type="button" class="btn w-100" id="reset-changes">
                        <!-- Download SVG icon from http://tabler.io/icons/icon/rotate -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-1">
                            <path d="M19.95 11a8 8 0 1 0 -.5 4m.5 5v-5h-5" />
                        </svg>
                        Reset changes
                    </button>
                    <a href="#" class="btn btn-primary w-100" data-bs-dismiss="offcanvas">
                        <!-- Download SVG icon from http://tabler.io/icons/icon/settings -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-1">
                            <path d="M10.325 4.317c.426 -1.756 2.924 -1.756 3.35 0a1.724 1.724 0 0 0 2.573 1.066c1.543 -.94 3.31 .826 2.37 2.37a1.724 1.724 0 0 0 1.065 2.572c1.756 .426 1.756 2.924 0 3.35a1.724 1.724 0 0 0 -1.066 2.573c.94 1.543 -.826 3.31 -2.37 2.37a1.724 1.724 0 0 0 -2.572 1.065c-.426 1.756 -2.924 1.756 -3.35 0a1.724 1.724 0 0 0 -2.573 -1.066c-1.543 .94 -3.31 -.826 -2.37 -2.37a1.724 1.724 0 0 0 -1.065 -2.572c-1.756 -.426 -1.756 -2.924 0 -3.35a1.724 1.724 0 0 0 1.066 -2.573c-.94 -1.543 .826 -3.31 2.37 -2.37c1 .608 2.296 .07 2.572 -1.065z" />
                            <path d="M9 12a3 3 0 1 0 6 0a3 3 0 0 0 -6 0" />
                        </svg>
                        Save settings
                    </a>
                </div>
            </div>
        </form>
    </div>
    <!-- BEGIN PAGE LIBRARIES -->
    @RegisterServiceWorkerScript
    <script src="{{ asset('dashboard') }}/libs/apexcharts/dist/apexcharts.min.js?1747482948" defer></script>
    <script src="{{ asset('dashboard') }}/libs/jsvectormap/dist/jsvectormap.min.js?1747482948" defer></script>
    <script src="{{ asset('dashboard') }}/libs/jsvectormap/dist/maps/world.js?1747482948" defer></script>
    <script src="{{ asset('dashboard') }}/libs/jsvectormap/dist/maps/world-merc.js?1747482948" defer></script>
    <!-- END PAGE LIBRARIES -->
    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="{{ asset('dashboard') }}/dist/js/tabler.min.js?1747482948" defer></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->
    <!-- BEGIN DEMO SCRIPTS -->
    <script src="./preview/js/demo.min.js?1747482948" defer></script>
    <!-- END DEMO SCRIPTS -->
    <!-- BEGIN PAGE SCRIPTS -->
    @yield('custom-js')
    <!-- END PAGE SCRIPTS -->
</body>

</html>
