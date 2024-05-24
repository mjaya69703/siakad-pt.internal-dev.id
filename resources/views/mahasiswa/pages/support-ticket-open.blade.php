@extends('base.base-dash-index')
@section('title')
    Ticket Support - Siakad By Internal Developer
@endsection
@section('menu')
    Ticket Support
@endsection
@section('submenu')
    Pilih Departement
@endsection
@section('urlmenu')
@endsection
@section('subdesc')
    Halaman untuk memilih Departement
@endsection
@section('content')
    <section class="content">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title d-flex justify-content-between align-items-center">
                    @yield('menu')
                    <div class="">
                    </div>
                </h5>
            </div>
            <div class="card-body row">
                <div class="col-lg-6 col-6 text-center mb-4">
                    <a href="{{ route('mahasiswa.support.ticket-create', 1) }}" class="btn btn-warning">Departement Finance</a>
                    <p>Pilih ini apabila berhubungan dengan tagihan dan keuangan</p>
                </div>
                <div class="col-lg-6 col-6 text-center mb-4">
                    <a href="{{ route('mahasiswa.support.ticket-create', 2) }}" class="btn btn-success">Departement Officer</a>
                    <p>Pilih ini apabila berhubungan dengan pendaftaran dan informasi PMB</p>
                </div>
                <div class="col-lg-6 col-6 text-center mb-4">
                    <a href="{{ route('mahasiswa.support.ticket-create', 3) }}" class="btn btn-primary">Departement Akademik</a>
                    <p>Pilih ini apabila berhubungan dengan perkuliahan dan administrasi akademik</p>
                </div>
                <div class="col-lg-6 col-6 text-center mb-4">
                    <a href="{{ route('mahasiswa.support.ticket-create', 4) }}" class="btn btn-danger">Departement Admin</a>
                    <p>Pilih ini apabila berhubungan terdapat kendala saat perkuliahan berlangsung</p>
                </div>
                <div class="col-lg-12 col-12 text-center mb-4">
                    <a href="{{ route('mahasiswa.support.ticket-create', 5) }}" class="btn btn-info">Departement Support</a>
                    <p>Pilih ini apabila berhubungan terdapat kendala teknis pada device kalian</p>
                </div>
            </div>
        </div>
    </section>
@endsection
