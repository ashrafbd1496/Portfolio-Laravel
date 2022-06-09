<!DOCTYPE html>
<html dir="@if (session()->has('language_direction_from_dropdown')) @if(session()->get('language_direction_from_dropdown') == 1) {{ __('rtl') }} @else {{ __('ltr') }} @endif @else {{ __('ltr') }} @endif" lang="@if (session()->has('language_code_from_dropdown')){{ str_replace('_', '-', session()->get('language_code_from_dropdown')) }}@else{{ str_replace('_', '-',   $language->language_code) }}@endif">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Required meta tags -->

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Favicon -->
    @if(isset($general_site_image))

        @if (!empty($general_site_image->favicon_image))
            <link href="{{ asset('uploads/img/general/'.$general_site_image->favicon_image) }}" sizes="128x128" rel="shortcut icon" type="image/x-icon" />
            <link href="{{ asset('uploads/img/general/'.$general_site_image->favicon_image) }}" sizes="128x128" rel="shortcut icon" />
        @endif

    @else

        <link href="{{ asset('uploads/img/dummy/favicon.png') }}" sizes="128x128" rel="shortcut icon" type="image/x-icon" />
        <link href="{{ asset('uploads/img/dummy/favicon.png') }}" sizes="128x128" rel="shortcut icon" />

    @endif

<!-- Fonts -->
    <link href="{{ asset('assets/admin/side_menu/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/admin/side_menu/vendor/fontawesome-free/css/fontawesome-iconpicker.min.css') }}" rel="stylesheet">

    <!-- Datepicker CSS -->
    <link rel="stylesheet" href="{{ asset('assets/admin/side_menu/css/bootstrap-datepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/side_menu/css/default-assets/color-picker-bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/side_menu/css/default-assets/form-picker.css') }}">

    <!-- Tags Input CSS -->
    <link rel="stylesheet" href="{{ asset('assets/admin/side_menu/css/default-assets/jquery.tagsinput.min.css') }}">


    <!-- Master Stylesheet CSS -->
    @if (session()->has('language_direction_from_dropdown'))

        @if(session()->get('language_direction_from_dropdown') == 1)

            <link rel="stylesheet" href="{{ asset('assets/admin/side_menu/version_rtl/style.css') }}">

        @endif

        @if(session()->get('language_direction_from_dropdown') == 0)

            <link rel="stylesheet" href="{{ asset('assets/admin/side_menu/style.css') }}">

        @endif

    @elseif (isset($language))

        @if ($language->direction == 0)
            <link rel="stylesheet" href="{{ asset('assets/admin/side_menu/style.css') }}">
        @else
            <link rel="stylesheet" href="{{ asset('assets/admin/side_menu/version_rtl/style.css') }}">

    @endif

@endif

<!-- Light box CSS -->
    <link rel="stylesheet" href="{{ asset('assets/admin/side_menu/css/default-assets/new/ekko-lightbox.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/side_menu/css/default-assets/new/lightbox.min.css') }}">

    <!-- Data tables CSS -->
    <link rel="stylesheet" href="{{ asset('assets/admin/side_menu/css/default-assets/datatables.bootstrap4.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/side_menu/css/default-assets/responsive.bootstrap4.css') }}">

    <!-- Summer note Css -->
    <link href="{{ asset('assets/admin/side_menu/css/summernote-bs4.min.css') }}" rel="stylesheet">


</head>

<body @if (session()->has('language_direction_from_dropdown')) @if(session()->get('language_direction_from_dropdown') == 1)  class="rtl-version" @endif @elseif (isset($language)) @if ($language->direction == 1) class="rtl-version" @endif  @endif >
<!-- Preloader -->
@if ($section_arr['preloader'] == 1)
    <div id="preloader-area">
        <div class="lds-ripple">
            <div></div>
            <div></div>
        </div>
    </div>
@endif
<!-- Preloader -->

<!-- ======================================
******* Main Page Wrapper **********
======================================= -->

<div class="main-container-wrapper">
    <!-- Top bar area -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
            @if (isset($general_site_image))

                @if (!empty($general_site_image->admin_logo_image))
                    <a class="navbar-brand brand-logo mr-5" href="{{ url('dashboard') }}">
                        <img src="{{ asset('uploads/img/general/'.$general_site_image->admin_logo_image) }}" class="mr-2" alt="logo" />
                    </a>
                @endif

                @if (!empty($general_site_image->admin_small_logo_image))
                    <a class="navbar-brand brand-logo-mini" href="{{ url('dashboard') }}">
                        <img src="{{ asset('uploads/img/general/'.$general_site_image->admin_small_logo_image) }}" alt="logo" />
                    </a>
                @endif

            @endif
            @if (isset($general_creative_site_image))

                @if (!empty($general_creative_site_image->admin_logo_image))
                    <a class="navbar-brand brand-logo mr-5" href="{{ url('dashboard') }}">
                        <img src="{{ asset('uploads/creative/img/general/'.$general_creative_site_image->admin_logo_image) }}" class="mr-2" alt="logo" />
                    </a>
                @endif

                @if (!empty($general_creative_site_image->admin_small_logo_image))
                    <a class="navbar-brand brand-logo-mini" href="{{ url('dashboard') }}">
                        <img src="{{ asset('uploads/creative/img/general/'.$general_creative_site_image->admin_small_logo_image) }}" alt="logo" />
                    </a>
                @endif

            @endif

        </div>
        <div class="navbar-menu-wrapper d-flex align-items-center justify-content-between">
            <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu">
                    <line x1="3" y1="12" x2="21" y2="12"></line>
                    <line x1="3" y1="6" x2="21" y2="6"></line>
                    <line x1="3" y1="18" x2="21" y2="18"></line>
                </svg>
            </button>
            <ul class="navbar-nav mr-lg-2">
                <li class="nav-item d-none d-md-block">
                    <span class="badge badge-primary">
                    {{ __('content.data_language') }}: {{ $data_language->language_name }} <i class="fas fa-hand-point-right ml-1"></i>

                    </span>
                </li>
                <li  class="nav-item dropdown dropdown-animate">
                    <a href="#" class="count-indicator"  data-toggle="modal" data-target="#processedLanguageModal">
                        <i class="fas fa-globe-europe"></i>
                    </a>
                </li>
            </ul>
            <ul class="top-navbar-area navbar-nav navbar-nav-right">
                <li  class="nav-item dropdown dropdown-animate">
                    <a href="{{ url('/') }}" class="badge badge-primary d-none d-md-block">
                        {{ __('content.site') }}
                    </a>
                </li>

                @if (count($display_dropdowns) > 0)
                    <li class="nav-item dropdown dropdown-animate">
                        <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
                            @if (session()->has('language_name_from_dropdown')) {{ session()->get('language_name_from_dropdown') }} @else {{ $language->language_name }} @endif<i class="arrow_carrot-down"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
                            <p class="mb-0 font-weight-normal float-left dropdown-header">{{ __('content.languages') }}</p>

                            @foreach ($display_dropdowns as $display_dropdown)
                                <a href="{{ url('language/set-locale/'.$display_dropdown->id) }}" class="dropdown-item preview-item d-flex align-items-center">{{ $display_dropdown->language_name }}</a>
                            @endforeach

                        </div>
                    </li>
                @endif

                <li class="nav-item dropdown dropdown-animate">
                    <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
                        <i class="far fa-bell"></i>
                        @if (count($general_unread_message_count) > 0 || count($general_unread_comment_count) > 0)
                            <span class="count"></span>
                        @endif
                    </a>
                    <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
                        <p class="mb-0 font-weight-normal float-left dropdown-header">{{ __('content.notifications') }}</p>

                        @can('contact check')
                        <a href="{{ url('admin/message') }}" class="dropdown-item preview-item d-flex align-items-center">
                            <div class="notification-thumbnail">
                                <div class="preview-icon bg-primary">
                                    <i class="ti-info-alt mx-0"></i>
                                </div>
                            </div>
                            <div class="notification-item-content">
                                <h6>{{ __('content.messages') }}</h6>
                                <p class="mb-0">
                                    {{ count($general_unread_message_count) }}
                                </p>
                            </div>
                        </a>
                        @endcan

                        @can('comments check')
                        <a href="{{ url('admin/comment') }}" class="dropdown-item preview-item d-flex align-items-center">
                            <div class="notification-thumbnail">
                                <div class="preview-icon bg-success">
                                    <i class="ti-info-alt mx-0"></i>
                                </div>
                            </div>
                            <div class="notification-item-content">
                                <h6>{{ __('content.comments') }}</h6>
                                <p class="mb-0">
                                    {{ count($general_unread_comment_count) }}
                                </p>
                            </div>
                        </a>
                            @endcan

                    </div>
                </li>

                <li class="nav-item nav-profile dropdown dropdown-animate">
                    <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
                        @if(Auth::user()->profile_photo_path != null)
                            <img src="{{ asset('uploads/img/profile/admin/'.Auth::user()->profile_photo_path) }}" class="img-profile rounded-circle" alt="profile image">
                        @else
                            <img src="{{ asset('uploads/img/dummy/128x128.jpg') }}" class="img-profile rounded-circle" alt="profile image">
                        @endif
                    </a>
                    <div class="dropdown-menu dropdown-menu-right navbar-dropdown profile-top" aria-labelledby="profileDropdown">
                        <a href="{{ url('admin/profile/edit') }}" class="dropdown-item"><i class="fas fa-user profile-icon" aria-hidden="true"></i> {{ __('content.profile') }}</a>
                        <a href="{{ url('admin/profile/change-password') }}" class="dropdown-item"><i class="fas fa-unlock-alt profile-icon" aria-hidden="true"></i> {{ __('content.change_password') }}</a>

                        <!-- Authentication -->
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            <i class="fas fa-link profile-icon" aria-hidden="true"></i>
                            {{ __('content.logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>

                    </div>
                </li>
            </ul>
            <button class="navbar-toggler navbar-toggler-right d-xl-none align-self-center" type="button" data-toggle="offcanvas">
                <span class="ti-layout-grid2"></span>
            </button>
        </div>
    </nav>

    <div class="container-fluid page-body-wrapper">
        <!-- Side Menu area -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
            <ul class="nav">
                <li class="nav-item {{ (request()->is('dashboard')) ? 'active' : '' }}">
                    <a class="nav-link" href="{{ url('dashboard') }}">
                        <i class="fas fa-th-large menu-icon"></i>
                        <span class="menu-title">{{ __('content.dashboard') }}</span>
                    </a>
                </li>
                @can('uploads check')
                    <li class="nav-item  {{ (request()->is('admin/photo/create') ||
                                             request()->is('admin/photo/*/edit')) ? 'active' : '' }}">
                        <a class="nav-link" href="{{ url('admin/photo/create') }}">
                            <i class="fas fa-cloud-upload-alt menu-icon"></i>
                            <span class="menu-title">{{ __('content.uploads') }}</span>
                        </a>
                    </li>
                @endcan
                @can('blogs check')
                    <li class="nav-item {{ (request()->is('admin/blog') ||
                                            request()->is('admin/blog/create') ||
                                            request()->is('admin/blog/*/edit') ||
                                            request()->is('admin/category/create') ||
                                            request()->is('admin/category/*/edit') ||
                                            request()->is('admin/blog-paginate/create')) ? 'active' : '' }}">
                        <a class="nav-link" data-toggle="collapse" href="#blogs" aria-expanded="false" aria-controls="blogs">
                            <i class="fab fa-blogger-b menu-icon"></i>
                            <span class="menu-title">{{ __('content.blogs') }}</span>
                            <i class="ti-angle-right"></i>
                        </a>
                        <div class="collapse {{ (request()->is('admin/blog') ||
                                                  request()->is('admin/blog/create') ||
                                                  request()->is('admin/blog/*/edit') ||
                                                  request()->is('admin/category/create') ||
                                                  request()->is('admin/category/*/edit') ||
                                                  request()->is('admin/blog-paginate/create')) ? 'show' : '' }}" id="blogs">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link {{ (request()->is('admin/category/create')) ? 'active' : '' }}" href="{{ url('admin/category/create') }}">{{ __('content.categories') }}</a></li>
                                <li class="nav-item"> <a class="nav-link {{ (request()->is('admin/blog/create')) ? 'active' : '' }}" href="{{ url('admin/blog/create') }}">{{ __('content.add_blog') }}</a></li>
                                <li class="nav-item"> <a class="nav-link {{ (request()->is('admin/blog')) ? 'active' : '' }}" href="{{ url('admin/blog') }}">{{ __('content.blogs') }}</a></li>
                                <li class="nav-item"> <a class="nav-link {{ (request()->is('admin/blog-paginate/create')) ? 'active' : '' }}" href="{{ url('admin/blog-paginate/create') }}">{{ __('content.blog_paginate') }}</a></li>
                            </ul>
                        </div>
                    </li>
                @endcan
                @can('banner check')
                    <li class="nav-item {{ (request()->is('admin/fixed-content/create')) ? 'active' : '' }}">
                        <a class="nav-link" data-toggle="collapse" href="#advanced" aria-expanded="false" aria-controls="advanced">
                            <i class="fas fa-home menu-icon"></i>
                            <span class="menu-title">{{ __('content.banner') }}</span>
                            <i class="ti-angle-right"></i>
                        </a>
                        <div class="collapse {{ (request()->is('admin/fixed-content/create')) ? 'show' : '' }}" id="advanced">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link {{ (request()->is('admin/fixed-content/create')) ? 'active' : '' }}" href="{{ url('admin/fixed-content/create') }}">{{ __('content.fixed_content') }}</a></li>
                            </ul>
                        </div>
                    </li>
                @endcan
                @can('external url check')
                    <li class="nav-item  {{ (request()->is('admin/external-url/create')) ? 'active' : '' }}">
                        <a class="nav-link" href="{{ url('admin/external-url/create') }}">
                            <i class="fas fa-external-link-square-alt menu-icon"></i>
                            <span class="menu-title">{{ __('content.external_url') }}</span>
                        </a>
                    </li>
                @endcan
                @can('about us check')
                    <li class="nav-item {{ (request()->is('admin/about/create') ||
                                         request()->is('admin/info-list/*/edit')) ? 'active' : '' }}">
                        <a class="nav-link" href="{{ url('admin/about/create') }}">
                            <i class="fas fa-building menu-icon"></i>
                            <span class="menu-title">{{ __('content.about') }}</span>
                        </a>
                    </li>
                @endcan
                @can('resume check')
                    <li class="nav-item  {{ (request()->is('admin/resume/create') ||
                                         request()->is('admin/resume/*/edit')) ? 'active' : '' }}">
                        <a class="nav-link" href="{{ url('admin/resume/create') }}">
                            <i class="fas fa-file-signature menu-icon"></i>
                            <span class="menu-title">{{ __('content.resume') }}</span>
                        </a>
                    </li>
                @endcan
                @can('skills check')
                    <li class="nav-item  {{ (request()->is('admin/skill/create') ||
                                         request()->is('admin/skill/*/edit')) ? 'active' : '' }}">
                        <a class="nav-link" href="{{ url('admin/skill/create') }}">
                            <i class="fas fa-tools menu-icon"></i>
                            <span class="menu-title">{{ __('content.skills') }}</span>
                        </a>
                    </li>
                @endcan
                @can('counters check')
                    <li class="nav-item  {{ (request()->is('admin/counter/create') ||
                                         request()->is('admin/counter/*/edit')) ? 'active' : '' }}">
                        <a class="nav-link" href="{{ url('admin/counter/create') }}">
                            <i class="fas fa-hourglass-start menu-icon"></i>
                            <span class="menu-title">{{ __('content.counters') }}</span>
                        </a>
                    </li>
                @endcan
                @can('services check')
                    <li class="nav-item  {{ (request()->is('admin/service-category/create') ||
                                         request()->is('admin/service-category/*/edit')) ? 'active' : '' }}">
                        <a class="nav-link" href="{{ url('admin/service-category/create') }}">
                            <i class="fas fa-people-carry menu-icon"></i>
                            <span class="menu-title">{{ __('content.services') }}</span>
                        </a>
                    </li>
                @endcan
                @can('portfolio check')
                    <li class="nav-item {{ (request()->is('admin/portfolio') ||
                                            request()->is('admin/portfolio/create') ||
                                            request()->is('admin/portfolio/*/edit') ||
                                            request()->is('admin/portfolio-category/create') ||
                                            request()->is('admin/portfolio-category/*/edit') ||
                                                  request()->is('admin/portfolio-slider/*/create') ||
                                                  request()->is('admin/portfolio-slider/*/*/edit') ||
                                                  request()->is('admin/portfolio-detail/*/create') ||
                                                  request()->is('admin/portfolio-detail/*/*/edit')) ? 'active' : '' }}">
                        <a class="nav-link" data-toggle="collapse" href="#portfolios" aria-expanded="false" aria-controls="portfolios">
                            <i class="fas fa-briefcase menu-icon"></i>
                            <span class="menu-title">{{ __('content.portfolios') }}</span>
                            <i class="ti-angle-right"></i>
                        </a>
                        <div class="collapse {{ (request()->is('admin/portfolio') ||
                                                  request()->is('admin/portfolio/create') ||
                                                  request()->is('admin/portfolio/*/edit') ||
                                                  request()->is('admin/portfolio-category/create') ||
                                                  request()->is('admin/portfolio-category/*/edit') ||
                                                  request()->is('admin/portfolio-slider/*/create') ||
                                                  request()->is('admin/portfolio-slider/*/*/edit') ||
                                                  request()->is('admin/portfolio-detail/*/create') ||
                                                  request()->is('admin/portfolio-detail/*/*/edit')) ? 'show' : '' }}" id="portfolios">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link {{ (request()->is('admin/portfolio-category/create')) ? 'active' : '' }}" href="{{ url('admin/portfolio-category/create') }}">{{ __('content.categories') }}</a></li>
                                <li class="nav-item"> <a class="nav-link {{ (request()->is('admin/portfolio/create')) ? 'active' : '' }}" href="{{ url('admin/portfolio/create') }}">{{ __('content.add_portfolio') }}</a></li>
                                <li class="nav-item"> <a class="nav-link {{ (request()->is('admin/portfolio')) ? 'active' : '' }}" href="{{ url('admin/portfolio') }}">{{ __('content.portfolios') }}</a></li>
                            </ul>
                        </div>
                    </li>
                @endcan
                @can('testimonials check')
                    <li class="nav-item  {{ (request()->is('admin/testimonial/create') ||
                                         request()->is('admin/testimonial/*/edit')) ? 'active' : '' }}">
                        <a class="nav-link" href="{{ url('admin/testimonial/create') }}">
                            <i class="fas fa-quote-right menu-icon"></i>
                            <span class="menu-title">{{ __('content.testimonials') }}</span>
                        </a>
                    </li>
                @endcan
                @can('teams check')
                <li class="nav-item  {{ (request()->is('admin/team/create') ||
                                         request()->is('admin/team/*/edit')) ? 'active' : '' }}">
                    <a class="nav-link" href="{{ url('admin/team/create') }}">
                        <i class="fas fa-people-carry menu-icon"></i>
                        <span class="menu-title">{{ __('content.teams') }}</span>
                    </a>
                </li>
                @endcan
                @can('call to action check')
                    <li class="nav-item  {{ (request()->is('admin/call-to-action/create')) ? 'active' : '' }}">
                        <a class="nav-link" href="{{ url('admin/call-to-action/create') }}">
                            <i class="fas fa-bullhorn menu-icon"></i>
                            <span class="menu-title">{{ __('content.call_to_action') }}</span>
                        </a>
                    </li>
                @endcan
                @can('pages check')
                    <li class="nav-item {{ (request()->is('admin/page') ||
                                            request()->is('admin/page/create') ||
                                            request()->is('admin/page/*/edit')) ? 'active' : '' }}">
                        <a class="nav-link" href="{{ url('admin/page') }}">
                            <i class="fas fa-file-alt menu-icon"></i>
                            <span class="menu-title">{{ __('content.pages') }}</span>
                        </a>
                    </li>
                @endcan
                @can('contact check')
                    <li class="nav-item {{ (request()->is('admin/contact/create') ||
                                            request()->is('admin/contact/*/edit') ||
                                            request()->is('admin/message') ||
                                            request()->is('admin/social/create') ||
                                            request()->is('admin/social/*/edit')) ? 'active' : '' }}">
                        <a class="nav-link" data-toggle="collapse" href="#contact" aria-expanded="false" aria-controls="contact">
                            <i class="fas fa-map-marked menu-icon"></i>
                            <span class="menu-title">{{ __('content.contact') }}</span>
                            <i class="ti-angle-right"></i>
                        </a>
                        <div class="collapse {{ (request()->is('admin/contact/create') ||
                                                 request()->is('admin/contact/*/edit') ||
                                                 request()->is('admin/message') ||
                                                 request()->is('admin/social/create') ||
                                                 request()->is('admin/social/*/edit')) ? 'show' : '' }}" id="contact">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link {{ (request()->is('admin/contact/create') ||
                                                                             request()->is('admin/contact/*/edit')) ? 'active' : '' }}" href="{{ url('admin/contact/create') }}">{{ __('content.contact_info') }}</a></li>
                                <li class="nav-item"> <a class="nav-link {{ (request()->is('admin/social/create') ||
                                                                             request()->is('admin/social/*/edit')) ? 'active' : '' }}" href="{{ url('admin/social/create') }}">{{ __('content.socials') }}</a></li>
                                <li class="nav-item"> <a class="nav-link {{ (request()->is('admin/message')) ? 'active' : '' }}" href="{{ url('admin/message') }}">{{ __('content.messages') }}</a></li>
                            </ul>
                        </div>
                    </li>
                @endcan
                @can('settings check')
                    <li class="nav-item {{ (request()->is('admin/site-info/create') ||
                                            request()->is('admin/site-image/create') ||
                                            request()->is('admin/breadcrumb/create') ||
                                            request()->is('admin/section/create') ||
                                            request()->is('admin/color-option/create') ||
                                            request()->is('admin/google-analytic/create') ||
                                            request()->is('admin/tawk-to/create') ||
                                            request()->is('admin/seo/create')) ? 'active' : '' }}">
                        <a class="nav-link" data-toggle="collapse" href="#settings" aria-expanded="false" aria-controls="settings">
                            <i class="fas fa-fw fa-cog menu-icon"></i>
                            <span class="menu-title">{{ __('content.settings') }}</span>
                            <i class="ti-angle-right"></i>
                        </a>
                        <div class="collapse {{ (request()->is('admin/site-info/create') ||
                                                 request()->is('admin/site-image/create') ||
                                                 request()->is('admin/breadcrumb/create') ||
                                                 request()->is('admin/section/create') ||
                                                 request()->is('admin/color-option/create') ||
                                                 request()->is('admin/google-analytic/create') ||
                                            request()->is('admin/tawk-to/create') ||
                                                 request()->is('admin/seo/create')) ? 'show' : '' }}" id="settings">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link {{ (request()->is('admin/site-info/create')) ? 'active' : '' }}" href="{{ url('admin/site-info/create') }}">{{ __('content.site_info') }}</a></li>
                                <li class="nav-item"> <a class="nav-link {{ (request()->is('admin/site-image/create')) ? 'active' : '' }}" href="{{ url('admin/site-image/create') }}">{{ __('content.site_images') }}</a></li>
                                <li class="nav-item"> <a class="nav-link {{ (request()->is('admin/google-analytic/create')) ? 'active' : '' }}" href="{{ url('admin/google-analytic/create') }}">{{ __('content.google_analytic') }}</a></li>
                                <li class="nav-item"> <a class="nav-link {{ (request()->is('admin/breadcrumb/create')) ? 'active' : '' }}" href="{{ url('admin/breadcrumb/create') }}">{{ __('content.breadcrumb') }}</a></li>
                                <li class="nav-item"> <a class="nav-link {{ (request()->is('admin/section/create')) ? 'active' : '' }}" href="{{ url('admin/section/create') }}">{{ __('content.sections') }}</a></li>
                                <li class="nav-item"> <a class="nav-link {{ (request()->is('admin/color-option/create')) ? 'active' : '' }}" href="{{ url('admin/color-option/create') }}">{{ __('content.color_option') }}</a></li>
                                <li class="nav-item"> <a class="nav-link {{ (request()->is('admin/seo/create')) ? 'active' : '' }}" href="{{ url('admin/seo/create') }}">{{ __('content.seo') }}</a></li>
                                <li class="nav-item"> <a class="nav-link {{ (request()->is('admin/tawk-to/create')) ? 'active' : '' }}" href="{{ url('admin/tawk-to/create') }}">{{ __('content.tawk_to') }}</a></li>
                            </ul>
                        </div>
                    </li>
                @endcan
                @hasrole ('super-admin')
                <li class="nav-item {{ (request()->is('admin/admin-role') ||
                                        request()->is('admin/admin-role/create') ||
                                        request()->is('admin/admin-role/*/edit')) ? 'active' : '' }}">
                    <a class="nav-link" data-toggle="collapse" href="#admin_roles" aria-expanded="false" aria-controls="admin_roles">
                        <i class="fas fa-user-lock menu-icon"></i>
                        <span class="menu-title">{{ __('content.admin_role_manage') }}</span>
                        <i class="ti-angle-right"></i>
                    </a>
                    <div class="collapse {{ (request()->is('admin/admin-role') ||
                                        request()->is('admin/admin-role/create') ||
                                        request()->is('admin/admin-role/*/edit')) ? 'show' : '' }}" id="admin_roles">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item"> <a class="nav-link {{ (request()->is('admin/admin-role/create')) ? 'active' : '' }}" href="{{ url('admin/admin-role/create') }}">{{ __('content.add_admin_role') }}</a></li>
                            <li class="nav-item"> <a class="nav-link {{ (request()->is('admin/admin-role')) ? 'active' : '' }}" href="{{ url('admin/admin-role') }}">{{ __('content.admin_roles') }}</a></li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item {{ (request()->is('admin/admin-user') ||
                                        request()->is('admin/admin-user/create') ||
                                        request()->is('admin/admin-user/*/edit')) ? 'active' : '' }}">
                    <a class="nav-link" data-toggle="collapse" href="#admins" aria-expanded="false" aria-controls="admins">
                        <i class="fas fa-users menu-icon"></i>
                        <span class="menu-title">{{ __('content.admin_manage') }}</span>
                        <i class="ti-angle-right"></i>
                    </a>
                    <div class="collapse {{ (request()->is('admin/admin-user') ||
                                        request()->is('admin/admin-user/create') ||
                                        request()->is('admin/admin-user/*/edit')) ? 'show' : '' }}" id="admins">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item"> <a class="nav-link {{ (request()->is('admin/admin-user/create')) ? 'active' : '' }}" href="{{ url('admin/admin-user/create') }}">{{ __('content.add_admin_user') }}</a></li>
                            <li class="nav-item"> <a class="nav-link {{ (request()->is('admin/admin-user')) ? 'active' : '' }}" href="{{ url('admin/admin-user') }}">{{ __('content.all_admin') }}</a></li>
                        </ul>
                    </div>
                </li>
                @endhasrole
                @can('language check')
                    <li class="nav-item  {{ (request()->is('admin/language/create') ||
                                            request()->is('admin/language/*/edit') ||
                                            request()->is('admin/language-keyword-for-adminpanel/create/*') ||
                                            request()->is('admin/language/*/edit') ||
                                            request()->is('admin/language/*/edit')) ? 'active' : '' }}">
                        <a class="nav-link" href="{{ url('admin/language/create') }}">
                            <i class="fas fa-language menu-icon"></i>
                            <span class="menu-title">{{ __('content.languages') }}</span>
                        </a>
                    </li>
                @endcan
                @can('clear cache check')
                    <li class="nav-item {{ (request()->is('admin/clear-cache')) ? 'active' : '' }}">
                        <a class="nav-link" href="{{ url('admin/clear-cache') }}">
                            <i class="fab fa-cloudscale menu-icon"></i>
                            <span class="menu-title">{{ __('content.optimizer') }}</span>
                        </a>
                    </li>
                @endcan

            </ul>
        </nav>

        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="container-fluid">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="processedLanguageModal" tabindex="-1" role="dialog" aria-labelledby="processedLanguageModalLabel" aria-modal="false">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0 font-16" id="processedLanguageModalLabel">{{ __('content.which_language') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('language.update_processed_language') }}" method="POST">
                        @method('PATCH')
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="language_id">{{ __('content.languages') }}</label>
                                    <select class="form-control" name="language_id" id="language_id" required>
                                        @foreach ($languages as $lang)
                                            <option value="{{ $lang->id }}" {{ $lang->status == 1 ? 'selected' : '' }}>{{ $lang->language_name }}</option>
                                        @endforeach
                                        @php unset($lang); @endphp
                                    </select>
                                    <small id="language_id" class="form-text text-muted">{{ __('content.reminding') }}</small>
                                </div>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('content.submit') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

</div>


<!-- Plugins Js -->
<script src="{{ asset('assets/admin/side_menu/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/admin/side_menu/js/popper.min.js') }}"></script>
<script src="{{ asset('assets/admin/side_menu/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/admin/side_menu/js/bundle.js') }}"></script>
<script src="{{ asset('assets/admin/side_menu/js/default-assets/fullscreen.js') }}"></script>

<!-- Active JS -->
<script src="{{ asset('assets/admin/side_menu/js/canvas.js') }}" defer></script>
<script src="{{ asset('assets/admin/side_menu/js/collapse.js') }}" defer></script>
<script src="{{ asset('assets/admin/side_menu/js/settings.js') }}" defer></script>
<script src="{{ asset('assets/admin/side_menu/js/template.js') }}" defer></script>
<script src="{{ asset('assets/admin/side_menu/js/default-assets/active.js') }}" defer></script>

@isset ($galleries)
    <!-- Light box JS -->
    <script src="{{ asset('assets/admin/side_menu/js/default-assets/ekko-lightbox.min.js') }}" defer></script>
    <script src="{{ asset('assets/admin/side_menu/js/default-assets/lightbox.min.js') }}" defer></script>
    <script src="{{ asset('assets/admin/side_menu/js/default-assets/light-box-active.js') }}" defer></script>
@endif

<!-- Datatable JS -->
<script src="{{ asset('assets/admin/side_menu/js/default-assets/jquery.datatables.min.js') }}" defer></script>
<script src="{{ asset('assets/admin/side_menu/js/default-assets/datatables.bootstrap4.js') }}" defer></script>
<script src="{{ asset('assets/admin/side_menu/js/default-assets/datatable-responsive.min.js') }}" defer></script>
<script src="{{ asset('assets/admin/side_menu/js/default-assets/responsive.bootstrap4.min.js') }}" defer></script>
<script src="{{ asset('assets/admin/side_menu/js/default-assets/demo.datatable-init.js') }}" defer></script>

<!-- Tags Input JS -->
<script src="{{ asset('assets/admin/side_menu/js/default-assets/jquey.tagsinput.min.js') }}"></script>

<!-- Datepicker JS -->
<script src="{{ asset('assets/admin/side_menu/js/bootstrap-colorpicker.min.js') }}"></script>
<script src="{{ asset('assets/admin/side_menu/js/default-assets/colorpicker-bootstrap.js') }}"></script>
<script src="{{ asset('assets/admin/side_menu/js/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ asset('assets/admin/side_menu/js/default-assets/form-picker.js') }}"></script>



<!-- Summer note scripts -->
<script src="{{ asset('assets/admin/side_menu/js/summernote-bs4.min.js') }}"></script>
<script>
    $('#summernote').summernote({
        placeholder: '{{ __('content.description') }}',
        tabsize: 2,
        height: 100
    });

    // Summernote code view saving
    $('.note-codable').on('blur', function() {
        var codeviewHtml        = $(this).val();
        var $summernoteTextarea = $(this).closest('.note-editor').siblings('textarea');

        $summernoteTextarea.val(codeviewHtml);
    });

    // For type selection. enum('type', ['icon', 'image'])
    function showHideTypeDiv() {
        var optionsRadios1 = document.getElementById("optionsRadios1");
        var optionsRadios2 = document.getElementById("optionsRadios2");
        var iconType = document.getElementById("icon-type");
        var imageType = document.getElementById("image-type");
        iconType.style.display = optionsRadios1.checked ? "block" : "none";
        imageType.style.display = optionsRadios2.checked ? "block" : "none";
    }

    function copyImageLink(id) {
        var copyText = document.getElementById("copyImageLink"+id);
        copyText.select();
        copyText.setSelectionRange(0, 99999);
        document.execCommand("copy");
        alert("{{ __('content.copied_text') }}" + ":" + copyText.value);
    }

    function copyLink(id) {
        var copyText = document.getElementById("copyLink"+id);
        copyText.select();
        copyText.setSelectionRange(0, 99999);
        document.execCommand("copy");
        alert("{{ __('content.copied_text') }}" + ":" + copyText.value);
    }

    // Delete checked list.
    function showHideDeleteButton(source) {
        var check_all = document.getElementById("check_all");
        deleteChecked.style.display = check_all.checked ? "inline" : "none";

        checkboxes = document.getElementsByName('check_list[]');
        for (var i = 0, n = checkboxes.length; i < n; i++) {
            checkboxes[i].checked = source.checked;
        }
    }

    function showHideDeleteButton2(source) {
        deleteChecked.style.display = source.checked ? "inline": "inline";
    }

    // Get checkbox list
    function btnCheckListGet() {
        //Create an Array.
        var selected = new Array();

        //Reference the CheckBoxes and insert the checked CheckBox value in Array.
        $("#basic-datatable input[type=checkbox]:checked").each(function () {
            selected.push(this.value);
        });

        //Display the selected CheckBox values.
        if (selected.length > 0) {
            selected.join(",");
        }

        return document.getElementById("checked_lists").value = selected;
    }

    // Tags Input Separate
    $(function() {
        'use strict';

        $('#tag').tagsInput({
            'width': '100%',
            'height': '85%',
            'interactive': true,
            'defaultText': 'Add More',
            'removeWithBackspace': true,
            'minChars': 0,
            'maxChars': 20,
            'placeholderColor': '#555'
        });

    });

</script>

<!-- Custom JS -->
<script src="{{ asset('assets/admin/side_menu/js/custom.js') }}"></script>

<!-- Icon Picker JS -->
<script src="{{ asset('assets/admin/side_menu/vendor/fontawesome-free/js/fontawesome-iconpicker.min.js') }}"> </script>

</body>

</html>