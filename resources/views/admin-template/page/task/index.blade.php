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
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <a href="{{route('create.taskOrder')}}" class="btn btn-primary">
                                                <i class='uil uil-plus me-1'></i>Thêm mới yêu cầu
                                            </a>
                                        </div>
                                        <div class="col-sm-9">
                                            <div class="float-sm-end mt-3 mt-sm-0">

                                                <div class="task-search d-inline-block mb-3 mb-sm-0 me-sm-1">
                                                    <form>
                                                        <div class="input-group">
                                                            <input type="text" class="form-control search-input" placeholder="Search..." />
                                                            <span class="uil uil-search icon-search"></span>
                                                            <button class="btn btn-soft-primary input-group-text" type="button">
                                                                <i class='uil uil-file-search-alt'></i>
                                                            </button>
                                                        </div>
                                                    </form>
                                                </div>
                                                <div class="dropdown d-inline-block">
                                                    <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class='uil uil-sort-amount-down'></i>
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-end">
                                                        <a class="dropdown-item" href="#">Due Date</a>
                                                        <a class="dropdown-item" href="#">Added Date</a>
                                                        <a class="dropdown-item" href="#">Assignee</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mt-3">
                                        <div class="col">
                                            <a class="text-dark" data-bs-toggle="collapse" href="#todayTasks" aria-expanded="false" aria-controls="todayTasks">
                                                <h5 class="mb-0"><i class='uil uil-angle-down'></i>Today
                                                    <span class="text-muted fs-14">(10)</span>
                                                </h5>
                                            </a>

                                            <div class="collapse show" id="todayTasks">
                                                <div class="card mb-0 border-0">
                                                    <div class="card-body">
{{--                                                        @dd($data)--}}
                                                        @foreach($datas as $data)
                                                            <!-- task -->
                                                            <div class="row justify-content-sm-between border-bottom">
                                                                <div class="col-lg-6 mb-2 mb-lg-0">
                                                                    <div class="form-check">
                                                                        <input type="checkbox" class="form-check-input" id="task1">
                                                                        <label class="form-check-label" for="task1">
                                                                            @if((Auth::user()->getRoleNames())[0]=='editor')
                                                                                <a href="{{route('get.task.id',$data->id)}}">{{$data->name}}</a>
                                                                            @else
                                                                                <a href="{{route('edit.taskOrder',$data->id)}}">{{$data->name}}</a>
                                                                            @endif
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
                                                                                    <i class='uil uil-schedule me-1'></i>{{$data->created_at}}
                                                                                </li>
                                                                                <li class="list-inline-item pe-1">
                                                                                    <i class='uil uil-align-alt me-1'></i>3/7
                                                                                </li>
                                                                                <li class="list-inline-item pe-2">
                                                                                    <i class='uil uil-comment-message me-1'></i>21
                                                                                </li>
                                                                                <li class="list-inline-item">
                                                                                    <span class="badge badge-soft-danger p-1">
                                                                                        @if($data->status_code=1)
                                                                                            Đang chờ nhận
                                                                                        @elseif ($data->status_code=2)
                                                                                            Đang thực hiện
                                                                                        @elseif ($data->status_code=3)
                                                                                            Đã hoàn thành
                                                                                        @else
                                                                                            Cần làm lại
                                                                                        @endif
                                                                                    </span>
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

                                    <div class="row mb-3 mt-4">
                                        <div class="col-12">
                                            <div class="text-center">
                                                <a href="javascript:void(0);" class="btn btn-white mb-3">
                                                    <i data-feather="loader" class="icon-dual icon-xs me-2"></i>Tải thêm
                                                </a>
                                            </div>
                                        </div> <!-- end col-->
                                    </div>
                                    <!-- end row -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- task details -->
                <div class="col-xl-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <div class="dropdown float-end">
                                        <a href="#" class="dropdown-toggle arrow-none text-muted" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class='uil uil-ellipsis-h'></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item">
                                                <i class='uil uil-file-upload me-1'></i>Attachment
                                            </a>
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item">
                                                <i class='uil uil-edit me-1'></i>Edit
                                            </a>
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item">
                                                <i class='uil uil-file-copy-alt me-1'></i>Mark as Duplicate
                                            </a>
                                            <div class="dropdown-divider"></div>
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item text-danger">
                                                <i class='uil uil-trash-alt me-1'></i>Delete
                                            </a>
                                        </div> <!-- end dropdown menu-->
                                    </div> <!-- end dropdown-->

                                    <div class="form-check float-start">
                                        <input type="checkbox" class="form-check-input" id="completedCheck">
                                        <label class="form-check-label" for="completedCheck">
                                            Mark as completed
                                        </label>
                                    </div> <!-- end form-checkbox-->
                                </div>
                            </div>

                            <hr class="my-2" />

                            <div class="row">
                                <div class="col">
                                    <h4 class="mt-0">Draft the new contract document for sales team</h4>

                                    <div class="row">
                                        <div class="col-6">
                                            <!-- assignee -->
                                            <p class="mt-2 mb-1 text-muted">Assigned To</p>
                                            <div class="d-flex">
                                                <img src="assets/images/users/avatar-9.jpg" alt="Arya S" class="rounded-circle me-2" height="24" />
                                                <div class="flex-grow-1">
                                                    <h5 class="mt-1 fs-14">Arya Stark</h5>
                                                </div>
                                            </div>
                                            <!-- end assignee -->
                                        </div> <!-- end col -->

                                        <div class="col-6">
                                            <!-- start due date -->
                                            <p class="mt-2 mb-1 text-muted">Due Date</p>
                                            <div class="d-flex">
                                                <i class='uil uil-schedule text-success me-1'></i>
                                                <div class="flex-grow-1">
                                                    <h5 class="mt-1 fs-14">Today 10am</h5>
                                                </div>
                                            </div>
                                            <!-- end due date -->
                                        </div> <!-- end col -->
                                    </div> <!-- end row -->

                                    <!-- task description -->
                                    <div class="row mt-3">
                                        <div class="col">
                                            <div id="bubble-editor" style="height: 150px;">
                                                <p>This is a task description with markup support</p>
                                                <p><br></p>
                                                <ul>
                                                    <li>Select a text to reveal the toolbar.</li>
                                                    <li>Edit rich document on-the-fly, so elastic!</li>
                                                </ul>
                                                <p><br></p>
                                                <p>End of air-mode area</p>
                                            </div> <!-- end Snow-editor-->
                                        </div> <!-- end col -->
                                    </div>
                                    <!-- end task description -->

                                    <!-- start sub tasks/checklists -->
                                    <h5 class="mt-4 mb-2 fs-15">Checklists/Sub-tasks</h5>
                                    <div class="form-check mt-1">
                                        <input type="checkbox" class="form-check-input" id="checklist1">
                                        <label class="form-check-label strikethrough" for="checklist1">
                                            Find out the old contract documents
                                        </label>
                                    </div>

                                    <div class="form-check mt-1">
                                        <input type="checkbox" class="form-check-input" id="checklist2">
                                        <label class="form-check-label strikethrough" for="checklist2">
                                            Organize meeting sales associates to understand need in detail
                                        </label>
                                    </div>

                                    <div class="form-check mt-1">
                                        <input type="checkbox" class="form-check-input" id="checklist3">
                                        <label class="form-check-label strikethrough" for="checklist3">
                                            Make sure to cover every small details
                                        </label>
                                    </div>
                                    <!-- end sub tasks/checklists -->

                                    <!-- start attachments -->
                                    <h5 class="mt-4 mb-2 fs-16">Attachments</h5>
                                    <div class="card mb-2 shadow-none border">
                                        <div class="p-1 px-2">
                                            <div class="row align-items-center">
                                                <div class="col-auto">
                                                    <img src="assets/images/projects/project-1.jpg" class="avatar-sm rounded" alt="file-image">
                                                </div>
                                                <div class="col ps-0">
                                                    <a href="javascript:void(0);" class="text-muted fw-bold">sales-assets.zip</a>
                                                    <p class="mb-0">2.3 MB</p>
                                                </div>
                                                <div class="col-auto">
                                                    <!-- Button -->
                                                    <a href="javascript:void(0);" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Download" class="btn btn-link text-muted btn-lg p-0">
                                                        <i class='uil uil-cloud-download fs-14'></i>
                                                    </a>
                                                    <a href="javascript:void(0);" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Delete" class="btn btn-link text-danger btn-lg p-0">
                                                        <i class='uil uil-multiply fs-14'></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card mb-2 shadow-none border">
                                        <div class="p-1 px-2">
                                            <div class="row align-items-center">
                                                <div class="col-auto">
                                                    <img src="assets/images/projects/project-2.jpg" class="avatar-sm rounded" alt="file-image">
                                                </div>
                                                <div class="col ps-0">
                                                    <a href="javascript:void(0);" class="text-muted fw-bold">new-contarcts.docx</a>
                                                    <p class="mb-0">1.25 MB</p>
                                                </div>
                                                <div class="col-auto">
                                                    <!-- Button -->
                                                    <a href="javascript:void(0);" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Download" class="btn btn-link text-muted btn-lg p-0">
                                                        <i class='uil uil-cloud-download fs-14'></i>
                                                    </a>
                                                    <a href="javascript:void(0);" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Delete" class="btn btn-link text-danger btn-lg p-0">
                                                        <i class='uil uil-multiply fs-14'></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end attachments -->

                                    <!-- comments -->
                                    <div class="row mt-3">
                                        <div class="col">
                                            <h5 class="mb-2 fs-16">Comments</h5>

                                            <div class="d-flex mt-3 p-1">
                                                <img src="assets/images/users/avatar-9.jpg" class="me-2 rounded-circle" height="36" alt="Arya Stark" />
                                                <div class="flex-grow-1">
                                                    <h5 class="mt-0 mb-0 fs-14">
                                                        <span class="float-end text-muted fs-12">4:30am</span>Arya Stark
                                                    </h5>
                                                    <p class="mt-1 mb-0 text-muted">
                                                        Should I review the last 3 years legal documents as well?
                                                    </p>
                                                </div>
                                            </div> <!-- end comment -->

                                            <hr />

                                            <div class="d-flex p-1">
                                                <img src="assets/images/users/avatar-5.jpg" class="me-2 rounded-circle" height="36" alt="Dominc B" />
                                                <div class="flex-grow-1">
                                                    <h5 class="mt-0 mb-0 fs-14">
                                                        <span class="float-end text-muted fs-12">3:30am</span>Gary Somya
                                                    </h5>
                                                    <p class="mt-1 mb-0 text-muted">
                                                        @Arya FYI..I have created some general guidelines last year.
                                                    </p>
                                                </div>
                                            </div> <!-- end comment-->

                                            <hr />

                                        </div> <!-- end col -->
                                    </div> <!-- end row -->

                                    <div class="row mt-1">
                                        <div class="col">
                                            <div class="border rounded">
                                                <form action="#" class="comment-area-box">
                                                    <textarea rows="3" class="form-control border-0 resize-none" placeholder="Your comment..."></textarea>
                                                    <div class="p-2 bg-light">
                                                        <div class="float-end">
                                                            <button type="submit" class="btn btn-sm btn-success">
                                                                <i class='uil uil-message me-1'></i>Submit
                                                            </button>
                                                        </div>
                                                        <div>
                                                            <a href="#" class="btn btn-sm px-1 btn-light">
                                                                <i class='uil uil-cloud-upload'></i>
                                                            </a>
                                                            <a href="#" class="btn btn-sm px-1 btn-light">
                                                                <i class='uil uil-at'></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div> <!-- end .border-->
                                        </div> <!-- end col-->
                                    </div> <!-- end row-->
                                    <!-- end comments -->
                                </div> <!-- end col -->
                            </div> <!-- end row-->
                        </div> <!-- end card-body -->
                    </div> <!-- end card-->
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
