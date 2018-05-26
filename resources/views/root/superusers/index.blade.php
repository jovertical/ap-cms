@extends('root.layouts.main')

@section('sidebar')
    @component('root.components.sidebar')
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
                        This is the list of superusers
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
                        <a href="{{ route(user_env('superusers.create')) }}" class="btn btn-primary m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill">
                            <span><i class="la la-plus"></i><span>New superuser</span></span>
                        </a>
                        <div class="m-separator m-separator--dashed d-xl-none"></div>
                    </div>
                </div>
            </div>
            <!--end: Search Form -->

            <!-- Superusers -->
            <div id="table" class="m-datatable"></div>
            <!--/. Superusers -->
        </div>
        <!--/. Portlet body -->
    </div>
    <!--/. Portlet -->

    <!-- Toggle Modal -->
    @component(user_env().'.components.modal')
        @slot('name')
            confirm-superuser-toggle
        @endslot

        <div class="text-wrapper"></div>

        <!-- Toggle Form -->
        <form method="POST" action="" id="form-superuser-toggle" style="display: none;">
            @method('PATCH')
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
                                url: '{!! route(user_env('superusers.datatables.index')) !!}',
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
                            template: function(superuser, index) {
                                return index + 1;
                            },
                        },
                        {
                            field: 'Actions',
                            width: 120,
                            title: 'Actions',
                            sortable: false,
                            overflow: 'visible',
                            template: function (superuser, index, datatable) {
                                var dropup = (datatable.getPageSize() - index) <= 4 ? 'dropup' : '';
                                var toggle = superuser.active ? 'off' : 'on';

                                return '\
                                    <div class="dropdown ' + dropup + '">\
                                        <a href="javascript:void(0);" class="btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" data-toggle="dropdown">\
                                            <i class="la la-ellipsis-h"></i>\
                                        </a>\
                                        <div class="dropdown-menu dropdown-menu-right">\
                                            <a href="'+ superuser.DT_RowData.image_route +'" class="dropdown-item">\
                                                <i class="la la-image"></i> Images\
                                            </a>\
                                            <a href="javascript:void(0);" class="dropdown-item superuser-toggle"\
                                                data-toggle="modal" \
                                                data-target="#confirm-superuser-toggle" \
                                                data-form="#form-superuser-toggle" \
                                                data-action="' + superuser.DT_RowData.toggle_route + '" \
                                                data-user-name="' + superuser.name + '"> \
                                                <i class="la la-toggle-'+ toggle +'"></i> Toggle-'+ toggle +'\
                                            </a>\
                                        </div>\
                                    </div>\
                                    <a href="'+ superuser.DT_RowData.edit_route +'" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="Edit details">\
                                        <i class="la la-edit"></i>\
                                    </a>\
                                ';
                            },
                        },
                        {
                            field: 'name',
                            title: 'Name',
                            width: 150,
                            template: function(superuser) {
                                var name = superuser.first_name + ' ' + superuser.last_name;
                                var image = superuser.file_path;

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
                            field: 'email',
                            title: 'Email',
                            width: 150
                        },
                        {
                            field: 'contact_number',
                            title: 'Contact',
                            width: 150
                        },
                        {
                            field: 'active',
                            title: 'Active',
                            width: 75,
                            template: function(superuser) {
                                var active = superuser.active ? 1 : 0;
                                var statuses = {
                                    0: {'title': 'Inactive', 'class': ' m-badge--metal'},
                                    1: {'title': 'Active', 'class': ' m-badge--success'},
                                };

                                return '<span class="m-badge ' + statuses[active].class +
                                ' m-badge--wide">' + statuses[active].title + '</span>';
                            },
                        },
                        {
                            field: 'birthdate',
                            title: 'Birthdate',
                            width: 100,
                            template: function(superuser) {
                                if (superuser.birthdate == null) {
                                    return '';
                                }

                                return moment(superuser.birthdate).format('MMMM Do, YYYY');
                            },
                        },
                        {
                            field: 'first_name',
                            title: 'Firstname',
                            width: 100,
                        },
                        {
                            field: 'middle_name',
                            title: 'Middlename',
                            width: 100,
                        },
                        {
                            field: 'last_name',
                            title: 'Lastname',
                            width: 100,
                        },
                        {
                            field: 'gender',
                            title: 'Gender',
                            width: 100,
                        },
                        {
                            field: 'address',
                            title: 'Address',
                            width: 350,
                        },
                        {
                            field: 'tin',
                            title: 'TIN',
                            width: 100,
                        },
                        {
                            field: 'occupation',
                            title: 'Occupation',
                            width: 100,
                        },
                        {
                            field: 'creator',
                            title: 'Creator',
                            width: 150,
                            template: function(superuser) {
                                if (superuser.creator != null) {
                                    var name = superuser.creator.name;
                                    var image = superuser.creator.file_path;

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
                            template: function (superuser) {
                                if (superuser.created_at == null) {
                                    return '';
                                }

                                return moment(superuser.created_at).format('MMMM Do, YYYY @ hh:mm:ss A');
                            },
                        },
                        {
                            field: 'updater',
                            title: 'Updater',
                            width: 150,
                            template: function(superuser) {
                                if (superuser.updater != null) {
                                    var name = superuser.updater.name;
                                    var image = superuser.updater.file_path;

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
                            template: function(superuser) {
                                if (superuser.updated_at == null) {
                                    return '';
                                }

                                return moment(superuser.updated_at).format('MMMM Do, YYYY @ hh:mm:ss A');
                            },
                        },
                    ],
                });

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

            // toggle
            $('#table').on('click', '.superuser-toggle', function(e) {
                e.preventDefault();

                var link = $(this);
                var modal = $(link.data('target'));
                var form = $(link.data('form'));
                var action = link.data('action');
                var user = {
                    'name': link.data('user-name')
                };

                // assign action to hidden form action attribute.
                form.attr({action: action});

                // assign message to text wrapper children element.
                $('.text-wrapper').html('\
                    <p class="text-center">\
                        You are updating the availability of \
                        <span class="m--font-boldest">' + user.name + ' </span>.\
                        Please note that they cannot use their account if it is set as inactive.\
                    </p>\
                ');

                modal.modal({ backdrop: 'static', keyboard: false}).on('click', '#btn-confirm', function() {
                    form.submit();
                });
            });
        });
    </script>
@endsection