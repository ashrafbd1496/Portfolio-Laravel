<!DOCTYPE html>
<html dir="@if (session()->has('language_direction_from_dropdown')) @if(session()->get('language_direction_from_dropdown') == 1) {{ __('rtl') }} @else {{ __('ltr') }} @endif @else {{ __('ltr') }} @endif" lang="@if (session()->has('language_code_from_dropdown')){{ str_replace('_', '-', session()->get('language_code_from_dropdown')) }}@else{{ str_replace('_', '-',   $language->language_code) }}@endif">
<head>
    <!-- Meta Tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta name="title" content="@if (isset($blog)) {{ $blog->title }} @elseif (isset($service)) {{ $service->title }} @elseif (isset($portfolio->title)) {{ $portfolio->title }} @elseif (isset($general_seo)){{ $general_seo->site_name }} @endif">
    <meta name="description" content="@if (isset($blog)) {{ $blog->meta_desc }} @elseif (isset($service)) {{ $service->meta_desc }} @elseif (isset($portfolio)) {{ $portfolio->meta_desc }} @elseif (isset($general_seo)){{ $general_seo->site_desc }} @endif">
    <meta name="keywords" content="@if (isset($blog)) {{ $blog->meta_keyword }} @elseif (isset($service)) {{ $service->meta_keyword }} @elseif (isset($portfolio)) {{ $portfolio->meta_keyword }} @elseif (isset($general_seo)){{ $general_seo->site_keywords }} @endif ">
    <meta name="author" content="elsecolor">
    <meta property="fb:app_id" content="@if (isset($general_seo)){{ $general_seo->fb_app_id }} @endif">
    <meta property="og:title" content="@if (isset($blog)) {{ $blog->title }} @elseif (isset($service)) {{ $service->title }} @elseif (isset($portfolio->title)) {{ $portfolio->title }} @elseif (isset($general_seo)){{ $general_seo->site_name }} @endif">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:description" content="@if (isset($blog)) {{ $blog->meta_desc }} @elseif (isset($service)) {{ $service->meta_desc }} @elseif (isset($portfolio)) {{ $portfolio->meta_desc }} @elseif (isset($general_seo)){{ $general_seo->site_desc }} @endif">
    <meta property="og:image" content="@if (!empty($blog->blog_image)) {{ asset('uploads/img/blogs/thumbnail/'.$blog->blog_image) }} @elseif (!empty($service->service_image)) {{ asset('uploads/img/service/'.$service->service_image) }} @elseif (!empty($portfolio->thumbnail_image)) @elseif (!empty($general_site_image->favicon_image)){{ asset('uploads/img/general/'.$general_site_image->favicon_image) }} @endif">
    <meta itemprop="image" content="@if (!empty($blog->blog_image)) {{ asset('uploads/img/blogs/thumbnail/'.$blog->blog_image) }} @elseif (!empty($service->service_image)) {{ asset('uploads/img/service/'.$service->service_image) }} @elseif (!empty($portfolio->thumbnail_image)) @elseif (!empty($general_site_image->favicon_image)){{ asset('uploads/img/general/'.$general_site_image->favicon_image) }} @endif">
    <meta property="og:type" content="website">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:image" content="@if (!empty($blog->blog_image)) {{ asset('uploads/img/blogs/thumbnail/'.$blog->blog_image) }} @elseif (!empty($service->service_image)) {{ asset('uploads/img/service/'.$service->service_image) }} @elseif (!empty($portfolio->thumbnail_image)) @elseif (!empty($general_site_image->favicon_image)){{ asset('uploads/img/general/'.$general_site_image->favicon_image) }} @endif">
    <meta property="twitter:title" content="@if (isset($blog)) {{ $blog->title }} @elseif (isset($service)) {{ $service->title }} @elseif (isset($portfolio->title)) {{ $portfolio->title }} @elseif (isset($general_seo)){{ $general_seo->site_name }} @endif">
    <meta property="twitter:description" content="@if (isset($blog)) {{ $blog->meta_desc }} @elseif (isset($service)) {{ $service->meta_desc }} @elseif (isset($portfolio)) {{ $portfolio->meta_desc }} @elseif (isset($general_seo)){{ $general_seo->site_desc }} @endif">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Title -->
    <title>@if (isset($general_seo)){{ $general_seo->site_name }} @endif @if (isset($blog)) {{ $blog->title }} @elseif (isset($service)) {{ $service->title }} @elseif (isset($portfolio->title)) {{ $portfolio->title }} @elseif (isset($general_seo)){{ $general_seo->site_name }} @endif</title>

@if (!empty($general_site_image->favicon_image))
    <!-- Favicon -->
        <link href="{{ asset('uplods/img/general/'.$general_site_image->favicon_image) }}" sizes="128x128" rel="shortcut icon" type="image/x-icon" />
        <link href="{{ asset('uploads/img/general/'.$general_site_image->favicon_image) }}" sizes="128x128" rel="shortcut icon" />
@else
    <!-- Favicon -->
        <link href="{{ asset('uploads/img/dummy/favicon.png') }}" sizes="128x128" rel="shortcut icon" type="image/x-icon" />
        <link href="{{ asset('uploads/img/dummy/favicon.png') }}" sizes="128x128" rel="shortcut icon" />
@endif

<!--// Bootstrap //-->
    <link rel="stylesheet" href="{{ asset('assets/frontend/vendor/css/bootstrap.min.css') }}">
    <!--// Magnific Popup //-->
    <link rel="stylesheet" href="{{ asset('assets/frontend/vendor/css/magnific.popup.min.css') }}">
    <!--// Magnific Popup //-->
    <link rel="stylesheet" href="{{ asset('assets/frontend/vendor/css/fancybox.min.css') }}">
    <!--// Animate Css //-->
    <link rel="stylesheet" href="{{ asset('assets/frontend/vendor/css/animate.min.css') }}">
    <!--// Owl Carousel //-->
    <link rel="stylesheet" href="{{ asset('assets/frontend/vendor/css/owl.carousel.min.css') }}">
    <!--// Owl Carousel Default //-->
    <link rel="stylesheet" href="{{ asset('assets/frontend/vendor/css/owl.carousel.default.min.css') }}">
    <!--// Font Awesome //-->
    <link rel="stylesheet" href="{{ asset('assets/frontend/fonts/font_awesome/css/all.css') }}">
    <!--// Theme Main Css //-->
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/style.css') }}">

    @isset ($color_option)

        <!--// Color Option Css //-->
        @if ($color_option->color_option == 1)
            <link rel="stylesheet" href="{{ asset('assets/frontend/css/color/blue-color.css') }}">
        @elseif ($color_option->color_option == 2)
            <link rel="stylesheet" href="{{ asset('assets/frontend/css/color/red-color.css') }}">
        @elseif ($color_option->color_option == 3)
            <link rel="stylesheet" href="{{ asset('assets/frontend/css/color/yellow-color.css') }}">
        @elseif ($color_option->color_option == 4)
            <link rel="stylesheet" href="{{ asset('assets/frontend/css/color/green-color.css') }}">
        @elseif ($color_option->color_option == 5)
            <link rel="stylesheet" href="{{ asset('assets/frontend/css/color/pink-color.css') }}">
        @elseif ($color_option->color_option == 6)
            <link rel="stylesheet" href="{{ asset('assets/frontend/css/color/turquose-color.css') }}">
        @elseif ($color_option->color_option == 7)
            <link rel="stylesheet" href="{{ asset('assets/frontend/css/color/purple-color.css') }}">
        @elseif ($color_option->color_option == 8)
            <link rel="stylesheet" href="{{ asset('assets/frontend/css/color/blue-color-2.css') }}">
        @elseif ($color_option->color_option == 9)
            <link rel="stylesheet" href="{{ asset('assets/frontend/css/color/orange-color.css') }}">
        @elseif ($color_option->color_option == 10)
            <link rel="stylesheet" href="{{ asset('assets/frontend/css/color/magenta-color.css') }}">
        @elseif ($color_option->color_option == 11)
            <link rel="stylesheet" href="{{ asset('assets/frontend/css/color/orange-color-2.css') }}">
        @endif

    @endisset

@if (isset($google_analytic))
    <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id={{ $google_analytic->google_analytic }}"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());

            gtag('config', '{{ $google_analytic->google_analytic }}');
        </script>
        @endif
</head>
<body data-spy="scroll" data-target="#fixedNavbar" @if (session()->has('language_direction_from_dropdown')) @if(session()->get('language_direction_from_dropdown') == 1)  class="rtl-mode" @endif @elseif (isset($language)) @if ($language->direction == 1) class="rtl-mode" @endif  @endif >

<!--// Page Wrapper Start //-->
<div class="page-wrapper">
    <!--// Header Start //-->
    <header class="header fixed-top" id="header">
        <div id="nav-menu-wrap">
            <div class="container">
                <nav class="navbar navbar-expand-lg p-0">
                    @if (!empty($general_site_image->site_colored_logo_image))
                        <a class="navbar-brand" title="Home" href="{{ url('/') }}">
                            <img src="{{ asset('uploads/img/general/'.$general_site_image->site_colored_logo_image) }}" alt="Logo White" class="img-fluid logo-transparent">
                            <img src="{{ asset('uploads/img/general/'.$general_site_image->site_colored_logo_image) }}" alt="Logo Black" class="img-fluid logo-normal">
                        </a>
                    @else
                        <a class="navbar-brand" title="Home" href="#">
                            <img src="{{ asset('uploads/img/dummy/colored-logo.png') }}" alt="Logo White" class="img-fluid logo-transparent">
                            <img src="{{ asset('uploads/img/dummy/colored-logo.png') }}" alt="Logo Black" class="img-fluid logo-normal">
                        </a>
                    @endif
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#fixedNavbar" aria-controls="fixedNavbar" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="togler-icon-inner">
                                <span class="line-1"></span>
                                <span class="line-2"></span>
                                <span class="line-3"></span>
                            </span>
                    </button>
                    <div class="collapse navbar-collapse main-menu justify-content-end" id="fixedNavbar">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link active menu-link" href="{{ url('/') }}">{{ __('frontend.home') }}</a>
                            </li>
                            @if ($section_arr['about_section'] == "show")
                                <li class="nav-item">
                                    <a class="nav-link menu-link" href="{{ url('/#about') }}">{{ __('frontend.about') }}</a>
                                </li>
                            @endif
                            @if ($section_arr['service_section'] == "show")
                                <li class="nav-item">
                                    <a class="nav-link menu-link" href="{{ url('/#services') }}">{{ __('frontend.services') }}</a>
                                </li>
                            @endif
                            @if ($section_arr['portfolio_section'] == "show")
                                <li class="nav-item">
                                    <a class="nav-link menu-link" href="{{ url('/#portfolio') }}">{{ __('frontend.portfolio') }}</a>
                                </li>
                            @endif
                            @if ($section_arr['blog_section'] == "show")
                                <li class="nav-item">
                                    <a class="nav-link menu-link" href="{{ url('/#blogs') }}">{{ __('frontend.blogs') }}</a>
                                </li>
                            @endif
                            @if ($section_arr['pages_page'] == "show")
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="blogDropdownMenu" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        {{ __('frontend.pages') }}
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="blogDropdownMenu">
                                        @foreach ($header_pages as $header_page)
                                            <a class="dropdown-item" href="{{ route('any-page.show', ['page_slug' => $header_page->page_slug]) }}">{{ $header_page->page_title }}</a>
                                        @endforeach
                                    </div>
                                </li>
                            @endif
                            @if ($section_arr['contact_section'] == "show")
                                <li class="nav-item">
                                    <a class="nav-link menu-link" href="{{ url('/#contact') }}">{{ __('frontend.contact') }}</a>
                                </li>
                            @endif
                            @if (count($display_dropdowns) > 0)
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="langDropdownMenu" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        @if (session()->has('language_name_from_dropdown')) {{ session()->get('language_name_from_dropdown') }} @else {{ $language->language_name }} @endif
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="langDropdownMenu">
                                        @foreach ($display_dropdowns as $display_dropdown)
                                            <a class="dropdown-item" href="{{ url('language/set-locale/'.$display_dropdown->id) }}">{{ $display_dropdown->language_name }}</a>
                                        @endforeach
                                    </div>
                                </li>
                            @endif
                            @isset ($external_url)
                                @if ($external_url->status == "enable")
                                    @if ($external_url->btn_type == "external_url")
                                        <li class="nav-item navbar-btn-resp d-flex align-items-center">
                                            <a href="{{ $external_url->btn_link }}" class="default-nav-btn"><span>{{ $external_url->btn_name }}</span></a>
                                        </li>
                                    @else
                                        <li class="nav-item navbar-btn-resp d-flex align-items-center">
                                            <a href="{{ route('get-offer-page.create') }}" class="default-nav-btn"><span>{{ $external_url->btn_name }}</span></a>
                                        </li>
                                    @endif
                                @endif
                            @endif
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </header>
    <!--// Header End  //-->

    <!--// Main Area Start //-->
    <main class="main-area">

        @yield('content')

        <!--// Footer Start //-->
            @if ($section_arr['footer_section'] == "show")
                @if (isset($site_info) || count($socials) > 0 || count($footer_pages) > 0)
                    <footer class="footer">
                        <div class="footer-top">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-6 col-lg-4 footer-widget-resp">
                                        <div class="footer-widget">
                                            <h5 class="footer-title">{{ __('frontend.about') }}</h5>
                                            @if (!empty($site_info->short_desc)) <p class="footer-desc">{{ $site_info->short_desc }}</p> @endif
                                            <div class="footer-social-links">
                                                @foreach ($socials as $social)
                                                    <a href="@if (!empty($social->link)) {{ $social->link }} @else # @endif">
                                                        <i class="{{ $social->social_media }}"></i>
                                                    </a>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    @if (count($footer_pages) > 0)
                                        <div class="col-md-6 col-lg-4 footer-widget-resp">
                                            <div class="footer-widget">
                                                <h5 class="footer-title">{{ __('frontend.helper_links') }}</h5>
                                                <ul class="footer-links">
                                                    @foreach ($footer_pages as $footer_page)
                                                        <li>
                                                            <a href="{{ route('any-page.show', ['page_slug' => $footer_page->page_slug]) }}">{{ $footer_page->page_title }}</a>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    @endif
                                    <div class="col-md-6 col-lg-4 footer-widget-resp">
                                        <div class="footer-widget">
                                            <h5 class="footer-title">{{ __('frontend.contact_info') }}</h5>
                                            <div class="footer-contact-info-wrap">
                                                <ul class="footer-contact-info-list">
                                                    @if (!empty($site_info->address))
                                                        <li>
                                                            <i class="fa fa-map-marker"></i>
                                                            <span>{{ $site_info->address }} </span>
                                                            @if (!empty($site_info->address_map_link))
                                                                <a href="{{ $site_info->address_map_link }}"><i class="fas fa-link"></i></a>
                                                            @endif
                                                        </li>
                                                    @endif
                                                    @if (!empty($site_info->email))
                                                        <li>
                                                            <i class="fa fa-envelope"></i>
                                                            <div class="text">
                                                                <span>{{ $site_info->email }}</span>
                                                            </div>
                                                        </li>
                                                    @endif
                                                    @if (!empty($site_info->phone))
                                                        <li>
                                                            <i class="fa fa-phone"></i>
                                                            <div class="text">
                                                                <span>{{ $site_info->phone }}</span>
                                                            </div>
                                                        </li>
                                                    @endif
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @if (!empty($site_info->copyright))
                            <div class="copyright">
                                <div class="container">
                                    <p class="copyright-text">{{ $site_info->copyright }}</p>
                                </div>
                            </div>
                        @endif
                    </footer>
                @else
                    <footer class="footer">
                        <div class="footer-top">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-6 col-lg-4 footer-widget-resp">
                                        <div class="footer-widget">
                                            <h5 class="footer-title">About Me</h5>
                                            <p class="footer-desc">
                                                It is a long established fact that a reader will be distracted by the readable....
                                            </p>
                                            <div class="footer-social-links">
                                                <a href="#">
                                                    <i class="fab fa-facebook-f"></i>
                                                </a>
                                                <a href="#">
                                                    <i class="fab fa-twitter"></i>
                                                </a>
                                                <a href="#">
                                                    <i class="fab fa-instagram"></i>
                                                </a>
                                                <a href="#">
                                                    <i class="fab fa-dribbble"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-lg-4 footer-widget-resp">
                                        <div class="footer-widget">
                                            <h5 class="footer-title">Helper Links</h5>
                                            <ul class="footer-links">
                                                <li>
                                                    <a href="#">Help Center</a>
                                                </li>
                                                <li>
                                                    <a href="#">Privacy Policy</a>
                                                </li>
                                                <li>
                                                    <a href="#">Terms & Condition</a>
                                                </li>
                                                <li>
                                                    <a href="#">Support Policy</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-4 footer-widget-resp">
                                        <div class="footer-widget">
                                            <h5 class="footer-title">Contact Info</h5>
                                            <div class="footer-contact-info-wrap">
                                                <ul class="footer-contact-info-list">
                                                    <li>
                                                        <i class="fa fa-map-marker"></i>
                                                        <span>8595 Marconi Rd. Phillipsburg, NJ 08865</span>
                                                    </li>
                                                    <li>
                                                        <i class="fa fa-envelope"></i>
                                                        <div class="text">
                                                            <span>tempo@hotmail.com</span>
                                                            <span>tempo@gmail.com</span>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="copyright">
                            <div class="container">
                                <p class="copyright-text">© Copyright 2021. Powered By ElseColor</p>
                            </div>
                        </div>
                    </footer>
                @endif
                @endif
        <!--// Footer End //-->

    </main>
    <!--// Main Area End //-->

    <a href="#" data-scroll-goto="1" class="scroll-top-btn">
        <i class="fa fa-arrow-up"></i>
    </a>
    <!--// .scroll-top-btn // -->

   @if ($section_arr['preloader'] == "show")
        <div id="preloader-wrap">
            <div class="preloader-inner">
                <div class="sk-chase">
                    <div class="sk-chase-dot"></div>
                    <div class="sk-chase-dot"></div>
                    <div class="sk-chase-dot"></div>
                    <div class="sk-chase-dot"></div>
                    <div class="sk-chase-dot"></div>
                    <div class="sk-chase-dot"></div>
                </div>
            </div>
        </div>
        <!--// Preloader // -->
       @endif

</div>
<!--// Page Wrapper End //-->



<!--// JQuery //-->
<script src="{{ asset('assets/frontend/vendor/js/jquery.min.js') }}"></script>
<!--// Images Loaded //-->
<script src="{{ asset('assets/frontend/vendor/js/images.loaded.min.js') }}"></script>
<!--// Magnific Popup //-->
<script src="{{ asset('assets/frontend/vendor/js/magnific.popup.min.js') }}"></script>
<!--// Popper Popup //-->
<script src="{{ asset('assets/frontend/vendor/js/popper.min.js') }}"></script>
<!--// Bootstrap //-->
<script src="{{ asset('assets/frontend/vendor/js/bootstrap.min.js') }}"></script>
<!--// Wow Js //-->
<script src="{{ asset('assets/frontend/vendor/js/wow.min.js') }}"></script>
<!--// Waypoint Js //-->
<script src="{{ asset('assets/frontend/vendor/js/waypoint.min.js') }}"></script>
<!--// Counter Up Js //-->
<script src="{{ asset('assets/frontend/vendor/js/counter.up.min.js') }}"></script>
<!--// JQuery Easing Functions //-->
<script src="{{ asset('assets/frontend/vendor/js/jquery.easing.min.js') }}"></script>
<!--// ScrollIt //-->
<script src="{{ asset('assets/frontend/vendor/js/scrollit.min.js') }}"></script>
<!--// Owl Carousel //-->
<script src="{{ asset('assets/frontend/vendor/js/owl.carousel.min.js') }}"></script>
<!--// Isotope Gallery //-->
<script src="{{ asset('assets/frontend/vendor/js/isotope.min.js') }}"></script>
<!--// Isotope Gallery //-->
<script src="{{ asset('assets/frontend/vendor/js/fancybox.min.js') }}"></script>
<!--// Form Validate //-->
<script src="{{ asset('assets/frontend/vendor/js/jquery.form.validate.js') }}"></script>
<!--// Main Js //-->
<script src="{{ asset('assets/frontend/js/main.js') }}"></script>

@isset ($tawk_to)
    <script>
        @php echo html_entity_decode($tawk_to->tawk_to); @endphp
    </script>
@endisset

</body>
</html>