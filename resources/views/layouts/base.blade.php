<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="MkRqEzTGuoSx6LqJUm0OAKxSgNUYt26wTT7RMUZY">
    <link rel="manifest" href="manifest.json">
    <link rel="apple-touch-icon" href="{{ asset('assets/images/favicon.ico') }}">
    <link rel="icon" href="{{ asset('assets/images/favicon.ico') }}" type="image/x-icon">
    <meta name="theme-color" content="#e87316">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="Surfside Media">
    <meta name="msapplication-TileImage" content="{{ asset('assets/images/favicon.ico') }}">
    <meta name="msapplication-TileColor" content="#FFFFFF">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Surfside Media">
    <meta name="keywords" content="Surfside Media">
    <meta name="author" content="Surfside Media">
    <link rel="preconnect" href="https://fonts.gstatic.com">

    <title>SurfsideMedia</title>

    <link id="rtl-link" rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/vendors/ion.rangeSlider.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/font-awesome.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/feather-icon.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/slick/slick.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/slick/slick-theme.css') }}">
    <link id="color-link" rel="stylesheet" type="text/css" href="{{ asset('assets/css/demo4.css') }}">
    <style>
        .h-logo {
            max-width: 185px !important;
        }

        .f-logo {
            max-width: 220px !important;
        }

        @media only screen and (max-width: 600px) {
            .h-logo {
                max-width: 110px !important;
            }
        }
    </style>
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
    @stack('styles')

</head>

<body class="theme-color4 light ltr">
    <style>
        header .profile-dropdown ul li {
            display: block;
            padding: 5px 20px;
            border-bottom: 1px solid #ddd;
            line-height: 35px;
        }

        header .profile-dropdown ul li:last-child {
            border-color: #fff;
        }

        header .profile-dropdown ul {
            padding: 10px 0;
            min-width: 250px;
        }

        .name-usr {
            background: #e87316;
            padding: 8px 12px;
            color: #fff;
            font-weight: bold;
            text-transform: uppercase;
            line-height: 24px;
        }

        .name-usr span {
            margin-right: 10px;
        }

        @media (max-width:600px) {
            .h-logo {
                max-width: 150px !important;
            }

            i.sidebar-bar {
                font-size: 22px;
            }

            .mobile-menu ul li a svg {
                width: 20px;
                height: 20px;
            }

            .mobile-menu ul li a span {
                margin-top: 0px;
                font-size: 12px;
            }

            .name-usr {
                padding: 5px 12px;
            }
        }
    </style>
    <header class="header-style-2" id="home">
        <div class="main-header navbar-searchbar">
            <div class="container-fluid-lg">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="main-menu">
                            <div class="menu-left">
                                <div class="brand-logo">
                                    <a href="{{ route('app.index') }}">
                                        <img src="{{ asset('assets/images/logo.png') }}"
                                            class="h-logo img-fluid blur-up lazyload" alt="logo">
                                    </a>
                                </div>

                            </div>
                            <nav>
                                <div class="main-navbar">
                                    <div id="mainnav">
                                        <div class="toggle-nav">
                                            <i class="fa fa-bars sidebar-bar"></i>
                                        </div>
                                        <ul class="nav-menu">
                                            <li class="back-btn d-xl-none">
                                                <div class="close-btn">
                                                    Menu
                                                    <span class="mobile-back"><i class="fa fa-angle-left"></i>
                                                    </span>
                                                </div>
                                            </li>
                                            <li><a href="{{ route('app.index') }}" class="nav-link menu-title">Home</a>
                                            </li>
                                            <li><a href="{{ route('shop.index') }}"
                                                    class="nav-link menu-title">Shop</a></li>
                                            <li><a href="{{ route('cart.index') }}"
                                                    class="nav-link menu-title">Cart</a></li>
                                            <li><a href="{{ route('blog.about') }}" class="nav-link menu-title">About
                                                    Us</a></li>
                                            <li><a href="{{ route('blog.contact') }}"
                                                    class="nav-link menu-title">Contact Us</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </nav>
                            <div class="menu-right">
                                <ul>
                                    <li>
                                        <div class="search-box theme-bg-color">
                                            <i data-feather="search"></i>
                                        </div>
                                    </li>
                                    <li class="onhover-dropdown wislist-dropdown">
                                        <div class="cart-media">
                                            <a href="{{ route('wishlist.list') }}">
                                                <i data-feather="heart"></i>
                                                <span id="wishlist-count" class="label label-theme rounded-pill">
                                                    {{ Cart::instance('wishlist')->count() }}
                                                </span>
                                            </a>
                                        </div>
                                        @if (Cart::instance('wishlist')->count() == 0)
                                            <div class="onhover-div">
                                                <a href="{{ route('wishlist.list') }}">
                                                    <div class="wislist-empty">
                                                        <i class="fab fa-gratipay"></i>
                                                        <h6 class="mb-1">Your wislist empty !!</h6>
                                                        <p class="font-light mb-0">explore more and shortlist items.
                                                        </p>
                                                    </div>
                                                </a>
                                            </div>
                                        @endif
                                    </li>
                                    <li class="onhover-dropdown cart-dropdown">
                                        <button type="button" class="btn btn-solid-default btn-spacing d-md-none">
                                            <i data-feather="shopping-cart" class="pe-2"></i>
                                            @if (Cart::instance('cart')->count() > 0)
                                                <span>${{ Cart::instance('cart')->total() }}</span>
                                            @endif
                                        </button>
                                        <div class="cart-media d-none d-md-block">
                                            <a href="{{ route('cart.index') }}">
                                                <i data-feather="shopping-cart"></i>
                                                <span id="cart-count" class="label label-theme rounded-pill">
                                                    {{ Cart::instance('cart')->count() }}
                                                </span>
                                            </a>
                                        </div>
                                        @if (Cart::instance('cart')->count() == 0)
                                            <div class="onhover-div">
                                                <a href="{{ route('wishlist.list') }}">
                                                    <div class="wislist-empty">
                                                        <i class="fab fa-opencart"></i>
                                                        <h6 class="mb-1">Your cart empty !!</h6>
                                                        <p class="font-light mb-0">Add products to your cart now
                                                        </p>
                                                    </div>
                                                </a>
                                            </div>
                                        @else
                                            <div class="onhover-div">
                                                <div class="cart-menu">
                                                    <div class="cart-title">
                                                        <h6>
                                                            <i data-feather="shopping-bag"></i>
                                                            <span
                                                                class="label label-theme rounded-pill">{{ Cart::instance('cart')->count() }}</span>
                                                        </h6>
                                                        <span class="d-md-none d-block">
                                                            <i class="fas fa-arrow-right back-cart"></i>
                                                        </span>
                                                    </div>
                                                    <ul class="custom-scroll">
                                                        @php
                                                            $temp = 0;
                                                        @endphp
                                                        @foreach (Cart::instance('cart')->content() as $item)
                                                            @php
                                                                $temp++;
                                                            @endphp
                                                            @if ($temp < 4)
                                                                <li>
                                                                    <div class="media">
                                                                        <img src="{{ asset('assets/images/fashion/product/front') }}/{{ $item->model->image }}"
                                                                            class="img-fluid blur-up lazyload"
                                                                            alt="{{ $item->model->name }}">
                                                                        <div class="media-body">
                                                                            <h6>{{ $item->model->name }}</h6>
                                                                            <div class="qty-with-price">
                                                                                <span>${{ $item->price }}</span>
                                                                                <span>
                                                                                    <input type="number"
                                                                                        name="quantity"
                                                                                        data-rowid="{{ $item->rowId }}"
                                                                                        onchange="updateQuantity(this)"
                                                                                        class="form-control input-number"
                                                                                        value="{{ $item->qty }}">
                                                                                </span>
                                                                            </div>
                                                                        </div>
                                                                        <a href="javascript:void(0)"
                                                                            class="btn-close d-block d-md-none"
                                                                            aria-label="Close"
                                                                            onclick="removeItemFromCart('{{ $item->rowId }}')">
                                                                            <i class="fas fa-times"></i>
                                                                        </a>
                                                                    </div>
                                                                </li>
                                                            @endif
                                                        @endforeach
                                                        @if ($temp > 3)
                                                            <li><a href="{{ route('cart.index') }}">Go to cart</a>
                                                            </li>
                                                        @endif
                                                    </ul>
                                                </div>
                                                <div class="cart-btn">
                                                    <h6 class="cart-total"><span
                                                            class="font-light">Total:</span>${{ Cart::instance('cart')->total() }}
                                                    </h6>
                                                    <a href="{{ route('cart.index') }}"
                                                        class="btn btn-solid-default btn-block">
                                                        Proceed to payment
                                                    </a>
                                                </div>
                                            </div>
                                        @endif
                                    </li>
                                    <li class="onhover-dropdown">
                                        <div class="cart-media name-usr">
                                            @auth
                                                <span>{{ Auth::user()->name }}</span>
                                            @endauth
                                            <i data-feather="user"></i>
                                        </div>
                                        <div class="onhover-div profile-dropdown">
                                            <ul>
                                                @if (Route::has('login'))
                                                    @auth
                                                        @if (Auth::user()->utype === 'ADM')
                                                            <li>
                                                                <a href="{{ route('admin.index') }}"
                                                                    class="d-block">Dashboard</a>
                                                            </li>
                                                        @else
                                                            <li>
                                                                <a href="{{ route('user.index') }}" class="d-block">My
                                                                    account</a>
                                                            </li>
                                                        @endif
                                                        <li>
                                                            <a href="{{ route('logout') }}"
                                                                onclick="event.preventDefault();document.getElementById('frmlogout').submit();"
                                                                class="d-block">Logout</a>
                                                            <form id="frmlogout" action="{{ route('logout') }}"
                                                                method="POST">
                                                                @csrf
                                                            </form>
                                                        </li>
                                                    @else
                                                        <li>
                                                            <a href="{{ route('login') }}" class="d-block">Login</a>
                                                        </li>
                                                        <li>
                                                            <a href="{{ route('register') }}"
                                                                class="d-block">Register</a>
                                                        </li>
                                                    @endauth
                                                @endif
                                            </ul>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="search-full">
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i data-feather="search" class="font-light"></i>
                                    </span>
                                    <input type="text" name="q" id="search-input"
                                        class="form-control search-type" placeholder="Search here..">
                                    <span class="input-group-text close-search">
                                        <i data-feather="x" class="font-light"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    {{-- 123 --}}
    <div class="container-fluid-search">
        <div id="search-results" class="row">
        </div>
    </div>

    <div class="mobile-menu d-sm-none">
        <ul>
            <li>
                <a href="{{ route('app.index') }}" class="{{ Request::is('/') ? 'active' : '' }}">
                    <i data-feather="home"></i>
                    <span>Home</span>
                </a>
            </li>
            <li>
                <a href="{{ route('shop.index') }}" class="{{ Request::is('shop') ? 'active' : '' }}">
                    <i data-feather="align-justify"></i>
                    <span>Category</span>
                </a>
            </li>
            <li>
                <a href="{{ route('cart.index') }}" class="{{ Request::is('cart') ? 'active' : '' }}">
                    <i data-feather="shopping-bag"></i>
                    <span>Cart</span>
                </a>
            </li>
            <li>
                <a href="{{ route('wishlist.list') }}" class="{{ Request::is('wishlist') ? 'active' : '' }}">
                    <i data-feather="heart"></i>
                    <span>Wishlist</span>
                </a>
            </li>
            <li>
                <a href="{{ route('login') }}" class="{{ Request::is('login') ? 'active' : '' }}">
                    <i data-feather="user"></i>
                    <span>Account</span>
                </a>
            </li>
        </ul>
    </div>

    @yield('content')

    <div id="qvmodal"></div>

    <footer class="footer-sm-space mt-5">
        <div class="main-footer">
            <div class="container">
                <div class="row gy-4">
                    <div class="col-xl-3 col-lg-4 col-md-6">
                        <div class="footer-contact">
                            <div class="brand-logo">
                                <a href="{{ route('app.index') }}" class="footer-logo float-start">
                                    <img src="{{ asset('assets/images/logo.png') }}"
                                        class="f-logo img-fluid blur-up lazyload" alt="logo">
                                </a>
                            </div>
                            <ul class="contact-lists" style="clear:both;">
                                <li>
                                    <span><b>phone:</b> <span class="font-light"> +1 0000000000</span></span>
                                </li>
                                <li>
                                    <span><b>Address:</b><span class="font-light"> NIT, Faridabad, Haryana,
                                            India</span></span>
                                </li>
                                <li>
                                    <span><b>Email:</b><span class="font-light">
                                            contact@surfsidemedia.in</span></span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 col-sm-6">
                        <div class="footer-links">
                            <div class="footer-title">
                                <h3>About us</h3>
                            </div>
                            <div class="footer-content">
                                <ul>
                                    <li>
                                        <a href="{{ route('app.index') }}" class="font-dark">Home</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('shop.index') }}" class="font-dark">Shop</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('blog.about') }}" class="font-dark">About Us</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('blog.contact') }}" class="font-dark">Contact</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
                        <div class="footer-links">
                            <div class="footer-title">
                                <h3>New Categories</h3>
                            </div>
                            <div class="footer-content">
                                <ul>
                                    <li>
                                        <a href="shop.html" class="font-dark">Latest Shoes</a>
                                    </li>
                                    <li>
                                        <a href="shop.html" class="font-dark">Branded Jeans</a>
                                    </li>
                                    <li>
                                        <a href="shop.html" class="font-dark">New Jackets</a>
                                    </li>
                                    <li>
                                        <a href="shop.html" class="font-dark">Colorfull Hoodies</a>
                                    </li>
                                    <li>
                                        <a href="shop.html" class="font-dark">Shiner Goggles</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
                        <div class="footer-links">
                            <div class="footer-title">
                                <h3>Get Help</h3>
                            </div>
                            <div class="footer-content">
                                <ul>
                                    <li>
                                        <a href="#" class="font-dark">Your Orders</a>
                                    </li>
                                    <li>
                                        <a href="#" class="font-dark">Your Account</a>
                                    </li>
                                    <li>
                                        <a href="#" class="font-dark">Track Orders</a>
                                    </li>
                                    <li>
                                        <a href="#" class="font-dark">Your Wishlist</a>
                                    </li>
                                    <li>
                                        <a href="#" class="font-dark">Shopping FAQs</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-sm-6 d-none d-sm-block">
                        <div class="footer-newsletter">
                            <h3>Let’s stay in touch</h3>
                            <div class="form-newsletter">
                                <div class="input-group mb-4">
                                    <input type="text" class="form-control color-4"
                                        placeholder="Your Email Address">
                                    <span class="input-group-text" id="basic-addon4"><i
                                            class="fas fa-arrow-right"></i></span>
                                </div>
                                <p class="font-dark mb-0">Keep up to date with our latest news and special offers.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="sub-footer">
            <div class="container">
                <div class="row gy-3">
                    <div class="col-md-6">
                        <ul>
                            <li class="font-dark">We accept:</li>
                            <li>
                                <a href="javascript:void(0)">
                                    <img src="{{ asset('assets/images/payment-icon/1.jpg') }}"
                                        class="img-fluid blur-up lazyload" alt="payment icon">
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)">
                                    <img src="{{ asset('assets/images/payment-icon/2.jpg') }}"
                                        class="img-fluid blur-up lazyload" alt="payment icon">
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)">
                                    <img src="{{ asset('assets/images/payment-icon/3.jpg') }}"
                                        class="img-fluid blur-up lazyload" alt="payment icon">
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)">
                                    <img src="{{ asset('assets/images/payment-icon/4.jpg') }}"
                                        class="img-fluid blur-up lazyload" alt="payment icon">
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <p class="mb-0 font-dark">© 2023, Surfside Media.</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <div class="modal fade newletter-modal" id="newsletter">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content ">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <img src="{{ asset('assets/images/newletter-icon.png') }}" class="img-fluid blur-up lazyload"
                        alt="">
                    <div class="modal-title">
                        <h2 class="tt-title">Sign up for our Newsletter!</h2>
                        <p class="font-light">Never miss any new updates or products we reveal, stay up to date.</p>
                        <p class="font-light">Oh, and it's free!</p>

                        <div class="input-group mb-3">
                            <input placeholder="Email" class="form-control" type="text">
                        </div>

                        <div class="cancel-button text-center">
                            <button class="btn default-theme w-100" data-bs-dismiss="modal"
                                type="button">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <form id="updateCartQty" action="{{ route('cart.update') }}" method="POST">
        @csrf
        @method('put')
        <input type="hidden" id="rowId" name="rowId" />
        <input type="hidden" id="quantity" name="quantity" />
    </form>

    <form id="deleteFromCart" action="{{ route('cart.remove') }}" method="post">
        @csrf
        @method('delete')
        <input type="hidden" id="rowId_D" name="rowId" />
    </form>

    <div class="tap-to-top">
        <a href="#home">
            <i class="fas fa-chevron-up"></i>
        </a>
    </div>
    <div class="bg-overlay"></div>
    <script src="{{ asset('assets/js/jquery-3.5.1.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/feather/feather.min.js') }}"></script>
    <script src="{{ asset('assets/js/lazysizes.min.js') }}"></script>
    <script src="{{ asset('assets/js/slick/slick.js') }}"></script>
    <script src="{{ asset('assets/js/slick/slick-animation.min.js') }}"></script>
    <script src="{{ asset('assets/js/slick/custom_slick.js') }}"></script>
    <script src="{{ asset('assets/js/price-filter.js') }}"></script>
    <script src="{{ asset('assets/js/ion.rangeSlider.min.js') }}"></script>
    <script src="{{ asset('assets/js/filter.js') }}"></script>
    <script src="{{ asset('assets/js/newsletter.js') }}"></script>
    <script src="{{ asset('assets/js/cart_modal_resize.js') }}"></script>
    <script src="{{ asset('assets/js/rating.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap/bootstrap-notify.min.js') }}"></script>
    <script src="{{ asset('assets/js/theme-setting.js') }}"></script>
    <script src="{{ asset('assets/js/script.js') }}"></script>

    <script>
        $(function() {
            $('[data-bs-toggle="tooltip"]').tooltip()
        });

        function updateQuantity(qty) {
            $a = $('#rowId').val($(qty).data('rowid'));
            $b = $('#quantity').val($(qty).val());
            $('#updateCartQty').submit();
        }

        function removeItemFromCart(rowId) {
            $('#rowId_D').val(rowId);
            $('#deleteFromCart').submit();
        }

        $(".search-box").on('click', function() {
            $('#search-input').focus();
        });

        $(function() {
            $('#search-input').on('keyup', function() {
                let query = $(this).val();
                if (query.length > 1) {
                    $.ajax({
                        url: "{{ route('search') }}",
                        type: "GET",
                        data: {
                            query: query
                        },
                        success: function(data) {
                            $('#search-results').empty();
                            if (data.length > 0) {
                                data.slice(0, 6).forEach(function(product) {
                                    $('#search-results').append(
                                        `<div class="productItem d-flex p-2 col-lg-6">
                                            <a href="/product/${product.slug}">
                                                <img src="{{ asset('assets/images/fashion/product/back/${product.image}') }}" class="img-fluid-search"
                                                alt="${product.name}">
                                            </a>
                                            
                                            <div class="info-product">
                                                <a href="/product/${product.slug}">
                                                    <h3>${product.name}</h3>
                                                </a>
                                                <p class="sale-price">$${product.sale_price} <span class="regular-price">$${product.regular_price}</span></p>
                                                <div class="category">
                                                    Category: <span class="name-cat">${product.category.name}</span>
                                                </div>
                                                <div class="brand">
                                                    Brand: <span class="name-brand">${product.brand.name}</span>
                                                </div>
                                            </div>
                                        </div>`
                                    );
                                });
                            } else {
                                $('#search-results').append(
                                    `<div class="no-product">
                                        <p>No products found. Try searching again</p>
                                    </div>`
                                );
                            }
                        },
                    });
                } else {
                    $('#search-results').empty();
                }
            });
        });

        $('.close-search').on('click', function() {
            $('#search-input').val('');
            $('#search-results').empty();
        });
    </script>

    @stack('scripts')

</body>

</html>
