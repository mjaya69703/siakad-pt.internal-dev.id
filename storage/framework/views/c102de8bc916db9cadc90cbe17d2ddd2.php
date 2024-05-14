<?php $__env->startSection('title'); ?>
    Data Riwayat Pembayaran - Siakad By Internal Developer
<?php $__env->stopSection(); ?>
<?php $__env->startSection('menu'); ?>
    Data Riwayat Pembayaran
<?php $__env->stopSection(); ?>
<?php $__env->startSection('submenu'); ?>
    Lihat
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
    Halaman untuk melihat data riwayat pembayaran
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <section class="section">
        <div class="row">
            <div class="col-lg-12 col-12">
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
                    <div class="col-lg-3 col-6 mb-2">
                        <a href="<?php echo e(route('web-admin.workers.student-index')); ?>">
                            <div class="card btn btn-outline-success">
                                <div class="card-body d-flex justify-content-around align-items-center">
                                    <span class="icon" style="margin-right: 25px;"><i class="fa-solid fa-dollar" style="font-size: 42px"></i></span>
                                    <span class="text-white" style="margin-left: 25px; font-size: 16px;"><?php echo e(number_format($income, 0, ',', '.')); ?><br> Income ( IDR )</span>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 col-12">
                <div class="card">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h5 class="card-title"><?php echo $__env->yieldContent('menu'); ?></h5>
                        <div class="">
                            
                        </div>
        
                    </div>
                    <div class="card-body">
                        <table class="table table-striped"  id="table1">
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th class="text-center">Nama Mahasiswa</th>
                                    <th class="text-center">Kode Pembayaran</th>
                                    <th class="text-center">Kode Tagihan</th>
                                    <th class="text-center">Nominal Bayar</th>
                                    <th class="text-center">Status Tagihan</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $history; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    
                                <tr>
                                    <td data-label="Number"><?php echo e(++$key); ?></td>
                                    <td data-label="Nama Mahasiswa"><?php echo e($item->users->mhs_name); ?></td>
                                    <td data-label="Kode Pembayaran"><span style="text-transform: uppercase"><?php echo e($item->code); ?></span></td>
                                    <td data-label="Kode Tagihan"><span style="text-transform: uppercase"><?php echo e($item->tagihan_code); ?></span></td>
                                    <td data-label="Nominal Bayar">Rp. <?php echo e(number_format($item->tagihan->price, 0, ',', '.')); ?></td>
                                    <td data-label="Status"><?php echo e($item->stat === 1 ? 'PAID' : 'UN-PAID'); ?></td>
                                    
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
             
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('base.base-dash-index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/siakadpt/htdocs/siakad-pt.internal-dev.id/resources/views/user/finance/pages/pembayaran-index.blade.php ENDPATH**/ ?>