@extends('base.base-dash-index')
@section('title')
    Data Pengguna Mahasiswa - Siakad By Internal Developer
@endsection
@section('menu')
    Data Pengguna Mahasiswa
@endsection
@section('submenu')
    Edit {{ $student->mhs_name }}
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
{{-- KONDISIONAL BACK BUTTON --}}
{{ route('web-admin.workers.student-index') }}
@endsection
@section('subdesc')
    Halaman untuk mengedit data pengguna {{ $student->mhs_name }}
@endsection
@section('content')
<form action="{{ route('web-admin.workers.student-update', $student->mhs_code) }}" method="POST" enctype="multipart/form-data">
    @method('PATCH')
    @csrf
    <section class="section row">

        <div class="col-lg-4 col-12">

            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h4 class="card-title">Ubah Foto Profile</h4>
                    <div class="">
                        <a href="@yield('urlmenu')" class="btn btn-outline-warning"><i class="fa-solid fa-backward"></i></a>
                        <button type="submit" class="btn btn-outline-primary"><i class="fa-solid fa-paper-plane"></i></button>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('mahasiswa.home-profile-save-image') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')

                        <img src="{{ asset('storage/images/' . $student->mhs_image) }}" class="card-img-top" alt="">
                        <hr>
                        <div class="form-group">
                            <label for="mhs_image">Upload Foto Profile</label>
                            <div class="d-flex justify-content-between align-items-center">

                                <input type="file" class="form-control" name="mhs_image" id="mhs_image">
                                @error('mhs_image')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                                <button type="submit" class="btn btn-outline-primary" style="margin-left: 10px"><i class="fa-solid fa-paper-plane"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-8 col-12">
            <div class="card">
                <div class="card-body">

                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" id="home-tab" data-bs-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true"> Personal</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="contact-tab" data-bs-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false"> Kontak</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="profile-tab" data-bs-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false"> Keamanan</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

                            <hr>
                            <div class="row">
                                <div class="form-group col-lg-6 col-12">
                                    <label for="mhs_name">Nama Lengkap</label>
                                    <input type="text" name="mhs_name" id="mhs_name" class="form-control" placeholder="Nama lengkap..." readonly value="{{ $student->mhs_name }}">
                                    @error('mhs_name')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group col-lg-6 col-12">
                                    <label for="mhs_nim">Nomor NIM</label>
                                    <input type="text" name="mhs_nim" id="mhs_nim" class="form-control" placeholder="Nomor NIM..." readonly value="{{ $student->mhs_nim }}" >
                                    @error('mhs_nim')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group col-lg-6 col-12">
                                    <label for="years_id">Tahun Masuk</label>
                                    <input type="text" name="years_id" id="years_id" class="form-control" placeholder="Nama Program Studi..." readonly value="Angkatan {{ $student->kelas->taka->year_start }}">
                                    @error('years_id')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group col-lg-6 col-12">
                                    <label for="faku_id">Fakultas</label>
                                    <input type="text" name="faku_id" id="faku_id" class="form-control" placeholder="Nama Program Studi..." readonly value="{{ $student->kelas->pstudi->fakultas->name }}">
                                    @error('faku_id')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group col-lg-6 col-12">
                                    <label for="pstudi_id">Program Studi</label>
                                    <input type="text" name="pstudi_id" id="pstudi_id" class="form-control" placeholder="Nama Program Studi..." readonly value="{{ $student->kelas->pstudi->name . ' - ' . $student->kelas->taka->semester }}">
                                    @error('pstudi_id')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group col-lg-6 col-12">
                                    <label for="class_id">Kelas</label>
                                    <select name="class_id" id="class_id" class="form-select" >
                                        <option value="" selected>Pilih Jenis Kelamin</option>
                                        @foreach ($kelas as $item)
                                        <option value="{{ $item->id }}" {{ $item->id === $student->class_id ? 'selected' : ''}}>{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('class_id')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group col-lg-6 col-12">
                                    <label for="mhs_gend">Jenis Kelamin</label>
                                    <select name="mhs_gend" id="mhs_gend" class="form-select" >
                                        <option value="" selected>Pilih Jenis Kelamin</option>
                                        <option value="L" {{ $student->mhs_gend === 'L' ? 'selected' : ''}}>Laki Laki</option>
                                        <option value="P" {{ $student->mhs_gend === 'P' ? 'selected' : ''}}>Perempuan</option>
                                    </select>
                                    @error('mhs_gend')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group col-lg-6 col-12">
                                    <label for="mhs_birthplace">Tempat Lahir</label>
                                    <input type="text" name="mhs_birthplace" id="mhs_birthplace" class="form-control" placeholder="Tempat Lahir..." value="{{ $student->mhs_birthplace }}">
                                    @error('mhs_birthplace')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group col-lg-6 col-12">
                                    <label for="mhs_birthdate">Tanggal Lahir</label>
                                    <input type="date" name="mhs_birthdate" id="mhs_birthdate" class="form-control" placeholder="Tanggal Lahir..." value="{{ $student->mhs_birthdate }}">
                                    @error('mhs_birthdate')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group col-lg-6 col-12">
                                    <label for="mhs_reli">Agama</label>
                                    <select name="mhs_reli" id="mhs_reli" class="form-select" >
                                        <option value="" selected>Pilih Agama</option>
                                        <option value="1" {{ $student->raw_mhs_reli === '1' ? 'selected' : ''}}>Agama Islam</option>
                                        <option value="2" {{ $student->raw_mhs_reli === '2' ? 'selected' : ''}}>Agama Kristen Protestan</option>
                                        <option value="3" {{ $student->raw_mhs_reli === '3' ? 'selected' : ''}}>Agama Kriten Katholik</option>
                                        <option value="4" {{ $student->raw_mhs_reli === '4' ? 'selected' : ''}}>Agama Hindu</option>
                                        <option value="5" {{ $student->raw_mhs_reli === '5' ? 'selected' : ''}}>Agama Buddha</option>
                                        <option value="6" {{ $student->raw_mhs_reli === '6' ? 'selected' : ''}}>Agama Konghuchu</option>
                                    </select>
                                    @error('mhs_reli')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>


                        </div>
                        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                            <hr>

                            <div class="row">
                                <div class="form-group col-lg-6 col-12">
                                    <label for="mhs_phone">Nomor HandPhone</label>
                                    <input type="text" class="form-control" name="mhs_phone" id="mhs_phone" value="{{ $student->mhs_phone }}">
                                    @error('mhs_phone')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group col-lg-6 col-12">
                                    <label for="mhs_mail">Alamat Email</label>
                                    <input type="text" class="form-control" name="mhs_mail" id="mhs_mail" readonly value="{{ $student->mhs_mail }}">
                                    @error('mhs_mail')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group col-lg-6 col-12">
                                    <label for="mhs_parent_father">Nama Ayah</label>
                                    <input type="text" class="form-control" name="mhs_parent_father" id="mhs_parent_father" placeholder="nama ayah..." value="{{ $student->mhs_parent_father }}">
                                    @error('mhs_parent_father')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group col-lg-6 col-12">
                                    <label for="mhs_parent_father_phone">Nomor Telepon Ayah</label>
                                    <input type="text" class="form-control" name="mhs_parent_father_phone" id="mhs_parent_father_phone" placeholder="nomor telepon ayah..." value="{{ $student->mhs_parent_father_phone }}">
                                    @error('mhs_parent_father_phone')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group col-lg-6 col-12">
                                    <label for="mhs_parent_mother">Nama Ibu</label>
                                    <input type="text" class="form-control" name="mhs_parent_mother" id="mhs_parent_mother" placeholder="nama ibu..." value="{{ $student->mhs_parent_mother }}">
                                    @error('mhs_parent_mother')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group col-lg-6 col-12">
                                    <label for="mhs_parent_mother_phone">Nomor Telepon Ibu</label>
                                    <input type="text" class="form-control" name="mhs_parent_mother_phone" id="mhs_parent_mother_phone" placeholder="nomor telepon ibu..." value="{{ $student->mhs_parent_mother_phone }}">
                                    @error('mhs_parent_mother_phone')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group col-lg-6 col-12">
                                    <label for="mhs_wali_name">Nama Wali Mahasiswa</label>
                                    <input type="text" class="form-control" name="mhs_wali_name" id="mhs_wali_name" placeholder="nama wali..." value="{{ $student->mhs_wali_name }}">
                                    @error('mhs_wali_name')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group col-lg-6 col-12">
                                    <label for="mhs_wali_phone">Nomor Telepon Wali</label>
                                    <input type="text" class="form-control" name="mhs_wali_phone" id="mhs_wali_phone" placeholder="nomor telepon wali..." value="{{ $student->mhs_wali_phone }}">
                                    @error('mhs_wali_phone')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group col-lg-12 col-12">
                                    <label for="mhs_addr_domisili">Alamat Lengkap Domisili / Tempat Tinggal</label>
                                    <textarea cols="15" rows="4" class="form-control" name="mhs_addr_domisili" id="mhs_addr_domisili" placeholder="alamat lengkap domisili / tempat tinggal..." value="{{ $student->mhs_addr_domisili }}">{{ $student->mhs_addr_domisili == null ? '' : $student->mhs_addr_domisili }}</textarea>
                                    @error('mhs_addr_domisili')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group col-lg-6 col-12">
                                    <label for="mhs_addr_kelurahan">Kelurahan</label>
                                    <input type="text" class="form-control" name="mhs_addr_kelurahan" id="mhs_addr_kelurahan" placeholder="nama kelurahan..." value="{{ $student->mhs_addr_kelurahan }}">
                                    @error('mhs_addr_kelurahan')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group col-lg-6 col-12">
                                    <label for="mhs_addr_kecamatan">Kecamatan</label>
                                    <input type="text" class="form-control" name="mhs_addr_kecamatan" id="mhs_addr_kecamatan" placeholder="nama kecamatan..." value="{{ $student->mhs_addr_kecamatan }}">
                                    @error('mhs_addr_kecamatan')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group col-lg-6 col-12">
                                    <label for="mhs_addr_kota">Kota</label>
                                    <input type="text" class="form-control" name="mhs_addr_kota" id="mhs_addr_kota" placeholder="nama kota..." value="{{ $student->mhs_addr_kota }}">
                                    @error('mhs_addr_kota')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group col-lg-6 col-12">
                                    <label for="mhs_addr_provinsi">Provinsi</label>
                                    <input type="text" class="form-control" name="mhs_addr_provinsi" id="mhs_addr_provinsi" placeholder="nama provinsi..." value="{{ $student->mhs_addr_provinsi }}">
                                    @error('mhs_addr_provinsi')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                            </div>
                        </div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <hr>

                            <div class="row">
                                <div class="form-group col-lg-6 col-12">
                                    <label for="SecurityKey">Security Key</label>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <input type="password" class="form-control" name="mhs_code" id="SecurityKey" value="{{ $student->mhs_code }}" disabled>
                                        <span class="btn btn-sm btn-outline-danger" style="margin-left: 5px" id="showPasswordButton"><i class="fa-solid fa-eye"></i></span>
                                        @error('mhs_code')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                </div>
                                <div class="form-group col-lg-6 col-12">
                                    <label for="mhs_stat">Pilih Status Mahasiswa</label>
                                    <select name="mhs_stat" id="mhs_stat" class="form-select">
                                        <option value="" selected>Pilih Status Mahasiswa</option>
                                        <option value="0" {{ $student->raw_mhs_stat === 0 ? 'selected' : '' }}>Calon Mahasiswa</option>
                                        <option value="1" {{ $student->raw_mhs_stat === 1 ? 'selected' : '' }}>Mahasiswa Aktif</option>
                                        <option value="2" {{ $student->raw_mhs_stat === 2 ? 'selected' : '' }}>Mahasiswa Non-Aktif</option>
                                        <option value="3" {{ $student->raw_mhs_stat === 3 ? 'selected' : '' }}>Mahasiswa Alumni</option>


                                    </select>
                                    @error('old_password')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group col-lg-6 col-12">
                                    <label for="newPassword">Password Baru</label>
                                    <div class="d-flex justify-content-between align-items-center">

                                        <input type="password" class="form-control" name="new_password" id="newPassword">
                                        <span class="btn btn-sm btn-outline-danger" style="margin-left: 5px" id="showPasswordButton"><i class="fa-solid fa-eye"></i></span>
                                    </div>
                                    @error('new_password')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group col-lg-6 col-12">
                                    <label for="newPasswordKonfirm">Konfirmasi Password Baru</label>
                                    <div class="d-flex justify-content-between align-items-center">

                                        <input type="password" class="form-control" name="new_password_confirmed" id="newPasswordKonfirm">
                                        <span class="btn btn-sm btn-outline-danger" style="margin-left: 5px" id="showPasswordButton"><i class="fa-solid fa-eye"></i></span>
                                    </div>
                                    @error('new_password_confirmed')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </section>
    
</form>
@endsection
@section('custom-js')
    <script>
        document.getElementById("mhs_image").onchange = function(event) {
            var reader = new FileReader();
            reader.onload = function() {
                var output = document.querySelector('.card-img-top');
                output.src = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);
        };
    </script>
    <script>
        const showPasswordButtons = document.querySelectorAll('.btn-outline-danger');
        showPasswordButtons.forEach((btn, index) => {
            const passwordInput = btn.previousElementSibling;
            btn.addEventListener('click', () => {
                if (passwordInput.type === 'password') {
                    passwordInput.type = 'text'; // Show password
                    btn.innerHTML = '<i class="fa-solid fa-eye-slash"></i>'; // Change icon to eye-slash
                } else {
                    passwordInput.type = 'password'; // Hide password
                    btn.innerHTML = '<i class="fa-solid fa-eye"></i>'; // Change icon back to eye
                }
            });
        });
    </script>
@endsection
