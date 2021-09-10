<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\User;
//use http\Client\Curl\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function index()
    {
        $old_cartitems = Cart::where('user_id',Auth::id())->get();
        foreach ($old_cartitems as $item)
        {
            if (!Product::where('id',$item->prod_id)->where('quantity','>=',$item->prod_qty)->exists())
            {
                $removeItem = Cart::where('user_id',Auth::id())->where('prod_id',$item->prod_id)->first();
                $removeItem->delete();
            }
        }
        $cartitems = Cart::where('user_id',Auth::id())->get();
        return view('frontend.checkout', compact('cartitems'));
    }

    public function placeorder(Request $request)
    {
        $order = new Order();
        $order->user_id=Auth::id();
        $order->fname = $request->input('fname');
        $order->lname = $request->input('lname');
        $order->email = $request->input('email');
        $order->phone = $request->input('phone');
        $order->address = $request->input('address');
        $order->city = $request->input('city');
        $order->state = $request->input('state');
        $order->country = $request->input('country');
        //$order->traking_no = 'sanjel'.rand(1111,9999);

        //to calculate total price//
        $total = 0;
        $cartitems_total = Cart::where('user_id',Auth::id())->get();
            foreach ($cartitems_total as $prod)
            {
                $total += $prod->products->price;
            }
            $order->total_price =$total;

        $order->save();

        $cartitems = Cart::where('user_id',Auth::id())->get();
        foreach ($cartitems as $item)
        {
            OrderItem::create([
                'order_id'=>$order->id,
                'prod_id' => $item->prod_id,
                'qty'=> $item->prod_qty,
                'price'=>$item->products->price,
            ]);

            $prod = Product::where('id', $item->prod_id)->first();
            $prod->quantity = $prod->quantity - $item->prod_qty;
           $prod->update();
        }

        if (Auth::user()->address == NULL)
        {
            $user = User::where('id',Auth::id())->first();
            $user->name=$request->input('fname');
            $user->lname=$request->input('lname');
            $user->phone=$request->input('phone');
            $user->address=$request->input('address');
            $user->city=$request->input('city');
            $user->state=$request->input('state');
            $user->country=$request->input('country');
            $user->update();
        }
            $cartitems = Cart::where('user_id',Auth::id())->get();
            Cart::destroy($cartitems);

            return redirect('/')->with('status', "Order Placed Successfully");

    }
}
