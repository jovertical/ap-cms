@extends(user_env().'.layouts.main')

@section('content')
    @include(user_env().'.partials.breadcrumbs')

    <section class="contact_banner_show-content">
        <div class="blcontact_banner_showog-wrapper">
            <div class="container">
                <div class="row">
                    <div class="contact_banner_show-inner">
                        <div id="page">

                            <div class="page-with-contact-form">
                                <div class="contact-detail col-md-6">
                                    <h2>Our Address</h2>
                                    <p>{!! $app['address'] !!} </p>
                                    <ul class="contact-info">
                                        <li>
                                            <span class="left-area icon-mobile icon">
                                                <i class="fa fa-mobile"></i>
                                            </span>
                                            <div class="righ-area">
                                                <span>{{$app['phone_number_1']}}</span>
                                            </div>
                                        </li>
                                        <li>
                                            <span class="left-area icon-mobile icon">
                                                <i class="fa fa-phone"></i>
                                            </span>
                                            <div class="righ-area">
                                                <span>{{$app['phone_number_2']}}</span>
                                            </div>
                                        </li>
                                        <li>
                                            <span class="left-area icon-email icon">
                                                <i class="fa fa-envelope-o"></i>
                                            </span>
                                            <div class="righ-area">
                                                <span>{{$app['facebook_url']}}</span>
                                            </div>
                                        </li>
                                        <li>
                                            <span class="left-area icon-email icon">
                                                <i class="fa fa-envelope-o"></i>
                                            </span>
                                            <div class="righ-area">
                                                <span>{{$app['twitter_url']}}</span>
                                            </div>
                                        </li>
                                        <li>
                                            <span class="left-area icon-email icon">
                                                <i class="fa fa-envelope-o"></i>
                                            </span>
                                            <div class="righ-area">
                                                <span>{{$app['instagram_url']}}</span>
                                            </div>
                                        </li>

                                        <li>
                                            <span class="left-area icon-time icon">
                                                <i class="fa fa-calendar"></i>
                                            </span>
                                            <div class="righ-area">
                                                <span>From Monday to Friday</span>
                                                <span>9.00 a.m to 5:00 p.m</span>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="contact-form col-md-6">
                                    <h2>We will contact you back</h2>

                                    <form method="POST" action="{{ route(user_env().'.message.store') }}"
                                        id="contact_form" class="contact-form">
                                        @csrf

                                        <div id="contactFormWrapper">
                                            <!-- Name -->
                                            <p>
                                                <label for="name">
                                                    Name
                                                </label>

                                                <br>

                                                <input type="text" name="name" id="name" class="text"
                                                    value="{{ old('name') }}">

                                                @if ($errors->has('name'))
                                                    <div class="mb-2 text-left">
                                                        <span class="text-danger">{{ $errors->first('name') }}</span>
                                                    </div>
                                                @endif
                                            </p>

                                            <!-- Email -->
                                            <p>
                                                <label for="email">
                                                    Email <span class="text-danger">*</span>
                                                </label>

                                                <br>

                                                <input type="email" name="email" id="email" class="text"
                                                    value="{{ old('email') }}" required>

                                                @if ($errors->has('email'))
                                                    <div class="mb-2 text-left">
                                                        <span class="text-danger">{{ $errors->first('email') }}</span>
                                                    </div>
                                                @endif
                                            </p>


                                            <!-- Contact number -->
                                            <p>
                                                <label for="contact_number">
                                                    Contact number
                                                </label>

                                                <br>

                                                <input type="text" name="contact_number" id="contact_number" class="text"
                                                    value="{{ old('contact_number') }}">

                                                @if ($errors->has('contact_number'))
                                                    <div class="mb-2 text-left">
                                                        <span class="text-danger">{{ $errors->first('contact_number') }}</span>
                                                    </div>
                                                @endif
                                            </p>

                                            <p>
                                                <label for="body">
                                                    Message <span class="text-danger">*</span>
                                                </label>

                                                <br>

                                                <textarea name="body" id="body" rows="15" cols="75" ></textarea>
                                            </p>

                                            <!-- Submit -->
                                            <p>
                                                <input type="submit"class="btn" value="Send">
                                            </p>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
