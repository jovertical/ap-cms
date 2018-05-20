@extends(user_env('layouts.main'))

@section('sidebar')
    @component(user_env('components.sidebar'))
    @endcomponent
@endsection

@section('content')
    <div class="m-portlet">
        <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
                <div class="m-portlet__head-title">
                    <span class="m-portlet__head-icon m--hide">
                    	<i class="la la-gear"></i>
                    </span>

                    <h3 class="m-portlet__head-text">Create episode</h3>
                </div>
            </div>
        </div>

        <form method="POST" action="{{ route(user_env('episodes.store')) }}" id="form_store_episode" class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed m-form--state">
            @csrf

	        <div class="m-portlet__body">
	        	<!-- Message -->
                <div class="form-group m-form__group row">
                    @if (Session::has('message'))
                        @component(user_env().'.components.alert')
                            @slot('type')
                                {{ Session::get('message.type') }}
                            @endslot

                            {!! Session::get('message.content') !!}
                        @endcomponent
                    @endif
                </div>

                <!-- Tutorial -->
                <div class="form-group m-form__group row {{ $errors->has('tutorial') ? 'has-danger' : '' }}">
                    <label for="tutorial" class="col-lg-2 col-form-label">
                        Tutorial <span class="m--font-danger">*</span>
                    </label>

                    <div class="col-lg-6">
                        <select name="tutorial" id="tutorial" class="form-control m-bootstrap-select">
                            <option value="" disabled selected>Please select it's tutorial</option>

                            @foreach($tutorials as $tutorial)
                                <option value="{{ $tutorial->id }}" {{ old('tutorial') ?? Request::get('tutorial') == 
                                    $tutorial->id ? 'selected' : '' }}>{{ $tutorial->title }}
                                </option>
                            @endforeach
                        </select>

                        @if ($errors->has('tutorial'))
                            <div id="tutorial-error" class="form-control-feedback">
                                <span class="m--font-danger">{{ $errors->first('tutorial') }}</span>
                            </div>
                        @endif

                        <span class="m-form__help">The tutorial this episode belongs to.</span>
                    </div>
                </div>
                <!--/. Tutorial -->

                <!-- Number -->
                <div class="form-group m-form__group row {{ $errors->has('number') ? 'has-danger' : '' }}">
                    <label for="title" class="col-lg-2 col-form-label">
                        Number <span class="m--font-danger">*</span>
                    </label>

                    <div class="col-lg-6">
                        <input type="text" name="number" id="number" class="form-control m-input
                            {{ $errors->has('number') ? 'form-control-danger' : '' }}"
                                placeholder="Please enter an episode number" value="{{ old('number') }}">

                        @if ($errors->has('number'))
                            <div id="number-error" class="form-control-feedback">
                                <span class="m--font-danger">{{ $errors->first('number') }}</span>
                            </div>
                        @endif

                        <span class="m-form__help">Used in sequencing with other episodes for the tutorial.</span>
                    </div>
                </div>
                <!--/. Number -->

                <!-- Title -->
                <div class="form-group m-form__group row {{ $errors->has('title') ? 'has-danger' : '' }}">
                    <label for="title" class="col-lg-2 col-form-label">
                        Title <span class="m--font-danger">*</span>
                    </label>

                    <div class="col-lg-6">
                        <input type="text" name="title" id="title" class="form-control m-input
                            {{ $errors->has('title') ? 'form-control-danger' : '' }}" placeholder="Please enter a title"
                                value="{{ old('title') }}">

                        @if ($errors->has('title'))
                            <div id="title-error" class="form-control-feedback">
                                <span class="m--font-danger">{{ $errors->first('title') }}</span>
                            </div>
                        @endif

                        <span class="m-form__help">The title of the episode. Make it catchy and enticing.</span>
                    </div>
                </div>
                <!--/. Title -->

	            <!-- Body -->
	            <div class="form-group m-form__group row {{ $errors->has('body') ? 'has-danger' : '' }}">
	                <label for="body" class="col-lg-2 col-form-label">
	                    Body <span class="m--font-danger">*</span>
	                </label>

	                <div class="col-lg-6">
	                    <textarea name="body" id="body" class="summernote {{ $errors->has('body') ?
	                    	' form-control-danger' : '' }}">{!! old('body') !!}
	                    </textarea>

	                    @if ($errors->has('body'))
	                        <div id="body-error" class="form-control-feedback">
	                            <span class="m--font-danger">{{ $errors->first('body') }}</span>
	                        </div>
	                    @endif

	                    <span class="m-form__help"></span>
	                </div>
	            </div>
	            <!--/. Body -->

                <!-- Video URL -->
                <div class="form-group m-form__group row {{ $errors->has('video_url') ? 'has-danger' : '' }}">
                    <label for="title" class="col-lg-2 col-form-label">
                        Video URL
                    </label>

                    <div class="col-lg-6">
                        <input type="text" name="video_url" id="video_url" class="form-control m-input
                            {{ $errors->has('video_url') ? 'form-control-danger' : '' }}"
                                placeholder="Please enter a video URL" value="{{ old('video_url') }}">

                        @if ($errors->has('video_url'))
                            <div id="video_url-error" class="form-control-feedback">
                                <span class="m--font-danger">{{ $errors->first('video_url') }}</span>
                            </div>
                        @endif

                        <span class="m-form__help">A video URL for the episode.</span>
                    </div>
                </div>
                <!--/. Video URL -->

                <!-- Actions -->
                <div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
                    <div class="m-form__actions m-form__actions--solid">
                        <div class="row">
                            <div class="col-lg-2"></div>
                            <div class="col-lg-6">
                                <button type="submit" id="submit" class="btn btn-brand">Create</button>
                                <a href="{{ route(user_env('episodes.index')) }}" class="btn btn-secondary">Cancel</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/. Actions -->
			</div>
        </form>
    </div>
@endsection

@section('scripts')
    <script>
        var data = function () {
            // validator
            var validator = function () {
            	var form = $("form[id=form_store_episode]");

                form.validate({
                    rules: {
                        tutorial: {
                            required: true
                        },
                        number: {
                            required: true,
                            number: true
                        },
                        title: {
                            required: true,
                            maxlength: 255
                        },
                        body: {
                        	required: true
                        }
                    },

                    invalidHandler: function(event, validator) {
                        $('button[type=submit]').removeClass('m-loader m-loader--light m-loader--right');

                        mApp.scrollTo(form, -200);
                    },
                });
            }

            // input masks
            var inputMasks = function () {
                // phone number
                $('input[id=number]').inputmask("999", {
                    numericInput: true
                }); 
                //. phone number
            }

            // select
            var select = function () {
                $('.m-bootstrap-select').selectpicker();
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
                    select();
                    summernote();
                }
            };
        }();

        $(document).ready(function() {
            data.init();
        });
    </script>
@endsection
