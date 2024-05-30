<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class AppController extends Controller
{
    function index(){
        $products = Product::all();
        $productsTopDeals = Product::inRandomOrder()->limit(8)->get();
        return view('index', compact('products', 'productsTopDeals'));
    }
}
