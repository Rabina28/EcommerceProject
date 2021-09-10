<?php
namespace App\Http\Controllers\Admin;
use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $result['data']=Category::all();
        return view('admin.category.index',$result);
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function store(Request $request)
    {
      $this->validate($request,[
          'category_name' => 'required',
          'category_slug' => 'required|unique:categories,category_slug',
      ]);
      $model=new Category();
        if ($request->hasFile('category_image'))
        {
            $file=$request->file('category_image');
            $ext=$file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('assets/uploads/category',$filename);
            $model->category_image=$filename;
        }
        $model->category_name=$request->input('category_name');
        $model->category_slug=$request->input ('category_slug');
        //$model->status=$request->input ('status');

        $model->save();
        return redirect()->route('admin.category.index')->with('message', 'New category created Successfully !');

    }

    public function edit($id)
    {
        $model = Category::find($id);
        return view('admin.category.edit',compact('model'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'category_name'=>'required',

        ]);
        $model =Category::find($id);
        if ($request->hasFile('category_image'))
        {
            $path = 'assets/uploads/category'.$model->category_image;
            if (File::exists($path))
            {
                File::delete($path);
            }
            $file=$request->file('category_image');
            $ext=$file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('assets/uploads/category',$filename);
            $model->category_image=$filename;
        }
        $model->category_name=$request->category_name;
        $model->category_slug=$request->category_slug;
        //$model->status=$request->status;
        $model->update();
        return redirect()->route('admin.category.index')->with('message','Category Updated Successfully !');
    }


    public function destroy($id)
    {
        $model = Category::find($id)->delete();
        return back()->with('message','category deleted successfully');
    }

    public function status(Request $request,$status,$id)
    {
        $model = Category::find($id);
        $model->status=$status;
        $model->save();
        return back()->with('message','category status updated successfully');

    }


}

