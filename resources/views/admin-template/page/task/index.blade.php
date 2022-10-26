@extends('admin-template.main.master')

@section('content-page')
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <h4 class="page-title">Danh sách nhiệm vụ</h4>
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
                                    <div class="row" style="padding: 1%">
                                        <div class="col-sm-3">
                                            <a href="{{route('create.taskOrder')}}" class="btn btn-primary">
                                                <i class='uil uil-plus me-1'></i>Thêm mới yêu cầu
                                            </a>
                                        </div>
                                        <div class="col-sm-9">
                                            <div class="float-sm-end mt-3 mt-sm-0">
                                                <div class="dropdown d-inline-block">
                                                    <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="uil uil-sort-amount-down"></i>
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-end" style="">
                                                        <a class="dropdown-item" href="#">Tuần này</a>
                                                        <a class="dropdown-item" href="#">Tháng này</a>
                                                        <a class="dropdown-item" href="#">3 Tháng gần đây</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col">
                                            <div class="collapse show" id="todayTasks">
                                                <div class="card mb-0 border-0">
                                                    <!-- task -->
                                                    <div class="card-body">
                                                        @foreach($infos as $data)
{{--                                                            @dd($data->status_code)--}}
                                                            @if($data->status_code == "Đang chờ nhận")
                                                                <div class="alert alert-secondary row" role="alert">
                                                            @elseif($data->status_code == "Đang thực hiện")
                                                                <div class="alert alert-info row" role="alert">
                                                            @elseif($data->status_code == "Đã hoàn thành")
                                                                <div class="alert alert-success row" role="alert">
                                                            @else
                                                                <div class="alert alert-warning row" role="alert">
                                                            @endif
                                                            <div class="col-lg-6 mb-2 mb-lg-0" style="padding-top: 0.75rem;">
                                                                <a href="{{route('edit.taskOrder',$data->id)}}">{{$data->name}}</a>
                                                            </div>
                                                            <div class="col-lg-6 mb-2 mb-lg-0 d-sm-flex justify-content-between" style="padding-top: 0.75rem;">
                                                                <ul class="list-inline text-sm-end">
                                                                    <li class="list-inline-item pe-1"><i class='uil uil-stopwatch'></i>{{$data->product_length}} phút</li>
                                                                    <li class="list-inline-item pe-1"><i class='uil uil-schedule me-1'></i>Ngày tạo: {{$data->created_at->format('d-m-Y'.'#'.'h:i A')}}</li>
                                                                    <li class="list-inline-item">
                                                                        @if($data->status_code == "Đang chờ nhận")
                                                                            <span class="badge bg-secondary">
                                                                        @elseif($data->status_code == "Đang thực hiện")
                                                                            <div class="badge bg-info" role="alert">
                                                                        @elseif($data->status_code == "Đã hoàn thành")
                                                                            <div class="badge bg-success" role="alert">
                                                                        @else
                                                                            <div class="badge bg-warning" role="alert">
                                                                        @endif
                                                                            {{$data->status_code}}
                                                                        </span>
                                                                    </li>
                                                                </ul>
                                                            </div>

                                                        </div>
                                                        @endforeach
                                                    </div><!-- endtask -->
                                                </div> <!-- end card -->
                                            </div> <!-- end .collapse-->
                                        </div>
                                    </div>
                                    <!-- end row -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- task details -->
                <div class="col-xl-4">
                    <div class="card row">
                        <div class="card-body">
                            <div class="p-3 text-center">
                                <h5 class="card-title header-title mb-0">Tổng quan</h5>
                            </div>
                            <div class="col-md-12 text-center">
                                {{--Block 1--}}
                                <div class="col-md-12 col-xl-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="d-flex">
                                                <div class="flex-grow-1">
                                                    <span class="text-muted text-uppercase fs-12 fw-bold">Yêu cầu hôm nay</span>
                                                    <h3 class="mb-0">$2100</h3>
                                                </div>
                                                <div class="align-self-center flex-shrink-0">
                                                    <div id="today-revenue-chart" class="apex-charts"></div>
                                                    <span class="text-success fw-bold fs-13">
                                                        <i class='uil uil-arrow-up'></i> 10.21%
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{--Block 2--}}
                                <div class="col-md-12 col-xl-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="d-flex">
                                                <div class="flex-grow-1">
                                                    <span class="text-muted text-uppercase fs-12 fw-bold">Đang thực hiện</span>
                                                    <h3 class="mb-0">$2100</h3>
                                                </div>
                                                <div class="align-self-center flex-shrink-0">
                                                    <div id="today-revenue-chart" class="apex-charts"></div>
                                                    <span class="text-success fw-bold fs-13">
                                                        <i class='uil uil-arrow-up'></i> 10.21%
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{--Block 3--}}
                                <div class="col-md-12 col-xl-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="d-flex">
                                                <div class="flex-grow-1">
                                                    <span class="text-muted text-uppercase fs-12 fw-bold">Đã hoàn thành</span>
                                                    <h3 class="mb-0">$2100</h3>
                                                </div>
                                                <div class="align-self-center flex-shrink-0">
                                                    <div id="today-revenue-chart" class="apex-charts"></div>
                                                    <span class="text-success fw-bold fs-13">
                                                        <i class='uil uil-arrow-up'></i> 10.21%
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{--Block 4--}}
                                <div class="col-md-12 col-xl-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="d-flex">
                                                <div class="flex-grow-1">
                                                    <span class="text-muted text-uppercase fs-12 fw-bold">Tổng thời lượng</span>
                                                    <h3 class="mb-0">$2100</h3>
                                                </div>
                                                <div class="align-self-center flex-shrink-0">
                                                    <div id="today-revenue-chart" class="apex-charts"></div>
                                                    <span class="text-success fw-bold fs-13">
                                                        <i class='uil uil-arrow-up'></i> 10.21%
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
{{--                            <!-- stat 1 -->--}}
{{--                            <div class="d-flex p-3 border-bottom">--}}
{{--                                <div class="flex-grow-1">--}}
{{--                                    <h4 class="mt-0 mb-1 fs-22">{{ $totalTask }}</h4>--}}
{{--                                    <span class="text-muted">Tổng số nhiệm vụ</span>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <!-- stat 2 -->--}}
{{--                            <div class="d-flex p-3 border-bottom">--}}
{{--                                <div class="flex-grow-1">--}}
{{--                                    <h4 class="mt-0 mb-1 fs-22">{{ $totalTaskInprogress }}</h4>--}}
{{--                                    <span class="text-muted">Tổng số nhiệm vụ đang làm</span>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <!-- stat 3 -->--}}
{{--                            <div class="d-flex p-3 border-bottom">--}}
{{--                                <div class="flex-grow-1">--}}
{{--                                    <h4 class="mt-0 mb-1 fs-22">{{ $totalTaskDone }}</h4>--}}
{{--                                    <span class="text-muted"> Tổng số nhiệm vụ hoàn thành </span>--}}
{{--                                </div>--}}
{{--                            </div>--}}
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
