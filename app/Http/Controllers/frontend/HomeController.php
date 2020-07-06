<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Model\Accommodation;
use App\Model\Admin;
use App\Model\Room;
use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $info = Admin::find(1);
        $title = $info->name.' | Best Memories start here';
        $rooms = Accommodation::limit(3)->get();
        return view('frontend.welcome',compact('title','rooms','info'));
    }
    public function about_us(){
        $info = Admin::find(1);
        $heading = 'About Us';
        $title = $heading.' | '.$info->name.' | Best Memories start here';
        $accoms = Accommodation::count();
        $rooms = Room::count();
        $staff = User::where('type','staff')->count();
        return view('frontend.pages.about_us',compact('title','heading','info','accoms','rooms','staff'));
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
        $info = Admin::find(1);
        $title = 'News | '.$info->name.' | Best Memories start here';
        return view('frontend.pages.news_list',compact('title'));
    }
    public function contact_us(){
        $info = Admin::find(1);
        $heading = 'Contact Us';
        $title = $heading.' | '. $info->name.' | Best Memories start here';
        return view('frontend.pages.contact_us',compact('title','heading'));
    }
    public function getRoom(Request $request){
        $room_type = $request->room_type;
        $rooms = Room::where('accommodation_id',$room_type)->where('room_status','CheckedOut')->orderBy('room_no')->get();
        return response()->json($rooms);
    }
}
