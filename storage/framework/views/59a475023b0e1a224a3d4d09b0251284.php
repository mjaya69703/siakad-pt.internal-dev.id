<nav class="navbar navbar-expand navbar-light navbar-top">
    <div class="container-fluid">
        <a href="#" class="burger-btn d-block">
            <i class="bi bi-justify fs-3"></i>
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-lg-0">
                <li class="nav-item dropdown me-1">
                    <a class="nav-link active dropdown-toggle text-gray-600" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class='bi bi-envelope bi-sub fs-4'></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-lg-end" aria-labelledby="dropdownMenuButton">
                        <li>
                            <h6 class="dropdown-header">Mail</h6>
                        </li>
                        <li><a class="dropdown-item" href="#">No new mail</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown me-3">
                    <a class="nav-link active dropdown-toggle text-gray-600" href="#" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false">
                        <i class='bi bi-bell bi-sub fs-4'></i>
                        <span class="badge badge-notification bg-danger">7</span>
                    </a>
                    <ul class="dropdown-menu dropdown-center dropdown-menu-sm-end notification-dropdown" aria-labelledby="dropdownMenuButton">
                        <li class="dropdown-header">
                            <h6>Notifications</h6>
                        </li>
                        <li class="dropdown-item notification-item">
                            <a class="d-flex align-items-center" href="#">
                                <div class="notification-icon bg-primary">
                                    <i class="bi bi-cart-check"></i>
                                </div>
                                <div class="notification-text ms-4">
                                    <p class="notification-title font-bold">Successfully check out</p>
                                    <p class="notification-subtitle font-thin text-sm">Order ID #256</p>
                                </div>
                            </a>
                        </li>
                        <li class="dropdown-item notification-item">
                            <a class="d-flex align-items-center" href="#">
                                <div class="notification-icon bg-success">
                                    <i class="bi bi-file-earmark-check"></i>
                                </div>
                                <div class="notification-text ms-4">
                                    <p class="notification-title font-bold">Homework submitted</p>
                                    <p class="notification-subtitle font-thin text-sm">Algebra math homework</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <p class="text-center py-2 mb-0"><a href="#">See all notification</a></p>
                        </li>
                    </ul>
                </li>
            </ul>
            <div class="dropdown">
                <a href="#" data-bs-toggle="dropdown" aria-expanded="false">
                    <div class="user-menu d-flex">
                        <div class="user-name text-end me-3">
                            <?php if(auth()->guard('dosen')->check()): ?>
                                <h6 class="mb-0 text-gray-600"><?php echo e(Auth::guard('dosen')->user()->dsn_name); ?></h6>
                                <p class="mb-0 text-sm text-gray-600"><?php echo e(Auth::guard('dosen')->user()->dsn_stat); ?></p>
                            <?php else: ?>
                                <?php if(auth()->guard('mahasiswa')->check()): ?>
                                    <h6 class="mb-0 text-gray-600"><?php echo e(Auth::guard('mahasiswa')->user()->mhs_name); ?></h6>
                                    <p class="mb-0 text-sm text-gray-600"><?php echo e(Auth::guard('mahasiswa')->user()->mhs_stat); ?></p>
                                <?php else: ?>
                                    <?php if(auth()->guard()->check()): ?>
                                        <h6 class="mb-0 text-gray-600"><?php echo e(Auth::user()->name); ?></h6>
                                        <p class="mb-0 text-sm text-gray-600"><?php echo e(Auth::user()->type); ?></p>
                                    <?php endif; ?>
                                <?php endif; ?>
                            <?php endif; ?>
                        </div>
                        <div class="user-img d-flex align-items-center">
                            <div class="avatar avatar-md">
                                <?php if(auth()->guard('mahasiswa')->check()): ?>
                                    <img style="object-fit: cover !important;" src="<?php echo e(asset('storage/images/' . Auth::guard('mahasiswa')->user()->mhs_image)); ?>">
                                <?php else: ?>
                                    <?php if(auth()->guard('dosen')->check()): ?>
                                        <img style="object-fit: cover !important; "src="<?php echo e(asset('storage/images/' . Auth::guard('dosen')->user()->dsn_image)); ?>">
                                    <?php else: ?>
                                        <?php if(auth()->guard()->check()): ?>
                                            <img style="object-fit: cover !important; "src="<?php echo e(asset('storage/images/' . Auth::user()->image)); ?>">
                                        <?php endif; ?>
                                    <?php endif; ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton" style="min-width: 11rem;">
                    <li>
                        <?php if(auth()->guard('mahasiswa')->check()): ?>
                            <h6 class="dropdown-header">Hello, <?php echo e(Auth::guard('mahasiswa')->user()->mhs_nim); ?></h6>
                        <?php else: ?>
                            <?php if(auth()->guard('dosen')->check()): ?>
                                <h6 class="dropdown-header">Hello, <?php echo e(Auth::guard('dosen')->user()->dsn_nidn); ?></h6>
                            <?php else: ?>
                                <?php if(auth()->guard()->check()): ?>
                                    <h6 class="dropdown-header">Hello, <?php echo e(Auth::user()->user); ?></h6>
                                <?php endif; ?>
                            <?php endif; ?>
                        <?php endif; ?>
                    </li>
                    <?php if(auth()->guard()->check()): ?>
                        <li><a class="dropdown-item" href="<?php echo e(route($prefix.'home-profile')); ?>"><i class="icon-mid bi bi-person me-2"></i> My Profile</a></li>
                        <hr class="dropdown-divider">
                        <li><a class="dropdown-item" href="<?php echo e(route($prefix.'auth-signout-post')); ?>"><i class="icon-mid bi bi-box-arrow-left me-2"></i> Logout</a></li>
                    <?php endif; ?>
                    <?php if(auth()->guard('mahasiswa')->check()): ?>
                        <li><a class="dropdown-item" href="<?php echo e(route('mahasiswa.home-profile')); ?>"><i class="icon-mid bi bi-person me-2"></i> My Profile</a></li>
                        <hr class="dropdown-divider">
                        <li><a class="dropdown-item" href="<?php echo e(route('mahasiswa.auth-signout-post')); ?>"><i class="icon-mid bi bi-box-arrow-left me-2"></i> Logout</a></li>
                    <?php endif; ?>
                    <?php if(auth()->guard('dosen')->check()): ?>
                        <li><a class="dropdown-item" href="<?php echo e(route('dosen.home-profile')); ?>"><i class="icon-mid bi bi-person me-2"></i> My Profile</a></li>
                        <hr class="dropdown-divider">
                        <li><a class="dropdown-item" href="<?php echo e(route('dosen.auth-signout-post')); ?>"><i class="icon-mid bi bi-box-arrow-left me-2"></i> Logout</a></li>
                    <?php endif; ?>
                </ul>
            </div>
            
            
        </div>
    </div>
</nav>
<?php /**PATH /home/siakadpt/htdocs/siakad-pt.internal-dev.id/resources/views/base/panel/base-panel-header.blade.php ENDPATH**/ ?>