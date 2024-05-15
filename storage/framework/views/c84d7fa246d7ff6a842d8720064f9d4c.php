<?php $__env->startSection('title'); ?>
    SIAKAD PT - Internal Developer
<?php $__env->stopSection(); ?>
<?php $__env->startSection('menu'); ?>
    Contoh Menu
<?php $__env->stopSection(); ?>
<?php $__env->startSection('submenu'); ?>
    Contoh SubMenu
<?php $__env->stopSection(); ?>
<?php $__env->startSection('urlmenu'); ?>
    #
<?php $__env->stopSection(); ?>
<?php $__env->startSection('subdesc'); ?>
    Contoh Deskripsi Menu
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

            <div class="col-lg-9 col-12 row">
                <div class="col-lg-3 col-6 mb-2">
                    <a href="http://newprojectfoto.test/admin/manage-balance/pending">
                        <div class="card btn btn-outline-success">
                            <div class="card-body d-flex justify-content-around align-items-center">
                                <span class="icon" style="margin-right: 25px;"><i class="fa-solid fa-file-invoice-dollar" style="font-size: 42px"></i></span>
                                <span class="text-white" style="margin-left: 25px; font-size: 16px;"><?php echo e(number_format($sisatagihan, 0, ',', '.')); ?><br>Tagihan <br> ( IDR )</span>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-6 mb-2">
                    <a href="http://newprojectfoto.test/admin/manage-balance/pending">
                        <div class="card btn btn-outline-success">
                            <div class="card-body d-flex justify-content-around align-items-center">
                                <span class="icon" style="margin-right: 25px;"><i class="fa-solid fa-money-bill-transfer" style="font-size: 42px"></i></span>
                                <span class="text-white" style="margin-left: 25px; font-size: 16px;"><?php echo e(number_format($history, 0, ',', '.')); ?><br>Pembayaran <br> ( IDR )</span>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-6 mb-2">
                    <a href="http://newprojectfoto.test/admin/manage-balance/pending">
                        <div class="card btn btn-outline-success">
                            <div class="card-body d-flex justify-content-around align-items-center">
                                <span class="icon" style="margin-right: 25px;"><i class="fa-solid fa-user-check" style="font-size: 42px"></i></span>
                                <span class="text-white" style="margin-left: 25px; font-size: 16px;"><?php echo e($habsen); ?> <br>Absen <br> Hadir</span>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-6 mb-2">
                    <a href="http://newprojectfoto.test/admin/manage-balance/pending">
                        <div class="card btn btn-outline-success">
                            <div class="card-body d-flex justify-content-around align-items-center">
                                <span class="icon" style="margin-right: 25px;"><i class="fa-solid fa-book-open-reader" style="font-size: 42px"></i></span>
                                <span class="text-white" style="margin-left: 25px; font-size: 16px;"><?php echo e($jadkul); ?> <br>Jadwal <br> Kuliah</span>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Log Activity - <?php echo e(\Carbon\Carbon::now()->format('d M Y')); ?></h4>
                    </div>
                    <div class="card-body">
                        <span>16.24 <b>Administrator</b> - telah login</span><br>
                        <span>16.28 <b>Administrator</b> - telah mengubah password</span><br>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('base.base-dash-index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/siakadpt/htdocs/siakad-pt.internal-dev.id/resources/views/mahasiswa/home-index.blade.php ENDPATH**/ ?>