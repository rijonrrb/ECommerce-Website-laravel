<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Category;
use Auth;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $datas = Category::all();
        return view('Admin.Category.primeCategory.index')->with('datas', $datas);
    }
    public function store(Request $request)
    {
        $validate = $request->validate([
            "category_name"=>"required|unique:categories|max:40"            
        ],
        ['name.required'=>"The Category Name field is required.",
        'unique.required'=>"This field must be unique."]
    );
        $Category = new Category();
        $Category->category_name = $request->category_name;
        $Category->category_slug = Str::slug($request->category_name,'-');
        $result = $Category->save(); 
        if($result){
            $notification= array('messege' => 'Successfully Inserted', 'alert-type' => 'success');
            return redirect()->back()->with($notification);
        }
        else{
            $notification= array('messege' => 'Category Creation Failed', 'alert-type' => 'error');
            return redirect()->back()->with($notification);
        }
    }

    public function delete($id)
    {
        $result = Category::find($id)->delete();
        if($result){
            $notification= array('messege' => 'Category Deleted', 'alert-type' => 'success');
            return redirect()->back()->with($notification);
        }
        else{
            $notification= array('messege' => 'Category Deletion Failed', 'alert-type' => 'error');
            return redirect()->back()->with($notification);
        }
    }


}
