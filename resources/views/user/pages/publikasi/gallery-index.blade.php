@extends('base.base-dash-index')
@section('menu')
Album Foto
@endsection
@section('submenu')
Daftar Album Foto
@endsection
@section('subdesc')
Halaman untuk menampilkan album foto
@endsection
@section('urlmenu')
#
@endsection
@section('content')
<section class="section row">
    <div class="col-lg-12">

        <div class="d-flex justify-content-between align-items-center">
            <div class="a d-flex justify-content-center">
                <form action="{{ route($prefix.'publish.album-search') }}" method="GET">
                    <div class="a d-flex justify-content-center">
                        <input type="search" class="form-control" placeholder="Search here..." name="search"
                            id="search">
                        <button type="submit" class="btn btn-info" style="margin-left: 5px"><i
                                class="fa-solid fa-search"></i></button>
                    </div>
                </form>


            </div>
            <div class="b">
                <a href="{{ route($prefix.'publish.album-create') }}" class="btn btn-primary"><i
                        class="fa-solid fa-plus"></i> Create</a>
            </div>
        </div>
    </div>
    <div class="col-lg-12 row mt-2">
        @foreach ($album as $item)
        <div class="col-6 col-sm-6 col-lg-3 mt-3 mb-3 mt-md-0 mb-md-0 text-center">
            <div class="position-relative">
                <a href="{{ route($prefix.'publish.album-show', $item->slug) }}" class="overlay-container mb-2 mt-2">
                    <img class="w-100 active" style="border-radius: 20px" src="{{ asset('storage/'.$item->cover) }}"
                        data-bs-target="#Gallerycarousel" data-bs-slide-to="0">
                    <span class="overlay-text">{{ $item->name }}</span>
                </a>
            </div>
        </div>
        @endforeach
        {{ $album->links('root.vendor.paginator') }}
    </div>
</section>
@endsection
@section('custom-js')

<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('searchForm').addEventListener('submit', function(event) {
            event.preventDefault(); // Mencegah form submit secara default

            // Ambil nilai dari input pencarian
            var query = document.getElementById('query').value.trim();

            // Lakukan validasi minimal satu karakter sebelum melakukan pencarian
            if (query.length > 0) {
                // Kirim permintaan pencarian ke endpoint yang sesuai
                fetch(`{{ route($prefix.'publish.album-index') }}?query=${encodeURIComponent(query)}`)
                    .then(response => response.json())
                    .then(data => {
                        // Handle data yang diterima dari server
                        console.log('Hasil pencarian:', data);
                        // Misalnya, tampilkan hasil pencarian di tempat yang sesuai di halaman Anda
                        // Contoh: document.getElementById('hasilPencarian').innerHTML = data;
                    })
                    .catch(error => console.error('Error:', error));
            } else {
                // Jika input pencarian kosong, lakukan sesuatu (contoh: tampilkan pesan kesalahan)
                console.log('Input pencarian kosong');
                // Contoh: document.getElementById('pesanError').innerHTML = 'Masukkan kata kunci pencarian';
            }
        });
    });
</script>

@endsection