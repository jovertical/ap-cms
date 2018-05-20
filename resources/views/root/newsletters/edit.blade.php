@extends(user_env().'.layouts.main')

@section('sidebar')
    @component(user_env().'.components.sidebar')
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

                    <h3 class="m-portlet__head-text">Edit newsletter</h3>
                </div>
            </div>
        </div>

        <form method="POST" action="{{ route(user_env().'.newsletters.update', $newsletter) }}" id="form_update_newsletter" class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed m-form--state"
            enctype="multipart/form-data">
            @method('PATCH')
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

                <!-- Trigger -->
                <div class="form-group m-form__group row {{ $errors->has('trigger') ? 'has-danger' : '' }}">
                    <label for="trigger" class="col-lg-2 col-form-label">
                        Trigger <span class="m--font-danger">*</span>
                    </label>

                    <div class="col-lg-6">
                        <select name="trigger" id="trigger" class="form-control m-bootstrap-select">
                            <option value="" disabled selected>Please select it's trigger</option>

                            <option value="subscribed" {{ old('trigger') ?? $newsletter->trigger == 
                                'subscribed' ? 'selected' : '' }}>User subscribed</option>

                            <option value="registered" {{ old('trigger') ?? $newsletter->trigger == 
                                'registered' ? 'selected' : '' }}>User registered
                            </option>

                            <option value="scheduled" {{ old('trigger') ?? $newsletter->trigger == 
                                'scheduled' ? 'selected' : '' }}>Scheduled</option>
                        </select>

                        @if ($errors->has('trigger'))
                            <div id="trigger-error" class="form-control-feedback">
                                <span class="m--font-danger">{{ $errors->first('trigger') }}</span>
                            </div>
                        @endif

                        <span class="m-form__help">This is how a newsletter is delivered to subscribers.</span>
                    </div>
                </div>
                <!--/. Trigger -->

                <!-- Frequency -->
                <div id="frequency_wrapper" class="d-none">
                    <div class="form-group m-form__group row {{ $errors->has('frequency') ? 'has-danger' : '' }}">
                        <label for="frequency" class="col-lg-2 col-form-label">
                            Frequency
                        </label>

                        <div class="col-lg-6">
                            <select name="frequency" id="frequency" class="form-control m-bootstrap-select">
                                <option value="" disabled selected>Please select a frequency</option>

                                <option value="daily" {{ old('frequency') ?? $newsletter->frequency == 
                                    'daily' ? 'selected' : '' }}>Daily</option>

                                <option value="weekly" {{ old('frequency') ?? $newsletter->frequency == 
                                    'weekly' ? 'selected' : '' }}>Weekly</option>

                                <option value="monthly" {{ old('frequency') ?? $newsletter->frequency == 
                                    'monthly' ? 'selected' : '' }}>Monthly</option>
                            </select>

                            @if ($errors->has('frequency'))
                                <div id="frequency-error" class="form-control-feedback">
                                    <span class="m--font-danger">{{ $errors->first('frequency') }}</span>
                                </div>
                            @endif

                            <span class="m-form__help">
                                This is how frequent this newsletter will be delivered to subscribers.
                            </span>
                        </div>
                    </div>
                </div>
                <!--/. Frequency -->                

                <!-- Title -->
                <div class="form-group m-form__group row {{ $errors->has('title') ? 'has-danger' : '' }}">
                    <label for="title" class="col-lg-2 col-form-label">
                        Title <span class="m--font-danger">*</span>
                    </label>

                    <div class="col-lg-6">
                        <input type="text" name="title" id="title" class="form-control m-input
                            {{ $errors->has('title') ? 'form-control-danger' : '' }}" placeholder="Please enter a title"
                                value="{{ old('title') ?? $newsletter->title }}">

                        @if ($errors->has('title'))
                            <div id="title-error" class="form-control-feedback">
                                <span class="m--font-danger">{{ $errors->first('title') }}</span>
                            </div>
                        @endif

                        <span class="m-form__help">The title of the newsletter.</span>
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
	                    	' form-control-danger' : '' }}">{!! old('body') ?? $newsletter->body !!}
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

                <!-- Attachment -->
	            <div class="form-group m-form__group row {{ $errors->has('attachment') ? 'has-danger' : '' }}">
                    <label for="attachment" class="col-lg-2 col-form-label">
                        Attachment
                    </label>
                    
                    <div class="col-lg-6">
                        <div></div>
                        <div class="custom-file">
                            <input type="file" name="attachment" id="attachment" class="custom-file-input">
                            <label class="custom-file-label" for="attachment">
                                {{ old('attachment') ?? $newsletter->file_path }}
                            </label>
                        </div>

                        @if ($errors->has('attachment'))
                            <div id="attachment-error" class="form-control-feedback">
                                <span class="m--font-danger">{{ $errors->first('attachment') }}</span>
                            </div>
                        @endif
                        
                        <span class="m-form__help">This will be embedded to the email. Max file size is 2048kb.</span>
                    </div>
                </div>
                <!--/. Attachment -->

                <!-- Actions -->
                <div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
                    <div class="m-form__actions m-form__actions--solid">
                        <div class="row">
                            <div class="col-lg-2"></div>
                            <div class="col-lg-6">
                                <button type="submit" id="submit" class="btn btn-brand">Update</button>
                                <a href="{{ route(user_env().'.newsletters.index') }}" class="btn btn-secondary">Cancel</a>
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
            	var form = $("form[id=form_update_newsletter]");

                form.validate({
                    rules: {
                        trigger: {
                            required: true,
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

            // select
            var select = function () {
                $('select#trigger').on('change', function() {
                    if ($(this).find(':selected').val() == 'scheduled') {
                        $('#frequency_wrapper').removeClass('d-none');
                    } else {
                        $('#frequency_wrapper').addClass('d-none');
                    }
                }).selectpicker();

                $('select#frequency').selectpicker();
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
