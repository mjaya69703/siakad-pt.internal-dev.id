@extends('base.base-dash-index')
@section('title')
    Data Master Tahun Akademik - Siakad By Internal Developer
@endsection
@section('menu')
    Data Master Tahun Akademik
@endsection
@section('submenu')
    Daftar Data Tahun Akademik
@endsection
@section('submenu0')
    Tambah Data Tahun Akademik
@endsection
@section('urlmenu')
@php
$prefix = '';
$rawType = Auth::user()->raw_type;
switch ($rawType) {
    case 1:
        $prefix = 'faculty.';
        break;
    case 2:
        $prefix = 'administrative.';
        break;
    case 3:
        $prefix = 'academic.';
        break;
    case 4:
        $prefix = 'facility.';
        break;
    default:
        $prefix = 'web-admin.';
        break;
}
@endphp
    #
@endsection
@section('subdesc')
    Halaman untuk mengelola Data Tahun Akademik
@endsection
@section('content')
<section class="section row">

    <div class="col-lg-4 col-12">
        <form action="{{ route('web-admin.master.taka-store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="card-title">@yield('submenu0')</h5>
                    <button type="submit" class="btn btn-outline-primary"><i class="fa-solid fa-paper-plane"></i></button>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">Nama Tahun Akademik</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="Inputkan nama tahun akademik...">
                        @error('name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="code">Kode Fakultas ( 6 Angka )</label>
                        <input type="text" class="form-control" name="code" id="code" placeholder="Inputkan kode tahun akademik..." maxlength="6" uppercase onkeydown="return /[a-zA-Z0-9]/i.test(event.key)" >
                        @error('code')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="semester">Semester Perkuliahan</label>
                        <input type="text" class="form-control" name="semester" id="semester" placeholder="Inputkan kode tahun akademik..." >
                        @error('semester')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="year_start">Pilih Tahun Masuk</label>
                        <input type="number" class="form-control" name="year_start" id="year_start" min="2000" max="2100" maxlength="4" value="{{ \Carbon\Carbon::now()->format('Y') }}" placeholder="Inputkan tahun masuk...">
                        @error('year_start')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div class="col-lg-8 col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">@yield('submenu')</h5>

            </div>
            <div class="card-body">
                <table class="table table-stripped" id="table1">
                    <thead>
                        <th class="text-center">#</th>
                        <th class="text-center">Nama Tahun Akademik</th>
                        <th class="text-center">Kode Tahun Akademik</th>
                        <th class="text-center">Semester Perkuliahan</th>
                        <th class="text-center">Button</th>
                    </thead>
                    <tbody>
                        @foreach ($taka as $key => $item)
                            <tr class="text-center">
                                <td>{{ ++$key }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->code }}</td>
                                <td>{{ $item->semester }}</td>
                                <td class="d-flex justify-content-center align-items-center">
                                    <a href="#" style="margin-right: 10px" data-bs-toggle="modal" data-bs-target="#updateTaka{{ $item->code }}" class="btn btn-outline-primary"><i class="fas fa-edit"></i></a>
                                    {{-- <a href="{{ route('web-admin.staffmanager-dosen-view', $item->code) }}"  style="margin-right: 10px" class="btn btn-outline-info"><i class="fa-solid fa-eye"></i></a> --}}
                                    <form id="delete-form-{{ $item->code }}"
                                        action="{{ route('web-admin.master.taka-destroy', $item->code) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <a type="button" class="bs-tooltip btn btn-rounded btn-outline-danger"
                                            data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"
                                            data-original-title="Delete"
                                            data-url="{{ route('web-admin.master.taka-destroy', $item->code) }}"
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

</section>
<div class="me-1 mb-1 d-inline-block">

    <!--Extra Large Modal -->
    @foreach ($taka as $item)
    <form action="{{ route('web-admin.master.taka-update', $item->code) }}" method="POST" enctype="multipart/form-data">
        @method('patch')
        @csrf
        <div class="modal fade text-left w-100" id="updateTaka{{$item->code}}" tabindex="-1" role="dialog"
            aria-labelledby="myModalLabel16" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-l"
                role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel16">Edit {{ $item->name }}</h4>
                        <div class="">
    
                            <button type="submit" class="btn btn-outline-primary" >
                                <i class="fas fa-paper-plane"></i>
                            </button>
                            <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal"
                                aria-label="Close">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="form-group">
                                <label for="name">Nama Tahun Akademik</label>
                                <input type="text" class="form-control" name="name" id="name" value="{{ $item->name }}" placeholder="Inputkan nama tahun akademik...">
                                @error('name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="code">Kode Fakultas ( 6 Angka )</label>
                                <input type="text" class="form-control" name="code" id="code" placeholder="Inputkan kode tahun akademik..." value="{{ $item->code }}" maxlength="6" uppercase onkeydown="return /[a-zA-Z0-9]/i.test(event.key)" >
                                @error('code')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="semester">Semester Perkuliahan</label>
                                <input type="text" class="form-control" name="semester" id="semester" placeholder="Inputkan kode tahun akademik..." value="{{ $item->semester }}" >
                                @error('semester')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="year_start">Pilih Tahun Masuk</label>
                                <input type="number" class="form-control" name="year_start" id="year_start" min="2000" max="2100" maxlength="4" value="{{ $item->year_start }}" placeholder="Inputkan tahun masuk...">
                                @error('year_start')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    @endforeach
</div>
@endsection
@section('custom-js')
@endsection