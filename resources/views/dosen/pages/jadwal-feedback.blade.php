@extends('base.base-dash-index')
@section('menu')
    FeedBack Perkuliahan
@endsection
@section('submenu')
    Lihat Semua FeedBack
@endsection
@section('urlmenu')
    {{ route('dosen.akademik.jadwal-index') }}
@endsection
@section('subdesc')
    Halaman untuk melihat semua feedback
@endsection
@section('title')
    @yield('submenu') - @yield('menu') - Siakad By Internal Developer
@endsection
@section('content')
    <section class="content">
        <div class="row">
            <div class="col-lg-4 col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title text-center">Presentasi Kepuasan Mengajar</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <div id="grafikChart"></div>
                        </div>
                        <div class="text-center">
                            <small>Grafik Presentasi Presentasi Kepuasan Mengajar</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-12">
                <div class="card">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h4 class="card-title">
                            @yield('menu') - @yield('submenu')
                        </h4>
                        <a href="@yield('urlmenu')" class="btn btn-warning"><i class="fa-solid fa-backward"></i></a>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped" id="table1">
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th class="text-center">Skor FeedBack</th>
                                    <th class="text-center">Alasan FeedBack</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($feedback as $key => $item)
                                    <tr>
                                        <td data-label="Number">{{ ++$key }}</td>
                                        <td data-label="Skor FeedBack">{{ $item->fb_score }}</td>
                                        <td data-label="Alasan FeedBack">{{ $item->fb_reason }}</td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('custom-js')
    <script src="{{ asset('dist') }}/assets/extensions/apexcharts/apexcharts.min.js"></script>
    <script src="{{ asset('dist') }}/assets/static/js/pages/dashboard.js"></script>
    <script>
        var ajaxRunning = false;

        $(document).ready(function() {
            // Fungsi untuk melakukan permintaan AJAX
            function fetchData() {
                // Jika sedang berjalan, hentikan fungsi
                if (ajaxRunning) {
                    return;
                }

                ajaxRunning = true;

                $.ajax({
                    url: '{{ route('dosen.services.ajax.graphic.kepuasan-mengajar', $code) }}',
                    method: 'GET',
                    success: function(response) {
                        var tidakPuasCount = response.tidakpuas;
                        var cukupPuasCount = response.cukuppuas;
                        var sangatPuasCount = response.sangatpuas;

                        var options = {
                            chart: {
                                type: 'pie',
                            },
                            series: [tidakPuasCount, cukupPuasCount, sangatPuasCount],
                            labels: ['Tidak Puas', 'Cukup Puas', 'Sangat Puas'],
                            legend: {
                                position: 'bottom'
                            }
                        };

                        var chart = new ApexCharts(document.querySelector('#grafikChart'), options);
                        chart.render();

                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    },
                    complete: function() {
                        ajaxRunning = false; // Setelah permintaan selesai, set status menjadi false
                    }
                });
            }

            // Panggil fungsi untuk pertama kalinya
            fetchData();
        });
    </script>
@endsection
