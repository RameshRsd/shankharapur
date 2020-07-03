<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Model\Room;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $title = 'Hotel Shankharapur | Best Memories start here';
        return view('frontend.welcome');
    }
    public function getRoom(Request $request){
        $room_type = $request->room_type;

        $rooms = Room::where('accommodation_id',$room_type)->where('room_status','CheckedOut')->orderBy('room_no')->get();
        return response()->json($rooms);
    }
}
