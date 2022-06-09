@extends('layouts.admin.master')

@section('content')

    <!-- Include Alert Blade -->
    @include('admin.alert.alert')

    <!-- Form row -->
    <div class="row">
        <div class="col-xl-12 box-margin height-card">
            <div class="card card-body">
                <h4 class="card-title">{{ __('content.fixed_content') }}</h4>
                @if (isset($fixed_content))
                    @if ($demo_mode == "on")
                        <!-- Include Alert Blade -->
                            @include('admin.demo_mode.demo-mode')
                        @else
                            <form action="{{ route('fixed-content.update', $fixed_content->id) }}" method="POST" enctype="multipart/form-data">
                                @method('PUT')
                                @csrf
                                @endif

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="title">{{ __('content.title') }} <span class="text-red">*</span></label>
                                    <input type="text" name="title" class="form-control" id="title" value="{{ $fixed_content->title }}" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="desc">{{ __('content.description') }} <span class="text-red">*</span></label>
                                    <textarea name="desc" class="form-control" id="desc" rows="3" required>{{ $fixed_content->desc }}</textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="btn_name">{{ __('content.btn_name') }}</label>
                                    <input type="text" name="btn_name" class="form-control" id="btn_name" value="{{ $fixed_content->btn_name }}">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="btn_link">{{ __('content.btn_link') }}</label>
                                    <input type="text" name="btn_link" class="form-control" id="btn_link" value="{{ $fixed_content->btn_link }}">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="video_link">{{ __('content.video_link') }}</label>
                                    <input type="text" name="video_link" class="form-control" id="video_link" value="{{ $fixed_content->video_link }}">
                                    <small class="form-text text-muted">{{ __('content.only_youtube_is_supported') }}</small>
                                </div>
                            </div>
                            <div class="col-md-12">
                              <div class="single-clint-area-content">
                                  <div class="form-group">
                                      <label for="image_status" class="col-form-label">{{ __('content.image_status') }}</label>
                                      <select class="form-control" name="image_status" id="image_status">
                                          <option value="show" selected>{{ __('content.select_your_option') }}</option>
                                          <option value="show" {{ $fixed_content->image_status == "show" ? 'selected' : '' }}>{{ __('content.show') }}</option>
                                          <option value="hide" {{ $fixed_content->image_status == "hide" ? 'selected' : '' }}>{{ __('content.hide') }}</option>
                                      </select>
                                  </div>
                                  <div class="form-group">
                                      <label for="thumbnail_image">{{ __('content.image') }} ({{ __('content.size') }} 500 x 600) (.svg, .jpg, .jpeg, .png)</label>
                                      <input type="file" name="thumbnail_image" class="form-control-file" id="thumbnail_image">
                                      <small id="thumbnail_image" class="form-text text-muted">{{ __('content.please_use_recommended_sizes') }}</small>
                                  </div>
                                  <div class="height-card box-margin">
                                      <div class="card">
                                          <div class="card-body">
                                              <div class="avatar-area text-center">
                                                  <div class="media">
                                                      @if(!empty($fixed_content->thumbnail_image))
                                                          <a  class="d-block mx-auto" href="#" data-toggle="tooltip" data-placement="top" data-original-title="{{ __('content.current_image') }}">
                                                              <img src="{{ asset('uploads/img/general/'.$fixed_content->thumbnail_image) }}" alt="banner image" class="rounded w-50">
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
                                    <small class="form-text text-muted">{{ __('content.required_fields') }}</small>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary mr-2">{{ __('content.submit') }}</button>
                            </div>
                        </div>
                    </form>
                    @else
                                @if ($demo_mode == "on")
                                <!-- Include Alert Blade -->
                                    @include('admin.demo_mode.demo-mode')
                                @else
                                    <form action="{{ route('fixed-content.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @endif
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="title">{{ __('content.title') }} <span class="text-red">*</span></label>
                                    <input type="text" name="title" class="form-control" id="title" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="desc">{{ __('content.description') }} <span class="text-red">*</span></label>
                                    <textarea name="desc" class="form-control" id="desc" rows="3" required></textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="btn_name">{{ __('content.btn_name') }}</label>
                                    <input type="text" name="btn_name" class="form-control" id="btn_name">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="btn_link">{{ __('content.btn_link') }}</label>
                                    <input type="text" name="btn_link" class="form-control" id="btn_link">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="video_link">{{ __('content.video_link') }}</label>
                                    <input type="text" name="video_link" class="form-control" id="video_link">
                                    <small class="form-text text-muted">{{ __('content.only_youtube_is_supported') }}</small>
                                </div>
                            </div>
                            <div class="col-md-12">
                               <div class="single-clint-area-content">
                                   <div class="form-group">
                                       <label for="image_status" class="col-form-label">{{ __('content.image_status') }} </label>
                                       <select class="form-control" name="image_status" id="image_status">
                                           <option value="show" selected>{{ __('content.select_your_option') }}</option>
                                           <option value="show">{{ __('content.show') }}</option>
                                           <option value="hide">{{ __('content.hide') }}</option>
                                       </select>
                                   </div>
                                   <div class="form-group">
                                       <label for="thumbnail_image">{{ __('content.image') }} ({{ __('content.size') }} 500 x 600) (.svg, .jpg, .jpeg, .png)</label>
                                       <input type="file" name="thumbnail_image" class="form-control-file" id="thumbnail_image">
                                       <small id="thumbnail_image" class="form-text text-muted">{{ __('content.please_use_recommended_sizes') }}</small>
                                   </div>
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
                @endif
            </div>
        </div>
    </div>
    <!-- end row -->

@endsection