<!DOCTYPE html>
<html dir="{{ LaravelLocalization::getCurrentLocaleDirection() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title') | لوحة التحكم</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('dashboardAssets/plugins/fontawesome-free/css/all.min.css')}}">
    <!-- Ionicons -->
    <!--<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">-->
    <!-- Tempusdominus Bbootstrap 4 -->

    <!-- iCheck -->
    <link rel="stylesheet" href="{{asset('dashboardAssets/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('dashboardAssets/dist/css/adminlte.css')}}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{asset('dashboardAssets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{asset('dashboardAssets/plugins/daterangepicker/daterangepicker.css')}}">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{asset('dashboardAssets/plugins/select2/css/select2.min.css')}}">
    <link rel="stylesheet"
        href="{{asset('dashboardAssets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
    @if (app()->getLocale() == "ar")
    <!-- Bootstrap 4 RTL -->
    <link rel="stylesheet" href="{{asset('dashboardAssets/dist/css/bootstrap-rtl.css')}}">
    <!-- Custom style for RTL -->
    <link rel="stylesheet" href="{{asset('dashboardAssets/dist/css/custom.css')}}">
    @else
    <link rel="stylesheet"
        href="{{asset('dashboardAssets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
    <!-- Custom style for LTR -->
    <link rel="stylesheet" href="{{asset('dashboardAssets/dist/css/custom-ltr.css')}}">
    @endif

    <!-- DataTables -->
    <link rel="stylesheet" href="{{asset('dashboardAssets/plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">
    <link rel="stylesheet" href="{{asset('dashboardAssets/plugins/datatables-buttons/css/buttons.bootstrap4.css')}}">
    @livewireStyles
</head>

<body {{-- oncontextmenu="return false;" --}} class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        @include('layouts.dashboard.includes.navbar')

        @include('layouts.dashboard.includes.aside')

        <div class="content-wrapper">

            @yield('content')

        </div>

        <footer class="main-footer">
            لوحة التحكم لموقع زاخر |
            جميع الحقوق محفوظة &copy; @php echo date('Y'); @endphp.
        </footer>
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="{{asset('dashboardAssets/plugins/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('dashboardAssets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- daterangepicker -->
    <script src="{{asset('dashboardAssets/plugins/moment/moment.min.js')}}"></script>
    <script src="{{asset('dashboardAssets/plugins/daterangepicker/daterangepicker.js')}}"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{asset('dashboardAssets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}">
    </script>
    <!-- Jquery Number -->
    <script src="{{asset('dashboardAssets/dist/js/jquery.number.min.js')}}"></script>
    <!-- overlayScrollbars -->
    <script src="{{asset('dashboardAssets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{asset('dashboardAssets/dist/js/adminlte.js')}}"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <!-- Select2 -->
    <script src="{{asset('dashboardAssets/plugins/select2/js/select2.full.min.js')}}"></script>
    <script src="{{asset('dashboardAssets/plugins/moment/moment.min.js')}}"></script>

    <!-- SweetAlert -->
    @include('sweetalert::alert')
    <script src="{{asset('vendor/sweetalert/sweetalert.all.js')}}"></script>

    <!-- Custom -->
    <script src="{{asset('dashboardAssets/dist/js/custom.js')}}"></script>
    <!-- DataTables -->
    <script src="{{asset('dashboardAssets/plugins/datatables/jquery.dataTables.js')}}"></script>
    <script src="{{asset('dashboardAssets/plugins/datatables-bs4/js/dataTables.bootstrap4.js')}}"></script>
    <script src="{{asset('dashboardAssets/plugins/datatables-buttons/js/dataTables.buttons.js')}}"></script>
    <script src="{{asset('dashboardAssets/plugins/datatables-buttons/js/buttons.flash.js')}}"></script>
    <script src="{{asset('dashboardAssets/plugins/datatables-buttons/js/jszip.js')}}"></script>
    <script src="{{asset('dashboardAssets/plugins/datatables-buttons/js/buttons.html5.js')}}"></script>
    <script src="{{asset('dashboardAssets/plugins/datatables-buttons/js/vfs_fonts.js')}}"></script>
    <script src="{{asset('dashboardAssets/plugins/datatables-buttons/js/pdfmake.js')}}"></script>
    <script src="{{asset('dashboardAssets/dist/js/keys.js')}}"></script>
    @if (app()->getLocale() == "ar")
    <script src="{{asset('dashboardAssets/dist/js/pages/welcome.js')}}"></script>
    @else
    <script src="{{asset('dashboardAssets/dist/js/pages/welcome-ltr.js')}}"></script>

    @endif

    <script>
        // Select 2
        $('.select2').select2({
            theme: 'bootstrap4'
        });
    </script>


    @stack('scripts')

    <script>
        $(".delete").click(function (e) {
            e.preventDefault(); // prevent form submit
            var form = e.target.form; // storing the form
            Swal.fire({
                title: "@Lang('admin.confirm_delete')",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: "#28a745",
                cancelButtonColor: "#dc3545",
                confirmButtonText: "@Lang('admin.yes')",
                cancelButtonText: "@Lang('admin.cancel')",
                closeOnConfirm: false,
                closeOnCancel: false
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });
    </script>

    @livewireScripts
</body>

</html>