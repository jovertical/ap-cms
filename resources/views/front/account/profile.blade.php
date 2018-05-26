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

                                        <input type="text" name="first_name" id="first_name" class="text"
                                            value="{{ old('first_name') ?? $user->first_name }}" placeholder="Your firstname">

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

                                        <input type="text" name="middle_name" id="middle_name" class="text"
                                            value="{{ old('middle_name') ?? $user->middle_name }}" placeholder="Your middlename">

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

                                        <input type="text" name="last_name" id="last_name" class="text"
                                            value="{{ old('last_name') ?? $user->last_name }}" placeholder="Your lastname">

                                        @if ($errors->has('last_name'))
                                            <div class="mb-2 text-left">
                                                <span class="text-danger">{{ $errors->first('last_name') }}</span>
                                            </div>
                                        @endif
                                    </div>

                                    <!-- Birthdate -->
                                    <div class="clearfix large_form">
                                        <label for="birthdate" class="label">
                                            Birthdate
                                        </label>

                                        <input type="text" name="birthdate" id="birthdate" class="text"
                                            value="{{ old('birthdate') ?? $user->birthdate }}" placeholder="Your birthdate">

                                        @if ($errors->has('birthdate'))
                                            <div class="mb-2 text-left">
                                                <span class="text-danger">{{ $errors->first('birthdate') }}</span>
                                            </div>
                                        @endif
                                    </div>

                                    <!-- Gender -->
                                    <div class="clearfix large_form">
                                        <p class="field">
                                        <label for="birthdate" class="label">
                                            Gender
                                        </label>

                                        <select name="gender" id="gender" class="select">
                                            <option value="" disabled selected>Please select gender</option>
                                            <option value="male" {{ strtolower(old('gender') ?? $user->gender) ==
                                                'male' ? 'selected' : '' }}>Male</option>
                                            <option value="female" {{ strtolower(old('gender') ?? $user->gender) ==
                                                'female' ? 'selected' : '' }}>Female</option>
                                        </select>
                                    </p>

                                        @if ($errors->has('gender'))
                                            <div class="mb-2 text-left">
                                                <span class="text-danger">{{ $errors->first('gender') }}</span>
                                            </div>
                                        @endif
                                    </div>

                                    <!-- Address -->
                                    <div class="clearfix large_form">
                                        <label for="address" class="label">
                                            Address <span class="text-danger">*</span>
                                        </label>

                                        <input type="text" name="address" id="address" class="text"
                                            value="{{ old('address') ?? $user->address }}" placeholder="Your address">

                                        @if ($errors->has('address'))
                                            <div class="mb-2 text-left">
                                                <span class="text-danger">{{ $errors->first('address') }}</span>
                                            </div>
                                        @endif
                                    </div>

                                    <!-- Contact number -->
                                    <div class="clearfix large_form">
                                        <label for="address" class="label">
                                            Contact number <span class="text-danger">*</span>
                                        </label>

                                        <input type="text" name="contact_number" id="contact_number" class="text"
                                            value="{{ old('contact_number') ?? $user->contact_number }}"
                                                placeholder="Your contact number">

                                        @if ($errors->has('contact_number'))
                                            <div class="mb-2 text-left">
                                                <span class="text-danger">{{ $errors->first('contact_number') }}</span>
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