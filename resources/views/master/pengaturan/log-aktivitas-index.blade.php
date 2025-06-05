@extends('core-themes.core-backpage')

@section('custom-css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
    <style>
        /* Stats cards */
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

        /* Card styling */
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

        /* Table styling */
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

        /* Badge styling */
        .badge {
            padding: 0.5em 0.75em;
            font-weight: 500;
        }

        /* Filter form */
        .filter-form {
            background: #f8f9fa;
            padding: 1rem;
            border-radius: 10px;
            margin-bottom: 1rem;
        }

        /* Responsive styling */
        @media screen and (max-width: 768px) {
            .table td[data-label] {
                text-align: right;
                padding-left: 50%;
            }
            .table td[data-label]:before {
                content: attr(data-label);
                position: absolute;
                left: 0;
                width: 45%;
                padding-left: 1rem;
                font-weight: bold;
            }
        }
    </style>
@endsection

@section('content')
    <div class="row">
        <!-- Main Content -->
        <div class="col-lg-8 col-12 mb-2">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">{{ $pages }}</h5>
                    <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#filterForm" aria-expanded="false" aria-controls="filterForm">
                        <i class="fas fa-filter me-2"></i>Filter Log
                    </button>
                </div>
                <div class="card-body">
                    <!-- Quick Stats -->
                    <div class="row mb-4">
                        <div class="col-md-3 mb-2">
                            <div class="p-3 bg-light-primary rounded">
                                <h6 class="mb-2">Total Log</h6>
                                <h3 class="mb-0">{{ $totalLogs }}</h3>
                            </div>
                        </div>
                        <div class="col-md-3 mb-2">
                            <div class="p-3 bg-light-success rounded">
                                <h6 class="mb-2">User</h6>
                                <h3 class="mb-0">{{ $userLogs }}</h3>
                            </div>
                        </div>
                        <div class="col-md-3 mb-2">
                            <div class="p-3 bg-light-warning rounded">
                                <h6 class="mb-2">Mahasiswa</h6>
                                <h3 class="mb-0">{{ $mahasiswaLogs }}</h3>
                            </div>
                        </div>
                        <div class="col-md-3 mb-2">
                            <div class="p-3 bg-light-info rounded">
                                <h6 class="mb-2">Dosen</h6>
                                <h3 class="mb-0">{{ $dosenLogs }}</h3>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Filter Form -->
                    <div class="collapse" id="filterForm">
                        <div class="card card-body border mb-3">
                            <form action="{{ route($spref . 'pengaturan.log-aktivitas-filter') }}" method="GET">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="user_type" class="form-label">Tipe User</label>
                                        <select class="form-select" name="user_type" id="user_type">
                                            <option value="">Semua Tipe</option>
                                            <option value="user">Administrator</option>
                                            <option value="mahasiswa">Mahasiswa</option>
                                            <option value="dosen">Dosen</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="action" class="form-label">Aksi</label>
                                        <select class="form-select" name="action" id="action">
                                            <option value="">Semua Aksi</option>
                                            <option value="create">Membuat</option>
                                            <option value="update">Mengubah</option>
                                            <option value="delete">Menghapus</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="start_date" class="form-label">Tanggal Mulai</label>
                                        <input type="date" class="form-control" name="start_date" id="start_date">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="end_date" class="form-label">Tanggal Akhir</label>
                                        <input type="date" class="form-control" name="end_date" id="end_date">
                                    </div>
                                    <div class="col-12 d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fas fa-filter me-2"></i>Terapkan Filter
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    
                    <!-- Table -->
                    <div class="table-responsive mt-3">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th>User</th>
                                    <th>Aksi</th>
                                    <th>Deskripsi</th>
                                    <th>Waktu</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($logs as $key => $log)
                                    <tr>
                                        <td data-label="No">{{ ++$key }}</td>
                                        <td data-label="User">
                                            <div class="d-flex flex-column">
                                                <span class="fw-bold">{{ $log->user ? $log->user->name : 'User tidak ditemukan' }}</span>
                                                <small class="text-muted">{{ $log->userTypeDescription }}</small>
                                            </div>
                                        </td>
                                        <td data-label="Aksi">
                                            <span class="badge {{ $log->action == 'create' ? 'bg-light-success text-success' : ($log->action == 'update' ? 'bg-light-warning text-warning' : 'bg-light-danger text-danger') }}">
                                                {{ $log->actionDescription }}
                                            </span>
                                        </td>
                                        <td data-label="Deskripsi">{{ $log->description }}</td>
                                        <td data-label="Waktu">{{ $log->created_at->format('d/m/Y H:i') }}</td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <a href="{{ route($spref . 'pengaturan.log-aktivitas-view', $log->id) }}" class="btn btn-sm btn-info" data-bs-toggle="tooltip" title="Lihat Detail">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                @if(now()->diffInDays($log->created_at) >= 30)
                                                    <form action="{{ route($spref . 'pengaturan.log-aktivitas-delete', $log->id) }}" method="POST" class="d-inline" id="delete-form-{{ $log->id }}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="button" class="btn btn-sm btn-danger" data-confirm-delete="true" data-bs-toggle="tooltip" title="Hapus Log" onclick="confirmDelete('{{ $log->id }}')">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    </form>
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Sidebar Content -->
        <div class="col-lg-4 col-12 mb-2">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Informasi Log Aktivitas</h5>
                </div>
                <div class="card-body">
                    <p>Bagian ini menampilkan informasi dan petunjuk terkait pengelolaan Log Aktivitas.</p>
                    
                    <div class="alert alert-light-info">
                        <h6 class="">Petunjuk Penggunaan:</h6>
                        <ul class="mb-0">
                            <li>Gunakan filter untuk mencari log spesifik</li>
                            <li>Klik ikon <i class="fas fa-eye"></i> untuk melihat detail log</li>
                            <li>Log yang berumur lebih dari 30 hari dapat dihapus</li>
                        </ul>
                    </div>
                    
                    <div class="mt-4">
                        <h6>Statistik Aktivitas</h6>
                        <div class="list-group">
                            <div class="list-group-item">
                                <div class="d-flex w-100 justify-content-between">
                                    <h6 class="mb-1">Aktivitas Terbanyak</h6>
                                    <small class="text-muted">
                                        @php
                                            $actionCounts = $logs->groupBy('action')->map->count();
                                            $mostFrequentAction = $actionCounts->sortDesc()->keys()->first();
                                            $actionDescriptions = [
                                                'create' => 'Membuat',
                                                'update' => 'Mengubah',
                                                'delete' => 'Menghapus'
                                            ];
                                        @endphp
                                        {{ $mostFrequentAction ? ($actionDescriptions[$mostFrequentAction] ?? $mostFrequentAction) : '-' }}
                                    </small>
                                </div>
                            </div>
                            <div class="list-group-item">
                                <div class="d-flex w-100 justify-content-between">
                                    <h6 class="mb-1">User Paling Aktif</h6>
                                    <small class="text-muted">
                                        @php
                                            $userCounts = $logs->groupBy('user_id')->map->count();
                                            $mostActiveUserId = $userCounts->sortDesc()->keys()->first();
                                            $mostActiveUser = $mostActiveUserId ? $logs->firstWhere('user_id', $mostActiveUserId)?->user : null;
                                        @endphp
                                        {{ $mostActiveUser ? $mostActiveUser->name : '-' }}
                                    </small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('custom-js')
    <script src="{{ asset('dist') }}/assets/extensions/jquery/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>

    <script>
        // Initialize DataTable
        $(document).ready(function() {
            $('.table').DataTable({
                language: {
                    search: "Cari:",
                    lengthMenu: "Tampilkan _MENU_ data per halaman",
                    zeroRecords: "Data tidak ditemukan",
                    info: "Menampilkan halaman _PAGE_ dari _PAGES_",
                    infoEmpty: "Tidak ada data yang tersedia",
                    infoFiltered: "(difilter dari _MAX_ total data)",
                    paginate: {
                        first: "Pertama",
                        last: "Terakhir",
                        next: "Selanjutnya",
                        previous: "Sebelumnya"
                    }
                },
                responsive: true,
                pageLength: 10,
                lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "Semua"]],
                order: [[4, 'desc']], // Sort by time column by default
                columnDefs: [
                    { orderable: false, targets: -1 }
                ]
            });
        });

        // Konfirmasi delete dengan SweetAlert
        function confirmDelete(id) {
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Log aktivitas yang dihapus tidak dapat dikembalikan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete-form-' + id).submit();
                }
            });
        }
    </script>
@endsection