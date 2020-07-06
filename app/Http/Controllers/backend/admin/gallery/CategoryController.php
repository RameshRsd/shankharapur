<?php

namespace App\Http\Controllers\backend\admin\gallery;

use App\Http\Controllers\Controller;
use App\Model\Admin;
use App\Model\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Request $request){
        $admin = Admin::find(1);
        $heading = 'Categories | Gallery Manager';
        $title = $heading.' | '.$admin->name;
        $categories = Category::orderBy('name')->get();
        return view('backend.admin.gallery.category.index',compact('admin','heading','title','categories'));
    }
    public function store(Request $request){
        $this->validate($request,[
            'name'=>'required|unique:categories,name',
        ]);
        $category = new Category();
        $category->name = $request->name;
        $category->type = 'editable';
        $category->save();
        return back()->with('success','Category added successfully !');
    }
    public function update(Request $request,$id){
        $this->validate($request,[
            'name'=>'required|unique:categories,name,'.$id,
        ]);
        if ($category = Category::where('type','editable')->where('id',$id)->first()){
            $category->name = $request->name;
            $category->type = 'editable';
            $category->save();
            return back()->with('success','Category updated successfully !');
        }else{
            return back()->with('error','Sorry! this category con not be edited !');

        }
    }
}
