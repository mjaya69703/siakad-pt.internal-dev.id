@extends('base.base-dash-index')
@section('menu')
    Gallery Foto Album {{ $album->name }}
@endsection
@section('submenu')
    Daftar Album Foto
@endsection
@section('subdesc')
    Halaman untuk menampilkan album foto
@endsection
@section('urlmenu')
    {{ route($prefix.'publish.album-index') }}
@endsection
@section('custom-css')

    <style>
        .overlay-container {
            display: block;
            position: relative;
        }

        .overlay-text {
            position: absolute;
            bottom: 0; /* Atur posisi teks di bagian bawah */
            left: 0;
            width: 100%;
            background-color: rgba(0, 123, 255, 0.75); /* Warna latar belakang dengan opacity 0.75 */
            color: white; /* Warna teks */
            padding: 10px 20px; /* Padding teks */
            border-radius: 20px; /* Sudut rounded */
            opacity: 0; /* Awalnya tidak terlihat */
            transition: opacity 0.3s ease, transform 0.3s ease; /* Animasi transisi */
            transform: translateY(100%); /* Geser teks ke luar area */
        }

        .overlay-container:hover .overlay-text {
            opacity: 1; /* Munculkan overlay ketika hover */
            transform: translateY(0); /* Geser teks ke posisi atas */
        }

    </style>
@endsection
@section('content')
<section class="section row">
    <div class="col-lg-12">

        <div class="d-flex justify-content-between align-items-center">
            <div class="a d-flex justify-content-center">
                <form action="{{ route($prefix.'publish.album-search') }}" method="GET">
                    <div class="a d-flex justify-content-center">
                        <input type="search" class="form-control" placeholder="Search here..." name="search" id="search">
                        <button type="submit" class="btn btn-info" style="margin-left: 5px"><i class="fa-solid fa-search"></i></button>
                    </div>
                </form>


            </div>
            <div class="b d-flex justify-content-center">
                <a href="{{ route($prefix.'publish.album-create') }}" class="btn btn-primary"><i class="fa-solid fa-plus"></i> Create</a>
                <div class="">
                    <a href="" style="margin-left: 5px" class="btn btn-warning"><i class="fa-solid fa-sync"></i></a>

                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4  mt-2">
        <div class="text-center">
            <div class="position-relative">
                <a href="#" class="overlay-container mb-2 mt-2">
                    <img class="w-100 active" style="border-radius: 20px" src="{{ asset('storage/'.$album->cover) }}" data-bs-target="#Gallerycarousel" data-bs-slide-to="0">
                    <span class="overlay-text">{{ $album->name }}</span>
                </a>
            </div>
        </div>
    </div>
    <div class="col-lg-8 mt-2">
        <div class="card">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="card-title">Album {{ $album->name }}</h5>
                <div class="">
                    <a href="{{ route($prefix.'publish.album-edit', $album->slug) }}" style="margin-left: 5px" class="btn btn-primary"><i class="fa-solid fa-edit"></i></a>
                    <a href="@yield('urlmenu')" style="margin-left: 5px" class="btn btn-warning"><i class="fa-solid fa-backward"></i></a>

                </div>
            </div>
            <div class="card-body">
                <p>{{ $album->desc }} Lorem ipsum dolor sit amet consectetur adipisicing elit. Quod quidem reprehenderit laborum mollitia tenetur atque expedita quaerat dolores ullam nulla assumenda provident tempore beatae, illo praesentium corporis voluptate nesciunt asperiores qui. Sapiente, vero ut, repellat hic iure cupiditate modi autem, ducimus sequi assumenda animi ratione perferendis aut quos doloribus ea fugit? At recusandae voluptas delectus iusto, eaque obcaecati numquam cupiditate id explicabo optio ratione praesentium laudantium facilis cumque quisquam fugit. Ipsum quisquam, at inventore sunt nesciunt, quibusdam deleniti voluptatum repellat repudiandae perspiciatis ea itaque ullam cum ad fugit, voluptas est repellendus quis? Id consectetur iste ut deserunt voluptates obcaecati ratione illo cumque nisi autem earum unde hic, est pariatur, delectus perspiciatis atque, modi dignissimos debitis aliquam nemo culpa qui minus beatae. Impedit incidunt quibusdam nemo repudiandae dignissimos, facilis saepe adipisci molestias? Ea quaerat deleniti, et nostrum saepe quidem incidunt hic blanditiis quam numquam cum quo, animi vero assumenda excepturi? Quae, blanditiis. Quam dolores placeat tenetur similique, debitis ipsa quisquam illum nulla quaerat eos repudiandae maxime esse blanditiis sapiente facilis! Molestiae totam, sit cupiditate quo, quae reprehenderit doloremque optio illum culpa earum atque vitae quaerat accusamus distinctio delectus ratione porro quos esse eligendi maiores nihil! Esse voluptas sunt ipsam doloribus accusamus. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto, cupiditate labore ducimus nam corporis saepe. At voluptate distinctio, nulla praesentium illo ipsum, accusamus nobis enim eius, assumenda veniam fuga in exercitationem et eos? Tenetur adipisci natus doloribus pariatur rerum cum perspiciatis debitis, tempore nulla magni numquam minus quo vero sit rem sequi culpa fugiat dolores exercitationem animi. Assumenda veniam odit eaque hic nam fugiat soluta doloribus qui est unde error vel nisi, inventore consequatur, explicabo officiis placeat. Cum, nesciunt dolores, necessitatibus blanditiis numquam accusantium molestias repellat voluptatibus dolor, recusandae delectus cupiditate inventore laudantium? Cumque omnis minima tempore blanditiis provident eius!</p>
            </div>
        </div>
    </div>
    <div class="col-lg-12 row mt-2">
        <div class="col-12 col-sm-12 col-lg-3 mt-2 mb-2 mt-md-0 mb-md-0 text-center">
            <div class="position-relative">
                <a href="#" class="overlay-container">
                    <img class="w-100 active" style="border-radius: 20px" src="{{ asset('storage/'.$album->file_1) }}" data-bs-target="#Gallerycarousel" data-bs-slide-to="0">
                    <span class="overlay-text">Gallery Foto 1 </span>
                </a>
            </div>
        </div>
        @for ($i = 2; $i <= 20; $i++)
            @if ($album->{'file_'.$i})
                <div class="col-6 col-sm-12 col-lg-3 mt-2 mb-2 mt-md-0 mb-md-0 text-center">
                    <div class="position-relative">
                        <a href="#" class="overlay-container">
                            <img class="w-100 active" style="border-radius: 20px" src="{{ asset('storage/'.$album->{'file_'.$i}) }}" data-bs-target="#Gallerycarousel" data-bs-slide-to="{{ $i - 1 }}">
                            <span class="overlay-text">Gallery Foto {{ $i }}</span>
                        </a>
                    </div>
                </div>
            @endif
        @endfor
        {{-- {{ $album->links('root.vendor.paginator') }} --}}
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
