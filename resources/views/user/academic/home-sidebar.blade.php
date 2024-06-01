        <li class="sidebar-title">Departement Akademik</li>
        <li class="sidebar-item {{ Route::is($prefix . 'workers.student-*', request()->path()) ? 'active' : '' }}">
            <a href="{{ route($prefix . 'workers.student-index') }}" class='sidebar-link'>
                <i class="fa-solid fa-users"></i>
                <span>Data Mahasiswa</span>
            </a>
        </li>
        <li class="sidebar-item has-sub {{ Route::is($prefix.'master.*', request()->path()) ? 'active' : '' }}">
            <a href="#" class='sidebar-link'>
                <i class="fa-solid fa-school"></i>
                <span>Master Akademik</span>
            </a>
            <ul class="submenu">
                <li class="submenu-item {{ Route::is($prefix.'master.kurikulum-*', request()->path()) ? 'active' : '' }}">
                    <a href="{{ route($prefix.'master.kurikulum-index') }}" class="submenu-link">Data Kurikulum</a>
                </li>
                <li class="submenu-item {{ Route::is($prefix.'master.kelas-*', request()->path()) ? 'active' : '' }}">
                    <a href="{{ route($prefix.'master.kelas-index') }}" class="submenu-link">Data Kelas</a>
                </li>
                <li class="submenu-item {{ Route::is($prefix.'master.matkul-*', request()->path()) ? 'active' : '' }}">
                    <a href="{{ route($prefix.'master.matkul-index') }}" class="submenu-link">Data Mata Kuliah</a>
                </li>
                <li class="submenu-item {{ Route::is($prefix.'master.jadkul-*', request()->path()) ? 'active' : '' }}">
                    <a href="{{ route($prefix.'master.jadkul-index') }}" class="submenu-link">Data Jadwal Kuliah</a>
                </li>
            </ul>
        </li>