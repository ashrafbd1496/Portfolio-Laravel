<!DOCTYPE html>
<html dir="@if (session()->has('language_direction_from_dropdown')) @if(session()->get('language_direction_from_dropdown') == 1) {{ __('rtl') }} @else {{ __('ltr') }} @endif @else {{ __('ltr') }} @endif" lang="@if (session()->has('language_code_from_dropdown')){{ str_replace('_', '-', session()->get('language_code_from_dropdown')) }}@else{{ str_replace('_', '-',   $language->language_code) }}@endif">
<head>
    <!-- Meta Tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Title -->
    <title>Preview</title>

    <!-- Stylesheet CSS -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/vendor/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/side_menu/vendor/preview/css/element.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/side_menu/vendor/preview/css/style.css') }}">

    <link href="{{ asset('assets/admin/side_menu/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <link rel="shortcut icon" href="{{ asset('assets/admin/side_menu/vendor/preview/images/favicon.png') }}" type="image/x-icon">
    <link rel="icon" href="{{ asset('assets/admin/side_menu/vendor/preview/images/favicon.png') }}" type="image/x-icon">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

</head>
<body data-spy="scroll" data-target="#fixedNavbar" @if (session()->has('language_direction_from_dropdown')) @if(session()->get('language_direction_from_dropdown') == 1)  class="rtl-mode" @endif @elseif (isset($language)) @if ($language->direction == 1) class="rtl-mode" @endif  @endif >

<div class="page-wrapper">

    <!-- preloader -->
    <div class="preloader">
        <div id="handle-preloader" class="handle-preloader">
            <div class="animation-preloader">
                <div class="spinner"></div>
                <div class="txt-loading">
                    <span data-text-preloader="D" class="letters-loading">
                        D
                    </span>
                    <span data-text-preloader="I" class="letters-loading">
                        I
                    </span>
                    <span data-text-preloader="G" class="letters-loading">
                       G
                    </span>
                    <span data-text-preloader="I" class="letters-loading">
                        I
                    </span>
                    <span data-text-preloader="T" class="letters-loading">
                        T
                    </span>
                    <span data-text-preloader="A" class="letters-loading">
                        A
                    </span>
                    <span data-text-preloader="L" class="letters-loading">
                        L
                    </span>
                    <span data-text-preloader="T" class="letters-loading">
                        T
                    </span>
                    <span data-text-preloader="E" class="letters-loading">
                        E
                    </span>
                    <span data-text-preloader="A" class="letters-loading">
                        A
                    </span>
                    <span data-text-preloader="M" class="letters-loading">
                        M
                    </span>
                </div>
            </div>
        </div>
    </div>
    <!-- preloader end -->


    <header class="main-header">
        <div class="outer-container">
            <div class="logo-box"><a href="{{ url('/') }}"><img src="{{ asset('assets/admin/side_menu/vendor/preview/images/colored-logo.png') }}" alt=""></a></div>
            <div class="menu-area clearfix">
                <nav class="main-menu navbar-expand-md navbar-light">
                    <div class="collapse navbar-collapse show clearfix" id="navbarSupportedContent">
                        <ul class="navigation scroll-nav clearfix">
                            <li><a href="#demos">Demos</a></li>
                            <li><a href="mailto:elsecolor@gmail.com">Support</a></li>
                            <li><a href="https://elsecolor.com/documentation/digitalteam/" target="_blank">Documentation</a></li>
                        </ul>
                    </div>
                </nav>
            </div>
            <div class="btn-box"><a target="_blank" href="#"><span>Buy Theme</span></a></div>
        </div>
    </header>


    <!-- banner-section -->
    <section class="banner-section" style="background-image: url({{ asset('assets/admin/side_menu/vendor/preview/images/banner.jpg);') }}">
        <div class="auto-container">
            <div class="content-box">
                <h2><span>DigitalTeam</span> Creative Portfolio & Agency Script</h2>
            </div>
        </div>
    </section>

    <!-- main-demo -->
    <section class="main-demo centred" id="demos">
        <div class="auto-container">
            <div class="title-box">
                <h2>Choose Your <span class="color">Demos</span></h2>
                <p>You can easily access 04 Different Home Demos from the admin panel. <br>
                    The application provides full RTL support.<br>
                    Please be sure to make the necessary changes.</p>
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="inner-box">
                        <div class="lower-content">
                            <h5><a href="https://digitalteam.elsecolor.com/login" target="_blank">Admin Panel</a></h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="inner-box">
                        <div class="lower-content">
                            <h5><a href="https://digitalteam.elsecolor.com/" target="_blank">Frontend</a></h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="inner-box">
                        <figure class="image-box"><a href="{{ url('preview/set-homepage/0') }}"><img src="{{ asset('assets/admin/side_menu/vendor/preview/images/demo-1.jpg') }}" alt=""></a></figure>
                        <div class="lower-content">
                            <h5><a href="#">Static Version</a></h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="inner-box">
                        <figure class="image-box"><a href="{{ url('preview/set-homepage/1') }}" target="_blank"><img src="{{ asset('assets/admin/side_menu/vendor/preview/images/demo-2.jpg') }}" alt=""></a></figure>
                        <div class="lower-content">
                            <h5><a href="#">Particle Version</a></h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="inner-box">
                        <figure class="image-box"><a href="{{ url('preview/set-homepage/2') }}"><img src="{{ asset('assets/admin/side_menu/vendor/preview/images/demo-3.jpg') }}" alt=""></a></figure>
                        <div class="lower-content">
                            <h5><a href="#">Slider Version</a></h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="inner-box">
                        <figure class="image-box"><a href="{{ url('preview/set-homepage/3') }}"><img src="{{ asset('assets/admin/side_menu/vendor/preview/images/demo-4.jpg') }}" alt=""></a></figure>
                        <div class="lower-content">
                            <h5><a href="#">Video Version</a></h5>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <footer class="footer centred">
        <div class="bg-overlay"></div>
        <div class="auto-container">
            <div class="content-box">
                <h2>Get <span class="color">DigitalTeam</span> and Set Up<br/>Your Website Today.</h2>
                <a target="_blank" href="#"><span>Purchase Now</span></a>
            </div>
        </div>
    </footer>

    <section class="footer-box">
        <div class="product-sidebar">
            <div class="xs-sidebar-group info-group info-sidebar">
                <ul class="social-links clearfix">
                    <li><a href="#" target="_blank"><i class="icon fa fa-shopping-cart"></i><span>Buy Now</span></a></li>
                    <li><a href="https://elsecolor.com/documentation/digitalteam/" target="_blank"><i class="icon fa fa-desktop"></i><span>Documentation</span></a></li>
                    <li><a href="mailto:elsecolor@gmail.com"><i class="icon fas fa-headset"></i></i><span>Support Center</span></a></li>

                </ul>
            </div>
        </div>
    </section>


    <!-- Scroll Top Button -->
    <button class="scroll-top scroll-to-target" data-target="html">
        <span class="fa fa-angle-up"></span>
    </button>



</div>







<script src="{{ asset('assets/frontend/vendor/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/frontend/vendor/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/admin/side_menu/vendor/preview/js/pagenav.js') }}"></script>
<script src="{{ asset('assets/admin/side_menu/vendor/preview/js/wow.js') }}"></script>
<script src="{{ asset('assets/admin/side_menu/vendor/preview/js/scrollbar.js') }}"></script>
<script src="{{ asset('assets/admin/side_menu/vendor/preview/js/plugins.js') }}"></script>
<script src="{{ asset('assets/admin/side_menu/vendor/preview/js/text_animation.js') }}"></script>

<script src="{{ asset('assets/admin/side_menu/vendor/preview/js/script.js') }}"></script>


</body>
</html>