<?php

namespace App\Http\Controllers\backend\admin\work\checking;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoomController extends Controller
{
    public function index(){
        $user = Auth::user();
        $heading = 'Room Checked in';
        $title = $heading.' - Room Management - Admin Panel | '.$user->admin->name;
        return view('backend.admin.work.checking.index',compact('title','heading'));
    }
    public function create(){
        $user = Auth::user();
        $heading = 'New Room Checked in';
        $title = $heading.' - Room Management - Admin Panel | '.$user->admin->name;
        return view('backend.admin.work.checking.create',compact('title','heading'));
    }

}
