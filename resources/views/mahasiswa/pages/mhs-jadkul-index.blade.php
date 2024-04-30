@extends('base.base-dash-index')
@section('title')
    Data Jadwal Kuliah - Siakad By Internal Developer
@endsection
@section('menu')
    Data Jadwal Kuliah
@endsection
@section('submenu')
    Data Jadwal Kuliah
@endsection
@section('urlmenu')
@endsection
@section('subdesc')
    Halaman untuk melihat Jadwal Kuliah
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
                        {{-- <th class="text-center">Program Studi</th> --}}
                        <th class="text-center">Nama Kelas</th>
                        <th class="text-center">Nama Mata Kuliah</th>
                        <th class="text-center">Dosen Pengajar</th>
                        <th class="text-center">Metode Perkuliahan</th>
                        <th class="text-center">Lokasi Perkuliahan</th>
                        <th class="text-center">Tanggal Perkuliahan</th>
                        <th class="text-center">Waktu Perkuliahan</th>
                        <th class="text-center">Button</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($jadkul as $key => $item)
                        
                    <tr>
                        <td data-label="Number">{{ ++$key }}</td>
                        {{-- <td data-label="Program Studi">{{ $item->kelas->pstudi->fakultas->name }} <br> {{ $item->kelas->pstudi->name }}</td> --}}
                        <td data-label="Nama Kelas">{{ $item->kelas->code }}</td>
                        <td data-label="Mata Kuliah">{{ $item->matkul->name }} <br> {{ $item->pert_id . ' - ' . $item->bsks . ' SKS' }}</td>
                        <td data-label="Nama Dosen">{{ $item->dosen->dsn_name }}</td>
                        <td data-label="Metode">{{ $item->meth_id }}</td>
                        <td data-label="Lokasi">{{ $item->ruang->gedung->name }}<br>{{ $item->ruang->name . ' - Lantai ' . $item->ruang->floor }}</td>
                        <td data-label="Tanggal Kuliah">{{ $item->days_id }} <br> - <br> {{ \Carbon\Carbon::parse($item->date)->format('d M Y') }}</td>
                        <td data-label="Waktu Perkuliahan">{{ $item->start }} <br> - <br> {{ $item->ended }}</td>
                        <td class="d-flex justify-content-center align-items-center">
                            <a href="{{ route('mahasiswa.home-jadkul-absen', $item->code) }}" style="margin-right: 10px" class="btn btn-info"><i class="fas fa-calendar-check"></i> Absensi</a>

                        </td>
                    </tr>
                    @endforeach
 
                </tbody>
            </table>
        </div>
    </div>

</section>
@endsection