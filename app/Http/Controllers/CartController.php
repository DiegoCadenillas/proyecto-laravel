<?php

namespace App\Http\Controllers;

use App\Models\Products;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function showCart(Request $request)
    {
        if (!empty($_COOKIE['cartItems'])) {
            $valuePairs = explode(':', $_COOKIE['cartItems']);
            $productIds = [];
            foreach ($valuePairs as $valuePair) {
                array_push($productIds, explode('_', $valuePair)[1]);
            }
            $cartItems = Products::whereIn('id', $productIds)->with('images')->get();
            return view('cart', [
                'cartItems' => $cartItems
            ]);
        } else {
            return view('cart', [
                'cartItems' => null,
                'error' => 'Su carrito está vacío... Échele un vistazo a nuestra tienda!'
            ]);
        }
    }
}
