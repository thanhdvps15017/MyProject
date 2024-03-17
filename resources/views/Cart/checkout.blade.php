@extends('pages.layout')
@section('content')
    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="index.html" rel="nofollow">Home</a>
                    <span></span> Shop
                    <span></span> Checkout
                </div>
            </div>
        </div>
        <section class="mt-50 mb-50">
            <div class="container">
                <form method="POST" action="{{ route('cart.payment') }}">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">

                            <div class="mb-25">
                                <h4>Thông tin người nhận</h4>
                            </div>
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
                                    aria-label=".form-select-sm">
                                    @if (isset($user->city))
                                        <option value="{{ $user->city }}" selected> {{ $user->city }}</option>
                                    @else
                                        <option value="" selected>tỉnh thành</option>
                                    @endif
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Quận/Huyện</label>
                                <select class="form-select form-select-sm mb-3" id="district" name="district"
                                    aria-label=".form-select-sm" value={{ $user->district }}>
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
                                <input type="text" name="address" value="{{ $user->address }}" placeholder="Địa chỉ">
                            </div>
                            <div class="form-group mb-30">
                                <textarea rows="5" placeholder="Ghi chú" name="note"></textarea>
                            </div>


                        </div>

                        <div class="col-md-6">
                            <div class="order_review">
                                <div class="mb-20">
                                    <h4>Danh sách đơn hàng</h4>
                                </div>
                                <div class="table-responsive order_table text-center">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th colspan="2">Sản phẩm</th>
                                                <th>Thành tiền</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($cart as $item)
                                                <tr>
                                                    <td class="image product-thumbnail"><img
                                                            src="{{ asset($item['image']) }}" alt="#">
                                                    </td>
                                                    <td>
                                                        <h5><a href="product-details.html">{{ $item['name'] }}</a></h5>
                                                        <span class="product-qty">x {{ $item['quantity'] }}</span>
                                                    </td>
                                                    <td>{{ number_format($item['quantity'] * $item['price'], 0, ',', '.') }}
                                                    </td>
                                                </tr>
                                            @endforeach
                                            <tr>
                                                <th>Tạm tính</th>
                                                <td class="product-subtotal" colspan="2">
                                                    {{ number_format($total, 0, ',', '.') }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Shipping</th>
                                                <td colspan="2"><em>Free Shipping</em></td>
                                            </tr>
                                            <tr>
                                                <th>Tổng tiền</th>
                                                <td colspan="2" class="product-subtotal"><span
                                                        class="font-xl text-brand fw-900">{{ number_format($total, 0, ',', '.') }}</span>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="bt-1 border-color-1 mt-30 mb-30"></div>
                                <div class="payment_method">
                                    <div class="mb-25">
                                        <h5>Hình thức thanh toán</h5>
                                    </div>
                                    <div class="payment_option1">
                                        <div class="custome-radio">
                                            <input class="form-check-input" required="" type="radio" name="payment"
                                                id="exampleRadios3" value="COD">
                                            <label class="form-check-label" for="exampleRadios3" data-bs-toggle="collapse"
                                                data-target="#cashOnDelivery" aria-controls="cashOnDelivery">Thanh toán khi
                                                nhận
                                                tiền</label>
                                        </div>
                                        <div class="custome-radio">
                                            <input class="form-check-input" required="" type="radio" name="payment"
                                                id="exampleRadios5" value="MOMO">
                                            <label class="form-check-label" for="exampleRadios5" data-bs-toggle="collapse"
                                                data-target="#paypal" aria-controls="paypal">Momo</label>
                                        </div>
                                    </div>
                                </div>
                                {{-- <a href="{{ route('cart.payment') }}" class="btn btn-fill-out btn-block mt-30">Đặt
                                    hàng</a> --}}
                            </div>
                        </div>
                    </div>
                    <button type="submit">Submit</button>
                </form>
            </div>
        </section>
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
    </main>
@endsection
