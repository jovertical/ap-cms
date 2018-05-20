@extends('root.layouts.main')

@section('sidebar')
    @component(user_env('components.sidebar'))
    @endcomponent
@endsection

@section('content')
    <div class="m-portlet m-portlet--full-height m-portlet--tabs">
        <div class="m-portlet__head">
            <div class="m-portlet__head-tools">
                <ul class="nav nav-tabs m-tabs m-tabs-line   m-tabs-line--left m-tabs-line--primary" role="tablist">
                    <li class="nav-item m-tabs__item">
                        <a class="nav-link m-tabs__link active show" data-toggle="tab" href="#app_tab" role="tab" aria-selected="false">
                            <i class="flaticon-share m--hide"></i>
                            App
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Tab content -->
        <div class="tab-content">
            <!-- App Tab -->
            <div class="tab-pane active" id="app_tab">
                <form method="POST" action="{{ route(user_env('settings.update')) }}" class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" id="app_settings_form">
                    @method('PATCH')
                    @csrf

                    <div class="m-portlet__body">
                        <div class="form-group m-form__group row">
                            <div class="col-10 ml-auto">
                                <h3 class="m-form__section">1. Profile</h3>
                            </div>
                        </div>

                        <div class="form-group m-form__group row d-none" id="message_wrapper">
                            @component(user_env('components.alert'))
                                @slot('type')
                                    danger
                                @endslot

                                <div id="message_content"></div>
                            @endcomponent
                        </div>

                        <!-- Name -->
                        <div class="form-group m-form__group row {{ $errors->has('name') ? 'has-danger' : '' }}" required>
                            <label for="name" class="col-lg-2 col-form-label">
                                Name <span class="m--font-danger">*</span>
                            </label>

                            <div class="col-lg-6">
                                <input type="text" name="name" id="name" class="form-control m-input
                                    {{ $errors->has('name') ? 'form-control-danger' :'' }}"
                                        placeholder="Please enter a company name" value="{{ old('name') ??
                                            $settings['app']['name'] }}">

                                @if ($errors->has('name'))
                                    <div id="name-error" class="form-control-feedback">
                                        <span class="m--font-danger">{{ $errors->first('name') }}</span>
                                    </div>
                                @endif

                                <span class="m-form__help">The name of the company.</span>
                            </div>
                        </div>
                        <!--/. Name -->

                        <!-- About -->
                        <div class="form-group m-form__group row {{ $errors->has('about') ? 'has-danger' : '' }}">
                            <label for="about" class="col-lg-2 col-form-label">
                                About
                            </label>

                            <div class="col-lg-6">
                                <textarea name="about" id="about" class="summernote {{ $errors->has('about') ?
                                    ' form-control-danger' :'' }}">{!! old('about') ?? $settings['app']['about'] !!}
                                </textarea>

                                @if ($errors->has('about'))
                                    <div id="about-error" class="form-control-feedback">
                                        <span class="m--font-danger">{{ $errors->first('about') }}</span>
                                    </div>
                                @endif

                                <span class="m-form__help"></span>
                            </div>
                        </div>
                        <!--/. About -->

                         <!-- address -->
                        <div class="form-group m-form__group row {{ $errors->has('address') ? 'has-danger' : '' }}">
                            <label for="about" class="col-lg-2 col-form-label">
                                Address
                            </label>

                            <div class="col-lg-6">
                                <textarea name="address" id="address" class="summernote {{ $errors->has('address') ?
                                    ' form-control-danger' :'' }}">{!! old('address') ?? $settings['app']['address'] !!}
                                </textarea>

                                @if ($errors->has('address'))
                                    <div id="address-error" class="form-control-feedback">
                                        <span class="m--font-danger">{{ $errors->first('address') }}</span>
                                    </div>
                                @endif

                                <span class="m-form__help"></span>
                            </div>
                        </div>
                        <!--/. address -->

                        <!-- Email -->
                        <div class="form-group m-form__group row {{ $errors->has('email') ? 'has-danger' : '' }}">
                            <label for="email" class="col-lg-2 col-form-label">
                                Email
                            </label>

                            <div class="col-lg-6">
                                <input type="text" name="email" id="email" class="form-control m-input
                                    {{ $errors->has('email') ? 'form-control-danger' :'' }}"
                                        placeholder="Please enter a company email" value="{{ old('email') ??
                                            $settings['app']['email'] }}">

                                @if ($errors->has('email'))
                                    <div id="email-error" class="form-control-feedback">
                                        <span class="m--font-danger">{{ $errors->first('email') }}</span>
                                    </div>
                                @endif

                                <span class="m-form__help">
                                    The company email.
                                </span>
                            </div>
                        </div>
                        <!--/. Email -->

                        <!-- Phone number 1 -->
                        <div class="form-group m-form__group row {{ $errors->has('phone_number_1') ? 'has-danger' : '' }}">
                            <label for="phone_number_1" class="col-lg-2 col-form-label">
                                Phone number 1
                            </label>

                            <div class="col-lg-6">
                                <div class="input-group m-input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="la la-phone"></i></span>
                                    </div>

                                    <input type="text" name="phone_number_1" id="phone_number_1" class="form-control m-input
                                        {{ $errors->has('phone_number_1') ? 'form-control-danger' :'' }}"
                                            placeholder="Please enter phone number" value="{{ old('phone_number_1') ??
                                                $settings['app']['phone_number_1'] }}">
                                </div>

                                @if ($errors->has('phone_number_1'))
                                    <div id="phone_number_1-error" class="form-control-feedback">
                                        <span class="m--font-danger">
                                            {{ $errors->first('phone_number_1') }}
                                        </span>
                                    </div>
                                @endif

                                <span class="m-form__help">
                                    The primary phone number.
                                </span>
                            </div>
                        </div>
                        <!--/. Phone number 1 -->

                        <!-- Phone number 2 -->
                        <div class="form-group m-form__group row {{ $errors->has('phone_number_2') ? 'has-danger' : '' }}">
                            <label for="phone_number_2" class="col-lg-2 col-form-label">
                                Phone number 2
                            </label>

                            <div class="col-lg-6">
                                <div class="input-group m-input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="la la-phone"></i></span>
                                    </div>

                                    <input type="text" name="phone_number_2" id="phone_number_2" class="form-control m-input
                                        {{ $errors->has('phone_number_2') ? 'form-control-danger' :'' }}"
                                            placeholder="Please enter phone number" value="{{ old('phone_number_2') ??
                                                $settings['app']['phone_number_2'] }}">
                                </div>

                                @if ($errors->has('phone_number_2'))
                                    <div id="phone_number_2-error" class="form-control-feedback">
                                        <span class="m--font-danger">
                                            {{ $errors->first('phone_number_2') }}
                                        </span>
                                    </div>
                                @endif

                                <span class="m-form__help">
                                    Secondary phone number.
                                </span>
                            </div>
                        </div>
                        <!--/. Phone number 1 -->

                        <div class="form-group m-form__group row">
                            <div class="col-10 ml-auto">
                                <h3 class="m-form__section">2. Social Links</h3>
                            </div>
                        </div>

                        <!-- Facebook -->
                        <div class="form-group m-form__group row {{ $errors->has('facebook_url') ? 'has-danger' : '' }}" required>
                            <label for="facebook_url" class="col-lg-2 col-form-label">
                                Facebook
                            </label>

                            <div class="col-lg-6">
                                <input type="text" name="facebook_url" id="facebook_url" class="form-control m-input
                                    {{ $errors->has('facebook_url') ? 'form-control-danger' :'' }}"
                                        placeholder="Please enter your facebook link" value="{{ old('twitter_url') ??
                                            $settings['app']['facebook_url'] }}">

                                @if ($errors->has('facebook_url'))
                                    <div id="facebook_url-error" class="form-control-feedback">
                                        <span class="m--font-danger">
                                            {{ $errors->first('facebook_url') }}
                                        </span>
                                    </div>
                                @endif

                                <span class="m-form__help">Link to Facebook.</span>
                            </div>
                        </div>
                        <!--/. Facebook -->

                        <!-- Twitter -->
                        <div class="form-group m-form__group row {{ $errors->has('twitter_url') ? 'has-danger' : '' }}" required>
                            <label for="twitter_url" class="col-lg-2 col-form-label">
                                Twitter
                            </label>

                            <div class="col-lg-6">
                                <input type="text" name="twitter_url" id="twitter_url" class="form-control m-input
                                    {{ $errors->has('twitter_url') ? 'form-control-danger' :'' }}"
                                        placeholder="Please enter your twitter link"
                                            value="{{ old('twitter_url') ?? $settings['app']['twitter_url']  }}">

                                @if ($errors->has('twitter_url'))
                                    <div id="twitter_url-error" class="form-control-feedback">
                                        <span class="m--font-danger">{{ $errors->first('twitter_url') }}</span>
                                    </div>
                                @endif

                                <span class="m-form__help">Link to Twitter.</span>
                            </div>
                        </div>
                        <!--/. Twitter -->

                        <!-- Instagram -->
                        <div class="form-group m-form__group row {{ $errors->has('instagram_url') ? 'has-danger' : '' }}" required>
                            <label for="instagram_url" class="col-lg-2 col-form-label">
                                Instagram
                            </label>

                            <div class="col-lg-6">
                                <input type="text" name="instagram_url" id="instagram_url" class="form-control m-input
                                    {{ $errors->has('instagram_url') ? 'form-control-danger' :'' }}"
                                        placeholder="Please enter your twitter link"
                                            value="{{ old('instagram_url') ?? $settings['app']['instagram_url']  }}">

                                @if ($errors->has('instagram_url'))
                                    <div id="instagram_url-error" class="form-control-feedback">
                                        <span class="m--font-danger">{{ $errors->first('instagram_url') }}</span>
                                    </div>
                                @endif

                                <span class="m-form__help">Link to Instagram.</span>
                            </div>
                        </div>
                        <!--/. Instagram -->

                        <!-- Bottom -->
                        <div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
                            <div class="m-form__actions m-form__actions--solid">
                                <div class="row">
                                    <div class="col-lg-2"></div>
                                    <div class="col-lg-6">
                                        <button type="submit" id="submit" class="btn btn-brand">Update</button>
                                        <a href="{{ URL::previous() }}" class="btn btn-secondary">Cancel</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/. Bottom -->
                    </div>
                </form>
            </div>
            <!--/. App Tab -->
        </div>
        <!--/. Tab content -->
    </div>
@endsection

@section('scripts')
    <script>
        var app_settings = function() {
            // form validator init
            var validator = function () {
                var form = $("form[id=app_settings_form]");

                form.validate({
                    rules: {
                        name: {
                            required: true,
                            maxlength: 255
                        },
                        about: {
                            maxlength: 5000
                        },
                        email: {
                            email: true,
                            maxlength: 255
                        },
                        phone_number_1: {
                            maxlength: 255
                        },
                        phone_number_2: {
                            maxlength: 255
                        },
                        facebook_url: {
                            maxlength: 255
                        },
                        twitter_url: {
                            maxlength: 255
                        },
                        instagram_url: {
                            maxlength: 255
                        },
                    },

                    invalidHandler: function(event, validator) {
                        $('#message_wrapper').removeClass('d-none');
                        $('#message_content').html('\
                            <p>It looks like there are error(s) in the values you set.</p>\
                        ');

                        $('button[type=submit]').removeClass('m-loader m-loader--light m-loader--right');

                        mApp.scrollTo(form, -200);
                    },
                });
            }

            // input mask
            var input_mask = function () {
                // email
                $('input[id=email]').inputmask({
                    mask: "*{1,50}[.*{1,50}][.*{1,50}][.*{1,50}]@*{1,50}[.*{2,6}][.*{1,2}]",
                    greedy: false,
                    onBeforePaste: function (pastedValue, opts) {
                        pastedValue = pastedValue.toLowerCase();
                        return pastedValue.replace("mailto:", "");
                    },
                    definitions: {
                        '*': {
                            validator: "[0-9A-Za-z!#$%&'*+/=?^_`{|}~\-]",
                            cardinality: 1,
                            casing: "lower"
                        }
                    }
                });
                //. email

                // phone number 1
                $('input[id=phone_number_1]').inputmask("mask", {
                    "mask": "(+**) ***-*******"
                });

                // phone number 2
                $('input[id=phone_number_2]').inputmask("mask", {
                    "mask": "(+**) ***-*******"
                });
            }

            // summernote
            var summernote = function () {
                $('.summernote').summernote({
                    height: 150
                });
            }

            return {
                init: function() {
                    validator();
                    input_mask();
                    summernote();
                },
            };
        }();

        $(document).ready(function() {
            app_settings.init();
        });
    </script>
@endsection