@extend('core-themes.core-backpage')
@section('content')
<div class="container-fluid">
    <!-- Page title -->
    <div class="page-header d-print-none">
        <div class="row align-items-center">
            <div class="col">
                <h2 class="page-title">
                    Kartu Rencana Studi (KRS)
                </h2>
                <div class="text-muted mt-1">
                    Semester {{ $currentSemester->type }} - {{ $currentSemester->name }}
                </div>
            </div>
            <div class="col-auto ms-auto d-print-none">
                <div class="btn-list">
                    <a href="{{ route('mahasiswa.akademik.krs-cetak') }}" class="btn btn-primary d-none d-sm-inline-block" target="_blank">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                            <path d="M17 17h2a2 2 0 0 0 2 -2v-4a2 2 0 0 0 -2 -2h-14a2 2 0 0 0 -2 2v4a2 2 0 0 0 2 2h2" />
                            <path d="M17 9v-4a2 2 0 0 0 -2 -2h-6a2 2 0 0 0 -2 2v4" />
                            <rect x="7" y="13" width="10" height="8" rx="2" />
                        </svg>
                        Cetak KRS
                    </a>
                    <a href="{{ route('mahasiswa.akademik.krs-cetak') }}" class="btn btn-primary d-sm-none btn-icon" target="_blank">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                            <path d="M17 17h2a2 2 0 0 0 2 -2v-4a2 2 0 0 0 -2 -2h-14a2 2 0 0 0 -2 2v4a2 2 0 0 0 2 2h2" />
                            <path d="M17 9v-4a2 2 0 0 0 -2 -2h-6a2 2 0 0 0 -2 2v4" />
                            <rect x="7" y="13" width="10" height="8" rx="2" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Mata Kuliah yang Diambil</h3>
                </div>
                <div class="table-responsive">
                    <table class="table card-table table-vcenter text-nowrap datatable">
                        <thead>
                            <tr>
                                <th class="w-1">No.</th>
                                <th>Kode MK</th>
                                <th>Nama Mata Kuliah</th>
                                <th>Kelas</th>
                                <th>SKS</th>
                                <th>Dosen</th>
                                <th>Status</th>
                                <th class="text-end">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($krs as $index => $item)
                            <tr>
                                <td><span class="text-muted">{{ $index + 1 }}</span></td>
                                <td>{{ $item->mataKuliah->kode_mk }}</td>
                                <td>{{ $item->mataKuliah->nama }}</td>
                                <td>{{ $item->kelas->nama_kelas }}</td>
                                <td>{{ $item->mataKuliah->sks }}</td>
                                <td>{{ $item->dosen->nama_lengkap ?? '-' }}</td>
                                <td>
                                    @if($item->status == 'disetujui')
                                        <span class="badge bg-success">Disetujui</span>
                                    @elseif($item->status == 'diproses')
                                        <span class="badge bg-warning">Menunggu Persetujuan</span>
                                    @elseif($item->status == 'ditolak')
                                        <span class="badge bg-danger">Ditolak</span>
                                    @else
                                        <span class="badge bg-secondary">Belum Disetujui</span>
                                    @endif
                                </td>
                                <td class="text-end">
                                    <button type="button" class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#hapusKrsModal" data-id="{{ $item->id }}">
                                        Batalkan
                                    </button>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="8" class="text-center py-4">
                                    <div class="empty">
                                        <div class="empty-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                                <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
                                                <path d="M9 10l.01 0" />
                                                <path d="M15 10l.01 0" />
                                                <path d="M9.5 15.25a3.5 3.5 0 0 1 5 0" />
                                            </svg>
                                        </div>
                                        <p class="empty-title">Tidak ada data KRS</p>
                                        <p class="empty-subtitle text-muted">
                                            Anda belum mengambil mata kuliah untuk semester ini.
                                        </p>
                                        <div class="empty-action">
                                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahKrsModal">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                                    <path d="M12 5l0 14" />
                                                    <path d="M5 12l14 0" />
                                                </svg>
                                                Tambah Mata Kuliah
                                            </button>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                        @if($krs->isNotEmpty())
                        <tfoot>
                            <tr>
                                <td colspan="4" class="text-end fw-bold">Total SKS:</td>
                                <td class="fw-bold">{{ $krs->sum('mataKuliah.sks') }}</td>
                                <td colspan="3"></td>
                            </tr>
                        </tfoot>
                        @endif
                    </table>
                </div>
                
                @if($krs->isNotEmpty() && $krs->where('status', '!=', 'disetujui')->isNotEmpty())
                <div class="card-footer">
                    <div class="row align-items-center">
                        <div class="col">
                            <div class="text-muted">
                                Silakan menunggu persetujuan dari dosen wali untuk mata kuliah yang Anda pilih.
                            </div>
                        </div>
                        <div class="col-auto">
                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahKrsModal">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                    <path d="M12 5l0 14" />
                                    <path d="M5 12l14 0" />
                                </svg>
                                Tambah Mata Kuliah
                            </button>
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>

<!-- Modal Tambah KRS -->
<div class="modal modal-blur fade" id="tambahKrsModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Mata Kuliah</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('mahasiswa.akademik.krs.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Pilih Mata Kuliah</label>
                        <select class="form-select" name="mata_kuliah_id" required>
                            <option value="">-- Pilih Mata Kuliah --</option>
                            @foreach($availableCourses as $course)
                                <option value="{{ $course->id }}">
                                    {{ $course->kode_mk }} - {{ $course->nama }} ({{ $course->sks }} SKS) - {{ $course->kelas->nama_kelas ?? 'Kelas Belum Ditetapkan' }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div id="kelasOptions">
                        <!-- Dynamic class options will be loaded here -->
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-link link-secondary" data-bs-dismiss="modal">
                        Batal
                    </button>
                    <button type="submit" class="btn btn-primary ms-auto">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                            <path d="M12 5l0 14" />
                            <path d="M5 12l14 0" />
                        </svg>
                        Tambah ke KRS
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Hapus KRS -->
<div class="modal modal-blur fade" id="hapusKrsModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="modal-status bg-danger"></div>
            <div class="modal-body text-center py-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon mb-2 text-danger icon-lg" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                    <path d="M12 9v4" />
                    <path d="M10.363 3.591l-8.106 13.534a1.914 1.914 0 0 0 1.636 2.871h16.214a1.914 1.914 0 0 0 1.636 -2.87l-8.106 -13.536a1.914 1.914 0 0 0 -3.274 0z" />
                    <path d="M12 16h.01" />
                </svg>
                <h3>Apakah Anda yakin?</h3>
                <div class="text-muted">
                    Anda akan membatalkan pengambilan mata kuliah ini. Tindakan ini tidak dapat dibatalkan.
                </div>
            </div>
            <div class="modal-footer">
                <div class="w-100">
                    <div class="row">
                        <div class="col">
                            <button type="button" class="btn btn-white w-100" data-bs-dismiss="modal">
                                Batal
                            </button>
                        </div>
                        <div class="col">
                            <form id="hapusKrsForm" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger w-100">
                                    Ya, Batalkan
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Handle delete button click
        $('#hapusKrsModal').on('show.bs.modal', function(event) {
            const button = $(event.relatedTarget);
            const krsId = button.data('id');
            const modal = $(this);
            
            // Update form action URL
            modal.find('form').attr('action', '{{ route("mahasiswa.akademik.krs.destroy", "") }}/' + krsId);
        });
        
        // Load class options when course is selected
        $('select[name="mata_kuliah_id"]').on('change', function() {
            const courseId = $(this).val();
            const kelasOptions = $('#kelasOptions');
            
            if (!courseId) {
                kelasOptions.html('');
                return;
            }
            
            // Show loading state
            kelasOptions.html(`
                <div class="d-flex justify-content-center my-3">
                    <div class="spinner-border" role="status">
                        <span class="visually-hidden">Memuat...</span>
                    </div>
                </div>
            `);
            
            // Fetch available classes for the selected course
            $.get(`/api/mata-kuliah/${courseId}/kelas`, function(data) {
                let html = '';
                
                if (data.length > 0) {
                    html = `
                        <div class="mb-3">
                            <label class="form-label">Pilih Kelas</label>
                            <select class="form-select" name="kelas_id" required>
                                <option value="">-- Pilih Kelas --</option>
                                ${data.map(kelas => `
                                    <option value="${kelas.id}">
                                        ${kelas.nama_kelas} - ${kelas.dosen ? kelas.dosen.nama_lengkap : 'Dosen Belum Ditetapkan'}
                                    </option>
                                `).join('')}
                            </select>
                        </div>
                    `;
                } else {
                    html = `
                        <div class="alert alert-warning">
                            Tidak ada kelas yang tersedia untuk mata kuliah ini.
                        </div>
                    `;
                }
                
                kelasOptions.html(html);
            }).fail(function() {
                kelasOptions.html(`
                    <div class="alert alert-danger">
                        Gagal memuat data kelas. Silakan coba lagi.
                    </div>
                `);
            });
        });
    });
</script>
@endpush
