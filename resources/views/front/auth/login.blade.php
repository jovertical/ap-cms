@extends(user_env().'.layouts.main')

@section('content')
    <section class="page-heading">
        <div class="page-heading-wrapper">
            <div class="container">
                <div class="row">
                    <div class="page-heading-inner">
                        <h1 class="page-title">
                            <span>Welcome back!</span>
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
								<form method="POST" action="{{ route(user_env().'.login') }}">
									@csrf

									<!-- Name -->
									<div class="clearfix large_form">
										<label for="name" class="label">
											Username <span class="text-danger">*</span>
										</label>

										<input type="text" name="name" id="name" class="text" value="{{ old('name') }}"
											placeholder="Username or email">

										@if ($errors->has('name'))
											<div class="mb-2 text-left">
												<span class="text-danger">{{ $errors->first('name') }}</span>
											</div>
										@endif
									</div>

									<!-- Password -->
									<div class="clearfix large_form">
										<label for="password" class="label">
											Password <span class="text-danger">*</span>
										</label>

										<input type="password" name="password" id="password" class="text">

										@if ($errors->has('password'))
											<div class="mb-2 text-left">
												<span class="text-danger">{{ $errors->first('password') }}</span>
											</div>
										@endif
									</div>

									<div class="text-right">
										<a href="{{ route(user_env().'.password.request') }}">Forgot Password?</a>
									</div>

									<div class="action_bottom">
										<input type="submit" class="btn" value="Login">

										<span class="note">
											<a href="{{ route(user_env().'.register') }}">Create an account.</a>
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