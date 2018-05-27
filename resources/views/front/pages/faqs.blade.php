@extends(user_env('layouts.main'))

@section('content')
<!-- Main Content -->
<div id="main-content" class="wrapper clearfix">
    @include(user_env().'.partials.breadcrumbs')

    <section class="page-content">
        <div class="page-wrapper">
            <div class="container">
                <div class="row">
                    <div class="page-inner">
                        <div id="page">
                            <div class="details">

                                <div class="content">
                                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                        <div class="panel panel-default">
                                            <div class="panel-heading" role="tab" id="headingOne">
                                                <h4 class="panel-title">
                                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                        What is a Distributor and what are its roles?
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                                <div class="panel-body">
                                                    See how it works here:
                                                    <br>
                                                    <a href="{{ route(user_env().'.getstarted') }}" title="Get Started">
                                                        <u>{{ route(user_env().'.getstarted') }}</u>
                                                    </a>
                                                    <br>
                                                    <a href="{{ route(user_env().'.sellaura') }}" title="Sell AuraRich">
                                                        <u>{{ route(user_env().'.sellaura') }}</u>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel panel-default">
                                            <div class="panel-heading" role="tab" id="headingTwo">
                                                <h4 class="panel-title">
                                                    <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                        How can I be a Distributor?
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                                <div class="panel-body">
                                                    See how it works here:
                                                    <br>
                                                    <a href="{{ route(user_env().'.howitworks') }}" title="How it works">
                                                        <u>{{ route(user_env().'.howitworks') }}</u>
                                                    </a>
                                                    <br>
                                                    <a href="{{ route(user_env().'.sellaura') }}" title="Sell AuraRich">
                                                        <u>{{ route(user_env().'.sellaura') }}</u>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel panel-default">
                                            <div class="panel-heading" role="tab" id="headingThree">
                                                <h4 class="panel-title">
                                                    <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                        Where can I buy AuraRich products?
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                                                <div class="panel-body">
                                                    For purchasing products go here:
                                                    <br>
                                                    <a href="{{ route(user_env().'.products.index') }}" title="Products">
                                                        <u>{{ route(user_env().'.products.index') }}</u>
                                                    </a>
                                                    <br>
                                                    <a href="{{ route(user_env().'.distributors.index') }}" title="Get Started">
                                                        <u>{{ route(user_env().'.distributors.index') }}</u>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel panel-default">
                                            <div class="panel-heading" role="tab" id="headingFour">
                                                <h4 class="panel-title">
                                                    <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                                        Is my data protected?
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
                                                <div class="panel-body">
                                                    Yes, Aurarich website is secured. You can check it at the top of the page near the address bar.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel panel-default">
                                            <div class="panel-heading" role="tab" id="headingFive">
                                                <h4 class="panel-title">
                                                    <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                                        What are the modes of payment in this website?
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="collapseFive" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFive">
                                                <div class="panel-body">
                                                    Bank to Bank and Paypal.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel panel-default">
                                            <div class="panel-heading" role="tab" id="headingSix">
                                                <h4 class="panel-title">
                                                    <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                                        Do I receive an invoice for my order?
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="collapseSix" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingSix">
                                                <div class="panel-body">
                                                    Yes, as part of the Paypal integration, there will be an invoice that will be generated and can be viewed in your account.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel panel-default">
                                            <div class="panel-heading" role="tab" id="headingSv">
                                                <h4 class="panel-title">
                                                    <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseSv" aria-expanded="false" aria-controls="collapseSv">
                                                        Where can I claim my orders?
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="collapseSv" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingSv">
                                                <div class="panel-body">
                                                    You can claim your orders via CODs or you can go directly to our branch.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel panel-default">
                                            <div class="panel-heading" role="tab" id="heading8">
                                                <h4 class="panel-title">
                                                    <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse8" aria-expanded="false" aria-controls="collapse8">
                                                        What are the products available in Aurarich Philippines?
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="collapse8" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading8">
                                                <div class="panel-body">
                                                    See Products page for more details:
                                                    <a href="{{ route(user_env().'.products.index') }}" title="Products">
                                                        <u>{{ route(user_env().'.products.index') }}</u>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel panel-default">
                                            <div class="panel-heading" role="tab" id="heading10">
                                                <h4 class="panel-title">
                                                    <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse10" aria-expanded="false" aria-controls="collapse10">
                                                        How do I create my account?
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="collapse10" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading10">
                                                <div class="panel-body">
                                                    You can create your account and sign in as a Distributor here :
                                                    <a href="{{ route(user_env().'.getstarted') }}" title="Get Started">
                                                        <u>{{ route(user_env().'.getstarted') }}</u>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <script>
                                        jQuery(function ($) {
                                            var $active = $('#accordion .panel-collapse.in').prev().addClass(
                                                'active');
                                            $active.find('a').prepend('<i class="fa-icon fa fa-angle-up"></i> ');
                                            $('#accordion .panel-heading').not($active).find('a').prepend(
                                                '<i class="fa-icon fa fa-angle-down"></i> ');
                                            $('#accordion').on('show.bs.collapse', function (e) {
                                                $('#accordion .panel-heading.active').removeClass(
                                                    'active').find('.fa-icon').toggleClass(
                                                    'fa fa-angle-down fa fa-angle-up');
                                                $(e.target).prev().addClass('active').find('.fa-icon').toggleClass(
                                                    'fa fa-angle-down fa fa-angle-up');
                                            })
                                        });
                                    </script>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @endsection
