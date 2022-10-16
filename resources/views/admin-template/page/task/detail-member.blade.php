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
@endsection

@section('content-page')
    <div class="content">
        <!-- Start Content-->
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <h4 class="page-title">THÔNG TIN YÊU CẦU</h4>
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
                <div class="col-xl-5">
                    <div class="card">
                        <div class="card-body">
                            <div class="dropdown float-end">
                                <a href="#" class="dropdown-toggle arrow-none text-muted" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="uil uil-ellipsis-v"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item">
                                        <i class="uil uil-edit-alt me-2"></i>Edit
                                    </a>
                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item">
                                        <i class="uil uil-refresh me-2"></i>Refresh
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item text-danger">
                                        <i class="uil uil-trash me-2"></i>Delete
                                    </a>
                                </div>
                            </div>
                            <h6 class="header-title mb-4">Lịch</h6>

                            <div class="row calendar-widget col-md-12">
                                <div class="col-sm-7">
                                    <div id="calendar-widget" class="col-md-12"></div>
                                </div>
                                <div class="col-sm-5">
                                    <ul class="list-unstyled ms-sm-3 mt-4 mt-sm-0">
                                        <li class="mb-3">
                                            <p class="text-muted mb-0 fs-13">
                                                <i class="uil uil-calender me-1"></i>7:30 AM - 10:00 AM
                                            </p>
                                            <h6 class="mt-1 fs-16">UX Planning Meeting</h6>
                                        </li>
                                        <li class="mb-3">
                                            <p class="text-muted mb-0 fs-13">
                                                <i class="uil uil-calender me-1"></i>10:30 AM - 11:45 AM
                                            </p>
                                            <h6 class="mt-1 fs-16">Hyper v3 Scope Review</h6>
                                        </li>
                                        <li class="mb-3">
                                            <p class="text-muted mb-0 fs-13">
                                                <i class="uil uil-calender me-1"></i>12:15 PM - 02:00 PM
                                            </p>
                                            <h6 class="mt-1 fs-16">Ubold v4 Brainstorming</h6>
                                        </li>
                                        <li class="mb-3">
                                            <p class="text-muted mb-0 fs-13">
                                                <i class="uil uil-calender me-1"></i>5:30 PM - 06:15 PM
                                            </p>
                                            <h6 class="mt-1 fs-16">Shreyu React Planning</h6>
                                        </li>
                                        <li class="mb-3">
                                            <p class="text-muted mb-0 fs-13">
                                                <i class="uil uil-calender me-1"></i>5:30 PM - 06:15 PM
                                            </p>
                                            <h6 class="mt-1 fs-16">Shreyu React Planning</h6>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- form information -->
                <div class="col-xl-5">
                    <div class="card">
                        <div class="card-body">
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

                            <h4 class="header-title mb-4">Thông tin yêu cầu</h4>
                            <form class="form-horizontal">
                                <div class="mb-2 row">
                                    <div class="col-md-6">
                                        <label class="form-label" for="exampleInputEmail1" >Tên yêu cầu</label>
                                        <input type="email" class="form-control" style="background-color: #e2e3e5" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Thiết kế video cho KOL Tùng Hoàng" disabled>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label" for="exampleInputEmail1" >Nơi đăng tải</label>
                                        <select class="form-select" disabled style="background-color: #e2e3e5">
                                            <option selected="">Facebook</option>
                                            <option value="1">Facebook</option>
                                            <option value="2">Tiktok</option>
                                            <option value="3">Youtube</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-2">
                                    <label class="form-label" for="exampleInputEmail1">Mô tả yêu cầu</label>
                                    <input type="email" class="form-control" style="background-color: #e2e3e5" id="exampleInputEmail1" aria-describedby="emailHelp" disabled placeholder="Video dài 2 phút, cần gắn logo vào">
                                    <small id="emailHelp" class="form-text text-muted">(VD: Video từ lúc 2:30', độ dài tầm 3' để up facebook)</small>
                                </div>
                                <div class="mb-2">
                                    <label class="form-label" for="exampleInputEmail1">Link video nguồn</label>
                                    <input type="email" class="form-control" style="background-color: #e2e3e5" id="exampleInputEmail1" aria-describedby="emailHelp" disabled placeholder="https://www.facebook.com">
                                    <small id="emailHelp" class="form-text text-muted">(Kiểm tra lại quyền chia sẻ với link google driver)</small>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-6">
                                        <select class="form-select" style="background-color: #e2e3e5" disabled>
                                            <option selected="">Người được giao</option>
                                            <option value="1">One</option>
                                            <option value="2">Two</option>
                                            <option value="3">Three</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <select class="form-select" style="background-color: #e2e3e5" disabled>
                                            <option selected="">Phòng ban phụ trách</option>
                                            <option value="1">One</option>
                                            <option value="2">Two</option>
                                            <option value="3">Three</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-2">
                                            <input type="text" id="datetime-datepicker" style="background-color: #e2e3e5" disabled class="form-control flatpickr-input active" placeholder="Thời hạn" readonly="readonly">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <select class="form-select">
                                            <option disabled selected="">Đang chờ nhận</option>
                                            <option value="1">Đang thực hiện</option>
                                            <option value="2">Đã hoàn thành</option>
                                            <option value="3">Cần làm lại</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-2">
                                        <label class="form-label" for="exampleInputEmail1">Link sản phẩm</label>
                                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
                                        <small id="emailHelp" class="form-text text-muted">(Kiểm tra lại quyền chia sẻ với link google driver)</small>
                                    </div>
                                </div>
                                <div class="float-end">
                                    <button type="submit" class="btn btn-primary">Cập nhật yêu cầu</button>
                                </div>
                            </form>
                        </div>
                    </div> <!-- end card-->
                </div>
                <!-- activities -->
                <div class="col-xl-2">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="header-title mb-4">Hoạt động</h6>
                            <div class="d-flex">
                                <div class="flex-grow-1">
                                    <h6 class="mt-0 mb-1 fs-15 fw-normal">
                                        <a href="" class="fw-bold">Minh Tuấn</a> đã tải lên một link trong yêu cầu của
                                        <span class="fw-bold text-primary">KOL Lan</span>
                                    </h6>
                                    <p class="text-muted">2 Min Ago</p>
                                </div>
                            </div>

                            <div class="d-flex mt-1">
                                <div class="flex-grow-1">
                                    <h6 class="mt-0 mb-1 fs-15 fw-normal">
                                        <a href="" class="fw-bold">Hoàng Minh</a> đã bình luận trong yêu cầu của
                                        <span class="fw-bold text-primary">KOL Mỹ Lan</span>
                                    </h6>
                                    <p class="text-muted">12 Min Ago</p>
                                </div>
                            </div>

                            <div class="d-flex mt-1">
                                <div class="flex-grow-1">
                                    <h6 class="mt-0 mb-1 fs-15 fw-normal">
                                        <a href="" class="fw-bold">Đặng Tuân</a> đã bình luận trong yêu cầu của
                                        <span class="fw-bold text-primary">KOL Mỹ Lan</span>
                                    </h6>
                                    <p class="text-muted">12 Min Ago</p>
                                </div>
                            </div>

                            <div class="d-flex mt-1">
                                <div class="flex-grow-1">
                                    <h6 class="mt-0 mb-1 fs-15 fw-normal">
                                        <a href="" class="fw-bold">Hoàng Minh</a> đã bình luận trong yêu cầu của
                                        <span class="fw-bold text-primary">KOL Mỹ Lan</span>
                                    </h6>
                                    <p class="text-muted">12 Min Ago</p>
                                </div>
                            </div>
                            <a href="/" class="btn btn-primary btn-sm float-end">View All</a>
                        </div>

                    </div>
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->

            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title mt-0 mb-1">Tiến độ công việc</h4>
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
    <script
        src="{{ asset('admin-asset/assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>

    <script src="{{ asset('admin-asset/assets/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script
        src="{{ asset('admin-asset/assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script
        src="{{ asset('admin-asset/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script
        src="{{ asset('admin-asset/assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}"></script>
    <script
        src="{{ asset('admin-asset/assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script
        src="{{ asset('admin-asset/assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js') }}"></script>
    <script
        src="{{ asset('admin-asset/assets/libs/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
    <script
        src="{{ asset('admin-asset/assets/libs/datatables.net-buttons/js/buttons.flash.min.js') }}"></script>
    <script
        src="{{ asset('admin-asset/assets/libs/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
    <script
        src="{{ asset('admin-asset/assets/libs/datatables.net-keytable/js/dataTables.keyTable.min.js') }}"></script>
    <script
        src="{{ asset('admin-asset/assets/libs/datatables.net-select/js/dataTables.select.min.js') }}"></script>
@endsection
