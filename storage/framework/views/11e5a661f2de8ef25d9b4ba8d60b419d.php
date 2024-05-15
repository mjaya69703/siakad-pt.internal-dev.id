<li class="sidebar-item  <?php echo e(Route::is('mahasiswa.home-index', request()->path()) ? 'active' : ''); ?>">
    <a href="<?php echo e(route('mahasiswa.home-index')); ?>" class='sidebar-link'>
        <i class="fa-solid fa-home"></i>
        <span>Home</span>
    </a>
</li>
<li class="sidebar-item  <?php echo e(Route::is('mahasiswa.home-profile*', request()->path()) ? 'active' : ''); ?>">
    <a href="<?php echo e(route('mahasiswa.home-profile')); ?>" class='sidebar-link'>
        <i class="fa-solid fa-user-edit"></i>
        <span>Profile User</span>
    </a>
</li>
<li class="sidebar-item  <?php echo e(Route::is('mahasiswa.home-jadkul-*', request()->path()) ? 'active' : ''); ?>">
    <a href="<?php echo e(route('mahasiswa.home-jadkul-index')); ?>" class='sidebar-link'>
        <i class="fa-solid fa-calendar"></i>
        <span>Jadwal Kuliah</span>
    </a>
</li>
<li class="sidebar-item  <?php echo e(Route::is('mahasiswa.home-tagihan-*', request()->path()) ? 'active' : ''); ?>">
    <a href="<?php echo e(route('mahasiswa.home-tagihan-index')); ?>" class='sidebar-link'>
        <i class="fa-solid fa-file-invoice"></i>
        <span>Data Tagihan</span>
    </a>
</li><?php /**PATH /home/siakadpt/htdocs/siakad-pt.internal-dev.id/resources/views/mahasiswa/sidebar-index.blade.php ENDPATH**/ ?>