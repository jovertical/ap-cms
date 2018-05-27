@extends(user_env('layouts.main'))

@section('content')

  <div id="main-content" class="wrapper clearfix">           
    <section class="page-heading">
  <div class="page-heading-wrapper">
    <div class="container">
      <div class="row">
        <div class="page-heading-inner">
          <h1 class="page-title"><span>Gold Point Incentive</span></h1>
          <div class="breadcrumb clearfix">
            <span itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a href="{{ route(user_env().'.home') }}" title="Cosmetics Style 2" itemprop="url"><span itemprop="title">Home</span></a></span>
            <span class="arrow-space">&#62;</span>
            <span itemscope itemtype="http://data-vocabulary.org/Breadcrumb">
              <a href="{{ route(user_env().'.system') }}" title="Gold Point Incentive">Gold Point Incentive</a>

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
            <center><h2><i><b>Gold Point Incentive</b> </i></h2></center>
            <center><h4><i>Gold Point Incentive is a system to measure Distributor's productivity and hardwork. In every sale there is an equivalent gold point allocated to the Distributor's individual profile.</i></h4></center>
            <center><h4><i><b>AuraRich use this method to distinguish who among the distributors are qualified for the company tour incentives and promotions.</b></i></h4></center> <br> <br>

            <table class="table1">
  <tr>
    <th>Product</th>
    <th>Golds per unit sale</th>
   
  </tr>
  <tr>
    <td>Honey Gold Cream</td>
    <td>1 Point</td>
  </tr>
  <tr>
    <td>Honey Gold Sun Care</td>
    <td>1</td>
  </tr>
    <tr>
    <td>Honey Gold Sun Soap</td>
    <td>2</td>
  </tr>
    <tr>
    <td>Honey Gold Soap 9</td>
    <td>1</td>
  </tr>
    <tr>
    <td>Bearberry White Booster Face</td>
    <td>2</td>
  </tr>
    <tr>
    <td>Body Serum</td>
    <td>2</td>
  </tr>
    <tr>
    <td>Honey Powder</td>
    <td>1</td>
  </tr>
    <tr>
    <td>Honey Gold Lotion</td>
    <td>1</td>
  </tr>
    <tr>
    <td>Perfect Face Makeup</td>
    <td>1</td>
  </tr>

</table>
           
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

          
  </div>  

@endsection

