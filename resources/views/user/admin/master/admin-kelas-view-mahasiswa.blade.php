@extends('base.base-dash-index')
@section('title')
    Daftar Mahasiswa Kelas {{ $kelas->name }} - Siakad By Internal Developer
@endsection
@section('menu')
    Data Kelas
@endsection
@section('submenu')
    Daftar Mahasiswa Kelas {{ $kelas->name }}
@endsection
@section('urlmenu')
    #
@endsection
@section('subdesc')
    Halaman untuk melihat data Mahasiswa pada kelas {{ $kelas->name }}
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
                    <a href="{{ route($prefix.'master.kelas-index') }}" class="btn btn-outline-warning mt-1"><i class="fa-solid fa-backward"></i></a>
                    <form action="{{ route($prefix.'master.kelas-mahasiswa-cetak', $kelas->code) }}" method="post">
                        @csrf
                        <button type="submit"  style="margin-right: 10px" class="btn btn-outline-danger mt-1"><i class="fa-solid fa-file-pdf"></i></button>
                    </form>
                </div>
            </h5>
        </div>
        <div class="card-body">
            <table class="table table-striped"  id="table1">
                <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">Nomor NIM</th>
                        <th class="text-center">Nama Mahasiswa</th>
                        <th class="text-center">Gender</th>
                        <th class="text-center">Kehadiran</th>
                        <th class="text-center">Presentase Kehadiran</th>
                        <th class="text-center">Button</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($mahasiswa as $key => $item)
                    <tr>
                        <td data-label="Number">{{ ++$key }}</td>
                        <td data-label="Nomor NIM">{{ $item->mhs_nim }}</td>
                        <td data-label="Nama Mahasiswa">{{ $item->mhs_name }}</td>
                        <td data-label="Jenis Kelamin">{{ $item->mhs_gend == null ? '-' : $item->mhs_gend }}</td>
                        @php  
                            $dateNow  = \Carbon\Carbon::now()->format('m-d-Y');
                            $timeNow  = \Carbon\Carbon::now()->format('H:i:s');

                            $jadkul = \App\Models\JadwalKuliah::where('kelas_id', $kelas->id)->get();
                            $absen = \App\Models\AbsensiMahasiswa::where('author_id', $item->id)->get();
                            // dd($absen->count());
                            
                        @endphp
                        <td data-label="Data Kehadiran">{{ $absen->count() }} / {{ $jadkul->count() }} Perkuliahan</td>
                        <td data-label="Presentase Kehadiran">{{ $absen->count() / $jadkul->count() * 100 }} %  </td>

                        <td class="d-flex justify-content-center align-items-center">
                            <a href="#" style="margin-right: 10px" data-bs-toggle="modal" data-bs-target="#updateAbsen{{ $item->code }}" class="btn btn-outline-primary"><i class="fas fa-edit"></i></a>
                            {{-- <a href="{{ route($prefix.'master.jadkul-view-absen', $item->code) }}"  style="margin-right: 10px" class="btn btn-outline-info"><i class="fa-solid fa-user-check"></i></a> --}}
                            {{-- <form id="delete-form-{{ $item->code }}"
                                action="{{ route($prefix.'master.jadkul-destroy', $item->code) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <a type="button" class="bs-tooltip btn btn-rounded btn-outline-danger"
                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"
                                    data-original-title="Delete"
                                    data-url="{{ route($prefix.'master.jadkul-destroy', $item->code) }}"
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
    @foreach ($mahasiswa as $item)
    <form action="#" method="POST" enctype="multipart/form-data">
        @method('patch')
        @csrf
        <div class="modal fade text-left w-100" id="updateAbsen{{$item->code}}" tabindex="-1" role="dialog"
            aria-labelledby="myModalLabel16" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl"
                role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel16">Edit Data Mahasiswa - {{ $item->mhs_name }} </h4>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


@endsection