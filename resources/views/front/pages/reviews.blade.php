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
              
            <div class="gallery">
            <a target="_blank" href="/front/reviews/1 (1).jpg">
            <img src="/front/reviews/1 (1).jpg" alt="Fjords" width="300" height="200">
            </a>
            <div class="desc">AuraRich Transformation 1</div>
            </div>

             <div class="gallery">
            <a target="_blank" href="/front/reviews/1 (2).jpg">
            <img src="/front/reviews/1 (2).jpg" alt="Fjords" width="300" height="200">
            </a>
            <div class="desc">AuraRich Transformation 2</div>
            </div>

             <div class="gallery">
            <a target="_blank" href="/front/reviews/1 (3).jpg">
            <img src="/front/reviews/1 (3).jpg" alt="Fjords" width="300" height="200">
            </a>
            <div class="desc">AuraRich Transformation 3</div>
            </div>

             <div class="gallery">
            <a target="_blank" href="/front/reviews/1 (4).jpg">
            <img src="/front/reviews/1 (4).jpg" alt="Fjords" width="300" height="200">
            </a>
            <div class="desc">AuraRich Transformation 4</div>
            </div>

             <div class="gallery">
            <a target="_blank" href="/front/reviews/1 (5).jpg">
            <img src="/front/reviews/1 (5).jpg" alt="Fjords" width="300" height="200">
            </a>
            <div class="desc">AuraRich Transformation 5</div>
            </div>

             <div class="gallery">
            <a target="_blank" href="/front/reviews/1 (6).jpg">
            <img src="/front/reviews/1 (6).jpg" alt="Fjords" width="300" height="200">
            </a>
            <div class="desc">AuraRich Transformation 6</div>
            </div>

             <div class="gallery">
            <a target="_blank" href="/front/reviews/1 (7).jpg">
            <img src="/front/reviews/1 (7).jpg" alt="Fjords" width="300" height="200">
            </a>
            <div class="desc">AuraRich Transformation 7</div>
            </div>

             <div class="gallery">
            <a target="_blank" href="/front/reviews/1 (8).jpg">
            <img src="/front/reviews/1 (8).jpg" alt="Fjords" width="300" height="200">
            </a>
            <div class="desc">AuraRich Transformation 8</div>
            </div>

             <div class="gallery">
            <a target="_blank" href="/front/reviews/1 (9).jpg">
            <img src="/front/reviews/1 (9).jpg" alt="Fjords" width="300" height="200">
            </a>
            <div class="desc">AuraRich Transformation 9</div>
            </div>

            <div class="gallery">
            <a target="_blank" href="/front/reviews/1 (10).jpg">
            <img src="/front/reviews/1 (10).jpg" alt="Fjords" width="300" height="200">
            </a>
            <div class="desc">AuraRich Transformation 10</div>
            </div>

             <div class="gallery">
            <a target="_blank" href="/front/reviews/1 (11).jpg">
            <img src="/front/reviews/1 (11).jpg" alt="Fjords" width="300" height="200">
            </a>
            <div class="desc">AuraRich Transformation 11</div>
            </div>

            <div class="gallery">
            <a target="_blank" href="/front/reviews/1 (12).jpg">
            <img src="/front/reviews/1 (12).jpg" alt="Fjords" width="300" height="200">
            </a>
            <div class="desc">AuraRich Transformation 12</div>
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

