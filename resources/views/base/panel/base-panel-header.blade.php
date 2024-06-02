<nav class="navbar navbar-expand navbar-light navbar-top">
    <div class="container-fluid">
        <a href="#" class="burger-btn d-block">
            <i class="bi bi-justify fs-3"></i>
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-lg-0">
                <li class="nav-item dropdown me-1">
                    <a class="nav-link active dropdown-toggle text-gray-600" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class='bi bi-envelope bi-sub fs-4'></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-lg-end" aria-labelledby="dropdownMenuButton">
                        <li>
                            <h6 class="dropdown-header">Mail</h6>
                        </li>
                        <li><a class="dropdown-item" href="#">No new mail</a></li>
                    </ul>
                </li>
                        @php
                            $notif = App\Models\Notification::latest()->paginate(2);
                        @endphp
                <li class="nav-item dropdown me-3">
                    <a class="nav-link active dropdown-toggle text-gray-600" href="#" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false">
                        <i class='bi bi-bell bi-sub fs-4'></i>
                        <span class="badge badge-notification bg-danger">{{ $notif->count() }}</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end notification-dropdown" aria-labelledby="dropdownMenuButton">
                        <li class="dropdown-header">
                            <h6>Notifications</h6>
                        </li>

                        @foreach ($notif as $item)

                        <li class="dropdown-item notification-item">
                            <a class="d-flex align-items-center" href="#">
                                <div class="notification-icon bg-primary">
                                    <i class="fa-solid fa-bell"></i>
                                </div>
                                <div class="notification-text ms-4">
                                    <p class="notification-title font-bold">{{ $item->name }}</p>
                                    <p class="notification-subtitle font-thin text-sm">{{ substr($item->desc, 0 ,25) }}</p>
                                </div>
                            </a>
                        </li>
                        @endforeach
                        <li>
                            <p class="text-center py-2 mb-0"><a href="#">See all notification</a></p>
                        </li>
                    </ul>
                </li>
            </ul>
            <div class="dropdown">
                <a href="#" data-bs-toggle="dropdown" aria-expanded="false">
                    <div class="user-menu d-flex">
                        <div class="user-name text-end me-3">
                            @auth('dosen')
                                <h6 class="mb-0 text-gray-600">{{ Auth::guard('dosen')->user()->dsn_name }}</h6>
                                <p class="mb-0 text-sm text-gray-600">{{ Auth::guard('dosen')->user()->dsn_stat }}</p>
                            @else
                                @auth('mahasiswa')
                                    <h6 class="mb-0 text-gray-600">{{ Auth::guard('mahasiswa')->user()->mhs_name }}</h6>
                                    <p class="mb-0 text-sm text-gray-600">{{ Auth::guard('mahasiswa')->user()->mhs_stat }}</p>
                                @else
                                    @auth
                                        <h6 class="mb-0 text-gray-600">{{ Auth::user()->name }}</h6>
                                        <p class="mb-0 text-sm text-gray-600">{{ Auth::user()->type }}</p>
                                    @endauth
                                @endauth
                            @endauth
                        </div>
                        <div class="user-img d-flex align-items-center">
                            <div class="avatar avatar-md">
                                @auth('mahasiswa')
                                    <img style="object-fit: cover !important;" src="{{ asset('storage/images/' . Auth::guard('mahasiswa')->user()->mhs_image) }}">
                                @else
                                    @auth('dosen')
                                        <img style="object-fit: cover !important; "src="{{ asset('storage/images/' . Auth::guard('dosen')->user()->dsn_image) }}">
                                    @else
                                        @auth
                                            <img style="object-fit: cover !important; "src="{{ asset('storage/images/' . Auth::user()->image) }}">
                                        @endauth
                                    @endauth
                                @endauth
                            </div>
                        </div>
                    </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton" style="min-width: 11rem;">
                    <li>
                        @auth('mahasiswa')
                            <h6 class="dropdown-header">Hello, {{ Auth::guard('mahasiswa')->user()->mhs_nim }}</h6>
                        @else
                            @auth('dosen')
                                <h6 class="dropdown-header">Hello, {{ Auth::guard('dosen')->user()->dsn_nidn }}</h6>
                            @else
                                @auth
                                    <h6 class="dropdown-header">Hello, {{ Auth::user()->user }}</h6>
                                @endauth
                            @endauth
                        @endauth
                    </li>
                    @auth
                        <li><a class="dropdown-item" href="{{ route($prefix.'home-profile') }}"><i class="icon-mid bi bi-person me-2"></i> My Profile</a></li>
                        <hr class="dropdown-divider">
                        <li><a class="dropdown-item" href="{{ route($prefix.'auth-signout-post') }}"><i class="icon-mid bi bi-box-arrow-left me-2"></i> Logout</a></li>
                    @endauth
                    @auth('mahasiswa')
                        <li><a class="dropdown-item" href="{{ route('mahasiswa.home-profile') }}"><i class="icon-mid bi bi-person me-2"></i> My Profile</a></li>
                        <hr class="dropdown-divider">
                        <li><a class="dropdown-item" href="{{ route('mahasiswa.auth-signout-post') }}"><i class="icon-mid bi bi-box-arrow-left me-2"></i> Logout</a></li>
                    @endauth
                    @auth('dosen')
                        <li><a class="dropdown-item" href="{{ route('dosen.home-profile') }}"><i class="icon-mid bi bi-person me-2"></i> My Profile</a></li>
                        <hr class="dropdown-divider">
                        <li><a class="dropdown-item" href="{{ route('dosen.auth-signout-post') }}"><i class="icon-mid bi bi-box-arrow-left me-2"></i> Logout</a></li>
                    @endauth
                </ul>
            </div>


        </div>
    </div>
</nav>
