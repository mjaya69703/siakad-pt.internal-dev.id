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
<meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests" />
<meta name="viewport" content="width=device-width, initial-scale=1">


@endsection
@section('content')
<section class="section">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title d-flex justify-content-between align-items-center">
                @yield('menu')
                <div class="">
                    <a href="{{ route('mahasiswa.home-tagihan-index') }}" class="btn btn-outline-warning"><i class="fa-solid fa-backward"></i></a>
                </div>
            </h5>
        </div>
        <div class="card-body ">
            <form id="payment-form" action="{{ route('mahasiswa.home-tagihan-payment', $tagihan->code) }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" readonly value="{{ Auth::guard('mahasiswa')->user()->mhs_name }}" name="name">
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" readonly value="{{ Auth::guard('mahasiswa')->user()->mhs_mail }}" name="email">
                </div>

                <div class="form-group">
                    <label for="amount">Amount</label>
                    <input type="number" class="form-control" id="amount" readonly value="{{ $tagihan->price }}" name="amount">
                </div>

                <div class="form-group">
                    <label for="note">Note</label>
                    <textarea class="form-control" id="note" name="note" >Pembayaran Tagihan Kuliah {{ $tagihan->code }}</textarea>
                </div>
                {{-- <div class="form-group">
                    <label for="SnapToken">SnapToken</label>
                    <input class="form-control" id="snap-token" name="snapToken">
                </div> --}}

                <button type="submit" id="pay-button" class="btn btn-primary">Pay Now</button>
            </form>

        </div>
    </div>

</section>
@endsection
@section('custom-js')
<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('services.midtrans.clientKey') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>    

<script type="text/javascript">
    var snapToken = ""; // Inisialisasi snapToken

    // Fungsi untuk melakukan permintaan pembayaran
    $('#pay-button').click(function (event) {
        event.preventDefault();

        $.post("{{ route('mahasiswa.home-tagihan-payment', $tagihan->code) }}", {
            _token: '{{ csrf_token() }}',
            name: $('#name').val(),
            email: $('#email').val(),
            amount: $('#amount').val(),
            note: $('#note').val()
        },
        function (data, status) {
            
            snapToken = data.snap_token; // Simpan snapToken dari respons server
            uniqCode = data.code_uniq; // Simpan snapToken dari respons server
            // $('#snap-token').val(snapToken);

            console.log(data.snap_token); // Tambahkan ini untuk debugging
            // var snapToken = document.getElementById('snap-token').value;
            snap.pay(snapToken, {
                onSuccess: function (result) {
                    // location.reload();
                    window.location.href = "{{ route('mahasiswa.home-tagihan-payment-success', ':uniqCode') }}".replace(':uniqCode', uniqCode);

                },

                onPending: function (result) {
                    location.reload(); 
                },

                onError: function (result) {
                    // window.location.href = "{{ route('mahasiswa.home-tagihan-payment-success', ':uniqCode') }}".replace(':uniqCode', uniqCode);

                    location.reload();
                }
            });
        });
    });
</script>

    
    

@endsection