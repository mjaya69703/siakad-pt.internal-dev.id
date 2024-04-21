@extends('base.base-dash-index')
@section('title')
    SIAKAD PT - Internal Developer
@endsection
@section('menu')
    Profile
@endsection
@section('submenu')
    Edit Profile
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
{{ route($prefix . 'home-index') }}
@endsection
@section('subdesc')
    Halaman untuk mengubah profile pengguna
@endsection
@section('content')
    <section class="section row">
        <div class="col-lg-4 col-12">

            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Ubah Foto Profile</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route($prefix.'home-profile-save-image') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')

                        <img src="{{ asset('storage/images/' . Auth::user()->image) }}" class="card-img-top" alt="">
                        <hr>
                        <div class="form-group">
                            <label for="image">Upload Foto Profile</label>
                            <div class="d-flex justify-content-between align-items-center">

                                <input type="file" class="form-control" name="image" id="image">
                                @error('image')
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
                            <a class="nav-link" id="profile-tab" data-bs-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false"> Security</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

                            <hr>
                            <form action="{{ route($prefix.'home-profile-save-data') }}" method="POST" enctype="multipart/form-data">
                                @method('PATCH')
                                @csrf

                                <div class="row">
                                    <div class="form-group col-lg-6 col-12">
                                        <label for="name">Nama Lengkap</label>
                                        <input type="text" name="name" id="name" class="form-control" placeholder="Nama lengkap..." value="{{ Auth::user()->name }}">
                                        @error('name')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group col-lg-6 col-12">
                                        <label for="user">Username</label>
                                        <input type="text" name="user" id="user" class="form-control" placeholder="Username..." value="{{ Auth::user()->user }}">
                                        @error('user')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group col-lg-6 col-12">
                                        <label for="gend">Jenis Kelamin</label>
                                        <select name="gend" id="gend" class="form-select" >
                                            <option value="" selected>Pilih Jenis Kelamin</option>
                                            <option value="L" {{ Auth::user()->gend === 'L' ? 'selected' : ''}}>Laki Laki</option>
                                            <option value="P" {{ Auth::user()->gend === 'P' ? 'selected' : ''}}>Perempuan</option>
                                        </select>
                                        @error('gend')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group col-lg-6 col-12">
                                        <label for="birth_place">Tempat Lahir</label>
                                        <input type="text" name="birth_place" id="birth_place" class="form-control" placeholder="Tempat Lahir..." value="{{ Auth::user()->birth_place }}">
                                        @error('birth_place')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group col-lg-6 col-12">
                                        <label for="birth_date">Tanggal Lahir</label>
                                        <input type="date" name="birth_date" id="birth_date" class="form-control" placeholder="Tanggal Lahir..." value="{{ Auth::user()->birth_date }}">
                                        @error('birth_date')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="d-flex justify-content-end align-items-center">
                                        <button type="submit" class="btn btn-outline-primary"><i style="margin-right: 5px" class="fa-solid fa-paper-plane"></i> Save</button>
                                    </div>
                                </div>
                            </form>


                        </div>
                        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                            <hr>
                            <form action="{{ route($prefix.'home-profile-save-kontak') }}" method="POST" enctype="multipart/form-data">
                                @method('PATCH')
                                @csrf

                                <div class="row">
                                    <div class="form-group col-lg-6 col-12">
                                        <label for="phone">Nomor HandPhone</label>
                                        <input type="text" class="form-control" name="phone" id="phone" value="{{ Auth::user()->phone }}" disabled>
                                        @error('phone')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group col-lg-6 col-12">
                                        <label for="email">Alamat Email</label>
                                        <input type="text" class="form-control" name="email" id="email" value="{{ Auth::user()->email }}" disabled>
                                        @error('email')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="d-flex justify-content-end align-items-center">
                                        <button type="submit" class="btn btn-outline-primary"><i style="margin-right: 5px"  class="fa-solid fa-paper-plane"></i> Save</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <hr>
                            <form action="{{ route($prefix.'home-profile-save-password') }}" method="POST" enctype="multipart/form-data">
                                @method('PATCH')
                                @csrf

                                <div class="row">
                                    <div class="form-group col-lg-6 col-12">
                                        <label for="SecurityKey">Security Key</label>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <input type="password" class="form-control" name="code" id="SecurityKey" value="{{ Auth::user()->code }}" disabled>
                                            <span class="btn btn-sm btn-outline-danger" style="margin-left: 5px" id="showPasswordButton"><i class="fa-solid fa-eye"></i></span>
                                            @error('code')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>

                                    </div>
                                    <div class="form-group col-lg-6 col-12">
                                        <label for="oldPassword">Password Lama</label>
                                        <div class="d-flex justify-content-between align-items-center">

                                            <input type="password" class="form-control" name="old_password" id="oldPassword" placeholder="Inputkan password lama...">
                                            <span class="btn btn-sm btn-outline-danger" style="margin-left: 5px" id="showPasswordButton"><i class="fa-solid fa-eye"></i></span>
                                        </div>
                                        @error('old_password')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group col-lg-6 col-12">
                                        <label for="newPassword">Password Baru</label>
                                        <div class="d-flex justify-content-between align-items-center">

                                            <input type="password" class="form-control" name="new_password" id="newPassword" placeholder="Inputkan password baru...">
                                            <span class="btn btn-sm btn-outline-danger" style="margin-left: 5px" id="showPasswordButton"><i class="fa-solid fa-eye"></i></span>
                                        </div>
                                        @error('new_password')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group col-lg-6 col-12">
                                        <label for="newPasswordKonfirm">Konfirmasi Password Baru</label>
                                        <div class="d-flex justify-content-between align-items-center">

                                            <input type="password" class="form-control" name="new_password_confirmed" id="newPasswordKonfirm" placeholder="Konfirmasi password baru...">
                                            <span class="btn btn-sm btn-outline-danger" style="margin-left: 5px" id="showPasswordButton"><i class="fa-solid fa-eye"></i></span>
                                        </div>
                                        @error('new_password_confirmed')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="d-flex justify-content-end align-items-center">
                                        <button type="submit" class="btn btn-outline-primary"><i style="margin-right: 5px"  class="fa-solid fa-paper-plane"></i> Save</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
    </section>
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
