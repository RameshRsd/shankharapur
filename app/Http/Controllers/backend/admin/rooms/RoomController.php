<?php

namespace App\Http\Controllers\backend\admin\rooms;

use App\Http\Controllers\Controller;
use App\Model\Accommodation;
use App\Model\Feature;
use App\Model\Floor;
use App\Model\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class RoomController extends Controller
{
    public function index(){
        return redirect('admin/room-manage/room-list');
    }
    public function getList(Request $request){
        $user = Auth::user();
        $title = 'Room List - Room Management - Admin Panel | '.$user->admin->name;
        if($request->order){
            $order=$request->order;
        }else{
            $order='DESC';
        }
        if($request->per_page){
            $paginate=$request->per_page;
        }else{
            $paginate=10;
        }
        $room = Room::orderBy('id',$order);
        if ($request->name){
            $room->where('name','like',$request->name.'%');
        }
        $rooms = $room->simplePaginate($paginate);
        return view('backend.admin.room.index',compact('title','rooms'));
    }
    public function create(){
        $user = Auth::user();
        $title = 'Add New Room - Room Management - Admin Panel | '.$user->admin->name;
        $accoms = Accommodation::orderBy('name')->get();
        $floors = Floor::all();
        return view('backend.admin.room.create',compact('title','accoms','floors'));
    }
    public function roomFeatures(Request $request){
        $user = Auth::user();
        $title = 'Room Features - Room Management - Admin Panel | '.$user->admin->name;
        if($request->order){
            $order=$request->order;
        }else{
            $order='DESC';
        }
        if($request->per_page){
            $paginate=$request->per_page;
        }else{
            $paginate=10;
        }
        $feature = Feature::orderBy('id',$order);
        if ($request->name){
            $feature->where('name','like',$request->name.'%');
        }
        $features = $feature->simplePaginate($paginate);
        return view('backend.admin.room.features',compact('title','features'));
    }

    public function roomFeaturesStore(Request $request){
        $this->validate($request,[
            'name' =>'required|unique:features,name'
        ]);
        $feature = new Feature();
        $feature->user_id = Auth::user()->id;
        $feature->name = $request->name;
        $feature->slug = Str::slug($request->name);
        $feature->save();
        return back()->with('success','Feature added successfully !');
    }
    public function roomFeaturesUpdate(Request $request,$id){
        $this->validate($request,[
            'name' =>'required|unique:features,name,'.$id
        ]);
        $feature = Feature::findOrFail($id);
        $feature->user_id = Auth::user()->id;
        $feature->name = $request->name;
        $feature->slug = Str::slug($request->name);
        $feature->save();
        return back()->with('success','Feature updated successfully !');
    }
    public function getData(Request $request){
        $accoms = Accommodation::find($request->accommodation_id);
        return response()->json($accoms);
    }
}
