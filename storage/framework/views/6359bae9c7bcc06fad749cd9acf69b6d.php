        
        <li class="sidebar-title">Finance Departement</li>
        <li class="sidebar-item has-sub <?php echo e(Route::is('web-admin.finance.*', request()->path()) ? 'active' : ''); ?>">
            <a href="#" class='sidebar-link'>
                <i class="fa-solid fa-user-tie"></i>
                <span>Data Keuangan</span>
            </a>
            <ul class="submenu">
                <li class="submenu-item <?php echo e(Route::is('web-admin.finance.tagihan-*', request()->path()) ? 'active' : ''); ?>">
                    <a href="<?php echo e(route('web-admin.finance.tagihan-index')); ?>" class="submenu-link">Data Tagihan</a>
                </li>
                <li class="submenu-item <?php echo e(Route::is('web-admin.finance.pembayaran-*', request()->path()) ? 'active' : ''); ?>">
                    <a href="<?php echo e(route('web-admin.finance.pembayaran-index')); ?>" class="submenu-link">Data Pembayaran</a>
                </li>
                <li class="submenu-item <?php echo e(Route::is('web-admin.finance.keuangan-*', request()->path()) ? 'active' : ''); ?>">
                    <a href="<?php echo e(route('web-admin.finance.keuangan-index')); ?>" class="submenu-link">Data Keuangan</a>
                </li>
            </ul>
        </li>

        
        
        <li class="sidebar-title">Data Master</li>
        <li class="sidebar-item has-sub <?php echo e(Route::is('web-admin.workers.*', request()->path()) ? 'active' : ''); ?>">
            <a href="#" class='sidebar-link'>
                <i class="fa-solid fa-user-tie"></i>
                <span>Data Master Pengguna</span>
            </a>
            <ul class="submenu">
                <li class="submenu-item <?php echo e(Route::is('web-admin.workers.admin-*', request()->path()) ? 'active' : ''); ?>">
                    <a href="<?php echo e(route('web-admin.workers.admin-index')); ?>" class="submenu-link">Data Admin</a>
                </li>
                <li class="submenu-item <?php echo e(Route::is('web-admin.workers.staff-*', request()->path()) ? 'active' : ''); ?>">
                    <a href="<?php echo e(route('web-admin.workers.staff-index')); ?>" class="submenu-link">Data Pegawai</a>
                </li>
                <li class="submenu-item <?php echo e(Route::is('web-admin.workers.lecture-*', request()->path()) ? 'active' : ''); ?>">
                    <a href="<?php echo e(route('web-admin.workers.lecture-index')); ?>" class="submenu-link">Data Dosen</a>
                </li>
                <li class="submenu-item <?php echo e(Route::is('web-admin.workers.student-*', request()->path()) ? 'active' : ''); ?>">
                    <a href="<?php echo e(route('web-admin.workers.student-index')); ?>" class="submenu-link">Data Mahasiswa</a>
                </li>
            </ul>
        </li>
        <li class="sidebar-item has-sub <?php echo e(Route::is('web-admin.master.*', request()->path()) ? 'active' : ''); ?>">
            <a href="#" class='sidebar-link'>
                <i class="fa-solid fa-school"></i>
                <span>Data Master Akademik</span>
            </a>
            <ul class="submenu">
                <li class="submenu-item <?php echo e(Route::is('web-admin.master.fakultas-*', request()->path()) ? 'active' : ''); ?>">
                    <a href="<?php echo e(route('web-admin.master.fakultas-index')); ?>" class="submenu-link">Data Fakultas</a>
                </li>
                <li class="submenu-item <?php echo e(Route::is('web-admin.master.pstudi-*', request()->path()) ? 'active' : ''); ?>">
                    <a href="<?php echo e(route('web-admin.master.pstudi-index')); ?>" class="submenu-link">Data Program Studi</a>
                </li>
                <li class="submenu-item <?php echo e(Route::is('web-admin.master.taka-*', request()->path()) ? 'active' : ''); ?>">
                    <a href="<?php echo e(route('web-admin.master.taka-index')); ?>" class="submenu-link">Data Tahun Akademik</a>
                </li>
                <li class="submenu-item <?php echo e(Route::is('web-admin.master.proku-*', request()->path()) ? 'active' : ''); ?>">
                    <a href="<?php echo e(route('web-admin.master.proku-index')); ?>" class="submenu-link">Data Program Kuliah</a>
                </li>
                <li class="submenu-item <?php echo e(Route::is('web-admin.master.kurikulum-*', request()->path()) ? 'active' : ''); ?>">
                    <a href="<?php echo e(route('web-admin.master.kurikulum-index')); ?>" class="submenu-link">Data Kurikulum</a>
                </li>
                <li class="submenu-item <?php echo e(Route::is('web-admin.master.kelas-*', request()->path()) ? 'active' : ''); ?>">
                    <a href="<?php echo e(route('web-admin.master.kelas-index')); ?>" class="submenu-link">Data Kelas</a>
                </li>
                <li class="submenu-item <?php echo e(Route::is('web-admin.master.matkul-*', request()->path()) ? 'active' : ''); ?>">
                    <a href="<?php echo e(route('web-admin.master.matkul-index')); ?>" class="submenu-link">Data Mata Kuliah</a>
                </li>
                <li class="submenu-item <?php echo e(Route::is('web-admin.master.jadkul-*', request()->path()) ? 'active' : ''); ?>">
                    <a href="<?php echo e(route('web-admin.master.jadkul-index')); ?>" class="submenu-link">Data Jadwal Kuliah</a>
                </li>
            </ul>
        </li>
        <li class="sidebar-item has-sub <?php echo e(Route::is('web-admin.inventory.*', request()->path()) ? 'active' : ''); ?>">
            <a href="#" class='sidebar-link'>
                <i class="fa-solid fa-school"></i>
                <span>Data Master Inventaris</span>
            </a>
            <ul class="submenu">
                <li class="submenu-item <?php echo e(Route::is('web-admin.inventory.gedung-*', request()->path()) ? 'active' : ''); ?>">
                    <a href="<?php echo e(route('web-admin.inventory.gedung-index')); ?>" class="submenu-link">Data Gedung</a>
                </li>
                <li class="submenu-item <?php echo e(Route::is('web-admin.inventory.ruang-*', request()->path()) ? 'active' : ''); ?>">
                    <a href="<?php echo e(route('web-admin.inventory.ruang-index')); ?>" class="submenu-link">Data Ruangan</a>
                </li>
            </ul>
        </li>

        <li class="sidebar-title">Talent Management</li>
        <li class="sidebar-item has-sub">
            <a href="#" class='sidebar-link'>
                <i class="fa-solid fa-list-check"></i>
                <span>Report Manager</span>
            </a>
            <ul class="submenu">
                <li class="submenu-item">
                    <a href="#" class="submenu-link">Daily Report</a>
                </li>
                <li class="submenu-item">
                    <a href="#" class="submenu-link">Monthly Report</a>
                </li>
                <li class="submenu-item">
                    <a href="#" class="submenu-link">Presence Report</a>
                </li>
            </ul>
        </li>
        <?php /**PATH /home/siakadpt/htdocs/siakad-pt.internal-dev.id/resources/views/user/admin/admin-sidebar-index.blade.php ENDPATH**/ ?>