@extends('base.base-dash-index')
@section('title')
    Data Master Kelas - Siakad By Internal Developer
@endsection
@section('menu')
    Data Master Kelas
@endsection
@section('submenu')
    Daftar Data Kelas
@endsection
@section('submenu0')
    Tambah Data Kelas
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
    Halaman untuk mengelola Data Kelas
@endsection
@section('content')
<section class="section row">

    <div class="col-lg-12 col-12">
        <div class="card">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="card-title">@yield('submenu')</h5>
                <a href="#" style="margin-right: 10px" data-bs-toggle="modal" data-bs-target="#tambahKelas" class="btn btn-outline-primary"><i class="fas fa-plus"></i></a>

            </div>
            <div class="card-body">
                <table class="table table-striped" id="table1">
                    <thead>
                        <th class="text-center">#</th>
                        <th class="text-center">Nama Kelas</th>
                        <th class="text-center">Program Studi</th>
                        <th class="text-center">Kapasitas</th>
                        <th class="text-center">Wali Dosen</th>
                        <th class="text-center">Button</th>
                    </thead>
                    <tbody>
                        @foreach ($kelas as $key => $item)
                            <tr class="text-center">
                                <td data-label="Number">{{ ++$key }}</td>
                                <td data-label="Kelas">{{ $item->proku->name . ' - ' . $item->name }}</td>
                                <td data-label="Program Studi">{{ $item->pstudi->name . ' - ' . $item->taka->semester}}</td>
                                @php $mhs = \App\Models\Mahasiswa::where('class_id', $item->id)->count();                              @endphp
                                <td data-label="Kapasitas">{{ $mhs . ' / ' . $item->capacity . ' Mahasiswa' }}</td>
                                <td data-label="Wali Dosen">{{ $item->dosen->dsn_name }}</td>
                                <td class="d-flex justify-content-center align-items-center">
                                    <a href="#" style="margin-right: 10px" data-bs-toggle="modal" data-bs-target="#updateKelas{{ $item->code }}" class="btn btn-outline-primary"><i class="fas fa-edit"></i></a>
                                    <a href="{{ route('web-admin.master.kelas-mahasiswa-view', $item->code) }}" style="margin-right: 10px" class="btn btn-outline-info"><i class="fa-solid fa-users"></i></a>
                                    <form id="delete-form-{{ $item->code }}"
                                        action="{{ route('web-admin.master.kelas-destroy', $item->code) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <a type="button" class="bs-tooltip btn btn-rounded btn-outline-danger"
                                            data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"
                                            data-original-title="Delete"
                                            data-url="{{ route('web-admin.master.kelas-destroy', $item->code) }}"
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
    <form action="{{ route('web-admin.master.kelas-store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="modal fade text-left w-100" id="tambahKelas" tabindex="-1" role="dialog"
            aria-labelledby="myModalLabel16" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl"
                role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel16">Tambah Kelas</h4>
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
                            <div class="form-group col-lg-4 col-12">
                                <label for="name">Nama Kelas</label>
                                <input type="text" class="form-control" name="name" id="name" placeholder="Inputkan nama Kelas...">
                                @error('name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group col-lg-4 col-12">
                                <label for="code">Kode Kelas</label>
                                <input type="text" class="form-control" name="code" id="code" placeholder="Inputkan kode Kelas..." maxlength="32">
                                @error('code')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group col-lg-4 col-12">
                                <label for="capacity">Kapasitas Kelas</label>
                                <input type="number" class="form-control" name="capacity" id="capacity" placeholder="Inputkan kode Kelas..." max="35" maxlength="2">
                                @error('capacity')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group col-lg-6 col-12">
                                <label for="taka_id">Tahun Akademik</label>
                                <select name="taka_id" id="taka_id" class="form-select">
                                    <option value="" selected>Pilih Tahun Akademik</option>
                                    @foreach ($taka as $item)
                                        <option value="{{ $item->id }}">{{ $item->name . ' - ' . $item->semester }}</option>
                                    @endforeach
                                </select>
                                @error('taka_id')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group col-lg-6 col-12">
                                <label for="pstudi_id">Program Studi</label>
                                <select name="pstudi_id" id="pstudi_id" class="form-select">
                                    <option value="" selected>Pilih Program Studi</option>
                                    @foreach ($pstudi as $studi)
                                        <option value="{{ $studi->id }}">{{ $studi->name }}</option>
                                    @endforeach
                                </select>
                                @error('pstudi_id')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group col-lg-6 col-12">
                                <label for="proku_id">Program Kuliah</label>
                                <select name="proku_id" id="proku_id" class="form-select">
                                    <option value="" selected>Pilih Program Kuliah</option>
                                    @foreach ($proku as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                                @error('proku_id')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group col-lg-6 col-12">
                                <label for="dosen_id">Wali Dosen</label>
                                <select name="dosen_id" id="dosen_id" class="form-select">
                                    <option value="" selected>Pilih Wali Dosen</option>
                                    @foreach ($dosen as $item)
                                        <option value="{{ $item->id }}">{{ $item->dsn_name }}</option>
                                    @endforeach
                                </select>
                                @error('dosen_id')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
<div class="me-1 mb-1 d-inline-block">

    <!--Extra Large Modal -->
    @foreach ($kelas as $item)
    <form action="{{ route('web-admin.master.kelas-update', $item->code) }}" method="POST" enctype="multipart/form-data">
        @method('patch')
        @csrf
        <div class="modal fade text-left w-100" id="updateKelas{{$item->code}}" tabindex="-1" role="dialog"
            aria-labelledby="myModalLabel16" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl"
                role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel16">Edit Kelas - {{ $item->name }}</h4>
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
                            <div class="form-group col-lg-4 col-12">
                                <label for="name">Nama Kelas</label>
                                <input type="text" class="form-control" name="name" id="name" placeholder="Inputkan nama Kelas..." value="{{ $item->name }}">
                                @error('name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group col-lg-4 col-12">
                                <label for="code">Kode Kelas</label>
                                <input type="text" class="form-control" name="code" id="code" placeholder="Inputkan kode Kelas..." maxlength="32" uppercase value="{{ $item->code }}" >
                                @error('code')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group col-lg-4 col-12">
                                <label for="capacity">Kapasitas Kelas</label>
                                <input type="number" class="form-control" name="capacity" id="capacity" placeholder="Inputkan kode Kelas..." max="35" maxlength="2" uppercase value="{{ $item->capacity }}" >
                                @error('capacity')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group col-lg-6 col-12">
                                <label for="taka_id">Tahun Akademik</label>
                                <select name="taka_id" id="taka_id" class="form-select">
                                    <option value="" selected>Pilih Tahun Akademik</option>
                                    @foreach ($taka as $taaka)
                                        <option value="{{ $taaka->id }}" {{ $item->taka_id == $taaka->id ? 'selected' : '' }}>{{ $taaka->name . ' - ' . $taaka->semester }}</option>
                                    @endforeach
                                </select>
                                @error('taka_id')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group col-lg-6 col-12">
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
                            <div class="form-group col-lg-6 col-12">
                                <label for="proku_id">Program Kuliah</label>
                                <select name="proku_id" id="proku_id" class="form-select">
                                    <option value="" selected>Pilih Program Kuliah</option>
                                    @foreach ($proku as $prokuh)
                                        <option value="{{ $prokuh->id }}" {{ $item->proku_id == $prokuh->id ? 'selected' : '' }}>{{ $prokuh->name }}</option>
                                    @endforeach
                                </select>
                                @error('proku_id')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group col-lg-6 col-12">
                                <label for="dosen_id">Wali Dosen</label>
                                <select name="dosen_id" id="dosen_id" class="form-select">
                                    <option value="" selected>Pilih Wali Dosen</option>
                                    @foreach ($dosen as $dosens)
                                        <option value="{{ $dosens->id }}" {{ $item->dosen_id == $dosens->id ? 'selected' : '' }}>{{ $dosens->dsn_name }}</option>
                                    @endforeach
                                </select>
                                @error('dosen_id')
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
