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
        $features = Feature::all();
        return view('backend.admin.room.create',compact('title','accoms','floors','features'));
    }
    public function store(Request $request){
        $this->validate($request,[
            'room_no' => 'required|unique:rooms,room_no',
            'accommodation_id' => 'required',
            'floor_id' => 'required',
            'RoomRateType' => 'required'
        ]);

        $room = new Room();
        $room->user_id = Auth::user()->id;
        $room->accommodation_id = $request->accommodation_id;
        $room->room_no = $request->room_no;
        $room->floor_id = $request->floor_id;
        if ($request->RoomRateType=='same'){
            $accom = Accommodation::findOrFail($request->accommodation_id);
            $room->rate = $accom->rate;
            $room->rate_type = $accom->rate_type;
        }else{
            $this->validate($request,[
                'rate' => 'required',
                'rate_type' => 'required',
            ]);
            $room->rate = $request->rate;
            $room->rate_type = $request->rate_type;
        }
        $room->details = $request->details;
        if ($request->hasFile('image')){
            $totalAccoms = Room::count();
            $randomChars = $totalAccoms.'-'.rand(100,1000);
            $filename = $randomChars.'-'.request()->file('image')->getClientOriginalName();
            request()->file('image')->move('public/rooms/photos'.'/',$filename);
            $room->image =$filename;
        }
        $room->save();
        if($request->feature_id){
            $room->features()->sync($request->feature_id);
        }
        return redirect('admin/rooms/room-list')->with('success','Record saved successfully !');
    }

    public function edit($id){
        $user = Auth::user();
        $room = Room::findOrFail($id);
        $title = $room->room_no.' - Edit Room - Room Management - Admin Panel | '.$user->admin->name;
        $accoms = Accommodation::orderBy('name')->get();
        $floors = Floor::all();
        $features = Feature::all();
        return view('backend.admin.room.edit',compact('title','accoms','floors','features','room'));
    }
    public function update(Request $request,$id){
        $this->validate($request,[
            'room_no' => 'required|unique:rooms,room_no,'.$id,
            'accommodation_id' => 'required',
            'floor_id' => 'required',
            'RoomRateType' => 'required'
        ]);

        $room = Room::findOrFail($id);
        $room->accommodation_id = $request->accommodation_id;
        $room->room_no = $request->room_no;
        $room->floor_id = $request->floor_id;
        if ($request->RoomRateType=='same'){
            $accom = Accommodation::findOrFail($request->accommodation_id);
            $room->rate = $accom->rate;
            $room->rate_type = $accom->rate_type;
        }else{
            $this->validate($request,[
                'rate' => 'required',
                'rate_type' => 'required',
            ]);
            $room->rate = $request->rate;
            $room->rate_type = $request->rate_type;
        }
        $room->details = $request->details;
        if ($request->hasFile('image')){
            if (is_file(public_path('rooms/photos'.'/'.$room->photo)) && file_exists(public_path('rooms/photos'.'/'.$room->photo))){
                unlink(public_path('rooms/photos'.'/'.$room->photo));
            }
            $totalAccoms = Room::count();
            $randomChars = $totalAccoms.'-'.rand(100,1000);
            $filename = $randomChars.'-'.request()->file('image')->getClientOriginalName();
            request()->file('image')->move('public/rooms/photos'.'/',$filename);
            $room->image =$filename;
        }
        $room->save();
        if($request->feature_id){
            $room->features()->sync($request->feature_id);
        }
        return redirect('admin/room-manage/room-list')->with('success','Record updated successfully !');
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
