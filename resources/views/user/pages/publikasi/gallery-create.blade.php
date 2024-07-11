@extends('base.base-dash-index')
@section('menu')
    Album Foto
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
@section('content')
<section class="section row">
    <div class="col-lg-4 col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Album Cover</h5>
            </div>
            <div class="card-body row">
                <div class="form-group col-lg-12 col-12">
                    <img src="{{ asset('storage/images/gallery/album-a.jpg') }}" class="card-img-top" alt="">
                    <label for="cover">Image Cover</label>
                    <input type="file" class="form-control" name="cover" id="cover">
                </div>
                <div class="form-group col-lg-12 col-12">
                    <label for="name">Nama Album Foto</label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="Inputkan nama album foto...">
                </div>
                <div class="form-group col-lg-12 col-12">
                    <label for="name">Deskripsi Album</label>
                    <textarea class="form-control" name="desc" id="desc" placeholder="Inputkan deskripsi..." cols="30" rows="10"></textarea>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-8 col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Details Album</h5>
            </div>
            <div class="card-body row">
                <div class="form-group col-lg-6 col-12">
                    <label for="name">Nama Album Foto</label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="Inputkan nama album foto...">
                </div>
            </div>
        </div>
    </div>
</section>
    
@endsection