<?php $__env->startSection('title'); ?>
    Data Tagihan - Siakad By Internal Developer
<?php $__env->stopSection(); ?>
<?php $__env->startSection('menu'); ?>
    Data Tagihan
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
    Halaman untuk melihat data tagihan
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
                            <a href="<?php echo e(route($prefix.'finance.tagihan-create')); ?>" class="btn btn-primary"><i class="fa-solid fa-plus"></i></a>
                        </div>
        
                    </div>
                    <div class="card-body">
                        <table class="table table-striped" id="table1">
                            <thead>
                                <th class="text-center">#</th>
                                <th class="text-center">Kode Tagihan</th>
                                <th class="text-center">Nama Tagihan</th>
                                <th class="text-center">Type Tagihan</th>
                                <th class="text-center">Tagihan</th>
                                <th class="text-center">Nominal</th>
                                <th class="text-center">Button</th>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $tagihan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr class="">
                                        <td data-label="Number"><?php echo e(++$key); ?></td>
                                        <td data-label="Kode Tagihan"><span style="text-transform: uppercase"><?php echo e($item->code); ?></span></td>
                                        <td data-label="Nama Tagihan"><?php echo e($item->name); ?></td>
                                        <td data-label="Type Tagihan">
                                            <?php if($item->proku_id > 0): ?>
                                                Type Global
                                            <?php elseif($item->prodi_id > 0): ?>
                                                Type Pribadi
                                            <?php elseif($item->users_id > 0): ?>
                                                Type Pribadi
                                            <?php endif; ?>
                                        </td>
                                        <td data-label="Tagihan Kepada">
                                            <?php if($item->proku_id !== 0 && $item->prokuu): ?>
                                                Program Kuliah
                                                <br>
                                                <?php echo e($item->prokuu->name); ?>

                                            <?php elseif($item->prodi_id !== 0 && $item->prodi): ?>
                                                Program Studi
                                                <br>
                                                <?php echo e($item->prodi->name); ?>

                                            <?php elseif($item->users_id !== 0 && $item->mahasiswa): ?>
                                                Mahasiswa
                                                <br>
                                                <?php echo e($item->mahasiswa->mhs_name); ?>

                                            <?php else: ?>
                                                -
                                            <?php endif; ?>
                                        </td>
                                        <td data-label="Nominal">Rp. <?php echo e(number_format($item->price, 0, ',', '.')); ?></td>
                                        
                                        <td class="d-flex justify-content-center align-items-center">
                                            <a href="#" style="margin-right: 10px" data-bs-toggle="modal" data-bs-target="#updateTagihan<?php echo e($item->code); ?>" class="btn btn-outline-primary"><i class="fas fa-edit"></i></a>
                                            <form id="delete-form-<?php echo e($item->code); ?>"
                                                action="<?php echo e(route($prefix.'finance.tagihan-destroy', $item->code)); ?>" method="POST">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('DELETE'); ?>
                                                <a type="button" class="bs-tooltip btn btn-rounded btn-outline-danger"
                                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"
                                                    data-original-title="Delete"
                                                    data-url="<?php echo e(route($prefix.'finance.tagihan-destroy', $item->code)); ?>"
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
        </div>
    </section>
    <div class="me-1 mb-1 d-inline-block">

        <!--Extra Large Modal -->
        <?php $__currentLoopData = $tagihan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <form action="<?php echo e(route($prefix.'finance.tagihan-update', $item->code)); ?>" method="POST" enctype="multipart/form-data">
            <?php echo method_field('patch'); ?>
            <?php echo csrf_field(); ?>
            <div class="modal fade text-left w-100" id="updateTagihan<?php echo e($item->code); ?>" tabindex="-1" role="dialog"
                aria-labelledby="myModalLabel16" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-xl"
                    role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="myModalLabel16">Edit Tagihan - <?php echo e($item->name); ?></h4>
                            <div class="">
        
                                <button type="submit" class="mt-1 btn btn-outline-primary" >
                                    <i class="fas fa-paper-plane"></i>
                                </button>
                                <button type="button" class="mt-1 btn btn-outline-danger" data-bs-dismiss="modal"
                                    aria-label="Close">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <div class="modal-body row">
                            <div class="form-group col-lg-6 col-12">
                                <label for="name">Nama Tagihan</label>
                                <input type="text" name="name" id="name" class="form-control" value="<?php echo e($item->name); ?>" placeholder="Nama tagihan...">
                                <?php $__errorArgs = ['name'];
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
                            <div class="form-group col-lg-6 col-12">
                                <label for="price">Nominal Tagihan</label>
                                <input type="text" name="price" id="price" class="form-control" value="<?php echo e($item->price); ?>" placeholder="Nominal tagihan...">
                                <?php $__errorArgs = ['price'];
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
                            <div class="form-group col-lg-4 col-12">
                                <label for="users_id">Tagihan Mahasiswa</label>
                                <select name="users_id" id="users_id" class="choices form-select">
                                    <option value="0" selected>Pilih Mahasiswa</option>
                                    <?php $__currentLoopData = $mahasiswa; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mhs): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        
                                    <option value="<?php echo e($mhs->id); ?>" <?php echo e($item->users_id == $mhs->id ? 'selected' : ''); ?>><?php echo e($mhs->mhs_name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <?php $__errorArgs = ['users_id'];
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
                            <div class="form-group col-lg-4 col-12">
                                <label for="prodi_id">Tagihan Program Studi</label>
                                <select name="prodi_id" id="prodi_id" class="choices form-select">
                                    <option value="0" selected>Pilih Program Studi</option>
                                    <?php $__currentLoopData = $prodi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $prd): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        
                                    <option value="<?php echo e($prd->id); ?>" <?php echo e($item->prodi_id == $prd->id ? 'selected' : ''); ?>><?php echo e($prd->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <?php $__errorArgs = ['prodi_id'];
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
                            <div class="form-group col-lg-4 col-12">
                                <label for="proku_id">Tagihan Program Kuliah</label>
                                <select name="proku_id" id="proku_id" class="choices form-select">
                                    <option value="0" selected>Pilih Program Kuliah</option>
                                    <?php $__currentLoopData = $proku; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $prk): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        
                                    <option value="<?php echo e($prk->id); ?>" <?php echo e($item->proku_id == $prk->id ? 'selected' : ''); ?>><?php echo e($prk->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <?php $__errorArgs = ['proku_id'];
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
<?php echo $__env->make('base.base-dash-index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/siakadpt/htdocs/siakad-pt.internal-dev.id/resources/views/user/finance/pages/tagihan-index.blade.php ENDPATH**/ ?>