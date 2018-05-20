@extends(user_env('layouts.main')) 

@section('content')
	<div id="main-content" class="wrapper clearfix">
		<section class="page-heading">
			<div class="page-heading-wrapper">
				<div class="container">
					<div class="row">
						<div class="page-heading-inner">
							<h1 class="page-title">
								<span>Dashboard</span>
							</h1>
							<div class="breadcrumb clearfix">
								<span itemscope itemtype="http://data-vocabulary.org/Breadcrumb">
									<a href="{{ route(user_env().'.home') }}" title="Cosmetics Style 2" itemprop="url">
										<span itemprop="title">Home</span>
									</a>
								</span>
								<span class="arrow-space">&#62;</span>
								<span itemscope itemtype="http://data-vocabulary.org/Breadcrumb">
									<a href="{{ route(user_env().'.dashboard1') }}" title="Dashboard">Dashboard</a>
								</span>
								<br>
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
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>

@endsection
