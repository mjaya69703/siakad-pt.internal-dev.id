@extends('core-themes.core-backpage')

@section('custom-css')
<style>
  /* ===== Flat Minimal Style (clean, no gradients) ===== */
  :root{
    --primary:#2563eb; /* indigo-600 */
    --primary-50:#eef2ff;
    --surface:#ffffff;
    --line:#e5e7eb;   /* gray-200 */
    --text:#111827;   /* gray-900 */
    --muted:#6b7280;  /* gray-500 */
    --ring:rgba(37,99,235,.18);
  }

  .page-wrap{display:grid;grid-template-columns:300px 1fr;gap:1.25rem}
  @media (max-width: 991.98px){.page-wrap{grid-template-columns:1fr}}

  /* Sidebar */
  .side{position:sticky;top:1rem;height:calc(100dvh - 2rem);overflow:auto;border:1px solid var(--line);border-radius:14px;background:var(--surface);padding:1rem}
  .side .title{font-size:.95rem;color:var(--muted);font-weight:700;text-transform:uppercase;letter-spacing:.06em}
  .side .list-group-item{border:0;border-radius:10px;margin-bottom:.25rem;font-weight:600;color:var(--text);display:flex;align-items:center;gap:.5rem}
  .side .list-group-item:hover{background:#f9fafb}
  .side .list-group-item.active{background:#eff6ff;color:var(--primary);box-shadow:inset 0 0 0 1px #bfdbfe}

  /* Header */
  .header-card{border:1px solid var(--line);border-radius:14px;background:var(--surface);padding:1rem 1.25rem;display:flex;align-items:center;gap:1rem;margin-bottom:1rem}
  .header-card h2{margin:0;font-weight:800;color:var(--text)}
  .upload-hint{font-size:.85rem;color:var(--muted)}

  /* Avatar-profile */
  .avatar-profile{width:110px;height:110px;border-radius:16px;object-fit:cover;border:1px solid var(--line)}

  /* Panels */
  .panel{background:var(--surface);border:1px solid var(--line);border-radius:14px;padding:1rem}
  .panel + .panel{margin-top:1rem}

  /* Inputs */
  .form-label{font-weight:700;color:var(--text)}
  .required-field::after{content:" *";color:#ef4444}
  .form-control,.form-select{border-radius:10px;border-color:var(--line)}
  .form-control:focus,.form-select:focus{box-shadow:0 0 0 .25rem var(--ring);border-color:var(--primary)}

  /* Mobile pills */
  .nav-pills .nav-link{border-radius:999px;font-weight:600;color:var(--text);border:1px solid var(--line)}
  .nav-pills .nav-link.active{background:var(--primary);color:#fff;border-color:var(--primary)}

  /* Footer buttons */
  .btn-ghost{background:var(--surface);border:1px solid var(--line)}
  .btn-ghost:hover{background:#f9fafb}

  /* Tab fade */
  .tab-pane{animation:fade .12s ease-in}
  @keyframes fade{from{opacity:.7;transform:translateY(1px)}to{opacity:1;transform:none}}
</style>
@endsection

@section('content')
<div class="page-wrap">
  <!-- Sidebar -->
  <aside class="side d-none d-md-block">
    <div class="title mb-3">Profile Settings</div>
    <div class="list-group list-group-transparent" id="profileTabs" role="tablist">
      <a class="list-group-item list-group-item-action active" id="personal-tab" data-bs-toggle="tab" href="#personal" role="tab">
        <i class="fas fa-user"></i> Personal Info
      </a>
      <a class="list-group-item list-group-item-action" id="contact-tab" data-bs-toggle="tab" href="#contact" role="tab">
        <i class="fas fa-address-book"></i> Contact
      </a>
      <a class="list-group-item list-group-item-action" id="address-tab" data-bs-toggle="tab" href="#address" role="tab">
        <i class="fas fa-map-marker-alt"></i> Address
      </a>
      <a class="list-group-item list-group-item-action" id="education-tab" data-bs-toggle="tab" href="#education" role="tab">
        <i class="fas fa-graduation-cap"></i> Education
      </a>
      <a class="list-group-item list-group-item-action" id="identity-tab" data-bs-toggle="tab" href="#identity" role="tab">
        <i class="fas fa-id-card"></i> Identity
      </a>
    </div>
  </aside>

  <!-- Main -->
  <section class="d-flex flex-column">
    <div class="header-card">
      <img src="{{ $user?->photo ?? '' }}" class="avatar-profile" id="preview-image" alt="Avatar-profile">
      <div>
        <h2>Profile Settings</h2>
        <div class="upload-hint">Update your personal information, contacts, and more.</div>
      </div>
    </div>

    <form action="{{ route($spref . 'profile-handle') }}" method="POST" enctype="multipart/form-data" class="panel">
      @csrf
      @method('PATCH')

      <!-- Mobile tabs -->
      <ul class="nav nav-pills mb-3 d-md-none" role="tablist">
        <li class="nav-item"><a class="nav-link active" data-bs-toggle="tab" href="#personal" role="tab"><i class="fas fa-user me-1"></i>Personal</a></li>
        <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#contact" role="tab"><i class="fas fa-address-book me-1"></i>Contact</a></li>
        <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#address" role="tab"><i class="fas fa-map-marker-alt me-1"></i>Address</a></li>
        <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#education" role="tab"><i class="fas fa-graduation-cap me-1"></i>Education</a></li>
        <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#identity" role="tab"><i class="fas fa-id-card me-1"></i>Identity</a></li>
      </ul>

      <div class="tab-content" id="profileTabsContent">
        <!-- Personal -->
        <div class="tab-pane fade show active" id="personal" role="tabpanel">
          <div class="panel">
            <div class="mb-3">
              <label class="form-label">Profile Photo</label>
              <input type="file" class="form-control" name="photo" id="photo-input" accept="image/*" placeholder="Upload profile photo">
              <small class="upload-hint d-block mt-1">PNG, JPG up to 2MB.</small>
            </div>

            <div class="row g-3">
              <div class="col-md-4">
                <label class="form-label required-field">Name</label>
                <input type="text" class="form-control" name="name" value="{{ $user->name }}" placeholder="Enter full name" required>
              </div>
              <div class="col-md-4">
                <label class="form-label">Title Front</label>
                <input type="text" class="form-control" name="title_front" value="{{ $user->title_front }}" placeholder="Title before name (e.g., Dr)">
              </div>
              <div class="col-md-4">
                <label class="form-label">Title Behind</label>
                <input type="text" class="form-control" name="title_behind" value="{{ $user->title_behind }}" placeholder="Title after name (e.g., S.Kom)">
              </div>
            </div>

            <div class="row g-3 mt-1">
              <div class="col-md-4">
                <label class="form-label">Birth Place</label>
                <input type="text" class="form-control" name="bio_placebirth" value="{{ $user->bio_placebirth }}" placeholder="Place of birth">
              </div>
              <div class="col-md-4">
                <label class="form-label">Birth Date</label>
                <input type="date" class="form-control" name="bio_datebirth" value="{{ $user->bio_datebirth }}" placeholder="YYYY-MM-DD">
              </div>
              <div class="col-md-4">
                <label class="form-label">Gender</label>
                <select class="form-select" name="bio_gender">
                  <option value="" disabled>Choose gender</option>
                  <option value="Laki-laki" {{ $user->bio_gender == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                  <option value="Perempuan" {{ $user->bio_gender == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                </select>
              </div>
            </div>

            <div class="row g-3 mt-1">
              <div class="col-md-3">
                <label class="form-label">Religion</label>
                <input type="text" class="form-control" name="bio_religion" value="{{ $user->bio_religion }}" placeholder="Religion">
              </div>
              <div class="col-md-3">
                <label class="form-label">Nationality</label>
                <input type="text" class="form-control" name="bio_nationality" value="{{ $user->bio_nationality }}" placeholder="Nationality">
              </div>
              <div class="col-md-3">
                <label class="form-label">Blood Type</label>
                <input type="text" class="form-control" name="bio_blood" value="{{ $user->bio_blood }}" placeholder="Blood type (A/B/AB/O)">
              </div>
              <div class="col-md-3">
                <label class="form-label">Height (cm)</label>
                <input type="number" class="form-control" name="bio_height" value="{{ $user->bio_height }}" placeholder="e.g., 170">
              </div>
            </div>

            <div class="row g-3 mt-1">
              <div class="col-md-3">
                <label class="form-label">Weight (kg)</label>
                <input type="number" class="form-control" name="bio_weight" value="{{ $user->bio_weight }}" placeholder="e.g., 65">
              </div>
            </div>
          </div>
        </div>

        <!-- Contact -->
        <div class="tab-pane fade" id="contact" role="tabpanel">
          <div class="panel">
            <div class="row g-3">
              <div class="col-md-6">
                <label class="form-label required-field">Email</label>
                <input type="email" class="form-control" name="email" value="{{ $user->email }}" placeholder="Email address" required>
              </div>
              <div class="col-md-6">
                <label class="form-label required-field">Phone</label>
                <input type="text" class="form-control" name="phone" value="{{ $user->phone }}" placeholder="Phone number" required>
              </div>
            </div>

            <h5 class="mt-4 mb-2">Social Media</h5>
            <div class="row g-3">
              <div class="col-md-4">
                <label class="form-label">Instagram</label>
                <input type="url" class="form-control" name="link_ig" value="{{ $user->link_ig }}" placeholder="https://instagram.com/username">
              </div>
              <div class="col-md-4">
                <label class="form-label">Facebook</label>
                <input type="url" class="form-control" name="link_fb" value="{{ $user->link_fb }}" placeholder="https://facebook.com/username">
              </div>
              <div class="col-md-4">
                <label class="form-label">LinkedIn</label>
                <input type="url" class="form-control" name="link_in" value="{{ $user->link_in }}" placeholder="https://linkedin.com/in/username">
              </div>
            </div>
          </div>
        </div>

        <!-- Address -->
        <div class="tab-pane fade" id="address" role="tabpanel">
          <div class="panel">
            <div class="row g-3">
              <div class="col-lg-6">
                <h5 class="mb-2">Alamat KTP</h5>
                <div class="mb-3">
                  <label class="form-label">Alamat</label>
                  <textarea class="form-control" name="ktp_addres" rows="3" placeholder="KTP address">{{ $user->ktp_addres }}</textarea>
                </div>
                <div class="row g-3">
                  <div class="col-md-6">
                    <label class="form-label">RT</label>
                    <input type="text" class="form-control" name="ktp_rt" value="{{ $user->ktp_rt }}" placeholder="RT">
                  </div>
                  <div class="col-md-6">
                    <label class="form-label">RW</label>
                    <input type="text" class="form-control" name="ktp_rw" value="{{ $user->ktp_rw }}" placeholder="RW">
                  </div>
                </div>
                <div class="row g-3 mt-1">
                  <div class="col-md-6">
                    <label class="form-label">Kelurahan</label>
                    <input type="text" class="form-control" name="ktp_village" value="{{ $user->ktp_village }}" placeholder="Village">
                  </div>
                  <div class="col-md-6">
                    <label class="form-label">Kecamatan</label>
                    <input type="text" class="form-control" name="ktp_subdistrict" value="{{ $user->ktp_subdistrict }}" placeholder="Subdistrict">
                  </div>
                </div>
                <div class="row g-3 mt-1">
                  <div class="col-md-4">
                    <label class="form-label">Kota</label>
                    <input type="text" class="form-control" name="ktp_city" value="{{ $user->ktp_city }}" placeholder="City">
                  </div>
                  <div class="col-md-4">
                    <label class="form-label">Provinsi</label>
                    <input type="text" class="form-control" name="ktp_province" value="{{ $user->ktp_province }}" placeholder="Province">
                  </div>
                  <div class="col-md-4">
                    <label class="form-label">Kode Pos</label>
                    <input type="text" class="form-control" name="ktp_poscode" value="{{ $user->ktp_poscode }}" placeholder="Postal code">
                  </div>
                </div>
              </div>

              <div class="col-lg-6">
                <h5 class="mb-2">Alamat Domisili</h5>
                <div class="mb-3">
                  <label class="form-label">Sama dengan KTP</label>
                  <select class="form-select" name="domicile_same" id="domicile_same">
                    <option value="Yes" {{ $user->domicile_same == 'Yes' ? 'selected' : '' }}>Ya</option>
                    <option value="No" {{ $user->domicile_same == 'No' ? 'selected' : '' }}>Tidak</option>
                  </select>
                </div>
                <div id="domicile_fields">
                  <div class="mb-3">
                    <label class="form-label">Alamat</label>
                    <textarea class="form-control" name="domicile_addres" rows="3" placeholder="Domicile address">{{ $user->domicile_addres }}</textarea>
                  </div>
                  <div class="row g-3">
                    <div class="col-md-6">
                      <label class="form-label">RT</label>
                      <input type="text" class="form-control" name="domicile_rt" value="{{ $user->domicile_rt }}" placeholder="RT">
                    </div>
                    <div class="col-md-6">
                      <label class="form-label">RW</label>
                      <input type="text" class="form-control" name="domicile_rw" value="{{ $user->domicile_rw }}" placeholder="RW">
                    </div>
                  </div>
                  <div class="row g-3 mt-1">
                    <div class="col-md-6">
                      <label class="form-label">Kelurahan</label>
                      <input type="text" class="form-control" name="domicile_village" value="{{ $user->domicile_village }}" placeholder="Village">
                    </div>
                    <div class="col-md-6">
                      <label class="form-label">Kecamatan</label>
                      <input type="text" class="form-control" name="domicile_subdistrict" value="{{ $user->domicile_subdistrict }}" placeholder="Subdistrict">
                    </div>
                  </div>
                  <div class="row g-3 mt-1">
                    <div class="col-md-4">
                      <label class="form-label">Kota</label>
                      <input type="text" class="form-control" name="domicile_city" value="{{ $user->domicile_city }}" placeholder="City">
                    </div>
                    <div class="col-md-4">
                      <label class="form-label">Provinsi</label>
                      <input type="text" class="form-control" name="domicile_province" value="{{ $user->domicile_province }}" placeholder="Province">
                    </div>
                    <div class="col-md-4">
                      <label class="form-label">Kode Pos</label>
                      <input type="text" class="form-control" name="domicile_poscode" value="{{ $user->domicile_poscode }}" placeholder="Postal code">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Education -->
        <div class="tab-pane fade" id="education" role="tabpanel">
          <div class="panel">
            <h5 class="mb-3">Education History</h5>
            <div class="row g-3">
              @foreach([1,2,3] as $i)
              <div class="col-md-4">
                <div class="panel">
                  <h6 class="fw-bold mb-2">Pendidikan {{ $i }}</h6>
                  <div class="mb-2">
                    <label class="form-label">Jenis</label>
                    <select class="form-select" name="edu{{ $i }}_type">
                      @foreach(['SMA/SMK','Diploma','Sarjana','Magister','Doktor'] as $opt)
                        <option value="{{ $opt }}" {{ data_get($user,'edu'.$i.'_type') == $opt ? 'selected' : '' }}>{{ $opt }}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="mb-2">
                    <label class="form-label">Institusi</label>
                    <input type="text" class="form-control" name="edu{{ $i }}_place" value="{{ data_get($user,'edu'.$i.'_place') }}" placeholder="Institution name">
                  </div>
                  <div class="mb-2">
                    <label class="form-label">Jurusan</label>
                    <input type="text" class="form-control" name="edu{{ $i }}_major" value="{{ data_get($user,'edu'.$i.'_major') }}" placeholder="Major">
                  </div>
                  <div class="mb-2">
                    <label class="form-label">IPK</label>
                    <input type="text" class="form-control" name="edu{{ $i }}_average_score" value="{{ data_get($user,'edu'.$i.'_average_score') }}" placeholder="GPA / Average score">
                  </div>
                  <div class="mb-1">
                    <label class="form-label">Tahun Lulus</label>
                    <input type="text" class="form-control" name="edu{{ $i }}_graduate_year" value="{{ data_get($user,'edu'.$i.'_graduate_year') }}" placeholder="Graduation year">
                  </div>
                </div>
              </div>
              @endforeach
            </div>
          </div>
        </div>

        <!-- Identity -->
        <div class="tab-pane fade" id="identity" role="tabpanel">
          <div class="panel">
            <div class="row g-3">
              <div class="col-md-6">
                <div class="mb-2">
                  <label class="form-label">Nomor KK</label>
                  <input type="text" class="form-control" name="numb_kk" value="{{ $user->numb_kk }}" placeholder="Family card number">
                </div>
                <div class="mb-2">
                  <label class="form-label">Nomor KTP</label>
                  <input type="text" class="form-control" name="numb_ktp" value="{{ $user->numb_ktp }}" placeholder="National ID number">
                </div>
                <div class="mb-2">
                  <label class="form-label">Nomor NPSN</label>
                  <input type="text" class="form-control" name="numb_npsn" value="{{ $user->numb_npsn }}" placeholder="School registration number">
                </div>
              </div>
              <div class="col-md-6">
                <div class="mb-2">
                  <label class="form-label">Nomor NITK</label>
                  <input type="text" class="form-control" name="numb_nitk" value="{{ $user->numb_nitk }}" placeholder="Employee ID">
                </div>
                <div class="mb-2">
                  <label class="form-label">Nomor Staff</label>
                  <input type="text" class="form-control" name="numb_staff" value="{{ $user->numb_staff }}" placeholder="Staff number">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="d-flex justify-content-end gap-2 mt-3">
        <button type="button" class="btn btn-ghost" onclick="window.history.back()">Cancel</button>
        <button type="submit" class="btn btn-primary">Save Changes</button>
      </div>
    </form>
  </section>
</div>
@endsection

@section('custom-js')
<script>
  document.addEventListener('DOMContentLoaded', function(){
    const photoInput = document.getElementById('photo-input');
    const previewImage = document.getElementById('preview-image');

    if(photoInput){
      photoInput.addEventListener('change', (e)=>{
        const file = e.target.files?.[0];
        if(!file) return;
        const reader = new FileReader();
        reader.onload = (ev)=>{ previewImage.src = ev.target.result; };
        reader.readAsDataURL(file);
      });
    }

    // domicile fields toggle
    const domicileSame = document.getElementById('domicile_same');
    const domicileFields = document.getElementById('domicile_fields');
    function toggleDomicileFields(){
      if(!domicileSame || !domicileFields) return;
      domicileFields.style.display = (domicileSame.value === 'Yes') ? 'none' : 'block';
    }
    toggleDomicileFields();
    domicileSame?.addEventListener('change', toggleDomicileFields);

    // sync sidebar active state
    document.querySelectorAll('#profileTabs [data-bs-toggle="tab"]').forEach(link=>{
      link.addEventListener('shown.bs.tab', function(){
        document.querySelectorAll('#profileTabs .list-group-item').forEach(i=>i.classList.remove('active'));
        this.classList.add('active');
      });
    });
  });
</script>
@endsection
