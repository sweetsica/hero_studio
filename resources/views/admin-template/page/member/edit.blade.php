@extends('admin-template.main.master')

@section('content-page')
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <h4 class="page-title">File Manager</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript:void(0);">Shreyu</a></li>
                                <li class="breadcrumb-item active">File Manager</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-6">
                    <div class="card">
                        <div class="card-body">
                            <form class="form-horizontal" method="POST">
                                @csrf
                                <div class="mb-2 row">
                                    <div class="col-md-12">
                                        <label class="form-label" for="exampleInputEmail1">Tên thành viên</label>
                                        <input name="name" type="text" class="form-control"
                                               aria-describedby="emailHelp"
                                               placeholder="Nguyễn Văn A" required
                                               value="{{$member->name}}"
                                        >
                                    </div>
                                    <div class="col-md-12 mt-2">
                                        <label class="form-label" for="exampleInputEmail1">Email thành viên</label>
                                        <input name="email" type="email" class="form-control" required value="{{$member->user->email}}">
                                    </div>
                                    <div class="col-md-12 mt-2">
                                        <label class="form-label" for="special_access">Truy cập kho media?</label>
                                        <input type="hidden" id="test6" value="0" ng-model="isFull" name="special_access" checked>
                                        <input name="special_access" type="checkbox" id="special_access" class="form-check-input"
                                            @if($member->special_access)
                                                checked  value="{{$member->user->special_access}}"
                                            @else()
                                                value="1"
                                            @endif
                                        >
                                    </div>
                                    <div class="col-md-12 mt-2">
                                        <label class="form-label" for="exampleInputEmail1">Mật khẩu</label>
                                        <input name="password" type="password" class="form-control">
                                        <small >(Bỏ trống nếu giữ nguyên)</small>
                                    </div>
                                    <div class="col-md-12  mt-2">
                                        <label class="form-label" for="exampleInputEmail1">Vai trò</label>
                                        <select name="role" class="form-select">
                                            <option @if($member->primitiveUserRole === 'chief of department') selected @endif value="chief of department">Quản lý</option>
                                            <option @if($member->primitiveUserRole === 'key opinion leaders') selected @endif value="key opinion leaders">Kol</option>
                                            <option @if($member->primitiveUserRole === 'editor') selected @endif value="editor">Thành viên</option>
                                        </select>
                                    </div>
                                    <div class="col-md-12 mt-2">
                                        <label class="form-label" for="exampleInputEmail1">Ngày sinh : {{\Carbon\Carbon::parse($member->date_of_birth)->format('d/m/Y')}}</label>
                                        <input name="date_of_birth" type="date" class="form-control">
                                        <small >(Bỏ trống nếu giữ nguyên)</small>
                                    </div>
                                    <div class="col-md-12 mt-2">
                                        <label class="form-label" for="exampleInputEmail1">Mã nhân viên</label>
                                        <input name="code" type="text" class="form-control" value="{{$member->code}}">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Hủy</button>
                                    <button type="submit" class="btn btn-primary">Cập nhật</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div> <!--End col-->
            </div> <!-- End row -->

        </div> <!-- container -->

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
