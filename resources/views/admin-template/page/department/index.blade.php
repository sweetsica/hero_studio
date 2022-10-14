@extends('admin-template.main.master')

@section('content-page')
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <h4 class="page-title">Projects List</h4>
                        <div class="page-title-right">
                            <div class="mt-2 mt-md-0">
                                <button type="button" class="btn btn-danger me-4 mb-2 mb-md-0">
                                    <i class="uil-plus me-1"></i> Create Project
                                </button>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-primary mb-2 mb-md-0">All</button>
                                </div>
                                <div class="btn-group ms-md-1">
                                    <button type="button" class="btn btn-white mb-2 mb-md-0">Ongoing</button>
                                    <button type="button" class="btn btn-white mb-2 mb-md-0">Finished</button>
                                </div>
                                <div class="btn-group ms-2 d-none d-sm-inline-block">
                                    <button type="button" class="btn btn-primary">
                                        <i class="uil uil-apps"></i>
                                    </button>
                                </div>
                                <div class="btn-group d-none d-sm-inline-block">
                                    <button type="button" class="btn btn-white">
                                        <i class="uil uil-align-left-justify"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-xl-4 col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="badge bg-success float-end">Completed</div>
                            <p class="text-success text-uppercase fs-12 mb-2">Web Design</p>
                            <h5><a href="#" class="text-dark">Landing page Design</a></h5>
                            <p class="text-muted mb-4">If several languages coalesce, the grammar of the resulting language is more regular.</p>

                            <div>
                                <a href="javascript: void(0);">
                                    <img src="assets/images/users/avatar-2.jpg" alt="" class="avatar-sm m-1 rounded-circle">
                                </a>
                                <a href="javascript: void(0);">
                                    <img src="assets/images/users/avatar-3.jpg" alt="" class="avatar-sm m-1 rounded-circle">
                                </a>
                            </div>
                        </div>
                        <div class="card-body border-top">
                            <div class="row align-items-center">
                                <div class="col-sm-auto">
                                    <ul class="list-inline mb-0">
                                        <li class="list-inline-item pe-2">
                                            <a href="#" class="text-muted d-inline-block" data-bs-toggle="tooltip" data-bs-placement="top" title="Due date">
                                                <i class="uil uil-calender me-1"></i> 15 Dec
                                            </a>
                                        </li>
                                        <li class="list-inline-item pe-2">
                                            <a href="#" class="text-muted d-inline-block" data-bs-toggle="tooltip" data-bs-placement="top" title="Tasks">
                                                <i class="uil uil-bars me-1"></i> 56
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="#" class="text-muted d-inline-block" data-bs-toggle="tooltip" data-bs-placement="top" title="Comments">
                                                <i class="uil uil-comments-alt me-1"></i> 224
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col offset-sm-1">
                                    <div class="progress mt-4 mt-sm-0" style="height: 5px;" data-bs-toggle="tooltip" data-bs-placement="top" title="100% completed">
                                        <div class="progress-bar bg-success" role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end card -->
                </div>

                <div class="col-xl-4 col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="badge bg-warning float-end">Pending</div>
                            <p class="text-warning text-uppercase fs-12 mb-2">Android</p>
                            <h5><a href="#" class="text-dark">App Design and Develop</a></h5>
                            <p class="text-muted mb-4">To achieve this, it would be necessary to have uniform grammar and more common words.</p>

                            <div>
                                <a href="javascript: void(0);">
                                    <img src="assets/images/users/avatar-4.jpg" alt="" class="avatar-sm m-1 rounded-circle">
                                </a>
                                <a href="javascript: void(0);">
                                    <img src="assets/images/users/avatar-5.jpg" alt="" class="avatar-sm m-1 rounded-circle">
                                </a>
                                <a href="javascript: void(0);">
                                    <div class="avatar-sm fw-bold d-inline-block m-1">
                                        <span class="avatar-title rounded-circle bg-soft-warning text-warning">2+</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="card-body border-top">
                            <div class="row align-items-center">
                                <div class="col-sm-auto">
                                    <ul class="list-inline mb-0">
                                        <li class="list-inline-item pe-2">
                                            <a href="#" class="text-muted d-inline-block" data-bs-toggle="tooltip" data-bs-placement="top" title="Due date">
                                                <i class="uil uil-calender me-1"></i> 28 Nov
                                            </a>
                                        </li>
                                        <li class="list-inline-item pe-2">
                                            <a href="#" class="text-muted d-inline-block" data-bs-toggle="tooltip" data-bs-placement="top" title="Tasks">
                                                <i class="uil uil-bars me-1"></i> 62
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="#" class="text-muted d-inline-block" data-bs-toggle="tooltip" data-bs-placement="top" title="Comments">
                                                <i class="uil uil-comments-alt me-1"></i> 196
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col offset-sm-1">
                                    <div class="progress mt-4 mt-sm-0" style="height: 5px;" data-bs-toggle="tooltip" data-bs-placement="top" title="72% completed">
                                        <div class="progress-bar bg-warning" role="progressbar" style="width: 72%;" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end card -->
                </div>

                <div class="col-xl-4 col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="badge bg-success float-end">Completed</div>
                            <p class="text-success text-uppercase fs-12 mb-2">Web Design</p>
                            <h5><a href="#" class="text-dark">New Admin Design</a></h5>
                            <p class="text-muted mb-4">To an English person, it will seem like simplified english, as a skeptical Cambridge.</p>

                            <div>
                                <a href="javascript: void(0);">
                                    <div class="avatar-sm fw-bold d-inline-block m-1">
                                        <span class="avatar-title rounded-circle bg-soft-primary text-primary">H</span>
                                    </div>
                                </a>
                                <a href="javascript: void(0);">
                                    <img src="assets/images/users/avatar-7.jpg" alt="" class="avatar-sm m-1 rounded-circle">
                                </a>
                            </div>
                        </div>
                        <div class="card-body border-top">
                            <div class="row align-items-center">
                                <div class="col-sm-auto">
                                    <ul class="list-inline mb-0">
                                        <li class="list-inline-item pe-2">
                                            <a href="#" class="text-muted d-inline-block" data-bs-toggle="tooltip" data-bs-placement="top" title="Due date">
                                                <i class="uil uil-calender me-1"></i> 19 Nov
                                            </a>
                                        </li>
                                        <li class="list-inline-item pe-2">
                                            <a href="#" class="text-muted d-inline-block" data-bs-toggle="tooltip" data-bs-placement="top" title="Tasks">
                                                <i class="uil uil-bars me-1"></i> 69
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="#" class="text-muted d-inline-block" data-bs-toggle="tooltip" data-bs-placement="top" title="Comments">
                                                <i class="uil uil-comments-alt me-1"></i> 201
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col offset-sm-1">
                                    <div class="progress mt-4 mt-sm-0" style="height: 5px;" data-bs-toggle="tooltip" data-bs-placement="top" title="100% completed" >
                                        <div class="progress-bar bg-success" role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end card -->
                </div>

                <div class="col-xl-4 col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="badge bg-warning float-end">Pending</div>
                            <p class="text-warning text-uppercase fs-12 mb-2">Android</p>
                            <h5><a href="#" class="text-dark">Custom Software Development</a></h5>
                            <p class="text-muted mb-4">Their separate existence is a myth. For science, music, sport, etc uses the vocabulary</p>

                            <div>
                                <a href="javascript: void(0);">
                                    <img src="assets/images/users/avatar-6.jpg" alt="" class="avatar-sm m-1 rounded-circle">
                                </a>
                                <a href="javascript: void(0);">
                                    <div class="avatar-sm fw-bold d-inline-block m-1">
                                        <span class="avatar-title rounded-circle bg-soft-danger text-danger">K</span>
                                    </div>
                                </a>
                                <a href="javascript: void(0);">
                                    <img src="assets/images/users/avatar-7.jpg" alt="" class="avatar-sm m-1 rounded-circle">
                                </a>

                            </div>
                        </div>
                        <div class="card-body border-top">
                            <div class="row align-items-center">
                                <div class="col-sm-auto">
                                    <ul class="list-inline mb-0">
                                        <li class="list-inline-item pe-2">
                                            <a href="#" class="text-muted d-inline-block" data-bs-toggle="tooltip" data-bs-placement="top" title="Due date">
                                                <i class="uil uil-calender me-1"></i> 02 Nov
                                            </a>
                                        </li>
                                        <li class="list-inline-item pe-2">
                                            <a href="#" class="text-muted d-inline-block" data-bs-toggle="tooltip" data-bs-placement="top" title="Tasks">
                                                <i class="uil uil-bars me-1"></i> 72
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="#" class="text-muted d-inline-block" data-bs-toggle="tooltip" data-bs-placement="top" title="Comments">
                                                <i class="uil uil-comments-alt me-1"></i> 184
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col offset-sm-1">
                                    <div class="progress mt-4 mt-sm-0" style="height: 5px;" data-bs-toggle="tooltip" data-bs-placement="top" title="60% completed">
                                        <div class="progress-bar bg-warning" role="progressbar" style="width: 60%;" aria-valuenow="60" aria-valuemin="0" aria-valuemax="60"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end card -->
                </div>
                <div class="col-xl-4 col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="badge bg-success float-end">Completed</div>
                            <p class="text-success text-uppercase fs-12 mb-2">Web Design</p>
                            <h5><a href="#" class="text-dark">Brand logo design</a></h5>
                            <p class="text-muted mb-4">Everyone realizes why a new common language refuse to pay expensive translators.</p>

                            <div>
                                <a href="javascript: void(0);">
                                    <div class="avatar-sm fw-bold d-inline-block m-1">
                                        <span class="avatar-title rounded-circle bg-soft-success text-success">D</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="card-body border-top">
                            <div class="row align-items-center">
                                <div class="col-sm-auto">
                                    <ul class="list-inline mb-0">
                                        <li class="list-inline-item pe-2">
                                            <a href="#" class="text-muted d-inline-block" data-bs-toggle="tooltip" data-bs-placement="top" title="Due date">
                                                <i class="uil uil-calender me-1"></i> 13 Oct
                                            </a>
                                        </li>
                                        <li class="list-inline-item pe-2">
                                            <a href="#" class="text-muted d-inline-block" data-bs-toggle="tooltip" data-bs-placement="top" title="Tasks">
                                                <i class="uil uil-bars me-1"></i> 64
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="#" class="text-muted d-inline-block" data-bs-toggle="tooltip" data-bs-placement="top" title="Comments">
                                                <i class="uil uil-comments-alt me-1"></i> 173
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col offset-sm-1">
                                    <div class="progress mt-4 mt-sm-0" style="height: 5px;" data-bs-toggle="tooltip" data-bs-placement="top" title="100% completed">
                                        <div class="progress-bar bg-success" role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end card -->
                </div>

                <div class="col-xl-4 col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="badge bg-success float-end">Completed</div>
                            <p class="text-success text-uppercase fs-12 mb-2">Web Design</p>
                            <h5><a href="#" class="text-dark">Website Redesign</a></h5>
                            <p class="text-muted mb-4">The languages only differ in their grammar pronunciation and their most common words.</p>

                            <div>
                                <a href="javascript: void(0);">
                                    <img src="assets/images/users/avatar-9.jpg" alt="" class="avatar-sm m-1 rounded-circle">
                                </a>
                                <a href="javascript: void(0);">
                                    <img src="assets/images/users/avatar-10.jpg" alt="" class="avatar-sm m-1 rounded-circle">
                                </a>
                            </div>
                        </div>
                        <div class="card-body border-top">
                            <div class="row align-items-center">
                                <div class="col-sm-auto">
                                    <ul class="list-inline mb-0">
                                        <li class="list-inline-item pe-2">
                                            <a href="#" class="text-muted d-inline-block" data-bs-toggle="tooltip" data-bs-placement="top" title="Due date">
                                                <i class="uil uil-calender me-1"></i> 11 Oct
                                            </a>
                                        </li>
                                        <li class="list-inline-item pe-2">
                                            <a href="#" class="text-muted d-inline-block" data-bs-toggle="tooltip" data-bs-placement="top" title="Tasks">
                                                <i class="uil uil-bars me-1"></i> 71
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="#" class="text-muted d-inline-block" data-bs-toggle="tooltip" data-bs-placement="top" title="Comments">
                                                <i class="uil uil-comments-alt me-1"></i> 163
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col offset-sm-1">
                                    <div class="progress mt-4 mt-sm-0" style="height: 5px;" data-bs-toggle="tooltip" data-bs-placement="top" title="100% completed">
                                        <div class="progress-bar bg-success" role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end card -->
                </div>
            </div>
            <!-- end row -->

            <div class="row mb-3 mt-2">
                <div class="col-12">
                    <div class="text-center">
                        <a href="javascript:void(0);" class="btn btn-white">
                            <i data-feather="loader" class="icon-dual icon-xs me-2"></i>
                            Load more
                        </a>
                    </div>
                </div> <!-- end col-->
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
