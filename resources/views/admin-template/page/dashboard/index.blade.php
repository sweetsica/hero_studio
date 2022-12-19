@extends('admin-template.main.master')

@section('content-page')
    <style>
        .tab-pane.active {
            min-height: 380px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
    </style>
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
                                <div class="col-12 col-lg-auto row mt-2">
                                    <div class="col-12 col-sm-6 col-lg-5 mb-2">
                                        <input name="start_date" type="date" class="form-control"
                                               style="min-width: 210px;" value="{{$startDate}}"/>
                                    </div>
                                    <div class="col-12 col-sm-6 col-lg-5 mb-2">
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
                                        <span class="text-muted text-uppercase fs-12 fw-bold">Tổng số yêu cầu</span>
                                        <h3 class="mb-0">{{ $totalTask }}</h3>
                                    </div>
                                    <div class="align-self-center flex-shrink-0">
                                        <div id="today-task-chart" class="apex-charts"></div>
                                        <span class="text-success fw-bold fs-13">
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

                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body" style="padding-inline: unset">
                                <div class="d-flex justify-content-between" style="padding-inline: 1.25rem">
                                    <h4 class="card-title header-title">Xếp hạng thành viên</h4>
                                    <select id="ranking-selection" style="width: fit-content" class="form-select"
                                            onchange="updateUserRanking()">
                                        <option value="last_month_tasks_avg_product_rate">Số sao trung bình</option>
                                        <option value="last_month_tasks_count">Tổng số task</option>
                                        <option value="last_month_tasks_total_length">Thời gian</option>
                                    </select>
                                </div>
                                <div id="ranking-content" class="my-2" style="height: 300px; overflow-y: auto">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body" style="position: relative;">
                                    <div class="d-flex justify-content-between">
                                        <div>
                                            <h4 class="card-title header-title">Thống kê phòng</h4>
                                            <select id="department-selection" style="width: fit-content"
                                                    class="form-select"
                                                    onchange="updateDepartmentInformation()">
                                                @foreach($departments as $department)
                                                    <option value="{{$department->id}}"> {{$department->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <ul class="nav nav-pills navtab-bg p-1" style="height: fit-content">
                                            <li class="nav-item">
                                                <a href="#stars" onclick="updateInput('stars')" data-bs-toggle="tab"
                                                   aria-expanded="true"
                                                   class="nav-link active">
                                                    Số sao
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#durations" onclick="updateInput('durations')"
                                                   data-bs-toggle="tab" aria-expanded="false"
                                                   class="nav-link">
                                                    Thời lượng
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#total" onclick="updateInput('total')" data-bs-toggle="tab"
                                                   aria-expanded="false"
                                                   class="nav-link">
                                                    Tổng số task
                                                </a>
                                            </li>
                                        </ul>
                                    </div>

                                    <div class="tab-content text-muted">
                                        <div class="tab-pane show active" id="stars"></div>
                                        <div class="tab-pane" id="durations"></div>
                                        <div class="tab-pane" id="total"></div>
                                    </div>
                                </div> <!-- end card -->
                            </div><!-- end col-->
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body" style="padding-inline: unset">
                                <div class="d-flex justify-content-between" style="padding-inline: 1.25rem">
                                    <h4 class="card-title header-title">Yêu cầu được tạo gần đây</h4>
                                    <select id="department-daily-selection" style="width: fit-content"
                                            class="form-select"
                                            onchange="getDailyTask()">
                                        @foreach($departments as $department)
                                            <option value="{{$department->id}}"> {{$department->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div id="daily-task" class="my-2 mx-2 text-center"
                                     style="min-height: 330px;display: flex;align-items: center;place-content: center;">
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- container -->
            @endif


        </div> <!-- content -->
        @endsection

        @push('custom-js')
            <script>
                const dummyOptions = {
                    "chart": {
                        "height": 329,
                        "type": "area"
                    },
                    "dataLabels": {
                        "enabled": false
                    },
                    "stroke": {
                        "curve": "smooth",
                        "width": 4
                    },
                    "series": [
                        {
                            "name": "Yêu cầu",
                            "data": @json($tasks['value'])
                        }
                    ],
                    "zoom": {
                        "enabled": false
                    },
                    "legend": {
                        "show": false
                    },
                    "colors": [
                        "#43d39e"
                    ],
                    "xaxis": {
                        "type": "string",
                        "categories": @json($tasks['format']),
                        "tooltip": {
                            "enabled": false
                        },
                        "axisBorder": {
                            "show": false
                        },
                        "labels": {},
                        "convertedCatToNumeric": true
                    },
                    "yaxis": [
                        {
                            "show": true,
                            "showAlways": false,
                            "showForNullSeries": true,
                            "opposite": false,
                            "reversed": false,
                            "logarithmic": false,
                            "forceNiceScale": false,
                            "floating": false,
                            "labels": {
                                "show": true,
                                "minWidth": 0,
                                "maxWidth": 160,
                                "offsetX": 0,
                                "offsetY": 0,
                                "rotate": 0,
                                "padding": 20,
                                "style": {
                                    "colors": [],
                                    "fontSize": "11px",
                                    "fontWeight": 400,
                                    "cssClass": ""
                                }
                            },
                            "axisBorder": {
                                "show": false,
                                "color": "#e0e0e0",
                                "width": 1,
                                "offsetX": 0,
                                "offsetY": 0
                            },
                            "axisTicks": {
                                "show": false,
                                "color": "#e0e0e0",
                                "width": 6,
                                "offsetX": 0,
                                "offsetY": 0
                            },
                            "title": {
                                "rotate": -90,
                                "offsetY": 0,
                                "offsetX": 0,
                                "style": {
                                    "fontSize": "11px",
                                    "fontWeight": 900,
                                    "cssClass": ""
                                }
                            },
                            "tooltip": {
                                "enabled": false,
                                "offsetX": 0
                            },
                            "crosshairs": {
                                "show": true,
                                "position": "front",
                                "stroke": {
                                    "color": "#b6b6b6",
                                    "width": 1,
                                    "dashArray": 0
                                }
                            }
                        }
                    ],
                    "fill": {
                        "type": "gradient",
                        "gradient": {
                            "type": "vertical",
                            "shadeIntensity": 1,
                            "inverseColors": false,
                            "opacityFrom": 0.45,
                            "opacityTo": 0.05,
                            "stops": [
                                45,
                                100
                            ]
                        }
                    },
                    "annotations": {
                        "yaxis": [],
                        "xaxis": [],
                        "points": []
                    }
                }

                var chart = new ApexCharts(
                    document.querySelector("#total-task-chart"),
                    dummyOptions
                );

                chart.render();
            </script>

            <script>
                function updateUserRanking() {
                    const input = $('#ranking-selection').val() ?? 'last_month_tasks_avg_product_rate'
                    $.get('{{route('get.user.ranking')}}', {type: input}).then(function (res) {
                        $('#ranking-content').html(res)
                    });
                }

                let inputValue = 'stars'

                function updateInput(val) {
                    inputValue = val
                    updateDepartmentInformation();
                }

                function updateDepartmentInformation() {
                    const input = $('#department-selection').val();
                    const type = inputValue;
                    $('.tab-pane').css('display', 'none');

                    const selectChart = $(`#${inputValue}`);

                    selectChart.css('display', 'flex')
                    selectChart.empty()
                    selectChart.append(`<div class="spinner-border" role="status">
  <span class="sr-only"></span>
</div>`);

                    $.get('{{route('department.information')}}', {department_id: input, type}).then(function (res) {
                        selectChart.css('display', 'block')
                        selectChart.empty()
                        selectChart.append(res)
                    });
                }

                updateDepartmentInformation()

                updateUserRanking();
            </script>

            <script>
                function getDailyTask() {
                    const departmentIdSelection = $('#department-daily-selection').val();
                    const dailyTaskChart = $(`#daily-task`);
                    dailyTaskChart.css('display', 'flex')
                    dailyTaskChart.empty()
                    dailyTaskChart.append(`<div class="spinner-border" role="status">
  <span class="sr-only"></span>
</div>`);
                    $.get('{{route('daily-task')}}', {department_id: departmentIdSelection}).then(function (res) {
                        dailyTaskChart.css('display', 'block')
                        dailyTaskChart.empty()
                        dailyTaskChart.append(res)
                    });
                }

                getDailyTask()
            </script>
    @endpush
