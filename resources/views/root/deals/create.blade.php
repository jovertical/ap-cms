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

                    <h3 class="m-portlet__head-text">Create Deal</h3>
                </div>
            </div>
        </div>

        <form method="POST" action="{{ route(user_env().'.deals.store') }}" id="form_store_deal" class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed m-form--state">
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

               
                <!-- Name -->
                <div class="form-group m-form__group row {{ $errors->has('name') ? 'has-danger' : '' }}">
                    <label for="name" class="col-lg-2 col-form-label">
                        Name <span class="m--font-danger">*</span>
                    </label>

                    <div class="col-lg-6">
                        <input type="text" name="name" id="name" class="form-control m-input
                            {{ $errors->has('name') ? 'form-control-danger' : '' }}" placeholder="Please enter a name"
                                value="{{ old('name') }}">

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
                                value="{{ old('price') }}">

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
                            ' form-control-danger' : '' }}">{!! old('description') !!}
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
              

                <!-- Actions -->
                <div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
                    <div class="m-form__actions m-form__actions--solid">
                        <div class="row">
                            <div class="col-lg-2"></div>
                            <div class="col-lg-6">
                                <button type="submit" id="submit" class="btn btn-brand">Create</button>
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
                var form = $("form[id=form_store_deal]");

                form.validate({
                    rules: {
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
                    summernote();
                }
            };
        }();

        $(document).ready(function() {
            data.init();
        });
    </script>
@endsection