@extends('base.base-dash-index')
@section('title')
    SIAKAD PT - Internal Developer
@endsection
@section('menu')
    Home
@endsection
@section('submenu')
    Presensi
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
    Halaman Presensi Kehadiran
@endsection
@section('custom-css')
    <style>
        @media (max-width: 768px) {
            .card-body {
                flex-direction: column;
                justify-content: center;
                align-items: center;
            }

            .icon {
                margin: 10px 0;
            }

            .text-white {
                margin-left: 0px !important;
                /* Mengatur margin-left menjadi 0 */
                margin-top: 10px;
                margin-bottom: 10px;
            }
        }
    </style>
@endsection
@section('content')
    <section class="section">
        <div class="row">
            <div class="col-lg-12 col-12 row">
                <div class="col-lg-3 col-6 mb-2">
                    <a href="{{ route($prefix.'home-presensi-list') }}">
                        <div class="card btn btn-outline-success">
                            <div class="card-body d-flex justify-content-around align-items-center">
                                <span class="icon" style="margin-right: 25px;"><i class="fa-solid fa-clock" style="font-size: 42px"></i></span>
                                <span class="text-white" style="margin-left: 25px; font-size: 16px;">Jumlah Kehadiran <br>{{ $hadir->count() }}</span>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-6 mb-2">
                    <a href="{{ route($prefix.'home-presensi-list') }}">
                        <div class="card btn btn-outline-success">
                            <div class="card-body d-flex justify-content-around align-items-center">
                                <span class="icon" style="margin-right: 25px;"><i class="fa-solid fa-clock" style="font-size: 42px"></i></span>
                                <span class="text-white" style="margin-left: 25px; font-size: 16px;">Jumlah Izin dan Cuti <br>{{ $izin->count() }}</span>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-6 mb-2">
                    <a href="{{ route($prefix.'home-presensi-list') }}">
                        <div class="card btn btn-outline-success">
                            <div class="card-body d-flex justify-content-around align-items-center">
                                <span class="icon" style="margin-right: 25px;"><i class="fa-solid fa-clock" style="font-size: 42px"></i></span>
                                <span class="text-white" style="margin-left: 25px; font-size: 16px;">Jumlah Terlambat <br>{{ $terlambat->count() }}</span>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-6 mb-2">
                    <a href="#">
                        <div class="card btn btn-outline-success">
                            <div class="card-body d-flex justify-content-around align-items-center">
                                <span class="icon" style="margin-right: 25px;"><i class="fa-solid fa-clock" style="font-size: 42px"></i></span>
                                <span class="text-white" style="margin-left: 25px; font-size: 16px;">Jumlah Absensi <br>0</span>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-12 col-12">

            </div>
            <div class="card">
                <div class="card-body">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" id="home-tab" data-bs-toggle="tab" href="#home" role="tab"
                                aria-controls="home" aria-selected="true">Absen Hadir</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="profile-tab" data-bs-toggle="tab" href="#profile" role="tab"
                                aria-controls="profile" aria-selected="false">Absen Sakit</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="contact-tab" data-bs-toggle="tab" href="#contact" role="tab"
                                aria-controls="contact" aria-selected="false">Izin / Cuti</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <hr>
                            <form action="{{ route($prefix.'home-presensi-input-absen') }}" method="POST" enctype="multipart/form-data">
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
                                            <optgroup label="Absen Harian">
                                                <option value="" selected>Pilih Jenis Absen</option>
                                                <option value="0">Absen Regular ( 08.00 - 16.00 )</option>
                                                <option value="1">Absen Lembur ( 16.00 - 21.00 )</option>
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
                                        <label for="absen_time_in">Jam Masuk</label>
                                        <input type="time" class="form-control" name="absen_time_in" id="absen_time_in" placeholder="Jam Masuk">
                                        @error('absen_time_in')
                                        <span class="text-danger" style="font-size: 10px">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-12 col-lg-6">
                                        <label for="absen_time_out">Jam Keluar</label>
                                        <input type="time" class="form-control" name="absen_time_out" id="absen_time_out" placeholder="Jam Masuk">
                                        @error('absen_time_out')
                                        <span class="text-danger" style="font-size: 10px">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-12 col-lg-6">
                                        <label for="absen_proof">Bukti Kehadiran</label>
                                        <input type="file" class="form-control" name="absen_proof" id="absen_proof" placeholder="Bukti Kehadiran">
                                        @error('absen_proof')
                                        <span class="text-danger" style="font-size: 10px">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="d-flex justify-content-end align-items-center">
                                        <button type="submit" class="btn btn-outline-primary"><i style="margin-right: 5px" class="fa-solid fa-paper-plane"></i> Save</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <hr>
                            <form action="{{ route($prefix.'home-presensi-input-sakit') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="form-group col-12 col-lg-6" style="display: none">
                                        <label for="absen_user_id">ID User</label>
                                        <input type="text" class="form-control" name="absen_user_id" id="absen_user_id" value="{{ Auth::user()->id }}">
                                    </div>
                                    <div class="form-group col-12 col-lg-6" style="display: none">
                                        <label for="absen_type">Pilih Jenis Absen</label>
                                        <select name="absen_type" id="absen_type" class="form-control">
                                            <optgroup label="Absen Harian">
                                                <option value="2" selected>Absen Sakit</option>
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
                                        <label for="absen_proof">Bukti Sakit</label>
                                        <input type="file" class="form-control" name="absen_proof" id="absen_proof" placeholder="Bukti Kehadiran">
                                        @error('absen_proof')
                                        <span class="text-danger" style="font-size: 10px">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-12 col-lg-6">
                                        <label for="absen_desc">Keterangan Sakit</label>
                                        <textarea name="absen_desc" id="absen_desc" class="form-control" cols="30" rows="10" placeholder="Keterangan Sakit..."></textarea>
                                        <span style="font-size: 10px">Kamu kok sakit, sakit apa ? Jelasin diatas ya :). Semoga Cepet Sembuh :)</span>
                                        @error('absen_desc')
                                        <span class="text-danger" style="font-size: 10px">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="d-flex justify-content-end align-items-center">
                                        <button type="submit" class="btn btn-outline-primary"><i style="margin-right: 5px" class="fa-solid fa-paper-plane"></i> Save</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                            <hr>
                            <form action="{{ route($prefix.'home-presensi-input-izin') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="form-group col-12 col-lg-6" style="display: none">
                                        <label for="absen_user_id">ID User</label>
                                        <input type="text" class="form-control" name="absen_user_id" id="absen_user_id" value="{{ Auth::user()->id }}">
                                    </div>
                                    <div class="form-group col-12 col-lg-6">
                                        <label for="absen_type">Pilih Keperluan Izin / Cuti</label>
                                        <select name="absen_type" id="absen_type" class="form-control">
                                            <option value="">Pilih Jenis Izin</option>
                                            <optgroup label="Bisa diajukan pada hari H">
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
                                        <label for="absen_desc">Keterangan Izin / Cuti</label>
                                        <textarea name="absen_desc" id="absen_desc" class="form-control" cols="30" rows="10" placeholder="Keterangan Izin / Cuti..."></textarea>
                                        <span style="font-size: 10px">Kamu mau izin? Jelasin dulu ya diatas keperluannya :). Have a nice day!</span>
                                        @error('absen_desc')
                                        <span class="text-danger" style="font-size: 10px">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="d-flex justify-content-end align-items-center">
                                        <button type="submit" class="btn btn-outline-primary"><i style="margin-right: 5px" class="fa-solid fa-paper-plane"></i> Save</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection
@section('custom-js')

@endsection