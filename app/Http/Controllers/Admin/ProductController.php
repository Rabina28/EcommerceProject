<?php

namespace App\Http\Controllers;
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result['data']=Product::all();
        return view('admin.product.index',$result );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model = Category::all();
        return view('admin.product.create',compact('model') );

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'product_name'=>'required',
            //'image'=>'required|mimes:jpeg.jpg,png',
            'description'=>'required',
            'price'=>'required'
        ]);
        $model=new Product();
        if ($request->hasFile('image'))
        {
            $file=$request->file('image');
            $ext=$file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('assets/uploads/product',$filename);
            $model->image=$filename;
        }
        $model->category_id=$request->category_id;
        $model->product_name=$request->product_name;
        $model->slug=$request->slug;
        $model->brand=$request->brand;
        $model->quantity=$request->quantity;
        $model->description=$request->description;
        $model->price=$request->price;
        $model->rating=$request->rating;
        //$model->status=$request->status;
        $model->save();
        //$result['category']=DB::table('categories')->where(['status'=>0])->get();

        return redirect()->route('admin.product.index')->with('message', 'New product created Successfully !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model = Product::find($id);
        return view('admin.product.edit',compact('model'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'product_name'=>'required',
            'description'=>'required',
            'price'=>'required'
        ]);

        $model=Product::find($id);
        if ($request->hasFile('image'))
        {
            $path = 'assets/uploads/product'.$model->image;
            if (File::exists($path))
            {
                File::delete($path);
            }
            $file=$request->file('image');
            $ext=$file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('assets/uploads/product',$filename);
            $model->image=$filename;
        }
        $model->product_name=$request->product_name;
        $model->slug=$request->slug;
        $model->brand=$request->brand;
        $model->quantity=$request->quantity;
        $model->description=$request->description;
        $model->price=$request->price;
        $model->rating=$request->rating;
        //$model->status=$request->status;
        $model->update();
        return redirect()->route('admin.product.index')->with('message', 'Product updated Successfully !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = Product::find($id)->delete();
        return back()->with('message','Product deleted successfully');
    }

    public function status(Request $request,$status,$id)
    {
        $model = Product::find($id);
        $model->status=$status;
        $model->save();
        return back()->with('message','Product status updated successfully');

    }
}
