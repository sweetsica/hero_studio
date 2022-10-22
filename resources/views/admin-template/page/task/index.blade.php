@extends('admin-template.main.master')

@section('content-page')
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <h4 class="page-title">Tasks List</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Shreyu</a></li>
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Tasks</a></li>
                                <li class="breadcrumb-item active">List</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <!-- tasks panel -->
            <div class="row">
                <div class="col-xl-8">
                    <div class="row">
                        <div class="col">
                            <div class="card">
                                <div class="card-body">
                                    <!-- cta -->
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <a href="{{route('create.taskOrder')}}" class="btn btn-primary">
                                                <i class='uil uil-plus me-1'></i>Thêm mới yêu cầu
                                            </a>
                                        </div>
                                        <div class="col-sm-9">
                                            <div class="float-sm-end mt-3 mt-sm-0">

                                                <div class="task-search d-inline-block mb-3 mb-sm-0 me-sm-1">
                                                    <form>
                                                        <div class="input-group">
                                                            <input type="text" class="form-control search-input" placeholder="Search..." />
                                                            <span class="uil uil-search icon-search"></span>
                                                            <button class="btn btn-soft-primary input-group-text" type="button">
                                                                <i class='uil uil-file-search-alt'></i>
                                                            </button>
                                                        </div>
                                                    </form>
                                                </div>
                                                <div class="dropdown d-inline-block">
                                                    <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class='uil uil-sort-amount-down'></i>
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-end">
                                                        <a class="dropdown-item" href="#">Due Date</a>
                                                        <a class="dropdown-item" href="#">Added Date</a>
                                                        <a class="dropdown-item" href="#">Assignee</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mt-3">
                                        <div class="col">
                                            <a class="text-dark" data-bs-toggle="collapse" href="#todayTasks" aria-expanded="false" aria-controls="todayTasks">
                                                <h5 class="mb-0"><i class='uil uil-angle-down'></i>Today
                                                    <span class="text-muted fs-14">(10)</span>
                                                </h5>
                                            </a>

                                            <div class="collapse show" id="todayTasks">
                                                <div class="card mb-0 border-0">
                                                    <div class="card-body">
{{--                                                        @dd($data)--}}
                                                        @foreach($infos as $data)
                                                            <!-- task -->
                                                            <div class="row justify-content-sm-between border-bottom">
                                                                <div class="col-lg-6 mb-2 mb-lg-0">
                                                                    <div class="form-check">
                                                                        <input type="checkbox" class="form-check-input" id="task1">
                                                                        <label class="form-check-label" for="task1">
                                                                            <a href="{{route('edit.taskOrder',$data->id)}}">{{$data->name}}</a>
                                                                        </label>
                                                                    </div> <!-- end checkbox -->
                                                                </div> <!-- end col -->
                                                                <div class="col-lg-6">
                                                                    <div class="d-sm-flex justify-content-between">
                                                                        <div>
{{--                                                                            <img src="assets/images/users/avatar-9.jpg" alt="image" class="avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Assigned to Arya S" />--}}
                                                                        </div>
                                                                        <div class="mt-3 mt-sm-0">
                                                                            <ul class="list-inline text-sm-end">
                                                                                <li class="list-inline-item pe-1">
                                                                                    <i class='uil uil-schedule me-1'></i>{{$data->created_at}}
                                                                                </li>
                                                                                <li class="list-inline-item pe-1">
                                                                                    <i class='uil uil-align-alt me-1'></i>3/7
                                                                                </li>
                                                                                <li class="list-inline-item pe-2">
                                                                                    <i class='uil uil-comment-message me-1'></i>21
                                                                                </li>
                                                                                <li class="list-inline-item">
                                                                                        @if($data->status_code==1)
                                                                                        <span class="badge badge badge-soft-secondary p-1">
                                                                                            Đang chờ nhận
                                                                                        </span>
                                                                                        @elseif ($data->status_code==2)
                                                                                        <span class="badge badge-soft-info p-1">
                                                                                            Đang thực hiện
                                                                                        </span>
                                                                                        @elseif ($data->status_code==3)
                                                                                        <span class="badge badge-soft-success p-1">
                                                                                            Đã hoàn thành
                                                                                        </span>
                                                                                        @else
                                                                                        <span class="badge badge-soft-primary p-1">
                                                                                            Cần làm lại
                                                                                        </span>
                                                                                        @endif
                                                                                    </span>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </div> <!-- end .d-flex-->
                                                                </div> <!-- end col -->
                                                            </div>
                                                            <!-- end task -->
                                                        @endforeach
                                                    </div> <!-- end card-body-->
                                                </div> <!-- end card -->
                                            </div> <!-- end .collapse-->

                                        </div>
                                    </div>

                                    <div class="row mb-3 mt-4">
                                        <div class="col-12">
                                            <div class="text-center">
                                                <a href="javascript:void(0);" class="btn btn-white mb-3">
                                                    <i data-feather="loader" class="icon-dual icon-xs me-2"></i>Tải thêm
                                                </a>
                                            </div>
                                        </div> <!-- end col-->
                                    </div>
                                    <!-- end row -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- task details -->
                <div class="col-xl-4">
                    <div class="card">
                        <div class="card-body p-0">
                            <div class="p-3">
                                <div class="dropdown float-end">
                                    <a href="#" class="dropdown-toggle arrow-none text-muted" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="uil uil-ellipsis-v"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item">
                                            <i class="uil uil-refresh me-2"></i>Refresh
                                        </a>
                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item">
                                            <i class="uil uil-user-plus me-2"></i>Add New
                                        </a>
                                        <div class="dropdown-divider"></div>
                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item text-danger">
                                            <i class="uil uil-exit me-2"></i>Exit
                                        </a>
                                    </div>
                                </div>

                                <h5 class="card-title header-title mb-0">Overview</h5>
                            </div>

                            <!-- stat 1 -->
                            <div class="d-flex p-3 border-bottom">
                                <div class="flex-grow-1">
                                    <h4 class="mt-0 mb-1 fs-22">121,000</h4>
                                    <span class="text-muted">Total Visitors</span>
                                </div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users align-self-center icon-dual icon-md"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                            </div>

                            <!-- stat 2 -->
                            <div class="d-flex p-3 border-bottom">
                                <div class="flex-grow-1">
                                    <h4 class="mt-0 mb-1 fs-22">21,000</h4>
                                    <span class="text-muted">Total Product Views</span>
                                </div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-image align-self-center icon-dual icon-md"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><circle cx="8.5" cy="8.5" r="1.5"></circle><polyline points="21 15 16 10 5 21"></polyline></svg>
                            </div>

                            <!-- stat 3 -->
                            <div class="d-flex p-3 border-bottom">
                                <div class="flex-grow-1">
                                    <h4 class="mt-0 mb-1 fs-22">$21.5</h4>
                                    <span class="text-muted">Revenue Per Visitor</span>
                                </div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-bag align-self-center icon-dual icon-md"><path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path><line x1="3" y1="6" x2="21" y2="6"></line><path d="M16 10a4 4 0 0 1-8 0"></path></svg>
                            </div>

                            <a href="" class="p-2 d-block text-end">View All <i class="uil-arrow-right"></i></a>
                        </div>
                    </div>
                </div> <!-- end col -->
            </div>

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
