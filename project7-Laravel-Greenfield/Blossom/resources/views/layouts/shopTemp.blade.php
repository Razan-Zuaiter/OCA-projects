<!DOCTYPE html>
<html class="no-js" lang="en">
<!-- Mirrored from htmldemo.hasthemes.com/flosun-preview/flosun/shop.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 23 Feb 2021 13:39:17 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>FloSun - Flower Shop HTML5 Template</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon.ico" />

    <!-- CSS
	============================================ -->
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/vendor/bootstrap.min.css')}}" />
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/vendor/font.awesome.min.css')}}" />
    <!-- Linear Icons CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/vendor/linearicons.min.css')}}" />
    <!-- Swiper CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/plugins/swiper-bundle.min.css')}}" />
    <!-- Animation CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/plugins/animate.min.css')}}" />
    <!-- Jquery ui CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/plugins/jquery-ui.min.css')}}" />
    <!-- Nice Select CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/plugins/nice-select.min.css')}}" />
    <!-- Magnific Popup -->
    <link rel="stylesheet" href="{{asset('assets/css/plugins/magnific-popup.css')}}" />

    <!-- Main Style CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}" />
</head>

<body>
    <!--===== Pre-Loading area Start =====-->
    <div id="preloader">
        <div class="preloader">
            <div class="spinner-block">
                <h1 class="spinner spinner-3 mb-0">.</h1>
            </div>
        </div>
    </div>
    <!--==== Pre-Loading Area End ====-->

    <!-- Header Area Start Here -->
    <header class="main-header-area">
        <!-- Main Header Area Start -->
        <div class="main-header header-sticky">
            <div class="container custom-area">
                <div class="row align-items-center">
                    <div class="col-lg-2 col-xl-2 col-md-6 col-6 col-custom">
                        <div class="header-logo d-flex align-items-center">
                            <a href="index">

                                <img src="{{asset('assets/images/logo/BlossomLogo2.png')}}" alt="Logo Image" />
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-8 d-none d-lg-flex justify-content-center col-custom">
                        <nav class="main-nav d-none d-lg-flex">
                            <ul class="nav">
                                <li>
                                    <a href="{{route('index.index')}}">
                                        <span class="menu-text"> Home</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="/shop">
                                        <span class="menu-text">Shop</span>

                                    </a>

                                </li>
                                <li>

                                    <a href="/about">
                                        <span class="menu-text"> About Us</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="/contact">
                                        <span class="menu-text">Contact Us</span>
                                    </a>
                                </li>
                                <?php
                                if (isset(auth()->user()->id)) {
                                    $customerId = auth()->user()->id;
                                } else {
                                    $customerId = 0;
                                }
                                ?>

                                @if(isset(auth()->user()->id))

                                <li>
                                    <a href="/account">
                                        <span class="menu-text">profile</span>

                                    </a>

                                </li>
                                <li><a href="logout"><span class="menu-text"> Logout</span></a></li>
                                @else

                                <li><a href="login"><span class="menu-text"> Login</span></a></li>
                                <li><a href="register"><span class="menu-text"> Register</span></a></li>
                                @endif

                            </ul>
                        </nav>
                    </div>
                    <div class="col-lg-2 col-md-6 col-6 col-custom">
                        <div class="header-right-area main-nav">
                            <ul class="nav">
                                <li class="minicart-wrap">
                                    <a href="#" class="minicart-btn toolbar-btn">
                                        <i class="fa fa-shopping-cart"></i>
                                        <span class="cart-item_count">{{ count((array) session('cart')) }}</span>
                                    </a>
                                    <?php $total = 0 ?>
                                    @foreach((array) session('cart') as $id => $details)
                                    <?php $total += $details['price'] * $details['quantity'] ?>
                                    @endforeach
                                    <div class="cart-item-wrapper dropdown-sidemenu dropdown-hover-2">
                                        @if(session('cart'))
                                        @foreach(session('cart') as $id => $details)
                                        <div class="single-cart-item">
                                            <div class="cart-img">
                                                <a href="cart.html"><img src="images/{{ $details['photo'] }}" alt="" /></a>
                                            </div>
                                            <div class="cart-text">
                                                <h5 class="title">
                                                    <a href="cart.html">{{ $details['name'] }}</a>
                                                </h5>
                                                <div class="cart-text-btn">
                                                    <div class="cart-qty">
                                                        <span>{{ $details['quantity'] }}×</span>
                                                        <span class="cart-price">JOD {{ $details['price'] }}</span>
                                                    </div>
                                                    <button type="button">
                                                        <i class="ion-trash-b"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                        @endif


                                        <div class="cart-price-total d-flex justify-content-between">
                                            <h5>Total :</h5>
                                            <h5>JOD {{ $total }}</h5>
                                        </div>
                                        <div class="cart-links d-flex justify-content-between">
                                            <a class="btn product-cart button-icon flosun-button dark-btn" href="cart">View cart</a>
                                            <a class="btn flosun-button secondary-btn rounded-0" href="checkout">Checkout</a>
                                        </div>
                                    </div>
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

                    <!-- mobile menu start -->
                    <div class="mobile-navigation">
                        <!-- mobile menu navigation start -->
                        <nav>
                            <ul class="mobile-menu">
                                <li class="menu-item-has-children">
                                    <a href="index">Home</a>
                                    <ul class="dropdown">
                                        <li><a href="index">Home Page 1</a></li>
                                        <li><a href="index-2.html">Home Page 2</a></li>
                                        <li><a href="index-3.html">Home Page 3</a></li>
                                        <li><a href="index-4.html">Home Page 4</a></li>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children">
                                    <a href="#">Shop</a>
                                    <ul class="megamenu dropdown">
                                        <li class="mega-title has-children">
                                            <a href="shop">Shop</a>

                                        </li>
                                        <li class="mega-title has-children">
                                            <a href="#">Product Details</a>

                                        </li>

                                    </ul>
                                </li>

                                <li class="menu-item-has-children">
                                    <a href="#">Pages</a>


                                    <ul class="dropdown">

                                        <li><a href="{{route('account.index', $customerId)}}">My Account</a></li>
                                        <li>
                                            <a href="login">login &amp; register</a>
                                        </li>
                                    </ul>
                                </li>
                                <li><a href="about">About Us</a></li>

                            </ul>
                        </nav>
                        <!-- mobile menu navigation end -->
                    </div>
                    <!-- mobile menu end -->

                </div>
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
    <!-- Header Area End Here -->

    @yield('shop_content')

    <!--Footer Area Start-->
    <footer class="footer-area mt-no-text">
        <div class="footer-widget-area">
            <div class="container container-default custom-area">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-3 col-custom">
                        <div class="single-footer-widget m-0">
                            <div class="footer-logo">
                                <a href="index">

                                    <img src="{{asset('assets/images/logo/BlossomLogo2.png')}}" alt="Logo Image" />
                                </a>
                            </div>

                            <div class="social-links">
                                <ul class="d-flex">
                                    <li>
                                        <a class="rounded-circle" href="#" title="Facebook">
                                            <i class="fa fa-facebook-f"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="rounded-circle" href="#" title="Twitter">
                                            <i class="fa fa-twitter"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="rounded-circle" href="#" title="Linkedin">
                                            <i class="fa fa-linkedin"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="rounded-circle" href="#" title="Youtube">
                                            <i class="fa fa-youtube"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="rounded-circle" href="#" title="Vimeo">
                                            <i class="fa fa-vimeo"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="rounded-circle" href="#" title="Vimeo">
                                            <i class="fa fa-instagram"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-6 col-lg-2 col-custom">
                        <div class="single-footer-widget">
                            <h2 class="widget-title">Information</h2>
                            <ul class="widget-list">
                                <li><a href="about">Our Company</a></li>
                                <li><a href="contact">Contact Us</a></li>
                                <li><a href="about">Our Services</a></li>
                                <li><a href="about">Why We?</a></li>
                                <li><a href="about">Careers</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-6 col-lg-2 col-custom">
                        <div class="single-footer-widget">
                            <h2 class="widget-title">Quicklink</h2>
                            <ul class="widget-list">
                                <li><a href="about">About</a></li>
                                <li><a href="shop">Shop</a></li>
                                <li><a href="cart">Cart</a></li>
                                <li><a href="contact-">Contact</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-6 col-lg-2 col-custom">
                        <div class="single-footer-widget">
                            <h2 class="widget-title">Support</h2>
                            <ul class="widget-list">
                                <li><a href="contact-us.html">Online Support</a></li>
                                <li><a href="contact-us.html">Shipping Policy</a></li>
                                <li><a href="contact-us.html">Return Policy</a></li>
                                <li><a href="contact-us.html">Privacy Policy</a></li>
                                <li><a href="contact-us.html">Terms of Service</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-6 col-lg-3 col-custom">
                        <div class="single-footer-widget">
                            <h2 class="widget-title">See Information</h2>
                            <div class="widget-body">
                                <address>
                                    Amman, Jordan<br />Phone:
                                    077 7777 777<br />Email: info@blossom.com
                                </address>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-copyright-area">
            <div class="container custom-area">
                <div class="row">
                    <div class="col-12 text-center col-custom">
                        <div class="copyright-content">
                            <p>
                                Copyright © 2021
                                <a href="index" title="blossom"><strong>Blosom</strong></a>

                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!--Footer Area End-->

    <!-- Modal -->
    <div class="modal flosun-modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <button type="button" class="close close-button" data-dismiss="modal" aria-label="Close">
                    <span class="close-icon" aria-hidden="true">x</span>
                </button>
                <div class="modal-body">
                    <div class="container-fluid custom-area">
                        <div class="row">
                            <div class="col-md-6 col-custom">
                                <div class="modal-product-img">
                                    <a class="w-100" href="#">
                                        <img class="w-100" src="assets/images/product/large-size/1.jpg" alt="Product" />
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-6 col-custom">
                                <div class="modal-product">
                                    <div class="product-content">
                                        <div class="product-title">
                                            <h4 class="title">Product dummy name</h4>
                                        </div>
                                        <div class="price-box">
                                            <span class="regular-price">$80.00</span>
                                            <span class="old-price"><del>$90.00</del></span>
                                        </div>
                                        <div class="product-rating">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                            <span>1 Review</span>
                                        </div>
                                        <p class="desc-content">
                                            we present online flower delivery to multiple locations and occasions throughout the Jordan.
                                        </p>
                                        <form class="d-flex flex-column w-100" action="#">
                                            <div class="form-group">
                                                <select class="form-control nice-select w-100">
                                                    <option>S</option>
                                                    <option>M</option>
                                                    <option>L</option>
                                                    <option>XL</option>
                                                    <option>XXL</option>
                                                </select>
                                            </div>
                                        </form>
                                        <div class="quantity-with-btn">
                                            <div class="quantity">
                                                <div class="cart-plus-minus">
                                                    <input class="cart-plus-minus-box" value="0" type="text" />
                                                    <div class="dec qtybutton">-</div>
                                                    <div class="inc qtybutton">+</div>
                                                    <div class="dec qtybutton">
                                                        <i class="fa fa-minus"></i>
                                                    </div>
                                                    <div class="inc qtybutton">
                                                        <i class="fa fa-plus"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="add-to_btn">
                                                <a class="btn product-cart button-icon flosun-button dark-btn" href="cart.html">Add to cart</a>
                                                <a class="btn flosun-button secondary-btn rounded-0" href="wishlist.html">Add to wishlist</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Scroll to Top Start -->
    <a class="scroll-to-top" href="#">
        <i class="lnr lnr-arrow-up"></i>
    </a>
    <!-- Scroll to Top End -->

    <!-- JS
============================================ -->

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
    @yield('scripts')
</body>

<!-- Mirrored from htmldemo.hasthemes.com/flosun-preview/flosun/shop.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 23 Feb 2021 13:39:42 GMT -->

</html>