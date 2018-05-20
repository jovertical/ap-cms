@extends(user_env().'.layouts.main')

@section('sidebar')
    @component(user_env().'.components.sidebar')
    @endcomponent
@endsection

@section('content')
    <!-- Portlet -->
    <div class="m-portlet m-portlet--mobile">
        <!-- Portlet head -->
        <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
                <div class="m-portlet__head-title">
                    <h3 class="m-portlet__head-text">
                        This is the list of all <span class="m--font-boldest">Products</span>
                    </h3>
                </div>
            </div>
        </div>
        <!--/. Portlet head -->

        <!-- Portlet body -->
        <div class="m-portlet__body">
            <!--begin: Search Form -->
            <div class="m-form m-form--label-align-right m--margin-top-20 m--margin-bottom-30">
                <div class="row align-items-center">
                    <div class="col-xl-8 order-2 order-xl-1">
                        <div class="form-group m-form__group row align-items-center">
                            <!-- Featured -->
                            <div class="col-md-4">
                                <div class="m-form__group m-form__group--inline">
                                    <div class="m-form__label">
                                        <label>Featured:</label>
                                    </div>
                                    <div class="m-form__control">
                                        <select class="form-control m-bootstrap-select" id="featured">
                                            <option value="">All</option>
                                            <option value="1">Featured</option>
                                            <option value="0">Not</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="d-md-none m--margin-bottom-10"></div>
                            </div>
                            <!--/. Featured -->

                            <!-- Availability -->
                            <div class="col-md-4">
                                <div class="m-form__group m-form__group--inline">
                                    <div class="m-form__label">
                                        <label>Availability:</label>
                                    </div>
                                    <div class="m-form__control">
                                        <select class="form-control m-bootstrap-select" id="availability">
                                            <option value="">All</option>
                                            <option value="1">Active</option>
                                            <option value="0">Inactive</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="d-md-none m--margin-bottom-10"></div>
                            </div>
                            <!--/. Availability -->
                            
                            <!-- Search -->
                            <div class="col-md-4">
                                <div class="m-input-icon m-input-icon--left">
                                    <input type="text" class="form-control m-input" placeholder="Search..." id="generalSearch">
                                    <span class="m-input-icon__icon m-input-icon__icon--left">
                                        <span><i class="la la-search"></i></span>
                                    </span>
                                </div>
                            </div>
                            <!--/. Search -->
                        </div>
                    </div>

                    <div class="col-xl-4 order-1 order-xl-2 m--align-right">
                        <a href="{{ route(user_env().'.products.create') }}" class="btn btn-primary m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill">
                            <span>
                                <i class="la la-plus"></i><span>Create</span>
                            </span>
                        </a>
                        <div class="m-separator m-separator--dashed d-xl-none"></div>
                    </div>
                </div>
            </div>
            <!--end: Search Form -->

            <!-- Products -->
            <div id="table" class="m-datatable"></div>
            <!--/. Products -->
        </div>
        <!--/. Portlet body -->
    </div>
    <!--/. Portlet -->

    <!-- Toggle Modal -->
    @component(user_env().'.components.modal')
        @slot('name')
            confirm_toggle_product
        @endslot

        <div class="text-wrapper"></div>

        <!-- Toggle Form -->
        <form method="POST" action="" id="form_toggle_product" style="display: none;">
            @method('PATCH')
            @csrf
        </form>
    @endcomponent

    <!-- Destroy Modal -->
    @component(user_env('components.modal'))
        @slot('name')
            confirm_destroy_product
        @endslot

        <!-- Destroy Form -->
        <form method="POST" action="" id="form_destroy_product" style="display: none;">
            @method('DELETE')
            @csrf
        </form>
    @endcomponent
@endsection

@section('scripts')
    <script>
        var data = function() {
            var dataInit = function() {
                var datatable = $('#table').mDatatable({
                    data: {
                        type: 'remote',
                        source: {
                            read: {
                                method: 'GET',
                                url: '{!! route(user_env().'.products.datatables.index') !!}',
                                map: function(raw) {
                                    var dataSet = raw;
                                    if (typeof raw.data !== 'undefined') {
                                        dataSet = raw.data;
                                    }
                                    return dataSet;
                                },
                            },
                            pageSize: 10,
                            serverPaging: true,
                            serverFiltering: true,
                            serverSorting: true
                        },
                    },
                    layout: {
                        theme: 'default',
                        scroll: false,
                        footer: false
                    },
                    sortable: true,
                    pagination: true,
                    search: {
                        input: $('#generalSearch')
                    },
                    rows: {
                        autoHide: true,
                    },
                    columns: [
                        {
                            field: '#',
                            title: '#',
                            width: 30,
                            type: 'number',
                            template: function(product, index) {
                                return index + 1;
                            },
                        },
                        {
                            field: 'Actions',
                            width: 120,
                            title: 'Actions',
                            sortable: false,
                            overflow: 'visible',
                            template: function (product, index, datatable) {
                                var dropup = (datatable.getPageSize() - index) <= 4 ? 'dropup' : '';
                                var toggle = product.active ? 'off' : 'on';

                                return '\
                                    <div class="dropdown ' + dropup + '">\
                                        <a href="#" class="btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" data-toggle="dropdown">\
                                            <i class="la la-ellipsis-h"></i>\
                                        </a>\
                                        <div class="dropdown-menu dropdown-menu-right">\
                                            <a href="'+ product.DT_RowData.tutorial_create_route +'" class="dropdown-item">\
                                                <i class="la la-book"></i> Create Tutorial\
                                            </a>\
                                            <a href="'+ product.DT_RowData.image_route +'" class="dropdown-item">\
                                                <i class="la la-image"></i> Images\
                                            </a>\
                                            <a href="#" class="dropdown-item toggle_resource" \
                                                data-toggle="modal" \
                                                data-target="#confirm_toggle_product" \
                                                data-form="#form_toggle_product" \
                                                data-action="' + product.DT_RowData.toggle_route + '" \
                                                data-resource-name="' + product.name + '"> \
                                                <i class="la la-toggle-'+ toggle +'"></i> Toggle-'+ toggle +'\
                                            </a>\
                                        </div>\
                                    </div>\
                                    <a href="'+ product.DT_RowData.edit_route +'" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="Edit product"><i class="la la-edit"></i>\
                                    </a>\
                                    <a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill destroy_resource" title="Destroy product" \
                                        data-toggle="modal" \
                                        data-target="#confirm_destroy_product" \
                                        data-form="#form_destroy_product" \
                                        data-action="' + product.DT_RowData.destroy_route + '" \
                                        data-resource-name="' + product.name + '" \
                                    >\
                                        <i class="la la-trash"></i>\
                                    </a>\
                                ';
                            },
                        },
                        {
                            field: 'category',
                            title: 'Category',
                            width: 100,
                            template: function(product) {
                                if (product.category != null) {
                                    return '\
                                        <a href="'+ product.DT_RowData.category_edit_route +'" class="m--font-link">'
                                            + product.category.name +
                                        '</a>\
                                    ';
                                }

                                return;
                            }
                        },
                        {
                            field: 'name',
                            title: 'Name',
                            width: 150,
                            template: function(product) {
                                var name = product.name;
                                var image = product.images.length > 0 ? product.images[0].file_path : null;

                                if (image != null) {
                                    output = '<div class="m-card-user m-card-user--sm">\
                                        <div class="m-card-user__pic">\
                                            <img src="' + image + '" class="m--img-rounded m--marginless" alt="photo">\
                                        </div>\
                                        <div class="m-card-user__details">\
                                            <span class="m-card-user__name">' + name + '</span>\
                                        </div>\
                                    </div>';
                                } else {
                                    var stateNo = mUtil.getRandomInt(0, 7);
                                    var states = [
                                        'success', 'brand', 'danger', 'accent', 'warning', 'metal', 'primary', 'info'
                                    ];
                                    var state = states[stateNo];

                                    output = '<div class="m-card-user m-card-user--sm">\
                                        <div class="m-card-user__pic">\
                                            <div class="m-card-user__no-photo m--bg-fill-' + state + '"><span>' +
                                                name.substring(0, 1) + '</span>\
                                            </div>\
                                        </div>\
                                        <div class="m-card-user__details">\
                                            <span class="m-card-user__name">' + name + '</span>\
                                        </div>\
                                    </div>';
                                }

                                return output;
                            },
                        },
                        {
                            field: 'price',
                            title: 'Price',
                            width: 100
                        },
                        {
                            field: 'featured',
                            title: 'Featured',
                            width: 75,
                            template: function(product) {
                                var featured = product.featured ? 1 : 0;
                                var statuses = {
                                    0: {'title': 'Not', 'class': ' m-badge--metal'},
                                    1: {'title': 'Featured', 'class': 'm-badge--success'},
                                };

                                return '<span class="m-badge ' + statuses[featured].class +
                                ' m-badge--wide">' + statuses[featured].title + '</span>';
                            },
                        },
                        {
                            field: 'active',
                            title: 'Active',
                            width: 75,
                            template: function(product) {
                                var active = product.active ? 1 : 0;
                                var statuses = {
                                    0: {'title': 'Inactive', 'class': ' m-badge--metal'},
                                    1: {'title': 'Active', 'class': 'm-badge--success'},
                                };

                                return '<span class="m-badge ' + statuses[active].class +
                                ' m-badge--wide">' + statuses[active].title + '</span>';
                            },
                        },
                        {
                            field: 'description',
                            title: 'Description',
                            width: 350
                        },
                        {
                            field: 'creator',
                            title: 'Creator',
                            width: 150,
                            template: function(product) {
                                if (product.creator != null) {
                                    var name = product.creator.name;
                                    var image = product.creator.file_path;

                                    if (image != null) {
                                        output = '<div class="m-card-user m-card-user--sm">\
                                            <div class="m-card-user__pic">\
                                                <img src="' + image + '" class="m--img-rounded m--marginless" alt="photo">\
                                            </div>\
                                            <div class="m-card-user__details">\
                                                <span class="m-card-user__name">' + name + '</span>\
                                            </div>\
                                        </div>';
                                    } else {
                                        var stateNo = mUtil.getRandomInt(0, 7);
                                        var states = [
                                            'success', 'brand', 'danger', 'accent', 'warning', 'metal', 'primary', 'info'
                                        ];
                                        var state = states[stateNo];

                                        output = '<div class="m-card-user m-card-user--sm">\
                                            <div class="m-card-user__pic">\
                                                <div class="m-card-user__no-photo m--bg-fill-' + state + '"><span>' +
                                                    name.substring(0, 1) + '</span>\
                                                </div>\
                                            </div>\
                                            <div class="m-card-user__details">\
                                                <span class="m-card-user__name">' + name + '</span>\
                                            </div>\
                                        </div>';
                                    }

                                    return output;
                                }
                            },
                        },
                        {
                            field: 'created_at',
                            title: 'Created',
                            width: 200,
                            template: function (product) {
                                if (product.created_at == null) {
                                    return '';
                                }

                                return moment(product.created_at).format('MMMM Do, YYYY @ hh:mm:ss A');
                            },
                        },
                        {
                            field: 'updater',
                            title: 'Updater',
                            width: 150,
                            template: function(product) {
                                if (product.updater != null) {
                                    var name = product.updater.name;
                                    var image = product.updater.file_path;

                                    if (image != null) {
                                        output = '<div class="m-card-user m-card-user--sm">\
                                            <div class="m-card-user__pic">\
                                                <img src="' + image + '" class="m--img-rounded m--marginless" alt="photo">\
                                            </div>\
                                            <div class="m-card-user__details">\
                                                <span class="m-card-user__name">' + name + '</span>\
                                            </div>\
                                        </div>';
                                    } else {
                                        var stateNo = mUtil.getRandomInt(0, 7);
                                        var states = [
                                            'success', 'brand', 'danger', 'accent', 'warning', 'metal', 'primary', 'info'
                                        ];
                                        var state = states[stateNo];

                                        output = '<div class="m-card-user m-card-user--sm">\
                                            <div class="m-card-user__pic">\
                                                <div class="m-card-user__no-photo m--bg-fill-' + state + '"><span>' +
                                                    name.substring(0, 1) + '</span>\
                                                </div>\
                                            </div>\
                                            <div class="m-card-user__details">\
                                                <span class="m-card-user__name">' + name + '</span>\
                                            </div>\
                                        </div>';
                                    }

                                    return output;
                                }
                            },
                        },
                        {
                            field: 'updated_at',
                            title: 'Updated',
                            width: 200,
                            template: function(product) {
                                if (product.updated_at == null) {
                                    return '';
                                }

                                return moment(product.updated_at).format('MMMM Do, YYYY @ hh:mm:ss A');
                            },
                        },
                    ],
                });

                $('select[id=featured]').on('change', function() {
                    datatable.search($(this).val().toLowerCase(), 'featured');
                }).selectpicker();

                $('select[id=availability]').on('change', function() {
                    datatable.search($(this).val().toLowerCase(), 'active');
                }).selectpicker();
            };

            return {
                init: function() {
                    dataInit();
                },
            };
        }();

        $(document).ready(function(e) {
            data.init();
        });
    </script>
@endsection