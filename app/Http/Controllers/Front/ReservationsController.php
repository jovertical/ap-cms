<?php

namespace App\Http\Controllers\Front;

/**
 * Third party
 */
use Carbon;

/**
 * Repositories
 */
use App\Acme\Repositories\{CategoryRepository, ProductRepository};

/**
 * Models
 */
use App\{Category, Product};

/**
 * Laravel
 */
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReservationsController extends Controller
{
    /**
     * Get the selected products.
     * @return array
     */
    public function getSelectedProducts()
    {
        return session()->get('reservation.selected_products') ?? [];
    }

    /**
     * Get the product costs.
     * @return array
     */
    public function getProductCosts()
    {
        return [
            'amount_payable' => array_sum(array_column($this->getSelectedProducts(), 'price'))
        ];
    }

    /**
     * Show selected products.
     * @return view
     */
    public function cartIndex()
    {
        $selected_products = $this->getSelectedProducts();

        $product_costs = $this->getProductCosts();

        return view(user_env().'.reservation.cart', compact(['selected_products', 'product_costs']));
    }

    /**
     * Store a product.
     * @param Request $request
     * @param Product $product
     * @return redirect.
     */
    public function cartProductStore(Request $request, Product $product)
    {
        if(! in_array($product->id, array_column($this->getSelectedProducts(), 'id'))) {
            // push the item to the selected_products array
            session()->push('reservation.selected_products', $product);

            session()->flash('message', [
                'type' => 'success',
                'content' => "<strong>{$product->name}</strong> was added to your cart."
            ]);

            return back();
        }

        session()->flash('message', [
            'type' => 'warning',
            'content' => "Can't add <strong>{$product->name}</strong>. It's already in your cart."
        ]);

        return back();
    }

    /**
     * Destroy a product.
     * @param Request $request
     * @param Product $product
     * @return redirect.
     */
    public function cartProductDestroy(Request $request, Product $product)
    {
        $index = array_search($product->id, array_column($this->getSelectedProducts(), 'id'));

        if(in_array($product->id, array_column($this->getSelectedProducts(), 'id'))) {
            // push the item to the selected_products array
            session()->pull('reservation.selected_products.'.$index);

            // reset indexes of selected_products array
            session([
                'reservation.selected_products' => array_values(
                    session()->get('reservation.selected_products')
                )
            ]);

            session()->flash('message', [
                'type' => 'success',
                'content' => "<strong>{$product->name}</strong> was removed from your cart."
            ]);

            return back();
        }

        session()->flash('message', [
            'type' => 'warning',
            'content' => "Can't remove <strong>{$product->name}</strong>."
        ]);

        return back();
    }

    /**
     * Destroy all products in cart.
     * @param Request $request
     * @return redirect.
     */
    public function cartDestroy(Request $request)
    {
        if (session()->pull('reservation.selected_products')) {
            session()->flash('message', [
                'type' => 'success',
                'content' => "Cart cleared."
            ]);

            return back();
        }

        session()->flash('message', [
            'type' => 'warning',
            'content' => "Cannot clear cart."
        ]);

        return back();
    }
}