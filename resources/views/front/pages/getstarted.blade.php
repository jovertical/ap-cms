@extends(user_env('layouts.main'))

@section('content')

  <div id="main-content" class="wrapper clearfix">           
    <section class="page-heading">
  <div class="page-heading-wrapper">
    <div class="container">
      <div class="row">
        <div class="page-heading-inner">
          <h1 class="page-title"><span>Get Started</span></h1>
          <div class="breadcrumb clearfix">
            <span itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a href="{{ route(user_env().'.home') }}" title="Cosmetics Style 2" itemprop="url"><span itemprop="title">Home</span></a></span>
            <span class="arrow-space">&#62;</span>
            <span itemscope itemtype="http://data-vocabulary.org/Breadcrumb">
              <a href="{{ route(user_env().'.getstarted') }}" title="Get Started">Get Started</a>

            </span> <br> 
                  
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="page-content">
  <div class="page-wrapper">
    <div class="container">
      <div class="row">
        <div class="page-inner">
          <div id="page">
            <div class="details">              
<b>
<br>
Now that you’ve made the decision to become an AuraRich Reseller or Distributor, please fill out the information below to secure your slot and pre-order discounts. 
<br><br><br>
<section class="register-content">
    <div class="register-wrapper">
      <div class="container">
        <div class="row">
          <div class="register-inner">
            <div id="customer-register">
              <div id="register">
                <form method="POST" action="{{ route(user_env().'.register') }}">
                  @csrf

                  <!-- Firstname -->
                  <div class="clearfix large_form">
                    <label for="first_name" class="label">
                      Firstname <span class="text-danger">*</span>
                    </label>

                    <input type="text" name="first_name" id="first_name" class="text"
                      value="{{ old('first_name') }}" placeholder="Please enter your firstname" required>

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

                    <input type="text" name="last_name" id="last_name" class="text"
                      value="{{ old('last_name') }}" placeholder="Please enter your lastname" required>

                    @if ($errors->has('last_name'))
                      <div class="mb-2 text-left">
                        <span class="text-danger">{{ $errors->first('last_name') }}</span>
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

                  <!-- Address -->
                  <div class="clearfix large_form">
                    <label for="address" class="label">
                      Address <span class="text-danger">*</span>
                    </label>

                    <input type="text" name="address" id="address" class="text"
                      value="{{ old('address') }}" placeholder="Where are you from" required>

                      @if ($errors->has('address'))
                      <div class="mb-2 text-left">
                        <span class="text-danger">{{ $errors->first('address') }}</span>
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
  
<br>
<center><a href="{{ route(user_env().'.howitworks') }}" title="How it works"> <button class='btn btn-primary'>How it works</button></a></center>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

          
  </div>  

@endsection

