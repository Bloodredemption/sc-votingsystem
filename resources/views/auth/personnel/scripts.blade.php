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

<script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>