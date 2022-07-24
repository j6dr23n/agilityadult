<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from laravel8.spruko.com/nowa/index2 by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 13 Mar 2022 12:09:51 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<head>

    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Title -->
    <title>Agility Adult- Dashboard</title>

    <!-- FAVICON -->
    <link rel="icon" href="{{ asset('backend/assets/img/brand/favicon.png') }}" type="image/x-icon" />

    <!-- ICONS CSS -->
    <link href="{{ asset('backend/assets/plugins/icons/icons.css') }}" rel="stylesheet">

    <!-- BOOTSTRAP CSS -->
    <link href="{{ asset('backend/assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" />

    <!-- RIGHT-SIDEMENU CSS -->
    <link href="{{ asset('backend/assets/plugins/sidebar/sidebar.css') }}" rel="stylesheet">

    <!-- P-SCROLL BAR CSS -->
    <link href="{{ asset('backend/assets/plugins/perfect-scrollbar/p-scrollbar.css') }}" rel="stylesheet" />


    <!-- INTERNAL Select2 css -->
    <link href="{{ asset('backend/assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet" />

    <!-- INTERNAL Data table css -->
    <link href="{{ asset('backend/assets/plugins/datatable/css/dataTables.bootstrap5.css') }}" rel="stylesheet" />
    <link href="{{ asset('backend/assets/plugins/datatable/css/buttons.bootstrap5.min.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/assets/plugins/datatable/responsive.bootstrap5.css') }}" rel="stylesheet" />


    <!-- STYLES CSS -->
    <link href="{{ asset('backend/assets/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/assets/css/style-dark.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/assets/css/style-transparent.css') }}" rel="stylesheet">


    <!-- SKIN-MODES CSS -->
    <link href="{{ asset('backend/assets/css/skin-modes.css') }}" rel="stylesheet" />

    <!-- ANIMATION CSS -->
    <link href="{{ asset('backend/assets/css/animate.css') }}" rel="stylesheet">

    <!-- SWITCHER CSS -->
    <link href="{{ asset('backend/assets/switcher/css/switcher.css') }}" rel="stylesheet" />
    <link href="{{ asset('backend/assets/switcher/demo.css') }}" rel="stylesheet" />

    <!-- toastr css -->
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    @yield('extra-css')

</head>

<body class="ltr main-body app sidebar-mini">

    @include('backend.partials._loader')

    <!-- Page -->
    <div class="page">

        <div>

            @include('backend.partials._header')

            @include('backend.partials._sidebar')

        </div>

        @yield('content')

        @include('backend.partials._modal')

        @include('backend.partials._footer')

    </div>
    <!-- End Page -->

    <!-- BACK-TO-TOP -->
    <a href="#top" id="back-to-top"><i class="las la-arrow-up"></i></a>

    <!-- JQUERY JS -->
    <script src="{{ asset('backend/assets/plugins/jquery/jquery.min.js') }}"></script>

    <!-- BOOTSTRAP JS -->
    <script src="{{ asset('backend/assets/plugins/bootstrap/js/popper.min.js') }}"></script>
    <script src="{{ asset('backend/assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>

    <!-- IONICONS JS -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

    <!-- MOMENT JS -->
    <script src="{{ asset('backend/assets/plugins/moment/moment.js') }}"></script>

    <!-- P-SCROLL JS -->
    <script src="{{ asset('backend/assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('backend/assets/plugins/perfect-scrollbar/p-scroll.js') }}"></script>

    <!-- SIDEBAR JS -->
    <script src="{{ asset('backend/assets/plugins/side-menu/sidemenu.js') }}"></script>

    <!-- STICKY JS -->
    <script src="{{ asset('backend/assets/js/sticky.js') }}"></script>

    <!-- Chart-circle js -->
    <script src="{{ asset('backend/assets/plugins/circle-progress/circle-progress.min.js') }}"></script>

    <!-- RIGHT-SIDEBAR JS -->
    <script src="{{ asset('backend/assets/plugins/sidebar/sidebar.js') }}"></script>
    <script src="{{ asset('backend/assets/plugins/sidebar/sidebar-custom.js') }}"></script>


    <!-- Internal Chart.Bundle js-->
    <script src="{{ asset('backend/assets/plugins/chartjs/Chart.bundle.min.js') }}"></script>

    <!-- INTERNAL Apexchart js -->
    <script src="{{ asset('backend/assets/js/apexcharts.js') }}"></script>

    <!--Internal Sparkline js -->
    <script src="{{ asset('backend/assets/plugins/jquery-sparkline/jquery.sparkline.min.js') }}"></script>

    <!-- Moment js -->
    <script src="{{ asset('backend/assets/plugins/raphael/raphael.min.js') }}"></script>

    <!-- Internal Flot js -->
    <script src="{{ asset('backend/assets/plugins/jquery.flot/jquery.flot.js') }}"></script>
    <script src="{{ asset('backend/assets/plugins/jquery.flot/jquery.flot.pie.js') }}"></script>
    <script src="{{ asset('backend/assets/plugins/jquery.flot/jquery.flot.resize.js') }}"></script>

    <!-- Rating js-->
    <script src="{{ asset('backend/assets/plugins/rating/jquery.rating-stars.js') }}"></script>
    <script src="{{ asset('backend/assets/plugins/rating/jquery.barrating.js') }}"></script>

    <!--Internal  index js -->
    <script src="{{ asset('backend/assets/js/index.js') }}"></script>

    <!-- Internal Data tables -->
    <script src="{{ asset('backend/assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('backend/assets/plugins/datatable/js/dataTables.bootstrap5.js') }}"></script>
    <script src="{{ asset('backend/assets/plugins/datatable/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('backend/assets/plugins/datatable/responsive.bootstrap5.min.js') }}"></script>

    <!-- INTERNAL Select2 js -->
    <script src="{{ asset('backend/assets/plugins/select2/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/select2.js') }}"></script>


    <!-- EVA-ICONS JS -->
    <script src="{{ asset('backend/assets/plugins/eva-icons/eva-icons.min.js') }}"></script>

    <!-- THEME-COLOR JS -->
    <script src="{{ asset('backend/assets/js/themecolor.js') }}"></script>

    <!-- CUSTOM JS -->
    <script src="{{ asset('backend/assets/js/custom.js') }}"></script>

    <!-- exported JS -->
    <script src="{{ asset('backend/assets/js/exported.js') }}"></script>

    @yield('extra-js')

</body>

</html>
