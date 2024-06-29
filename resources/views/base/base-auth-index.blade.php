<!--
=========================================================
* Argon Dashboard 2 - v2.0.4
=========================================================

* Product Page: https://www.creative-tim.com/product/argon-dashboard
* Copyright 2022 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://www.creative-tim.com/license)
* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('auth') }}/assets/img/apple-icon.png">
        <link rel="icon" type="image/png" href="{{ asset('auth') }}/assets/img/favicon.png">
        <title>
           {{ $title }}
        </title>
        <!--     Fonts and icons     -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
        <!-- Nucleo Icons -->
        <link href="{{ asset('auth') }}/assets/css/nucleo-icons.css" rel="stylesheet" />
        <link href="{{ asset('auth') }}/assets/css/nucleo-svg.css" rel="stylesheet" />
        <!-- Font Awesome Icons -->
        <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
        <link href="{{ asset('auth') }}/assets/css/nucleo-svg.css" rel="stylesheet" />
        <!-- CSS Files -->
        <link id="pagestyle" href="{{ asset('auth') }}/assets/css/argon-dashboard.css?v=2.0.4" rel="stylesheet" />
    </head>

    <body class="">
        <div class="container position-sticky z-index-sticky top-0">
            <div class="row">
                <div class="col-12">
                    <!-- Navbar -->
                    <nav class="navbar navbar-expand-lg blur border-radius-lg top-0 z-index-3 shadow position-absolute mt-4 py-2 start-0 end-0 mx-4">
                        <div class="container-fluid">
                            <a class="navbar-brand font-weight-bolder ms-lg-0 ms-3 " href="/">
                                {{ $web->school_name }}
                            </a>
                            <button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse" data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon mt-2">
                                    <span class="navbar-toggler-bar bar1"></span>
                                    <span class="navbar-toggler-bar bar2"></span>
                                    <span class="navbar-toggler-bar bar3"></span>
                                </span>
                            </button>
                            <div class="collapse navbar-collapse" id="navigation">
                                <ul class="navbar-nav mx-auto">
                                    <li class="nav-item">
                                        <a class="nav-link d-flex align-items-center me-2 active" aria-current="page" href="{{ route('admin.auth-signin-page') }}">
                                            {{-- <i class="fa fa-chart-pie opacity-6 text-dark me-1"></i> --}}
                                            Portal Admin
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link me-2" href="{{ route('mahasiswa.auth-signin-page') }}">
                                            {{-- <i class="fa fa-user opacity-6 text-dark me-1"></i> --}}
                                            Portal Mahasiswa
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link me-2" href="{{ route('dosen.auth-signin-page') }}">
                                            {{-- <i class="fas fa-user-circle opacity-6 text-dark me-1"></i> --}}
                                            Portal Dosen
                                        </a>
                                    </li>
                                </ul>
                                <ul class="navbar-nav d-lg-block d-none">
                                    <li class="nav-item">
                                        <a href="/" class="btn btn-sm mb-0 me-1 btn-primary">Home Page</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </nav>
                    <!-- End Navbar -->
                </div>
            </div>
        </div>
        <main class="main-content  mt-0">
            @yield('content')
        </main>
        <!--   Core JS Files   -->
        <script src="{{ asset('auth') }}/assets/js/core/popper.min.js"></script>
        <script src="{{ asset('auth') }}/assets/js/core/bootstrap.min.js"></script>
        <script src="{{ asset('auth') }}/assets/js/plugins/perfect-scrollbar.min.js"></script>
        <script src="{{ asset('auth') }}/assets/js/plugins/smooth-scrollbar.min.js"></script>
        <script>
            var win = navigator.platform.indexOf('Win') > -1;
            if (win && document.querySelector('#sidenav-scrollbar')) {
                var options = {
                    damping: '0.5'
                }
                Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
            }
        </script>
        <!-- Github buttons -->
        <script async defer src="https://buttons.github.io/buttons.js"></script>
        <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
        <script src="{{ asset('auth') }}/assets/js/argon-dashboard.min.js?v=2.0.4"></script>
    </body>

</html>
