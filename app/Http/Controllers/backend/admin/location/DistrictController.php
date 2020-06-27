<?php

namespace App\Http\Controllers\backend\admin\location;

use App\Http\Controllers\Controller;
use App\Model\Country;
use App\Model\District;
use App\Model\State;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DistrictController extends Controller
{
    public function index(Request $request){
        $user = Auth::user();
        $admin = $user->admin;
        $name = $admin->name;
        $title = 'Districts - Location Manage - Admin Panel | '.$name;
        $countries = Country::all();
        $state = State::orderBy('name');
        if ($request->country_id){
            $state->where('country_id',$request->country_id);
        }else{
            $state->where('country_id',1);
        }
        $states = $state->get();
        if ($request->per_page){
            $paginate=$request->per_page;
        }else{
            $paginate=10;
        }
        if ($request->order){
            $order=$request->order;
        }else{
            $order='ASC';
        }
        $district = District::orderBy('name',$order);
        if ($request->state_id){
            $district->where('state_id',$request->state_id);
        }
        $districts = $district->simplePaginate($paginate);
        return view('backend.admin.location.district.index',compact('title','countries','states','districts'));
    }

    public function store(Request $request){
        $this->validate($request,[
            'name' => 'required|unique:districts,name',
            'state_id'=>'required'
        ]);
        $district = new District();
        $district->name = $request->name;
        $district->state_id = $request->state_id;
        $district->save();
        return back()->with('success','Record added successfully !');
    }

    public function edit(Request $request,$id){
        $user = Auth::user();
        $admin = $user->admin;
        $name = $admin->name;
        $title = 'Districts - Location Manage - Admin Panel | '.$name;
        $district = District::findOrFail($id);
        $countries = Country::all();
        $state = State::orderBy('name');
        if ($request->country_id){
            $state->where('country_id',$request->country_id);
        }else{
            $state->where('country_id',1);
        }
        $states = $state->get();
        return view('backend.admin.location.district.edit',compact('title','district','countries','states'));
    }

    public function update(Request $request,$id){
        $this->validate($request,[
            'name' => 'required|unique:districts,name,'.$id,
            'state_id'=>'required'
        ]);
        $district = District::findOrFail($id);
        $district->name = $request->name;
        $district->state_id = $request->state_id;
        $district->save();
        return redirect('admin/location-manage/districts')->with('success','Record updated successfully !');
    }

}
