@extends('base.base-dash-index')
@section('title')
    Jadwal Mengajar - Siakad By Internal Developer
@endsection
@section('menu')
    Jadwal Mengajar
@endsection
@section('submenu')
    Lihat Data
@endsection
@section('urlmenu')
    #
@endsection
@section('subdesc')
    Halaman untuk melihat Jadwal Mengajar
@endsection
@section('content')
    <section class="content">
        <div class="row">
            <div class="col-lg-12 col-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">
                            @yield('menu')
                        </h5>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped" id="table1">
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
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
                                        <td data-label="Nama Kelas">{{ $item->kelas->code }}</td>
                                        <td data-label="Mata Kuliah">{{ $item->matkul->name }} <br> {{ $item->pert_id . ' - ' . $item->bsks . ' SKS' }}</td>
                                        <td data-label="Nama Dosen">{{ $item->dosen->dsn_name }}</td>
                                        <td data-label="Metode">{{ $item->meth_id }}</td>
                                        <td data-label="Lokasi">{{ $item->ruang->gedung->name }}<br>{{ $item->ruang->name . ' - Lantai ' . $item->ruang->floor }}</td>
                                        <td data-label="Tanggal Kuliah">{{ $item->days_id }} <br> {{ \Carbon\Carbon::parse($item->date)->format('d M Y') }}</td>
                                        <td data-label="Waktu Perkuliahan">{{ $item->start }} <br> - <br> {{ $item->ended }}</td>
                                        <td class="d-flex justify-content-center align-items-center">
                                            <a href="{{ route('dosen.akademik.jadwal-view-absen', $item->code) }}" style="margin-right: 10px" class="btn btn-success"><i class="fas fa-calendar-check"></i></a>
                                            <a href="{{ route('dosen.akademik.jadwal-view-feedback', $item->code) }}" style="margin-right: 10px" class="btn btn-warning"><i class="fas fa-star"></i></a>

                                            {{-- <a href="{{ route('dosen.akademik.jadwal-absen', $item->code) }}" style="margin-right: 10px" class="btn btn-info"><i class="fas fa-edit"></i></a> --}}

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
