@extends(user_env().'.layouts.main')

@section('content')
    @include(user_env().'.partials.breadcrumbs')

    <section class="search-content">
        <div class="search-content-wrapper">
            <div class="container">
                <div class="row">
                    <div class="search-content-inner">
                        <div id="search">
                            <div class="expanded-message">
                                <h2>
                                    Search for a place near you.
                                </h2>

                                @if ($address = Request::get('a'))
                                    <span class="subtext">
                                        Your search: <strong>{{ $address }}</strong>
                                        has found <strong>{{ $distributors->total() }}</strong> result(s).
                                    </span>
                                @endif

                                <div class="search-field">
                                    <form method="GET" action="{{ route(user_env().'.distributors.index') }}" class="search" style="position: relative;">
                                        <input type="text" name="a" class="search_box" placeholder="e.g. Manila"
                                            value="{{ $address }}">
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- /#search -->
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="collection-content">
        <div class="collection-wrapper">
            <div class="container">
                <div class="row">
                    <div class="collection-inner">
                        <div id="collection">
                            <!-- Archives -->
                            <div class="col-sm-3 sidebar">
                                @include(user_env().'.partials.sidebar')
                            </div>

                            <!-- Distributors -->
                            <div class="collection-mainarea col-sm-9 clearfix">
                                <div class="collection-items clearfix full_width ListMode">
                                    <div class="products">
                                        @foreach($distributors as $index => $distributor)
                                            @include(user_env().'.distributors.distributor')
                                        @endforeach
                                    </div>
                                </div>


                                <div class="collection-bottom-toolbar">
                                    <div class="product-counter col-sm-6">
                                        Showing {{ $distributors->count() }} of {{ $distributors->total() }} total distributors.
                                    </div>

                                    {{ $distributors->appends(Request::all())->links(user_env().'.components.pagination') }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection