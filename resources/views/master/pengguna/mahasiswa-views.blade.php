@extends('core-themes.core-backpage')

@section('custom-css')
    <style>
        .profile-header {
            background: linear-gradient(135deg, #4b6cb7 0%, #182848 100%);
            color: white;
            padding: 2rem;
            border-radius: 15px;
            margin-bottom: 2rem;
        }

        .profile-image {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            border: 5px solid white;
            object-fit: cover;
        }

        .nav-tabs .nav-link {
            color: #4b6cb7;
        }

        .nav-tabs .nav-link.active {
            color: #182848;
            font-weight: 600;
        }

        .form-label {
            font-weight: 500;
            color: #4b6cb7;
        }

        .required-field::after {
            content: " *";
            color: red;
        }

        .avatars {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
        }
 
    </style>
@endsection

@section('content')
    <div class="card">
        <div class="row g-0">
            <div class="col-12 col-md-3 border-end">
                <div class="card-body">
                    <h4 class="subheader">Profile Settings</h4>
                    <div class="list-group list-group-transparent" id="profileTabs" role="tablist">
                        <a class="list-group-item list-group-item-action d-flex align-items-center active" id="personal-tab" data-bs-toggle="tab" href="#personal" role="tab">
                            <i class="fas fa-user me-2"></i> Personal Info
                        </a>
                        <a class="list-group-item list-group-item-action d-flex align-items-center" id="contact-tab" data-bs-toggle="tab" href="#contact" role="tab">
                            <i class="fas fa-address-book me-2"></i> Contact Info
                        </a>
                        <a class="list-group-item list-group-item-action d-flex align-items-center" id="address-tab" data-bs-toggle="tab" href="#address" role="tab">
                            <i class="fas fa-map-marker-alt me-2"></i> Address
                        </a>
                        <a class="list-group-item list-group-item-action d-flex align-items-center" id="education-tab" data-bs-toggle="tab" href="#education" role="tab">
                            <i class="fas fa-graduation-cap me-2"></i> Education
                        </a>
                        <a class="list-group-item list-group-item-action d-flex align-items-center" id="identity-tab" data-bs-toggle="tab" href="#identity" role="tab">
                            <i class="fas fa-id-card me-2"></i> Identity
                        </a>
                        <a class="list-group-item list-group-item-action d-flex align-items-center" id="parents-tab" data-bs-toggle="tab" href="#parents" role="tab">
                            <i class="fas fa-users me-2"></i> Parents & Guardian
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-9 d-flex flex-column">
                <div class="card-body">
                    <h2 class="mb-4">Profile Settings</h2>

                    <form action="{{ route($spref . 'pengguna.mahasiswa-profile', $mahasiswa->code) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')

                        <div class="tab-content" id="profileTabsContent">
                            <!-- Personal Information Tab -->
                            <div class="tab-pane fade show active" id="personal" role="tabpanel">
                                <h3 class="card-title">Profile Details</h3>
                                <div class="row align-items-center mb-4">
                                    <div class="col-auto">
                                        <img src="{{ $mahasiswa == null ? '' : $mahasiswa->photo }}" alt="Profile Photo" class="avatars" id="preview-image">
                                    </div>
                                    <div class="col-auto">
                                        <input type="file" class="form-control" name="photo" id="photo-input" accept="image/*">
                                    </div>
                                </div>

                                <div class="row g-3">
                                    <div class="col-md-4">
                                        <label class="form-label required-field">Name</label>
                                        <input type="text" class="form-control" name="name" value="{{ $mahasiswa->name }}" required>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">Title Front</label>
                                        <input type="text" class="form-control" name="title_front" value="{{ $mahasiswa->title_front }}">
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">Title Behind</label>
                                        <input type="text" class="form-control" name="title_behind" value="{{ $mahasiswa->title_behind }}">
                                    </div>
                                </div>

                                <div class="row mt-2">
                                    <div class="col-md-4">
                                        <label class="form-label">Birth Place</label>
                                        <input type="text" class="form-control" name="bio_placebirth" value="{{ $mahasiswa->bio_placebirth }}">
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">Birth Date</label>
                                        <input type="date" class="form-control" name="bio_datebirth" value="{{ $mahasiswa->bio_datebirth }}">
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">Gender</label>
                                        <select class="form-select" name="bio_gender">
                                            <option value="Laki-laki" {{ $mahasiswa->bio_gender == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                            <option value="Perempuan" {{ $mahasiswa->bio_gender == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row mt-2">
                                    <div class="col-md-3">
                                        <label class="form-label">Religion</label>
                                        <input type="text" class="form-control" name="bio_religion" value="{{ $mahasiswa->bio_religion }}">
                                    </div>
                                    <div class="col-md-3">
                                        <label class="form-label">Nationality</label>
                                        <input type="text" class="form-control" name="bio_nationality" value="{{ $mahasiswa->bio_nationality }}">
                                    </div>
                                    <div class="col-md-3">
                                        <label class="form-label">Blood Type</label>
                                        <input type="text" class="form-control" name="bio_blood" value="{{ $mahasiswa->bio_blood }}">
                                    </div>
                                    <div class="col-md-3">
                                        <label class="form-label">Height</label>
                                        <input type="text" class="form-control" name="bio_height" value="{{ $mahasiswa->bio_height }}">
                                    </div>
                                </div>

                                <div class="row mt-2">
                                    <div class="col-md-3">
                                        <label class="form-label">Weight</label>
                                        <input type="text" class="form-control" name="bio_weight" value="{{ $mahasiswa->bio_weight }}">
                                    </div>
                                </div>
                            </div>

                            <!-- Contact Information Tab -->
                            <div class="tab-pane fade" id="contact" role="tabpanel">
                                <h3 class="card-title">Contact Information</h3>
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label class="form-label required-field">Email</label>
                                        <input type="email" class="form-control" name="email" value="{{ $mahasiswa->email }}" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label required-field">Phone</label>
                                        <input type="text" class="form-control" name="phone" value="{{ $mahasiswa->phone }}" required>
                                    </div>
                                </div>

                                <h4 class="card-title mt-4">Social Media</h4>
                                <div class="row g-3">
                                    <div class="col-md-4">
                                        <label class="form-label">Instagram</label>
                                        <input type="text" class="form-control" name="link_ig" value="{{ $mahasiswa->link_ig }}">
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">Facebook</label>
                                        <input type="text" class="form-control" name="link_fb" value="{{ $mahasiswa->link_fb }}">
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">LinkedIn</label>
                                        <input type="text" class="form-control" name="link_in" value="{{ $mahasiswa->link_in }}">
                                    </div>
                                </div>
                            </div>

                            <!-- Address Information Tab -->
                            <div class="tab-pane fade" id="address" role="tabpanel">
                                <h3 class="card-title">Address Information</h3>

                                <div class="row">
                                    <div class="col-md-6">
                                        <h4 class="card-title">Alamat KTP</h4>
                                        <div class="mb-3">
                                            <label class="form-label">Alamat</label>
                                            <textarea class="form-control" name="ktp_addres" rows="3">{{ $mahasiswa->ktp_addres }}</textarea>
                                        </div>
                                        <div class="row g-3">
                                            <div class="col-md-6">
                                                <label class="form-label">RT</label>
                                                <input type="text" class="form-control" name="ktp_rt" value="{{ $mahasiswa->ktp_rt }}">
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label">RW</label>
                                                <input type="text" class="form-control" name="ktp_rw" value="{{ $mahasiswa->ktp_rw }}">
                                            </div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-md-6">
                                                <label class="form-label">Kelurahan</label>
                                                <input type="text" class="form-control" name="ktp_village" value="{{ $mahasiswa->ktp_village }}">
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label">Kecamatan</label>
                                                <input type="text" class="form-control" name="ktp_subdistrict" value="{{ $mahasiswa->ktp_subdistrict }}">
                                            </div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-md-4">
                                                <label class="form-label">Kota</label>
                                                <input type="text" class="form-control" name="ktp_city" value="{{ $mahasiswa->ktp_city }}">
                                            </div>
                                            <div class="col-md-4">
                                                <label class="form-label">Provinsi</label>
                                                <input type="text" class="form-control" name="ktp_province" value="{{ $mahasiswa->ktp_province }}">
                                            </div>
                                            <div class="col-md-4">
                                                <label class="form-label">Kode Pos</label>
                                                <input type="text" class="form-control" name="ktp_poscode" value="{{ $mahasiswa->ktp_poscode }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <h4 class="card-title">Alamat Domisili</h4>
                                        <div class="mb-3">
                                            <label class="form-label">Sama dengan KTP</label>
                                            <select class="form-select" name="domicile_same" id="domicile_same">
                                                <option value="Yes" {{ $mahasiswa->domicile_same == 'Yes' ? 'selected' : '' }}>Ya</option>
                                                <option value="No" {{ $mahasiswa->domicile_same == 'No' ? 'selected' : '' }}>Tidak</option>
                                            </select>
                                        </div>
                                        <div id="domicile_fields">
                                            <div class="mb-3">
                                                <label class="form-label">Alamat</label>
                                                <textarea class="form-control" name="domicile_addres" rows="3">{{ $mahasiswa->domicile_addres }}</textarea>
                                            </div>
                                            <div class="row g-3">
                                                <div class="col-md-6">
                                                    <label class="form-label">RT</label>
                                                    <input type="text" class="form-control" name="domicile_rt" value="{{ $mahasiswa->domicile_rt }}">
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="form-label">RW</label>
                                                    <input type="text" class="form-control" name="domicile_rw" value="{{ $mahasiswa->domicile_rw }}">
                                                </div>
                                            </div>
                                            <div class="row mt-2">
                                                <div class="col-md-6">
                                                    <label class="form-label">Kelurahan</label>
                                                    <input type="text" class="form-control" name="domicile_village" value="{{ $mahasiswa->domicile_village }}">
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="form-label">Kecamatan</label>
                                                    <input type="text" class="form-control" name="domicile_subdistrict" value="{{ $mahasiswa->domicile_subdistrict }}">
                                                </div>
                                            </div>
                                            <div class="row mt-2">
                                                <div class="col-md-4">
                                                    <label class="form-label">Kota</label>
                                                    <input type="text" class="form-control" name="domicile_city" value="{{ $mahasiswa->domicile_city }}">
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="form-label">Provinsi</label>
                                                    <input type="text" class="form-control" name="domicile_province" value="{{ $mahasiswa->domicile_province }}">
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="form-label">Kode Pos</label>
                                                    <input type="text" class="form-control" name="domicile_poscode" value="{{ $mahasiswa->domicile_poscode }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Education Information Tab -->
                            <div class="tab-pane fade" id="education" role="tabpanel">
                                <h3 class="card-title">Education History</h3>
                                <div class="row">
                                    <div class="col-md-4">
                                        <h4 class="card-title">Pendidikan 1</h4>
                                        <div class="mb-3">
                                            <label class="form-label">Jenis</label>
                                            <select class="form-select" name="edu1_type">
                                                <option value="SMA/SMK" {{ $mahasiswa->edu1_type == 'SMA/SMK' ? 'selected' : '' }}>SMA/SMK</option>
                                                <option value="Diploma" {{ $mahasiswa->edu1_type == 'Diploma' ? 'selected' : '' }}>Diploma</option>
                                                <option value="Sarjana" {{ $mahasiswa->edu1_type == 'Sarjana' ? 'selected' : '' }}>Sarjana</option>
                                                <option value="Magister" {{ $mahasiswa->edu1_type == 'Magister' ? 'selected' : '' }}>Magister</option>
                                                <option value="Doktor" {{ $mahasiswa->edu1_type == 'Doktor' ? 'selected' : '' }}>Doktor</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Institusi</label>
                                            <input type="text" class="form-control" name="edu1_place" value="{{ $mahasiswa->edu1_place }}">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Jurusan</label>
                                            <input type="text" class="form-control" name="edu1_major" value="{{ $mahasiswa->edu1_major }}">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">IPK</label>
                                            <input type="text" class="form-control" name="edu1_average_score" value="{{ $mahasiswa->edu1_average_score }}">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Tahun Lulus</label>
                                            <input type="text" class="form-control" name="edu1_graduate_year" value="{{ $mahasiswa->edu1_graduate_year }}">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <h4 class="card-title">Pendidikan 2</h4>
                                        <div class="mb-3">
                                            <label class="form-label">Jenis</label>
                                            <select class="form-select" name="edu2_type">
                                                <option value="SMA/SMK" {{ $mahasiswa->edu2_type == 'SMA/SMK' ? 'selected' : '' }}>SMA/SMK</option>
                                                <option value="Diploma" {{ $mahasiswa->edu2_type == 'Diploma' ? 'selected' : '' }}>Diploma</option>
                                                <option value="Sarjana" {{ $mahasiswa->edu2_type == 'Sarjana' ? 'selected' : '' }}>Sarjana</option>
                                                <option value="Magister" {{ $mahasiswa->edu2_type == 'Magister' ? 'selected' : '' }}>Magister</option>
                                                <option value="Doktor" {{ $mahasiswa->edu2_type == 'Doktor' ? 'selected' : '' }}>Doktor</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Institusi</label>
                                            <input type="text" class="form-control" name="edu2_place" value="{{ $mahasiswa->edu2_place }}">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Jurusan</label>
                                            <input type="text" class="form-control" name="edu2_major" value="{{ $mahasiswa->edu2_major }}">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">IPK</label>
                                            <input type="text" class="form-control" name="edu2_average_score" value="{{ $mahasiswa->edu2_average_score }}">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Tahun Lulus</label>
                                            <input type="text" class="form-control" name="edu2_graduate_year" value="{{ $mahasiswa->edu2_graduate_year }}">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <h4 class="card-title">Pendidikan 3</h4>
                                        <div class="mb-3">
                                            <label class="form-label">Jenis</label>
                                            <select class="form-select" name="edu3_type">
                                                <option value="SMA/SMK" {{ $mahasiswa->edu3_type == 'SMA/SMK' ? 'selected' : '' }}>SMA/SMK</option>
                                                <option value="Diploma" {{ $mahasiswa->edu3_type == 'Diploma' ? 'selected' : '' }}>Diploma</option>
                                                <option value="Sarjana" {{ $mahasiswa->edu3_type == 'Sarjana' ? 'selected' : '' }}>Sarjana</option>
                                                <option value="Magister" {{ $mahasiswa->edu3_type == 'Magister' ? 'selected' : '' }}>Magister</option>
                                                <option value="Doktor" {{ $mahasiswa->edu3_type == 'Doktor' ? 'selected' : '' }}>Doktor</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Institusi</label>
                                            <input type="text" class="form-control" name="edu3_place" value="{{ $mahasiswa->edu3_place }}">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Jurusan</label>
                                            <input type="text" class="form-control" name="edu3_major" value="{{ $mahasiswa->edu3_major }}">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">IPK</label>
                                            <input type="text" class="form-control" name="edu3_average_score" value="{{ $mahasiswa->edu3_average_score }}">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Tahun Lulus</label>
                                            <input type="text" class="form-control" name="edu3_graduate_year" value="{{ $mahasiswa->edu3_graduate_year }}">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Identity Information Tab -->
                            <div class="tab-pane fade" id="identity" role="tabpanel">
                                <h3 class="card-title">Identity Information</h3>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Nomor KK</label>
                                            <input type="text" class="form-control" name="numb_kk" value="{{ $mahasiswa->numb_kk }}">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Nomor KTP</label>
                                            <input type="text" class="form-control" name="numb_ktp" value="{{ $mahasiswa->numb_ktp }}">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Nomor NIM</label>
                                            <input type="text" class="form-control" name="numb_nim" value="{{ $mahasiswa->numb_nim }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Nomor Registrasi</label>
                                            <input type="text" class="form-control" name="numb_reg" value="{{ $mahasiswa->numb_reg }}">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Nomor NISN</label>
                                            <input type="text" class="form-control" name="numb_nisn" value="{{ $mahasiswa->numb_nisn }}">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Parents & Guardian Information Tab -->
                            <div class="tab-pane fade" id="parents" role="tabpanel">
                                <h3 class="card-title">Parents & Guardian Information</h3>
                                
                                <!-- Father Information -->
                                <h4 class="card-title mt-4">Data Ayah</h4>
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label class="form-label">Nama Ayah</label>
                                        <input type="text" class="form-control" name="father_name" value="{{ $mahasiswa->father_name }}">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Tanggal Lahir</label>
                                        <input type="date" class="form-control" name="father_datebirth" value="{{ $mahasiswa->father_datebirth }}">
                                    </div>
                                </div>
                                <div class="row g-3 mt-2">
                                    <div class="col-md-6">
                                        <label class="form-label">Status</label>
                                        <select class="form-select" name="father_lifestat">
                                            <option value="Hidup" {{ $mahasiswa->father_lifestat == 'Hidup' ? 'selected' : '' }}>Hidup</option>
                                            <option value="Meninggal" {{ $mahasiswa->father_lifestat == 'Meninggal' ? 'selected' : '' }}>Meninggal</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Pendidikan</label>
                                        <input type="text" class="form-control" name="father_education" value="{{ $mahasiswa->father_education }}">
                                    </div>
                                </div>
                                <div class="row g-3 mt-2">
                                    <div class="col-md-6">
                                        <label class="form-label">Pekerjaan</label>
                                        <input type="text" class="form-control" name="father_occupation" value="{{ $mahasiswa->father_occupation }}">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Penghasilan</label>
                                        <input type="text" class="form-control" name="father_income" value="{{ $mahasiswa->father_income }}">
                                    </div>
                                </div>
                                <div class="row g-3 mt-2">
                                    <div class="col-md-6">
                                        <label class="form-label">Nomor Telepon</label>
                                        <input type="text" class="form-control" name="father_phone" value="{{ $mahasiswa->father_phone }}">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Alamat</label>
                                        <textarea class="form-control" name="father_address" rows="2">{{ $mahasiswa->father_address }}</textarea>
                                    </div>
                                </div>

                                <!-- Mother Information -->
                                <h4 class="card-title mt-4">Data Ibu</h4>
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label class="form-label">Nama Ibu</label>
                                        <input type="text" class="form-control" name="mother_name" value="{{ $mahasiswa->mother_name }}">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Tanggal Lahir</label>
                                        <input type="date" class="form-control" name="mother_datebirth" value="{{ $mahasiswa->mother_datebirth }}">
                                    </div>
                                </div>
                                <div class="row g-3 mt-2">
                                    <div class="col-md-6">
                                        <label class="form-label">Status</label>
                                        <select class="form-select" name="mother_lifestat">
                                            <option value="Hidup" {{ $mahasiswa->mother_lifestat == 'Hidup' ? 'selected' : '' }}>Hidup</option>
                                            <option value="Meninggal" {{ $mahasiswa->mother_lifestat == 'Meninggal' ? 'selected' : '' }}>Meninggal</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Pendidikan</label>
                                        <input type="text" class="form-control" name="mother_education" value="{{ $mahasiswa->mother_education }}">
                                    </div>
                                </div>
                                <div class="row g-3 mt-2">
                                    <div class="col-md-6">
                                        <label class="form-label">Pekerjaan</label>
                                        <input type="text" class="form-control" name="mother_occupation" value="{{ $mahasiswa->mother_occupation }}">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Penghasilan</label>
                                        <input type="text" class="form-control" name="mother_income" value="{{ $mahasiswa->mother_income }}">
                                    </div>
                                </div>
                                <div class="row g-3 mt-2">
                                    <div class="col-md-6">
                                        <label class="form-label">Nomor Telepon</label>
                                        <input type="text" class="form-control" name="mother_phone" value="{{ $mahasiswa->mother_phone }}">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Alamat</label>
                                        <textarea class="form-control" name="mother_address" rows="2">{{ $mahasiswa->mother_address }}</textarea>
                                    </div>
                                </div>

                                <!-- Guardian Information -->
                                <h4 class="card-title mt-4">Data Wali (Opsional)</h4>
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label class="form-label">Nama Wali</label>
                                        <input type="text" class="form-control" name="guard_name" value="{{ $mahasiswa->guard_name }}">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">NIK</label>
                                        <input type="text" class="form-control" name="guard_nik" value="{{ $mahasiswa->guard_nik }}">
                                    </div>
                                </div>
                                <div class="row g-3 mt-2">
                                    <div class="col-md-6">
                                        <label class="form-label">Tanggal Lahir</label>
                                        <input type="date" class="form-control" name="guard_datebirth" value="{{ $mahasiswa->guard_datebirth }}">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Hubungan</label>
                                        <input type="text" class="form-control" name="guard_relation" value="{{ $mahasiswa->guard_relation }}">
                                    </div>
                                </div>
                                <div class="row g-3 mt-2">
                                    <div class="col-md-6">
                                        <label class="form-label">Nomor Telepon</label>
                                        <input type="text" class="form-control" name="guard_phone" value="{{ $mahasiswa->guard_phone }}">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Alamat</label>
                                        <textarea class="form-control" name="guard_address" rows="2">{{ $mahasiswa->guard_address }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-footer bg-transparent mt-4">
                            <div class="btn-list justify-content-end">
                                <button type="button" class="btn btn-1" onclick="window.history.back()">Cancel</button>
                                <button type="submit" class="btn btn-primary btn-2">Save Changes</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('custom-js')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Image preview functionality
            const photoInput = document.getElementById('photo-input');
            const previewImage = document.getElementById('preview-image');

            photoInput.addEventListener('change', function(e) {
                const file = e.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        previewImage.src = e.target.result;
                    }
                    reader.readAsDataURL(file);
                }
            });

            // Handle domicile address fields visibility
            const domicileSame = document.getElementById('domicile_same');
            const domicileFields = document.getElementById('domicile_fields');

            function toggleDomicileFields() {
                if (domicileSame.value === 'Yes') {
                    domicileFields.style.display = 'none';
                } else {
                    domicileFields.style.display = 'block';
                }
            }

            // Initial check
            toggleDomicileFields();

            // Add event listener
            domicileSame.addEventListener('change', toggleDomicileFields);

            // Handle tab navigation
            const tabLinks = document.querySelectorAll('[data-bs-toggle="tab"]');
            tabLinks.forEach(link => {
                link.addEventListener('click', function(e) {
                    e.preventDefault();
                    const target = document.querySelector(this.getAttribute('href'));
                    
                    // Remove active class from all tabs and links
                    document.querySelectorAll('.tab-pane').forEach(tab => tab.classList.remove('show', 'active'));
                    document.querySelectorAll('.list-group-item').forEach(item => item.classList.remove('active'));
                    
                    // Add active class to current tab and link
                    this.classList.add('active');
                    target.classList.add('show', 'active');
                });
            });
        });
    </script>
@endsection
