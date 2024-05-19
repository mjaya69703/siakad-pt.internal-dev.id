@extends('base.base-dash-index')
@section('title')
    Absensi Harian - Siakad By Internal Developer
@endsection
@section('menu')
    Absensi Harian
@endsection
@section('submenu')
    Lihat
@endsection
@section('urlmenu')
    {{ route($prefix . 'presensi.absen-harian') }}
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
                        <a href="{{ route($prefix . 'presensi.absen-harian') }}">
                            <div class="card btn btn-outline-success">
                                <div class="card-body d-flex justify-content-around align-items-center">
                                    <span class="icon" style="margin-right: 25px;"><i class="fa-solid fa-clock" style="font-size: 42px"></i></span>
                                    <span class="text-white" style="margin-left: 25px; font-size: 16px;">{{ $hadir->count() }} <br> Hadir</span>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-6 mb-2">
                        <a href="{{ route($prefix . 'presensi.absen-harian') }}">
                            <div class="card btn btn-outline-success">
                                <div class="card-body d-flex justify-content-around align-items-center">
                                    <span class="icon" style="margin-right: 25px;"><i class="fa-solid fa-clock" style="font-size: 42px"></i></span>
                                    <span class="text-white" style="margin-left: 25px; font-size: 16px;">{{ $izin->count() }} <br> Izin & Cuti</span>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-6 mb-2">
                        <a href="{{ route($prefix . 'presensi.absen-harian') }}">
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
                        <a href="@yield('urlmenu')" class="btn btn-warning"><i class="fa-solid fa-backward"></i></a>
                    </div>
                    <div class="card-body">
                        <form action="{{ route($prefix . 'home-presensi-update-absen') }}" method="POST" enctype="multipart/form-data">
                            @method('PATCH')
                            @csrf

                            <div class="row">

                                <div class="form-group col-12 col-lg-6" style="display: none">
                                    <label for="absen_user_id">ID User</label>
                                    <input type="text" class="form-control" name="absen_user_id" id="absen_user_id" value="{{ Auth::user()->id }}">
                                </div>
                                <div class="form-group col-12 col-lg-6">
                                    <label for="absen_user_id">ID User</label>
                                    <input type="text" class="form-control" name="absen_user_name" readonly id="absen_user_name" value="{{ Auth::user()->name }}">
                                </div>
                                <div class="form-group col-12 col-lg-6">
                                    <label for="absen_type">Pilih Jenis Absen</label>
                                    <select name="absen_type" id="absen_type" readonly class="form-control">
                                        <optgroup label="Absen Harian">
                                            <option value="" selected>Pilih Jenis Absen</option>
                                            <option value="0" {{ $absen->absen_raw_type == 0 ? 'selected' : '' }}>Absen Regular ( 08.00 - 16.00 )</option>
                                            <option value="1" {{ $absen->absen_raw_type == 1 ? 'selected' : '' }}>Absen Lembur ( 16.00 - 21.00 )</option>
                                        </optgroup>
                                    </select>
                                </div>
                                <div class="form-group col-12 col-lg-4">
                                    <label for="absen_date">Pilih Tanggal</label>
                                    <input type="date" class="form-control" name="absen_date" readonly id="absen_date" placeholder="Pilih Tanggal..." value="{{ $absen->absen_date }}">
                                    @error('absen_date')
                                        <span class="text-danger" style="font-size: 10px">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-12 col-lg-4">
                                    <label for="absen_time_in">Jam Masuk</label>
                                    <input type="time" class="form-control" name="absen_time_in" readonly id="absen_time_in" placeholder="Jam Masuk" value="{{ $absen->absen_time_in }}">
                                    @error('absen_time_in')
                                        <span class="text-danger" style="font-size: 10px">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-12 col-lg-4">
                                    <label for="absen_time_out">Jam Keluar</label>
                                    <input type="time" class="form-control" name="absen_time_out" id="absen_time_out" placeholder="Jam Masuk" value="{{ $absen->absen_time_out == null ? now()->format('H:i') : $absen->absen_time_out }}">
                                    @error('absen_time_out')
                                        <span class="text-danger" style="font-size: 10px">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-12 col-lg-12">
                                    <label for="absen_desc">Pekerjaan Hari Ini</label>
                                    <textarea name="absen_desc" id="dark" class="form-control" cols="10" rows="10" placeholder="Jelasin aktifitas kamu hari ini ya...">{{ $absen->absen_desc }}</textarea>
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
            </div>
        </div>
    </section>
@endsection
@section('custom-js')
    <script src="{{ asset('dist') }}/assets/extensions/tinymce/tinymce.min.js"></script>
    <script src="{{ asset('dist') }}/assets/static/js/pages/tinymce.js"></script>
@endsection
