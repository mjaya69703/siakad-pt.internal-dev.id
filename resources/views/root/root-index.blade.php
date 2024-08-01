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
                        @foreach ($album as $item)

                        <div class="carousel-item active">
                            <a href="{{ route('root.gallery-show', $item->slug) }}">

                                <img src="{{ asset('storage/'.$item->cover) }}" style="height: 375px; width: 100%; object-fit: cover;" class="d-block w-100" alt="...">
                                <div class="carousel-caption d-none d-md-block">
                                    <h5>{{ $item->name }}</h5>
                                    <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
                                </div>
                            </a>
                        </div>
                        @endforeach
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
                                <a href="{{ route('root.post-view', $item->slug) }}" style="font-size: 20px; font-weight: 800;">{{ $item->name }}</a>
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
                <p style="text-align: justify">{!! $web->school_desc !!}</p>
            </div>
        </div>
        <div class="card mb-3">
            <div class="card-body">
                <div class="list-group list-group-horizontal-sm mb-1 text-center" role="tablist">
                    <a class="list-group-item list-group-item-action active" id="list-terbaru-list" data-bs-toggle="list" href="#list-terbaru" role="tab">Daftar Pengumuman</a>
                    <a class="list-group-item list-group-item-action" id="list-terpopular-list" data-bs-toggle="list" href="#list-terpopular" role="tab">Berita Terpopuler</a>
                </div>
                <div class="tab-content text-justify" style="text-align: justify">
                    <div class="tab-pane fade show active" id="list-terbaru" role="tabpanel" aria-labelledby="list-terbaru-list">
                        <h6 class="text-center mt-2 mb-2">Pengumuman - {{ \Carbon\Carbon::now()->format('d M Y') }}</h6>

                        @forelse ($notify as $item)
                            <span>{{ \Carbon\Carbon::parse($item->created_at)->format('d-m-Y'.' - '.'H'.'.'.'i') }} - <a href="#" data-bs-toggle="modal" data-bs-target="#updateFakultas{{ $item->code }}">{{ $item->name }}</a></span><br>
                        @empty
                            <span class="">Tidak Ada Pengumuman Hari Ini</span>
                        @endforelse
                    </div>
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
<div class="me-1 mb-1 d-inline-block">

    <!--Extra Large Modal -->
    @foreach ($notify as $item)
        <div class="modal fade text-left w-100" id="updateFakultas{{$item->code}}" tabindex="-1" role="dialog"
            aria-labelledby="myModalLabel16" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-l"
                role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel16">Notifikasi - {{ $item->name }}</h4>
                        <div class="">

                            <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal"
                                aria-label="Close">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="form-group">
                                <p class="text-center"><b>{{ $item->name }}</b></p>
                                <p>{!! $item->desc !!}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>

@endsection
