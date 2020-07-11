<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Model\Accommodation;
use App\Model\Admin;
use App\Model\Country;
use App\Model\Guest;
use App\Model\State;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class GuestController extends Controller
{
    public function create(Request $request){
        $info = Admin::find(1);
        $heading = 'Guest Sign Up';
        $title = $heading.' - '.$info->name;
        if ($request->redirectTo){
            $redirectTo = $request->redirectTo;
        }else{
            $redirectTo ='';
        }
        $rooms = Accommodation::all();
        $states = State::orderBy('name')->get();
        return view('frontend.guest.create',compact('title','heading','info','redirectTo','rooms','states'));
    }
    public function store(Request $request){
        $this->validate($request,[
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'state_id' => 'required',
            'district_id' => 'required',
            'mobile1' => 'required',
            'id_no' => 'required',
            'id_type' => 'required'
        ]);
        /*========= User Creating============= */
        $country_id = State::find($request->state_id)->country_id;
        $totalGuest = Guest::count();
        $randomNumeric = $totalGuest+rand(1,100);
        $username = Str::lower($request->first_name).'-'.$randomNumeric;
        $user = new User();
        $user->name = $username;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->type = 'guest';
        $user->status = 'active';
        $user->save();
        /*========= Guest Creating============= */
        $guest = new Guest();
        $guest->user_id = $user->id;
        $guest->first_name = $request->first_name;
        $guest->middle_name = $request->middle_name;
        $guest->last_name = $request->last_name;
        $guest->father_name = $request->father_name;
        $guest->country_id = $country_id;
        $guest->state_id = $request->state_id;
        $guest->district_id = $request->district_id;
        $guest->city_id = $request->city_id;
        $guest->tole = $request->tole;
        $guest->ward_no = $request->ward_no;
        $guest->mobile1 = $request->mobile1;
        $guest->mobile2 = $request->mobile2;
        $guest->id_no = $request->id_no;
        $guest->id_type = $request->id_type;
        $guest->facebook_link = $request->facebook_link;
        $guest->twitter_link = $request->twitter_link;
        $guest->instagram_link = $request->instagram_link;
        if ($request->hasFile('photo')){
//            if (is_file(public_path('guest/photos'.'/'.$user->photo)) && file_exists(public_path('guest/photos'.'/'.$user->photo))){
//                unlink(public_path('guest/photos'.'/'.$user->photo));
//            }
            $filename = $username.'-'.request()->file('photo')->getClientOriginalName();

            request()->file('photo')->move('public/guest/photos'.'/',$filename);
            $guest->photo =$filename;
        }

        $guest->save();
        if ($request->redirectTo){
            return redirect($request->redirectTo)->with('success','Registration successful !');
        }else{
            return redirect('')->with('success','Registration successful !');
        }
    }

}
