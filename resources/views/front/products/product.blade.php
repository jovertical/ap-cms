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
					<a class="title-5" href="#">{{ $product->name }}</a>
				</div>

				<div class="product-price">
					<span class="price_sale">₱{{ $product->price }}</span>
				</div>

				<div class="product-description">
					{!! str_limit($product->description, 250) !!}
				</div>

				<div class="product-group-actions mt-4">
					<form method="POST" action="#" class="product-addtocart">
						<button class="btn btn-1 select-option" type="button">
						<i class="fa fa-cart"></i> Add to cart
						</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>