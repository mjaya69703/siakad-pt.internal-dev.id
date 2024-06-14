<li class="sidebar-item  {{ Route::is('mahasiswa.home-index', request()->path()) ? 'active' : '' }}">
    <a href="{{ route('mahasiswa.home-index') }}" class='sidebar-link'>
        <i class="fa-solid fa-home"></i>
        <span>Home</span>
    </a>
</li>
<li class="sidebar-item  {{ Route::is('mahasiswa.home-profile*', request()->path()) ? 'active' : '' }}">
    <a href="{{ route('mahasiswa.home-profile') }}" class='sidebar-link'>
        <i class="fa-solid fa-user-edit"></i>
        <span>Profile User</span>
    </a>
</li>
<li class="sidebar-item  {{ Route::is('mahasiswa.home-jadkul-*', request()->path()) ? 'active' : '' }}">
    <a href="{{ route('mahasiswa.home-jadkul-index') }}" class='sidebar-link'>
        <i class="fa-solid fa-calendar"></i>
        <span>Jadwal Kuliah</span>
    </a>
</li>
<li class="sidebar-item  {{ Route::is('mahasiswa.akademik.tugas-*', request()->path()) ? 'active' : '' }}">
    <a href="{{ route('mahasiswa.akademik.tugas-index') }}" class='sidebar-link'>
        <i class="fa-solid fa-list-check"></i>
        <span>Tugas Kuliah</span>
    </a>
</li>
<li class="sidebar-item  {{ Route::is('mahasiswa.home-tagihan-*', request()->path()) ? 'active' : '' }}">
    <a href="{{ route('mahasiswa.home-tagihan-index') }}" class='sidebar-link'>
        <i class="fa-solid fa-file-invoice"></i>
        <span>Data Tagihan</span>
    </a>
</li>
<li class="sidebar-item has-sub {{ Route::is('mahasiswa.support.*', request()->path()) ? 'active' : '' }}">
    <a href="#" class='sidebar-link'>
        <i class="fa-solid fa-ticket"></i>
        <span>Ticket Support</span>
    </a>
    <ul class="submenu">
        <li class="submenu-item {{ Route::is('mahasiswa.support.ticket-index', 'mahasiswa.support.ticket-view', request()->path()) ? 'active' : '' }}">
            <a href="{{ route('mahasiswa.support.ticket-index') }}" class="submenu-link">Lihat Ticket</a>
        </li>
        <li class="submenu-item {{ Route::is('mahasiswa.support.ticket-open', 'mahasiswa.support.ticket-create', request()->path()) ? 'active' : '' }}">
            <a href="{{ route('mahasiswa.support.ticket-open') }}" class="submenu-link">Buka Ticket</a>
        </li>
    </ul>
</li>
