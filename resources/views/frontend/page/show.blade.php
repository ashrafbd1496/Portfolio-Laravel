@extends('layouts.frontend.master')

@section('content')

    <!--// Breadcrumb Section Start //-->
    <section class="breadcrumb-section section" data-scroll-index="1" @if (isset($breadcrumb)) data-bg-image-path = "{{ asset('uploads/img/general/'.$breadcrumb->breadcrumb_image) }}"
             @else data-bg-image-path="{{ asset('uploads/img/dummy/1920x420.jpg') }}"
            @endif>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="breadcrumb-inner text-center">
                        <h1>{{ $page->page_title }}</h1>
                        <ul class="breadcrumb-links">
                            <li>
                                <a href="{{ url('/') }}">{{ __('frontend.home') }}</a>
                            </li>
                            <li class="active">
                                {{ $page->page_title }}
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--// Breadcrumb Section end //-->

    <!--// Blog Single Start //-->
    <section class="section" id="blog-single">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="blog-single-inner">
                        <p>@php echo html_entity_decode($page->desc); @endphp</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="blog-sidebar">
                        <div class="blog-widgets">
                            <h5 class="inner-header-title">{{ __('frontend.search') }}</h5>
                            <form class="search-form" action="{{ route('blog-page.search') }}" method="POST">
                                @csrf
                                <div class="blog-search-bar position-relative">
                                    <input type="text" name="search" required="" placeholder="{{ __('frontend.search_here') }}" class="search-form-control">
                                    <button type="submit" class="blog-search-btn"><span class="fa fa-search"></span></button>
                                    <i class="fa fa-search"></i>
                                </div>
                            </form>
                        </div>
                        <div class="blog-widgets">
                            <h5 class="inner-header-title">{{ __('frontend.categories') }}</h5>
                            <ul class="blog-category-list clearfix">
                                @foreach ($blog_count_categories as $blog_count_category)
                                    <li>
                                        @if (isset($blog_count_category->category->category_slug))
                                            <a href="{{ route('blog-category.show', ['category_name' => $blog_count_category->category->category_slug]) }}">{{$blog_count_category->category->category_name }}<span class="category-count">({{ $blog_count_category->category_count }})</span></a>
                                        @endif
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        @if (count($recent_posts) > 0)
                            <div class="blog-widgets">
                                <h5 class="inner-header-title">{{ __('frontend.recent_posts') }}</h5>
                                @foreach ($recent_posts as $recent_post)
                                    <div class="recent-post-item clearfix">
                                        <div class="recent-post-img mr-3">
                                            <a href="{{ route('blog-page.show', ['slug' => $recent_post->slug]) }}">
                                                @if (!empty($recent_post->blog_image))
                                                    <img src="{{ asset('uploads/img/blog/thumbnail/'.$recent_post->blog_image) }}" class="img-fluid image-size-100" alt="blog image">
                                                @else
                                                    <img src="{{ asset('uploads/img/dummy/no-image.jpg') }}" class="img-fluid image-size-100"  alt="blog image">
                                                @endif
                                            </a>
                                        </div>
                                        <div class="recent-post-body">
                                            <a href="{{ route('blog-page.show', ['slug' => $recent_post->slug]) }}">
                                                <h6 class="recent-post-title">{{ $recent_post->title }}</h6>
                                            </a>
                                            <p class="recent-post-date"><i class="far fa-calendar-alt"></i>{{ Carbon\Carbon::parse($recent_post->created_at)->isoFormat('DD') }} {{ Carbon\Carbon::parse($recent_post->created_at)->isoFormat('MMMM') }} {{ Carbon\Carbon::parse($recent_post->created_at)->isoFormat('GGGG') }}</p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                        <div class="blog-widgets">
                            <h5 class="inner-header-title">{{ __('frontend.share') }}</h5>
                            <ul class="blog-share clearfix">
                                <li>
                                    <a href="{{$page->getShareUrl('twitter')}}" target="_blank">
                                        <i class="fab fa-twitter"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{$page->getShareUrl('whatsapp')}}" target="_blank">
                                        <i class="fab fa-whatsapp"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{$page->getShareUrl('pinterest')}}" target="_blank">
                                        <i class="fab fa-pinterest"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--// Blog Single End //-->



@endsection
