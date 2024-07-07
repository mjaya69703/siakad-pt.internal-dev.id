<ul class="menu">
    @guest
        <!-- Bagian menu ini akan disembunyikan ketika pengguna adalah "guest" -->
    @else
        @include('user.sidebar-index')
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
        @elseif(Auth::user()->raw_type === 5)
            {{-- MENU KHUSUS UNTUK DEPARTEMENT OFFICER --}}
            @include('user.support.home-sidebar')
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


    @guest

    @else

        @if (Auth::user()->raw_type === 0)
            <li class="sidebar-title">Special Menu</li>

            <li class="sidebar-item  {{ Route::is($prefix . 'system.setting-index', request()->path()) ? 'active' : '' }}">
                <a href="{{ route($prefix . 'system.setting-index') }}" class='sidebar-link'>
                    <i class="fa-solid fa-gear"></i>
                    <span>Web Settings</span>
                </a>
            </li>
        @endif
    @endguest

</ul>
