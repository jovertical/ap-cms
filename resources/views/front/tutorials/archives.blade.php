<div class="sidebar-block">
	<h3 class="sidebar-title">Archives</h3>
	<div class="sidebar-content">
		<ul>
			@foreach($archives as $stats)
				<li>
					<a href="?month={{ $stats['month'] }}&year={{ $stats['year'] }}">
						{{ $stats['month'].' '.$stats['year'] }}
					</a>
				</li>
			@endforeach
		</ul>
	</div>
</div>