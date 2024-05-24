@extends('base.base-dash-index')
@section('title')
    Ticket Support - Siakad By Internal Developer
@endsection
@section('menu')
    Ticket Support
@endsection
@section('submenu')
    Buka Ticket Support
@endsection
@section('urlmenu')
    {{ route('mahasiswa.support.ticket-index') }}
@endsection
@section('subdesc')
    Halaman untuk membuka ticket support
@endsection
@section('custom-css')
    <link rel="stylesheet" href="{{ asset('dist') }}/assets/extensions/summernote/summernote-lite.css">

    <link rel="stylesheet" href="{{ asset('dist') }}/assets/compiled/css/form-editor-summernote.css">
@endsection
@section('content')
    <section class="content">
        <form action="{{ route('mahasiswa.support.ticket-store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="card">
                <div class="card-header">
                    <h5 class="card-title d-flex justify-content-between align-items-center">
                        @yield('menu')
                        <div class="">
                            <a href="@yield('urlmenu')" class="btn btn-warning"><i class="fa-solid fa-backward"></i></a>
                        </div>
                    </h5>
                </div>
                <div class="card-body row">
                    <div class="form-group col-lg-4 col-12">
                        <label for="mhs_name">Nama Mahasiswa</label>
                        <input type="text" name="mhs_name" id="mhs_name" class="form-control" value="{{ Auth::guard('mahasiswa')->user()->mhs_name }}">
                        @error('mhs_name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group col-lg-4 col-12">
                        <label for="dept_id">Pilih Departement</label>
                        <select name="dept_id" id="dept_id" class="form-select">
                            <option value="">Pilih Departement Tujuan</option>
                            <option value="1" {{ $dept == 1 ? 'selected' : '' }}>Departement Finance</option>
                            <option value="2" {{ $dept == 2 ? 'selected' : '' }}>Departement Officer</option>
                            <option value="3" {{ $dept == 3 ? 'selected' : '' }}>Departement Akademik</option>
                            <option value="4" {{ $dept == 4 ? 'selected' : '' }}>Departement Admin</option>
                            <option value="5" {{ $dept == 5 ? 'selected' : '' }}>Departement Support</option>
                        </select>
                        @error('dept_id')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group col-lg-4 col-12">
                        <label for="prio_id">Level Prioritas</label>
                        <select name="prio_id" id="prio_id" class="form-select">
                            <option value="">Pilih Prioritas</option>
                            <option value="0">Rendah</option>
                            <option value="1">Medium</option>
                            <option value="2">Tinggi</option>
                            <option value="3">Urgent</option>
                        </select>
                        @error('prio_id')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group col-lg-12 col-12">
                        <label for="subject">Subject</label>
                        <input type="text" name="subject" id="subject" required class="form-control" placeholder="Inputkan subject ticket...">
                        @error('subject')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group col-lg-12 col-12">
                        <label for="message">Message</label>
                        <textarea name="message" id="summernote" cols="30" rows="10"></textarea>
                        @error('message')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="d-flex justify-content-end align-items-center">
                        <button type="submit" class="btn btn-primary"><i class="fa-solid fa-paper-plane"></i> Send Ticket</button>
                    </div>
                </div>
            </div>
        </form>
    </section>
@endsection
@section('custom-js')
    <script src="{{ asset('dist') }}/assets/extensions/summernote/summernote-lite.min.js"></script>
    <script src="{{ asset('dist') }}/assets/static/js/pages/summernote.js"></script>
@endsection
