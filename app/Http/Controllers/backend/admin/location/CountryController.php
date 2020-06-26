<?php

namespace App\Http\Controllers\backend\admin\location;

use App\Http\Controllers\Controller;
use App\Model\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CountryController extends Controller
{
    public function index(Request $request){
        $user = Auth::user();
        $admin = $user->admin;
        $name = $admin->name;
        $title = 'Countries - Location Manage - Admin Panel | '.$name;
        $countries = Country::all();
        return view('backend.admin.location.country.index',compact('title','countries'));
    }

    public function store(Request $request){
        $this->validate($request,[
            'name' => 'required|unique:countries,name'
        ]);
        $country = new Country();
        $country->name = $request->name;
        $country->save();
        return back()->with('success','Record added successfully !');
    }

    public function update(Request $request,$id){
        $this->validate($request,[
            'name' => 'required|unique:countries,name,'.$id
        ]);
        $country = Country::findOrFail($id);
        $country->name = $request->name;
        $country->save();
        return back()->with('success','Record updated successfully !');
    }

}
