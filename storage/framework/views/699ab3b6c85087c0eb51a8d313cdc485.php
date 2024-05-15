
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mazer Admin Dashboard</title>
    
    
    
    <link rel="shortcut icon" href="<?php echo e(asset('dist')); ?>/assets/compiled/svg/favicon.svg" type="image/x-icon">
    <link rel="shortcut icon" href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACEAAAAiCAYAAADRcLDBAAAEs2lUWHRYTUw6Y29tLmFkb2JlLnhtcAAAAAAAPD94cGFja2V0IGJlZ2luPSLvu78iIGlkPSJXNU0wTXBDZWhpSHpyZVN6TlRjemtjOWQiPz4KPHg6eG1wbWV0YSB4bWxuczp4PSJhZG9iZTpuczptZXRhLyIgeDp4bXB0az0iWE1QIENvcmUgNS41LjAiPgogPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4KICA8cmRmOkRlc2NyaXB0aW9uIHJkZjphYm91dD0iIgogICAgeG1sbnM6ZXhpZj0iaHR0cDovL25zLmFkb2JlLmNvbS9leGlmLzEuMC8iCiAgICB4bWxuczp0aWZmPSJodHRwOi8vbnMuYWRvYmUuY29tL3RpZmYvMS4wLyIKICAgIHhtbG5zOnBob3Rvc2hvcD0iaHR0cDovL25zLmFkb2JlLmNvbS9waG90b3Nob3AvMS4wLyIKICAgIHhtbG5zOnhtcD0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wLyIKICAgIHhtbG5zOnhtcE1NPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvbW0vIgogICAgeG1sbnM6c3RFdnQ9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZUV2ZW50IyIKICAgZXhpZjpQaXhlbFhEaW1lbnNpb249IjMzIgogICBleGlmOlBpeGVsWURpbWVuc2lvbj0iMzQiCiAgIGV4aWY6Q29sb3JTcGFjZT0iMSIKICAgdGlmZjpJbWFnZVdpZHRoPSIzMyIKICAgdGlmZjpJbWFnZUxlbmd0aD0iMzQiCiAgIHRpZmY6UmVzb2x1dGlvblVuaXQ9IjIiCiAgIHRpZmY6WFJlc29sdXRpb249Ijk2LjAiCiAgIHRpZmY6WVJlc29sdXRpb249Ijk2LjAiCiAgIHBob3Rvc2hvcDpDb2xvck1vZGU9IjMiCiAgIHBob3Rvc2hvcDpJQ0NQcm9maWxlPSJzUkdCIElFQzYxOTY2LTIuMSIKICAgeG1wOk1vZGlmeURhdGU9IjIwMjItMDMtMzFUMTA6NTA6MjMrMDI6MDAiCiAgIHhtcDpNZXRhZGF0YURhdGU9IjIwMjItMDMtMzFUMTA6NTA6MjMrMDI6MDAiPgogICA8eG1wTU06SGlzdG9yeT4KICAgIDxyZGY6U2VxPgogICAgIDxyZGY6bGkKICAgICAgc3RFdnQ6YWN0aW9uPSJwcm9kdWNlZCIKICAgICAgc3RFdnQ6c29mdHdhcmVBZ2VudD0iQWZmaW5pdHkgRGVzaWduZXIgMS4xMC4xIgogICAgICBzdEV2dDp3aGVuPSIyMDIyLTAzLTMxVDEwOjUwOjIzKzAyOjAwIi8+CiAgICA8L3JkZjpTZXE+CiAgIDwveG1wTU06SGlzdG9yeT4KICA8L3JkZjpEZXNjcmlwdGlvbj4KIDwvcmRmOlJERj4KPC94OnhtcG1ldGE+Cjw/eHBhY2tldCBlbmQ9InIiPz5V57uAAAABgmlDQ1BzUkdCIElFQzYxOTY2LTIuMQAAKJF1kc8rRFEUxz9maORHo1hYKC9hISNGTWwsRn4VFmOUX5uZZ36oeTOv954kW2WrKLHxa8FfwFZZK0WkZClrYoOe87ypmWTO7dzzud97z+nec8ETzaiaWd4NWtYyIiNhZWZ2TvE946WZSjqoj6mmPjE1HKWkfdxR5sSbgFOr9Ll/rXoxYapQVik8oOqGJTwqPL5i6Q5vCzeo6dii8KlwpyEXFL519LjLLw6nXP5y2IhGBsFTJ6ykijhexGra0ITl5bRqmWU1fx/nJTWJ7PSUxBbxJkwijBBGYYwhBgnRQ7/MIQIE6ZIVJfK7f/MnyUmuKrPOKgZLpEhj0SnqslRPSEyKnpCRYdXp/9++msneoFu9JgwVT7b91ga+LfjetO3PQ9v+PgLvI1xkC/m5A+h7F32zoLXug38dzi4LWnwHzjeg8UGPGbFfySvuSSbh9QRqZ6H+Gqrm3Z7l9zm+h+iafNUV7O5Bu5z3L/wAdthn7QIme0YAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAJTSURBVFiF7Zi9axRBGIefEw2IdxFBRQsLWUTBaywSK4ubdSGVIY1Y6HZql8ZKCGIqwX/AYLmCgVQKfiDn7jZeEQMWfsSAHAiKqPiB5mIgELWYOW5vzc3O7niHhT/YZvY37/swM/vOzJbIqVq9uQ04CYwCI8AhYAlYAB4Dc7HnrOSJWcoJcBS4ARzQ2F4BZ2LPmTeNuykHwEWgkQGAet9QfiMZjUSt3hwD7psGTWgs9pwH1hC1enMYeA7sKwDxBqjGnvNdZzKZjqmCAKh+U1kmEwi3IEBbIsugnY5avTkEtIAtFhBrQCX2nLVehqyRqFoCAAwBh3WGLAhbgCRIYYinwLolwLqKUwwi9pxV4KUlxKKKUwxC6ZElRCPLYAJxGfhSEOCz6m8HEXvOB2CyIMSk6m8HoXQTmMkJcA2YNTHm3congOvATo3tE3A29pxbpnFzQSiQPcB55IFmFNgFfEQeahaAGZMpsIJIAZWAHcDX2HN+2cT6r39GxmvC9aPNwH5gO1BOPFuBVWAZue0vA9+A12EgjPadnhCuH1WAE8ivYAQ4ohKaagV4gvxi5oG7YSA2vApsCOH60WngKrA3R9IsvQUuhIGY00K4flQG7gHH/mLytB4C42EgfrQb0mV7us8AAMeBS8mGNMR4nwHamtBB7B4QRNdaS0M8GxDEog7iyoAguvJ0QYSBuAOcAt71Kfl7wA8DcTvZ2KtOlJEr+ByyQtqqhTyHTIeB+ONeqi3brh+VgIN0fohUgWGggizZFTplu12yW8iy/YLOGWMpDMTPXnl+Az9vj2HERYqPAAAAAElFTkSuQmCC" type="image/png">
    


    <link rel="stylesheet" href="<?php echo e(asset('dist')); ?>/assets/compiled/css/app.css">
    <link rel="stylesheet" href="<?php echo e(asset('dist')); ?>/assets/compiled/css/app-dark.css">
    <link rel="stylesheet" href="<?php echo e(asset('dist')); ?>/assets/compiled/css/iconly.css">
    <link rel="stylesheet" href="<?php echo e(asset('dist')); ?>/assets/custom/css/news-section.css">
    
    <link rel="stylesheet" href="<?php echo e(asset('vendor')); ?>/fontawesome/css/all.min.css" rel="stylesheet">


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
                align-items: center; /* Tulisan menjadi rata tengah secara horizontal */
            }
            .berita img {
            width: 100%;
            max-width: none;
            }
            .berita a {
                text-align: center !important; /* Menambahkan !important agar lebih dominan */
            }
            .berita p {
                /* text-align: justify; */
            }

        }
    </style>
</head>

<body>
    <script src="<?php echo e(asset('dist')); ?>/assets/static/js/initTheme.js"></script>
    <div id="app">
        <div id="main" class="layout-horizontal">
            <header class="mb-5">
                <div class="header-top">
                    <div class="container">
                        <div class="logo">
                            <a href="<?php echo e(route('root.home-index')); ?>" style="font-size: 24px"> ESEC Academy</a>
                        </div>
                        <div class="header-top-right">

                            <div class="dropdown">
                                <a href="#" id="topbarUserDropdown" class="user-dropdown d-flex align-items-center dropend dropdown-toggle " data-bs-toggle="dropdown" aria-expanded="false">

                                    <?php if(Auth::guard('dosen')->check()): ?>
                                        <div class="avatar avatar-md2" >
                                            <img src="<?php echo e(asset('storage/images/'. Auth::guard('dosen')->user()->dsn_image )); ?>" alt="Avatar">
                                        </div>
                                        <div class="text">

                                            <h6 class="user-dropdown-name"><?php echo e(Auth::guard('dosen')->user()->dsn_name); ?></h6>
                                            <p class="user-dropdown-status text-sm text-muted"><?php echo e(Auth::guard('dosen')->user()->dsn_stat); ?></p>
                                        </div>
                                    <?php elseif(Auth::guard('mahasiswa')->check()): ?>
                                        <div class="avatar avatar-md2" >
                                            <img src="<?php echo e(asset('storage/images/'.Auth::guard('mahasiswa')->user()->mhs_image )); ?>" alt="Avatar">
                                        </div>
                                        <div class="text">
                                            <h6 class="user-dropdown-name"><?php echo e(Auth::guard('mahasiswa')->user()->mhs_name); ?></h6>
                                            <p class="user-dropdown-status text-sm text-muted"><?php echo e(Auth::guard('mahasiswa')->user()->mhs_stat); ?></p>
                                        </div>
                                    <?php elseif(Auth::check()): ?>
                                        <div class="avatar avatar-md2" >
                                            <img src="<?php echo e(asset('storage/images/'.Auth::user()->image )); ?>" alt="Avatar">
                                        </div>
                                        <div class="text">

                                            <h6 class="user-dropdown-name"><?php echo e(Auth::user()->name); ?></h6>
                                            <p class="user-dropdown-status text-sm text-muted"><?php echo e(Auth::user()->type); ?></p>
                                        </div>
                                    <?php else: ?>
                                
                                        <div class="avatar avatar-md2" >
                                            <img src="<?php echo e(asset('storage/images/default/default-profile.jpg')); ?>" alt="Avatar">
                                        </div>
                                        <div class="text">

                                            <h6 class="user-dropdown-name">John Ducky</h6>
                                            <p class="user-dropdown-status text-sm text-muted">Member</p>
                                        </div>
                                    <?php endif; ?>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end shadow-lg" aria-labelledby="topbarUserDropdown">
                                    <?php if(Auth::guard('dosen')->check()): ?>
                                    <li><a class="dropdown-item" href="<?php echo e(route('dosen.home-profile')); ?>">My Account</a></li>
                                    <li><a class="dropdown-item" href="<?php echo e(route('dosen.auth-signout-post')); ?>">Logout</a></li>

                                    <?php elseif(Auth::guard('mahasiswa')->check()): ?>
                                    <li><a class="dropdown-item" href="<?php echo e(route('mahasiswa.home-profile')); ?>">My Account</a></li>
                                    <li><a class="dropdown-item" href="<?php echo e(route('mahasiswa.auth-signout-post')); ?>">Logout</a></li>
                                    <?php elseif(Auth::check()): ?>
                                        <?php if(Auth::user()->raw_type === 0): ?>
                                            
                                        <li><a class="dropdown-item" href="<?php echo e(route('web-admin.home-profile')); ?>">My Account</a></li>
                                        <li><a class="dropdown-item" href="<?php echo e(route('web-admin.auth-signout-post')); ?>">Logout</a></li>
                                        <?php else: ?>
                                            
                                        <?php endif; ?>
                                    <?php else: ?>

                                    <li><a class="dropdown-item" href="<?php echo e(route('mahasiswa.auth-signin-page')); ?>">Login Mahasiswa</a></li>
                                    <li><a class="dropdown-item" href="<?php echo e(route('dosen.auth-signin-page')); ?>">Login Dosen</a></li>
                                    <li><a class="dropdown-item" href="<?php echo e(route('admin.auth-signin-page')); ?>">Login Admin / Pegawai</a></li>
                                    <?php endif; ?>

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
                                    <span><i class="fa-solid fa-graduation-cap"></i> Admission</span>
                                </a>
                                <div class="submenu">
                                    <!-- Wrap to submenu-group-wrapper if you want 3-level submenu. Otherwise remove it. -->
                                    <div class="submenu-group-wrapper">
                                        
                                        
                                        <ul class="submenu-group">
                                            <?php $__currentLoopData = $fakultas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $faku): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                
                                                <li class="submenu-item  has-sub">
                                                    <a href="#" class='submenu-link'><?php echo e($faku->name); ?></a>

                                                    
                                                    <!-- 3 Level Submenu -->
                                                    <ul class="subsubmenu">

                                                        <?php
                                                            $pstudi = \App\Models\ProgramStudi::where('faku_id', $faku->id)->get();
                                                        ?>
                                                        <?php $__currentLoopData = $pstudi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            
                                                        <li class="subsubmenu-item ">
                                                            <a href="ui-widgets-chatbox.html" class="subsubmenu-link"><?php echo e($item->name); ?></a>
                                                        </li>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        
                                                        
                                                    </ul>
                                                    
                                                </li>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            
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


                            
                            
                        </ul>
                    </div>
                </nav>

            </header>

            <div class="content-wrapper container">
                <?php echo $__env->make('sweetalert::alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                <div class="page-content row">

                    <div class="col-lg-8 col-12">
                        <h4 class="card-title">Gallery Terbaru</h4>
                        <hr>
                        <div class="card mb-3">
                            <div class="card-body">
                                <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                                    <div class="carousel-inner">
                                        <div class="carousel-item active">
                                            <a href="/back">

                                                <img src="<?php echo e(asset('dist')); ?>/assets/compiled/png/1.png" style="height: 375px; width: 100%; object-fit: cover;" class="d-block w-100" alt="...">
                                                <div class="carousel-caption d-none d-md-block">
                                                    <h5>First slide label</h5>
                                                    <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="carousel-item">
                                            <a href="/unzuo">

                                                <img src="<?php echo e(asset('dist')); ?>/assets/compiled/png/2.png" style="height: 375px; width: 100%; object-fit: cover;" class="d-block w-100" alt="...">
                                                <div class="carousel-caption d-none d-md-block">
                                                    <h5>Second slide label</h5>
                                                    <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="carousel-item">
                                            <a href="/ushio">

                                                <img src="<?php echo e(asset('dist')); ?>/assets/compiled/png/3.png" style="height: 375px; width: 100%; object-fit: cover;" class="d-block w-100" alt="...">
                                                <div class="carousel-caption d-none d-md-block">
                                                    <h5>Third slide label</h5>
                                                    <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Previous</span>
                                    </a>
                                    <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-bs-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Next</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <h4 class="card-title">Berita Terbaru</h4>
                        <hr>
                        <div class="card mb-3">
                            <div class="card-body">
                                
                                <div class="berita row">
                                    <div class="col-lg-2 text-center">
                                        <img src="<?php echo e(asset('storage/images/default/default-profile.jpg')); ?>" style="" class="rounded" alt="">
                                    </div>
                                    <div class="col-lg-10">
                                        <a href="" style="font-size: 20px; color: #c2c2d9; font-weight: 800;">Lorem ipsum dolor sit amet consectetur adipisicing.</a>
                                        <p class="mb-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Aspernatur id nihil praesentium reprehenderit a placeat veritatis provident voluptate ad doloremque?</p>
                                        <div class="d-flex justify-content-between align-items-center">

                                            <small>Kamis, 15 Februari 2024 - 14.25 WIB <br> Author By <a href="#">Jaya Kusuma</a></small>
                                            <a href="" class="btn btn-xs btn-info"><i class="fa-solid fa-info" ></i></a>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="berita row">
                                    <div class="col-lg-2 text-center">
                                        <img src="<?php echo e(asset('storage/images/default/default-profile.jpg')); ?>" style="" class="rounded" alt="">
                                    </div>
                                    <div class="col-lg-10">
                                        <a href="" style="font-size: 20px; color: #c2c2d9; font-weight: 800;">Lorem ipsum dolor sit amet consectetur adipisicing.</a>
                                        <p class="mb-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Aspernatur id nihil praesentium reprehenderit a placeat veritatis provident voluptate ad doloremque?</p>
                                        <div class="d-flex justify-content-between align-items-center">

                                            <small>Kamis, 15 Februari 2024 - 14.25 WIB <br> Author By <a href="#">Jaya Kusuma</a></small>
                                            <a href="" class="btn btn-xs btn-info"><i class="fa-solid fa-info" ></i></a>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="berita row">
                                    <div class="col-lg-2 text-center">
                                        <img src="<?php echo e(asset('storage/images/default/default-profile.jpg')); ?>" style="" class="rounded" alt="">
                                    </div>
                                    <div class="col-lg-10">
                                        <a href="" style="font-size: 20px; color: #c2c2d9; font-weight: 800;">Lorem ipsum dolor sit amet consectetur adipisicing.</a>
                                        <p class="mb-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Aspernatur id nihil praesentium reprehenderit a placeat veritatis provident voluptate ad doloremque?</p>
                                        <div class="d-flex justify-content-between align-items-center">

                                            <small>Kamis, 15 Februari 2024 - 14.25 WIB <br> Author By <a href="#">Jaya Kusuma</a></small>
                                            <a href="" class="btn btn-xs btn-info"><i class="fa-solid fa-info" ></i></a>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="berita row">
                                    <div class="col-lg-2 text-center">
                                        <img src="<?php echo e(asset('storage/images/default/default-profile.jpg')); ?>" style="" class="rounded" alt="">
                                    </div>
                                    <div class="col-lg-10">
                                        <a href="" style="font-size: 20px; color: #c2c2d9; font-weight: 800;">Lorem ipsum dolor sit amet consectetur adipisicing.</a>
                                        <p class="mb-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Aspernatur id nihil praesentium reprehenderit a placeat veritatis provident voluptate ad doloremque?</p>
                                        <div class="d-flex justify-content-between align-items-center">

                                            <small>Kamis, 15 Februari 2024 - 14.25 WIB <br> Author By <a href="#">Jaya Kusuma</a></small>
                                            <a href="" class="btn btn-xs btn-info"><i class="fa-solid fa-info" ></i></a>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="berita row">
                                    <div class="col-lg-2 text-center">
                                        <img src="<?php echo e(asset('storage/images/default/default-profile.jpg')); ?>" style="" class="rounded" alt="">
                                    </div>
                                    <div class="col-lg-10">
                                        <a href="" style="font-size: 20px; color: #c2c2d9; font-weight: 800;">Lorem ipsum dolor sit amet consectetur adipisicing.</a>
                                        <p class="mb-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Aspernatur id nihil praesentium reprehenderit a placeat veritatis provident voluptate ad doloremque?</p>
                                        <div class="d-flex justify-content-between align-items-center">

                                            <small>Kamis, 15 Februari 2024 - 14.25 WIB <br> Author By <a href="#">Jaya Kusuma</a></small>
                                            <a href="" class="btn btn-xs btn-info"><i class="fa-solid fa-info" ></i></a>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center">
                            <nav aria-label="Page navigation example">
                                <ul class="pagination pagination-primary  justify-content-center">
                                    <li class="page-item disabled">
                                        <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                                    </li>
                                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item">
                                        <a class="page-link" href="#">Next</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>

    
                    </div>
                    <div class="col-lg-4 col-12">
                        <div class="card mb-3">
                            <div class="card-body">
                                <h4 class="card-title text-center">Sambutan Rektor</h4>
                                <img src="<?php echo e(asset('storage/images/default/default-profile.jpg')); ?>" class="card-img-top mb-2" alt="">
                                <p class="text-center">Drs. Mulawarman Sudono, S.Tek <br>Rektor Utama Esec Academy</p>
                                <hr>
                                <p style="text-align: justify">Lorem ipsum dolor sit amet consectetur adipisicing elit. Inventore dolore laboriosam praesentium quas voluptatem ab facere repellendus reiciendis, fuga odio sequi. Nisi architecto totam eaque magnam hic cum aperiam commodi.</p>
                            </div>
                        </div>
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="list-group list-group-horizontal-sm mb-1 text-center" role="tablist">
                                    <a class="list-group-item list-group-item-action active" id="list-terbaru-list"
                                        data-bs-toggle="list" href="#list-terbaru" role="tab">Berita Terbaru</a>
                                    <a class="list-group-item list-group-item-action" id="list-terpopular-list"
                                        data-bs-toggle="list" href="#list-terpopular" role="tab">Berita Terpopuler</a>
                                </div>
                                <div class="tab-content text-justify" style="text-align: justify">
                                    <div class="tab-pane fade show active" id="list-terbaru" role="tabpanel"
                                        aria-labelledby="list-terbaru-list">Irure enim occaecat labore sit qui aliquip
                                        reprehenderit amet
                                        velit. Deserunt ullamco ex elit nostrud ut dolore nisi officia magna sit occaecat
                                        laboris sunt dolor.
                                        Nisi eu minim cillum occaecat aute est cupidatat aliqua labore aute occaecat ea
                                        aliquip
                                        sunt amet.
                                        Aute mollit dolor ut exercitation irure commodo non amet consectetur quis amet
                                        culpa.
                                        Quis ullamco
                                        nisi amet qui aute irure eu. Magna labore dolor quis ex labore id nostrud deserunt
                                        dolor
                                        eiusmod eu
                                        pariatur culpa mollit in irure Lorem, ipsum dolor sit amet consectetur adipisicing
                                        elit.
                                        Iusto quis
                                        porro doloribus est natus doloremque, eos laudantium
                                        exercitationem impedit sapiente tenetur soluta reiciendis deserunt!</div>
                                    <div class="tab-pane fade" id="list-terpopular" role="tabpanel"
                                        aria-labelledby="list-terpopular-list">Cupidatat
                                        quis ad sint excepteur laborum in esse qui. Et excepteur consectetur ex nisi eu do
                                        cillum ad laborum.
                                        Mollit et eu officia dolore sunt Lorem culpa qui commodo velit ex amet id ex.
                                        Officia
                                        anim incididunt
                                        laboris deserunt anim aute dolor incididunt veniam aute dolore do exercitation.
                                        Dolor
                                        nisi culpa ex ad
                                        irure in elit eu dolore. Ad laboris ipsum reprehenderit irure non commodo enim culpa
                                        commodo veniam
                                        incididunt veniam ad. Lorem ipsum dolor sit amet consectetur, adipisicing elit.
                                        Exercitationem, porro!
                                        Amet soluta tempora eveniet blanditiis alias eos, dolor qui consectetur!
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <footer>
                <div class="container">
                    <?php echo $__env->make('base.panel.base-panel-footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            </footer>
        </div>
    </div>
    <script src="<?php echo e(asset('dist')); ?>/assets/static/js/components/dark.js"></script>
    <script src="<?php echo e(asset('dist')); ?>/assets/static/js/pages/horizontal-layout.js"></script>
    <script src="<?php echo e(asset('dist')); ?>/assets/extensions/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    
    <script src="<?php echo e(asset('dist')); ?>/assets/compiled/js/app.js"></script>
    
    
    <script src="<?php echo e(asset('dist')); ?>/assets/extensions/apexcharts/apexcharts.min.js"></script>
    <script src="<?php echo e(asset('dist')); ?>/assets/static/js/pages/dashboard.js"></script>

</body>

</html><?php /**PATH /home/siakadpt/htdocs/siakad-pt.internal-dev.id/resources/views/base/base-root-index.blade.php ENDPATH**/ ?>