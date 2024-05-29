@extends('base.base-dash-index')
@section('title')
    Data Pengguna Admin - Siakad By Internal Developer
@endsection
@section('menu')
    Data Pengguna Admin
@endsection
@section('submenu')
    Tambah Data
@endsection
@section('urlmenu')
{{ route('web-admin.workers.admin-index') }}
@endsection
@section('subdesc')
    Halaman untuk menambah data admin baru
@endsection
@section('content')

<form action="{{ route('web-admin.workers.admin-store') }}" method="POST" enctype="multipart/form-data">
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
                    <img src="{{ asset('storage/images/default/default-profile.jpg') }}" class="card-img-top" alt="">
                    <hr>
                    <div class="form-group">
                        <label for="image">Upload Foto Profile</label>
                        <div class="d-flex justify-content-between align-items-center">

                            <input type="file" class="form-control" name="image" id="image">
                            @error('image')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                            {{-- <button type="submit" class="btn btn-outline-primary" style="margin-left: 10px"><i class="fa-solid fa-paper-plane"></i></button> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-8 col-12">

            <div class="card">
                <div class="card-body">

                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" id="home-tab" data-bs-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Personal</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="contact-tab" data-bs-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Kontak</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="profile-tab" data-bs-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Keamanan</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

                            <hr>
                            <div class="row">
                                <div class="form-group col-lg-6 col-12">
                                    <label for="name">Nama Lengkap</label>
                                    <input type="text" name="name" id="name" class="form-control" placeholder="Nama lengkap...">
                                    @error('name')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group col-lg-6 col-12">
                                    <label for="user">Username</label>
                                    <input type="text" name="user" id="user" class="form-control" placeholder="Username...">
                                    @error('user')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group col-lg-6 col-12">
                                    <label for="gend">Jenis Kelamin</label>
                                    <select name="gend" id="gend" class="form-select" >
                                        <option value="" selected>Pilih Jenis Kelamin</option>
                                        <option value="L" >Laki Laki</option>
                                        <option value="P" >Perempuan</option>
                                    </select>
                                    @error('gend')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group col-lg-6 col-12">
                                    <label for="birth_place">Tempat Lahir</label>
                                    <input type="text" name="birth_place" id="birth_place" class="form-control" placeholder="Tempat Lahir..." >
                                    @error('birth_place')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group col-lg-6 col-12">
                                    <label for="birth_date">Tanggal Lahir</label>
                                    <input type="date" name="birth_date" id="birth_date" class="form-control" placeholder="Tanggal Lahir..." >
                                    @error('birth_date')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group col-lg-6 col-12">
                                    <label for="reli">Agama</label>
                                    <select name="reli" id="reli" class="form-select" >
                                        <option value="" selected>Pilih Agama</option>
                                        <option value="1" >Agama Islam</option>
                                        <option value="2" >Agama Kristen Protestan</option>
                                        <option value="3" >Agama Kriten Katholik</option>
                                        <option value="4" >Agama Hindu</option>
                                        <option value="5" >Agama Buddha</option>
                                        <option value="6" >Agama Konghuchu</option>
                                    </select>
                                    @error('reli')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="d-flex justify-content-end align-items-center">
                                    {{-- <button type="submit" class="btn btn-outline-primary"><i class="fa-solid fa-save"></i> Save</button> --}}
                                </div>
                            </div>


                        </div>
                        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                            <hr>
                            <div class="row">
                                <div class="form-group col-lg-6 col-12">
                                    <label for="phone">Nomor HandPhone</label>
                                    <input type="text" class="form-control" name="phone" id="phone" placeholder="Inputkan nomor telepon..." >
                                    @error('phone')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group col-lg-6 col-12">
                                    <label for="email">Alamat Email</label>
                                    <input type="text" class="form-control" name="email" id="email" placeholder="Inputkan alamat email..." >
                                    @error('email')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group col-lg-6 col-12">
                                    <label for="contact_name_1">Nama Kontak Darurat 1</label>
                                    <input type="text" class="form-control" name="contact_name_1" id="contact_name_1" placeholder="Inputkan nama kontak darurat..." >
                                    @error('contact_name_1')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group col-lg-6 col-12">
                                    <label for="contact_phone_1">Nomor Kontak Darurat 1</label>
                                    <input type="text" class="form-control" name="contact_phone_1" id="contact_phone_1" placeholder="Inputkan nomor telepon kontak darurat...">
                                    @error('contact_phone_1')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group col-lg-6 col-12">
                                    <label for="contact_name_2">Nama Kontak Darurat 2</label>
                                    <input type="text" class="form-control" name="contact_name_2" id="contact_name_2" placeholder="Inputkan nama kontak darurat...">
                                    @error('contact_name_2')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group col-lg-6 col-12">
                                    <label for="contact_phone_2">Nomor Kontak Darurat 2</label>
                                    <input type="text" class="form-control" name="contact_phone_2" id="contact_phone_2" placeholder="Inputkan nomor telepon kontak darurat..." >
                                    @error('contact_phone_2')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <hr>
                            <div class="row">
                                <div style="display: none" class="form-group col-lg-6 col-12">
                                    <label for="status">Status Member</label>
                                    <select name="status" id="status" class="form-select">
                                        {{-- <option selected disabled>Pilih Tipe Member</option> --}}
                                        <optgroup label="Pilih Status Users">
                                            <option value="0">Non-Active</option>
                                            <option value="1">Active</option>
                                        </optgroup>
                                    </select>
                                    @error('status')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group col-lg-6 col-12">
                                    <label for="type">Type Users</label>
                                    <select name="type" id="type" class="form-select">
                                        <option value="" selected>Pilih Role Users</option>
                                        <option value="0">Web Administrator</option>
                                        <option value="1">Koordinator Program</option>
                                        <option value="2">Staff Administrasi</option>
                                        <option value="3">Staff Akademik</option>
                                        <option value="4">Staff Sarana dan Prasarana</option>


                                    </select>
                                    @error('type')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group col-lg-6 col-12">
                                    <label for="status">Status Member</label>
                                    <select name="status" id="status" class="form-select">
                                        <optgroup label="Pilih Status Users">
                                            <option value="0">Non-Active</option>
                                            <option value="1">Active</option>
                                        </optgroup>
                                    </select>
                                    @error('status')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group col-lg-6 col-12">
                                    <label for="newPassword">Password Baru</label>
                                    <div class="d-flex justify-content-between align-items-center">

                                        <input type="password" class="form-control" name="password" id="newPassword" placeholder="Inputkan password...">
                                        <span class="btn btn-sm btn-outline-danger" style="margin-left: 5px" id="showPasswordButton"><i class="fa-solid fa-eye"></i></span>
                                    </div>
                                    @error('password')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group col-lg-6 col-12">
                                    <label for="newPasswordKonfirm">Konfirmasi Password Baru</label>
                                    <div class="d-flex justify-content-between align-items-center">

                                        <input type="password" class="form-control" name="password_confirm" id="newPasswordKonfirm" placeholder="Inputkan konfirmasi password...">
                                        <span class="btn btn-sm btn-outline-danger" style="margin-left: 5px" id="showPasswordButton"><i class="fa-solid fa-eye"></i></span>
                                    </div>
                                    @error('password_confirm')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="d-flex justify-content-end align-items-center">
                                    {{-- <button type="submit" class="btn btn-outline-primary"><i class="fa-solid fa-save"></i> Save</button> --}}
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
        document.getElementById("image").onchange = function(event) {
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
