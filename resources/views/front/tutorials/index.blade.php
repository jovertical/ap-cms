@extends(user_env().'.layouts.main')

@section('content')
	@include(user_env().'.partials.breadcrumbs')

	<section class="blog-content">
		<div class="blog-wrapper">
			<div class="container">
				<div class="row">
					<div class="blog-inner">
						<div id="blog">
							<!-- Archives -->
			              	<div class="col-sm-3 sidebar">
			              		@include(user_env().'.tutorials.archives')
			              	</div>

			              	<!-- Tutorials -->
							<div class="col-sm-9 articles">
								@foreach($tutorials as $index => $tutorial)
				              		@include(user_env().'.tutorials.tutorial')
								@endforeach

								<div class="d-flex w-100 justify-content-center">
									{{ $tutorials->links() }}
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
@endsection