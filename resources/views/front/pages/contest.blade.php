@extends(user_env('layouts.main'))

@section('content')

  <div id="main-content" class="wrapper clearfix">           
    <section class="page-heading">
  <div class="page-heading-wrapper">
    <div class="container">
      <div class="row">
        <div class="page-heading-inner">
          <h1 class="page-title"><span>Before and After Contest</span></h1>
          <div class="breadcrumb clearfix">
            <span itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a href="{{ route(user_env().'.home') }}" title="Cosmetics Style 2" itemprop="url"><span itemprop="title">Home</span></a></span>
            <span class="arrow-space">&#62;</span>
            <span itemscope itemtype="http://data-vocabulary.org/Breadcrumb">
              <a href="{{ route(user_env().'.contest') }}" title="Contest">Contest</a>

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
              <p>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp <i> AuraRich is offering gold point building incentive opportunities to those Distributors and Customers who submit photos of themselves Before and After using AuraRich products. Winners will be chosen on a monthly basis and will be displayed on our site and in our monthly news letter. <br> <br>Submit photos and a statement of  how you enjoy AuraRich to contest@aurarich.com.ph </i>  </p>
            
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

          
  </div>  

@endsection

