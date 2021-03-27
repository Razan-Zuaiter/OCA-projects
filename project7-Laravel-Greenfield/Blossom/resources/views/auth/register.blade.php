@extends('layouts.app')
@section('content')
<!-- Breadcrumb Area Start Here -->
<div class="breadcrumbs-area position-relative">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <div class="breadcrumb-content position-relative section-content">
                    <h3 class="title-3">Login-Register</h3>
                    <ul>
                        <li><a href="index">Home</a></li>
                        <li>Login-Register</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="login-register-area mt-no-text">
    <div class="container custom-area">
        <div class="row">
            <div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-custom">
                <div class="login-register-wrapper">
                    <div class="section-content text-center mb-5">
                        <h2 class="title-4 mb-2">Register</h2>

                    </div>

                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="single-input-item mb-3">



                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Name">

                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                        </div>

                        <div class="single-input-item mb-3">



                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email">

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                        </div>

                        <div class="single-input-item mb-3">



                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                        </div>

                        <div class="single-input-item mb-3">



                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm password">

                        </div>

                        <div class="form-group row mb-0">

                            <button type="submit" class="btn flosun-button secondary-btn theme-color rounded-0">
                                {{ __('Register') }}
                            </button>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!--Footer Area Start-->
<footer class="footer-area mt-no-text">
    <div class="footer-widget-area">
        <div class="container container-default custom-area">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-3 col-custom">
                    <div class="single-footer-widget m-0">
                        <div class="footer-logo">
                            <a href="/">

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
                            <a href="/" title="blossom"><strong>Blosom</strong></a>

                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!--Footer Area End-->
@endsection