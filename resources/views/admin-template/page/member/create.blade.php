@extends('admin-template.main.master')

@section('content-page')
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <h4 class="page-title">DANH SÁCH THÀNH VIÊN</h4>
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
            @if(Auth::user()->hasRole('super admin'))
                <div class="row">
                    <div class="col-12">
                        <button type="button" class="btn btn-primary mb-2 float-end" data-bs-toggle="modal"
                                data-bs-target="#myModal"> Thêm thành viên
                        </button>
                    </div>
                </div>
        @endif
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
{{--                                    <th>Vai trò</th>--}}
                                    <th>Trạng thái</th>
                                    <th>Ngày tạo</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($members as $member)
                                    <tr>
                                        <td><a href="{{route('edit.member', $member->id)}}">{{ $member->name }}</a></td>
                                        <td>{{ $member->user->email }}</td>
                                        <td>{{ $member->date_of_birth }}</td>
                                        <td>{{ $member->code }}</td>
                                        <td>{{ $member->userRole }}</td>
{{--                                        <td>{{ $member->user->getRoleNames()[0] }}</td>--}}
                                        <td> Hoạt động</td>
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

    <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel">Thông tin thành viên</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" method="POST">
                        @csrf
                        <div class="mb-2 row">
                            <div class="col-md-12 mt-2">
                                <label class="form-label" for="exampleInputEmail1">Mã nhân viên</label>
                                <input name="code" type="text" class="form-control">
                            </div>
                            <div class="col-md-12">
                                <label class="form-label" for="exampleInputEmail1">Tên thành viên</label>
                                <input name="name" type="text" class="form-control"
                                       aria-describedby="emailHelp"
                                       placeholder="Nguyễn Văn A" required
                                >
                            </div>
                            <div class="col-md-12 mt-2">
                                <label class="form-label" for="exampleInputEmail1">Email thành viên</label>
                                <input name="email" type="email" class="form-control" required>
                            </div>
                            <div class="col-md-12 mt-2">
                                <label class="form-label" for="exampleInputEmail1">Truy cập kho media?</label>
                                <input name="special_access" type="checkbox" class="form-check-input">
                            </div>
                            <div class="col-md-12 mt-2">
                                <label class="form-label" for="exampleInputEmail1">Mật khẩu mặc định</label>
                                <input name="password" type="password" class="form-control" required>
                            </div>
                            <div class="col-md-12  mt-2">
                                <label class="form-label" for="exampleInputEmail1">Vai trò</label>
                                <select name="role" class="form-select">
                                    <option value="chief of department">Quản lý</option>
                                    <option value="key opinion leaders">Kol</option>
                                    <option value="editor">Thành viên</option>
                                </select>
                            </div>
                            <div class="col-md-12 mt-2">
                                <label class="form-label" for="exampleInputEmail1">Ngày sinh</label>
                                <input name="date_of_birth" type="date" class="form-control">
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Hủy</button>
                            <button type="submit" class="btn btn-primary">Tạo thành viên</button>
                        </div>
                    </form>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
@endsection

@section('content-js')
    <script src="{{ asset('admin-asset/assets/js/vendor.min.js') }}"></script>
    <!-- optional plugins -->
    <script src="{{ asset('admin-asset/assets/libs/moment/min/moment.min.js') }}"></script>
    <script src="{{ asset('admin-asset/assets/libs/flatpickr/flatpickr.min.js') }}"></script>

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

    <script>
        $(document).ready(function () {
            const table = $('#basic-datatable').DataTable({
                scrollCollapse: true,
                paging: true,
                dom: 'Bfrtip',
                buttons: [
                    'excel', 'pdf', 'print', 'colvis'
                ],
                fixedColumns: {
                    left: 2
                }
            });
            table.buttons().container()
                .appendTo('#basic-datatable .col-md-6:eq(0)');

            // them class vào các btn của datatable cho giống theme
            $('.dt-buttons').children().addClass('btn btn-secondary')
        })
    </script>
@endsection
