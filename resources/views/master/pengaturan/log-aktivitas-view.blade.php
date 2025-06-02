@extends('core-themes.core-backpage')

@section('custom-css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        .timeline {
            position: relative;
            padding: 20px 0;
        }
        
        .timeline::before {
            content: '';
            position: absolute;
            top: 0;
            left: 20px;
            height: 100%;
            width: 2px;
            background: #e9ecef;
        }
        
        .timeline-item {
            position: relative;
            padding-left: 50px;
            margin-bottom: 30px;
        }
        
        .timeline-item::before {
            content: '';
            position: absolute;
            left: 12px;
            top: 0;
            width: 18px;
            height: 18px;
            border-radius: 50%;
            background: #fff;
            border: 2px solid #435ebe;
        }
        
        .timeline-item:last-child {
            margin-bottom: 0;
        }
        
        .timeline-content {
            background: #f8f9fa;
            padding: 20px;
            border-radius: 10px;
        }
        
        .timeline-date {
            font-size: 0.875rem;
            color: #6c757d;
            margin-bottom: 10px;
        }
        
        .timeline-title {
            font-weight: 600;
            margin-bottom: 10px;
        }
        
        .timeline-text {
            color: #6c757d;
            margin-bottom: 0;
        }
        
        .badge {
            padding: 0.5em 0.75em;
            font-weight: 500;
        }
        
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
        
        .info-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        
        .info-list li {
            padding: 10px 0;
            border-bottom: 1px solid rgba(0,0,0,0.05);
        }
        
        .info-list li:last-child {
            border-bottom: none;
        }
        
        .info-list .label {
            font-weight: 600;
            color: #6c757d;
            margin-bottom: 5px;
        }
        
        .info-list .value {
            color: #212529;
        }
        
        .changes-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        
        .changes-list li {
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 5px;
            background: #f8f9fa;
        }
        
        .changes-list li:last-child {
            margin-bottom: 0;
        }
        
        .changes-list .field {
            font-weight: 600;
            color: #6c757d;
            margin-bottom: 5px;
        }
        
        .changes-list .old-value {
            color: #dc3545;
            text-decoration: line-through;
            margin-right: 10px;
        }
        
        .changes-list .new-value {
            color: #198754;
        }

        .change-item {
             background: #f8f9fa;
             padding: 15px;
             border-radius: 8px;
             margin-bottom: 10px;
             border: 1px solid #e9ecef;
        }

         .change-item:last-child {
             margin-bottom: 0;
         }

        .change-item .field-name {
            font-weight: 600;
            color: #495057;
            margin-bottom: 8px;
             display: block;
        }

        .change-item .value-pair span {
             margin-right: 15px;
             font-family: 'Courier New', Courier, monospace; /* Monospace for code/values */
             padding: 3px 6px;
             border-radius: 4px;
        }

        .change-item .value-pair .old {
             background-color: #f8d7da; /* Light red */
             color: #721c24; /* Dark red */
        }

         .change-item .value-pair .new {
             background-color: #d4edda; /* Light green */
             color: #155724; /* Dark green */
         }

          .change-item .value-pair span:empty::after {
             content: '-'; /* Display hyphen for empty values */
             color: #6c757d;
         }
    </style>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Detail Log Aktivitas</h5>
                    <a href="{{ route($spref . 'pengaturan.log-aktivitas-render') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left me-2"></i>Kembali
                    </a>
                </div>
                <div class="card-body">
                    <div class="row">
                        <!-- Main Info -->
                        <div class="col-lg-8">
                            <div class="card mb-4">
                                <div class="card-header">
                                    <h6 class="mb-0">Informasi Aktivitas</h6>
                                </div>
                                <div class="card-body">
                                    <ul class="info-list">
                                        <li>
                                            <div class="label">User</div>
                                            <div class="value">{{ $log->user->name }}</div>
                                        </li>
                                        <li>
                                            <div class="label">Tipe User</div>
                                            <div class="value">{{ $log->userTypeDescription }}</div>
                                        </li>
                                        <li>
                                            <div class="label">Aksi</div>
                                            <div class="value">
                                                <span class="badge {{ $log->action == 'create' ? 'bg-light-success text-success' : ($log->action == 'update' ? 'bg-light-warning text-warning' : 'bg-light-danger text-danger') }}">
                                                    {{ $log->actionDescription }}
                                                </span>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="label">Deskripsi</div>
                                            <div class="value">{{ $log->description }}</div>
                                        </li>
                                        <li>
                                            <div class="label">Waktu</div>
                                            <div class="value">{{ $log->created_at->format('d/m/Y H:i:s') }}</div>
                                        </li>
                                        <li>
                                            <div class="label">IP Address</div>
                                            <div class="value">{{ $log->ip_address }}</div>
                                        </li>
                                        <li>
                                            <div class="label">User Agent</div>
                                            <div class="value">{{ $log->user_agent }}</div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            
                            <!-- Changes -->
                            {{-- Check if there are related change details --}}
                            @if($log->changesDetails && $log->changesDetails->count() > 0)
                                <div class="card">
                                    <div class="card-header">
                                        <h6 class="mb-0">Perubahan Data</h6>
                                    </div>
                                    <div class="card-body">
                                         {{-- Loop through changesDetails relationship --}}
                                         @foreach($log->changesDetails as $changeDetail)
                                             <div class="change-item">
                                                  <span class="field-name">{{ ucwords(str_replace('_', ' ', $changeDetail->field_name)) }}</span>
                                                   <div class="value-pair">
                                                        @if($log->action == 'update' || $log->action == 'delete')
                                                             <span class="old">{{ $changeDetail->old_value ?? '-' }}</span>
                                                             @if($log->action == 'update')
                                                                  <i class="fas fa-arrow-right text-muted me-2"></i>
                                                             @endif
                                                        @endif
                                                        @if($log->action == 'create' || $log->action == 'update')
                                                             <span class="new">{{ $changeDetail->new_value ?? '-' }}</span>
                                                        @endif
                                                   </div>
                                             </div>
                                         @endforeach
                                    </div>
                                </div>
                            @else
                                 <p class="text-muted">Tidak ada detail perubahan data tersimpan untuk log ini.</p>
                            @endif
                        </div>
                        
                        <!-- Sidebar -->
                        <div class="col-lg-4">
                            <div class="card">
                                <div class="card-header">
                                    <h6 class="mb-0">Informasi Tambahan</h6>
                                </div>
                                <div class="card-body">
                                    <ul class="info-list">
                                        <li>
                                            <div class="label">Model</div>
                                            <div class="value">{{ $log->model_type }}</div>
                                        </li>
                                        <li>
                                            <div class="label">ID Model</div>
                                            <div class="value">{{ $log->model_id }}</div>
                                        </li>
                                        <li>
                                            <div class="label">URL</div>
                                            <div class="value">{{ $log->url }}</div>
                                        </li>
                                        <li>
                                            <div class="label">Method</div>
                                            <div class="value">{{ $log->method }}</div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            
                            <!-- Related Logs -->
                            <div class="card mt-4">
                                <div class="card-header">
                                    <h6 class="mb-0">Log Terkait</h6>
                                </div>
                                <div class="card-body">
                                    <div class="timeline">
                                        @foreach($relatedLogs as $relatedLog)
                                            <div class="timeline-item">
                                                <div class="timeline-content">
                                                    <div class="timeline-date">{{ $relatedLog->created_at->format('d/m/Y H:i') }}</div>
                                                    <div class="timeline-title">{{ $relatedLog->description }}</div>
                                                    <div class="timeline-text">
                                                        <span class="badge {{ $relatedLog->action == 'create' ? 'bg-light-success text-success' : ($relatedLog->action == 'update' ? 'bg-light-warning text-warning' : 'bg-light-danger text-danger') }}">
                                                            {{ $relatedLog->actionDescription }}
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
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
@endsection 