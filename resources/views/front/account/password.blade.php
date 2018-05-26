@extends(user_env().'.layouts.main')

@section('content')
@extends(user_env().'.layouts.main')

@section('content')
    <section class="page-heading">
        <div class="page-heading-wrapper">
            <div class="container">
                <div class="row">
                    <div class="page-heading-inner">
                        <h1 class="page-title">
                            <span>My password </span>
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
                                <form method="POST" action="{{ route(user_env().'.account.password') }}">
                                    @method('PATCH')
                                    @csrf

                                    <!-- Old password -->
                                    <div class="clearfix large_form">
                                        <label for="old_password" class="label">
                                            Old password <span class="text-danger">*</span>
                                        </label>

                                        <input type="password" name="old_password" id="old_password" class="text"
                                            placeholder="Please enter your old password">

                                        @if ($errors->has('old_password'))
                                            <div class="mb-2 text-left">
                                                <span class="text-danger">{{ $errors->first('old_password') }}</span>
                                            </div>
                                        @endif
                                    </div>

                                    <!-- New password -->
                                    <div class="clearfix large_form">
                                        <label for="password" class="label">
                                            New password <span class="text-danger">*</span>
                                        </label>

                                        <input type="password" name="password" id="password" class="text"
                                            placeholder="Please enter a strong password">

                                        @if ($errors->has('password'))
                                            <div class="mb-2 text-left">
                                                <span class="text-danger">{{ $errors->first('password') }}</span>
                                            </div>
                                        @endif
                                    </div>

                                    <!-- New password confirmation -->
                                    <div class="clearfix large_form">
                                        <label for="password_confirmation" class="label">
                                            New password confirmation <span class="text-danger">*</span>
                                        </label>

                                        <input type="password" name="password_confirmation" id="password_confirmation" class="text"
                                            placeholder="Please enter your password one more time">

                                        @if ($errors->has('password_confirmation'))
                                            <div class="mb-2 text-left">
                                                <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
                                            </div>
                                        @endif
                                    </div>

                                    <div class="action_bottom">
                                        <input type="submit" class="btn" value="Update">
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
@endsection