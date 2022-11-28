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
                                        <span class="text-muted text-uppercase fs-12 fw-bold">Tổng số yêu cầu</span>
                                        <h3 class="mb-0">{{ $totalTask }}</h3>
                                    </div>
                                    <div class="align-self-center flex-shrink-0">
                                        <div id="today-task-chart" class="apex-charts"></div>
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
                                    <h5 class="card-title mb-0 header-title">Tổng số task</h5>

                                    <div id="total-task-chart" class="apex-charts mt-3" dir="ltr"
                                         style="min-height: 329px;"></div>
                                </div> <!-- end card -->
                            </div><!-- end col-->
                        </div>
                    </div>
                    @if(Auth::user()->hasRole('super admin'))
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
                                        <h4 class="header-title mt-0 mb-3">Thống kê số lượng task hoàn thành theo phòng
                                            ban</h4>

                                        <div id="done-task-by-department" class="apex-charts" dir="ltr"></div>
                                    </div> <!-- end card-body -->
                                </div> <!-- end card-->
                            </div>
                            <div class="col-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title mt-0 mb-3">Thống kê thời lượng task theo từng phòng
                                            ban</h4>

                                        <div id="department-task-length" class="apex-charts" dir="ltr"></div>
                                    </div> <!-- end card-body -->
                                </div> <!-- end card-->
                            </div>
                            <div class="col-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title mt-0 mb-3">Thống kê thời lượng task hoàn thành theo
                                            phòng
                                            ban</h4>

                                        <div id="department-task-done-length" class="apex-charts" dir="ltr"></div>
                                    </div> <!-- end card-body -->
                                </div> <!-- end card-->
                            </div>
                        </div>
                    @endif
                </div> <!-- container -->
            @endif


        </div> <!-- content -->
        @endsection

        @push('custom-js')
            @if(Auth::user()->hasRole('super admin'))

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
                    function display(a) {
                        var hours = Math.trunc(a / 60);
                        var minutes = a % 60;

                        if (hours == 0) {
                            return minutes + " phút"
                        }

                        return hours + " giờ " + minutes + " phút"
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
                    function display(a) {
                        var hours = Math.trunc(a / 60);
                        var minutes = a % 60;

                        if (hours == 0) {
                            return minutes + " phút"
                        }

                        return hours + " giờ " + minutes + " phút"
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
            @endif
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

                updateUserRanking();
            </script>
    @endpush

