@extends('base.base-dash-index')
@section('title')
    Lihat Tugas Kuliah - Siakad By Internal Developer
@endsection
@section('menu')
    Data Tugas Kuliah
@endsection
@section('submenu')
    Tugas {{ $stask->jadkul->matkul->name }} - {{ $stask->jadkul->pert_id }} 
@endsection
@section('urlmenu')
{{ route('mahasiswa.akademik.tugas-index') }}
@endsection
@section('subdesc')
    Halaman untuk melihat detail Tugas Kuliah
@endsection
@section('custom-css')
    <link rel="stylesheet" href="{{ asset('dist') }}/assets/extensions/summernote/summernote-lite.css">
    <link rel="stylesheet" href="{{ asset('dist') }}/assets/compiled/css/form-editor-summernote.css">
@endsection
@section('content')
<section class="section">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title d-flex justify-content-between align-items-center">
                    Lihat @yield('submenu')
                    <div class="">
                        <a href="@yield('urlmenu')" class="btn btn-warning"><i class="fa-solid fa-backward"></i></a>
                    </div>
                </h5>
            </div>
            <div class="card-body row">
                <div class="form-group col-lg-4 col-12">
                    <label for="exp_date">Mata Kuliah</label>
                    <input type="text" readonly id="exp_date" name="exp_date" value="{{ $stask->jadkul->matkul->name }} - {{ $stask->jadkul->pert_id }}" class="form-control">
                    @error('exp_date')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group col-lg-4 col-12">
                    <label for="exp_date">Batas Akhir Tanggal</label>
                    <input type="date" readonly id="exp_date" name="exp_date" value="{{ $stask->exp_date }}" class="form-control">
                    @error('exp_date')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group col-lg-4 col-12">
                    <label for="exp_time">Batas Akhir Waktu</label>
                    <input type="time" readonly id="exp_time" name="exp_time" value="{{ $stask->exp_time }}" class="form-control">
                    @error('exp_time')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group col-lg-12 col-12">
                    <label for="title">Judul Tugas</label>
                    <input type="text" readonly id="title" name="title" class="form-control" value="{{ $stask->title }}" placeholder="Masukkan nama judul tugas...">
                    @error('title')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group col-lg-12 col-12">
                    <label for="detail_task">Detail Tugas</label>
                    <textarea readonly name="detail_task" id="detail_task" cols="30" rows="10" class="form-control" placeholder="Inputkan detail tugas...">{!! $stask->detail_task !!}</textarea>
                    @error('detail_task')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
        </div>
        <form action="{{ route('mahasiswa.akademik.tugas-store', $stask->code) }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="card">
                <div class="card-header">
                    <h5 class="card-title d-flex justify-content-between align-items-center">
                        Jawaban @yield('submenu')
                        <div class="">
                            <button type="submit" class="btn btn-primary"><i class="fa-solid fa-paper-plane"></i></button>
                        </div>
                    </h5>
                </div>
                <div class="card-body row">
                    <div class="form-group col-lg-4 col-12">
                        <label for="file_1">File Tugas 1</label>
                        <input type="file" readonly id="file_1" name="file_1" class="form-control" placeholder="Masukkan nama judul tugas...">
                        @error('file_1')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group col-lg-4 col-12">
                        <label for="file_2">File Tugas 2 ( Opsional )</label>
                        <input type="file" readonly id="file_2" name="file_2" class="form-control" placeholder="Masukkan nama judul tugas...">
                        @error('file_2')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group col-lg-4 col-12">
                        <label for="file_3">File Tugas 3 ( Opsional )</label>
                        <input type="file" readonly id="file_3" name="file_3" class="form-control" placeholder="Masukkan nama judul tugas...">
                        @error('file_3')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group col-lg-12 col-12">
                        <label for="desc">Detail Jawaban</label>
                        <textarea readonly name="desc" id="summernote" cols="30" rows="10" class="form-control" placeholder="Inputkan keterangan singkat mengenai jawaban tugas kamu..."></textarea>
                        @error('desc')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
            </div>
        </form>
    </section>
@endsection
@section('custom-js')
    <script src="{{ asset('dist')}}/assets/extensions/choices.js/public/assets/scripts/choices.js"></script>
    <script src="{{ asset('dist')}}/assets/static/js/pages/form-element-select.js"></script>
    <script src="{{ asset('dist') }}/assets/extensions/summernote/summernote-lite.min.js"></script>
    <script src="{{ asset('dist') }}/assets/static/js/pages/summernote.js"></script>
@endsection