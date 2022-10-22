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
                        <h4 class="page-title">PHÂN CÔNG YÊU CẦU</h4>
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
                <!-- form information -->
                <div class="col-xl-8">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title mb-4">Thông tin yêu cầu</h4>
                            <form class="form-horizontal" action="{{route('edit.updateTaskOrder', $task->id)}}"
                                  method="POST">
                                @csrf
                                @method('PUT')
                                <div class="mb-2 row">
                                    <div class="col-md-4">
                                        <label class="form-label" for="exampleInputEmail1">Tên yêu cầu</label>
                                        <input value="{{ $task->name }}" style="background-color: #f6f6f7" type="text" class="form-control" aria-describedby="emailHelp" disabled>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label" for="exampleInputEmail1">Nơi đăng tải</label>
                                        <select class="form-select"  @if((Auth::user()->getRoleNames())[0]=='chief of department') disabled @endif>
                                            <option value="Facebook" @if($task->source === 'Facebook') selected @endif>
                                                Facebook
                                            </option>
                                            <option value="Tiktok" @if($task->source === 'Tiktok') selected @endif>
                                                Tiktok
                                            </option>
                                            <option value="Youtube @if($task->source === 'Youtube') selected @endif">
                                                Youtube
                                            </option>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label" for="exampleInputEmail1">Loại yêu cầu</label>
                                        <select name="status_code" class="form-select">
                                            <option @if($task->status_code === 1) selected @endif value="1">Đang chờ nhận</option>
                                            <option @if($task->status_code === 2) selected @endif value="2">Đang thực hiện</option>
                                            <option @if($task->status_code === 3) selected @endif value="3">Đã hoàn thành</option>
                                            <option @if($task->status_code === 4) selected @endif value="4">Cần làm lại</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-2 row">
                                    <div class="col-md-6">
                                        <label class="form-label" for="exampleInputEmail1">Mô tả yêu cầu</label>
                                        <textarea class="form-control"name="content">{{$task->content}}</textarea>
                                        <small id="emailHelp" class="form-text text-muted">(VD: Video từ lúc 2:30', độ dài
                                            tầm 3' để up facebook)</small>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label" for="exampleInputEmail1">Link video nguồn</label>
                                        <textarea class="form-control"name="content">{{$task->url_source}}</textarea>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    @if((Auth::user()->getRoleNames())[0]=='key opinion leaders')
                                        <div class="col-md-4">
                                            <label class="form-label" for="exampleInputEmail1">Phòng ban phụ trách</label>
                                            <select name="department_id" class="form-select">
                                                @foreach($departments as $department)
                                                    <option value="{{$department->id}}"
                                                            @if($task->department_id === $department->id) selected @endif>{{ $department->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    @elseif((Auth::user()->getRoleNames())[0]=='chief of department')
                                        <div class="col-md-4">
                                            <label class="form-label" for="exampleInputEmail1">Thành viên phụ trách</label>
                                            <select name="member_id" class="form-select">
                                                @foreach($members as $member)
                                                    <option value="{{$member->id}}"
                                                            @if($task->member_id === $member->id) selected @endif>{{ $member->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    @endif
                                    <div class="col-md-4">
                                        <div class="mb-2">
                                            <label class="form-label" for="exampleInputEmail1">Thời hạn</label>
                                            <input value="{{$task->deadline}}" name="deadline"
                                                   class="form-control flatpickr-input active" type="datetime-local">
                                        </div>
                                        <small id="emailHelp" class="form-text text-muted">(Để trống nếu không đặt thời
                                            hạn, chỉ quản lý mới thay đổi được thời hạn)</small>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label" for="exampleInputEmail1">Độ dài sản phẩm (Số phút)</label>
                                        <input value="{{{$task->product_length}}}" name="product_length" type="number" class="form-control">
                                    </div>
                                </div>
                                <div class="md-3">
                                    <a href="#">Xóa yêu cầu</a>
                                </div>
                                <div class="float-end">
                                    <button type="submit" class="btn btn-primary">Xác nhận yêu cầu</button>
                                </div>
                            </form>
                        </div>
                    </div> <!-- end card-->
                </div>
                <!-- comments -->
                <div class="col-xl-4">
                    <div class="card">
                        <div class="card-body" style="height: 418px;overflow-y: scroll">
                            <h4 class="mb-4 fs-16">Bình luận về yêu cầu này</h4>
                            @foreach($task->comments as $comment)
                                <div class="row mt-1">
                                    <div class="col">
                                        <div class="d-flex">
                                            <img src="{{asset('admin-asset/assets/images/users/avatar-9.jpg')}}"
                                                 class="me-2 rounded-circle" height="36" alt="Arya Stark">
                                            <div class="flex-grow-1">
                                                <h5 class="mt-0 mb-0 fs-14">
                                                    <span
                                                        class="float-end text-muted fs-12">{{ $comment->created_at }} </span> {{ $comment->member->name }}
                                                </h5>
                                                <p class="mt-1 mb-0 text-muted">
                                                    {{ $comment->content }}
                                                </p>
                                            </div>
                                        </div> <!-- end comment -->
                                        <hr>
                                    </div> <!-- end col -->
                                </div>
                            @endforeach
                        </div>
                        <div class="row mt-1">
                            <div class="col">
                                <div class="border rounded">
                                    <form action="{{route('comment-task', $task->id)}}" class="comment-area-box"
                                          method="POST">
                                        @csrf
                                        <textarea name="comment" rows="3" class="form-control border-0 resize-none"
                                                  placeholder="Your comment..."></textarea>
                                        <div class="p-2 bg-light">
                                            <div class="float-end">
                                                <button type="submit" class="btn btn-sm btn-success">
                                                    Gửi bình luận
                                                </button>
                                            </div>
                                            <div>
                                                <i class="uil uil-message me-1"></i>
                                            </div>
                                        </div>
                                    </form>
                                </div> <!-- end .border-->
                            </div> <!-- end col-->
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
                                    <th>Ngày tạo</th>
                                    <th>Tên yêu cầu</th>
                                    <th>Nhân viên phụ trách</th>
                                    <th>Phòng ban phụ trách</th>

                                    <th>Nguồn</th>
                                    <th>Loại yêu cầu</th>
                                    <th>Thời hạn</th>
                                    <th>Link video nguồn</th>
                                    <th>Mô tả</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($tasks as $task)
                                    <tr>
                                        <td>{{ $task->created_at->format('d/m - h:i') }}</td>
                                        <td><a href="{{route('edit.taskOrder',$task->id)}}">{{ $task->name }}</a></td>
                                        <td>{{ $task->member?->name }}</td>
                                        <td>{{ $task->department->name }}</td>

                                        <td>{{ $task->source }}</td>
                                        <td>{{ $task->type }}</td>
                                        <td>{{ \Illuminate\Support\Carbon::parse($task->deadline)->format('d/m - h:i')}}</td>
                                        <td>{{ $task->url_source }}</td>
                                        <td>{{ $task->content }}</td>
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
