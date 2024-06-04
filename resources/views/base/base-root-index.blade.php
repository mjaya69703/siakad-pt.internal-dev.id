<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>{{ $menu . $title }}</title>



        <link rel="shortcut icon" href="{{ asset('dist') }}/assets/compiled/svg/favicon.svg" type="image/x-icon">
        <link rel="shortcut icon"
            href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACEAAAAiCAYAAADRcLDBAAAEs2lUWHRYTUw6Y29tLmFkb2JlLnhtcAAAAAAAPD94cGFja2V0IGJlZ2luPSLvu78iIGlkPSJXNU0wTXBDZWhpSHpyZVN6TlRjemtjOWQiPz4KPHg6eG1wbWV0YSB4bWxuczp4PSJhZG9iZTpuczptZXRhLyIgeDp4bXB0az0iWE1QIENvcmUgNS41LjAiPgogPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4KICA8cmRmOkRlc2NyaXB0aW9uIHJkZjphYm91dD0iIgogICAgeG1sbnM6ZXhpZj0iaHR0cDovL25zLmFkb2JlLmNvbS9leGlmLzEuMC8iCiAgICB4bWxuczp0aWZmPSJodHRwOi8vbnMuYWRvYmUuY29tL3RpZmYvMS4wLyIKICAgIHhtbG5zOnBob3Rvc2hvcD0iaHR0cDovL25zLmFkb2JlLmNvbS9waG90b3Nob3AvMS4wLyIKICAgIHhtbG5zOnhtcD0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wLyIKICAgIHhtbG5zOnhtcE1NPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvbW0vIgogICAgeG1sbnM6c3RFdnQ9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZUV2ZW50IyIKICAgZXhpZjpQaXhlbFhEaW1lbnNpb249IjMzIgogICBleGlmOlBpeGVsWURpbWVuc2lvbj0iMzQiCiAgIGV4aWY6Q29sb3JTcGFjZT0iMSIKICAgdGlmZjpJbWFnZVdpZHRoPSIzMyIKICAgdGlmZjpJbWFnZUxlbmd0aD0iMzQiCiAgIHRpZmY6UmVzb2x1dGlvblVuaXQ9IjIiCiAgIHRpZmY6WFJlc29sdXRpb249Ijk2LjAiCiAgIHRpZmY6WVJlc29sdXRpb249Ijk2LjAiCiAgIHBob3Rvc2hvcDpDb2xvck1vZGU9IjMiCiAgIHBob3Rvc2hvcDpJQ0NQcm9maWxlPSJzUkdCIElFQzYxOTY2LTIuMSIKICAgeG1wOk1vZGlmeURhdGU9IjIwMjItMDMtMzFUMTA6NTA6MjMrMDI6MDAiCiAgIHhtcDpNZXRhZGF0YURhdGU9IjIwMjItMDMtMzFUMTA6NTA6MjMrMDI6MDAiPgogICA8eG1wTU06SGlzdG9yeT4KICAgIDxyZGY6U2VxPgogICAgIDxyZGY6bGkKICAgICAgc3RFdnQ6YWN0aW9uPSJwcm9kdWNlZCIKICAgICAgc3RFdnQ6c29mdHdhcmVBZ2VudD0iQWZmaW5pdHkgRGVzaWduZXIgMS4xMC4xIgogICAgICBzdEV2dDp3aGVuPSIyMDIyLTAzLTMxVDEwOjUwOjIzKzAyOjAwIi8+CiAgICA8L3JkZjpTZXE+CiAgIDwveG1wTU06SGlzdG9yeT4KICA8L3JkZjpEZXNjcmlwdGlvbj4KIDwvcmRmOlJERj4KPC94OnhtcG1ldGE+Cjw/eHBhY2tldCBlbmQ9InIiPz5V57uAAAABgmlDQ1BzUkdCIElFQzYxOTY2LTIuMQAAKJF1kc8rRFEUxz9maORHo1hYKC9hISNGTWwsRn4VFmOUX5uZZ36oeTOv954kW2WrKLHxa8FfwFZZK0WkZClrYoOe87ypmWTO7dzzud97z+nec8ETzaiaWd4NWtYyIiNhZWZ2TvE946WZSjqoj6mmPjE1HKWkfdxR5sSbgFOr9Ll/rXoxYapQVik8oOqGJTwqPL5i6Q5vCzeo6dii8KlwpyEXFL519LjLLw6nXP5y2IhGBsFTJ6ykijhexGra0ITl5bRqmWU1fx/nJTWJ7PSUxBbxJkwijBBGYYwhBgnRQ7/MIQIE6ZIVJfK7f/MnyUmuKrPOKgZLpEhj0SnqslRPSEyKnpCRYdXp/9++msneoFu9JgwVT7b91ga+LfjetO3PQ9v+PgLvI1xkC/m5A+h7F32zoLXug38dzi4LWnwHzjeg8UGPGbFfySvuSSbh9QRqZ6H+Gqrm3Z7l9zm+h+iafNUV7O5Bu5z3L/wAdthn7QIme0YAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAJTSURBVFiF7Zi9axRBGIefEw2IdxFBRQsLWUTBaywSK4ubdSGVIY1Y6HZql8ZKCGIqwX/AYLmCgVQKfiDn7jZeEQMWfsSAHAiKqPiB5mIgELWYOW5vzc3O7niHhT/YZvY37/swM/vOzJbIqVq9uQ04CYwCI8AhYAlYAB4Dc7HnrOSJWcoJcBS4ARzQ2F4BZ2LPmTeNuykHwEWgkQGAet9QfiMZjUSt3hwD7psGTWgs9pwH1hC1enMYeA7sKwDxBqjGnvNdZzKZjqmCAKh+U1kmEwi3IEBbIsugnY5avTkEtIAtFhBrQCX2nLVehqyRqFoCAAwBh3WGLAhbgCRIYYinwLolwLqKUwwi9pxV4KUlxKKKUwxC6ZElRCPLYAJxGfhSEOCz6m8HEXvOB2CyIMSk6m8HoXQTmMkJcA2YNTHm3congOvATo3tE3A29pxbpnFzQSiQPcB55IFmFNgFfEQeahaAGZMpsIJIAZWAHcDX2HN+2cT6r39GxmvC9aPNwH5gO1BOPFuBVWAZue0vA9+A12EgjPadnhCuH1WAE8ivYAQ4ohKaagV4gvxi5oG7YSA2vApsCOH60WngKrA3R9IsvQUuhIGY00K4flQG7gHH/mLytB4C42EgfrQb0mV7us8AAMeBS8mGNMR4nwHamtBB7B4QRNdaS0M8GxDEog7iyoAguvJ0QYSBuAOcAt71Kfl7wA8DcTvZ2KtOlJEr+ByyQtqqhTyHTIeB+ONeqi3brh+VgIN0fohUgWGggizZFTplu12yW8iy/YLOGWMpDMTPXnl+Az9vj2HERYqPAAAAAElFTkSuQmCC"
            type="image/png">



        <link rel="stylesheet" href="{{ asset('dist') }}/assets/compiled/css/app.css">
        <link rel="stylesheet" href="{{ asset('dist') }}/assets/compiled/css/app-dark.css">
        <link rel="stylesheet" href="{{ asset('dist') }}/assets/compiled/css/iconly.css">
        <link rel="stylesheet" href="{{ asset('dist') }}/assets/custom/css/news-section.css">
        {{-- PLUGIN FONT AWESOME --}}
        <link rel="stylesheet" href="{{ asset('vendor') }}/fontawesome/css/all.min.css" rel="stylesheet">


        <style>
            .fontawesome-icons {
                text-align: center;
            }

            article dl {
                background-color: rgba(0, 0, 0, .02);
                padding: 20px;
            }

            .fontawesome-icons .the-icon {
                font-size: 24px;
                line-height: 1.2;
            }

            .berita img {
                max-width: 125px
            }

            @media screen and (max-width: 767px) {
                .footer {
                    display: flex;
                    flex-direction: column;
                    align-items: center;
                    /* Tulisan menjadi rata tengah secara horizontal */
                }

                .berita img {
                    width: 100%;
                    max-width: none;
                }

                .berita a {
                    text-align: center !important;
                    /* Menambahkan !important agar lebih dominan */
                }

                .berita p {
                    /* text-align: justify; */
                }

            }
        </style>
    </head>

    <body>
        <script src="{{ asset('dist') }}/assets/static/js/initTheme.js"></script>
        <div id="app">
            <div id="main" class="layout-horizontal">
                <header class="mb-5">
                    <div class="header-top">
                        <div class="container">
                            <div class="logo">
                                <a href="{{ route('root.home-index') }}" style="font-size: 24px"> ESEC Academy</a>
                            </div>
                            <div class="header-top-right">

                                <div class="dropdown">
                                    <a href="#" id="topbarUserDropdown" class="user-dropdown d-flex align-items-center dropend dropdown-toggle " data-bs-toggle="dropdown" aria-expanded="false">

                                        @if (Auth::guard('dosen')->check())
                                            <div class="avatar avatar-md2">
                                                <img src="{{ asset('storage/images/' . Auth::guard('dosen')->user()->dsn_image) }}" alt="Avatar">
                                            </div>
                                            <div class="text">

                                                <h6 class="user-dropdown-name">{{ Auth::guard('dosen')->user()->dsn_name }}</h6>
                                                <p class="user-dropdown-status text-sm text-muted">{{ Auth::guard('dosen')->user()->dsn_stat }}</p>
                                            </div>
                                        @elseif(Auth::guard('mahasiswa')->check())
                                            <div class="avatar avatar-md2">
                                                <img src="{{ asset('storage/images/' . Auth::guard('mahasiswa')->user()->mhs_image) }}" alt="Avatar">
                                            </div>
                                            <div class="text">
                                                <h6 class="user-dropdown-name">{{ Auth::guard('mahasiswa')->user()->mhs_name }}</h6>
                                                <p class="user-dropdown-status text-sm text-muted">{{ Auth::guard('mahasiswa')->user()->mhs_stat }}</p>
                                            </div>
                                        @elseif(Auth::check())
                                            <div class="avatar avatar-md2">
                                                <img src="{{ asset('storage/images/' . Auth::user()->image) }}" alt="Avatar">
                                            </div>
                                            <div class="text">

                                                <h6 class="user-dropdown-name">{{ Auth::user()->name }}</h6>
                                                <p class="user-dropdown-status text-sm text-muted">{{ Auth::user()->type }}</p>
                                            </div>
                                        @else
                                            <div class="avatar avatar-md2">
                                                <img src="{{ asset('storage/images/default/default-profile.jpg') }}" alt="Avatar">
                                            </div>
                                            <div class="text">

                                                <h6 class="user-dropdown-name">John Ducky</h6>
                                                <p class="user-dropdown-status text-sm text-muted">Member</p>
                                            </div>
                                        @endif
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end shadow-lg" aria-labelledby="topbarUserDropdown">
                                        @if (Auth::guard('dosen')->check())
                                            <li><a class="dropdown-item" href="{{ route('dosen.home-profile') }}">My Account</a></li>
                                            <li><a class="dropdown-item" href="{{ route('dosen.auth-signout-post') }}">Logout</a></li>
                                        @elseif(Auth::guard('mahasiswa')->check())
                                            <li><a class="dropdown-item" href="{{ route('mahasiswa.home-profile') }}">My Account</a></li>
                                            <li><a class="dropdown-item" href="{{ route('mahasiswa.auth-signout-post') }}">Logout</a></li>
                                        @elseif(Auth::check())
                                            <li><a class="dropdown-item" href="{{ route($prefix . 'home-profile') }}">My Account</a></li>
                                            <li><a class="dropdown-item" href="{{ route($prefix . 'auth-signout-post') }}">Logout</a></li>
                                        @else
                                            <li><a class="dropdown-item" href="{{ route('mahasiswa.auth-signin-page') }}">Login Mahasiswa</a></li>
                                            <li><a class="dropdown-item" href="{{ route('dosen.auth-signin-page') }}">Login Dosen</a></li>
                                            <li><a class="dropdown-item" href="{{ route('admin.auth-signin-page') }}">Login Admin / Pegawai</a></li>
                                        @endif

                                    </ul>
                                </div>

                                <!-- Burger button responsive -->
                                <a href="#" class="burger-btn d-block d-xl-none">
                                    <i class="bi bi-justify fs-3"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <nav class="main-navbar">
                        <div class="container">
                            <ul>



                                <li class="menu-item">
                                    <a href="{{ route('root.home-index') }}" class='menu-link'>
                                        <span><i class="fa-solid fa-home"></i> Home</span>
                                    </a>
                                </li>

                                <li class="menu-item  has-sub">
                                    <a href="#" class='menu-link'>
                                        <span><i class="fa-solid fa-graduation-cap"></i> Admission</span>
                                    </a>
                                    <div class="submenu">
                                        <!-- Wrap to submenu-group-wrapper if you want 3-level submenu. Otherwise remove it. -->
                                        <div class="submenu-group-wrapper">


                                            <ul class="submenu-group">
                                                @foreach ($fakultas as $faku)
                                                    <li class="submenu-item  has-sub">
                                                        <a href="#" class='submenu-link'>{{ $faku->name }}</a>


                                                        <!-- 3 Level Submenu -->
                                                        <ul class="subsubmenu">

                                                            @php
                                                                $pstudi = \App\Models\ProgramStudi::where('faku_id', $faku->id)->get();
                                                            @endphp
                                                            @foreach ($pstudi as $item)
                                                                <li class="subsubmenu-item ">
                                                                    <a href="ui-widgets-chatbox.html" class="subsubmenu-link">{{ $item->name }}</a>
                                                                </li>
                                                            @endforeach


                                                        </ul>

                                                    </li>
                                                @endforeach

                                            </ul>


                                        </div>
                                    </div>
                                </li>

                                <li class="menu-item">
                                    <a href="#" class='menu-link'>
                                        <span><i class="fa-solid fa-book"></i> Tentang Kami</span>
                                    </a>
                                </li>
                                <li class="menu-item">
                                    <a href="#" class='menu-link'>
                                        <span><i class="fa-solid fa-phone"></i> Kontak Kami</span>
                                    </a>
                                </li>

                                <li class="menu-item">
                                    <a href="#" class='menu-link'>
                                        <span><i class="fa-solid fa-circle-info"></i> Pelayanan</span>
                                    </a>
                                </li>

                                <li class="menu-item">
                                    <a href="{{ route('root.home-advice') }}" class='menu-link'>
                                        <span><i class="fa-solid fa-envelope-open-text"></i> Saran dan Masukan</span>
                                    </a>
                                </li>


                            </ul>
                        </div>
                    </nav>

                </header>
                <div class="content-wrapper container">
                    @include('sweetalert::alert')
                
                    @yield('content')
                
                </div>


                <footer>
                    <div class="container">
                        @include('base.panel.base-panel-footer')
                    </div>
                </footer>
            </div>
        </div>
        <script src="{{ asset('dist') }}/assets/static/js/components/dark.js"></script>
        <script src="{{ asset('dist') }}/assets/static/js/pages/horizontal-layout.js"></script>
        <script src="{{ asset('dist') }}/assets/extensions/perfect-scrollbar/perfect-scrollbar.min.js"></script>

        <script src="{{ asset('dist') }}/assets/compiled/js/app.js"></script>


        <script src="{{ asset('dist') }}/assets/extensions/apexcharts/apexcharts.min.js"></script>
        <script src="{{ asset('dist') }}/assets/static/js/pages/dashboard.js"></script>

        @yield('custom-js')
    </body>

</html>
