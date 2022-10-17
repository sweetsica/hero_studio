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

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title mt-0 mb-1">Danh sách thành viên</h4>
                            <p class="sub-header">

                            </p>

                            <table id="basic-datatable" class="table dt-responsive nowrap w-100">
                                <thead>
                                <tr>
                                    <th>Họ và Tên</th>
                                    <th>Email</th>
                                    <th>Ngày sinh</th>
                                    <th>Mã nhân viên</th>
                                    <th>Vị trí</th>
                                    <th>Trạng thái</th>
                                    <th>Ngày tạo</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($members as $member)
                                    <tr>
                                        <td>{{ $member->name }}</td>
                                        <td>{{ $member->user->email }}</td>
                                        <td>{{ $member->date_of_birth }}</td>
                                        <td>{{ $member->code }}</td>
                                        <td> Nhân Viên </td>
                                        <td> Hoạt động </td>
                                        <td> {{ $member->created_at }} </td>
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

@section('content-js')
    <script src="{{ asset('admin-asset/assets/js/vendor.min.js') }}"></script>
    <!-- optional plugins -->
    <script src="{{ asset('admin-asset/assets/libs/moment/min/moment.min.js') }}"></script>
    <script src="{{ asset('admin-asset/assets/libs/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('admin-asset/assets/libs/flatpickr/flatpickr.min.js') }}"></script>

    <!-- page js -->
    <script src="{{ asset('admin-asset/assets/js/pages/dashboard.init.js') }}"></script>

    <!-- App js -->
    <script src="{{ asset('admin-asset/assets/js/app.min.js') }}"></script>
    <script src="{{ asset('admin-asset/assets/js/vendor.min.js') }}"></script>

    <script src="{{ asset('admin-asset/assets/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('admin-asset/assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script
        src="{{ asset('admin-asset/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script
        src="{{ asset('admin-asset/assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('admin-asset/assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script
        src="{{ asset('admin-asset/assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('admin-asset/assets/libs/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('admin-asset/assets/libs/datatables.net-buttons/js/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('admin-asset/assets/libs/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('admin-asset/assets/libs/datatables.net-keytable/js/dataTables.keyTable.min.js') }}"></script>
    <script src="{{ asset('admin-asset/assets/libs/datatables.net-select/js/dataTables.select.min.js') }}"></script>
    <script src="{{ asset('admin-asset/assets/js/pages/datatables.init.js') }}"></script>
@endsection
