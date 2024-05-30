<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function aboutUs(){
        return view('blog.about');
    }
    public function contactUs(){
        return view('blog.contact');
    }
}
