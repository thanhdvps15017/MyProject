@extends('pages.layout')

@section('content')
    @if (session('success'))
        <div class = "alert pt-1 pb-1 alert-success">
            {{ session('success') }}
        </div>
    @endif
    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="index.html" rel="nofollow">Trang chủ</a>
                    <span>Thông tin cá nhân</span>
                </div>
            </div>
        </div>
        <section class="pt-150 pb-150">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="login_wrap widget-taber-content p-30 background-white border-radius-5">
                            <div class="padding_eight_all bg-white">
                                <form method="POST" action="{{ route('profileEdit', ['id' => $user->id]) }}">
                                    @csrf
                                    <div class="form-group">
                                        <label>TÊN NGƯỜI DÙNG</label>
                                        <input type="" name="name" value="{{ $user->name }}">
                                    </div>

                                    <div class="form-group">
                                        <label>SỐ ĐIỆN THOẠI</label>
                                        <input type="text" name="tel" value="{{ $user->tel }}"
                                            placeholder="Số điện thoại">
                                        @error('tel')
                                            <div class="alert pt-1 pb-1 alert-danger">{{ $message }} </div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label>Tỉnh/Thành phố</label>
                                        <select class="form-select form-select-sm mb-3" id="city" name="city"
                                            aria-label=".form-select-sm" value="{{ $user->city }}">
                                            @if (isset($user->city))
                                                <option value="{{ $user->city }}"> {{ $user->city }}</option>
                                            @else
                                                <option value="" selected>tỉnh thành</option>
                                            @endif
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Quận/Huyện</label>
                                        <select class="form-select form-select-sm mb-3" id="district" name="district"
                                            aria-label=".form-select-sm">
                                            @if (isset($user->district))
                                                <option value="" selected> {{ $user->district }}</option>
                                            @else
                                                <option value="" selected>Chọn quận huyện</option>
                                            @endif
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Phường/xã</label>
                                        <select class="form-select form-select-sm" id="ward" name="ward"
                                            aria-label=".form-select-sm">
                                            @if (isset($user->ward))
                                                <option value="" selected> {{ $user->ward }}</option>
                                            @else
                                                <option value="" selected>Chọn phường xã</option>
                                            @endif
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Số nhà/Đường</label>
                                        <input type="text" name="address" value="{{ $user->address }}"
                                            placeholder="Địa chỉ">
                                    </div>

                                    <div class="form-group">
                                        <button class="btn btn-fill-out btn-block hover-up" type="submit">Cập nhập
                                            thông
                                            tin cá nhân</button>
                                        <a href="{{ route('changePassword') }}"
                                            class="btn btn-fill-out btn-block hover-up">Đổi mật khẩu</a>
                                    </div>
                                </form>
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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
    <script>
        var citis = document.getElementById("city");
        var districts = document.getElementById("district");
        var wards = document.getElementById("ward");
        var Parameter = {
            url: "https://raw.githubusercontent.com/kenzouno1/DiaGioiHanhChinhVN/master/data.json",
            method: "GET",
            responseType: "application/json",
        };
        var promise = axios(Parameter);
        promise.then(function(result) {
            renderCity(result.data);
        });

        function renderCity(data) {
            for (const x of data) {
                var opt = document.createElement('option');
                opt.value = x.Name;
                opt.text = x.Name;
                opt.setAttribute('data-id', x.Id);
                citis.options.add(opt);
            }
            citis.onchange = function() {
                district.length = 1;
                ward.length = 1;
                if (this.options[this.selectedIndex].dataset.id != "") {
                    const result = data.filter(n => n.Id === this.options[this.selectedIndex].dataset.id);

                    for (const k of result[0].Districts) {
                        var opt = document.createElement('option');
                        opt.value = k.Name;
                        opt.text = k.Name;
                        opt.setAttribute('data-id', k.Id);
                        district.options.add(opt);
                    }
                }
            };
            district.onchange = function() {
                ward.length = 1;
                const dataCity = data.filter((n) => n.Id === citis.options[citis.selectedIndex].dataset.id);
                if (this.options[this.selectedIndex].dataset.id != "") {
                    const dataWards = dataCity[0].Districts.filter(n => n.Id === this.options[this.selectedIndex]
                        .dataset.id)[0].Wards;

                    for (const w of dataWards) {
                        var opt = document.createElement('option');
                        opt.value = w.Name;
                        opt.text = w.Name;
                        opt.setAttribute('data-id', w.Id);
                        wards.options.add(opt);
                    }
                }
            };
        }
    </script>
@endsection
