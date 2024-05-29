@extends('base.base-dash-index')
@section('title')
    Data Master Mata Kuliah - Siakad By Internal Developer
@endsection
@section('menu')
    Data Master Mata Kuliah
@endsection
@section('submenu')
    Tambah Data Mata Kuliah
@endsection
@section('submenu0')

@endsection
@section('urlmenu')
    #
@endsection
@section('subdesc')
    Halaman untuk mengelola Data Mata Kuliah
@endsection
@section('content')
<section class="section row">

    <div class="col-lg-12 col-12">
        <form action="{{ route('web-admin.master.matkul-store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="card-title">@yield('submenu')</h5>
                    <div class="">

                        <a href="{{ route('web-admin.master.matkul-index') }}" class="btn btn-outline-warning"><i class="fa-solid fa-backward"></i></a>
                        <button type="submit" class="btn btn-outline-primary"><i class="fa-solid fa-paper-plane"></i></button>
                    </div>

                </div>
                <div class="card-body row">
                    <div class="form-group col-lg-3 col-12">
                        <label for="name">Nama Mata Kuliah</label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="Inputkan nama matakuliah...">
                        @error('name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group col-lg-3 col-12">
                        <label for="code">Kode Mata Kuliah</label>
                        <input type="text" name="code" id="code" class="form-control" placeholder="Inputkan kode matakuliah...">
                        @error('code')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group col-lg-3 col-12">
                        <label for="requ_id">Persyaratan Mata Kuliah</label>
                        <select name="requ_id" id="requ_id" class="form-select" name="requ_id" id="requ_id">
                            <option value="" selected>Pilih Persyaratan Mata Kuliah</option>
                            @foreach ($matkul as $item_r)
                            <option value="{{ $item_r->id }}">{{ $item_r->name }}</option>
                            @endforeach
                        </select>
                        @error('requ_id')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group col-lg-3 col-12">
                        <label for="bsks">Bebas SKS Mata Kuliah</label>
                        <input type="number" min="10" max="40" name="bsks" id="bsks" class="form-control" placeholder="Inputkan beban sks matakuliah...">
                        @error('bsks')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group col-lg-4 col-12">
                        <label for="kuri_id">Kurikulum</label>
                        <select name="kuri_id" id="kuri_id" class="form-select" name="kuri_id" id="kuri_id">
                            <option value="" selected>Pilih Kurikulum</option>
                            @foreach ($kuri as $item_k)
                            <option value="{{ $item_k->id }}">{{ $item_k->name }}</option>
                            @endforeach
                        </select>
                        @error('kuri_id')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group col-lg-4 col-12">
                        <label for="taka_id">Tahun Akademik</label>
                        <select name="taka_id" id="taka_id" class="form-select" name="taka_id" id="taka_id">
                            <option value="" selected>Pilih Tahun Akademik</option>
                            @foreach ($taka as $item_t)
                            <option value="{{ $item_t->id }}">{{ $item_t->name . ' - ' . $item_t->semester }}</option>
                            @endforeach
                        </select>
                        @error('taka_id')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group col-lg-4 col-12">
                        <label for="pstudi_id">Program Studi</label>
                        <select name="pstudi_id" id="pstudi_id" class="form-select" name="pstudi_id" id="pstudi_id">
                            <option value="" selected>Pilih Program Studi</option>
                            @foreach ($pstudi as $item_p)
                            <option value="{{ $item_p->id }}">{{ $item_p->name }}</option>
                            @endforeach
                        </select>
                        @error('pstudi_id')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group col-lg-4 col-12">
                        <label for="dosen_1">Dosen Pengampu</label>
                        <select name="dosen_1" id="dosen_1" class="form-select" name="dosen_1" id="dosen_1">
                            <option value="" selected>Pilih Dosen Pengampu</option>
                            @foreach ($dosen as $item_d1)
                            <option value="{{ $item_d1->id }}" >{{ $item_d1->dsn_name }}</option>
                            @endforeach
                        </select>
                        @error('dosen_1')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror 
                    </div>
                    <div class="form-group col-lg-4 col-12">
                        <label for="dosen_2">Dosen Cadangan 1</label>
                        <select name="dosen_2" id="dosen_2" class="form-select" name="dosen_2" id="dosen_2">
                            <option value="" selected>Pilih Dosen Cadangan 1</option>
                            @foreach ($dosen as $item_d2)
                            <option value="{{ $item_d2->id }}" >{{ $item_d2->dsn_name }}</option>
                            @endforeach
                        </select>
                        @error('dosen_2')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror 
                    </div>
                    <div class="form-group col-lg-4 col-12">
                        <label for="dosen_3">Dosen Cadangan 2</label>
                        <select name="dosen_3" id="dosen_3" class="form-select" name="dosen_3" id="dosen_3">
                            <option value="" selected>Pilih Dosen Cadangan 2</option>
                            @foreach ($dosen as $item_d3)
                            <option value="{{ $item_d3->id }}" >{{ $item_d3->dsn_name }}</option>
                            @endforeach
                        </select>
                        @error('dosen_3')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror                               
                    </div>

                    <div class="form-group col-lg-12 col-12">
                        <label for="desc">Deskripsi Mata Kuliah</label>
                        <textarea name="desc" id="dark" class="form-control" placeholder="isikan deskripsi matakuliah ...." cols="30" rows="10"></textarea>
                        @error('desc')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
            </div>
        </form>
    </div>

</section>
@endsection
@section('custom-js')
<script src="{{ asset('dist') }}/assets/extensions/tinymce/tinymce.min.js"></script>
<script src="{{ asset('dist') }}/assets/static/js/pages/tinymce.js"></script>
@endsection
