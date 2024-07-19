@extends('base.base-root-index')
@section('submenu')
Dokumen Publik
@endsection
@section('custom-css')
<style>
    .clickable {
        cursor: pointer;
    }
    .clickable.active {
        background-color: #af9898c4;
        border-left: 4px solid #007bff;
    }
</style>
@endsection
@section('content')
<div class="breadcrumb-wrap-style-2" data-bg-image="https://srv-xsample.internal-dev.id/assets/webprofil/media/banner/banner22.jpg" style="border-radius: 20px; background-image: url(&quot;https://srv-xsample.internal-dev.id/assets/webprofil/media/banner/banner22.jpg&quot;);">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('root.home-index') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('root.gallery-index') }}">Album Foto</a></li>
        </ol>
    </nav>
    <div class="inner-banner-title">
        <h1 class="title">@yield('submenu')</h1>
    </div>
</div>
<div class="page-content row mt-4">
    <div class="col-lg-4 col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">{{ $menu }}</h5>
            </div>
            <div class="card-body row">
                @foreach ($docs as $item)

                <div class="form-group col-lg-12">
                    <p data-slug="{{ asset('storage/'. $item->path) }}" class="clickable"><img src="{{ asset('storage/'. $item->cover) }}" style="max-width: 50px; border-radius: 10px;" alt=""> {{ $item->name }}</p>
                </div>
                @endforeach
                <div class="form-group col-lg-12">
                    <p data-slug="https://repositori.kemdikbud.go.id/12978/1/SEJARAH%20SURAT%20PERINTAH%2011%20MARET%201996.pdf" class="clickable"><img src="{{ asset('dist/assets/static/images/faces/8.jpg') }}" style="max-width: 50px; border-radius: 10px;" alt=""> Naskah asli SuperSemar.</p>
                </div>
                <div class="form-group col-lg-12">
                    <p data-slug="https://download.garuda.kemdikbud.go.id/article.php?article=816457&val=13335&title=Rancangan%20Implementasi%20Protokol%20SMime%20Pada%20Layanan%20E-mail%20Sebagai%20Upaya%20Peningkatan%20Jaminan%20Keamanan%20Dalam%20Transaksi%20Informasi%20Secara%20Online%20Studi%20Kasus%20%20PT%20XYZ" class="clickable"><img src="{{ asset('dist/assets/static/images/faces/8.jpg') }}" style="max-width: 50px; border-radius: 10px;" alt=""> File Dummy.</p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-8 col-12">
        <div class="card">
            <div class="card-header">
                <h5>Preview Files</h5>
            </div>
            <div class="card-body">
                <iframe id="pdf-iframe" src="https://repositori.kemdikbud.go.id/12978/1/SEJARAH%20SURAT%20PERINTAH%2011%20MARET%201996.pdf" frameborder="0" style="width: 100%; height: 500px;"></iframe>
            </div>
        </div>
    </div>
</div>
@endsection
@section('custom-js')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const iframe = document.getElementById('pdf-iframe');
        const clickableElements = document.querySelectorAll('.clickable');

        // Set initial iframe source to the first clickable element's data-slug and mark it active
        if (clickableElements.length > 0) {
            iframe.src = clickableElements[0].getAttribute('data-slug');
            clickableElements[0].classList.add('active');
        }

        clickableElements.forEach(element => {
            element.addEventListener('click', function () {
                // Remove active class from all elements
                clickableElements.forEach(el => el.classList.remove('active'));
                // Add active class to the clicked element
                this.classList.add('active');
                // Update iframe src
                iframe.src = this.getAttribute('data-slug');
            });
        });
    });
</script>
@endsection
