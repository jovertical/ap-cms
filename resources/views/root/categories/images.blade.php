@extends('root.layouts.main')

@section('sidebar')
    @component(user_env().'.components.sidebar')
    @endcomponent
@endsection

@section('content')
    <div class="m-portlet">
        <!-- Head-->
        <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
                <div class="m-portlet__head-title">
                    <span class="m-portlet__head-icon m--hide"><i class="la la-gear"></i></span>

                    <h3 class="m-portlet__head-text">Select images for <em>{{ $category->name }}</em></h3>
                </div>
            </div>
        </div>
        <!--/. Head-->

        <!-- Body-->
        <div class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed m-form--state">

            <div class="m-portlet__body">
                <!-- Image -->
                <div class="form-group m-form__group row">
                    <label class="col-lg-2 col-form-label">Image: </label>

                    <div class="col-lg-6">
                        <div action="{{ route(user_env().'.categories.images.store', $category) }}"
                            class="m-dropzone dropzone" id="form-category-images">

                            <div class="m-dropzone__msg dz-message">
                                <h3 class="m-dropzone__msg-title">Drop files here or click to upload.</h3>
                                <span class="m-dropzone__msg-desc">File formats supported:
                                    <strong>jpg</strong>, <strong>jpeg</strong>, <strong>png</strong>, <strong>gif</strong>
                                    <br />
                                    Max number of files: <strong>1</strong>
                                    <br />
                                    Max file size: <strong>6mb</strong>
                                </span>
                            </div>
                        </div>

                        <span class="m-form__help"></span>
                    </div>
                </div>
                <!--/. Image -->

                <!-- Bottom -->
                <div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
                    <div class="m-form__actions m-form__actions--solid">
                        <div class="row">
                            <div class="col-lg-2"></div>
                            <div class="col-lg-6">
                                <a href="{{ route(user_env().'.categories.index') }}" class="btn btn-secondary">Skip</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/. Bottom -->
            </div>
        </div>
        <!--/. Body-->
    </div>
@endsection

@section('scripts')
    <script>
        Dropzone.options.formCategoryImages = {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            paramName: 'image',
            addRemoveLinks : true,
            maxFiles: 1,
            maxFilesize: 6,
            acceptedFiles: ".jpeg, .jpg, .png, .gif",
            init: function() {
                var dz = this;

                dz.on('success', function(file, response) {
                    var fileUploaded = file.previewElement.querySelector("[data-dz-name]");
                    fileUploaded.innerHTML = response.file_name;
                });

                dz.on('removedfile', function(file) {
                    var fileUploaded = file.previewElement.querySelector("[data-dz-name]").innerHTML;

                    $.ajax({
                        type: 'DELETE',
                        url: '{{ route(user_env().'.categories.images.destroy', $category) }}',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: {
                            file_name: fileUploaded
                        },
                        dataType: 'html'
                    });
                });

                $.get('{{ route(user_env().'.categories.images.index', $category) }}', function(data) {
                    $.each(data.images, function (index, image) {
                        var file = {
                            directory: image.directory, name: image.name, size: image.size
                        };

                        dz.options.addedfile.call(dz, file);
                        dz.options.thumbnail.call(dz, file, file.directory + '/' + file.name);
                        dz.emit("complete", file);
                        dz.files.push(file);
                    });
                });
            }
        };
    </script>
@endsection