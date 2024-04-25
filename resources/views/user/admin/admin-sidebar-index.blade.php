        {{-- MENU KHUSUS UNTUK WEB ADMINISTRATOR --}}
        <li class="sidebar-title">Data Master Akademik</li>
        <li class="sidebar-item has-sub {{ Route::is('web-admin.master.*', request()->path()) ? 'active' : '' }}">
            <a href="#" class='sidebar-link'>
                <i class="fa-solid fa-school"></i>
                <span>Data Master</span>
            </a>
            <ul class="submenu">
                <li class="submenu-item {{ Route::is('web-admin.master.fakultas-index', request()->path()) ? 'active' : '' }}">
                    <a href="{{ route('web-admin.master.fakultas-index') }}" class="submenu-link">Data Fakultas</a>
                </li>
                <li class="submenu-item {{ Route::is('web-admin.master.pstudi-index', request()->path()) ? 'active' : '' }}">
                    <a href="{{ route('web-admin.master.pstudi-index') }}" class="submenu-link">Data Program Studi</a>
                </li>
            </ul>
        </li>
        <li class="sidebar-title">Talent Management</li>
        <li class="sidebar-item has-sub">
            <a href="#" class='sidebar-link'>
                <i class="fa-solid fa-users"></i>
                <span>Users Manager</span>
            </a>
            <ul class="submenu">
                <li class="submenu-item">
                    <a href="{{ route('web-admin.staffmanager-admin-index') }}" class="submenu-link">Manage Admin</a>
                </li>
                <li class="submenu-item">
                    <a href="{{ route('web-admin.staffmanager-staff-index') }}" class="submenu-link">Manage Staff</a>
                </li>
                <li class="submenu-item">
                    <a href="{{ route('web-admin.staffmanager-dosen-index') }}" class="submenu-link">Manage Lecturers</a>
                </li>
            </ul>
        </li>
        <li class="sidebar-item has-sub">
            <a href="#" class='sidebar-link'>
                <i class="fa-solid fa-list-check"></i>
                <span>Report Manager</span>
            </a>
            <ul class="submenu">
                <li class="submenu-item">
                    <a href="{{ route('web-admin.staffmanager-admin-index') }}" class="submenu-link">Daily Report</a>
                </li>
                <li class="submenu-item">
                    <a href="{{ route('web-admin.staffmanager-admin-index') }}" class="submenu-link">Monthly Report</a>
                </li>
                <li class="submenu-item">
                    <a href="{{ route('web-admin.staffmanager-admin-index') }}" class="submenu-link">Presence Report</a>
                </li>
            </ul>
        </li>
        {{-- END -- MENU KHUSUS UNTUK WEB ADMINISTRATOR --}}