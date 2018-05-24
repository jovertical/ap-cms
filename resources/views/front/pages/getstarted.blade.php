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
<center>
  <div class="row">
  <div class="col-sm-6"> RESELLER KIT</div>
  <div class="col-sm-6"> DISTRIBUTOR PACKAGE</div>
</div>
</center>

<center>
  <div class="row">
  <div class="col-sm-6">  <img src="/front/reseller1.jpg"> <br><br> Reseller Kit # 1 Face Set <br> 
  "A Complete Whitening Solution for the Face."<br>
  Honey Gold Soap 9,
  Honey Gold Cream,
  Honey Gold Sun Care, <br>
  Bearberry White Booster Face<br><br>
</div>
  <div class="col-sm-6"> <img src="/front/reseller1.jpg"> <br><br> Distributor Signup Pack <br> </div>
</div>
</center>

<center>
  <div class="row">
  <div class="col-sm-6">  <img src="/front/reseller2.jpg"> <br><br> Reseller Kit # 2 Makeup Set<br> 
  "A Full Makeup Set"<br>
  Perfect Face Makeup,
  Honey Gold Face Powder<br><br>
  </div>
  <div class="col-sm-6"> <img src="/front/reseller1.jpg"> <br><br> Distributor Sample Pack <br> </div>
</div>
</center>

<center>
  <div class="row">
  <div class="col-sm-6">  <img src="/front/reseller3.jpg"> <br><br> Reseller Kit # 3 Body Set<br> 
  "A Complete Anti-Aging Solution for the Body."<br>
  Honey Gold Soap,
  Honey Gold Body Serum,
  Honey Gold Body Lotion<br><br>
</div>
  <div class="col-sm-6"> <img src="/front/reseller1.jpg"> <br><br> Distributor Starter Pack <br> </div>
</div>
</center>

</i>

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

