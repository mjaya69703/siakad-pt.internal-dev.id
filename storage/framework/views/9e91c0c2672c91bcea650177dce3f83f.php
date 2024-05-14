<script src="<?php echo e(asset('dist')); ?>/assets/static/js/components/dark.js"></script>
<script src="<?php echo e(asset('dist')); ?>/assets/extensions/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="<?php echo e(asset('dist')); ?>/assets/compiled/js/app.js"></script>

<script src="<?php echo e(asset('dist')); ?>/assets/extensions/simple-datatables/umd/simple-datatables.js"></script>
<script src="<?php echo e(asset('dist')); ?>/assets/static/js/pages/simple-datatables.js"></script>
<script src="https://cdn.datatables.net/2.0.5/js/dataTables.min.js"></script>

<script src="<?php echo e(asset('vendor')); ?>/sweetalerts2/custom-sweetalert.js"></script>
<script src="<?php echo e(asset('vendor')); ?>/sweetalerts2/sweetalerts2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>


<?php echo $__env->yieldContent('custom-js'); ?>
<script>
    function logout(event) {
        event.preventDefault();

        Swal.fire({
            title: 'Are you sure?',
            text: 'You will be logged out!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, log out',
            cancelButtonText: 'Cancel',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('logout-form').submit();
            } else if (result.dismiss === Swal.DismissReason.cancel) {
                Swal.fire(
                    'Cancelled',
                    'Logout cancelled',
                    'error'
                );
            }
        });
    }
</script>
<script>
    function deleteData(id) {
        Swal.fire({
            title: 'Are you sure?',
            text: 'You are going to delete this item.',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it',
            cancelButtonText: 'Cancel',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('delete-form-' + id).submit();
            } else if (result.dismiss === Swal.DismissReason.cancel) {
                Swal.fire(
                    'Cancelled',
                    'Deletion cancelled',
                    'error'
                );
            }
        });
    }
</script>

<script>
$(document).ready( function () {
    $('#myTable').DataTable();
} );
</script>
<?php /**PATH /home/siakadpt/htdocs/siakad-pt.internal-dev.id/resources/views/base/panel/base-panel-footer-script.blade.php ENDPATH**/ ?>