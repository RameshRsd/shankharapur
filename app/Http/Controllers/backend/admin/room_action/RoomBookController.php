<?php

namespace App\Http\Controllers\backend\admin\room_action;

use App\Http\Controllers\Controller;
use App\Model\Guest;
use App\Model\Room;
use App\Model\RoomBook;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoomBookController extends Controller
{
    public function book($id){
        if ($room = Room::where('room_status','CheckedOut')->where('id',$id)->first()){
            $user = Auth::user();
            $pageHead = $room->room_no.' - '.$room->accommodation->name;
            $title = $pageHead.' Booking - Admin Panel | '.$user->admin->name;
            $guests = Guest::orderBy('first_name')->get();
            return view('backend.admin.room_action.book',compact('title','room','pageHead','guests'));
        }
        return back()->with('error','Something went wrong !');
    }

    public function bookStore(Request $request, $id){
        if ($room = Room::where('room_status','CheckedOut')->where('id',$id)->first()){
            $this->validate($request,[
                'type' => 'required',
                'check_in_date' => 'required',
                'child_numbers' => 'required',
                'adult_numbers' => 'required',
                'number_of_room' => 'required'
            ]);
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
            if ($request->check_out_date){
                $roomBook->check_out_date = date('Y-m-d',strtotime($request->check_out_date));
            }
            $roomBook->child_numbers = $request->child_numbers;
            $roomBook->adult_numbers = $request->adult_numbers;
            $roomBook->number_of_room = $request->number_of_room;
            $roomBook->status = 'pending';
            if ($roomBook->save()){
                $room = Room::find($id);
                $room->room_status = 'Booked';
                $room->save();
                return redirect('admin')->with('success',$room->room_no.' Room is Booked !');
            }else{
                return redirect('admin')->with('error','Something went wrong !');
            }
        }
        return redirect('admin')->with('error','Something went wrong !');
    }

}
