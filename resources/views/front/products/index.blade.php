@extends(user_env().'.layouts.main')

@section('content')
	@include(user_env().'.partials.breadcrumbs')

	<section class="collection-content">
		<div class="collection-wrapper">
			<div class="container">
				<div class="row">
					<div class="collection-inner">
						<!-- Tags loading -->
						<div id="tags-load" style="display:none;">
							<i class="fa fa-spinner fa-pulse fa-2x"></i>
						</div>

						<div id="collection">
							@include(user_env().'.products.sidebar')

							<div class="collection-mainarea col-sm-9 clearfix">
								<div class="collection-toolbar">
									<div class="group_toolbar">
										<!-- Sort by -->
										<div class="sortBy">
											<div id="sortButtonWarper" class="dropdown-toggle" data-toggle="dropdown">
												<button id="sortButton">
													<span class="name">
														@if ((Request::get('sby') == 'price') && (Request::get('stype') == 'asc'))
															Price, Lower
														@elseif ((Request::get('sby') == 'price') && (Request::get('stype') == 'desc'))
															Price, Higher
														@elseif ((Request::get('sby') == 'name') && (Request::get('stype') == 'asc'))
															Name, Ascending															
														@elseif ((Request::get('sby') == 'name') && (Request::get('stype') == 'desc'))
															Name, Descending
														@elseif ((Request::get('sby') == 'created_at') && (Request::get('stype') == 'asc'))
															Created, Older															
														@elseif ((Request::get('sby') == 'created_at') && (Request::get('stype') == 'desc'))
															Created, Newer	
														@else
															Sort
														@endif														
													</span>
													<i class="fa fa-caret-down"></i>
												</button>
												<i class="sub-dropdown1"></i>
												<i class="sub-dropdown"></i>
											</div>
											<div id="sortBox" class="control-container dropdown-menu">
												<ul class="list-unstyled option-set text-left list-styled">
													<li class="sort">
														<a href="{{ route(user_env().'.products.index', [
															'c' => Request::get('c'), 'mxp' => Request::get('mxp'), 
															'sby' => 'price', 'stype' => 'asc'
														]) }}">Price, Lower</a>
													</li>

													<li class="sort">
														<a href="{{ route(user_env().'.products.index', [
															'c' => Request::get('c'), 'mxp' => Request::get('mxp'),
															'sby' => 'price', 'stype' => 'desc'
														]) }}">Price, Higher</a>
													</li>

													<li class="sort">
														<a href="{{ route(user_env().'.products.index', [
															'c' => Request::get('c'), 'mxp' => Request::get('mxp'),
															'sby' => 'name', 'stype' => 'asc'
														]) }}">Name, Ascending</a>
													</li>

													<li class="sort">
														<a href="{{ route(user_env().'.products.index', [
															'c' => Request::get('c'), 'mxp' => Request::get('mxp'),
															'sby' => 'name', 'stype' => 'desc'
														]) }}">Name, Descending</a>
													</li>

													<li class="sort">
														<a href="{{ route(user_env().'.products.index', [
															'c' => Request::get('c'), 'mxp' => Request::get('mxp'),
															'sby' => 'created_at', 'stype' => 'asc'
														]) }}">Created, Older</a>
													</li>

													<li class="sort">
														<a href="{{ route(user_env().'.products.index', [
															'c' => Request::get('c'), 'mxp' => Request::get('mxp'),
															'sby' => 'created_at', 'stype' => 'desc'
														]) }}">Created, Newer</a>
													</li>
												</ul>
											</div>
										</div>
									</div>
								</div>

								<div class="collection-items clearfix full_width ListMode">
									<div class="products">
										@foreach($products as $index => $product)
											@include(user_env().'.products.product')
										@endforeach
									</div>
								</div>

								<div class="collection-bottom-toolbar">
									<div class="product-counter col-sm-6">
										Showing {{ $products->count() }} of {{ $products->total() }} total products. 
									</div>

									{{ $products->appends(Request::all())->links(user_env().'.components.pagination') }}
								</div>
								
							</div>

						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
@endsection