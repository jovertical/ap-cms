<div class="product-item">
	<div class="product">
		<div class="row-left col-md-5">
			<a href="#" class="container_item">
				<div class="hoverBorderWrapper">
					<img src="{{ image_url($product->images->first()) }}" class="not-rotation img-responsive front" alt=""
					width="100%;">
					<div class="mask"></div>
				</div>
			</a>
		</div>

		<div class="row-right col-md-7">
			<div class="list-mode">
				<div class="product-title">
					<i><a class="title-5" href="#">{{ $product->name }}</a></i>
				</div>

				{{-- <div class="product-price">
					<span class="price_sale">₱{{ $product->price }}</span>
				</div> --}}

				<div class="product-description">
					<i><b>{!! str_limit($product->description, 250) !!}</i></b>
				</div>

				<div class="product-group-actions mt-4">
					<form method="POST" action="{{ route(user_env().'.reservation.cart.product.store', $product) }}">
						@csrf

						<button type="submit" class="btn">
							<i class="fa fa-plus"></i>Reserve
						</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>