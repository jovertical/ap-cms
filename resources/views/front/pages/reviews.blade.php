@extends(user_env('layouts.main'))

@section('content')

  <div id="main-content" class="wrapper clearfix">           
   <br><br>
<br>
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

<div class="col-sm-12">
  
<center><a href="{{ route(user_env().'.transformation') }}" title="AuraRich Transformation"> <button class='btn btn-primary'>AuraRich Transformation</button></a></center><br><br>

</div>

          
  </div>  

@endsection

