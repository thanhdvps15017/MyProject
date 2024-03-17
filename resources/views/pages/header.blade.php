<div class="header-middle d-none d-lg-block">
    <div class="container">
        <div class="header-wrap">
            <div class="logo logo-width-1">
                <a href="{{ route('home') }}"><img src="{{ asset('assets/imgs/logo/logo.png') }}" alt="logo"></a>
            </div>
            <div class="header-right">
                <div class="search-style-1">
                    <input type="text" id="searchInput" placeholder="Search products...">
                    <div id="searchResults"></div>
                </div>

                <div class="header-info header-info-right">
                    @if (Auth::check())
                        <ul>
                            <li>
                                <a href="{{ route('profile') }}">Hello{{ Auth::user()->name }}</a>
                            </li>
                            <li>
                                <form action="{{ route('logout') }}" method="post">
                                    @csrf
                                    <button class="btn-logout" type="submit">Logout</button>
                                </form>
                            </li>
                        </ul>
                    @else
                        <ul>
                            <li><a href="{{ route('login') }}">Đăng nhập </a> / <a href="{{ route('register') }}">Đăng
                                    ký</a>
                            </li>
                        </ul>
                    @endif
                </div>

                <div class="header-action-right">
                    <div class="header-action-2">
                        <div class="header-action-icon-2">
                            <a class="mini-cart-icon" href="{{ route('cart.show') }}">
                                <img alt="Surfside Media" src="{{ asset('assets/imgs/theme/icons/icon-cart.svg') }}">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="header-bottom header-bottom-bg-color sticky-bar">
    <div class="container">
        <div class="header-wrap header-space-between position-relative">
            <div class="logo logo-width-1 d-block d-lg-none">
                <a href="{{ route('home') }}"><img src="assets/imgs/logo/logo.png" alt="logo"></a>
            </div>
            <div class="header-nav d-none d-lg-flex">
                <div class="main-menu main-menu-padding-1 main-menu-lh-2 d-none d-lg-block">
                    @include('pages.nav')
                </div>
            </div>
            <div class="header-action-right d-block d-lg-none">
                <div class="header-action-2">
                    <div class="header-action-icon-2">
                        <a href="shop-wishlist.php">
                            <img alt="Surfside Media" src="assets/imgs/theme/icons/icon-heart.svg">
                            <span class="pro-count white">4</span>
                        </a>
                    </div>
                    <div class="header-action-icon-2">
                        <a class="mini-cart-icon" href="cart.html">
                            <img alt="Surfside Media" src="assets/imgs/theme/icons/icon-cart.svg">
                            <span class="pro-count white">2</span>
                        </a>
                        <div class="cart-dropdown-wrap cart-dropdown-hm2">
                            <ul>
                                <li>
                                    <div class="shopping-cart-img">
                                        <a href="product-details.html"><img alt="Surfside Media"
                                                src="assets/imgs/shop/thumbnail-3.jpg"></a>
                                    </div>
                                    <div class="shopping-cart-title">
                                        <h4><a href="product-details.html">Plain Striola Shirts</a></h4>
                                        <h3><span>1 × </span>$800.00</h3>
                                    </div>
                                    <div class="shopping-cart-delete">
                                        <a href="#"><i class="fi-rs-cross-small"></i></a>
                                    </div>
                                </li>
                                <li>
                                    <div class="shopping-cart-img">
                                        <a href="product-details.html"><img alt="Surfside Media"
                                                src="assets/imgs/shop/thumbnail-4.jpg"></a>
                                    </div>
                                    <div class="shopping-cart-title">
                                        <h4><a href="product-details.html">Macbook Pro 2022</a></h4>
                                        <h3><span>1 × </span>$3500.00</h3>
                                    </div>
                                    <div class="shopping-cart-delete">
                                        <a href="#"><i class="fi-rs-cross-small"></i></a>
                                    </div>
                                </li>
                            </ul>
                            <div class="shopping-cart-footer">
                                <div class="shopping-cart-total">
                                    <h4>Total <span>$383.00</span></h4>
                                </div>
                                <div class="shopping-cart-button">
                                    <a href="cart.html">View cart</a>
                                    <a href="shop-checkout.php">Checkout</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="header-action-icon-2 d-block d-lg-none">
                        <div class="burger-icon burger-icon-white">
                            <span class="burger-icon-top"></span>
                            <span class="burger-icon-mid"></span>
                            <span class="burger-icon-bottom"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- tìm  kiếm   --}}
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#searchInput').on('input', function() {
            var query = $(this).val();

            if (query.length > 2) {
                $.ajax({
                    url: "{{ route('search') }}",
                    method: "GET",
                    data: {
                        query: query
                    },
                    success: function(response) {
                        $('#searchResults').empty();

                        if (response.length > 0) {
                            $.each(response, function(key, value) {
                                $('#searchResults').append('<option>' + value.name +
                                    '</option>');
                            });
                        } else {
                            $('#searchResults').append('<p>No results found</p>');
                        }
                    }
                });
            } else {
                $('#searchResults').empty();
            }
        });
    });
</script>
{{-- test --}}
