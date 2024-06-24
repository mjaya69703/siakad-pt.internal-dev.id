@extends('base.base-dash-index')
@section('title')
    Data Postingan - Siakad By Internal Developer
@endsection
@section('menu')
    Data Postingan
@endsection
@section('submenu')
    Edit Postingan
@endsection
@section('submenu0')
    Edit Postingan - {{ $post->name }}
@endsection
@section('urlmenu')
    #
@endsection
@section('subdesc')
    Halaman untuk mengelola Postingan
@endsection
@section('custom-css')
    <link rel="stylesheet" href="{{ asset('dist') }}/assets/extensions/summernote/summernote-lite.css">
    <link rel="stylesheet" href="{{ asset('dist') }}/assets/compiled/css/form-editor-summernote.css">
@endsection
@section('content')
<section class="section row">

    <div class="col-lg-12 col-12">
        <form action="{{ route('web-admin.news.post-update', $post->slug) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="card-title">@yield('submenu')</h5>
                    <div class="">
                        <a href="{{ route('web-admin.news.post-index') }}" class="btn btn-warning"><i class="fa-solid fa-backward"></i></a>
                    </div>
    
                </div>
                <div class="card-body row">
    
                    <div class="col-lg-4 col-12">
                        <div class="form-group">
                            <img src="{{ asset('storage/images/' . $post->image) }}" class="card-img-top" alt="">

                            <label for="image">Post Cover</label>
                            <input type="file" class="form-control" name="image" id="image" accept="image/*">
                            @error('image')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-8 col-12">
                        <div class="form-group">
                            <label for="category_id">Kategori Postingan</label>
                            <select name="category_id" id="category_id" class="form-select">
                                <option value="" selected>Pilih Kategori</option>
                                @foreach ($category as $item)
                                    <option value="{{ $item->id }}" {{ $post->category_id === $item->id ? 'selected' : '' }}>{{ $item->name }}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="name">Judul Postingan</label>
                            <input type="text" class="form-control" name="name" id="name" value="{{ $post->name }}" placeholder="Inputkan judul postingan...">
                            @error('name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="keywords">Kata Kunci Postingan</label>
                            <input type="text" class="form-control" name="keywords" id="keywords" value="{{ $post->keywords }}" placeholder="Inputkan kata kunci postingan...">
                            @error('keywords')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="metadesc">Meta Desc Postingan</label>
                            <input type="text" class="form-control" name="metadesc" id="metadesc" value="{{ $post->metadesc }}" placeholder="Inputkan meta deskripsi postingan...">
                            @error('metadesc')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
    
                    </div>
                    <div class="col-lg-12 col-12">
                        <div class="form-group col-lg-12 col-12">
                            <label for="content">Isi Konten Postingan</label>
                            <textarea name="content" id="summernote" cols="30" rows="10">{!! $post->content !!}</textarea>
                            @error('content')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="d-flex justify-content-end align-items-center">
                            <button type="submit" class="btn btn-primary"><i class="fa-solid fa-paper-plane"></i> Submit Post</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

</section>
@endsection
@section('custom-js')
    <script>
        document.getElementById("image").onchange = function(event) {
            var reader = new FileReader();
            reader.onload = function() {
                var output = document.querySelector('.card-img-top');
                output.src = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);
        };
    </script>
    <script src="{{ asset('dist') }}/assets/extensions/summernote/summernote-lite.min.js"></script>
    <script src="{{ asset('dist') }}/assets/static/js/pages/summernote.js"></script>
@endsection
