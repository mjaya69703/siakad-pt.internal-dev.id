@extends('core-themes.core-backpage')

@section('custom-css')
    <style>
        .stat-card {
            border-radius: 15px;
            transition: transform 0.3s;
        }

        .stat-card:hover {
            transform: translateY(-5px);
        }

        .stat-icon {
            width: 48px;
            height: 48px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .recent-activity {
            max-height: 400px;
            overflow-y: auto;
        }

        .activity-item {
            padding: 1rem;
            border-left: 3px solid #4b6cb7;
            margin-bottom: 1rem;
            background: #f8f9fa;
            border-radius: 0 8px 8px 0;
        }

        .chart-container {
            margin: 0 !important;
            padding: 0 !important;
            height: auto !important;
            min-height: 0 !important;
        }

        #studentDistributionChart {
            display: block;
            width: 100% !important;
            height: 425px !important;
            max-height: 400px;
        }

        .card-body .chart-container {
            margin-bottom: 0 !important;
        }
    </style>
@endsection

@section('content')
    <div class="">
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
                                <h4 class="mb-1">Welcome back, {{ $user->name }}!</h4>
                                <p class="text-muted mb-0">Here's what's happening with your account today.</p>
                            </div>
                            <div class="flex-shrink-0">
                                <span class="badge bg-primary">{{ date('l, d F Y') }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Statistics Cards -->
        <div class="row mb-4">
            <div class="col-md-3">
                <div class="card stat-card bg-primary text-white">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="card-title mb-1">Total Students</h6>
                                <h2 class="mb-0">1,234</h2>
                            </div>
                            <div class="stat-icon bg-white bg-opacity-25">
                                <i class="fas fa-users fa-2x"></i>
                            </div>
                        </div>
                        <div class="mt-3">
                            <span class="badge bg-white bg-opacity-25">
                                <i class="fas fa-arrow-up me-1"></i> 12% increase
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card stat-card bg-success text-white">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="card-title mb-1">Active Courses</h6>
                                <h2 class="mb-0">45</h2>
                            </div>
                            <div class="stat-icon bg-white bg-opacity-25">
                                <i class="fas fa-book fa-2x"></i>
                            </div>
                        </div>
                        <div class="mt-3">
                            <span class="badge bg-white bg-opacity-25">
                                <i class="fas fa-arrow-up me-1"></i> 8% increase
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card stat-card bg-warning text-white">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="card-title mb-1">Total Faculty</h6>
                                <h2 class="mb-0">89</h2>
                            </div>
                            <div class="stat-icon bg-white bg-opacity-25">
                                <i class="fas fa-chalkboard-teacher fa-2x"></i>
                            </div>
                        </div>
                        <div class="mt-3">
                            <span class="badge bg-white bg-opacity-25">
                                <i class="fas fa-arrow-up me-1"></i> 5% increase
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card stat-card bg-info text-white">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="card-title mb-1">Events</h6>
                                <h2 class="mb-0">12</h2>
                            </div>
                            <div class="stat-icon bg-white bg-opacity-25">
                                <i class="fas fa-calendar-alt fa-2x"></i>
                            </div>
                        </div>
                        <div class="mt-3">
                            <span class="badge bg-white bg-opacity-25">
                                <i class="fas fa-arrow-up me-1"></i> 3 new events
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>




                        <!-- Charts and Activities -->
        <div class="row">
            <!-- Student Distribution Chart -->
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h5 class="">Student Distribution</h5>
                    </div>
                    <div class="card-body">
                        <div class="chart-container">
                            <canvas id="studentDistributionChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Recent Activities -->
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Recent Activities</h5>
                    </div>
                    <div class="card-body recent-activity">
                        {{-- Check if user is logged in and has recent activities --}}
                        @if(isset($user) && $user && $user->recentActivity()->count() > 0)
                            @foreach($user->recentActivity(10) as $activity)
                                <div class="activity-item">
                                    <div class="d-flex justify-content-between">
                                        {{-- Display action description or model type --}}
                                        <h6 class="mb-1">{{ $activity->actionDescription ?? class_basename($activity->model_type) }}</h6>
                                        {{-- Display time using Carbon's diffForHumans --}}
                                        <small class="text-muted">{{ $activity->created_at->diffForHumans() }}</small>
                                    </div>
                                    {{-- Display log description --}}
                                    <p class="mb-0">{{ $activity->description }}</p>
                                    {{-- Optional: Link to detailed view --}}
                                    {{-- <a href="{{ route($spref . 'pengaturan.log-aktivitas-view', $activity->id) }}" class="text-decoration-none"><small>View Details</small></a> --}}
                                </div>
                            @endforeach
                        @else
                            <p class="text-muted">Tidak ada aktivitas terbaru.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>


        <!-- Quick Actions -->
        <div class="row mt-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Quick Actions</h5>
                    </div>
                    <div class="card-body">
                        <div class="row ">
                            <div class="col-md-3">
                                <a href="#" class="btn btn-outline-primary w-100">
                                    <i class="fas fa-user-plus me-2"></i> Add New Student
                                </a>
                            </div>
                            <div class="col-md-3">
                                <a href="#" class="btn btn-outline-success w-100">
                                    <i class="fas fa-book me-2"></i> Create Course
                                </a>
                            </div>
                            <div class="col-md-3">
                                <a href="#" class="btn btn-outline-info w-100">
                                    <i class="fas fa-calendar-plus me-2"></i> Schedule Event
                                </a>
                            </div>
                            <div class="col-md-3">
                                <a href="#" class="btn btn-outline-warning w-100">
                                    <i class="fas fa-file-alt me-2"></i> Generate Report
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('custom-js')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Student Distribution Chart
            const ctx = document.getElementById('studentDistributionChart').getContext('2d');
            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['Computer Science', 'Engineering', 'Business', 'Arts', 'Medicine'],
                    datasets: [{
                        label: 'Number of Students',
                        data: [450, 380, 290, 210, 180],
                        backgroundColor: [
                            'rgba(75, 108, 183, 0.8)',
                            'rgba(40, 167, 69, 0.8)',
                            'rgba(255, 193, 7, 0.8)',
                            'rgba(23, 162, 184, 0.8)',
                            'rgba(220, 53, 69, 0.8)'
                        ],
                        borderColor: [
                            'rgba(75, 108, 183, 1)',
                            'rgba(40, 167, 69, 1)',
                            'rgba(255, 193, 7, 1)',
                            'rgba(23, 162, 184, 1)',
                            'rgba(220, 53, 69, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        });
    </script>
@endsection
