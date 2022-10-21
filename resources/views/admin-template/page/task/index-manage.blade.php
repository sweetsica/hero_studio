@extends('admin-template.main.master')

@section('content-page')
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <h4 class="page-title">Profile</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Shreyu</a></li>
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Pages</a></li>
                                <li class="breadcrumb-item active">Profile</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-lg-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="text-center mt-2">
                                <img src="assets/images/users/avatar-7.jpg" alt="" class="avatar-lg rounded-circle" />
                                <h4 class="mt-2 mb-0">Shreyu N</h4>
                                <h6 class="text-muted fw-normal mt-2 mb-0">User Experience Specialist</h6>
                                <h6 class="text-muted fw-normal mt-1 mb-3">San Francisco, CA</h6>

                                <div class="progress mb-3" style="height: 14px;">
                                    <div class="progress-bar bg-success" role="progressbar" style="width: 60%;" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100">
                                                    <span class="fs-12 fw-bold">Your Profile is
                                                    <span class="fs-11">60%</span> completed</span>
                                    </div>
                                </div>

                                <button type="button" class="btn btn-primary btn-sm me-1">Follow</button>
                                <button type="button" class="btn btn-white btn-sm">Message</button>
                            </div>

                            <!-- profile  -->
                            <div class="mt-4 pt-2 border-top">
                                <h4 class="mb-3 fs-15">About</h4>
                                <p class="text-muted mb-3">
                                    Hi I'm Shreyu. I am user experience and user interface designer.
                                    I have been working on UI & UX since last 10 years.
                                </p>
                            </div>
                            <div class="mt-3 pt-2 border-top">
                                <h4 class="mb-2 fs-15">Contact Information</h4>
                                <div class="table-responsive">
                                    <table class="table table-borderless mb-0 text-muted">
                                        <tbody>
                                        <tr>
                                            <th scope="row">Email</th>
                                            <td>xyz123@gmail.com</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Phone</th>
                                            <td>(123) 123 1234</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Address</th>
                                            <td>1975 Boring Lane, San Francisco, California, United States - 94108</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="mt-2 pt-2 border-top">
                                <h4 class="mb-3 fs-15">Skills</h4>
                                <label class="badge badge-soft-primary">UI design</label>
                                <label class="badge badge-soft-primary">UX</label>
                                <label class="badge badge-soft-primary">Sketch</label>
                                <label class="badge badge-soft-primary">Photoshop</label>
                                <label class="badge badge-soft-primary">Frontend</label>
                            </div>
                        </div>
                    </div>
                    <!-- end card -->

                </div>

                <div class="col-lg-9">
                    <div class="card">
                        <div class="card-body">
                            <ul class="nav nav-pills navtab-bg nav-justified p-1" id="pills-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="pills-activity-tab" data-bs-toggle="pill" href="#pills-activity" role="tab" aria-controls="pills-activity" aria-selected="true">
                                        Activity
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="pills-messages-tab" data-bs-toggle="pill" href="#pills-messages" role="tab" aria-controls="pills-messages" aria-selected="false">
                                        Messages
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="pills-projects-tab" data-bs-toggle="pill" href="#pills-projects" role="tab" aria-controls="pills-projects" aria-selected="false">
                                        Projects
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="pills-tasks-tab" data-bs-toggle="pill" href="#pills-tasks" role="tab" aria-controls="pills-tasks" aria-selected="false">
                                        Tasks
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="pills-files-tab" data-bs-toggle="pill" href="#pills-files" role="tab" aria-controls="pills-files" aria-selected="false">
                                        Files
                                    </a>
                                </li>
                            </ul>

                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="pills-activity" role="tabpanel" aria-labelledby="pills-activity-tab">
                                    <h5 class="mt-1">This Week</h5>
                                    <div class="left-timeline mt-3 mb-3 ps-3">
                                        <ul class="list-unstyled events mb-0">
                                            <li class="event-list">
                                                <div class="pb-4">
                                                    <div class="d-flex">
                                                        <div class="event-date text-center me-4 flex-shrink-0">
                                                            <div class="bg-soft-primary p-1 rounded text-primary fs-14">02 hours ago</div>
                                                        </div>
                                                        <div class="flex-grow-1">
                                                            <h6 class="fs-15 mt-0 mb-1">Designing Shreyu Admin</h6>
                                                            <p class="text-muted fs-14">Shreyu Admin - A responsive admin and dashboard template</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="event-list">
                                                <div class="pb-4">
                                                    <div class="d-flex">
                                                        <div class="event-date text-center me-4 flex-shrink-0">
                                                            <div class="bg-soft-primary p-1 rounded text-primary fs-14">21 hours ago</div>
                                                        </div>
                                                        <div class="flex-grow-1">
                                                            <h6 class="fs-15 mt-0 mb-1">UX and UI for Ubold Admin</h6>
                                                            <p class="text-muted fs-14">Ubold Admin - A responsive admin and dashboard template</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="event-list">
                                                <div class="pb-4">
                                                    <div class="d-flex">
                                                        <div class="event-date text-center me-4 flex-shrink-0">
                                                            <div class="bg-soft-primary p-1 rounded text-primary fs-14"> 22 hours ago</div>
                                                        </div>
                                                        <div class="flex-grow-1">
                                                            <h6 class="fs-15 mt-0 mb-1">UX and UI for Hyper Admin</h6>
                                                            <p class="text-muted fs-14">Hyper Admin - A responsive admin and dashboard template</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>

                                    <h5 class="mt-4">Last Week</h5>
                                    <div class="left-timeline mt-3 ps-3">
                                        <ul class="list-unstyled events mb-0">
                                            <li class="event-list">
                                                <div class="pb-4">
                                                    <div class="d-flex">
                                                        <div class="event-date text-center me-4 flex-shrink-0">
                                                            <div class="bg-soft-primary p-1 rounded text-primary fs-14">02 hours ago</div>
                                                        </div>
                                                        <div class="flex-grow-1">
                                                            <h6 class="fs-15 mt-0 mb-1">Designing Shreyu Admin</h6>
                                                            <p class="text-muted fs-14">Shreyu Admin - A responsive admin and dashboard template</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="event-list">
                                                <div class="pb-4">
                                                    <div class="d-flex">
                                                        <div class="event-date text-center me-4 flex-shrink-0">
                                                            <div class="bg-soft-primary p-1 rounded text-primary fs-14">21 hours ago</div>
                                                        </div>
                                                        <div class="flex-grow-1">
                                                            <h6 class="fs-15 mt-0 mb-1">UX and UI for Ubold Admin</h6>
                                                            <p class="text-muted fs-14">Ubold Admin - A responsive admin and dashboard template</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="event-list">
                                                <div class="pb-4">
                                                    <div class="d-flex">
                                                        <div class="event-date text-center me-4 flex-shrink-0">
                                                            <div class="bg-soft-primary p-1 rounded text-primary fs-14">22 hours ago</div>
                                                        </div>
                                                        <div class="flex-grow-1">
                                                            <h6 class="fs-15 mt-0 mb-1">UX and UI for Hyper Admin</h6>
                                                            <p class="text-muted fs-14">Hyper Admin - A responsive admin and dashboard template</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>

                                    <h5 class="mt-4">Last Month</h5>
                                    <div class="left-timeline mt-3 ps-3">
                                        <ul class="list-unstyled events mb-0">
                                            <li class="event-list">
                                                <div class="pb-4">
                                                    <div class="d-flex">
                                                        <div class="event-date text-center me-4 flex-shrink-0">
                                                            <div class="bg-soft-primary p-1 rounded text-primary fs-14">02 hours ago</div>
                                                        </div>
                                                        <div class="flex-grow-1">
                                                            <h6 class="fs-15 mt-0 mb-1">Designing Shreyu Admin</h6>
                                                            <p class="text-muted fs-14">Shreyu Admin - A responsive admin and dashboard template</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="event-list">
                                                <div class="pb-4">
                                                    <div class="d-flex">
                                                        <div class="event-date text-center me-4 flex-shrink-0">
                                                            <div class="bg-soft-primary p-1 rounded text-primary fs-14">21 hours ago</div>
                                                        </div>
                                                        <div class="flex-grow-1">
                                                            <h6 class="fs-15 mt-0 mb-1">UX and UI for Ubold Admin</h6>
                                                            <p class="text-muted fs-14">Ubold Admin - A responsive admin and dashboard template</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="event-list">
                                                <div class="pb-4">
                                                    <div class="d-flex">
                                                        <div class="event-date text-center me-4 flex-shrink-0">
                                                            <div class="bg-soft-primary p-1 rounded text-primary fs-14">22 hours ago</div>
                                                        </div>
                                                        <div class="flex-grow-1">
                                                            <h6 class="fs-15 mt-0 mb-1">UX and UI for Hyper Admin</h6>
                                                            <p class="text-muted fs-14">Hyper Admin - A responsive admin and dashboard template</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                                <!-- messages -->
                                <div class="tab-pane" id="pills-messages" role="tabpanel" aria-labelledby="pills-messages-tab">
                                    <h4 class="mt-1 fs-15 fw-bold text-uppercase">Messages</h4>
                                    <ul class="list-unstyled">
                                        <li class="py-2 border-bottom">
                                            <div class="d-flex">
                                                <div class="me-3 flex-shrink-0">
                                                    <img src="assets/images/users/avatar-2.jpg" alt="" class="avatar-md rounded-circle">
                                                </div>
                                                <div class="flex-grow-1 overflow-hidden">
                                                    <h5 class="fs-15 mt-2 mb-1"><a href="#" class="text-dark">John Jack</a></h5>
                                                    <p class="text-muted fs-13 text-truncate mb-0">The languages only differ in their grammar</p>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="py-2 border-bottom">
                                            <div class="d-flex">
                                                <div class="me-3 flex-shrink-0">
                                                    <img src="assets/images/users/avatar-3.jpg" alt="" class="avatar-md rounded-circle">
                                                </div>
                                                <div class="flex-grow-1 overflow-hidden">
                                                    <h5 class="fs-15 mt-2 mb-1"><a href="#" class="text-dark">Theodore</a></h5>
                                                    <p class="text-muted fs-13 text-truncate mb-0">Everyone realizes why a new common language </p>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="py-2 border-bottom">
                                            <div class="d-flex">
                                                <div class="avatar-md rounded-circle bg-soft-primary me-3 flex-shrink-0">
                                                    <span class="fs-18 avatar-title text-primary fw-semibold">M</span>
                                                </div>
                                                <div class="flex-grow-1 overflow-hidden">
                                                    <h5 class="fs-15 mt-2 mb-1"><a href="#" class="text-dark">Michael</a></h5>
                                                    <p class="text-muted fs-13 text-truncate mb-0">To an English person, it will seem like simplified</p>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="py-2 border-bottom">
                                            <div class="d-flex">
                                                <div class="me-3 flex-shrink-0">
                                                    <img src="assets/images/users/avatar-5.jpg" alt="" class="avatar-md rounded-circle">
                                                </div>
                                                <div class="flex-grow-1 overflow-hidden">
                                                    <h5 class="fs-15 mt-2 mb-1"><a href="#" class="text-dark">Tony Lindsey</a></h5>
                                                    <p class="text-muted fs-13 text-truncate mb-0">If several languages coalesce the grammar</p>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="py-2 border-bottom">
                                            <div class="d-flex">
                                                <div class="avatar-md rounded-circle bg-soft-primary me-3 flex-shrink-0">
                                                    <span class="fs-18 avatar-title text-primary fw-semibold">R</span>
                                                </div>
                                                <div class="flex-grow-1 overflow-hidden">
                                                    <h5 class="fs-15 mt-2 mb-1"><a href="#" class="text-dark">Robert Wilke</a></h5>
                                                    <p class="text-muted fs-13 text-truncate mb-0">Their separate existence is a myth</p>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="py-2 border-bottom">
                                            <div class="d-flex">
                                                <div class="me-3 flex-shrink-0">
                                                    <img src="assets/images/users/avatar-7.jpg" alt="" class="avatar-md rounded-circle">
                                                </div>
                                                <div class="flex-grow-1 overflow-hidden">
                                                    <h5 class="fs-15 mt-2 mb-1"><a href="#" class="text-dark">James</a></h5>
                                                    <p class="text-muted fs-13 text-truncate mb-0">The European languages are members.</p>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="py-2 border-bottom">
                                            <div class="d-flex">
                                                <div class="avatar-md rounded-circle bg-soft-primary me-3 flex-shrink-0">
                                                    <span class="fs-18 avatar-title text-primary fw-semibold">B</span>
                                                </div>
                                                <div class="flex-grow-1 overflow-hidden">
                                                    <h5 class="fs-15 mt-2 mb-1"><a href="#" class="text-dark">Brian</a></h5>
                                                    <p class="text-muted fs-13 text-truncate mb-0">At vero eos et accusamus et iusto odio</p>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="py-2">
                                            <div class="d-flex">
                                                <div class="me-3 flex-shrink-0">
                                                    <img src="assets/images/users/avatar-5.jpg" alt="" class="avatar-md rounded-circle">
                                                </div>
                                                <div class="flex-grow-1 overflow-hidden">
                                                    <h5 class="fs-15 mt-2 mb-1"><a href="#" class="text-dark">Aaron Nickel</a></h5>
                                                    <p class="text-muted fs-13 text-truncate mb-0">Itaque earum rerum hic tenetur a sapiente</p>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>

                                    <div class="text-center">
                                        <a href="#" class="btn btn-primary btn-sm">Load more</a>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="pills-projects" role="tabpanel" aria-labelledby="pills-projects-tab">

                                    <h4 class="mt-1 fs-15 fw-bold text-uppercase">Projects</h4>

                                    <div class="row mt-3">
                                        <div class="col-xl-4 col-lg-6">
                                            <div class="card border">
                                                <div class="card-body">
                                                    <div class="badge bg-success float-end">Completed</div>
                                                    <p class="text-success text-uppercase fs-12 mb-2">Web Design</p>
                                                    <h5><a href="#" class="text-dark">Landing page Design</a></h5>
                                                    <p class="text-muted mb-4">
                                                        If several languages coalesce, the grammar of the resulting language is more regular.
                                                    </p>

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
                                                    <div>
                                                        <div>
                                                            <ul class="list-inline">
                                                                <li class="list-inline-item pe-2">
                                                                    <a href="#" class="text-muted d-inline-block" data-bs-toggle="tooltip" data-bs-placement="top" title="Due date">
                                                                        <i class="uil uil-calender me-1"></i>15 Dec
                                                                    </a>
                                                                </li>
                                                                <li class="list-inline-item pe-2">
                                                                    <a href="#" class="text-muted d-inline-block" data-bs-toggle="tooltip" data-bs-placement="top" title="Tasks">
                                                                        <i class="uil uil-bars me-1"></i>56
                                                                    </a>
                                                                </li>
                                                                <li class="list-inline-item">
                                                                    <a href="#" class="text-muted d-inline-block" data-bs-toggle="tooltip" data-bs-placement="top" title="Comments">
                                                                        <i class="uil uil-comments-alt me-1"></i>224
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="pt-2">
                                                            <div class="progress" style="height: 5px;" data-bs-toggle="tooltip" data-bs-placement="top" title="100% completed">
                                                                <div class="progress-bar bg-success" role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- end card -->
                                        </div>

                                        <div class="col-xl-4 col-lg-6">
                                            <div class="card border">
                                                <div class="card-body">
                                                    <div class="badge bg-warning float-end">Pending</div>
                                                    <p class="text-warning text-uppercase fs-12 mb-2">Android</p>
                                                    <h5><a href="#" class="text-dark">App Design and Develop</a></h5>
                                                    <p class="text-muted mb-4">
                                                        To achieve this, it would be necessary to have uniform grammar and more common words.
                                                    </p>
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
                                                    <div>
                                                        <div>
                                                            <ul class="list-inline">
                                                                <li class="list-inline-item pe-2">
                                                                    <a href="#" class="text-muted d-inline-block" data-bs-toggle="tooltip" data-bs-placement="top" title="Due date">
                                                                        <i class="uil uil-calender me-1"></i>28 Nov
                                                                    </a>
                                                                </li>
                                                                <li class="list-inline-item pe-2">
                                                                    <a href="#" class="text-muted d-inline-block" data-bs-toggle="tooltip" data-bs-placement="top" title="Tasks">
                                                                        <i class="uil uil-bars me-1"></i>62
                                                                    </a>
                                                                </li>
                                                                <li class="list-inline-item">
                                                                    <a href="#" class="text-muted d-inline-block" data-bs-toggle="tooltip" data-bs-placement="top" title="Comments">
                                                                        <i class="uil uil-comments-alt me-1"></i>196
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="pt-2">
                                                            <div class="progress" style="height: 5px;" data-bs-toggle="tooltip" data-bs-placement="top" title="72% completed">
                                                                <div class="progress-bar bg-warning" role="progressbar" style="width: 72%;" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- end card -->
                                        </div>

                                        <div class="col-xl-4 col-lg-6">
                                            <div class="card border">
                                                <div class="card-body">
                                                    <div class="badge bg-success float-end">Completed</div>
                                                    <p class="text-success text-uppercase fs-12 mb-2">Web Design</p>
                                                    <h5><a href="#" class="text-dark">New Admin Design</a></h5>
                                                    <p class="text-muted mb-4">
                                                        To an English person, it will seem like simplified english, as a skeptical Cambridge.
                                                    </p>

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
                                                    <div>
                                                        <div>
                                                            <ul class="list-inline">
                                                                <li class="list-inline-item pe-2">
                                                                    <a href="#" class="text-muted d-inline-block" data-bs-toggle="tooltip" data-bs-placement="top" title="Due date">
                                                                        <i class="uil uil-calender me-1"></i>19 Nov
                                                                    </a>
                                                                </li>
                                                                <li class="list-inline-item pe-2">
                                                                    <a href="#" class="text-muted d-inline-block" data-bs-toggle="tooltip" data-bs-placement="top" title="Tasks">
                                                                        <i class="uil uil-bars me-1"></i>69
                                                                    </a>
                                                                </li>
                                                                <li class="list-inline-item">
                                                                    <a href="#" class="text-muted d-inline-block" data-bs-toggle="tooltip" data-bs-placement="top" title="Comments">
                                                                        <i class="uil uil-comments-alt me-1"></i>201
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="pt-2">
                                                            <div class="progress" style="height: 5px;" data-bs-toggle="tooltip" data-bs-placement="top" title="100% completed">
                                                                <div class="progress-bar bg-success" role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- end card -->
                                        </div>

                                        <div class="col-xl-4 col-lg-6">
                                            <div class="card border">
                                                <div class="card-body">
                                                    <div class="badge bg-warning float-end">Pending</div>
                                                    <p class="text-warning text-uppercase fs-12 mb-2">Android</p>
                                                    <h5><a href="#" class="text-dark">Custom Software Development</a></h5>
                                                    <p class="text-muted mb-4">
                                                        Their separate existence is a myth. For science, music, sport, etc uses the vocabulary
                                                    </p>

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

                                                    <div>
                                                        <div>
                                                            <ul class="list-inline">
                                                                <li class="list-inline-item pe-2">
                                                                    <a href="#" class="text-muted d-inline-block" data-bs-toggle="tooltip" data-bs-placement="top" title="Due date">
                                                                        <i class="uil uil-calender me-1"></i>02 Nov
                                                                    </a>
                                                                </li>
                                                                <li class="list-inline-item pe-2">
                                                                    <a href="#" class="text-muted d-inline-block" data-bs-toggle="tooltip" data-bs-placement="top" title="Tasks">
                                                                        <i class="uil uil-bars me-1"></i> 72
                                                                    </a>
                                                                </li>
                                                                <li class="list-inline-item">
                                                                    <a href="#" class="text-muted d-inline-block" data-bs-toggle="tooltip" data-bs-placement="top" title="Comments">
                                                                        <i class="uil uil-comments-alt me-1"></i>184
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="pt-2">
                                                            <div class="progress" style="height: 5px;" data-bs-toggle="tooltip" data-bs-placement="top" title="60% completed">
                                                                <div class="progress-bar bg-warning" role="progressbar" style="width: 60%;" aria-valuenow="60" aria-valuemin="0" aria-valuemax="60"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- end card -->
                                        </div>
                                        <div class="col-xl-4 col-lg-6">
                                            <div class="card border">
                                                <div class="card-body">
                                                    <div class="badge bg-success float-end">Completed</div>
                                                    <p class="text-success text-uppercase fs-12 mb-2">Web Design</p>
                                                    <h5><a href="#" class="text-dark">Brand logo design</a></h5>
                                                    <p class="text-muted mb-4">
                                                        Everyone realizes why a new common language refuse to pay expensive translators.
                                                    </p>

                                                    <div>
                                                        <a href="javascript: void(0);">
                                                            <div class="avatar-sm fw-bold d-inline-block m-1">
                                                                <span class="avatar-title rounded-circle bg-soft-success text-success">D</span>
                                                            </div>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="card-body border-top">

                                                    <div>
                                                        <div>
                                                            <ul class="list-inline">
                                                                <li class="list-inline-item pe-2">
                                                                    <a href="#" class="text-muted d-inline-block" data-bs-toggle="tooltip" data-bs-placement="top" title="Due date">
                                                                        <i class="uil uil-calender me-1"></i>13 Oct
                                                                    </a>
                                                                </li>
                                                                <li class="list-inline-item pe-2">
                                                                    <a href="#" class="text-muted d-inline-block" data-bs-toggle="tooltip" data-bs-placement="top" title="Tasks">
                                                                        <i class="uil uil-bars me-1"></i>64
                                                                    </a>
                                                                </li>
                                                                <li class="list-inline-item">
                                                                    <a href="#" class="text-muted d-inline-block" data-bs-toggle="tooltip" data-bs-placement="top" title="Comments">
                                                                        <i class="uil uil-comments-alt me-1"></i>173
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="pt-2">
                                                            <div class="progress" style="height: 5px;" data-bs-toggle="tooltip" data-bs-placement="top" title="100% completed">
                                                                <div class="progress-bar bg-success" role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- end card -->
                                        </div>

                                        <div class="col-xl-4 col-lg-6">
                                            <div class="card border">
                                                <div class="card-body">
                                                    <div class="badge bg-success float-end">Completed</div>
                                                    <p class="text-success text-uppercase fs-12 mb-2">Web Design</p>
                                                    <h5><a href="#" class="text-dark">Website Redesign</a></h5>
                                                    <p class="text-muted mb-4">
                                                        The languages only differ in their grammar pronunciation and their most common words.
                                                    </p>

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
                                                    <div>
                                                        <div>
                                                            <ul class="list-inline">
                                                                <li class="list-inline-item pe-2">
                                                                    <a href="#" class="text-muted d-inline-block" data-bs-toggle="tooltip" data-bs-placement="top" title="Due date">
                                                                        <i class="uil uil-calender me-1"></i>11 Oct
                                                                    </a>
                                                                </li>
                                                                <li class="list-inline-item pe-2">
                                                                    <a href="#" class="text-muted d-inline-block" data-bs-toggle="tooltip" data-bs-placement="top" title="Tasks">
                                                                        <i class="uil uil-bars me-1"></i>71
                                                                    </a>
                                                                </li>
                                                                <li class="list-inline-item">
                                                                    <a href="#" class="text-muted d-inline-block" data-bs-toggle="tooltip" data-bs-placement="top" title="Comments">
                                                                        <i class="uil uil-comments-alt me-1"></i>163
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="pt-2">
                                                            <div class="progress" style="height: 5px;" data-bs-toggle="tooltip" data-bs-placement="top" title="100% completed" data-original-title="">
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
                                </div>

                                <div class="tab-pane fade" id="pills-tasks" role="tabpanel" aria-labelledby="pills-tasks-tab">
                                    <h4 class="mt-1 fs-15 fw-bold text-uppercase">My Tasks</h4>

                                    <div class="card mb-0 mt-3 border-0">
                                        <div class="card-body p-0">
                                            <!-- task -->
                                            <div class="row justify-content-sm-between border-bottom">
                                                <div class="col-lg-6 mb-2 mb-lg-0">
                                                    <div class="form-check">
                                                        <input type="checkbox" class="form-check-input" id="task1">
                                                        <label class="form-check-label" for="task1">
                                                            Draft the new contract document for sales team
                                                        </label>
                                                    </div> <!-- end checkbox -->
                                                </div> <!-- end col -->
                                                <div class="col-lg-6">
                                                    <div class="d-sm-flex justify-content-between">
                                                        <div>
                                                            <img src="assets/images/users/avatar-9.jpg" alt="image" class="avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Assigned to Arya S" />
                                                        </div>
                                                        <div class="mt-3 mt-sm-0">
                                                            <ul class="list-inline text-sm-end">
                                                                <li class="list-inline-item pe-1">
                                                                    <i
                                                                        class='uil uil-schedule me-1'></i>
                                                                    Today 10am
                                                                </li>
                                                                <li class="list-inline-item pe-1">
                                                                    <i
                                                                        class='uil uil-align-alt me-1'></i>
                                                                    3/7
                                                                </li>
                                                                <li class="list-inline-item pe-2">
                                                                    <i
                                                                        class='uil uil-comment-message me-1'></i>
                                                                    21
                                                                </li>
                                                                <li class="list-inline-item">
                                                                                <span
                                                                                    class="badge badge-soft-danger p-1">High</span>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div> <!-- end .d-flex-->
                                                </div> <!-- end col -->
                                            </div>
                                            <!-- end task -->

                                            <!-- task -->
                                            <div class="row justify-content-sm-between mt-1 border-bottom pt-2">
                                                <div class="col-lg-6 mb-2 mb-lg-0">
                                                    <div class="form-check">
                                                        <input type="checkbox" class="form-check-input"
                                                               id="task2">
                                                        <label class="form-check-label" for="task2">
                                                            iOS App home page
                                                        </label>
                                                    </div> <!-- end checkbox -->
                                                </div> <!-- end col -->
                                                <div class="col-lg-6">
                                                    <div class="d-sm-flex justify-content-between">
                                                        <div>
                                                            <img src="assets/images/users/avatar-2.jpg"
                                                                 alt="image" class="avatar-xs rounded-circle"
                                                                 data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                                 title="Assigned to James B" />
                                                        </div>
                                                        <div class="mt-3 mt-sm-0">
                                                            <ul class="list-inline text-sm-end">
                                                                <li class="list-inline-item pe-1">
                                                                    <i
                                                                        class='uil uil-schedule me-1'></i>
                                                                    Today 4pm
                                                                </li>
                                                                <li class="list-inline-item pe-1">
                                                                    <i
                                                                        class='uil uil-align-alt me-1'></i>
                                                                    2/7
                                                                </li>
                                                                <li class="list-inline-item pe-2">
                                                                    <i
                                                                        class='uil uil-comment-message me-1'></i>
                                                                    48
                                                                </li>
                                                                <li class="list-inline-item">
                                                                                <span
                                                                                    class="badge badge-soft-danger p-1">High</span>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div> <!-- end .d-sm-flex-->
                                                </div> <!-- end col -->
                                            </div>
                                            <!-- end task -->

                                            <!-- task -->
                                            <div
                                                class="row justify-content-sm-between mt-1 border-bottom pt-2">
                                                <div class="col-lg-6 mb-2 mb-lg-0">
                                                    <div class="form-check">
                                                        <input type="checkbox" class="form-check-input"
                                                               id="task3">
                                                        <label class="form-check-label" for="task3">
                                                            Write a release note
                                                        </label>
                                                    </div> <!-- end checkbox -->
                                                </div> <!-- end col -->
                                                <div class="col-lg-6">
                                                    <div class="d-sm-flex justify-content-between">
                                                        <div>
                                                            <img src="assets/images/users/avatar-4.jpg"
                                                                 alt="image" class="avatar-xs rounded-circle"
                                                                 data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                                 title="Assigned to Kevin C" />
                                                        </div>
                                                        <div>
                                                            <ul class="list-inline text-sm-end">
                                                                <li class="list-inline-item pe-1">
                                                                    <i class='uil uil-schedule me-1'></i>Today 6pm
                                                                </li>
                                                                <li class="list-inline-item pe-1">
                                                                    <i class='uil uil-align-alt me-1'></i>18/21
                                                                </li>
                                                                <li class="list-inline-item pe-2">
                                                                    <i class='uil uil-comment-message me-1'></i>73
                                                                </li>
                                                                <li class="list-inline-item">
                                                                    <span class="badge badge-soft-info p-1">Medium</span>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div> <!-- end .d-sm-flex-->
                                                </div> <!-- end col -->
                                            </div>
                                            <!-- end task -->

                                            <!-- task -->
                                            <div class="row justify-content-sm-between border-bottom mt-1 pt-2">
                                                <div class="col-lg-6 mb-2 mb-lg-0">
                                                    <div class="form-check">
                                                        <input type="checkbox" class="form-check-input" id="task4">
                                                        <label class="form-check-label" for="task4">
                                                            Invite user to a project
                                                        </label>
                                                    </div> <!-- end checkbox -->
                                                </div> <!-- end col -->
                                                <div class="col-lg-6">
                                                    <div class="d-sm-flex justify-content-between">
                                                        <div>
                                                            <img src="assets/images/users/avatar-2.jpg" alt="image" class="avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Assigned to James B" />
                                                        </div>
                                                        <div class="mt-3 mt-sm-0">
                                                            <ul class="list-inline text-sm-end">
                                                                <li class="list-inline-item pe-1">
                                                                    <i class='uil uil-schedule me-1'></i>Tomorrow 7am
                                                                </li>
                                                                <li class="list-inline-item pe-1">
                                                                    <i class='uil uil-align-alt me-1'></i>1/12
                                                                </li>
                                                                <li class="list-inline-item pe-2">
                                                                    <i class='uil uil-comment-message me-1'></i>36
                                                                </li>
                                                                <li class="list-inline-item">
                                                                    <span class="badge badge-soft-danger p-1">High</span>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div> <!-- end .d-sm-flex-->
                                                </div> <!-- end col -->
                                            </div>
                                            <!-- end task -->

                                            <!-- task -->
                                            <div class="row justify-content-sm-between mt-1 pt-2 border-bottom">
                                                <div class="col-lg-6 mb-2 mb-lg-0">
                                                    <div class="form-check">
                                                        <input type="checkbox" class="form-check-input" id="task5">
                                                        <label class="form-check-label" for="task5">
                                                            Enable analytics tracking
                                                        </label>
                                                    </div> <!-- end checkbox -->
                                                </div> <!-- end col -->
                                                <div class="col-lg-6">
                                                    <div class="d-sm-flex justify-content-between">
                                                        <div>
                                                            <img src="assets/images/users/avatar-2.jpg" alt="image" class="avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Assigned to James B" />
                                                        </div>
                                                        <div class="mt-3 mt-sm-0">
                                                            <ul class="list-inline text-sm-end">
                                                                <li class="list-inline-item pe-1">
                                                                    <i class='uil uil-schedule me-1'></i>27 Aug 10am
                                                                </li>
                                                                <li class="list-inline-item pe-1">
                                                                    <i class='uil uil-align-alt me-1'></i>13/72
                                                                </li>
                                                                <li class="list-inline-item pe-2">
                                                                    <i class='uil uil-comment-message me-1'></i>211
                                                                </li>
                                                                <li class="list-inline-item">
                                                                    <span class="badge badge-soft-success p-1">Low</span>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div> <!-- end .d-sm-flex-->
                                                </div> <!-- end col -->
                                            </div>
                                            <!-- end task -->

                                            <!-- task -->
                                            <div class="row justify-content-sm-between mt-1 pt-2">
                                                <div class="col-lg-6 mb-2 mb-lg-0">
                                                    <div class="form-check">
                                                        <input type="checkbox" class="form-check-input" id="task6">
                                                        <label class="form-check-label" for="task6">
                                                            Code HTML email template
                                                        </label>
                                                    </div> <!-- end checkbox -->
                                                </div> <!-- end col -->
                                                <div class="col-lg-6">
                                                    <div class="d-sm-flex justify-content-between">
                                                        <div>
                                                            <img src="assets/images/users/avatar-7.jpg" alt="image" class="avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Assigned to Edward S" />
                                                        </div>
                                                        <div class="mt-3 mt-sm-0">
                                                            <ul class="list-inline text-sm-end mb-0">
                                                                <li class="list-inline-item pe-1">
                                                                    <i class='uil uil-schedule me-1'></i>No Due Date
                                                                </li>
                                                                <li class="list-inline-item pe-1">
                                                                    <i class='uil uil-align-alt me-1'></i>0/7
                                                                </li>
                                                                <li class="list-inline-item pe-2">
                                                                    <i class='uil uil-comment-message me-1'></i>0
                                                                </li>
                                                                <li class="list-inline-item">
                                                                    <span class="badge badge-soft-info p-1">Medium</span>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div> <!-- end .d-sm-flex-->
                                                </div> <!-- end col -->
                                            </div>
                                            <!-- end task -->
                                        </div> <!-- end card-body-->
                                    </div> <!-- end card -->
                                </div>

                                <div class="tab-pane fade" id="pills-files" role="tabpanel" aria-labelledby="pills-files-tab">
                                    <h4 class="mt-1 fs-15 fw-bold text-uppercase">Files</h4>

                                    <div class="card mb-2 mt-3 shadow-none border">
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
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- end card -->
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
