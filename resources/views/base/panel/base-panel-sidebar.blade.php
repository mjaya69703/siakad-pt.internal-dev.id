<ul class="menu">
    @guest
        <!-- Bagian menu ini akan disembunyikan ketika pengguna adalah "guest" -->
    @else
        <!-- Bagian menu untuk pengguna yang telah login -->
        {{-- HAK AKSES WEB ADMINISTRATOR --}}
        <li class="sidebar-title">Menu</li>
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
        <li class="sidebar-item  {{ Route::is($prefix . 'system.notify-index', request()->path()) ? 'active' : '' }}">
            <a href="{{ route($prefix . 'system.notify-index') }}" class='sidebar-link'>
                <i class="fa-solid fa-bell"></i>
                <span>Notifikasi</span>
            </a>
        </li>
        @if (Auth::user()->raw_type === 0)
            {{-- MENU KHUSUS UNTUK WEB ADMINISTRATOR --}}
            @include('user.admin.admin-sidebar-index')
            {{-- END -- MENU KHUSUS UNTUK WEB ADMINISTRATOR --}}
        @elseif(Auth::user()->raw_type === 1)
            {{-- MENU KHUSUS UNTUK DEPARTEMENT FINANCE --}}
            @include('user.finance.home-sidebar')
            {{-- END -- MENU KHUSUS UNTUK DEPARTEMENT FINANCE --}}
        @elseif(Auth::user()->raw_type === 2)
            {{-- MENU KHUSUS UNTUK DEPARTEMENT OFFICER --}}
            @include('user.officer.home-sidebar')
            {{-- END -- MENU KHUSUS UNTUK DEPARTEMENT OFFICER --}}
        @elseif(Auth::user()->raw_type === 3)
            {{-- MENU KHUSUS UNTUK DEPARTEMENT OFFICER --}}
            @include('user.academic.home-sidebar')
            {{-- END -- MENU KHUSUS UNTUK DEPARTEMENT OFFICER --}}
        @endif
    @endguest

    <!-- Menu untuk mahasiswa -->
    @auth('mahasiswa')
        @include('mahasiswa.sidebar-index')
    @endauth

    <!-- Menu untuk dosen -->
    @auth('dosen')
        @include('dosen.home-sidebar')
    @endauth

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
