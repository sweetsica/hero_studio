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

                            <a href="email-inbox.html" class="btn btn-danger d-block">Inbox</a>

                            <div class="mail-list mt-4">
                                <a href="#" class="list-group-item border-0 text-danger fw-bold">
                                    <i class="uil uil-envelope-alt fs-15 me-1"></i>Inbox
                                    <span class="badge bg-danger float-end ms-2 mt-1">8</span>
                                </a>
                                <a href="#" class="list-group-item border-0">
                                    <i class="uil uil-envelope-star fs-15 me-1"></i>Starred
                                </a>
                                <a href="#" class="list-group-item border-0">
                                    <i class="uil uil-envelope-edit fs-15 me-1"></i>Draft
                                    <span class="badge bg-info float-end ms-2 mt-1">32</span>
                                </a>
                                <a href="#" class="list-group-item border-0">
                                    <i class="uil uil-envelope-send fs-15 me-1"></i>Sent Mail
                                </a>
                                <a href="#" class="list-group-item border-0">
                                    <i class="uil uil-trash fs-15 me-1"></i>Trash
                                </a>
                            </div>

                            <h6 class="mt-4">Labels</h6>

                            <div class="list-group b-0 mail-list">
                                <a href="#" class="list-group-item border-0">
                                    <span class="uil uil-circle text-primary fs-12 me-1"></span>Web App
                                </a>
                                <a href="#" class="list-group-item border-0">
                                    <span class="uil uil-circle text-info fs-12 me-1"></span>Recharge
                                </a>
                                <a href="#" class="list-group-item border-0">
                                    <span class="uil uil-circle text-success fs-12 me-1"></span>Wallet Balance
                                </a>
                                <a href="#" class="list-group-item border-0">
                                    <span class="uil uil-circle text-warning fs-12 me-1"></span>Friends
                                </a>
                                <a href="#" class="list-group-item border-0">
                                    <span class="uil uil-circle text-secondary fs-12 me-1"></span>Family
                                </a>
                            </div>

                        </div>
                        <!-- End Left sidebar -->

                        <div class="inbox-rightbar p-4">
                            <div>
                                <form>
                                    <div class="mb-3">
                                        <input type="email" class="form-control" placeholder="To">
                                    </div>

                                    <div class="mb-3">
                                        <input type="text" class="form-control" placeholder="Subject">
                                    </div>

                                    <div class="mb-3 card border-0">
                                        <div id="snow-editor" style="height: 300px;">
                                            <h3>This is an Air-mode editable area.</h3>
                                            <p><br></p>
                                            <ul>
                                                <li>Select a text to reveal the toolbar.</li>
                                                <li>Edit rich document on-the-fly, so elastic!</li>
                                            </ul>
                                            <p><br></p>
                                            <p>End of air-mode area</p>
                                        </div> <!-- end Snow-editor-->
                                    </div>

                                    <div class="mb-3 pt-2">
                                        <div class="text-end">
                                            <button type="button" class="btn btn-success me-1">
                                                <i class="uil uil-envelope-edit"></i> Draft
                                            </button>
                                            <button class="btn btn-primary"> <span>Send</span>
                                                <i class="uil uil-message ms-2"></i>
                                            </button>
                                        </div>
                                    </div>

                                </form>
                            </div> <!-- end card-->

                        </div>
                        <!-- end inbox-rightbar-->

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
