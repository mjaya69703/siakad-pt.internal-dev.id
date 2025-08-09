@extends('core-theme::layouts.app')

@section('title', 'Jadwal Kuliah')

@push('styles')
<style>
    .schedule-day {
        margin-bottom: 2rem;
    }
    .schedule-day:last-child {
        margin-bottom: 0;
    }
    .schedule-card {
        margin-bottom: 1rem;
        transition: all 0.2s ease-in-out;
    }
    .schedule-card:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
    }
    .day-header {
        background-color: #f5f7fb;
        padding: 0.75rem 1rem;
        border-radius: 6px;
        margin-bottom: 1rem;
        font-weight: 600;
        color: #3b82f6;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    .time-badge {
        font-size: 0.75rem;
        font-weight: 600;
        padding: 0.25rem 0.5rem;
        border-radius: 4px;
        background-color: #e0f2fe;
        color: #0369a1;
    }
    .course-code {
        font-size: 0.75rem;
        color: #6b7280;
        margin-bottom: 0.25rem;
    }
    .lecturer {
        font-size: 0.8125rem;
        color: #4b5563;
        margin-top: 0.5rem;
    }
    .room-info {
        display: flex;
        align-items: center;
        font-size: 0.8125rem;
        color: #4b5563;
        margin-top: 0.5rem;
    }
    .room-icon {
        margin-right: 0.375rem;
        color: #6b7280;
    }
    .no-schedule {
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
                    Jadwal Kuliah
                </h2>
                <div class="text-muted mt-1">
                    Semester {{ $currentSemester->nama ?? 'Aktif' }} - {{ $currentSemester->tahun_ajaran ?? '' }}
                </div>
            </div>
            <div class="col-auto ms-auto d-print-none">
                <div class="btn-list">
                    <div class="dropdown">
                        <button type="button" class="btn btn-outline-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-calendar" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                <path d="M4 7a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12z" />
                                <path d="M16 3v4" />
                                <path d="M8 3v4" />
                                <path d="M4 11h16" />
                                <path d="M11 15h1" />
                                <path d="M12 15v3" />
                            </svg>
                            Pilih Semester
                        </button>
                        <div class="dropdown-menu dropdown-menu-end">
                            <a class="dropdown-item {{ !request()->has('semester') ? 'active' : '' }}" 
                               href="{{ route('mahasiswa.akademik.jadwal-kuliah') }}">
                                Semester Aktif
                            </a>
                            <div class="dropdown-divider"></div>
                            @foreach($semesters as $semester)
                                <a class="dropdown-item {{ request('semester') == $semester->id ? 'active' : '' }}" 
                                   href="{{ route('mahasiswa.akademik.jadwal-by-semester', $semester->id) }}">
                                    {{ $semester->nama }} - {{ $semester->tahun_ajaran }}
                                </a>
                            @endforeach
                        </div>
                    </div>
                    <a href="#" class="btn btn-primary d-none d-sm-inline-block" onclick="window.print()">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                            <path d="M17 17h2a2 2 0 0 0 2 -2v-4a2 2 0 0 0 -2 -2h-14a2 2 0 0 0 -2 2v4a2 2 0 0 0 2 2h2" />
                            <path d="M17 9v-4a2 2 0 0 0 -2 -2h-6a2 2 0 0 0 -2 2v4" />
                            <rect x="7" y="13" width="10" height="8" rx="2" />
                        </svg>
                        Cetak Jadwal
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
        <div class="col-12">
            @if(empty($jadwal) || $jadwal->isEmpty())
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
                            <p class="empty-title">Tidak ada jadwal kuliah</p>
                            <p class="empty-subtitle text-muted">
                                @if(request()->has('semester'))
                                    Tidak ada jadwal kuliah untuk semester yang dipilih.
                                @else
                                    Tidak ada jadwal kuliah untuk semester ini.
                                @endif
                            </p>
                        </div>
                    </div>
                </div>
            @else
                <div class="row">
                    @php
                        $days = [
                            'Senin' => 'Monday',
                            'Selasa' => 'Tuesday',
                            'Rabu' => 'Wednesday',
                            'Kamis' => 'Thursday',
                            'Jumat' => 'Friday',
                            'Sabtu' => 'Saturday',
                            'Minggu' => 'Sunday'
                        ];
                        
                        // Convert schedule to array if it's a collection
                        $scheduleArray = [];
                        foreach ($jadwal as $day => $schedules) {
                            $scheduleArray[$day] = $schedules->sortBy('waktuKuliah.time_start');
                        }
                    @endphp
                    
                    @foreach($days as $idnDay => $engDay)
                        @if(isset($scheduleArray[$engDay]) && $scheduleArray[$engDay]->isNotEmpty())
                            <div class="col-md-6 col-lg-4">
                                <div class="schedule-day">
                                    <div class="day-header">
                                        <span>{{ $idnDay }}</span>
                                        <span class="badge bg-blue-lt">{{ $scheduleArray[$engDay]->count() }} Mata Kuliah</span>
                                    </div>
                                    
                                    @foreach($scheduleArray[$engDay] as $schedule)
                                        <div class="card schedule-card">
                                            <div class="card-body">
                                                <div class="d-flex justify-content-between align-items-start">
                                                    <div>
                                                        <h3 class="card-title mb-1">{{ $schedule->mataKuliah->nama }}</h3>
                                                        <div class="course-code">{{ $schedule->mataKuliah->kode_mk }} - {{ $schedule->mataKuliah->sks }} SKS</div>
                                                    </div>
                                                    <span class="time-badge">
                                                        {{ $schedule->waktuKuliah ? \Carbon\Carbon::parse($schedule->waktuKuliah->time_start)->format('H:i') : '-' }}
                                                        - 
                                                        {{ $schedule->waktuKuliah ? \Carbon\Carbon::parse($schedule->waktuKuliah->time_ended)->format('H:i') : '-' }}
                                                    </span>
                                                </div>
                                                
                                                @if($schedule->dosen)
                                                    <div class="lecturer">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user" width="16" height="16" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                                            <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" />
                                                            <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
                                                        </svg>
                                                        {{ $schedule->dosen->nama_lengkap }}
                                                    </div>
                                                @endif
                                                
                                                @if($schedule->ruang)
                                                    <div class="room-info">
                                                        <span class="room-icon">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-building" width="16" height="16" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                                                <path d="M3 21l18 0" />
                                                                <path d="M5 21v-14l8 -4v18" />
                                                                <path d="M19 21v-10l-6 -4" />
                                                                <path d="M9 9l0 .01" />
                                                                <path d="M9 12l0 .01" />
                                                                <path d="M9 15l0 .01" />
                                                                <path d="M9 18l0 .01" />
                                                            </svg>
                                                        </span>
                                                        {{ $schedule->ruang->nama_ruang }} ({{ $schedule->ruang->kode_ruang }})
                                                    </div>
                                                @endif
                                                
                                                @if($schedule->kelas)
                                                    <div class="mt-2">
                                                        <span class="badge bg-azure-lt">{{ $schedule->kelas->nama_kelas }}</span>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Add active class to current day
        const days = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
        const today = new Date().getDay(); // 0 = Sunday, 1 = Monday, etc.
        const currentDay = days[today];
        
        // Find the day header and add active class
        document.querySelectorAll('.day-header').forEach(header => {
            if (header.textContent.trim().startsWith(currentDay)) {
                header.classList.add('bg-primary-lt');
                header.innerHTML = `<span><strong>${header.textContent} (Hari Ini)</strong></span>${header.innerHTML}`;
                
                // Scroll to today's schedule
                header.scrollIntoView({ behavior: 'smooth', block: 'start' });
                window.scrollBy(0, -20); // Adjust scroll position
            }
        });
    });
</script>
@endpush
