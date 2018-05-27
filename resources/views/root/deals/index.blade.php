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
                        This is the list of all <span class="m--font-boldest">deals</span>
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
                                        <label>Required:</label>
                                    </div>
                                    <div class="m-form__control">
                                        <select class="form-control m-bootstrap-select" id="distributor_requirement">
                                            <option value="">All</option>
                                            <option value="1">Required</option>
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
                        <a href="{{ route(user_env().'.deals.create') }}" class="btn btn-primary m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill">
                            <span>
                                <i class="la la-plus"></i><span>Create</span>
                            </span>
                        </a>
                        <div class="m-separator m-separator--dashed d-xl-none"></div>
                    </div>
                </div>
            </div>
            <!--end: Search Form -->

            <!-- deals -->
            <div id="table" class="m-datatable"></div>
            <!--/. deals -->
        </div>
        <!--/. Portlet body -->
    </div>
    <!--/. Portlet -->

    <!-- Toggle Modal -->
    @component(user_env().'.components.modal')
        @slot('name')
            confirm_toggle_deal
        @endslot

        <div class="text-wrapper"></div>

        <!-- Toggle Form -->
        <form method="POST" action="" id="form_toggle_deal" style="display: none;">
            @method('PATCH')
            @csrf
        </form>
    @endcomponent

    <!-- Destroy Modal -->
    @component(user_env('components.modal'))
        @slot('name')
            confirm_destroy_deal
        @endslot

        <!-- Destroy Form -->
        <form method="POST" action="" id="form_destroy_deal" style="display: none;">
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
                                url: '{!! route(user_env().'.deals.datatables.index') !!}',
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
                            template: function(deal, index) {
                                return index + 1;
                            },
                        },
                        {
                            field: 'Actions',
                            width: 120,
                            title: 'Actions',
                            sortable: false,
                            overflow: 'visible',
                            template: function (deal, index, datatable) {
                                var dropup = (datatable.getPageSize() - index) <= 4 ? 'dropup' : '';
                                var toggle = deal.active ? 'off' : 'on';

                                return '\
                                    <div class="dropdown ' + dropup + '">\
                                        <a href="#" class="btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" data-toggle="dropdown">\
                                            <i class="la la-ellipsis-h"></i>\
                                        </a>\
                                        <div class="dropdown-menu dropdown-menu-right">\
                                            <a href="'+ deal.DT_RowData.image_route +'" class="dropdown-item">\
                                                <i class="la la-image"></i> Images\
                                            </a>\
                                            <a href="#" class="dropdown-item toggle_resource" \
                                                data-toggle="modal" \
                                                data-target="#confirm_toggle_deal" \
                                                data-form="#form_toggle_deal" \
                                                data-action="' + deal.DT_RowData.toggle_route + '" \
                                                data-resource-name="' + deal.name + '"> \
                                                <i class="la la-toggle-'+ toggle +'"></i> Toggle-'+ toggle +'\
                                            </a>\
                                        </div>\
                                    </div>\
                                    <a href="'+ deal.DT_RowData.edit_route +'" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="Edit deal"><i class="la la-edit"></i>\
                                    </a>\
                                    <a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill destroy_resource" title="Destroy deal" \
                                        data-toggle="modal" \
                                        data-target="#confirm_destroy_deal" \
                                        data-form="#form_destroy_deal" \
                                        data-action="' + deal.DT_RowData.destroy_route + '" \
                                        data-resource-name="' + deal.name + '" \
                                    >\
                                        <i class="la la-trash"></i>\
                                    </a>\
                                ';
                            },
                        },
                       
                        {
                            field: 'name',
                            title: 'Name',
                            width: 150,
                            template: function(deal) {
                                var name = deal.name;
                                var image = deal.file_path > 0 ? deal.file_path : null;

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
                            field: 'distributor_requirement',
                            title: 'DR',
                            width: 75,
                            template: function(deal) {
                                var distributor_requirement = deal.distributor_requirement ? 1 : 0;
                                var statuses = {
                                    0: {'title': 'Not', 'class': ' m-badge--metal'},
                                    1: {'title': 'Requirement', 'class': 'm-badge--success'},
                                };

                                return '<span class="m-badge ' + statuses[distributor_requirement].class +
                                ' m-badge--wide">' + statuses[distributor_requirement].title + '</span>';
                            },
                        },
                        {
                            field: 'active',
                            title: 'Active',
                            width: 75,
                            template: function(deal) {
                                var active = deal.active ? 1 : 0;
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
                            template: function(deal) {
                                if (deal.creator != null) {
                                    var name = deal.creator.name;
                                    var image = deal.creator.file_path;

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
                            template: function (deal) {
                                if (deal.created_at == null) {
                                    return '';
                                }

                                return moment(deal.created_at).format('MMMM Do, YYYY @ hh:mm:ss A');
                            },
                        },
                        {
                            field: 'updater',
                            title: 'Updater',
                            width: 150,
                            template: function(deal) {
                                if (deal.updater != null) {
                                    var name = deal.updater.name;
                                    var image = deal.updater.file_path;

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
                            template: function(deal) {
                                if (deal.updated_at == null) {
                                    return '';
                                }

                                return moment(deal.updated_at).format('MMMM Do, YYYY @ hh:mm:ss A');
                            },
                        },
                    ],
                });

                $('select[id=distributor_requirement]').on('change', function() {
                    datatable.search($(this).val().toLowerCase(), 'distributor_requirement');
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