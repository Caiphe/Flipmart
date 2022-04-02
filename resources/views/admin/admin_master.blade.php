<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{ asset('backend/images/favicon.ico') }}">

    <title>Flitmart - admin</title>

	<link rel="stylesheet" href="{{ asset('backend/css/vendors_css.css') }}">
	<link rel="stylesheet" href="{{ asset('backend/css/style.css') }}">
	<link rel="stylesheet" href="{{ asset('backend/css/skin_color.css') }}">
	<link rel="stylesheet" href="{{ asset('backend/css/taostr.css') }}">

  </head>

<body class="hold-transition dark-skin sidebar-mini theme-primary fixed">

<div class="wrapper">

    @include('admin.body.header')
    @include('admin.body.sidebar')

  <div class="content-wrapper">
    @yield('admin')
  </div>

    @include('admin.body.footer')

</div>
<!-- ./wrapper -->


	<!-- Vendor JS -->
    <script type="text/javascript" src="{{ asset('backend/js/jquery.js') }}"></script>
	<script type="text/javascript" src="{{ asset('backend/js/vendors.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('backend/js/sweet.js') }}"></script>
    <script type="text/javascript" src="{{ asset('../assets/icons/feather-icons/feather.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('../assets/vendor_components/datatable/datatables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('../assets/vendor_components/bootstrap-tagsinput/dist/bootstrap-tagsinput.js') }}"></script>
    <script type="text/javascript" src="{{ asset('backend/js/pages/data-table.js') }}"></script>

	<!-- Sunny Admin App -->
	<script type="text/javascript" src="{{ asset('backend/js/template.js') }}"></script>
	<script type="text/javascript" src="{{ asset('backend/js/toastr.js') }}"></script>
	<script type="text/javascript" src="{{ asset('backend/js/pages/dashboard.js') }}"></script>

    <script type="text/javascript">
        @if(Session::has('message'))
        var type ="{{ Session::get('alert-type','info') }}"
        switch(type){
            case 'info':
                toastr.info("{{ Session::get('message') }}");
                break;

            case 'success':
                toastr.success("{{ Session::get('message') }}");
                break;

            case 'warning':
                toastr.warning("{{ Session::get('message') }}");
                break;

            case 'error':
                toastr.error("{{ Session::get('message') }}");
                break;

        }
        @endif

        $(document).on('click', '.delete-data', function(e){
        e.preventDefault();
        var link = $(this).attr('href');
        Swal.fire({
            title: 'Are you sure?',
            text: "You want to delete this data",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = link;
                Swal.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                )
            }
        });
    });
    </script>
</body>
</html>
