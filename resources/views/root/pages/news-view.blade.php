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
                <p class="text-center">Drs. Mulawarman Sudono, S.Tek <br>Rektor Utama Esec Academy</p>
                <hr>
                <p style="text-align: justify">Lorem ipsum dolor sit amet consectetur adipisicing elit. Inventore dolore laboriosam praesentium quas voluptatem ab facere repellendus reiciendis, fuga odio sequi. Nisi architecto totam eaque magnam hic cum aperiam commodi.</p>
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
