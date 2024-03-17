@extends('pages.layout')
@section('content')
    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="index.html" rel="nofollow">Home</a>
                    <span></span> Shop
                    <span></span> Your Cart
                </div>
            </div>
        </div>
        <section class="mt-50 mb-50">
            <div class="container">
                <div class="row">
                    <form method="POST" action="{{ url('/cart/update') }}">
                        @csrf
                        @method('PUT')

                        <div class="col-12">
                            <div class="table-responsive">
                                <table class="table shopping-summery text-center clean">
                                    <thead>
                                        <tr class="main-heading">
                                            <th scope="col">Image</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Price</th>
                                            <th scope="col">Quantity</th>
                                            <th scope="col">Subtotal</th>
                                            <th scope="col">Remove</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach (Session::get('cart', []) as $item)
                                            <tr>
                                                <td class="image product-thumbnail"><img src="{{ asset($item['image']) }}"
                                                        alt="#"></td>
                                                <td class="product-des product-name">
                                                    <h5 class="product-name"><a
                                                            href="product-details.html">{{ $item['name'] }}</a></h5>
                                                </td>
                                                <td class="price" data-title="Price">
                                                    <span>{{ number_format($item['price'], 0, ',', '.') }} </span>
                                                </td>
                                                <td class="text-center" data-title="Stock">
                                                    <input type="hidden" name="items[{{ $item['id'] }}][id]"
                                                        value="{{ $item['id'] }}">
                                                    <input type="number" name="items[{{ $item['id'] }}][quantity]"
                                                        value="{{ $item['quantity'] }}">
                                                </td>
                                                <td class="text-right" data-title="Cart">
                                                    <span>{{ number_format($item['total'] = $item['price'] * $item['quantity'], 0, ',', '.') }}
                                                    </span>
                                                </td>
                                                <td class="action" data-title="Remove"><a
                                                        href="{{ route('cart.remove', ['product' => $item['id']]) }}"
                                                        class="text-muted"><i class="fi-rs-trash"></i></a></td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>


                            <div class="cart-action text-end">
                                <button type="submit">Cập nhật giỏ hàng</button>
                                <a class="btn" href="{{ route('cart.checkout') }}"><i
                                        class="fi-rs-shopping-bag mr-10"></i>Thanh toán</a>
                            </div>
                            <div class="divider center_icon mt-50 mb-50"><i class="fi-rs-fingerprint"></i></div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </main>
@endsection
