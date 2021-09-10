<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Contact;
use App\Models\Product;
use http\Message;
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


    public function product()
    {
       $product = Product::where('status', '1')->take(15)->get();
        return view('frontend.product', compact('product'));
    }

    public function productview($prod_slug)
    {
        if (Product::where('slug',$prod_slug)->exists())
        {
            $products = Product::where('slug',$prod_slug)->first();
            return view('frontend.products.view',compact('products'));
        }
        else{
            return redirect('/')->with('message','Slug doesnot exist');
        }
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






    public function contactus()
    {
        $contacts = Contact::all();
        return view('frontend.contact', compact('contacts'));
    }
    public function contactstore(Request $request)
    {
        //dd($request->all());

        $this->validate($request,[
            'name'=>'required',
            'phone'=>'required',
            'email'=>'required',
            'message'=>'required',
        ]);
        $contact = new Contact();
        $contact->name=$request->name;
        $contact->phone=$request->phone;
        $contact->email=$request->email;
        $contact->message=$request->message;
        $contact->save();
        return redirect()->route('frontend.contact')->with('message','New contact Created Successfull !');
    }
}
