<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords"
          content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 5 admin, bootstrap 5, css3 dashboard, bootstrap 5 dashboard, Matrix lite admin bootstrap 5 dashboard, frontend, responsive bootstrap 5 admin template, Matrix admin lite design, Matrix admin lite dashboard bootstrap 5 dashboard template">
    <meta name="description"
          content="Matrix Admin Lite Free Version is powerful and clean admin dashboard template, inpired from Bootstrap Framework">
    <meta name="robots" content="noindex,nofollow">
    <title>Matrix Admin Lite Free Versions Template by WrapPixel</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{!! asset('assets/backend/admin/assets/images/favicon.png') !!}">
    <!-- Custom CSS -->
    <link href="{!! asset('assets/backend/admin/assets/libs/flot/css/float-chart.css') !!}" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{!! asset('assets/backend/admin/dist/css/style.min.css') !!}" rel="stylesheet">
    <link href="{!! asset('assets/backend/admin/assets/libs/toastr/build/toastr.min.css') !!}" rel="stylesheet">
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    @stack('css')

</head>

<body>
<!-- ============================================================== -->
<!-- Preloader - style you can find in spinners.css -->
<!-- ============================================================== -->
<div class="preloader">
    <div class="lds-ripple">
        <div class="lds-pos"></div>
        <div class="lds-pos"></div>
    </div>
</div>
<!-- ============================================================== -->
<!-- Main wrapper - style you can find in pages.scss -->
<!-- ============================================================== -->
<div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full"
     data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">

    <x-backend.layout.header/>


    <x-backend.layout.sidebar/>

    <div class="page-wrapper">

        <div class="page-breadcrumb">
            <div class="row">
                <div class="col-12 d-flex no-block align-items-center">
                    <h4 class="page-title">Dashboard</h4>
                    <div class="ms-auto text-end">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Library</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            @yield('content')
        </div>

        <footer class="footer text-center">
            All Rights Reserved by Matrix-admin. Designed and Developed by <a
                href="https://www.wrappixel.com">WrapPixel</a>.
        </footer>

    </div>

</div>

<script src="{!! asset('assets/backend/admin/assets/libs/jquery/dist/jquery.min.js') !!}"></script>
<!-- Bootstrap tether Core JavaScript -->
<script src="{!! asset('assets/backend/admin/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') !!}"></script>
<script src="{!! asset('assets/backend/admin/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js') !!}"></script>
<script src="{!! asset('assets/backend/admin/assets/extra-libs/sparkline/sparkline.js') !!}"></script>
<!--Wave Effects -->
<script src="{!! asset('assets/backend/admin/dist/js/waves.js') !!}"></script>
<!--Menu sidebar -->
<script src="{!! asset('assets/backend/admin/dist/js/sidebarmenu.js') !!}"></script>
<!--Custom JavaScript -->
<script src="{!! asset('assets/backend/admin/dist/js/custom.min.js') !!}"></script>
<!--This page JavaScript -->
<!-- <script src="../../dist/js/pages/dashboards/dashboard1.js"></script> -->
<!-- Charts js Files -->
<script src="{!! asset('assets/backend/admin/assets/libs/flot/excanvas.js') !!}"></script>
<script src="{!! asset('assets/backend/admin/assets/libs/flot/jquery.flot.js') !!}"></script>
<script src="{!! asset('assets/backend/admin/assets/libs/flot/jquery.flot.pie.js') !!}"></script>
<script src="{!! asset('assets/backend/admin/assets/libs/flot/jquery.flot.time.js')!!}"></script>
<script src="{!! asset('assets/backend/admin/assets/libs/flot/jquery.flot.stack.js') !!}"></script>
<script src="{!! asset('assets/backend/admin/assets/libs/flot/jquery.flot.crosshair.js') !!}"></script>
<script src="{!! asset('assets/backend/admin/assets/libs/flot.tooltip/js/jquery.flot.tooltip.min.js') !!}"></script>
<script src="{!! asset('assets/backend/admin/dist/js/pages/chart/chart-page-init.js') !!}"></script>
<script src="{!! asset('assets/backend/admin/assets/libs/toastr/build/toastr.min.js')!!}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
<script>
     $(document).ready(function(){
         const sessionSuccess = '{!! session('success') !!}';
         const sessionFailed = '{!! session('failed') !!}';

         if (sessionSuccess){
             toastr.success(sessionSuccess);
         }

         if (sessionFailed){
             toastr.error(sessionFailed);
         }

     })
</script>
@stack('js')

</body>

</html>
