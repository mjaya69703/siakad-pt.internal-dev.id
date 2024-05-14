<?php $__env->startSection('title'); ?>
    Data Keuangan - Siakad By Internal Developer
<?php $__env->stopSection(); ?>
<?php $__env->startSection('menu'); ?>
    Data Keuangan
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
    Halaman untuk melihat data keuangan
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<section class="section row">
    <div class="col-lg-12 col-12">
        <div class="row">
            <div class="col-lg-3 col-6 mb-2">
                <a href="#">
                    <div class="card btn btn-outline-success">
                        <div class="card-body d-flex justify-content-around align-items-center">
                            <span class="icon" style="margin-right: 25px;"><i class="fa-solid fa-file-invoice" style="font-size: 42px"></i></span>
                            <span class="text-white" style="margin-left: 25px; font-size: 16px;"><?php echo e(number_format($balSekarang, 0, ',', '.')); ?><br> Sisa Saldo ( IDR )</span>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-6 mb-2">
                <a href="#">
                    <div class="card btn btn-outline-success">
                        <div class="card-body d-flex justify-content-around align-items-center">
                            <span class="icon" style="margin-right: 25px;"><i class="fa-solid fa-file-invoice-dollar" style="font-size: 42px"></i></span>
                            <span class="text-white" style="margin-left: 25px; font-size: 16px;"><?php echo e(number_format($balPending, 0, ',', '.')); ?><br> Pending ( IDR )</span>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-6 mb-2">
                <a href="#">
                    <div class="card btn btn-outline-success">
                        <div class="card-body d-flex justify-content-around align-items-center">
                            <span class="icon" style="margin-right: 25px;"><i class="fa-solid fa-dollar" style="font-size: 42px"></i></span>
                            <span class="text-white" style="margin-left: 25px; font-size: 16px;"><?php echo e(number_format($balIncome, 0, ',', '.')); ?><br> Income ( IDR )</span>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-6 mb-2">
                <a href="#">
                    <div class="card btn btn-outline-success">
                        <div class="card-body d-flex justify-content-around align-items-center">
                            <span class="icon" style="margin-right: 25px;"><i class="fa-solid fa-dollar" style="font-size: 42px"></i></span>
                            <span class="text-white" style="margin-left: 25px; font-size: 16px;"><?php echo e(number_format($balExpense, 0, ',', '.')); ?><br> Expenses ( IDR )</span>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-12">
        <form action="<?php echo e(route( $prefix . 'finance.keuangan-store')); ?>" method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="card-title">Tambah <?php echo $__env->yieldContent('menu'); ?></h5>
                    <button type="submit" class="btn btn-outline-primary"><i class="fa-solid fa-paper-plane"></i></button>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="type">Type Keuangan</label>
                        <select name="type" id="type" class="form-select">
                            <option value="" selected>Pilih Type Keuangan</option>
                            <option value="0">Balance Pending</option>
                            <option value="1">Balance Income</option>
                            <option value="2">Balance Expenses</option>
                        </select>
                        <?php $__errorArgs = ['type'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <small class="text-danger"><?php echo e($message); ?></small>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="form-group">
                        <label for="value">Nominal Balance</label>
                        <input type="text" class="form-control" name="value" id="value" placeholder="Inputkan nominal balance..." >
                        <?php $__errorArgs = ['value'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <small class="text-danger"><?php echo e($message); ?></small>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="form-group">
                        <label for="desc">Deskripsi Balance</label>
                        <textarea name="desc" id="desc" class="form-control" cols="30" rows="10" placeholder="Inputkan deskripsi sumber dana..."></textarea>
                        <?php $__errorArgs = ['desc'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <small class="text-danger"><?php echo e($message); ?></small>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                </div>
            </div>
        </form>
    </div>
    <div class="col-lg-8 col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title"><?php echo $__env->yieldContent('menu'); ?></h5>

            </div>
            <div class="card-body">
                <table class="table table-striped" id="table1">
                    <thead>
                        <th class="text-center" style="max-width: 8% !important">#</th>
                        <th class="text-center">Author</th>
                        <th class="text-center">Balance Value</th>
                        <th class="text-center">Balance Type</th>
                        <th class="text-center">Balance Desc</th>
                        <th class="text-center">Button</th>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $balance; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr class="">
                                <td data-label="Number"><?php echo e(++$key); ?></td>
                                <td data-label="Author">
                                    <?php if($item->author_id != 0): ?>
                                        <?php echo e($item->author->name); ?>

                                    <?php else: ?>
                                        <span class="btn btn-danger">By Sistem</span>
                                    <?php endif; ?>
                                </td>
                                <td data-label="Balance Value"><?php echo e($item->value); ?></td>
                                <td data-label="Balance Type">
                                    <?php if($item->raw_type == 0): ?>
                                        <span class="btn btn-warning"><?php echo e($item->type); ?></span>
                                    <?php elseif($item->raw_type == 1): ?>
                                        <span class="btn btn-success"><?php echo e($item->type); ?></span>
                                    <?php elseif($item->raw_type == 2): ?>
                                        <span class="btn btn-danger"><?php echo e($item->type); ?></span>
                                        
                                    <?php endif; ?>
                                </td>
                                <td data-label="Balance Desc"><?php echo e($item->desc); ?></td>
                                <td class="d-flex justify-content-center align-items-center">
                                    <a href="#" style="margin-right: 10px" data-bs-toggle="modal" data-bs-target="#updateFakultas<?php echo e($item->code); ?>" class="btn btn-outline-primary"><i class="fas fa-edit"></i></a>
                                    
                                    <form id="delete-form-<?php echo e($item->code); ?>"
                                        action="<?php echo e(route( $prefix . 'finance.keuangan-destroy', $item->code)); ?>" method="POST">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                        <a type="button" class="bs-tooltip btn btn-rounded btn-outline-danger"
                                            data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"
                                            data-original-title="Delete"
                                            data-url="<?php echo e(route( $prefix . 'finance.keuangan-destroy', $item->code)); ?>"
                                            data-name="<?php echo e($item->name); ?>"
                                            onclick="deleteData('<?php echo e($item->code); ?>')">
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
    </div>

</section>
<div class="me-1 mb-1 d-inline-block">

    <!--Extra Large Modal -->
    <?php $__currentLoopData = $balance; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <form action="<?php echo e(route( $prefix . 'finance.keuangan-update', $item->code)); ?>" method="POST" enctype="multipart/form-data">
        <?php echo method_field('patch'); ?>
        <?php echo csrf_field(); ?>
        <div class="modal fade text-left w-100" id="updateFakultas<?php echo e($item->code); ?>" tabindex="-1" role="dialog"
            aria-labelledby="myModalLabel16" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-l"
                role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel16">Edit Fakultas - <?php echo e($item->name); ?></h4>
                        <div class="">
    
                            <button type="submit" class="btn btn-outline-primary" >
                                <i class="fas fa-paper-plane"></i>
                            </button>
                            <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal"
                                aria-label="Close">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="type">Type Keuangan</label>
                            <select name="type" id="type" class="form-select">
                                <option value="" selected>Pilih Type Keuangan</option>
                                <option value="0" <?php echo e($item->raw_type == 0 ? 'selected' : ''); ?>>Balance Pending</option>
                                <option value="1" <?php echo e($item->raw_type == 1 ? 'selected' : ''); ?>>Balance Income</option>
                                <option value="2" <?php echo e($item->raw_type == 2 ? 'selected' : ''); ?>>Balance Expenses</option>
                            </select>
                            <?php $__errorArgs = ['type'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <small class="text-danger"><?php echo e($message); ?></small>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="form-group">
                            <label for="value">Nominal Balance</label>
                            <input type="text" class="form-control" name="value" id="value" value="<?php echo e($item->value); ?>" placeholder="Inputkan nominal balance..." >
                            <?php $__errorArgs = ['value'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <small class="text-danger"><?php echo e($message); ?></small>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="form-group">
                            <label for="desc">Deskripsi Balance</label>
                            <textarea name="desc" id="desc" cols="30" rows="10" class="form-control" value="<?php echo e($item->desc); ?>" placeholder="Inputkan deskripsi sumber dana..."><?php echo e($item->desc); ?></textarea>
                            <?php $__errorArgs = ['desc'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <small class="text-danger"><?php echo e($message); ?></small>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('base.base-dash-index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/siakadpt/htdocs/siakad-pt.internal-dev.id/resources/views/user/finance/pages/keuangan-index.blade.php ENDPATH**/ ?>