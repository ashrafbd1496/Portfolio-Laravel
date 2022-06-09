<!DOCTYPE html>
<html dir="@if (session()->has('language_direction_from_dropdown')) @if(session()->get('language_direction_from_dropdown') == 1) {{ __('rtl') }} @else {{ __('ltr') }} @endif @else {{ __('ltr') }} @endif" lang="@if (session()->has('language_code_from_dropdown')){{ str_replace('_', '-', session()->get('language_code_from_dropdown')) }}@else{{ str_replace('_', '-',   $language->language_code) }}@endif">
<head>
    <!-- Meta Tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta name="title" content="@if (isset($general_seo)){{ $general_seo->site_name }} @endif">
    <meta name="description" content="@if (isset($general_seo)){{ $general_seo->site_desc }} @endif">
    <meta name="keywords" content="@if (isset($general_seo)){{ $general_seo->site_keywords }} @endif">
    <meta name="author" content="elsecolor">
    <meta property="fb:app_id" content="@if (isset($general_seo)){{ $general_seo->fb_app_id }} @endif">
    <meta property="og:title" content="@if (isset($general_seo)){{ $general_seo->site_name }} @endif">
    <meta property="og:url" content="@if (isset($general_seo)){{ url()->current() }} @endif">
    <meta property="og:description" content="@if (isset($general_seo)){{ $general_seo->site_desc }} @endif">
    <meta property="og:image" content="@if (!empty($general_site_image->favicon_image)){{ asset('uploads/img/general/'.$general_site_image->favicon_image) }} @endif">
    <meta itemprop="image" content="@if (!empty($general_site_image->favicon_image)){{ asset('uploads/img/general/'.$general_site_image->favicon_image) }} @endif">
    <meta property="og:type" content="website">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:image" content="@if (!empty($general_site_image->favicon_image)){{ asset('uploads/img/general/'.$general_site_image->favicon_image) }} @endif">
    <meta property="twitter:title" content="@if (isset($general_seo)){{ $general_seo->site_name }} @endif">
    <meta property="twitter:description" content="@if (isset($general_seo)){{ $general_seo->site_desc }} @endif">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Title -->
    <title>{{ __('frontend.home') }} @if (isset($general_seo)) - {{ $general_seo->site_name }} @endif</title>

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

    <!--// Color Option Css //-->
    @isset ($color_option)

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
    <header class="header default-header fixed-top" id="header">
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
                                <a class="nav-link active menu-link" href="#">{{ __('frontend.home') }}</a>
                            </li>
                            @if ($section_arr['about_section'] == "show")
                                <li class="nav-item">
                                    <a class="nav-link menu-link" href="#" data-scroll-nav="2">{{ __('frontend.about') }}</a>
                                </li>
                                @endif
                            @if ($section_arr['service_section'] == "show")
                                <li class="nav-item">
                                    <a class="nav-link menu-link" href="#" data-scroll-nav="3">{{ __('frontend.services') }}</a>
                                </li>
                                @endif
                           @if ($section_arr['portfolio_section'] == "show")
                                <li class="nav-item">
                                    <a class="nav-link menu-link" href="#" data-scroll-nav="4">{{ __('frontend.portfolio') }}</a>
                                </li>
                               @endif
                            @if ($section_arr['blog_section'] == "show")
                                <li class="nav-item">
                                    <a class="nav-link menu-link" href="#" data-scroll-nav="5">{{ __('frontend.blogs') }}</a>
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
                                    <a class="nav-link menu-link" href="#" data-scroll-nav="6">{{ __('frontend.contact') }}</a>
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
                                   @if ($external_url->button_type == "external_url")
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
        <!--// Hero Section Start //-->
       @if (isset($fixed_content))
            <section class="hero-banner" data-scroll-index="1">
                <div class="container">
                    <div class="row justify-content-between align-items-center">
                        <div class="col-lg-6 col-xl-6 col-md-10">
                            <div class="hero-inner">
                                <div class="hero-social-links">
                                    @foreach ($socials as $social)
                                        <a href="@if (!empty($social->link)) {{ $social->link }} @else # @endif">
                                            <i class="{{ $social->social_media }}"></i>
                                        </a>
                                    @endforeach
                                </div>
                                <h1>{{ $fixed_content->title }}</h1>
                                <p>{{ $fixed_content->desc }}</p>
                                <div class="hero-buttons">
                                    @if (!empty($fixed_content->btn_name))
                                        <a href="@if (!empty($fixed_content->btn_link)) {{ $fixed_content->btn_link }} @else # @endif" class="default-primary-btn">{{ $fixed_content->btn_name }}</a>
                                    @endif
                                    @if (!empty($fixed_content->video_link))
                                            <a href="{{ $fixed_content->video_link }}" class="default-video-btn"><i class="fa fa-play"></i></a>
                                        @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5 col-xl-6 col-md-10 hero-image-wrap">
                            <div class="hero-image-inner">
                                @if (!empty($fixed_content->thumbnail_image) && $fixed_content->image_status == "show")
                                    <img src="{{ asset('uploads/img/general/'.$fixed_content->thumbnail_image) }}" alt="Hero image" class="img-fluid">
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </section>
           @else

            <section class="hero-banner" data-scroll-index="1">
                <div class="container">
                    <div class="row justify-content-between align-items-center">
                        <div class="col-lg-6 col-xl-6 col-md-10">
                            <div class="hero-inner">
                                <div class="hero-social-links">
                                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                                    <a href="#"><i class="fab fa-twitter"></i></a>
                                    <a href="#"><i class="fab fa-instagram"></i></a>
                                </div>
                                <h1>Discover the best design ideas with me</h1>
                                <p>
                                    Hello, I'm Teddy Joseph.Isn't it time to bring your dream
                                    job to life ? I think you should hurry because life is too short.
                                    A new beginning is always good
                                </p>
                                <div class="hero-buttons">
                                    <a href="#" class="default-primary-btn" data-scroll-nav="5">Hire Me</a>
                                    <a href="https://www.youtube.com/watch?v=YqQx75OPRa0" class="default-video-btn"><i class="fa fa-play"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5 col-xl-6 col-md-10 hero-image-wrap">
                            <div class="hero-image-inner">
                                <img src="{{ asset('uploads/img/dummy/500x600.jpg') }}" alt="Hero image" class="img-fluid">
                            </div>
                        </div>
                    </div>
                </div>
            </section>
           @endif

        <!--// Hero Section End //-->

        <!--// About Me Start //-->
        @if ($section_arr['about_section'] == "show")
            @if (isset($about_section) || isset($about) || count($info_lists) > 0)
                <section class="section" id="about" data-scroll-index="2">
                    <div class="container">
                        @isset ($about_section)
                            <div class="row justify-content-center">
                                <div class="col-lg-6">
                                    <div class="section-heading">
                                        <h4>{{ $about_section->section_title }}</h4>
                                        <p>{{ $about_section->desc }}</p>
                                    </div>
                                </div>
                            </div>
                        @endisset
                        <div class="row align-items-center justify-content-between">
                            @if (!empty($about->about_image) && $about->image_status == "show")
                                <div class="col-lg-5 col-xl-6 about-image-wrap">
                                    <div class="about-image-inner">
                                        <img src="{{ asset('uploads/img/about/'.$about->about_image) }}" alt="About image" class="img-fluid">
                                    </div>
                                </div>
                            @endif
                            <div class="@if (!empty($about->about_image) && $about->image_status == "show")  col-lg-6 @else  col-lg-12 @endif col-md-12">
                                <div class="about-inner">
                                    <h3>{{ $about->title }}</h3>
                                    <p>@php echo html_entity_decode($about->desc); @endphp</p>
                                </div>
                                @if (count($info_lists) > 0)
                                    <div class="about-details">
                                        <div class="row">
                                            @foreach ($info_lists as $info_list)
                                                <div class="col-md-6">
                                                    <div class="about-details-item">
                                                        <div class="text">
                                                            <h5>{{ $info_list->title }}</h5>
                                                            <span>{{ $info_list->desc }}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                @endif
                                @if (!empty($about->cv_file) && $about->download_button_status == "show")
                                    <a href="{{ asset('uploads/img/about/'.$about->cv_file) }}" class="default-primary-btn" download="">{{ __('frontend.download_file') }}</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </section>
            @else
                <section class="section" id="about" data-scroll-index="2">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-6">
                                <div class="section-heading">
                                    <h4>About Me</h4>
                                    <p>
                                        It is a long established fact that a reader will be
                                        distracted by the readable content of a page when looking at its layout.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="row align-items-center justify-content-between">
                            <div class="col-lg-5 col-xl-6 about-image-wrap">
                                <div class="about-image-inner">
                                    <img src="{{ asset('uploads/img/dummy/500x600.jpg') }}" alt="About image" class="img-fluid">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="about-inner">
                                    <h3>
                                        With 15 years of experience, I will provide excellent support
                                    </h3>
                                    <p>
                                        Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                        Lorem Ipsum has been the industry's standard dummy
                                    </p>
                                    <p>
                                        Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                        Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                                        when an unknown printer took a galley of type and scrambled it to make a type
                                        specimen book.
                                    </p>
                                </div>
                                <div class="about-details">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="about-details-item">
                                                <div class="text">
                                                    <h5>Full Name:</h5>
                                                    <span>Teddy Joseph</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="about-details-item">
                                                <div class="text">
                                                    <h5>Freelance:</h5>
                                                    <span>Available</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="about-details-item">
                                                <div class="text">
                                                    <h5>E-Mail:</h5>
                                                    <span>teddymail@gmail.com</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="about-details-item">
                                                <div class="text">
                                                    <h5>Address:</h5>
                                                    <span>8595 Marconi Rd.</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <a href="#" class="default-primary-btn">Download Cv</a>
                            </div>
                        </div>
                    </div>
                </section>
            @endif
            @endif
        <!--// About Me End //-->

        <!--// My Resume Start //-->
        @if ($section_arr['resume_section'] == "show")
            @if (isset($resume_section) || count($resumes) > 0)
                <section class="section resume pb-minus-70">
                    <div class="container">
                        @isset ($resume_section)
                            <div class="row justify-content-center">
                                <div class="col-lg-6">
                                    <div class="section-heading">
                                        <h4>{{ $resume_section->section_title }}</h4>
                                        <p>{{ $resume_section->desc }}</p>
                                    </div>
                                </div>
                            </div>
                        @endisset
                        <div class="row">
                            @foreach ($resumes as $resume)
                                <div class="col-lg-6">
                                    <div class="accordion" id="accordion-{{ $loop->index }}">
                                        <div class="resume-item">
                                            <div class="resume-header">
                                                <h6>{{ $resume->title }}</h6>
                                                <a href="#" class="resume-toggle" data-toggle="collapse" data-target="#resume-tab-{{ $loop->index }}" aria-expanded="true" aria-controls="resumeTab{{ $loop->index }}" id="resumeTab{{ $loop->index }}">
                                                    <i class="fa fa-minus"></i>
                                                </a>
                                            </div>
                                            <div id="resume-tab-{{ $loop->index }}" class="collapse show" aria-labelledby="resumeTab{{ $loop->index }}" data-parent="#accordion-{{ $loop->index }}">
                                                <div class="resume-item-body">
                                                    @if (!empty($resume->date_range)) <h6>{{ $resume->date_range }}</h6> @endif
                                                    @if (!empty($resume->desc)) <p>{{ $resume->desc }}</p> @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </section>
            @else
                <section class="section resume pb-minus-70">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-6">
                                <div class="section-heading">
                                    <h4>My Resume</h4>
                                    <p>
                                        It is a long established fact that a reader will be
                                        distracted by the readable content of a page when looking at its layout.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="accordion" id="accordion-1">
                                    <div class="resume-item">
                                        <div class="resume-header">
                                            <h6>Web Designer | Twitter</h6>
                                            <a href="#" class="resume-toggle" data-toggle="collapse" data-target="#resume-tab-1" aria-expanded="true" aria-controls="resumeTab1" id="resumeTab1">
                                                <i class="fa fa-minus"></i>
                                            </a>
                                        </div>
                                        <div id="resume-tab-1" class="collapse show" aria-labelledby="resumeTab1" data-parent="#accordion-1">
                                            <div class="resume-item-body">
                                                <h6>2015-2016</h6>
                                                <p>
                                                    There are many variations of passages of Lorem Ipsum available,
                                                    but the majority have suffered alteration in some form, by injected humour,
                                                    or randomised words which don't look even slightly believable.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion" id="accordion-2">
                                    <div class="resume-item">
                                        <div class="resume-header">
                                            <h6>Affiliate Marketing | Amazon</h6>
                                            <a href="#" class="resume-toggle" data-toggle="collapse" data-target="#resume-tab-2" aria-expanded="true" aria-controls="resumeTab2" id="resumeTab2">
                                                <i class="fa fa-minus"></i>
                                            </a>
                                        </div>
                                        <div id="resume-tab-2" class="collapse show" aria-labelledby="resumeTab2" data-parent="#accordion-2">
                                            <div class="resume-item-body">
                                                <h6>2016-2017</h6>
                                                <p>
                                                    There are many variations of passages of Lorem Ipsum available,
                                                    but the majority have suffered alteration in some form, by injected humour,
                                                    or randomised words which don't look even slightly believable.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="accordion" id="accordion-3">
                                    <div class="resume-item">
                                        <div class="resume-header">
                                            <h6>Graphic Designer  | Youtube</h6>
                                            <a href="#" class="resume-toggle" data-toggle="collapse" data-target="#resume-tab-3" aria-expanded="true" aria-controls="resumeTab3" id="resumeTab3">
                                                <i class="fa fa-minus"></i>
                                            </a>
                                        </div>
                                        <div id="resume-tab-3" class="collapse show" aria-labelledby="resumeTab3" data-parent="#accordion-3">
                                            <div class="resume-item-body">
                                                <h6>2017-2018</h6>
                                                <p>
                                                    There are many variations of passages of Lorem Ipsum available,
                                                    but the majority have suffered alteration in some form, by injected humour,
                                                    or randomised words which don't look even slightly believable.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion" id="accordion-4">
                                    <div class="resume-item">
                                        <div class="resume-header">
                                            <h6>Plugin Development | WordPress</h6>
                                            <a href="#" class="resume-toggle" data-toggle="collapse" data-target="#resume-tab-4" aria-expanded="true" aria-controls="resumeTab4" id="resumeTab4">
                                                <i class="fa fa-minus"></i>
                                            </a>
                                        </div>
                                        <div id="resume-tab-4" class="collapse show" aria-labelledby="resumeTab4" data-parent="#accordion-4">
                                            <div class="resume-item-body">
                                                <h6>2017-2018</h6>
                                                <p>
                                                    There are many variations of passages of Lorem Ipsum available,
                                                    but the majority have suffered alteration in some form, by injected humour,
                                                    or randomised words which don't look even slightly believable.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            @endif
            @endif
        <!--// My Resume End //-->

        <!--// My Skills Start //-->
       @if ($section_arr['skill_section'] == "show")
            @if (isset($skill_section) || count($skills) > 0)
                <section class="section pb-minus-70">
                    <div class="container">
                        @isset ($skill_section)
                            <div class="row justify-content-center">
                                <div class="col-lg-6">
                                    <div class="section-heading">
                                        <h4>{{ $skill_section->section_title }}</h4>
                                        <p>{{ $skill_section->desc }}</p>
                                    </div>
                                </div>
                            </div>
                        @endisset
                        <div class="row">
                            @foreach ($skills as $skill)
                                <div class="col-md-6 col-lg-6">
                                    <div class="skills-inner">
                                        <div class="skills-progress-wrap">
                                            <div class="skills-item clearfix">
                                                <div class="skills-item-text">
                                                    <h6>{{ $skill->title }}<span class="skill-percent"></span></h6>
                                                </div>
                                                <div class="skills-progress-bar">
                                                    <div class="skills-progress-value slideInLeft wow" data-percent="{{ $skill->percent_rate }}" data-wow-delay="0.2s"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </section>
            @else
                <section class="section pb-minus-70">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-6">
                                <div class="section-heading">
                                    <h4>My Skills</h4>
                                    <p>
                                        It is a long established fact that a reader will be
                                        distracted by the readable content of a page when looking at its layout.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-lg-6">
                                <div class="skills-inner">
                                    <div class="skills-progress-wrap">
                                        <div class="skills-item clearfix">
                                            <div class="skills-item-text">
                                                <h6>Html 5<span class="skill-percent"></span></h6>
                                            </div>
                                            <div class="skills-progress-bar">
                                                <div class="skills-progress-value slideInLeft wow" data-percent="70" data-wow-delay="0.2s"></div>
                                            </div>
                                        </div>
                                        <div class="skills-item clearfix">
                                            <div class="skills-item-text">
                                                <h6>Javascript<span class="skill-percent"></span></h6>
                                            </div>
                                            <div class="skills-progress-bar">
                                                <div class="skills-progress-value slideInLeft wow" data-percent="80" data-wow-delay="0.2s"></div>
                                            </div>
                                        </div>
                                        <div class="skills-item clearfix">
                                            <div class="skills-item-text">
                                                <h6>Php<span class="skill-percent"></span></h6>
                                            </div>
                                            <div class="skills-progress-bar">
                                                <div class="skills-progress-value slideInLeft wow" data-percent="75" data-wow-delay="0.2s"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-6">
                                <div class="skills-inner">
                                    <div class="skills-progress-wrap">
                                        <div class="skills-item clearfix">
                                            <div class="skills-item-text">
                                                <h6>Css 3<span class="skill-percent"></span></h6>
                                            </div>
                                            <div class="skills-progress-bar">
                                                <div class="skills-progress-value slideInLeft wow" data-percent="80" data-wow-delay="0.2s"></div>
                                            </div>
                                        </div>
                                        <div class="skills-item clearfix">
                                            <div class="skills-item-text">
                                                <h6>WordPress<span class="skill-percent"></span></h6>
                                            </div>
                                            <div class="skills-progress-bar">
                                                <div class="skills-progress-value slideInLeft wow" data-percent="70" data-wow-delay="0.2s"></div>
                                            </div>
                                        </div>
                                        <div class="skills-item clearfix">
                                            <div class="skills-item-text">
                                                <h6>Laravel<span class="skill-percent"></span></h6>
                                            </div>
                                            <div class="skills-progress-bar">
                                                <div class="skills-progress-value slideInLeft wow" data-percent="60" data-wow-delay="0.2s"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            @endif
           @endif
        <!--// My Skills End //-->

        <!--// Counters Start //-->
       @if ($section_arr['counter_section'] == "show")
            @if (isset($counter_section) || count($counters) > 0)
                <section class="section pb-minus-70" id="counter">
                    <div class="container">
                        <div class="row">
                            @foreach ($counters as $counter)
                                <div class="col-md-6 col-sm-6 col-lg-3">
                                    <div class="counter-item">
                                        @if ($counter->type == "icon")
                                            @if (!empty($counter->icon))
                                                <div class="icon">
                                                    <span class="{{ $counter->icon }}"></span>
                                                </div>
                                            @endif
                                        @else
                                            <div class="icon">
                                                <img src="{{ asset('uploads/img/counter/'.$counter->counter_image) }}" class="img-fluid">
                                            </div>
                                        @endif
                                        <div class="body">
                                            <h5>{{ $counter->title }}</h5>
                                            <span class="counter">{{ $counter->timer }}</span>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </section>
            @else
                <section class="section pb-minus-70" id="counter">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6 col-sm-6 col-lg-3">
                                <div class="counter-item">
                                    <div class="icon">
                                        <span class="fa fa-coffee"></span>
                                    </div>
                                    <div class="body">
                                        <h5>Cups Of Coffee</h5>
                                        <span class="counter">2000</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-lg-3">
                                <div class="counter-item">
                                    <div class="icon">
                                        <span class="fa fa-smile"></span>
                                    </div>
                                    <div class="body">
                                        <h5>Happy Customer</h5>
                                        <span class="counter">3000</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-lg-3">
                                <div class="counter-item">
                                    <div class="icon">
                                        <span class="fa fa-file-alt"></span>
                                    </div>
                                    <div class="body">
                                        <h5>Complete Project</h5>
                                        <span class="counter">1400</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-lg-3">
                                <div class="counter-item">
                                    <div class="icon">
                                        <span class="fa fa-award"></span>
                                    </div>
                                    <div class="body">
                                        <h5>Awards Won</h5>
                                        <span class="counter">2750</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            @endif
           @endif
        <!--// Counters End //-->

        <!--// My Services Start //-->
       @if ($section_arr['service_section'] == "show")
            @if (isset($service_section) || count($services) > 0)
                <section class="section" id="services" data-scroll-index="3">
                    <div class="container">
                        @isset ($service_section)
                            <div class="row justify-content-center">
                                <div class="col-lg-6">
                                    <div class="section-heading">
                                        <h4>{{ $service_section->section_title }}</h4>
                                        <p>{{ $service_section->desc }}</p>
                                    </div>
                                </div>
                            </div>
                        @endisset
                        <div class="tab-link-wrap">
                            <div class="row">
                                @foreach ($services as $service)
                                    <div class="col-md-6 col-sm-6 col-lg-3 tab-link-item @if ($loop->index == 0) active @endif">
                                        <div class="tab-link-inner">
                                            @if ($service->type == "icon")
                                                @if (!empty($service->icon))
                                                    <span class="{{ $service->icon }}"></span>
                                                @endif
                                            @else
                                                <img src="{{ asset('uploads/img/service/'.$service->service_category_image) }}" class="img-fluid">
                                            @endif
                                            <h5>{{ $service->category_name }}</h5>
                                        </div>
                                    </div>
                                @endforeach
                                @php unset($service); @endphp
                            </div>
                        </div>
                        <div class="tab-content-wrap">
                            @foreach ($services as $service)
                                <div class="tab-content-item @if ($loop->index == 0) wow active @endif">
                                    <div class="row">
                                        @if (!empty($service->service_category_image) && $service->image_status == "show")
                                            <div class="col-lg-6 services-tab-image">
                                                <img class="img-fluid" src="{{ asset('uploads/img/service/'.$service->service_category_image) }}" alt="Services tab image">
                                            </div>
                                        @endif
                                        <div class="@if (!empty($service->service_category_image) && $service->image_status == "show") col-lg-6 @else col-lg-12 @endif">
                                            <div class="tab-content-inner">
                                                @if (!empty($service->title)) <h4>{{ $service->title }}</h4> @endif
                                                @if (!empty($service->desc)) <p>@php echo html_entity_decode($service->desc); @endphp</p> @endif
                                                @if (!empty($service->btn_name)) <a href="@if (!empty($service->btn_link)) {{ $service->btn_link }} @else # @endif" class="default-primary-btn">{{ $service->btn_name }}</a> @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </section>
            @else
                <section class="section" id="services" data-scroll-index="3">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-6">
                                <div class="section-heading">
                                    <h4>My Services</h4>
                                    <p>
                                        It is a long established fact that a reader will be
                                        distracted by the readable content of a page when looking at its layout.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="tab-link-wrap">
                            <div class="row">
                                <div class="col-md-6 col-sm-6 col-lg-3 tab-link-item active">
                                    <div class="tab-link-inner">
                                        <span class="fa fa-pencil-ruler"></span>
                                        <h5>Web Design</h5>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6 col-lg-3 tab-link-item">
                                    <div class="tab-link-inner">
                                        <span class="fab fa-uikit"></span>
                                        <h5>UI Design</h5>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6 col-lg-3 tab-link-item">
                                    <div class="tab-link-inner">
                                        <span class="fa fa-rocket"></span>
                                        <h5>Seo Optimize</h5>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6 col-lg-3 tab-link-item">
                                    <div class="tab-link-inner">
                                        <span class="fas fa-bullhorn"></span>
                                        <h5>Marketing</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-content-wrap">
                            <div class="tab-content-item wow active">
                                <div class="row">
                                    <div class="col-lg-6 services-tab-image">
                                        <img class="img-fluid" src="{{ asset('uploads/img/dummy/540x490.jpg') }}" alt="Services tab image">
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="tab-content-inner">
                                            <h4>
                                                I take into account your ideas
                                            </h4>
                                            <p>
                                                It is a long established fact that a reader will be distracted by
                                                the readable content of a page when looking at its layout.
                                                The point of using Lorem Ipsum is that it has a more-or-less
                                            </p>
                                            <p>
                                                It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.
                                            </p>
                                            <ul>
                                                <li>Full Resposive & Retina Ready</li>
                                                <li>Premium Quality W3C Validate</li>
                                                <li>Mega & Dropdown Menu</li>
                                            </ul>
                                            <a href="#" class="default-primary-btn">Get Offer Now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-content-item">
                                <div class="row">
                                    <div class="col-lg-6 services-tab-image">
                                        <img class="img-fluid" src="{{ asset('uploads/img/dummy/540x490.jpg') }}" alt="Services tab image">
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="tab-content-inner">
                                            <h4>
                                                I'm ambitious about new app design and development
                                            </h4>
                                            <p>
                                                It is a long established fact that a reader will be distracted by
                                                the readable content of a page when looking at its layout.
                                                The point of using Lorem Ipsum is that it has a more-or-less
                                            </p>
                                            <p>
                                                It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.
                                            </p>
                                            <ul>
                                                <li>Application Interface Design</li>
                                                <li>UI Elements & Outline Icons</li>
                                                <li>Great Color Palette & Animated Menu</li>
                                            </ul>
                                            <a href="#" class="default-primary-btn">Read More</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-content-item">
                                <div class="row">
                                    <div class="col-lg-6 services-tab-image">
                                        <img class="img-fluid" src="{{ asset('uploads/img/dummy/540x490.jpg') }}" alt="Services tab image">
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="tab-content-inner">
                                            <h4>
                                                Make your site search engine friendly
                                            </h4>
                                            <p>
                                                It is a long established fact that a reader will be distracted by
                                                the readable content of a page when looking at its layout.
                                                The point of using Lorem Ipsum is that it has a more-or-less
                                            </p>
                                            <p>
                                                It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.
                                            </p>
                                            <ul>
                                                <li>Registration To All Search Engines</li>
                                                <li>Raising Your Site's Rank</li>
                                                <li>Ad Promotions & Traffic Increase</li>
                                            </ul>
                                            <a href="#" class="default-primary-btn">Read More</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-content-item">
                                <div class="row">
                                    <div class="col-lg-6 services-tab-image">
                                        <img class="img-fluid" src="{{ asset('uploads/img/dummy/540x490.jpg') }}" alt="Services tab image">
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="tab-content-inner">
                                            <h4>
                                                Digital Product Marketing Business Strategy Tactics
                                            </h4>
                                            <p>
                                                It is a long established fact that a reader will be distracted by
                                                the readable content of a page when looking at its layout.
                                                The point of using Lorem Ipsum is that it has a more-or-less
                                            </p>
                                            <p>
                                                It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.
                                            </p>
                                            <ul>
                                                <li>Product Price Determination</li>
                                                <li>Price Tracking Of Competitors</li>
                                                <li>Providing The Right Product & Customer Trust</li>
                                            </ul>
                                            <a href="#" class="default-primary-btn">Read More</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            @endif
           @endif
        <!--// My Services End  //-->

        <!--// My Works Start //-->
        @if ($section_arr['portfolio_section'] == "show")
            @if (isset($portfolio_section) || count($portfolios) > 0)
                <section class="section pb-minus-70" id="portfolio" data-scroll-index="4">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-6">
                                @isset ($portfolio_section)
                                    <div class="section-heading">
                                        <h4>{{ $portfolio_section->section_title }}</h4>
                                        <p>{{ $portfolio_section->desc }}</p>
                                    </div>
                                @endisset
                            </div>
                            <div class="col-lg-12">
                                <div class="portfolio-filter text-center">
                                    <a href="#" data-portfolio-filter="*" class="current mb-2">{{ __('frontend.all') }}</a>
                                    @foreach ($portfolio_categories as $portfolio_category)
                                        <a href="#" data-portfolio-filter=".{{ $portfolio_category->portfolio_category_slug }}" class="mb-2">{{ $portfolio_category->category_name }}</a>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="row" id="portfolio-masonry-wrap">
                            @foreach ($portfolios as $portfolio)
                                <div class="col-md-6 col-lg-4 portfolio-item {{ $portfolio->portfolio_category->portfolio_category_slug }}">
                                    <div class="portfolio-item-inner">
                                        @if ($portfolio->image_status == "show" && !empty($portfolio->thumbnail_image))
                                            <div class="portfolio-item-img">
                                                <a data-fancybox="light-masonry" href="{{ asset('uploads/img/portfolio/'.$portfolio->thumbnail_image) }}">
                                                    <img src="{{ asset('uploads/img/portfolio/'.$portfolio->thumbnail_image) }}" alt="Portfolio image" class="img-fluid">
                                                </a>
                                            </div>
                                        @else
                                            <div class="portfolio-item-img">

                                                <a data-fancybox="light-masonry" href="{{ asset('uploads/img/dummy/600x600.jpg') }}">
                                                    <img src="{{ asset('uploads/img/dummy/600x600.jpg') }}" alt="Portfolio image" class="img-fluid">
                                                </a>
                                            </div>
                                        @endif
                                        <div class="portfolio-details">
                                            <h5><a href="#">{{ $portfolio->title }}</a></h5>
                                            <span>{{ $portfolio->portfolio_category->category_name }}</span>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </section>
            @else
                <section class="section pb-minus-70" id="portfolio" data-scroll-index="4">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-6">
                                <div class="section-heading">
                                    <h4>My Works</h4>
                                    <p>
                                        It is a long established fact that a reader will be
                                        distracted by the readable content of a page when looking at its layout.
                                    </p>
                                </div>
                                <div class="portfolio-filter text-center">
                                    <a href="#" data-portfolio-filter="*" class="current">All</a>
                                    <a href="#" data-portfolio-filter=".web">Web</a>
                                    <a href="#" data-portfolio-filter=".brand">Brand</a>
                                    <a href="#" data-portfolio-filter=".ui">UI Kit</a>
                                </div>
                            </div>
                        </div>
                        <div class="row" id="portfolio-masonry-wrap">
                            <div class="col-md-6 col-lg-4 portfolio-item brand">
                                <div class="portfolio-item-inner">
                                    <div class="portfolio-item-img">
                                        <a data-fancybox="light-masonry" href="{{ asset('uploads/img/dummy/600x600.jpg') }}">
                                            <img src="{{ asset('uploads/img/dummy/600x600.jpg') }}" alt="Portfolio image" class="img-fluid">
                                        </a>
                                    </div>
                                    <div class="portfolio-details">
                                        <h5><a href="#">Coffee Mockup</a></h5>
                                        <span>Brand</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4 portfolio-item web">
                                <div class="portfolio-item-inner">
                                    <div class="portfolio-item-img">
                                        <a data-fancybox="light-masonry" href="{{ asset('uploads/img/dummy/600x600.jpg') }}">
                                            <img src="{{ asset('uploads/img/dummy/600x600.jpg') }}" alt="Portfolio image" class="img-fluid">
                                        </a>
                                    </div>
                                    <div class="portfolio-details">
                                        <h5><a href="#">Envelope Mockup</a></h5>
                                        <span>Web</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4 portfolio-item brand">
                                <div class="portfolio-item-inner">
                                    <div class="portfolio-item-img">
                                        <a data-fancybox="light-masonry" href="{{ asset('uploads/img/dummy/600x600.jpg') }}">
                                            <img src="{{ asset('uploads/img/dummy/600x600.jpg') }}" alt="Portfolio image" class="img-fluid">
                                        </a>
                                    </div>
                                    <div class="portfolio-details">
                                        <h5><a href="#">Book Mockup</a></h5>
                                        <span>Brand</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4 portfolio-item ui">
                                <div class="portfolio-item-inner">
                                    <div class="portfolio-item-img">
                                        <a data-fancybox="light-masonry" href="{{ asset('uploads/img/dummy/600x600.jpg') }}">
                                            <img src="{{ asset('uploads/img/dummy/600x600.jpg') }}" alt="Portfolio image" class="img-fluid">
                                        </a>
                                    </div>
                                    <div class="portfolio-details">
                                        <h5><a href="#">UI Calendar Mockup</a></h5>
                                        <span>UI Kit</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4 portfolio-item web">
                                <div class="portfolio-item-inner">
                                    <div class="portfolio-item-img">
                                        <a data-fancybox="light-masonry" href="{{ asset('uploads/img/dummy/600x600.jpg') }}">
                                            <img src="{{ asset('uploads/img/dummy/600x600.jpg') }}" alt="Portfolio image" class="img-fluid">
                                        </a>
                                    </div>
                                    <div class="portfolio-details">
                                        <h5><a href="#">Watch Design</a></h5>
                                        <span>Web</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4 portfolio-item ui">
                                <div class="portfolio-item-inner">
                                    <div class="portfolio-item-img">
                                        <a data-fancybox="light-masonry" href="{{ asset('uploads/img/dummy/600x600.jpg') }}">
                                            <img src="{{ asset('uploads/img/dummy/600x600.jpg') }}" alt="Portfolio image" class="img-fluid">
                                        </a>
                                    </div>
                                    <div class="portfolio-details">
                                        <h5><a href="#">UI Calendar Mockup</a></h5>
                                        <span>UI Kit</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4 portfolio-item brand">
                                <div class="portfolio-item-inner">
                                    <div class="portfolio-item-img">
                                        <a data-fancybox="light-masonry" href="{{ asset('uploads/img/dummy/600x600.jpg') }}">
                                            <img src="{{ asset('uploads/img/dummy/600x600.jpg') }}" alt="Portfolio image" class="img-fluid">
                                        </a>
                                    </div>
                                    <div class="portfolio-details">
                                        <h5><a href="#">Square Mockup</a></h5>
                                        <span>Brand</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4 portfolio-item ui">
                                <div class="portfolio-item-inner">
                                    <div class="portfolio-item-img">
                                        <a data-fancybox="light-masonry" href="{{ asset('uploads/img/dummy/600x600.jpg') }}">
                                            <img src="{{ asset('uploads/img/dummy/600x600.jpg') }}" alt="Portfolio image" class="img-fluid">
                                        </a>
                                    </div>
                                    <div class="portfolio-details">
                                        <h5><a href="#">UI Calendar Mockup</a></h5>
                                        <span>UI Kit</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4 portfolio-item web">
                                <div class="portfolio-item-inner">
                                    <div class="portfolio-item-img">
                                        <a data-fancybox="light-masonry" href="{{ asset('uploads/img/dummy/600x600.jpg') }}">
                                            <img src="{{ asset('uploads/img/dummy/600x600.jpg') }}" alt="Portfolio image" class="img-fluid">
                                        </a>
                                    </div>
                                    <div class="portfolio-details">
                                        <h5><a href="#">Watch Design</a></h5>
                                        <span>Web</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            @endif
            @endif
        <!--// My Works End //-->

        <!--// My Clients Start //-->
       @if ($section_arr['client_section'] == "show")
            @if (isset($testimonial_section) || count($testimonials) > 0)
                <section class="section" id="testimonial">
                    <div class="container">
                        @isset ($testimonial_section)
                            <div class="row justify-content-center">
                                <div class="col-lg-6">
                                    <div class="section-heading">
                                        <h4>{{ $testimonial_section->section_title }}</h4>
                                        <p>{{ $testimonial_section->desc }}</p>
                                    </div>
                                </div>
                            </div>
                        @endisset
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="owl-carousel owl-theme" id="clients-slider">
                                    @foreach ($testimonials as $testimonial)
                                        <div class="item">
                                            <div class="clients-item">
                                                @if (!empty($testimonial->testimonial_image) && $testimonial->image_status == "show")
                                                    <img src="{{ asset('uploads/img/testimonial/'.$testimonial->testimonial_image) }}" alt="Clients Img" class="clients-img">
                                                @endif
                                                <div class="clients-rating">
                                                    @for ($t = 0; $t < $testimonial->star; $t++)
                                                        <i class="fa fa-star"></i>
                                                    @endfor
                                                    @for ($t = 0; $t < 5-$testimonial->star; $t++)
                                                        <i class="far fa-star"></i>
                                                    @endfor
                                                </div>
                                                <div class="clients-text">
                                                    <p>{{ $testimonial->desc }}</p>
                                                    <h5>{{ $testimonial->name }}</h5>
                                                    <span>{{ $testimonial->job }}</span>
                                                </div>
                                                <div class="quote">
                                                    <i class="fas fa-quote-right"></i>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            @else
                <section class="section" id="testimonial">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-6">
                                <div class="section-heading">
                                    <h4>My Clients</h4>
                                    <p>
                                        It is a long established fact that a reader will be
                                        distracted by the readable content of a page when looking at its layout.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="owl-carousel owl-theme" id="clients-slider">
                                    <div class="item">
                                        <div class="clients-item">
                                            <img src="{{ asset('uploads/img/dummy/100x100.jpg') }}" alt="Clients Img" class="clients-img">
                                            <div class="clients-rating">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                            <div class="clients-text">
                                                <p>
                                                    It is a long established fact that a reader will be
                                                    distracted by the readable content of a page when looking at its layout.
                                                </p>
                                                <h5>Andrea Piacquadio</h5>
                                                <span>Web Designer</span>
                                            </div>
                                            <div class="quote">
                                                <i class="fas fa-quote-right"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="clients-item">
                                            <img src="{{ asset('uploads/img/dummy/100x100.jpg') }}" alt="Clients Img" class="clients-img">
                                            <div class="clients-rating">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                            <div class="clients-text">
                                                <p>
                                                    It is a long established fact that a reader will be
                                                    distracted by the readable content of a page when looking at its layout.
                                                </p>
                                                <h5>Spencer Selover</h5>
                                                <span>Web Developer</span>
                                            </div>
                                            <div class="quote">
                                                <i class="fas fa-quote-right"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="clients-item">
                                            <img src="{{ asset('uploads/img/dummy/100x100.jpg') }}" alt="Clients Img" class="clients-img">
                                            <div class="clients-rating">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                            <div class="clients-text">
                                                <p>
                                                    It is a long established fact that a reader will be
                                                    distracted by the readable content of a page when looking at its layout.
                                                </p>
                                                <h5>Matheus Bertelli</h5>
                                                <span>UX Designer</span>
                                            </div>
                                            <div class="quote">
                                                <i class="fas fa-quote-right"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="clients-item">
                                            <img src="{{ asset('uploads/img/dummy/100x100.jpg') }}" alt="Clients Img" class="clients-img">
                                            <div class="clients-rating">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                            <div class="clients-text">
                                                <p>
                                                    It is a long established fact that a reader will be
                                                    distracted by the readable content of a page when looking at its layout.
                                                </p>
                                                <h5>John Doe</h5>
                                                <span>Web Designer</span>
                                            </div>
                                            <div class="quote">
                                                <i class="fas fa-quote-right"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            @endif
           @endif
        <!--// My Clients End //-->

        <!--// My Team Start //-->
       @if ($section_arr['team_section'] == "show")
            @if (isset($team_section) || count($teams) > 0)
                <section class="section" id="team">
                    <div class="container">
                        @isset ($team_section)
                            <div class="row justify-content-center">
                                <div class="col-lg-6">
                                    <div class="section-heading">
                                        <h4>{{ $team_section->section_title }}</h4>
                                        <p>{{ $team_section->desc }}</p>
                                    </div>
                                </div>
                            </div>
                        @endisset
                        <div class="owl-carousel owl-theme" id="team-slider">
                            @foreach ($teams as $team)
                                <div class="item">
                                    <div class="team-item">
                                        <div class="team-img">
                                            @if (!empty($team->team_image) && $team->image_status == "show")
                                                <img src="{{ asset('uploads/img/team/'.$team->team_image) }}" alt="Team image" class="img-fluid">
                                            @else
                                                <img src="{{ asset('uploads/img/dummy/350x500.jpg') }}" alt="Team image" class="img-fluid">
                                            @endif
                                            <div class="team-social">
                                                @if (!empty($team->link_2)) <a href="{{ $team->link_2 }}"><i class="fab fa-facebook-f"></i></a> @endif
                                                @if (!empty($team->link_3)) <a href="{{ $team->link_3 }}"><i class="fab fa-twitter"></i></a>@endif
                                                @if (!empty($team->link_4)) <a href="{{ $team->link_4 }}"><i class="fab fa-instagram"></i></a> @endif
                                                @if (!empty($team->link_5)) <a href="{{ $team->link_5 }}"><i class="fab fa-linkedin"></i></a> @endif
                                            </div>
                                        </div>
                                        <div class="team-details">
                                            <h5>{{ $team->name }}</h5>
                                            <span>{{ $team->job }}</span>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </section>
            @else
                <section class="section" id="team">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-6">
                                <div class="section-heading">
                                    <h4>My Team</h4>
                                    <p>
                                        It is a long established fact that a reader will be
                                        distracted by the readable content of a page when looking at its layout.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="owl-carousel owl-theme" id="team-slider">
                            <div class="item">
                                <div class="team-item">
                                    <div class="team-img">
                                        <img src="{{ asset('uploads/img/dummy/350x500.jpg') }}" alt="Team image" class="img-fluid">
                                        <div class="team-social">
                                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                                            <a href="#"><i class="fab fa-twitter"></i></a>
                                            <a href="#"><i class="fab fa-instagram"></i></a>
                                        </div>
                                    </div>
                                    <div class="team-details">
                                        <h5>Kewin Bidwell</h5>
                                        <span>Web Designer</span>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="team-item">
                                    <div class="team-img">
                                        <img src="{{ asset('uploads/img/dummy/350x500.jpg') }}" alt="Team image" class="img-fluid">
                                        <div class="team-social">
                                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                                            <a href="#"><i class="fab fa-twitter"></i></a>
                                            <a href="#"><i class="fab fa-instagram"></i></a>
                                        </div>
                                    </div>
                                    <div class="team-details">
                                        <h5>Kelvin Valerio</h5>
                                        <span>UI Designer</span>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="team-item">
                                    <div class="team-img">
                                        <img src="{{ asset('uploads/img/dummy/350x500.jpg') }}" alt="Team image" class="img-fluid">
                                        <div class="team-social">
                                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                                            <a href="#"><i class="fab fa-twitter"></i></a>
                                            <a href="#"><i class="fab fa-instagram"></i></a>
                                        </div>
                                    </div>
                                    <div class="team-details">
                                        <h5>Charles Roth</h5>
                                        <span>Web Designer</span>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="team-item">
                                    <div class="team-img">
                                        <img src="{{ asset('uploads/img/dummy/350x500.jpg') }}" alt="Team image" class="img-fluid">
                                        <div class="team-social">
                                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                                            <a href="#"><i class="fab fa-twitter"></i></a>
                                            <a href="#"><i class="fab fa-instagram"></i></a>
                                        </div>
                                    </div>
                                    <div class="team-details">
                                        <h5>Jack Winbow</h5>
                                        <span>UX Designer</span>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="team-item">
                                    <div class="team-img">
                                        <img src="{{ asset('uploads/img/dummy/350x500.jpg') }}" alt="Team image" class="img-fluid">
                                        <div class="team-social">
                                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                                            <a href="#"><i class="fab fa-twitter"></i></a>
                                            <a href="#"><i class="fab fa-instagram"></i></a>
                                        </div>
                                    </div>
                                    <div class="team-details">
                                        <h5>David Giovan</h5>
                                        <span>Web Designer</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            @endif
           @endif
        <!--// My Team End //-->

        <!--// Banner Start //-->
      @if ($section_arr['call_to_action_section'] == "show")
            @if (isset($call_to_action))
                <section class="section" id="banner" @if (!empty($call_to_action->bg_image) && $call_to_action->image_status == "show") data-bg-image-path="{{ asset('uploads/img/general/'.$call_to_action->bg_image) }}" @endif>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="banner-inner">
                                    <h4>{{ $call_to_action->title }}</h4>
                                    <p>{{ $call_to_action->desc }}</p>
                                    @if (!empty($call_to_action->btn_name))
                                        @if (!empty($call_to_action->btn_link))
                                            <a href="{{ $call_to_action->btn_link }}" class="default-primary-btn">{{ $call_to_action->btn_name }}</a>
                                        @else
                                            @if ($section_arr['contact_section'] == "show")
                                                <a href="#" class="default-primary-btn" data-scroll-nav="6">{{ $call_to_action->btn_name }}</a>
                                            @endif
                                        @endif
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            @else
                <section class="section" id="banner" data-bg-image-path="{{ asset('uploads/img/dummy/1920x420.jpg') }}">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="banner-inner">
                                    <h4>Do you need a new project ?</h4>
                                    <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. </p>
                                    <a href="#" class="default-primary-btn" data-scroll-nav="6">Contact Me</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            @endif
          @endif
        <!--// Banner End //-->

        <!--// My Blog Start //-->
       @if ($section_arr['blog_section'] == "show")
            @if (isset($blog_section) || count($recent_posts) > 0)
                <section class="section" id="blogs" data-scroll-index="5">
                    <div class="container">
                        @isset ($blog_section)
                            <div class="row justify-content-center">
                                <div class="col-lg-6">
                                    <div class="section-heading">
                                        <h4>{{ $blog_section->section_title }}</h4>
                                        <p>{{ $blog_section->desc }}</p>
                                    </div>
                                </div>
                            </div>
                        @endisset
                        <div class="owl-carousel owl-theme" id="blog-slider">
                            @foreach ($recent_posts as $recent_post)
                                <div class="item">
                                    <div class="blog-item">
                                        @if (!empty($recent_post->blog_image))
                                            <div class="blog-img">
                                                <a href="{{ route('blog-page.show', ['slug' => $recent_post->slug]) }}">
                                                    <img src="{{ asset('uploads/img/blog/'.$recent_post->blog_image) }}" alt="Blog image" class="img-fluid">
                                                </a>
                                            </div>
                                        @else
                                            <div class="blog-img">
                                                <a href="{{ route('blog-page.show', ['slug' => $recent_post->slug]) }}">
                                                    <img src="{{ asset('uploads/img/dummy/no-image.jpg') }}" alt="Blog image" class="img-fluid">
                                                </a>
                                            </div>
                                        @endif

                                        <div class="blog-body">
                                            <div class="blog-meta">
                                                <span><i class="far fa-user"></i>@if ($recent_post->type == "with_this_account") {{ $recent_post->author_name }} @else {{ __('frontend.anonymous') }} @endif</span>
                                                <span><i class="far fa-bookmark"></i>{{ $recent_post->category_name }}</span>
                                            </div>
                                            <div class="blog-text">
                                                <h5>
                                                    <a href="{{ route('blog-page.show', ['slug' => $recent_post->slug]) }}">{{ $recent_post->title }}</a>
                                                </h5>
                                                @if (!empty($recent_post->short_desc)) <p>{{ $recent_post->short_desc }}</p> @endif
                                                <a href="{{ route('blog-page.show', ['slug' => $recent_post->slug]) }}" class="blog-more-btn">
                                                    {{ __('frontend.read_more') }}
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="row">
                            <a href="{{ route('blog-page.index') }}" class="default-primary-btn d-block mx-auto mt-3">{{ __('frontend.all') }}</a>
                        </div>
                    </div>
                </section>
            @else
                <section class="section" id="blogs" data-scroll-index="5">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-6">
                                <div class="section-heading">
                                    <h4>My Blog</h4>
                                    <p>
                                        It is a long established fact that a reader will be
                                        distracted by the readable content of a page when looking at its layout.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="owl-carousel owl-theme" id="blog-slider">
                            <div class="item">
                                <div class="blog-item">
                                    <div class="blog-img">
                                        <a href="#">
                                            <img src="{{ asset('uploads/img/dummy/600x450.jpg') }}" alt="Blog image" class="img-fluid">
                                        </a>
                                    </div>
                                    <div class="blog-body">
                                        <div class="blog-meta">
                                            <span><i class="far fa-user"></i>By Admin</span>
                                            <span><i class="far fa-bookmark"></i>WordPress</span>
                                        </div>
                                        <div class="blog-text">
                                            <h5><a href="#">2020 Best Premium WordPress Theme</a></h5>
                                            <p>It is a long established fact that a reader will be distracted by the readable...</p>
                                            <a href="#" class="blog-more-btn">Read More</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="blog-item">
                                    <div class="blog-img">
                                        <a href="#">
                                            <img src="{{ asset('uploads/img/dummy/600x450.jpg') }}" alt="Blog image" class="img-fluid">
                                        </a>
                                    </div>
                                    <div class="blog-body">
                                        <div class="blog-meta">
                                            <span><i class="far fa-user"></i>By Admin</span>
                                            <span><i class="far fa-bookmark"></i>WordPress</span>
                                        </div>
                                        <div class="blog-text">
                                            <h5><a href="#">2020 Best Premium WordPress Plugin</a></h5>
                                            <p>It is a long established fact that a reader will be distracted by the readable...</p>
                                            <a href="#" class="blog-more-btn">Read More</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="blog-item">
                                    <div class="blog-img">
                                        <a href="#">
                                            <img src="{{ asset('uploads/img/dummy/600x450.jpg') }}" alt="Blog image" class="img-fluid">
                                        </a>
                                    </div>
                                    <div class="blog-body">
                                        <div class="blog-meta">
                                            <span><i class="far fa-user"></i>By Admin</span>
                                            <span><i class="far fa-bookmark"></i>WordPress</span>
                                        </div>
                                        <div class="blog-text">
                                            <h5><a href="#">2020 Best Blog Posts For Web Design</a></h5>
                                            <p>It is a long established fact that a reader will be distracted by the readable...</p>
                                            <a href="#" class="blog-more-btn">Read More</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="blog-item">
                                    <div class="blog-img">
                                        <a href="#">
                                            <img src="{{ asset('uploads/img/dummy/600x450.jpg') }}" alt="Blog image" class="img-fluid">
                                        </a>
                                    </div>
                                    <div class="blog-body">
                                        <div class="blog-meta">
                                            <span><i class="far fa-user"></i>By Admin</span>
                                            <span><i class="far fa-bookmark"></i>Marketing</span>
                                        </div>
                                        <div class="blog-text">
                                            <h5><a href="#">Best Strategy Focuses for 2020 Marketing</a></h5>
                                            <p>It is a long established fact that a reader will be distracted by the readable...</p>
                                            <a href="#" class="blog-more-btn">Read More</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            @endif
           @endif
        <!--// My Blog End //-->

        <!--// Contact Me Start //-->
       @if ($section_arr['contact_section'] == "show")
            @if (isset($contact_section) || count($contacts) > 0)
                <section class="section" id="contact" data-scroll-index="6">
                    <div class="container">
                        @isset ($contact_section)
                            <div class="row justify-content-center">
                                <div class="col-lg-6">
                                    <div class="section-heading">
                                        <h4>{{ $contact_section->section_title }}</h4>
                                        <p>{{ $contact_section->desc }}</p>
                                    </div>
                                </div>
                            </div>
                        @endisset
                        @include('frontend.alert.alert-contact')
                        <div class="row">
                            @if (count($contacts) > 0)
                                <div class="col-lg-5">
                                    <div class="contact-info">
                                        @foreach ($contacts as $contact)
                                            <div class="contact-info-box">
                                                @if (!empty($contact->icon)) <span class="{{ $contact->icon }}"></span> @endif
                                                <div class="text">
                                                    @if (!empty($contact->title)) <h5>{{ $contact->title }}</h5> @endif
                                                    @if (!empty($contact->desc)) <p>{{ $contact->desc }}</p> @endif
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endif
                            <div class="@if (count($contacts) > 0) col-lg-7 @else col-lg-12 @endif">
                                <div class="contact-form">
                                    <form action="{{ route('message.store') }}" method="POST">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="custom-form-group">
                                                    <input type="text" class="custom-form-control" name="name" placeholder="{{ __('frontend.your_name') }}" required>
                                                    <span class="far fa-user"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="custom-form-group">
                                                    <input type="text" class="custom-form-control" name="email" placeholder="{{ __('frontend.your_email') }}" required>
                                                    <span class="far fa-envelope"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="custom-form-group">
                                                    <input type="text" class="custom-form-control" name="phone" placeholder="{{ __('frontend.your_phone') }}" required>
                                                    <span class="fa fa-mobile-alt"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="custom-form-group">
                                                    <input type="text" class="captcha-input custom-form-control" name="contact_question" placeholder="{{ __('frontend.please_enter_code') }}" required>
                                                    <span id="contactFormCaptchaSpan"></span>
                                                    <input type="hidden" name="null_value" value="">
                                                    <input type="hidden" name="captcha" id="contactFormCaptchaVal">
                                                    <div class="form-validate-icons">
                                                        <span></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="custom-form-group">
                                                    <input type="text" class="custom-form-control" name="subject" placeholder="{{ __('frontend.your_subject') }}" required>
                                                    <span class="far fa-bookmark"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="custom-form-group">
                                                    <textarea class="custom-form-control text-area" name="message" cols="30" rows="6" placeholder="{{ __('frontend.your_message') }}" required></textarea>
                                                    <span class="far fa-envelope-open"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <button type="submit" class="default-primary-btn">{{ __('frontend.send_message') }}</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            @else
                <section class="section" id="contact" data-scroll-index="6">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-6">
                                <div class="section-heading">
                                    <h4>Contact Me</h4>
                                    <p>
                                        It is a long established fact that a reader will be
                                        distracted by the readable content of a page when looking at its layout.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-5">
                                <div class="contact-info">
                                    <div class="contact-info-box">
                                        <span class="fa fa-map"></span>
                                        <div class="text">
                                            <h5>Address :</h5>
                                            <p>8595 Marconi Rd. Phillipsburg,</p>
                                            <p> NJ 08865</p>
                                        </div>
                                    </div>
                                    <div class="contact-info-box">
                                        <span class="fa fa-envelope-open-text"></span>
                                        <div class="text">
                                            <h5>E-Mail:</h5>
                                            <p>
                                                tempo@gmail.com
                                            </p>

                                        </div>
                                    </div>
                                    <div class="contact-info-box">
                                        <span class="fa fa-headphones"></span>
                                        <div class="text">
                                            <h5>Call Me:</h5>
                                            <p>
                                                +1-202-555-0136
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-7">
                                <div class="contact-form">
                                    <form id="contactForm">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="custom-form-group">
                                                    <input type="text" class="custom-form-control" name="contact_name" placeholder="Your Name *">
                                                    <span class="far fa-user"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="custom-form-group">
                                                    <input type="text" class="custom-form-control" name="contact_email"  placeholder="Your E-Mail *">
                                                    <span class="far fa-envelope"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="custom-form-group">
                                                    <input type="text" class="custom-form-control" name="contact_phone"  placeholder="Your Phone *">
                                                    <span class="fa fa-mobile-alt"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="custom-form-group">
                                                    <input type="text" class="captcha-input custom-form-control" name="contact_question" placeholder="Please Enter Code *">
                                                    <span id="contactFormCaptchaSpan"></span>
                                                    <input type="hidden" id="contactFormCaptchaVal">
                                                    <div class="form-validate-icons">
                                                        <span></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="custom-form-group">
                                                    <input type="text" class="custom-form-control" name="contact_phone" placeholder="Your Subject *">
                                                    <span class="far fa-bookmark"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="custom-form-group">
                                                    <textarea class="custom-form-control text-area" name="contact_message" cols="30" rows="6" placeholder="Your Message *"></textarea>
                                                    <span class="far fa-envelope-open"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <button type="button" class="default-primary-btn">Send Message</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            @endif
           @endif
        <!--// Contact Me End //-->

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

