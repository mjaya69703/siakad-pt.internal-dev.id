@extends('base.base-dash-index')
@section('title')
    Data Keuangan - Siakad By Internal Developer
@endsection
@section('menu')
    Data Keuangan
@endsection
@section('submenu')
    Lihat
@endsection
@section('urlmenu')
    #
@endsection
@section('subdesc')
    Halaman untuk melihat data keuangan
@endsection
@section('custom-css')
    <style>
        @media (max-width: 768px) {
            .card-body {
                flex-direction: column;
                justify-content: center;
                align-items: center;
            }

            .icon {
                margin: 10px 0;
            }

            .text-putih {
                margin-left: 0px !important;
                /* Mengatur margin-left menjadi 0 */
                margin-top: 10px;
                margin-bottom: 10px;
            }
        }
    </style>
@endsection
@section('content')
    <section class="section row">
        <div class="col-lg-12 col-12">
            <div class="row">
                <div class="col-lg-3 col-6 mb-2">
                    <a href="#">
                        <div class="card btn btn-outline-success">
                            <div class="card-body d-flex justify-content-around align-items-center">
                                <span class="icon" style="margin-right: 25px;"><i class="fa-solid fa-wallet" style="font-size: 42px"></i></span>
                                <span class="text-putih" style="margin-left: 25px; font-size: 16px;">{{ number_format($balSekarang, 0, ',', '.') }}<br> Balance ( IDR )</span>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-6 mb-2">
                    <a href="#">
                        <div class="card btn btn-outline-success">
                            <div class="card-body d-flex justify-content-around align-items-center">
                                <span class="icon" style="margin-right: 25px;"><i class="fa-solid fa-file-invoice-dollar" style="font-size: 42px"></i></span>
                                <span class="text-putih" style="margin-left: 25px; font-size: 16px;">{{ number_format($balPending, 0, ',', '.') }}<br> Pending ( IDR )</span>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-6 mb-2">
                    <a href="#">
                        <div class="card btn btn-outline-success">
                            <div class="card-body d-flex justify-content-around align-items-center">
                                <span class="icon" style="margin-right: 25px;"><i class="fa-solid fa-dollar" style="font-size: 42px"></i></span>
                                <span class="text-putih" style="margin-left: 25px; font-size: 16px;">{{ number_format($balIncome, 0, ',', '.') }}<br> Income ( IDR )</span>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-6 mb-2">
                    <a href="#">
                        <div class="card btn btn-outline-success">
                            <div class="card-body d-flex justify-content-around align-items-center">
                                <span class="icon" style="margin-right: 25px;"><i class="fa-solid fa-dollar" style="font-size: 42px"></i></span>
                                <span class="text-putih" style="margin-left: 25px; font-size: 16px;">{{ number_format($balExpense, 0, ',', '.') }}<br> Expenses ( IDR )</span>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-12">
            <form action="{{ route($prefix . 'finance.keuangan-store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="card-title">Tambah @yield('menu')</h5>
                        <button type="submit" class="btn btn-outline-primary"><i class="fa-solid fa-paper-plane"></i></button>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="type">Type Keuangan</label>
                            <select name="type" id="type" class="form-select">
                                <option value="" selected>Pilih Type Keuangan</option>
                                <option value="0">Balance Pending</option>
                                <option value="1">Balance Income</option>
                                <option value="2">Balance Expenses</option>
                            </select>
                            @error('type')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="value">Nominal Balance</label>
                            <input type="text" class="form-control" name="value" id="value" placeholder="Inputkan nominal balance...">
                            @error('value')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="desc">Deskripsi Balance</label>
                            <textarea name="desc" id="desc" class="form-control" cols="30" rows="10" placeholder="Inputkan deskripsi sumber dana..."></textarea>
                            @error('desc')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                    </div>
                </div>
            </form>
        </div>
        <div class="col-lg-8 col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">@yield('menu')</h5>

                </div>
                <div class="card-body">
                    <table class="table table-striped" id="table1">
                        <thead>
                            <th class="text-center" style="max-width: 8% !important">#</th>
                            <th class="text-center">Author</th>
                            <th class="text-center">Balance Value</th>
                            <th class="text-center">Balance Type</th>
                            <th class="text-center">Balance Desc</th>
                            <th class="text-center">Button</th>
                        </thead>
                        <tbody>
                            @foreach ($balance as $key => $item)
                                <tr class="">
                                    <td data-label="Number">{{ ++$key }}</td>
                                    <td data-label="Author">
                                        @if ($item->author_id != 0)
                                            {{ $item->author->name }}
                                        @else
                                            <span class="btn btn-danger">By Sistem</span>
                                        @endif
                                    </td>
                                    <td data-label="Balance Value">{{ $item->value }}</td>
                                    <td data-label="Balance Type">
                                        @if ($item->raw_type == 0)
                                            <span class="btn btn-warning">{{ $item->type }}</span>
                                        @elseif($item->raw_type == 1)
                                            <span class="btn btn-success">{{ $item->type }}</span>
                                        @elseif($item->raw_type == 2)
                                            <span class="btn btn-danger">{{ $item->type }}</span>
                                        @endif
                                    </td>
                                    <td data-label="Balance Desc">{{ $item->desc }}</td>
                                    <td class="d-flex justify-content-center align-items-center">
                                        <a href="#" style="margin-right: 10px" data-bs-toggle="modal" data-bs-target="#updateFakultas{{ $item->code }}" class="btn btn-outline-primary"><i class="fas fa-edit"></i></a>
                                        {{-- <a href="{{ route( $prefix . 'staffmanager-dosen-view', $item->code) }}"  style="margin-right: 10px" class="btn btn-outline-info"><i class="fa-solid fa-eye"></i></a> --}}
                                        <form id="delete-form-{{ $item->code }}" action="{{ route($prefix . 'finance.keuangan-destroy', $item->code) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <a type="button" class="bs-tooltip btn btn-rounded btn-outline-danger" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete" data-original-title="Delete" data-url="{{ route($prefix . 'finance.keuangan-destroy', $item->code) }}" data-name="{{ $item->name }}" onclick="deleteData('{{ $item->code }}')">
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
        @foreach ($balance as $item)
            <form action="{{ route($prefix . 'finance.keuangan-update', $item->code) }}" method="POST" enctype="multipart/form-data">
                @method('patch')
                @csrf
                <div class="modal fade text-left w-100" id="updateFakultas{{ $item->code }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel16" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-l" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="myModalLabel16">Edit Fakultas - {{ $item->name }}</h4>
                                <div class="">

                                    <button type="submit" class="btn btn-outline-primary">
                                        <i class="fas fa-paper-plane"></i>
                                    </button>
                                    <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal" aria-label="Close">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="type">Type Keuangan</label>
                                    <select name="type" id="type" class="form-select">
                                        <option value="" selected>Pilih Type Keuangan</option>
                                        <option value="0" {{ $item->raw_type == 0 ? 'selected' : '' }}>Balance Pending</option>
                                        <option value="1" {{ $item->raw_type == 1 ? 'selected' : '' }}>Balance Income</option>
                                        <option value="2" {{ $item->raw_type == 2 ? 'selected' : '' }}>Balance Expenses</option>
                                    </select>
                                    @error('type')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="value">Nominal Balance</label>
                                    <input type="text" class="form-control" name="value" id="value" value="{{ $item->value }}" placeholder="Inputkan nominal balance...">
                                    @error('value')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="desc">Deskripsi Balance</label>
                                    <textarea name="desc" id="desc" cols="30" rows="10" class="form-control" value="{{ $item->desc }}" placeholder="Inputkan deskripsi sumber dana...">{{ $item->desc }}</textarea>
                                    @error('desc')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        @endforeach
    </div>
@endsection
