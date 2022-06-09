@extends('layouts.admin.master')

@section('content')

    <!-- Include Alert Blade -->
    @include('admin.alert.alert')

    <!-- Form row -->
    <div class="row">
        <div class="col-xl-12 box-margin height-card">
            <div class="card card-body">
                <div class="d-md-flex justify-content-between align-items-center mb-20">
                    <h4 class="card-title">{{ __('content.edit_service') }}</h4>
                    <div>
                        <a href="{{ url()->previous() }}"  class="btn btn-primary"><i class="fas fa-angle-left"></i> {{ __('content.back') }}</a>
                    </div>
                </div>
            @if ($demo_mode == "on")
                <!-- Include Alert Blade -->
                    @include('admin.demo_mode.demo-mode')
                @else
                    <form action="{{ route('service-category.update', $service->id) }}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        @endif

                        <div class="row">
                            <div class="col-md-12">
                               <div class="single-clint-area-content">
                                   <fieldset class="form-group">
                                       <legend class="font-14">{{ __('content.type') }}</legend>
                                       <div class="form-check pl-0 mb-2">
                                           <label class="form-check-label">
                                               <input type="radio" class="form-check-input mr-2" name="type" id="optionsRadios1" onclick="showHideTypeDiv()" value="icon" {{ $service->type == 'icon' ? 'checked' : '' }}><span class="ml-3">Icon</span>
                                               <i class="input-helper"></i>
                                           </label>
                                       </div>
                                       <div class="form-check pl-0">
                                           <label class="form-check-label">
                                               <input type="radio" class="form-check-input mr-1" name="type" id="optionsRadios2" onclick="showHideTypeDiv()" value="image" {{ $service->type == 'image' ? 'checked' : '' }}><span class="ml-3">Image</span>
                                               <i class="input-helper"></i>
                                           </label>
                                       </div>
                                   </fieldset>
                                   <div class="form-group" id="icon-type" style="{{ $service->type == 'icon' ? 'display:block' : 'display:none' }}">
                                       <label for="icon" class="d-block">{{ __('content.icon') }}</label>
                                       <div class="btn-group">
                                           <input type="hidden" name="icon" class="form-control" id="icon" value="{{ $service->icon }}">
                                           <button type="button" class="btn btn-primary  iconpicker-component"><i id="icon-value" class="{{ $service->icon }} iconpicker-component"></i></button>
                                           <button type="button" id="iconPickerBtn" class="icp icp-dd btn btn-primary dropdown-toggle iconpicker-component" data-selected="fa-car" data-toggle="dropdown">
                                               <span class="caret"></span>
                                           </button>
                                           <div class="dropdown-menu"></div>
                                       </div>
                                   </div>
                                   <div id="image-type" style="{{ $service->type == 'image' ? 'display:block' : 'display:none' }}">
                                       <div class="form-group">
                                           <label for="service_category_image">{{ __('content.image') }} ({{ __('content.size') }} 60 x 60) (.svg, .jpg, .jpeg, .png)</label>
                                           <input type="file" name="service_category_image" class="form-control-file" id="service_category_image">
                                           <small id="service_category_image" class="form-text text-muted">{{ __('content.please_use_recommended_sizes') }}</small>
                                       </div>
                                       <div class="height-card box-margin">
                                           <div class="card">
                                               <div class="card-body">
                                                   <div class="avatar-area text-center">
                                                       <div class="media">
                                                           @if (!empty($service->service_category_image))
                                                               <a  class="d-block mx-auto" href="#" data-toggle="tooltip" data-placement="top" data-original-title="{{ __('content.current_image') }}">
                                                                   <img src="{{ asset('uploads/img/service/'.$service->service_category_image) }}" alt="service image" class="rounded">
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
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="category_name">{{ __('content.category_name') }} <span class="text-red">*</span></label>
                                    <input type="text" name="category_name" class="form-control" id="category_name" value="{{ $service->category_name }}">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="title">{{ __('content.title') }}</label>
                                    <input type="text" name="title" class="form-control" id="title" value="{{ $service->title }}">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="summernote">{{ __('content.description') }}</label>
                                    <textarea name="desc" class="form-control" id="summernote">@php echo html_entity_decode($service->desc); @endphp</textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="btn_name">{{ __('content.btn_name') }}</label>
                                    <input type="text" name="btn_name" class="form-control" id="btn_name" value="{{ $service->btn_name }}">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="btn_link">{{ __('content.btn_link') }}</label>
                                    <input type="text" name="btn_link" class="form-control" id="btn_link" value="{{ $service->btn_link }}">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="single-clint-area-content">
                                    <div class="form-group">
                                        <label for="image_status" class="col-form-label">{{ __('content.image_status') }}</label>
                                        <select class="form-control" name="image_status" id="image_status">
                                            <option value="show" selected>{{ __('content.select_your_option') }}</option>
                                            <option value="show" {{ $service->image_status == "show" ? 'selected' : '' }}>{{ __('content.show') }}</option>
                                            <option value="hide" {{ $service->image_status == "hide" ? 'selected' : '' }}>{{ __('content.hide') }}</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="service_category_image">{{ __('content.image') }} ({{ __('content.size') }} 540 x 490) (.svg, .jpg, .jpeg, .png)</label>
                                        <input type="file" name="service_category_image" class="form-control-file" id="service_category_image">
                                        <small id="service_category_image" class="form-text text-muted">{{ __('content.please_use_recommended_sizes') }}</small>
                                    </div>
                                    <div class="height-card box-margin">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="avatar-area text-center">
                                                    <div class="media">
                                                        @if (!empty($service->service_category_image))
                                                        <a  class="d-block mx-auto" href="#" data-toggle="tooltip" data-placement="top" data-original-title="{{ __('content.current_image') }}">
                                                            <img src="{{ asset('uploads/img/service/'.$service->service_category_image) }}" alt="image" class="rounded w-25">
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
                                    <input type="number" name="order" class="form-control" id="order" value="{{ $service->order }}" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="status" class="col-form-label">{{ __('content.status') }}</label>
                                    <select class="form-control" name="status" id="status">
                                        <option value="published" selected>{{ __('content.select_your_option') }}</option>
                                        <option value="published" {{ $service->status == "published" ? 'selected' : '' }}>{{ __('content.published') }}</option>
                                        <option value="draft" {{ $service->status == "draft" ? 'selected' : '' }}>{{ __('content.draft') }}</option>
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
                    </form>
            </div>
        </div>
    </div>
    <!-- end row -->

@endsection