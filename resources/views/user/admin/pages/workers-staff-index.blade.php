@extends('base.base-dash-index')
@section('title')
    Data Pengguna Karyawan - Siakad By Internal Developer
@endsection
@section('menu')
    Data Pengguna Karyawan
@endsection
@section('submenu')
    Data Pengguna Karyawan
@endsection
@section('urlmenu')
@php
$prefix = '';
$rawType = Auth::user()->raw_type;
switch ($rawType) {
    case 1:
        $prefix = 'faculty.';
        break;
    case 2:
        $prefix = 'administrative.';
        break;
    case 3:
        $prefix = 'academic.';
        break;
    case 4:
        $prefix = 'facility.';
        break;
    default:
        $prefix = 'web-admin.';
        break;
}
@endphp
    #
@endsection
@section('subdesc')
    Halaman untuk melihat data pengguna Karyawan
@endsection
@section('content')
<section class="section">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title d-flex justify-content-between align-items-center">
                @yield('submenu')
                <div class="">
                    <a href="{{ route('web-admin.workers.staff-create') }}" class="btn btn-outline-primary"><i class="fa-solid fa-plus"></i></a>
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
                            <a href="{{ route('web-admin.workers.staff-edit', $item->code) }}" style="margin-right: 10px" class="btn btn-outline-primary"><i class="fas fa-edit"></i></a>
                            <form id="delete-form-{{ $item->code }}"
                                action="{{ route('web-admin.workers.staff-destroy', $item->code) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <a type="button" class="bs-tooltip btn btn-rounded btn-outline-danger"
                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"
                                    data-original-title="Delete"
                                    data-url="{{ route('web-admin.master.staff-destroy', $item->code) }}"
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

    {{-- <!--Extra Large Modal -->
    @foreach ($matkul as $item)
    <form action="{{ route('web-admin.master.matkul-update', $item->code) }}" method="POST" enctype="multipart/form-data">
        @method('patch')
        @csrf
        <div class="modal fade text-left w-100" id="updateMatkul{{$item->code}}" tabindex="-1" role="dialog"
            aria-labelledby="myModalLabel16" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl"
                role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel16">Edit Mata Kuliah - {{ $item->name }}</h4>
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
                            <div class="form-group col-lg-6 col-12">
                                <label for="name">Nama Mata Kuliah</label>
                                <input type="text" name="name" id="name" class="form-control" value="{{ $item->name }}">
                                @error('name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group col-lg-6 col-12">
                                <label for="code">Kode Mata Kuliah</label>
                                <input type="text" name="code" id="code" class="form-control" value="{{ $item->code }}">
                                @error('code')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group col-lg-6 col-12">
                                <label for="requ_id">Persyaratan Mata Kuliah</label>
                                <select name="requ_id" id="requ_id" class="form-select" name="requ_id" id="requ_id">
                                    <option value="" selected>Pilih Persyaratan Mata Kuliah</option>
                                    @foreach ($matkul as $item_r)
                                    <option value="{{ $item_r->id }}" {{ $item->requ_id == $item_r->id ? 'selected' : '' }}>{{ $item_r->name }}</option>
                                    @endforeach
                                </select>
                                @error('requ_id')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group col-lg-6 col-12">
                                <label for="bsks">Bebas SKS Mata Kuliah</label>
                                <input type="number" min="10" max="40" name="bsks" id="bsks" class="form-control" value="{{ $item->bsks }}">
                                @error('bsks')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group col-lg-4 col-12">
                                <label for="kuri_id">Kurikulum</label>
                                <select name="kuri_id" id="kuri_id" class="form-select" name="kuri_id" id="kuri_id">
                                    <option value="" selected>Pilih Kurikulum</option>
                                    @foreach ($kuri as $item_k)
                                    <option value="{{ $item_k->id }}" {{ $item->kuri_id == $item_k->id ? 'selected' : '' }}>{{ $item_k->name }}</option>
                                    @endforeach
                                </select>
                                @error('kuri_id')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group col-lg-4 col-12">
                                <label for="taka_id">Tahun Akademik</label>
                                <select name="taka_id" id="taka_id" class="form-select" name="taka_id" id="taka_id">
                                    <option value="" selected>Pilih Tahun Akademik</option>
                                    @foreach ($taka as $item_t)
                                    <option value="{{ $item_t->id }}" {{ $item->taka_id == $item_t->id ? 'selected' : '' }}>{{ $item_t->name . ' - ' . $item_t->semester }}</option>
                                    @endforeach
                                </select>
                                @error('taka_id')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group col-lg-4 col-12">
                                <label for="pstudi_id">Program Studi</label>
                                <select name="pstudi_id" id="pstudi_id" class="form-select" name="pstudi_id" id="pstudi_id">
                                    <option value="" selected>Pilih Program Studi</option>
                                    @foreach ($pstudi as $item_p)
                                    <option value="{{ $item_p->id }}" {{ $item->pstudi_id == $item_p->id ? 'selected' : '' }}>{{ $item_p->name }}</option>
                                    @endforeach
                                </select>
                                @error('pstudi_id')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group col-lg-4 col-12">
                                <label for="dosen_1">Dosen Pengampu</label>
                                <select name="dosen_1" id="dosen_1" class="form-select" name="dosen_1" id="dosen_1">
                                    <option value="" selected>Pilih Dosen Pengampu</option>
                                    @foreach ($dosen as $item_d1)
                                    <option value="{{ $item_d1->id }}" {{ $item->dosen_1 == $item_d1->id ? 'selected' : '' }}>{{ $item_d1->dsn_name }}</option>
                                    @endforeach
                                </select>
                                @error('dosen_1')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror 
                            </div>
                            <div class="form-group col-lg-4 col-12">
                                <label for="dosen_2">Dosen Cadangan 1</label>
                                <select name="dosen_2" id="dosen_2" class="form-select" name="dosen_2" id="dosen_2">
                                    <option value="" selected>Pilih Dosen Cadangan 1</option>
                                    @foreach ($dosen as $item_d2)
                                    <option value="{{ $item_d2->id }}" {{ $item->dosen_2 == $item_d2->id ? 'selected' : '' }}>{{ $item_d2->dsn_name }}</option>
                                    @endforeach
                                </select>
                                @error('dosen_2')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror 
                            </div>
                            <div class="form-group col-lg-4 col-12">
                                <label for="dosen_3">Dosen Cadangan 2</label>
                                <select name="dosen_3" id="dosen_3" class="form-select" name="dosen_3" id="dosen_3">
                                    <option value="" selected>Pilih Dosen Cadangan 1</option>
                                    @foreach ($dosen as $item_d3)
                                    <option value="{{ $item_d3->id }}" {{ $item->dosen_3 == $item_d3->id ? 'selected' : '' }}>{{ $item_d3->dsn_name }}</option>
                                    @endforeach
                                </select>
                                @error('dosen_3')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror                               
                            </div>

                            <div class="form-group col-lg-12 col-12">
                                <label for="desc">Deskripsi Mata Kuliah</label>
                                <textarea name="desc" id="dark" class="form-control" placeholder="isikan deskripsi matakuliah ...." cols="30" rows="10">{{ $item->desc == null ? '' : $item->desc }}</textarea>
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
    @endforeach --}}
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