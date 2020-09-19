<!DOCTYPE html>
<html dir="{{ LaravelLocalization::getCurrentLocaleDirection() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>تسجيل الدخول | لوحة التحكم</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('dashboardAssets/plugins/fontawesome-free/css/all.min.css')}}">
    <!-- Ionicons -->
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet"
        href="{{asset('dashboardAssets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">

    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('dashboardAssets/dist/css/adminlte.min.css')}}">

    @if (app()->getLocale() == "ar")
    <!-- Bootstrap 4 RTL -->
    <link rel="stylesheet" href="{{asset('dashboardAssets/dist/css/bootstrap-rtl.css')}}">
    <!-- Custom style for RTL -->
    <link rel="stylesheet" href="{{asset('dashboardAssets/dist/css/custom.css')}}">
    @else

    @endif
    <!-- jQuery -->
    <script src="{{asset('dashboardAssets/plugins/jquery/jquery.min.js')}}"></script>
    <!--Noty-->
    <link rel="stylesheet" href="{{asset('dashboardAssets/dist/css/noty.css')}}">
    <script src="{{asset('dashboardAssets/dist/js/noty.js')}}"></script>
</head>

<body class="hold-transition login-page">


    @yield('content')


    <footer class="main-footer m-0" style="position:fixed; bottom:0; width:100%;">
        لوحة التحكم لموقع زاخر |
        جميع الحقوق محفوظة &copy; @php echo date('Y'); @endphp.
    
    </footer>
    <!-- ./wrapper -->


    <script src="{{asset('dashboardAssets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{asset('dashboardAssets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}">
    </script>
    <!-- AdminLTE App -->
    <script src="{{asset('dashboardAssets/dist/js/adminlte.js')}}"></script>

    <script src="{{asset('dashboardAssets/dist/js/keys.js')}}"></script>


</body>

</html>
