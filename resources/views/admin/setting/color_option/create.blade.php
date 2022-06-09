@extends('layouts.admin.master')

@section('content')

    <!-- Include Alert Blade -->
    @include('admin.alert.alert')

    <!-- Form row -->
    <div class="row">
        <div class="col-xl-12 box-margin height-card">
            <div class="card card-body">
                <h4 class="card-title">{{ __('content.color_option') }}</h4>
                @if (isset($color_option))
                    <form action="{{ route('color-option.update', $color_option->id) }}" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="hiddenradio">
                                    <div class="">
                                        <label>
                                            <input type="radio" name="color_option" value="0" {{ ($color_option->color_option == 0)? "checked" : "" }}>
                                            <i class="custom-font-size custom-color-default mr-2 fas fa-tint"></i>
                                        </label>
                                        <label>
                                            <input type="radio" name="color_option" value="1" {{ ($color_option->color_option == 1)? "checked" : "" }}>
                                            <i class="custom-font-size custom-color-1 mr-2 fas fa-tint"></i>                                                </label>
                                        <label>
                                            <input type="radio" name="color_option" value="2" {{ ($color_option->color_option == 2)? "checked" : "" }}>
                                            <i class="custom-font-size custom-color-2 mr-2 fas fa-tint"></i>
                                        </label>
                                        <label>
                                            <input type="radio" name="color_option" value="3" {{ ($color_option->color_option == 3)? "checked" : "" }}>
                                            <i class="custom-font-size custom-color-3 mr-2 fas fa-tint"></i>
                                        </label>
                                        <label>
                                            <input type="radio" name="color_option" value="4" {{ ($color_option->color_option == 4)? "checked" : "" }}>
                                            <i class="custom-font-size custom-color-4 mr-2 fas fa-tint"></i>
                                        </label>
                                        <label>
                                            <input type="radio" name="color_option" value="5" {{ ($color_option->color_option == 5)? "checked" : "" }}>
                                            <i class="custom-font-size custom-color-5 mr-2 fas fa-tint"></i>
                                        </label>
                                        <label>
                                            <input type="radio" name="color_option" value="6" {{ ($color_option->color_option == 6)? "checked" : "" }}>
                                            <i class="custom-font-size custom-color-6 mr-2 fas fa-tint"></i>
                                        </label>
                                        <label>
                                            <input type="radio" name="color_option" value="7" {{ ($color_option->color_option == 7)? "checked" : "" }}>
                                            <i class="custom-font-size custom-color-7 mr-2 fas fa-tint"></i>
                                        </label>
                                        <label>
                                            <input type="radio" name="color_option" value="8" {{ ($color_option->color_option == 8)? "checked" : "" }}>
                                            <i class="custom-font-size custom-color-8 mr-2 fas fa-tint"></i>
                                        </label>
                                        <label>
                                            <input type="radio" name="color_option" value="9" {{ ($color_option->color_option == 9)? "checked" : "" }}>
                                            <i class="custom-font-size custom-color-9 mr-2 fas fa-tint"></i>
                                        </label>
                                        <label>
                                            <input type="radio" name="color_option" value="10" {{ ($color_option->color_option == 10)? "checked" : "" }}>
                                            <i class="custom-font-size custom-color-10 mr-2 fas fa-tint"></i>
                                        </label>
                                        <label>
                                            <input type="radio" name="color_option" value="11" {{ ($color_option->color_option == 11)? "checked" : "" }}>
                                            <i class="custom-font-size custom-color-11 fas fa-tint"></i>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary mr-2 mt-3">{{ __('content.submit') }}</button>
                            </div>
                        </div>
                    </form>
                    @else
                    <form action="{{ route('color-option.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="hiddenradio">
                                    <div class="">
                                        <label>
                                            <input type="radio" name="color_option" value="0">
                                            <i class="custom-font-size custom-color-default mr-2 fas fa-tint"></i>
                                        </label>
                                        <label>
                                            <input type="radio" name="color_option" value="1">
                                            <i class="custom-font-size custom-color-1 mr-2 fas fa-tint"></i>                                                </label>
                                        <label>
                                            <input type="radio" name="color_option" value="2">
                                            <i class="custom-font-size custom-color-2 mr-2 fas fa-tint"></i>
                                        </label>
                                        <label>
                                            <input type="radio" name="color_option" value="3">
                                            <i class="custom-font-size custom-color-3 mr-2 fas fa-tint"></i>
                                        </label>
                                        <label>
                                            <input type="radio" name="color_option" value="4">
                                            <i class="custom-font-size custom-color-4 mr-2 fas fa-tint"></i>
                                        </label>
                                        <label>
                                            <input type="radio" name="color_option" value="5">
                                            <i class="custom-font-size custom-color-5 mr-2 fas fa-tint"></i>
                                        </label>
                                        <label>
                                            <input type="radio" name="color_option" value="6">
                                            <i class="custom-font-size custom-color-6 mr-2 fas fa-tint"></i>
                                        </label>
                                        <label>
                                            <input type="radio" name="color_option" value="7">
                                            <i class="custom-font-size custom-color-7 mr-2 fas fa-tint"></i>
                                        </label>
                                        <label>
                                            <input type="radio" name="color_option" value="8">
                                            <i class="custom-font-size custom-color-8 mr-2 fas fa-tint"></i>
                                        </label>
                                        <label>
                                            <input type="radio" name="color_option" value="9">
                                            <i class="custom-font-size custom-color-9 mr-2 fas fa-tint"></i>
                                        </label>
                                        <label>
                                            <input type="radio" name="color_option" value="10">
                                            <i class="custom-font-size custom-color-10 mr-2 fas fa-tint"></i>
                                        </label>
                                        <label>
                                            <input type="radio" name="color_option" value="11">
                                            <i class="custom-font-size custom-color-11 fas fa-tint"></i>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary mr-2 mt-3">{{ __('content.submit') }}</button>
                            </div>
                        </div>
                    </form>
                @endif
            </div>
        </div>
    </div>
    <!-- end row -->

@endsection