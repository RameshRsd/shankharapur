<?php

namespace App\Http\Controllers\backend\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GuestController extends Controller
{
    public function index(Request $request){
        $user = Auth::user();
        $admin = $user->admin;
        $name = $admin->name;
        $title = 'Guests Manage - Admin Panel | '.$name;
        return view('backend.admin.guest.index',compact('title'));
    }
}
