@extends('layouts.admin.master')

@section('content')

    <!-- Include Alert Blade -->
    @include('admin.alert.alert')

    <!-- Form row -->
    <div class="row">
        <div class="col-xl-12 box-margin height-card">
            <div class="card card-body">
                <div class="d-md-flex justify-content-between align-items-center mb-20">
                    <h4 class="card-title">{{ __('content.edit_portfolio') }}</h4>
                    <div>
                        <a href="{{ url()->previous() }}" class="btn btn-primary"><i class="fas fa-angle-left"></i> {{ __('content.back') }}</a>
                    </div>
                </div>
            @if ($demo_mode == "on")
                <!-- Include Alert Blade -->
                    @include('admin.demo_mode.demo-mode')
                @else
                    <form action="{{ route('portfolio.update', $portfolio->id) }}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        @endif

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="category">{{ __('content.categories') }} <span class="text-red">*</span></label>
                                <select class="form-control" name="category_id" id="category" required>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id}}" {{ $category->id == $portfolio->category_id ? 'selected' : '' }}>{{ $category->category_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="title">{{ __('content.title') }} <span class="text-red">*</span></label>
                                <input type="text" name="title" class="form-control" id="title" value="{{ $portfolio->title }}" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                           <div class="single-clint-area-content">
                               <div class="form-group">
                                   <label for="image_status" class="col-form-label">{{ __('content.image_status') }}</label>
                                   <select class="form-control" name="image_status" id="image_status">
                                       <option value="show" selected>{{ __('content.select_your_option') }}</option>
                                       <option value="show" {{ $portfolio->image_status == "show" ? 'selected' : '' }}>{{ __('content.show') }}</option>
                                       <option value="hide" {{ $portfolio->image_status == "hide" ? 'selected' : '' }}>{{ __('content.hide') }}</option>
                                   </select>
                               </div>
                               <div class="form-group">
                                   <label for="thumbnail_image">{{ __('content.image') }} ({{ __('content.size') }} 600 x 600) (.svg, .jpg, .jpeg, .png)</label>
                                   <input type="file" name="thumbnail_image" class="form-control-file" id="thumbnail_image">
                                   <small id="thumbnail_image" class="form-text text-muted">{{ __('content.please_use_recommended_sizes') }}</small>
                               </div>
                               <div class="height-card box-margin">
                                   <div class="card">
                                       <div class="card-body">
                                           <div class="avatar-area text-center">
                                               <div class="media">
                                                   @if (!empty($portfolio->thumbnail_image))
                                                       <a  class="d-block mx-auto" href="#" data-toggle="tooltip" data-placement="top" data-original-title="{{ __('content.current_image') }}">
                                                           <img src="{{ asset('uploads/img/portfolio/'.$portfolio->thumbnail_image) }}" alt="image" class="rounded w-25">
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
                                <label for="order">{{ __('content.order') }}</label>
                                <input type="number" name="order" class="form-control" id="order" value="{{ $portfolio->order }}">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="status" class="col-form-label">{{ __('content.status') }} </label>
                                <select class="form-control" name="status" id="status">
                                    <option value="published" selected>{{ __('content.select_your_option') }}</option>
                                    <option value="published" {{ $portfolio->status == "published" ? 'selected' : '' }}>{{ __('content.published') }}</option>
                                    <option value="draft" {{ $portfolio->status == "draft" ? 'selected' : '' }}>{{ __('content.draft') }}</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <small class="form-text text-muted">{{ __('content.required_fields') }}</small>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">{{ __('content.submit') }}</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- end row -->

@endsection