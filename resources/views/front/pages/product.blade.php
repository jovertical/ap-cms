<div class="col-sm-12">
    <div class="row-container product list-unstyled clearfix">
        <div class="row-left">
            <a href="{{ route(user_env().'.products.show', $product) }}"
                class="hoverBorder container_item">
                <div class="hoverBorderWrapper">
                    <img src="{{ image_url($product->images->first()) }}" class="not-rotation img-responsive front"/>
                    <div class="mask"></div>
                </div>
            </a>

            <div class="hover-mask">
                <div class="group-mask">
                    <div class="inner-mask">
                        <div class="product-title">
                            <a class="title-5" href="{{ route(user_env().'.products.show', $product) }}">
                                {{ $product->name }}
                            </a>
                        </div>
                        <div class="group-actionbutton">
                            <form method="POST" action="#">
                                @csrf

                                <button type="button" class="btn btn-1 select-option">
                                    <a href="{{ route(user_env().'.products.index') }}"> <i class="fa fa-plus"></i> View Product</a> 
                                </button>
                            </form>
                        </div>
                    </div>
                    <!--inner-mask-->
                </div>
                <!--Group mask-->
            </div>
        </div>

        <div class="row-right animMix">
            <div class="product-price">
                <span class="price_sale">₱{{ $product->price }}</span>
            </div>
        </div>
    </div>
</div>