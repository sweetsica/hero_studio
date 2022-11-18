@extends('admin-template.main.master')

@section('content-page')
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <h4 class="page-title">Tasks List</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Shreyu</a></li>
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Tasks</a></li>
                                <li class="breadcrumb-item active">List</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <!-- tasks panel -->
            <div class="row">
                <div class="col-xl-8">
                    <div class="row">
                        <div class="col">
                            <div class="card">
                                <div class="card-body">
                                    <!-- cta -->
                                    <form class="form-horizontal" method="POST"
                                          action="{{route('update.department', $department->id)}}">
                                        @csrf
                                        @method('PUT')
                                        <div class="mb-2 row">
                                            <div class="col-md-12">
                                                <label class="form-label">Tên phòng ban</label>
                                                <input
                                                    value="{{$department->name}}"
                                                    name="name"
                                                    type="text"
                                                    class="form-control"
                                                    placeholder="Tên phòng ban" required
                                                >
                                            </div>
                                            <div class="col-md-12 mt-2">
                                                <label class="form-label">Mô tả phòng ban</label>
                                                <textarea class="form-control" name="description" id="" cols="30"
                                                          rows="10">{{$department->description}}</textarea>
                                            </div>
                                            <div class="col-md-12 mt-2">
                                                <label class="form-label">Trưởng phòng ban</label>
                                                <select name="department_head_id" class="form-control">
                                                    @foreach($members as $member)
                                                        <option
                                                            @if($department->department_head_id === $member->id) selected
                                                            @endif value="{{$member->id}}"
                                                            @if(!in_array($member->id, $memberNotHaveDepartment) && $member->id != $department->department_head_id) disabled @endif
                                                        >
                                                            {{ $member->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <a type="button" class="btn btn-light" data-bs-dismiss="modal" href="{{route('get.department')}}">Hủy
                                            </a>
                                            <button type="submit" class="btn btn-primary">Cập nhật</button>
                                        </div>
                                    </form>
                                    <!-- end row -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- task details -->
                <div class="col-xl-4">
                    <div class="row" style="height: 100%">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <form action="{{route('update.department.member', ['department_id' => $department->id])}}" method="POST">
                                        @csrf
                                        <label class="form-label">Danh sách thành viên phòng ban</label>
                                        <select multiple="multiple" class="multi-select" id="my_multi_select1"
                                                name="members[]" data-plugin="multiselect">
                                            @foreach($members as $member)
                                                <option value="{{$member->id}}" @if(in_array($member->id, $departmentMemberIds)) selected @endif>
                                                    {{$member->name}}
                                                </option>
                                            @endforeach
                                        </select>
                                        <button class="btn btn-primary mt-2">Cập nhật thành viên phòng ban</button>
                                    </form>
                                </div>
                            </div> <!-- end card-body -->
                        </div> <!-- end card-->
                    </div>
                </div> <!-- end col -->
            </div>

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

@push('custom-css')
    <link href="{{asset('admin-asset/assets/libs/select2/css/select2.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('admin-asset/assets/libs/multiselect/css/multi-select.css')}}" rel="stylesheet"
          type="text/css"/>
    <link href="{{asset('admin-asset/assets/libs/flatpickr/flatpickr.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('admin-asset/assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css')}}"
          rel="stylesheet" type="text/css"/>
    <link href="{{asset('admin-asset/assets/libs/spectrum-colorpicker2/spectrum.min.css')}}" rel="stylesheet"
          type="text/css"/>
		<!-- App css -->
		<link href="{{asset('admin-asset/assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" id="bs-default-stylesheet" />
		<link href="{{asset('admin-asset/assets/css/app.min.css')}}" rel="stylesheet" type="text/css" id="app-default-stylesheet" />

		<link href="{{asset('admin-asset/assets/css/bootstrap-dark.min.css')}}" rel="stylesheet" type="text/css" id="bs-dark-stylesheet" disabled />
		<link href="{{asset('admin-asset/assets/css/app-dark.min.css')}}" rel="stylesheet" type="text/css" id="app-dark-stylesheet"  disabled />

		<!-- icons -->
		<link href="{{asset('assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
@endpush

@push('custom-js')
    <!-- Plugins Js -->
    <script src="{{asset('admin-asset/assets/libs/select2/js/select2.min.js')}}"></script>
    <script src="{{asset('admin-asset/assets/libs/multiselect/js/jquery.multi-select.js')}}"></script>
    <script src="{{asset('admin-asset/assets/libs/flatpickr/flatpickr.min.js')}}"></script>
    <script src="{{asset('admin-asset/assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js')}}"></script>
    <!--Color picker-->
    <script src="{{asset('admin-asset/assets/libs/spectrum-colorpicker2/spectrum.min.js')}}"></script>
    <!-- Init js-->
    <script src="{{asset('admin-asset/assets/js/pages/form-advanced.init.js')}}"></script>

    <!-- App js -->
    <script src="{{asset('admin-asset/assets/js/app.min.js')}}"></script>
@endpush
