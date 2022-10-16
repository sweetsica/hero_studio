@extends('admin-template.main.master')

@section('content-left-sidebar')
    <div class="h-100" data-simplebar>
        <!-- User box -->
        <div class="user-box text-center">
            <img src="{{ asset('admin-asset/assets/images/users/avatar-1.jpg') }}" alt="user-img"
                 title="Mat Helme" class="rounded-circle avatar-md"/>
            <div class="dropdown">
                <a href="javascript: void(0);" class="text-dark dropdown-toggle h5 mt-2 mb-1 d-block"
                   data-bs-toggle="dropdown">Nik Patel</a>
                <div class="dropdown-menu user-pro-dropdown">
                    <a href="pages-profile.html" class="dropdown-item notify-item">
                        <i data-feather="user" class="icon-dual icon-xs me-1"></i><span>My Account</span>
                    </a>
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i data-feather="settings" class="icon-dual icon-xs me-1"></i><span>Settings</span>
                    </a>
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i data-feather="help-circle" class="icon-dual icon-xs me-1"></i><span>Support</span>
                    </a>
                    <a href="pages-lock-screen.html" class="dropdown-item notify-item">
                        <i data-feather="lock" class="icon-dual icon-xs me-1"></i><span>Lock Screen</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i data-feather="log-out" class="icon-dual icon-xs me-1"></i><span>Logout</span>
                    </a>
                </div>
            </div>
            <p class="text-muted">Admin Header</p>
        </div>
        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <ul id="side-menu">
                <!-- <li class="menu-title">Navigation</li> -->
                <li>
                    <a href="#sidebarDashboard" data-bs-toggle="collapse">
                        <span class="badge bg-success float-end">03</span>
                        <i data-feather="home"></i>
                        <span> Trang chủ </span>
                        <!-- <span class="menu-arrow"></span> -->
                    </a>
                    <div class="collapse" id="sidebarDashboard">
                        <ul class="nav-second-level">
                            <li><a href="#">KOL</a></li>
                            <li><a href="#">Quản lý</a></li>
                            <li><a href="#">Nhân viên</a></li>
                        </ul>
                    </div>
                </li>

                {{--Menu quản lý--}}
                <li class="menu-title mt-2">Menu cấp quản lý</li>
                <li>
                    <a href="#sidebarTaskManage" data-bs-toggle="collapse">
                        <i class="uil uil-suitcase" data-feather="uil uil-suitcase"></i>
                        <span>Danh sách công việc</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarTaskManage">
                        <ul class="nav-second-level">
                            <li><a href="{{route('get.task')}}">Danh sách nhiệm vụ</a></li>
                            <li><a href="{{route('get.task.department','1')}}">Nhiệm vụ theo id phòng</a></li>
                            <li><a href="{{route('edit.taskOrder','1')}}">Phân công nhiệm vụ</a></li>

                            <li><a href="{{route('get.taskOrder.list')}}">Danh sách yêu cầu</a></li>
                            <li><a href="{{route('get.taskOrder.byDepartmentId','1')}}">Yêu cầu theo id phòng</a></li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a href="#sidebarDepartmentManager" data-bs-toggle="collapse">
                        <i class="uil uil-sitemap" data-feather="uil uil-sitemap"></i>
                        <span>Danh sách phòng ban</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarDepartmentManager">
                        <ul class="nav-second-level">
                            <li><a href="{{route('get.department')}}">List phòng ban</a></li>
                            <li><a href="{{route('create.department')}}">Tạo phòng ban</a></li>
                            <li><a href="{{route('edit.department','1')}}">Phân bổ nhân sự</a></li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a href="#sidebarStaffManager" data-bs-toggle="collapse">
                        <i class="uil uil-users-alt" data-feather="uil uil-users-alt"></i>
                        <span>Danh sách nhân sự</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarStaffManager">
                        <ul class="nav-second-level">
                            <li><a href="{{route('get.member')}}">List nhân sự</a></li>
                            <li><a href="#">Thêm mới nhân sự</a></li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a href="#sidebarMediaManager" data-bs-toggle="collapse">
                        <i class="uil uil-film" data-feather="uil uil-film"></i>
                        <span>Kho media</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarMediaManager">
                        <ul class="nav-second-level">
                            <li><a href="{{route('get.media')}}">Danh mục media</a></li>
                        </ul>
                    </div>
                </li>
                {{--Hết menu quản lý--}
                {{--Menu KOL--}}
                <li class="menu-title mt-2">Menu cấp KOL</li>
                <li>
                    <a href="#sidebarTaskKOL" data-bs-toggle="collapse">
                        <i class="uil uil-suitcase" data-feather="uil uil-suitcase"></i>
                        <span>Danh sách yêu cầu</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarTaskKOL">
                        <ul class="nav-second-level">
                            <li><a href="#">Tạo yêu cầu</a></li>
                            <li><a href="#">Danh sách yêu cầu</a></li>
                            <li><a href="#">Phân công nhiệm vụ</a></li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a href="#sidebarDepartmentKOL" data-bs-toggle="collapse">
                        <i class="uil uil-sitemap" data-feather="uil uil-sitemap"></i>
                        <span>Danh sách phòng ban</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarDepartmentKOL">
                        <ul class="nav-second-level">
                            <li><a href="{{route('get.department')}}">List nhân sự</a></li>
                            <li><a href="#">Thêm mới nhân sự</a></li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a href="#sidebarMediaKOL" data-bs-toggle="collapse">
                        <i class="uil uil-film" data-feather="uil uil-film"></i>
                        <span>Kho media</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarMediaKOL">
                        <ul class="nav-second-level">
                            <li><a href="{{route('get.media')}}">Danh mục media</a></li>
                        </ul>
                    </div>
                </li>
                {{--Hết menu KOL--}}
                {{--Menu nhân viên--}}
                <li class="menu-title mt-2">Menu cấp nhân viên</li>
                <li>
                    <a href="#sidebarTaskStaff" data-bs-toggle="collapse">
                        <i class="uil uil-suitcase" data-feather="uil uil-suitcase"></i>
                        <span>Danh sách công việc</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarTaskStaff">
                        <ul class="nav-second-level">
                            <li><a href="{{route('get.task')}}">Công việc phòng tôi</a></li>
                            <li><a href="#">Công việc được giao</a></li>
                            <li><a href="#">Công việc cần kiểm tra</a></li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a href="#sidebarDepartmentStaff" data-bs-toggle="collapse">
                        <i class="uil uil-film" data-feather="uil uil-film"></i>
                        <span>Kho media</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarDepartmentStaff">
                        <ul class="nav-second-level">
                            <li><a href="{{route('get.media')}}">Danh mục media</a></li>
                        </ul>
                    </div>
                </li>
                {{--Hết menu nhân viên--}}

            </ul>
        </div>
        <!-- End Sidebar -->

        <div class="clearfix"></div>
    </div>
    <!-- Sidebar -left -->
@endsection

@section('content-page')
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <h4 class="page-title">File Manager</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript:void(0);">Shreyu</a></li>
                                <li class="breadcrumb-item active">File Manager</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col">
                    <div class="email-container bg-transparent">
                        <!-- left side bar -->
                        <div class="inbox-leftbar card border-0 pb-1 pb-lg-4 h-100">

                            <div class="card-body d-flex align-items-start p-0">
                                <img src="assets/images/users/avatar-5.jpg" class="me-2 rounded-circle" height="48" alt="Shreyu N" />
                                <div class="flex-grow-1">
                                    <h5 class="mt-2 mb-0 fs-15 fw-bold">Shreyu N</h5>
                                    <span class="text-muted fs-12">Logout <i class="bi bi-arrow-right ms-1"></i></span>
                                </div>
                            </div>

                            <hr>

                            <div class="mail-list mb-0 mb-lg-4 fs-15">
                                <a href="javascript:void(0);" class="list-group-item border-0" id="headingOne">
                                    <i class="bi bi-house me-2"></i>Home
                                </a>
                                <a href="javascript:void(0);" class="list-group-item border-0 my-1 text-muted" id="headingOne">
                                    <i class="bi bi-card-text me-2"></i>Documents
                                </a>
                                <a href="javascript:void(0);" class="list-group-item border-0 my-1 text-muted" id="headingOne">
                                    <i class="bi bi-download me-2"></i>Downloads
                                </a>
                                <a href="javascript:void(0);" class="list-group-item border-0 my-1 text-muted" id="headingOne">
                                    <i class="bi bi-music-note-beamed me-2"></i>Music
                                </a>
                                <a href="javascript:void(0);" class="list-group-item border-0 my-1 text-muted" id="headingOne">
                                    <i class="bi bi-image me-2"></i>Pictures
                                </a>
                                <a href="javascript:void(0);" class="list-group-item border-0 my-1 text-muted" id="headingOne">
                                    <i class="bi bi-youtube me-2"></i>Vedio
                                </a>
                                <a href="javascript:void(0);" class="list-group-item border-0 my-1 text-muted" id="headingOne">
                                    <i class="bi bi-clock me-2"></i>Recent
                                </a>
                                <a href="javascript:void(0);" class="list-group-item border-0 my-1 text-muted" id="headingOne">
                                    <i class="bi bi-trash me-2"></i>Bin
                                </a>
                            </div>

                            <div class="card mt-4 mb-0 border-0">
                                <div class="p-2 text-center">
                                    <strong class="me-2">Your Storage</strong>
                                </div>
                                <div class="card-body">
                                    <div id="storage" class="apex-charts" dir="ltr" data-colors="#43d39e"></div>
                                </div>
                                <div class="fs-13 text-center">
                                    <strong class="me-2">File Manager</strong>
                                    <p class="text-muted mb-0">107.52 GB of 256 GB</p>
                                </div>
                            </div>

                        </div>

                        <!-- right side bar -->
                        <div class="inbox-rightbar h-100 pb-0">
                            <div class="row">
                                <div class="col-12">
                                    <div class="d-block">
                                        <div class="float-lg-end">
                                            <div class="d-lg-flex align-items-center mb-2 mt-0">
                                                <div class="file-search d-inline-block me-1">
                                                    <form>
                                                        <div class="input-group align-items-center">
                                                            <i class="bi bi-search icon-search bg-light ms-2"></i>
                                                            <input type="text" class="form-control search-input bg-light border-0 mt-0" placeholder="Search Files..." />
                                                        </div>
                                                    </form>
                                                </div>
                                                <div class="btn-group dropdown">
                                                    <button type="button" class="btn btn-light" data-bs-toggle="tooltip" data-bs-placement="top" title="Toggle View">
                                                        <i class="bi bi-list-ul"></i>
                                                    </button>
                                                    <button type="button" class="btn btn-light dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" >
                                                                    <span class="text-dark" data-bs-toggle="tooltip" data-bs-placement="top" title="View Options">
                                                                        <i class="bi bi-caret-down"></i>
                                                                    </span>
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-end">
                                                        <a class="dropdown-item" href="javascript:void(0);">A - Z</a>
                                                        <a class="dropdown-item" href="javascript:void(0);">Z - A</a>
                                                        <a class="dropdown-item" href="javascript:void(0);">Last Modified</a>
                                                        <a class="dropdown-item" href="javascript:void(0);">First Modified</a>
                                                        <a class="dropdown-item" href="javascript:void(0);">Size</a>
                                                        <a class="dropdown-item" href="javascript:void(0);">Type</a>
                                                    </div>
                                                    <button type="button" class="btn btn-light  dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                                                    <span class="text-dark" data-bs-toggle="tooltip" data-bs-placement="top" title="View Options">
                                                                        <i class="bi bi-list"></i>
                                                                    </span>
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-end">
                                                        <a class="dropdown-item text-center border-bottom" href="javascript:void(0);">
                                                            <i class="bi bi-window me-2 fs-15" data-bs-toggle="tooltip" data-bs-placement="top" title="New Window"></i>
                                                            <i class="bi bi-folder-plus fs-15" data-bs-toggle="tooltip" data-bs-placement="top" title="New Folder"></i>
                                                        </a>
                                                        <a class="dropdown-item" href="javascript:void(0);">Edit
                                                            <i class="bi bi-scissors mx-2 fs-15" data-bs-toggle="tooltip" data-bs-placement="top" title="Cut"></i>
                                                            <i class="bi bi-clipboard-check me-2 fs-15" data-bs-toggle="tooltip" data-bs-placement="top" title="Copy"></i>
                                                            <i class="bi bi-clipboard-data fs-15" data-bs-toggle="tooltip" data-bs-placement="top" title="Paste"></i>
                                                        </a>
                                                        <a class="dropdown-item" href="javascript:void(0);">Select All</a>
                                                        <a class="dropdown-item d-flex" href="javascript:void(0);">
                                                            <div class="form-check">
                                                                <input class="form-check-input me-2" type="checkbox" value="" id="hiddenFiles">
                                                            </div>
                                                            Show Hidden Files
                                                        </a>
                                                        <a class="dropdown-item d-flex" href="javascript:void(0);">
                                                            <div class="form-check">
                                                                <input class="form-check-input me-2" type="checkbox" value="" id="fsidebar">
                                                            </div>
                                                            Show Sidebar
                                                        </a>
                                                        <a class="dropdown-item" href="javascript:void(0);">Help</a>
                                                        <a class="dropdown-item" href="javascript:void(0);">About Files</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="btn-group mb-2">
                                            <button type="button" class="btn btn-light"><i class="bi bi-arrow-left"></i></button>
                                            <button type="button" class="btn btn-light"><i class="bi bi-arrow-right"></i></button>
                                        </div>
                                        <div class="btn-group mb-2">
                                            <button type="button" class="btn btn-light"><i class="bi bi-house me-2"></i>Home</button>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-12">
                                    <h6 class="fs-18">Folders</h6>
                                    <div class="row">
                                        <div class="col-xxl-3 col-lg-6">
                                            <div class="card shadow-none border">
                                                <div class="p-2">
                                                    <div class="row align-items-center">
                                                        <div class="col-auto">
                                                            <div class="avatar-sm">
                                                                            <span class="avatar-title bg-soft-warning text-warning rounded fs-24">
                                                                                <i class="bi bi-file-earmark-zip"></i>
                                                                            </span>
                                                            </div>
                                                        </div>
                                                        <div class="col ps-1">
                                                            <a href="javascript:void(0);" class="text-muted fw-bold fs-15">Shreyu-admin.zip</a>
                                                            <p class="mb-0 fs-13">2.3 MB</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xxl-3 col-lg-6">
                                            <div class="card shadow-none border">
                                                <div class="p-2">
                                                    <div class="row align-items-center">
                                                        <div class="col-auto">
                                                            <div class="avatar-sm">
                                                                            <span class="avatar-title bg-soft-info text-info rounded fs-24">
                                                                                <i class="bi bi-grid"></i>
                                                                            </span>
                                                            </div>
                                                        </div>
                                                        <div class="col ps-1">
                                                            <a href="javascript:void(0);" class="text-muted fw-bold fs-15">Apps</a>
                                                            <p class="mb-0 fs-13">3.9 GB</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xxl-3 col-lg-6">
                                            <div class="card shadow-none border">
                                                <div class="p-2">
                                                    <div class="row align-items-center">
                                                        <div class="col-auto">
                                                            <div class="avatar-sm">
                                                                            <span class="avatar-title bg-soft-secondary text-secondary rounded fs-24">
                                                                                <i class="bi bi-file-earmark"></i>
                                                                            </span>
                                                            </div>
                                                        </div>
                                                        <div class="col ps-1">
                                                            <a href="javascript:void(0);" class="text-muted fw-bold fs-15">Compile Version</a>
                                                            <p class="mb-0 fs-13">21.6 GB</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xxl-3 col-lg-6">
                                            <div class="card shadow-none border">
                                                <div class="p-2">
                                                    <div class="row align-items-center">
                                                        <div class="col-auto">
                                                            <div class="avatar-sm">
                                                                            <span class="avatar-title bg-soft-danger text-danger rounded fs-24">
                                                                                <i class="bi bi-images"></i>
                                                                            </span>
                                                            </div>
                                                        </div>
                                                        <div class="col ps-1">
                                                            <a href="javascript:void(0);" class="text-muted fw-bold fs-15">Pictures</a>
                                                            <p class="mb-0 fs-13">17.3 GB</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xxl-3 col-lg-6">
                                            <div class="card shadow-none border">
                                                <div class="p-2">
                                                    <div class="row align-items-center">
                                                        <div class="col-auto">
                                                            <div class="avatar-sm">
                                                                            <span class="avatar-title bg-soft-danger text-danger rounded fs-24">
                                                                                <i class="bi bi-file-earmark-pdf"></i>
                                                                            </span>
                                                            </div>
                                                        </div>
                                                        <div class="col ps-1">
                                                            <a href="javascript:void(0);" class="text-muted fw-bold fs-15">Licence.pdf</a>
                                                            <p class="mb-0 fs-13">3.9 MB</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xxl-3 col-lg-6">
                                            <div class="card shadow-none border">
                                                <div class="p-2">
                                                    <div class="row align-items-center">
                                                        <div class="col-auto">
                                                            <div class="avatar-sm">
                                                                            <span class="avatar-title bg-soft-primary text-primary rounded fs-24">
                                                                                <i class="bi bi-file-earmark-ppt"></i>
                                                                            </span>
                                                            </div>
                                                        </div>
                                                        <div class="col ps-1">
                                                            <a href="javascript:void(0);" class="text-muted fw-bold fs-15">Wedding-project.ppt</a>
                                                            <p class="mb-0 fs-13">350 MB</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xxl-3 col-lg-6">
                                            <div class="card shadow-none border">
                                                <div class="p-2">
                                                    <div class="row align-items-center">
                                                        <div class="col-auto">
                                                            <div class="avatar-sm">
                                                                            <span class="avatar-title bg-soft-success text-success rounded fs-24">
                                                                                <i class="bi bi-file-earmark-excel"></i>
                                                                            </span>
                                                            </div>
                                                        </div>
                                                        <div class="col ps-1">
                                                            <a href="javascript:void(0);" class="text-muted fw-bold fs-15">Database.xlsx</a>
                                                            <p class="mb-0 fs-13">17 MB</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xxl-3 col-lg-6">
                                            <div class="card shadow-none border">
                                                <div class="p-2">
                                                    <div class="row align-items-center">
                                                        <div class="col-auto">
                                                            <div class="avatar-sm">
                                                                            <span class="avatar-title bg-soft-info text-info rounded fs-24">
                                                                                <i class="bi bi-folder"></i>
                                                                            </span>
                                                            </div>
                                                        </div>
                                                        <div class="col ps-1">
                                                            <a href="javascript:void(0);" class="text-muted fw-bold fs-15">Songs</a>
                                                            <p class="mb-0 fs-13">79.4 GB</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="inbox-rightbar recent-data">
                            <div class="row">
                                <div class="col-12">
                                    <h6 class="fs-18">Recent</h6>
                                    <div class="card border-0">
                                        <div class="card-body">
                                            <ul class="nav nav-tabs">
                                                <li class="nav-item">
                                                    <a href="#all" data-bs-toggle="tab" aria-expanded="false" class="nav-link active">
                                                        <span class="d-block d-sm-none"><i class="uil-home-alt"></i></span>
                                                        <span class="d-none d-sm-block">All</span>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="javascript:void(0);" data-bs-toggle="tab" aria-expanded="true" class="nav-link">
                                                        <span class="d-block d-sm-none"><i class="bi bi-file-earmark"></i></span>
                                                        <span class="d-none d-sm-block">Document</span>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="javascript:void(0);" data-bs-toggle="tab" aria-expanded="false" class="nav-link">
                                                        <span class="d-block d-sm-none"><i class="bi bi-file-earmark-music"></i></span>
                                                        <span class="d-none d-sm-block">Music</span>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="javascript:void(0);" data-bs-toggle="tab" aria-expanded="false" class="nav-link">
                                                        <span class="d-block d-sm-none"><i class="bi bi-card-image"></i></span>
                                                        <span class="d-none d-sm-block">Picture</span>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="javascript:void(0);" data-bs-toggle="tab" aria-expanded="false" class="nav-link">
                                                        <span class="d-block d-sm-none"><i class="bi bi-card-list"></i></span>
                                                        <span class="d-none d-sm-block">Other</span>
                                                    </a>
                                                </li>
                                            </ul>
                                            <div class="tab-content text-muted pt-2">
                                                <div class="tab-pane fade show active" id="all">
                                                    <div class="table-responsive table-nowrap">
                                                        <table class="table table-centered mb-0">
                                                            <thead>
                                                            <tr>
                                                                <th class="border-0">File Name</th>
                                                                <th class="border-0">Folder Name</th>
                                                                <th class="border-0">File Size</th>
                                                                <th class="border-0">Last viewed</th>
                                                                <th class="border-0">Action</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <tr>
                                                                <td>App Design & Devlopment</td>
                                                                <td>Work</td>
                                                                <td>5.6 GB</td>
                                                                <td>03 Dec</td>
                                                                <td>
                                                                    <div class="dropdown">
                                                                        <a href="javascript:void(0);" class="table-action-btn dropdown-toggle arrow-none btn btn-light btn-xs" data-bs-toggle="dropdown" aria-expanded="false"><i class="uil uil-ellipsis-h"></i></a>
                                                                        <div class="dropdown-menu dropdown-menu-end">
                                                                            <a class="dropdown-item" href="javascript:void(0);"><i class="uil uil-share-alt me-2 text-muted vertical-middle"></i>Share</a>
                                                                            <a class="dropdown-item" href="javascript:void(0);"><i class="uil uil-link-h me-2 text-muted vertical-middle"></i>Get Sharable Link</a>
                                                                            <a class="dropdown-item" href="javascript:void(0);"><i class="uil uil-pen me-2 text-muted vertical-middle"></i>Rename</a>
                                                                            <a class="dropdown-item" href="javascript:void(0);"><i class="uil uil-arrow-to-bottom me-2 text-muted vertical-middle"></i>Download</a>
                                                                            <a class="dropdown-item" href="javascript:void(0);"><i class="uil uil-trash-alt me-2 text-muted vertical-middle"></i>Remove</a>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Shreyu-admin.zip</td>
                                                                <td>Shreyu</td>
                                                                <td>1.3 GB</td>
                                                                <td>05 Oct</td>
                                                                <td>
                                                                    <div class="dropdown">
                                                                        <a href="javascript:void(0);" class="table-action-btn dropdown-toggle arrow-none btn btn-light btn-xs" data-bs-toggle="dropdown" aria-expanded="false"><i class="uil uil-ellipsis-h"></i></a>
                                                                        <div class="dropdown-menu dropdown-menu-end">
                                                                            <a class="dropdown-item" href="javascript:void(0);"><i class="uil uil-share-alt me-2 text-muted vertical-middle"></i>Share</a>
                                                                            <a class="dropdown-item" href="javascript:void(0);"><i class="uil uil-link-h me-2 text-muted vertical-middle"></i>Get Sharable Link</a>
                                                                            <a class="dropdown-item" href="javascript:void(0);"><i class="uil uil-pen me-2 text-muted vertical-middle"></i>Rename</a>
                                                                            <a class="dropdown-item" href="javascript:void(0);"><i class="uil uil-arrow-to-bottom me-2 text-muted vertical-middle"></i>Download</a>
                                                                            <a class="dropdown-item" href="javascript:void(0);"><i class="uil uil-trash-alt me-2 text-muted vertical-middle"></i>Remove</a>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Profile.jpg</td>
                                                                <td>Photo</td>
                                                                <td>2.6 MB</td>
                                                                <td>11 Nov</td>
                                                                <td>
                                                                    <div class="dropdown">
                                                                        <a href="javascript:void(0);" class="table-action-btn dropdown-toggle arrow-none btn btn-light btn-xs" data-bs-toggle="dropdown" aria-expanded="false"><i class="uil uil-ellipsis-h"></i></a>
                                                                        <div class="dropdown-menu dropdown-menu-end">
                                                                            <a class="dropdown-item" href="javascript:void(0);"><i class="uil uil-share-alt me-2 text-muted vertical-middle"></i>Share</a>
                                                                            <a class="dropdown-item" href="javascript:void(0);"><i class="uil uil-link-h me-2 text-muted vertical-middle"></i>Get Sharable Link</a>
                                                                            <a class="dropdown-item" href="javascript:void(0);"><i class="uil uil-pen me-2 text-muted vertical-middle"></i>Rename</a>
                                                                            <a class="dropdown-item" href="javascript:void(0);"><i class="uil uil-arrow-to-bottom me-2 text-muted vertical-middle"></i>Download</a>
                                                                            <a class="dropdown-item" href="javascript:void(0);"><i class="uil uil-trash-alt me-2 text-muted vertical-middle"></i>Remove</a>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Sign.jpeg</td>
                                                                <td>Photo</td>
                                                                <td>1.3 MB</td>
                                                                <td>11 Nov</td>
                                                                <td>
                                                                    <div class="dropdown">
                                                                        <a href="javascript:void(0);" class="table-action-btn dropdown-toggle arrow-none btn btn-light btn-xs" data-bs-toggle="dropdown" aria-expanded="false"><i class="uil uil-ellipsis-h"></i></a>
                                                                        <div class="dropdown-menu dropdown-menu-end">
                                                                            <a class="dropdown-item" href="javascript:void(0);"><i class="uil uil-share-alt me-2 text-muted vertical-middle"></i>Share</a>
                                                                            <a class="dropdown-item" href="javascript:void(0);"><i class="uil uil-link-h me-2 text-muted vertical-middle"></i>Get Sharable Link</a>
                                                                            <a class="dropdown-item" href="javascript:void(0);"><i class="uil uil-pen me-2 text-muted vertical-middle"></i>Rename</a>
                                                                            <a class="dropdown-item" href="javascript:void(0);"><i class="uil uil-arrow-to-bottom me-2 text-muted vertical-middle"></i>Download</a>
                                                                            <a class="dropdown-item" href="javascript:void(0);"><i class="uil uil-trash-alt me-2 text-muted vertical-middle"></i>Remove</a>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Licence.pdf</td>
                                                                <td>Personal</td>
                                                                <td>7.8 MB</td>
                                                                <td>15 Mar</td>
                                                                <td>
                                                                    <div class="dropdown">
                                                                        <a href="javascript:void(0);" class="table-action-btn dropdown-toggle arrow-none btn btn-light btn-xs" data-bs-toggle="dropdown" aria-expanded="false"><i class="uil uil-ellipsis-h"></i></a>
                                                                        <div class="dropdown-menu dropdown-menu-end">
                                                                            <a class="dropdown-item" href="javascript:void(0);"><i class="uil uil-share-alt me-2 text-muted vertical-middle"></i>Share</a>
                                                                            <a class="dropdown-item" href="javascript:void(0);"><i class="uil uil-link-h me-2 text-muted vertical-middle"></i>Get Sharable Link</a>
                                                                            <a class="dropdown-item" href="javascript:void(0);"><i class="uil uil-pen me-2 text-muted vertical-middle"></i>Rename</a>
                                                                            <a class="dropdown-item" href="javascript:void(0);"><i class="uil uil-arrow-to-bottom me-2 text-muted vertical-middle"></i>Download</a>
                                                                            <a class="dropdown-item" href="javascript:void(0);"><i class="uil uil-trash-alt me-2 text-muted vertical-middle"></i>Remove</a>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Photo</td>
                                                                <td>Personal</td>
                                                                <td>17.3 GB</td>
                                                                <td>15 Mar</td>
                                                                <td>
                                                                    <div class="dropdown">
                                                                        <a href="javascript:void(0);" class="table-action-btn dropdown-toggle arrow-none btn btn-light btn-xs" data-bs-toggle="dropdown" aria-expanded="false"><i class="uil uil-ellipsis-h"></i></a>
                                                                        <div class="dropdown-menu dropdown-menu-end">
                                                                            <a class="dropdown-item" href="javascript:void(0);"><i class="uil uil-share-alt me-2 text-muted vertical-middle"></i>Share</a>
                                                                            <a class="dropdown-item" href="javascript:void(0);"><i class="uil uil-link-h me-2 text-muted vertical-middle"></i>Get Sharable Link</a>
                                                                            <a class="dropdown-item" href="javascript:void(0);"><i class="uil uil-pen me-2 text-muted vertical-middle"></i>Rename</a>
                                                                            <a class="dropdown-item" href="javascript:void(0);"><i class="uil uil-arrow-to-bottom me-2 text-muted vertical-middle"></i>Download</a>
                                                                            <a class="dropdown-item" href="javascript:void(0);"><i class="uil uil-trash-alt me-2 text-muted vertical-middle"></i>Remove</a>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Teri Ladki.mp3</td>
                                                                <td>Song</td>
                                                                <td>8.9 MB</td>
                                                                <td>14 Mar</td>
                                                                <td>
                                                                    <div class="dropdown">
                                                                        <a href="javascript:void(0);" class="table-action-btn dropdown-toggle arrow-none btn btn-light btn-xs" data-bs-toggle="dropdown" aria-expanded="false"><i class="uil uil-ellipsis-h"></i></a>
                                                                        <div class="dropdown-menu dropdown-menu-end">
                                                                            <a class="dropdown-item" href="javascript:void(0);"><i class="uil uil-share-alt me-2 text-muted vertical-middle"></i>Share</a>
                                                                            <a class="dropdown-item" href="javascript:void(0);"><i class="uil uil-link-h me-2 text-muted vertical-middle"></i>Get Sharable Link</a>
                                                                            <a class="dropdown-item" href="javascript:void(0);"><i class="uil uil-pen me-2 text-muted vertical-middle"></i>Rename</a>
                                                                            <a class="dropdown-item" href="javascript:void(0);"><i class="uil uil-arrow-to-bottom me-2 text-muted vertical-middle"></i>Download</a>
                                                                            <a class="dropdown-item" href="javascript:void(0);"><i class="uil uil-trash-alt me-2 text-muted vertical-middle"></i>Remove</a>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Data.doc</td>
                                                                <td>Shreyu</td>
                                                                <td>233 KB</td>
                                                                <td>13 Mar</td>
                                                                <td>
                                                                    <div class="dropdown">
                                                                        <a href="javascript:void(0);" class="table-action-btn dropdown-toggle arrow-none btn btn-light btn-xs" data-bs-toggle="dropdown" aria-expanded="false"><i class="uil uil-ellipsis-h"></i></a>
                                                                        <div class="dropdown-menu dropdown-menu-end">
                                                                            <a class="dropdown-item" href="javascript:void(0);"><i class="uil uil-share-alt me-2 text-muted vertical-middle"></i>Share</a>
                                                                            <a class="dropdown-item" href="javascript:void(0);"><i class="uil uil-link-h me-2 text-muted vertical-middle"></i>Get Sharable Link</a>
                                                                            <a class="dropdown-item" href="javascript:void(0);"><i class="uil uil-pen me-2 text-muted vertical-middle"></i>Rename</a>
                                                                            <a class="dropdown-item" href="javascript:void(0);"><i class="uil uil-arrow-to-bottom me-2 text-muted vertical-middle"></i>Download</a>
                                                                            <a class="dropdown-item" href="javascript:void(0);"><i class="uil uil-trash-alt me-2 text-muted vertical-middle"></i>Remove</a>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!--End col-->
            </div> <!-- End row -->

        </div> <!-- container -->

    </div> <!-- content -->
@endsection

@section('content-footer')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <script>
                    document.write(new Date().getFullYear());
                </script>
                &copy; Shreyu theme by <a href="">Coderthemes</a>
            </div>
            <div class="col-md-6">
                <div class="text-md-end footer-links d-none d-sm-block">
                    <a href="javascript:void(0);">About Us</a>
                    <a href="javascript:void(0);">Help</a>
                    <a href="javascript:void(0);">Contact Us</a>
                </div>
            </div>
        </div>
    </div>
@endsection
