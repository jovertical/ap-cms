<div class="collection-leftsidebar sidebar col-sm-3 clearfix">
	<div class="sidebar-block collection-block">
		<div class="sidebar-title">Categories</div>
		<div class="sidebar-content">
			<ul class="list-cat">
				<li>
					<a href="{{ route(user_env().'.products.index', [
						'mxp' => Request::get('mxp'), 'sby' => Request::get('sby'), 'stype' => Request::get('stype')
					]) }}">All
					</a>
				</li>

				@foreach($categories as $index => $category)
					<li>
						<a href="{{ route(user_env().'.products.index', [
							'c' => $category->id, 'mxp' => Request::get('mxp'),
							'sby' => Request::get('sby'), 'stype' => Request::get('stype')
						]) }}">
							{{ $category->name }} ({{ $category->products->count() }})
						</a>
					</li>
				@endforeach
			</ul>
		</div>
	</div>

	<div class="sidebar-block filter-block">
		<div class="sidebar-title">Filters</div>
		<div id="tags-filter-content" class="sidebar-content">
			<!-- filter tags group -->
			<div class="filter-tag-group">
				<div class="tag-group" id="coll-filter-3">
					<p class="title">Price</p>
					<ul>
						@if (($mxp = $products->max('price')) > 0)
							@for ($i = 1; $i < 6; $i++)
								<li class="{{ Request::get('mxp') == ($mxp / $i) ? 'active' : '' }}">
									<a href="{{ route(user_env().'.products.index', [
										'c' => Request::get('c'), 'mxp' => $mxp / $i, 
										'sby' => Request::get('sby'), 'stype' => Request::get('stype')
									]) }}">
										<span class="fe-checkbox"></span> 
										Under ₱{{ $mxp / $i }}
									</a>
								</li>
							@endfor
						@endif
						
						<li class="{{ Request::get('mxp') == null ? 'active' : '' }}">
							<a href="{{ route(user_env().'.products.index', [
								'c' => Request::get('c'), 'sby' => Request::get('sby'), 'stype' => Request::get('stype')
							]) }}">
								<span class="fe-checkbox"></span>Any
							</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>