@extends('base.base-dash-index')
@section('title')
    Data Tagihan Perkuliahan - Siakad By Internal Developer
@endsection
@section('menu')
    Data Tagihan Perkuliahan
@endsection
@section('submenu')
    Daftar Tagihan
@endsection
@section('urlmenu')
@endsection
@section('subdesc')
    Halaman untuk melihat Tagihan Perkuliahan
@endsection
@section('custom-css')
<meta name="csrf-token" content="{{ csrf_token() }}">

@endsection
@section('content')
<section class="section">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title d-flex justify-content-between align-items-center">
                @yield('menu')
                <div class="">
                    {{-- <a href="{{ route('web-admin.master.tagihan-index') }}" class="btn btn-outline-primary"><i class="fa-solid fa-plus"></i></a> --}}
                </div>
            </h5>
        </div>
        <div class="card-body">
            <table class="table table-striped"  id="table1">
                <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">Kode Tagihan</th>
                        <th class="text-center">Nama Tagihan</th>
                        <th class="text-center">Nominal Tagihan</th>
                        <th class="text-center">Status Tagihan</th>
                        <th class="text-center">Button</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tagihan as $key => $item)
                        
                    <tr>
                        <td data-label="Number">{{ ++$key }}</td>
                        <td data-label="Kode Tagihan"><span style="text-transform: uppercase">{{ $item->code }}</span></td>
                        <td data-label="Nama Tagihan">{{ $item->name }}</td>
                        <td data-label="Nominal">{{ $item->price }}</td>
                        <td data-label="Status"><span class="text-danger" style="text-transform: uppercase">un-paid</span></td>
                        <td class="d-flex justify-content-center align-items-center">
                            <a href="{{ route('mahasiswa.home-tagihan-view', $item->code) }}" class="btn btn-outline-success"><i class="fa-solid fa-money-bill-transfer"></i> Bayar Sekarang</a>


                        </td>
                    </tr>
                    @endforeach
 
                </tbody>
            </table>
        </div>
    </div>

</section>
@endsection
@section('custom-js')
<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('services.midtrans.clientKey') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>    
<script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $('.pay-button').click(function (event) {
            event.preventDefault();
            
            var code = $(this).data('code'); // Ambil kode tagihan dari atribut data
            
            $.post("{{ route('mahasiswa.home-tagihan-payment', ':code') }}".replace(':code', code), { // Ganti placeholder :code dengan nilai kode tagihan
                _token: '{{ csrf_token() }}',
            },
            function (data, status) {
                snap.pay(data.snap_token, {
                    onSuccess: function (result) {
                        location.reload();
                    },
                    onPending: function (result) {
                        location.reload();
                    },
                    onError: function (result) {
                        location.reload();
                    }
                });
            });
        });
    });
</script>
    
    

@endsection