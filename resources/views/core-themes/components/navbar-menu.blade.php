<ul class="navbar-nav pt-lg-3">
    <li class="nav-item">
        <a class="nav-link {{ Route::is($spref . 'dashboard-render', request()->path()) ? 'active' : '' }}" href="{{ route($spref . 'dashboard-render') }}">
            <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler.io/icons/icon/home -->
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-1">
                    <path d="M5 12l-2 0l9 -9l9 9l-2 0" />
                    <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" />
                    <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" />
                </svg>
            </span>
            <span class="nav-link-title"> Homes </span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ Route::is($spref . 'profile-render', request()->path()) ? 'active' : '' }}" href="{{ route($spref . 'profile-render') }}">
            <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler.io/icons/icon/home -->
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-user-edit">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" />
                    <path d="M6 21v-2a4 4 0 0 1 4 -4h3.5" />
                    <path d="M18.42 15.61a2.1 2.1 0 0 1 2.97 2.97l-3.39 3.42h-3v-3l3.42 -3.39z" />
                </svg>
            </span>
            <span class="nav-link-title"> Profile </span>
        </a>
    </li>

    @if ($user->prefix == 'web-admin')
        @include('core-themes.components.navbar.web-admin')
    @elseif ($user->prefix == 'mahasiswa')
        @include('core-themes.components.navbar.mahasiswa')
    @endif


</ul>


                    


