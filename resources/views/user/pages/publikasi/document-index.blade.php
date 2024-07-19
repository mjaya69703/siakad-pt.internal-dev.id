@extends('base.base-dash-index')
@section('title')
    Data Dokumen - Siakad By Internal Developer
@endsection
@section('menu')
    Data Dokumen
@endsection
@section('submenu')
    Daftar Dokumen
@endsection
@section('submenu0')
    Tambah Dokumen
@endsection
@section('urlmenu')
    #
@endsection
@section('subdesc')
    Halaman untuk mengelola Dokumen
@endsection
@section('content')
<section class="section row">

    <div class="col-lg-12 col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="card-title">@yield('submenu')</h5>
                <div class="">
                    <a href="{{ route('web-admin.document-create') }}" class="btn btn-primary"><i class="fa-solid fa-plus"></i></a>
                </div>

            </div>
            <div class="card-body">
                <table class="table table-striped" id="table1">
                    <thead>
                        <th class="text-center">#</th>
                        <th class="text-center">Cover Image</th>
                        <th class="text-center">Nama Document</th>
                        <th class="text-center">Path File</th>
                        <th class="text-center">Author</th>
                        <th class="text-center">Created At</th>
                        <th class="text-center">Button</th>
                    </thead>
                    <tbody>
                        @foreach ($docs as $key => $item)
                            <tr>
                                <td data-label="Number">{{ ++$key }}</td>
                                <td data-label="Cover Image"><img src="{{ asset('storage/'. $item->cover) }}" style="max-width: 50px" alt=""></td>
                                <td data-label="Nama Document">{{ $item->name }}</td>
                                <td data-label="Path File">{{ $item->link == null ? $item->path : $item->link }}</td>
                                <td data-label="Author">{{ $item->author->name }}</td>
                                <td data-label="Created at">{{ $item->created_at->diffForHumans() }}</td>
                                <td class="d-flex justify-content-center align-items-center">
                                    {{-- <a href="{{ route('web-admin.document-view', $item->code) }}" style="margin-right: 10px" class="btn btn-outline-primary"><i class="fas fa-edit"></i></a> --}}
                                    <form id="delete-form-{{ $item->code }}"
                                        action="{{ route($prefix.'document-destroy', $item->code) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <a type="button" class="bs-tooltip btn btn-rounded btn-outline-danger"
                                            data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"
                                            data-original-title="Delete"
                                            data-url="{{ route($prefix.'document-destroy', $item->code) }}"
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
@endsection
@section('custom-js')
@endsection
