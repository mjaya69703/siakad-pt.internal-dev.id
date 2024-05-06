@extends('base.base-dash-index')
@section('title')
    SIAKAD PT - Internal Developer
@endsection
@section('menu')
    Dashboard
@endsection
@section('submenu')
    Dashboard Admin
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
    Halaman dashboard admin
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

            <div class="col-lg-9 col-12">
                <div class="row">

                    <div class="col-lg-3 col-6 mb-2">
                        <a href="{{ route('web-admin.workers.student-index') }}">
                            <div class="card btn btn-outline-success">
                                <div class="card-body d-flex justify-content-around align-items-center">
                                    <span class="icon" style="margin-right: 25px;"><i class="fa-solid fa-user-graduate" style="font-size: 42px"></i></span>
                                    <span class="text-white" style="margin-left: 25px; font-size: 16px;">Mahasiswa <br>{{ \App\Models\Mahasiswa::all()->count() }}</span>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-6 mb-2">
                        <a href="{{ route('web-admin.workers.lecture-index') }}">
                            <div class="card btn btn-outline-success">
                                <div class="card-body d-flex justify-content-around align-items-center">
                                    <span class="icon" style="margin-right: 25px;"><i class="fa-solid fa-user-tie" style="font-size: 42px"></i></span>
                                    <span class="text-white" style="margin-left: 25px; font-size: 16px;">Dosen <br>{{ \App\Models\Dosen::all()->count() }}</span>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-6 mb-2">
                        <a href="{{ route('web-admin.workers.staff-index') }}">
                            <div class="card btn btn-outline-success">
                                <div class="card-body d-flex justify-content-around align-items-center">
                                    <span class="icon" style="margin-right: 25px;"><i class="fa-solid fa-user-tag" style="font-size: 42px"></i></span>
                                    <span class="text-white" style="margin-left: 25px; font-size: 16px;">Karyawan <br>{{ \App\Models\User::where('type', ['1','2','3','4'])->count() }}</span>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-6 mb-2">
                        <a href="{{ route('web-admin.master.jadkul-index') }}">
                            <div class="card btn btn-outline-success">
                                <div class="card-body d-flex justify-content-around align-items-center">
                                    <span class="icon" style="margin-right: 25px;"><i class="fa-solid fa-book-open-reader" style="font-size: 42px"></i></span>
                                    <span class="text-white" style="margin-left: 25px; font-size: 16px;">Perkuliahan <br>{{ \App\Models\JadwalKuliah::all()->count() }}</span>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="row">

                    <div class="col-lg-3 col-6 mb-2">
                        <a href="{{ route('web-admin.master.fakultas-index') }}">
                            <div class="card btn btn-outline-success">
                                <div class="card-body d-flex justify-content-around align-items-center">
                                    <span class="icon" style="margin-right: 25px;"><i class="fa-solid fa-building-columns" style="font-size: 42px"></i></span>
                                    <span class="text-white" style="margin-left: 25px; font-size: 16px;">Fakultas <br>{{ \App\Models\Fakultas::all()->count() }}</span>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-6 mb-2">
                        <a href="{{ route('web-admin.master.pstudi-index') }}">
                            <div class="card btn btn-outline-success">
                                <div class="card-body d-flex justify-content-around align-items-center">
                                    <span class="icon" style="margin-right: 25px;"><i class="fa-solid fa-graduation-cap" style="font-size: 42px"></i></span>
                                    <span class="text-white" style="margin-left: 25px; font-size: 16px;">Prodi <br>{{ \App\Models\ProgramStudi::all()->count() }}</span>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-6 mb-2">
                        <a href="{{ route('web-admin.master.kelas-index') }}">
                            <div class="card btn btn-outline-success">
                                <div class="card-body d-flex justify-content-around align-items-center">
                                    <span class="icon" style="margin-right: 25px;"><i class="fa-solid fa-building-user" style="font-size: 42px"></i></span>
                                    <span class="text-white" style="margin-left: 25px; font-size: 16px;">Kelas <br>{{ \App\Models\Kelas::all()->count() }}</span>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-6 mb-2">
                        <a href="{{ route('web-admin.master.matkul-index') }}">
                            <div class="card btn btn-outline-success">
                                <div class="card-body d-flex justify-content-around align-items-center">
                                    <span class="icon" style="margin-right: 25px;"><i class="fa-solid fa-book-open" style="font-size: 42px"></i></span>
                                    <span class="text-white" style="margin-left: 25px; font-size: 16px;">Mata Kuliah <br>{{ \App\Models\MataKuliah::all()->count() }}</span>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="row">

                    <div class="col-lg-3 col-6 mb-2">
                        <a href="{{ route('web-admin.master.taka-index') }}">
                            <div class="card btn btn-outline-success">
                                <div class="card-body d-flex justify-content-around align-items-center">
                                    <span class="icon" style="margin-right: 25px;"><i class="fa-solid fa-calendar" style="font-size: 42px"></i></span>
                                    <span class="text-white" style="margin-left: 25px; font-size: 16px;">Tahun Akademik <br>{{ \App\Models\Kurikulum::all()->count() }}</span>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-6 mb-2">
                        <a href="{{ route('web-admin.master.kurikulum-index') }}">
                            <div class="card btn btn-outline-success">
                                <div class="card-body d-flex justify-content-around align-items-center">
                                    <span class="icon" style="margin-right: 25px;"><i class="fa-solid fa-book" style="font-size: 42px"></i></span>
                                    <span class="text-white" style="margin-left: 25px; font-size: 16px;">Kurikulum <br>{{ \App\Models\Kurikulum::all()->count() }}</span>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-6 mb-2">
                        <a href="{{ route('web-admin.master.proku-index') }}">
                            <div class="card btn btn-outline-success">
                                <div class="card-body d-flex justify-content-around align-items-center">
                                    <span class="icon" style="margin-right: 25px;"><i class="fa-solid fa-list-ol" style="font-size: 42px"></i></span>
                                    <span class="text-white" style="margin-left: 25px; font-size: 16px;">Program Kuliah <br>{{ \App\Models\ProgramKuliah::all()->count() }}</span>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-6 mb-2">
                        <a href="{{ route('web-admin.inventory.ruang-index') }}">
                            <div class="card btn btn-outline-success">
                                <div class="card-body d-flex justify-content-around align-items-center">
                                    <span class="icon" style="margin-right: 25px;"><i class="fa-solid fa-house-flag" style="font-size: 42px"></i></span>
                                    <span class="text-white" style="margin-left: 25px; font-size: 16px;">Ruangan <br>{{ \App\Models\Ruang::all()->count() }}</span>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title text-center">Presentasi Gender</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <div id="genderMhsChart"></div>
                        </div>
                        <div class="text-center">
                            <small>Grafik Presentasi Gender Mahasiswa</small>
                        </div>
                        <hr>
                        <div class="form-group">
                            <div id="genderDsnChart"></div>
                        </div>
                        <div class="text-center">
                            <small>Grafik Presentasi Gender Dosen</small>
                        </div>
                        <hr>
                        <div class="form-group">
                            <div id="genderUsrChart"></div>
                        </div>
                        <div class="text-center">
                            <small>Grafik Presentasi Gender Pegawai</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('custom-js')
<script src="{{ asset('dist') }}/assets/extensions/apexcharts/apexcharts.min.js"></script>
<script src="{{ asset('dist') }}/assets/static/js/pages/dashboard.js"></script>
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script> --}}
<script>
var ajaxRunning = false;

$(document).ready(function() {
    // Fungsi untuk melakukan permintaan AJAX
    function fetchData() {
        // Jika sedang berjalan, hentikan fungsi
        if (ajaxRunning) {
            return;
        }

        ajaxRunning = true;

        $.ajax({
            url: '{{ route('web-admin.home.ajax-mhs-gender') }}',
            method: 'GET',
            success: function(response) {
                var maleCount = response.male;
                var femaleCount = response.female;
                var dmaleCount = response.dmale;
                var dfemaleCount = response.dfemale;
                var umaleCount = response.umale;
                var ufemaleCount = response.ufemale;

                var options = {
                    chart: {
                        type: 'pie',
                    },
                    series: [maleCount, femaleCount],
                    labels: ['Laki-laki', 'Perempuan'],
                };

                var chart = new ApexCharts(document.querySelector('#genderMhsChart'), options);
                chart.render();

                var options = {
                    chart: {
                        type: 'pie',
                    },
                    series: [dmaleCount, dfemaleCount],
                    labels: ['Laki-laki', 'Perempuan'],
                };

                var chart = new ApexCharts(document.querySelector('#genderDsnChart'), options);
                chart.render();
                var options = {
                    chart: {
                        type: 'pie',
                    },
                    series: [umaleCount, ufemaleCount],
                    labels: ['Laki-laki', 'Perempuan'],
                };

                var chart = new ApexCharts(document.querySelector('#genderUsrChart'), options);
                chart.render();
            },
            error: function(xhr, status, error) {
                console.error(error);
            },
            complete: function() {
                ajaxRunning = false; // Setelah permintaan selesai, set status menjadi false
            }
        });
    }

    // Panggil fungsi untuk pertama kalinya
    fetchData();
});
</script>
@endsection