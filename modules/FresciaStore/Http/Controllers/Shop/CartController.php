<?php

namespace Modules\FresciaStore\Http\Controllers\Shop;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\FresciaStore\Http\Requests\Shop\AddToCartRequest;

class CartController extends Controller
{
    //ensure request is not corrupt
    public function addToCart(AddToCartRequest $request): JsonResponse
    {

        $cart = $request->session()->get('cart', []);
        $productId = $request->input('product_id');
        $quantity = $request->input('quantity');
        if (isset($cart[$productId]) && $quantity === 0) {
            unset($cart[$productId]);
        } elseif ($quantity > 0) {
            $cart[$productId] = $quantity;
        }

        $totalItems = count($cart);
        // Save the updated cart data back to the session

        $request->session()->put('cart', $cart);

        // Return a successful response
        return response()->json([
            'status' => 'success',
            'message' => 'Product added to cart.',
            'total_products' => $totalItems
        ]);
    }
}
