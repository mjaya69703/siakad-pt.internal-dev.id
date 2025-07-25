@extends('core-themes.core-backpage')

@section('custom-css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        .card {
            border: none;
            box-shadow: 0 0 10px rgba(0,0,0,0.05);
            border-radius: 10px;
        }

        .card-header {
            background: none;
            border-bottom: 1px solid rgba(0,0,0,0.05);
            padding: 1.5rem;
        }

        .card-body {
            padding: 1.5rem;
        }

        .btn {
            padding: 0.5rem 1rem;
            border-radius: 5px;
        }

        .form-control, .form-select {
            border-radius: 5px;
            border: 1px solid rgba(0,0,0,0.1);
            padding: 0.5rem 1rem;
        }

        .form-control:focus, .form-select:focus {
            border-color: #435ebe;
            box-shadow: 0 0 0 0.2rem rgba(67, 94, 190, 0.25);
        }

        .upload-area {
            border: 2px dashed #dee2e6;
            border-radius: 10px;
            padding: 3rem 2rem;
            text-align: center;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .upload-area:hover {
            border-color: #435ebe;
            background-color: rgba(67, 94, 190, 0.05);
        }

        .upload-area.dragover {
            border-color: #435ebe;
            background-color: rgba(67, 94, 190, 0.1);
        }

        .upload-icon {
            font-size: 3rem;
            color: #6c757d;
            margin-bottom: 1rem;
        }

        .file-info {
            background-color: #f8f9fa;
            border-radius: 5px;
            padding: 1rem;
            margin-top: 1rem;
        }

        .progress {
            height: 10px;
            border-radius: 5px;
        }

        .alert {
            border-radius: 5px;
        }

        .table {
            margin-bottom: 0;
        }

        .table thead th {
            border-top: none;
            border-bottom: 2px solid rgba(0,0,0,0.05);
            font-weight: 600;
            color: #6c757d;
        }

        .badge {
            padding: 0.5em 0.75em;
            font-weight: 500;
        }
    </style>
@endsection

@section('content')
    <div class="row">
        <div class="col-12 mb-3">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h4 class="mb-1">Import Nilai</h4>
                    <p class="text-muted mb-0">Upload file Excel/CSV untuk mengimpor data nilai secara massal</p>
                </div>
                <div class="d-flex gap-2">
                    <a href="{{ route($spref . 'akademik.nilai-render') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left me-2"></i>Kembali
                    </a>
                    <a href="#" class="btn btn-info" onclick="downloadTemplate()">
                        <i class="fas fa-download me-2"></i>Download Template
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- Upload Form -->
        <div class="col-lg-8 col-12">
            <div class="card">
                <div class="card-header">
                    <h6 class="mb-0">Upload File Nilai</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route($spref . 'akademik.nilai-import-process') }}" method="post" enctype="multipart/form-data" id="importForm">
                        @csrf

                        <!-- Filter Options -->
                        <div class="row mb-4">
                            <div class="col-md-6 mb-3">
                                <label for="tahun_akademik_id" class="form-label">Tahun Akademik</label>
                                <select class="form-select" name="tahun_akademik_id" id="tahun_akademik_id" required>
                                    <option value="">Pilih Tahun Akademik</option>
                                    @foreach ($tahun_akademik as $ta)
                                        <option value="{{ $ta->id }}" {{ $ta->status == 'Aktif' ? 'selected' : '' }}>
                                            {{ $ta->name }} - {{ $ta->semester }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('tahun_akademik_id')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="dosen_id" class="form-label">Dosen (Opsional)</label>
                                <select class="form-select" name="dosen_id" id="dosen_id">
                                    <option value="">Pilih Dosen</option>
                                    @foreach ($dosens as $dosen)
                                        <option value="{{ $dosen->id }}">{{ $dosen->nidn }} - {{ $dosen->name }}</option>
                                    @endforeach
                                </select>
                                @error('dosen_id')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <!-- Upload Area -->
                        <div class="upload-area" id="uploadArea" onclick="document.getElementById('fileInput').click()">
                            <div class="upload-icon">
                                <i class="fas fa-cloud-upload-alt"></i>
                            </div>
                            <h5>Drag & Drop file di sini atau klik untuk memilih</h5>
                            <p class="text-muted mb-0">Format yang didukung: .xlsx, .xls, .csv (Maksimal 10MB)</p>
                            <input type="file" id="fileInput" name="file" class="d-none" accept=".xlsx,.xls,.csv" required>
                        </div>

                        <!-- File Info -->
                        <div id="fileInfo" class="file-info d-none">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="mb-1" id="fileName"></h6>
                                    <small class="text-muted" id="fileSize"></small>
                                </div>
                                <button type="button" class="btn btn-sm btn-danger" onclick="removeFile()">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </div>

                        <!-- Options -->
                        <div class="row mt-4">
                            <div class="col-12">
                                <h6 class="mb-3">Opsi Import</h6>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="update_existing" id="update_existing" value="1">
                                            <label class="form-check-label" for="update_existing">
                                                Update data yang sudah ada
                                            </label>
                                            <div class="form-text">Jika dicentang, data nilai yang sudah ada akan diupdate dengan data baru</div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="validate_only" id="validate_only" value="1">
                                            <label class="form-check-label" for="validate_only">
                                                Validasi saja (tidak menyimpan)
                                            </label>
                                            <div class="form-text">Jika dicentang, hanya akan menampilkan preview tanpa menyimpan data</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="d-flex justify-content-end mt-4">
                            <button type="submit" class="btn btn-primary" id="submitBtn" disabled>
                                <i class="fas fa-upload me-2"></i>Import Nilai
                            </button>
                        </div>
                    </form>

                    <!-- Progress Bar -->
                    <div id="progressContainer" class="mt-3 d-none">
                        <div class="d-flex justify-content-between mb-2">
                            <span>Mengupload file...</span>
                            <span id="progressPercent">0%</span>
                        </div>
                        <div class="progress">
                            <div class="progress-bar" id="progressBar" role="progressbar" style="width: 0%"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Instructions -->
        <div class="col-lg-4 col-12">
            <div class="card">
                <div class="card-header">
                    <h6 class="mb-0">Petunjuk Import</h6>
                </div>
                <div class="card-body">
                    <div class="alert alert-info">
                        <h6 class="alert-heading">
                            <i class="fas fa-info-circle me-2"></i>Format File
                        </h6>
                        <p class="mb-0">File harus berformat Excel (.xlsx, .xls) atau CSV (.csv) dengan kolom berikut:</p>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-sm">
                            <thead>
                                <tr>
                                    <th>Kolom</th>
                                    <th>Keterangan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><strong>nim</strong></td>
                                    <td>NIM Mahasiswa</td>
                                </tr>
                                <tr>
                                    <td><strong>kode_mk</strong></td>
                                    <td>Kode Mata Kuliah</td>
                                </tr>
                                <tr>
                                    <td><strong>nilai_angka</strong></td>
                                    <td>Nilai angka (0-100)</td>
                                </tr>
                                <tr>
                                    <td><strong>nilai_huruf</strong></td>
                                    <td>Nilai huruf (A, A-, B+, B, B-, C+, C, D, E)</td>
                                </tr>
                                <tr>
                                    <td><strong>grade_point</strong></td>
                                    <td>Grade point (0.0-4.0)</td>
                                </tr>
                                <tr>
                                    <td><strong>catatan</strong></td>
                                    <td>Catatan (opsional)</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="alert alert-warning mt-3">
                        <h6 class="alert-heading">
                            <i class="fas fa-exclamation-triangle me-2"></i>Perhatian
                        </h6>
                        <ul class="mb-0">
                            <li>Pastikan NIM dan Kode MK valid</li>
                            <li>Nilai angka harus berupa angka 0-100</li>
                            <li>Grade point akan dihitung otomatis jika tidak diisi</li>
                            <li>Maksimal ukuran file 10MB</li>
                            <li>Backup data sebelum melakukan import</li>
                        </ul>
                    </div>

                    <div class="alert alert-success">
                        <h6 class="alert-heading">
                            <i class="fas fa-lightbulb me-2"></i>Tips
                        </h6>
                        <ul class="mb-0">
                            <li>Download template untuk format yang benar</li>
                            <li>Gunakan validasi preview sebelum import final</li>
                            <li>Import per mata kuliah untuk menghindari error</li>
                            <li>Periksa hasil import di halaman nilai</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('custom-js')
    <script>
        // File upload handling
        const uploadArea = document.getElementById('uploadArea');
        const fileInput = document.getElementById('fileInput');
        const fileInfo = document.getElementById('fileInfo');
        const submitBtn = document.getElementById('submitBtn');
        const progressContainer = document.getElementById('progressContainer');
        const progressBar = document.getElementById('progressBar');
        const progressPercent = document.getElementById('progressPercent');

        // Drag and drop events
        uploadArea.addEventListener('dragover', (e) => {
            e.preventDefault();
            uploadArea.classList.add('dragover');
        });

        uploadArea.addEventListener('dragleave', (e) => {
            e.preventDefault();
            uploadArea.classList.remove('dragover');
        });

        uploadArea.addEventListener('drop', (e) => {
            e.preventDefault();
            uploadArea.classList.remove('dragover');

            const files = e.dataTransfer.files;
            if (files.length > 0) {
                handleFile(files[0]);
            }
        });

        // File input change event
        fileInput.addEventListener('change', (e) => {
            if (e.target.files.length > 0) {
                handleFile(e.target.files[0]);
            }
        });

        function handleFile(file) {
            // Validate file type
            const allowedTypes = [
                'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
                'application/vnd.ms-excel',
                'text/csv'
            ];

            if (!allowedTypes.includes(file.type)) {
                alert('Format file tidak didukung. Gunakan file Excel (.xlsx, .xls) atau CSV (.csv)');
                return;
            }

            // Validate file size (10MB)
            if (file.size > 10 * 1024 * 1024) {
                alert('Ukuran file terlalu besar. Maksimal 10MB');
                return;
            }

            // Update file input
            const dataTransfer = new DataTransfer();
            dataTransfer.items.add(file);
            fileInput.files = dataTransfer.files;

            // Show file info
            document.getElementById('fileName').textContent = file.name;
            document.getElementById('fileSize').textContent = formatFileSize(file.size);
            fileInfo.classList.remove('d-none');
            submitBtn.disabled = false;
        }

        function removeFile() {
            fileInput.value = '';
            fileInfo.classList.add('d-none');
            submitBtn.disabled = true;
        }

        function formatFileSize(bytes) {
            if (bytes === 0) return '0 Bytes';
            const k = 1024;
            const sizes = ['Bytes', 'KB', 'MB', 'GB'];
            const i = Math.floor(Math.log(bytes) / Math.log(k));
            return parseFloat((bytes / Math.pow(k, i)).toFixed(2)) + ' ' + sizes[i];
        }

        // Form submission with progress
        document.getElementById('importForm').addEventListener('submit', function(e) {
            e.preventDefault();

            const formData = new FormData(this);
            const xhr = new XMLHttpRequest();

            // Show progress
            progressContainer.classList.remove('d-none');
            submitBtn.disabled = true;
            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Mengupload...';

            // Progress tracking
            xhr.upload.addEventListener('progress', function(e) {
                if (e.lengthComputable) {
                    const percentComplete = (e.loaded / e.total) * 100;
                    progressBar.style.width = percentComplete + '%';
                    progressPercent.textContent = Math.round(percentComplete) + '%';
                }
            });

            // Success/Error handling
            xhr.onload = function() {
                if (xhr.status === 200) {
                    const response = JSON.parse(xhr.responseText);
                    if (response.success) {
                        alert('Import berhasil! ' + (response.message || ''));
                        window.location.href = '{{ route($spref . "akademik.nilai-render") }}';
                    } else {
                        alert('Import gagal: ' + (response.message || 'Unknown error'));
                    }
                } else {
                    alert('Terjadi kesalahan saat mengupload file');
                }

                // Reset UI
                progressContainer.classList.add('d-none');
                submitBtn.disabled = false;
                submitBtn.innerHTML = '<i class="fas fa-upload me-2"></i>Import Nilai';
            };

            xhr.onerror = function() {
                alert('Terjadi kesalahan koneksi');
                progressContainer.classList.add('d-none');
                submitBtn.disabled = false;
                submitBtn.innerHTML = '<i class="fas fa-upload me-2"></i>Import Nilai';
            };

            xhr.open('POST', this.action);
            xhr.setRequestHeader('X-CSRF-TOKEN', '{{ csrf_token() }}');
            xhr.send(formData);
        });

        function downloadTemplate() {
            // Create a sample template data
            const templateData = [
                ['nim', 'kode_mk', 'nilai_angka', 'nilai_huruf', 'grade_point', 'catatan'],
                ['2023001001', 'MK001', '85', 'A-', '3.7', 'Baik'],
                ['2023001002', 'MK001', '78', 'B+', '3.3', ''],
                ['2023001003', 'MK001', '72', 'B', '3.0', 'Cukup']
            ];

            // Convert to CSV
            const csvContent = templateData.map(row => row.join(',')).join('\n');

            // Create download link
            const blob = new Blob([csvContent], { type: 'text/csv' });
            const url = window.URL.createObjectURL(blob);
            const link = document.createElement('a');
            link.href = url;
            link.download = 'template_import_nilai.csv';
            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);
            window.URL.revokeObjectURL(url);
        }
    </script>
@endsection
