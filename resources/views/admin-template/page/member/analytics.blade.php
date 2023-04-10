@extends('admin-template.main.master')

@section('content-page')
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <h4 class="page-title">CHI TIẾT THÀNH VIÊN</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Thành viên</a></li>
                                <li class="breadcrumb-item active">Chi tiết</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->
            <div class="row">
                @if($errors->any())
                    @foreach($errors->all() as $error)
                        <div class="col-12">
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{ $error }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title mt-0 mb-1">{{ $member->name }}</h4>
                            <div class="d-flex">
                                <div class="d-flex">
                                    <select name="year" id="yearpicker" class="form-select"></select>
                                </div>
                                <div class="d-flex">
                                    <select name="month" id="monthpicker" class="form-select mx-2">
                                        <option value="">Cả năm</option>
                                        @for($i = 1; $i < 13; $i++)
                                            <option value="{{$i}}" @if($selectedMonth == $i) selected @endif>
                                                Tháng {{$i}}</option>
                                        @endfor
                                    </select>
                                </div>
                                <div class="d-flex">
                                    <select name="department" id="departmentSelect" class="form-select mx-2"
                                            style="width: unset">
                                        <option value="">Tất cả phòng ban</option>
                                        @foreach($departments as $department)
                                            <option value="{{$department->id}}"
                                                    @if($selectedDepartment == $department->id) selected @endif>{{$department->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="d-flex">
                                    <select class="form-select mx-2" name="type" id="typeSelect" required>
                                        <option value="">Tất cả các loại</option>
                                        <option @if($selectedType == 'Normal') selected @endif value="Normal">Thường
                                        </option>
                                        <option @if($selectedType == 'Sponsor') selected @endif value="Sponsor">Được tài
                                            trợ
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <h6>Danh sách task</h6>
                                    <style>
                                        .data-row:nth-child(even) {
                                            display: none;
                                        }

                                        .data-row:nth-child(odd):hover {
                                            background-color: green;
                                            color: white;
                                        }

                                        .data-row:nth-child(odd):hover + .data-row {
                                            display: table-row;
                                        }
                                    </style>
                                    <table class="table table-centered" style="margin-bottom: 56px">
                                        <thead>
                                        <tr>
                                            <th>Ngày/Giờ tạo</th>
                                            <th>Tên yêu cầu</th>
                                            <th>Phòng ban phụ trách</th>
                                            <th>Thời hạn</th>
                                            <th>Đánh giá</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($member->tasks as $task)
                                            <tr class="data-row">
                                                <td style="width: 20%">{{ \Illuminate\Support\Carbon::parse($task->created_at)->format('d/m - h:i')}}</td>
                                                <td style="width: 20%">
                                                    <a href="{{route('edit.taskOrder', $task->id)}}">{{ $task->name }}</a>
                                                </td>
                                                <td style="width: 20%">{{ isset($task->department) ? $task->department->name : ''}}</td>
                                                <td style="width: 20%">{{ $task->deadline ? \Illuminate\Support\Carbon::parse($task->deadline)->format('d/m - h:i') : ''}}</td>
                                                <td style="width: 20%">{{ $task->product_rate }} @if($task->product_rate)
                                                        <i
                                                            style="color: orange" class="bi bi-star-fill"></i> @endif
                                                </td>
                                            </tr>
                                            <tr class="data-row">
                                                <td colspan="5">
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <strong>Người yêu cầu</strong> : {{ $task->creator->name }}
                                                            <br>
                                                            <strong>Người nhận</strong> : {{ $task->member->name }} <br>
                                                            <strong>Trạng thái</strong> : {{ $task->status_code_text  }}
                                                            <br>
                                                            <strong>Nguồn</strong> : {{ $task->source }} <br>
                                                        </div>
                                                        <div class="col-6">
                                                            <strong>Thể loại</strong> : {{ $task->type }}
                                                            <br>
                                                            <strong>Thời lượng</strong>
                                                            : {{ $task->product_length ? "$task->product_length phút " : "" }}
                                                            <br>
                                                            <strong>Ngày tạo</strong>
                                                            : {{ \Illuminate\Support\Carbon::parse($task->created_at)->format('d/m/Y') }}
                                                            <br>
                                                            <strong>Hạn
                                                                chót</strong>: {{ \Illuminate\Support\Carbon::parse($task->deadline)->format('d/m/Y') }}
                                                            <br>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>

                                    <div>
                                        {{ $member->tasks->withQueryString()->links('vendor.pagination.bootstrap-4') }}
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="d-flex">
                                                        <div class="flex-grow-1">
                                                            <span class="text-muted text-uppercase fs-12 fw-bold">Tổng số yêu cầu</span>
                                                            <h3 class="mb-0"> {{ $member->tasks->total() }}</h3>
                                                        </div>
                                                        <div class="align-self-center flex-shrink-0">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                 height="24" viewBox="0 0 24 24" fill="none"
                                                                 stroke="currentColor" stroke-width="2"
                                                                 stroke-linecap="round" stroke-linejoin="round"
                                                                 class="feather feather-file-text icon-lg icon-dual-info">
                                                                <path
                                                                    d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                                                                <polyline points="14 2 14 8 20 8"></polyline>
                                                                <line x1="16" y1="13" x2="8" y2="13"></line>
                                                                <line x1="16" y1="17" x2="8" y2="17"></line>
                                                                <polyline points="10 9 9 9 8 9"></polyline>
                                                            </svg>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="d-flex">
                                                        <div class="flex-grow-1">
                                                            <span class="text-muted text-uppercase fs-12 fw-bold">Trung bình yêu cầu (@if(count($taskByMonth['date']) > 12) Ngày @else Tháng @endif)</span>
                                                            @php $avg = $member->tasks->total() / count($taskByMonth['date']) @endphp
                                                            <h3 class="mb-0"> {{ number_format((float)$avg, 2, '.', '')  }}</h3>
                                                        </div>
                                                        <div class="align-self-center flex-shrink-0">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                 height="24" viewBox="0 0 24 24" fill="none"
                                                                 stroke="currentColor" stroke-width="2"
                                                                 stroke-linecap="round" stroke-linejoin="round"
                                                                 class="feather feather-file-text icon-lg icon-dual-info">
                                                                <path
                                                                    d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                                                                <polyline points="14 2 14 8 20 8"></polyline>
                                                                <line x1="16" y1="13" x2="8" y2="13"></line>
                                                                <line x1="16" y1="17" x2="8" y2="17"></line>
                                                                <polyline points="10 9 9 9 8 9"></polyline>
                                                            </svg>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {{--                                        <div class="col-4">--}}
                                        {{--                                            <div class="card">--}}
                                        {{--                                                <div class="card-body">--}}
                                        {{--                                                    <div>--}}
                                        {{--                                                    <span--}}
                                        {{--                                                        class="text-muted text-uppercase fs-12 fw-bold">Today Revenue</span>--}}
                                        {{--                                                        <h3>$6512</h3>--}}
                                        {{--                                                        <div class="progress my-2" style="height: 5px;">--}}
                                        {{--                                                            <div class="progress-bar bg-primary" role="progressbar"--}}
                                        {{--                                                                 style="width: 32%" aria-valuenow="32" aria-valuemin="0"--}}
                                        {{--                                                                 aria-valuemax="100"></div>--}}
                                        {{--                                                        </div>--}}
                                        {{--                                                        <span class="text-muted fw-semibold">36% Avg</span>--}}
                                        {{--                                                    </div>--}}
                                        {{--                                                </div>--}}
                                        {{--                                            </div>--}}
                                        {{--                                        </div>--}}
                                        {{--                                        <div class="col-4">--}}
                                        {{--                                            <div class="card">--}}
                                        {{--                                                <div class="card-body">--}}
                                        {{--                                                    <div>--}}
                                        {{--                                                    <span--}}
                                        {{--                                                        class="text-muted text-uppercase fs-12 fw-bold">Today Revenue</span>--}}
                                        {{--                                                        <h3>$6512</h3>--}}
                                        {{--                                                        <div class="progress my-2" style="height: 5px;">--}}
                                        {{--                                                            <div class="progress-bar bg-primary" role="progressbar"--}}
                                        {{--                                                                 style="width: 32%" aria-valuenow="32" aria-valuemin="0"--}}
                                        {{--                                                                 aria-valuemax="100"></div>--}}
                                        {{--                                                        </div>--}}
                                        {{--                                                        <span class="text-muted fw-semibold">36% Avg</span>--}}
                                        {{--                                                    </div>--}}
                                        {{--                                                </div>--}}
                                        {{--                                            </div>--}}
                                        {{--                                        </div>--}}
                                    </div>
                                    <div id="apex-line-2"></div>
                                </div>
                            </div>
                        </div> <!-- end card body-->
                    </div> <!-- end card -->
                </div><!-- end col-->
            </div>
        </div> <!-- content -->

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

@push('custom-css')
    <link href="{{asset('admin-asset/assets/libs/select2/css/select2.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('admin-asset/assets/libs/multiselect/css/multi-select.css')}}" rel="stylesheet"
          type="text/css"/>
    <link href="{{asset('admin-asset/assets/libs/flatpickr/flatpickr.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('admin-asset/assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css')}}"
          rel="stylesheet" type="text/css"/>
    <link href="{{asset('admin-asset/assets/libs/spectrum-colorpicker2/spectrum.min.css')}}" rel="stylesheet">
@endpush

@section('content-js')
    <script src="{{ asset('admin-asset/assets/js/vendor.min.js') }}"></script>
    <!-- optional plugins -->
    <script src="{{ asset('admin-asset/assets/libs/moment/min/moment.min.js') }}"></script>
    <script src="{{ asset('admin-asset/assets/libs/flatpickr/flatpickr.min.js') }}"></script>

    <!-- App js -->
    <script src="{{ asset('admin-asset/assets/js/app.min.js') }}"></script>

    <script src="{{ asset('admin-asset/assets/libs/select2/js/select2.min.js') }}"></script>
    <script src="{{ asset('admin-asset/assets/libs/multiselect/js/jquery.multi-select.js') }}"></script>
    <script src="{{ asset('admin-asset/assets/libs/spectrum-colorpicker2/spectrum.min.js') }}"></script>
    <script src="{{ asset('admin-asset/assets/js/pages/form-advanced.init.js') }}"></script>
    <script src="{{ asset('admin-asset/assets/libs/apexcharts/apexcharts.min.js') }}"></script>



    <!-- Data table neccessary -->
    {{--    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.bootstrap4.min.css">--}}

    {{--    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>--}}
    {{--    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>--}}
    {{--    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>--}}
    {{--    <script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>--}}
    {{--    <script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>--}}
    {{--    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.bootstrap4.min.js"></script>--}}
    {{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>--}}
    {{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>--}}
    {{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>--}}
    {{--    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>--}}
    {{--    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>--}}
    {{--    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.colVis.min.js"></script>--}}

    {{--    <script>--}}
    {{--        $(document).ready(function () {--}}
    {{--            const table = $('#basic-datatable').DataTable({--}}
    {{--                scrollCollapse: true,--}}
    {{--                paging: true,--}}
    {{--                dom: 'Bfrtip',--}}
    {{--                buttons: [--}}
    {{--                    'excel', 'pdf', 'print', 'colvis'--}}
    {{--                ],--}}
    {{--                fixedColumns: {--}}
    {{--                    left: 2--}}
    {{--                }--}}
    {{--            });--}}
    {{--            table.buttons().container()--}}
    {{--                .appendTo('#basic-datatable .col-md-6:eq(0)');--}}

    {{--            // them class vào các btn của datatable cho giống theme--}}
    {{--            $('.dt-buttons').children().addClass('btn btn-secondary')--}}
    {{--        })--}}
    {{--    </script>--}}
    <script>
        var options = {
            chart: {
                height: 380,
                type: 'line',
                shadow: {
                    enabled: false,
                    color: '#bbb',
                    top: 3,
                    left: 2,
                    blur: 3,
                    opacity: 1
                },
            },
            stroke: {
                width: 5,
                curve: 'smooth'
            },
            series: [{
                name: 'Tasks',
                data: @json($taskByMonth['value'])
            }],
            xaxis: {
                type: 'month',
                categories: @json($taskByMonth['date']),
            },
            title: {
                align: 'left',
                style: {
                    fontSize: "14px",
                    color: '#666'
                }
            },
            fill: {
                type: 'gradient',
                gradient: {
                    shade: 'dark',
                    gradientToColors: ['#43d39e'],
                    shadeIntensity: 1,
                    type: 'vertical',
                    opacityFrom: 1,
                    opacityTo: 1,
                    stops: [0, 100, 100, 100]
                },
            },
            markers: {
                size: 4,
                opacity: 0.9,
                colors: ["#50a5f1"],
                strokeColor: "#fff",
                strokeWidth: 2,
                style: 'inverted', // full, hollow, inverted
                hover: {
                    size: 7,
                }
            },
            yaxis: {
                title: {
                    text: 'Tasks',
                },
            },
            grid: {
                row: {
                    colors: ['transparent', 'transparent'], // takes an array which will be repeated on columns
                    opacity: 0.2
                },
                borderColor: '#185a9d'
            },
            responsive: [{
                breakpoint: 600,
                options: {
                    chart: {
                        toolbar: {
                            show: false
                        }
                    },
                    legend: {
                        show: false
                    },
                }
            }]
        }

        var chart = new ApexCharts(
            document.querySelector("#apex-line-2"),
            options
        );

        chart.render();
    </script>
    <script>
        const startYear = 1800;
        const selectedYear = {{$selectedYear}};

        var searchParams = new URLSearchParams(window.location.search);

        function isSelected(val) {
            return selectedYear === val ? 'selected' : ''
        }

        for (i = new Date().getFullYear(); i > startYear; i--) {
            $('#yearpicker').append($(`<option ${isSelected(i)}/>`).val(i).html(i));
        }

        $('#yearpicker').on('change', function () {
            searchParams.set("year", this.value);
            window.location.search = searchParams.toString();
        })

        $('#monthpicker').on('change', function () {
            searchParams.set("month", this.value);
            window.location.search = searchParams.toString();
        })

        $('#departmentSelect').on('change', function () {
            searchParams.set("department", this.value);
            window.location.search = searchParams.toString();
        })


        $('#typeSelect').on('change', function () {
            searchParams.set("type", this.value);
            window.location.search = searchParams.toString();
        })
    </script>
@endsection
