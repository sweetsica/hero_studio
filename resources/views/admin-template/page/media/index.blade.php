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
                        <h4 class="page-title">Compose Email</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Shreyu</a></li>
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Email</a></li>
                                <li class="breadcrumb-item active">Compose Email</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page title -->
            <!-- compose -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="email-container">
                        <!-- Left sidebar -->
                        <div class="inbox-leftbar">

                            <a href="email-inbox.html" class="btn btn-danger d-block">Inbox</a>

                            <div class="mail-list mt-4">
                                <a href="#" class="list-group-item border-0 text-danger fw-bold">
                                    <i class="uil uil-envelope-alt fs-15 me-1"></i>Inbox
                                    <span class="badge bg-danger float-end ms-2 mt-1">8</span>
                                </a>
                                <a href="#" class="list-group-item border-0">
                                    <i class="uil uil-envelope-star fs-15 me-1"></i>Starred
                                </a>
                                <a href="#" class="list-group-item border-0">
                                    <i class="uil uil-envelope-edit fs-15 me-1"></i>Draft
                                    <span class="badge bg-info float-end ms-2 mt-1">32</span>
                                </a>
                                <a href="#" class="list-group-item border-0">
                                    <i class="uil uil-envelope-send fs-15 me-1"></i>Sent Mail
                                </a>
                                <a href="#" class="list-group-item border-0">
                                    <i class="uil uil-trash fs-15 me-1"></i>Trash
                                </a>
                            </div>

                            <h6 class="mt-4">Labels</h6>

                            <div class="list-group b-0 mail-list">
                                <a href="#" class="list-group-item border-0">
                                    <span class="uil uil-circle text-primary fs-12 me-1"></span>Web App
                                </a>
                                <a href="#" class="list-group-item border-0">
                                    <span class="uil uil-circle text-info fs-12 me-1"></span>Recharge
                                </a>
                                <a href="#" class="list-group-item border-0">
                                    <span class="uil uil-circle text-success fs-12 me-1"></span>Wallet Balance
                                </a>
                                <a href="#" class="list-group-item border-0">
                                    <span class="uil uil-circle text-warning fs-12 me-1"></span>Friends
                                </a>
                                <a href="#" class="list-group-item border-0">
                                    <span class="uil uil-circle text-secondary fs-12 me-1"></span>Family
                                </a>
                            </div>

                        </div>
                        <!-- End Left sidebar -->

                        <div class="inbox-rightbar p-4">
                            <div>
                                <form>
                                    <div class="mb-3">
                                        <input type="email" class="form-control" placeholder="To">
                                    </div>

                                    <div class="mb-3">
                                        <input type="text" class="form-control" placeholder="Subject">
                                    </div>

                                    <div class="mb-3 card border-0">
                                        <div id="snow-editor" style="height: 300px;">
                                            <h3>This is an Air-mode editable area.</h3>
                                            <p><br></p>
                                            <ul>
                                                <li>Select a text to reveal the toolbar.</li>
                                                <li>Edit rich document on-the-fly, so elastic!</li>
                                            </ul>
                                            <p><br></p>
                                            <p>End of air-mode area</p>
                                        </div> <!-- end Snow-editor-->
                                    </div>

                                    <div class="mb-3 pt-2">
                                        <div class="text-end">
                                            <button type="button" class="btn btn-success me-1">
                                                <i class="uil uil-envelope-edit"></i> Draft
                                            </button>
                                            <button class="btn btn-primary"> <span>Send</span>
                                                <i class="uil uil-message ms-2"></i>
                                            </button>
                                        </div>
                                    </div>

                                </form>
                            </div> <!-- end card-->

                        </div>
                        <!-- end inbox-rightbar-->

                        <div class="clearfix"></div>
                    </div>
                </div> <!-- end Col -->

            </div><!-- End row -->
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
