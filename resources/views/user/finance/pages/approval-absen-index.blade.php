@extends('base.base-dash-index')
@section('title')
    Data Approval Absensi - Siakad By Internal Developer
@endsection
@section('menu')
    Data Approval Absensi
@endsection
@section('submenu')
    Lihat Data
@endsection
@section('urlmenu')
    #
@endsection
@section('subdesc')
    Halaman untuk melihat Data Approval Absensi
@endsection
@section('content')
    <section class="section row">
        <div class="col-lg-12 col-12">
            <div class="row">
                <div class="col-lg-3 col-6 mb-2">
                    <a href="{{ route($prefix . 'approval.absen-index') }}">
                        <div class="card btn btn-outline-success">
                            <div class="card-body d-flex justify-content-around align-items-center">
                                <span class="icon" style="margin-right: 25px;"><i class="fa-solid fa-person-circle-question" style="font-size: 42px"></i></span>
                                <span class="text-white" style="margin-left: 25px; font-size: 16px;">{{ App\Models\uAttendance::where('absen_approve', 1)->count() }}<br> Approval Absen</span>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-6 mb-2">
                    <a href="{{ route($prefix . 'approval.absen-index-approved') }}">
                        <div class="card btn btn-outline-success">
                            <div class="card-body d-flex justify-content-around align-items-center">
                                <span class="icon" style="margin-right: 25px;"><i class="fa-solid fa-person-circle-check" style="font-size: 42px"></i></span>
                                <span class="text-white" style="margin-left: 25px; font-size: 16px;">{{ App\Models\uAttendance::where('absen_approve', 2)->count() }}<br> Approved Absen</span>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-6 mb-2">
                    <a href="{{ route($prefix . 'approval.absen-index-rejected') }}">
                        <div class="card btn btn-outline-success">
                            <div class="card-body d-flex justify-content-around align-items-center">
                                <span class="icon" style="margin-right: 25px;"><i class="fa-solid fa-person-circle-xmark" style="font-size: 42px"></i></span>
                                <span class="text-white" style="margin-left: 25px; font-size: 16px;">{{ App\Models\uAttendance::where('absen_approve', 3)->count() }}<br> Rejected Absen</span>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-lg-12 col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">@yield('menu')</h5>
                </div>
                <div class="card-body">
                    <table class="table table-striped" id="table1" style="width: 100%">
                        <thead>
                            <th class="text-center" style="max-width: 8% !important">#</th>
                            <th class="text-center">Nama Lengkap</th>
                            <th class="text-center">Type Izin</th>
                            <th class="text-center">Tanggal</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Buttons</th>
                        </thead>
                        <tbody>
                            @foreach ($absen as $key => $item)
                                <tr>
                                    <td data-label="Number">{{ ++$key }}</td>
                                    <td data-label="Nama Lengkap">{{ $item->user->name }}</td>
                                    <td data-label="Type Izin">{{ $item->absen_type }}</td>
                                    <td data-label="Tanggal">{{ \Carbon\Carbon::parse($item->absen_date)->format('d M Y') }}</td>
                                    <td data-label="Status">{{ $item->absen_approve }}</td>
                                    {{-- <td data-label="Keterangan" style="width: 40% !important">{!! $item->absen_desc !!}</td> --}}
                                    <td class="text-center d-flex align-items-center justify-content-center">
                                        <a href="#" style="margin-right: 10px" data-bs-toggle="modal" data-bs-target="#checkApprove{{ $item->absen_code }}" class="btn btn-primary"><i class="fa-solid fa-eye"></i></a>
                                        @if ($item->raw_absen_approve == 1)
                                            <form id="accept-form-{{ $item->absen_code }}" action="{{ route($prefix . 'approval.absen-update-accept', $item->absen_code) }}" method="POST">
                                                @csrf
                                                @method('PATCH')
                                                <a type="button" style="margin-right: 10px" class="bs-tooltip btn btn-rounded btn-success" data-bs-toggle="tooltip" data-bs-placement="top" title="Accept" data-original-title="Accept" data-url="{{ route($prefix . 'approval.absen-update-accept', $item->absen_code) }}" data-name="{{ $item->name }}" onclick="acceptData('{{ $item->absen_code }}')">
                                                    <i class="fa-solid fa-check"></i>
                                                </a>
                                            </form>
                                            <form id="reject-form-{{ $item->absen_code }}" action="{{ route($prefix . 'approval.absen-update-reject', $item->absen_code) }}" method="POST">
                                                @csrf
                                                @method('PATCH')
                                                <a type="button" style="margin-right: 10px" class="bs-tooltip btn btn-rounded btn-danger" data-bs-toggle="tooltip" data-bs-placement="top" title="Reject" data-original-title="Reject" data-url="{{ route($prefix . 'approval.absen-update-reject', $item->absen_code) }}" data-name="{{ $item->name }}" onclick="rejectData('{{ $item->absen_code }}')">
                                                    <i class="fa-solid fa-xmark"></i>
                                                </a>
                                            </form>
                                        @elseif($item->raw_absen_approve == 2)
                                            <a href="#" style="margin-right: 10px" data-bs-toggle="modal" data-bs-target="#checkApprove{{ $item->absen_code }}" class="btn btn-success"><i class="fa-solid fa-check"></i></a>
                                        @elseif($item->raw_absen_approve == 3)
                                            <a href="#" style="margin-right: 10px" data-bs-toggle="modal" data-bs-target="#checkApprove{{ $item->absen_code }}" class="btn btn-danger"><i class="fa-solid fa-xmark"></i></a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="me-1 mb-1 d-inline-block">

            <!--Extra Large Modal -->
            @foreach ($absen as $item)
                <form action="#" method="POST" enctype="multipart/form-data">
                    @method('patch')
                    @csrf
                    <div class="modal fade text-left w-100" id="checkApprove{{ $item->absen_code }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel16" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-l" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title" id="myModalLabel16">Lihat Alasan - {{ $item->user->name }}</h4>
                                    <div class="">

                                        <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal" aria-label="Close">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <span><b>Keterangan</b> <br>{!! $item->absen_desc !!}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            @endforeach
        </div>
    </section>
@endsection
