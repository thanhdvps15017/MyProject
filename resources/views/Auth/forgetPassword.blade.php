@extends('pages.layout')
@section('content')
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="index.html" rel="nofollow">Trang chủ</a>
                <span></span> Quên mật khẩu
            </div>
        </div>
    </div>
    <section class="pt-150 pb-150">
        <div class="container ">
            <div class="row">
                <div class="col-lg-10 m-auto">
                    <div class="row">
                        <div class="col-lg-6">
                            @if (session('message'))
                                <div class="alert pt-1 pb-1 alert-success">
                                    {{ session('message') }}
                                </div>
                            @endif
                            <form method="POST" action="{{ route('forget.password.action') }}">
                                @csrf
                                <div>
                                    <label for="email">Email</label>
                                    <input id="email" type="email" name="email" value="{{ old('email') }}"
                                        autofocus>
                                </div>
                                @error('email')
                                    <div class="alert pt-1 pb-1 alert-danger">{{ $message }} </div>
                                @enderror
                                <div class="pt-2">
                                    <button type="submit">Lấy lại mật khẩu</button>
                                </div>
                            </form>
                        </div>
                        <div class="col-lg-6">
                            <img src="assets/imgs/login.png">
                        </div>
                    </div>
                </div>
            </div>
    </section>
@endsection
