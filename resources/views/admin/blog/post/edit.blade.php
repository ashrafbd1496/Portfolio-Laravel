@extends('layouts.admin.master')

@section('content')

    <!-- Include Alert Blade -->
    @include('admin.alert.alert')

    <!-- Form row -->
    <div class="row">
        <div class="col-xl-12 box-margin height-card">
            <div class="card card-body">
                <div class="d-md-flex justify-content-between align-items-center mb-20">
                    <h4 class="card-title">{{ __('content.edit_blog') }}</h4>
                    <div>
                        <a href="{{ url()->previous() }}"  class="btn btn-primary"><i class="fas fa-angle-left"></i> {{ __('content.back') }}</a>
                    </div>
                </div>
            @if ($demo_mode == "on")
                <!-- Include Alert Blade -->
                    @include('admin.demo_mode.demo-mode')
                @else
                    <form action="{{ route('blog.update', $blog->id) }}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        @endif

                    <div class="row">
                        <div class="col-md-8">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="title">{{ __('content.title') }} <span class="text-red">*</span></label>
                                        <input id="title" name="title" type="text" class="form-control" value="{{ $blog->title }}" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="summernote">{{ __('content.description') }}</label>
                                        <textarea id="summernote" name="desc" class="form-control">@php echo html_entity_decode($blog->desc); @endphp</textarea>
                                    </div>
                                </div>
                                <div class="col-md-12 height-card box-margin">
                                    <div id="accordion-">
                                        <div class="card mb-2">
                                            <div class="card-header bg-secondary">
                                                <a class="collapsed text-white" data-toggle="collapse" href="#accordion-1" aria-expanded="false">
                                                    {{ __('content.seo_optimization') }}
                                                </a>
                                            </div>

                                            <div id="accordion-1" class="collapse" data-parent="#accordion-" style="">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="meta_desc">{{ __('content.meta_desc') }} </label>
                                                                <input id="title" name="meta_desc" type="text" class="form-control" value="{{ $blog->meta_desc }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="meta_keyword">{{ __('content.meta_keyword') }} ({{ __('content.separate_with_commas') }})</label>
                                                                <textarea id="meta_keyword" name="meta_keyword" class="form-control">{{ $blog->meta_keyword }}</textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card">
                                            <div class="card-header bg-secondary">
                                                <a class="text-white" data-toggle="collapse" href="#accordion-2" aria-expanded="true">
                                                    {{ __('content.breadcrumb_customization') }}
                                                </a>
                                            </div>
                                            <div id="accordion-2" class="collapse" data-parent="#accordion-" style="">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="breadcrumb_status" class="col-form-label">{{ __('content.use_special_breadcrumb') }}</label>
                                                                <select name="breadcrumb_status" class="form-control" id="breadcrumb_status">
                                                                    <option value="no" selected>{{ __('content.select_your_option') }}</option>
                                                                    <option value="yes" {{ $blog->breadcrumb_status == "yes" ? 'selected' : '' }}>{{ __('content.yes') }}</option>
                                                                    <option value="no" {{ $blog->breadcrumb_status == "no" ? 'selected' : '' }}>{{ __('content.no') }}</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="custom_breadcrumb_image">{{ __('content.custom_breadcrumb_image') }} ({{ __('content.size') }} 1920 x 420) (.svg, .jpg, .jpeg, .png)</label>
                                                                <input type="file" name="custom_breadcrumb_image" class="form-control-file" id="custom_breadcrumb_image">
                                                                <small id="custom_breadcrumb_image" class="form-text text-muted">{{ __('content.please_use_recommended_sizes') }}</small>
                                                            </div>
                                                            <div class="height-card box-margin">
                                                                <div class="card">
                                                                    <div class="card-body">
                                                                        <div class="avatar-area text-center">
                                                                            <div class="media">
                                                                                @if (!empty($blog->custom_breadcrumb_image))
                                                                                    <a  class="d-block mx-auto" href="#" data-toggle="tooltip" data-placement="top" data-original-title="{{ __('content.current_image') }}">
                                                                                        <img src="{{ asset('uploads/img/blog/breadcrumb/'.$blog->custom_breadcrumb_image) }}" alt="service image" class="rounded">
                                                                                    </a>
                                                                                @else
                                                                                    <a class="d-block mx-auto" href="#" data-toggle="tooltip" data-placement="top" data-original-title="{{ __('content.not_yet_created') }}">
                                                                                        <img src="{{ asset('uploads/img/dummy/no-image.jpg') }}" alt="no image" class="rounded w-25">
                                                                                    </a>
                                                                                @endif
                                                                            </div>
                                                                        </div>
                                                                        <!--end card-body-->
                                                                    </div>
                                                                </div>
                                                                <!--end card-->
                                                            </div>
                                                            <!--end col-->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="category" class="col-form-label">{{ __('content.categories') }} <span class="text-red">*</span></label>
                                        <select class="form-control" name="category_id" id="category" required>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id}}" {{ $category->id === $blog->category_id ? 'selected' : '' }}>{{ $category->category_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="short_desc">{{ __('content.short_desc') }}</label>
                                        <textarea id="short_desc" name="short_desc" rows="3" class="form-control">{{ $blog->short_desc }}</textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="tag">{{ __('content.tag') }}</label>
                                        <input type="text" name="tag" class="form-control" id="tag" value="{{ $blog->tag }}">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="type" class="col-form-label">{{ __('content.author') }} </label>
                                        <select class="form-control" name="type" id="type">
                                            <option value="with_this_account" selected>{{ __('content.select_your_option') }}</option>
                                            <option value="with_this_account" {{ $blog->type == "with_this_account" ? 'selected' : '' }}>{{ __('content.with_this_account') }}</option>
                                            <option value="anonymous" {{ $blog->type == "anonymous" ? 'selected' : '' }}>{{ __('content.anonymous') }}</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                   <div class="single-clint-area-content">
                                       <div class="form-group">
                                           <label for="image_status" class="col-form-label">{{ __('content.image_status') }}</label>
                                           <select class="form-control" name="image_status" id="image_status">
                                               <option value="show" selected>{{ __('content.select_your_option') }}</option>
                                               <option value="show" {{ $blog->image_status == "show" ? 'selected' : '' }}>{{ __('content.show') }}</option>
                                               <option value="hide" {{ $blog->image_status == "hide" ? 'selected' : '' }}>{{ __('content.hide') }}</option>
                                           </select>
                                       </div>
                                       <div class="form-group">
                                           <label for="blog_image">{{ __('content.image') }} ({{ __('content.size') }} 800 x 600) (.svg, .jpg, .jpeg, .png)</label>
                                           <input type="file" name="blog_image" class="form-control-file" id="blog_image">
                                           <small id="blog_image" class="form-text text-muted">{{ __('content.please_use_recommended_sizes') }}</small>
                                       </div>
                                       <div class="height-card box-margin">
                                           <div class="card">
                                               <div class="card-body">
                                                   <div class="avatar-area text-center">
                                                       <div class="media">
                                                           @if (!empty($blog->blog_image))
                                                               <a  class="d-block mx-auto" href="#" data-toggle="tooltip" data-placement="top" data-original-title="{{ __('content.current_image') }}">
                                                                   <img src="{{ asset('uploads/img/blog/'.$blog->blog_image) }}" alt="blog image" class="rounded w-25">
                                                               </a>
                                                           @else
                                                               <a class="d-block mx-auto" href="#" data-toggle="tooltip" data-placement="top" data-original-title="{{ __('content.not_yet_created') }}">
                                                                   <img src="{{ asset('uploads/img/dummy/no-image.jpg') }}" alt="no image" class="rounded w-25">
                                                               </a>
                                                           @endif
                                                       </div>
                                                   </div>
                                                   <!--end card-body-->
                                               </div>
                                           </div>
                                           <!--end card-->
                                       </div>
                                       <!--end col-->
                                   </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="status" class="col-form-label">{{ __('content.status') }}</label>
                                        <select class="form-control" name="status" id="status">
                                            <option value="published" selected>{{ __('content.select_your_option') }}</option>
                                            <option value="published" {{ $blog->status == "published" ? 'selected' : '' }}>{{ __('content.published') }}</option>
                                            <option value="hide" {{ $blog->status == "draft" ? 'selected' : '' }}>{{ __('content.draft') }}</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <small class="form-text text-muted">{{ __('content.required_fields') }}</small>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary mr-2">{{ __('content.submit') }}</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- end row -->

@endsection