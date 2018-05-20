@extends(user_env().'.layouts.main')

@section('content')
    <section class="page-heading">
        <div class="page-heading-wrapper">
            <div class="container">
                <div class="row">
                    <div class="page-heading-inner">
                        <h1 class="page-title">
                            <span>Forgot Password?</span>
                        </h1>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="login-content">
        <div class="login-content-wrapper">
            <div class="container">
                <div class="row">
                    <div class="login-content-inner">
                        <div id="customer-login">
                            <div id="login">
                                <p class="note">We will send you an email to reset your password.</p>

                                <form method="POST" action="{{ route(user_env().'.password.email') }}">
                                    @csrf

                                    <!-- Email -->
                                    <div class="clearfix large_form">
                                        <label for="email" class="label">
                                            Email <span class="text-danger">*</span>
                                        </label>

                                        <input type="email" name="email" id="email" class="text" value="{{ old('email') }}"
                                            placeholder="Please enter your email">

                                        @if ($errors->has('email'))
                                            <div class="mb-2 text-left">
                                                <span class="text-danger">{{ $errors->first('email') }}</span>
                                            </div>
                                        @endif
                                    </div>

                                    <div class="action_bottom">
                                        <input type="submit" class="btn" value="Send link">

                                        <span class="note">
                                            <a href="{{ route(user_env().'.login') }}">Back to login.</a>
                                        </span>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection