@extends('admin-template.main.master')

@section('content-page')
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-10">
                    <div class="page-title-box">
                        <h4 class="page-title">Danh sách nhiệm vụ</h4>
                        @if (!Auth::user()->hasRole('editor'))
                            <div class="col-4 text-end">
                                <a href="{{route('create.taskOrder')}}" class="btn btn-primary"> Tạo mới</a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            <!-- end page title -->
            <!-- tasks panel -->
            <div class="row">
                <div class="col-xl-10">
                    <div class="row">
                        <div class="col">
                            <div class="card">
                                <div class="card-body">
                                    <form class="row my-2" action="">
                                        @csrf
                                        <div class="col-3">
                                            @php
                                                $requestFilterBy = request()->input('filter_by', 'created_at');
                                                $requestOrder = request()->input('order', 'desc');
                                                $requestDepartment = request()->input('department_id', null)
                                            @endphp

                                            <select class="form-control" name="filter_by" id="filter_by">
                                                <option
                                                    value="created_at" {{$requestFilterBy === 'created_at' ? 'selected' : ''}}>
                                                    Ngày tạo
                                                </option>
                                                <option value="name" {{$requestFilterBy === 'name' ? 'selected' : ''}}>
                                                    Tên yêu cầu
                                                </option>
                                                <option
                                                    value="product_length" {{$requestFilterBy === 'product_length' ? 'selected' : ''}}>
                                                    Thời lượng
                                                </option>
                                                <option
                                                    value="product_rate" {{$requestFilterBy === 'product_length' ? 'selected' : ''}}>
                                                    Đánh giá
                                                </option>
                                                <option
                                                    value="deadline" {{$requestFilterBy === 'deadline' ? 'selected' : ''}}>
                                                    Hạn chót
                                                </option>
                                            </select>
                                        </div>
                                        <div class="col-3">
                                            <select class="form-control" name="order">
                                                <option value="desc" {{$requestOrder === 'desc' ? 'selected' : '' }}>
                                                    Giảm dần
                                                </option>
                                                <option value="asc" {{$requestOrder === 'asc' ? 'selected' : '' }}>Tăng
                                                    dần
                                                </option>
                                            </select>
                                        </div>
                                        @if(Auth::user()->hasRole('super admin'))
                                            <div class="col-2">
                                                <select class="form-control" name="department_id">
                                                    <option value="">Tất cả</option>
                                                    @foreach($departments as $department)
                                                        <option value="{{$department->id}}"
                                                                @if($department->id == $requestDepartment)  selected @endif> {{$department->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        @endif
                                        <div class="col-2">
                                            <button class="btn btn-primary"> Lọc</button>
                                        </div>
                                    </form>
                                    <div class="table-responsive">
                                        <table class="table m-0">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Task</th>
                                                <th>Người yêu cầu</th>
                                                <th>Người nhận</th>
                                                <th>Thời lượng</th>
                                                <th>Trạng thái</th>
                                                <th>Thời gian hoàn thành</th>
                                                <th>Hạn chót</th>
                                                <th>Đánh giá</th>
                                                <th>Ngày tạo</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($infos as $data)
                                                @if($data->status_code_text == "Đang chờ nhận")
                                                    <tr class="table-active">
                                                @elseif($data->status_code_text == "Đang thực hiện")
                                                    <tr class="table-info">
                                                @elseif($data->status_code_text == "Đã hoàn thành")
                                                    <tr class="table-success">
                                                @else
                                                    <tr class="table-warning">
                                                        @endif
                                                        <th scope="row">{{$loop->index + 1}}</th>
                                                        <td>
                                                            <a href="{{route('edit.taskOrder',$data->id)}}">{{$data->name}}</a>
                                                        </td>
                                                        <td>
                                                            <a href="{{route('member.analytics', $data->creator?->id)}}">{{$data->creator?->name}}</a>
                                                        </td>
                                                        <td>
                                                            @if($data->member)
                                                                <a href="{{route('member.analytics', $data->member?->id)}}">{{$data->member?->name}}</a>
                                                            @else
                                                                {{$data->member?->name}}
                                                            @endif
                                                        </td>
                                                        <td>{{$data->product_length ? "$data->product_length phút " : ""}}</td>
                                                        <td>{{$data->status_code_text}}</td>
                                                        <td>{{$data->completed_at }}</td>
                                                        <td>{{$data->deadline}}</td>
                                                        <td>{{$data->product_rate ? "$data->product_rate sao" : 'Chưa có'}}</td>
                                                        <td>{{ \Illuminate\Support\Carbon::parse($data->created_at)->format('d/m/Y')}}</td>
                                                    </tr>
                                                    @endforeach
                                            </tbody>
                                        </table>
                                    </div>
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
                &copy; Herostudio work track made by Sweetsica</a>
            </div>
            <div class="col-md-6">
            </div>
        </div>
    </div>
@endsection
