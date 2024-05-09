@extends('base.base-dash-index')
@section('title')
    Data Master Program Kuliah - Siakad By Internal Developer
@endsection
@section('menu')
    Data Master Program Kuliah
@endsection
@section('submenu')
    Daftar Data Program Kuliah
@endsection
@section('submenu0')
    Tambah Data Program Kuliah
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
    Halaman untuk mengelola Data Program Kuliah
@endsection
@section('content')
<section class="section row">

    <div class="col-lg-4 col-12">
        <form action="{{ route('web-admin.master.proku-store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="card-title">@yield('submenu0')</h5>
                    <button type="submit" class="btn btn-outline-primary"><i class="fa-solid fa-paper-plane"></i></button>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="taka_id">Tahun Akademik</label>
                        <select name="taka_id" id="taka_id" class="form-select">
                            <option value="" selected>Pilih Tahun Akademik</option>
                            @foreach ($taka as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                        @error('taka_id')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="pstudi_id">Program Studi</label>
                        <select name="pstudi_id" id="pstudi_id" class="form-select">
                            <option value="" selected>Pilih Program Studi</option>
                            @foreach ($pstudi as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                        @error('pstudi_id')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="name">Nama Program Kuliah</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="Inputkan nama Program Kuliah...">
                        @error('name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="code">Kode Program Kuliah</label>
                        <input type="text" class="form-control" name="code" id="code" placeholder="Inputkan kode Program Kuliah..." maxlength="20" uppercase >
                        @error('code')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="wave">Gelombang Program Kuliah</label>
                        <input type="text" class="form-control" name="wave" id="wave" placeholder="Inputkan Gelombang Program Kuliah..." maxlength="20" uppercase >
                        @error('wave')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="wave_start">Periode Mulai Pendaftaran</label>
                        <input type="date" class="form-control" name="wave_start" id="wave_start" placeholder="Pilih tanggal Gelombang Mulai Program Kuliah...">
                        @error('wave_start')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="wave_ended">Periode Akhir Pendaftaran</label>
                        <input type="date" class="form-control" name="wave_ended" id="wave_ended" placeholder="Pilih tanggal Gelombang Akhir Program Kuliah...">
                        @error('wave_ended')
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
                <table class="table table-striped" id="table1">
                    <thead>
                        <th class="text-center">#</th>
                        <th class="text-center">Program Kuliah</th>
                        <th class="text-center">Program Studi</th>
                        <th class="text-center">Periode Pendaftaran</th>
                        <th class="text-center">Button</th>
                    </thead>
                    <tbody>
                        @foreach ($proku as $key => $item)
                            <tr>
                                <td data-label="Number">{{ ++$key }}</td>
                                <td data-label="Program Kuliah">{{ $item->name }}</td>
                                <td data-label="Program Studi">{{ $item->pstudi->name }}</td>
                                <td data-label="Periode Pendaftaran">{{ \Carbon\Carbon::parse($item->wave_start)->locale('id')->isoFormat('LL') . ' - ' . \Carbon\Carbon::parse($item->wave_ended)->locale('id')->isoFormat('LL') }}</td>
                                <td class="d-flex justify-content-center align-items-center">
                                    <a href="#" style="margin-right: 10px" data-bs-toggle="modal" data-bs-target="#updateProku{{ $item->code }}" class="btn btn-outline-primary"><i class="fas fa-edit"></i></a>
                                    {{-- <a href="{{ route('web-admin.staffmanager-dosen-view', $item->code) }}"  style="margin-right: 10px" class="btn btn-outline-info"><i class="fa-solid fa-eye"></i></a> --}}
                                    <form id="delete-form-{{ $item->code }}"
                                        action="{{ route('web-admin.master.proku-destroy', $item->code) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <a type="button" class="bs-tooltip btn btn-rounded btn-outline-danger"
                                            data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"
                                            data-original-title="Delete"
                                            data-url="{{ route('web-admin.master.proku-destroy', $item->code) }}"
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
    @foreach ($proku as $item)
    <form action="{{ route('web-admin.master.proku-update', $item->code) }}" method="POST" enctype="multipart/form-data">
        @method('patch')
        @csrf
        <div class="modal fade text-left w-100" id="updateProku{{$item->code}}" tabindex="-1" role="dialog"
            aria-labelledby="myModalLabel16" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-l"
                role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel16">Edit Program Kuliah - {{ $item->name }}</h4>
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
                                <label for="taka_id">Tahun Akademik</label>
                                <select name="taka_id" id="taka_id" class="form-select">
                                    <option value="" selected>Pilih Tahun Akademik</option>
                                    @foreach ($taka as $taka)
                                        <option value="{{ $taka->id }}" {{ $item->taka_id == $taka->id ? 'selected' : '' }}>{{ $taka->name }}</option>
                                    @endforeach
                                </select>
                                @error('taka_id')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="pstudi_id">Program Studi</label>
                                <select name="pstudi_id" id="pstudi_id" class="form-select">
                                    <option value="" selected>Pilih Program Studi</option>
                                    @foreach ($pstudi as $studi)
                                        <option value="{{ $studi->id }}" {{ $item->pstudi_id == $studi->id ? 'selected' : '' }}>{{ $studi->name }}</option>
                                    @endforeach
                                </select>
                                @error('pstudi_id')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="name">Nama Program Kuliah</label>
                                <input type="text" class="form-control" name="name" id="name" placeholder="Inputkan nama Program Kuliah..." value="{{ $item->name }}">
                                @error('name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="code">Kode Program Kuliah</label>
                                <input type="text" class="form-control" name="code" id="code" placeholder="Inputkan kode Program Kuliah..." maxlength="20" uppercase value="{{ $item->code }}" >
                                @error('code')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="wave">Gelombang Program Kuliah</label>
                                <input type="text" class="form-control" name="wave" id="wave" placeholder="Inputkan Gelombang Program Kuliah..." maxlength="20" uppercase value="{{ $item->wave }}" >
                                @error('wave')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="wave_start">Periode Mulai Pendaftaran</label>
                                <input type="date" class="form-control" name="wave_start" id="wave_start" placeholder="Pilih tanggal Gelombang Mulai Program Kuliah..." value="{{ $item->wave_start }}">
                                @error('wave_start')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="wave_ended">Periode Akhir Pendaftaran</label>
                                <input type="date" class="form-control" name="wave_ended" id="wave_ended" placeholder="Pilih tanggal Gelombang Akhir Program Kuliah..." value="{{ $item->wave_ended }}">
                                @error('wave_ended')
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
