<?php

namespace App\Http\Controllers\backend\admin\guest;

use App\Http\Controllers\Controller;
use App\Model\Country;
use App\Model\District;
use App\Model\Guest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

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
        if ($request->name){
            $guest->where('first_name','like',$request->name.'%');
        }
        if ($request->district_id){
            $guest->where('district_id',$request->district_id);
        }
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
    public function store(Request $request){
        $this->validate($request,[
            'first_name' => 'required',
            'last_name' => 'required',
            'country_id' => 'required',
            'state_id' => 'required',
            'district_id' => 'required',
            'mobile1' => 'required',
            'id_no' => 'required',
            'id_type' => 'required'
        ]);
        /*========= User Creating============= */
        $totalGuest = Guest::count();
        $randomNumeric = $totalGuest+rand(1,100);
        $username = Str::lower($request->first_name).'-'.$randomNumeric;
        $user = new User();
        $user->name = $username;
        $user->email = $username.'@hotelshankharapur.com';
        $user->password = bcrypt($request->mobile1);
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
        $guest->country_id = $request->country_id;
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
        return redirect('admin/guest-manage/guests')->with('success','Guest added successfully !');
    }
    public function edit($id){
        $user = Auth::user();
        $guest = Guest::findOrFail($id);
        $title = $guest->first_name.' '.$guest->last_name.'- Edit Guest - Guest Management - Admin Panel | '.$user->admin->name;
        $countries = Country::all();
        $states = $guest->country->states()->orderBy('name')->get();
        $districts = $guest->state->districts()->orderBy('name')->get();
        $cities = $guest->district->cities()->orderBy('name')->get();
        return view('backend.admin.guest.edit',compact('title','countries','guest','states','districts','cities'));
    }
    public function update(Request $request,$id){
        $this->validate($request,[
            'first_name' => 'required',
            'last_name' => 'required',
            'country_id' => 'required',
            'state_id' => 'required',
            'district_id' => 'required',
            'mobile1' => 'required',
            'id_no' => 'required',
            'id_type' => 'required'
        ]);
        $guest = Guest::findOrFail($id);
        $guest->first_name = $request->first_name;
        $guest->middle_name = $request->middle_name;
        $guest->last_name = $request->last_name;
        $guest->father_name = $request->father_name;
        $guest->country_id = $request->country_id;
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
            if (is_file(public_path('guest/photos'.'/'.$guest->photo)) && file_exists(public_path('guest/photos'.'/'.$guest->photo))){
                unlink(public_path('guest/photos'.'/'.$guest->photo));
            }
            $filename = $guest->user->name.'-'.request()->file('photo')->getClientOriginalName();

            request()->file('photo')->move('public/guest/photos'.'/',$filename);
            $guest->photo =$filename;
        }

        $guest->save();
        return redirect('admin/guest-manage/guests')->with('success','Guest updated successfully !');
    }

}
