<li class="sidebar-title">Finance Departement</li>
<li class="sidebar-item has-sub {{ Route::is($prefix . 'finance.*', request()->path()) ? 'active' : '' }}">
    <a href="#" class='sidebar-link'>
        <i class="fa-solid fa-user-check"></i>
        <span>Data Absen</span>
    </a>
    <ul class="submenu">
        <li class="submenu-item {{ Route::is($prefix . 'finance.tagihan-*', request()->path()) ? 'active' : '' }}">
            <a href="{{ route($prefix . 'finance.tagihan-index') }}" class="submenu-link">Absensi Harian</a>
        </li>
        <li class="submenu-item {{ Route::is($prefix . 'finance.pembayaran-*', request()->path()) ? 'active' : '' }}">
            <a href="{{ route($prefix . 'finance.pembayaran-index') }}" class="submenu-link">Absensi Izin & Cuti</a>
        </li>
    </ul>
</li>
<li class="sidebar-item has-sub {{ Route::is($prefix . 'finance.*', request()->path()) ? 'active' : '' }}">
    <a href="#" class='sidebar-link'>
        <i class="fa-solid fa-user-tie"></i>
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
