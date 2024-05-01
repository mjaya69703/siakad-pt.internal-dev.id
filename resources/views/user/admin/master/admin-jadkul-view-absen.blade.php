@extends('base.base-dash-index')
@section('title')
    Data Master Absensi Mahasiswa - Siakad By Internal Developer
@endsection
@section('menu')
    Data Jadwal Kuliah
@endsection
@section('submenu')
    Daftar Absensi {{ $jadkul->matkul->name . ' - ' . $jadkul->pert_id }}
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
    Halaman untuk melihat Absensi Mahasiswa pada Mata Kuliah {{ $jadkul->matkul->name . ' - ' . $jadkul->pert_id }}
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
                    <a href="{{ route('web-admin.master.jadkul-index') }}" class="btn btn-outline-warning mt-1"><i class="fa-solid fa-backward"></i></a>
                    <a href="#"  style="margin-right: 10px" data-bs-toggle="modal" data-bs-target="#cetakDataAbsen" class="btn btn-outline-danger mt-1"><i class="fa-solid fa-file-pdf"></i></a>
                </div>
            </h5>
        </div>
        <div class="card-body">
            <table class="table table-striped"  id="table1">
                <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">Nama Mahasiswa</th>
                        <th class="text-center">Nomor NIM</th>
                        <th class="text-center">Nama Kelas</th>
                        <th class="text-center">Status Absen</th>
                        <th class="text-center">Tanggal Absen</th>
                        <th class="text-center">Waktu Absen</th>
                        <th class="text-center">Button</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($absen as $key => $item)
                        
                    <tr>
                        <td data-label="Number">{{ ++$key }}</td>
                        <td data-label="Nama Mahasiswa">{{ $item->mahasiswa->mhs_name }}</td>
                        <td data-label="Nomor NIM Mahasiswa">{{ $item->mahasiswa->mhs_nim }}</td>
                        <td data-label="Nama Kelas">{{ $item->mahasiswa->kelas->name }}</td>
                        <td data-label="Status Absen">
                            {{ $item->absen_type }} <br> 
                        </td>
                        <td data-label="Tanggal Absen">{{ \Carbon\Carbon::parse($item->absen_date)->format('d M Y') }}</td>
                        <td data-label="Waktu Absen">{{ \Carbon\Carbon::parse($item->absen_time)->format('H:i') }} WIB</td>
                        <td class="d-flex justify-content-center align-items-center">
                            <a href="#" style="margin-right: 10px" data-bs-toggle="modal" data-bs-target="#updateAbsen{{ $item->code }}" class="btn btn-outline-primary"><i class="fas fa-edit"></i></a>
                            {{-- <a href="{{ route('web-admin.master.jadkul-view-absen', $item->code) }}"  style="margin-right: 10px" class="btn btn-outline-info"><i class="fa-solid fa-user-check"></i></a> --}}
                            {{-- <form id="delete-form-{{ $item->code }}"
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
                            </form> --}}
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
    @foreach ($absen as $item)
    <form action="{{ route('web-admin.master.jadkul-absen-update', $item->code) }}" method="POST" enctype="multipart/form-data">
        @method('patch')
        @csrf
        <div class="modal fade text-left w-100" id="updateAbsen{{$item->code}}" tabindex="-1" role="dialog"
            aria-labelledby="myModalLabel16" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl"
                role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel16">Edit Absensi Perkuliahan - {{ $item->mahasiswa->mhs_name }} </h4>
                        <div class="">
    
                            <button type="submit" class="btn btn-outline-primary mt-1" >
                                <i class="fas fa-paper-plane"></i>
                            </button>
                            <button type="button" class="btn btn-outline-danger mt-1" data-bs-dismiss="modal"
                                aria-label="Close">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="form-control col-lg-12 col-12">
                                <img src="{{ asset('storage/images/'.$item->absen_proof) }}" class="card-img-top mb-2" alt="">
                                <label for="absen_desc">Deskripsi Absen</label>
                                <textarea name="absen_desc" id="absen_desc" class="form-control" cols="30" rows="10" placeholder="Inputkan deskripsi absen...">{{ $item->absen_desc == null ? null : $item->absen_desc }}</textarea>
                            </div>



                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    @endforeach
</div>
<div class="me-1 mb-1 d-inline-block">

    <form action="{{ route('web-admin.master.jadkul-absen-cetak', $jadkul->code) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="modal fade text-left w-100" id="cetakDataAbsen" tabindex="-1" role="dialog"
            aria-labelledby="myModalLabel16" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-l"
                role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel16">Cetak Data Absensi - {{ $jadkul->matkul->name . ' - ' . $jadkul->pert_id}} </h4>
                        <div class="">
    
                            {{-- <button type="submit" class="btn btn-outline-primary mt-1" >
                                <i class="fas fa-paper-plane"></i>
                            </button> --}}
                            <button type="button" class="btn btn-outline-danger mt-1" data-bs-dismiss="modal"
                                aria-label="Close">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="form-group col-lg-12 col-12">
                                <label for="kode_kelas">Pilih Kelas</label>
                                <div class="d-flex justify-content-between align-items-center">
                                    <select name="kode_kelas" id="kode_kelas" class="form-select">
                                        <option value="" selected>Pilih Kelas</option>
                                        @foreach ($kelas as $item)
                                            <option value="{{ $item->code }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                    <button type="submit" class="btn btn-outline-danger" style="margin-left: 10px"><i class="fa-solid fa-file-pdf"></i></button>
                                </div>
    
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

</div>
@endsection
@section('custom-js')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


@endsection