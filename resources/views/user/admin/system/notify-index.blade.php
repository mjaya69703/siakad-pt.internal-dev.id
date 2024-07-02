@extends('base.base-dash-index')
@section('menu')
    Pengumuman
@endsection
@section('submenu')
    Daftar Pengumuman
@endsection
@section('urlmenu')
    #
@endsection
@section('subdesc')
    Halaman untuk mengelola Pengumuman
@endsection
@section('content')
    <section class="content row">
        <div class="col-lg-4">
            <div class="card">
                <form action="{{ route($prefix.'system.notify-store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4 class="card-title">Tambah @yield('menu')</h4>
                        <button type="submit" class="btn btn-primary"><i class="fa-solid fa-paper-plane"></i></button>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="send_to">Target Notifikasi</label>
                            <select name="send_to" id="send_to" class="form-select">
                                <option value="">Pilih Target Notifikasi</option>
                                <option value="0">Semua Orang</option>
                                <option value="1">Khusus Staff / Pegawai</option>
                                <option value="2">Khusus Dosen</option>
                                <option value="3">Khusus Mahasiswa</option>
                            </select>
                            @error('send_to')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="name">Judul Notifikasi</label>
                            <input type="text" name="name" id="name" class="form-control" placeholder="Inputkan judul notifikasi...">
                            @error('name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="type">Kategori Notifikasi</label>
                            <input type="text" name="type" id="type" class="form-control" placeholder="Inputkan kategori notifikasi...">
                            @error('type')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="desc">Pesan Notifikasi</label>
                            <textarea name="desc" id="dark" class="form-control" cols="30" rows="10" placeholder="Inputkan pesan notifikasi"></textarea>
                            @error('desc')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="card-title">@yield('menu')</h4>
                </div>
                <div class="card-body">
                    <table class="table table-striped" id="table1">
                        <thead>
                            <th class="text-center">#</th>
                            <th class="text-center">Judul Notifikasi</th>
                            <th class="text-center">Kategori</th>
                            <th class="text-center">Author</th>
                            <th class="text-center">Button</th>
                        </thead>
                        <tbody>
                            @foreach ($notify as $key => $item)
                                <tr class="">
                                    <td data-label="Number">{{ ++$key }}</td>
                                    <td data-label="Judul Notifikasi">{{ $item->name }}</td>
                                    <td data-label="Kategori">{{ $item->type }}</td>
                                    <td data-label="Author">{{ $item->author->name }}</td>
                                    <td class="d-flex justify-content-center align-items-center">
                                        <a href="#" style="margin-right: 10px" data-bs-toggle="modal" data-bs-target="#updateNotify{{ $item->code }}" class="btn btn-outline-primary"><i class="fas fa-edit"></i></a>
                                        <form id="delete-form-{{ $item->code }}"
                                            action="{{ route($prefix.'system.notify-destroy', $item->code) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <a type="button" class="bs-tooltip btn btn-rounded btn-outline-danger"
                                                data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"
                                                data-original-title="Delete"
                                                data-url="{{ route($prefix.'system.notify-destroy', $item->code) }}"
                                                data-name="{{ $item->name }}"
                                                onclick="deleteData('{{ $item->code }}')">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
    <div class="me-1 mb-1 d-inline-block">

        <!--Extra Large Modal -->
        @foreach ($notify as $item)
        <form action="{{ route($prefix.'system.notify-update', $item->code) }}" method="POST" enctype="multipart/form-data">
            @method('patch')
            @csrf
            <div class="modal fade text-left w-100" id="updateNotify{{$item->code}}" tabindex="-1" role="dialog"
                aria-labelledby="myModalLabel16" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-l"
                    role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="myModalLabel16">Edit Notifikasi - {{ $item->name }}</h4>
                            <div class="">

                                <button type="submit" class="btn btn-outline-primary" >
                                    <i class="fas fa-paper-plane"></i>
                                </button>
                                <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal"
                                    aria-label="Close">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="form-group">
                                    <label for="name">Judul Notifikasi</label>
                                    <input type="text" class="form-control" name="name" id="name" placeholder="Inputkan nama fakultas..." value="{{ $item->name }}">
                                    @error('name')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="code">Kategori</label>
                                    <input type="text" class="form-control" name="type" id="type" placeholder="Inputkan kode fakultas..." value="{{ $item->type }}" >
                                    @error('type')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="desc">Pesan Notifikasi</label>
                                    <textarea name="desc" id="dark" class="form-control" cols="30" rows="10" placeholder="Inputkan pesan notifikasi">{!! $item->desc !!}</textarea>
                                    @error('desc')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        @endforeach
    </div>
@endsection
@section('custom-js')
    <script src="{{ asset('dist') }}/assets/extensions/tinymce/tinymce.min.js"></script>
    <script src="{{ asset('dist') }}/assets/static/js/pages/tinymce.js"></script>
@endsection
