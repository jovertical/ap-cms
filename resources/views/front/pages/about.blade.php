@extends(user_env('layouts.main')) 

@section('content')
    <section class="main-slideshow">
<div id="carousel-example" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carousel-example" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example" data-slide-to="1"></li>
    <li data-target="#carousel-example" data-slide-to="2"></li>
     <li data-target="#carousel-example" data-slide-to="3"></li>
  </ol>

  <div class="carousel-inner">
    <div class="item active">
      <a href="#"><img src="/front/about1.jpg"></a>
      <div class="carousel-caption">
        
      </div>
    </div>
    <div class="item">
      <a href="#"><img src="/front/about2.jpg"></a>
      <div class="carousel-caption">
        
      </div>
    </div>
    <div class="item">
      <a href="#">  <img src="/front/about3.jpg" /></a>
      <div class="carousel-caption">
       
      </div>
    </div>
    <div class="item">
      <a href="#">   <img src="/front/about4.jpg"></a>
      <div class="carousel-caption">
       
      </div>
    </div>
    

  <a class="left carousel-control" href="#carousel-example" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
  </a>
  <a class="right carousel-control" href="#carousel-example" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
  </a>
</div>
    </section>

  <div id="main-content" class="wrapper clearfix">           
    <section class="page-heading">
  <div class="page-heading-wrapper">
    <div class="container">
      <div class="row">
        <div class="page-heading-inner">
          <h1 class="page-title"><span>About us</span></h1>
          <div class="breadcrumb clearfix">
            <span itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a href="{{ route(user_env().'.home') }}" title="Cosmetics Style 2" itemprop="url"><span itemprop="title">Home</span></a></span>
            <span class="arrow-space">&#62;</span>
            <span itemscope itemtype="http://data-vocabulary.org/Breadcrumb">
              <a href="{{ route(user_env().'.about') }}" title="About us">About us</a>
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
             <i><p>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp{!! $app['about'] !!} </p></i>
                <center><a href="{{ route(user_env().'.reviews') }}" title="Reviews"> <button class='btn btn-primary'>View Reviews</button></a></center>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  
</section>

          
  </div>  

@endsection


