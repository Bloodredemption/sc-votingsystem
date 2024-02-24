<script src="{{ asset('assets/libs/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ asset('assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
{{-- <script src="{{ asset('assets/js/sidebarmenu.js') }}"></script> --}}
<script src="{{ asset('assets/js/app.min.js') }}"></script>
<script src="{{ asset('assets/libs/simplebar/dist/simplebar.js') }}"></script>
{{-- <script>
    // Assuming you're using jQuery for simplicity
    $('.sidebar-link').on('click', function(event) {
        event.preventDefault(); // Prevent default action of the link
        var url = $(this).attr('href'); // Get the URL from the link
        $.ajax({
            url: url,
            method: 'GET',
            success: function(response) {
                $('.container-fluid').html(response); // Update the content of container-fluid
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
    });
</script> --}}
{{-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>
    document.getElementById('delete-btn').onclick = function () {
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('delete-form').submit();
            }
        });
    };
</script> --}}