<ul class="menu">
    @guest
        <!-- Bagian menu ini akan disembunyikan ketika pengguna adalah "guest" -->
    @else
        @include('user.sidebar-index')
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
