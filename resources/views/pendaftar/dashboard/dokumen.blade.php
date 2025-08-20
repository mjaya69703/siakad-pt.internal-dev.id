@extends('pendaftar.layouts.app')

@section('title', 'Upload Dokumen')
@section('page-pretitle', 'PMB')
@section('page-title', 'Upload Dokumen')

@section('content')
<div class="row">
    <div class="col-12">
        @if(!$pendaftaran)
            <div class="card">
                <div class="card-body text-center py-5">
                    <div class="mb-3">
                        <i class="fas fa-exclamation-triangle text-warning" style="font-size: 4rem;"></i>
                    </div>
                    <h3>Belum Ada Data Pendaftaran</h3>
                    <p class="text-muted">Anda belum melengkapi form pendaftaran. Silakan isi form pendaftaran terlebih dahulu.</p>
                    <a href="{{ route('pendaftar.pendaftaran') }}" class="btn btn-primary">
                        <i class="fas fa-plus me-2"></i>
                        Isi Form Pendaftaran
                    </a>
                </div>
            </div>
        @else
            <!-- Upload Form -->
            <div class="card mb-4">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-cloud-upload-alt me-2"></i>
                        Upload Dokumen Baru
                    </h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('pendaftar.dokumen.upload') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Jenis Dokumen <span class="text-danger">*</span></label>
                                <select class="form-control @error('nama_dokumen') is-invalid @enderror" name="nama_dokumen" required>
                                    <option value="">Pilih Jenis Dokumen</option>
                                    <option value="Ijazah" {{ old('nama_dokumen') == 'Ijazah' ? 'selected' : '' }}>Ijazah</option>
                                    <option value="Transkrip Nilai" {{ old('nama_dokumen') == 'Transkrip Nilai' ? 'selected' : '' }}>Transkrip Nilai</option>
                                    <option value="KTP" {{ old('nama_dokumen') == 'KTP' ? 'selected' : '' }}>KTP</option>
                                    <option value="Kartu Keluarga" {{ old('nama_dokumen') == 'Kartu Keluarga' ? 'selected' : '' }}>Kartu Keluarga</option>
                                    <option value="Akta Kelahiran" {{ old('nama_dokumen') == 'Akta Kelahiran' ? 'selected' : '' }}>Akta Kelahiran</option>
                                    <option value="Pas Foto" {{ old('nama_dokumen') == 'Pas Foto' ? 'selected' : '' }}>Pas Foto</option>
                                    <option value="Surat Keterangan Berkelakuan Baik" {{ old('nama_dokumen') == 'Surat Keterangan Berkelakuan Baik' ? 'selected' : '' }}>Surat Keterangan Berkelakuan Baik</option>
                                    <option value="Surat Keterangan Sehat" {{ old('nama_dokumen') == 'Surat Keterangan Sehat' ? 'selected' : '' }}>Surat Keterangan Sehat</option>
                                    <option value="Lainnya" {{ old('nama_dokumen') == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                                </select>
                                @error('nama_dokumen')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="col-md-6 mb-3">
                                <label class="form-label">File Dokumen <span class="text-danger">*</span></label>
                                <input type="file" class="form-control @error('file_dokumen') is-invalid @enderror" 
                                       name="file_dokumen" accept="image/*,application/pdf" required>
                                <small class="text-muted">Format: JPG, PNG, PDF. Maksimal 2MB</small>
                                @error('file_dokumen')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="col-12 mb-3" id="custom_nama_dokumen" style="display: none;">
                                <label class="form-label">Nama Dokumen Lainnya</label>
                                <input type="text" class="form-control" name="custom_nama_dokumen" 
                                       placeholder="Masukkan nama dokumen">
                            </div>
                        </div>
                        
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-upload me-2"></i>
                                Upload Dokumen
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Dokumen Requirements -->
            <div class="card mb-4">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-list-check me-2"></i>
                        Persyaratan Dokumen
                    </h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h6>Dokumen Wajib:</h6>
                            <div class="list-group list-group-flush">
                                <div class="list-group-item d-flex align-items-center">
                                    @php $hasIjazah = $dokumen->where('nama_dokumen', 'Ijazah')->count() > 0; @endphp
                                    <i class="fas fa-{{ $hasIjazah ? 'check-circle text-success' : 'circle text-muted' }} me-2"></i>
                                    <span class="{{ $hasIjazah ? 'text-decoration-line-through' : '' }}">Ijazah / Surat Keterangan Lulus</span>
                                </div>
                                <div class="list-group-item d-flex align-items-center">
                                    @php $hasTranskrip = $dokumen->where('nama_dokumen', 'Transkrip Nilai')->count() > 0; @endphp
                                    <i class="fas fa-{{ $hasTranskrip ? 'check-circle text-success' : 'circle text-muted' }} me-2"></i>
                                    <span class="{{ $hasTranskrip ? 'text-decoration-line-through' : '' }}">Transkrip Nilai</span>
                                </div>
                                <div class="list-group-item d-flex align-items-center">
                                    @php $hasKTP = $dokumen->where('nama_dokumen', 'KTP')->count() > 0; @endphp
                                    <i class="fas fa-{{ $hasKTP ? 'check-circle text-success' : 'circle text-muted' }} me-2"></i>
                                    <span class="{{ $hasKTP ? 'text-decoration-line-through' : '' }}">KTP</span>
                                </div>
                                <div class="list-group-item d-flex align-items-center">
                                    @php $hasKK = $dokumen->where('nama_dokumen', 'Kartu Keluarga')->count() > 0; @endphp
                                    <i class="fas fa-{{ $hasKK ? 'check-circle text-success' : 'circle text-muted' }} me-2"></i>
                                    <span class="{{ $hasKK ? 'text-decoration-line-through' : '' }}">Kartu Keluarga</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h6>Dokumen Tambahan:</h6>
                            <div class="list-group list-group-flush">
                                <div class="list-group-item d-flex align-items-center">
                                    @php $hasAkta = $dokumen->where('nama_dokumen', 'Akta Kelahiran')->count() > 0; @endphp
                                    <i class="fas fa-{{ $hasAkta ? 'check-circle text-success' : 'circle text-muted' }} me-2"></i>
                                    <span class="{{ $hasAkta ? 'text-decoration-line-through' : '' }}">Akta Kelahiran</span>
                                </div>
                                <div class="list-group-item d-flex align-items-center">
                                    @php $hasFoto = $dokumen->where('nama_dokumen', 'Pas Foto')->count() > 0; @endphp
                                    <i class="fas fa-{{ $hasFoto ? 'check-circle text-success' : 'circle text-muted' }} me-2"></i>
                                    <span class="{{ $hasFoto ? 'text-decoration-line-through' : '' }}">Pas Foto 3x4</span>
                                </div>
                                <div class="list-group-item d-flex align-items-center">
                                    @php $hasKelakuan = $dokumen->where('nama_dokumen', 'Surat Keterangan Berkelakuan Baik')->count() > 0; @endphp
                                    <i class="fas fa-{{ $hasKelakuan ? 'check-circle text-success' : 'circle text-muted' }} me-2"></i>
                                    <span class="{{ $hasKelakuan ? 'text-decoration-line-through' : '' }}">Surat Keterangan Berkelakuan Baik</span>
                                </div>
                                <div class="list-group-item d-flex align-items-center">
                                    @php $hasSehat = $dokumen->where('nama_dokumen', 'Surat Keterangan Sehat')->count() > 0; @endphp
                                    <i class="fas fa-{{ $hasSehat ? 'check-circle text-success' : 'circle text-muted' }} me-2"></i>
                                    <span class="{{ $hasSehat ? 'text-decoration-line-through' : '' }}">Surat Keterangan Sehat</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    @php 
                        $wajib = ['Ijazah', 'Transkrip Nilai', 'KTP', 'Kartu Keluarga'];
                        $uploaded_wajib = $dokumen->whereIn('nama_dokumen', $wajib)->count();
                        $progress = ($uploaded_wajib / count($wajib)) * 100;
                    @endphp
                    
                    <div class="mt-3">
                        <div class="d-flex justify-content-between">
                            <span>Progress Dokumen Wajib</span>
                            <span>{{ $uploaded_wajib }}/{{ count($wajib) }}</span>
                        </div>
                        <div class="progress mt-1">
                            <div class="progress-bar" style="width: {{ $progress }}%"></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Dokumen yang Sudah Diupload -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-folder-open me-2"></i>
                        Dokumen Terupload ({{ $dokumen->count() }})
                    </h3>
                </div>
                <div class="card-body">
                    @if($dokumen->count() > 0)
                        <div class="row">
                            @foreach($dokumen as $doc)
                            <div class="col-md-6 col-lg-4 mb-3">
                                <div class="card h-100">
                                    <div class="card-body text-center">
                                        <div class="mb-3">
                                            @if(in_array(pathinfo($doc->file_path, PATHINFO_EXTENSION), ['jpg', 'jpeg', 'png', 'gif']))
                                                <img src="{{ asset('storage/' . $doc->file_path) }}" 
                                                     class="img-fluid rounded" style="max-height: 150px;" alt="{{ $doc->nama_dokumen }}">
                                            @else
                                                <i class="fas fa-file-pdf text-danger" style="font-size: 4rem;"></i>
                                            @endif
                                        </div>
                                        
                                        <h6 class="card-title">{{ $doc->nama_dokumen }}</h6>
                                        <p class="card-text">
                                            <small class="text-muted">
                                                {{ $doc->file_name }}<br>
                                                Size: {{ number_format($doc->file_size / 1024, 1) }} KB<br>
                                                Upload: {{ $doc->created_at->format('d M Y') }}
                                            </small>
                                        </p>
                                        
                                        <div class="mb-2">
                                            <span class="status-badge status-{{ $doc->status }}">
                                                {{ ucfirst($doc->status) }}
                                            </span>
                                        </div>
                                        
                                        <div class="btn-group-vertical w-100">
                                            <a href="{{ asset('storage/' . $doc->file_path) }}" 
                                               target="_blank" class="btn btn-sm btn-outline-primary">
                                                <i class="fas fa-eye me-2"></i>
                                                Lihat File
                                            </a>
                                            <button type="button" class="btn btn-sm btn-outline-danger" 
                                                    onclick="deleteDocument({{ $doc->id }})">
                                                <i class="fas fa-trash me-2"></i>
                                                Hapus
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    @else
                        <div class="text-center py-4">
                            <i class="fas fa-folder-open text-muted" style="font-size: 4rem;"></i>
                            <h5 class="mt-3">Belum Ada Dokumen</h5>
                            <p class="text-muted">Silakan upload dokumen yang diperlukan</p>
                        </div>
                    @endif
                </div>
            </div>
        @endif
    </div>
</div>

<!-- Delete Confirmation Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Konfirmasi Hapus</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <p>Apakah Anda yakin ingin menghapus dokumen ini?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <form id="deleteForm" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
// Show/hide custom document name field
document.querySelector('select[name="nama_dokumen"]').addEventListener('change', function() {
    const customField = document.getElementById('custom_nama_dokumen');
    if (this.value === 'Lainnya') {
        customField.style.display = 'block';
        customField.querySelector('input').required = true;
    } else {
        customField.style.display = 'none';
        customField.querySelector('input').required = false;
    }
});

// File size validation
document.querySelector('input[name="file_dokumen"]').addEventListener('change', function() {
    const file = this.files[0];
    if (file) {
        const maxSize = 2 * 1024 * 1024; // 2MB
        if (file.size > maxSize) {
            alert('Ukuran file terlalu besar. Maksimal 2MB.');
            this.value = '';
            return;
        }
        
        // Show file preview
        const reader = new FileReader();
        reader.onload = function(e) {
            // You can add preview functionality here
        };
        reader.readAsDataURL(file);
    }
});

function deleteDocument(id) {
    const modal = new bootstrap.Modal(document.getElementById('deleteModal'));
    const form = document.getElementById('deleteForm');
    form.action = `{{ url('pendaftar/dokumen') }}/${id}`;
    modal.show();
}

// Auto submit form after file selection (optional enhancement)
function autoSubmitForm() {
    const form = document.querySelector('form[action*="dokumen.upload"]');
    const fileInput = form.querySelector('input[name="file_dokumen"]');
    const selectInput = form.querySelector('select[name="nama_dokumen"]');
    
    fileInput.addEventListener('change', function() {
        if (this.files[0] && selectInput.value) {
            // Auto submit if both fields are filled (optional)
            // form.submit();
        }
    });
}
</script>
@endsection
