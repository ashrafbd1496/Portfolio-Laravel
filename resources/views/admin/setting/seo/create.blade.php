@extends('layouts.admin.master')

@section('content')

    <!-- Include Alert Blade -->
    @include('admin.alert.alert')

    <!-- Form row -->
    <div class="row">
        <div class="col-xl-12 box-margin height-card">
            <div class="card card-body">
                <h4 class="card-title">{{ __('content.seo') }}</h4>
                @if (isset($seo))
                    @if ($demo_mode == "on")
                        <!-- Include Alert Blade -->
                            @include('admin.demo_mode.demo-mode')
                        @else
                            <form action="{{ route('seo.update', $seo->id) }}" method="POST">
                                @method('PUT')
                                @csrf
                                @endif

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="site_name">{{ __('content.site_name') }} <span class="text-red">*</span></label>
                                    <input type="text" name="site_name" class="form-control" id="site_name" value="{{ $seo->site_name }}" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="site_desc">{{ __('content.site_desc') }} <span class="text-red">*</span></label>
                                    <textarea name="site_desc" class="form-control" id="site_desc" rows="3" required>{{ $seo->site_desc }}</textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="site_keywords">{{ __('content.site_keywords') }} ({{ __('content.separate_with_commas') }}) <span class="text-red">*</span></label>
                                    <textarea name="site_keywords" class="form-control" id="site_keywords" rows="3" required>{{ $seo->site_keywords }}</textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="fb_app_id" data-toggle="tooltip" title="{{ __('In order to use Facebook Insights you must add the app ID to your page. Insights lets you view analytics for traffic to your site from Facebook. Find the app ID in your App Dashboard.') }}">fb_app_id</label>
                                    <input type="text" name="fb_app_id" class="form-control" id="fb_app_id" value="{{ $seo->fb_app_id }}">
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
                                    <form action="{{ route('seo.store') }}" method="POST">
                                        @csrf
                                        @endif

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="site_name">{{ __('content.site_name') }} <span class="text-red">*</span></label>
                                    <input type="text" name="site_name" class="form-control" id="site_name" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="site_desc">{{ __('content.site_desc') }} <span class="text-red">*</span></label>
                                    <textarea name="site_desc" class="form-control" id="site_desc" rows="3" required></textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="site_keywords">{{ __('content.site_keywords') }} ({{ __('content.separate_with_commas') }}) <span class="text-red">*</span></label>
                                    <textarea name="site_keywords" class="form-control" id="site_keywords" rows="3" required></textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="fb_app_id"  data-toggle="tooltip" title="{{ __('In order to use Facebook Insights you must add the app ID to your page. Insights lets you view analytics for traffic to your site from Facebook. Find the app ID in your App Dashboard.') }}">fb_app_id</label>
                                    <input type="text" name="fb_app_id" class="form-control" id="fb_app_id">
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