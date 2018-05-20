@extends(user_env('layouts.main'))

@section('content')
<!-- Main Content -->
  <div id="main-content" class="wrapper clearfix">           
    <section class="blcontactog-heading">
  <div class="contact-heading-wrapper">
    <div class="container">
      <div class="row">
        <div class="contact-heading-inner">
          <h1 class="page-title"><span>Contact</span></h1>
          <div class="breadcrumb clearfix">
            <span itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a href="{{ route(user_env().'.home') }}" title="Cosmetics Style 2" itemprop="url"><span itemprop="title">Home</span></a></span>
            <span class="arrow-space">&#62;</span>
            <span itemscope itemtype="http://data-vocabulary.org/Breadcrumb">
              <a href="{{ route(user_env().'.contact') }}" title="Contact">Contact</a>
            </span>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

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
<span class="left-area icon-mobile icon"><i class="fa fa-mobile"></i></span>
<div class="righ-area">
<span>{{$app['phone_number_1']}}</span>
</div>
</li>
<li>
<span class="left-area icon-mobile icon"><i class="fa fa-phone"></i></span>
<div class="righ-area">
<span>{{$app['phone_number_2']}}</span>
</div>
</li>
<li>
<span class="left-area icon-email icon"><i class="fa fa-envelope-o"></i></span>
<div class="righ-area"><span>{{$app['facebook_url']}}</span></div>
</li>
<li>
<span class="left-area icon-email icon"><i class="fa fa-envelope-o"></i></span>
<div class="righ-area"><span>{{$app['twitter_url']}}</span></div>
</li>
<li>
<span class="left-area icon-email icon"><i class="fa fa-envelope-o"></i></span>
<div class="righ-area"><span>{{$app['instagram_url']}}</span></div>
</li>
 
<li>
<span class="left-area icon-time icon"><i class="fa fa-calendar"></i></span>
<div class="righ-area">
<span>From Monday to Friday</span> <span>9.00 a.m to 5:00 p.m</span>
</div>
</li>
</ul>


                </div>
				<div class="contact-form col-md-6">
                  <h2>Contact Information</h2>
                  <form method="post" action="https://cs-cosmetics-store2.myshopify.com/contact#contact_form" id="contact_form" accept-charset="UTF-8" class="contact-form"><input type="hidden" name="form_type" value="contact" /><input type="hidden" name="utf8" value="✓" />
                  

                  

                  <div id="contactFormWrapper">
                    <p>
                      <label>Name:</label><br/>
                      <input type="text" id="contactFormName" name="contact[name]" placeholder="John Doe" />
                    </p>
                    <p>
                      <label>Email:</label><br/>
                      <input type="email" id="contactFormEmail" name="contact[email]" placeholder="john@example.com" />
                    </p>
                    <p>
                      <label>Phone Number:</label><br/>
                      <input type="telephone" id="contactFormTelephone" name="contact[phone]" placeholder="555-555-1234" />
                    </p> 
                    <p>
                      <label>Message:</label><br/>
                      <textarea rows="15" cols="75" id="contactFormMessage" name="contact[body]" placeholder="Your message"></textarea>
                    </p>
                    <p>
                      <input type="submit" id="contactFormSubmit" value="Submit" class="btn" />
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

<section class="google-maps-content">
  <div class="google-maps-wrapper">
    <div class="google-maps-inner">
      <div id="contact_map" class="map"></div>
    </div>
  </div>
</section>



          
  </div>  

@endsection

