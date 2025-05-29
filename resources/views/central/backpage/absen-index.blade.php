@extends('core-themes.core-backpage')

@section('custom-css')
    <style>
        .absensi-card {
            border-radius: 15px;
            transition: all 0.3s ease;
        }

        .absensi-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .time-display {
            font-size: 2.5rem;
            font-weight: 600;
            color: #4b6cb7;
        }

        .date-display {
            font-size: 1.2rem;
            color: #6c757d;
        }

        .status-badge {
            padding: 0.5rem 1rem;
            border-radius: 20px;
            font-weight: 500;
        }

        .photo-preview {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 10px;
        }

        .type-select {
            border-radius: 10px;
            padding: 0.5rem;
        }

        .history-item {
            border-left: 3px solid #4b6cb7;
            padding: 1rem;
            margin-bottom: 1rem;
            background: #f8f9fa;
            border-radius: 0 8px 8px 0;
        }

        /* .form-label, .form-control {
            margin-top: 0 !important;
        } */

    </style>
@endsection

@section('content')

        <!-- Welcome Section -->
        <div class="row mb-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="flex-shrink-0">
                                <img src="{{ $user->photo }}" alt="Profile" class="rounded-circle" style="width: 64px; height: 64px; object-fit: cover;">
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h4 class="mb-1">Welcome, {{ $user->name }}!</h4>
                                <p class="text-muted mb-0">Silahkan lakukan absensi sesuai dengan jadwal kerja Anda.</p>
                            </div>
                            <div class="flex-shrink-0">
                                <div class="time-display" id="current-time">00:00:00</div>
                                <div class="date-display" id="current-date">{{ date('l, d F Y') }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Absensi Cards -->
        <div class="row mb-4">
            <!-- Check In Card -->
            <div class="col-md-6">
                <div class="card absensi-card">
                    <div class="card-header bg-primary text-white">
                        <h5 class="card-title mb-0">Absen Masuk</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route($spref . 'absensi-handle') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Jenis Absensi</label>
                                <select name="type" class="form-select type-select" required>
                                    <option value="0">Absen Regular</option>
                                    <option value="1">Absen Lembur</option>
                                    <option value="2">Absen Sakit</option>
                                    <option value="3">Keperluan Berobat</option>
                                    <option value="4">Masuk Telat</option>
                                    <option value="5">Pulang Awal</option>
                                    <option value="6">Keperluan Pribadi</option>
                                    <option value="7">Cuti Tahunan</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Tanggal</label>
                                <input type="date" name="date" class="form-control" value="{{ date('Y-m-d') }}" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Waktu Masuk</label>
                                <input type="time" name="time_in" class="form-control" value="{{ date('H:i') }}" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Foto Selfie</label>
                                <input type="file" name="photo_in" class="form-control" accept="image/*" required>
                                <small class="text-muted">Pastikan wajah Anda terlihat jelas dalam foto</small>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Keterangan</label>
                                <textarea name="desc" class="form-control" rows="3" placeholder="Tambahkan keterangan jika diperlukan"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">
                                <i class="fas fa-sign-in-alt me-2"></i> Absen Masuk
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Check Out Card -->
            <div class="col-md-6">
                <div class="card absensi-card">
                    <div class="card-header bg-success text-white">
                        <h5 class="card-title mb-0">Absen Pulang</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route($spref . 'absensi-update', ['code' => 'CODE']) }}" method="POST" enctype="multipart/form-data" id="checkout-form">
                            @csrf
                            @method('PATCH')
                            <div class="mb-3">
                                <label class="form-label">Waktu Pulang</label>
                                <input type="time" name="time_out" class="form-control" value="{{ date('H:i') }}" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Foto Selfie</label>
                                <input type="file" name="photo_out" class="form-control" accept="image/*" required>
                                <small class="text-muted">Pastikan wajah Anda terlihat jelas dalam foto</small>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Keterangan</label>
                                <textarea name="desc" class="form-control" rows="3" placeholder="Tambahkan keterangan jika diperlukan"></textarea>
                            </div>
                            <button type="submit" class="btn btn-success w-100">
                                <i class="fas fa-sign-out-alt me-2"></i> Absen Pulang
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Absensi History -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Riwayat Absensi Hari Ini</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Kode</th>
                                        <th>Jenis</th>
                                        <th>Tanggal</th>
                                        <th>Masuk</th>
                                        <th>Pulang</th>
                                        <th>Status</th>
                                        <th>Foto</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($absensi as $item)
                                        <tr>
                                            <td>{{ $item->code }}</td>
                                            <td>
                                                @switch($item->type)
                                                    @case(0)
                                                        <span class="badge bg-primary">Regular</span>
                                                    @break

                                                    @case(1)
                                                        <span class="badge bg-warning">Lembur</span>
                                                    @break

                                                    @case(2)
                                                        <span class="badge bg-danger">Sakit</span>
                                                    @break

                                                    @case(3)
                                                        <span class="badge bg-info">Berobat</span>
                                                    @break

                                                    @case(4)
                                                        <span class="badge bg-warning">Telat</span>
                                                    @break

                                                    @case(6)
                                                        <span class="badge bg-secondary">Pribadi</span>
                                                    @break
                                                @endswitch
                                            </td>
                                            <td>{{ date('d/m/Y', strtotime($item->date)) }}</td>
                                            <td>{{ $item->time_in }}</td>
                                            <td>{{ $item->time_out ?? '-' }}</td>
                                            <td>
                                                @switch($item->status)
                                                    @case(0)
                                                        <span class="badge bg-success">Auto Approve</span>
                                                    @break

                                                    @case(1)
                                                        <span class="badge bg-warning">Pending</span>
                                                    @break

                                                    @case(2)
                                                        <span class="badge bg-success">Accepted</span>
                                                    @break

                                                    @case(3)
                                                        <span class="badge bg-danger">Declined</span>
                                                    @break
                                                @endswitch
                                            </td>
                                            <td>
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#photoModal{{ $item->id }}">
                                                        <i class="fas fa-image"></i>
                                                    </button>
                                                    @if(!$item->time_out)
                                                        <button type="button" class="btn btn-sm btn-success" onclick="setCheckoutCode('{{ $item->code }}')">
                                                            <i class="fas fa-sign-out-alt"></i>
                                                        </button>
                                                    @endif
                                                </div>
                                            </td>
                                        </tr>

                                        <!-- Photo Modal -->
                                        <div class="modal fade" id="photoModal{{ $item->id }}" tabindex="-1">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Foto Absensi</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <h6>Foto Masuk</h6>
                                                                <img src="{{ asset('storage/images/absensi/' . $item->photo_in) }}" class="img-fluid rounded mb-2" alt="Absensi Masuk">
                                                            </div>
                                                            @if($item->photo_out)
                                                            <div class="col-md-6">
                                                                <h6>Foto Pulang</h6>
                                                                <img src="{{ asset('storage/images/absensi/' . $item->photo_out) }}" class="img-fluid rounded mb-2" alt="Absensi Pulang">
                                                            </div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection

@section('custom-js')
    <script>
        // Update time display
        function updateTime() {
            const now = new Date();
            const timeString = now.toLocaleTimeString('id-ID', {
                hour: '2-digit',
                minute: '2-digit',
                second: '2-digit'
            });
            document.getElementById('current-time').textContent = timeString;
        }
        setInterval(updateTime, 1000);
        updateTime();

        // Preview image before upload
        document.querySelectorAll('input[type="file"]').forEach(input => {
            input.addEventListener('change', function(e) {
                if (this.files && this.files[0]) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        const preview = document.createElement('img');
                        preview.src = e.target.result;
                        preview.className = 'photo-preview mt-2';
                        const parent = this.parentElement;
                        const existingPreview = parent.querySelector('.photo-preview');
                        if (existingPreview) {
                            parent.removeChild(existingPreview);
                        }
                        parent.appendChild(preview);
                    }.bind(this);
                    reader.readAsDataURL(this.files[0]);
                }
            });
        });

        // Handle check-out form
        function setCheckoutCode(code) {
            const form = document.getElementById('checkout-form');
            const action = form.getAttribute('action').replace('CODE', code);
            form.setAttribute('action', action);
            
            // Enable the form
            form.querySelectorAll('input, textarea, button').forEach(element => {
                element.disabled = false;
            });
        }

        // Disable check-out form by default
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('checkout-form');
            form.querySelectorAll('input, textarea, button').forEach(element => {
                element.disabled = true;
            });
        });
    </script>
@endsection
