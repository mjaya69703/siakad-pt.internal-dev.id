@extends('base.base-dash-index')
@section('title')
    Data Notifikasi - Siakad By Internal Developer
@endsection
@section('menu')
    Data Notifikasi
@endsection
@section('submenu')
    Daftar Notifikasi
@endsection
@section('urlmenu')
    #
@endsection
@section('subdesc')
    Halaman untuk mengelola Notifikasi
@endsection
@section('content')
    <section class="content row">
        <div class="col-lg-4">
            <div class="card">
                <form action="{{ route($prefix.'system.notify-store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4 class="card-title">Tambah @yield('menu')</h4>
                        <button type="submit" class="btn btn-primary"><i class="fa-solid fa-paper-plane"></i></button>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="send_to">Target Notifikasi</label>
                            <select name="send_to" id="send_to" class="form-select">
                                <option value="">Pilih Target Notifikasi</option>
                                <option value="0">Semua Orang</option>
                                <option value="1">Khusus Staff / Pegawai</option>
                                <option value="2">Khusus Dosen</option>
                                <option value="3">Khusus Mahasiswa</option>
                            </select>
                            @error('send_to')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="name">Judul Notifikasi</label>
                            <input type="text" name="name" id="name" class="form-control" placeholder="Inputkan judul notifikasi...">
                            @error('name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="type">Kategori Notifikasi</label>
                            <input type="text" name="type" id="type" class="form-control" placeholder="Inputkan kategori notifikasi...">
                            @error('type')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="desc">Pesan Notifikasi</label>
                            <textarea name="desc" id="desc" class="form-control" cols="30" rows="10" placeholder="Inputkan pesan notifikasi"></textarea>
                            @error('desc')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection