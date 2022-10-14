<!DOCTYPE html>
<html lang="en">

<head>
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
</head>

<body class="loading"
      data-layout='{"mode": "light", "width": "fluid", "menuPosition": "fixed", "sidebar": { "color": "light", "size": "default", "showuser": false}, "topbar": {"color": "light"}, "showRightSidebarOnPageLoad": true}'>
<!-- Begin page -->
<div id="wrapper">
    <!-- Topbar Start -->
    <div class="navbar-custom">
        <div class="container-fluid">
            <ul class="list-unstyled topnav-menu float-end mb-0">
                <li class="d-none d-lg-block">
                    <form class="app-search">
                        <div class="app-search-box dropdown">
                            <div class="input-group">
                                <input type="search" class="form-control" placeholder="Search..."
                                       id="top-search"/>
                                <button class="btn input-group-text" type="submit">
                                    <i class="uil uil-search"></i>
                                </button>
                            </div>

                            <div class="dropdown-menu dropdown-lg" id="search-dropdown">
                                <!-- item-->
                                <div class="dropdown-header noti-title">
                                    <h5 class="text-overflow mb-2">Found 05 results</h5>
                                </div>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <i class="uil uil-sliders-v-alt me-1"></i>
                                    <span>User profile settings</span>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <i class="uil uil-home-alt me-1"></i>
                                    <span>Analytics Report</span>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <i class="uil uil-life-ring me-1"></i>
                                    <span>How can I help you?</span>
                                </a>

                                <!-- item-->
                                <div class="dropdown-header noti-title">
                                    <h6 class="text-overflow mb-2 text-uppercase">Users</h6>
                                </div>

                                <div class="notification-list">
                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <div class="d-flex text-align-start">
                                            <img class="me-2 rounded-circle"
                                                 src="{{ asset('admin-asset/assets/images/users/avatar-2.jpg') }}"
                                                 alt="Generic placeholder image" height="32"/>
                                            <div class="flex-grow-1">
                                                <h5 class="m-0 fs-14">Shirley Miller</h5>
                                                <span class="fs-12 mb-0">UI Designer</span>
                                            </div>
                                        </div>
                                    </a>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <div class="d-flex text-align-start">
                                            <img class="me-2 rounded-circle"
                                                 src="{{ asset('admin-asset/assets/images/users/avatar-5.jpg') }}"
                                                 alt="Generic placeholder image" height="32"/>
                                            <div class="flex-grow-1">
                                                <h5 class="m-0 fs-14">Timothy Moreno</h5>
                                                <span class="fs-12 mb-0">Frontend Developer</span>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </form>
                </li>

                <li class="dropdown d-inline-block d-lg-none">
                    <a class="nav-link dropdown-toggle arrow-none" data-bs-toggle="dropdown" href="#"
                       role="button" aria-haspopup="false" aria-expanded="false">
                        <i data-feather="search"></i>
                    </a>
                    <div class="dropdown-menu dropdown-lg dropdown-menu-end p-0">
                        <form class="p-3">
                            <input type="text" class="form-control" placeholder="Search ..."
                                   aria-label="search here"/>
                        </form>
                    </div>
                </li>

                <li class="dropdown d-none d-lg-inline-block">
                    <a class="nav-link dropdown-toggle arrow-none" data-toggle="fullscreen" href="#">
                        <i data-feather="maximize"></i>
                    </a>
                </li>

                <li class="dropdown d-none d-lg-inline-block topbar-dropdown">
                    <a class="nav-link dropdown-toggle arrow-none" data-bs-toggle="dropdown" href="#"
                       role="button" aria-haspopup="false" aria-expanded="false">
                        <i data-feather="grid"></i>
                    </a>
                    <div class="dropdown-menu dropdown-lg dropdown-menu-end p-0">
                        <div class="p-1">
                            <div class="row g-0">
                                <div class="col">
                                    <a class="dropdown-icon-item" href="#">
                                        <img src="{{ asset('admin-asset/assets/images/brands/slack.png') }}"
                                             alt="slack"/>
                                        <span>Slack</span>
                                    </a>
                                </div>
                                <div class="col">
                                    <a class="dropdown-icon-item" href="#">
                                        <img src="{{ asset('admin-asset/assets/images/brands/github.png') }}"
                                             alt="Github"/>
                                        <span>GitHub</span>
                                    </a>
                                </div>
                                <div class="col">
                                    <a class="dropdown-icon-item" href="#">
                                        <img src="{{ asset('admin-asset/assets/images/brands/dribbble.png') }}"
                                             alt="dribbble"/>
                                        <span>Dribbble</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>

                <li class="dropdown d-none d-lg-inline-block topbar-dropdown">
                    <a class="nav-link dropdown-toggle arrow-none" data-bs-toggle="dropdown" href="#"
                       role="button" aria-haspopup="false" aria-expanded="false">
                        <i data-feather="globe"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end">
                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item">
                            <img src="{{ asset('admin-asset/assets/images/flags/us.jpg') }}" alt="user-image"
                                 class="me-1" height="12"/>
                            <span class="align-middle">English</span>
                        </a>

                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item">
                            <img src="{{ asset('admin-asset/assets/images/flags/germany.jpg') }}"
                                 alt="user-image" class="me-1" height="12"/>
                            <span class="align-middle">German</span>
                        </a>

                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item">
                            <img src="{{ asset('admin-asset/assets/images/flags/italy.jpg') }}" alt="user-image"
                                 class="me-1" height="12"/>
                            <span class="align-middle">Italian</span>
                        </a>

                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item">
                            <img src="{{ asset('admin-asset/assets/images/flags/spain.jpg') }}" alt="user-image"
                                 class="me-1" height="12"/>
                            <span class="align-middle">Spanish</span>
                        </a>

                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item">
                            <img src="{{ asset('admin-asset/assets/images/flags/russia.jpg') }}" alt="user-image"
                                 class="me-1" height="12"/>
                            <span class="align-middle">Russian</span>
                        </a>
                    </div>
                </li>

                <li class="dropdown notification-list topbar-dropdown">
                    <a class="nav-link dropdown-toggle position-relative" data-bs-toggle="dropdown"
                       href="#" role="button" aria-haspopup="false" aria-expanded="false">
                        <i data-feather="bell"></i>
                        <span class="badge bg-danger rounded-circle noti-icon-badge">6</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end dropdown-lg">
                        <!-- item-->
                        <div class="dropdown-item noti-title">
                            <h5 class="m-0">
                                    <span class="float-end">
                                        <a href="" class="text-dark"><small>Clear All</small></a>
                                    </span>Notification
                            </h5>
                        </div>

                        <div class="noti-scroll" data-simplebar>
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item border-bottom">
                                <div class="notify-icon bg-primary">
                                    <i class="uil uil-user-plus"></i>
                                </div>
                                <p class="notify-details">
                                    New user registered.<small class="text-muted">5 hours ago</small>
                                </p>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item border-bottom">
                                <div class="notify-icon">
                                    <img src="{{ asset('admin-asset/assets/images/users/avatar-1.jpg') }}"
                                         class="img-fluid rounded-circle" alt=""/>
                                </div>
                                <p class="notify-details">Karen Robinson</p>
                                <p class="text-muted mb-0 user-msg">
                                    <small>Wow ! this admin looks good and awesome design</small>
                                </p>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item border-bottom">
                                <div class="notify-icon">
                                    <img src="{{ asset('admin-asset/assets/images/users/avatar-2.jpg') }}"
                                         class="img-fluid rounded-circle" alt=""/>
                                </div>
                                <p class="notify-details">Cristina Pride</p>
                                <p class="text-muted mb-0 user-msg">
                                    <small>Hi, How are you? What about our next meeting</small>
                                </p>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item border-bottom active">
                                <div class="notify-icon bg-success">
                                    <i class="uil uil-comment-message"></i>
                                </div>
                                <p class="notify-details">
                                    Jaclyn Brunswick commented on Dashboard<small class="text-muted">1 min
                                        ago</small>
                                </p>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item border-bottom">
                                <div class="notify-icon bg-danger">
                                    <i class="uil uil-comment-message"></i>
                                </div>
                                <p class="notify-details">
                                    Caleb Flakelar commented on Admin<small class="text-muted">4 days ago</small>
                                </p>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <div class="notify-icon bg-primary">
                                    <i class="uil uil-heart"></i>
                                </div>
                                <p class="notify-details">
                                    Carlos Crouch liked <b>Admin</b>
                                    <small class="text-muted">13 days ago</small>
                                </p>
                            </a>
                        </div>

                        <!-- All-->
                        <a href="javascript:void(0);"
                           class="dropdown-item text-center text-primary notify-item notify-all">
                            View all <i class="fe-arrow-right"></i>
                        </a>
                    </div>
                </li>

                <li class="dropdown notification-list topbar-dropdown">
                    <a class="nav-link dropdown-toggle nav-user me-0" data-bs-toggle="dropdown" href="#"
                       role="button" aria-haspopup="false" aria-expanded="false">
                        <img src="{{ asset('admin-asset/assets/images/users/avatar-1.jpg') }}" alt="user-image"
                             class="rounded-circle"/>
                        <span class="pro-user-name ms-1">
                                Nik Patel <i class="uil uil-angle-down"></i>
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

                <li class="dropdown d-none d-xl-block">
                    <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button"
                       aria-haspopup="false" aria-expanded="false">
                        Create New
                        <i class="uil uil-angle-down"></i>
                    </a>
                    <div class="dropdown-menu">
                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item">
                            <i class="uil uil-bag me-1"></i><span>New Projects</span>
                        </a>

                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item">
                            <i class="uil uil-user-plus me-1"></i><span>Create Users</span>
                        </a>

                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item">
                            <i class="uil uil-chart-pie me-1"></i><span>Revenue Report</span>
                        </a>

                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item">
                            <i class="uil uil-cog me-1"></i><span>Settings</span>
                        </a>

                        <div class="dropdown-divider"></div>

                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item">
                            <i class="uil uil-question-circle me-1"></i><span>Help & Support</span>
                        </a>
                    </div>
                </li>
            </ul>
            <div class="clearfix"></div>
        </div>
    </div>
    <!-- end Topbar -->

    <!-- ========== Left Sidebar Start ========== -->
    <div class="left-side-menu">
        @yield('content-left-sidebar')
    </div>
    <!-- Left Sidebar End -->

    <!-- ============================================================== -->
    <!-- Start Page Content here -->
    <!-- ============================================================== -->

    <div class="content-page">
        @yield('content-page')
        <!-- Footer Start -->
        <footer class="footer">
            @yield('content-footer')
        </footer>
        <!-- end Footer -->
    </div>

    <!-- ============================================================== -->
    <!-- End Page content -->
    <!-- ============================================================== -->
</div>
<!-- END wrapper -->

{{--<!-- Right Sidebar -->--}}
{{--<div class="right-bar">--}}
{{--    <div data-simplebar class="h-100">--}}
{{--        <h6 class="fw-medium px-3 m-0 py-2 text-uppercase bg-light">--}}
{{--            <span class="d-block py-1">Theme Settings</span>--}}
{{--        </h6>--}}

{{--        <div class="p-3">--}}
{{--            <div class="alert alert-warning" role="alert">--}}
{{--                <strong>Customize </strong> the overall color scheme, sidebar menu,--}}
{{--                etc.--}}
{{--            </div>--}}

{{--            <h6 class="fw-medium mt-4 mb-2 pb-1">Color Scheme</h6>--}}
{{--            <div class="form-switch mb-1">--}}
{{--                <input type="checkbox" class="form-check-input" name="color-scheme-mode" value="light"--}}
{{--                       id="light-mode-check" checked/>--}}
{{--                <label class="form-check-label" for="light-mode-check">Light Mode</label>--}}
{{--            </div>--}}

{{--            <div class="form-switch mb-1">--}}
{{--                <input type="checkbox" class="form-check-input" name="color-scheme-mode" value="dark"--}}
{{--                       id="dark-mode-check"/>--}}
{{--                <label class="form-check-label" for="dark-mode-check">Dark Mode</label>--}}
{{--            </div>--}}

{{--            <!-- Width -->--}}
{{--            <h6 class="fw-medium mt-4 mb-2 pb-1">Width</h6>--}}
{{--            <div class="form-switch mb-1">--}}
{{--                <input type="checkbox" class="form-check-input" name="width" value="fluid" id="fluid-check"--}}
{{--                       checked/>--}}
{{--                <label class="form-check-label" for="fluid-check">Fluid</label>--}}
{{--            </div>--}}
{{--            <div class="form-switch mb-1">--}}
{{--                <input type="checkbox" class="form-check-input" name="width" value="boxed"--}}
{{--                       id="boxed-check"/>--}}
{{--                <label class="form-check-label" for="boxed-check">Boxed</label>--}}
{{--            </div>--}}

{{--            <!-- Menu positions -->--}}
{{--            <h6 class="fw-medium mt-4 mb-2 pb-1">--}}
{{--                Menus (Leftsidebar and Topbar) Positon--}}
{{--            </h6>--}}

{{--            <div class="form-switch mb-1">--}}
{{--                <input type="checkbox" class="form-check-input" name="menus-position" value="fixed"--}}
{{--                       id="fixed-check" checked/>--}}
{{--                <label class="form-check-label" for="fixed-check">Fixed</label>--}}
{{--            </div>--}}

{{--            <div class="form-switch mb-1">--}}
{{--                <input type="checkbox" class="form-check-input" name="menus-position" value="scrollable"--}}
{{--                       id="scrollable-check"/>--}}
{{--                <label class="form-check-label" for="scrollable-check">Scrollable</label>--}}
{{--            </div>--}}

{{--            <!-- Left Sidebar-->--}}
{{--            <h6 class="fw-medium mt-4 mb-2 pb-1">Left Sidebar Color</h6>--}}

{{--            <div class="form-switch mb-1">--}}
{{--                <input type="checkbox" class="form-check-input" name="leftsidebar-color" value="light"--}}
{{--                       id="light-check" checked/>--}}
{{--                <label class="form-check-label" for="light-check">Light</label>--}}
{{--            </div>--}}

{{--            <div class="form-switch mb-1">--}}
{{--                <input type="checkbox" class="form-check-input" name="leftsidebar-color" value="dark"--}}
{{--                       id="dark-check"/>--}}
{{--                <label class="form-check-label" for="dark-check">Dark</label>--}}
{{--            </div>--}}

{{--            <!-- size -->--}}
{{--            <h6 class="fw-medium mt-4 mb-2 pb-1">Left Sidebar Size</h6>--}}

{{--            <div class="form-switch mb-1">--}}
{{--                <input type="checkbox" class="form-check-input" name="leftsidebar-size" value="default"--}}
{{--                       id="default-size-check" checked/>--}}
{{--                <label class="form-check-label" for="default-size-check">Default</label>--}}
{{--            </div>--}}

{{--            <div class="form-switch mb-1">--}}
{{--                <input type="checkbox" class="form-check-input" name="leftsidebar-size" value="condensed"--}}
{{--                       id="condensed-check"/>--}}
{{--                <label class="form-check-label" for="condensed-check">Condensed <small>(Extra Small--}}
{{--                        size)</small></label>--}}
{{--            </div>--}}

{{--            <div class="form-switch mb-1">--}}
{{--                <input type="checkbox" class="form-check-input" name="leftsidebar-size" value="compact"--}}
{{--                       id="compact-check"/>--}}
{{--                <label class="form-check-label" for="compact-check">Compact <small>(Small size)</small></label>--}}
{{--            </div>--}}

{{--            <!-- User info -->--}}
{{--            <h6 class="fw-medium mt-4 mb-2 pb-1">Sidebar User Info</h6>--}}

{{--            <div class="form-switch mb-1">--}}
{{--                <input type="checkbox" class="form-check-input" name="leftsidebar-user" value="fixed"--}}
{{--                       id="sidebaruser-check"/>--}}
{{--                <label class="form-check-label" for="sidebaruser-check">Enable</label>--}}
{{--            </div>--}}

{{--            <!-- Topbar -->--}}
{{--            <h6 class="fw-medium mt-4 mb-2 pb-1">Topbar</h6>--}}

{{--            <div class="form-switch mb-1">--}}
{{--                <input type="checkbox" class="form-check-input" name="topbar-color" value="dark"--}}
{{--                       id="darktopbar-check" checked/>--}}
{{--                <label class="form-check-label" for="darktopbar-check">Dark</label>--}}
{{--            </div>--}}

{{--            <div class="form-switch mb-1">--}}
{{--                <input type="checkbox" class="form-check-input" name="topbar-color" value="light"--}}
{{--                       id="lighttopbar-check"/>--}}
{{--                <label class="form-check-label" for="lighttopbar-check">Light</label>--}}
{{--            </div>--}}

{{--            <button class="btn btn-primary w-100 mt-4" id="resetBtn">--}}
{{--                Reset to Default--}}
{{--            </button>--}}

{{--            <a href="https://1.envato.market/shreyu_admin" class="btn btn-danger d-block mt-3" target="_blank">--}}
{{--                <i class="mdi mdi-basket me-1"></i> Purchase Now--}}
{{--            </a>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <!-- end slimscroll-menu-->--}}
{{--</div>--}}
{{--<!-- /Right-bar -->--}}

<!-- Right bar overlay-->
<div class="rightbar-overlay"></div>

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
</body>

</html>
