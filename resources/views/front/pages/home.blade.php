@extends(user_env('layouts.main')) @section('content')
<div id="main-content" class="wrapper clearfix">
    <section class="main-slideshow">
<div id="carousel-example" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carousel-example" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example" data-slide-to="1"></li>
    <li data-target="#carousel-example" data-slide-to="2"></li>
     <li data-target="#carousel-example" data-slide-to="3"></li>
    <li data-target="#carousel-example" data-slide-to="4"></li>
     <li data-target="#carousel-example" data-slide-to="5"></li>
  </ol>

  <div class="carousel-inner">
    <div class="item active">
      <a href="#"><img src="/front/slide-image-1.jpg"></a>
      <div class="carousel-caption">
        
      </div>
    </div>
    <div class="item">
      <a href="#"><img src="/front/slide-image-5.jpg"></a>
      <div class="carousel-caption">
        
      </div>
    </div>
    <div class="item">
      <a href="#">  <img src="/front/slide-image-3.jpg" /></a>
      <div class="carousel-caption">
       
      </div>
    </div>
    <div class="item">
      <a href="#">   <img src="/front/slide-image-4.jpg"></a>
      <div class="carousel-caption">
       
      </div>
    </div>
    <div class="item">
      <a href="#">  <img src="/front/slide-image-6.jpg"></a>
      <div class="carousel-caption">
       
      </div>
    </div>
    <div class="item">
      <a href="#">   <img src="/front/slide-image-2.jpg"></a>
      <div class="carousel-caption">
        
      </div>
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

    @if (count($categories))
        <section id="home_topbanner">
            <div class="home_topbanner_wrapper">
                <div class="container">
                    <div class="row">
                        <div class="home_topbanner_inner">
    
                            <div class="col-sm-4">
                                @foreach ($categories as $index => $category)
                                <div class="group_banner">
                                    <div class="home_topbanner_image">
                                        <a href="{{ route(user_env().'.products.index').'?c='.$category->id }}">
                                            <img src="{{ image_url($category) }}" alt="" style="width: 100%;">
                                        </a>
                                    </div>
    
                                    <div class="home_topbanner_content">
                                        <span class="content">{{ $category->name }}</span>
                                    </div>
                                </div>
                                @endforeach
                            </div>
    
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif

    <section id="home_saleup_layout">
        <div class="home_saleup_wrapper">
            <div class="container">
                <div class="row">
                    <div class="home_saleup_inner">
                        <div class="home_saleup_image">
                            <img src="/front/home_saleup_image.jpg" alt="" />
                        </div>
                        <div class="home_saleup_content">
                            <div class="dis_table">
                                <div class="dis_tablecell">
                                    <span class="title">
                                        AuraRich Philippines
                                    </span>
                                    <span class="content">Reserve now at AuraRich</span>
                                    <a href="{{ route(user_env().'.products.index')}}" class="btn btn-2">Reserve now! </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @if (count($featured_products))
    <section id="home_featuredproduct_layout">
        <div class="home_featuredproduct_wrapper">
            <div class="container">
                <div class="row">
                    <div class="home_featuredproduct_inner">
                        <div class="home_featuredproduct-title home-title">
                            <h4>Featured Products</h4>
                        </div>
                        <div class="home_featuredproduct-content home-content">
                            <div class="featuredproduct-products">
                                @foreach($featured_products as $index => $product) @include(user_env().'.pages.product') @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif
</div>
@endsection