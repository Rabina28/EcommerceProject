<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $featured_products = Product::where('status', '1')->take(15)->get();
        return view('frontend.index',compact('featured_products'));
    }
}
