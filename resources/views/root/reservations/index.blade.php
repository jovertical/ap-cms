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
                        This is the list of all <span class="m--font-boldest">Reservations</span>
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
                            <!-- Status -->
                            <div class="col-md-4">
                                <div class="m-form__group m-form__group--inline">
                                    <div class="m-form__label">
                                        <label>Status:</label>
                                    </div>
                                    <div class="m-form__control">
                                        <select class="form-control m-bootstrap-select" id="status">
                                            <option value="">All</option>
                                            <option value="3">Success</option>
                                            <option value="2">Reserved</option>
                                            <option value="1">Pending</option>
                                            <option value="0">Cancelled</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="d-md-none m--margin-bottom-10"></div>
                            </div>
                            <!--/. Status -->

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
                                url: '{!! route(user_env().'.reservations.datatables.index') !!}',
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
                            template: function(reservation, index) {
                                return index + 1;
                            },
                        },
                        {
                            field: 'Actions',
                            width: 120,
                            title: 'Actions',
                            sortable: false,
                            overflow: 'visible',
                            template: function (reservation, index, datatable) {
                                var dropup = (datatable.getPageSize() - index) <= 4 ? 'dropup' : '';

                                return '\
                                    <a href="'+ reservation.DT_RowData.show_route +'" class="m-portlet__nav-link \
                                        btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" \
                                        title="Edit product"><i class="la la-eye"></i>\
                                    </a>\
                                ';
                            },
                        },
                        {
                            field: 'products',
                            title: 'Products',
                            width: 75,
                            template: function(reservation) {
                                if (reservation.products != null) {
                                    return reservation.products.length;
                                }

                                return 0;
                            }
                        },
                        {
                            field: 'amount_payable',
                            title: 'Amount payable',
                            width: 150,
                            template: function(reservation, index) {
                                return '₱' + reservation.amount_payable;
                            },
                        },
                        {
                            field: 'amount_paid',
                            title: 'Amount paid',
                            width: 150,
                            template: function(reservation, index) {
                                return '₱' + reservation.amount_paid;
                            },
                        },
                        {
                            field: 'status',
                            title: 'Status',
                            width: 100,
                            template: function(reservation, index) {
                                var code = reservation.status_code;
                                var statuses = {
                                    0: {'title': 'Cancelled', 'class': ' m-badge--danger'},
                                    1: {'title': 'Pending', 'class': ' m-badge--warning'},
                                    2: {'title': 'Reserved', 'class': ' m-badge--info'},
                                    3: {'title': 'Success', 'class': ' m-badge--success'}
                                };

                                return '<span class="m-badge '+ statuses[code].class +' m-badge--wide text-white">' +
                                    statuses[code].title + '</span>';
                            },
                        },
                        {
                            field: 'creator',
                            title: 'Creator',
                            width: 150,
                            template: function(reservation) {
                                if (reservation.creator != null) {
                                    var name = reservation.creator.name;
                                    var image = reservation.creator.file_path;

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
                            template: function (reservation) {
                                if (reservation.created_at == null) {
                                    return '';
                                }

                                return moment(reservation.created_at).format('MMMM Do, YYYY @ hh:mm:ss A');
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
                            template: function(reservation) {
                                if (reservation.updated_at == null) {
                                    return '';
                                }

                                return moment(reservation.updated_at).format('MMMM Do, YYYY @ hh:mm:ss A');
                            },
                        },
                ],
                });

                $('select[id=status]').on('change', function() {
                    datatable.search($(this).val().toLowerCase(), 'status');
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