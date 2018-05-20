@extends(user_env('layouts.main'))

@section('sidebar')
    @component('root.components.sidebar')
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

                    <h3 class="m-portlet__head-text">Edit tutorial</h3>
                </div>
            </div>
        </div>

        <form method="POST" action="{{ route(user_env('tutorials.update'), $tutorial) }}" id="form_update_tutorial" class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed m-form--state">
            @method('PATCH')
            @csrf

	        <div class="m-portlet__body">
	        	<!-- Message -->
                <div class="form-group m-form__group row d-none" id="message_wrapper">
                    @component(user_env('components.alert'))
                        @slot('type')
                            danger
                        @endslot

                        <div id="message_content"></div>
                    @endcomponent
                </div>

                <!-- Product -->
                <div class="form-group m-form__group row {{ $errors->has('product') ? 'has-danger' : '' }}">
                    <label for="product" class="col-lg-2 col-form-label">
                        Product <span class="m--font-danger">*</span>
                    </label>

                    <div class="col-lg-6">
                        <select name="product" id="product" class="form-control m-bootstrap-select">
                            <option value="" disabled selected>Please select it's product</option>

                            @foreach($products as $index => $product)
                                <option value="{{ old('product') ?? $product->id }}" {{ old('product') ??
                                    $tutorial->product_id == $product->id ? 'selected' : '' }}>{{ $product->name }}
                                </option>
                            @endforeach
                        </select>

                        @if ($errors->has('product'))
                            <div id="product-error" class="form-control-feedback">
                                <span class="m--font-danger">{{ $errors->first('product') }}</span>
                            </div>
                        @endif

                        <span class="m-form__help">The product this tutorial belongs to.</span>
                    </div>
                </div>
                <!--/. Product -->

                <!-- Title -->
                <div class="form-group m-form__group row {{ $errors->has('title') ? 'has-danger' : '' }}">
                    <label for="title" class="col-lg-2 col-form-label">
                        Title <span class="m--font-danger">*</span>
                    </label>

                    <div class="col-lg-6">
                        <input type="text" name="title" id="title" class="form-control m-input
                            {{ $errors->has('title') ? 'form-control-danger' : '' }}" placeholder="Please enter a title"
                                value="{{ old('title') ?? $tutorial->title }}">

                        @if ($errors->has('title'))
                            <div id="title-error" class="form-control-feedback">
                                <span class="m--font-danger">{{ $errors->first('title') }}</span>
                            </div>
                        @endif

                        <span class="m-form__help">The title of the tutorial.</span>
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
	                    	' form-control-danger' : '' }}">{!! old('body') ?? $tutorial->body !!}
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

                <!-- Actions -->
                <div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
                    <div class="m-form__actions m-form__actions--solid">
                        <div class="row">
                            <div class="col-lg-2"></div>
                            <div class="col-lg-6">
                                <button type="submit" id="submit" class="btn btn-brand">Update</button>
                                <a href="{{ route(user_env('tutorials.index')) }}" class="btn btn-secondary">Cancel</a>
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
            	var form = $("form[id=form_update_tutorial]");

                form.validate({
                    rules: {
                        title: {
                            required: true,
                            maxlength: 255
                        },
                        body: {
                        	required: true
                        }
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
