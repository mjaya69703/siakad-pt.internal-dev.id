@extends('base.base-root-index')
@section('content')
<div class="page-content row">
    <div class="col-lg-8 col-12">
        <div class="card">
            <div class="card-content">
                <img class="card-img-bottom img-fluid" src="{{ asset('storage/images/'. $post->image) }}"
                    alt="Card image cap" style="height: 20rem; object-fit: cover;">
                <div class="card-body">
                    <h4 class="card-title">{{ $post->name }}</h4>
                    <p class="card-text">
                        {!! $post->content !!}
                    </p>
                    <div class="card-link d-flex flex-column align-items-center text-center">
                        <span>{{ $post->created_at->translatedFormat('l, d F Y - H.i') }} WIB</span>
                        <span>Author By <a href="#">{{ $post->author->name }}</a></span>
                        <span>Kategori <a href="">{{ $post->category->name }}</a></span>
                    </div>
                </div>
            </div>
        </div>
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
