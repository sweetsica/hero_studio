@extends('admin-template.main.master')

@section('content-page')
    <div class="content">
        <!-- Start Content-->
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <h4 class="page-title">Compose Email</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Shreyu</a></li>
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Email</a></li>
                                <li class="breadcrumb-item active">Compose Email</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page title -->
            <!-- compose -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="email-container">
                        <!-- Left sidebar -->
                        <div class="inbox-leftbar">
                            <a href="{{ route('post.create') }}" class="btn btn-danger d-block">Tạo mới</a>
                            <h6 class="mt-4">Category</h6>
                            <div class="mt-2">
                                @foreach($categories as $category)
                                    <a href="javascript:updateCurrentParam('category-id', '{{$category->id}}')" class="list-group-item border-0 fw-bold">
                                        {{ ucfirst($category->name) }}
                                    </a>
                                @endforeach
                            </div>

                            <h6 class="mt-4">Hot hashtag</h6>
                            <div class="list-group b-0 mail-list">
                                @foreach($hashTags as $hashTag)
                                    <a href="javascript:updateCurrentParam('hash-tag-id', '{{$hashTag->id}}')"
                                       class="list-group-item border-0 fw-bold">
                                        {{ ucfirst($hashTag->name) }}
                                    </a>
                                @endforeach
                            </div>

                        </div>
                        <!-- End Left sidebar -->
                        <div class="inbox-rightbar p-4">
                            <div class="row">
                                <div class="card-body">
                                    @foreach($posts as $post)
                                        <div class="d-flex {{ $loop->index !== 0 ? 'mt-1 border-top' : '' }} pt-2">
                                            <img src="{{ "/storage/$post->thumbnail" }}" class="avatar rounded me-3">
                                            <div class="flex-grow-1">
                                                <a class="mt-1 mb-0 fs-15"
                                                   href="{{ route('post.detail', $post->id) }}">{{$post->subject}}</a>
                                                <h6 class="text-muted fw-normal mt-1 mb-2">{{$post->content}}</h6>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            {{ $posts->links('vendor.pagination.bootstrap-4') }}
                        </div>
                        <!-- end inbox-right bar-->

                        <div class="clearfix"></div>
                    </div>
                </div> <!-- end Col -->

            </div><!-- End row -->
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

@push('custom-js')
    <script>
        function updateCurrentParam(key, value) {
            var queryParams = new URLSearchParams(window.location.search);
            if (queryParams.get(key) === value) {
                queryParams.delete(key);
            } else {
                queryParams.set(key, value);
            }

            window.location.href = window.location.origin + window.location.pathname + "?" + queryParams.toString();
        }
    </script>
@endpush
