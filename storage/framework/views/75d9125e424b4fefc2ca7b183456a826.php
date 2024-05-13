<?php $__env->startSection('title'); ?>
    Data Tagihan Perkuliahan - Siakad By Internal Developer
<?php $__env->stopSection(); ?>
<?php $__env->startSection('menu'); ?>
    Data Tagihan Perkuliahan
<?php $__env->stopSection(); ?>
<?php $__env->startSection('submenu'); ?>
    Lihat Tagihan <?php echo e($tagihan->code); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('urlmenu'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('subdesc'); ?>
    Halaman untuk melihat Tagihan <?php echo e($tagihan->code); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('custom-css'); ?>
<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
<meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests" />
<meta name="viewport" content="width=device-width, initial-scale=1">


<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<section class="section">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title d-flex justify-content-between align-items-center">
                <?php echo $__env->yieldContent('menu'); ?>
                <div class="">
                    <a href="<?php echo e(route('mahasiswa.home-tagihan-index')); ?>" class="btn btn-outline-warning"><i class="fa-solid fa-backward"></i></a>
                </div>
            </h5>
        </div>
        <div class="card-body ">
            <form id="payment-form" action="<?php echo e(route('mahasiswa.home-tagihan-payment', $tagihan->code)); ?>" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>

                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" readonly value="<?php echo e(Auth::guard('mahasiswa')->user()->mhs_name); ?>" name="name">
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" readonly value="<?php echo e(Auth::guard('mahasiswa')->user()->mhs_mail); ?>" name="email">
                </div>

                <div class="form-group">
                    <label for="amount">Amount</label>
                    <input type="number" class="form-control" id="amount" readonly value="<?php echo e($tagihan->price); ?>" name="amount">
                </div>

                <div class="form-group">
                    <label for="note">Note</label>
                    <textarea class="form-control" id="note" name="note" >Pembayaran Tagihan Kuliah <?php echo e($tagihan->code); ?></textarea>
                </div>
                

                <button type="submit" id="pay-button" class="btn btn-primary">Pay Now</button>
            </form>

        </div>
    </div>

</section>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('custom-js'); ?>
<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="<?php echo e(config('services.midtrans.clientKey')); ?>"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>    

<script type="text/javascript">
    var snapToken = ""; // Inisialisasi snapToken

    // Fungsi untuk melakukan permintaan pembayaran
    $('#pay-button').click(function (event) {
        event.preventDefault();

        $.post("<?php echo e(route('mahasiswa.home-tagihan-payment', $tagihan->code)); ?>", {
            _token: '<?php echo e(csrf_token()); ?>',
            name: $('#name').val(),
            email: $('#email').val(),
            amount: $('#amount').val(),
            note: $('#note').val()
        },
        function (data, status) {
            
            snapToken = data.snap_token; // Simpan snapToken dari respons server
            uniqCode = data.code_uniq; // Simpan snapToken dari respons server
            // $('#snap-token').val(snapToken);

            console.log(data.snap_token); // Tambahkan ini untuk debugging
            // var snapToken = document.getElementById('snap-token').value;
            snap.pay(snapToken, {
                onSuccess: function (result) {
                    // location.reload();
                    window.location.href = "<?php echo e(route('mahasiswa.home-tagihan-payment-success', ':uniqCode')); ?>".replace(':uniqCode', uniqCode);

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
</script>

    
    

<?php $__env->stopSection(); ?>
<?php echo $__env->make('base.base-dash-index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/siakadpt/htdocs/siakad-pt.internal-dev.id/resources/views/mahasiswa/pages/mhs-tagihan-view.blade.php ENDPATH**/ ?>