@extends('core-themes.core-backpage')

@section('custom-css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
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

        .table {
            margin-bottom: 0;
        }

        .table thead th {
            border-top: none;
            border-bottom: 2px solid rgba(0,0,0,0.05);
            font-weight: 600;
            color: #6c757d;
            padding-top: 1rem;
            padding-bottom: 0.75rem;
        }

        .table td {
            vertical-align: middle;
            padding-top: 0.75rem;
            padding-bottom: 0.75rem;
        }

        .badge {
            padding: 0.5em 0.75em;
            font-weight: 500;
        }

        .btn {
            padding: 0.5rem 1rem;
            border-radius: 5px;
        }

        .btn-sm {
            padding: 0.25rem 0.5rem;
        }

        .info-item {
            margin-bottom: 1rem;
        }

        .info-label {
            font-weight: 600;
            color: #6c757d;
            margin-bottom: 0.25rem;
        }

        .info-value {
            font-size: 1.1rem;
            color: #495057;
        }

        .ipk-display {
            font-size: 2rem;
            font-weight: bold;
            text-align: center;
        }

        .bg-light-primary {
            background-color: rgba(67, 94, 190, 0.1);
        }

        .bg-light-success {
            background-color: rgba(40, 167, 69, 0.1);
        }

        .bg-light-warning {
            background-color: rgba(255, 193, 7, 0.1);
        }

        .bg-light-info {
            background-color: rgba(23, 162, 184, 0.1);
        }

        .bg-light-danger {
            background-color: rgba(220, 53, 69, 0.1);
        }

        @media (max-width: 768px) {
            .table-responsive table,
            .table-responsive thead,
            .table-responsive tbody,
            .table-responsive th,
            .table-responsive td,
            .table-responsive tr {
                display: block;
                width: 100%;
            }
            .table-responsive thead {
                display: none;
            }
            .table-responsive tr {
                margin-bottom: 1rem;
                border-bottom: 2px solid #eee;
            }
            .table-responsive td {
                position: relative;
                padding-left: 50%;
                text-align: left !important;
                border: none;
                border-bottom: 1px solid #eee;
            }
            .table-responsive td:before {
                position: absolute;
                top: 0;
                left: 0;
                width: 48%;
                padding-left: 1rem;
                white-space: nowrap;
                font-weight: bold;
                color: #888;
                content: attr(data-label);
            }
        }
    </style>
@endsection

@section('content')
    <div class="row">
        <div class="col-12 mb-3">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h4 class="mb-1">Detail KHS - {{ $khs->mahasiswa->name }}</h4>
                    <p class="text-muted mb-0">{{ $khs->mahasiswa->nim }} | {{ $khs->tahunAkademik->name }} - {{ $khs->tahunAkademik->semester }} | Semester {{ $khs->semester }}</p>
                </div>
                <div class="d-flex gap-2">
                    <a href="{{ route($spref . 'akademik.khs-render') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left me-2"></i>Kembali
                    </a>
                    @if (in_array($khs->status, ['published']))
                        <a href="{{ route($spref . 'akademik.khs-print', $khs->code) }}" class="btn btn-primary" target="_blank">
                            <i class="fas fa-print me-2"></i>Cetak KHS
                        </a>
                        <a href="{{ route($spref . 'akademik.khs-transkrip', $khs->mahasiswa->code) }}" class="btn btn-info" target="_blank">
                            <i class="fas fa-file-alt me-2"></i>Transkrip
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- KHS Information & Summary -->
        <div class="col-lg-4 col-12 mb-3">
            <!-- KHS Info -->
            <div class="card mb-3">
                <div class="card-header">
                    <h6 class="mb-0">Informasi KHS</h6>
                </div>
                <div class="card-body">
                    <div class="info-item">
                        <div class="info-label">Mahasiswa</div>
                        <div class="info-value">{{ $khs->mahasiswa->name }}</div>
                    </div>
                    <div class="info-item">
                        <div class="info-label">NIM</div>
                        <div class="info-value">{{ $khs->mahasiswa->nim }}</div>
                    </div>
                    <div class="info-item">
                        <div class="info-label">Program Studi</div>
                        <div class="info-value">{{ $khs->mahasiswa->programStudi->name ?? '-' }}</div>
                    </div>
                    <div class="info-item">
                        <div class="info-label">Tahun Akademik</div>
                        <div class="info-value">{{ $khs->tahunAkademik->name }} - {{ $khs->tahunAkademik->semester }}</div>
                    </div>
                    <div class="info-item">
                        <div class="info-label">Semester</div>
                        <div class="info-value">{{ $khs->semester }}</div>
                    </div>
                    <div class="info-item">
                        <div class="info-label">Status</div>
                        <div class="info-value">
                            @php
                                $statusColors = [
                                    'draft' => 'secondary',
                                    'published' => 'primary',
                                    'locked' => 'dark'
                                ];
                                $statusLabels = [
                                    'draft' => 'Draft',
                                    'published' => 'Published',
                                    'locked' => 'Locked'
                                ];
                            @endphp
                            <span class="badge bg-{{ $statusColors[$khs->status] ?? 'secondary' }} fs-6">
                                {{ $statusLabels[$khs->status] ?? ucfirst($khs->status) }}
                            </span>
                        </div>
                    </div>
                    <div class="info-item">
                        <div class="info-label">Dibuat</div>
                        <div class="info-value">{{ $khs->created_at->format('d/m/Y H:i') }}</div>
                    </div>
                    @if ($khs->published_at)
                        <div class="info-item">
                            <div class="info-label">Dipublish</div>
                            <div class="info-value">{{ $khs->published_at->format('d/m/Y H:i') }}</div>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Academic Summary -->
            <div class="card mb-3">
                <div class="card-header">
                    <h6 class="mb-0">Ringkasan Akademik</h6>
                </div>
                <div class="card-body">
                    <div class="row text-center">
                        <div class="col-6 mb-3">
                            <div class="p-3 bg-light-info rounded">
                                <h4 class="mb-1">{{ $khs->total_sks_tempuh }}</h4>
                                <small class="text-muted">SKS Tempuh</small>
                            </div>
                        </div>
                        <div class="col-6 mb-3">
                            <div class="p-3 bg-light-success rounded">
                                <h4 class="mb-1">{{ $khs->total_sks_lulus }}</h4>
                                <small class="text-muted">SKS Lulus</small>
                            </div>
                        </div>
                        <div class="col-6 mb-3">
                            <div class="p-3 bg-light-warning rounded">
                                @php
                                    $ipsColor = 'danger';
                                    if ($khs->ips >= 3.5) $ipsColor = 'success';
                                    elseif ($khs->ips >= 3.0) $ipsColor = 'info';
                                    elseif ($khs->ips >= 2.5) $ipsColor = 'warning';
                                @endphp
                                <h4 class="mb-1 text-{{ $ipsColor }}">{{ number_format($khs->ips, 2) }}</h4>
                                <small class="text-muted">IPS</small>
                            </div>
                        </div>
                        <div class="col-6 mb-3">
                            <div class="p-3 bg-light-primary rounded">
                                @php
                                    $ipkColor = 'danger';
                                    if ($khs->ipk >= 3.5) $ipkColor = 'success';
                                    elseif ($khs->ipk >= 3.0) $ipkColor = 'info';
                                    elseif ($khs->ipk >= 2.5) $ipkColor = 'warning';
                                @endphp
                                <h4 class="mb-1 text-{{ $ipkColor }}">{{ number_format($khs->ipk, 2) }}</h4>
                                <small class="text-muted">IPK</small>
                            </div>
                        </div>
                    </div>

                    <!-- Grade Distribution -->
                    <div class="mt-3">
                        <h6 class="text-muted mb-2">Distribusi Nilai</h6>
                        @php
                            $gradeDistribution = [
                                'A' => 0, 'A-' => 0, 'B+' => 0, 'B' => 0,
                                'B-' => 0, 'C+' => 0, 'C' => 0, 'D' => 0, 'E' => 0
                            ];

                            foreach ($khs_nilai as $nilai) {
                                if (isset($gradeDistribution[$nilai->nilai_huruf])) {
                                    $gradeDistribution[$nilai->nilai_huruf]++;
                                }
                            }
                        @endphp
                        <div class="row">
                            @foreach ($gradeDistribution as $grade => $count)
                                @if ($count > 0)
                                    <div class="col-4 mb-1">
                                        <div class="d-flex justify-content-between">
                                            <small>{{ $grade }}</small>
                                            <small class="badge bg-secondary">{{ $count }}</small>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <!-- Actions -->
            @if (in_array($khs->status, ['draft', 'published']) && !in_array($khs->status, ['locked']))
                <div class="card">
                    <div class="card-header">
                        <h6 class="mb-0">Aksi</h6>
                    </div>
                    <div class="card-body">
                        <div class="d-grid gap-2">
                            @if ($khs->status == 'draft')
                                <button class="btn btn-success" onclick="publishKHS()">
                                    <i class="fas fa-share me-2"></i>Publish KHS
                                </button>
                            @endif
                            @if ($khs->status == 'published')
                                <button class="btn btn-dark" onclick="lockKHS()">
                                    <i class="fas fa-lock me-2"></i>Kunci KHS
                                </button>
                            @endif
                        </div>
                    </div>
                </div>
            @endif
        </div>

        <!-- KHS Details -->
        <div class="col-lg-8 col-12">
            <div class="card">
                <div class="card-header">
                    <h6 class="mb-0">Detail Nilai Mata Kuliah</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Kode MK</th>
                                    <th>Mata Kuliah</th>
                                    <th class="text-center">SKS</th>
                                    <th class="text-center">Nilai</th>
                                    <th class="text-center">Grade</th>
                                    <th class="text-center">Bobot</th>
                                    <th class="text-center">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($khs_nilai as $nilai)
                                    <tr>
                                        <td data-label="Kode MK">{{ $nilai->mataKuliah->code }}</td>
                                        <td data-label="Mata Kuliah">
                                            <div class="d-flex flex-column">
                                                <strong>{{ $nilai->mataKuliah->name }}</strong>
                                                <small class="text-muted">Semester {{ $nilai->mataKuliah->semester }}</small>
                                            </div>
                                        </td>
                                        <td class="text-center" data-label="SKS">
                                            <span class="badge bg-info">{{ $nilai->mataKuliah->sks }}</span>
                                        </td>
                                        <td class="text-center" data-label="Nilai">
                                            <span class="badge bg-secondary">{{ $nilai->nilai_angka ?? 'N/A' }}</span>
                                        </td>
                                        <td class="text-center" data-label="Grade">
                                            @php
                                                $gradeColors = [
                                                    'A' => 'success', 'A-' => 'success',
                                                    'B+' => 'info', 'B' => 'info', 'B-' => 'info',
                                                    'C+' => 'warning', 'C' => 'warning',
                                                    'D' => 'danger', 'E' => 'danger'
                                                ];
                                            @endphp
                                            <span class="badge bg-{{ $gradeColors[$nilai->nilai_huruf] ?? 'secondary' }}">
                                                {{ $nilai->nilai_huruf }} ({{ $nilai->grade_point }})
                                            </span>
                                        </td>
                                        <td class="text-center" data-label="Bobot">
                                            {{ $nilai->mataKuliah->sks * $nilai->grade_point }}
                                        </td>
                                        <td class="text-center" data-label="Status">
                                            @php
                                                $statusColors = [
                                                    'lulus' => 'success',
                                                    'tidak_lulus' => 'danger',
                                                    'mengulang' => 'warning'
                                                ];
                                                $statusLabels = [
                                                    'lulus' => 'Lulus',
                                                    'tidak_lulus' => 'Tidak Lulus',
                                                    'mengulang' => 'Mengulang'
                                                ];
                                            @endphp
                                            <span class="badge bg-{{ $statusColors[$nilai->status_lulus] ?? 'secondary' }}">
                                                {{ $statusLabels[$nilai->status_lulus] ?? ucfirst($nilai->status_lulus) }}
                                            </span>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center text-muted">
                                            Belum ada nilai yang tercatat untuk semester ini
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                            @if ($khs_nilai->count() > 0)
                                <tfoot>
                                    <tr class="table-light">
                                        <td colspan="2"><strong>Total</strong></td>
                                        <td class="text-center"><strong>{{ $khs->total_sks_tempuh }}</strong></td>
                                        <td class="text-center">-</td>
                                        <td class="text-center">-</td>
                                        <td class="text-center"><strong>{{ $khs->total_sks_tempuh * $khs->ips }}</strong></td>
                                        <td class="text-center">-</td>
                                    </tr>
                                    <tr class="table-info">
                                        <td colspan="6"><strong>IPS (Indeks Prestasi Semester)</strong></td>
                                        <td class="text-center">
                                            <strong class="text-primary fs-5">{{ number_format($khs->ips, 2) }}</strong>
                                        </td>
                                    </tr>
                                    <tr class="table-primary">
                                        <td colspan="6"><strong>IPK (Indeks Prestasi Kumulatif)</strong></td>
                                        <td class="text-center">
                                            <strong class="text-success fs-5">{{ number_format($khs->ipk, 2) }}</strong>
                                        </td>
                                    </tr>
                                </tfoot>
                            @endif
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('custom-js')
    <script>
        function publishKHS() {
            if (confirm('Apakah Anda yakin ingin mempublish KHS ini?')) {
                const form = document.createElement('form');
                form.method = 'POST';
                form.action = '{{ route($spref . "akademik.khs-publish", $khs->code) }}';

                const csrfToken = document.createElement('input');
                csrfToken.type = 'hidden';
                csrfToken.name = '_token';
                csrfToken.value = '{{ csrf_token() }}';
                form.appendChild(csrfToken);

                document.body.appendChild(form);
                form.submit();
            }
        }

        function lockKHS() {
            if (confirm('Apakah Anda yakin ingin mengunci KHS ini? KHS yang dikunci tidak dapat diubah lagi.')) {
                const form = document.createElement('form');
                form.method = 'POST';
                form.action = '{{ route($spref . "akademik.khs-lock", $khs->code) }}';

                const csrfToken = document.createElement('input');
                csrfToken.type = 'hidden';
                csrfToken.name = '_token';
                csrfToken.value = '{{ csrf_token() }}';
                form.appendChild(csrfToken);

                document.body.appendChild(form);
                form.submit();
            }
        }
    </script>
@endsection
