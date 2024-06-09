@extends('base.base-dash-index')
@section('menu')
    Jadwal Mengajar
@endsection
@section('submenu')
    Verifikasi Absen
@endsection
@section('urlmenu')
    {{ route('dosen.akademik.jadwal-index') }}
@endsection
@section('subdesc')
    Halaman untuk memverifikasi absen
@endsection
@section('title')
    @yield('submenu') - @yield('menu') - Siakad By Internal Developer
@endsection
@section('content')
    <section class="content">
        <div class="row">
            <div class="col-lg-12 col-12">
                <div class="card">
                    <div class="card-header  d-flex align-items-center justify-content-between">
                        <h5 class="card-title">
                            @yield('menu') - @yield('submenu')
                        </h5>
                        <a href="@yield('urlmenu')" class="btn btn-warning"><i class="fa-solid fa-backward"></i></a>

                    </div>
                    <div class="card-body">
                        <table class="table table-striped" id="table1">
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th class="text-center">NIM Mahasiswa</th>
                                    <th class="text-center">Nama Mahasiswa</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Button</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($absen as $key => $item)
                                    <tr>
                                        <td data-label="Number">{{ ++$key }}</td>
                                        <td data-label="NIM Mahasiswa">{{ $item->mahasiswa->mhs_nim }}</td>
                                        <td data-label="Nama Mahasiswa">{{ $item->mahasiswa->mhs_name }}</td>
                                        <td data-label="Status">
                                            {{ $item->absen_type }}
                                        </td>
                                        <td class="d-flex justify-content-center align-items-center">
                                            <a href="#" style="margin-right: 10px" data-bs-toggle="modal" data-bs-target="#updateAbsen{{ $item->code }}" class="btn btn-primary"><i class="fas fa-edit"></i></a>
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
    <div class="me-1 mb-1 d-inline-block">

        <!--Extra Large Modal -->
        @foreach ($absen as $item)
            <form action="{{ route('dosen.akademik.jadwal-absen-update', $item->code) }}" method="POST" enctype="multipart/form-data">
                @method('patch')
                @csrf
                <div class="modal fade text-left w-100" id="updateAbsen{{ $item->code }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel16" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="myModalLabel16">Edit Absensi Perkuliahan - {{ $item->mahasiswa->mhs_name }} </h4>
                                <div class="">

                                    <button type="submit" class="btn btn-outline-primary mt-1">
                                        <i class="fas fa-paper-plane"></i>
                                    </button>
                                    <button type="button" class="btn btn-outline-danger mt-1" data-bs-dismiss="modal" aria-label="Close">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="form-control col-lg-12 col-12">
                                        <img src="{{ asset('storage/images/' . $item->absen_proof) }}" class="card-img-top mb-2" alt="">
                                        <label for="absen_desc">Deskripsi Absen</label>
                                        <textarea name="absen_desc" id="absen_desc" class="form-control" cols="30" rows="10" placeholder="Inputkan deskripsi absen...">{{ $item->absen_desc == null ? null : $item->absen_desc }}</textarea>
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
