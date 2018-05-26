@extends(user_env().'.layouts.main')

@section('content')
    <section class="page-heading">
        <div class="page-heading-wrapper">
            <div class="container">
                <div class="row">
                    <div class="page-heading-inner">
                        <h1 class="page-title">
                            <span>My profile </span>
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
                                <form method="POST" action="{{ route(user_env().'.account.profile') }}">
                                    @method('PATCH')
                                    @csrf

                                    <!-- Firstname -->
									<div class="clearfix large_form">
                                        <label for="first_name" class="label">
                                            Firstname <span class="text-danger">*</span>
                                        </label>

                                        <input type="text" name="first_name" id="first_name" class="text capitalize"
                                            value="{{ old('first_name') ?? $user->first_name }}" required>

                                        @if ($errors->has('first_name'))
                                            <div class="mb-2 text-left">
                                                <span class="text-danger">{{ $errors->first('first_name') }}</span>
                                            </div>
                                        @endif
                                    </div>

                                    <!-- Middlename -->
									<div class="clearfix large_form">
                                        <label for="middle_name" class="label">
                                            Middlename
                                        </label>

                                        <input type="text" name="middle_name" id="middle_name" class="text capitalize"
                                            value="{{ old('middle_name') ?? $user->middle_name }}">

                                        @if ($errors->has('middle_name'))
                                            <div class="mb-2 text-left">
                                                <span class="text-danger">{{ $errors->first('middle_name') }}</span>
                                            </div>
                                        @endif
                                    </div>

                                    <!-- Lastname -->
                                    <div class="clearfix large_form">
                                        <label for="last_name" class="label">
                                            Lastname <span class="text-danger">*</span>
                                        </label>

                                        <input type="text" name="last_name" id="last_name" class="text capitalize"
                                            value="{{ old('last_name') ?? $user->last_name }}" required>

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
                                            value="{{ old('birthdate') ?? $user->birthdate }}"
                                                data-inputmask="'alias': 'date'" required>

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
                                                data-old="{{ old('province') ?? explode('|', $user->address)[0] }}">
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
                                                data-old="{{ old('city') ?? explode('|', $user->address)[1] }}">
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
                                                data-old="{{ old('district') ?? explode('|', $user->address)[2] }}">
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
                                            value="{{ old('contact_number') ?? $user->contact_number }}"
                                                placeholder="We would love to contact you back" required>

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
                                            value="{{ old('tin') ?? $user->tin }}" placeholder="Please enter your TIN" required>

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
                                            value="{{ old('occupation') ?? $user->occupation }}" required>

                                        @if ($errors->has('occupation'))
                                            <div class="mb-2 text-left">
                                                <span class="text-danger">{{ $errors->first('occupation') }}</span>
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
						var selected_province = province.name.toLowerCase() ==
                            select_province.data('old').toLowerCase() ? 'selected' : '';

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
						var selected_city = city.name.toLowerCase() ==
                            select_city.data('old').toLowerCase() ? 'selected' : '';

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
						var selected_district = district.name.toLowerCase() ==
                            select_district.data('old').toLowerCase() ? 'selected' : '';

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

            if (! select_province.find('option:eq(0)').prop('selected')) {
				select_city.attr('disabled', false);

				get_cities_request();
            }

            if (! select_city.find('option:eq(0)').prop('selected')) {
				select_district.attr('disabled', false);

				get_districts_request();
            }

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