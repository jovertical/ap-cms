@extends(user_env('layouts.main')) 

@section('content')
    <div id="main-content" class="wrapper clearfix">
        <section class="main-slideshow">
            <div id="home-slideshow" class="home-slideshow-wrapper">

                <div class="home-slideshow-inner">
                    <div class="home-slideshow">
                        <ul class="slides">
                            <li class="slideshow-1">
                                <img src="/front/about1.jpg">
                                <div class="caption position-left">
                                    <div class="slide-caption">
                                        <div class="dis_tablecell">
                                            <div class="container">
                                                <p>
                                                    <span class="title">
                                                         
                                                    </span>
                                                    <span class="title_bold"> </span>
                                                    <span class="content">  </span>
                                                </p>

                                               
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                           
                            <li class="slideshow-3">
                                <img src="/front/about2.jpg" />
                                <div class="caption position-left">
                                    <div class="slide-caption">
                                        <div class="dis_tablecell">
                                            <div class="container">
                                                <p>
                                                    <span class="title">
                                                     
                                                    </span>
                                                    <span class="title_bold">AuraRich Philippines</span>
                                                    <span class="content"> </span>
                                                </p>
 
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="slideshow-1">
                                <img src="/front/about3.jpg">
                                <div class="caption position-left">
                                    <div class="slide-caption">
                                        <div class="dis_tablecell">
                                            <div class="container">
                                                <p>
                                                    <span class="title">
                                                        
                                                    </span>
                                                    <span class="title_bold">AuraRich Philippines</span>
                                                    <span class="content">  </span>
                                                </p>
 
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                             <li class="slideshow-2">
                                <img src="/front/about4.jpg">
                                <div class="caption position-right">
                                    <div class="slide-caption">
                                        <div class="dis_tablecell">
                                            <div class="container">
                                                <p>
                                                    
                                                    <span class="title_bold">AuraRich Philippines</span>
                                                    <span class="content"> 
                                                    </span>
                                                </p>
 
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
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
              <p>{!! $app['about'] !!} </p>
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


