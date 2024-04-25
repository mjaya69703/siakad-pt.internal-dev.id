@extends('base.base-dash-index')
@section('title')
    Talent Management - Siakad By Internal Developer
@endsection
@section('menu')
    Users Manager
@endsection
@section('submenu')
    Manage Lecture
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
    Halaman untuk mengelola Dosen
@endsection
@section('content')
<section class="section">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title d-flex justify-content-between align-items-center">
                @yield('submenu')
                <div class="">
                    @if(Route::is('web-admin.staffmanager-dosen-index', request()->path()))
                    <a href="{{ route('web-admin.staffmanager-create-admin') }}" class="btn btn-outline-primary"><i class="fa-solid fa-plus"></i></a>
                    @elseif(Route::is('web-admin.staffmanager-staff-index', request()->path()))
                    <a href="{{ route('web-admin.staffmanager-create-staff') }}" class="btn btn-outline-primary"><i class="fa-solid fa-plus"></i></a>
                    @endif
                </div>
            </h5>
        </div>
        <div class="card-body">
            <table class="table table-striped" id="table1">
                <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">Full Name</th>
                        <th class="text-center">NIDN</th>
                        <th class="text-center">Email Address</th>
                        <th class="text-center">Phone</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Details</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dosen as $key => $item)
                        
                    <tr>
                        <td class="text-center">{{ ++$key }}</td>
                        <td class="">{{ $item->dsn_name }}</td>
                        <td class="text-center">{{ $item->dsn_nidn }}</td>
                        <td class="text-center">{{ $item->dsn_mail }}</td>
                        <td class="text-center">{{ $item->dsn_phone }}</td>
                        @if ($item->raw_dsn_stat === 1)
                            
                        <td class="text-center"><span class="btn btn-success">Active</span></td>
                        @elseif($item->raw_dsn_stat === 0)
                        <td class="text-center"><span class="btn btn-danger">Non-Active</span></td>
                        @endif
                        @if(Route::is('web-admin.staffmanager-dosen-index', request()->path()))
                        <td class="d-flex justify-content-center align-items-center">
                            <a href="#" style="margin-right: 10px" data-bs-toggle="modal" data-bs-target="#updateMember{{ $item->dsn_code }}" class="btn btn-outline-primary"><i class="fas fa-edit"></i></a>
                            <a href="{{ route('web-admin.staffmanager-dosen-view', $item->dsn_code) }}"  style="margin-right: 10px" class="btn btn-outline-info"><i class="fa-solid fa-eye"></i></a>
                            <form id="delete-form-{{ $item->dsn_code }}"
                                action="{{ route('web-admin.staffmanager-dosen-destroy', $item->dsn_code) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <a type="button" class="bs-tooltip btn btn-rounded btn-outline-danger"
                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"
                                    data-original-title="Delete"
                                    data-url="{{ route('web-admin.staffmanager-dosen-destroy', $item->dsn_code) }}"
                                    data-name="{{ $item->name }}"
                                    onclick="deleteData('{{ $item->dsn_code }}')">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </form>
                        </td>
                        @endif
                    </tr>
                    @endforeach
 
                </tbody>
            </table>
        </div>
    </div>

</section>
<div class="me-1 mb-1 d-inline-block">

    <!--Extra Large Modal -->
    @foreach ($dosen as $item)
    <form action="{{ route('web-admin.staffmanager-update-stat-dosen', $item->id) }}" method="POST" enctype="multipart/form-data">
        @method('patch')
        @csrf
        <div class="modal fade text-left w-100" id="updateMember{{$item->dsn_code}}" tabindex="-1" role="dialog"
            aria-labelledby="myModalLabel16" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-l"
                role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel16">Edit Pengguna - {{ $item->dsn_name }}</h4>
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
                            <div class="form-group col-lg-12 col-12">
                                <label for="status">Status Member</label>
                                <select name="dsn_stat" id="dsn_stat" class="form-select">
                                    {{-- <option selected disabled>Pilih Tipe Member</option> --}}
                                    <optgroup label="Pilih Status Dosen">
                                        <option value="0" {{ $item->raw_dsn_stat == '0' ? 'selected' : '' }} >Non-Active</option>
                                        <option value="1" {{ $item->raw_dsn_stat == '1' ? 'selected' : '' }} >Active</option>
                                    </optgroup>
                                </select>
                                @error('status')
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
