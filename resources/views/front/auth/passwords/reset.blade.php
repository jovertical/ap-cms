@extends(user_env().'.layouts.main')

@section('content')
    <section class="page-heading">
        <div class="page-heading-wrapper">
            <div class="container">
                <div class="row">
                    <div class="page-heading-inner">
                        <h1 class="page-title">
                            <span>Reset Password</span>
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
                                <form method="POST" action="{{ route(user_env().'.password.reset', $token) }}">
                                    @csrf

                                    <!-- Password -->
                                    <div class="clearfix large_form">
                                        <label for="password" class="label">
                                            Password <span class="text-danger">*</span>
                                        </label>

                                        <input type="password" name="password" id="password" class="text"
                                            placeholder="Please enter your new password">

                                        @if ($errors->has('password'))
                                            <div class="mb-2 text-left">
                                                <span class="text-danger">{{ $errors->first('password') }}</span>
                                            </div>
                                        @endif
                                    </div>

                                    <!-- Password Confirmation -->
                                    <div class="clearfix large_form">
                                        <label for="password_confirmation" class="label">
                                            Password Confirmation <span class="text-danger">*</span>
                                        </label>

                                        <input type="password" name="password_confirmation" id="password_confirmation" class="text" placeholder="Please enter your new password one more time">

                                        @if ($errors->has('password_confirmation'))
                                            <div class="mb-2 text-left">
                                                <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
                                            </div>
                                        @endif
                                    </div>

                                    <div class="action_bottom">
                                        <input type="submit" class="btn" value="Reset">

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