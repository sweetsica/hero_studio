@extends('admin-template.main.master')

@section('content-page')
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <h4 class="page-title">Thành viên phòng ban</h4>
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
                                    <div class="row">
                                        <div class="col-sm-9">
                                            <div class="float-sm-end mt-3 mt-sm-0">

{{--                                                <div class="task-search d-inline-block mb-3 mb-sm-0 me-sm-1">--}}
{{--                                                    <form>--}}
{{--                                                        <div class="input-group">--}}
{{--                                                            <input type="text" class="form-control search-input"--}}
{{--                                                                   placeholder="Search..."/>--}}
{{--                                                            <span class="uil uil-search icon-search"></span>--}}
{{--                                                            <button class="btn btn-soft-primary input-group-text"--}}
{{--                                                                    type="button">--}}
{{--                                                                <i class='uil uil-file-search-alt'></i>--}}
{{--                                                            </button>--}}
{{--                                                        </div>--}}
{{--                                                    </form>--}}
{{--                                                </div>--}}
{{--                                                <div class="dropdown d-inline-block">--}}
{{--                                                    <button class="btn btn-secondary dropdown-toggle" type="button"--}}
{{--                                                            data-bs-toggle="dropdown" aria-haspopup="true"--}}
{{--                                                            aria-expanded="false">--}}
{{--                                                        <i class='uil uil-sort-amount-down'></i>--}}
{{--                                                    </button>--}}
{{--                                                    <div class="dropdown-menu dropdown-menu-end">--}}
{{--                                                        <a class="dropdown-item" href="#">Due Date</a>--}}
{{--                                                        <a class="dropdown-item" href="#">Added Date</a>--}}
{{--                                                        <a class="dropdown-item" href="#">Assignee</a>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mt-3">
                                        <div class="col">
                                            <div class="collapse show" id="todayTasks">
                                                <div class="card mb-0 border-0">
                                                    <div class="card-body">
                                                    {{--                                                        @dd($data)--}}
                                                    @foreach($members as $data)
                                                        <!-- task -->
                                                            <div class="row justify-content-sm-between border-bottom">
                                                                <div class="col-lg-6 mb-2 mb-lg-0">
                                                                    <div class="form-check">
                                                                        <label class="form-check-label" for="task1">
                                                                            {{$data->name}}
                                                                        </label>
                                                                    </div> <!-- end checkbox -->
                                                                </div> <!-- end col -->
                                                                <div class="col-lg-6">
                                                                    <div class="d-sm-flex justify-content-between">
                                                                        <div>
                                                                            {{--                                                                            <img src="assets/images/users/avatar-9.jpg" alt="image" class="avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Assigned to Arya S" />--}}
                                                                        </div>
                                                                        <div class="mt-3 mt-sm-0">
                                                                            <ul class="list-inline text-sm-end">
                                                                                <li class="list-inline-item pe-1">
                                                                                    <i class='uil uil-schedule me-1'></i>{{\Carbon\Carbon::parse($data->date_of_birth)->format('d/m/Y')}}
                                                                                </li>
                                                                                <li class="list-inline-item pe-1">
                                                                                    <i class='uil uil-align-alt me-1'></i>3/7
                                                                                </li>
                                                                                <li class="list-inline-item pe-2">
                                                                                    <i class='uil uil-comment-message me-1'></i>21
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </div> <!-- end .d-flex-->
                                                                </div> <!-- end col -->
                                                            </div>
                                                            <!-- end task -->
                                                        @endforeach
                                                    </div> <!-- end card-body-->
                                                </div> <!-- end card -->
                                            </div> <!-- end .collapse-->

                                        </div>
                                    </div>

{{--                                    <div class="row mb-3 mt-4">--}}
{{--                                        <div class="col-12">--}}
{{--                                            <div class="text-center">--}}
{{--                                                <a href="javascript:void(0);" class="btn btn-white mb-3">--}}
{{--                                                    <i data-feather="loader" class="icon-dual icon-xs me-2"></i>Tải thêm--}}
{{--                                                </a>--}}
{{--                                            </div>--}}
{{--                                        </div> <!-- end col-->--}}
{{--                                    </div>--}}
                                    <!-- end row -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

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
