@if (session()->has('success'))
    <script>
        let sessionMessage = "{{ session('success') }}";

        toastr.options.closeButton = true;
        toastr.options.progressBar = true;
        // Display a success toast
        toastr.success(sessionMessage);
    </script>
@endif



@if (session()->has('error'))
    <script>
        let sessionMessage = "{{ session('error') }}";

        toastr.options.closeButton = true;
        toastr.options.progressBar = true;
        // Display an error toast
        toastr.error(sessionMessage, 'Inconceivable!')
    </script>
@endif
