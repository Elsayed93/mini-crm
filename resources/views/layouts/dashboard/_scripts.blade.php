<!-- jQuery -->
<script src="{{ asset('dashboard_files') }}/plugins/jquery/jquery.min.js"></script>

<!-- Bootstrap 4 -->
<script src="{{ asset('dashboard_files') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- AdminLTE App -->
<script src="{{ asset('dashboard_files') }}/js/adminlte.js"></script>

<!-- datatables -->
<script src="//cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>

{{-- toastr --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<!-- toastr -->
@include('layouts.dashboard._toastr')

<!-- logout -->
<script>
    $(document).ready(function() {
        $(document).on('click', '#log-out-link', function(e) {
            e.preventDefault();
            $('#log-out-form').submit();
        });
    });
</script>

<!-- image preview -->
<script>
    let imgInp = document.getElementsByClassName('imgInp');
    if (imgInp[0]) {
        imgInp[0].onchange = evt => {
            const [file] = imgInp[0].files
            if (file) {
                let image_preview = document.getElementsByClassName('image-show');
                image_preview[0].style.display = "inline-block";
                image_preview[0].src = URL.createObjectURL(file);
            }
        }
    }
</script>

<!-- delete btn -->
<script>
    $(document).ready(function() {
        $(document).on('click', '.deleteBtn', function(e) {
            e.preventDefault();
            const confirmDelete = confirm('Are you sure?');
            if (confirmDelete) {
                $(this).closest('form').submit();
            }

        });
    });
</script>

@stack('scripts')
