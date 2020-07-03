<?php

namespace App\Http\Controllers\backend\admin\work\booking;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoomController extends Controller
{
    public function index(){
        $user = Auth::user();
        $heading = 'Room Booking';
        $title = $heading.' - Room Management - Admin Panel | '.$user->admin->name;
        return view('backend.admin.work.booking.index',compact('title','heading'));
    }
    public function create(){
        $user = Auth::user();
        $heading = 'New Room Booking';
        $title = $heading.' - Room Management - Admin Panel | '.$user->admin->name;
        return view('backend.admin.work.booking.create',compact('title','heading'));
    }
}
