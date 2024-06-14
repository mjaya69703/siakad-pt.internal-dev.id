@extends('base.base-dash-index')
@section('title')
    Daftar Tugas Kuliah - Siakad By Internal Developer
@endsection
@section('menu')
    Data Tugas Kuliah
@endsection
@section('submenu')
    Daftar 
@endsection
@section('urlmenu')
@endsection
@section('subdesc')
    Halaman untuk melihat daftar Tugas Kuliah
@endsection
@section('content')
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title d-flex justify-content-between align-items-center">
                    @yield('menu')
                    <div class="">
                        {{-- <a href="{{ route('web-admin.master.tagihan-index') }}" class="btn btn-outline-primary"><i class="fa-solid fa-plus"></i></a> --}}
                    </div>
                </h5>
            </div>
            <div class="card-body">
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">Judul Tugas</th>
                            <th class="text-center">Nama Dosen</th>
                            <th class="text-center">Mata Kuliah</th>
                            <th class="text-center">Batas Waktu</th>
                            <th class="text-center">Button</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($stask as $key => $item)
                            <tr>
                                <td data-label="Number">{{ ++$key }}</td>
                                <td data-label="Judul Tugas">{{ $item->title }}</td>
                                <td data-label="Nama Dosen">{{ $item->dosen->dsn_name }}</td>
                                <td data-label="Mata Kuliah">{{ $item->jadkul->matkul->name }} <br> {{ $item->jadkul->pert_id }}</td>
                                <td data-label="Nama Dosen">{{ \Carbon\Carbon::parse($item->exp_date)->format('l, d M Y') }} <br> {{ \Carbon\Carbon::parse($item->exp_time)->format('H:i') }} WIB </td>
                                <td class="d-flex justify-content-center align-items-center">
                                    <a href="{{ route('mahasiswa.akademik.tugas-view', $item->code) }}" class="btn btn-primary"><i class="fa-solid fa-eye"></i></a>


                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection
