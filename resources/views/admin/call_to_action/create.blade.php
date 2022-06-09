@extends('layouts.admin.master')

@section('content')

    <!-- Include Alert Blade -->
    @include('admin.alert.alert')

    <!-- Form row -->
    <div class="row">
        <div class="col-xl-12 box-margin height-card">
            <div class="card card-body">
                <h4 class="card-title">{{ __('content.call_to_action') }}</h4>
                @if (isset($call_to_action))
                    @if ($demo_mode == "on")
                        <!-- Include Alert Blade -->
                            @include('admin.demo_mode.demo-mode')
                        @else
                            <form action="{{ route('call-to-action.update', $call_to_action->id) }}" method="POST" enctype="multipart/form-data">
                                @method('PUT')
                                @csrf
                                @endif

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="title">{{ __('content.title') }} <span class="text-red">*</span></label>
                                    <input type="text" name="title" class="form-control" id="title" value="{{ $call_to_action->title }}" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="desc">{{ __('content.description') }} <span class="text-red">*</span></label>
                                    <textarea name="desc" class="form-control" id="desc" rows="3" required>{{ $call_to_action->desc }}</textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="btn_name">{{ __('content.btn_name') }}</label>
                                    <input type="text" name="btn_name" class="form-control" id="btn_name" value="{{ $call_to_action->btn_name }}">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="btn_link">{{ __('content.btn_link') }}</label>
                                    <input type="text" name="btn_link" class="form-control" id="btn_link" value="{{ $call_to_action->btn_link }}">
                                    <small class="form-text text-muted">{{ __('content.leave_blank_to_redirect_to_the_contact_section') }}</small>
                                </div>
                            </div>
                            <div class="col-md-12">
                              <div class="single-clint-area-content">
                                  <div class="form-group">
                                      <label for="image_status" class="col-form-label">{{ __('content.image_status') }}</label>
                                      <select class="form-control" name="image_status" id="image_status">
                                          <option value="show" selected>{{ __('content.select_your_option') }}</option>
                                          <option value="show" {{ $call_to_action->image_status == "show" ? 'selected' : '' }}>{{ __('content.show') }}</option>
                                          <option value="hide" {{ $call_to_action->image_status == "hide" ? 'selected' : '' }}>{{ __('content.hide') }}</option>
                                      </select>
                                  </div>
                                  <div class="form-group">
                                      <label for="bg_image">{{ __('content.bg_image') }} ({{ __('content.size') }} 1920 x 420) (.svg, .jpg, .jpeg, .png)</label>
                                      <input type="file" name="bg_image" class="form-control-file" id="bg_image">
                                      <small id="bg_image" class="form-text text-muted">{{ __('content.please_use_recommended_sizes') }}</small>
                                  </div>
                                  <div class="height-card box-margin">
                                      <div class="card">
                                          <div class="card-body">
                                              <div class="avatar-area text-center">
                                                  <div class="media">
                                                      @if(!empty($call_to_action->bg_image))
                                                          <a  class="d-block mx-auto" href="#" data-toggle="tooltip" data-placement="top" data-original-title="{{ __('content.current_image') }}">
                                                              <img src="{{ asset('uploads/img/general/'.$call_to_action->bg_image) }}" alt="banner image" class="rounded w-50">
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
                                    <form action="{{ route('call-to-action.store') }}" method="POST" enctype="multipart/form-data">
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
                                    <small class="form-text text-muted">{{ __('content.leave_blank_to_redirect_to_the_contact_section') }}</small>
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
                                       <label for="bg_image">{{ __('content.bg_image') }} ({{ __('content.size') }} 1920 x 420) (.svg, .jpg, .jpeg, .png)</label>
                                       <input type="file" name="bg_image" class="form-control-file" id="bg_image">
                                       <small id="bg_image" class="form-text text-muted">{{ __('content.please_use_recommended_sizes') }}</small>
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