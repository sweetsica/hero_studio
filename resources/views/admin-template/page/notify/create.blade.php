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
                                    <img src="{{asset('admin-asset/assets/images/cal.png')}}"
                                         class="me-4 align-self-center img-fluid" alt="cal"/>
                                </div>
                                <div class="col-xl-10 col-lg-9">
                                    <div class="mt-4 mt-lg-0">
                                        <h5 class="mt-0 mb-1 fw-bold">Chào mừng tới trung tâm thông báo!</h5>
                                        <p class="text-muted mb-2">
                                            Mọi thông báo ở đây sẽ được truyền tới màn hình của tất cả mọi người
                                        </p>

                                        <button class="btn btn-primary mt-2 me-1" id="btn-new-event"
                                                data-bs-toggle="modal" data-bs-target="#event-modal">
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

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <table id="notify-table" class="table dt-responsive nowrap w-100">
                                <thead>
                                <tr>
                                    <th>Tiêu đề</th>
                                    <th>Trạng thái</th>
                                    <th>Nội dung</th>
                                    <th>Hành động</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($listNotifies as $notify)
                                    <tr>
                                        <td>{{$notify->title}}</td>
                                        <td>{{$notify->active == 1 ? 'Kích hoạt' : 'Đã tắt'}}</td>
                                        <td>{{$notify->content}}</td>
                                        <td>
                                            <button class="btn btn-primary" data-bs-toggle="modal"
                                                    data-bs-target="#edit-modal-{{$notify->id}}">
                                                Cập nhật
                                            </button>
                                            <div class="modal fade" id="edit-modal-{{$notify->id}}" tabindex="-1">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header py-3 px-4 border-bottom-0 d-block">
                                                            <button type="button" class="btn-close float-end"
                                                                    data-bs-dismiss="modal"
                                                                    aria-hidden="true"></button>
                                                            <h5 class="modal-title" id="modal-title">Chỉnh sửa</h5>
                                                        </div>
                                                        <div class="modal-body px-4 pb-4">
                                                            <form class="needs-validation" name="event-form"
                                                                  id="form-event" novalidate
                                                                  action="{{route('noti.update', $notify->id)}}"
                                                                  method="post">
                                                                @csrf
                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <div class="mb-3">
                                                                            <label class="form-label">Tiêu đề thông
                                                                                báo</label>
                                                                            <input class="form-control"
                                                                                   placeholder="Insert Event Name"
                                                                                   type="text"
                                                                                   name="title" id="event-title"
                                                                                   value="{{$notify->title}}"
                                                                                   required/>
                                                                            <div class="invalid-feedback">Please provide
                                                                                a valid event name
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-12">
                                                                        <div class="mb-3">
                                                                            <label class="form-label">Nội dung thông
                                                                                báo</label>
                                                                            <input
                                                                                value="{{$notify->content}}"
                                                                                class="form-control"
                                                                                placeholder="Insert Event Name"
                                                                                type="text"
                                                                                name="content" id="event-title"
                                                                                required/>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-12">
                                                                        <div class="mb-3">
                                                                            <label class="form-label">Màu sắc</label>
                                                                            <input type="color" id="favcolor"
                                                                                   name="format"
                                                                                   value="{{$notify->format}}">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-12">
                                                                        <div class="mb-3 d-flex">
                                                                            <label class="form-label">Kích
                                                                                hoạt</label>
                                                                            <div class="form-switch mb-2 row" style="margin-left: 1rem">
                                                                                <input
                                                                                    name="active"
                                                                                    type="checkbox"
                                                                                    class="form-check-input"
                                                                                    id="customSwitch1"
                                                                                    {{ $notify->active == 1 ? 'checked' : '' }}
                                                                                >
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row mt-2">
                                                                    <div class="col-12 text-end">
                                                                        <button type="button" class="btn btn-light me-1"
                                                                                data-bs-dismiss="modal">Close
                                                                        </button>
                                                                        <button type="button" class="btn btn-danger me-1"
                                                                                data-bs-dismiss="modal" onclick="deleteNotify({{$notify->id}})">Delete
                                                                        </button>
                                                                        <button type="submit" class="btn btn-success"
                                                                                id="btn-save-event">Save
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div> <!-- end modal-content-->
                                                </div> <!-- end modal dialog-->
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
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
                            <button type="button" class="btn-close float-end" data-bs-dismiss="modal"
                                    aria-hidden="true"></button>
                            <h5 class="modal-title" id="modal-title">Sự kiện</h5>
                        </div>
                        <div class="modal-body px-4 pb-4">
                            <form class="needs-validation" name="event-form" id="form-event" novalidate
                                  action="{{route('noti.save')}}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <div class="mb-3">
                                            <label class="form-label">Tiêu đề thông báo</label>
                                            <input class="form-control" placeholder="Insert Event Name" type="text"
                                                   name="title" id="event-title" required/>
                                            <div class="invalid-feedback">Please provide a valid event name</div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="mb-3">
                                            <label class="form-label">Nội dung thông báo</label>
                                            <input class="form-control" placeholder="Insert Event Name" type="text"
                                                   name="content" id="event-title" required/>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="mb-3">
                                            <label class="form-label">Màu sắc</label>
                                            <input type="color" id="favcolor" name="format" value="#ff0000">
                                        </div>
                                    </div>


                                </div>
                                <div class="row mt-2">
                                    {{--                                    <div class="col-6">--}}
                                    {{--                                        <button type="button" class="btn btn-danger" id="btn-delete-event">Delete</button>--}}
                                    {{--                                    </div>--}}
                                    <div class="col-12 text-end">
                                        <button type="button" class="btn btn-light me-1" data-bs-dismiss="modal">Close
                                        </button>
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

@section('content-js')
    <!-- Vendor js -->
    <script src="{{ asset('admin-asset/assets/js/vendor.min.js') }}"></script>

    <!-- optional plugins -->
    <script src="{{ asset('admin-asset/assets/libs/moment/min/moment.min.js') }}"></script>
    <script src="{{ asset('admin-asset/assets/libs/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('admin-asset/assets/libs/flatpickr/flatpickr.min.js') }}"></script>
    <!-- page js -->
    <script src="{{ asset('admin-asset/assets/js/pages/widgets.init.js') }}"></script>

    <!-- App js -->
    <script src="{{ asset('admin-asset/assets/js/app.min.js') }}"></script>

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
    <script>


        async function deleteNotify(id,) {
            const router = "{{route('noti.delete', 'id')}}";
            const response = await fetch(router.replace('id', id), {
                method: 'DELETE',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'url': '/payment',
                    "X-CSRF-Token": "{{csrf_token()}}"
                },
            });

            window.location.reload();
            const myJson = await response.json();
        }
    </script>
    <script>
        $(document).ready(function () {
            const table = $('#notify-table').DataTable({
                paging: true,
                dom: 'Bfrtip',
                buttons: [
                    'excel', 'pdf', 'print', 'colvis'
                ],
                // fixedColumns: {
                //     left: 2
                // }
            });
            // table.buttons().container()
            //     .appendTo('#basic-datatable .col-md-6:eq(0)');

            // them class vào các btn của datatable cho giống theme
            $('.dt-buttons').children().addClass('btn btn-secondary')
        })
    </script>

@endsection
