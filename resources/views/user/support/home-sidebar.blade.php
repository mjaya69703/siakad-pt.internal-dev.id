

<li class="sidebar-title">Support Departement</li>

        <li class="sidebar-item has-sub {{ Route::is($prefix.'inventory.*', request()->path()) ? 'active' : '' }}">
            <a href="#" class='sidebar-link'>
                <i class="fa-solid fa-school"></i>
                <span>Master Inventaris</span>
            </a>
            <ul class="submenu">
                <li class="submenu-item {{ Route::is($prefix.'inventory.gedung-*', request()->path()) ? 'active' : '' }}">
                    <a href="{{ route($prefix.'inventory.gedung-index') }}" class="submenu-link">Data Gedung</a>
                </li>
                <li class="submenu-item {{ Route::is($prefix.'inventory.ruang-*', request()->path()) ? 'active' : '' }}">
                    <a href="{{ route($prefix.'inventory.ruang-index') }}" class="submenu-link">Data Ruangan</a>
                </li>
            </ul>
        </li>