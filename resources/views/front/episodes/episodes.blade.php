<div class="sidebar-block">
	<h3 class="sidebar-title">Episodes</h3>
	<div class="sidebar-content">
		@foreach($tutorial->episodes as $index => $episode)
			<div class="ra-item">
				<div class="article-info">
					<div class="episode-card">
						<h1 class="episode-number">{{ $episode->number }}</h1>
					</div>
					<h5 class="text-center">
						<a href="{{ route(user_env().'.episodes.show', [$tutorial, $episode->number]) }}" 
							class="{{ $episode->number == $number ? 'active-link' : '' }}">
							{{ $episode->title }}
						</a>
					</h5>
				</div>
			</div>
		@endforeach
	</div>
</div>