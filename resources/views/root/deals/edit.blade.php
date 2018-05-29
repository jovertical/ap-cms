@extends(user_env('layouts.main'))

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

                    <h3 class="m-portlet__head-text">Edit deal</h3>
                </div>
            </div>
        </div>

        <form method="POST" action="{{ route(user_env().'.deals.update', $deal) }}" id="form_update_deal" class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed m-form--state">
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

                <!-- Category -->
                <div class="form-group m-form__group row {{ $errors->has('category') ? 'has-danger' : '' }}">
                    <label for="category" class="col-lg-2 col-form-label">
                        Category <span class="m--font-danger">*</span>
                    </label>

                    <div class="col-lg-6">
                        <select name="category" id="category" class="form-control m-bootstrap-select">
                            <option value="" disabled selected>Please select it's category</option>

                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ old('category') ?? $deal->category_id ?
                                    'selected' : '' }}>{{ $category->name }}
                                </option>
                            @endforeach
                        </select>

                        @if ($errors->has('category'))
                            <div id="category-error" class="form-control-feedback">
                                <span class="m--font-danger">{{ $errors->first('category') }}</span>
                            </div>
                        @endif

                        <span class="m-form__help">The category this deal belongs to.</span>
                    </div>
                </div>
                <!--/. Category -->

                <!-- Name -->
                <div class="form-group m-form__group row {{ $errors->has('name') ? 'has-danger' : '' }}">
                    <label for="name" class="col-lg-2 col-form-label">
                        Name <span class="m--font-danger">*</span>
                    </label>

                    <div class="col-lg-6">
                        <input type="text" name="name" id="name" class="form-control m-input
                            {{ $errors->has('name') ? 'form-control-danger' : '' }}" placeholder="Please enter a name"
                                value="{{ old('name') ?? $deal->name }}">

                        @if ($errors->has('name'))
                            <div id="name-error" class="form-control-feedback">
                                <span class="m--font-danger">{{ $errors->first('name') }}</span>
                            </div>
                        @endif

                        <span class="m-form__help">The name of the deal.</span>
                    </div>
                </div>
                <!--/. Name -->

                <!-- Price -->
                <div class="form-group m-form__group row {{ $errors->has('price') ? 'has-danger' : '' }}">
                    <label for="price" class="col-lg-2 col-form-label">
                        Price <span class="m--font-danger">*</span>
                    </label>

                    <div class="col-lg-6">
                        <input type="text" name="price" id="price" class="form-control m-input
                            {{ $errors->has('price') ? 'form-control-danger' : '' }}" placeholder="Please enter a price"
                                value="{{ old('price') ?? $deal->price }}">

                        @if ($errors->has('price'))
                            <div id="price-error" class="form-control-feedback">
                                <span class="m--font-danger">{{ $errors->first('price') }}</span>
                            </div>
                        @endif

                        <span class="m-form__help">The price of the deal.</span>
                    </div>
                </div>
                <!--/. Price -->

	            <!-- Description -->
	            <div class="form-group m-form__group row {{ $errors->has('description') ? 'has-danger' : '' }}">
	                <label for="description" class="col-lg-2 col-form-label">
	                    Description
	                </label>

	                <div class="col-lg-6">
	                    <textarea name="description" id="description" class="summernote {{ $errors->has('description') ?
	                    	' form-control-danger' : '' }}">{!! old('description') ?? $deal->description  !!}
	                    </textarea>

	                    @if ($errors->has('description'))
	                        <div id="description-error" class="form-control-feedback">
	                            <span class="m--font-danger">{{ $errors->first('description') }}</span>
	                        </div>
	                    @endif

	                    <span class="m-form__help"></span>
	                </div>
	            </div>
                <!--/. Description -->

                <!-- Featured -->
                <div class="form-group m-form__group row {{ $errors->has('featured') ? 'has-danger' : '' }}">
                    <label for="featured" class="col-lg-2 col-form-label">
                        Featured:
                    </label>

                    <div class="col-lg-6">
                        <span id="featured_wrapper" class="m-switch m-switch--lg m-switch--icon
                            {{ $deal->featured ? 'm-switch--success' : ' m-switch--danger' }}">
                            <label>
                                <input type="checkbox" name="featured" id="featured"
                                    {{ $deal->featured ? 'checked="checked"' : '' }}>
                                <span></span>
                            </label>
                        </span>

                        <br>

                        <span class="m-form__help">Whether the deal is featured or not.</span>
                    </div>
                </div>
                <!--/. Featured -->

                <!-- Actions -->
                <div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
                    <div class="m-form__actions m-form__actions--solid">
                        <div class="row">
                            <div class="col-lg-2"></div>
                            <div class="col-lg-6">
                                <button type="submit" id="submit" class="btn btn-brand">Update</button>
                                <a href="{{ route(user_env().'.deals.index') }}" class="btn btn-secondary">Cancel</a>
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
            	var form = $("form[id=form_update_deal]");

                form.validate({
                    rules: {
                        category: {
                            required: true
                        },
                        name: {
                            required: true,
                            maxlength: 255
                        },
                        price: {
                            required: true
                        },
                        description: {
                        	maxlength: 510
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
                $('input[id=price]').inputmask("999,999,999.99", {
                    numericInput: true
                });
                //. phone number
            }

            // select
            var select = function () {
                $('.m-bootstrap-select').selectpicker();
            }

            // switch
            var switcher = function() {
                var featured = $('input[id=featured]');
                var featured_wrapper = $('#featured_wrapper');

                featured.on('change', function() {
                    if ($(this).prop('checked')) {
                        featured_wrapper.addClass('m-switch--success');
                        featured_wrapper.removeClass('m-switch--danger');
                    } else {
                        featured_wrapper.addClass('m-switch--danger');
                        featured_wrapper.removeClass('m-switch--success');
                    }
                });
            };

            // summernote
            var summernote = function () {
                $('.summernote').summernote({
                    height: 150
                });
            }

            return {
                init: function() {
                    validator();
                    inputMasks();
                    select();
                    switcher();
                    summernote();
                }
            };
        }();

        $(document).ready(function() {
            data.init();
        });
    </script>
@endsection