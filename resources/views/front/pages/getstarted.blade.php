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
<b>Why be an AuraRich Independent Distributor?</b>
<br>
Income
-AuraRich Distributors earn profits with each sale. Whether you want to sell AuraRich as a part-time job for extra income, or devote yourself to AuraRich full time and maximize your potential. As you build out your own sales team, you will elevate in status, and as your purchases and sales sizes increase, so do your earnings! 
<br>
Travel 
As an AuraRich distributor, you can earn Gold points and elevate your status, earning the opportunity to participate in corporate events, get exclusive offers and services, and all of the travel opportunities! In 2017 alone, Aura Rich Thailand has taken a total of XXXX Distributors to places like Hong Kong, Singapore and Tokyo!
 Destinations planned for 2019 will be announced Christmas 2018! Trips are great marketing, networking and learning opportunities. 
<br>
Lifestyle 
As an AuraRich distributor, you are your own boss. Work your own hours, make your own schedules, and work from wherever you choose. 
<br>
For Part-Time Distributors, you are able to work in your spare time or on the weekends, whenever you have the time, and can collect an additional income. For the Full time Distributor, you will build your own client base, recruit your own sales team and increase your order sizes and profits as high as you want to.  Expand your opportunities and earn more!
<br>
Rewards 
As an Independent Distributor, you will earn Gold points in 3 ways:
<br>
Team Building: Bring in new Independent Distributors and build your very own sales team.  
Sales: Steadily increase your sales to elevate to a higher status. Retain this status and earn point. Reviews and Contests: Submit your own clients’ Before and After photos, with a review, for a chance to win points each month. See our Before and After Contest for information! 
<br>
Gold point can be used for corporate travel opportunities, seminar attendance, first chances at New Product Giveaways and discounts on orders. For more information on our Gold Points system see our Gold Points System page. 

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

          
  </div>  

@endsection

