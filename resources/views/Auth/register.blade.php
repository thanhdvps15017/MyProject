@extends('pages.layout')

@section('content')
    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="index.html" rel="nofollow">Trang chủ</a>
                    <span></span> Đăng ký
                </div>
            </div>
        </div>
        <section class="pt-150 pb-150">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="login_wrap widget-taber-content p-30 background-white border-radius-5">
                            <div class="padding_eight_all bg-white">
                                <div class="heading_s1">
                                    <h3 class="mb-30">Tạo tài khoản mới</h3>
                                    @if (session('thongbao'))
                                        <div class="alert pt-1 pb-1 alert-success">
                                            {{ session('thongbao') }}
                                        </div>
                                    @endif
                                </div>
                                <form method="POST" action="{{ route('register.action') }}">
                                    @csrf
                                    <div class="form-group">
                                        <input type="text" name="name" placeholder="Tên người dùng"
                                            value="{{ old('name') }}">
                                        <p>
                                            @error('name')
                                            <div class="alert pt-1 pb-1 alert-danger">{{ $message }}</div>
                                        @enderror
                                        </p>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="email" placeholder="Email"
                                            value="{{ old('email') }}">
                                        <p>
                                            @error('email')
                                            <div class="alert pt-1 pb-1 alert-danger">{{ $message }}</div>
                                        @enderror
                                        </p>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="password" placeholder="Mật khẩu"
                                            value="{{ old('password') }}">
                                        <p>
                                            @error('password')
                                            <div class="alert pt-1 pb-1 alert-danger">{{ $message }}</div>
                                        @enderror
                                        </p>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="password_confrim" placeholder="Nhập lại mật khẩu">
                                        <p>
                                            @error('password_confrim')
                                            <div class="alert pt-1 pb-1 alert-danger">{{ $message }}</div>
                                        @enderror
                                        </p>
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-fill-out btn-block hover-up" type="submit">Đăng
                                            ký</button>
                                    </div>
                                </form>
                                <div class="text-muted text-center">Bạn đã có tài khoản <a href="{{ route('login') }}">Đăng
                                        nhập</a></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <img src="assets/imgs/login.png">
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
