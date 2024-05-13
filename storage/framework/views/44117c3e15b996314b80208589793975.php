<?php if(Session::has('alert.config') || Session::has('alert.delete')): ?>
    <?php if(config('sweetalert.animation.enable')): ?>
        <link rel="stylesheet" href="<?php echo e(config('sweetalert.animatecss')); ?>">
    <?php endif; ?>

    <?php if(config('sweetalert.theme') != 'default'): ?>
        <link href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-<?php echo e(config('sweetalert.theme')); ?>" rel="stylesheet">
    <?php endif; ?>

    <?php if(config('sweetalert.alwaysLoadJS') === false && config('sweetalert.neverLoadJS') === false): ?>
        <script src="<?php echo e($cdn ?? asset('vendor/sweetalert/sweetalert.all.js')); ?>"></script>
    <?php endif; ?>
    <script>
        <?php if(Session::has('alert.delete')): ?>
            document.addEventListener('click', function(event) {
                if (event.target.matches('[data-confirm-delete]')) {
                    event.preventDefault();
                    Swal.fire(<?php echo Session::pull('alert.delete'); ?>).then(function(result) {
                        if (result.isConfirmed) {
                            var form = document.createElement('form');
                            form.action = event.target.href;
                            form.method = 'POST';
                            form.innerHTML = `
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>
                `;
                            document.body.appendChild(form);
                            form.submit();
                        }
                    });
                }
            });
        <?php endif; ?>

        <?php if(Session::has('alert.config')): ?>
            Swal.fire(<?php echo Session::pull('alert.config'); ?>);
        <?php endif; ?>
    </script>
<?php endif; ?>
<?php /**PATH /home/siakadpt/htdocs/siakad-pt.internal-dev.id/resources/views/vendor/sweetalert/alert.blade.php ENDPATH**/ ?>