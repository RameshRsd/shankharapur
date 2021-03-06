<?php

namespace App\Http\Controllers\backend\admin\location;

use App\Http\Controllers\Controller;
use App\Model\City;
use App\Model\Country;
use App\Model\District;
use App\Model\State;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CityController extends Controller
{
    public function index(Request $request){
        $user = Auth::user();
        $admin = $user->admin;
        $name = $admin->name;
        $title = 'Cities - Location Manage - Admin Panel | '.$name;
        $countries = Country::all();
        $states = State::orderBy('name')->get();
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

        $city = City::orderBy('name',$order);
        if ($request->district_id){
            $city->where('district_id',$request->district_id);
        }
        $stateIds = State::orderBy('name')->select('id')->get();

        $district = District::whereIn('state_id',$stateIds)->orderBy('name');
        if ($request->state_id){
            $district->where('state_id',$request->state_id);
            $distritIds = District::where('state_id',$request->state_id)->select('id')->get();
            $city->whereIn('district_id',$distritIds);
        }


        $cities = $city->simplePaginate($paginate);
        $districts=$district->get();
        return view('backend.admin.location.city.index',compact('title','countries','states','districts','cities'));
    }

    public function store(Request $request){
        $this->validate($request,[
            'name' => 'required',
            'district_id'=>'required',
            'type'=>'required'
        ]);
        $city = new City();
        $city->name = $request->name;
        $city->district_id = $request->district_id;
        $city->type = $request->type;
        $city->save();
        return back()->with('success','Record added successfully !');
    }

    public function edit($id){
        $user = Auth::user();
        $admin = $user->admin;
        $name = $admin->name;
        $title = 'Edit City - Location Manage - Admin Panel | '.$name;
        $city = City::findOrFail($id);
        $countries = Country::orderBy('name')->get();
        $states = $city->district->state->country->states;
        $districts = $city->district->state->districts;
        return view('backend.admin.location.city.edit',compact('title','countries','states','districts','city'));
    }
    public function update(Request $request,$id){
        $this->validate($request,[
            'name' => 'required',
            'district_id'=>'required'
        ]);
        $city = City::findOrFail($id);
        $city->name = $request->name;
        $city->district_id = $request->district_id;
        $city->type = $request->type;
        $city->save();
        return redirect('admin/location-manage/cities')->with('success','Record updated successfully !');
    }

}
