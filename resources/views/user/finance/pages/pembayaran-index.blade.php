@extends('base.base-dash-index')
@section('title')
    Data Riwayat Pembayaran - Siakad By Internal Developer
@endsection
@section('menu')
    Data Riwayat Pembayaran
@endsection
@section('submenu')
    Lihat
@endsection
@section('urlmenu')
    #
@endsection
@section('subdesc')
    Halaman untuk melihat data riwayat pembayaran
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
            <div class="col-lg-12 col-12">
                <div class="row">
                    <div class="col-lg-3 col-6 mb-2">
                        <a href="{{ route($prefix . 'finance.tagihan-index') }}">
                            <div class="card btn btn-outline-success">
                                <div class="card-body d-flex justify-content-around align-items-center">
                                    <span class="icon" style="margin-right: 25px;"><i class="fa-solid fa-file-invoice" style="font-size: 42px"></i></span>
                                    <span class="text-putih" style="margin-left: 25px; font-size: 16px;">{{ \App\Models\TagihanKuliah::all()->count() }}<br> Tagihan</span>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-6 mb-2">
                        <a href="{{ route($prefix . 'finance.pembayaran-index') }}">
                            <div class="card btn btn-outline-success">
                                <div class="card-body d-flex justify-content-around align-items-center">
                                    <span class="icon" style="margin-right: 25px;"><i class="fa-solid fa-file-invoice-dollar" style="font-size: 42px"></i></span>
                                    <span class="text-putih" style="margin-left: 25px; font-size: 16px;">{{ \App\Models\HistoryTagihan::where('stat', 1)->count() }}<br> Pembayaran</span>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-6 mb-2">
                        <a href="{{ route('web-admin.workers.student-index') }}">
                            <div class="card btn btn-outline-success">
                                <div class="card-body d-flex justify-content-around align-items-center">
                                    <span class="icon" style="margin-right: 25px;"><i class="fa-solid fa-dollar" style="font-size: 42px"></i></span>
                                    <span class="text-putih" style="margin-left: 25px; font-size: 16px;">{{ number_format($income, 0, ',', '.') }}<br> Income ( IDR )</span>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 col-12">
                <div class="card">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h5 class="card-title">@yield('menu')</h5>
                        <div class="">
                            {{-- <a href="{{ route($prefix.'finance.tagihan-create') }}" class="btn btn-primary"><i class="fa-solid fa-plus"></i></a> --}}
                        </div>

                    </div>
                    <div class="card-body">
                        <table class="table table-striped" id="table1">
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th class="text-center">Nama Mahasiswa</th>
                                    <th class="text-center">Kode Pembayaran</th>
                                    <th class="text-center">Kode Tagihan</th>
                                    <th class="text-center">Nominal Bayar</th>
                                    <th class="text-center">Status Tagihan</th>
                                    {{-- <th class="text-center">Button</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($history as $key => $item)
                                    <tr>
                                        <td data-label="Number">{{ ++$key }}</td>
                                        <td data-label="Nama Mahasiswa">{{ $item->users->mhs_name }}</td>
                                        <td data-label="Kode Pembayaran"><span style="text-transform: uppercase">{{ $item->code }}</span></td>
                                        <td data-label="Kode Tagihan"><span style="text-transform: uppercase">{{ $item->tagihan_code }}</span></td>
                                        <td data-label="Nominal Bayar">Rp. {{ number_format($item->tagihan->price, 0, ',', '.') }}</td>
                                        <td data-label="Status">{{ $item->stat === 1 ? 'PAID' : 'UN-PAID' }}</td>
                                        {{-- <td class="d-flex justify-content-center align-items-center">
                                        <a href="{{ route('mahasiswa.home-tagihan-view', $item->code) }}" class="btn btn-outline-success"><i class="fa-solid fa-money-bill-transfer"></i> Bayar Sekarang</a>


                                    </td> --}}
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
