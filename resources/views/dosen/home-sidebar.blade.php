        <li class="sidebar-item {{ Route::is('dosen.home-index*', request()->path()) ? 'active' : '' }}">
            <a href="{{ route('dosen.home-index') }}" class='sidebar-link'>
                <i class="fa-solid fa-home"></i>
                <span>Home</span>
            </a>
        </li>
        <li class="sidebar-item {{ Route::is('dosen.home-profile*', request()->path()) ? 'active' : '' }}">
            <a href="{{ route('dosen.home-profile') }}" class='sidebar-link'>
                <i class="fa-solid fa-user-edit"></i>
                <span>Profile User</span>
            </a>
        </li>
        <li class="sidebar-title">Data Akademik</li>

        <li class="sidebar-item {{ Route::is('dosen.akademik.jadwal-*', request()->path()) ? 'active' : '' }}">
            <a href="{{ route('dosen.akademik.jadwal-index') }}" class='sidebar-link'>
                <i class="fa-solid fa-calendar"></i>
                <span>Jadwal Perkuliahan</span>
            </a>
        </li>
        <li class="sidebar-item {{ Route::is('dosen.akademik.stask-*', request()->path()) ? 'active' : '' }}">
            <a href="{{ route('dosen.akademik.stask-index') }}" class='sidebar-link'>
                <i class="fa-solid fa-tasks"></i>
                <span>Kelola Tugas</span>
            </a>
        </li>
