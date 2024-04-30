<ul class="menu">
    @guest
        <!-- Bagian menu ini akan disembunyikan ketika pengguna adalah "guest" -->
    @else
        <!-- Bagian menu untuk pengguna yang telah login -->
        {{-- HAK AKSES WEB ADMINISTRATOR --}}
        <li class="sidebar-title">Menu</li>
        <li class="sidebar-item">
            <a href="{{ route($prefix.'home-index') }}" class='sidebar-link'>
                <i class="fa-solid fa-home"></i>
                <span>Home</span>
            </a>
        </li>
        <li class="sidebar-item">
            <a href="{{ route($prefix.'home-profile') }}" class='sidebar-link'>
                <i class="fa-solid fa-user-edit"></i>
                <span>Profile User</span>
            </a>
        </li>
        <li class="sidebar-item">
            <a href="{{ route($prefix.'home-presensi') }}" class='sidebar-link'>
                <i class="fa-solid fa-calendar-check"></i>
                <span>Jurnal Presensi</span>
            </a>
        </li>
        @if (Auth::user()->raw_type === 0)
        {{-- MENU KHUSUS UNTUK WEB ADMINISTRATOR --}}
        @include('user.admin.admin-sidebar-index')
        {{-- END -- MENU KHUSUS UNTUK WEB ADMINISTRATOR --}}
        
        @elseif(Auth::user()->raw_type === 2)
        {{-- MENU KHUSUS UNTUK STAFF ADMINISTRASI --}}
    
        {{-- END -- MENU KHUSUS UNTUK STAFF ADMINISTRASI --}}
        @endif
    @endguest

    <!-- Menu untuk mahasiswa -->
    @auth('mahasiswa')
    @include('mahasiswa.sidebar-index')
    @endauth

    <!-- Menu untuk dosen -->
    @auth('dosen')
        <li class="sidebar-item">
            <a href="{{ route('dosen.home-index') }}" class='sidebar-link'>
                <i class="fa-solid fa-home"></i>
                <span>Home</span>
            </a>
        </li>
        <li class="sidebar-item">
            <a href="{{ route('dosen.home-profile') }}" class='sidebar-link'>
                <i class="fa-solid fa-user-edit"></i>
                <span>Profile User</span>
            </a>
        </li>
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
