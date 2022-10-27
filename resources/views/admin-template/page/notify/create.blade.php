@extends('admin-template.main.master')

@section('content-page')
    <div class="content">
        <!-- Start Content-->
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <h4 class="page-title">Thông báo chung</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-xl-2 col-lg-3 col-6">
                                    <img src="{{asset('admin-asset/assets/images/cal.png')}}" class="me-4 align-self-center img-fluid" alt="cal" />
                                </div>
                                <div class="col-xl-10 col-lg-9">
                                    <div class="mt-4 mt-lg-0">
                                        <h5 class="mt-0 mb-1 fw-bold">Chào mừng tới trung tâm thông báo!</h5>
                                        <p class="text-muted mb-2">
                                            Mọi thông báo ở đây sẽ được truyền tới màn hình của tất cả mọi người
                                        </p>

                                        <button class="btn btn-primary mt-2 me-1" id="btn-new-event" data-bs-toggle="modal" data-bs-target="#event-modal">
                                            <i class="uil-plus-circle"></i> Tạo thông báo mới
                                        </button>
                                        <button class="btn btn-white mt-2" disabled>
                                            <i class="uil-sync"></i> Danh sách các thông báo (đang cập nhật)
                                        </button>
                                    </div>
                                </div>
                            </div>

                        </div> <!-- end card body-->
                    </div> <!-- end card -->
                </div>
                <!-- end col-12 -->
            </div> <!-- end row -->

            <!-- modals -->
            <!-- Add New Event MODAL -->
            <div class="modal fade" id="event-modal" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header py-3 px-4 border-bottom-0 d-block">
                            <button type="button" class="btn-close float-end" data-bs-dismiss="modal" aria-hidden="true"></button>
                            <h5 class="modal-title" id="modal-title">Sự kiện</h5>
                        </div>
                        <div class="modal-body px-4 pb-4">
                            <form class="needs-validation" name="event-form" id="form-event" novalidate action="{{route('noti.save')}}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <div class="mb-3">
                                            <label class="form-label">Tiêu đề thông báo</label>
                                            <input class="form-control" placeholder="Insert Event Name" type="text" name="title" id="event-title" required />
                                            <div class="invalid-feedback">Please provide a valid event name</div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="mb-3">
                                            <label class="form-label">Nội dung thông báo</label>
                                            <input class="form-control" placeholder="Insert Event Name" type="text" name="content" id="event-title" required />
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-2">
{{--                                    <div class="col-6">--}}
{{--                                        <button type="button" class="btn btn-danger" id="btn-delete-event">Delete</button>--}}
{{--                                    </div>--}}
                                    <div class="col-6 text-end">
                                        <button type="button" class="btn btn-light me-1" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-success" id="btn-save-event">Save</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div> <!-- end modal-content-->
                </div> <!-- end modal dialog-->
            </div>
            <!-- end modal-->

        </div> <!-- container -->
    </div>
@endsection
