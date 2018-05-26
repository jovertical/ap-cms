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

<div class="col-sm-4">
  <a target="_blank" href="/front/reviews/BodySetTrans.png">
    <img src="/front/reviews/BodySetTrans.png" alt=" " width="500" height="500">
  </a>
  <div class="desc"><i><b>Body Set</b></i><br>
  <i>Honey Gold Soap, Honey Gold Body Serum, <br>and Sunscreen Honey Gold Body Lotion.</i>
  </div>
</div>
<div class="col-sm-4">
  <a target="_blank" href="/front/reviews/FaceSetTrans.png">
    <img src="/front/reviews/FaceSetTrans.png" alt=" " width="500" height="500">
  </a>
  <div class="desc"><i><b>Face Set</b></i><br>
  <i>Honey Gold Soap 9, Honey Gold Face Cream, Honey Gold Sun Care, and Bearberry White Booster Face.</i>
  </div>
</div>
<div class="col-sm-4">
  <a target="_blank" href="/front/reviews/MakeupSetTrans.png">
    <img src="/front/reviews/MakeupSetTrans.png" alt=" " width="500" height="500">
  </a>
  <div class="desc"><i><b>Makeup Set</b></i><br>
  <i>Perfect Face Makeup,<br> and  Honey Gold Powder with SPF 35++</i>
  </div>
</div>

          
  </div>  

@endsection

