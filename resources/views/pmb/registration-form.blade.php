@extends('core-themes.core-mainpage')

@section('custom-css')
<style>
.registration-form {
    background: #f8f9fa;
    min-height: 100vh;
    padding: 2rem 0;
}

.form-card {
    background: white;
    border-radius: 15px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    overflow: hidden;
}

.form-header {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
    padding: 2rem;
    text-align: center;
}

.form-step {
    display: none;
}

.form-step.active {
    display: block;
}

.step-indicator {
    display: flex;
    justify-content: center;
    margin-bottom: 2rem;
}

.step-item {
    display: flex;
    align-items: center;
    margin: 0 1rem;
}

.step-circle {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    background: #e9ecef;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: bold;
    margin-right: 0.5rem;
}

.step-circle.active {
    background: #667eea;
    color: white;
}

.step-circle.completed {
    background: #28a745;
    color: white;
}

.form-section {
    padding: 2rem;
}

.required {
    color: #dc3545;
}
</style>
@endsection

@section('content')
<section class="registration-form">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="form-card">
                    <div class="form-header">
                        <h2><i class="fas fa-user-plus me-2"></i>Formulir Pendaftaran Online</h2>
                        <p class="mb-0">{{ $webs->school_name ?? 'Universitas Ibn Khaldun' }}</p>
                    </div>

                    <div class="form-section">
                        <!-- Step Indicator -->
                        <div class="step-indicator">
                            <div class="step-item">
                                <div class="step-circle active" id="step-1-indicator">1</div>
                                <span>Data Pribadi</span>
                            </div>
                            <div class="step-item">
                                <div class="step-circle" id="step-2-indicator">2</div>
                                <span>Pilihan Program</span>
                            </div>
                            <div class="step-item">
                                <div class="step-circle" id="step-3-indicator">3</div>
                                <span>Upload Dokumen</span>
                            </div>
                            <div class="step-item">
                                <div class="step-circle" id="step-4-indicator">4</div>
                                <span>Konfirmasi</span>
                            </div>
                        </div>

                        <form id="registrationForm" method="POST" action="{{ route('pendaftar.register.submit') }}" enctype="multipart/form-data">
                            @csrf

                            <!-- Step 1: Personal Data -->
                            <div class="form-step active" id="step-1">
                                <h4 class="mb-4">Data Pribadi</h4>
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label class="form-label">Nama Lengkap <span class="required">*</span></label>
                                        <input type="text" class="form-control" name="nama_lengkap" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">NIK <span class="required">*</span></label>
                                        <input type="text" class="form-control" name="nik" required maxlength="16">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Tempat Lahir <span class="required">*</span></label>
                                        <input type="text" class="form-control" name="tempat_lahir" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Tanggal Lahir <span class="required">*</span></label>
                                        <input type="date" class="form-control" name="tanggal_lahir" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Jenis Kelamin <span class="required">*</span></label>
                                        <select class="form-select" name="jenis_kelamin" required>
                                            <option value="">Pilih Jenis Kelamin</option>
                                            <option value="L">Laki-laki</option>
                                            <option value="P">Perempuan</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Agama <span class="required">*</span></label>
                                        <select class="form-select" name="agama" required>
                                            <option value="">Pilih Agama</option>
                                            <option value="1">Islam</option>
                                            <option value="2">Kristen Katholik</option>
                                            <option value="3">Kristen Protestan</option>
                                            <option value="4">Hindu</option>
                                            <option value="5">Buddha</option>
                                            <option value="6">Konghuchu</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">No. HP <span class="required">*</span></label>
                                        <input type="tel" class="form-control" name="no_hp" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Email <span class="required">*</span></label>
                                        <input type="email" class="form-control" name="email" required>
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label">Alamat Lengkap <span class="required">*</span></label>
                                        <textarea class="form-control" name="alamat_lengkap" rows="3" required></textarea>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end mt-4">
                                    <button type="button" class="btn btn-primary" onclick="nextStep(2)">
                                        Selanjutnya <i class="fas fa-arrow-right ms-2"></i>
                                    </button>
                                </div>
                            </div>

                            <!-- Step 2: Program Selection -->
                            <div class="form-step" id="step-2">
                                <h4 class="mb-4">Pilihan Program Studi</h4>
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label class="form-label">Jenjang Pendidikan <span class="required">*</span></label>
                                        <select class="form-select" name="jenjang_id" id="jenjang_id" required>
                                            <option value="">Pilih Jenjang</option>
                                            @foreach($jenjangs as $jenjang)
                                            <option value="{{ $jenjang->id }}">{{ $jenjang->nama }} ({{ $jenjang->singkatan }})</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Fakultas <span class="required">*</span></label>
                                        <select class="form-select" name="fakultas_id" id="fakultas_id" required>
                                            <option value="">Pilih Fakultas</option>
                                            @foreach($faculties as $fakultas)
                                            <option value="{{ $fakultas->id }}">{{ $fakultas->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Program Studi Pilihan 1 <span class="required">*</span></label>
                                        <select class="form-select" name="prodi_1" id="prodi_1" required>
                                            <option value="">Pilih Program Studi</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Program Studi Pilihan 2</label>
                                        <select class="form-select" name="prodi_2" id="prodi_2">
                                            <option value="">Pilih Program Studi (Opsional)</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Jalur Pendaftaran <span class="required">*</span></label>
                                        <select class="form-select" name="jalur_id" required>
                                            <option value="">Pilih Jalur</option>
                                            @foreach($jalurs as $jalur)
                                            <option value="{{ $jalur->id }}">{{ $jalur->name }} - {{ $jalur->deskripsi }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Gelombang Pendaftaran <span class="required">*</span></label>
                                        <select class="form-select" name="gelombang_id" required>
                                            <option value="">Pilih Gelombang</option>
                                            @foreach($gelombangs as $gelombang)
                                            <option value="{{ $gelombang->id }}">{{ $gelombang->nama }} ({{ $gelombang->tgl_mulai }} - {{ $gelombang->tgl_selesai }})</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between mt-4">
                                    <button type="button" class="btn btn-secondary" onclick="previousStep(1)">
                                        <i class="fas fa-arrow-left me-2"></i>Sebelumnya
                                    </button>
                                    <button type="button" class="btn btn-primary" onclick="nextStep(3)">
                                        Selanjutnya <i class="fas fa-arrow-right ms-2"></i>
                                    </button>
                                </div>
                            </div>

                            <!-- Step 3: Document Upload -->
                            <div class="form-step" id="step-3">
                                <h4 class="mb-4">Upload Dokumen Persyaratan</h4>
                                <div class="alert alert-info">
                                    <i class="fas fa-info-circle me-2"></i>
                                    <strong>Persyaratan:</strong> File dalam format PDF/JPG/PNG, maksimal 2MB per file
                                </div>
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label class="form-label">Ijazah/STTB <span class="required">*</span></label>
                                        <input type="file" class="form-control" name="dokumen_ijazah" accept=".pdf,.jpg,.jpeg,.png" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Transkrip Nilai <span class="required">*</span></label>
                                        <input type="file" class="form-control" name="dokumen_transkrip" accept=".pdf,.jpg,.jpeg,.png" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Pas Foto 3x4 <span class="required">*</span></label>
                                        <input type="file" class="form-control" name="pas_foto" accept=".jpg,.jpeg,.png" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">KTP <span class="required">*</span></label>
                                        <input type="file" class="form-control" name="dokumen_ktp" accept=".pdf,.jpg,.jpeg,.png" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Kartu Keluarga</label>
                                        <input type="file" class="form-control" name="dokumen_kk" accept=".pdf,.jpg,.jpeg,.png">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Dokumen Tambahan</label>
                                        <input type="file" class="form-control" name="dokumen_tambahan" accept=".pdf,.jpg,.jpeg,.png">
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between mt-4">
                                    <button type="button" class="btn btn-secondary" onclick="previousStep(2)">
                                        <i class="fas fa-arrow-left me-2"></i>Sebelumnya
                                    </button>
                                    <button type="button" class="btn btn-primary" onclick="nextStep(4)">
                                        Selanjutnya <i class="fas fa-arrow-right ms-2"></i>
                                    </button>
                                </div>
                            </div>

                            <!-- Step 4: Confirmation -->
                            <div class="form-step" id="step-4">
                                <h4 class="mb-4">Konfirmasi Pendaftaran</h4>
                                <div id="confirmationData"></div>
                                <div class="alert alert-warning mt-3">
                                    <i class="fas fa-exclamation-triangle me-2"></i>
                                    <strong>Perhatian:</strong> Pastikan semua data yang Anda masukkan sudah benar. Data yang sudah disubmit tidak dapat diubah.
                                </div>
                                <div class="form-check mb-3">
                                    <input class="form-check-input" type="checkbox" id="agreement" required>
                                    <label class="form-check-label" for="agreement">
                                        Saya menyatakan bahwa data yang saya isi adalah benar dan dapat dipertanggungjawabkan
                                    </label>
                                </div>
                                <div class="d-flex justify-content-between mt-4">
                                    <button type="button" class="btn btn-secondary" onclick="previousStep(3)">
                                        <i class="fas fa-arrow-left me-2"></i>Sebelumnya
                                    </button>
                                    <button type="submit" class="btn btn-success btn-lg">
                                        <i class="fas fa-paper-plane me-2"></i>Submit Pendaftaran
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('custom-js')
<script>
let currentStep = 1;

function nextStep(step) {
    if (validateStep(currentStep)) {
        document.getElementById(`step-${currentStep}`).classList.remove('active');
        document.getElementById(`step-${currentStep}-indicator`).classList.add('completed');
        document.getElementById(`step-${currentStep}-indicator`).classList.remove('active');
        
        currentStep = step;
        document.getElementById(`step-${step}`).classList.add('active');
        document.getElementById(`step-${step}-indicator`).classList.add('active');
        
        if (step === 4) {
            generateConfirmation();
        }
    }
}

function previousStep(step) {
    document.getElementById(`step-${currentStep}`).classList.remove('active');
    document.getElementById(`step-${currentStep}-indicator`).classList.remove('active');
    
    currentStep = step;
    document.getElementById(`step-${step}`).classList.add('active');
    document.getElementById(`step-${step}-indicator`).classList.add('active');
    document.getElementById(`step-${step}-indicator`).classList.remove('completed');
}

function validateStep(step) {
    const stepElement = document.getElementById(`step-${step}`);
    const requiredFields = stepElement.querySelectorAll('[required]');
    let isValid = true;
    
    requiredFields.forEach(field => {
        if (!field.value.trim()) {
            field.classList.add('is-invalid');
            isValid = false;
        } else {
            field.classList.remove('is-invalid');
        }
    });
    
    return isValid;
}

function generateConfirmation() {
    const formData = new FormData(document.getElementById('registrationForm'));
    let html = '<div class="table-responsive"><table class="table table-bordered">';
    
    const fields = {
        'nama_lengkap': 'Nama Lengkap',
        'nik': 'NIK',
        'tempat_lahir': 'Tempat Lahir',
        'tanggal_lahir': 'Tanggal Lahir',
        'jenis_kelamin': 'Jenis Kelamin',
        'no_hp': 'No. HP',
        'email': 'Email'
    };
    
    for (const [key, label] of Object.entries(fields)) {
        const value = formData.get(key);
        if (value) {
            html += `<tr><td><strong>${label}</strong></td><td>${value}</td></tr>`;
        }
    }
    
    html += '</table></div>';
    document.getElementById('confirmationData').innerHTML = html;
}

// Load program studi based on jenjang and fakultas
document.getElementById('jenjang_id').addEventListener('change', loadProgramStudi);
document.getElementById('fakultas_id').addEventListener('change', loadProgramStudi);

function loadProgramStudi() {
    const jenjangId = document.getElementById('jenjang_id').value;
    const fakultasId = document.getElementById('fakultas_id').value;
    
    if (jenjangId || fakultasId) {
        fetch(`{{ route('pmb.get-program-studi') }}?jenjang_id=${jenjangId}&fakultas_id=${fakultasId}`)
            .then(response => response.json())
            .then(data => {
                const prodi1Select = document.getElementById('prodi_1');
                const prodi2Select = document.getElementById('prodi_2');
                
                // Clear options
                prodi1Select.innerHTML = '<option value="">Pilih Program Studi</option>';
                prodi2Select.innerHTML = '<option value="">Pilih Program Studi (Opsional)</option>';
                
                // Add options
                data.data.forEach(prodi => {
                    const option1 = new Option(prodi.name, prodi.id);
                    const option2 = new Option(prodi.name, prodi.id);
                    prodi1Select.add(option1);
                    prodi2Select.add(option2);
                });
            })
            .catch(error => console.error('Error loading program studi:', error));
    }
}
</script>
@endsection