@extends('admin-template.main.register')
@section('title-page')
    Đăng nhập
{{--    Gửi lên email và mật khẩu--}}
@endsection
@section('content-page')
    <div class="row justify-content-center">
        <div class="col-xl-10">
            <div class="card">
                <div class="card-body p-0">
                    <div class="row g-0">
                        <div class="col-lg-6 p-4">
                            <div class="mx-auto">
                                <a href="index.html">
                                    <img src="{{asset('admin-template/assets/images/logo-dark.png')}}" alt="" height="24" />
                                </a>
                            </div>
                            <h6 class="h5 mb-0 mt-3">Ngày tốt lành!</h6>
                            <p class="text-muted mt-1 mb-4">
                                Vui lòng đăng nhập để truy cập, nếu chưa có tài khoản vui lòng liên hệ admin: A - 091xxxxxxx
                            </p>
                            <form action="#" class="authentication-form" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label class="form-label">Email:</label>
                                    <div class="input-group">
                                                    <span class="input-group-text">
                                                        <i class="icon-dual" data-feather="mail"></i>
                                                    </span>
                                        <input name="email" type="email" class="form-control" id="email" placeholder="hello@gmail.com">
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Mật khẩu:</label>
                                    <div class="input-group">
                                                    <span class="input-group-text">
                                                        <i class="icon-dual" data-feather="lock"></i>
                                                    </span>
                                        <input name="password" type="password" class="form-control" id="password" placeholder="Chú ý phím caplock">
                                    </div>
                                </div>
                                @if(session('success'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        {{ session('success') }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                @endif
                                @if(session('error'))
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        {{ session('error') }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                @endif
                                <div class="mb-3 text-center d-grid">
                                    <button class="btn btn-primary" type="submit">Log In</button>
                                </div>
                            </form>
                        </div>
                        <div class="col-lg-6 d-none d-md-inline-block">
                            <div class="auth-page-sidebar">
                                <div class="overlay"></div>
                                <div class="auth-user-testimonial">
                                    <p class="fs-24 fw-bold text-white mb-1">Hi!</p>
                                    <p class="lead">"Hai ba con mực, login vui cực!"</p>
                                    <p>- Hero Studio</p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div> <!-- end card-body -->
            </div>
            <!-- end card -->

{{--            <div class="row mt-3">--}}
{{--                <div class="col-12 text-center">--}}
{{--                    <p class="text-muted">Don't have an account? <a href="pages-register.html" class="text-primary fw-bold ms-1">Sign Up</a></p>--}}
{{--                </div> <!-- end col -->--}}
{{--            </div>--}}
            <!-- end row -->

        </div> <!-- end col -->
    </div>
    <!-- end row -->
@endsection
