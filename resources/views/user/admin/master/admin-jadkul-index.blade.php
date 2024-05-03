@extends('base.base-dash-index')
@section('title')
    Data Master Jadwal Kuliah - Siakad By Internal Developer
@endsection
@section('menu')
    Data Master Jadwal Kuliah
@endsection
@section('submenu')
    Data Master Jadwal Kuliah
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
    Halaman untuk mengelola Jadwal Kuliah
@endsection
@section('custom-css')
<style>
    table {
  border: 1px solid #ccc;
  border-collapse: collapse;
  margin: 0;
  padding: 0;
  width: 100%;
  table-layout: fixed;
}

table caption {
  font-size: 1.5em;
  margin: .5em 0 .75em;
}

table tr {
  /* background-color: #f8f8f8; */
  border: 1px solid #ddd;
  padding: .35em;
}

table th,
table td {
  padding: .625em;
  text-align: center;
}

table th {
  font-size: .85em;
  letter-spacing: .1em;
  text-transform: uppercase;
}

@media screen and (max-width: 600px) {
  table {
    border: 0;
  }

  table caption {
    font-size: 1.3em;
  }
  
  table thead {
    border: none;
    clip: rect(0 0 0 0);
    height: 1px;
    margin: -1px;
    overflow: hidden;
    padding: 0;
    position: absolute;
    width: 1px;
  }
  
  table tr {
    border-bottom: 3px solid #ddd;
    display: block;
    margin-bottom: .625em;
  }
  
  table td {
    border-bottom: 1px solid #ddd;
    display: block;
    font-size: .8em;
    text-align: right;
  }
  
  table td::before {
    /*
    * aria-label has no advantage, it won't be read inside a table
    content: attr(aria-label);
    */
    content: attr(data-label);
    float: left;
    font-weight: bold;
    text-transform: uppercase;
  }
  
  table td:last-child {
    border-bottom: 0;
  }
}
</style>
@endsection
@section('content')
<section class="section">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title d-flex justify-content-between align-items-center">
                @yield('submenu')
                <div class="">
                    <a href="{{ route('web-admin.master.jadkul-create') }}" class="btn btn-outline-primary"><i class="fa-solid fa-plus"></i></a>
                </div>
            </h5>
        </div>
        <div class="card-body">
            <table class="table table-striped"  id="table1">
                <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">Program Studi</th>
                        <th class="text-center">Nama Kelas</th>
                        <th class="text-center">Nama Mata Kuliah</th>
                        <th class="text-center">Dosen Pengajar</th>
                        <th class="text-center">Metode Perkuliahan</th>
                        <th class="text-center">Tanggal Perkuliahan</th>
                        <th class="text-center">Waktu Perkuliahan</th>
                        <th class="text-center">Button</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($jadkul as $key => $item)
                        
                    <tr>
                        <td data-label="Number">{{ ++$key }}</td>
                        <td data-label="Program Studi">{{ $item->kelas->pstudi->fakultas->name }} <br> {{ $item->kelas->pstudi->name }}</td>
                        <td data-label="Nama Kelas">{{ $item->kelas->code }}</td>
                        <td data-label="Mata Kuliah">{{ $item->matkul->name }} <br> {{ $item->pert_id . ' - ' . $item->bsks . ' SKS' }}</td>
                        <td data-label="Nama Dosen">{{ $item->dosen->dsn_name }}</td>
                        <td data-label="Metode">{{ $item->meth_id }}</td>
                        <td data-label="Tanggal Kuliah">{{ $item->days_id }} <br> - <br> {{ \Carbon\Carbon::parse($item->date)->format('d M Y') }}</td>
                        <td data-label="Waktu Perkuliahan">{{ $item->start }} <br> - <br> {{ $item->ended }}</td>
                        <td class="d-flex justify-content-center align-items-center">
                            <a href="#" style="margin-right: 10px" data-bs-toggle="modal" data-bs-target="#updateJadkul{{ $item->code }}" class="btn btn-outline-primary"><i class="fas fa-edit"></i></a>
                            <a href="{{ route('web-admin.master.jadkul-absen-view', $item->code) }}"  style="margin-right: 10px" class="btn btn-outline-info"><i class="fa-solid fa-user-check"></i></a>
                            <form id="delete-form-{{ $item->code }}"
                                action="{{ route('web-admin.master.jadkul-destroy', $item->code) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <a type="button" class="bs-tooltip btn btn-rounded btn-outline-danger"
                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"
                                    data-original-title="Delete"
                                    data-url="{{ route('web-admin.master.jadkul-destroy', $item->code) }}"
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

</section>
<div class="me-1 mb-1 d-inline-block">

    <!--Extra Large Modal -->
    @foreach ($jadkul as $item)
    <form action="{{ route('web-admin.master.jadkul-update', $item->code) }}" method="POST" enctype="multipart/form-data">
        @method('patch')
        @csrf
        <div class="modal fade text-left w-100" id="updateJadkul{{$item->code}}" tabindex="-1" role="dialog"
            aria-labelledby="myModalLabel16" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl"
                role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel16">Edit Jadwal Perkuliahan - {{ $item->matkul->name . ' ' .$item->pert_id }}</h4>
                        <div class="">
    
                            <button type="submit" class="mt-1 btn btn-outline-primary" >
                                <i class="fas fa-paper-plane"></i>
                            </button>
                            <button type="button" class="mt-1 btn btn-outline-danger" data-bs-dismiss="modal"
                                aria-label="Close">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="modal-body">
                        <div class="row">

                            <div class="form-group col-lg-3 col-12">
                                <label for="makul_id">Mata Kuliah</label>
                                <select name="makul_id" id="makul_id" class="form-select" disabled>
                                    <option value="" selected>Pilih Mata Kuliah</option>
                                    @foreach ($matkul as $item_m)
                                    @php
                                        $dosen1_name = $item_m->dosen1 ? $item_m->dosen1->dsn_name : null;
                                        $dosen2_name = $item_m->dosen2 ? $item_m->dosen2->dsn_name : null;
                                        $dosen3_name = $item_m->dosen3 ? $item_m->dosen3->dsn_name : null;
                                    @endphp
                                    <option value="{{ $item_m->id }}" {{ $item->makul_id == $item_m->id ? 'selected' : '' }} data-dosen1="{{ $item_m->dosen_1 }}" data-dosen2="{{ $item_m->dosen_2 }}" data-dosen3="{{ $item_m->dosen_3 }}" data-dosen1-name="{{ $dosen1_name }}" data-dosen2-name="{{ $dosen2_name }}" data-dosen3-name="{{ $dosen3_name }}">{{ $item_m->name }}</option>
                                    @endforeach
                                </select>
                                @error('makul_id')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group col-lg-3 col-12">
                                <label for="pert_id">Pertemuan</label>
                                <select name="pert_id" id="pert_id" class="form-select" >
                                    <option value="" selected>Pilih Pertemuan</option>
                                    <option value="1" {{ $item->raw_pert_id == 1 ? 'selected' : '' }}>Pertemuan 1</option>
                                    <option value="2" {{ $item->raw_pert_id == 2 ? 'selected' : '' }}>Pertemuan 2</option>
                                    <option value="3" {{ $item->raw_pert_id == 3 ? 'selected' : '' }}>Pertemuan 3</option>
                                    <option value="4" {{ $item->raw_pert_id == 4 ? 'selected' : '' }}>Pertemuan 4</option>
                                    <option value="5" {{ $item->raw_pert_id == 5 ? 'selected' : '' }}>Pertemuan 5</option>
                                    <option value="6" {{ $item->raw_pert_id == 6 ? 'selected' : '' }}>Pertemuan 6</option>
                                    <option value="7" {{ $item->raw_pert_id == 7 ? 'selected' : '' }}>Pertemuan 7</option>
                                    <option value="8" {{ $item->raw_pert_id == 8 ? 'selected' : '' }}>Pertemuan 8</option>
                                    <option value="9" {{ $item->raw_pert_id == 9 ? 'selected' : '' }}>Pertemuan 9</option>
                                    <option value="10" {{ $item->raw_pert_id == 10 ? 'selected' : '' }}>Pertemuan 10</option>
                                    <option value="11" {{ $item->raw_pert_id == 11 ? 'selected' : '' }}>Pertemuan 11</option>
                                    <option value="12" {{ $item->raw_pert_id == 12 ? 'selected' : '' }}>Pertemuan 12</option>
                                    <option value="13" {{ $item->raw_pert_id == 13 ? 'selected' : '' }}>Pertemuan 13</option>
                                    <option value="14" {{ $item->raw_pert_id == 14 ? 'selected' : '' }}>Pertemuan 14</option>
                                    <option value="15" {{ $item->raw_pert_id == 15 ? 'selected' : '' }}>Pertemuan 15</option>
                                    <option value="16" {{ $item->raw_pert_id == 16 ? 'selected' : '' }}>Pertemuan 16</option>
                                </select>
                                @error('pert_id')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group col-lg-3 col-12">
                                <label for="meth_id">Metode Perkuliahan</label>
                                <select name="meth_id" id="meth_id" class="form-select" >
                                    <option value="" selected>Pilih Metode Perkuliahan</option>
                                    <option value="0" {{ $item->raw_meth_id == 0 ? 'selected' : '' }}>Tatap Muka</option>
                                    <option value="1" {{ $item->raw_meth_id == 1 ? 'selected' : '' }}>Teleconference</option>
                                </select>
                                @error('meth_id')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group col-lg-3 col-12">
                                <label for="bsks">Bebas SKS Hari Ini</label>
                                <input type="number" min="1" max="8" name="bsks" id="bsks" class="form-control" value="{{ $item->bsks }}">
                                @error('bsks')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group col-lg-3 col-12">
                                <label for="days_id">Hari</label>
                                <select name="days_id" id="days_id" class="form-select" >
                                    <option value="" selected>Pilih Hari</option>
                                    <option value="0" {{ $item->raw_days_id == 0 ? 'selected' : '' }}>Hari Minggu</option>
                                    <option value="1" {{ $item->raw_days_id == 1 ? 'selected' : '' }}>Hari Senin</option>
                                    <option value="2" {{ $item->raw_days_id == 2 ? 'selected' : '' }}>Hari Selasa</option>
                                    <option value="3" {{ $item->raw_days_id == 3 ? 'selected' : '' }}>Hari Rabu</option>
                                    <option value="4" {{ $item->raw_days_id == 4 ? 'selected' : '' }}>Hari Kamis</option>
                                    <option value="5" {{ $item->raw_days_id == 5 ? 'selected' : '' }}>Hari Jum'at</option>
                                    <option value="6" {{ $item->raw_days_id == 6 ? 'selected' : '' }}>Hari Sabtu</option>
                                </select>
                                @error('days_id')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group col-lg-3 col-12">
                                <label for="date">Tanggal Perkuliahan</label>
                                <input type="date" name="date" id="date" class="form-control" value="{{ $item->date }}">
                                @error('date')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group col-lg-3 col-12">
                                <label for="start">Waktu Mulai Perkuliahan</label>
                                <input type="time" name="start" id="start" class="form-control" value="{{ $item->start }}">
                                @error('start')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group col-lg-3 col-12">
                                <label for="ended">Waktu Selesai Perkuliahan</label>
                                <input type="time" name="ended" id="ended" class="form-control" value="{{ $item->ended }}">
                                @error('ended')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group col-lg-4 col-12">
                                <label for="ruang_id">Ruangan</label>
                                <select name="ruang_id" id="ruang_id" class="form-select" >
                                    <option value="" selected>Pilih Ruangan</option>
                                    @foreach ($ruang as $item_r)
                                    <option value="{{ $item_r->id }}" {{ $item->ruang_id == $item_r->id ? 'selected' : '' }}>{{ $item_r->name }}</option>
                                    @endforeach
                                </select>
                                @error('ruang_id')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group col-lg-4 col-12">
                                <label for="kelas_id">Kelas</label>
                                <select name="kelas_id" id="kelas_id" class="form-select" >
                                    <option value="" selected>Pilih Kelas</option>
                                    @foreach ($kelas as $item_k)
                                    <option value="{{ $item_k->id }}" {{ $item->kelas_id == $item_k->id ? 'selected' : '' }}>{{ $item_k->name }}</option>
                                    @endforeach
                                </select>
                                @error('kelas_id')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group col-lg-4 col-12">
                                <label for="dosen_id">Dosen</label>
                                <select name="dosen_id" id="dosen_id" class="form-select">
                                    <option value="" selected>Pilih Dosen</option>
                                    <option value="{{ $item->matkul->dosen_1 == null ? '' : $item->matkul->dosen_1 }}" {{ $item->matkul->dosen_1 == $item->dosen_id ? 'selected' : ''  }} {{ $item->matkul->dosen_1 == null ? 'disabled' : '' }}>{{ $item->matkul->dosen_1 == null ? 'Tidak Tersedia' : $item->matkul->dosen1->dsn_name }}</option>
                                    <option value="{{ $item->matkul->dosen_2 == null ? '' : $item->matkul->dosen_2 }}" {{ $item->matkul->dosen_2 == $item->dosen_id ? 'selected' : ''  }} {{ $item->matkul->dosen_2 == null ? 'disabled' : '' }}>{{ $item->matkul->dosen_2 == null ? 'Tidak Tersedia' : $item->matkul->dosen2->dsn_name }}</option>
                                    <option value="{{ $item->matkul->dosen_3 == null ? '' : $item->matkul->dosen_3 }}" {{ $item->matkul->dosen_3 == $item->dosen_id ? 'selected' : ''  }} {{ $item->matkul->dosen_3 == null ? 'disabled' : '' }}>{{ $item->matkul->dosen_3 == null ? 'Tidak Tersedia' : $item->matkul->dosen3->dsn_name }}</option>
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
@section('custom-js')


@endsection