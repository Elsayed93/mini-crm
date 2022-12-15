<!-- jQuery -->
<script src="{{ asset('dashboard_files') }}/plugins/jquery/jquery.min.js"></script>

<!-- Bootstrap 4 -->
<script src="{{ asset('dashboard_files') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- AdminLTE App -->
<script src="{{ asset('dashboard_files') }}/js/adminlte.js"></script>

<!-- datatables -->
<script src="//cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>

<!-- logout -->
<script>
    $(document).ready(function() {
        $(document).on('click', '#log-out-link', function(e) {
            e.preventDefault();
            $('#log-out-form').submit();
        });
    });
</script>
@stack('scripts')
