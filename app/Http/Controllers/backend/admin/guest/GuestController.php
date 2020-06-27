<?php

namespace App\Http\Controllers\backend\admin\guest;

use App\Http\Controllers\Controller;
use App\Model\Country;
use App\Model\District;
use App\Model\Guest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GuestController extends Controller
{
    public function index(){
        return redirect('admin/guest-manage/guests');
    }
    public function guestList(Request $request){
        $user = Auth::user();
        $title = 'Guest List - Guest Management - Admin Panel | '.$user->admin->name;
        if ($request->per_page){
            $paginate=$request->per_page;
        }else{
            $paginate=10;
        }
        if ($request->order){
            $order=$request->order;
        }else{
            $order='ASC';
        }
        $guest = Guest::orderBy('id',$order);
        $guests = $guest->simplePaginate($paginate);
        $districts = District::orderBy('name')->get();
        return view('backend.admin.guest.index',compact('title','guests','districts'));
    }
    public function create(Request $request){
        $user = Auth::user();
        $title = 'Add New Guest - Guest Management - Admin Panel | '.$user->admin->name;
        $countries = Country::all();
        return view('backend.admin.guest.create',compact('title','countries'));
    }
}
