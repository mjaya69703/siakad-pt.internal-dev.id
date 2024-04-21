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
    {{ route('web-admin.home-index') }}
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
                    <form action="{{ route('dosen.home-profile-save-image') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')

                        <img src="{{ asset('storage/images/' . Auth::guard('dosen')->user()->dsn_image) }}" class="card-img-top" alt="">
                        <hr>
                        <div class="form-group">
                            <label for="dsn_image">Upload Foto Profile</label>
                            <div class="d-flex justify-content-between align-items-center">

                                <input type="file" class="form-control" name="dsn_image" id="dsn_image">
                                @error('dsn_image')
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
                            <a class="nav-link active" id="home-tab" data-bs-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true"><i class="fa-solid fa-id-card" style="margin-right: 5px"></i> Data Personal</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="contact-tab" data-bs-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false"><i class="fa-solid fa-address-book" style="margin-right: 5px"></i> Data Kontak</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="profile-tab" data-bs-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false"><i class="fa-solid fa-user-lock" style="margin-right: 5px;"></i> Pengaturan Akun</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

                            <hr>
                            <form action="{{ route('dosen.home-profile-save-data') }}" method="POST" enctype="multipart/form-data">
                                @method('PATCH')
                                @csrf

                                <div class="row">
                                    <div class="form-group col-lg-6 col-12">
                                        <label for="dsn_name">Nama Lengkap</label>
                                        <input type="text" name="dsn_name" id="dsn_name" class="form-control" placeholder="Nama lengkap..." value="{{ Auth::guard('dosen')->user()->dsn_name }}">
                                        @error('dsn_name')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group col-lg-6 col-12">
                                        <label for="dsn_nidn">Nomor NIDN</label>
                                        <input type="text" name="dsn_nidn" id="dsn_nidn" class="form-control" placeholder="Nomor NIM..." value="{{ Auth::guard('dosen')->user()->dsn_nidn }}">
                                        @error('dsn_nidn')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group col-lg-6 col-12">
                                        <label for="dsn_gend">Jenis Kelamin</label>
                                        <select name="dsn_gend" id="dsn_gend" class="form-select" >
                                            <option value="" selected>Pilih Jenis Kelamin</option>
                                            <option value="L" {{ Auth::guard('dosen')->user()->dsn_gend === 'L' ? 'selected' : ''}}>Laki Laki</option>
                                            <option value="P" {{ Auth::guard('dosen')->user()->dsn_gend === 'P' ? 'selected' : ''}}>Perempuan</option>
                                        </select>
                                        @error('dsn_gend')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group col-lg-6 col-12">
                                        <label for="dsn_birthplace">Tempat Lahir</label>
                                        <input type="text" name="dsn_birthplace" id="dsn_birthplace" class="form-control" placeholder="Tempat Lahir..." value="{{ Auth::guard('dosen')->user()->dsn_birthplace }}">
                                        @error('dsn_birthplace')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group col-lg-6 col-12">
                                        <label for="dsn_birthdate">Tanggal Lahir</label>
                                        <input type="date" name="dsn_birthdate" id="dsn_birthdate" class="form-control" placeholder="Tanggal Lahir..." value="{{ Auth::guard('dosen')->user()->dsn_birthdate }}">
                                        @error('dsn_birthdate')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="d-flex justify-content-end align-items-center">
                                        <button type="submit" class="btn btn-outline-primary"><i class="fa-solid fa-save"></i> Save</button>
                                    </div>
                                </div>
                            </form>


                        </div>
                        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                            <hr>
                            <form action="{{ route('dosen.home-profile-save-kontak') }}" method="POST" enctype="multipart/form-data">
                                @method('PATCH')
                                @csrf

                                <div class="row">
                                    <div class="form-group col-lg-6 col-12">
                                        <label for="dsn_phone">Nomor HandPhone</label>
                                        <input type="text" class="form-control" name="dsn_phone" id="dsn_phone" value="{{ Auth::guard('dosen')->user()->dsn_phone }}">
                                        @error('dsn_phone')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group col-lg-6 col-12">
                                        <label for="dsn_mail">Alamat Email</label>
                                        <input type="text" class="form-control" name="dsn_mail" id="dsn_mail" value="{{ Auth::guard('dosen')->user()->dsn_mail }}">
                                        @error('dsn_mail')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="d-flex justify-content-end align-items-center">
                                        <button type="submit" class="btn btn-outline-primary"><i class="fa-solid fa-save"></i> Save</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <hr>
                            <form action="{{ route('dosen.home-profile-save-password') }}" method="POST" enctype="multipart/form-data">
                                @method('PATCH')
                                @csrf

                                <div class="row">
                                    <div class="form-group col-lg-6 col-12">
                                        <label for="SecurityKey">Security Key</label>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <input type="password" class="form-control" name="dsn_code" id="SecurityKey" value="{{ Auth::guard('dosen')->user()->dsn_code }}" disabled>
                                            <span class="btn btn-sm btn-outline-danger" style="margin-left: 5px" id="showPasswordButton"><i class="fa-solid fa-eye"></i></span>
                                            @error('dsn_code')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>

                                    </div>
                                    <div class="form-group col-lg-6 col-12">
                                        <label for="oldPassword">Password Lama</label>
                                        <div class="d-flex justify-content-between align-items-center">

                                            <input type="password" class="form-control" name="old_password" id="oldPassword">
                                            <span class="btn btn-sm btn-outline-danger" style="margin-left: 5px" id="showPasswordButton"><i class="fa-solid fa-eye"></i></span>
                                        </div>
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
                                    <div class="d-flex justify-content-end align-items-center">
                                        <button type="submit" class="btn btn-outline-primary"><i class="fa-solid fa-save"></i> Save</button>
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
        document.getElementById("dsn_image").onchange = function(event) {
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
