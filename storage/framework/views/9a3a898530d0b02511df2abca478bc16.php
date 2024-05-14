<?php $__env->startSection('title'); ?>
    Data Pengguna Mahasiswa - Siakad By Internal Developer
<?php $__env->stopSection(); ?>
<?php $__env->startSection('menu'); ?>
    Data Pengguna Mahasiswa
<?php $__env->stopSection(); ?>
<?php $__env->startSection('submenu'); ?>
    Lihat Data
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
    Halaman untuk melihat data pengguna Mahasiswa
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<section class="section">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title d-flex justify-content-between align-items-center">
                <?php echo $__env->yieldContent('menu'); ?>
                <div class="">
                    <a href="<?php echo e(route('web-admin.workers.student-create')); ?>" class="btn btn-outline-primary"><i class="fa-solid fa-plus"></i></a>
                </div>
            </h5>
        </div>
        <div class="card-body">
            <table class="table table-striped" id="table1">
                <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">NIM</th>          
                        <th class="text-center">Nama Mahasiswa</th>
                        <th class="text-center">Kelas</th>
                        <th class="text-center">Gender</th>
                        <th class="text-center">Join Date</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Button</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $student; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        
                    <tr>
                        <td data-label="Number"><?php echo e(++$key); ?></td>
                        <td data-label="NIM Mahasiswa"><?php echo e($item->mhs_nim); ?></td>
                        <td data-label="Nama Mahasiswa"><?php echo e($item->mhs_name); ?></td>
                        <td data-label="Kelas"><?php echo e($item->kelas->name); ?></td>
                        <td data-label="Gender"><?php echo e($item->mhs_gend); ?></td>
                        <td data-label="Join Date"><?php echo e(\Carbon\Carbon::parse($item->created_at)->format('l, d M Y')); ?></td>
                        <td data-label="Status Mahasiswa"><?php echo e($item->mhs_stat); ?></td>
                        <td class="d-flex justify-content-center align-items-center">
                            <a href="#" style="margin-right: 10px" data-bs-toggle="modal" data-bs-target="#viewContact<?php echo e($item->mhs_code); ?>" class="btn btn-outline-info"><i class="fas fa-phone"></i></a>
                            <a href="<?php echo e(route('web-admin.workers.student-edit', $item->mhs_code)); ?>" style="margin-right: 10px" class="btn btn-outline-primary"><i class="fas fa-edit"></i></a>
                            <form id="delete-form-<?php echo e($item->mhs_code); ?>"
                                action="<?php echo e(route('web-admin.workers.student-destroy', $item->mhs_code)); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <a type="button" class="bs-tooltip btn btn-rounded btn-outline-danger"
                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"
                                    data-original-title="Delete"
                                    data-url="<?php echo e(route('web-admin.workers.student-destroy', $item->mhs_code)); ?>"
                                    data-name="<?php echo e($item->name); ?>"
                                    onclick="deleteData('<?php echo e($item->mhs_code); ?>')">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </form>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
 
                </tbody>
            </table>
        </div>
    </div>

</section>
<div class="me-1 mb-1 d-inline-block">

<?php $__currentLoopData = $student; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    
<div class="modal fade text-left w-100" id="viewContact<?php echo e($item->mhs_code); ?>" tabindex="-1" role="dialog"
    aria-labelledby="myModalLabel16" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-l"
        role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel16">Lihat Data Kontak - <?php echo e($item->mhs_name); ?> </h4>
                <div class="">

                    <button type="button" class="btn btn-outline-danger mt-1" data-bs-dismiss="modal" aria-label="Close">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="form-group col-lg-12 col-12">
                        <label for="kode_kelas">Nomor Telepon</label>
                        <div class="d-flex justify-content-between align-items-center">
                            <input type="text" class="form-control" value="<?php echo e($item->mhs_phone); ?>">
                            <a href="https://wa.me/<?php echo e($item->mhs_phone); ?>" target="_blank" class="btn btn-outline-success" style="margin-left: 10px"><i class="fa-solid fa-square-phone"></i></a>
                        </div>

                    </div>
                    <div class="form-group col-lg-12 col-12">
                        <label for="kode_kelas">Alamat Email</label>
                        <div class="d-flex justify-content-between align-items-center">
                            <input type="text" class="form-control" value="<?php echo e($item->mhs_mail); ?>">
                            <a href="mailto:<?php echo e($item->mhs_mail); ?>" class="btn btn-outline-danger" style="margin-left: 10px"><i class="fa-solid fa-envelope"></i></a>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('custom-js'); ?>
<script src="<?php echo e(asset('dist')); ?>/assets/extensions/tinymce/tinymce.min.js"></script>
<script src="<?php echo e(asset('dist')); ?>/assets/static/js/pages/tinymce.js"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('base.base-dash-index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/siakadpt/htdocs/siakad-pt.internal-dev.id/resources/views/user/admin/pages/workers-student-index.blade.php ENDPATH**/ ?>