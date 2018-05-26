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
            
            <div class="col-sm-4">
  <a target="_blank" href="/front/reseller.png">
    <img src="/front/reseller.png" alt=" " width="500" height="500">
  </a>
  <div class="desc"><i><b>Reseller</i></b></div>
</div>

<div class="col-sm-4">
  <a target="_blank" href="/front/ResellerDistributor.png">
    <img src="/front/ResellerDistributor.png" alt=" " width="500" height="500">
  </a>
  <div class="desc"><i><b>Which path should you take?</i></b></div>
</div>

<div class="col-sm-4">
  <a target="_blank" href="/front/distributor.png">
    <img src="/front/distributor.png" alt=" " width="500" height="500">
  </a>
  <div class="desc"><i><b>Distributor</i></b></div>
</div>    
<br>         
             <center><h2><i><b>2 Paths to Distributorship</b></i></h2></center>
             <div>
               <center><div class="col-sm-6"><h3><i><b> Reseller Path</b></i></h3></div>
               <div class="col-sm-6"><h3><i><b> Distributor Path</b></i></h3></div>
               </center>               
             </div>
            
             <div>
              
              <i><div class="col-sm-6"> 
                 <center><p><b>Path A: Reseller Path</b><br></center>
&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp This path may be more suitable for those who wish to initially work underneath an AuraRich Distributor, and supplement their income while testing out the AuraRich system. This path requires smaller initial investment and enables you to fast-track into the Distributor system yourself after you’ve been able to learn the system and build your confidence. <br><br>

<center><b><h3>Step 1 : Register </b></h3><br></center>
&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp This will include providing your name, email, contact number, shipping address and agreeing to our Terms and Conditions.<br> <br>

<center><b><h3>Step 2 : Purchase</b></h3><br></center>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp Purchase any of our 3 AuraRich Reseller Package Deals including 3 of each of our all natural AuraRich products at a 15% discount from retail and start making sales profit immediately. <br></p>

<center><b><h3>Step 3 : Sell </b></h3><br></center>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp If you follow our price structure, you will make a 17% return on each of these investments. <br></p>



</div>
              <div class="col-sm-6"> 
              <center><b><p> Path B: Distributor Path <br></b></center>

<center><b><h3>Step 1: Register </b></h3><br></center>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp This will include providing your name, email, contact number, shipping address and agreeing to our Terms and Conditions. <br><br>

<center><b><h3> Step 2: Purchase </b></h3><br></center>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp Purchase any of our AuraRich Distributor Packages including 3 of each of our all natural AuraRich products at a 15% discount from retail and start making sales profit immediately. <br>

<center><b><h3> Step 3: Sell </b></h3><br></center>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp Sell to your friends and family, or provide samples to interested resellers and begin to grow your sales team. If you follow our price structure, you will make a 19% return on this first investment. <br><br>

<center><b><h3> Step 4: Training </b></h3><br></center>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp Now that you’ve proved your interest in being an authorized AuraRich Distributor, you will be able to undergo training with AuraRich experienced trainers.<br><br>

<center><b><h3> Step 5: Build </b></h3><br></center>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp You may now use your experience and training to build your own team. You must have minimum of 6 resellers to move on to the final phase of becoming an AuraRich Distributor.<br><br>

<center><b><h3> Step 6: Grow </b></h3><br></center>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp Congratulations! You are now an Authorized AuraRich Distributor and are approved to place orders of any size and of any product, mixing your own orders and creating your own adds, utilizing our scaled discount pricing model. This will enable you to grow as large as you want and earn larger returns as your order volumes grow. <br><br>
&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp You will be issued a unique AuraRich Distributor ID number, which will allow us to track your Gold points, issue your rewards and trace your Reseller sales to you. <br><br>
&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp In addition, you will be listed on our site to allow customers in your area to connect with you for sales. <br>
&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp To earn Gold points and promotions, maintain and increase your sales volumes each month. Visit our Distributor Promotion page<br><br>


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

