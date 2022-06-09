@extends('layouts.admin.master')

@section('content')

    <!-- Include Alert Blade -->
    @include('admin.alert.alert')

    <!-- Form row -->
    <div class="row">
        <div class="col-xl-12 box-margin height-card">
            <div class="card card-body">
                <div class="d-md-flex justify-content-between align-items-center mb-20">
                    <h4 class="card-title">{{ __('content.edit_testimonial') }}</h4>
                    <div>
                        <a href="{{ url()->previous() }}"  class="btn btn-primary"><i class="fas fa-angle-left"></i> {{ __('content.back') }}</a>
                    </div>
                </div>
            @if ($demo_mode == "on")
                <!-- Include Alert Blade -->
                    @include('admin.demo_mode.demo-mode')
                @else
                    <form action="{{ route('testimonial.update', $testimonial->id) }}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        @endif

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="name">{{ __('content.name') }} <span class="text-red">*</span></label>
                                    <input type="text" name="name" class="form-control" id="name" value="{{ $testimonial->name }}" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="job">{{ __('content.job') }} <span class="text-red">*</span></label>
                                    <input type="text" name="job" class="form-control" id="job" value="{{ $testimonial->job }}" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="desc">{{ __('content.description') }} <span class="text-red">*</span></label>
                                    <textarea type="text" name="desc" class="form-control" id="desc" rows="3" required>{{ $testimonial->desc }}</textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="star" class="col-form-label">{{ __('content.star') }}</label>
                                    <select class="form-control" name="star" id="star">
                                        <option value="5" selected>{{ __('content.select_your_option') }}</option>
                                        <option value="1" {{ $testimonial->star == 1 ? 'selected' : '' }}>1</option>
                                        <option value="2" {{ $testimonial->star == 2 ? 'selected' : '' }}>2</option>
                                        <option value="3" {{ $testimonial->star == 3 ? 'selected' : '' }}>3</option>
                                        <option value="4" {{ $testimonial->star == 4 ? 'selected' : '' }}>4</option>
                                        <option value="5" {{ $testimonial->star == 5 ? 'selected' : '' }}>5</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="order">{{ __('content.order') }}</label>
                                    <input type="number" name="order" class="form-control" id="order" value="{{ $testimonial->order }}">
                                </div>
                            </div>
                            <div class="col-md-12">
                               <div class="single-clint-area-content">
                                   <div class="form-group">
                                       <label for="image_status" class="col-form-label">{{ __('content.image_status') }}</label>
                                       <select class="form-control" name="image_status" id="image_status">
                                           <option value="show" selected>{{ __('content.select_your_option') }}</option>
                                           <option value="show" {{ $testimonial->image_status == "show" ? 'selected' : '' }}>{{ __('content.show') }}</option>
                                           <option value="hide" {{ $testimonial->image_status == "hide" ? 'selected' : '' }}>{{ __('content.hide') }}</option>
                                       </select>
                                   </div>
                                   <div class="form-group">
                                       <label for="testimonial_image">{{ __('content.image') }} ({{ __('content.size') }} 100 x 100) (.svg, .jpg, .jpeg, .png)</label>
                                       <input type="file" name="testimonial_image" class="form-control-file" id="testimonial_image">
                                       <small id="testimonial_image" class="form-text text-muted">{{ __('content.please_use_recommended_sizes') }}</small>
                                   </div>
                                   <div class="height-card box-margin">
                                       <div class="card">
                                           <div class="card-body">
                                               <div class="avatar-area text-center">
                                                   <div class="media">
                                                       @if (!empty($testimonial->testimonial_image))
                                                           <a  class="d-block mx-auto" href="#" data-toggle="tooltip" data-placement="top" data-original-title="{{ __('content.current_image') }}">
                                                               <img src="{{ asset('uploads/img/testimonial/'.$testimonial->testimonial_image) }}" alt="testimonial image" class="rounded w-25">
                                                           </a>
                                                       @else
                                                           <a  class="d-block mx-auto" href="#" data-toggle="tooltip" data-placement="top" data-original-title="{{ __('content.current_image') }}">
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
                                    <small class="form-text text-muted">{{ __('content.required_fields') }}</small>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary mr-2">{{ __('content.submit') }}</button>
                            </div>
                        </div>
                    </form>
            </div>
        </div>
    </div>
    <!-- end row -->

@endsection