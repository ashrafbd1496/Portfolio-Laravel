@extends('layouts.admin.master')

@section('content')

    <!-- Include Alert Blade -->
    @include('admin.alert.alert')

    <!-- Form row -->
    <div class="row">
        <div class="col-xl-12 box-margin height-card">
            <div class="card card-body">
                <h4 class="card-title">{{ __('content.google_analytic') }}</h4>
                @if (isset($google_analytic))
                    <form action="{{ route('google-analytic.update', $google_analytic->id) }}" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="google_analytic">{{ __('content.google_analytic') }} </label>
                                    <input type="text" name="google_analytic" class="form-control" id="google_analytic" value="{{ $google_analytic->google_analytic }}" placeholder="UA-179583929-1">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary mr-2">{{ __('content.submit') }}</button>
                            </div>
                        </div>
                    </form>
                    @else
                    <form action="{{ route('google-analytic.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="google_analytic">{{ __('content.google_analytic') }}</label>
                                    <input type="text" name="google_analytic" class="form-control" id="google_analytic"  placeholder="UA-179583929-1">
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