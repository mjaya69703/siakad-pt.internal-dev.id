        <!-- Bagian menu untuk pengguna yang telah login -->
        {{-- HAK AKSES WEB ADMINISTRATOR --}}
        <li class="sidebar-item {{ Route::is($prefix . 'home-index', request()->path()) ? 'active' : '' }}">
            <a href="{{ route($prefix . 'home-index') }}" class='sidebar-link'>
                <i class="fa-solid fa-home"></i>
                <span>Home</span>
            </a>
        </li>
        <li class="sidebar-item {{ Route::is($prefix . 'home-profile', request()->path()) ? 'active' : '' }}">
            <a href="{{ route($prefix . 'home-profile') }}" class='sidebar-link'>
                <i class="fa-solid fa-user-edit"></i>
                <span>Profile User</span>
            </a>
        </li>

        <li class="sidebar-title">Menu Rutinitas</li>
        <li class="sidebar-item  {{ Route::is($prefix . 'presensi.absen-harian', request()->path()) ? 'active' : '' }}">
            <a href="{{ route($prefix . 'presensi.absen-harian') }}" class='sidebar-link'>
                <i class="fa-solid fa-calendar-check"></i>
                <span>Absen Harian</span>
            </a>
        </li>
        <li class="sidebar-item  {{ Route::is($prefix . 'presensi.absen-izin-cuti', request()->path()) ? 'active' : '' }}">
            <a href="{{ route($prefix . 'presensi.absen-izin-cuti') }}" class='sidebar-link'>
                <i class="fa-solid fa-calendar-xmark"></i>
                <span>Absen Izin & Cuti</span>
            </a>
        </li>
        <li class="sidebar-item  {{ Route::is($prefix . 'support.ticket-index', request()->path()) ? 'active' : '' }}">
            <a href="{{ route($prefix . 'support.ticket-index') }}" class='sidebar-link'>
                <i class="fa-solid fa-ticket"></i>
                <span>Support Ticket</span>
            </a>
        </li>

        <li class="sidebar-title">Menu Publikasi</li>
        <li class="sidebar-item  {{ Route::is($prefix . 'system.notify-index', request()->path()) ? 'active' : '' }}">
            <a href="{{ route($prefix . 'system.notify-index') }}" class='sidebar-link'>
                <i class="fa-solid fa-bell"></i>
                <span>Data Pemberitahuan</span>
            </a>
        </li>


        <li class="sidebar-item has-sub {{ Route::is($prefix.'news.*', request()->path()) ? 'active' : '' }}">
            <a href="#" class='sidebar-link'>
                <i class="fa-solid fa-newspaper"></i>
                <span>Data Berita</span>
            </a>
            <ul class="submenu">
                <li class="submenu-item {{ Route::is($prefix . 'news.post-*', request()->path()) ? 'active' : '' }}">
                    <a href="{{ route($prefix . 'news.post-index') }}" class="submenu-link">Berita</a>
                </li>
                <li class="submenu-item {{ Route::is($prefix . 'news.category-*', request()->path()) ? 'active' : '' }}">
                    <a href="{{ route($prefix . 'news.category-index') }}" class="submenu-link">Kategori Berita</a>
                </li>
            </ul>
        </li>
        <li class="sidebar-item  {{ Route::is($prefix . 'publish.gallery-index', request()->path()) ? 'active' : '' }}">
            <a href="{{ route($prefix . 'publish.gallery-index') }}" class='sidebar-link'>
                <i class="fa-solid fa-images"></i>
                <span>Data Album Foto</span>
            </a>
        </li>
