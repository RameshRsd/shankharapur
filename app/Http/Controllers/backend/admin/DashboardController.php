<?php

namespace App\Http\Controllers\backend\admin;

use App\Http\Controllers\Controller;
use App\Model\Guest;
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
        $checkedin = RoomCheck::where('checked_in_date',date('Y-m-d'))->count();
        $roomBooked = RoomBook::where('check_in_date','>=',date('Y-m-d'))->count();
        $guests = Guest::count();
        $todaySales = RoomCheck::where('checked_out_date',date('Y-m-d'))->get();
        $rupees = 0;
        foreach ($todaySales as $todaySale){
            $rupees += $todaySale->rate;
        }
        return view('backend.admin.index',compact('title','checkedin','roomBooked','guests','rupees'));
    }
}
