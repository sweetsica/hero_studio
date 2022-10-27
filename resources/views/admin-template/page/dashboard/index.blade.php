@extends('admin-template.main.master')

@section('content-page')
    <div class="content">
        <!-- Start Content-->
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <h4 class="page-title">Dashboard</h4>
                        <div class="page-title-right">
                            <form class="float-sm-end mt-3 mt-sm-0">
                                <div class="row g-2">
                                    <div class="col-md-auto">
                                        <div class="mb-1 mb-sm-0">

                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <a href="?start_date={{\Carbon\Carbon::now()->format('Y-m-d')}}&end_date={{\Carbon\Carbon::now()->addDays(1)->format('Y-m-d')}}">
                                Hôm nay </a>
                            |
                            <a href="?start_date={{\Carbon\Carbon::now()->addDays(-6)->format('Y-m-d')}}&end_date={{\Carbon\Carbon::now()->format('Y-m-d')}}">
                                7 ngày trước </a>
                            |
                            <a href="?start_date={{\Carbon\Carbon::now()->addDays(-30)->format('Y-m-d')}}&end_date={{\Carbon\Carbon::now()->format('Y-m-d')}}">
                                30 ngày trước </a>
                            <form action="">
                                @csrf
                                <div class="col-6 row mt-2">
                                    <div class="col-5">
                                        <input name="start_date" type="date" class="form-control"
                                               style="min-width: 210px;" value="{{$startDate}}"/>
                                    </div>
                                    <div class="col-5">
                                        <input name="end_date" type="date" class="form-control"
                                               style="min-width: 210px;" value="{{$endDate}}"/>
                                    </div>
                                    <div class="col-2">
                                        <button class="btn btn-info">
                                            Lọc
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            @if (Auth::user()->hasRole('editor') || Auth::user()->hasRole('key opinion leaders'))
                <div class="row">
                    <div class="col-md-6 col-xl-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="flex-grow-1">
                                        <span class="text-muted text-uppercase fs-12 fw-bold">Tổng số task</span>
                                        <h3 class="mb-0">{{ $totalTask }}</h3>
                                    </div>
                                    <div class="align-self-center flex-shrink-0">
                                        <div id="today-revenue-chart" class="apex-charts"></div>
                                        <span class="text-success fw-bold fs-13">
{{--                                                    <i class='uil uil-arrow-up'></i> 10.21%--}}
                                                </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-xl-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="flex-grow-1">
                                        <span
                                            class="text-muted text-uppercase fs-12 fw-bold">Tổng task hoàn thành</span>
                                        <h3 class="mb-0"> {{ $totalDoneTask }}</h3>
                                    </div>
                                    <div class="align-self-center flex-shrink-0">
                                        <div id="today-product-sold-chart" class="apex-charts"></div>
                                        <span class="text-success fw-bold fs-13">
{{--                                                    <i class='uil uil-arrow-down'></i> 5.05%--}}
                                                </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-xl-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="flex-grow-1">
                                        <span class="text-muted text-uppercase fs-12 fw-bold">Tổng task làm lại</span>
                                        <h3 class="mb-0"> {{ $totalRedoTask }}</h3>
                                    </div>
                                    <div class="align-self-center flex-shrink-0">
                                        <div id="today-new-customer-chart" class="apex-charts"></div>
                                        <span class="text-danger fw-bold fs-13">
{{--                                                    <i class='uil uil-arrow-up'></i> 25.16%--}}
                                                </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-xl-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="flex-grow-1">
                                        <span
                                            class="text-muted text-uppercase fs-12 fw-bold"> Tổng độ dài của các task</span>
                                        <h3 class="mb-0">{{ $totalTaskLength }}</h3>
                                    </div>
                                    <div class="align-self-center flex-shrink-0">
                                        <div id="today-new-visitors-chart" class="apex-charts"></div>
                                        <span class="text-success fw-bold fs-13">
{{--                                                    <i class='uil uil-arrow-down'></i> 5.05%--}}
                                                </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <div class="row">
                    <div class="col-md-6 ">
                        <div class="card">
                            <div class="card-body">
                                {{--                                <a href="" class="p-0 float-end">Ngày\Tuần\Tháng<i class="uil uil-export ms-1"></i></a>--}}
                                <h4 class="card-title header-title">Theo cá nhân</h4>
                                <div class="table-responsive table-nowrap mt-3">
                                    <table class="table table-sm table-centered mb-0 fs-13">
                                        <thead class="table-light">
                                        <tr>
                                            <th>Tên nhân viên</th>
                                            <th style="width: 30%;">Số đầu việc</th>
                                            <th style="width: 30%;">Số đầu việc hoàn thành</th>
                                            <th style="width: 30%;">Số đầu việc làm lại</th>
                                            <th style="width: 30%;">Tổng thời lượng</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($data['groupTaskByMember'] as $item)
                                            <tr>
                                                <td>{{ $item['name'] }}</td>
                                                <td>{{ $item['number_of_tasks'] }}</td>
                                                <td>{{ $item['number_of_done_tasks'] }}</td>
                                                <td>{{ $item['number_of_redo_tasks'] }}</td>
                                                <td>{{ $item['total_product_length'] }}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div> <!--end card body-->
                        </div> <!--end card-->
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
{{--                                <a href="" class="p-0 float-end">Export <i class="uil uil-export ms-1"></i></a>--}}
                                <h4 class="card-title header-title">Theo phòng ban</h4>
                                <div class="table-responsive table-nowrap mt-3">
                                    <table class="table table-sm table-centered mb-0 fs-13">
                                        <thead class="table-light">
                                        <tr>
                                            <th>Tên nhân viên</th>
                                            <th style="width: 30%;">Số đầu việc</th>
                                            <th style="width: 30%;">Số đầu việc hoàn thành</th>
                                            <th style="width: 30%;">Số đầu việc làm lại</th>
                                            <th style="width: 30%;">Tổng thời lượng</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($data['groupTaskByDepartment'] as $item)
                                            <tr>
                                                <td>{{ $item['name'] }}</td>
                                                <td>{{ $item['number_of_tasks'] }}</td>
                                                <td>{{ $item['number_of_done_tasks'] }}</td>
                                                <td>{{ $item['number_of_redo_tasks'] }}</td>
                                                <td>{{ $item['total_product_length'] }}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div> <!--end card body-->
                        </div> <!--end card-->
                    </div>
                </div>
            @endif

        </div> <!-- container -->

    </div> <!-- content -->
@endsection



