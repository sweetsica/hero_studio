@extends('admin-template.main.master')

@section('content-page')
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <h4 class="page-title">Project: Landing page Design
                            <span class="badge bg-success fs-13 fw-normal">Completed</span>
                            <span class="badge badge-soft-primary fs-13 fw-normal">Web Design</span>
                        </h4>
                        <div class="page-title-right">
                            <div class="btn-group ms-2 d-none d-sm-inline-block">
                                <button type="button" class="btn btn-soft-primary btn-sm">
                                    <i class="uil uil-edit me-1"></i>Edit
                                </button>
                            </div>
                            <div class="btn-group d-none d-sm-inline-block">
                                <button type="button" class="btn btn-soft-danger btn-sm">
                                    <i class="uil uil-trash-alt me-1"></i>Delete
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-body p-0">
                            <h6 class="card-title border-bottom p-3 mb-0 header-title">Project Overview</h6>
                            <div class="row py-1">
                                <div class="col-xl-3 col-sm-6">
                                    <!-- stat 1 -->
                                    <div class="d-flex p-3">
                                        <i data-feather="grid" class="align-self-center icon-dual icon-lg me-4"></i>
                                        <div class="flex-grow-1">
                                            <h4 class="mt-0 mb-0">210</h4>
                                            <span class="text-muted fs-13">Total Tasks</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-sm-6">
                                    <!-- stat 2 -->
                                    <div class="d-flex p-3">
                                        <i data-feather="check-square" class="align-self-center icon-dual icon-lg me-4"></i>
                                        <div class="flex-grow-1">
                                            <h4 class="mt-0 mb-0">121</h4>
                                            <span class="text-muted">Total Tasks Completed</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-sm-6">
                                    <!-- stat 3 -->
                                    <div class="d-flex p-3">
                                        <i data-feather="users" class="align-self-center icon-dual icon-lg me-4"></i>
                                        <div class="flex-grow-1">
                                            <h4 class="mt-0 mb-0">12</h4>
                                            <span class="text-muted">Total Team Size</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-sm-6">
                                    <!-- stat 3 -->
                                    <div class="d-flex p-3">
                                        <i data-feather="clock" class="align-self-center icon-dual icon-lg me-4"></i>
                                        <div class="flex-grow-1">
                                            <h4 class="mt-0 mb-0">2500</h4>
                                            <span class="text-muted">Total Hours Spent</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- details-->
            <div class="row">
                <div class="col-xl-8">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="mt-0 header-title">About Project</h6>

                            <div class="text-muted mt-3">
                                <p>To an English person, it will seem like simplified English, as a skeptical Cambridge friend of mine told me what Occidental is. The European languages are members of the same family. Their separate existence is a myth.</p>
                                <p>Everyone realizes why a new common language would be desirable: one could refuse to pay expensive translators. To achieve this, it would be necessary to have uniform grammar, pronunciation and more common words. If several languages coalesce, the grammar of the resulting language is more simple and regular than that of the individual languages.</p>
                                <ul class="ps-4 mb-4">
                                    <li>Quis autem vel eum iure</li>
                                    <li>Ut enim ad minima veniam</li>
                                    <li>Et harum quidem rerum</li>
                                    <li>Nam libero cum soluta</li>
                                </ul>

                                <div class="tags">
                                    <h6 class="fw-bold">Tags</h6>
                                    <div class="text-uppercase">
                                        <a href="#" class="badge badge-soft-primary me-2">Html</a>
                                        <a href="#" class="badge badge-soft-primary me-2">Css</a>
                                        <a href="#" class="badge badge-soft-primary me-2">Bootstrap</a>
                                        <a href="#" class="badge badge-soft-primary me-2">JQuery</a>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-6">
                                        <div  class="mt-4">
                                            <p class="mb-2 text-uppercase fs-13 fw-bold"><i class="uil-calender text-danger"></i> Start Date</p>
                                            <h5 class="fs-16">15 July, 2019</h5>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6">
                                        <div class="mt-4">
                                            <p class="mb-2 text-uppercase fs-13 fw-bold"><i class="uil-calendar-slash text-danger"></i> Due Date</p>
                                            <h5 class="fs-16">21 Nov, 2020</h5>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6">
                                        <div class="mt-4">
                                            <p class="mb-2 text-uppercase fs-13 fw-bold"><i class="uil-dollar-alt text-danger"></i> Budget</p>
                                            <h5 class="fs-16">$13,250</h5>
                                        </div>
                                    </div>

                                    <div class="col-lg-3 col-md-6">
                                        <div class="mt-4">
                                            <p class="mb-2 text-uppercase fs-13 fw-bold"><i class="uil-user text-danger"></i> Owner</p>
                                            <h5 class="fs-16">Rick Perry</h5>
                                        </div>
                                    </div>
                                </div>

                                <div class="assign team mt-4">
                                    <h6 class="fw-bold">Assign To</h6>
                                    <a href="javascript: void(0);">
                                        <img src="assets/images/users/avatar-2.jpg" alt="" class="avatar-sm m-1 rounded-circle">
                                    </a>
                                    <a href="javascript: void(0);">
                                        <img src="assets/images/users/avatar-3.jpg" alt="" class="avatar-sm m-1 rounded-circle">
                                    </a>
                                    <a href="javascript: void(0);">
                                        <img src="assets/images/users/avatar-9.jpg" alt="" class="avatar-sm m-1 rounded-circle">
                                    </a>
                                    <a href="javascript: void(0);">
                                        <img src="assets/images/users/avatar-10.jpg" alt="" class="avatar-sm m-1 rounded-circle">
                                    </a>
                                </div>

                                <div class="mt-4">
                                    <h6 class="fw-bold">Attached Files</h6>

                                    <div class="row">
                                        <div class="col-xl-4 col-md-6">
                                            <div class="p-2 border rounded mb-2">
                                                <div class="d-flex">
                                                    <div class="avatar-sm fw-bold me-3 flex-shrink-0">
                                                                    <span class="avatar-title rounded bg-soft-primary text-primary">
                                                                        <i class="uil-file-plus-alt fs-18"></i>
                                                                    </span>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <a href="#" class="d-inline-block mt-2">Landing 1.psd</a>
                                                    </div>
                                                    <div class="float-end mt-1">
                                                        <a href="#" class="p-2"><i class="uil-download-alt fs-18"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-md-6">
                                            <div class="p-2 border rounded mb-2">
                                                <div class="d-flex">
                                                    <div class="avatar-sm fw-bold me-3 flex-shrink-0">
                                                                    <span class="avatar-title rounded bg-soft-primary text-primary">
                                                                        <i class="uil-file-plus-alt fs-18"></i>
                                                                    </span>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <a href="#" class="d-inline-block mt-2">Landing 2.psd</a>
                                                    </div>
                                                    <div class="float-end mt-1">
                                                        <a href="#" class="p-2"><i class="uil-download-alt fs-18"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                    <!-- end card -->
                    <div class="card">
                        <div class="card-body">
                            <div class="">
                                <ul class="nav nav-pills navtab-bg p-1">
                                    <li class="nav-item">
                                        <a href="#comments" data-bs-toggle="tab" aria-expanded="true" class="nav-link active">
                                            Discussions
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#attac-file" data-bs-toggle="tab" aria-expanded="false" class="nav-link">
                                            Files/Resources
                                        </a>
                                    </li>
                                </ul>
                                <div class="tab-content text-muted">
                                    <div class="tab-pane show active" id="comments">
                                        <h5 class="mb-4 pb-1 header-title">Comments (6)</h5>
                                        <div class="d-flex mb-4 fs-14">
                                            <div class="me-3 flex-shrink-0">
                                                <a href="#">
                                                    <img class="d-flex-object rounded-circle avatar-sm" alt="" src="assets/images/users/avatar-2.jpg">
                                                </a>
                                            </div>
                                            <div class="flex-grow-1">
                                                <h5 class="mt-0 fs-15">John Cooks</h5>
                                                <p class="text-muted mb-1">
                                                    <a href="" class="text-danger">@Rick Perry</a>
                                                    Their separate existence is a myth.
                                                </p>
                                                <a href="" class="text-primary">Reply</a>
                                            </div>
                                        </div>
                                        <div class="d-flex mb-4 fs-14">
                                            <div class="me-3 flex-shrink-0">
                                                <a href="#">
                                                    <img class="d-flex-object rounded-circle avatar-sm" alt="" src="assets/images/users/avatar-3.jpg"> </a>
                                            </div>
                                            <div class="flex-grow-1">
                                                <h5 class="mt-0 fs-15">Jayden Dowie</h5>
                                                <p class="text-muted mb-1">
                                                    <a href="" class="text-danger">@Rick Perry</a>
                                                    It will be as simple as occidental in fact be Occidental will seem like simplified.
                                                </p>
                                                <a href="" class="text-primary">Reply</a>

                                                <div class="d-flex mt-3 fs-14">
                                                    <div class="flex-shrink-0 me-3">
                                                        <a href="#">
                                                            <div class="avatar-sm fw-bold d-inline-block m-1">
                                                                <span class="avatar-title rounded-circle bg-soft-primary text-primary">R</span>
                                                            </div>
                                                        </a>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <h5 class="mt-0 fs-15">Ray Roberts</h5>
                                                        <p class="text-muted mb-0">
                                                            <a href="" class="text-danger">@Rick Perry</a>
                                                            Cras sit amet nibh libero.
                                                        </p>
                                                        <a href="" class="text-primary">Reply</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-flex mb-4 fs-14">
                                            <div class="flex-shrink-0 me-3">
                                                <a href="#">
                                                    <img class="d-flex-object rounded-circle avatar-sm" alt="" src="assets/images/users/avatar-2.jpg">
                                                </a>
                                            </div>
                                            <div class="flex-grow-1">
                                                <h5 class="mt-0 fs-15">John Cooks</h5>
                                                <p class="text-muted">
                                                    <a href="" class="text-danger">@Rick Perry</a>
                                                    Itaque earum rerum hic
                                                </p>
                                                <div class="p-2 border rounded mb-2">
                                                    <div class="d-flex">
                                                        <div class="avatar-sm fw-bold me-3 flex-shrink-0">
                                                                        <span class="avatar-title rounded bg-soft-primary text-primary">
                                                                            <i class="uil-file-plus-alt fs-18"></i>
                                                                        </span>
                                                        </div>
                                                        <div class="flex-grow-1">
                                                            <a href="#" class="d-inline-block mt-2">Landing 1.psd</a>
                                                        </div>
                                                        <div class="float-end mt-1">
                                                            <a href="#" class="p-2">
                                                                <i class="uil-download-alt fs-18"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <a href="" class="text-primary">Reply</a>
                                            </div>
                                        </div>
                                        <div class="d-flex">
                                            <div class="me-3 flex-shrink-0">
                                                <a href="#">
                                                    <img class="d-flex-object rounded-circle avatar-sm" alt="" src="assets/images/users/avatar-1.jpg">
                                                </a>
                                            </div>
                                            <div class="flex-grow-1">
                                                <input type="text" class="form-control input-sm" placeholder="Some text value...">
                                            </div>
                                        </div>

                                    </div>
                                    <div class="tab-pane" id="attac-file">
                                        <h5 class="mb-3">Attached Files :</h5>
                                        <div>
                                            <div class="p-2 border rounded mb-3">
                                                <div class="d-flex">
                                                    <div class="avatar-sm fw-bold me-3 flex-shrink-0">
                                                                    <span class="avatar-title rounded bg-soft-primary text-primary">
                                                                        <i class="uil-file-plus-alt fs-18"></i>
                                                                    </span>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <a href="#" class="d-inline-block mt-2">Landing 1.psd</a>
                                                    </div>
                                                    <div class="float-end mt-1">
                                                        <a href="#" class="p-2">
                                                            <i class="uil-download-alt fs-18"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="p-2 border rounded mb-3">
                                                <div class="d-flex">
                                                    <div class="avatar-sm fw-bold me-3 flex-shrink-0">
                                                                    <span class="avatar-title rounded bg-soft-primary text-primary">
                                                                        <i class="uil-file-plus-alt fs-18"></i>
                                                                    </span>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <a href="#" class="d-inline-block mt-2">Landing 2.psd</a>
                                                    </div>
                                                    <div class="float-end mt-1">
                                                        <a href="#" class="p-2">
                                                            <i class="uil-download-alt fs-18"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="p-2 border rounded mb-3">
                                                <div>
                                                    <a href="#" class="d-inline-block m-1">
                                                        <img src="assets/images/small/img-2.jpg" alt="" class="avatar-lg rounded"></a>
                                                    <a href="#" class="d-inline-block m-1">
                                                        <img src="assets/images/small/img-3.jpg" alt="" class="avatar-lg rounded"></a>
                                                    <a href="#" class="d-inline-block m-1">
                                                        <img src="assets/images/small/img-4.jpg" alt="" class="avatar-lg rounded"></a>
                                                </div>
                                            </div>

                                            <div class="p-2 border rounded mb-3">
                                                <div class="d-flex">
                                                    <div class="avatar-sm fw-bold me-3 flex-shrink-0">
                                                                    <span class="avatar-title rounded bg-soft-primary text-primary">
                                                                        <i class="uil-file-plus-alt fs-18"></i>
                                                                    </span>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <a href="#" class="d-inline-block mt-2">Logo.psd</a>
                                                    </div>
                                                    <div class="float-end mt-1">
                                                        <a href="#" class="p-2">
                                                            <i class="uil-download-alt fs-18"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="p-2 border rounded mb-3">
                                                <div>
                                                    <a href="#" class="d-inline-block m-1">
                                                        <img src="assets/images/small/img-7.jpg" alt="" class="avatar-lg rounded">
                                                    </a>
                                                    <a href="#" class="d-inline-block m-1">
                                                        <img src="assets/images/small/img-6.jpg" alt="" class="avatar-lg rounded">
                                                    </a>
                                                </div>
                                            </div>

                                            <div class="p-2 border rounded mb-3">
                                                <div class="d-flex">
                                                    <div class="avatar-sm fw-bold me-3 flex-shrink-0">
                                                                    <span class="avatar-title rounded bg-soft-primary text-primary">
                                                                        <i class="uil-file-plus-alt fs-18"></i>
                                                                    </span>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <a href="#" class="d-inline-block mt-2">Clients.psd</a>
                                                    </div>
                                                    <div class="float-end mt-1">
                                                        <a href="#" class="p-2">
                                                            <i class="uil-download-alt fs-18"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="mt-0 header-title">Project Activities</h6>

                            <ul class="list-unstyled activity-widget">
                                <li class="activity-list">
                                    <div class="d-flex">
                                        <div class="text-center me-3 flex-shrink-0">
                                            <div class="avatar-sm">
                                                <span class="avatar-title rounded-circle bg-soft-primary text-primary">09</span>
                                            </div>
                                            <p class="text-muted fs-13 mb-0">Jan</p>
                                        </div>
                                        <div class="flex-grow-1 overflow-hidden">
                                            <h5 class="fs-15 my-1"><a href="#" class="text-dark">Bryan</a></h5>
                                            <p class="text-muted fs-13 text-truncate mb-0">Neque porro quisquam est</p>
                                        </div>
                                    </div>

                                </li>
                                <li class="activity-list">
                                    <div class="d-flex">
                                        <div class="text-center me-3 flex-shrink-0">
                                            <div class="avatar-sm">
                                                <span class="avatar-title rounded-circle bg-soft-success text-success">08</span>
                                            </div>
                                            <p class="text-muted fs-13 mb-0">Jan</p>
                                        </div>
                                        <div class="flex-grow-1 overflow-hidden">
                                            <h5 class="fs-15 my-1"><a href="#" class="text-dark">Everett</a></h5>
                                            <p class="text-muted fs-13 text-truncate mb-0">Ut enim ad minima veniam quis velit</p>
                                        </div>
                                    </div>
                                </li>
                                <li class="activity-list">
                                    <div class="d-flex">
                                        <div class="text-center me-3 flex-shrink-0">
                                            <div class="avatar-sm">
                                                <span class="avatar-title rounded-circle bg-soft-warning text-warning">08</span>
                                            </div>
                                            <p class="text-muted fs-13 mb-0">Jan</p>
                                        </div>
                                        <div class="flex-grow-1 overflow-hidden">
                                            <h5 class="fs-15 my-1"><a href="#" class="text-dark">Richard</a></h5>
                                            <p class="text-muted fs-13 text-truncate mb-0">Quis autem vel eum iure</p>
                                        </div>
                                    </div>
                                </li>
                                <li class="activity-list">
                                    <div class="d-flex">
                                        <div class="text-center me-3 flex-shrink-0">
                                            <div class="avatar-sm">
                                                <span class="avatar-title rounded-circle bg-soft-info text-info"> 08</span>
                                            </div>
                                            <p class="text-muted fs-13 mb-0">Jan</p>
                                        </div>
                                        <div class="flex-grow-1 overflow-hidden">
                                            <h5 class="fs-15 my-1"><a href="#" class="text-dark">Jery</a></h5>
                                            <p class="text-muted fs-13 text-truncate mb-0">Quis autem vel eum iure</p>
                                        </div>
                                    </div>
                                </li>
                                <li class="activity-list">
                                    <div class="d-flex">
                                        <div class="text-center me-3 flex-shrink-0">
                                            <div class="avatar-sm">
                                                <span class="avatar-title rounded-circle bg-soft-primary text-primary">07</span>
                                            </div>
                                            <p class="text-muted fs-13 mb-0">Jan</p>
                                        </div>
                                        <div class="flex-grow-1 overflow-hidden">
                                            <h5 class="fs-15 my-1"><a href="#" class="text-dark">Bryan</a></h5>
                                            <p class="text-muted fs-13 text-truncate mb-0">Neque porro quisquam est</p>
                                        </div>
                                    </div>
                                </li>
                                <li class="activity-list">
                                    <div class="d-flex">
                                        <div class="text-center me-3 flex-shrink-0">
                                            <div class="avatar-sm">
                                                <span class="avatar-title rounded-circle bg-soft-success text-success">06</span>
                                            </div>
                                            <p class="text-muted fs-13 mb-0">Jan</p>
                                        </div>
                                        <div class="flex-grow-1 overflow-hidden">
                                            <h5 class="fs-15 my-1"><a href="#" class="text-dark">Everett</a></h5>
                                            <p class="text-muted fs-13 text-truncate mb-0">Ut enim ad minima veniam quis velit</p>
                                        </div>
                                    </div>
                                </li>
                                <li class="activity-list">
                                    <div class="d-flex">
                                        <div class="text-center me-3 flex-shrink-0">
                                            <div class="avatar-sm">
                                                <span class="avatar-title rounded-circle bg-soft-warning text-warning">05</span>
                                            </div>
                                            <p class="text-muted fs-13 mb-0">Jan</p>
                                        </div>
                                        <div class="flex-grow-1 overflow-hidden">
                                            <h5 class="fs-15 my-1"><a href="#" class="text-dark">Richard</a></h5>
                                            <p class="text-muted fs-13 text-truncate mb-0">Quis autem vel eum iure</p>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                            <div class="text-center">
                                <a href="javascript:void(0);" class="btn btn-sm border btn-white">
                                    <i data-feather="loader" class="icon-dual icon-xs me-2"></i>Load more
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->
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
