@extends('base.base-dash-index')
@section('title')
    Data Master Mata Kuliah - Siakad By Internal Developer
@endsection
@section('menu')
    Data Master Mata Kuliah
@endsection
@section('submenu')
    Tambah Data Mata Kuliah
@endsection
@section('submenu0')

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
    Halaman untuk mengelola Data Mata Kuliah
@endsection
@section('content')
<section class="section row">

    <div class="col-lg-12 col-12">
        <form action="{{ route('web-admin.master.jadkul-store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="card-title">@yield('submenu')</h5>
                    <div class="">

                        <a href="{{ route('web-admin.master.jadkul-index') }}" class="btn btn-outline-warning"><i class="fa-solid fa-backward"></i></a>
                        <button type="submit" class="btn btn-outline-primary"><i class="fa-solid fa-paper-plane"></i></button>
                    </div>

                </div>
                <div class="card-body row">
                            <div class="form-group col-lg-3 col-12">
                                <label for="bsks">Beban SKS Hari Ini</label>
                                <input type="number" min="1" max="8" name="bsks" id="bsks" class="form-control" placeholder="Inputkan jumlah beban sks...">
                                @error('bsks')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group col-lg-3 col-12">
                                <label for="date">Tanggal Perkuliahan</label>
                                <input type="date" name="date" id="date" class="form-control" placeholder="Pilih tanggal perkuliahan...">
                                @error('date')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group col-lg-3 col-12">
                                <label for="start">Waktu Mulai Perkuliahan</label>
                                <input type="time" name="start" id="start" class="form-control" placeholder="Pilih jam mulai perkuliahan...">
                                @error('start')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group col-lg-3 col-12">
                                <label for="ended">Waktu Mulai Perkuliahan</label>
                                <input type="time" name="ended" id="ended" class="form-control" placeholder="Pilih jam selesai perkuliahan...">
                                @error('ended')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group col-lg-4 col-12">
                                <label for="days_id">Hari</label>
                                <select name="days_id" id="days_id" class="form-select" name="days_id" id="days_id">
                                    <option value="" selected>Pilih Hari</option>
                                    <option value="0">Hari Minggu</option>
                                    <option value="1">Hari Senin</option>
                                    <option value="2">Hari Selasa</option>
                                    <option value="3">Hari Rabu</option>
                                    <option value="4">Hari Kamis</option>
                                    <option value="5">Hari Jum'at</option>
                                    <option value="6">Hari Sabtu</option>
                                </select>
                                @error('days_id')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group col-lg-4 col-12">
                                <label for="meth_id">Metode Perkuliahan</label>
                                <select name="meth_id" id="meth_id" class="form-select" name="meth_id" id="meth_id">
                                    <option value="" selected>Pilih Metode Perkuliahan</option>
                                    <option value="0">Tatap Muka</option>
                                    <option value="1">Teleconference</option>
                                </select>
                                @error('meth_id')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group col-lg-4 col-12">
                                <label for="pert_id">Pertemuan</label>
                                <select name="pert_id" id="pert_id" class="form-select" name="pert_id" id="pert_id">
                                    <option value="" selected>Pilih Pertemuan</option>
                                    <option value="1">Pertemuan 1</option>
                                    <option value="2">Pertemuan 2</option>
                                    <option value="3">Pertemuan 3</option>
                                    <option value="4">Pertemuan 4</option>
                                    <option value="5">Pertemuan 5</option>
                                    <option value="6">Pertemuan 6</option>
                                    <option value="7">Pertemuan 7</option>
                                    <option value="8">Pertemuan 8</option>
                                    <option value="9">Pertemuan 9</option>
                                    <option value="10">Pertemuan 10</option>
                                    <option value="11">Pertemuan 11</option>
                                    <option value="12">Pertemuan 12</option>
                                    <option value="13">Pertemuan 13</option>
                                    <option value="14">Pertemuan 14</option>
                                    <option value="15">Pertemuan 15</option>
                                    <option value="16">Pertemuan 16</option>
                                </select>
                                @error('pert_id')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group col-lg-6 col-12">
                                <label for="ruang_id">Ruangan</label>
                                <select name="ruang_id" id="ruang_id" class="form-select" name="ruang_id" id="ruang_id">
                                    <option value="" selected>Pilih Ruangan</option>
                                    @foreach ($ruang as $item_r)
                                    <option value="{{ $item_r->id }}" >{{ $item_r->name }}</option>
                                    @endforeach
                                </select>
                                @error('ruang_id')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group col-lg-6 col-12">
                                <label for="makul_id">Mata Kuliah</label>
                                <select name="makul_id" id="makul_id" class="form-select" name="makul_id" id="makul_id">
                                    <option value="" selected>Pilih Mata Kuliah</option>
                                    @foreach ($matkul as $item_m)
                                    @php
                                        $dosen1_name = $item_m->dosen1 ? $item_m->dosen1->dsn_name : null;
                                        $dosen2_name = $item_m->dosen2 ? $item_m->dosen2->dsn_name : null;
                                        $dosen3_name = $item_m->dosen3 ? $item_m->dosen3->dsn_name : null;
                                    @endphp
                                    <option value="{{ $item_m->id }}" data-dosen1="{{ $item_m->dosen_1 }}" data-dosen2="{{ $item_m->dosen_2 }}" data-dosen3="{{ $item_m->dosen_3 }}" data-dosen1-name="{{ $dosen1_name }}" data-dosen2-name="{{ $dosen2_name }}" data-dosen3-name="{{ $dosen3_name }}">{{ $item_m->name }}</option>
                                    @endforeach
                                
                                </select>
                                @error('makul_id')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>




                            <div class="form-group col-lg-4 col-12">
                                <label for="dosen_id">Dosen</label>
                                <select name="dosen_id" id="dosen" class="form-select" name="dosen_id" id="dosen_id">
                                    <option value="" selected>Pilih Dosen</option>
                                </select>
                                @error('dosen_id')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group col-lg-4 col-12">
                                <label for="kelas_id">Kelas</label>
                                <select name="kelas_id" id="kelas_id" class="form-select" name="kelas_id" id="kelas_id">
                                    <option value="" selected>Pilih Kelas</option>
                                    @foreach ($kelas as $item_k)
                                    <option value="{{ $item_k->id }}" >{{ $item_k->name }}</option>
                                    @endforeach
                                </select>
                                @error('kelas_id')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                        </div>
                </div>
            </div>
        </form>
    </div>

</section>
@endsection
@section('custom-js')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
    // Event saat mata kuliah dipilih
    $('#makul_id').on('change', function(){
        var mataKuliahId = $(this).val();
        var selectedOption = $(this).find('option:selected');
        var dosen1Id = selectedOption.attr('data-dosen1');
        var dosen2Id = selectedOption.attr('data-dosen2');
        var dosen3Id = selectedOption.attr('data-dosen3');

        // Mengambil nama dosen berdasarkan ID
        var dosen1Name = selectedOption.attr('data-dosen1-name');
        var dosen2Name = selectedOption.attr('data-dosen2-name');
        var dosen3Name = selectedOption.attr('data-dosen3-name');

        // Menetapkan nama dosen sebagai teks opsi
        $('#dosen').empty(); // Kosongkan opsi dosen sebelum menambahkan yang baru
        $('#dosen').append('<option value="" selected>Pilih Dosen</option>');

        if (dosen1Id && dosen1Name) {
            $('#dosen').append('<option value="' + dosen1Id + '">' + dosen1Name + '</option>');
        }
        if (dosen2Id && dosen2Name) {
            $('#dosen').append('<option value="' + dosen2Id + '">' + dosen2Name + '</option>');
        }
        if (dosen3Id && dosen3Name) {
            $('#dosen').append('<option value="' + dosen3Id + '">' + dosen3Name + '</option>');
        }
    });
});
</script>
@endsection
