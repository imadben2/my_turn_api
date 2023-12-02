<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Ta7ssil</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    @include('includes.style.css')
    <meta name="csrf-token" content="{{ csrf_token() }}" />
</head>

<body>
<!-- Begin page -->

<div id="preloader">
    <div id="status">
        <div class="bouncing-loader"><div ></div><div ></div><div ></div></div>
    </div>
</div>

<div class="wrapper">


    <!-- ========== header Start ========== -->
    @include('includes.header')
    <!-- ========== header End ========== -->

    <!-- ========== Sidebar Start ========== -->
    @include('includes.sidebar')
    <!-- ========== Sidebar End ========== -->

    <!-- ============================================================== -->
    <!-- Start Page Content here -->
    <!-- ============================================================== -->
    <div class="content-page">
        @yield('content')
        @include('includes.footer')
    </div>
    <!-- ============================================================== -->
    <!-- End Page content -->
    <!-- ============================================================== -->

</div>
<!-- END wrapper -->


@include('includes.style.js')


</body>
</html>
