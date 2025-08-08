<li class="nav-item">
    <a class="nav-link {{ Route::is($spref . 'absensi-render', request()->path()) ? 'active' : '' }}" href="{{ route($spref . 'absensi-render') }}">
        <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler.io/icons/icon/home -->
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-user-check">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" />
                <path d="M6 21v-2a4 4 0 0 1 4 -4h4" />
                <path d="M15 19l2 2l4 -4" />
            </svg>
        </span>
        <span class="nav-link-title"> Absensi </span>
    </a>
</li>
<li class="nav-item">
    <span class="nav-link" href="">
        <span class="nav-link-title"> Data Master </span>
    </span>
</li>
<li class="nav-item dropdown">
    <a class="nav-link {{ Route::is($spref . 'pengguna.*', request()->path()) ? 'active' : '' }} dropdown-toggle" href="#navbar-form" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false">
        <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler.io/icons/icon/home -->
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-users">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M9 7m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0" />
                <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
                <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                <path d="M21 21v-2a4 4 0 0 0 -3 -3.85" />
            </svg>
        </span>
        <span class="nav-link-title"> Master Pengguna </span>
    </a>
    <div class="dropdown-menu">
        <a class="dropdown-item {{ Route::is($spref . 'pengguna.users-*', request()->path()) ? 'active' : '' }}" href="{{ route($spref . 'pengguna.users-render') }}">
            Staff
        </a>
        <a class="dropdown-item {{ Route::is($spref . 'pengguna.dosen-*', request()->path()) ? 'active' : '' }}" href="{{ route($spref . 'pengguna.dosen-render') }}">
            Dosen
        </a>
        <a class="dropdown-item {{ Route::is($spref . 'pengguna.mahasiswa-*', request()->path()) ? 'active' : '' }}" href="{{ route($spref . 'pengguna.mahasiswa-render') }}">
            Mahasiswa
        </a>

    </div>
</li>
<li class="nav-item dropdown">
    <a class="nav-link {{ Route::is($spref . 'publikasi.*', request()->path()) ? 'active' : '' }} dropdown-toggle" href="#navbar-form" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false">
        <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler.io/icons/icon/home -->
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-news">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M16 6h3a1 1 0 0 1 1 1v11a2 2 0 0 1 -4 0v-13a1 1 0 0 0 -1 -1h-10a1 1 0 0 0 -1 1v12a3 3 0 0 0 3 3h11" />
                <path d="M8 8l4 0" />
                <path d="M8 12l4 0" />
                <path d="M8 16l4 0" />
            </svg> </span>
        <span class="nav-link-title"> Master Publikasi </span>
    </a>
    <div class="dropdown-menu">
        <a class="dropdown-item {{ Route::is($spref . 'publikasi.kategori-*', request()->path()) ? 'active' : '' }}" href="{{ route($spref . 'publikasi.kategori-render') }}">
            Kategori
        </a>
        <a class="dropdown-item {{ Route::is($spref . 'publikasi.berita-*', request()->path()) ? 'active' : '' }}" href="{{ route($spref . 'publikasi.berita-render') }}">
            Berita
        </a>
        <a class="dropdown-item {{ Route::is($spref . 'publikasi.pengumuman-*', request()->path()) ? 'active' : '' }}" href="{{ route($spref . 'publikasi.pengumuman-render') }}">
            Pengumuman
        </a>
        <a class="dropdown-item {{ Route::is($spref . 'publikasi.galeri-*', request()->path()) ? 'active' : '' }}" href="{{ route($spref . 'publikasi.galeri-render') }}">
            Galeri
        </a>

    </div>
</li>
<li class="nav-item dropdown">
    <a class="nav-link {{ Route::is($spref . 'akademik.*', request()->path()) ? 'active' : '' }} dropdown-toggle" href="#navbar-form" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false">
        <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler.io/icons/icon/home -->
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-school">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M22 9l-10 -4l-10 4l10 4l10 -4v6" />
                <path d="M6 10.6v5.4a6 3 0 0 0 12 0v-5.4" />
            </svg>
        </span>
        <span class="nav-link-title"> Master Akademik </span>
    </a>
    <div class="dropdown-menu">
        <a class="dropdown-item {{ Route::is($spref . 'akademik.taka-*', request()->path()) ? 'active' : '' }}" href="{{ route($spref . 'akademik.taka-render') }}">
            Tahun Akademik
        </a>
        <a class="dropdown-item {{ Route::is($spref . 'akademik.fakultas-*', request()->path()) ? 'active' : '' }}" href="{{ route($spref . 'akademik.fakultas-render') }}">
            Fakultas
        </a>
        <a class="dropdown-item {{ Route::is($spref . 'akademik.prodi-*', request()->path()) ? 'active' : '' }}" href="{{ route($spref . 'akademik.prodi-render') }}">
            Program Studi
        </a>
        <a class="dropdown-item {{ Route::is($spref . 'akademik.kurikulum-*', request()->path()) ? 'active' : '' }}" href="{{ route($spref . 'akademik.kurikulum-render') }}">
            Kurikulum
        </a>
        <a class="dropdown-item {{ Route::is($spref . 'akademik.mata-kuliah-*', request()->path()) ? 'active' : '' }}" href="{{ route($spref . 'akademik.mata-kuliah-render') }}">
            Mata Kuliah
        </a>
        <a class="dropdown-item {{ Route::is($spref . 'akademik.jenis-kelas-*', request()->path()) ? 'active' : '' }}" href="{{ route($spref . 'akademik.jenis-kelas-render') }}">
            Jenis Kelas
        </a>
        <a class="dropdown-item {{ Route::is($spref . 'akademik.kelas-*', request()->path()) ? 'active' : '' }}" href="{{ route($spref . 'akademik.kelas-render') }}">
            Kelas
        </a>
        <a class="dropdown-item {{ Route::is($spref . 'akademik.waktu-kuliah-*', request()->path()) ? 'active' : '' }}" href="{{ route($spref . 'akademik.waktu-kuliah-render') }}">
            Waktu Kuliah
        </a>
        <a class="dropdown-item {{ Route::is($spref . 'akademik.jadwal-kuliah-*', request()->path()) ? 'active' : '' }}" href="{{ route($spref . 'akademik.jadwal-kuliah-render') }}">
            Jadwal Kuliah
        </a>
        <a class="dropdown-item {{ Route::is($spref . 'akademik.krs-*', request()->path()) ? 'active' : '' }}" href="{{ route($spref . 'akademik.krs-render') }}">
            KRS (Kartu Rencana Studi)
            <!-- <span class="badge badge-sm bg-green-lt text-uppercase ms-auto">New</span> -->
        </a>
        <a class="dropdown-item {{ Route::is($spref . 'akademik.nilai-*', request()->path()) ? 'active' : '' }}" href="{{ route($spref . 'akademik.nilai-render') }}">
            Nilai Mahasiswa
            <!-- <span class="badge badge-sm bg-green-lt text-uppercase ms-auto">New</span> -->
        </a>
        <a class="dropdown-item {{ Route::is($spref . 'akademik.khs-*', request()->path()) ? 'active' : '' }}" href="{{ route($spref . 'akademik.khs-render') }}">
            KHS (Kartu Hasil Studi)
            <!-- <span class="badge badge-sm bg-green-lt text-uppercase ms-auto">New</span> -->
        </a>
    </div>
</li>
<li class="nav-item dropdown">
    <a class="nav-link {{ Route::is($spref . 'pmb.*', request()->path()) ? 'active' : '' }} dropdown-toggle" href="#navbar-form" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false">
        <span class="nav-link-icon d-md-none d-lg-inline-block">
        <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-settings-plus"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12.483 20.935c-.862 .239 -1.898 -.178 -2.158 -1.252a1.724 1.724 0 0 0 -2.573 -1.066c-1.543 .94 -3.31 -.826 -2.37 -2.37a1.724 1.724 0 0 0 -1.065 -2.572c-1.756 -.426 -1.756 -2.924 0 -3.35a1.724 1.724 0 0 0 1.066 -2.573c-.94 -1.543 .826 -3.31 2.37 -2.37c1 .608 2.296 .07 2.572 -1.065c.426 -1.756 2.924 -1.756 3.35 0a1.724 1.724 0 0 0 2.573 1.066c1.543 -.94 3.31 .826 2.37 2.37a1.724 1.724 0 0 0 1.065 2.572c1.08 .262 1.496 1.308 1.247 2.173" /><path d="M16 19h6" /><path d="M19 16v6" /><path d="M9 12a3 3 0 1 0 6 0a3 3 0 0 0 -6 0" /></svg>
        </span>
        <span class="nav-link-title"> Master PMB </span>
    </a>
    <div class="dropdown-menu">
        <a class="dropdown-item {{ Route::is($spref . 'pmb.periode-*', request()->path()) ? 'active' : '' }}" href="{{ route($spref . 'pmb.periode-render') }}">
            Periode Pendaftaran
        </a>
        <a class="dropdown-item {{ Route::is($spref . 'pmb.jalur-*', request()->path()) ? 'active' : '' }}" href="{{ route($spref . 'pmb.jalur-render') }}">
            Jalur Pendaftaran
        </a>
        <a class="dropdown-item {{ Route::is($spref . 'pmb.biaya-*', request()->path()) ? 'active' : '' }}" href="{{ route($spref . 'pmb.biaya-render') }}">
            Biaya Pendaftaran
        </a>
        <a class="dropdown-item {{ Route::is($spref . 'pmb.syarat-*', request()->path()) ? 'active' : '' }}" href="{{ route($spref . 'pmb.syarat-render') }}">
            Syarat Pendaftaran
        </a>
        <a class="dropdown-item {{ Route::is($spref . 'pmb.gelombang-*', request()->path()) ? 'active' : '' }}" href="{{ route($spref . 'pmb.gelombang-render') }}">
            Gelombang
        </a>
        <a class="dropdown-item {{ Route::is($spref . 'pmb.jadwal-*', request()->path()) ? 'active' : '' }}" href="{{ route($spref . 'pmb.jadwal-render') }}">
            Jadwal PMB
        </a>
        <a class="dropdown-item {{ Route::is($spref . 'pmb.pendaftar-*', request()->path()) ? 'active' : '' }}" href="{{ route($spref . 'pmb.pendaftar-render') }}">
            Calon Mahasiswa
        </a>
    </div>
</li>
<li class="nav-item dropdown">
    <a class="nav-link {{ Route::is($spref . 'keuangan.*', request()->path()) ? 'active' : '' }} dropdown-toggle" href="#navbar-form" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false">
        <span class="nav-link-icon d-md-none d-lg-inline-block">
        <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-adjustments-dollar"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 10a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" /><path d="M6 4v4" /><path d="M6 12v8" /><path d="M13.366 14.54a2 2 0 1 0 -.216 3.097" /><path d="M12 4v10" /><path d="M12 18v2" /><path d="M16 7a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" /><path d="M18 4v1" /><path d="M18 9v1" /><path d="M21 15h-2.5a1.5 1.5 0 0 0 0 3h1a1.5 1.5 0 0 1 0 3h-2.5" /><path d="M19 21v1m0 -8v1" /></svg>                                </span>
        <span class="nav-link-title"> Master Keuangan </span>
    </a>
    <div class="dropdown-menu">
        <a class="dropdown-item {{ Route::is($spref . 'keuangan.saldo-*', request()->path()) ? 'active' : '' }}" href="{{ route($spref . 'keuangan.saldo-render') }}">
            Saldo
            <span class="badge badge-sm bg-green-lt text-uppercase ms-auto">New</span>
        </a>
        <a class="dropdown-item {{ Route::is($spref . 'keuangan.tagihan-kuliah-group-*', request()->path()) ? 'active' : '' }}" href="{{ route($spref . 'keuangan.tagihan-kuliah-group-render') }}">
            Tagihan Kuliah
            <span class="badge badge-sm bg-green-lt text-uppercase ms-auto">New</span>
        </a>

    </div>
</li>
<li class="nav-item dropdown">
    <a class="nav-link {{ Route::is($spref . 'infrastruktur.*', request()->path()) ? 'active' : '' }} dropdown-toggle" href="#navbar-form" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false">
        <span class="nav-link-icon d-md-none d-lg-inline-block">
        <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-building"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M3 21l18 0" /><path d="M9 8l1 0" /><path d="M9 12l1 0" /><path d="M9 16l1 0" /><path d="M14 8l1 0" /><path d="M14 12l1 0" /><path d="M14 16l1 0" /><path d="M5 21v-16a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2v16" /></svg>
        </span>
        <span class="nav-link-title"> Master Infrastruktur </span>
    </a>
    <div class="dropdown-menu">
        <a class="dropdown-item {{ Route::is($spref . 'infrastruktur.gedung-*', request()->path()) ? 'active' : '' }}" href="{{ route($spref . 'infrastruktur.gedung-render') }}">
            Gedung
        </a>
        <a class="dropdown-item {{ Route::is($spref . 'infrastruktur.ruang-*', request()->path()) ? 'active' : '' }}" href="{{ route($spref . 'infrastruktur.ruang-render') }}">
            Ruang
        </a>
        <a class="dropdown-item {{ Route::is($spref . 'infrastruktur.kategori-barang-*', request()->path()) ? 'active' : '' }}" href="{{ route($spref . 'infrastruktur.kategori-barang-render') }}">
            Kategori Barang
        </a>
        <a class="dropdown-item {{ Route::is($spref . 'infrastruktur.barang-*', request()->path()) ? 'active' : '' }}" href="{{ route($spref . 'infrastruktur.barang-render') }}">
            Barang
        </a>
        <a class="dropdown-item {{ Route::is($spref . 'infrastruktur.mutasi-barang-*', request()->path()) ? 'active' : '' }}" href="{{ route($spref . 'infrastruktur.mutasi-barang-render') }}">
            Mutasi Barang
        </a>
        <a class="dropdown-item {{ Route::is($spref . 'infrastruktur.pengadaan-barang-*', request()->path()) ? 'active' : '' }}" href="{{ route($spref . 'infrastruktur.pengadaan-barang-render') }}">
            Pengadaan Barang
        </a>
        <a class="dropdown-item {{ Route::is($spref . 'infrastruktur.inventaris-barang-*', request()->path()) ? 'active' : '' }}" href="{{ route($spref . 'infrastruktur.inventaris-barang-render') }}">
            Inventaris Barang
        </a>
    </div>
</li>

<li class="nav-item">
    <span class="nav-link" href="">
        <span class="nav-link-title"> Pengaturan </span>
    </span>
</li>
<li class="nav-item dropdown">
    <a class="nav-link {{ Route::is($spref . 'pengaturan.*', request()->path()) ? 'active' : '' }} dropdown-toggle" href="#navbar-form" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false">
        <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler.io/icons/icon/home -->
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-settings">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M10.325 4.317c.426 -1.756 2.924 -1.756 3.35 0a1.724 1.724 0 0 0 2.573 1.066c1.543 -.94 3.31 .826 2.37 2.37a1.724 1.724 0 0 0 1.065 2.572c1.756 .426 1.756 2.924 0 3.35a1.724 1.724 0 0 0 -1.066 2.573c.94 1.543 -.826 3.31 -2.37 2.37a1.724 1.724 0 0 0 -2.572 1.065c-.426 1.756 -2.924 1.756 -3.35 0a1.724 1.724 0 0 0 -2.573 -1.066c-1.543 .94 -3.31 -.826 -2.37 -2.37a1.724 1.724 0 0 0 -1.065 -2.572c-1.756 -.426 -1.756 -2.924 0 -3.35a1.724 1.724 0 0 0 1.066 -2.573c-.94 -1.543 .826 -3.31 2.37 -2.37c1 .608 2.296 .07 2.572 -1.065z" />
                <path d="M9 12a3 3 0 1 0 6 0a3 3 0 0 0 -6 0" />
            </svg>
        </span>
        <span class="nav-link-title"> Pengaturan </span>
    </a>
    <div class="dropdown-menu">
        <a class="dropdown-item {{ Route::is($spref . 'pengaturan.log-aktivitas-*', request()->path()) ? 'active' : '' }}" href="{{ route($spref . 'pengaturan.log-aktivitas-render') }}">
            Log Aktivitas
        </a>
        <a class="dropdown-item {{ Route::is($spref . 'pengaturan.web-settings-*', request()->path()) ? 'active' : '' }}" href="{{ route($spref . 'pengaturan.web-settings-render') }}">
            Pengaturan Web
        </a>

    </div>
</li>
