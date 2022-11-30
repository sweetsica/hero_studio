<div class="h-100" data-simplebar>
    <!-- User box -->
    <div class="user-box text-center">
        <img src="{{ asset('admin-asset/assets/images/users/avatar-1.jpg') }}" alt="user-img"
             title="Mat Helme" class="rounded-circle avatar-md"/>
        <div class="dropdown">
            <a href="javascript: void(0);" class="text-dark dropdown-toggle h5 mt-2 mb-1 d-block"
               data-bs-toggle="dropdown">{{Auth::user()->name}}</a>
            <div class="dropdown-menu user-pro-dropdown">
                <div class="dropdown-divider"></div>
                <a href="javascript:void(0);" class="dropdown-item notify-item">
                    <i data-feather="log-out" class="icon-dual icon-xs me-1"></i><span>Logout</span>
                </a>
            </div>
        </div>
        <p class="text-muted">Admin Header</p>
    </div>
    <!--- Sidemenu -->
    <style>
        .logo-style img{
            width: 100%;
            /*height: auto;*/
            aspect-ratio: 1;
        }
    </style>
    <div id="sidebar-menu">
{{--        <a href="{{route('dashboard')}}" class="logo logo-dark">--}}
{{--                        <span class="logo-sm logo-style">--}}
{{--                            <img src="{{ asset('admin-asset/Hero.png') }}}" alt=""/>--}}
{{--                        </span>--}}
{{--            <span class="logo-lg logo-style">--}}
{{--                            <img src="{{ asset('admin-asset/Hero.png') }}" alt=""/>--}}
{{--                        </span>--}}
{{--        </a>--}}
{{--        <a href="{{route('dashboard')}}" class="logo logo-light">--}}
{{--                        <span class="logo-sm logo-style">--}}
{{--                            <img src="{{ asset('admin-asset/Hero.png') }}}" alt=""/>--}}
{{--                        </span>--}}
{{--            <span class="logo-lg logo-style">--}}
{{--                            <img src="{{ asset('admin-asset/Hero.png') }}" alt=""/>--}}
{{--                        </span>--}}
{{--        </a>--}}

        <ul id="side-menu">
            <li>
                <a href="{{route('dashboard')}}">
                    <i data-feather="home"></i>
                    <span> Trang chủ </span>
                </a>
            </li>

            {{--Menu super admin --}}
            @if((Auth::user()->hasRole('super admin')))
                <li class="menu-title mt-2">Menu cấp admin</li>
                <li>
                    <a href="{{route('create.member')}}">
                        <i data-feather="users"></i>
                        <span>Danh sách người dùng</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('get.department')}}">
                        <i class="uil uil-sitemap" data-feather="uil uil-users-alt"></i>
                        <span>Danh sách phòng ban</span>
                    </a>
                </li>
                <li>
                    <a href="#sidebarTaskManage" data-bs-toggle="collapse">
                        <i class="uil uil-suitcase" data-feather="uil uil-suitcase"></i>
                        <span>Danh sách công việc</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarTaskManage">
                        <ul class="nav-second-level">
                            <li><a href="{{route('get.taskOrder.list')}}">Danh sách nhiệm vụ</a></li>
                            <li><a href="{{route('get.taskOrder.sponsor')}}">Yêu cầu được tài trợ</a></li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a href="{{route('noti.create')}}">
                        <i class="uil-bell" data-feather="uil-bell"></i>
                        <span>Tạo thông báo</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('post')}}">
                        <i class="uil uil-film" data-feather="uil uil-film"></i>
                        <span>Kho media</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('report.admin')}}">
                        <i class="uil uil-file-check-alt"></i>
                        <span>Xuất báo cáo</span>
                    </a>
                </li>
            @endif
            {{--Hết menu super admin--}}
            {{--Menu quản lý--}}
            @if((Auth::user()->getRoleNames())[0]=='chief of department')
                <li class="menu-title mt-2">Menu cấp quản lý</li>
                <li>
                    <a href="#sidebarTaskManage" data-bs-toggle="collapse">
                        <i class="uil uil-suitcase" data-feather="uil uil-suitcase"></i>
                        <span>Danh sách công việc</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarTaskManage">
                        <ul class="nav-second-level">
                            <li><a href="{{route('get.taskOrder.list')}}">Danh sách nhiệm vụ</a></li>
                            <li><a href="{{route('get.taskOrder.sponsor')}}">Yêu cầu được tài trợ</a></li>
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
                        </ul>
                    </div>
                </li>
                @if((Auth::user()->member()->first()['special_access']==1))
                    <li>
                        <a href="#sidebarMediaManager" data-bs-toggle="collapse">
                            <i class="uil uil-film" data-feather="uil uil-film"></i>
                            <span>Kho media</span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="sidebarMediaManager">
                            <ul class="nav-second-level">
                                <li><a href="{{route('post')}}">Danh mục media</a></li>
                            </ul>
                        </div>
                    </li>
                @endif
                <li>
                    <a href="{{route('report.department',Auth::user()->departments()->first()['id'])}}">
                        <i class="uil uil-file-check-alt"></i>
                        <span>Xuất báo cáo</span>
                    </a>
                </li>
            @endif
            {{--Hết menu quản lý--}
            {{--Menu KOL--}}
            @if((Auth::user()->getRoleNames())[0]=='key opinion leaders')
                <li class="menu-title mt-2">Menu cấp KOL</li>
                <li>
                    <a href="#sidebarTaskManage" data-bs-toggle="collapse">
                        <i class="uil uil-suitcase" data-feather="uil uil-suitcase"></i>
                        <span>Danh sách yêu cầu</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarTaskManage">
                        <ul class="nav-second-level">
                            <li><a href="{{route('get.taskOrder.list')}}">Yêu cầu của tôi</a></li>
                            <li><a href="{{route('get.taskOrder.pendingList')}}">Yêu cầu chờ xử lý</a></li>
                            <li><a href="{{route('get.taskOrder.doneList')}}">Yêu cầu đã hoàn thành</a></li>
                            <li><a href="{{route('get.taskOrder.sponsor')}}">Yêu cầu được tài trợ</a></li>
                        </ul>
                    </div>
                </li>
                @if((Auth::user()->member()->first()['special_access']==1))
                    <li>
                        <a href="#sidebarMediaKOL" data-bs-toggle="collapse">
                            <i class="uil uil-film" data-feather="uil uil-film"></i>
                            <span>Kho media</span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="sidebarMediaKOL">
                            <ul class="nav-second-level">
                                <li><a href="{{route('post')}}">Danh mục media</a></li>
                            </ul>
                        </div>
                    </li>
                @endif
            @endif
            {{--Hết menu KOL--}}
            {{--Menu nhân viên--}}
            @if(Auth::user()->hasRole('editor'))
                <li class="menu-title mt-2">Menu cấp nhân viên</li>
                <li>
                    <a href="#sidebarTaskStaff" data-bs-toggle="collapse">
                        <i class="uil uil-suitcase" data-feather="uil uil-suitcase"></i>
                        <span>Danh sách công việc</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarTaskStaff">
                        <ul class="nav-second-level">
                            <li><a href="{{route('get.taskOrder.list')}}">Công việc được giao</a></li>
                            <li><a href="{{route('get.taskOrder.sponsor')}}">Yêu cầu được tài trợ</a></li>
                            <li><a href="{{route('get.taskOrder.redoList')}}">Công việc cần kiểm tra</a></li>
                        </ul>
                    </div>
                </li>
                @if((Auth::user()->member()->first()['special_access']==1))
                    <li>
                        <a href="#sidebarDepartmentStaff" data-bs-toggle="collapse">
                            <i class="uil uil-film" data-feather="uil uil-film"></i>
                            <span>Kho media</span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="sidebarDepartmentStaff">
                            <ul class="nav-second-level">
                                <li><a href="{{route('post')}}">Danh mục media</a></li>
                            </ul>
                        </div>
                    </li>
                @endif
                <li>
                    <a href="{{route('report.user',Auth::id())}}">
                        <i class="uil uil-file-check-alt"></i>
                        <span>Xuất báo cáo</span>
                    </a>
                </li>
                {{--Hết menu nhân viên--}}
            @endif
            {{--Hết menu nhân viên--}}
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
