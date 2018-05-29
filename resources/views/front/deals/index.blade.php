@extends(user_env().'.layouts.main')

@section('styles')
    <style>
        div.deal {
            min-height: 600px;
            max-height: 600px;
        }
    </style>
@endsection

@section('content')
    @include(user_env().'.partials.breadcrumbs')

    <section class="page-content">
        <div class="page-wrapper">
            <div class="container">
                <div class="row">
                    <div class="page-inner">
                        <div id="page">
                            <div class="details">
                                <h3 class="text-center mb-5">
                                    <strong>
                                        <i>{!! $app['deals'] !!}</i>
                                    </strong>
                                </h3>

                                <h2 class="text-center mb-5">
                                    <i> CHOOSE BETWEEN RESELLER KITS AND DISTRIBUTOR PACKAGES </i>
                                </h2>

                                <div class="row">
                                    @foreach($deals as $index => $deal)
                                        <div class="col-md-4 col-sm-10 py-2 deal">
                                            <img src="{{ image_url($deal->images->first()) }}" alt="" class="w-100 px-2">

                                            <div class="p-2 w-100 text-center">
                                                <div class="mb-4">
                                                    <form method="POST" action="{{ route(user_env().'.reservation.cart.product.store', $deal) }}">
                                                        @csrf

                                                        <button type="submit" class="btn">
                                                            <i class="fa fa-plus"></i> Reserve
                                                        </button>
                                                    </form>
                                                </div>

                                                <div class="w-100 text-center">
                                                    <strong>{{ $deal->name }}</strong>
                                                </div>

                                                <div class="">
                                                    {!! str_limit($deal->description, 500) !!}
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <center>
                                            <a href="{{ route(user_env().'.tutorials.index') }}" title="Tutorials">
                                                <button class='btn btn-primary'>Tutorials</button>
                                            </a>
                                        </center>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection