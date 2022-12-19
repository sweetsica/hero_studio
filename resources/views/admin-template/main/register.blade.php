<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>
        @yield('title-page')
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset('admin-asset/assets/images/favicon.ico')}}">

    <!-- App css -->
    <link href="{{asset('admin-asset/assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" id="bs-default-stylesheet" />
    <link href="{{asset('admin-asset/assets/css/app.min.css')}}" rel="stylesheet" type="text/css" id="app-default-stylesheet" />

    <link href="{{asset('admin-asset/assets/css/bootstrap-dark.min.css')}}" rel="stylesheet" type="text/css" id="bs-dark-stylesheet" disabled />
    <link href="{{asset('admin-asset/assets/css/app-dark.min.css')}}" rel="stylesheet" type="text/css" id="app-dark-stylesheet"  disabled />

    <!-- icons -->
    <link href="{{asset('admin-asset/assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('custom/app.css') }}" rel="stylesheet" type="text/css"/>

</head>

<body class="authentication-bg">

<div class="account-pages my-5">
    <div class="container">
        @yield('content-page')
        <!-- end row -->
    </div>
    <!-- end container -->
</div>
<!-- end page -->

<!-- Vendor js -->
<script src="{{asset('admin-asset/assets/js/vendor.min.js')}}"></script>

<!-- App js -->
<script src="{{asset('admin-asset/assets/js/app.min.js')}}"></script>

</body>
</html>
