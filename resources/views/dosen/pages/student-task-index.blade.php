@extends('base.base-dash-index')
@section('title')
    Kelola Tugas - Siakad By Internal Developer
@endsection
@section('menu')
    Kelola Tugas
@endsection
@section('submenu')
    Edit Tugas Kuliah
@endsection
@section('urlmenu')
    #
@endsection
@section('subdesc')
    Halaman untuk melihat Tugas Kuliah
@endsection
@section('content')
    <section class="content">
        <div class="row">
            <div class="col-lg-12 col-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title d-flex justify-content-between align-items-center">
                            @yield('menu')
                            <div class="">
                                <a href="{{ route('dosen.akademik.stask-create') }}" class="btn btn-primary"><i class="fa-solid fa-plus"></i></a>
                            </div>
                        </h5>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped" id="table1">
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th class="text-center">Nama Mata Kuliah</th>
                                    <th class="text-center">Nama Kelas</th>
                                    <th class="text-center">Judul Tugas</th>
                                    <th class="text-center">Batas Akhir</th>
                                    <th class="text-center">Button</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($stask as $key => $item)
                                    <tr>
                                        <td data-label="Number">{{ ++$key }}</td>
                                        <td data-label="Nama Mata Kuliah">{{ $item->jadkul->matkul->name }} <br> {{ $item->jadkul->pert_id }}</td>
                                        <td data-label="Nama Kelas">{{ $item->jadkul->kelas->name }}</td>
                                        <td data-label="Judul Tugas">{{ $item->title }}</td>
                                        <td data-label="Masa Berlaku">{{ \Carbon\Carbon::parse($item->exp_date)->format('d M Y') . ' - ' .\Carbon\Carbon::parse($item->exp_time)->format('H:i') }}</td>
                                        <td class="d-flex justify-content-center align-items-center">
                                            <a href="{{ route('dosen.akademik.stask-edit', $item->code) }}" style="margin-right: 10px" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                            <form id="delete-form-{{ $item->code }}"
                                                action="{{ route('dosen.akademik.stask-destroy', $item->code) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <a type="button" class="bs-tooltip btn btn-rounded btn-danger"
                                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"
                                                    data-original-title="Delete"
                                                    data-url="{{ route('dosen.akademik.stask-destroy', $item->code) }}"
                                                    data-name="{{ $item->name }}"
                                                    onclick="deleteData('{{ $item->code }}')">
                                                    <i class="fas fa-trash"></i>
                                                </a>
                                            </form>

                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
