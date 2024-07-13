@extends('base.base-root-index')
@section('submenu')
    Daftar Album Foto
@endsection
@section('content')
<section class="section">
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
    <div class="row mb-3 mt-3">
        <div class="col-lg-12">
        
            <div class="d-flex justify-content-between align-items-center">
                <div class="a d-flex justify-content-center">
                    <form action="{{ route('root.gallery-search') }}" method="GET">
                        <div class="a d-flex justify-content-center">
                            <input type="search" class="form-control" placeholder="Search here..." name="search" id="search">
                            <button type="submit" class="btn btn-info" style="margin-left: 5px"><i
                                    class="fa-solid fa-search"></i></button>
                        </div>
                    </form>
        
        
                </div>
                <div class="b">
                </div>
            </div>
        </div>
        <div class="col-lg-12 row mt-2">
            @foreach ($albums as $item)
            <div class="col-6 col-sm-6 col-lg-3 mt-3 mb-3 mt-md-0 mb-md-0 text-center">
                <div class="position-relative">
                    <a href="{{ route('root.gallery-show', $item->slug) }}" class="overlay-container mb-2 mt-2">
                        <img class="w-100 active" style="border-radius: 20px" src="{{ asset('storage/'.$item->cover) }}"
                            data-bs-target="#Gallerycarousel" data-bs-slide-to="0">
                        <span class="overlay-text">{{ $item->name }}</span>
                    </a>
                </div>
            </div>
            @endforeach
            {{ $albums->links('root.vendor.paginator') }}
        </div>
    </div>

</section>
@endsection