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
                        <h4 class="page-title">{{ $post->subject }}</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Bài viết</a></li>
                                <li class="breadcrumb-item active">Chi tiết</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <!-- form information -->
                <div class="row">
                    <div class="col-xl-8">
                        <div class="card">
                            <div class="card-body">
                                {{--                                        <h6 class="mt-0 header-title">About Project</h6>--}}
                                <div class="row">
                                    <div class="col-8">
                                        @if(Auth::id() === $post->member_id)
                                            <a class="btn btn-primary" href="{{route('post.edit', $post->id)}}">Edit</a>
                                        @endif
                                        <div class="text-muted mt-3">
                                            <p>
                                                {{ $post->content }}
                                            </p>
                                            <div class="tags">
                                                <h6 class="fw-bold">Tags</h6>
                                                <div class="text-uppercase">
                                                    @foreach($post->hashTags as $tag)
                                                        <a href="{{route('post', ['hash-tag-id' => $tag->id])}}"
                                                           class="badge badge-soft-primary me-2"> {{$tag->name}} </a>
                                                    @endforeach
                                                </div>
                                            </div>

                                            <div class="tags">
                                                <h6 class="fw-bold">Phân loại : {{ $post->category->name }}</h6>

                                                <h6 class="fw-bold">Link video : <a
                                                        href="{{ $post->link_video }}">{{ $post->link_video }}</a></h6>

                                                <h6 class="fw-bold">Link driver : <a
                                                        href="{{ $post->link_driver }}">{{ $post->link_driver }}</a>
                                                </h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <img src="{{ "/storage/$post->thumbnail" }}"
                                             style="width: 100%;aspect-ratio: 1 / 1;">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="mb-4 fs-16">Các bài viết chung phân loại</h4>
                                <div class="row mt-1">
                                    @foreach($postSameCategory as $post)
                                        <div class="d-flex my-1">
                                            <div class="text-center me-3 flex-shrink-0">
                                                <div class="avatar-sm">
                                                    @if($post->thumbnail)
                                                        <img src="{{ "/storage/$post->thumbnail" }}"
                                                             style="width: 100%;aspect-ratio: 1 / 1;"
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
                                                <div class="avatar-sm">
                                                    @if($post->thumbnail)
                                                        <img src="{{ "/storage/$post->thumbnail" }}"
                                                             style="width: 100%;aspect-ratio: 1 / 1;"
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
                {{--                <!-- comments -->--}}
                {{--                <!-- end col -->--}}
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
