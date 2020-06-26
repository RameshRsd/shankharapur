<?php

namespace App\Http\Controllers\backend\admin\location;

use App\Http\Controllers\Controller;
use App\Model\City;
use App\Model\Country;
use App\Model\District;
use App\Model\State;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LocationController extends Controller
{
    public function index(){
        return redirect('admin/location-manage/countries');
    }
}
