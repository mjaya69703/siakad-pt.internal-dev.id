@extends('base.base-dash-index')
@section('title')
    Data Pengguna Admin - Siakad By Internal Developer
@endsection
@section('menu')
    Data Pengguna Admin
@endsection
@section('submenu')
    Data Pengguna Admin
@endsection
@section('urlmenu')
    #
@endsection
@section('subdesc')
    Halaman untuk melihat data pengguna Admin
@endsection
@section('content')
<section class="section">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title d-flex justify-content-between align-items-center">
                @yield('submenu')
                <div class="">
                    <a href="{{ route('web-admin.workers.admin-create') }}" class="btn btn-outline-primary"><i class="fa-solid fa-plus"></i></a>
                    <a href="{{ route('web-admin.services.convert.export-users') }}" class="btn btn-outline-success"><i class="fa-solid fa-file-export"></i></a>
                    <a href="#" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#importUsers"><i class="fa-solid fa-file-import"></i></a>
                </div>
            </h5>
        </div>
        <div class="card-body">
            <table class="table table-striped" id="table1">
                <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">Nama Karyawan</th>
                        <th class="text-center">Role Karyawan</th>
                        <th class="text-center">Gender</th>
                        <th class="text-center">Join Date</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Button</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($admin as $key => $item)

                    <tr>
                        <td data-label="Number">{{ ++$key }}</td>
                        <td data-label="Nama Karyawan">{{ $item->name }}</td>
                        <td data-label="Role Karyawan">{{ $item->type }}</td>
                        <td data-label="Gender">{{ $item->gend }}</td>
                        <td data-label="Join Date">{{ \Carbon\Carbon::parse($item->created_at)->format('l, d M Y') }}</td>
                        @if($item->status === 1)
                        <td data-label="Status"><span class="text-success">Active</span></td>

                        @elseif($item->status === 0)
                        <td data-label="Status"><span class="text-danger">Non-Active</span></td>
                        @endif
                        <td class="d-flex justify-content-center align-items-center">
                            <a href="#" style="margin-right: 10px" data-bs-toggle="modal" data-bs-target="#viewContact{{ $item->code }}" class="btn btn-outline-info"><i class="fas fa-phone"></i></a>
                            <a href="{{ route('web-admin.workers.admin-edit', $item->code) }}" style="margin-right: 10px" class="btn btn-outline-primary"><i class="fas fa-edit"></i></a>
                            <form id="delete-form-{{ $item->code }}"
                                action="{{ route('web-admin.workers.admin-destroy', $item->code) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <a type="button" class="bs-tooltip btn btn-rounded btn-outline-danger"
                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"
                                    data-original-title="Delete"
                                    data-url="{{ route('web-admin.workers.admin-destroy', $item->code) }}"
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

</section>
<div class="me-1 mb-1 d-inline-block">

    <!--Extra Large Modal -->
    <form action="{{ route('web-admin.services.convert.import-users') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="modal fade text-left w-100" id="importUsers" tabindex="-1" role="dialog"
            aria-labelledby="myModalLabel16" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-l"
                role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel16">Import Pengguna</h4>
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
                            <div class="form-group col-12">
                                <label for="import">Import Files ( xlsx, csv )</label>
                                <input type="file" name="import" id="import" class="form-control" accept=".xls, .xlsx, .csv">
                                @error('import')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
<div class="me-1 mb-1 d-inline-block">

@foreach ($admin as $item)

<div class="modal fade text-left w-100" id="viewContact{{ $item->code }}" tabindex="-1" role="dialog"
    aria-labelledby="myModalLabel16" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-l"
        role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel16">Lihat Data Kontak - {{ $item->name }} </h4>
                <div class="">

                    <button type="button" class="btn btn-outline-danger mt-1" data-bs-dismiss="modal" aria-label="Close">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="form-group col-lg-12 col-12">
                        <label for="kode_kelas">Nomor Telepon</label>
                        <div class="d-flex justify-content-between align-items-center">
                            <input type="text" class="form-control" value="{{ $item->phone }}">
                            <a href="https://wa.me/{{ $item->phone }}" target="_blank" class="btn btn-outline-success" style="margin-left: 10px"><i class="fa-solid fa-square-phone"></i></a>
                        </div>

                    </div>
                    <div class="form-group col-lg-12 col-12">
                        <label for="kode_kelas">Alamat Email</label>
                        <div class="d-flex justify-content-between align-items-center">
                            <input type="text" class="form-control" value="{{ $item->email }}">
                            <a href="mailto:{{ $item->email }}" class="btn btn-outline-danger" style="margin-left: 10px"><i class="fa-solid fa-envelope"></i></a>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endforeach

</div>
@endsection
@section('custom-js')
<script src="{{ asset('dist') }}/assets/extensions/tinymce/tinymce.min.js"></script>
<script src="{{ asset('dist') }}/assets/static/js/pages/tinymce.js"></script>
@endsection
