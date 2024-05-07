
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mazer Admin Dashboard</title>
    
    
    
    <link rel="shortcut icon" href="{{ asset('dist') }}/assets/compiled/svg/favicon.svg" type="image/x-icon">
    <link rel="shortcut icon" href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACEAAAAiCAYAAADRcLDBAAAEs2lUWHRYTUw6Y29tLmFkb2JlLnhtcAAAAAAAPD94cGFja2V0IGJlZ2luPSLvu78iIGlkPSJXNU0wTXBDZWhpSHpyZVN6TlRjemtjOWQiPz4KPHg6eG1wbWV0YSB4bWxuczp4PSJhZG9iZTpuczptZXRhLyIgeDp4bXB0az0iWE1QIENvcmUgNS41LjAiPgogPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4KICA8cmRmOkRlc2NyaXB0aW9uIHJkZjphYm91dD0iIgogICAgeG1sbnM6ZXhpZj0iaHR0cDovL25zLmFkb2JlLmNvbS9leGlmLzEuMC8iCiAgICB4bWxuczp0aWZmPSJodHRwOi8vbnMuYWRvYmUuY29tL3RpZmYvMS4wLyIKICAgIHhtbG5zOnBob3Rvc2hvcD0iaHR0cDovL25zLmFkb2JlLmNvbS9waG90b3Nob3AvMS4wLyIKICAgIHhtbG5zOnhtcD0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wLyIKICAgIHhtbG5zOnhtcE1NPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvbW0vIgogICAgeG1sbnM6c3RFdnQ9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZUV2ZW50IyIKICAgZXhpZjpQaXhlbFhEaW1lbnNpb249IjMzIgogICBleGlmOlBpeGVsWURpbWVuc2lvbj0iMzQiCiAgIGV4aWY6Q29sb3JTcGFjZT0iMSIKICAgdGlmZjpJbWFnZVdpZHRoPSIzMyIKICAgdGlmZjpJbWFnZUxlbmd0aD0iMzQiCiAgIHRpZmY6UmVzb2x1dGlvblVuaXQ9IjIiCiAgIHRpZmY6WFJlc29sdXRpb249Ijk2LjAiCiAgIHRpZmY6WVJlc29sdXRpb249Ijk2LjAiCiAgIHBob3Rvc2hvcDpDb2xvck1vZGU9IjMiCiAgIHBob3Rvc2hvcDpJQ0NQcm9maWxlPSJzUkdCIElFQzYxOTY2LTIuMSIKICAgeG1wOk1vZGlmeURhdGU9IjIwMjItMDMtMzFUMTA6NTA6MjMrMDI6MDAiCiAgIHhtcDpNZXRhZGF0YURhdGU9IjIwMjItMDMtMzFUMTA6NTA6MjMrMDI6MDAiPgogICA8eG1wTU06SGlzdG9yeT4KICAgIDxyZGY6U2VxPgogICAgIDxyZGY6bGkKICAgICAgc3RFdnQ6YWN0aW9uPSJwcm9kdWNlZCIKICAgICAgc3RFdnQ6c29mdHdhcmVBZ2VudD0iQWZmaW5pdHkgRGVzaWduZXIgMS4xMC4xIgogICAgICBzdEV2dDp3aGVuPSIyMDIyLTAzLTMxVDEwOjUwOjIzKzAyOjAwIi8+CiAgICA8L3JkZjpTZXE+CiAgIDwveG1wTU06SGlzdG9yeT4KICA8L3JkZjpEZXNjcmlwdGlvbj4KIDwvcmRmOlJERj4KPC94OnhtcG1ldGE+Cjw/eHBhY2tldCBlbmQ9InIiPz5V57uAAAABgmlDQ1BzUkdCIElFQzYxOTY2LTIuMQAAKJF1kc8rRFEUxz9maORHo1hYKC9hISNGTWwsRn4VFmOUX5uZZ36oeTOv954kW2WrKLHxa8FfwFZZK0WkZClrYoOe87ypmWTO7dzzud97z+nec8ETzaiaWd4NWtYyIiNhZWZ2TvE946WZSjqoj6mmPjE1HKWkfdxR5sSbgFOr9Ll/rXoxYapQVik8oOqGJTwqPL5i6Q5vCzeo6dii8KlwpyEXFL519LjLLw6nXP5y2IhGBsFTJ6ykijhexGra0ITl5bRqmWU1fx/nJTWJ7PSUxBbxJkwijBBGYYwhBgnRQ7/MIQIE6ZIVJfK7f/MnyUmuKrPOKgZLpEhj0SnqslRPSEyKnpCRYdXp/9++msneoFu9JgwVT7b91ga+LfjetO3PQ9v+PgLvI1xkC/m5A+h7F32zoLXug38dzi4LWnwHzjeg8UGPGbFfySvuSSbh9QRqZ6H+Gqrm3Z7l9zm+h+iafNUV7O5Bu5z3L/wAdthn7QIme0YAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAJTSURBVFiF7Zi9axRBGIefEw2IdxFBRQsLWUTBaywSK4ubdSGVIY1Y6HZql8ZKCGIqwX/AYLmCgVQKfiDn7jZeEQMWfsSAHAiKqPiB5mIgELWYOW5vzc3O7niHhT/YZvY37/swM/vOzJbIqVq9uQ04CYwCI8AhYAlYAB4Dc7HnrOSJWcoJcBS4ARzQ2F4BZ2LPmTeNuykHwEWgkQGAet9QfiMZjUSt3hwD7psGTWgs9pwH1hC1enMYeA7sKwDxBqjGnvNdZzKZjqmCAKh+U1kmEwi3IEBbIsugnY5avTkEtIAtFhBrQCX2nLVehqyRqFoCAAwBh3WGLAhbgCRIYYinwLolwLqKUwwi9pxV4KUlxKKKUwxC6ZElRCPLYAJxGfhSEOCz6m8HEXvOB2CyIMSk6m8HoXQTmMkJcA2YNTHm3congOvATo3tE3A29pxbpnFzQSiQPcB55IFmFNgFfEQeahaAGZMpsIJIAZWAHcDX2HN+2cT6r39GxmvC9aPNwH5gO1BOPFuBVWAZue0vA9+A12EgjPadnhCuH1WAE8ivYAQ4ohKaagV4gvxi5oG7YSA2vApsCOH60WngKrA3R9IsvQUuhIGY00K4flQG7gHH/mLytB4C42EgfrQb0mV7us8AAMeBS8mGNMR4nwHamtBB7B4QRNdaS0M8GxDEog7iyoAguvJ0QYSBuAOcAt71Kfl7wA8DcTvZ2KtOlJEr+ByyQtqqhTyHTIeB+ONeqi3brh+VgIN0fohUgWGggizZFTplu12yW8iy/YLOGWMpDMTPXnl+Az9vj2HERYqPAAAAAElFTkSuQmCC" type="image/png">
    


    <link rel="stylesheet" href="{{ asset('dist') }}/assets/compiled/css/app.css">
    <link rel="stylesheet" href="{{ asset('dist') }}/assets/compiled/css/app-dark.css">
    <link rel="stylesheet" href="{{ asset('dist') }}/assets/compiled/css/iconly.css">
    {{-- PLUGIN FONT AWESOME --}}
    <link rel="stylesheet" href="{{ asset('vendor') }}/fontawesome/css/all.min.css" rel="stylesheet">

  <style>

    @media screen and (max-width: 767px) {
        .footer {
            display: flex;
            flex-direction: column;
            align-items: center; /* Tulisan menjadi rata tengah secara horizontal */
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

                                    @if(Auth::guard('dosen')->check())
                                        <div class="avatar avatar-md2" >
                                            <img src="{{ asset('storage/images/'. Auth::guard('dosen')->user()->dsn_image ) }}" alt="Avatar">
                                        </div>
                                        <div class="text">

                                            <h6 class="user-dropdown-name">{{ Auth::guard('dosen')->user()->dsn_name }}</h6>
                                            <p class="user-dropdown-status text-sm text-muted">{{ Auth::guard('dosen')->user()->dsn_stat }}</p>
                                        </div>
                                    @elseif(Auth::guard('mahasiswa')->check())
                                        <div class="avatar avatar-md2" >
                                            <img src="{{ asset('storage/images/'.Auth::guard('mahasiswa')->user()->mhs_image ) }}" alt="Avatar">
                                        </div>
                                        <div class="text">
                                            <h6 class="user-dropdown-name">{{ Auth::guard('mahasiswa')->user()->mhs_name }}</h6>
                                            <p class="user-dropdown-status text-sm text-muted">{{ Auth::guard('mahasiswa')->user()->mhs_stat }}</p>
                                        </div>
                                    @elseif(Auth::check())
                                        <div class="avatar avatar-md2" >
                                            <img src="{{ asset('storage/images/'.Auth::user()->image ) }}" alt="Avatar">
                                        </div>
                                        <div class="text">

                                            <h6 class="user-dropdown-name">{{ Auth::user()->name }}</h6>
                                            <p class="user-dropdown-status text-sm text-muted">{{ Auth::user()->type }}</p>
                                        </div>
                                    @else
                                    

                                        <div class="avatar avatar-md2" >
                                            <img src="{{ asset('storage/images/default/default-profile.jpg') }}" alt="Avatar">
                                        </div>
                                        <div class="text">

                                            <h6 class="user-dropdown-name">John Ducky</h6>
                                            <p class="user-dropdown-status text-sm text-muted">Member</p>
                                        </div>
                                    @endif
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end shadow-lg" aria-labelledby="topbarUserDropdown">
                                    @if(Auth::guard('dosen')->check())
                                    <li><a class="dropdown-item" href="{{ route('dosen.home-profile') }}">My Account</a></li>
                                    <li><a class="dropdown-item" href="{{ route('dosen.auth-signout-post') }}">Logout</a></li>

                                    @elseif(Auth::guard('mahasiswa')->check())
                                    <li><a class="dropdown-item" href="{{ route('mahasiswa.home-profile') }}">My Account</a></li>
                                    <li><a class="dropdown-item" href="{{ route('mahasiswa.auth-signout-post') }}">Logout</a></li>
                                    @elseif(Auth::check())
                                        @if (Auth::user()->raw_type === 0)
                                            
                                        <li><a class="dropdown-item" href="{{ route('web-admin.home-profile') }}">My Account</a></li>
                                        <li><a class="dropdown-item" href="{{ route('web-admin.auth-signout-post') }}">Logout</a></li>
                                        @else
                                            
                                        @endif
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
                                <a href="#" class='menu-link'>
                                    <span><i class="fa-solid fa-home"></i> Home</span>
                                </a>
                            </li>
                            
                            
                            
                            
                            <li class="menu-item  has-sub">
                                <a href="#" class='menu-link'>
                                    <span><i class="fa-solid fa-square-plus"></i> Extras</span>
                                </a>
                                <div class="submenu">
                                    <!-- Wrap to submenu-group-wrapper if you want 3-level submenu. Otherwise remove it. -->
                                    <div class="submenu-group-wrapper">
                                        
                                        
                                        <ul class="submenu-group">
                                            
                                            <li
                                                class="submenu-item  has-sub">
                                                <a href="#"
                                                    class='submenu-link'>Widgets</a>

                                                
                                                <!-- 3 Level Submenu -->
                                                <ul class="subsubmenu">
                                                    
                                                    <li class="subsubmenu-item ">
                                                        <a href="ui-widgets-chatbox.html" class="subsubmenu-link">Chatbox</a>
                                                    </li>
                                                    
                                                    <li class="subsubmenu-item ">
                                                        <a href="ui-widgets-pricing.html" class="subsubmenu-link">Pricing</a>
                                                    </li>
                                                    
                                                    <li class="subsubmenu-item ">
                                                        <a href="ui-widgets-todolist.html" class="subsubmenu-link">To-do List</a>
                                                    </li>
                                                    
                                                </ul>
                                                
                                            </li>
                                            
                                        
                                        
                                            <li
                                                class="submenu-item  has-sub">
                                                <a href="#"
                                                    class='submenu-link'>Icons</a>

                                                
                                                <!-- 3 Level Submenu -->
                                                <ul class="subsubmenu">
                                                    
                                                    <li class="subsubmenu-item ">
                                                        <a href="ui-icons-bootstrap-icons.html" class="subsubmenu-link">Bootstrap Icons </a>
                                                    </li>
                                                    
                                                    <li class="subsubmenu-item ">
                                                        <a href="ui-icons-fontawesome.html" class="subsubmenu-link">Fontawesome</a>
                                                    </li>
                                                    
                                                    <li class="subsubmenu-item ">
                                                        <a href="ui-icons-dripicons.html" class="subsubmenu-link">Dripicons</a>
                                                    </li>
                                                    
                                                </ul>
                                                
                                            </li>
                                            
                                        
                                        
                                            <li
                                                class="submenu-item  has-sub">
                                                <a href="#"
                                                    class='submenu-link'>Charts</a>

                                                
                                                <!-- 3 Level Submenu -->
                                                <ul class="subsubmenu">
                                                    
                                                    <li class="subsubmenu-item ">
                                                        <a href="ui-chart-chartjs.html" class="subsubmenu-link">ChartJS</a>
                                                    </li>
                                                    
                                                    <li class="subsubmenu-item ">
                                                        <a href="ui-chart-apexcharts.html" class="subsubmenu-link">Apexcharts</a>
                                                    </li>
                                                    
                                                </ul>
                                                
                                            </li>
                                            
                                        </ul>
                                        
                                        
                                    </div>
                                </div>
                            </li>
                            
 
                            
                            
                        </ul>
                    </div>
                </nav>

            </header>

            <div class="content-wrapper container">

                <h4 class="text-center">Pages In Development</h4>
                
                {{-- <div class="page-content">
                    <section class="row">
                        <div class="col-12 col-lg-9">
                            <div class="row">
                                <div class="col-6 col-lg-3 col-md-6">
                                    <div class="card">
                                        <div class="card-body px-4 py-4-5">
                                            <div class="row">
                                                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                                    <div class="stats-icon purple mb-2">
                                                        <i class="iconly-boldShow"></i>
                                                    </div>
                                                </div>
                                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                                    <h6 class="text-muted font-semibold">Profile Views</h6>
                                                    <h6 class="font-extrabold mb-0">112.000</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 col-lg-3 col-md-6">
                                    <div class="card">
                                        <div class="card-body px-4 py-4-5">
                                            <div class="row">
                                                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                                    <div class="stats-icon blue mb-2">
                                                        <i class="iconly-boldProfile"></i>
                                                    </div>
                                                </div>
                                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                                    <h6 class="text-muted font-semibold">Followers</h6>
                                                    <h6 class="font-extrabold mb-0">183.000</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 col-lg-3 col-md-6">
                                    <div class="card">
                                        <div class="card-body px-4 py-4-5">
                                            <div class="row">
                                                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                                    <div class="stats-icon green mb-2">
                                                        <i class="iconly-boldAdd-User"></i>
                                                    </div>
                                                </div>
                                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                                    <h6 class="text-muted font-semibold">Following</h6>
                                                    <h6 class="font-extrabold mb-0">80.000</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 col-lg-3 col-md-6">
                                    <div class="card">
                                        <div class="card-body px-4 py-4-5">
                                            <div class="row">
                                                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                                    <div class="stats-icon red mb-2">
                                                        <i class="iconly-boldBookmark"></i>
                                                    </div>
                                                </div>
                                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                                    <h6 class="text-muted font-semibold">Saved Post</h6>
                                                    <h6 class="font-extrabold mb-0">112</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4>Profile Visit</h4>
                                        </div>
                                        <div class="card-body">
                                            <div id="chart-profile-visit"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-xl-4">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4>Profile Visit</h4>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="d-flex align-items-center">
                                                        <svg class="bi text-primary" width="32" height="32" fill="blue"
                                                            style="width:10px">
                                                            <use
                                                                xlink:href="{{ asset('dist') }}/assets/static/images/bootstrap-icons.svg#circle-fill" />
                                                        </svg>
                                                        <h5 class="mb-0 ms-3">Europe</h5>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <h5 class="mb-0">862</h5>
                                                </div>
                                                <div class="col-12">
                                                    <div id="chart-europe"></div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="d-flex align-items-center">
                                                        <svg class="bi text-success" width="32" height="32" fill="blue"
                                                            style="width:10px">
                                                            <use
                                                                xlink:href="{{ asset('dist') }}/assets/static/images/bootstrap-icons.svg#circle-fill" />
                                                        </svg>
                                                        <h5 class="mb-0 ms-3">America</h5>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <h5 class="mb-0">375</h5>
                                                </div>
                                                <div class="col-12">
                                                    <div id="chart-america"></div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-7">
                                                    <div class="d-flex align-items-center">
                                                        <svg class="bi text-success" width="32" height="32" fill="blue"
                                                            style="width:10px">
                                                            <use
                                                                xlink:href="{{ asset('dist') }}/assets/static/images/bootstrap-icons.svg#circle-fill" />
                                                        </svg>
                                                        <h5 class="mb-0 ms-3">India</h5>
                                                    </div>
                                                </div>
                                                <div class="col-5">
                                                    <h5 class="mb-0 text-end">625</h5>
                                                </div>
                                                <div class="col-12">
                                                    <div id="chart-india"></div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="d-flex align-items-center">
                                                        <svg class="bi text-danger" width="32" height="32" fill="blue"
                                                            style="width:10px">
                                                            <use
                                                                xlink:href="{{ asset('dist') }}/assets/static/images/bootstrap-icons.svg#circle-fill" />
                                                        </svg>
                                                        <h5 class="mb-0 ms-3">Indonesia</h5>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <h5 class="mb-0">1025</h5>
                                                </div>
                                                <div class="col-12">
                                                    <div id="chart-indonesia"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-xl-8">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4>Latest Comments</h4>
                                        </div>
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table table-hover table-lg">
                                                    <thead>
                                                        <tr>
                                                            <th>Name</th>
                                                            <th>Comment</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td class="col-3">
                                                                <div class="d-flex align-items-center">
                                                                    <div class="avatar avatar-md">
                                                                        <img src="{{ asset('dist') }}/assets/compiled/jpg/5.jpg">
                                                                    </div>
                                                                    <p class="font-bold ms-3 mb-0">Cantik</p>
                                                                </div>
                                                            </td>
                                                            <td class="col-auto">
                                                                <p class=" mb-0">Congratulations on your graduation!</p>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="col-3">
                                                                <div class="d-flex align-items-center">
                                                                    <div class="avatar avatar-md">
                                                                        <img src="{{ asset('dist') }}/assets/compiled/jpg/2.jpg">
                                                                    </div>
                                                                    <p class="font-bold ms-3 mb-0">Ganteng</p>
                                                                </div>
                                                            </td>
                                                            <td class="col-auto">
                                                                <p class=" mb-0">Wow amazing design! Can you make another tutorial for
                                                                    this design?</p>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-3">
                            <div class="card">
                                <div class="card-body py-4 px-5">
                                    
                                    <div class="d-flex align-items-center">
                                        <div class="avatar avatar-xl">
                                            <img src="{{ asset('dist') }}/assets/compiled/jpg/1.jpg" alt="Face 1">
                                        </div>
                                        <div class="ms-3 name">
                                            <h5 class="font-bold">John Duck</h5>
                                            <h6 class="text-muted mb-0">@johnducky</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header">
                                    <h4>Recent Messages</h4>
                                </div>
                                <div class="card-content pb-4">
                                    <div class="recent-message d-flex px-4 py-3">
                                        <div class="avatar avatar-lg">
                                            <img src="{{ asset('dist') }}/assets/compiled/jpg/4.jpg">
                                        </div>
                                        <div class="name ms-4">
                                            <h5 class="mb-1">Hank Schrader</h5>
                                            <h6 class="text-muted mb-0">@johnducky</h6>
                                        </div>
                                    </div>
                                    <div class="recent-message d-flex px-4 py-3">
                                        <div class="avatar avatar-lg">
                                            <img src="{{ asset('dist') }}/assets/compiled/jpg/5.jpg">
                                        </div>
                                        <div class="name ms-4">
                                            <h5 class="mb-1">Dean Winchester</h5>
                                            <h6 class="text-muted mb-0">@imdean</h6>
                                        </div>
                                    </div>
                                    <div class="recent-message d-flex px-4 py-3">
                                        <div class="avatar avatar-lg">
                                            <img src="{{ asset('dist') }}/assets/compiled/jpg/1.jpg">
                                        </div>
                                        <div class="name ms-4">
                                            <h5 class="mb-1">John Dodol</h5>
                                            <h6 class="text-muted mb-0">@dodoljohn</h6>
                                        </div>
                                    </div>
                                    <div class="px-4">
                                        <button class='btn btn-block btn-xl btn-light-primary font-bold mt-3'>Start
                                            Conversation</button>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header">
                                    <h4>Visitors Profile</h4>
                                </div>
                                <div class="card-body">
                                    <div id="chart-visitors-profile"></div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div> --}}

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

</body>

</html>