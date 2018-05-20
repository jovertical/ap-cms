@extends('root.layouts.lite')

@section('content')
	<div class="m-grid__item m-grid__item--fluid m-grid m-error-5" 
		style="background-image: url(/root/assets/app/media/img/error/bg5.jpg);">
		<div class="m-error_container">
			<span class="m-error_title">
				<h1>403</h1>		 
			</span> 	
			<p class="m-error_subtitle">
				You should not be here.
			</p>	
			<p class="m-error_description">
				This is a protected page. <br />
				You are not permitted to access this page.
			</p>	 
		</div>	 
	</div>
@endsection