@extends('base.base-dash-index')
@section('title')
    Ticket Support - Siakad By Internal Developer
@endsection
@section('menu')
    Ticket Support
@endsection
@section('submenu')
    Lihat Ticket
@endsection
@section('urlmenu')
{{ route('mahasiswa.support.ticket-index') }}
@endsection
@section('custom-css')
    <link rel="stylesheet" href="{{ asset('dist') }}/assets/extensions/summernote/summernote-lite.css">

    <link rel="stylesheet" href="{{ asset('dist') }}/assets/compiled/css/form-editor-summernote.css">
@endsection
@section('subdesc')
    Halaman untuk melihat Ticket #{{ $ticket->code }}
@endsection
@section('content')
    <section class="content">
        <form action="{{ route('mahasiswa.support.ticket-store-reply', $ticket->code) }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="card mb-2">
                <div class="card-header">
                    <h5 class="card-title d-flex justify-content-between align-items-center">
                        Lihat @yield('menu')
                        <div class="">
                            <a href="@yield('urlmenu')" class="btn btn-warning"><i class="fa-solid fa-backward"></i></a>
                        </div>
                    </h5>
                </div>
                <div class="card-body row">
                    <div class="form-group col-lg-4 col-12">
                        <label for="mhs_name">Nama Mahasiswa</label>
                        <input type="text" name="mhs_name" id="mhs_name" class="form-control" readonly value="{{ Auth::guard('mahasiswa')->user()->mhs_name }}">
                        @error('mhs_name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group col-lg-4 col-12">
                        <label for="dept_id">Pilih Departement</label>
                        <input type="text" name="dept_id" id="dept_id" class="form-control" readonly value="{{ $ticket->dept_id }}">

                        @error('dept_id')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group col-lg-4 col-12">
                        <label for="prio_id">Level Prioritas</label>
                        <input type="text" name="prio_id" id="prio_id" class="form-control" readonly value="{{ $ticket->prio_id }}">

                        @error('prio_id')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group col-lg-8 col-12">
                        <label for="subject">Subject</label>
                        <input type="text" name="subject" id="subject" required class="form-control" readonly value="{{ $ticket->subject }}">
                        @error('subject')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group col-lg-4 col-12">
                        <label for="stat_id">Status</label>
                        <input type="text" name="stat_id" id="stat_id" required class="form-control" readonly value="{{ $ticket->stat_id }}">
                        @error('stat_id')
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
        <hr class="mb-2">

        <div id="support-container">

            @foreach ($support as $item)
                <div class="card mb-2">
                    <div class="card-body">
                        <div class="form-group row">
                            <div class="col-lg-3">
                                <div class="d-flex align-items-center mb-3">
                                    <div class="avatar avatar-lg me-3">
                                        <img src="{{ asset('storage/images/' . $item->users->mhs_image) }}" class="avatar-sm" alt="">
                                    </div>
                                    <span><b>{{ $item->users->mhs_name . ' - ' . $item->created_at->diffForHumans() }}</b><br>Kelas {{ $item->users->kelas->name }}</span>
                                </div>
                                <a href="" class="btn btn-danger text-center">Delete</a>
                                <a href="" class="btn btn-danger text-center">Delete</a>
                            </div>
                            <div class="col-lg-9">
                                <p>{!! $item->message !!}</p>
                            </div>

                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="card mb-2">
            <div class="card-body">
                <div class="form-group row">
                    <div class="col-lg-3">
                        <div class="d-flex">
                            <div class="avatar avatar-lg me-3">
                                <img src="{{ asset('storage/images/' . $ticket->users->mhs_image) }}" class="avatar-sm" alt="">
                            </div>
                            <span><b>{{ $ticket->users->mhs_name . ' - ' . $ticket->created_at->diffForHumans() }}</b><br>Kelas {{ $ticket->users->kelas->name }}</span>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <p>{!! $ticket->message !!}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('custom-js')
    <script src="{{ asset('dist') }}/assets/extensions/summernote/summernote-lite.min.js"></script>
    <script src="{{ asset('dist') }}/assets/static/js/pages/summernote.js"></script>
    <script>
        let autoRefreshTimer; // Timer untuk auto-refresh

        // Fungsi untuk memulai auto-refresh setiap 5 detik
        function startAutoRefresh() {
            autoRefreshTimer = setInterval(function() {
                // Lakukan refresh halaman
                location.reload();
            }, 15000); // Refresh setiap 5 detik
        }

        // Fungsi untuk menghentikan auto-refresh
        function stopAutoRefresh() {
            if (autoRefreshTimer) {
                clearInterval(autoRefreshTimer);
            }
        }

        // Memulai auto-refresh secara default
        startAutoRefresh();

        // Menangani event ketika pengguna mulai mengetik di summernote
        $('#summernote').on('summernote.keyup', function() {
            stopAutoRefresh(); // Menghentikan auto-refresh saat pengguna mengetik
        });

        // Menangani event ketika pengguna berhenti mengetik di summernote
        $('#summernote').on('summernote.blur', function() {
            startAutoRefresh(); // Mengaktifkan kembali auto-refresh saat pengguna berhenti mengetik
        });
    </script>
@endsection
