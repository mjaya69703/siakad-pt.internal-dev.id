<?php $__env->startSection('title'); ?>
    SIAKAD PT - Internal Developer
<?php $__env->stopSection(); ?>
<?php $__env->startSection('menu'); ?>
    Dashboard
<?php $__env->stopSection(); ?>
<?php $__env->startSection('submenu'); ?>
    Dashboard Admin
<?php $__env->stopSection(); ?>
<?php $__env->startSection('urlmenu'); ?>
<?php
$prefix = '';
$rawType = Auth::user()->raw_type;
switch ($rawType) {
    case 1:
        $prefix = 'faculty.';
        break;
    case 2:
        $prefix = 'administrative.';
        break;
    case 3:
        $prefix = 'academic.';
        break;
    case 4:
        $prefix = 'facility.';
        break;
    default:
        $prefix = 'web-admin.';
        break;
}
?>
    #
<?php $__env->stopSection(); ?>
<?php $__env->startSection('subdesc'); ?>
    Halaman dashboard admin
<?php $__env->stopSection(); ?>
<?php $__env->startSection('custom-css'); ?>
    <style>
        @media (max-width: 768px) {
            .card-body {
                flex-direction: column;
                justify-content: center;
                align-items: center;
            }

            .icon {
                margin: 10px 0;
            }

            .text-white {
                margin-left: 0px !important;
                /* Mengatur margin-left menjadi 0 */
                margin-top: 10px;
                margin-bottom: 10px;
            }
        }
    </style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <section class="section">
        <div class="row">

            <div class="col-lg-9 col-12">
                <div class="row">

                    <div class="col-lg-3 col-6 mb-2">
                        <a href="<?php echo e(route('web-admin.workers.student-index')); ?>">
                            <div class="card btn btn-outline-success">
                                <div class="card-body d-flex justify-content-around align-items-center">
                                    <span class="icon" style="margin-right: 25px;"><i class="fa-solid fa-user-graduate" style="font-size: 42px"></i></span>
                                    <span class="text-white" style="margin-left: 25px; font-size: 16px;"><?php echo e(\App\Models\Mahasiswa::all()->count()); ?> <br> Mahasiswa</span>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-6 mb-2">
                        <a href="<?php echo e(route('web-admin.workers.lecture-index')); ?>">
                            <div class="card btn btn-outline-success">
                                <div class="card-body d-flex justify-content-around align-items-center">
                                    <span class="icon" style="margin-right: 25px;"><i class="fa-solid fa-user-tie" style="font-size: 42px"></i></span>
                                    <span class="text-white" style="margin-left: 25px; font-size: 16px;"><?php echo e(\App\Models\Dosen::all()->count()); ?> <br> Dosen</span>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-6 mb-2">
                        <a href="<?php echo e(route('web-admin.workers.staff-index')); ?>">
                            <div class="card btn btn-outline-success">
                                <div class="card-body d-flex justify-content-around align-items-center">
                                    <span class="icon" style="margin-right: 25px;"><i class="fa-solid fa-user-tag" style="font-size: 42px"></i></span>
                                    <span class="text-white" style="margin-left: 25px; font-size: 16px;"><?php echo e(\App\Models\User::where('type', ['1','2','3','4'])->count()); ?><br> Karyawan</span>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-6 mb-2">
                        <a href="<?php echo e(route('web-admin.master.jadkul-index')); ?>">
                            <div class="card btn btn-outline-success">
                                <div class="card-body d-flex justify-content-around align-items-center">
                                    <span class="icon" style="margin-right: 25px;"><i class="fa-solid fa-book-open-reader" style="font-size: 42px"></i></span>
                                    <span class="text-white" style="margin-left: 25px; font-size: 16px;"><?php echo e(\App\Models\JadwalKuliah::all()->count()); ?><br>Jadwal Kuliah</span>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="row">

                    <div class="col-lg-3 col-6 mb-2">
                        <a href="<?php echo e(route('web-admin.master.fakultas-index')); ?>">
                            <div class="card btn btn-outline-success">
                                <div class="card-body d-flex justify-content-around align-items-center">
                                    <span class="icon" style="margin-right: 25px;"><i class="fa-solid fa-building-columns" style="font-size: 42px"></i></span>
                                    <span class="text-white" style="margin-left: 25px; font-size: 16px;"><?php echo e(\App\Models\Fakultas::all()->count()); ?> <br> Fakultas</span>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-6 mb-2">
                        <a href="<?php echo e(route('web-admin.master.pstudi-index')); ?>">
                            <div class="card btn btn-outline-success">
                                <div class="card-body d-flex justify-content-around align-items-center">
                                    <span class="icon" style="margin-right: 25px;"><i class="fa-solid fa-graduation-cap" style="font-size: 42px"></i></span>
                                    <span class="text-white" style="margin-left: 25px; font-size: 16px;"><?php echo e(\App\Models\ProgramStudi::all()->count()); ?><br>Prodi</span>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-6 mb-2">
                        <a href="<?php echo e(route('web-admin.master.kelas-index')); ?>">
                            <div class="card btn btn-outline-success">
                                <div class="card-body d-flex justify-content-around align-items-center">
                                    <span class="icon" style="margin-right: 25px;"><i class="fa-solid fa-building-user" style="font-size: 42px"></i></span>
                                    <span class="text-white" style="margin-left: 25px; font-size: 16px;"><?php echo e(\App\Models\Kelas::all()->count()); ?><br> Kelas</span>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-6 mb-2">
                        <a href="<?php echo e(route('web-admin.master.matkul-index')); ?>">
                            <div class="card btn btn-outline-success">
                                <div class="card-body d-flex justify-content-around align-items-center">
                                    <span class="icon" style="margin-right: 25px;"><i class="fa-solid fa-book-open" style="font-size: 42px"></i></span>
                                    <span class="text-white" style="margin-left: 25px; font-size: 16px;"><?php echo e(\App\Models\MataKuliah::all()->count()); ?> <br> Mata Kuliah</span>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="row">

                    <div class="col-lg-3 col-6 mb-2">
                        <a href="<?php echo e(route('web-admin.master.taka-index')); ?>">
                            <div class="card btn btn-outline-success">
                                <div class="card-body d-flex justify-content-around align-items-center">
                                    <span class="icon" style="margin-right: 25px;"><i class="fa-solid fa-calendar" style="font-size: 42px"></i></span>
                                    <span class="text-white" style="margin-left: 25px; font-size: 16px;"><?php echo e(\App\Models\Kurikulum::all()->count()); ?><br>Tahun Akademik</span>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-6 mb-2">
                        <a href="<?php echo e(route('web-admin.master.kurikulum-index')); ?>">
                            <div class="card btn btn-outline-success">
                                <div class="card-body d-flex justify-content-around align-items-center">
                                    <span class="icon" style="margin-right: 25px;"><i class="fa-solid fa-book" style="font-size: 42px"></i></span>
                                    <span class="text-white" style="margin-left: 25px; font-size: 16px;"><?php echo e(\App\Models\Kurikulum::all()->count()); ?><br>Kurikulum</span>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-6 mb-2">
                        <a href="<?php echo e(route('web-admin.master.proku-index')); ?>">
                            <div class="card btn btn-outline-success">
                                <div class="card-body d-flex justify-content-around align-items-center">
                                    <span class="icon" style="margin-right: 25px;"><i class="fa-solid fa-list-ol" style="font-size: 42px"></i></span>
                                    <span class="text-white" style="margin-left: 25px; font-size: 16px;"><?php echo e(\App\Models\ProgramKuliah::all()->count()); ?><br> Program Kuliah</span>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-6 mb-2">
                        <a href="<?php echo e(route('web-admin.inventory.ruang-index')); ?>">
                            <div class="card btn btn-outline-success">
                                <div class="card-body d-flex justify-content-around align-items-center">
                                    <span class="icon" style="margin-right: 25px;"><i class="fa-solid fa-house-flag" style="font-size: 42px"></i></span>
                                    <span class="text-white" style="margin-left: 25px; font-size: 16px;"><?php echo e(\App\Models\Ruang::all()->count()); ?><br>Ruangan</span>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-6 mb-2">
                        <a href="<?php echo e(route($prefix.'finance.keuangan-index')); ?>">
                            <div class="card btn btn-outline-success">
                                <div class="card-body d-flex justify-content-around align-items-center">
                                    <span class="icon" style="margin-right: 25px;"><i class="fa-solid fa-wallet" style="font-size: 42px"></i></span>
                                    <span class="text-white" style="margin-left: 25px; font-size: 16px;"><?php echo e(number_format($balSekarang, 0, ',', '.')); ?><br> Sisa Saldo ( IDR )</span>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-6 mb-2">
                        <a href="<?php echo e(route($prefix.'finance.keuangan-index')); ?>">
                            <div class="card btn btn-outline-success">
                                <div class="card-body d-flex justify-content-around align-items-center">
                                    <span class="icon" style="margin-right: 25px;"><i class="fa-solid fa-file-invoice-dollar" style="font-size: 42px"></i></span>
                                    <span class="text-white" style="margin-left: 25px; font-size: 16px;"><?php echo e(number_format($balPending, 0, ',', '.')); ?><br> Pending ( IDR )</span>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-6 mb-2">
                        <a href="<?php echo e(route($prefix.'finance.keuangan-index')); ?>">
                            <div class="card btn btn-outline-success">
                                <div class="card-body d-flex justify-content-around align-items-center">
                                    <span class="icon" style="margin-right: 25px;"><i class="fa-solid fa-dollar" style="font-size: 42px"></i></span>
                                    <span class="text-white" style="margin-left: 25px; font-size: 16px;"><?php echo e(number_format($balIncome, 0, ',', '.')); ?><br> Income ( IDR )</span>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-6 mb-2">
                        <a href="<?php echo e(route($prefix.'finance.keuangan-index')); ?>">
                            <div class="card btn btn-outline-success">
                                <div class="card-body d-flex justify-content-around align-items-center">
                                    <span class="icon" style="margin-right: 25px;"><i class="fa-solid fa-dollar" style="font-size: 42px"></i></span>
                                    <span class="text-white" style="margin-left: 25px; font-size: 16px;"><?php echo e(number_format($balExpense, 0, ',', '.')); ?><br> Expenses ( IDR )</span>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-6 mb-2">
                        <a href="<?php echo e(route($prefix.'finance.tagihan-index')); ?>">
                            <div class="card btn btn-outline-success">
                                <div class="card-body d-flex justify-content-around align-items-center">
                                    <span class="icon" style="margin-right: 25px;"><i class="fa-solid fa-file-invoice" style="font-size: 42px"></i></span>
                                    <span class="text-white" style="margin-left: 25px; font-size: 16px;"><?php echo e(\App\Models\TagihanKuliah::all()->count()); ?><br> Tagihan</span>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-6 mb-2">
                        <a href="<?php echo e(route($prefix.'finance.pembayaran-index')); ?>">
                            <div class="card btn btn-outline-success">
                                <div class="card-body d-flex justify-content-around align-items-center">
                                    <span class="icon" style="margin-right: 25px;"><i class="fa-solid fa-file-invoice-dollar" style="font-size: 42px"></i></span>
                                    <span class="text-white" style="margin-left: 25px; font-size: 16px;"><?php echo e(\App\Models\HistoryTagihan::where('stat', 1)->count()); ?><br> Pembayaran</span>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title text-center">Presentasi Gender</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <div id="genderMhsChart"></div>
                        </div>
                        <div class="text-center">
                            <small>Grafik Presentasi Gender Mahasiswa</small>
                        </div>
                        <hr>
                        <div class="form-group">
                            <div id="genderDsnChart"></div>
                        </div>
                        <div class="text-center">
                            <small>Grafik Presentasi Gender Dosen</small>
                        </div>
                        <hr>
                        <div class="form-group">
                            <div id="genderUsrChart"></div>
                        </div>
                        <div class="text-center">
                            <small>Grafik Presentasi Gender Pegawai</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('custom-js'); ?>
<script src="<?php echo e(asset('dist')); ?>/assets/extensions/apexcharts/apexcharts.min.js"></script>
<script src="<?php echo e(asset('dist')); ?>/assets/static/js/pages/dashboard.js"></script>

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
            url: '<?php echo e(route('web-admin.home.ajax-mhs-gender')); ?>',
            method: 'GET',
            success: function(response) {
                var maleCount = response.male;
                var femaleCount = response.female;
                var dmaleCount = response.dmale;
                var dfemaleCount = response.dfemale;
                var umaleCount = response.umale;
                var ufemaleCount = response.ufemale;

                var options = {
                    chart: {
                        type: 'pie',
                    },
                    series: [maleCount, femaleCount],
                    labels: ['Laki-laki', 'Perempuan'],
                };

                var chart = new ApexCharts(document.querySelector('#genderMhsChart'), options);
                chart.render();

                var options = {
                    chart: {
                        type: 'pie',
                    },
                    series: [dmaleCount, dfemaleCount],
                    labels: ['Laki-laki', 'Perempuan'],
                };

                var chart = new ApexCharts(document.querySelector('#genderDsnChart'), options);
                chart.render();
                var options = {
                    chart: {
                        type: 'pie',
                    },
                    series: [umaleCount, ufemaleCount],
                    labels: ['Laki-laki', 'Perempuan'],
                };

                var chart = new ApexCharts(document.querySelector('#genderUsrChart'), options);
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('base.base-dash-index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/siakadpt/htdocs/siakad-pt.internal-dev.id/resources/views/user/home-index.blade.php ENDPATH**/ ?>