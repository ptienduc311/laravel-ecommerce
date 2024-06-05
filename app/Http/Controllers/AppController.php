<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class AppController extends Controller
{
    function index(){
        $products = Product::all();
        $productsTopDeals = Product::inRandomOrder()->limit(8)->get();
        $productIdsWishlist = Cart::instance("wishlist")->content()->pluck('id')->toArray();
        return view('index', compact('products', 'productsTopDeals', 'productIdsWishlist'));
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $products = Product::where('name', 'LIKE', "%{$query}%")->with('category', 'brand')->get();

        return response()->json($products);
    }
}
