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
                            <a class="nav-link active" id="hadir-tab" data-bs-toggle="tab" href="#hadir" role="tab"
                                aria-controls="hadir" aria-selected="true">Absen Hadir</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="izin-tab" data-bs-toggle="tab" href="#izin" role="tab"
                                aria-controls="izin" aria-selected="false">Izin / Cuti</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="terlambat-tab" data-bs-toggle="tab" href="#terlambat" role="tab"
                                aria-controls="terlambat" aria-selected="false">Terlambat</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="hadir" role="tabpanel" aria-labelledby="hadir-tab">
                            <hr>
                            <table class="table table-striped" id="table1">
                                <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th class="text-center">Full Name</th>
                                        <th class="text-center">Tanggal</th>
                                        <th class="text-center">Jam Masuk</th>
                                        <th class="text-center">Jam Pulang</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-center">Details</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($absen as $key => $item)
                                        
                                    <tr>
                                        <td class="text-center">{{ ++$key }}</td>
                                        <td class="">{{ $item->user->name }}</td>
                                        <td class="text-center">{{ $item->absen_date }}</td>
                                        <td class="text-center">{{ $item->absen_time_in }}</td>
                                        <td class="text-center">{{ $item->absen_time_out }}</td>
        
                                        <td class="text-center"><span class="btn btn-success">{{ $item->absen_type }}</span></td>
                                        <td class="text-center">
                                            <a href="{{ route($prefix.'home-presensi-view', $item->absen_date) }}" class="btn btn-outline-primary"><i class="fa-solid fa-eye"></i></a>
                                        </td>
                                        @if(Route::is('web-admin.staffmanager-admin-index', request()->path()))
                                        <td class="d-flex justify-content-center align-items-center">
                                            <a href="#" style="margin-right: 10px" data-bs-toggle="modal" data-bs-target="#updateMember{{ $item->code }}" class="btn btn-outline-primary"><i class="fas fa-edit"></i></a>
                                            <a href="{{ route('web-admin.staffmanager-admin-view', $item->code) }}"  style="margin-right: 10px" class="btn btn-outline-info"><i class="fa-solid fa-eye"></i></a>
                                            <form id="delete-form-{{ $item->code }}"
                                                action="{{ route('web-admin.staffmanager-admin-destroy', $item->code) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <a type="button" class="bs-tooltip btn btn-rounded btn-outline-danger"
                                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"
                                                    data-original-title="Delete"
                                                    data-url="{{ route('web-admin.staffmanager-admin-destroy', $item->code) }}"
                                                    data-name="{{ $item->name }}"
                                                    onclick="deleteData('{{ $item->code }}')">
                                                    <i class="fas fa-trash"></i>
                                                </a>
                                            </form>
                                        </td>
                                        @elseif(Route::is('web-admin.staffmanager-staff-index', request()->path()))
                                        <td class="d-flex justify-content-center align-items-center">
                                            <a href="#" style="margin-right: 10px" data-bs-toggle="modal" data-bs-target="#updateMember{{ $item->code }}" class="btn btn-outline-primary"><i class="fas fa-edit"></i></a>
                                            <a href="{{ route('web-admin.staffmanager-staff-view', $item->code) }}"  style="margin-right: 10px" class="btn btn-outline-info"><i class="fa-solid fa-eye"></i></a>
                                            <form id="delete-form-{{ $item->code }}"
                                                action="{{ route('web-admin.staffmanager-staff-destroy', $item->code) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <a type="button" class="bs-tooltip btn btn-rounded btn-outline-danger"
                                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"
                                                    data-original-title="Delete"
                                                    data-url="{{ route('web-admin.staffmanager-staff-destroy', $item->code) }}"
                                                    data-name="{{ $item->name }}"
                                                    onclick="deleteData('{{ $item->code }}')">
                                                    <i class="fas fa-trash"></i>
                                                </a>
                                            </form>
                                        </td>
                                        @endif
                                    </tr>
                                    @endforeach
                 
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane fade" id="izin" role="tabpanel" aria-labelledby="izin-tab">
                            <hr>
                            <table class="table table-striped" id="table1">
                                <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th class="text-center">Full Name</th>
                                        <th class="text-center">Tanggal</th>
                                        <th class="text-center">Type Absen</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-center">Details</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($izin as $key => $item)
                                        
                                    <tr>
                                        <td class="text-center">{{ ++$key }}</td>
                                        <td class="">{{ $item->user->name }}</td>
                                        <td class="text-center">{{ $item->absen_date }}</td>
                                        <td class="text-center">{{ $item->absen_type }}</td>
        
                                        <td class="text-center">
                                            @if($item->raw_absen_approve === 1)
                                                
                                            <span class="btn btn-warning">{{ $item->absen_approve }}</span>
                                            @elseif($item->raw_absen_approve === 2)
                                            <span class="btn btn-success">{{ $item->absen_approve }}</span>
                                            @elseif($item->raw_absen_approve === 3)
                                            <span class="btn btn-danger">{{ $item->absen_approve }}</span>
                                                
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            <a href="{{ route($prefix.'home-presensi-view', $item->absen_date) }}" class="btn btn-outline-primary"><i class="fa-solid fa-eye"></i></a>
                                        </td>
                                        @if(Route::is('web-admin.staffmanager-admin-index', request()->path()))
                                        <td class="d-flex justify-content-center align-items-center">
                                            <a href="#" style="margin-right: 10px" data-bs-toggle="modal" data-bs-target="#updateMember{{ $item->code }}" class="btn btn-outline-primary"><i class="fas fa-edit"></i></a>
                                            <a href="{{ route('web-admin.staffmanager-admin-view', $item->code) }}"  style="margin-right: 10px" class="btn btn-outline-info"><i class="fa-solid fa-eye"></i></a>
                                            <form id="delete-form-{{ $item->code }}"
                                                action="{{ route('web-admin.staffmanager-admin-destroy', $item->code) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <a type="button" class="bs-tooltip btn btn-rounded btn-outline-danger"
                                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"
                                                    data-original-title="Delete"
                                                    data-url="{{ route('web-admin.staffmanager-admin-destroy', $item->code) }}"
                                                    data-name="{{ $item->name }}"
                                                    onclick="deleteData('{{ $item->code }}')">
                                                    <i class="fas fa-trash"></i>
                                                </a>
                                            </form>
                                        </td>
                                        @elseif(Route::is('web-admin.staffmanager-staff-index', request()->path()))
                                        <td class="d-flex justify-content-center align-items-center">
                                            <a href="#" style="margin-right: 10px" data-bs-toggle="modal" data-bs-target="#updateMember{{ $item->code }}" class="btn btn-outline-primary"><i class="fas fa-edit"></i></a>
                                            <a href="{{ route('web-admin.staffmanager-staff-view', $item->code) }}"  style="margin-right: 10px" class="btn btn-outline-info"><i class="fa-solid fa-eye"></i></a>
                                            <form id="delete-form-{{ $item->code }}"
                                                action="{{ route('web-admin.staffmanager-staff-destroy', $item->code) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <a type="button" class="bs-tooltip btn btn-rounded btn-outline-danger"
                                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"
                                                    data-original-title="Delete"
                                                    data-url="{{ route('web-admin.staffmanager-staff-destroy', $item->code) }}"
                                                    data-name="{{ $item->name }}"
                                                    onclick="deleteData('{{ $item->code }}')">
                                                    <i class="fas fa-trash"></i>
                                                </a>
                                            </form>
                                        </td>
                                        @endif
                                    </tr>
                                    @endforeach
                 
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane fade" id="terlambat" role="tabpanel" aria-labelledby="terlambat-tab">
                            <hr>
                            <table class="table table-striped" id="table1">
                                <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th class="text-center">Full Name</th>
                                        <th class="text-center">Tanggal</th>
                                        <th class="text-center">Jam Masuk</th>
                                        <th class="text-center">Jam Pulang</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-center">Details</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($terlambat as $key => $item)
                                        
                                    <tr>
                                        <td class="text-center">{{ ++$key }}</td>
                                        <td class="">{{ $item->user->name }}</td>
                                        <td class="text-center">{{ $item->absen_date }}</td>
                                        <td class="text-center">{{ $item->absen_time_in }}</td>
                                        <td class="text-center">{{ $item->absen_time_out }}</td>
        
                                        <td class="text-center"><span class="btn btn-warning">{{ $item->absen_type }}</span></td>
                                        <td class="text-center">
                                            <a href="{{ route($prefix.'home-presensi-view', $item->absen_date) }}" class="btn btn-outline-primary"><i class="fa-solid fa-eye"></i></a>
                                        </td>
                                        @if(Route::is('web-admin.staffmanager-admin-index', request()->path()))
                                        <td class="d-flex justify-content-center align-items-center">
                                            <a href="#" style="margin-right: 10px" data-bs-toggle="modal" data-bs-target="#updateMember{{ $item->code }}" class="btn btn-outline-primary"><i class="fas fa-edit"></i></a>
                                            <a href="{{ route('web-admin.staffmanager-admin-view', $item->code) }}"  style="margin-right: 10px" class="btn btn-outline-info"><i class="fa-solid fa-eye"></i></a>
                                            <form id="delete-form-{{ $item->code }}"
                                                action="{{ route('web-admin.staffmanager-admin-destroy', $item->code) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <a type="button" class="bs-tooltip btn btn-rounded btn-outline-danger"
                                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"
                                                    data-original-title="Delete"
                                                    data-url="{{ route('web-admin.staffmanager-admin-destroy', $item->code) }}"
                                                    data-name="{{ $item->name }}"
                                                    onclick="deleteData('{{ $item->code }}')">
                                                    <i class="fas fa-trash"></i>
                                                </a>
                                            </form>
                                        </td>
                                        @elseif(Route::is('web-admin.staffmanager-staff-index', request()->path()))
                                        <td class="d-flex justify-content-center align-items-center">
                                            <a href="#" style="margin-right: 10px" data-bs-toggle="modal" data-bs-target="#updateMember{{ $item->code }}" class="btn btn-outline-primary"><i class="fas fa-edit"></i></a>
                                            <a href="{{ route('web-admin.staffmanager-staff-view', $item->code) }}"  style="margin-right: 10px" class="btn btn-outline-info"><i class="fa-solid fa-eye"></i></a>
                                            <form id="delete-form-{{ $item->code }}"
                                                action="{{ route('web-admin.staffmanager-staff-destroy', $item->code) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <a type="button" class="bs-tooltip btn btn-rounded btn-outline-danger"
                                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"
                                                    data-original-title="Delete"
                                                    data-url="{{ route('web-admin.staffmanager-staff-destroy', $item->code) }}"
                                                    data-name="{{ $item->name }}"
                                                    onclick="deleteData('{{ $item->code }}')">
                                                    <i class="fas fa-trash"></i>
                                                </a>
                                            </form>
                                        </td>
                                        @endif
                                    </tr>
                                    @endforeach
                 
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection
@section('custom-js')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Mendapatkan semua tautan yang memiliki kelas 'nav-link' di dalam div dengan id 'myTab'
        var navLinks = document.querySelectorAll('#myTab .nav-link');

        // Menambahkan event listener untuk setiap tautan
        navLinks.forEach(function (link) {
            link.addEventListener('click', function (event) {
                // Mencegah perilaku default dari tautan
                event.preventDefault();

                // Mendapatkan id tab yang terkait dengan tautan yang diklik
                var tabId = this.getAttribute('href');

                // Menghilangkan kelas 'active' dari semua tautan
                navLinks.forEach(function (navLink) {
                    navLink.classList.remove('active');
                });

                // Menghilangkan kelas 'active' dari semua tab konten
                var tabContents = document.querySelectorAll('.tab-pane');
                tabContents.forEach(function (tabContent) {
                    tabContent.classList.remove('active');
                });

                // Menambahkan kelas 'active' pada tautan yang diklik
                this.classList.add('active');

                // Menambahkan kelas 'active' pada tab konten yang sesuai
                var activeTab = document.querySelector(tabId);
                activeTab.classList.add('active');
            });
        });
    });
</script>

@endsection