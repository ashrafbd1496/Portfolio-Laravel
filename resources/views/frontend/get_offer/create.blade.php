@extends('layouts.frontend.master')

@section('content')

    <!--// Breadcrumb Section Start //-->
    <section class="breadcrumb-section section" data-scroll-index="1" @if (isset($breadcrumb)) data-bg-image-path = "{{ asset('uploads/img/general/'.$breadcrumb->breadcrumb_image) }}"
             @else data-bg-image-path="{{ asset('uploads/img/dummy/1920x420.jpg') }}"
            @endif>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="breadcrumb-inner text-center">
                        <h1> {{ __('frontend.get_offer') }}</h1>
                        <ul class="breadcrumb-links">
                            <li>
                                <a href="{{ url('/') }}">{{ __('frontend.home') }}</a>
                            </li>
                            <li class="active">
                                {{ __('frontend.get_offer') }}
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--// Breadcrumb Section end //-->

    <!--// Get Quote Form Start //-->
    <section class="section">
        <div class="container">
               <form action="{{ route('get-offer-message.store') }}" method="POST">
                   @csrf
                   <div class="row">
                       <div class="container">
                           @include('frontend.alert.alert-offer')
                       </div>
                       <div class="col-md-6">
                           <div class="custom-form-group">
                               <input type="text" class="custom-form-control" name="name" placeholder="{{ __('frontend.your_name') }}" required>
                               <span class="far fa-user"></span>
                           </div>
                       </div>
                       <div class="col-md-6">
                           <div class="custom-form-group">
                               <input type="text" class="custom-form-control" name="email" placeholder="{{ __('frontend.your_email') }}" required>
                               <span class="far fa-envelope"></span>
                           </div>
                       </div>
                       <div class="col-md-12">
                           <div class="custom-form-group">
                               <input type="text" class="custom-form-control" name="phone" placeholder="{{ __('frontend.your_phone') }}" required>
                               <span class="fa fa-mobile-alt"></span>
                           </div>
                       </div>
                       <div class="col-md-12">
                           <div class="custom-form-group">
                               <input type="text" class="custom-form-control" name="service_name" placeholder="{{ __('frontend.service_name') }}" required>
                               <span class="far fa-bookmark"></span>
                           </div>
                       </div>
                       <div class="col-md-12">
                           <div class="custom-form-group">
                               <textarea class="custom-form-control text-area" name="special_request" cols="30" rows="6" placeholder="{{ __('frontend.special_request') }}" required></textarea>
                               <span class="far fa-envelope-open"></span>
                           </div>
                       </div>
                       <div class="col-md-6">
                           <div class="custom-form-group">
                               <input type="text" class="captcha-input custom-form-control" name="contact_question" placeholder="{{ __('frontend.please_enter_code') }}" required>
                               <span id="contactFormCaptchaSpan"></span>
                               <input type="hidden" name="null_value" value="">
                               <input type="hidden" name="captcha" id="contactFormCaptchaVal2">
                               <div class="form-validate-icons">
                                   <span></span>
                               </div>
                           </div>
                       </div>
                       <div class="col-md-12">
                           <button type="submit" class="default-primary-btn">{{ __('frontend.send_message') }}</button>
                       </div>
                   </div>
               </form>
           </div>
    </section>
    <!--// Get Quote  Form End //-->

@endsection
