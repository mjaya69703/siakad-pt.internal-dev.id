<li class="sidebar-title">Menu Finansial</li>
<li class="sidebar-item has-sub {{ Route::is($prefix . 'finance.*', request()->path()) ? 'active' : '' }}">
    <a href="#" class='sidebar-link'>
        <i class="fa-solid fa-vault"></i>
        <span>Data Keuangan</span>
    </a>
    <ul class="submenu">
        <li class="submenu-item {{ Route::is($prefix . 'finance.tagihan-*', request()->path()) ? 'active' : '' }}">
            <a href="{{ route($prefix . 'finance.tagihan-index') }}" class="submenu-link">Data Tagihan</a>
        </li>
        <li class="submenu-item {{ Route::is($prefix . 'finance.pembayaran-*', request()->path()) ? 'active' : '' }}">
            <a href="{{ route($prefix . 'finance.pembayaran-index') }}" class="submenu-link">Data Pembayaran</a>
        </li>
        <li class="submenu-item {{ Route::is($prefix . 'finance.keuangan-*', request()->path()) ? 'active' : '' }}">
            <a href="{{ route($prefix . 'finance.keuangan-index') }}" class="submenu-link">Data Keuangan</a>
        </li>
    </ul>
</li>
<li class="sidebar-title">Menu Administrasi</li>
<li class="sidebar-item has-sub {{ Route::is('web-admin.approval.*', request()->path()) ? 'active' : '' }}">
    <a href="#" class='sidebar-link'>
        <i class="fa-solid fa-file-signature"></i>
        <span>Data Approval</span>
    </a>
    <ul class="submenu">
        <li class="submenu-item {{ Route::is($prefix . 'approval.absen-*', request()->path()) ? 'active' : '' }}">
            <a href="{{ route($prefix . 'approval.absen-index') }}" class="submenu-link">Approval Absensi</a>
        </li>
    </ul>
</li>