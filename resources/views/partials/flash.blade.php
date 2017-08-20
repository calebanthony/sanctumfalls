@if (session()->has('flash_message'))
    <script>
        swal({
          title: "{{ session('flash_message.title') }}",
          text: "{{ session('flash_message.message') }}",
          type: "{{ session('flash_message.level') }}",
          timer: 1900,
          showConfirmButton: false,
        });
    </script>
@endif

@if (session()->has('flash_message-overlay'))
    <script>
        swal({
            title: "{{ session('flash_message-overlay.title') }}",
            text: "{{ session('flash_message-overlay.message') }}",
            type: "{{ session('flash_message-overlay.level') }}",
            confirmButtonText: "Okay"
        });
    </script>
@endif
