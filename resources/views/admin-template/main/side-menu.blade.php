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
            @if(Auth::user()->hasRole(\App\Models\Role::ROLE_COF))
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
            @endif
            {{--Hết menu quản lý--}
            {{--Menu KOL--}}
            @if(Auth::user()->hasRole(\App\Models\Role::ROLE_KOLS))
            <li class="menu-title mt-2">Menu cấp KOL</li>
            <li>
                <a href="#sidebarTaskKOL" data-bs-toggle="collapse">
                    <i class="uil uil-suitcase" data-feather="uil uil-suitcase"></i>
                    <span>Danh sách yêu cầu</span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarTaskKOL">
                    <ul class="nav-second-level">
                        <li><a href="{{route('create.taskOrder')}}">Tạo yêu cầu</a></li>
                        <li><a href="{{route('get.task')}}">Danh sách yêu cầu</a></li>
{{--                        <li><a href="#">Phân công nhiệm vụ</a></li>--}}
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
            @endif
            {{--Hết menu KOL--}}
            {{--Menu nhân viên--}}
            @if(Auth::user()->hasRole(\App\Models\Role::ROLE_EDITOR))
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
            @endif
            <li>
                <a href="{{route('logout')}}">
                    <i class="uil uil-exit"></i>
                    <span> Đăng xuất </span>
                    <!-- <span class="menu-arrow"></span> -->
                </a>
            </li>
        </ul>
    </div>
    <!-- End Sidebar -->

    <div class="clearfix"></div>
</div>
<!-- Sidebar -left -->
