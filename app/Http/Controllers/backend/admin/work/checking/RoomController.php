<?php

namespace App\Http\Controllers\backend\admin\work\checking;

use App\Http\Controllers\Controller;
use App\Model\Accommodation;
use App\Model\Guest;
use App\Model\Room;
use App\Model\RoomCheck;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoomController extends Controller
{
    public function index(){
        $user = Auth::user();
        $heading = 'Room Checked in';
        $title = $heading.' - Room Management - Admin Panel | '.$user->admin->name;
        $room = RoomCheck::orderBy('id','DESC');
//        $room = RoomCheck::where('checked_in_date','>=',date('Y-m-d'))->orderBy('id','DESC');
        $rooms = $room->get();
        return view('backend.admin.work.checking.index',compact('title','heading','rooms'));
    }
    public function create(){
        $user = Auth::user();
        $heading = 'New Room Checked in';
        $title = $heading.' - Room Management - Admin Panel | '.$user->admin->name;
        $roomTypes = Accommodation::all();
        $guests = Guest::orderBy('first_name')->get();
        $previousPage=url('admin/work-flows/room-check');
        return view('backend.admin.work.checking.create',compact('title','heading','roomTypes','guests','previousPage'));
    }
    public function store(Request $request){
        $this->validate($request,[
            'guest_id' => 'required',
            'room_id' => 'required',
            'checked_in_date' => 'required',
            'numbers' => 'required',
            'RoomRateType' => 'required',
        ]);
        $room = new RoomCheck();
        $roomStatus = Room::find($request->room_id);
        if ($request->RoomRateType=='different'){
            $this->validate($request,[
                'rate' => 'required',
                'rate_type' => 'required',
            ]);
            $room->rate = $request->rate;
            $room->rate_type = $request->rate_type;
        }else{
            $room->rate = $roomStatus->rate;
            $room->rate_type = $roomStatus->rate_type;
        }
        $room->user_id = Auth::user()->id;
        $room->guest_id = $request->guest_id;
        $room->room_id = $request->room_id;
        $room->checked_in_date = date('Y-m-d',strtotime($request->checked_in_date));
        $room->numbers = $request->numbers;
        $room->numbers = $request->numbers;
        $redirectUrl='admin/work-flows/room-check';
        if ($room->save()){
            $guest = Guest::find($request->guest_id);
            $roomStatus->room_status = 'CheckedIn';
            $roomStatus->save();
            return redirect($redirectUrl)->with('success',$roomStatus->room_no.' Room is Checked in by '.$guest->first_name.' '.$guest->last_name.' !');
        }else{
            return redirect($redirectUrl)->with('error',' Something went wrong !');
        }
    }
    public function continueCheck($id){
        $roomCheck = RoomCheck::findOrFail($id);
        $newRoom = new RoomCheck();
        $newRoom->user_id = Auth::user()->id;
        $newRoom->guest_id = $roomCheck->guest_id;
        $newRoom->room_id = $roomCheck->room_id;
        $newRoom->checked_in_date = date('Y-m-d');
        $newRoom->numbers = $roomCheck->numbers;
        $newRoom->numbers = $roomCheck->numbers;
        $newRoom->rate = $roomCheck->rate;
        $newRoom->rate_type = $roomCheck->rate_type;
        $newRoom->save();
        $redirectUrl='admin/work-flows/room-check';
        return redirect($redirectUrl)->with('success',' Room checked in successfully !');
    }
    public function checkout($id){
        $roomCheck = RoomCheck::findOrFail($id);
        $room = Room::find($roomCheck->room_id);
        $room->room_status = 'CheckedOut';
        $room->save();
        $roomCheck->checked_out_date = date('Y-m-d');
        $roomCheck->save();
        $redirectUrl='admin/work-flows/room-check';
        return redirect($redirectUrl)->with('success',' Room checked out successfully !');
    }
    public function remove($id){
        $roomCheck = RoomCheck::findOrFail($id);
        $room = Room::find($roomCheck->room_id);
        $room->room_status = 'CheckedOut';
        $room->save();
        $roomCheck->delete();
        $redirectUrl='admin/work-flows/room-check';
        return redirect($redirectUrl)->with('success',' Record deleted successfully !');
    }
}
