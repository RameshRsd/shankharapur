<?php

namespace App\Http\Controllers\backend\admin;

use App\Http\Controllers\Controller;
use App\Model\Floor;
use App\Model\Guest;
use App\Model\Room;
use App\Model\RoomBook;
use App\Model\RoomCheck;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(){
        $user = Auth::user();
        $admin = $user->admin;
        $name = $admin->name;
        $title  = 'Dashboard - Admin Panel | '.$name;
        $checkedin = Room::where('room_status','CheckedIn')->count();
        $roomBooked = Room::where('room_status','Booked')->count();
        $availableRoom = Room::where('room_status','CheckedOut')->count();
        $guests = Guest::count();
        $todaySales = RoomCheck::where('checked_out_date',date('Y-m-d'))->get();
        $rupees = 0;
        foreach ($todaySales as $todaySale){
            $rupees += $todaySale->rate;
        }
        $floors = Floor::orderBy('id','ASC')->get();

        return view('backend.admin.index',compact('title','checkedin','roomBooked','guests','rupees','floors','availableRoom'));
    }
}
