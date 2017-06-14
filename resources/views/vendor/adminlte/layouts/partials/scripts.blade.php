<!-- REQUIRED JS SCRIPTS -->

<!-- JQuery and bootstrap are required by Laravel 5.3 in resources/assets/js/bootstrap.js-->
<!-- Laravel App -->
<script src="{{ url (mix('/js/app.js')) }}" type="text/javascript"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css"></script> -->
<script type="text/javascript">
$(".deleteRole").click(function(){

        var id = $(this).data("id");
        var token = $(this).data("token");
        $.ajax(
        {
            url: "role/delete/"+id,
            type: 'PUT',
            dataType: "JSON",
            data: {
                "id": id,
                "_method": 'DELETE',
                "_token": token,
            },
            success: function ()
            {
                console.log("it Work");
            }
        });

        console.log("It failed");
    });
</script>

<!-- Optionally, you can add Slimscroll and FastClick plugins.
      Both of these plugins are recommended to enhance the
      user experience. Slimscroll is required when using the
      fixed layout. -->

<script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
@stack('scripts');
