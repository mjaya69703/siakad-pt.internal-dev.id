@extends('base.base-dash-index')
@section('title')
    Data Tagihan Perkuliahan - Siakad By Internal Developer
@endsection
@section('menu')
    Data Tagihan Perkuliahan
@endsection
@section('submenu')
    Lihat Tagihan {{ $tagihan->code }}
@endsection
@section('urlmenu')
@endsection
@section('subdesc')
    Halaman untuk melihat Tagihan {{ $tagihan->code }}
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
        <div class="card-body ">
            <form id="donation-form" method="POST">
                <div class="row mb-3">
                    <div class="col-lg-6 col-12">
                        <label for="name">Nama Lengkap</label>
                        <input type="text" name="name" id="name" class="form-control" value="{{ $tagihan->name }}">
                    </div>
                    <div class="col-lg-6 col-12">
                        <label for="code">Nama Lengkap</label>
                        <input type="text" name="code" id="code" class="form-control" value="{{ $tagihan->code }}">
                    </div>
                </div>
                <div class="col-12 text-center">
                    <button class="btn btn-primary" id="pay-button"><i class="fa-solid fa-money-bill-transfer" style="margin-right: 10px"></i>Pay</button>
                </div>
            </form>

        </div>
    </div>

</section>
@endsection
@section('custom-js')
<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('services.midtrans.clientKey') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>    
<script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>

<script type="text/javascript">
    $('#pay-button').click(function (event) {
    event.preventDefault();
    
    $.post("{{ route('mahasiswa.home-tagihan-payment') }}", {
        _method: 'POST',
        _token: '{{ csrf_token() }}',
        name: $('#name').val(),
        code: $('#code').val(),
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
        return false;
    });
    });
</script>
    
    

@endsection