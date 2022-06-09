@extends('layouts.admin.master')

@section('content')

    <!-- Include Alert Blade -->
    @include('admin.alert.alert')

    <!-- Form row -->
    <div class="row">
        <div class="col-xl-12 box-margin height-card">
            <div class="card card-body">
                <h4 class="card-title">{{ __('content.site_info') }}</h4>
                @if (isset($site_info))
                    @if ($demo_mode == "on")
                        <!-- Include Alert Blade -->
                            @include('admin.demo_mode.demo-mode')
                        @else
                            <form action="{{ route('site-info.update', $site_info->id) }}" method="POST">
                                @method('PUT')
                                @csrf
                                @endif

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="short_desc">{{ __('content.short_desc') }}</label>
                                    <input type="text" name="short_desc" class="form-control" id="short_desc" value="{{ $site_info->short_desc }}">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="copyright">{{ __('content.copyright') }}</label>
                                    <input type="text" name="copyright" class="form-control" id="copyright" value="{{ $site_info->copyright }}">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="address">{{ __('content.address') }}</label>
                                    <input type="text" name="address" class="form-control" id="address" value="{{ $site_info->address }}">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="address_map_link">{{ __('content.address_map_link') }}</label>
                                    <input type="text" name="address_map_link" class="form-control" id="address_map_link" value="{{ $site_info->address_map_link }}">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="email">{{ __('content.email') }}</label>
                                    <input type="text" name="email" class="form-control" id="email" value="{{ $site_info->email }}">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="phone">{{ __('content.phone') }}</label>
                                    <input type="text" name="phone" class="form-control" id="phone" value="{{ $site_info->phone }}">
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
                                    <form action="{{ route('site-info.store') }}" method="POST">
                                        @csrf
                                        @endif

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="short_desc">{{ __('content.short_desc') }}</label>
                                    <input type="text" name="short_desc" class="form-control" id="short_desc">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="copyright">{{ __('content.copyright') }}</label>
                                    <input type="text" name="copyright" class="form-control" id="copyright">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="address">{{ __('content.address') }}</label>
                                    <input type="text" name="address" class="form-control" id="address">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="address_map_link">{{ __('content.address_map_link') }}</label>
                                    <input type="text" name="address_map_link" class="form-control" id="address_map_link">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="email">{{ __('content.email') }}</label>
                                    <input type="text" name="email" class="form-control" id="email">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="phone">{{ __('content.phone') }}</label>
                                    <input type="text" name="phone" class="form-control" id="phone">
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