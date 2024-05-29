@extends('base.base-dash-index')
@section('title')
    Data Pengguna Dosen - Siakad By Internal Developer
@endsection
@section('menu')
    Data Pengguna Dosen
@endsection
@section('submenu')
    Daftar
@endsection
@section('urlmenu')
    #
@endsection
@section('subdesc')
    Halaman untuk melihat data pengguna Dosen
@endsection
@section('content')
<section class="section">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title d-flex justify-content-between align-items-center">
                @yield('menu')
                <div class="">
                    <a href="{{ route('web-admin.workers.lecture-create') }}" class="btn btn-outline-primary"><i class="fa-solid fa-plus"></i></a>
                </div>
            </h5>
        </div>
        <div class="card-body">
            <table class="table table-striped" id="table1">
                <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">NIDN</th>
                        <th class="text-center">Nama Dosen</th>
                        <th class="text-center">Gender</th>
                        <th class="text-center">Join Date</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Button</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dosen as $key => $item)
                        
                    <tr>
                        <td data-label="Number">{{ ++$key }}</td>
                        <td data-label="NIDN">{{ $item->dsn_nidn }}</td>
                        <td data-label="Nama Karyawan">{{ $item->dsn_name }}</td>
                        <td data-label="Gender">{{ $item->dsn_gend }}</td>
                        <td data-label="Join Date">{{ \Carbon\Carbon::parse($item->created_at)->format('l, d M Y') }}</td>
                        @if($item->raw_dsn_stat === 1)
                        <td data-label="Status"><span class="text-success">Active</span></td>
                        
                        @elseif($item->raw_dsn_stat === 0)
                        <td data-label="Status"><span class="text-danger">Non-Active</span></td>
                        @endif
                        <td class="d-flex justify-content-center align-items-center">
                            <a href="#" style="margin-right: 10px" data-bs-toggle="modal" data-bs-target="#viewContact{{ $item->dsn_code }}" class="btn btn-outline-info"><i class="fas fa-phone"></i></a>
                            <a href="{{ route('web-admin.workers.lecture-edit', $item->dsn_code) }}" style="margin-right: 10px" class="btn btn-outline-primary"><i class="fas fa-edit"></i></a>
                            <form id="delete-form-{{ $item->dsn_code }}"
                                action="{{ route('web-admin.workers.lecture-destroy', $item->dsn_code) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <a type="button" class="bs-tooltip btn btn-rounded btn-outline-danger"
                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"
                                    data-original-title="Delete"
                                    data-url="{{ route('web-admin.workers.lecture-destroy', $item->dsn_code) }}"
                                    data-name="{{ $item->name }}"
                                    onclick="deleteData('{{ $item->dsn_code }}')">
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

@foreach ($dosen as $item)
    
<div class="modal fade text-left w-100" id="viewContact{{ $item->dsn_code }}" tabindex="-1" role="dialog"
    aria-labelledby="myModalLabel16" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-l"
        role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel16">Lihat Data Kontak - {{ $item->dsn_name }} </h4>
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
                            <input type="text" class="form-control" value="{{ $item->dsn_phone }}">
                            <a href="https://wa.me/{{ $item->dsn_phone }}" target="_blank" class="btn btn-outline-success" style="margin-left: 10px"><i class="fa-solid fa-square-phone"></i></a>
                        </div>

                    </div>
                    <div class="form-group col-lg-12 col-12">
                        <label for="kode_kelas">Alamat Email</label>
                        <div class="d-flex justify-content-between align-items-center">
                            <input type="text" class="form-control" value="{{ $item->dsn_mail }}">
                            <a href="mailto:{{ $item->dsn_mail }}" class="btn btn-outline-danger" style="margin-left: 10px"><i class="fa-solid fa-envelope"></i></a>
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