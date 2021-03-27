<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Blossom') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/vendor/bootstrap.min.css')}}">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/vendor/font.awesome.min.css')}}">
    <!-- Linear Icons CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/vendor/linearicons.min.css')}}">
    <!-- Swiper CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/plugins/swiper-bundle.min.css')}}">
    <!-- Animation CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/plugins/animate.min.css')}}">
    <!-- Jquery ui CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/plugins/jquery-ui.min.css')}}">
    <!-- Nice Select CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/plugins/nice-select.min.css')}}">
    <!-- Magnific Popup -->
    <link rel="stylesheet" href="{{asset('assets/css/plugins/magnific-popup.css')}}">

    <!-- Main Style CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
</head>

<body>
    <!-- Breadcrumb Area Start Here -->

    <!-- Breadcrumb Area End Here -->
    <div id="app">
        <header class="main-header-area">
            <!-- Main Header Area Start -->
            <div class="main-header header-transparent header-sticky">
                <div class="container-fluid">
                    <div class="row align-items-center">
                        <div class="col-lg-2 col-xl-2 col-md-6 col-6 col-custom">
                            <div class="header-logo d-flex align-items-center">
                                <a href="index">
                                    <img src="{{asset('assets/images/logo/BlossomLogo2.png')}}" alt="Logo Image">
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-8 d-none d-lg-flex justify-content-center col-custom">
                            <nav class="main-nav d-none d-lg-flex">
                                <ul class="nav">
                                    <li>
                                        <a href="index">
                                            <span class="menu-text"> Home</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="shop">
                                            <span class="menu-text">Shop</span>

                                        </a>

                                    </li>
                                    <li>
                                        <a href="account">
                                            <span class="menu-text"> Profile</span>
                                            <i class="fa fa-angle-down"></i>
                                        </a>
                                        <ul class="dropdown-submenu dropdown-hover">

                                            <!-- Authentication Links -->
                                            @guest
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                            </li>
                                            @if (Route::has('register'))
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                            </li>
                                            @endif
                                            @else
                                            <li class="nav-item dropdown">
                                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                                    {{ Auth::user()->name }}
                                                </a>

                                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                                             document.getElementById('logout-form').submit();">
                                                        {{ __('Logout') }}
                                                    </a>

                                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                        @csrf
                                                    </form>
                                                </div>
                                            </li>
                                            @endguest


                                        </ul>
                                    </li>
                                    <li>
                                        <a href="about">
                                            <span class="menu-text"> About Us</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="contact">
                                            <span class="menu-text">Contact Us</span>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                        <div class="col-lg-2 col-md-6 col-6 col-custom">
                            <div class="header-right-area main-nav">
                                <ul class="nav">
                                    <li class="minicart-wrap">

                                        <div class="cart-item-wrapper dropdown-sidemenu dropdown-hover-2">
                                            <div class="single-cart-item">
                                                <div class="cart-img">
                                                    <a href="cart.html"><img src="{{asset('assets/images/cart/1.jpg" alt=""')}}></a>
                                                </div>
                                                <div class=" cart-text">
                                                        <h5 class="title"><a href="cart.html">Odio tortor consequat</a></h5>
                                                        <div class="cart-text-btn">
                                                            <div class="cart-qty">
                                                                <span>1×</span>
                                                                <span class="cart-price">$98.00</span>
                                                            </div>
                                                            <button type="button"><i class="ion-trash-b"></i></button>
                                                        </div>
                                                </div>
                                            </div>
                                            <div class="single-cart-item">
                                                <div class="cart-img">
                                                    <a href="cart.html"><img src="{{asset('assets/images/cart/2.jpg" alt=""')}}></a>
                                                </div>
                                                <div class=" cart-text">
                                                        <h5 class="title"><a href="cart.html">Integer eget augue</a></h5>
                                                        <div class="cart-text-btn">
                                                            <div class="cart-qty">
                                                                <span>1×</span>
                                                                <span class="cart-price">$98.00</span>
                                                            </div>
                                                            <button type="button"><i class="ion-trash-b"></i></button>
                                                        </div>
                                                </div>
                                            </div>
                                            <div class="single-cart-item">
                                                <div class="cart-img">
                                                    <a href="cart.html"><img src="{{asset('assets/images/cart/3.jpg" alt=""')}}></a>
                                                </div>
                                                <div class=" cart-text">
                                                        <h5 class="title"><a href="cart.html">Eleifend quam</a></h5>
                                                        <div class="cart-text-btn">
                                                            <div class="cart-qty">
                                                                <span>1×</span>
                                                                <span class="cart-price">$98.00</span>
                                                            </div>
                                                            <button type="button"><i class="ion-trash-b"></i></button>
                                                        </div>
                                                </div>
                                            </div>
                                            <div class="cart-price-total d-flex justify-content-between">
                                                <h5>Total :</h5>
                                                <h5>$166.00</h5>
                                            </div>
                                            <div class="cart-links d-flex justify-content-between">
                                                <a class="btn product-cart button-icon flosun-button dark-btn" href="cart.html">View cart</a>
                                                <a class="btn flosun-button secondary-btn rounded-0" href="checkout.html">Checkout</a>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="sidemenu-wrap">

                                        <ul class="dropdown-sidemenu dropdown-hover-2 dropdown-search">
                                            <li>
                                                <form action="#">
                                                    <input name="search" id="search" placeholder="Search" type="text">
                                                    <button type="submit"><i class="fa fa-search"></i></button>
                                                </form>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="account-menu-wrap d-none d-lg-flex">
                                        <a href="#" class="off-canvas-menu-btn">
                                            <i class="fa fa-bars"></i>
                                        </a>
                                    </li>
                                    <li class="mobile-menu-btn d-lg-none">
                                        <a class="off-canvas-btn" href="#">
                                            <i class="fa fa-bars"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Main Header Area End -->
            <!-- off-canvas menu start -->
            <aside class="off-canvas-wrapper" id="mobileMenu">
                <div class="off-canvas-overlay"></div>
                <div class="off-canvas-inner-content">
                    <div class="btn-close-off-canvas">
                        <i class="fa fa-times"></i>
                    </div>
                    <div class="off-canvas-inner">
                        <div class="search-box-offcanvas">
                            <form>
                                <input type="text" placeholder="Search product...">
                                <button class="search-btn"><i class="fa fa-search"></i></button>
                            </form>
                        </div>
                        <!-- mobile menu start -->
                        <div class="mobile-navigation">
                            <!-- mobile menu navigation start -->
                            <nav>
                                <ul class="mobile-menu">
                                    <li class="menu-item-has-children"><a href="index">Home</a>

                                    </li>
                                    <li class="menu-item-has-children"><a href="shop">Shop</a>

                                    </li>


                                </ul>
                                </li>
                                <li class="menu-item-has-children "><a href="account">My Account</a>
                                    <ul class="dropdown">

                                        <li><a href="account">My Account</a></li>
                                        <li><a href="login-register.html">login &amp; register</a></li>
                                    </ul>
                                </li>
                                <li><a href="about">About Us</a></li>
                                <li><a href="contact">Contact</a></li>

                            </nav>
                            <!-- mobile menu navigation end -->
                        </div>
                        <!-- mobile menu end -->

                    </div>

            </aside>
            <!-- off-canvas menu end -->
            <!-- off-canvas menu start -->
            <aside class="off-canvas-menu-wrapper" id="sideMenu">
                <div class="off-canvas-overlay"></div>
                <div class="off-canvas-inner-content">
                    <div class="off-canvas-inner">
                        <div class="btn-close-off-canvas">
                            <i class="fa fa-times"></i>
                        </div>
                        <!-- offcanvas widget area start -->
                        <div class="offcanvas-widget-area">
                            <ul class="menu-top-menu">
                                <li><a href="about">About Us</a></li>
                            </ul>
                            <p class="desc-content">
                                Blossom Flowers has gained an acclaimed reputation and recognition just because of the quality of flower arrangements and online delivery. At our platform, you have a chance to select from a wide array of flowers according to the latest trend and occasion. Each flower arrangement is personally hand-tied by our experienced florist who has been in this field for years.
                            </p>

                            <div class="top-info-wrap text-left text-black">
                                <ul class="address-info">
                                    <li>
                                        <i class="fa fa-phone"></i>
                                        <a href="info%40yourdomain.html">077 7777 777</a>
                                    </li>
                                    <li>
                                        <i class="fa fa-envelope"></i>
                                        <a href="info%40yourdomain.html">info@blossom.com</a>
                                    </li>
                                </ul>
                                <div class="widget-social">
                                    <a class="facebook-color-bg" title="Facebook-f" href="#"><i class="fa fa-facebook-f"></i></a>
                                    <a class="twitter-color-bg" title="Twitter" href="#"><i class="fa fa-twitter"></i></a>
                                    <a class="linkedin-color-bg" title="Linkedin" href="#"><i class="fa fa-linkedin"></i></a>
                                    <a class="youtube-color-bg" title="Youtube" href="#"><i class="fa fa-youtube"></i></a>
                                    <a class="vimeo-color-bg" title="Vimeo" href="#"><i class="fa fa-vimeo"></i></a>
                                </div>
                            </div>
                        </div>
                        <!-- offcanvas widget area end -->
                    </div>
                </div>
            </aside>
            <!-- off-canvas menu end -->
        </header>


        <main>
            @yield('content')
            @include('pages.message')
        </main>
    </div>
    <!-- Modernizer JS -->
    <script src="{{asset('assets/js/vendor/modernizr-3.7.1.min.js')}}"></script>
    <!-- jQuery JS -->
    <script src="{{asset('assets/js/vendor/jquery-3.5.1.min.js')}}"></script>
    <!-- Bootstrap JS -->
    <script src="{{asset('assets/js/vendor/bootstrap.bundle.min.js')}}"></script>

    <!-- Swiper Slider JS -->
    <script src="{{asset('assets/js/plugins/swiper-bundle.min.js')}}"></script>
    <!-- nice select JS -->
    <script src="{{asset('assets/js/plugins/nice-select.min.js')}}"></script>
    <!-- Ajaxchimpt js -->
    <script src="{{asset('assets/js/plugins/jquery.ajaxchimp.min.js')}}"></script>
    <!-- Jquery Ui js -->
    <script src="{{asset('assets/js/plugins/jquery-ui.min.js')}}"></script>
    <!-- Jquery Countdown js -->
    <script src="{{asset('assets/js/plugins/jquery.countdown.min.js')}}"></script>
    <!-- jquery magnific popup js -->
    <script src="{{asset('assets/js/plugins/jquery.magnific-popup.min.js')}}"></script>

    <!-- Main JS -->
    <script src="{{asset('assets/js/main.js')}}"></script>
</body>

</html>