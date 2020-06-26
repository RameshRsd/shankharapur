<?php

namespace App\Http\Controllers\backend\admin\profile;

use App\Http\Controllers\Controller;
use App\Model\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index(){
        return redirect('admin/profile-manage/edit-profile');
    }
    public function edit(){
        $admin = Admin::find(1);
        $user = $admin->user;
        $title = 'Edit Profile - Profile Manage - Admin Panel | '.$admin->name;
        return view('backend.admin.profile.edit',compact('title','user','admin'));
    }
    public function update(Request $request){
        $admin = Admin::find(1);
        $this->validate($request,[
           'name' => 'required',
           'address' => 'required',
           'regd_no' => 'required',
           'email1' => 'required',
           'company_head' => 'required',
           'head_position' => 'required',
        ]);
        $admin->name = $request->name;
        $admin->name_np = $request->name_np;
        $admin->address = $request->address;
        $admin->tel1 = $request->tel1;
        $admin->tel2 = $request->tel2;
        $admin->mobile1 = $request->mobile1;
        $admin->mobile2 = $request->mobile2;
        $admin->email1 = $request->email1;
        $admin->email2 = $request->email2;
        $admin->company_head = $request->company_head;
        $admin->head_position = $request->head_position;
        $admin->regd_no = $request->regd_no;
        $admin->vat_no = $request->vat_no;
        $admin->description = $request->description;
        if ($request->owner_detail){
            $admin->owner_detail = 'yes';
        }else{
            $admin->owner_detail = 'no';
        }
        $admin->save();
        return back()->with('success','Profile updated successfully !');
    }
    public function changePassword(Request $request){
        $this->validate($request,[
            'password' => 'required|confirmed',
            'password_confirmation' => 'required',
        ]);
        $user = Auth::user();
        $user->password = bcrypt($request->password);
        $user->save();
        return redirect('admin')->with('success','Password changed successfully !');
    }
    public function updatePhoto(Request $request){
        $user = Auth::user();
        $this->validate($request,[
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        if ($request->hasFile('photo')){
            if ($user->photo =='avatar.jpg'){
            }else{
                if (is_file(public_path('default'.'/'.$user->photo)) && file_exists(public_path('default'.'/'.$user->photo))){
                    unlink(public_path('default'.'/'.$user->photo));
                }

            }
            $filename = request()->file('photo')->getClientOriginalName();

            request()->file('photo')->move('public/default'.'/',$filename);

            $user->photo =$filename;
            $user->save();
            return redirect('admin')->with('success','Photo updated successfully !');
        }else{
            return redirect('admin')->with('error','Something went wrong !');
        }

    }
}
