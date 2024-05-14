<?php $__env->startSection('title'); ?>
    Data Master Jadwal Kuliah - Siakad By Internal Developer
<?php $__env->stopSection(); ?>
<?php $__env->startSection('menu'); ?>
    Data Master Jadwal Kuliah
<?php $__env->stopSection(); ?>
<?php $__env->startSection('submenu'); ?>
    Data Master Jadwal Kuliah
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
    Halaman untuk mengelola Jadwal Kuliah
<?php $__env->stopSection(); ?>
<?php $__env->startSection('custom-css'); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<section class="section">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title d-flex justify-content-between align-items-center">
                <?php echo $__env->yieldContent('submenu'); ?>
                <div class="">
                    <a href="<?php echo e(route('web-admin.master.jadkul-create')); ?>" class="btn btn-outline-primary"><i class="fa-solid fa-plus"></i></a>
                </div>
            </h5>
        </div>
        <div class="card-body">
            <table class="table table-striped"  id="table1">
                <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">Program Studi</th>
                        <th class="text-center">Nama Kelas</th>
                        <th class="text-center">Nama Mata Kuliah</th>
                        <th class="text-center">Dosen Pengajar</th>
                        <th class="text-center">Metode Perkuliahan</th>
                        <th class="text-center">Tanggal Perkuliahan</th>
                        <th class="text-center">Waktu Perkuliahan</th>
                        <th class="text-center">Button</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $jadkul; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        
                    <tr>
                        <td data-label="Number"><?php echo e(++$key); ?></td>
                        <td data-label="Program Studi"><?php echo e($item->kelas->pstudi->fakultas->name); ?> <br> <?php echo e($item->kelas->pstudi->name); ?></td>
                        <td data-label="Nama Kelas"><?php echo e($item->kelas->code); ?></td>
                        <td data-label="Mata Kuliah"><?php echo e($item->matkul->name); ?> <br> <?php echo e($item->pert_id . ' - ' . $item->bsks . ' SKS'); ?></td>
                        <td data-label="Nama Dosen"><?php echo e($item->dosen->dsn_name); ?></td>
                        <td data-label="Metode"><?php echo e($item->meth_id); ?></td>
                        <td data-label="Tanggal Kuliah"><?php echo e($item->days_id); ?> <br> - <br> <?php echo e(\Carbon\Carbon::parse($item->date)->format('d M Y')); ?></td>
                        <td data-label="Waktu Perkuliahan"><?php echo e($item->start); ?> <br> - <br> <?php echo e($item->ended); ?></td>
                        <td class="d-flex justify-content-center align-items-center">
                            <a href="#" style="margin-right: 10px" data-bs-toggle="modal" data-bs-target="#updateJadkul<?php echo e($item->code); ?>" class="btn btn-outline-primary"><i class="fas fa-edit"></i></a>
                            <a href="<?php echo e(route('web-admin.master.jadkul-absen-view', $item->code)); ?>"  style="margin-right: 10px" class="btn btn-outline-info"><i class="fa-solid fa-user-check"></i></a>
                            <form id="delete-form-<?php echo e($item->code); ?>"
                                action="<?php echo e(route('web-admin.master.jadkul-destroy', $item->code)); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <a type="button" class="bs-tooltip btn btn-rounded btn-outline-danger"
                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"
                                    data-original-title="Delete"
                                    data-url="<?php echo e(route('web-admin.master.jadkul-destroy', $item->code)); ?>"
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

</section>
<div class="me-1 mb-1 d-inline-block">

    <!--Extra Large Modal -->
    <?php $__currentLoopData = $jadkul; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <form action="<?php echo e(route('web-admin.master.jadkul-update', $item->code)); ?>" method="POST" enctype="multipart/form-data">
        <?php echo method_field('patch'); ?>
        <?php echo csrf_field(); ?>
        <div class="modal fade text-left w-100" id="updateJadkul<?php echo e($item->code); ?>" tabindex="-1" role="dialog"
            aria-labelledby="myModalLabel16" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl"
                role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel16">Edit Jadwal Perkuliahan - <?php echo e($item->matkul->name . ' ' .$item->pert_id); ?></h4>
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
                    <div class="modal-body">
                        <div class="row">

                            <div class="form-group col-lg-3 col-12">
                                <label for="makul_id">Mata Kuliah</label>
                                <select name="makul_id" id="makul_id" class="form-select" readonly>
                                    <option value="" selected>Pilih Mata Kuliah</option>
                                    <?php $__currentLoopData = $matkul; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item_m): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php
                                        $dosen1_name = $item_m->dosen1 ? $item_m->dosen1->dsn_name : null;
                                        $dosen2_name = $item_m->dosen2 ? $item_m->dosen2->dsn_name : null;
                                        $dosen3_name = $item_m->dosen3 ? $item_m->dosen3->dsn_name : null;
                                    ?>
                                    <option value="<?php echo e($item_m->id); ?>" <?php echo e($item->makul_id == $item_m->id ? 'selected' : ''); ?> data-dosen1="<?php echo e($item_m->dosen_1); ?>" data-dosen2="<?php echo e($item_m->dosen_2); ?>" data-dosen3="<?php echo e($item_m->dosen_3); ?>" data-dosen1-name="<?php echo e($dosen1_name); ?>" data-dosen2-name="<?php echo e($dosen2_name); ?>" data-dosen3-name="<?php echo e($dosen3_name); ?>"><?php echo e($item_m->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <?php $__errorArgs = ['makul_id'];
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
                            <div class="form-group col-lg-3 col-12">
                                <label for="pert_id">Pertemuan</label>
                                <select name="pert_id" id="pert_id" class="form-select" readonly>
                                    <option value="" selected>Pilih Pertemuan</option>
                                    <option value="1" <?php echo e($item->raw_pert_id == 1 ? 'selected' : ''); ?>>Pertemuan 1</option>
                                    <option value="2" <?php echo e($item->raw_pert_id == 2 ? 'selected' : ''); ?>>Pertemuan 2</option>
                                    <option value="3" <?php echo e($item->raw_pert_id == 3 ? 'selected' : ''); ?>>Pertemuan 3</option>
                                    <option value="4" <?php echo e($item->raw_pert_id == 4 ? 'selected' : ''); ?>>Pertemuan 4</option>
                                    <option value="5" <?php echo e($item->raw_pert_id == 5 ? 'selected' : ''); ?>>Pertemuan 5</option>
                                    <option value="6" <?php echo e($item->raw_pert_id == 6 ? 'selected' : ''); ?>>Pertemuan 6</option>
                                    <option value="7" <?php echo e($item->raw_pert_id == 7 ? 'selected' : ''); ?>>Pertemuan 7</option>
                                    <option value="8" <?php echo e($item->raw_pert_id == 8 ? 'selected' : ''); ?>>Pertemuan 8</option>
                                    <option value="9" <?php echo e($item->raw_pert_id == 9 ? 'selected' : ''); ?>>Pertemuan 9</option>
                                    <option value="10" <?php echo e($item->raw_pert_id == 10 ? 'selected' : ''); ?>>Pertemuan 10</option>
                                    <option value="11" <?php echo e($item->raw_pert_id == 11 ? 'selected' : ''); ?>>Pertemuan 11</option>
                                    <option value="12" <?php echo e($item->raw_pert_id == 12 ? 'selected' : ''); ?>>Pertemuan 12</option>
                                    <option value="13" <?php echo e($item->raw_pert_id == 13 ? 'selected' : ''); ?>>Pertemuan 13</option>
                                    <option value="14" <?php echo e($item->raw_pert_id == 14 ? 'selected' : ''); ?>>Pertemuan 14</option>
                                    <option value="15" <?php echo e($item->raw_pert_id == 15 ? 'selected' : ''); ?>>Pertemuan 15</option>
                                    <option value="16" <?php echo e($item->raw_pert_id == 16 ? 'selected' : ''); ?>>Pertemuan 16</option>
                                </select>
                                <?php $__errorArgs = ['pert_id'];
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
                            <div class="form-group col-lg-3 col-12">
                                <label for="meth_id">Metode Perkuliahan</label>
                                <select name="meth_id" id="meth_id" class="form-select" >
                                    <option value="" selected>Pilih Metode Perkuliahan</option>
                                    <option value="0" <?php echo e($item->raw_meth_id == 0 ? 'selected' : ''); ?>>Tatap Muka</option>
                                    <option value="1" <?php echo e($item->raw_meth_id == 1 ? 'selected' : ''); ?>>Teleconference</option>
                                </select>
                                <?php $__errorArgs = ['meth_id'];
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
                            <div class="form-group col-lg-3 col-12">
                                <label for="bsks">Bebas SKS Hari Ini</label>
                                <input type="number" min="1" max="8" name="bsks" id="bsks" class="form-control" value="<?php echo e($item->bsks); ?>">
                                <?php $__errorArgs = ['bsks'];
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
                            <div class="form-group col-lg-3 col-12">
                                <label for="days_id">Hari</label>
                                <select name="days_id" id="days_id" class="form-select" >
                                    <option value="" selected>Pilih Hari</option>
                                    <option value="0" <?php echo e($item->raw_days_id == 0 ? 'selected' : ''); ?>>Hari Minggu</option>
                                    <option value="1" <?php echo e($item->raw_days_id == 1 ? 'selected' : ''); ?>>Hari Senin</option>
                                    <option value="2" <?php echo e($item->raw_days_id == 2 ? 'selected' : ''); ?>>Hari Selasa</option>
                                    <option value="3" <?php echo e($item->raw_days_id == 3 ? 'selected' : ''); ?>>Hari Rabu</option>
                                    <option value="4" <?php echo e($item->raw_days_id == 4 ? 'selected' : ''); ?>>Hari Kamis</option>
                                    <option value="5" <?php echo e($item->raw_days_id == 5 ? 'selected' : ''); ?>>Hari Jum'at</option>
                                    <option value="6" <?php echo e($item->raw_days_id == 6 ? 'selected' : ''); ?>>Hari Sabtu</option>
                                </select>
                                <?php $__errorArgs = ['days_id'];
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
                            <div class="form-group col-lg-3 col-12">
                                <label for="date">Tanggal Perkuliahan</label>
                                <input type="date" name="date" id="date" class="form-control" value="<?php echo e($item->date); ?>">
                                <?php $__errorArgs = ['date'];
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
                            <div class="form-group col-lg-3 col-12">
                                <label for="start">Waktu Mulai Perkuliahan</label>
                                <input type="time" name="start" id="start" class="form-control" value="<?php echo e($item->start); ?>">
                                <?php $__errorArgs = ['start'];
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
                            <div class="form-group col-lg-3 col-12">
                                <label for="ended">Waktu Selesai Perkuliahan</label>
                                <input type="time" name="ended" id="ended" class="form-control" value="<?php echo e($item->ended); ?>">
                                <?php $__errorArgs = ['ended'];
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
                                <label for="ruang_id">Ruangan</label>
                                <select name="ruang_id" id="ruang_id" class="form-select" >
                                    <option value="" selected>Pilih Ruangan</option>
                                    <?php $__currentLoopData = $ruang; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item_r): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($item_r->id); ?>" <?php echo e($item->ruang_id == $item_r->id ? 'selected' : ''); ?>><?php echo e($item_r->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <?php $__errorArgs = ['ruang_id'];
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
                                <label for="kelas_id">Kelas</label>
                                <select name="kelas_id" id="kelas_id" class="form-select" >
                                    <option value="" selected>Pilih Kelas</option>
                                    <?php $__currentLoopData = $kelas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item_k): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($item_k->id); ?>" <?php echo e($item->kelas_id == $item_k->id ? 'selected' : ''); ?>><?php echo e($item_k->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <?php $__errorArgs = ['kelas_id'];
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
                                <label for="dosen_id">Dosen</label>
                                <select name="dosen_id" id="dosen_id" class="form-select">
                                    <option value="" selected>Pilih Dosen</option>
                                    <option value="<?php echo e($item->matkul->dosen_1 == null ? '' : $item->matkul->dosen_1); ?>" <?php echo e($item->matkul->dosen_1 == $item->dosen_id ? 'selected' : ''); ?> <?php echo e($item->matkul->dosen_1 == null ? 'disabled' : ''); ?>><?php echo e($item->matkul->dosen_1 == null ? 'Tidak Tersedia' : $item->matkul->dosen1->dsn_name); ?></option>
                                    <option value="<?php echo e($item->matkul->dosen_2 == null ? '' : $item->matkul->dosen_2); ?>" <?php echo e($item->matkul->dosen_2 == $item->dosen_id ? 'selected' : ''); ?> <?php echo e($item->matkul->dosen_2 == null ? 'disabled' : ''); ?>><?php echo e($item->matkul->dosen_2 == null ? 'Tidak Tersedia' : $item->matkul->dosen2->dsn_name); ?></option>
                                    <option value="<?php echo e($item->matkul->dosen_3 == null ? '' : $item->matkul->dosen_3); ?>" <?php echo e($item->matkul->dosen_3 == $item->dosen_id ? 'selected' : ''); ?> <?php echo e($item->matkul->dosen_3 == null ? 'disabled' : ''); ?>><?php echo e($item->matkul->dosen_3 == null ? 'Tidak Tersedia' : $item->matkul->dosen3->dsn_name); ?></option>
                                </select>
                                <?php $__errorArgs = ['dosen_id'];
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
        </div>
    </form>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('custom-js'); ?>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('base.base-dash-index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/siakadpt/htdocs/siakad-pt.internal-dev.id/resources/views/user/admin/master/admin-jadkul-index.blade.php ENDPATH**/ ?>