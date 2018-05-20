@extends(user_env().'.layouts.main')

@section('content')
	@include(user_env().'.partials.breadcrumbs')

	<div class="article-wrapper">
		<div class="container">
			<div class="row">
				<div class="article-inner">
					<div id="article">
						<div class="col-sm-3 sidebar">
							@include(user_env().'.episodes.episodes')
						</div>
					</div>

					<div class="col-sm-9 article">
						<!-- Begin article -->
						<div class="article-body clearfix">
							<div class="group-blog-top">
								<div class="group-blog-title">
									<h1 class="article-name">
										<a href="#">{{ $episode->title }}</a>
									</h1>
								</div>
								<ul class="article-info list-inline">
									<li class="article-date">
										<i class="fa fa-calendar"></i>
										{{ $episode->created_at->diffForHumans() }}
									</li>
									<li class="article-author">
										<i class="fa fa-user"></i>
										{{ $episode->creator->full_name }}
									</li>
								</ul>
							</div>
							<div class="group-blog-middle">
								<div class="top-banner article_banner_show article-image">
									<iframe src="{{ $episode->video_url }}" frameborder="0" allowfullscreen
										width="640" height="360"></iframe>
								</div>
								<div id="article-content">
									{!! $episode->body !!}
								</div>
							</div>
						</div>
						<!-- End article -->
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection