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
              
              <i><div class="col-sm-6"> 
                 <center><p>Path A: Reseller Path<br> </center>
This path may be more suitable for those who wish to initially work underneath an AuraRich Distributor, and supplement their income while testing out the AuraRich system. This path requires smaller initial investment and enables you to fast-track into the Distributor system yourself after you’ve been able to learn the system and build your confidence. <br><br>

<b>Step 1:</b> Register to be an Authorized Reseller on <a href ="http://www.AuraRich.com.ph/getstarted"> www.AuraRich.com.ph/getstarted  </a>. This will include providing your name, email, shipping address and agreeing to our Terms and Conditions. We will match you with an AuraRich Distributor in your area. If you have been recruited by an AuraRich Distributor, you will provide their Identification Number at time of registration to secure the relationship.<br> <br>

<b>Step 2:</b> Purchase each one of our 3 AuraRich Reseller Package Deals including 3 of each of our all natural AuraRich products at a 15% discount from retail and start making sales profit immediately. If you follow our price structure, you will make a 17% return on each of these investments. When you have sold one package, you may purchase another. When you have purchased and sold all 3, and proven your ability, you may begin to purchase directly from your Distributor.<br></p>
</div>
              <div class="col-sm-6"> 
              <center><p> Path B: Distributor Path <br> </center>
               <b> Phase 1: Register</b>
<b>Step 1:</b> Register to be an Authorized Independent Distributor on <a href ="http://www.AuraRich.com.ph/getstarted"> www.AuraRich.com.ph/getstarted  </a>. This will include providing your name, email, shipping address and agreeing to our Terms and Conditions. <br><br>

<b>Step 2:</b> Purchase our AuraRich Signup Package including 3 of each of our all natural AuraRich products at a 15% discount from retail and start making sales profit immediately. This will be your sampler kit. Sell to your friends and family, or provide samples to interested resellers and begin to grow your sales team. If you follow our price structure, you will make a 19% return on this first investment.<br><br> 

<b>Phase 2:</b> Sell 
<b>Step 1:</b> Now that you’ve proved your interest in being an authorized AuraRich Distributor, you will be able to purchase the Distributor Sampler Package at 20% discount from retail and make a 25% return on your investment. This package includes 5 of each product. <br><br>

<b>Step 2:</b> In Phase 2, you can now use your added product to expand your sales team. Recruit 2 resellers during phase 2 and you will be able to move onto Phase 3 and start making higher returns on your product purchases. All resellers must purchase their first Resellers Pack directly from AuraRich before they can be registered as a Reseller and before you can move onto Phase 3. <br><br>

<b>Phase 3: Build</b>
<b>Step 1:</b> Recruit 4 additional resellers. This can either mean 6 total resellers, or each of your 2 resellers can recruit 2 more. Either way, the more resellers on your team, the more sales volume you will generate, and the more income you will bring in. You must recruit minimum of 6 resellers to move onto the final phase of becoming an AuraRich Distributor. <br><br>

<b>Step 2:</b> Purchase the Distributor Starter Pack at a 25% discount and begin making direct sales to your sales team and your own customers, making a 35% return on your investment this time. The Starter Pack contains 10 of each AuraRich product. Your returns on your investment will be bigger than before, and will not stop there.<br> <br>

<b>Phase 4: Grow</b>
-Congratulations! You are now an Authorized AuraRich Distributor and are approved to place orders of any size and of any product, mixing your own orders and creating your own adds, utilizing our scaled discount pricing model. This will enable you to grow as large as you want and earn larger returns as your order volumes grow. <br><br>
-You will be issued a unique AuraRich Distributor ID number, which will allow us to track your Gold points, issue your rewards and trace your Reseller sales to you. <br><br>
-In addition, you will be listed on our site to allow customers in your area to connect with you for sales. <br>
-To earn Gold points and promotions, maintain and increase your sales volumes each month. Visit our Distributor Promotion page<br><br>



              </div><i>
             

<center><a href="{{ route(user_env().'.distributorpromotion') }}" title="Distributor Promotion"> <button class='btn btn-primary'>Distributor Promotion</button></a></center>



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

