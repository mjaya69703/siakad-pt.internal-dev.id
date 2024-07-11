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
<section class="section">
    <form action="{{ route($prefix.'publish.album-store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="row">
            <div class="col-lg-4 col-12">
                <div class="card">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h5 class="card-title">Album Cover</h5>
                        <div>
                            <button type="submit" class="btn btn-primary"><i class="fa-solid fa-paper-plane"></i></button>
                        </div>
                    </div>
                    <div class="card-body row">
                        <div class="form-group col-lg-12 col-12">
                            <img src="{{ asset('storage/images/gallery/album-a.jpg') }}" class="card-img-top" alt="">
                            <label for="cover">Image Cover</label>
                            <input type="file" class="form-control" name="cover" id="cover">
                            @error('cover')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group col-lg-12 col-12">
                            <label for="name">Nama Album Foto</label>
                            <input type="text" class="form-control" name="name" id="name" placeholder="Inputkan nama album foto...">
                            @error('name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group col-lg-12 col-12">
                            <label for="desc">Deskripsi Album</label>
                            <textarea class="form-control" name="desc" id="desc" placeholder="Inputkan deskripsi..." cols="30" rows="10"></textarea>
                            @error('desc')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Details Album</h5>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <div class="position-relative">
                                <img id="preview_1" class="card-img-top mt-2 img-fluid" src="#" alt="Preview" style="display: none; align-items: center; max-width: 700px;" >
                            </div>
                            <label for="file_1">Gallery Images 1</label>
                            <div class="d-flex justify-content-between align-items-center">
                                <input type="file" name="file_1" id="file_1" class="form-control" accept="image/*" onchange="previewImage(this, 'preview_1')">
                                <button type="button" style="margin-left: 5px" id="add_more" class="btn btn-success"><i class="fa-solid fa-plus"></i></button>
                                <button type="button" style="margin-left: 5px" id="remove" class="btn btn-danger"><i class="fa-solid fa-minus"></i></button>
                            </div>
                            @error('file_1')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        @for($i = 2; $i <= 20; $i++)

                            <div class="form-group" id="file_{{ $i }}_div" style="display: none;">
                                <div class="position-relative">

                                    <img id="preview_{{ $i }}" class="card-img-top mt-2 img-fluid" src="#" alt="Preview" style="display: none; max-width: 700px;">
                                </div>
                                <label for="file_{{ $i }}">Gallery Images {{ $i }}</label>
                                <input type="file" class="form-control" name="file_{{ $i }}" id="file_{{ $i }}" accept="image/*" onchange="previewImage(this, 'preview_{{ $i }}')">
                                @error('file_' . $i)
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        @endfor
                        <div id="warning" class="text-danger" style="display: none;">Maksimal 20 Foto.</div>

                    </div>
                </div>
            </div>
        </div>
    </form>
</section>

@endsection
@section('custom-js')

<script>
$(document).ready(function() {
    var currentAttachment = 2;
    $('#add_more').click(function() {
        if (currentAttachment <= 20) {
            $('#file_' + currentAttachment + '_div').show();
            currentAttachment++;
        }
        if (currentAttachment > 20) {
            $('#warning').show();
        }
    });
    $('#remove').click(function() {
        if (currentAttachment > 2) {
            currentAttachment--;
            $('#file_' + currentAttachment + '_div').hide();
            if (currentAttachment <= 20) {
                $('#warning').hide();
            }
        }
    });
});

function previewImage(input, imgId) {
        const preview = document.getElementById(imgId);
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.style.display = 'block';
            }
            reader.readAsDataURL(input.files[0]);
        } else {
            preview.src = '#';
            preview.style.display = 'none';
        }
    }
</script>
@endsection
