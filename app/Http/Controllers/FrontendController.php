<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $featured_products = Product::where('status', '1')->take(15)->get();
        $trending_category= Category::where('status', '1')->take(15)->get();
        return view('frontend.index',compact('featured_products','trending_category' ));
    }

    public function category()
    {
        $category = Category::where('status', '1')->take(15)->get();
        return view('frontend.category', compact('category'));
    }

    public function viewcategory($slug)
    {
        if(Category::where('category_slug ',$slug)->exists())
        {
            $category =Category::where('category_slug', $slug)->first();
           $model =Product::where('category_id',$category->id)->where('status','0')->get();
            return view('frontend.products.index', compact('category', 'model'));
        }
        else{
            return redirect('/')->with('message', 'Slug does not exist');
        }
    }
}
