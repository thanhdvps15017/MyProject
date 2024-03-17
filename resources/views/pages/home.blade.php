@extends('pages.layout')

@section('content')
    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    <section class="home-slider position-relative pt-50">
        <div class="hero-slider-1 dot-style-1 dot-style-1-position-1">
            @foreach ($slider as $items)
                <div class="single-hero-slider single-animation-wrap">
                    <div class="container">
                        <div class="row align-items-center slider-animated-1">
                            <div class="col-lg-5 col-md-6">
                                <div class="hero-slider-content-2">
                                    <h4 class="animated">{{ $items->content1 }}</h4>
                                    <h2 class="animated fw-900">{{ $items->content2 }}</h2>
                                    <h1 class="animated fw-900 text-brand">{{ $items->content3 }}</h1>
                                    <p class="animated">{{ $items->content4 }}</p>
                                    <a class="animated btn btn-brush btn-brush-3" href="{{ route('product') }}"> Mua ngay
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-7 col-md-6">
                                <div class="single-slider-img single-slider-img-1">
                                    <img class="animated slider-1-1" src="{{ asset('uploads/' . $items->images) }}"
                                        alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
        <div class="slider-arrow hero-slider-1-arrow"></div>
    </section>
    <section class="featured section-padding position-relative">
        <div class="container">
            <div class="row">
                <div class="col-lg-2 col-md-4 mb-md-3 mb-lg-0">
                    <div class="banner-features wow fadeIn animated hover-up">
                        <img src="assets/imgs/theme/icons/feature-1.png" alt="">
                        <h4 class="bg-1">Free Shipping</h4>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 mb-md-3 mb-lg-0">
                    <div class="banner-features wow fadeIn animated hover-up">
                        <img src="assets/imgs/theme/icons/feature-2.png" alt="">
                        <h4 class="bg-3">Online Order</h4>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 mb-md-3 mb-lg-0">
                    <div class="banner-features wow fadeIn animated hover-up">
                        <img src="assets/imgs/theme/icons/feature-3.png" alt="">
                        <h4 class="bg-2">Save Money</h4>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 mb-md-3 mb-lg-0">
                    <div class="banner-features wow fadeIn animated hover-up">
                        <img src="assets/imgs/theme/icons/feature-4.png" alt="">
                        <h4 class="bg-4">Promotions</h4>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 mb-md-3 mb-lg-0">
                    <div class="banner-features wow fadeIn animated hover-up">
                        <img src="assets/imgs/theme/icons/feature-5.png" alt="">
                        <h4 class="bg-5">Happy Sell</h4>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 mb-md-3 mb-lg-0">
                    <div class="banner-features wow fadeIn animated hover-up">
                        <img src="assets/imgs/theme/icons/feature-6.png" alt="">
                        <h4 class="bg-6">24/7 Support</h4>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="product-tabs section-padding position-relative wow fadeIn animated">
        <div class="bg-square"></div>
        <div class="container">
            <div class="tab-header">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="nav-tab-one" data-bs-toggle="tab" data-bs-target="#tab-one"
                            type="button" role="tab" aria-controls="tab-one" aria-selected="true">NIKE</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="nav-tab-two" data-bs-toggle="tab" data-bs-target="#tab-two"
                            type="button" role="tab" aria-controls="tab-two" aria-selected="false">ADDIDAS</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="nav-tab-three" data-bs-toggle="tab" data-bs-target="#tab-three"
                            type="button" role="tab" aria-controls="tab-three" aria-selected="false">JORDAN</button>
                    </li>
                </ul>
                <a href="{{ route('product') }}" class="view-more d-none d-md-flex">View More<i
                        class="fi-rs-angle-double-small-right"></i></a>
            </div>
            <!--End nav-tabs-->
            <div class="tab-content wow fadeIn animated" id="myTabContent">
                <div class="tab-pane fade show active" id="tab-one" role="tabpanel" aria-labelledby="tab-one">
                    <div class="row product-grid-4">
                        @foreach ($topNike as $item)
                            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6 col-6">
                                <div class="product-cart-wrap mb-30">
                                    <div class="product-img-action-wrap">
                                        <div class="product-img product-img-zoom">
                                            <a href="{{ route('product.detail', $item->id) }}">
                                                <img class="default-img" src="{{ asset($item->image) }}" alt="">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="product-content-wrap">
                                        <h2><a href="{{ route('product.detail', $item->id) }}">{{ $item->name }}</a>
                                        </h2>
                                        <div class="product-price">
                                            <span> {{ number_format($item->price, 0, ',', '.') }}
                                            </span>
                                        </div>
                                        <div class="product-action-1 show">
                                            <a aria-label="Add To Cart" class="action-btn hover-up"
                                                href="{{ route('cart.add', $item->id) }}"><i
                                                    class="fi-rs-shopping-bag-add"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <!--End product-grid-4-->
                </div>
                <!--En tab one adidas-->
                <div class="tab-pane fade" id="tab-two" role="tabpanel" aria-labelledby="tab-two">
                    <div class="row product-grid-4">
                        @foreach ($topAdidas as $item)
                            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6 col-6">
                                <div class="product-cart-wrap mb-30">
                                    <div class="product-img-action-wrap">
                                        <div class="product-img product-img-zoom">
                                            <a href="{{ route('product.detail', $item->id) }}">
                                                <img class="default-img" src="{{ asset($item->image) }}" alt="">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="product-content-wrap">
                                        <h2><a href="{{ route('product.detail', $item->id) }}">{{ $item->name }}</a>
                                        </h2>
                                        <div class="product-price">
                                            <span> {{ number_format($item->price, 0, ',', '.') }}
                                            </span>
                                        </div>
                                        <div class="product-action-1 show">
                                            <a aria-label="Add To Cart" class="action-btn hover-up"
                                                href="{{ route('cart.add', $item->id) }}"><i
                                                    class="fi-rs-shopping-bag-add"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <!--End product-grid-4-->
                </div>
                <!--En tab two jordan-->
                <div class="tab-pane fade" id="tab-three" role="tabpanel" aria-labelledby="tab-three">
                    <div class="row product-grid-4">
                        @foreach ($topJordan as $item)
                            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6 col-6">
                                <div class="product-cart-wrap mb-30">
                                    <div class="product-img-action-wrap">
                                        <div class="product-img product-img-zoom">
                                            <a href="{{ route('product.detail', $item->id) }}">
                                                <img class="default-img" src="{{ asset($item->image) }}" alt="">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="product-content-wrap">
                                        <h2><a href="{{ route('product.detail', $item->id) }}">{{ $item->name }}</a>
                                        </h2>
                                        <div class="product-price">
                                            <span> {{ number_format($item->price, 0, ',', '.') }}
                                            </span>
                                        </div>
                                        <div class="product-action-1 show">
                                            <a aria-label="Add To Cart" class="action-btn hover-up"
                                                href="{{ route('cart.add', $item->id) }}"><i
                                                    class="fi-rs-shopping-bag-add"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <!--End product-grid-4-->
                </div>
                <!--En tab three (Sản phẩm mới)-->
            </div>
            <!--End tab-content-->
        </div>
    </section>
    <section class="section-padding">
        <div class="container wow fadeIn animated">
            <h3 class="section-title mb-20">SẢN PHÂM <span>MỚI</span></h3>
            <div class="carausel-6-columns-cover position-relative">
                <div class="slider-arrow slider-arrow-2 carausel-6-columns-arrow" id="carausel-6-columns-2-arrows">
                </div>
                <div class="carausel-6-columns carausel-arrow-center" id="carausel-6-columns-2">
                    @foreach ($productsNew as $item)
                        <div class="product-cart-wrap small hover-up">
                            <div class="product-img-action-wrap">
                                <div class="product-img product-img-zoom">
                                    <a href="{{ route('product.detail', $item->id) }}">
                                        <img class="default-img" src="{{ asset($item->image) }}" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="product-content-wrap">
                                <h2><a href="{{ route('product.detail', $item->id) }}">{{ $item->name }}</a></h2>
                                <div class="rating-result" title="90%">
                                    <span>
                                    </span>
                                </div>
                                <div class="product-price">
                                    <span> {{ number_format($item->price, 0, ',', '.') }}
                                    </span>
                                    <span class="old-price">$185.8</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>






    <section class="section-padding">
        <div class="container">
            <h3 class="section-title mb-20 wow fadeIn animated"><span>Featured</span> Brands</h3>
            <div class="carausel-6-columns-cover position-relative wow fadeIn animated">
                <div class="slider-arrow slider-arrow-2 carausel-6-columns-arrow" id="carausel-6-columns-3-arrows">
                </div>
                <div class="carausel-6-columns text-center" id="carausel-6-columns-3">
                    <div class="brand-logo">
                        <img class="img-grey-hover" src="assets/imgs/banner/brand-1.png" alt="">
                    </div>
                    <div class="brand-logo">
                        <img class="img-grey-hover" src="assets/imgs/banner/brand-2.png" alt="">
                    </div>
                    <div class="brand-logo">
                        <img class="img-grey-hover" src="assets/imgs/banner/brand-3.png" alt="">
                    </div>
                    <div class="brand-logo">
                        <img class="img-grey-hover" src="assets/imgs/banner/brand-4.png" alt="">
                    </div>
                    <div class="brand-logo">
                        <img class="img-grey-hover" src="assets/imgs/banner/brand-5.png" alt="">
                    </div>
                    <div class="brand-logo">
                        <img class="img-grey-hover" src="assets/imgs/banner/brand-6.png" alt="">
                    </div>
                    <div class="brand-logo">
                        <img class="img-grey-hover" src="assets/imgs/banner/brand-3.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
