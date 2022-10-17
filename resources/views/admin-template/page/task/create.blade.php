@extends('admin-template.main.master')

@section('content-css')
    <meta charset="utf-8"/>
    <title>Hero Studio | Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description"/>
    <meta content="Coderthemes" name="author"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('admin-asset/assets/images/favicon.ico') }}"/>

    <!-- plugins -->
    <link href="{{ asset('admin-asset/assets/libs/flatpickr/flatpickr.min.css') }}" rel="stylesheet" type="text/css"/>

    <!-- App css -->
    <link href="{{ asset('admin-asset/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css"
          id="bs-default-stylesheet"/>
    <link href="{{ asset('admin-asset/assets/css/app.min.css') }}" rel="stylesheet" type="text/css"
          id="app-default-stylesheet"/>

    <link href="{{ asset('admin-asset/assets/css/bootstrap-dark.min.css') }}" rel="stylesheet" type="text/css"
          id="bs-dark-stylesheet" disabled/>
    <link href="{{ asset('admin-asset/assets/css/app-dark.min.css') }}" rel="stylesheet" type="text/css"
          id="app-dark-stylesheet" disabled/>

    <!-- icons -->
    <link href="{{ asset('admin-asset/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('admin-asset/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}"
          rel="stylesheet" type="text/css"/>
    <link href="{{ asset('custom/app.css') }}" rel="stylesheet" type="text/css"/>
@endsection

@section('content-page')
    <div class="content">
        <!-- Start Content-->
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <h4 class="page-title">YÊU CẦU</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Yêu cầu</a></li>
                                <li class="breadcrumb-item active">Tạo mới</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <!-- calendar -->
                <div class="col-xl-3">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="header-title mb-4">Lịch</h6>
                            <div class="row calendar-widget col-md-12">
                                <div class="col-sm-7">
                                    <div id="calendar-widget" class="col-md-12"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- form information -->
                <div class="col-xl-5">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title mb-4">Thông tin yêu cầu</h4>
                            <form class="form-horizontal" method="POST" action="{{route('store.taskOrder')}}">
                                @csrf
                                <div class="mb-2 row">
                                    <div class="col-md-6">
                                        <label class="form-label" for="exampleInputEmail1">Tên yêu cầu</label>
                                        <input name="name" type="text" class="form-control" aria-describedby="emailHelp"
                                               placeholder="">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label" for="exampleInputEmail1">Nơi đăng tải</label>
                                        <select name="source" class="form-select">
                                            <option selected="" disabled>Chọn nguồn</option>
                                            <option value="Facebook">Facebook</option>
                                            <option value="Tiktok">Tiktok</option>
                                            <option value="Youtube">Youtube</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-2">
                                    <label class="form-label" for="exampleInputEmail1">Mô tả yêu cầu</label>
                                    <input name="content" type="text" class="form-control" aria-describedby="emailHelp"
                                           placeholder="">
                                    <small id="emailHelp" class="form-text text-muted">(VD: Video từ lúc 2:30', độ dài
                                        tầm 3' để up facebook)</small>
                                </div>
                                <div class="mb-2">
                                    <label class="form-label" for="exampleInputEmail1">Link video nguồn</label>
                                    <input name="url_source" type="text" class="form-control"
                                           aria-describedby="emailHelp" placeholder="">
                                    <small id="emailHelp" class="form-text text-muted">(Kiểm tra lại quyền chia sẻ với
                                        link google driver)</small>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-6">
                                        <select class="form-select" name="member_id">
                                            <option selected disabled>Người được giao</option>
                                            @foreach($members as $member)
                                                <option value="{{$member->id}}">{{ $member->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <select class="form-select" name="department_id">
                                            <option selected disabled>Phòng ban phụ trách</option>
                                            @foreach($departments as $department)
                                                <option value="{{$department->id}}">{{ $department->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-2">
                                            {{--                                            <input type="text" id="datetime-datepicker" class="form-control flatpickr-input active" placeholder="Thời hạn" readonly="readonly">--}}
                                            <input name="deadline" class="form-control flatpickr-input active"
                                                   type="datetime-local">
                                        </div>
                                    </div>
                                    <small id="emailHelp" class="form-text text-muted">(Để trống nếu không đặt thời hạn,
                                        chỉ quản lý mới thay đổi được thời hạn)</small>
                                </div>
                                <div class="float-end">
                                    <button type="submit" class="btn btn-primary">Gửi yêu cầu</button>
                                </div>
                            </form>
                        </div>
                    </div> <!-- end card-->
                </div>
                <!-- comments -->
                <div class="col-xl-4">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="mb-4 fs-16">Bình luận về yêu cầu này</h4>
                            <div class="row mt-1">
                                <div class="col">
                                    <div class="border rounded">
                                        <form action="#" class="comment-area-box">
                                            <textarea rows="3" class="form-control border-0 resize-none"
                                                      placeholder="Your comment..."></textarea>
                                            <div class="p-2 bg-light">
                                                <div class="float-end">
                                                    <button type="submit" class="btn btn-sm btn-success">
                                                        Gửi bình luận
                                                    </button>
                                                </div>
                                                <div>
                                                    {{--                                                    <a href="#" class="btn btn-sm px-1 btn-light">--}}
                                                    {{--                                                        <i class="uil uil-cloud-upload"></i>--}}
                                                    {{--                                                    </a>--}}
                                                    {{--                                                    <a href="#" class="btn btn-sm px-1 btn-light">--}}
                                                    <i class="uil uil-message me-1"></i>
                                                    {{--                                                    </a>--}}
                                                </div>
                                            </div>
                                        </form>
                                    </div> <!-- end .border-->
                                </div> <!-- end col-->
                            </div>
                        </div>

                    </div>
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title mt-0 mb-1">Danh sách task</h4>
                            <p class="sub-header">

                            </p>

                            <table id="basic-datatable" class="table dt-responsive nowrap w-100">
                                <thead>
                                <tr>
                                    <th>Tên yêu cầu</th>
                                    <th>Nhân viên phụ trách</th>
                                    <th>Phòng ban phụ trách</th>
                                    <th>Mô tả</th>
                                    <th>Nguồn</th>
                                    <th>Link video nguồn</th>
                                    <th>Thời hạn</th>
                                    <th>Ngày tạo</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($tasks as $task)
                                    <tr>
                                        <td>{{ $task->name }}</td>
                                        <td>{{ $task->member->name }}</td>
                                        <td>{{ $task->department->name }}</td>
                                        <td>{{ $task->content }}</td>
                                        <td>{{ $task->source }}</td>
                                        <td>{{ $task->url_source }}</td>
                                        <td>{{ $task->deadline }}</td>
                                        <td>{{ $task->created_at }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                        </div> <!-- end card body-->
                    </div> <!-- end card -->
                </div><!-- end col-->
            </div>
        </div> <!-- content -->

    </div> <!-- content -->
@endsection

@section('content-js')
    <script src="{{ asset('admin-asset/assets/js/vendor.min.js') }}"></script>

    <!-- optional plugins -->
    <script src="{{ asset('admin-asset/assets/libs/moment/min/moment.min.js') }}"></script>
    <script src="{{ asset('admin-asset/assets/libs/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('admin-asset/assets/libs/flatpickr/flatpickr.min.js') }}"></script>
    <!-- page js -->
    <script src="{{ asset('admin-asset/assets/js/pages/widgets.init.js') }}"></script>

    <!-- App js -->
    <script src="{{ asset('admin-asset/assets/js/app.min.js') }}"></script>
    <script src="{{ asset('admin-asset/assets/js/vendor.min.js') }}"></script>

    <!-- Data table neccessary -->
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.bootstrap4.min.css">


    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.bootstrap4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.colVis.min.js"></script>

    <script src="{{ asset('admin-asset/assets/js/pages/datatables.init.js') }}"></script>
@endsection
