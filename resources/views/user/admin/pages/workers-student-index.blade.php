@extends('base.base-dash-index')
@section('title')
    Data Pengguna Mahasiswa - Siakad By Internal Developer
@endsection
@section('menu')
    Data Pengguna Mahasiswa
@endsection
@section('submenu')
    Lihat Data
@endsection
@section('urlmenu')
    #
@endsection
@section('subdesc')
    Halaman untuk melihat data pengguna Mahasiswa
@endsection
@section('content')
<section class="section">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title d-flex justify-content-between align-items-center">
                @yield('menu')
                <div class="">
                    <a href="{{ route($prefix.'workers.student-create') }}" class="btn btn-outline-primary"><i class="fa-solid fa-plus"></i></a>
                </div>
            </h5>
        </div>
        <div class="card-body">
            <table class="table table-striped" id="table1">
                <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">NIM</th>          
                        <th class="text-center">Nama Mahasiswa</th>
                        <th class="text-center">Kelas</th>
                        <th class="text-center">Gender</th>
                        <th class="text-center">Join Date</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Button</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($student as $key => $item)
                        
                    <tr>
                        <td data-label="Number">{{ ++$key }}</td>
                        <td data-label="NIM Mahasiswa">{{ $item->mhs_nim }}</td>
                        <td data-label="Nama Mahasiswa">{{ $item->mhs_name }}</td>
                        <td data-label="Kelas">{{ $item->kelas->name }}</td>
                        <td data-label="Gender">{{ $item->mhs_gend }}</td>
                        <td data-label="Join Date">{{ \Carbon\Carbon::parse($item->created_at)->format('l, d M Y') }}</td>
                        <td data-label="Status Mahasiswa">{{ $item->mhs_stat }}</td>
                        <td class="d-flex justify-content-center align-items-center">
                            <a href="#" style="margin-right: 10px" data-bs-toggle="modal" data-bs-target="#viewContact{{ $item->mhs_code }}" class="btn btn-outline-info"><i class="fas fa-phone"></i></a>
                            <a href="{{ route($prefix.'workers.student-edit', $item->mhs_code) }}" style="margin-right: 10px" class="btn btn-outline-primary"><i class="fas fa-edit"></i></a>
                            <form id="delete-form-{{ $item->mhs_code }}"
                                action="{{ route($prefix.'workers.student-destroy', $item->mhs_code) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <a type="button" class="bs-tooltip btn btn-rounded btn-outline-danger"
                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"
                                    data-original-title="Delete"
                                    data-url="{{ route($prefix.'workers.student-destroy', $item->mhs_code) }}"
                                    data-name="{{ $item->name }}"
                                    onclick="deleteData('{{ $item->mhs_code }}')">
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

@foreach ($student as $item)
    
<div class="modal fade text-left w-100" id="viewContact{{ $item->mhs_code }}" tabindex="-1" role="dialog"
    aria-labelledby="myModalLabel16" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-l"
        role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel16">Lihat Data Kontak - {{ $item->mhs_name }} </h4>
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
                            <input type="text" class="form-control" value="{{ $item->mhs_phone }}">
                            <a href="https://wa.me/{{ $item->mhs_phone }}" target="_blank" class="btn btn-outline-success" style="margin-left: 10px"><i class="fa-solid fa-square-phone"></i></a>
                        </div>

                    </div>
                    <div class="form-group col-lg-12 col-12">
                        <label for="kode_kelas">Alamat Email</label>
                        <div class="d-flex justify-content-between align-items-center">
                            <input type="text" class="form-control" value="{{ $item->mhs_mail }}">
                            <a href="mailto:{{ $item->mhs_mail }}" class="btn btn-outline-danger" style="margin-left: 10px"><i class="fa-solid fa-envelope"></i></a>
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