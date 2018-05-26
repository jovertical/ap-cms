@extends(user_env('layouts.main'))

@section('content')

  <div id="main-content" class="wrapper clearfix">           
    <section class="page-heading">
  <div class="page-heading-wrapper">
    <div class="container">
      <div class="row">
        <div class="page-heading-inner">
          <h1 class="page-title"><span>Deals</span></h1>
          <div class="breadcrumb clearfix">
            <span itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a href="{{ route(user_env().'.home') }}" title="Cosmetics Style 2" itemprop="url"><span itemprop="title">Home</span></a></span>
            <span class="arrow-space">&#62;</span>
            <span itemscope itemtype="http://data-vocabulary.org/Breadcrumb">
              <a href="{{ route(user_env().'.deals') }}" title="Deals">Deals</a>

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
              <center><p><h3><b><i>{!! $app['deals'] !!}</i></b></h3></p></center>
              <br><br><br><br>
              <center>
  <div class="row">
  <div class="col-sm-6"><h4><b><i> RESELLER KIT </i></b></h4> <br><br></div>
  <div class="col-sm-6"><h4><b><i> DISTRIBUTOR PACKAGE</i></b></h4><br><br></div>
</div>
</center>

<center>
  <div class="row">
  <div class="col-sm-6">  <img src="/front/reseller1.jpg"> <br><br><a href="{{ route(user_env().'.getstarted') }}"> <button type="button" class="btn btn-1 select-option"><i class="fa fa-plus"></i>  Reserve Deal</button></a><br><b><i> Reseller Kit # 1 Face Set </b></i><br> 
  <b><i>"A Complete Whitening Solution for the Face."</b></i><br><br>
  <i>Honey Gold Soap 9,
  Honey Gold Cream,
  Honey Gold Sun Care, <br>
  Bearberry White Booster Face</i><br><br><br><br><br><br>
</div>
  <div class="col-sm-6"> <img src="/front/DistributorSignup.png"> <br><br><a href="{{ route(user_env().'.getstarted') }}"> <button type="button" class="btn btn-1 select-option"><i class="fa fa-plus"></i>  Reserve Deal</button></a><br><b><i> Distributor Signup Pack</b></i> <br> <br>
  <i>Three(3) pieces of each nine(9) AuraRich products.</i> </div>
</div>
</center>

<center>
  <div class="row">
  <div class="col-sm-6">  <img src="/front/reseller2.jpg"> <br><br><a href="{{ route(user_env().'.getstarted') }}"> <button type="button" class="btn btn-1 select-option"><i class="fa fa-plus"></i>  Reserve Deal</button></a><br><b><i> Reseller Kit # 2 Makeup Set</b></i><br> 
  <i><b>"A Full Makeup Set"</b><br><br>
  Perfect Face Makeup,
  Honey Gold Face Powder</i><br><br><br><br><br><br>
  </div>
  <div class="col-sm-6"> <img src="/front/DistributorSample.png"> <br><br><a href="{{ route(user_env().'.getstarted') }}"> <button type="button" class="btn btn-1 select-option"><i class="fa fa-plus"></i>  Reserve Deal</button></a><br><i><b> Distributor Sample Pack</i></b> <br> <br>
   <i>Five(5) pieces of each nine(9) AuraRich products. </i></div>
</div>
</center>

<center>
  <div class="row">
  <div class="col-sm-6">  <img src="/front/reseller3.jpg"> <br><br><a href="{{ route(user_env().'.getstarted') }}"> <button type="button" class="btn btn-1 select-option"><i class="fa fa-plus"></i>  Reserve Deal</button></a><br> <i><b>Reseller Kit # 3 Body Set</i></b><br> 
  <i> <b>"A Complete Anti-Aging Solution for the Body."</i> </b><br><br>
  <i>Honey Gold Soap,
  Honey Gold Body Serum,
  Honey Gold Body Lotion</i><br><br>
</div>
  <div class="col-sm-6"> <img src="/front/DistributorStarter.png"> <br><br><a href="{{ route(user_env().'.getstarted') }}"> <button type="button" class="btn btn-1 select-option"><i class="fa fa-plus"></i>  Reserve Deal</button></a><br><i><b> Distributor Starter Pack </i></b><br><br>
   <i>Ten(10) pieces of each nine(9) AuraRich products.  </i></div>
</div>
</center>

</i>


            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

          
  </div>  

@endsection

