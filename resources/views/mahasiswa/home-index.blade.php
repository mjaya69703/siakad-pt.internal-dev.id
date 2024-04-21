@extends('base.base-dash-index')
@section('title')
    SIAKAD PT - Internal Developer
@endsection
@section('menu')
    Contoh Menu
@endsection
@section('submenu')
    Contoh SubMenu
@endsection
@section('urlmenu')
    #
@endsection
@section('subdesc')
    Contoh Deskripsi Menu
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

            <div class="col-lg-9 col-12 row">
                <div class="col-lg-3 col-6 mb-2">
                    <a href="http://newprojectfoto.test/admin/manage-balance/pending">
                        <div class="card btn btn-outline-success">
                            <div class="card-body d-flex justify-content-around align-items-center">
                                <span class="icon" style="margin-right: 25px;"><i class="fa-solid fa-clock" style="font-size: 42px"></i></span>
                                <span class="text-white" style="margin-left: 25px; font-size: 16px;">Absensi Kehadiran <br>0</span>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-6 mb-2">
                    <a href="http://newprojectfoto.test/admin/manage-balance/pending">
                        <div class="card btn btn-outline-success">
                            <div class="card-body d-flex justify-content-around align-items-center">
                                <span class="icon" style="margin-right: 25px;"><i class="fa-solid fa-clock" style="font-size: 42px"></i></span>
                                <span class="text-white" style="margin-left: 25px; font-size: 16px;">Absensi Kehadiran <br>0</span>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-6 mb-2">
                    <a href="http://newprojectfoto.test/admin/manage-balance/pending">
                        <div class="card btn btn-outline-success">
                            <div class="card-body d-flex justify-content-around align-items-center">
                                <span class="icon" style="margin-right: 25px;"><i class="fa-solid fa-clock" style="font-size: 42px"></i></span>
                                <span class="text-white" style="margin-left: 25px; font-size: 16px;">Absensi Kehadiran <br>0</span>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-6 mb-2">
                    <a href="http://newprojectfoto.test/admin/manage-balance/pending">
                        <div class="card btn btn-outline-success">
                            <div class="card-body d-flex justify-content-around align-items-center">
                                <span class="icon" style="margin-right: 25px;"><i class="fa-solid fa-clock" style="font-size: 42px"></i></span>
                                <span class="text-white" style="margin-left: 25px; font-size: 16px;">Absensi Kehadiran <br>0</span>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Log Activity - {{ \Carbon\Carbon::now()->format('d M Y') }}</h4>
                    </div>
                    <div class="card-body">
                        <span>16.24 <b>Administrator</b> - telah login</span><br>
                        <span>16.28 <b>Administrator</b> - telah mengubah password</span><br>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
