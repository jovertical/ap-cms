@extends(user_env().'.layouts.main')

@section('content')
	@include(user_env().'.partials.breadcrumbs')

	<div class="article-wrapper">
		<div class="container">
			<div class="row">
				<div class="article-inner">
					<div id="article">
						<!-- Episodes -->
						<div class="col-sm-3 sidebar">
							@include(user_env().'.tutorials.episodes')
						</div>
					</div>
					<div class="col-sm-9 article">
						<!-- Begin article -->
						<div class="article-body clearfix">
							<div class="group-blog-top">
								<div class="group-blog-title">
									<h1 class="article-name">
										<a href="#">{{ $tutorial->title }}</a>
									</h1>
								</div>
								<ul class="article-info list-inline">
									<li class="article-date"><i class="fa fa-calendar"></i>
										{{ $tutorial->created_at->diffForHumans() }}
									</li>
									<li class="article-author"><i class="fa fa-user"></i>
										{{ $tutorial->creator->full_name }}
									</li>
									<li class="article-comment">
										<a href="#">
										    <i class="fa fa-list-ol"></i>
							                <span>{{ $tutorial->episodes->count() }}</span> Episode(s)
										</a>
									</li>
								</ul>
							</div>
							<div class="group-blog-middle">
								<div class="top-banner article_banner_show article-image">
									
								</div>
								<div id="article-content">
									{!! $tutorial->body !!}
								</div>
							</div>
							<div class="group-blog-btm">
								
								<div class="share-with supports-fontface col-sm-6">
									<div class="social-sharing is-clean" data-permalink="https://cs-cosmetics-store2.myshopify.com/blogs/news/124631171-playsuit-black-razor-pleats">

										<a href="//www.facebook.com/sharer.php?u={{ URL::current() }}" class="share-facebook">
											<span class="fa fa-facebook"></span>
											<span class="share-title">Share</span>
											<span class="share-count">0</span>
										</a>

										<a target="_blank" href="//twitter.com/share?text=Playsuit%20black%20razor%20pleats&amp;url=https://cs-cosmetics-store2.myshopify.com/blogs/news/124631171-playsuit-black-razor-pleats" class="share-twitter">
											<span class="icon icon-twitter"></span>
											<span class="share-title">Tweet</span>
										</a>

										<a target="_blank" href="//pinterest.com/pin/create/button/?url=https://cs-cosmetics-store2.myshopify.com/blogs/news/124631171-playsuit-black-razor-pleats&amp;media=http://cdn.shopify.com/s/files/1/1286/1471/articles/11_1024x1024.jpg?v=1463037789&amp;description=Playsuit%20black%20razor%20pleats" class="share-pinterest">
											<span class="icon icon-pinterest"></span>
											<span class="share-title">Pin it</span>
											<span class="share-count">0</span>
										</a>

										<a target="_blank" href="//fancy.com/fancyit?ItemURL=https://cs-cosmetics-store2.myshopify.com/blogs/news/124631171-playsuit-black-razor-pleats&amp;Title=Playsuit%20black%20razor%20pleats&amp;Category=Other&amp;ImageURL=//cdn.shopify.com/s/files/1/1286/1471/articles/11_1024x1024.jpg?v=1463037789" class="share-fancy">
											<span class="icon icon-fancy"></span>
											<span class="share-title">Fancy</span>
										</a>

										<a target="_blank" href="//plus.google.com/share?url=https://cs-cosmetics-store2.myshopify.com/blogs/news/124631171-playsuit-black-razor-pleats" class="share-google">
											<!-- Cannot get Google+ share count with JS yet -->
											<span class="icon icon-google_plus"></span>
											<span class="share-count">+1</span>
										</a>

									</div>
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