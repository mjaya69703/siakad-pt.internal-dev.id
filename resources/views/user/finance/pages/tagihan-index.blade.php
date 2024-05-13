@extends('base.base-dash-index')
@section('title')
    Data Tagihan - Siakad By Internal Developer
@endsection
@section('menu')
    Data Tagihan
@endsection
@section('submenu')
    Lihat
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
    Halaman untuk melihat data tagihan
@endsection
@section('content')
    <section class="section">
        <div class="row">
            <div class="col-lg-12 col-12">
                <div class="row">
                    <div class="col-lg-3 col-6 mb-2">
                        <a href="{{ route('web-admin.workers.student-index') }}">
                            <div class="card btn btn-outline-success">
                                <div class="card-body d-flex justify-content-around align-items-center">
                                    <span class="icon" style="margin-right: 25px;"><i class="fa-solid fa-file-invoice" style="font-size: 42px"></i></span>
                                    <span class="text-white" style="margin-left: 25px; font-size: 16px;">{{ \App\Models\TagihanKuliah::all()->count() }}<br> Tagihan</span>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-6 mb-2">
                        <a href="{{ route('web-admin.workers.student-index') }}">
                            <div class="card btn btn-outline-success">
                                <div class="card-body d-flex justify-content-around align-items-center">
                                    <span class="icon" style="margin-right: 25px;"><i class="fa-solid fa-file-invoice-dollar" style="font-size: 42px"></i></span>
                                    <span class="text-white" style="margin-left: 25px; font-size: 16px;">{{ \App\Models\HistoryTagihan::where('stat', 1)->count() }}<br> Pembayaran</span>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-6 mb-2">
                        <a href="{{ route('web-admin.workers.student-index') }}">
                            <div class="card btn btn-outline-success">
                                <div class="card-body d-flex justify-content-around align-items-center">
                                    <span class="icon" style="margin-right: 25px;"><i class="fa-solid fa-dollar" style="font-size: 42px"></i></span>
                                    <span class="text-white" style="margin-left: 25px; font-size: 16px;">{{ number_format($income, 0, ',', '.') }}<br> Income ( IDR )</span>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 col-12">
                <div class="card">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h5 class="card-title">@yield('menu')</h5>
                        <div class="">
                            <a href="{{ route($prefix.'finance.tagihan-create') }}" class="btn btn-primary"><i class="fa-solid fa-plus"></i></a>
                        </div>
        
                    </div>
                    <div class="card-body">
                        <table class="table table-striped" id="table1">
                            <thead>
                                <th class="text-center">#</th>
                                <th class="text-center">Kode Tagihan</th>
                                <th class="text-center">Nama Tagihan</th>
                                <th class="text-center">Type Tagihan</th>
                                <th class="text-center">Tagihan</th>
                                <th class="text-center">Nominal</th>
                                <th class="text-center">Button</th>
                            </thead>
                            <tbody>
                                @foreach ($tagihan as $key => $item)
                                    <tr class="">
                                        <td data-label="Number">{{ ++$key }}</td>
                                        <td data-label="Kode Tagihan"><span style="text-transform: uppercase">{{ $item->code }}</span></td>
                                        <td data-label="Nama Tagihan">{{ $item->name }}</td>
                                        <td data-label="Type Tagihan">
                                            @if($item->proku_id > 0)
                                                Type Global
                                            @elseif($item->prodi_id > 0)
                                                Type Pribadi
                                            @elseif($item->users_id > 0)
                                                Type Pribadi
                                            @endif
                                        </td>
                                        <td data-label="Tagihan Kepada">
                                            @if($item->proku_id !== 0 && $item->prokuu)
                                                Program Kuliah
                                                <br>
                                                {{ $item->prokuu->name }}
                                            @elseif($item->prodi_id !== 0 && $item->prodi)
                                                Program Studi
                                                <br>
                                                {{ $item->prodi->name }}
                                            @elseif($item->users_id !== 0 && $item->mahasiswa)
                                                Mahasiswa
                                                <br>
                                                {{ $item->mahasiswa->mhs_name }}
                                            @else
                                                -
                                            @endif
                                        </td>
                                        <td data-label="Nominal">Rp. {{ number_format($item->price, 0, ',', '.') }}</td>
                                        {{-- <td data-label="Tagihan Kepada">{{ $item->users_id === 0 ? $item->proku->name : $item->users->mhs_name }}</td> --}}
                                        <td class="d-flex justify-content-center align-items-center">
                                            <a href="#" style="margin-right: 10px" data-bs-toggle="modal" data-bs-target="#updateFakultas{{ $item->code }}" class="btn btn-outline-primary"><i class="fas fa-edit"></i></a>
                                            {{-- <a href="{{ route('web-admin.staffmanager-dosen-view', $item->code) }}"  style="margin-right: 10px" class="btn btn-outline-info"><i class="fa-solid fa-eye"></i></a> --}}
                                            <form id="delete-form-{{ $item->code }}"
                                                action="{{ route('web-admin.master.fakultas-destroy', $item->code) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <a type="button" class="bs-tooltip btn btn-rounded btn-outline-danger"
                                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"
                                                    data-original-title="Delete"
                                                    data-url="{{ route('web-admin.master.fakultas-destroy', $item->code) }}"
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
        </div>
    </section>
@endsection