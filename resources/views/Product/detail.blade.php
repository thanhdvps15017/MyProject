@extends('pages.layout')

@section('content')
    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    <main class="main" style="transform: none;">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="index.html" rel="nofollow">Home</a>
                    <span></span> Fashion
                    <span></span> Abstract Print Patchwork Dress
                </div>
            </div>
        </div>
        <section class="mt-50 mb-50" style="transform: none;">
            <div class="container" style="transform: none;">
                <div class="row" style="transform: none;">
                    <div class="col-lg-9">
                        <div class="product-detail accordion-detail">
                            <div class="row mb-50">
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    <div class="detail-gallery">
                                        <img src="{{ asset($product->image) }}" alt="" srcset="">
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    <div class="detail-info">
                                        <h2 class="title-detail">{{ $product->name }}</h2>
                                        <div class="product-detail-rating">
                                            <div class="pro-details-brand">
                                                <span> Thương hiệu: <a href="shop.html">{{ $product->brand }}</a></span>
                                            </div>
                                            <div class="product-rate-cover text-end">
                                                <div class="product-rate d-inline-block">
                                                    <div class="product-rating" style="width:90%">
                                                    </div>
                                                </div>
                                                <span class="font-small ml-5 text-muted"> (25 reviews)</span>
                                            </div>
                                        </div>
                                        <div class="clearfix product-price-cover">
                                            <div class="product-price primary-color float-left">
                                                <ins><span class="text-brand">
                                                        {{ number_format($product->price, 0, ',', '.') }}</span></ins>
                                            </div>
                                        </div>
                                        <div class="bt-1 border-color-1 mt-15 mb-15"></div>
                                        <div class="short-desc mb-30">
                                            <p>{{ $product->description }}</p>
                                        </div>
                                        <div class="product_sort_info font-xs mb-30">
                                            <ul>
                                                <li class="mb-10"><i class="fi-rs-crown mr-5"></i> Bảo hành trong vòng 1
                                                    năm
                                                    Brand Warranty</li>
                                                <li class="mb-10"><i class="fi-rs-refresh mr-5"></i> Chính sách hoản trả
                                                    trong 30 ngày
                                                </li>
                                                <li><i class="fi-rs-credit-card mr-5"></i> Thanh toán khi nhận hàng</li>
                                            </ul>
                                        </div>
                                        <a href="{{ route('cart.add', $product->id) }}">
                                            <div class="detail-extralink">
                                                <div class="product-extra-link2">
                                                    <button type="submit" class="button button-add-to-cart">MUA</button>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <!-- Detail Info -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 primary-sidebar sticky-sidebar"
                        style="position: relative; overflow: visible; box-sizing: border-box; min-height: 1px;">
                        <div class="theiaStickySidebar"
                            style="padding-top: 0px; padding-bottom: 1px; position: static; transform: none;">
                            <div class="sidebar-widget product-sidebar  mb-30 p-30 bg-grey border-radius-10">
                                <div class="widget-header position-relative mb-20 pb-10">
                                    <h5 class="widget-title mb-10">Sản phẩm mới</h5>
                                    <div class="bt-1 border-color-1"></div>
                                </div>
                                @foreach ($productsNew as $item)
                                    <div class="single-post clearfix">
                                        <div class="image">
                                            <img src="{{ asset($item->image) }}">
                                        </div>
                                        <div class="content pt-10">
                                            <h5><a href="{{ route('product.detail', $item->id) }}">{{ $item->name }}</a>
                                            </h5>
                                            {{ number_format($item->price, 0, ',', '.') }}
                                            <p class="price mb-0 mt-5"></p>
                                            <div class="product-rate">
                                                <div class="product-rating" style="width:90%"></div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
