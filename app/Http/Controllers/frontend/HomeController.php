<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Model\Room;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $title = 'Hotel Shankharapur | Best Memories start here';
        return view('frontend.welcome',compact('title'));
    }
    public function about_us(){
        $title = 'About Us ';
        return view('frontend.pages.about_us',compact('title'));
    }
    public function rooms(){
        $title = 'Rooms';
        return view('frontend.pages.room',compact('title'));
    }
    public function room_details(){
        $title = 'Rooms Details';
        return view('frontend.pages.room_details',compact('title'));
    }
    public function news(){
        $title = 'Rooms';
        return view('frontend.pages.news_list',compact('title'));
    }
    public function contact_us(){
        $title = 'Contact Us';
        return view('frontend.pages.contact_us',compact('title'));
    }
    public function getRoom(Request $request){
        $room_type = $request->room_type;
        $rooms = Room::where('accommodation_id',$room_type)->where('room_status','CheckedOut')->orderBy('room_no')->get();
        return response()->json($rooms);
    }
}
