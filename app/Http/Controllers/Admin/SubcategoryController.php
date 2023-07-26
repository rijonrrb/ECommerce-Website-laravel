<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Category;
use App\Models\Subcategory;
use DB;
use Auth;

class SubcategoryController extends Controller
{
        public function __construct()
        {
            $this->middleware('auth');
        }

        public function index()
        {
            $datas = DB::table('subcategories')->leftJoin('categories', 'subcategories.category_id', 'categories.id')->select('subcategories.*','categories.category_name')->get();
            
            $categories = Category::all();

            return view('Admin.Category.subCategory.index', compact('datas','categories'));
        }

        public function store(Request $request)
        {
            $validate = $request->validate([
                "subcategory_name"=>"required|unique:subcategories|max:40"            
            ],
            ['name.required'=>"The Subcategory Name field is required.",
            'unique.required'=>"This field must be unique."]
        );
            $Subcategory = new Subcategory();
            $Subcategory->category_id = $request->category_id;
            $Subcategory->subcategory_name = $request->subcategory_name;
            $Subcategory->subcategory_slug = Str::slug($request->subcategory_name,'-');
            $result = $Subcategory->save(); 
            if($result){
                $notification= array('messege' => 'Successfully Inserted', 'alert-type' => 'success');
                return redirect()->back()->with($notification);
            }
            else{
                $notification= array('messege' => 'Subcategory Creation Failed', 'alert-type' => 'error');
                return redirect()->back()->with($notification);
            }
        }

        public function delete($id)
        {
            $result = Subcategory::find($id)->delete();
            if($result){
                $notification= array('messege' => 'Subcategory Deleted', 'alert-type' => 'success');
                return redirect()->back()->with($notification);
            }
            else{
                $notification= array('messege' => 'Subcategory Deletion Failed', 'alert-type' => 'error');
                return redirect()->back()->with($notification);
            }
        }

        public function edit($id)
        {
            $data=Subcategory::find($id);
            $category=Category::all();
            return view('admin.category.subcategory.edit',compact('data','category'));
        }
    
        public function update(Request $request)
        {
            $data = Subcategory::where('id',$request->id)->first();
            $data->category_id = $request->category_id;
            $data->subcategory_name = $request->subcategory_name;
            $data->subcategory_slug = Str::slug($request->subcategory_name,'-');
            $result = $data->save(); 
            if($result){
                $notification= array('messege' => 'Subategory Updated', 'alert-type' => 'success');
                return redirect()->back()->with($notification);
            }
            else{
                $notification= array('messege' => 'Subategory Updating Failed', 'alert-type' => 'error');
                return redirect()->back()->with($notification);
            }
        }

}
