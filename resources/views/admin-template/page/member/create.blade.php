@extends('admin-template.main.master')

@section('content-page')
    <div class="content">
        <!-- Start Content-->
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <h4 class="page-title">TẠO MỚI THÀNH VIÊN</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Thành viên</a></li>
                                <li class="breadcrumb-item active">Tạo mới</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <!-- form information -->
                <div class="col-xl-5">
                    <div class="card">
                        <div class="card-body">
                            <div class="dropdown float-end">
                                <a href="#" class="dropdown-toggle arrow-none text-muted" data-bs-toggle="dropdown"
                                   aria-expanded="false">
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

                            <h4 class="header-title mb-4">Thông tin thành viên</h4>
                            <form class="form-horizontal" method="POST">
                                @csrf
                                <div class="mb-2 row">
                                    <div class="col-md-8">
                                        <label class="form-label" for="exampleInputEmail1">Tên thành viên</label>
                                        <input name="" type="text" class="form-control"
                                               aria-describedby="emailHelp"
                                               placeholder="Nguyễn Văn A" required
                                        >
                                    </div>
                                    <div class="col-md-8 mt-2">
                                        <label class="form-label" for="exampleInputEmail1">Email thành viên</label>
                                        <input name="email" type="email" class="form-control" required>
                                    </div>
                                    <div class="col-md-8 mt-2">
                                        <label class="form-label" for="exampleInputEmail1">Mật khẩu mặc định</label>
                                        <input name="password" type="password" class="form-control" required>
                                    </div>
                                    <div class="col-md-8 mt-2">
                                        <label class="form-label" for="exampleInputEmail1">Ngày sinh</label>
                                        <input name="date" type="date" class="form-control">
                                    </div>
                                    <div class="col-md-8 mt-2">
                                        <label class="form-label" for="exampleInputEmail1">Mã nhân viên</label>
                                        <input name="code" type="text" class="form-control">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Tạo thành viên</button>
                            </form>
                        </div>
                    </div> <!-- end card-->
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->

            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title mt-0 mb-1">Danh sách nhân viên</h4>
                        <div id="basic-datatable_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                            <div class="row">
                                <div class="col-sm-12 col-md-6">
                                    <div class="dataTables_length" id="basic-datatable_length">
                                        <label class="form-label">Show
                                            <select name="basic-datatable_length" aria-controls="basic-datatable"
                                                    class="form-control form-control-sm form-select form-select-sm">
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
                                        <label>Search:<input type="search" class="form-control form-control-sm"
                                                             placeholder="" aria-controls="basic-datatable"></label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="datatable-buttons"
                                           class="table table-striped dt-responsive nowrap w-100 dataTable no-footer dtr-inline"
                                           role="grid" aria-describedby="datatable-buttons_info" style="width: 1521px;">
                                        <thead>
                                        <tr role="row">
                                            <th class="sorting sorting_asc" tabindex="0"
                                                aria-controls="datatable-buttons" rowspan="1" colspan="1"
                                                style="width: 255.4px;" aria-sort="ascending"
                                                aria-label="Name: activate to sort column descending">Name
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="datatable-buttons"
                                                rowspan="1" colspan="1" style="width: 373.4px;"
                                                aria-label="Position: activate to sort column ascending">Position
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="datatable-buttons"
                                                rowspan="1" colspan="1" style="width: 190.4px;"
                                                aria-label="Office: activate to sort column ascending">Office
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="datatable-buttons"
                                                rowspan="1" colspan="1" style="width: 96.4px;"
                                                aria-label="Age: activate to sort column ascending">Age
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="datatable-buttons"
                                                rowspan="1" colspan="1" style="width: 178.4px;"
                                                aria-label="Start date: activate to sort column ascending">Start date
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="datatable-buttons"
                                                rowspan="1" colspan="1" style="width: 165.4px;"
                                                aria-label="Salary: activate to sort column ascending">Salary
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr class="odd">
                                            <td class="dtr-control sorting_1" tabindex="0">Airi Satou</td>
                                            <td>Accountant</td>
                                            <td>Tokyo</td>
                                            <td>33</td>
                                            <td>2008/11/28</td>
                                            <td>$162,700</td>
                                        </tr>
                                        <tr class="even">
                                            <td class="sorting_1 dtr-control">Angelica Ramos</td>
                                            <td>Chief Executive Officer (CEO)</td>
                                            <td>London</td>
                                            <td>47</td>
                                            <td>2009/10/09</td>
                                            <td>$1,200,000</td>
                                        </tr>
                                        <tr class="odd">
                                            <td class="dtr-control sorting_1" tabindex="0">Ashton Cox</td>
                                            <td>Junior Technical Author</td>
                                            <td>San Francisco</td>
                                            <td>66</td>
                                            <td>2009/01/12</td>
                                            <td>$86,000</td>
                                        </tr>
                                        <tr class="even">
                                            <td class="sorting_1 dtr-control">Bradley Greer</td>
                                            <td>Software Engineer</td>
                                            <td>London</td>
                                            <td>41</td>
                                            <td>2012/10/13</td>
                                            <td>$132,000</td>
                                        </tr>
                                        <tr class="odd">
                                            <td class="sorting_1 dtr-control">Brenden Wagner</td>
                                            <td>Software Engineer</td>
                                            <td>San Francisco</td>
                                            <td>28</td>
                                            <td>2011/06/07</td>
                                            <td>$206,850</td>
                                        </tr>
                                        <tr class="even">
                                            <td class="dtr-control sorting_1" tabindex="0">Brielle Williamson</td>
                                            <td>Integration Specialist</td>
                                            <td>New York</td>
                                            <td>61</td>
                                            <td>2012/12/02</td>
                                            <td>$372,000</td>
                                        </tr>
                                        <tr class="odd">
                                            <td class="sorting_1 dtr-control">Bruno Nash</td>
                                            <td>Software Engineer</td>
                                            <td>London</td>
                                            <td>38</td>
                                            <td>2011/05/03</td>
                                            <td>$163,500</td>
                                        </tr>
                                        <tr class="even">
                                            <td class="sorting_1 dtr-control">Caesar Vance</td>
                                            <td>Pre-Sales Support</td>
                                            <td>New York</td>
                                            <td>21</td>
                                            <td>2011/12/12</td>
                                            <td>$106,450</td>
                                        </tr>
                                        <tr class="odd">
                                            <td class="sorting_1 dtr-control">Cara Stevens</td>
                                            <td>Sales Assistant</td>
                                            <td>New York</td>
                                            <td>46</td>
                                            <td>2011/12/06</td>
                                            <td>$145,600</td>
                                        </tr>
                                        <tr class="even">
                                            <td class="dtr-control sorting_1" tabindex="0">Cedric Kelly</td>
                                            <td>Senior Javascript Developer</td>
                                            <td>Edinburgh</td>
                                            <td>22</td>
                                            <td>2012/03/29</td>
                                            <td>$433,060</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-md-5">
                                    <div class="dataTables_info" id="basic-datatable_info" role="status"
                                         aria-live="polite">Showing 1 to 10 of 57 entries
                                    </div>
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
    <script src="{{ asset('admin-asset/assets/js/pages/datatables.init.js') }}"></script>
@endsection
