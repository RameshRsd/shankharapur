<?php

namespace App\Http\Controllers\backend\admin\gallery;

use App\Http\Controllers\Controller;
use App\Model\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Request $request){
        dd('categories');
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
}
