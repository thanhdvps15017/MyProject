@extends('pages.layout')
@section('content')
    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="index.html" rel="nofollow">Trang chủ</a>
                    <span></span> Đăng nhập
                </div>
            </div>
        </div>
        @if (session('succes'))
            <div class="alert alert-error">
                {{ session('succes') }}
            </div>
        @endif
        <section class="pt-150 pb-150">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 m-auto">
                        <div class="row">
                            <div class="col-lg-5">
                                <div
                                    class="login_wrap widget-taber-content p-30 background-white border-radius-10 mb-md-5 mb-lg-0 mb-sm-5">
                                    <div class="padding_eight_all bg-white">
                                        <div class="heading_s1">
                                            <h3 class="mb-30">Đăng nhập</h3>
                                        </div>
                                        <form method="POST" action="{{ route('login.action') }}">
                                            @csrf
                                            <div class="form-group">
                                                <input type="email" name="email" placeholder="Tài khoản"
                                                    value="{{ old('email') }}">
                                            </div>
                                            <p>
                                                @error('email')
                                                <div class="alert pt-1 pb-1 alert-danger">{{ $message }} </div>
                                            @enderror
                                            </p>
                                            <div class="form-group">
                                                <input type="password" name="password" placeholder="Mật khẩu">
                                            </div>
                                            <p>
                                                @error('password')
                                                <div class="alert pt-1 pb-1 alert-danger">{{ $message }}</div>
                                            @enderror
                                            </p>
                                            <div class="login_footer form-group">
                                                <div class="chek-form">
                                                    <div class="custome-checkbox">
                                                        <input class="form-check-input" type="checkbox" name="remember"
                                                            id="exampleCheckbox1" value="">
                                                        <label class="form-check-label" for="exampleCheckbox1"><span>Nhớ
                                                                mật khẩu</span></label>
                                                    </div>
                                                </div>
                                                <a class="text-muted" href="{{ route('forget.password') }}">Quên mật
                                                    khẩu?</a>
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-fill-out btn-block hover-up">Đăng
                                                    nhập</button>
                                                <a href="{{ route('register') }}"
                                                    class="btn btn-fill-out btn-block hover-up">Đăng ký</a>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-1"></div>
                            <div class="col-lg-6">
                                <img src="assets/imgs/login.png">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
