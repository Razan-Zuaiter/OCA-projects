<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    @auth
    @if(\Illuminate\Support\Facades\Auth::user()->role != 'admin')
    <script>
        window.location = "/index";
    </script>
    @endif
    @endauth
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="au theme template" />
    <meta name="author" content="Hau Nguyen" />
    <meta name="keywords" content="au theme template" />

    <!-- Title Page-->
    <title>Dashboard</title>

    <!-- Fontfaces CSS-->
    <link href="{{asset('css/font-face.css')}}" rel="stylesheet" media="all" />
    <link href="{{asset('vendor/font-awesome-4.7/css/font-awesome.min.css')}}" rel="stylesheet" media="all" />
    <link href="{{asset('vendor/font-awesome-5/css/fontawesome-all.min.css')}}" rel="stylesheet" media="all" />
    <link href="{{asset('vendor/mdi-font/css/material-design-iconic-font.min.css')}}" rel="stylesheet" media="all" />

    <!-- Bootstrap CSS-->
    <link href="{{asset('vendor/bootstrap-4.1/bootstrap.min.css')}}" rel="stylesheet" media="all" />

    <!-- Vendor CSS-->
    <link href="vendor/animsition/animsition.min.css" rel="stylesheet" media="all" />
    <link href="{{asset('vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css')}}" rel="stylesheet" media="all" />
    <link href="{{asset('vendor/wow/animate.css" rel="stylesheet" media="all')}}" />
    <link href="{{asset('vendor/css-hamburgers/hamburgers.min.css')}}" rel="stylesheet" media="all" />
    <link href="{{asset('vendor/slick/slick.css')}}" rel="stylesheet" media="all" />
    <link href="{{asset('vendor/select2/select2.min.css')}}" rel="stylesheet" media="all" />
    <link href="{{asset('vendor/perfect-scrollbar/perfect-scrollbar.css')}}" rel="stylesheet" media="all" />

    <!-- Main CSS-->
    <link href="{{ asset('css/theme.css')}}" rel="stylesheet" media="all" />
</head>

<body class="animsition">
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
        <header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <a href="index">
                            <img src="{{asset('assets/images/logo/BlossomLogo2.png')}}" alt="Logo Image" />
                        </a>
                        <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <nav class="navbar-mobile">
                <div class="container-fluid">
                    <ul class="navbar-mobile__list list-unstyled">
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-copy"></i>Pages</a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                <li>
                                    <a href="login.html">Login</a>
                                </li>
                                <li>
                                    <a href="register.html">Register</a>
                                </li>
                                <li>
                                    <a href="forget-pass.html">Forget Password</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block" style="overflow: hidden;">
            <a href="/user">
                <img src="{{asset('assets/images/logo/BlossomLogo2.png')}}" style="width: 15rem; height:5rem; margin-top:0.5rem; margin-left:0.5rem" alt="Logo Image" />
            </a>

            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <li class="class=" {{request()->getRequestUri() == '/user' ? 'active': ''}}">
                            <a class="js-arrow" href="/user">
                                <i class="fas fa-user"></i>
                                Manage Users</a>
                        </li>

                        <li class="{{request()->getRequestUri() == '/manageCategory' ? 'active': ''}}">
                            <a class="js-arrow" href="/manageCategory">
                                <i class="fas fa-image"></i>
                                Manage Category</a>
                        </li>
                        <li class="{{request()->getRequestUri() == '/manageProduct' ? 'active': ''}}">
                            <a class="js-arrow" href="/manageProduct">
                                <i class="fas fa-image"></i>
                                Manage Products</a>
                        </li>
                        <li>
                            <a class="js-arrow" href="/">
                                <i class="fas fa-arrow-right"></i>
                                Public Site</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">

            <!-- HEADER DESKTOP-->
            <header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap">
                            <div class="form-header" action="" method="POST">

                            </div>
                            <div class="header-button">

                                <div class="account-wrap">
                                    <div class="account-item clearfix js-item-menu">
                                        <div class="image">
                                            <img src="/images/{{auth()->user()->image}}" />
                                        </div>
                                        <div class="content">
                                            <a class="js-acc-btn" href="#">{{auth()->user()->name}}</a>
                                        </div>
                                        <div class="account-dropdown js-dropdown">
                                            <div class="info clearfix">
                                                <div class="image">
                                                    <a href="#">
                                                        <img src="/images/{{auth()->user()->image}}" />
                                                    </a>
                                                </div>
                                                <div class="content">
                                                    <h5 class="name">
                                                        <a href="#">{{auth()->user()->name}}</a>
                                                    </h5>
                                                    <span class="email">{{auth()->user()->email}}</span>
                                                </div>
                                            </div>

                                            <div class="account-dropdown__footer">
                                                <a href="logout">
                                                    <i class="zmdi zmdi-power"></i>Logout</a>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">

                        @yield('content')

                    </div>
                </div>
            </div>
            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
        </div>
    </div>

    <!-- Jquery JS-->
    <script src="vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="vendor/slick/slick.min.js"></script>
    <script src="vendor/wow/wow.min.js"></script>
    <script src="vendor/animsition/animsition.min.js"></script>
    <script src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <script src="vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="vendor/counter-up/jquery.counterup.min.js"></script>
    <script src="vendor/circle-progress/circle-progress.min.js"></script>
    <script src="vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="vendor/select2/select2.min.js"></script>

    <!-- Main JS-->
    <script src="js/main.js"></script>
</body>

</html>
<!-- end document-->