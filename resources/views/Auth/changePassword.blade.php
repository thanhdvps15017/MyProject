@extends('pages.layout')

@section('content')
    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="index.html" rel="nofollow">Trang chủ</a>
                    <span> Thông tin cá nhân</span>
                    <span> Đổi mật khẩu</span>
                </div>
            </div>
        </div>
        <section class="pt-150 pb-150">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="login_wrap widget-taber-content p-30 background-white border-radius-5">
                            <div class="padding_eight_all bg-white">
                                <form method="POST" action="{{ route('changePasswordUpdate') }}">
                                    @csrf
                                    <div class="form-group">
                                        <label>Mật khẩu mới</label>
                                        <input type="password" name="new_password" placeholder="Mật khẩu mới">
                                        @error('new_password')
                                            <div class="alert pt-1 pb-1 alert-danger">{{ $message }}</div>
                                        @enderror

                                    </div>

                                    <div class="form-group">
                                        <label>Nhập lại mật khẩu</label>
                                        <input type="password" name="password_confrim" placeholder="Xác nhận mật khẩu mới">
                                        @error('password_confrim')
                                            <div class="alert pt-1 pb-1 alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <button class="btn btn-fill-out btn-block hover-up" type="submit">Cập nhập</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <img src="{{ asset('assets/imgs/login.png') }}">
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
