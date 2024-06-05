<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Rating;
use App\Models\User;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index(Request $request)
    {
        $page = $request->query("page");
        $size = $request->query("size");
        $order = $request->query("order");
        $q_categories = $request->query("categories");
        $q_brands = $request->query("brands");
        $prange = $request->query("prange");

        if (!$prange)
            $prange = "0,500";
        $from  = explode(",", $prange)[0];
        $to  = explode(",", $prange)[1];

        if (!$page)
            $page = 1;
        if (!$size)
            $size = 12;
        if (!$order)
            $order = -1;
        $o_column = "";
        $o_order = "";
        switch ($order) {
            case 1:
                $o_column = "created_at";
                $o_order = "DESC";
                break;
            case 2:
                $o_column = "created_at";
                $o_order = "ASC";
                break;
            case 3:
                $o_column = "sale_price";
                $o_order = "ASC";
                break;
            case 4:
                $o_column = "sale_price";
                $o_order = "DESC";
                break;
            default:
                $o_column = "id";
                $o_order = "DESC";
        }
        $brands = Brand::orderBy('name', 'ASC')->get();
        $categories = Category::orderBy("name", "ASC")->get();
        $productIdsWishlist = Cart::instance("wishlist")->content()->pluck('id')->toArray();
        $products = Product::where(function ($query) use ($q_brands) {
            $query->whereIn('brand_id', explode(',', $q_brands))->orWhereRaw("'" . $q_brands . "'=''");
        })
            ->where(function ($query) use ($q_categories) {
                $query->whereIn('category_id', explode(',', $q_categories))->orWhereRaw("'" . $q_categories . "'=''");
            })
            ->whereBetween('regular_price', array($from, $to))
            ->orderBy('created_at', 'DESC')->orderBy($o_column, $o_order)->paginate($size);
        return view('shop', compact('products', 'productIdsWishlist', 'page', 'size', 'order', 'brands', 'q_brands', 'categories', 'q_categories', 'from', 'to'));
    }
    public function productDetails($slug)
    {
        $productIdsWishlist = Cart::instance("wishlist")->content()->pluck('id')->toArray();
        $product = Product::where('slug', $slug)->first();
        $idProduct = $product->id;
        $rproducts = Product::where('slug', '!=', $slug)->inRandomOrder()->limit(8)->get();

        $ratings = Rating::where('product_id', $idProduct)->get();
        $countRating = Rating::where('product_id', $idProduct)->count();
        $oneStar = Rating::where('product_id', $idProduct)->where('rating', 1)->count();
        $twoStars = Rating::where('product_id', $idProduct)->where('rating', 2)->count();
        $threeStars = Rating::where('product_id', $idProduct)->where('rating', 3)->count();
        $fourStars = Rating::where('product_id', $idProduct)->where('rating', 4)->count();
        $fiveStars = Rating::where('product_id', $idProduct)->where('rating', 5)->count();
        $rating_percent_1 = $countRating > 0 ? (($oneStar / $countRating) * 100) : 0;
        $rating_percent_2 = $countRating > 0 ? (($twoStars / $countRating) * 100) : 0;
        $rating_percent_3 = $countRating > 0 ? (($threeStars  / $countRating) * 100) : 0;
        $rating_percent_4 = $countRating > 0 ? (($fourStars  / $countRating) * 100) : 0;
        $rating_percent_5 = $countRating > 0 ? (($fiveStars / $countRating) * 100) : 0;
        $average_rating = $countRating > 0 ? (round($oneStar * 1 + $twoStars * 2 + $threeStars  * 3 + $fourStars  * 4 + $fiveStars * 5) / $countRating) : 0;
        return view('details', compact('product', 'rproducts', 'productIdsWishlist', 'idProduct', 'ratings', 'countRating', 'rating_percent_1', 'rating_percent_2', 'rating_percent_3', 'rating_percent_4', 'rating_percent_5', 'average_rating'));
    }

    public function getCartAndWishlistCount()
    {
        $cartCount = Cart::instance("cart")->content()->count();
        $wishlistCount = Cart::instance('wishlist')->content()->count();
        return response()->json(['status' => 200, 'cartCount' => $cartCount, 'wishlistCount' => $wishlistCount]);
    }

    public function rating(Request $request)
    {
        $email = $request->email;
        $user = User::where('email', $email)->first();
        if ($user) {
            $rating = Rating::where('email', $email)->where('product_id', $request->idProduct)->first();
            if ($rating) {
                return response()->json(['status' => 501]);
            } else {
                Rating::create([
                    'name' => $request->name,
                    'email' => $request->email,
                    'comment' => $request->comment,
                    'rating' => $request->rating,
                    'product_id' => $request->idProduct
                ]);
                return response()->json(['status' => 200]);
            }
        }
        return response()->json(['status' => 400]);
    }
}
