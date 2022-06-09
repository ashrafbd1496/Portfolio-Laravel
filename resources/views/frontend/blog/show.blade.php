@extends('layouts.frontend.master')

@section('content')

    <!--// Breadcrumb Section Start //-->
    <section class="breadcrumb-section section" data-scroll-index="1" @if ($blog->breadcrumb_status == "yes" && !empty($blog->custom_breadcrumb_image))
             data-bg-image-path = "{{ asset('uploads/img/blog/breadcrumb/'.$blog->custom_breadcrumb_image) }}"
             @elseif (isset($breadcrumb)) data-bg-image-path = "{{ asset('uploads/img/general/'.$breadcrumb->breadcrumb_image) }}"
             @else data-bg-image-path="{{ asset('uploads/img/dummy/1920x420.jpg') }}"
            @endif>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="breadcrumb-inner text-center">
                        <h1>{{ $blog->title }}</h1>
                        <ul class="breadcrumb-links">
                            <li>
                                <a href="{{ url('/') }}">{{ __('frontend.home') }}</a>
                            </li>
                            <li class="active">
                                {{ $blog->title }}
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
@include('frontend.alert.alert-general')
            <div class="row">
                <div class="col-lg-8">
                    <div class="blog-single-inner">
                        @if ($blog->image_status == "show" && !empty($blog->blog_image))
                            <img src="{{ asset('uploads/img/blog/'.$blog->blog_image) }}" alt="Image" class="img-fluid">
                        @endif
                        <h4>{{ $blog->title }}</h4>
                        <div class="blog-meta">
                            <span><i class="far fa-user"></i> @if ($blog->type == "with_this_account") {{ $blog->author_name }} @else {{ __('frontend.anonymous') }} @endif</span>
                            <span><i class="far fa-calendar-alt"></i>{{ Carbon\Carbon::parse($blog->created_at)->isoFormat('DD') }} {{ Carbon\Carbon::parse($blog->created_at)->isoFormat('MMMM') }} {{ Carbon\Carbon::parse($blog->created_at)->isoFormat('GGGG') }}</span>
                        </div>
                        <p>@php echo html_entity_decode($blog->desc); @endphp</p>
                    </div>
                    <div class="post-buttons">
                        <div class="row">
                            <div class="col-md-6">
                                @isset ($previous)
                                    <div class="post-btn-prev">
                                        @if (!empty($previous->blog_image))
                                            <img src="{{ asset('uploads/img/blog/thumbnail/'.$previous->blog_image) }}" alt="Blog image" class="img-fluid image-size-100">
                                        @else
                                            <img src="{{ asset('uploads/img/dummy/no-image.jpg') }}" alt="Blog image" class="img-fluid image-size-100">
                                        @endif
                                        <div class="text">
                                            <h6><a href="{{ route('blog-page.show', ['slug' => $previous->slug]) }}">{{ $previous->title }}</a></h6>
                                            <a href="{{ route('blog-page.show', ['slug' => $previous->slug]) }}" class="prev-post"><i class="fa fa-arrow-left"></i> {{ __('frontend.prev_post') }}</a>
                                        </div>
                                    </div>
                                @endisset
                            </div>
                            <div class="col-md-6">
                                @isset ($next)
                                    <div class="post-btn-next">
                                        @if (!empty($next->blog_image))
                                            <img src="{{ asset('uploads/img/blog/thumbnail/'.$next->blog_image) }}" alt="Blog image" class="img-fluid image-size-100">
                                        @else
                                            <img src="{{ asset('uploads/img/dummy/no-image.jpg') }}" alt="Blog image" class="img-fluid image-size-100">
                                        @endif
                                        <div class="text">
                                            <h6><a href="{{ route('blog-page.show', ['slug' => $next->slug]) }}">{{ $next->title }}</a></h6>
                                            <a href="{{ route('blog-page.show', ['slug' => $next->slug]) }}" class="next-post">{{ __('frontend.next_post') }} <i class="fa fa-arrow-right"></i> </a>
                                        </div>
                                    </div>
                                @endisset
                            </div>
                        </div>
                    </div>
                    <div class="comment-block">
                        @if (count($comments) > 0)
                            <h5 class="inner-header-title">{{ __('frontend.comments') }}<span>({{ count($comments) }})</span></h5>
                        @endif
                        <div class="comments-wrap">
                            <div class="comments-item-wrap">
                               @foreach ($comments as $comment)
                                    <div class="comments-item">
                                        <i class="fas fa-user font-100 mr-4"></i>
                                        <div class="media-body">
                                            <div class="comment-header">
                                                <h6>{{ $comment->name }}</h6>
                                                <a href="#" class="comments-reply-btn" data-scroll-nav="2"><i class="fa fa-reply"></i> {{ __('frontend.reply') }} </a>
                                            </div>
                                            <p>{{ $comment->comment }}</p>
                                        </div>
                                    </div>
                                   @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="leave-comment-wrapper comment-block-mt" data-scroll-index="2" id="leave-comment">
                        <h5 class="inner-header-title">{{ __('frontend.leave_a_comment') }}</h5>
                        <form id="contact-form" action="{{ route('comment.store') }}" method="POST">
                            @csrf
                            <input name="blog_id" type="hidden" value="{{ Crypt::encrypt($blog->id) }}">
                            <input name="page" type="hidden" value="{{ Crypt::encrypt(98) }}">
                            <div class="custom-form-group">
                                <input type="text" class="custom-form-control" autocomplete="off" name="name" required placeholder="{{ __('frontend.your_name') }}">
                                <span class="far fa-user"></span>
                            </div>
                            <div class="custom-form-group">
                                <input type="email" class="custom-form-control" autocomplete="off" name="email" required placeholder="{{ __('frontend.your_email') }}">
                                <span class="far fa-envelope"></span>
                            </div>
                            <div class="custom-form-group">
                                <textarea class="custom-form-control" name="comment" autocomplete="off" id="commentMessage" cols="30" rows="10" required placeholder="{{ __('frontend.your_comment') }}"></textarea>
                                <span class="far fa-envelope-open"></span>
                            </div>
                            <div class="custom-form-group">
                                <input type="text" class="captcha-input custom-form-control" name="contact_question" placeholder="{{ __('frontend.please_enter_code') }}" required>
                                <span id="contactFormCaptchaSpan"></span>
                                <input type="hidden" name="null_value" value="">
                                <input type="hidden" name="captcha" id="contactFormCaptchaVal">
                                <div class="form-validate-icons">
                                    <span></span>
                                </div>
                            </div>

                            <div class="custom-form-btn">
                                <button type="submit" class="default-primary-btn">{{ __('frontend.send_comment') }}</button>
                            </div>
                        </form>
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
                        @if (!empty($blog->tag))
                            <div class="blog-widgets tag-widgets">
                                <h5 class="inner-header-title">{{ __('frontend.tags') }}</h5>
                                @php
                                    $str = $blog->tag;
                                    $array_tags = explode(",",$str);
                                @endphp
                                <ul class="blog-tags clearfix">
                                    @foreach ($array_tags as $tag)
                                        <li>
                                            <a href="#">{{ $tag }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="blog-widgets">
                            <h5 class="inner-header-title">{{ __('frontend.share') }}</h5>
                            <ul class="blog-share clearfix">
                                <li>
                                    <a href="{{$blog->getShareUrl('twitter')}}" target="_blank">
                                        <i class="fab fa-twitter"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{$blog->getShareUrl('whatsapp')}}" target="_blank">
                                        <i class="fab fa-whatsapp"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{$blog->getShareUrl('pinterest')}}" target="_blank">
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
