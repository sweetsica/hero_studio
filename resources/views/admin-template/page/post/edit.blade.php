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
                        <h4 class="page-title">Bài viết</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Bài viết</a></li>
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
                            <h4 class="header-title mb-4">Thông tin bài viết</h4>
                            <form class="form-horizontal" method="POST" action="{{route('post.edit', $post->id)}}"
                                  enctype="multipart/form-data">
                                @csrf
                                <div class="mb-2 row">
                                    <div class="col-md-12">
                                        <label class="form-label" for="exampleInputEmail1">Tiêu đề</label>
                                        <input value="{{$post->subject}}" name="subject" type="text"
                                               class="form-control"
                                               aria-describedby="emailHelp"
                                               placeholder=""
                                               required>
                                    </div>
                                    <div class="col-md-12 mt-2">
                                        <label class="form-label" for="exampleInputEmail1">Nội dung</label>
                                        <textarea name="content" class="form-control"
                                                  rows="5">{{$post->content}}
                                        </textarea>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6 mb-2">
                                        <div class="col-md-12">
                                            <label class="form-label" for="exampleInputEmail1">Hình minh họa</label>
                                            <input
                                                name="thumbnail"
                                                type="file"
                                                class="form-control"
                                                accept="image/*"
                                                onchange="loadFile(event)"
                                            >
                                        </div>
                                        <div class="col-md-12 mt-2">
                                            <label class="form-label" for="exampleInputEmail1">Phân loại</label>
                                            <select name="category_id" class="form-select" name="type" required>
                                                @foreach($categories as $category)
                                                    <option
                                                        @if($category->id === $post->category_id) selected @endif
                                                        value="{{$category->id}}"
                                                    >{{ucfirst($category->name)}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-12 mt-2">
                                            <label class="form-label" for="exampleInputEmail1">Hash tag</label>
                                            <input value="{{$post->hash_tags}}" type="text" name="hash_tag" class="form-text form-control">
                                            <small id="emailHelp" class="form-text text-muted">Tên mỗi hash tag cách
                                                nhau bằng dấu cách</small>
                                        </div>
                                    </div>
                                    <div class="col-6 mt-2">
                                        <img id="output" style="width: 200px; height: 200px" src="/storage/{{$post->thumbnail}}"/>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6 mb-2">
                                        <label class="form-label" for="exampleInputEmail1">Link video</label>
                                        <input value="{{$post->link_video}}" name="link_video" type="text" class="form-control"
                                               aria-describedby="emailHelp" placeholder="" required>
                                        <small id="emailHelp" class="form-text text-muted">(Kiểm tra lại quyền chia sẻ
                                            với link google driver)</small>
                                    </div>
                                    <div class="col-6 mb-2">
                                        <label class="form-label" for="exampleInputEmail1">Link driver</label>
                                        <input value="{{$post->link_driver}}" name="link_driver" type="text" class="form-control"
                                               aria-describedby="emailHelp" placeholder="" required>
                                        <small id="emailHelp" class="form-text text-muted">(Kiểm tra lại quyền chia sẻ
                                            với
                                            link google driver)</small>
                                    </div>
                                </div>
                                <div class="float-end">
                                    <button type="submit" class="btn btn-primary">Gửi bài viết</button>
                                </div>
                            </form>
                        </div>
                    </div> <!-- end card-->
                </div>
                <div class="col-xl-4">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="mb-4 fs-16">Các bài viết chung phân loại</h4>
                            <div class="row mt-1">
                                @foreach($postSameCategory as $post)
                                    <div class="d-flex my-1">
                                        <div class="text-center me-3 flex-shrink-0">
                                            <div style="width: 9rem;aspect-ratio: 2">
                                                @if($post->thumbnail)
                                                    <img src="{{ "/storage/$post->thumbnail" }}"
                                                         style="width: 100%;;height: 100%"
                                                         alt="Post Thumbnail">
                                                @else
                                                    <span
                                                        class="avatar-title bg-soft-primary text-primary">{{ substr($post->subject, 0, 1) }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="flex-grow-1 overflow-hidden">
                                            <h5 class="fs-15 my-1"><a href="{{ route('post.detail', $post->id) }}"
                                                                      class="text-dark"> {{ $post->subject }}</a>
                                            </h5>
                                            <p class="text-muted fs-13 text-truncate mb-0"> {{$post->content }}</p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            <div style="border-bottom: 1px solid"></div>

                            <h4 class="mt-2 mb-4 fs-16">Các bài viết giống hashtag</h4>
                            <div class="row">
                                @foreach($postHaveSameTags as $post)
                                    <div class="d-flex my-1">
                                        <div class="text-center me-3 flex-shrink-0">
                                            <div style="width: 9rem;aspect-ratio: 2">
                                                @if($post->thumbnail)
                                                    <img src="{{ "/storage/$post->thumbnail" }}"
                                                         style="width: 100%;;height: 100%"
                                                         alt="Post Thumbnail">
                                                @else
                                                    <span
                                                        class="avatar-title bg-soft-primary text-primary">{{ substr($post->subject, 0, 1) }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="flex-grow-1 overflow-hidden">
                                            <h5 class="fs-15 my-1"><a href="{{ route('post.detail', $post->id) }}"
                                                                      class="text-dark"> {{ $post->subject }}</a>
                                            </h5>
                                            <p class="text-muted fs-13 text-truncate mb-0"> {{$post->content }}</p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->

            {{--            <div class="row">--}}
            {{--                <div class="col-12">--}}
            {{--                    <div class="card">--}}
            {{--                        <div class="card-body">--}}
            {{--                            <h4 class="header-title mt-0 mb-1">Danh sách task</h4>--}}
            {{--                            <p class="sub-header">--}}

            {{--                            </p>--}}

            {{--                            <table id="basic-datatable" class="table dt-responsive nowrap w-100">--}}
            {{--                                <thead>--}}
            {{--                                <tr>--}}
            {{--                                    <th>Tên bài viết</th>--}}
            {{--                                    <th>Nhân viên phụ trách</th>--}}
            {{--                                    <th>Phòng ban phụ trách</th>--}}
            {{--                                    <th>Mô tả</th>--}}
            {{--                                    <th>Nguồn</th>--}}
            {{--                                    <th>Loại bài viết</th>--}}
            {{--                                    <th>Link video nguồn</th>--}}
            {{--                                    <th>Thời hạn</th>--}}
            {{--                                    <th>Ngày tạo</th>--}}
            {{--                                </tr>--}}
            {{--                                </thead>--}}
            {{--                                <tbody>--}}
            {{--                                @foreach($tasks as $task)--}}
            {{--                                    <tr>--}}
            {{--                                        <td><a href="{{route('edit.taskOrder',$task->id)}}">{{ $task->name }}</a></td>--}}
            {{--                                        <td>{{ $task->member?->name }}</td>--}}
            {{--                                        <td>{{ $task->department->name }}</td>--}}
            {{--                                        <td>{{ $task->content }}</td>--}}
            {{--                                        <td>{{ $task->source }}</td>--}}
            {{--                                        <td>{{ $task->type }}</td>--}}
            {{--                                        <td>{{ $task->url_source }}</td>--}}
            {{--                                        <td>{{ $task->deadline }}</td>--}}
            {{--                                        <td>{{ $task->created_at }}</td>--}}
            {{--                                    </tr>--}}
            {{--                                @endforeach--}}
            {{--                                </tbody>--}}
            {{--                            </table>--}}

            {{--                        </div> <!-- end card body-->--}}
            {{--                    </div> <!-- end card -->--}}
            {{--                </div><!-- end col-->--}}
            {{--            </div>--}}
        </div> <!-- content -->

    </div> <!-- content -->
@endsection

@section('content-js')
    <script src="{{ asset('admin-asset/assets/js/vendor.min.js') }}"></script>

    <!-- optional plugins -->
    <script src="{{ asset('admin-asset/assets/libs/moment/min/moment.min.js') }}"></script>
    <script src="{{ asset('admin-asset/assets/libs/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('admin-asset/assets/libs/flatpickr/flatpickr.min.js') }}"></script>
    <!-- page js -->
    <script src="{{ asset('admin-asset/assets/js/pages/widgets.init.js') }}"></script>

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

    <script src="{{ asset('admin-asset/assets/js/pages/datatables.init.js') }}"></script>
    <script>
        var loadFile = function (event) {
            var output = document.getElementById('output');
            output.src = URL.createObjectURL(event.target.files[0]);
            output.onload = function () {
                URL.revokeObjectURL(output.src) // free memory
            }
        };
    </script>
@endsection
