<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8" />
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('/') }}backend/images/favicon.ico">

    <!-- Summernote css -->
    <link href="{{ asset('/') }}backend/libs/summernote/summernote-bs4.min.css" rel="stylesheet" type="text/css" />
    <!-- Bootstrap Css -->
    <link href="{{ asset('/') }}backend/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset('/') }}backend/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- DataTables -->
    <link href="{{ asset('/') }}backend/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('/') }}backend/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />

    <!-- Responsive datatable examples -->
    <link href="{{ asset('/') }}backend/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ asset('/') }}backend/css/app.min.css"  rel="stylesheet" type="text/css" />

</head>

<body data-sidebar="dark">

<!-- Begin page -->
<div id="layout-wrapper">

    <header id="page-topbar">

        @include('backend.includes.header')
    </header> <!-- ========== Left Sidebar Start ========== -->
    <div class="vertical-menu">

        <div data-simplebar class="h-100">

            <!--- Sidemenu -->
            @include('backend.includes.sidebar_menu')
            <!-- Sidebar -->
        </div>
    </div>
    <!-- Left Sidebar End -->

    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">

        <div class="page-content">
            @yield('content')
            <!-- container-fluid -->
        </div>
        <!-- End Page-content -->
        <!-- end modal -->

        @include('backend.includes.footer')
    </div>
    <!-- end main content-->

</div>
<!-- END layout-wrapper -->



<!-- Right bar overlay-->
<div class="rightbar-overlay"></div>

<!-- JAVASCRIPT -->

<script src="{{ asset('/') }}backend/libs/jquery/jquery.min.js"></script>

<script src="{{ asset('/') }}backend/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('/') }}backend/libs/metismenu/metisMenu.min.js"></script>
<script src="{{ asset('/') }}backend/libs/simplebar/simplebar.min.js"></script>
<script src="{{ asset('/') }}backend/libs/node-waves/waves.min.js"></script>

<!-- apexcharts -->
<script src="{{ asset('/') }}backend/libs/apexcharts/apexcharts.min.js"></script>

<!-- Buttons examples -->
<script src="{{ asset('/') }}backend/js/pages/dashboard.init.js"></script>
<!-- Required datatable js -->
<script src="{{ asset('/') }}backend/libs/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="{{ asset('/') }}backend/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
<!--data table buttons-->
<script src="{{ asset('/') }}backend/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="{{ asset('/') }}backend/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="{{ asset('/') }}backend/libs/datatables.net-buttons/js/buttons.colVis.min.js"></script>

<!-- Responsive examples -->
<script src="{{ asset('/') }}backend/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{ asset('/') }}backend/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>

<!-- Datatable init js -->
<script src="{{ asset('/') }}backend/js/pages/datatables.init.js"></script>
<!-- App js -->
<script src="{{ asset('/') }}backend/js/app.js"></script>
<script src="{{ asset('/') }}backend/js/notify.js"></script>
<!-- Summernote js -->
<script src="{{ asset('/') }}backend/libs/summernote/summernote-bs4.min.js"></script>
<!-- init js -->
<script src="{{ asset('/') }}backend/js/pages/form-editor.init.js"></script>
<!-- bs custom file input plugin -->
<script src="{{ asset('/') }}backend/libs/bs-custom-file-input/bs-custom-file-input.min.js"></script>

<script src="{{ asset('/') }}backend/js/pages/form-element.init.js"></script>
<script src="{{ asset('/') }}backend/js/validation.js"></script>
<script src="{{ asset('/') }}backend/js/script.js"></script>
</body>

</html>
