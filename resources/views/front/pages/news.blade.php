@extends(user_env('layouts.main'))

@section('content')

  <div id="main-content" class="wrapper clearfix">           
    <section class="page-heading">
  <div class="page-heading-wrapper">
    <div class="container">
      <div class="row">
        <div class="page-heading-inner">
          <h1 class="page-title"><span>News</span></h1>
          <div class="breadcrumb clearfix">
            <span itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a href="{{ route(user_env().'.home') }}" title="Cosmetics Style 2" itemprop="url"><span itemprop="title">Home</span></a></span>
            <span class="arrow-space">&#62;</span>
            <span itemscope itemtype="http://data-vocabulary.org/Breadcrumb">
              <a href="{{ route(user_env().'.news') }}" title="News">News</a>

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
              <center><p><b> <i> Aurarich is expanding into the Philippines! Visit our Sell AuraRich page for details on how to register as an Independent Distributor or Reseller. <br></b> </i> </p></center>
              <center><h4><b> <i> <p>Sign up for our newsletter to stay up to date on launch date events and all other updates to the AuraRich launch. </b> </i> </h4></p></center><br><br>
              <div class="col-sm-12">
                <img src="/front/News.jpg">
                <center><b> <i> <p>Photo: AuraRich Thailand Team visiting Macau, Tokyo, and Singapore in 2017.</b> </i> </p></center>
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

