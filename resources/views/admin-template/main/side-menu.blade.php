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
                    <span> Trang ch??? </span>
                    <!-- <span class="menu-arrow"></span> -->
                </a>
                <div class="collapse" id="sidebarDashboard">
                    <ul class="nav-second-level">
                        <li><a href="#">KOL</a></li>
                        <li><a href="#">Qu???n l??</a></li>
                        <li><a href="#">Nh??n vi??n</a></li>
                    </ul>
                </div>
            </li>

            {{--Menu qu???n l??--}}
            <li class="menu-title mt-2">Menu c???p qu???n l??</li>
            <li>
                <a href="#sidebarTaskManage" data-bs-toggle="collapse">
                    <i class="uil uil-suitcase" data-feather="uil uil-suitcase"></i>
                    <span>Danh s??ch c??ng vi???c</span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarTaskManage">
                    <ul class="nav-second-level">
                        <li><a href="{{route('get.task')}}">Danh s??ch nhi???m v???</a></li>
                        <li><a href="{{route('get.task.department','1')}}">Nhi???m v??? theo id ph??ng</a></li>
                        <li><a href="{{route('edit.taskOrder','1')}}">Ph??n c??ng nhi???m v???</a></li>

                        <li><a href="{{route('get.taskOrder.list')}}">Danh s??ch y??u c???u</a></li>
                        <li><a href="{{route('get.taskOrder.byDepartmentId','1')}}">Y??u c???u theo id ph??ng</a></li>
                    </ul>
                </div>
            </li>
            <li>
                <a href="#sidebarDepartmentManager" data-bs-toggle="collapse">
                    <i class="uil uil-sitemap" data-feather="uil uil-sitemap"></i>
                    <span>Danh s??ch ph??ng ban</span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarDepartmentManager">
                    <ul class="nav-second-level">
                        <li><a href="{{route('get.department')}}">List ph??ng ban</a></li>
                        <li><a href="{{route('create.department')}}">T???o ph??ng ban</a></li>
                        <li><a href="{{route('edit.department','1')}}">Ph??n b??? nh??n s???</a></li>
                    </ul>
                </div>
            </li>
            <li>
                <a href="#sidebarStaffManager" data-bs-toggle="collapse">
                    <i class="uil uil-users-alt" data-feather="uil uil-users-alt"></i>
                    <span>Danh s??ch nh??n s???</span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarStaffManager">
                    <ul class="nav-second-level">
                        <li><a href="{{route('get.member')}}">List nh??n s???</a></li>
                        <li><a href="#">Th??m m???i nh??n s???</a></li>
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
                        <li><a href="{{route('get.media')}}">Danh m???c media</a></li>
                    </ul>
                </div>
            </li>
            {{--H???t menu qu???n l??--}
            {{--Menu KOL--}}
            <li class="menu-title mt-2">Menu c???p KOL</li>
            <li>
                <a href="#sidebarTaskKOL" data-bs-toggle="collapse">
                    <i class="uil uil-suitcase" data-feather="uil uil-suitcase"></i>
                    <span>Danh s??ch y??u c???u</span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarTaskKOL">
                    <ul class="nav-second-level">
                        <li><a href="#">T???o y??u c???u</a></li>
                        <li><a href="#">Danh s??ch y??u c???u</a></li>
                        <li><a href="#">Ph??n c??ng nhi???m v???</a></li>
                    </ul>
                </div>
            </li>
            <li>
                <a href="#sidebarDepartmentKOL" data-bs-toggle="collapse">
                    <i class="uil uil-sitemap" data-feather="uil uil-sitemap"></i>
                    <span>Danh s??ch ph??ng ban</span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarDepartmentKOL">
                    <ul class="nav-second-level">
                        <li><a href="{{route('get.department')}}">List nh??n s???</a></li>
                        <li><a href="#">Th??m m???i nh??n s???</a></li>
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
                        <li><a href="{{route('get.media')}}">Danh m???c media</a></li>
                    </ul>
                </div>
            </li>
            {{--H???t menu KOL--}}
            {{--Menu nh??n vi??n--}}
            <li class="menu-title mt-2">Menu c???p nh??n vi??n</li>
            <li>
                <a href="#sidebarTaskStaff" data-bs-toggle="collapse">
                    <i class="uil uil-suitcase" data-feather="uil uil-suitcase"></i>
                    <span>Danh s??ch c??ng vi???c</span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarTaskStaff">
                    <ul class="nav-second-level">
                        <li><a href="{{route('get.task')}}">C??ng vi???c ph??ng t??i</a></li>
                        <li><a href="#">C??ng vi???c ???????c giao</a></li>
                        <li><a href="#">C??ng vi???c c???n ki???m tra</a></li>
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
                        <li><a href="{{route('get.media')}}">Danh m???c media</a></li>
                    </ul>
                </div>
            </li>
            {{--H???t menu nh??n vi??n--}}

        </ul>
    </div>
    <!-- End Sidebar -->

    <div class="clearfix"></div>
</div>
<!-- Sidebar -left -->
