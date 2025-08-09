@extends('core-theme::layouts.app')

@section('title', 'Nilai & IPK')

@push('styles')
<style>
    .gpa-card {
        text-align: center;
        padding: 1.5rem;
        border-radius: 8px;
        margin-bottom: 1.5rem;
        background: linear-gradient(135deg, #4f46e5 0%, #7c3aed 100%);
        color: white;
        box-shadow: 0 4px 6px -1px rgba(79, 70, 229, 0.2), 0 2px 4px -1px rgba(79, 70, 229, 0.1);
    }
    .gpa-value {
        font-size: 3.5rem;
        font-weight: 700;
        line-height: 1;
        margin: 0.5rem 0;
    }
    .gpa-label {
        font-size: 1rem;
        opacity: 0.9;
        margin-bottom: 0.5rem;
    }
    .gpa-sks {
        font-size: 0.875rem;
        opacity: 0.8;
        margin-top: 0.5rem;
    }
    .semester-card {
        margin-bottom: 1.5rem;
        transition: all 0.2s ease-in-out;
    }
    .semester-card:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
    }
    .semester-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 1rem 1.5rem;
        background-color: #f9fafb;
        border-top-left-radius: 8px;
        border-top-right-radius: 8px;
        border-bottom: 1px solid #e5e7eb;
    }
    .semester-title {
        font-weight: 600;
        margin: 0;
        color: #1f2937;
    }
    .semester-ips {
        font-weight: 700;
        color: #4f46e5;
    }
    .grade-A { background-color: #dcfce7; color: #166534; }
    .grade-B { background-color: #dcfce7; color: #166534; }
    .grade-C { background-color: #fef3c7; color: #92400e; }
    .grade-D { background-color: #fee2e2; color: #991b1b; }
    .grade-E { background-color: #fee2e2; color: #991b1b; }
    .grade-F { background-color: #fee2e2; color: #991b1b; }
    .grade-pending { background-color: #f3f4f6; color: #4b5563; }
    .no-nilai {
        text-align: center;
        padding: 2rem;
        background-color: #f9fafb;
        border-radius: 8px;
        color: #6b7280;
    }
</style>
@endpush

@section('content')
<div class="container-fluid">
    <!-- Page title -->
    <div class="page-header d-print-none">
        <div class="row align-items-center">
            <div class="col">
                <h2 class="page-title">
                    Nilai & IPK
                </h2>
                <div class="text-muted mt-1">
                    Transkrip Nilai Akademik
                </div>
            </div>
            <div class="col-auto ms-auto d-print-none">
                <div class="btn-list">
                    <a href="#" class="btn btn-outline-primary d-none d-sm-inline-block" onclick="window.print()">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                            <path d="M17 17h2a2 2 0 0 0 2 -2v-4a2 2 0 0 0 -2 -2h-14a2 2 0 0 0 -2 2v4a2 2 0 0 0 2 2h2" />
                            <path d="M17 9v-4a2 2 0 0 0 -2 -2h-6a2 2 0 0 0 -2 2v4" />
                            <rect x="7" y="13" width="10" height="8" rx="2" />
                        </svg>
                        Cetak Transkrip
                    </a>
                    <a href="#" class="btn btn-primary d-sm-none btn-icon" onclick="window.print()">
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
        <!-- IPK Card -->
        <div class="col-md-6 col-lg-4">
            <div class="gpa-card">
                <div class="gpa-label">Indeks Prestasi Kumulatif</div>
                <div class="gpa-value">{{ $ipk }}</div>
                <div class="gpa-sks">Total {{ $totalSks }} SKS</div>
            </div>
        </div>
        
        <!-- Legend -->
        <div class="col-md-6 col-lg-8">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">Keterangan</h3>
                    <div class="row g-3">
                        <div class="col-6 col-md-4">
                            <div class="d-flex align-items-center">
                                <span class="badge bg-primary-lt me-2">A</span>
                                <span>80-100 (4.00)</span>
                            </div>
                        </div>
                        <div class="col-6 col-md-4">
                            <div class="d-flex align-items-center">
                                <span class="badge bg-success-lt me-2">B</span>
                                <span>70-79 (3.00-3.99)</span>
                            </div>
                        </div>
                        <div class="col-6 col-md-4">
                            <div class="d-flex align-items-center">
                                <span class="badge bg-warning-lt me-2">C</span>
                                <span>60-69 (2.00-2.99)</span>
                            </div>
                        </div>
                        <div class="col-6 col-md-4">
                            <div class="d-flex align-items-center">
                                <span class="badge bg-danger-lt me-2">D</span>
                                <span>50-59 (1.00-1.99)</span>
                            </div>
                        </div>
                        <div class="col-6 col-md-4">
                            <div class="d-flex align-items-center">
                                <span class="badge bg-dark-lt me-2">E</span>
                                <span>0-49 (0.00-0.99)</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Semester List -->
    <div class="row mt-4">
        <div class="col-12">
            <h2 class="page-title mb-3">
                Riwayat Nilai per Semester
            </h2>
            
            @if(empty($semesters) || count($semesters) == 0)
                <div class="card">
                    <div class="card-body">
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
                            <p class="empty-title">Tidak ada data nilai</p>
                            <p class="empty-subtitle text-muted">
                                Belum ada data nilai yang tersedia.
                            </p>
                        </div>
                    </div>
                </div>
            @else
                @foreach($semesters as $semesterId => $semester)
                    @php
                        $semesterData = $semester->first()->tahunAkademik;
                        
                        // Calculate IPS (Indeks Prestasi Semester)
                        $totalSks = 0;
                        $totalNilai = 0;
                        
                        foreach ($semester as $nilai) {
                            $bobot = 0;
                            $nilaiAngka = $nilai->nilai_angka;
                            
                            if ($nilaiAngka >= 80) $bobot = 4.0;
                            elseif ($nilaiAngka >= 75) $bobot = 3.75;
                            elseif ($nilaiAngka >= 70) $bobot = 3.5;
                            elseif ($nilaiAngka >= 65) $bobot = 3.0;
                            elseif ($nilaiAngka >= 60) $bobot = 2.75;
                            elseif ($nilaiAngka >= 55) $bobot = 2.5;
                            elseif ($nilaiAngka >= 50) $bobot = 2.0;
                            elseif ($nilaiAngka >= 40) $bobot = 1.0;
                            
                            $totalNilai += $bobot * $nilai->mataKuliah->sks;
                            $totalSks += $nilai->mataKuliah->sks;
                        }
                        
                        $ips = $totalSks > 0 ? $totalNilai / $totalSks : 0;
                    @endphp
                    
                    <div class="card semester-card">
                        <div class="semester-header">
                            <h3 class="semester-title">{{ $semesterData->nama }} - {{ $semesterData->tahun_ajaran }}</h3>
                            <div class="semester-ips">IPS: {{ number_format($ips, 2) }}</div>
                        </div>
                        <div class="table-responsive
                        <table class="table card-table table-vcenter text-nowrap">
                            <thead>
                                <tr>
                                    <th>Kode MK</th>
                                    <th>Mata Kuliah</th>
                                    <th class="text-center">SKS</th>
                                    <th class="text-center">Nilai</th>
                                    <th class="text-center">Grade</th>
                                    <th class="text-center">Bobot</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($semester as $nilai)
                                    @php
                                        $nilaiAngka = $nilai->nilai_angka;
                                        $grade = '';
                                        $bobot = 0;
                                        
                                        if ($nilaiAngka >= 80) {
                                            $grade = 'A';
                                            $bobot = 4.0;
                                        } elseif ($nilaiAngka >= 75) {
                                            $grade = 'A-';
                                            $bobot = 3.75;
                                        } elseif ($nilaiAngka >= 70) {
                                            $grade = 'B+';
                                            $bobot = 3.5;
                                        } elseif ($nilaiAngka >= 65) {
                                            $grade = 'B';
                                            $bobot = 3.0;
                                        } elseif ($nilaiAngka >= 60) {
                                            $grade = 'B-';
                                            $bobot = 2.75;
                                        } elseif ($nilaiAngka >= 55) {
                                            $grade = 'C+';
                                            $bobot = 2.5;
                                        } elseif ($nilaiAngka >= 50) {
                                            $grade = 'C';
                                            $bobot = 2.0;
                                        } elseif ($nilaiAngka >= 40) {
                                            $grade = 'D';
                                            $bobot = 1.0;
                                        } else {
                                            $grade = 'E';
                                            $bobot = 0.0;
                                        }
                                        
                                        $gradeClass = 'grade-' . substr($grade, 0, 1);
                                    @endphp
                                    
                                    <tr>
                                        <td>{{ $nilai->mataKuliah->kode_mk }}</td>
                                        <td>{{ $nilai->mataKuliah->nama }}</td>
                                        <td class="text-center">{{ $nilai->mataKuliah->sks }}</td>
                                        <td class="text-center">{{ $nilaiAngka }}</td>
                                        <td class="text-center">
                                            <span class="badge {{ $gradeClass }}">{{ $grade }}</span>
                                        </td>
                                        <td class="text-center">{{ number_format($bobot, 2) }}</td>
                                    </tr>
                                @endforeach
                                <tr class="table-light">
                                    <td colspan="2" class="text-end fw-bold">Total SKS:</td>
                                    <td class="text-center fw-bold">{{ $totalSks }}</td>
                                    <td colspan="3"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Add print functionality
        document.querySelectorAll('.print-transcript').forEach(button => {
            button.addEventListener('click', function() {
                window.print();
            });
        });
        
        // Add expand/collapse functionality for semester cards
        document.querySelectorAll('.semester-header').forEach(header => {
            header.addEventListener('click', function() {
                const card = this.closest('.semester-card');
                const table = card.querySelector('table');
                
                if (table.style.display === 'none') {
                    table.style.display = 'table';
                    this.querySelector('i').classList.remove('fa-chevron-down');
                    this.querySelector('i').classList.add('fa-chevron-up');
                } else {
                    table.style.display = 'none';
                    this.querySelector('i').classList.remove('fa-chevron-up');
                    this.querySelector('i').classList.add('fa-chevron-down');
                }
            });
        });
    });
</script>
@endpush
