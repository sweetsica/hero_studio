<!DOCTYPE html>
<html lang="en">

<head>
    @if(View::hasSection('content-css'))
        @yield('content-css')
    @else()
        <meta charset="utf-8"/>
        <title>Hero Studio | Dashboard</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description"/>
        <meta content="Coderthemes" name="author"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ asset('admin-asset/assets/images/favicon.ico') }}"/>

        <!-- plugins -->
        <link href="{{ asset('admin-asset/assets/libs/flatpickr/flatpickr.min.css') }}" rel="stylesheet" type="text/css"/>

        <!-- App css -->
        <link href="{{ asset('admin-asset/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css"
              id="bs-default-stylesheet"/>
        <link href="{{ asset('admin-asset/assets/css/app.min.css') }}" rel="stylesheet" type="text/css"
              id="app-default-stylesheet"/>

        <link href="{{ asset('admin-asset/assets/css/bootstrap-dark.min.css') }}" rel="stylesheet" type="text/css"
              id="bs-dark-stylesheet" disabled/>
        <link href="{{ asset('admin-asset/assets/css/app-dark.min.css') }}" rel="stylesheet" type="text/css"
              id="app-dark-stylesheet" disabled/>

        <!-- icons -->
        <link href="{{ asset('admin-asset/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css"/>
        <link href="{{ asset('custom/app.css') }}" rel="stylesheet" type="text/css"/>
    @endif
    @stack('custom-css')
</head>

<body class="loading"
      data-layout='{"mode": "light", "width": "fluid", "menuPosition": "fixed", "sidebar": { "color": "light", "size": "default", "showuser": false}, "topbar": {"color": "light"}, "showRightSidebarOnPageLoad": true}'>
<!-- Begin page -->
<div id="wrapper">
    <!-- Topbar Start -->
    <div class="navbar-custom">
        <div class="container-fluid">
            <ul class="list-unstyled topnav-menu float-end mb-0">



                <li class="dropdown notification-list topbar-dropdown">
                    <a class="nav-link dropdown-toggle nav-user me-0" data-bs-toggle="dropdown" href="#"
                       role="button" aria-haspopup="false" aria-expanded="false">
                        <img src="{{ asset('admin-asset/assets/images/users/avatar-1.jpg') }}" alt="user-image"
                             class="rounded-circle"/>
                        <span class="pro-user-name ms-1">
                            @if(Auth::user()->hasRole(\App\Models\Role::ROLE_EDITOR))
                                Editor Test
                            @elseif(Auth::user()->hasRole(\App\Models\Role::ROLE_KOLS))
                                KOLs Test
                            @else(Auth::user()->hasRole(\App\Models\Role::ROLE_COF))
                                Quản lý test
                            @endif
                                <i class="uil uil-angle-down"></i>
                        </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end profile-dropdown">
                        <!-- item-->
                        <div class="dropdown-header noti-title">
                            <h6 class="text-overflow m-0">Welcome !</h6>
                        </div>

                        <a href="pages-profile.html" class="dropdown-item notify-item">
                            <i data-feather="user" class="icon-dual icon-xs me-1"></i><span>My Account</span>
                        </a>

                        <a href="pages-lock-screen.html" class="dropdown-item notify-item">
                            <i data-feather="lock" class="icon-dual icon-xs me-1"></i><span>Lock Screen</span>
                        </a>

                        <div class="dropdown-divider"></div>

                        <a href="pages-logout.html" class="dropdown-item notify-item">
                            <i data-feather="log-out" class="icon-dual icon-xs me-1"></i><span>Logout</span>
                        </a>
                    </div>
                </li>

                <li class="dropdown notification-list">
                    <a href="javascript:void(0);" class="nav-link right-bar-toggle">
                        <i data-feather="settings"></i>
                    </a>
                </li>
            </ul>

            <!-- LOGO -->
            <div class="logo-box">
                <a href="index.html" class="logo logo-dark">
                        <span class="logo-sm">
                            <img src="{{ asset('admin-asset/assets/images/logo-sm.png') }}" alt=""
                                 height="24"/>
                            <!-- <span class="logo-lg-text-light">Shreyu</span> -->
                        </span>
                    <span class="logo-lg">
                            <img src="{{ asset('admin-asset/assets/images/logo-dark.png') }}" alt=""
                                 height="24"/>
                        <!-- <span class="logo-lg-text-light">S</span> -->
                        </span>
                </a>
                <a href="index.html" class="logo logo-light">
                        <span class="logo-sm">
                            <img src="{{ asset('admin-asset/assets/images/logo-sm.png') }}" alt=""
                                 height="24"/>
                        </span>
                    <span class="logo-lg">
                            <img src="{{ asset('admin-asset/assets/images/logo-light.png') }}" alt=""
                                 height="24"/>
                        </span>
                </a>
            </div>

            <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
                <li>
                    <button class="button-menu-mobile">
                        <i data-feather="menu"></i>
                    </button>
                </li>

                <li>
                    <!-- Mobile menu toggle (Horizontal Layout)-->
                    <a class="navbar-toggle nav-link" data-bs-toggle="collapse"
                       data-bs-target="#topnav-menu-content">
                        <div class="lines">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </a>
                    <!-- End mobile menu toggle-->
                </li>

{{--                <li class="dropdown d-none d-xl-block">--}}
{{--                    <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button"--}}
{{--                       aria-haspopup="false" aria-expanded="false">--}}
{{--                        Create New--}}
{{--                        <i class="uil uil-angle-down"></i>--}}
{{--                    </a>--}}
{{--                    <div class="dropdown-menu">--}}
{{--                        <!-- item-->--}}
{{--                        <a href="javascript:void(0);" class="dropdown-item">--}}
{{--                            <i class="uil uil-bag me-1"></i><span>New Projects</span>--}}
{{--                        </a>--}}

{{--                        <!-- item-->--}}
{{--                        <a href="javascript:void(0);" class="dropdown-item">--}}
{{--                            <i class="uil uil-user-plus me-1"></i><span>Create Users</span>--}}
{{--                        </a>--}}

{{--                        <!-- item-->--}}
{{--                        <a href="javascript:void(0);" class="dropdown-item">--}}
{{--                            <i class="uil uil-chart-pie me-1"></i><span>Revenue Report</span>--}}
{{--                        </a>--}}

{{--                        <!-- item-->--}}
{{--                        <a href="javascript:void(0);" class="dropdown-item">--}}
{{--                            <i class="uil uil-cog me-1"></i><span>Settings</span>--}}
{{--                        </a>--}}

{{--                        <div class="dropdown-divider"></div>--}}

{{--                        <!-- item-->--}}
{{--                        <a href="javascript:void(0);" class="dropdown-item">--}}
{{--                            <i class="uil uil-question-circle me-1"></i><span>Help & Support</span>--}}
{{--                        </a>--}}
{{--                    </div>--}}
{{--                </li>--}}
            </ul>
            <div class="clearfix"></div>
        </div>
    </div>
    <!-- end Topbar -->

    <!-- ========== Left Sidebar Start ========== -->

    <div class="left-side-menu">
        @if(View::hasSection('content-left-sidebar'))
            @yield('content-left-sidebar')
        @else
            @include('admin-template.main.side-menu')
        @endif
    </div>
    <!-- Left Sidebar End -->

    <!-- ============================================================== -->
    <!-- Start Page Content here -->
    <!-- ============================================================== -->

    <div class="content-page">
        @yield('content-page')
        <!-- Footer Start -->
        <footer class="footer">
            @if(View::hasSection('content-footer'))
                @yield('content-footer')
            @else
                @include('admin-template.main.footer')
            @endif

        </footer>
        <!-- end Footer -->
    </div>

    <!-- ============================================================== -->
    <!-- End Page content -->
    <!-- ============================================================== -->
</div>
<!-- END wrapper -->

@if(View::hasSection('content-js'))
    @yield('content-js')
@else()
    <!-- Vendor js -->
    <script src="{{ asset('admin-asset/assets/js/vendor.min.js') }}"></script>
    <!-- optional plugins -->
    <script src="{{ asset('admin-asset/assets/libs/moment/min/moment.min.js') }}"></script>
    <script src="{{ asset('admin-asset/assets/libs/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('admin-asset/assets/libs/flatpickr/flatpickr.min.js') }}"></script>

    <!-- page js -->
    <script src="{{ asset('admin-asset/assets/js/pages/dashboard.init.js') }}"></script>

    <!-- App js -->
    <script src="{{ asset('admin-asset/assets/js/app.min.js') }}"></script>
@endif
@stack('custom-js')

</body>

</html>
