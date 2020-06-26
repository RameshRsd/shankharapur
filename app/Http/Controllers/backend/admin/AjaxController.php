<?php

namespace App\Http\Controllers\backend\admin;

use App\Http\Controllers\Controller;
use App\Model\City;
use App\Model\Guest;
use App\Model\RoomBook;
use App\Model\RoomCheck;
use App\Model\State;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AjaxController extends Controller
{
    public function getState(Request $request){
        $states = State::where('country_id',$request->country_id)->orderBy('name')->get();
        return response()->json($states);
    }

    public function getDistrict(Request $request){
        $districts = State::where('state_id',$request->state_id)->orderBy('name')->get();
        return response()->json($districts);
    }

    public function getCity(Request $request){
        $cities = City::where('district_id',$request->district_id)->orderBy('name')->get();
        return response()->json($cities);
    }

}
