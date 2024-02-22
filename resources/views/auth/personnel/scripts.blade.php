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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript">
    $(function () {
          var table = $('#myTable').DataTable({
              processing: true,
              serverSide: true,
              ajax: "{{ route('personnels.index') }}",
              columns: [
                  {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                  {data: 'name', name: 'name'},
                  {data: 'username', name: 'username'},
              ]
          });
        });
</script>