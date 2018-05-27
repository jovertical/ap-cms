@extends(user_env('layouts.main'))

@section('content')

  <div id="main-content" class="wrapper clearfix">           
    <section class="page-heading">
  <div class="page-heading-wrapper">
    <div class="container">
      <div class="row">
        <div class="page-heading-inner">
          <h1 class="page-title"><span>Reviews</span></h1>
          <div class="breadcrumb clearfix">
            <span itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a href="{{ route(user_env().'.home') }}" title="Cosmetics Style 2" itemprop="url"><span itemprop="title">Home</span></a></span>
            <span class="arrow-space">&#62;</span>
            <span itemscope itemtype="http://data-vocabulary.org/Breadcrumb">
              <a href="{{ route(user_env().'.reviews') }}" title="Reviews">Reviews</a>

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
              <center><h2><i>Distributor Promotion</h2>
              <p><h4>AuraRich Rewards hardwork, not only by tour incentives but also by promotion. AuraRich Philippine will train qualified Distributors to become one of our sales team leader and support them in building their own team.</i></h4></p></center><br><br>
              @auth
              <center><iframe width="560" height="315" src="https://www.youtube.com/embed/Wwg8UdHXioo" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe></center>
              @else
              <div></div>
              @endauth            
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

          
  </div>  

@endsection

