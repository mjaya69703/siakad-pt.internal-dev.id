@extends('base.base-root-index')
@section('content')
<div class="page-content row">

    <div class="col-lg-8 col-12">
        <h4 class="card-title">Gallery Terbaru</h4>
        <hr>
        <div class="card mb-3">
            <div class="card-body">
                <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <a href="/back">

                                <img src="{{ asset('dist') }}/assets/compiled/png/1.png" style="height: 375px; width: 100%; object-fit: cover;" class="d-block w-100" alt="...">
                                <div class="carousel-caption d-none d-md-block">
                                    <h5>First slide label</h5>
                                    <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
                                </div>
                            </a>
                        </div>
                        <div class="carousel-item">
                            <a href="/unzuo">

                                <img src="{{ asset('dist') }}/assets/compiled/png/2.png" style="height: 375px; width: 100%; object-fit: cover;" class="d-block w-100" alt="...">
                                <div class="carousel-caption d-none d-md-block">
                                    <h5>Second slide label</h5>
                                    <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
                                </div>
                            </a>
                        </div>
                        <div class="carousel-item">
                            <a href="/ushio">

                                <img src="{{ asset('dist') }}/assets/compiled/png/3.png" style="height: 375px; width: 100%; object-fit: cover;" class="d-block w-100" alt="...">
                                <div class="carousel-caption d-none d-md-block">
                                    <h5>Third slide label</h5>
                                    <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
                                </div>
                            </a>
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </a>
                </div>
            </div>
        </div>
        <h4 class="card-title">Berita Terbaru</h4>
        <hr>
        <div class="card mb-3">
            <div class="card-body">
                @if ($posts->count() == 0)
                    <p>Nothing Post In Here</p>
                    
                @else
                    @foreach ($posts as $key => $item)
                        
                        <div class="berita row">
                            <div class="col-lg-2 text-center">
                                <img src="{{ asset('storage/images/'. $item->image) }}" style="" class="rounded" alt="">
                            </div>
                            <div class="col-lg-10">
                                <a href="{{ route('root.post-view', $item->slug) }}" style="font-size: 20px; color: #c2c2d9; font-weight: 800;">{{ $item->name }}</a>
                                <p class="mb-2">{{ Str::limit( strip_tags( $item->content ), 180 ) }}</p>
                                <div class="d-flex justify-content-between align-items-center">
        
                                    <small>{{ $item->created_at->translatedFormat('l, d F Y - H.i') }} WIB <br> Author By <a href="#">{{ $item->author->name }}</a> - Kategori <a href="">{{ $item->category->name }}</a></small>
                                    <a href="{{ route('root.post-view', $item->slug) }}" class="btn btn-xs btn-info"><i class="fa-solid fa-info"></i></a>
                                </div>
                            </div>
                        </div>
                        <hr>
                    @endforeach
                @endif
            </div>
        </div>
        {{ $posts->links('root.vendor.paginator') }}

    </div>
    <div class="col-lg-4 col-12">
        <div class="card mb-3">
            <div class="card-body">
                <h4 class="card-title text-center">Sambutan Rektor</h4>
                <img src="{{ asset('storage/images/default/default-profile.jpg') }}" class="card-img-top mb-2" alt="">
                <p class="text-center">{{ $web->school_head }} <br>Rektor Utama Esec Academy</p>
                <hr>
                <p style="text-align: justify">{{ $web->school_desc }}</p>
            </div>
        </div>
        <div class="card mb-3">
            <div class="card-body">
                <div class="list-group list-group-horizontal-sm mb-1 text-center" role="tablist">
                    <a class="list-group-item list-group-item-action active" id="list-terbaru-list" data-bs-toggle="list" href="#list-terbaru" role="tab">Berita Terbaru</a>
                    <a class="list-group-item list-group-item-action" id="list-terpopular-list" data-bs-toggle="list" href="#list-terpopular" role="tab">Berita Terpopuler</a>
                </div>
                <div class="tab-content text-justify" style="text-align: justify">
                    <div class="tab-pane fade show active" id="list-terbaru" role="tabpanel" aria-labelledby="list-terbaru-list">Irure enim occaecat labore sit qui aliquip
                        reprehenderit amet
                        velit. Deserunt ullamco ex elit nostrud ut dolore nisi officia magna sit occaecat
                        laboris sunt dolor.
                        Nisi eu minim cillum occaecat aute est cupidatat aliqua labore aute occaecat ea
                        aliquip
                        sunt amet.
                        Aute mollit dolor ut exercitation irure commodo non amet consectetur quis amet
                        culpa.
                        Quis ullamco
                        nisi amet qui aute irure eu. Magna labore dolor quis ex labore id nostrud deserunt
                        dolor
                        eiusmod eu
                        pariatur culpa mollit in irure Lorem, ipsum dolor sit amet consectetur adipisicing
                        elit.
                        Iusto quis
                        porro doloribus est natus doloremque, eos laudantium
                        exercitationem impedit sapiente tenetur soluta reiciendis deserunt!</div>
                    <div class="tab-pane fade" id="list-terpopular" role="tabpanel" aria-labelledby="list-terpopular-list">Cupidatat
                        quis ad sint excepteur laborum in esse qui. Et excepteur consectetur ex nisi eu do
                        cillum ad laborum.
                        Mollit et eu officia dolore sunt Lorem culpa qui commodo velit ex amet id ex.
                        Officia
                        anim incididunt
                        laboris deserunt anim aute dolor incididunt veniam aute dolore do exercitation.
                        Dolor
                        nisi culpa ex ad
                        irure in elit eu dolore. Ad laboris ipsum reprehenderit irure non commodo enim culpa
                        commodo veniam
                        incididunt veniam ad. Lorem ipsum dolor sit amet consectetur, adipisicing elit.
                        Exercitationem, porro!
                        Amet soluta tempora eveniet blanditiis alias eos, dolor qui consectetur!
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    
@endsection