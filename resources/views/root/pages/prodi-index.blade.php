@extends('base.base-root-index')
@section('submenu')
    Prodi - {{ $pstudi->name }}
@endsection
@section('content')
<div class="breadcrumb-wrap-style-2"
    data-bg-image="https://srv-xsample.internal-dev.id/assets/webprofil/media/banner/banner22.jpg"
    style="border-radius: 20px; background-image: url(&quot;https://srv-xsample.internal-dev.id/assets/webprofil/media/banner/banner22.jpg&quot;);">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('root.home-index') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="#">{{ $pstudi->fakultas->name }}</a></li>
        </ol>
    </nav>
    <div class="inner-banner-title">
        <h1 class="title">@yield('submenu')</h1>
    </div>
</div>
<section class="section row mt-3">
    <div class="col-lg-4 col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Tentang {{ $pstudi->name }}</h5>
            </div>
            <div class="card-body">
                <span>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Sequi unde, delectus laboriosam, blanditiis in nemo aliquid assumenda distinctio ab autem, fugit pariatur minima. Magni saepe quas, eligendi consectetur numquam ipsam. Accusantium ut, beatae enim est quia consectetur provident dolorum aliquam eveniet quisquam sed fugiat perspiciatis esse! Totam earum autem delectus?</span>
                <br>
                <div class="text-center mt-3">

                    <a href="#" class="btn btn-primary">Daftar Sekarang</a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-8 col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Kurikulum {{ $pstudi->name }}</h5>
            </div>
            <div class="card-body">
                <img src="https://images.twinkl.co.uk/tw1n/image/private/t_630_eco/image_repo/0e/cc/id-t-1691226189-template-rpp-mingguan-kurikulum-merdeka_ver_1.jpg" class="card-img-top" alt="">
                <span>Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestiae magnam explicabo mollitia numquam asperiores voluptates, ipsam impedit rem quisquam quasi sunt molestias, voluptatem, nesciunt alias culpa eius? Eum distinctio dicta, consequatur vel temporibus illum consequuntur dolor corporis delectus accusantium? Quia odio dolor cupiditate nemo facere nihil voluptas illo sint explicabo!</span>
            </div>
        </div>
    </div>
</section>
@endsection
