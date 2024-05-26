@extends('base.base-dash-index')
@section('title')
    Ticket Support - Siakad By Internal Developer
@endsection
@section('menu')
    Ticket Support
@endsection
@section('submenu')
    Lihat Daftar Ticket Support
@endsection
@section('urlmenu')
@endsection
@section('subdesc')
    Halaman untuk melihat daftar ticket support
@endsection
@section('custom-css')
    <style>
        .subject-column {
            width: 45% !important;
        }
    </style>
@endsection
@section('content')
    <section class="content">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title d-flex justify-content-between align-items-center">
                    @yield('menu')
                    <div class="">
                        {{-- <a href="{{ route('web-admin.master.tagihan-index') }}" class="btn btn-outline-primary"><i class="fa-solid fa-plus"></i></a> --}}
                    </div>
                </h5>
            </div>
            <div class="card-body">
                <table class="table table-striped" id="table1" style="width: 100%;">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">Prioritas</th>
                            <th class="text-center">Departement</th>
                            <th class="text-center subject-column">Subject</th> <!-- Menambahkan class "subject-column" -->
                            <th class="text-center">Status</th>
                            <th class="text-center">Last Reply</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($ticket as $key => $item)
                            <tr>
                                <td data-label="Number">{{ ++$key }}</td>
                                <td data-label="Prioritas">
                                    @if ($item->raw_prio_id === 0)
                                        <span class="text-info">{{ $item->prio_id }}</span>
                                    @elseif ($item->raw_prio_id === 1)
                                        <span class="text-warning">{{ $item->prio_id }}</span>
                                    @elseif ($item->raw_prio_id === 2)
                                        <span class="text-danger">{{ $item->prio_id }}</span>
                                    @elseif ($item->raw_prio_id === 3)
                                        <span class="text-danger"><b>{{ $item->prio_id }}</b></span>
                                    @endif
                                </td>
                                <td data-label="Departement">{{ $item->dept_id }}</td>
                                <td data-label="Subject"><a href="{{ route($prefix . 'support.ticket-view', $item->code) }}">#{{ $item->code . ' - ' . $item->subject }}</a></td> <!-- Menambahkan style="width: 50%" -->
                                <td data-label="Status">
                                    @if ($item->raw_stat_id === 0)
                                        <span class="text-success"><b>{{ $item->stat_id }}</b></span>
                                    @elseif ($item->raw_stat_id === 1)
                                        <span class="text-danger"><b>{{ $item->stat_id }}</b></span>
                                    @elseif ($item->raw_stat_id === 2)
                                        <span class="text-light"><b>{{ $item->stat_id }}</b></span>
                                    @elseif ($item->raw_stat_id === 3)
                                        <span class="text-success"><b>{{ $item->stat_id }}</b></span>
                                    @elseif ($item->raw_stat_id === 4)
                                        <span class="text-primary"><b>{{ $item->stat_id }}</b></span>
                                    @elseif ($item->raw_stat_id === 5)
                                        <span class="text-info"><b>{{ $item->stat_id }}</b></span>
                                    @elseif ($item->raw_stat_id === 6)
                                        <span class="text-warning"><b>{{ $item->stat_id }}</b></span>
                                    @endif
                                </td>
                                <td data-label="Last Reply">{{ $item->updated_at->diffForHumans() }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>


            </div>
        </div>
    </section>
@endsection
@section('custom-js')
    <script>
        // Fungsi untuk memulai auto-refresh setiap 5 detik
        function startAutoRefresh() {
            setInterval(function() {
                // Lakukan refresh halaman
                location.reload();
            }, 15000); // Refresh setiap 5 detik
        }

        // Memulai auto-refresh secara default
        startAutoRefresh();
    </script>
@endsection
