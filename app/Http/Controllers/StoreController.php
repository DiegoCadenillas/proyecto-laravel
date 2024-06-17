<?php

namespace App\Http\Controllers;

use App\Models\Reviews;
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

        if ($product != null) {
            $relatedProducts = Products::with('images')
                ->where('category', $product->category)
                ->where('id', '!=', $product->id)
                ->inRandomOrder()
                ->take(5)
                ->get();

            return view('product.show', ['product' => $product, 'relatedProducts' => $relatedProducts]);
        } else {
            return redirect('/tienda');
        }
    }

    public function getRandomProducts(Request $request)
    {
        $products = Products::with('images')->inRandomOrder()->take(6)->get();

        return view('index', ['products' => $products]);
    }

    public static function getRandomProductsByCategory(Request $request, String $category)
    {
        $products = Products::with('images')
            ->where('category', $category)
            ->inRandomOrder()
            ->take(3)
            ->get();

        return $products;
    }

    public function getProductReviews(Request $request, String $id)
    {
        $product = Products::with('reviews')->find($id);

        if ($product != null) {
            return view('product.reviews', ["product" => $product]);
        } else {
            abort('404');
        }
    }

    public function destroy(Request $request, String $id)
    {
        if ($request->isMethod('delete')) {
            Reviews::find($id)->delete();
        } else {
            abort('404');
        }
    }
}
