@extends('base.base-dash-index')
@section('title')
    Data Dokumen - Siakad By Internal Developer
@endsection
@section('menu')
    Data Dokumen
@endsection
@section('submenu')
    Daftar Dokumen
@endsection
@section('submenu0')
    Tambah Dokumen
@endsection
@section('urlmenu')
    {{ route($prefix.'document-index') }}
@endsection
@section('subdesc')
    Halaman untuk mengelola Dokumen
@endsection
@section('content')
<section class="section row">
    <div class="col-lg-12 col-12">
        <form action="{{ route($prefix.'document-store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="card-title">@yield('submenu')</h5>
                    <div class="">
                        <a href="{{ route('web-admin.document-index') }}" class="btn btn-warning"><i class="fa-solid fa-backward"></i></a>
                        <button type="submit" class="btn btn-primary"><i class="fa-solid fa-paper-plane"></i></button>
                    </div>

                </div>
                <div class="card-body row">
                    <div class="col-lg-4 col-12 row">
                        <img id="preview-image" src="" alt="Preview Image" style="display: none; max-width: 100%; max-height: 100%;">
                        <div class="form-group col-lg-12 col-12">
                            <label for="cover">Cover Document</label>
                            <input type="file" class="form-control" name="cover" id="cover" onchange="previewImage(event)" accept="image/*">
                            @error('cover')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-8 col-12 row">
                        <div class="form-group col-lg-6 col-12">
                            <label for="name">Nama Dokumen</label>
                            <input type="text" class="form-control" name="name" id="name" placeholder="Inputkan nama dokumen...">
                            @error('name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group col-lg-6 col-12">
                            <label for="name">File Dokumen</label>
                            <input type="file" class="form-control" name="path" id="path" >
                            @error('path')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
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
    function previewImage(event) {
        var reader = new FileReader();
        reader.onload = function() {
            var output = document.getElementById('preview-image');
            output.src = reader.result;
            output.style.display = 'block';
        }
        reader.readAsDataURL(event.target.files[0]);
    }
</script>
@endsection
