@extends(user_env().'.layouts.main')

@section('content')
    @include(user_env().'.partials.breadcrumbs')

    <section class="collection-content">
        <div class="collection-wrapper">
            <div class="container">
                <div class="row">
                    <div class="cart-inner">
                        <div id="cart">
                            @if (count($selected_products) == 0)
                                <div class="message-box text-center">
                                    <h2 class="message-text">Your cart is currently empty.</h2>
                                </div>
                            @else
                                <div class="cart-form">
                                    <table>
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th colspan="2">Product</th>
                                                <th>Price</th>
                                                <th>Total</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($selected_products as $index => $product)
                                                <tr>
                                                    <td>{{ $index + 1 }}</td>
                                                    <td class="image">
                                                        <div class="product_image" style="width: 75px;">
                                                            <a href="#">
                                                                <img src="{{ image_url($product) }}" alt="">
                                                            </a>
                                                        </div>
                                                    </td>
                                                    <td class="image-info">
                                                        <div class="product_name">
                                                            <a href="#">
                                                                <p>{{ $product->name }}</p>
                                                            </a>
                                                        </div>
                                                    </td>
                                                    <td class="price">
                                                        ₱{{ number_format($product->price, 2) }}
                                                    </td>
                                                    <td class="total title-1">
                                                        ₱{{ number_format($product->price, 2) }}
                                                    </td>
                                                    <td class="remove">
                                                        <a href="#" class="cart destroy_product_link" data-route="
                                                            {{ route(user_env().'.reservation.cart.product.destroy', $product) }}">
                                                            <i class="fa fa-trash"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach

                                            <tr class="summary">
                                                <td class="total" colspan="4">
                                                    <form method="POST" action="{{ route(user_env().'.reservation.cart.destroy') }}">
                                                        @method('DELETE')
                                                        @csrf

                                                        <input type="submit" class="btn" value="Clear">
                                                    </form>
                                                </td>
                                                <td class="price" colspan="2">
                                                    <span class="total">
                                                        <strong>
                                                            ₱{{ number_format($product_costs['amount_payable'], 2) }}
                                                        </strong>
                                                    </span>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <div class="group-checkout-input">
                                        <div class="cart-buttons">
                                            <div class="buttons clearfix">
                                                <input type="submit" class="btn" value="Check Out">
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>

    <form method="POST" action="" id="destroy_product_form" style="display: none;">
        @method('DELETE')
        @csrf
    </form>
@endsection

@section('scripts')
    <script>
        $('document').ready(function(e) {
            $('a.destroy_product_link').on('click', function(e) {
                var form = $('form#destroy_product_form');

                form.attr('action', $(this).data('route')).submit();
            });
        });
    </script>
@endsection