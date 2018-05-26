@extends(user_env().'.layouts.main')

@section('styles')
	<style>
		input.capitalize, textarea.capitalize, select.capitalize{
			text-transform: uppercase;
		}
	</style>
@endsection

@section('content')
    <section class="page-heading">
        <div class="page-heading-wrapper">
            <div class="container">
                <div class="row">
                    <div class="page-heading-inner">
                        <h1 class="page-title">
                            <span>Be a distributor!</span>
                        </h1>
                    </div>
                </div>
            </div>
        </div>
    </section>

	<section class="register-content">
		<div class="register-wrapper">
			<div class="container">
				<div class="row">
					<div class="register-inner">
						<div id="customer-register">
							<div id="register">
								<form method="POST" action="{{ route(user_env().'.register') }}" novalidate>
									@csrf

									<!-- Firstname -->
									<div class="clearfix large_form">
										<label for="first_name" class="label">
											Firstname <span class="text-danger">*</span>
										</label>

										<input type="text" name="first_name" id="first_name" class="text capitalize"
											value="{{ old('first_name') }}" required>

										@if ($errors->has('first_name'))
											<div class="mb-2 text-left">
												<span class="text-danger">{{ $errors->first('first_name') }}</span>
											</div>
										@endif
									</div>

									<!-- Lastname -->
									<div class="clearfix large_form">
										<label for="last_name" class="label">
											Lastname <span class="text-danger">*</span>
										</label>

										<input type="text" name="last_name" id="last_name" class="text capitalize"
											value="{{ old('last_name') }}" required>

										@if ($errors->has('last_name'))
											<div class="mb-2 text-left">
												<span class="text-danger">{{ $errors->first('last_name') }}</span>
											</div>
										@endif
									</div>

									<!-- Birthdate -->
									<div class="clearfix large_form">
										<label for="birthdate" class="label">
											Birthdate <span class="text-danger">*</span>
										</label>

										<input type="text" name="birthdate" id="birthdate" class="text"
											value="{{ old('birthdate') }}" data-inputmask="'alias': 'date'" required>

										@if ($errors->has('birthdate'))
											<div class="mb-2 text-left">
												<span class="text-danger">{{ $errors->first('birthdate') }}</span>
											</div>
										@endif
									</div>

                                    <!-- Province -->
                                    <div class="clearfix large_form">
										<p class="field">
											<label for="province" class="label">
												Province <span class="text-danger">*</span>
											</label>

											<select name="province" id="province" class="select capitalize"
												data-old="{{ old('province') }}">
											</select>
										</p>

										@if ($errors->has('province'))
											<div class="mb-2 text-left">
												<span class="text-danger">{{ $errors->first('province') }}</span>
											</div>
										@endif
									</div>

									<!-- City -->
									<div class="clearfix large_form">
										<p class="field">
											<label for="city" class="label">
												City <span class="text-danger">*</span>
											</label>

											<select name="city" id="city" class="select capitalize" disabled="true"
												data-old="{{ old('city') }}">
											</select>
										</p>

										@if ($errors->has('city'))
											<div class="mb-2 text-left">
												<span class="text-danger">{{ $errors->first('city') }}</span>
											</div>
										@endif
									</div>

									<!-- District -->
									<div class="clearfix large_form">
										<p class="field">
											<label for="district" class="label">
												District <span class="text-danger">*</span>
											</label>

											<select name="district" id="district" class="select capitalize" disabled="true"
												data-old="{{ old('district') }}">
											</select>
										</p>

										@if ($errors->has('district'))
											<div class="mb-2 text-left">
												<span class="text-danger">{{ $errors->first('district') }}</span>
											</div>
										@endif
									</div>

									<!-- Contact number -->
									<div class="clearfix large_form">
										<label for="contact_number" class="label">
											Contact number <span class="text-danger">*</span>
										</label>

										<input type="text" name="contact_number" id="contact_number" class="text"
											value="{{ old('contact_number') }}" placeholder="We would love to contact you back" required>

										@if ($errors->has('contact_number'))
											<div class="mb-2 text-left">
												<span class="text-danger">{{ $errors->first('contact_number') }}</span>
											</div>
										@endif
									</div>

									<!-- Tax identification no. (TIN) -->
									<div class="clearfix large_form">
										<label for="tin" class="label">
											Tax identification no. (TIN) <span class="text-danger">*</span>
										</label>

										<input type="text" name="tin" id="tin" class="text"
											value="{{ old('tin') }}" placeholder="Please enter your TIN" required>

										@if ($errors->has('tin'))
											<div class="mb-2 text-left">
												<span class="text-danger">{{ $errors->first('tin') }}</span>
											</div>
										@endif
									</div>

									<!-- Occupation -->
									<div class="clearfix large_form">
										<label for="occupation" class="label">
											Occupation <span class="text-danger">*</span>
										</label>

										<input type="text" name="occupation" id="occupation" class="text capitalize"
											value="{{ old('occupation') }}" required>

										@if ($errors->has('occupation'))
											<div class="mb-2 text-left">
												<span class="text-danger">{{ $errors->first('occupation') }}</span>
											</div>
										@endif
									</div>

									<!-- Email -->
									<div class="clearfix large_form">
										<label for="email" class="label">
											Email <span class="text-danger">*</span>
										</label>

										<input type="email" name="email" id="email" class="text" value="{{ old('email') }}"
											placeholder="Your privacy is our priority" required>

										@if ($errors->has('email'))
											<div class="mb-2 text-left">
												<span class="text-danger">{{ $errors->first('email') }}</span>
											</div>
										@endif
									</div>

									<!-- Password -->
									<div class="clearfix large_form">
										<label for="password" class="label">
											Password <span class="text-danger">*</span>
										</label>

										<input type="password" name="password" id="password" class="text"
											placeholder="Please enter a strong password" required>

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

										<input type="password" name="password_confirmation" id="password_confirmation" class="text" placeholder="Please enter your password one more time" required>

										@if ($errors->has('password_confirmation'))
											<div class="mb-2 text-left">
												<span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
											</div>
										@endif
									</div>

									<div class="action_bottom">
										<p class="note">
											<input type="checkbox" name="agree" id="agree"
												value="1" {{ old('agree') ? 'checked' : '' }} required>
											I have read &amp; understood <a href="#">Terms &amp; Conditions</a> on the use if this website.
											I agree to be bound by all the provisions therein <a href="#">Terms &amp; Conditions</a>.

											@if ($errors->has('agree'))
												<div class="mb-2 text-left">
													<span class="text-danger">{{ $errors->first('agree') }}</span>
												</div>
											@endif
										</p>

										<input type="submit" class="btn" value="Register" /> or

										<span class="note">
											<a href="{{ route(user_env().'.login') }}">Already have an account?</a>
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

@section('scripts')
	<script src="/front/vendors/inputmask/js/inputmask.js"></script>
	<script src="/front/vendors/inputmask/js/inputmask.extensions.js"></script>
	<script src="/front/vendors/inputmask/js/inputmask.numeric.extensions.js"></script>
	<script src="/front/vendors/inputmask/js/inputmask.date.extensions.js"></script>
	<script src="/front/vendors/inputmask/js/inputmask.phone.extensions.js"></script>
	<script src="/front/vendors/inputmask/js/jquery.inputmask.js"></script>
	<script src="/front/vendors/inputmask/js/phone-codes/phone.js"></script>
	<script src="/front/vendors/inputmask/js/phone-codes/phone-be.js"></script>
	<script src="/front/vendors/inputmask/js/phone-codes/phone-ru.js"></script>

	<script>
		$("input#birthdate").inputmask("9999-99-99", {
			"placeholder": "yyyy-mm-dd",
			"clearIncomplete": true
		});

		$("input#tin").inputmask("999-999-999", {
			"placeholder": "***-***-***",
			"clearIncomplete": true
		});

		var select_province = $('select#province');
		var select_city = $('select#city');
		var select_district = $('select#district');

		var get_provinces_request = function () {
			$.ajax({
				type: 'GET',
				url: '/addressess',
				dataType: 'json',
				data: {
					level: 'provinces'
				},
				success: function (provinces) {
					provinces.forEach(function(province, index) {
						var selected_province = province.name == select_province.data('old') ? 'selected' : '';

						if (index == 0) {
							select_province.html("<option disabled selected>Please select your province</option>");
						}

						select_province.append(
							'<option value="'+ province.name +'" \
							 	data-code="'+province.code+'" \
								'+ selected_province +'> \
								'+ province.name +' \
							</option>'
						);
					});

					if (select_province.data('old').length == 0) {
						select_province.find('option:eq(0)').prop('selected', true);
					}
				}
			});
		}

		var get_cities_request = function () {
			$.ajax({
				type: 'GET',
				url: '/addressess',
				dataType: 'json',
				data: {
					level: 'cities',
					code: select_province.find('option:selected').data('code')
				},
				success: function (cities) {
					cities.forEach(function(city, index) {
						var selected_city = city.name == select_city.data('old') ? 'selected' : '';

						if (index == 0) {
							select_city.html("<option disabled selected>Please select your city</option>");
						}

						select_city.append(
							'<option value="'+ city.name +'" \
							 	data-code="'+city.code+'" \
								'+ selected_city +'> \
								'+ city.name +' \
							</option>'
						);
					});

					if (select_city.data('old').length == 0) {
						select_city.find('option:eq(0)').prop('selected', true);
					}
				}
			});
		}

		var get_districts_request = function () {
			$.ajax({
				type: 'GET',
				url: '/addressess',
				dataType: 'json',
				data: {
					level: 'districts',
					code: select_city.find('option:selected').data('code')
				},
				success: function (districts) {
					districts.forEach(function(district, index) {
						var selected_district = district.name == select_district.data('old') ? 'selected' : '';

						if (index == 0) {
							select_district.html("<option disabled selected>Please select your district</option>");
						}

						select_district.append(
							'<option value="'+ district.name +'" \
							 	data-code="'+district.code+'" \
								'+ selected_district +'> \
								'+ district.name +' \
							</option>'
						);
					});

					if (select_district.data('old').length == 0) {
						select_district.find('option:eq(0)').prop('selected', true);
					}
				}
			});
		}

		$(document).ready(function(e) {
			get_provinces_request();

			select_province.on('change', function(e) {
				select_city.attr('disabled', false);
				select_district.attr('disabled', true);

				get_cities_request();

				select_city.find('option:eq(0)').prop('selected', true);
				select_district.find('option:eq(0)').prop('selected', true);
			});

			select_city.on('change', function(e) {
				select_district.attr('disabled', false);

				select_district.find('option:eq(0)').prop('selected', true);

				get_districts_request();
			});
		});
	</script>
@endsection