<?php

namespace App\Http\Controllers;

use App\Models\Products;
use App\Models\Images;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function getProducts(Request $request)
    {
        $products = Products::with('images')->get();

        return view('store.listings', ['products' => $products]);
    }

    public function getProduct(Request $request, String $id)
    {
        $product = Products::with('images')->find($id);

        return view('product.show', ['product' => $product]);
    }

    public function getRandomProducts(Request $request)
    {
        $products = Products::with('images')->inRandomOrder()->take(6)->get();

        return view('index', ['products' => $products]);
    }

    public function getRandomProductsByCategory(Request $request, String $category)
    {
        $products = Products::with('images')
            ->where('category', $category)
            ->inRandomOrder()
            ->take(3)
            ->get();

        return view('index', ['products' => $products]);
    }
}
