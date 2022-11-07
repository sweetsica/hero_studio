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

            <div class="row">
                <div class="col-md-5">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <h4 class="card-title header-title">Xếp hạng thành viên</h4>
                                <h4 class="card-title header-title">Số sao trung bình</h4>
                            </div>
                            <div class="my-2 ">
                                @foreach($highestProductRankingMember as $member)
                                    <div class="d-flex border-top pt-2">
                                        <div class="col-9">
                                            <div class="flex-grow-1">
                                                <h5>{{ $member->name }}</h5>
                                            </div>
                                            <div class="row">
                                                <h6>Tổng số nhiệm vụ :
                                                    <span>{{ $member->last_month_tasks_count }}</span></h6>
                                            </div>
                                            <div class="row">
                                                <h6>Tổng số nhiệm vụ hoàn thành :
                                                    <span>{{ $member->last_month_done_tasks_count }}</span></h6>
                                            </div>
                                        </div>
                                        <div class="col-3 text-end">
                                            <span>{{ $member->last_month_tasks_sum_product_rate ? $member->last_month_tasks_sum_product_rate : 0 }}</span></h6>
                                            <i style="color: orange" class="bi  bi-star-fill "></i>
                                        </div>
                                    </div>
                                @endforeach
                                (Đây sẽ hiển thị tổng sao của tổng task mỗi thành viên)
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title mt-0 mb-1">Danh sách task</h4>
                                <p class="sub-header">
                                </p>
                                <table id="basic-datatable" class="table dt-responsive nowrap w-100">
                                    <thead>
                                    <tr>
                                        <th width="85px">Ngày tạo</th>
                                        <th width="104px">Tên yêu cầu</th>
                                        <th width="158px">Nhân viên phụ trách</th>
                                        <th width="19%">Phòng ban phụ trách</th>
                                        <th width="10%">Thời hạn</th>
                                        <th width="15%">Đánh giá</th>
                                        {{--                                        <th>Mô tả</th>--}}
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($tasks as $task)
                                        <tr>
                                            <td>{{ $task->created_at->format('d/m - h:i') }}</td>
                                            <td><a href="{{route('edit.taskOrder',$task->id)}}">{{ $task->name }}</a>
                                            </td>
                                            <td>{{ $task->member?->name }}</td>
                                            <td>{{ $task->department->name }}</td>
                                            <td>{{ \Illuminate\Support\Carbon::parse($task->deadline)->format('d/m - h:i')}}</td>
                                            <td>
                                                @for($i = 0; $i < 5; $i++)
                                                    <i style="color: orange"
                                                       class="bi @if($i < $task->product_rate && intval($task->product_rate) == $i) bi-star-fill @elseif($i < $task->product_rate) bi-star-fill @else bi-star @endif"
                                                    ></i>
                                                @endfor
                                            </td>
                                            {{--                                            <td>{{ $task->content }}</td>--}}
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>

                            </div> <!-- end card body-->
                        </div> <!-- end card -->
                    </div><!-- end col-->
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title mt-0 mb-3">Thống kê số lượng task theo phòng ban</h4>

                            <div id="task-by-department" class="apex-charts" dir="ltr"></div>
                        </div> <!-- end card-body -->
                    </div> <!-- end card-->
                </div>
                <div class="col-6">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title mt-0 mb-3">Thống kê số lượng task hoàn thành theo phòng ban</h4>

                            <div id="done-task-by-department" class="apex-charts" dir="ltr"></div>
                        </div> <!-- end card-body -->
                    </div> <!-- end card-->
                </div>
                <div class="col-6">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title mt-0 mb-3">Thống kê thời lượng task theo từng phòng ban</h4>

                            <div id="department-task-length" class="apex-charts" dir="ltr"></div>
                        </div> <!-- end card-body -->
                    </div> <!-- end card-->
                </div>
                <div class="col-6">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title mt-0 mb-3">Thống kê thời lượng task hoàn thành theo phòng ban</h4>

                            <div id="department-task-done-length" class="apex-charts" dir="ltr"></div>
                        </div> <!-- end card-body -->
                    </div> <!-- end card-->
                </div>
            </div>
        </div> <!-- container -->

    </div> <!-- content -->
@endsection

@push('custom-js')
    <script>
        var options = {
            chart: {
                height: 380,
                type: 'bar',
                toolbar: {
                    show: false
                }
            },
            plotOptions: {
                bar: {
                    horizontal: false,
                    endingShape: 'rounded',
                    columnWidth: '55%',
                },
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                show: true,
                width: 2,
                colors: ['transparent']
            },
            series: [
                    @foreach($departmentTasks as $departmentTask)
                {
                    name: "{{$departmentTask['department_name']}}",
                    data: @json($departmentTask['tasks'])
                },
                @endforeach
            ],
            xaxis: {
                categories: @json($arrayDate),
            },
            yaxis: {
                title: {
                    text: 'tasks'
                }
            },
            legend: {
                offsetY: 7,
            },
            grid: {
                row: {
                    colors: ['transparent', 'transparent'], // takes an array which will be repeated on columns
                    opacity: 0.2
                },
                borderColor: '#f1f3fa'
            },
            tooltip: {
                y: {
                    formatter: function (val) {
                        return val + " tasks"
                    }
                }
            }
        }

        var chart = new ApexCharts(
            document.querySelector("#task-by-department"),
            options
        );

        chart.render();
    </script>
    <script>
        var options = {
            chart: {
                height: 380,
                type: 'bar',
                toolbar: {
                    show: false
                }
            },
            plotOptions: {
                bar: {
                    horizontal: false,
                    endingShape: 'rounded',
                    columnWidth: '55%',
                },
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                show: true,
                width: 2,
                colors: ['transparent']
            },
            series: [
                    @foreach($departmentDoneTasks as $departmentTask)
                {
                    name: "{{$departmentTask['department_name']}}",
                    data: @json($departmentTask['tasks'])
                },
                @endforeach
            ],
            xaxis: {
                categories: @json($arrayDate),
            },
            yaxis: {
                title: {
                    text: 'tasks'
                }
            },
            legend: {
                offsetY: 7,
            },
            grid: {
                row: {
                    colors: ['transparent', 'transparent'], // takes an array which will be repeated on columns
                    opacity: 0.2
                },
                borderColor: '#f1f3fa'
            },
            tooltip: {
                y: {
                    formatter: function (val) {
                        return val + " tasks"
                    }
                }
            }
        }

        var chart = new ApexCharts(
            document.querySelector("#done-task-by-department"),
            options
        );

        chart.render();
    </script>
    <script>
        function display(a){
            var hours = Math.trunc(a/60);
            var minutes = a % 60;

            if (hours == 0) {
                return  minutes + " phút"
            }

            return hours +" giờ "+ minutes + " phút"
        }

        var options = {
            chart: {
                height: 380,
                type: 'bar',
                toolbar: {
                    show: false
                }
            },
            plotOptions: {
                bar: {
                    horizontal: false,
                    endingShape: 'rounded',
                    columnWidth: '55%',
                },
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                show: true,
                width: 2,
                colors: ['transparent']
            },
            series: [
                    @foreach($departmentTaskLength as $departmentTask)
                {
                    name: "{{$departmentTask['department_name']}}",
                    data: @json($departmentTask['tasks'])
                },
                @endforeach
            ],
            xaxis: {
                categories: @json($arrayDate),
            },
            yaxis: {
                title: {
                    text: 'Thời gian'
                }
            },
            legend: {
                offsetY: 7,
            },
            grid: {
                row: {
                    colors: ['transparent', 'transparent'], // takes an array which will be repeated on columns
                    opacity: 0.2
                },
                borderColor: '#f1f3fa'
            },
            tooltip: {
                y: {
                    formatter: function (val) {
                        return display(val);
                    }
                }
            }
        }

        var chart = new ApexCharts(
            document.querySelector("#department-task-length"),
            options
        );

        chart.render();
    </script>
    <script>
        function display(a){
            var hours = Math.trunc(a/60);
            var minutes = a % 60;

            if (hours == 0) {
                return  minutes + " phút"
            }

            return hours +" giờ "+ minutes + " phút"
        }

        var options = {
            chart: {
                height: 380,
                type: 'bar',
                toolbar: {
                    show: false
                }
            },
            plotOptions: {
                bar: {
                    horizontal: false,
                    endingShape: 'rounded',
                    columnWidth: '55%',
                },
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                show: true,
                width: 2,
                colors: ['transparent']
            },
            series: [
                    @foreach($departmentTaskDoneLength as $departmentTask)
                {
                    name: "{{$departmentTask['department_name']}}",
                    data: @json($departmentTask['tasks'])
                },
                @endforeach
            ],
            xaxis: {
                categories: @json($arrayDate),
            },
            yaxis: {
                title: {
                    text: 'Thời gian'
                }
            },
            legend: {
                offsetY: 7,
            },
            grid: {
                row: {
                    colors: ['transparent', 'transparent'], // takes an array which will be repeated on columns
                    opacity: 0.2
                },
                borderColor: '#f1f3fa'
            },
            tooltip: {
                y: {
                    formatter: function (val) {
                        return display(val);
                    }
                }
            }
        }

        var chart = new ApexCharts(
            document.querySelector("#department-task-done-length"),
            options
        );

        chart.render();
    </script>
@endpush

