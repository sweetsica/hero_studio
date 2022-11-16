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
                            <div class="col-2 d-flex">
                                <select name="year" id="yearpicker" class="form-select">

                                </select>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <h6>Danh sách task</h6>

                                    <table class="table table-centered mb-0">
                                        <thead>
                                        <tr>
                                            <th>Ngày tạo</th>
                                            <th>Tên yêu cầu</th>
                                            <th>Phòng ban phụ trách</th>
                                            <th>Thời hạn</th>
                                            <th>Đánh giá</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($member->tasks as $task)
                                            <tr>
                                                <td>{{ \Illuminate\Support\Carbon::parse($task->created_at)->format('d/m - h:i')}}</td>
                                                <td>{{ $task->name }}</td>
                                                <td>{{ isset($task->department) ? $task->department->name : ''}}</td>
                                                <td>{{ \Illuminate\Support\Carbon::parse($task->deadline)->format('d/m - h:i')}}</td>
                                                <td>Đánh giá</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>

                                    <div style="bottom: 0;position: absolute;">
                                        {{ $member->tasks->links('vendor.pagination.bootstrap-4') }}
                                    </div>
                                </div>
                                <div class="col-6">
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
    </script>
@endsection