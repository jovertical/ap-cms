@extends(user_env('layouts.main')) 

@section('content')
    <div id="main-content" class="wrapper clearfix">
        

  <div id="main-content" class="wrapper clearfix">           
    <section class="page-heading">
  <div class="page-heading-wrapper">
    <div class="container">
      <div class="row">
        <div class="page-heading-inner">
          <h1 class="page-title"><span>Sell Aura</span></h1>
          <div class="breadcrumb clearfix">
            <span itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a href="{{ route(user_env().'.home') }}" title="Cosmetics Style 2" itemprop="url"><span itemprop="title">Home</span></a></span>
            <span class="arrow-space">&#62;</span>
            <span itemscope itemtype="http://data-vocabulary.org/Breadcrumb">
              <a href="{{ route(user_env().'.sellaura') }}" title="About us">Sell Aura</a>
            </span>              
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
            <p style="text-align: justify;"><center><h2><i><b> What is AuraRich? </b><br><br></i></h2>            
             <i> {!! $app['about'] !!}</center><br></i> </p>
             <center><h2><i><b> Why be an AuraRich Independent Distributor?</b><br></i></h2></center>
             <br>
<center>
  <div class="row">
  <i><div class="col-sm-12"> <h3><b>Income</b></h3><br> <img src="/front/picture1.jpg"> <br> <br></div>
  <p style="text-align: justify;">&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp AuraRich Distributors earn profits with each sale. Whether you want to sell AuraRich as a part-time job for extra income, or devote yourself to AuraRich full time and maximize your earnings, you will make money. As you build out your own sales team of Resellers and as your purchases and sales sizes increase, so do your earnings!</p>
</div>

  <div class="row">
  <i>
  <div class="col-sm-12"><h3><b>Travel</b></h3> <br> <img src="/front/Travel.jpg"> <br> <br></div>
<p style="text-align: justify;">&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp AuraRich Distributors earn profits with each sale. Whether you want to sell AuraRich as a part-time job for extra income, or devote yourself to AuraRich full time and maximize your earnings, you will make money. As you build out your own sales team of Resellers and as your purchases and sales sizes increase, so do your earnings! Destinations planned for 2019 will be announced Christmas 2018! Trips are great marketing, networking and learning opportunities.</p>

  </i>
  </div>

  <div class="row">
  <i>
  <div class="col-sm-12"><h3><b>Lifestyle</b></h3> <br> <br> <img src="/front/Lifestyle.jpg"> <br> <br></div>  
  <p style="text-align: justify;">&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp As an AuraRich distributor, you are your own boss. Work your own hours, make your own schedules, and work from wherever you choose. The more you put in, the more you will be rewarded. 
For Part-Time Distributors and Resellers, you are able to work in your spare time or on the weekends, whenever you have the time, and can collect an additional income when it is convenient for you. For the serious Distributor, you will build your own client base, recruit your own sales team and increase your order sizes and profits as high as you want to.  Expand your opportunities and earn more!
</p>
</i>
</div>

  <div class="row">
  <i>
  <div class="col-sm-12"><h3><b>Rewards</b></h3> <br> <br> <img src="/front/Rewards.jpg"> <br> <br></div>
 <p style="text-align: justify;"><center><h4><b>As an AuraRich Distributor, you will build your Gold points in 3 ways:</b></h4></center>
<br>
&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp <b>Team Building:</b> Build and train your very own sales team of Authorized Resellers. Maintain your sales team and be never lose out on point eligibility. <br>
<b>Sales:</b> Steadily increase your sales to elevate to obtain promotions and increase order sizes. Retain this status and earn points consistently. <br>
&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp <b>Reviews and Contests:</b> Submit your own clients’ Before and After photos, with a review, for a chance to win points each month. See our Before and After Contest for information! <br>

<b>Gold points</b> can be used for corporate travel opportunities, seminar attendance, first chances at New Product Giveaways and discounts on future orders. For more information on our Gold Points system see our Gold Points System page.</p> 
  </i>
  </div>
  </center>
    <br>
   <center><a href="{{ route(user_env().'.getstarted') }}" title="GetStarted"> <button class='btn btn-primary'>Get Started</button></a></center>


            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

          
  </div>  

@endsection


