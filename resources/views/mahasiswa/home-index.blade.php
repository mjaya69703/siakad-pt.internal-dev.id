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

            .text-putih {
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
                    <a href="{{ route('mahasiswa.home-tagihan-index') }}">
                        <div class="card btn btn-outline-success">
                            <div class="card-body d-flex justify-content-around align-items-center">
                                <span class="icon" style="margin-right: 25px;"><i class="fa-solid fa-file-invoice-dollar" style="font-size: 42px"></i></span>
                                <span class="text-putih" style="margin-left: 25px; font-size: 16px;">{{ number_format($sisatagihan, 0, ',', '.') }}<br>Tagihan <br> ( IDR )</span>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-6 mb-2">
                    <a href="{{ route('mahasiswa.home-tagihan-index') }}">
                        <div class="card btn btn-outline-success">
                            <div class="card-body d-flex justify-content-around align-items-center">
                                <span class="icon" style="margin-right: 25px;"><i class="fa-solid fa-money-bill-transfer" style="font-size: 42px"></i></span>
                                <span class="text-putih" style="margin-left: 25px; font-size: 16px;">{{ number_format($history, 0, ',', '.') }}<br>Pembayaran <br> ( IDR )</span>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-6 mb-2">
                    <a href="{{ route('mahasiswa.home-jadkul-index') }}">
                        <div class="card btn btn-outline-success">
                            <div class="card-body d-flex justify-content-around align-items-center">
                                <span class="icon" style="margin-right: 25px;"><i class="fa-solid fa-user-check" style="font-size: 42px"></i></span>
                                <span class="text-putih" style="margin-left: 25px; font-size: 16px;">{{ $habsen }} <br>Absen <br> Kehadiran</span>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-6 mb-2">
                    <a href="{{ route('mahasiswa.home-jadkul-index') }}">
                        <div class="card btn btn-outline-success">
                            <div class="card-body d-flex justify-content-around align-items-center">
                                <span class="icon" style="margin-right: 25px;"><i class="fa-solid fa-book-open-reader" style="font-size: 42px"></i></span>
                                <span class="text-putih" style="margin-left: 25px; font-size: 16px;">{{ $jadkul }} <br>Jadwal <br> Perkuliahan</span>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Pengumuman - {{ \Carbon\Carbon::now()->format('d M Y') }}</h4>
                    </div>
                    <div class="card-body">
                        @forelse ($notify as $item)

                        <span>{{ \Carbon\Carbon::parse($item->created_at)->format('d-m-Y'.' - '.'H'.'.'.'i') }} - <a href="#" data-bs-toggle="modal" data-bs-target="#updateFakultas{{ $item->code }}">{{ $item->name }}</a></span><br>
                        @empty
                        <span class="">Tidak Ada Pengumuman Hari Ini</span>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="me-1 mb-1 d-inline-block">

        <!--Extra Large Modal -->
        @foreach ($notify as $item)
            <div class="modal fade text-left w-100" id="updateFakultas{{$item->code}}" tabindex="-1" role="dialog"
                aria-labelledby="myModalLabel16" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-l"
                    role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="myModalLabel16">Notifikasi - {{ $item->name }}</h4>
                            <div class="">

                                <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal"
                                    aria-label="Close">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="form-group">
                                    <p class="text-center"><b>{{ $item->name }}</b></p>
                                    <p>{!! $item->desc !!}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
