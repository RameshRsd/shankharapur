<?php

namespace App\Http\Controllers\backend\admin\accommodation;

use App\Http\Controllers\Controller;
use App\Model\Accommodation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class AccommodationController extends Controller
{
    public function index(){
        return redirect('admin/accommodations/accommodation-list');
    }
    public function getList(Request $request){
        $user = Auth::user();
        $title = 'Accommodation List - Accommodation Management - Admin Panel | '.$user->admin->name;
        if($request->order){
            $order=$request->order;
        }else{
            $order='DESC';
        }
        if($request->per_page){
            $paginate=$request->per_page;
        }else{
            $paginate=10;
        }
        $accom = Accommodation::orderBy('id',$order);
        if ($request->name){
            $accom->where('name','like',$request->name.'%');
        }
        $accoms = $accom->simplePaginate($paginate);
        return view('backend.admin.accommodation.index',compact('title','accoms'));
    }
    public function create(){
        $user = Auth::user();
        $title = 'Add New Accommodation - Accommodation Management - Admin Panel | '.$user->admin->name;
        return view('backend.admin.accommodation.create',compact('title'));
    }
    public function store(Request $request){
        $this->validate($request,[
           'name' => 'required|unique:accommodations,name',
            'rate' => 'required',
            'rate_type' => 'required'
        ]);

        $accom = new Accommodation();
        $accom->user_id = Auth::user()->id;
        $accom->name = $request->name;
        $accom->slug = Str::slug($request->name);
        $accom->rate = $request->rate;
        $accom->rate_type = $request->rate_type;
        $accom->details = $request->details;
        if ($request->hasFile('image')){
            $totalAccoms = Accommodation::count();
            $randomChars = $totalAccoms.'-'.rand(100,1000);
            $filename = $randomChars.'-'.request()->file('image')->getClientOriginalName();
            request()->file('image')->move('public/accommodations/photos'.'/',$filename);
            $accom->image =$filename;
        }
        $accom->save();
        return redirect('admin/accommodations/accommodation-list')->with('success','Record saved successfully !');
    }
    public function edit($id){
        $user = Auth::user();
        $accom = Accommodation::findOrFail($id);
        $title = $accom->name.' Edit Accommodation - Accommodation Management - Admin Panel | '.$user->admin->name;
        return view('backend.admin.accommodation.edit',compact('title','accom'));
    }
    public function update(Request $request,$id){
        $this->validate($request,[
            'name' => 'required|unique:accommodations,name,'.$id,
            'rate' => 'required',
            'rate_type' => 'required'
        ]);

        $accom = Accommodation::findOrFail($id);
        $accom->name = $request->name;
        $accom->slug = Str::slug($request->name);
        $accom->rate = $request->rate;
        $accom->rate_type = $request->rate_type;
        $accom->details = $request->details;
        if ($request->hasFile('image')){
            if (is_file(public_path('accommodations/photos'.'/'.$accom->photo)) && file_exists(public_path('accommodations/photos'.'/'.$accom->photo))){
                unlink(public_path('accommodations/photos'.'/'.$accom->photo));
            }
            $totalAccoms = Accommodation::count();
            $randomChars = $totalAccoms.'-'.rand(100,1000);
            $filename = $randomChars.'-'.request()->file('image')->getClientOriginalName();
            request()->file('image')->move('public/accommodations/photos'.'/',$filename);
            $accom->image =$filename;
        }
        $accom->save();
        return redirect('admin/accommodations/accommodation-list')->with('success','Record updated successfully !');
    }
}
