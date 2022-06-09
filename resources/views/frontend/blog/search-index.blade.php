@extends('layouts.frontend.master')

@section('content')

    <!--// Breadcrumb Section Start //-->
    <section class="breadcrumb-section section" data-scroll-index="1"
             @if (isset($breadcrumb)) data-bg-image-path = "{{ asset('uploads/img/general/'.$breadcrumb->breadcrumb_image) }}"
             @else data-bg-image-path="{{ asset('uploads/img/dummy/1920x420.jpg') }}"
            @endif>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="breadcrumb-inner">
                        <h1>{{ __('frontend.search_results') }}</h1>
                        <ul class="breadcrumb-links">
                            <li>
                                <a href="{{ url('/') }}">{{ __('frontend.home') }}</a>
                            </li>
                            <li class="active">
                                {{ __('frontend.search_results') }}
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--// Breadcrumb Section end //-->

    <!-- Blog Grid Section Start -->
    @if (count($blogs) > 0)
        <section class="section" id="blog-grid">
            <div class="container">
                <div class="row">
                    @foreach ($blogs as $blog)
                        <div class="col-lg-4 col-md-6">
                            <div class="blog-item">
                                @if (!empty($blog->blog_image))
                                    <div class="blog-img">
                                        <a href="{{ route('blog-page.show', ['slug' => $blog->slug]) }}">
                                            <img src="{{ asset('uploads/img/blog/'.$blog->blog_image) }}" alt="Blog image" class="img-fluid">
                                        </a>
                                    </div>
                                @else
                                    <div class="blog-img">
                                        <a href="{{ route('blog-page.show', ['slug' => $blog->slug]) }}">
                                            <img src="{{ asset('uploads/img/dummy/no-image.jpg') }}" alt="Blog image" class="img-fluid">
                                        </a>
                                    </div>
                                @endif
                                <div class="blog-body">
                                    <div class="blog-meta">
                                        <span><i class="far fa-user"></i>@if ($blog->type == "with_this_account") {{ $blog->author_name }} @else {{ __('frontend.anonymous') }} @endif</span>
                                        <span><i class="far fa-bookmark"></i>{{ $blog->category_name }}</span>
                                    </div>
                                    <div class="blog-text">
                                        <h5>
                                            <a href="{{ route('blog-page.show', ['slug' => $blog->slug]) }}">{{ $blog->title }}</a>
                                        </h5>
                                        @if (!empty($blog->short_desc)) <p>{{ $blog->short_desc }}</p> @endif
                                        <a href="{{ route('blog-page.show', ['slug' => $blog->slug]) }}" class="blog-more-btn">
                                            {{ __('frontend.read_more') }}
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @else
        <section class="section padding-minus-90" id="blog-sidebar-page">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="blog-sidebar">
                            <div class="blog-widgets">
                                <h5 class="inner-header-title">{{ __('frontend.nothing_found') }}</h5>
                                <form class="search-form" action="{{ route('blog-page.search') }}" method="POST">
                                    @csrf
                                    <div class="blog-search-bar position-relative">
                                        <input type="text" name="search" placeholder="{{ __('frontend.search_here') }}" class="search-form-control" required>
                                        <button type="submit" class="blog-search-btn"><span class="fa fa-search"></span></button>
                                        <i class="fa fa-search"></i>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>
    @endif
    <!-- Blog Grid Section End -->

@endsection
