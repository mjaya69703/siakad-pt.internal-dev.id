@extends('base.base-root-index')
@section('submenu')
Lihat Gallery {{ $album->name }}
@endsection
@section('content')
<div class="breadcrumb-wrap-style-2"
    data-bg-image="https://srv-xsample.internal-dev.id/assets/webprofil/media/banner/banner22.jpg"
    style="border-radius: 20px; background-image: url(&quot;https://srv-xsample.internal-dev.id/assets/webprofil/media/banner/banner22.jpg&quot;);">
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
<section class="section row mt-3">
    <div class="col-lg-4 col-12">
        <div class="text-center">
            <div class="position-relative">
                <a href="#" class="overlay-container mb-2 mt-2">
                    <img class="w-100 active" style="border-radius: 20px" src="{{ asset('storage/'.$album->cover) }}"
                        data-bs-target="#Gallerycarousel" data-bs-slide-to="0">
                    <span class="overlay-text">{{ $album->name }}</span>
                </a>
            </div>
        </div>
    </div>
    <div class="col-lg-8 col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">{{ $album->name }}</h5>
            </div>
            <div class="card-body">
                {{ $album->desc }}
            </div>
        </div>
    </div>
    <div class="col-lg-12 row mt-2">
            @for ($i = 1; $i <= 20; $i++) @if ($album->{'file_'.$i})
                <div class="col-6 col-sm-12 col-lg-4 mt-2 mb-2 mt-md-0 mb-md-0 text-center">
                    <div class="position-relative">
                        <a href="#" class="overlay-container">
                            <img class="w-100 active" style="border-radius: 20px"
                                src="{{ asset('storage/'.$album->{'file_'.$i}) }}" data-bs-target="#Gallerycarousel"
                                data-bs-slide-to="{{ $i - 1 }}">
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