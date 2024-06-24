@extends('base.base-dash-index')
@section('title')
    Data Postingan - Siakad By Internal Developer
@endsection
@section('menu')
    Data Postingan
@endsection
@section('submenu')
    Daftar Postingan
@endsection
@section('submenu0')
    Tambah Postingan
@endsection
@section('urlmenu')
    #
@endsection
@section('subdesc')
    Halaman untuk mengelola Postingan
@endsection
@section('content')
<section class="section row">

    <div class="col-lg-12 col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="card-title">@yield('submenu')</h5>
                <div class="">
                    <a href="{{ route('web-admin.news.post-create') }}" class="btn btn-primary"><i class="fa-solid fa-plus"></i></a>
                </div>

            </div>
            <div class="card-body">
                <table class="table table-striped" id="table1">
                    <thead>
                        <th class="text-center">#</th>
                        <th class="text-center">Kategori Post</th>
                        <th class="text-center">Judul Post</th>
                        <th class="text-center">Slug Post</th>
                        <th class="text-center">Created At</th>
                        <th class="text-center">Button</th>
                    </thead>
                    <tbody>
                        @foreach ($posts as $key => $item)
                            <tr>
                                <td data-label="Number">{{ ++$key }}</td>
                                <td data-label="Judul Post">{{ $item->category->name }}</td>
                                <td data-label="Kategori">{{ $item->name }}</td>
                                <td data-label="Slug Post">{{ $item->slug }}</td>
                                <td data-label="Slug Post">{{ $item->created_at->diffForHumans() }}</td>
                                <td class="d-flex justify-content-center align-items-center">
                                    <a href="{{ route('web-admin.news.post-view', $item->slug) }}" style="margin-right: 10px" class="btn btn-outline-primary"><i class="fas fa-edit"></i></a>
                                    {{-- <a href="{{ route($prefix.'staffmanager-dosen-view', $item->code) }}"  style="margin-right: 10px" class="btn btn-outline-info"><i class="fa-solid fa-eye"></i></a> --}}
                                    <form id="delete-form-{{ $item->slug }}"
                                        action="{{ route($prefix.'news.post-destroy', $item->slug) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <a type="button" class="bs-tooltip btn btn-rounded btn-outline-danger"
                                            data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"
                                            data-original-title="Delete"
                                            data-url="{{ route($prefix.'news.post-destroy', $item->slug) }}"
                                            data-name="{{ $item->name }}"
                                            onclick="deleteData('{{ $item->slug }}')">
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
