@extends('base.base-dash-index')
@section('title')
    Absensi Izin, Sakit dan Cuti - Siakad By Internal Developer
@endsection
@section('menu')
    Absensi Izin, Sakit dan Cuti
@endsection
@section('submenu')
    Lihat
@endsection
@section('urlmenu')
    #
@endsection
@section('subdesc')
    Halaman untuk melihat data absensi harian
@endsection
@section('content')
    <section class="content">
        <div class="row">
            <div class="col-lg-12 col-12">
                <div class="row">
                    <div class="col-lg-3 col-6 mb-2">
                        <a href="{{ route($prefix . 'home-presensi-list') }}">
                            <div class="card btn btn-outline-success">
                                <div class="card-body d-flex justify-content-around align-items-center">
                                    <span class="icon" style="margin-right: 25px;"><i class="fa-solid fa-clock" style="font-size: 42px"></i></span>
                                    <span class="text-white" style="margin-left: 25px; font-size: 16px;">{{ $hadir->count() }} <br> Hadir</span>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-6 mb-2">
                        <a href="{{ route($prefix . 'home-presensi-list') }}">
                            <div class="card btn btn-outline-success">
                                <div class="card-body d-flex justify-content-around align-items-center">
                                    <span class="icon" style="margin-right: 25px;"><i class="fa-solid fa-clock" style="font-size: 42px"></i></span>
                                    <span class="text-white" style="margin-left: 25px; font-size: 16px;">{{ $izin->count() }} <br> Izin & Cuti</span>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-6 mb-2">
                        <a href="{{ route($prefix . 'home-presensi-list') }}">
                            <div class="card btn btn-outline-success">
                                <div class="card-body d-flex justify-content-around align-items-center">
                                    <span class="icon" style="margin-right: 25px;"><i class="fa-solid fa-clock" style="font-size: 42px"></i></span>
                                    <span class="text-white" style="margin-left: 25px; font-size: 16px;">{{ $terlambat->count() }} <br> Terlambat</span>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-6 mb-2">
                        <a href="#">
                            <div class="card btn btn-outline-success">
                                <div class="card-body d-flex justify-content-around align-items-center">
                                    <span class="icon" style="margin-right: 25px;"><i class="fa-solid fa-clock" style="font-size: 42px"></i></span>
                                    <span class="text-white" style="margin-left: 25px; font-size: 16px;">{{ $hadir->count() + $izin->count() + $terlambat->count() }} <br> Total Absensi</span>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

            </div>
            <div class="col-lg-12 col-12">
                <div class="card mb-2">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h4 class="card-title">Absensi Harian</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route($prefix . 'home-presensi-input-izin') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="row">

                                <div class="form-group col-12 col-lg-6" style="display: none">
                                    <label for="absen_user_id">ID User</label>
                                    <input type="text" class="form-control" name="absen_user_id" id="absen_user_id" value="{{ Auth::user()->id }}">
                                </div>
                                <div class="form-group col-12 col-lg-6">
                                    <label for="absen_user_id">ID User</label>
                                    <input type="text" class="form-control" name="absen_user_name" id="absen_user_name" value="{{ Auth::user()->name }}">
                                </div>
                                <div class="form-group col-12 col-lg-6">
                                    <label for="absen_type">Pilih Jenis Absen</label>
                                    <select name="absen_type" id="absen_type" class="form-control">
                                        <option value="" selected>Pilih Jenis Izin</option>
                                        <optgroup label="Bisa diajukan pada hari H">
                                            <option value="2">Absen Sakit</option>
                                            <option value="3">Keperluan Berobat</option>
                                            <option value="4">Izin Masuk Telat</option>
                                            <option value="5">Izin Pulang Lebih Awal</option>
                                        </optgroup>
                                        <optgroup label="Diajukan minimal H-1">
                                            <option value="6">Keperluan Pribadi</option>
                                            <option value="7">Cuti Tahunan</option>
                                        </optgroup>
                                    </select>
                                </div>
                                <div class="form-group col-12 col-lg-6">
                                    <label for="absen_date">Pilih Tanggal</label>
                                    <input type="date" class="form-control" name="absen_date" id="absen_date" placeholder="Pilih Tanggal...">
                                    @error('absen_date')
                                        <span class="text-danger" style="font-size: 10px">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-12 col-lg-6">
                                    <label for="absen_proof">Bukti Sakit, Izin dan Sakit</label>
                                    <input type="file" class="form-control" name="absen_proof" id="absen_proof" placeholder="Bukti Kehadiran">
                                    @error('absen_proof')
                                        <span class="text-danger" style="font-size: 10px">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-12 col-lg-12">
                                    <label for="absen_desc">Keterangan Absen</label>
                                    <textarea name="absen_desc" id="dark" class="form-control" cols="10" rows="10" placeholder="Keterangan tambahan"></textarea>
                                    @error('absen_desc')
                                        <span class="text-danger" style="font-size: 10px">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="d-flex justify-content-end align-items-center">
                                    <button type="submit" class="btn btn-primary"><i style="margin-right: 5px" class="fa-solid fa-paper-plane"></i> Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card mb-2">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h4 class="card-title">Data Riwayat Absen</h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped" id="table1">
                            <thead>
                                <th class="text-center">#</th>
                                <th class="text-center">Fullname</th>
                                <th class="text-center">Tanggal</th>
                                <th class="text-center">Masuk</th>
                                <th class="text-center">Keluar</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Button</th>
                            </thead>
                            <tbody>
                                @foreach ($absen as $key => $item)
                                    <tr class="">
                                        <td data-label="Number">{{ ++$key }}</td>
                                        <td data-label="Fullname">{{ $item->user->name }}</td>
                                        <td data-label="Tanggal">{{ $item->absen_date }}</td>
                                        <td data-label="Masuk">{{ $item->absen_time_in }}</td>
                                        <td data-label="Keluar">{{ $item->absen_time_out == null ? '-' : $item->absen_time_out }}</td>
                                        <td data-label="Status">{{ $item->absen_type }}</td>
                                        <td class="d-flex justify-content-center align-items-center">
                                            @if ($item->raw_absen_approve == 0)
                                                @if ($item->absen_time_out == null)
                                                    <a href="{{ route($prefix . 'presensi.absen-harian-view', $item->absen_code) }}" class="btn btn-danger">Absen Keluar</a>
                                                @elseif ($item->absen_time_out)
                                                    <a href="{{ route($prefix . 'presensi.absen-harian-view', $item->absen_code) }}" class="btn btn-success">Lihat Absen</a>
                                                @endif
                                            @elseif ($item->raw_absen_approve == 1)
                                                <span class="btn btn-warning">Pending</span>
                                            @elseif ($item->raw_absen_approve == 2)
                                                <span class="btn btn-success">Approve</span>
                                            @endif
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
@section('custom-js')
    <script src="{{ asset('dist') }}/assets/extensions/tinymce/tinymce.min.js"></script>
    <script src="{{ asset('dist') }}/assets/static/js/pages/tinymce.js"></script>
@endsection
