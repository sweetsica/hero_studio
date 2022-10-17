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
    <link href="{{ asset('admin-asset/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('custom/app.css') }}" rel="stylesheet" type="text/css" />
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
                                        <input name="name" type="text" class="form-control" aria-describedby="emailHelp" placeholder="">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label" for="exampleInputEmail1" >Nơi đăng tải</label>
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
                                    <input name="content" type="text" class="form-control" aria-describedby="emailHelp" placeholder="">
                                    <small id="emailHelp" class="form-text text-muted">(VD: Video từ lúc 2:30', độ dài tầm 3' để up facebook)</small>
                                </div>
                                <div class="mb-2">
                                    <label class="form-label" for="exampleInputEmail1">Link video nguồn</label>
                                    <input name="url_source" type="text" class="form-control" aria-describedby="emailHelp" placeholder="">
                                    <small id="emailHelp" class="form-text text-muted">(Kiểm tra lại quyền chia sẻ với link google driver)</small>
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
                                            <input name="deadline" class="form-control flatpickr-input active" type="datetime-local">
                                        </div>
                                    </div>
                                    <small id="emailHelp" class="form-text text-muted">(Để trống nếu không đặt thời hạn, chỉ quản lý mới thay đổi được thời hạn)</small>
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
                                            <textarea rows="3" class="form-control border-0 resize-none" placeholder="Your comment..."></textarea>
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

            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title mt-0 mb-1">Danh sách yêu cầu tháng này</h4>
                        <p class="sub-header">
                            DataTables has most features enabled by default, so all you need to do to use it with your own tables is to call the construction
                            function: <code>$().DataTable();</code>.
                        </p>

                        <div id="basic-datatable_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                            <div class="row">
                                <div class="col-sm-12 col-md-6">
                                    <div class="dataTables_length" id="basic-datatable_length">
                                        <label class="form-label">Show
                                            <select name="basic-datatable_length" aria-controls="basic-datatable" class="form-control form-control-sm form-select form-select-sm">
                                                <option value="10">10</option>
                                                <option value="25">25</option>
                                                <option value="50">50</option>
                                                <option value="100">100</option>
                                            </select>
                                        entries</label>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6">
                                    <div id="basic-datatable_filter" class="dataTables_filter">
                                        <label>Search:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="basic-datatable"></label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100 dataTable no-footer dtr-inline" role="grid" aria-describedby="datatable-buttons_info" style="width: 1521px;">
                                        <thead>
                                        <tr role="row"><th class="sorting sorting_asc" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" style="width: 255.4px;" aria-sort="ascending" aria-label="Name: activate to sort column descending">Name</th><th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" style="width: 373.4px;" aria-label="Position: activate to sort column ascending">Position</th><th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" style="width: 190.4px;" aria-label="Office: activate to sort column ascending">Office</th><th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" style="width: 96.4px;" aria-label="Age: activate to sort column ascending">Age</th><th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" style="width: 178.4px;" aria-label="Start date: activate to sort column ascending">Start date</th><th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" style="width: 165.4px;" aria-label="Salary: activate to sort column ascending">Salary</th></tr>
                                        </thead>
                                        <tbody>
                                        <tr class="odd">
                                            <td class="dtr-control sorting_1" tabindex="0">Airi Satou</td>
                                            <td>Accountant</td>
                                            <td>Tokyo</td>
                                            <td>33</td>
                                            <td>2008/11/28</td>
                                            <td>$162,700</td>
                                        </tr><tr class="even">
                                            <td class="sorting_1 dtr-control">Angelica Ramos</td>
                                            <td>Chief Executive Officer (CEO)</td>
                                            <td>London</td>
                                            <td>47</td>
                                            <td>2009/10/09</td>
                                            <td>$1,200,000</td>
                                        </tr><tr class="odd">
                                            <td class="dtr-control sorting_1" tabindex="0">Ashton Cox</td>
                                            <td>Junior Technical Author</td>
                                            <td>San Francisco</td>
                                            <td>66</td>
                                            <td>2009/01/12</td>
                                            <td>$86,000</td>
                                        </tr><tr class="even">
                                            <td class="sorting_1 dtr-control">Bradley Greer</td>
                                            <td>Software Engineer</td>
                                            <td>London</td>
                                            <td>41</td>
                                            <td>2012/10/13</td>
                                            <td>$132,000</td>
                                        </tr><tr class="odd">
                                            <td class="sorting_1 dtr-control">Brenden Wagner</td>
                                            <td>Software Engineer</td>
                                            <td>San Francisco</td>
                                            <td>28</td>
                                            <td>2011/06/07</td>
                                            <td>$206,850</td>
                                        </tr><tr class="even">
                                            <td class="dtr-control sorting_1" tabindex="0">Brielle Williamson</td>
                                            <td>Integration Specialist</td>
                                            <td>New York</td>
                                            <td>61</td>
                                            <td>2012/12/02</td>
                                            <td>$372,000</td>
                                        </tr><tr class="odd">
                                            <td class="sorting_1 dtr-control">Bruno Nash</td>
                                            <td>Software Engineer</td>
                                            <td>London</td>
                                            <td>38</td>
                                            <td>2011/05/03</td>
                                            <td>$163,500</td>
                                        </tr><tr class="even">
                                            <td class="sorting_1 dtr-control">Caesar Vance</td>
                                            <td>Pre-Sales Support</td>
                                            <td>New York</td>
                                            <td>21</td>
                                            <td>2011/12/12</td>
                                            <td>$106,450</td>
                                        </tr><tr class="odd">
                                            <td class="sorting_1 dtr-control">Cara Stevens</td>
                                            <td>Sales Assistant</td>
                                            <td>New York</td>
                                            <td>46</td>
                                            <td>2011/12/06</td>
                                            <td>$145,600</td>
                                        </tr><tr class="even">
                                            <td class="dtr-control sorting_1" tabindex="0">Cedric Kelly</td>
                                            <td>Senior Javascript Developer</td>
                                            <td>Edinburgh</td>
                                            <td>22</td>
                                            <td>2012/03/29</td>
                                            <td>$433,060</td>
                                        </tr></tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-md-5">
                                    <div class="dataTables_info" id="basic-datatable_info" role="status" aria-live="polite">Showing 1 to 10 of 57 entries</div>
                                </div>
                                <div class="col-sm-12 col-md-7">
                                    <div class="dataTables_paginate paging_simple_numbers"
                                         id="basic-datatable_paginate">
                                        <ul class="pagination pagination-rounded">
                                            <li class="paginate_button page-item previous disabled"
                                                id="basic-datatable_previous"><a href="#"
                                                                                 aria-controls="basic-datatable"
                                                                                 data-dt-idx="0" tabindex="0"
                                                                                 class="page-link">
                                                    <i class="uil uil-angle-left"></i></a></li>
                                            <li class="paginate_button page-item active"><a href="#"
                                                                                            aria-controls="basic-datatable"
                                                                                            data-dt-idx="1" tabindex="0"
                                                                                            class="page-link">1</a></li>
                                            <li class="paginate_button page-item "><a href="#"
                                                                                      aria-controls="basic-datatable"
                                                                                      data-dt-idx="2" tabindex="0"
                                                                                      class="page-link">2</a></li>
                                            <li class="paginate_button page-item "><a href="#"
                                                                                      aria-controls="basic-datatable"
                                                                                      data-dt-idx="3" tabindex="0"
                                                                                      class="page-link">3</a></li>
                                            <li class="paginate_button page-item "><a href="#"
                                                                                      aria-controls="basic-datatable"
                                                                                      data-dt-idx="4" tabindex="0"
                                                                                      class="page-link">4</a></li>
                                            <li class="paginate_button page-item "><a href="#"
                                                                                      aria-controls="basic-datatable"
                                                                                      data-dt-idx="5" tabindex="0"
                                                                                      class="page-link">5</a></li>
                                            <li class="paginate_button page-item "><a href="#"
                                                                                      aria-controls="basic-datatable"
                                                                                      data-dt-idx="6" tabindex="0"
                                                                                      class="page-link">6</a></li>
                                            <li class="paginate_button page-item next" id="basic-datatable_next"><a
                                                    href="#" aria-controls="basic-datatable" data-dt-idx="7"
                                                    tabindex="0" class="page-link"><i
                                                        class="uil uil-angle-right"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> <!-- end card body-->
                </div> <!-- end card -->
            </div><!-- end col-->
        </div> <!-- content -->

    </div> <!-- content -->
@endsection

@section('content-js')
    <!-- Vendor js -->
    <script src="{{ asset('admin-asset/assets/js/vendor.min.js') }}"></script>

    <!-- optional plugins -->
    <script src="{{ asset('admin-asset/assets/libs/moment/min/moment.min.js') }}"></script>
    <script src="{{ asset('admin-asset/assets/libs/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('admin-asset/assets/libs/flatpickr/flatpickr.min.js') }}"></script>
    <!-- page js -->
    <script src="{{ asset('admin-asset/assets/js/pages/widgets.init.js') }}"></script>

    <!-- App js -->
    <script src="{{ asset('admin-asset/assets/js/app.min.js') }}"></script>

@endsection
