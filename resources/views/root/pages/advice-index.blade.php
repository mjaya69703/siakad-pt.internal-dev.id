@extends('base.base-root-index')
@section('content')
    <div class="page-content row">
        <div class="col-lg-12 col-12">
            <form action="{{ route('root.home-advice-store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">{{ $menu }}</h4>
                    </div>
                    <div class="card-body row">
                        <div class="form-group col-lg-6 col-12">
                            <label for="name">Nama Lengkap Anda</label>
                            <input type="text" name="name" id="name" class="form-control" placeholder="Inputkan nama lengkap anda...">
                            @error('name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group col-lg-6 col-12">
                            <label for="email">Alamat Email Anda</label>
                            <input type="text" name="email" id="email" class="form-control" placeholder="Inputkan alamat email anda...">
                            @error('email')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group col-lg-12 col-12">
                            <label for="subject">Subject Saran</label>
                            <input type="text" name="subject" id="subject" class="form-control" placeholder="Inputkan subject saran anda...">
                            @error('subject')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group col-lg-12 col-12">
                            <label for="desc">Deskripsi Saran</label>
                            <textarea name="desc" id="dark" cols="30" rows="10" class="form-control" placeholder="Jelaskan secara detail saran dari anda..."></textarea>
                            @error('desc')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="d-flex justify-content-end align-items-center">
                            <button type="submit" class="btn btn-primary"><i style="margin-right: 5px" class="fa-solid fa-paper-plane"></i> Save</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('custom-js')
    <script src="{{ asset('dist') }}/assets/extensions/tinymce/tinymce.min.js"></script>
    <script src="{{ asset('dist') }}/assets/static/js/pages/tinymce.js"></script>
@endsection