<?php

namespace App\Http\Controllers\backend\admin\work\booking;

use App\Http\Controllers\Controller;
use App\Model\Accommodation;
use App\Model\Guest;
use App\Model\Room;
use App\Model\RoomBook;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoomController extends Controller
{
    public function index(){
        $user = Auth::user();
        $heading = 'Room Booking';
        $title = $heading.' - Room Management - Admin Panel | '.$user->admin->name;
        $room = RoomBook::where('status','!=','rejected')->orderBy('id','DESC');
        $rooms = $room->get();
        return view('backend.admin.work.booking.index',compact('title','heading','rooms'));
    }
    public function create(){
        $user = Auth::user();
        $heading = 'New Room Booking';
        $title = $heading.' - Room Management - Admin Panel | '.$user->admin->name;
        $roomTypes = Accommodation::all();
        $guests = Guest::orderBy('first_name')->get();
        $previousPage=url('admin/work-flows/room-book');
        return view('backend.admin.work.booking.create',compact('title','heading','guests','roomTypes','previousPage'));
    }
    public function store(Request $request){
        $this->validate($request,[
            'type' => 'required',
            'check_in_date' => 'required',
            'child_numbers' => 'required',
            'adult_numbers' => 'required',
            'number_of_room' => 'required',
            'room_section' => 'required'
        ]);
        $id = $request->room_section;
        if ($room = Room::where('room_status','CheckedOut')->where('id',$id)->first()){
            $roomBook = new RoomBook();
            if ($request->type=='internal'){
                $this->validate($request,[
                    'guest_id' => 'required',
                ]);
                $roomBook->guest_id = $request->guest_id;
            }else{
                $this->validate($request,[
                    'full_name' => 'required',
                    'mobile' => 'required'
                ]);
                $roomBook->full_name = $request->full_name;
                $roomBook->mobile = $request->mobile;
            }

            $roomBook->type = $request->type;
            $roomBook->room_id = $id;
            $roomBook->check_in_date = date('Y-m-d',strtotime($request->check_in_date));
            $roomBook->check_out_date = date('Y-m-d',strtotime($request->check_out_date));
            $roomBook->child_numbers = $request->child_numbers;
            $roomBook->adult_numbers = $request->adult_numbers;
            $roomBook->number_of_room = $request->number_of_room;
            $roomBook->status = 'pending';
            if ($roomBook->save()){
                $room = Room::find($id);
                $room->room_status = 'Booked';
                $room->save();
                return redirect('admin/work-flows/room-book')->with('success',$room->room_no.' Room is Booked !');
            }else{
                return redirect('admin/work-flows/room-book')->with('error','Something went wrong !');
            }
        }
        return redirect('admin/work-flows/room-book')->with('error','Something went wrong !');
    }

    public function remove(Request $request,$id){

        $roomBook = RoomBook::findOrFail($id);
        if ($room = Room::where('room_status','Booked')->where('id',$roomBook->room_id)->first()){
            $room->room_status = 'CheckedOut';
            $room->save();
            $roomBook->status = 'rejected';
            $roomBook->save();
            return back()->with('success',$room->room_no.' Room Booking Deleted Successfully !');
        }
        return redirect('admin/work-flows/room-book')->with('error','Something went wrong !');
    }
    public function edit($id){

        $roomBook = RoomBook::findOrFail($id);
        if ($room = Room::where('room_status','Booked')->where('id',$roomBook->room_id)->first()){
            $user = Auth::user();
            $heading = 'Edit Room Booking';
            $title = $heading.' - Room Management - Admin Panel | '.$user->admin->name;
            $roomTypes = Accommodation::all();
            $guests = Guest::orderBy('first_name')->get();
            $rooms = $room->accommodation->rooms()->get();
            $previousPage=url('admin/work-flows/room-book');
            return view('backend.admin.work.booking.edit',compact('title','heading','guests','roomTypes','previousPage','roomBook','room','rooms'));
        }
        return redirect('admin/work-flows/room-book')->with('error','Something went wrong !');
    }
    public function update(Request $request,$id){
        $this->validate($request,[
            'type' => 'required',
            'check_in_date' => 'required',
            'child_numbers' => 'required',
            'adult_numbers' => 'required',
            'number_of_room' => 'required',
            'room_section' => 'required'
        ]);
        $room_id = $request->room_section;
        $roomBook = RoomBook::findOrFail($id);

        $oldRoom = Room::find($roomBook->room_id);
        $newRoom = Room::find($room_id);
        if (!($oldRoom==$newRoom)){
            $oldRoom->room_status='CheckedOut';
            $oldRoom->save();
            $newRoom->room_status='Booked';
            $newRoom->save();
        }
        if ($request->type=='internal'){
                $this->validate($request,[
                    'guest_id' => 'required',
                ]);
                $roomBook->guest_id = $request->guest_id;
            }else{
                $this->validate($request,[
                    'full_name' => 'required',
                    'mobile' => 'required'
                ]);
                $roomBook->full_name = $request->full_name;
                $roomBook->mobile = $request->mobile;
            }

            $roomBook->type = $request->type;
            $roomBook->room_id = $newRoom->id;
            $roomBook->check_in_date = date('Y-m-d',strtotime($request->check_in_date));
            $roomBook->check_out_date = date('Y-m-d',strtotime($request->check_out_date));
            $roomBook->child_numbers = $request->child_numbers;
            $roomBook->adult_numbers = $request->adult_numbers;
            $roomBook->number_of_room = $request->number_of_room;
            $roomBook->status = 'pending';
            $roomBook->save();

            return redirect('admin/work-flows/room-book')->with('success',$newRoom->room_no.' Room is Booking updated !');
    }

}
