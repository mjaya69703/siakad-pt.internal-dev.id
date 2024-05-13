<ul class="menu">
    <?php if(auth()->guard()->guest()): ?>
        <!-- Bagian menu ini akan disembunyikan ketika pengguna adalah "guest" -->
    <?php else: ?>
        <!-- Bagian menu untuk pengguna yang telah login -->
        
        <li class="sidebar-title">Menu</li>
        <li class="sidebar-item">
            <a href="<?php echo e(route($prefix.'home-index')); ?>" class='sidebar-link'>
                <i class="fa-solid fa-home"></i>
                <span>Home</span>
            </a>
        </li>
        <li class="sidebar-item">
            <a href="<?php echo e(route($prefix.'home-profile')); ?>" class='sidebar-link'>
                <i class="fa-solid fa-user-edit"></i>
                <span>Profile User</span>
            </a>
        </li>
        <li class="sidebar-item">
            <a href="<?php echo e(route($prefix.'home-presensi')); ?>" class='sidebar-link'>
                <i class="fa-solid fa-calendar-check"></i>
                <span>Jurnal Presensi</span>
            </a>
        </li>
        <?php if(Auth::user()->raw_type === 0): ?>
        
        <?php echo $__env->make('user.admin.admin-sidebar-index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        
        
        <?php elseif(Auth::user()->raw_type === 2): ?>
        
    
        
        <?php endif; ?>
    <?php endif; ?>

    <!-- Menu untuk mahasiswa -->
    <?php if(auth()->guard('mahasiswa')->check()): ?>
    <?php echo $__env->make('mahasiswa.sidebar-index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>

    <!-- Menu untuk dosen -->
    <?php if(auth()->guard('dosen')->check()): ?>
        <li class="sidebar-item">
            <a href="<?php echo e(route('dosen.home-index')); ?>" class='sidebar-link'>
                <i class="fa-solid fa-home"></i>
                <span>Home</span>
            </a>
        </li>
        <li class="sidebar-item">
            <a href="<?php echo e(route('dosen.home-profile')); ?>" class='sidebar-link'>
                <i class="fa-solid fa-user-edit"></i>
                <span>Profile User</span>
            </a>
        </li>
    <?php endif; ?>

    <li class="sidebar-title">Multi Menu</li>
    <li class="sidebar-item has-sub">
        <a href="#" class='sidebar-link'>
            <i class="fa-solid fa-school"></i>
            <span>Nama Menu</span>
        </a>
        <ul class="submenu">
            <li class="submenu-item">
                <a href="#" class="submenu-link">Contoh Submenu</a>
            </li>
        </ul>
    </li>
</ul>
<?php /**PATH /home/siakadpt/htdocs/siakad-pt.internal-dev.id/resources/views/base/panel/base-panel-sidebar.blade.php ENDPATH**/ ?>