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
                        <h4 class="page-title">Projects List</h4>
                        <div class="page-title-right">
                            <div class="mt-2 mt-md-0">
                                <button type="button" class="btn btn-danger me-4 mb-2 mb-md-0">
                                    <i class="uil-plus me-1"></i> Create Project
                                </button>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-primary mb-2 mb-md-0">All</button>
                                </div>
                                <div class="btn-group ms-md-1">
                                    <button type="button" class="btn btn-white mb-2 mb-md-0">Ongoing</button>
                                    <button type="button" class="btn btn-white mb-2 mb-md-0">Finished</button>
                                </div>
                                <div class="btn-group ms-2 d-none d-sm-inline-block">
                                    <button type="button" class="btn btn-primary">
                                        <i class="uil uil-apps"></i>
                                    </button>
                                </div>
                                <div class="btn-group d-none d-sm-inline-block">
                                    <button type="button" class="btn btn-white">
                                        <i class="uil uil-align-left-justify"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-xl-4 col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="badge bg-success float-end">Completed</div>
                            <p class="text-success text-uppercase fs-12 mb-2">Web Design</p>
                            <h5><a href="#" class="text-dark">Landing page Design</a></h5>
                            <p class="text-muted mb-4">If several languages coalesce, the grammar of the resulting language is more regular.</p>

                            <div>
                                <a href="javascript: void(0);">
                                    <img src="assets/images/users/avatar-2.jpg" alt="" class="avatar-sm m-1 rounded-circle">
                                </a>
                                <a href="javascript: void(0);">
                                    <img src="assets/images/users/avatar-3.jpg" alt="" class="avatar-sm m-1 rounded-circle">
                                </a>
                            </div>
                        </div>
                        <div class="card-body border-top">
                            <div class="row align-items-center">
                                <div class="col-sm-auto">
                                    <ul class="list-inline mb-0">
                                        <li class="list-inline-item pe-2">
                                            <a href="#" class="text-muted d-inline-block" data-bs-toggle="tooltip" data-bs-placement="top" title="Due date">
                                                <i class="uil uil-calender me-1"></i> 15 Dec
                                            </a>
                                        </li>
                                        <li class="list-inline-item pe-2">
                                            <a href="#" class="text-muted d-inline-block" data-bs-toggle="tooltip" data-bs-placement="top" title="Tasks">
                                                <i class="uil uil-bars me-1"></i> 56
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="#" class="text-muted d-inline-block" data-bs-toggle="tooltip" data-bs-placement="top" title="Comments">
                                                <i class="uil uil-comments-alt me-1"></i> 224
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col offset-sm-1">
                                    <div class="progress mt-4 mt-sm-0" style="height: 5px;" data-bs-toggle="tooltip" data-bs-placement="top" title="100% completed">
                                        <div class="progress-bar bg-success" role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end card -->
                </div>

                <div class="col-xl-4 col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="badge bg-warning float-end">Pending</div>
                            <p class="text-warning text-uppercase fs-12 mb-2">Android</p>
                            <h5><a href="#" class="text-dark">App Design and Develop</a></h5>
                            <p class="text-muted mb-4">To achieve this, it would be necessary to have uniform grammar and more common words.</p>

                            <div>
                                <a href="javascript: void(0);">
                                    <img src="assets/images/users/avatar-4.jpg" alt="" class="avatar-sm m-1 rounded-circle">
                                </a>
                                <a href="javascript: void(0);">
                                    <img src="assets/images/users/avatar-5.jpg" alt="" class="avatar-sm m-1 rounded-circle">
                                </a>
                                <a href="javascript: void(0);">
                                    <div class="avatar-sm fw-bold d-inline-block m-1">
                                        <span class="avatar-title rounded-circle bg-soft-warning text-warning">2+</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="card-body border-top">
                            <div class="row align-items-center">
                                <div class="col-sm-auto">
                                    <ul class="list-inline mb-0">
                                        <li class="list-inline-item pe-2">
                                            <a href="#" class="text-muted d-inline-block" data-bs-toggle="tooltip" data-bs-placement="top" title="Due date">
                                                <i class="uil uil-calender me-1"></i> 28 Nov
                                            </a>
                                        </li>
                                        <li class="list-inline-item pe-2">
                                            <a href="#" class="text-muted d-inline-block" data-bs-toggle="tooltip" data-bs-placement="top" title="Tasks">
                                                <i class="uil uil-bars me-1"></i> 62
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="#" class="text-muted d-inline-block" data-bs-toggle="tooltip" data-bs-placement="top" title="Comments">
                                                <i class="uil uil-comments-alt me-1"></i> 196
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col offset-sm-1">
                                    <div class="progress mt-4 mt-sm-0" style="height: 5px;" data-bs-toggle="tooltip" data-bs-placement="top" title="72% completed">
                                        <div class="progress-bar bg-warning" role="progressbar" style="width: 72%;" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end card -->
                </div>

                <div class="col-xl-4 col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="badge bg-success float-end">Completed</div>
                            <p class="text-success text-uppercase fs-12 mb-2">Web Design</p>
                            <h5><a href="#" class="text-dark">New Admin Design</a></h5>
                            <p class="text-muted mb-4">To an English person, it will seem like simplified english, as a skeptical Cambridge.</p>

                            <div>
                                <a href="javascript: void(0);">
                                    <div class="avatar-sm fw-bold d-inline-block m-1">
                                        <span class="avatar-title rounded-circle bg-soft-primary text-primary">H</span>
                                    </div>
                                </a>
                                <a href="javascript: void(0);">
                                    <img src="assets/images/users/avatar-7.jpg" alt="" class="avatar-sm m-1 rounded-circle">
                                </a>
                            </div>
                        </div>
                        <div class="card-body border-top">
                            <div class="row align-items-center">
                                <div class="col-sm-auto">
                                    <ul class="list-inline mb-0">
                                        <li class="list-inline-item pe-2">
                                            <a href="#" class="text-muted d-inline-block" data-bs-toggle="tooltip" data-bs-placement="top" title="Due date">
                                                <i class="uil uil-calender me-1"></i> 19 Nov
                                            </a>
                                        </li>
                                        <li class="list-inline-item pe-2">
                                            <a href="#" class="text-muted d-inline-block" data-bs-toggle="tooltip" data-bs-placement="top" title="Tasks">
                                                <i class="uil uil-bars me-1"></i> 69
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="#" class="text-muted d-inline-block" data-bs-toggle="tooltip" data-bs-placement="top" title="Comments">
                                                <i class="uil uil-comments-alt me-1"></i> 201
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col offset-sm-1">
                                    <div class="progress mt-4 mt-sm-0" style="height: 5px;" data-bs-toggle="tooltip" data-bs-placement="top" title="100% completed" >
                                        <div class="progress-bar bg-success" role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end card -->
                </div>

                <div class="col-xl-4 col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="badge bg-warning float-end">Pending</div>
                            <p class="text-warning text-uppercase fs-12 mb-2">Android</p>
                            <h5><a href="#" class="text-dark">Custom Software Development</a></h5>
                            <p class="text-muted mb-4">Their separate existence is a myth. For science, music, sport, etc uses the vocabulary</p>

                            <div>
                                <a href="javascript: void(0);">
                                    <img src="assets/images/users/avatar-6.jpg" alt="" class="avatar-sm m-1 rounded-circle">
                                </a>
                                <a href="javascript: void(0);">
                                    <div class="avatar-sm fw-bold d-inline-block m-1">
                                        <span class="avatar-title rounded-circle bg-soft-danger text-danger">K</span>
                                    </div>
                                </a>
                                <a href="javascript: void(0);">
                                    <img src="assets/images/users/avatar-7.jpg" alt="" class="avatar-sm m-1 rounded-circle">
                                </a>

                            </div>
                        </div>
                        <div class="card-body border-top">
                            <div class="row align-items-center">
                                <div class="col-sm-auto">
                                    <ul class="list-inline mb-0">
                                        <li class="list-inline-item pe-2">
                                            <a href="#" class="text-muted d-inline-block" data-bs-toggle="tooltip" data-bs-placement="top" title="Due date">
                                                <i class="uil uil-calender me-1"></i> 02 Nov
                                            </a>
                                        </li>
                                        <li class="list-inline-item pe-2">
                                            <a href="#" class="text-muted d-inline-block" data-bs-toggle="tooltip" data-bs-placement="top" title="Tasks">
                                                <i class="uil uil-bars me-1"></i> 72
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="#" class="text-muted d-inline-block" data-bs-toggle="tooltip" data-bs-placement="top" title="Comments">
                                                <i class="uil uil-comments-alt me-1"></i> 184
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col offset-sm-1">
                                    <div class="progress mt-4 mt-sm-0" style="height: 5px;" data-bs-toggle="tooltip" data-bs-placement="top" title="60% completed">
                                        <div class="progress-bar bg-warning" role="progressbar" style="width: 60%;" aria-valuenow="60" aria-valuemin="0" aria-valuemax="60"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end card -->
                </div>
                <div class="col-xl-4 col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="badge bg-success float-end">Completed</div>
                            <p class="text-success text-uppercase fs-12 mb-2">Web Design</p>
                            <h5><a href="#" class="text-dark">Brand logo design</a></h5>
                            <p class="text-muted mb-4">Everyone realizes why a new common language refuse to pay expensive translators.</p>

                            <div>
                                <a href="javascript: void(0);">
                                    <div class="avatar-sm fw-bold d-inline-block m-1">
                                        <span class="avatar-title rounded-circle bg-soft-success text-success">D</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="card-body border-top">
                            <div class="row align-items-center">
                                <div class="col-sm-auto">
                                    <ul class="list-inline mb-0">
                                        <li class="list-inline-item pe-2">
                                            <a href="#" class="text-muted d-inline-block" data-bs-toggle="tooltip" data-bs-placement="top" title="Due date">
                                                <i class="uil uil-calender me-1"></i> 13 Oct
                                            </a>
                                        </li>
                                        <li class="list-inline-item pe-2">
                                            <a href="#" class="text-muted d-inline-block" data-bs-toggle="tooltip" data-bs-placement="top" title="Tasks">
                                                <i class="uil uil-bars me-1"></i> 64
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="#" class="text-muted d-inline-block" data-bs-toggle="tooltip" data-bs-placement="top" title="Comments">
                                                <i class="uil uil-comments-alt me-1"></i> 173
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col offset-sm-1">
                                    <div class="progress mt-4 mt-sm-0" style="height: 5px;" data-bs-toggle="tooltip" data-bs-placement="top" title="100% completed">
                                        <div class="progress-bar bg-success" role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end card -->
                </div>

                <div class="col-xl-4 col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="badge bg-success float-end">Completed</div>
                            <p class="text-success text-uppercase fs-12 mb-2">Web Design</p>
                            <h5><a href="#" class="text-dark">Website Redesign</a></h5>
                            <p class="text-muted mb-4">The languages only differ in their grammar pronunciation and their most common words.</p>

                            <div>
                                <a href="javascript: void(0);">
                                    <img src="assets/images/users/avatar-9.jpg" alt="" class="avatar-sm m-1 rounded-circle">
                                </a>
                                <a href="javascript: void(0);">
                                    <img src="assets/images/users/avatar-10.jpg" alt="" class="avatar-sm m-1 rounded-circle">
                                </a>
                            </div>
                        </div>
                        <div class="card-body border-top">
                            <div class="row align-items-center">
                                <div class="col-sm-auto">
                                    <ul class="list-inline mb-0">
                                        <li class="list-inline-item pe-2">
                                            <a href="#" class="text-muted d-inline-block" data-bs-toggle="tooltip" data-bs-placement="top" title="Due date">
                                                <i class="uil uil-calender me-1"></i> 11 Oct
                                            </a>
                                        </li>
                                        <li class="list-inline-item pe-2">
                                            <a href="#" class="text-muted d-inline-block" data-bs-toggle="tooltip" data-bs-placement="top" title="Tasks">
                                                <i class="uil uil-bars me-1"></i> 71
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="#" class="text-muted d-inline-block" data-bs-toggle="tooltip" data-bs-placement="top" title="Comments">
                                                <i class="uil uil-comments-alt me-1"></i> 163
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col offset-sm-1">
                                    <div class="progress mt-4 mt-sm-0" style="height: 5px;" data-bs-toggle="tooltip" data-bs-placement="top" title="100% completed">
                                        <div class="progress-bar bg-success" role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end card -->
                </div>
            </div>
            <!-- end row -->

            <div class="row mb-3 mt-2">
                <div class="col-12">
                    <div class="text-center">
                        <a href="javascript:void(0);" class="btn btn-white">
                            <i data-feather="loader" class="icon-dual icon-xs me-2"></i>
                            Load more
                        </a>
                    </div>
                </div> <!-- end col-->
            </div>
            <!-- end row -->

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
