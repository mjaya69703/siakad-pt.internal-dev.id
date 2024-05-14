<?php $__env->startSection('title'); ?>
    Data Jadwal Kuliah - Siakad By Internal Developer
<?php $__env->stopSection(); ?>
<?php $__env->startSection('menu'); ?>
    Data Jadwal Kuliah
<?php $__env->stopSection(); ?>
<?php $__env->startSection('submenu'); ?>
    Data Jadwal Kuliah
<?php $__env->stopSection(); ?>
<?php $__env->startSection('urlmenu'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('subdesc'); ?>
    Halaman untuk melihat Jadwal Kuliah
<?php $__env->stopSection(); ?>
<?php $__env->startSection('custom-css'); ?>
<style>
    table {
  border: 1px solid #ccc;
  border-collapse: collapse;
  margin: 0;
  padding: 0;
  width: 100%;
  table-layout: fixed;
}

table caption {
  font-size: 1.5em;
  margin: .5em 0 .75em;
}

table tr {
  /* background-color: #f8f8f8; */
  border: 1px solid #ddd;
  padding: .35em;
}

table th,
table td {
  padding: .625em;
  text-align: center;
}

table th {
  font-size: .85em;
  letter-spacing: .1em;
  text-transform: uppercase;
}

@media screen and (max-width: 600px) {
  table {
    border: 0;
  }

  table caption {
    font-size: 1.3em;
  }
  
  table thead {
    border: none;
    clip: rect(0 0 0 0);
    height: 1px;
    margin: -1px;
    overflow: hidden;
    padding: 0;
    position: absolute;
    width: 1px;
  }
  
  table tr {
    border-bottom: 3px solid #ddd;
    display: block;
    margin-bottom: .625em;
  }
  
  table td {
    border-bottom: 1px solid #ddd;
    display: block;
    font-size: .8em;
    text-align: right;
  }
  
  table td::before {
    /*
    * aria-label has no advantage, it won't be read inside a table
    content: attr(aria-label);
    */
    content: attr(data-label);
    float: left;
    font-weight: bold;
    text-transform: uppercase;
  }
  
  table td:last-child {
    border-bottom: 0;
  }
}
</style>
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
                        
                        <th class="text-center">Nama Kelas</th>
                        <th class="text-center">Nama Mata Kuliah</th>
                        <th class="text-center">Dosen Pengajar</th>
                        <th class="text-center">Metode Perkuliahan</th>
                        <th class="text-center">Lokasi Perkuliahan</th>
                        <th class="text-center">Tanggal Perkuliahan</th>
                        <th class="text-center">Waktu Perkuliahan</th>
                        <th class="text-center">Button</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $jadkul; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        
                    <tr>
                        <td data-label="Number"><?php echo e(++$key); ?></td>
                        
                        <td data-label="Nama Kelas"><?php echo e($item->kelas->code); ?></td>
                        <td data-label="Mata Kuliah"><?php echo e($item->matkul->name); ?> <br> <?php echo e($item->pert_id . ' - ' . $item->bsks . ' SKS'); ?></td>
                        <td data-label="Nama Dosen"><?php echo e($item->dosen->dsn_name); ?></td>
                        <td data-label="Metode"><?php echo e($item->meth_id); ?></td>
                        <td data-label="Lokasi"><?php echo e($item->ruang->gedung->name); ?><br><?php echo e($item->ruang->name . ' - Lantai ' . $item->ruang->floor); ?></td>
                        <td data-label="Tanggal Kuliah"><?php echo e($item->days_id); ?> <br> - <br> <?php echo e(\Carbon\Carbon::parse($item->date)->format('d M Y')); ?></td>
                        <td data-label="Waktu Perkuliahan"><?php echo e($item->start); ?> <br> - <br> <?php echo e($item->ended); ?></td>
                        <td class="d-flex justify-content-center align-items-center">
                            <a href="<?php echo e(route('mahasiswa.home-jadkul-absen', $item->code)); ?>" style="margin-right: 10px" class="btn btn-info"><i class="fas fa-calendar-check"></i> Absensi</a>

                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
 
                </tbody>
            </table>
        </div>
    </div>

</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('base.base-dash-index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/siakadpt/htdocs/siakad-pt.internal-dev.id/resources/views/mahasiswa/pages/mhs-jadkul-index.blade.php ENDPATH**/ ?>