<?php

namespace App\Http\Controllers\backend\admin\location;

use App\Http\Controllers\Controller;
use App\Model\Country;
use App\Model\State;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StateController extends Controller
{
    public function index(Request $request){
        $user = Auth::user();
        $admin = $user->admin;
        $name = $admin->name;
        $title = 'States - Location Manage - Admin Panel | '.$name;
        $countries = Country::all();
        $state = State::orderBy('name');
        if ($request->country_id){
            $state->where('country_id',$request->country_id);
        }
        $states = $state->get();
        return view('backend.admin.location.state.index',compact('title','countries','states'));
    }

    public function store(Request $request){
        $this->validate($request,[
            'name' => 'required|unique:states,name',
            'country_id'=>'required'
        ]);
        $state = new State();
        $state->name = $request->name;
        $state->country_id = $request->country_id;
        $state->save();
        return back()->with('success','Record added successfully !');
    }

    public function update(Request $request,$id){
        $this->validate($request,[
            'name' => 'required|unique:states,name,'.$id,
            'country_id'=>'required'
        ]);
        $state = State::findOrFail($id);
        $state->name = $request->name;
        $state->country_id = $request->country_id;
        $state->save();
        return back()->with('success','Record updated successfully !');
    }

}
