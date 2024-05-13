<?php $__env->startSection('title'); ?>
    Data Tagihan Perkuliahan - Siakad By Internal Developer
<?php $__env->stopSection(); ?>
<?php $__env->startSection('menu'); ?>
    Data Tagihan Perkuliahan
<?php $__env->stopSection(); ?>
<?php $__env->startSection('submenu'); ?>
    Daftar Tagihan
<?php $__env->stopSection(); ?>
<?php $__env->startSection('urlmenu'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('subdesc'); ?>
    Halaman untuk melihat Tagihan Perkuliahan
<?php $__env->stopSection(); ?>
<?php $__env->startSection('custom-css'); ?>
<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<section class="section">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title d-flex justify-content-between align-items-center">
                <?php echo $__env->yieldContent('menu'); ?>
                <div class="">
                    
                </div>
            </h5>
        </div>
        <div class="card-body">
            <table class="table table-striped"  id="table1">
                <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">Kode Tagihan</th>
                        <th class="text-center">Nama Tagihan</th>
                        <th class="text-center">Nominal Tagihan</th>
                        <th class="text-center">Button</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $tagihan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        
                    <tr>
                        <td data-label="Number"><?php echo e(++$key); ?></td>
                        <td data-label="Kode Tagihan"><span style="text-transform: uppercase"><?php echo e($item->code); ?></span></td>
                        <td data-label="Nama Tagihan"><?php echo e($item->name); ?></td>
                        <td data-label="Nominal Bayar">Rp. <?php echo e(number_format($item->price, 0, ',', '.')); ?></td>
                        <td class="d-flex justify-content-center align-items-center">
                            <a href="<?php echo e(route('mahasiswa.home-tagihan-view', $item->code)); ?>" class="btn btn-outline-success"><i style="margin-right: 5px" class="fa-solid fa-money-bill-transfer"></i> Bayar Sekarang</a>


                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
 
                </tbody>
            </table>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <h5 class="card-title d-flex justify-content-between align-items-center">
                Riwayat Tagihan
                <div class="">
                    
                </div>
            </h5>
        </div>
        <div class="card-body">
            <table class="table table-striped"  id="table1">
                <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">Kode Tagihan</th>
                        <th class="text-center">Kode Bayar</th>
                        <th class="text-center">Nominal Bayar</th>
                        <th class="text-center">Status Tagihan</th>
                        
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $history; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        
                    <tr>
                        <td data-label="Number"><?php echo e(++$key); ?></td>
                        <td data-label="Kode Pembayaran"><span style="text-transform: uppercase"><?php echo e($item->code); ?></span></td>
                        <td data-label="Kode Bayar"><span style="text-transform: uppercase"><?php echo e($item->tagihan_code); ?></span></td>
                        <td data-label="Nominal Bayar">Rp. <?php echo e(number_format($item->tagihan->price, 0, ',', '.')); ?></td>
                        <td data-label="Status"><?php echo e($item->stat === 1 ? 'PAID' : 'UN-PAID'); ?></td>
                        
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
 
                </tbody>
            </table>
        </div>
    </div>

</section>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('custom-js'); ?>
<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="<?php echo e(config('services.midtrans.clientKey')); ?>"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>    
<script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $('.pay-button').click(function (event) {
            event.preventDefault();
            
            var code = $(this).data('code'); // Ambil kode tagihan dari atribut data
            
            $.post("<?php echo e(route('mahasiswa.home-tagihan-payment', ':code')); ?>".replace(':code', code), { // Ganti placeholder :code dengan nilai kode tagihan
                _token: '<?php echo e(csrf_token()); ?>',
            },
            function (data, status) {
                snap.pay(data.snap_token, {
                    onSuccess: function (result) {
                        location.reload();
                    },
                    onPending: function (result) {
                        location.reload();
                    },
                    onError: function (result) {
                        location.reload();
                    }
                });
            });
        });
    });
</script>
    
<script>
// Fungsi untuk memperbarui tabel dengan data terbaru
function updateTable() {
    // Kirim permintaan AJAX ke endpoint yang sesuai dengan menggunakan nama rute
    fetch('/mahasiswa/ajax/getTagihan')
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json(); // Mengonversi respons menjadi JSON
        })
        .then(data => {
            // Perbarui tabel HTML dengan data terbaru
            const tbody = document.querySelector('#table1 tbody');
            tbody.innerHTML = ''; // Hapus semua baris yang ada sebelumnya

            let number = 1;
            // Loop through data tagihan and add rows to the table
            data.tagihan.forEach(item => {
                const formattedPrice = new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR' }).format(item.price);
                const row = `
                    <tr>
                        <td data-label="Number">${number}</td>
                        <td data-label="Kode Tagihan"><span style="text-transform: uppercase">${item.code}</span></td>
                        <td data-label="Nama Tagihan">${item.name}</td>
                        <td data-label="Nominal Bayar">${formattedPrice}</td>
                        <td class="d-flex justify-content-center align-items-center">
                            <a href="/mahasiswa/home-tagihan-view/${item.code}" class="btn btn-outline-success"><i style="margin-right: 5px" class="fa-solid fa-money-bill-transfer"></i> Bayar Sekarang</a>
                        </td>
                    </tr>
                `;
                tbody.innerHTML += row; // Tambahkan baris baru ke tabel
                number++; // Tingkatkan nomor ID untuk baris berikutnya

            });
            // Loop through history data and do something with it if needed
            data.history.forEach(historyItem => {
                // Do something with history data if needed
            });
        })
        .catch(error => console.error('Error:', error));
}

// Jalankan fungsi updateTable secara berkala setiap beberapa detik (misalnya, setiap 5 detik)
setInterval(updateTable, 5000); // 5000 milidetik = 5 detik

</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('base.base-dash-index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/siakadpt/htdocs/siakad-pt.internal-dev.id/resources/views/mahasiswa/pages/mhs-tagihan-index.blade.php ENDPATH**/ ?>