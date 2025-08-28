
<ul class="navbar-nav">
    <li class="nav-item">
        <a class="nav-link" href="{{ route('root.home-index') }}">
            <span class="nav-link-icon d-md-none d-lg-inline-block">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-1">
                    <path d="M5 12l-2 0l9 -9l9 9l-2 0" />
                    <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" />
                    <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" />
                </svg>
            </span>
            <span class="nav-link-title">Beranda</span>
        </a>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#navbar-akademik" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false">
            <span class="nav-link-icon d-md-none d-lg-inline-block">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-1">
                    <path d="M22 9l-10 -4l-10 4l10 4l10 -4v6" />
                    <path d="M6 10.6v5.4a6 3 0 0 0 12 0v-5.4" />
                </svg>
            </span>
            <span class="nav-link-title">Akademik</span>
        </a>
        <div class="dropdown-menu">
            <div class="dropdown-menu-columns">
                <div class="dropdown-menu-column">
                    <a class="dropdown-item" href="{{ route('root.prodi-index') }}">Program Studi</a>
                    <a class="dropdown-item" href="/kalender-akademik">Kalender Akademik</a>
                    <a class="dropdown-item" href="/jadwal-kuliah">Jadwal Kuliah</a>
                    <a class="dropdown-item" href="/silabus">Silabus</a>
                    <a class="dropdown-item" href="/e-learning">E-Learning</a>
                </div>
            </div>
        </div>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#navbar-kemahasiswaan" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false">
            <span class="nav-link-icon d-md-none d-lg-inline-block">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-1">
                    <path d="M5 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" />
                    <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
                    <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                    <path d="M21 21v-2a4 4 0 0 0 -3 -3.85" />
                </svg>
            </span>
            <span class="nav-link-title">Kemahasiswaan</span>
        </a>
        <div class="dropdown-menu">
            <a class="dropdown-item" href="/organisasi">Organisasi Mahasiswa</a>
            <a class="dropdown-item" href="/beasiswa">Beasiswa</a>
            <a class="dropdown-item" href="/prestasi">Prestasi Mahasiswa</a>
            <a class="dropdown-item" href="/alumni">Alumni</a>
        </div>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#navbar-publikasi" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false">
            <span class="nav-link-icon d-md-none d-lg-inline-block">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-1">
                    <path d="M5 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" />
                    <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
                    <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                    <path d="M21 21v-2a4 4 0 0 0 -3 -3.85" />
                </svg>
            </span>
            <span class="nav-link-title">Publikasi</span>
        </a>
        <div class="dropdown-menu">
            <a class="dropdown-item" href="{{ route('root.pengumuman-index') }}">Pengumuman</a>
            <a class="dropdown-item" href="{{ route('root.berita-index') }}">Berita Kampus</a>
            <a class="dropdown-item" href="{{ route('root.kalender-akademik-index') }}">Kalender Akademik</a>
            <a class="dropdown-item" href="{{ route('root.galeri-index') }}">Galeri</a>
        </div>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#navbar-institusi" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false">
            <span class="nav-link-icon d-md-none d-lg-inline-block">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-1">
                    <path d="M3 21h18" />
                    <path d="M19 21v-4" />
                    <path d="M19 17a2 2 0 0 0 2 -2v-2a2 2 0 1 0 -4 0v2a2 2 0 0 0 2 2z" />
                    <path d="M14 21v-14a3 3 0 0 0 -3 -3h-4a3 3 0 0 0 -3 3v14" />
                    <path d="M9 17v4" />
                    <path d="M8 13h2" />
                    <path d="M8 9h2" />
                </svg>
            </span>
            <span class="nav-link-title">Institusi</span>
        </a>
        <div class="dropdown-menu">
            <a class="dropdown-item" href="/profil">Profil</a>
            <a class="dropdown-item" href="/visi-misi">Visi & Misi</a>
            <a class="dropdown-item" href="/struktur-organisasi">Struktur Organisasi</a>
            <a class="dropdown-item" href="/fasilitas">Fasilitas</a>
            <a class="dropdown-item" href="{{ route('root.galeri-index') }}">Galeri</a>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="/kontak">
            <span class="nav-link-icon d-md-none d-lg-inline-block">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-1">
                    <path d="M3 7a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v10a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-10z" />
                    <path d="M3 7l9 6l9 -6" />
                </svg>
            </span>
            <span class="nav-link-title">Kontak</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="/signin">
            <span class="nav-link-icon d-md-none d-lg-inline-block">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-1">
                    <path d="M22 9l-10 -4l-10 4l10 4l10 -4v6" />
                    <path d="M6 10.6v5.4a6 3 0 0 0 12 0v-5.4" />
                </svg>
            </span>
            <span class="nav-link-title">Portal</span>
        </a>
    </li>
</ul>