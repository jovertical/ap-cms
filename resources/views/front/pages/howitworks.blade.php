@extends(user_env('layouts.main'))

@section('content')

  <div id="main-content" class="wrapper clearfix">           
    <section class="page-heading">
  <div class="page-heading-wrapper">
    <div class="container">
      <div class="row">
        <div class="page-heading-inner">
          <h1 class="page-title"><span>How it works</span></h1>
          <div class="breadcrumb clearfix">
            <span itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a href="{{ route(user_env().'.home') }}" title="Cosmetics Style 2" itemprop="url"><span itemprop="title">Home</span></a></span>
            <span class="arrow-space">&#62;</span>
            <span itemscope itemtype="http://data-vocabulary.org/Breadcrumb">
              <a href="{{ route(user_env().'.howitworks') }}" title="Reviews">How it works</a>

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
             <center><b>2 Paths to Distributorship</b></center>
             <div>
               <center><div class="col-sm-6"> Reseller Path</div>
               <div class="col-sm-6"> Distributor Path</div>
               </center>               
             </div>
            
             <div>
              
              <div class="col-sm-6"> 
                <p>Path A: Reseller Path<br>
This path may be more suitable for those who wish to initially work underneath an AuraRich Distributor, and supplement their income while testing out the AuraRich system. This path requires smaller initial investment and enables you to fast-track into the Distributor system yourself after you’ve been able to learn the system and build your confidence. <br>

Step 1: Register to be an Authorized Reseller on <a href ="http://www.AuraRich.com.ph/SellAura"> www.AuraRich.com.ph/SellAura  </a>. This will include providing your name, email, shipping address and agreeing to our Terms and Conditions. We will match you with an AuraRich Distributor in your area. If you have been recruited by an AuraRich Distributor, you will provide their Identification Number at time of registration to secure the relationship.<br> 

Step 2: Purchase each one of our 3 AuraRich Reseller Package Deals including 3 of each of our all natural AuraRich products at a 15% discount from retail and start making sales profit immediately. If you follow our price structure, you will make a 17% return on each of these investments. When you have sold one package, you may purchase another. When you have purchased and sold all 3, and proven your ability, you may begin to purchase directly from your Distributor.</p>
</div>
              <div class="col-sm-6"></div>
             
             </div>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

          
  </div>  

@endsection

