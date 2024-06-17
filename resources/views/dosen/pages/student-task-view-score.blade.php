@extends('base.base-dash-index')
@section('title')
    Lihat Tugas Kuliah Mahasiswa - Siakad By Internal Developer
@endsection
@section('menu')
    Data Tugas Kuliah Mahasiswa
@endsection
@section('submenu')
    Tugas {{ $score->task->jadkul->matkul->name }} - {{ $score->task->jadkul->pert_id }}
@endsection
@section('urlmenu')
{{ route('dosen.akademik.stask-view', $score->task->code) }}
@endsection
@section('subdesc')
    Halaman untuk melihat detail Tugas Kuliah Mahasiswa
@endsection
@section('custom-css')
    <link rel="stylesheet" href="{{ asset('dist') }}/assets/extensions/summernote/summernote-lite.css">
    <link rel="stylesheet" href="{{ asset('dist') }}/assets/compiled/css/form-editor-summernote.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4-dark.css" rel="stylesheet">

@endsection
@section('content')
<section class="section">
        <form action="{{ route('dosen.akademik.stask-update-score', $score->code) }}" method="post" enctype="multipart/form-data">
            @method('PATCH')
            @csrf
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title d-flex justify-content-between align-items-center">
                        Jawaban @yield('submenu')
                        <div class="">
                            <button type="submit" class="btn btn-primary"><i class="fa-solid fa-paper-plane"></i></button>
                            <a href="@yield('urlmenu')" class="btn mt-1 btn-warning"><i class="fa-solid fa-backward"></i></a>

                        </div>
                    </h5>
                </div>
                <div class="card-body row">
                    <div class="form-group col-lg-4 col-12">
                        <label for="mhs_name">Nama Mahasiswa</label>
                        <input type="text" readonly id="mhs_name" name="mhs_name" class="form-control" value="{{ $score->student->mhs_name }}">
                        @error('mhs_name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group col-lg-4 col-12">
                        <label for="mhs_class">Nama Kelas</label>
                        <input type="text" readonly id="mhs_class" name="mhs_class" class="form-control" value="{{ $score->student->kelas->name }}">
                        @error('mhs_class')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group col-lg-4 col-12" style="display: none;">
                        <label for="student_id">ID Student</label>
                        <input type="text" readonly id="student_id" name="student_id" class="form-control" value="{{ $score->student->id }}">
                        @error('student_id')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group col-lg-4 col-12">
                        <label for="score">Score Tugas</label>
                        <input type="number" {{ $score->score == null ? '' : 'readonly' }} id="score" name="score" class="form-control" min="0" max="10" value="{{ $score->score == null ? null : $score->score }}" placeholder="Masukkan Nilai untuk mahasiswa">
                        @error('score')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group col-lg-12 col-12">
                        <label for="desc">Detail Jawaban</label>
                        <textarea readonly name="desc" id="summernote" cols="30" rows="10" class="form-control" placeholder="Inputkan keterangan singkat mengenai jawaban tugas kamu...">{!! $score->desc !!}</textarea>
                        @error('desc')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group col-lg-12 col-12">
                        @for ($i = 1; $i <= 8; $i++)
                            @if (!empty($score->{'file_' . $i}))
                                <a href="{{ asset('storage/uploads/' . $score->{'file_' . $i}) }}" download >Lampiran {{ $i }} ,</a>
                            @endif
                        @endfor
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
