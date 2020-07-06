<?php

namespace App\Http\Controllers\frontend\room;

use App\Http\Controllers\Controller;
use App\Model\Accommodation;
use App\Model\Admin;
use App\Model\Room;
use App\Model\RoomBook;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function index(){
        $info = Admin::find(1);
        $title = 'Rooms - '.$info->name.' | Best Memories start here';
        $rooms = Accommodation::all();
        return view('frontend.rooms.index',compact('title','rooms','info'));
    }
    public function view($slug){
        $info = Admin::find(1);
        $room = Accommodation::where('slug',$slug)->first();
        $title = $room->name.' - '.$info->name.' | Best Memories start here';
        $rooms = Accommodation::where('id','!=',$room->id)->get();
        return view('frontend.rooms.view',compact('title','rooms','info','room'));
    }
    public function booking($slug,$id){
        $info = Admin::find(1);
        $accomodation = Accommodation::where('slug',$slug)->first();
        $title = 'Booking => '.$accomodation->name.' - '.$info->name.' | Best Memories start here';
        if ($room = Room::where('accommodation_id',$accomodation->id)->where('id',$id)->first()){
            if ($room->room_status=='CheckedOut'){
                return view('frontend.rooms.book',compact('title','room','info','accomodation'));
            }else{
                return redirect('rooms/'.$slug)->with('error','Sorry Room already booked Or Checked in !');
            }
        }else{
            return redirect('rooms/'.$slug)->with('error','Room not found !');
        }
    }
    public function bookingStore(Request $request,$slug,$id){
        $accomodation = Accommodation::where('slug',$slug)->first();
        if ($room = Room::where('accommodation_id',$accomodation->id)->where('id',$id)->first()){
            if ($room->room_status=='CheckedOut'){
                $this->validate($request,[
                   'full_name' => 'required',
                   'mobile' => 'required|numeric|digits:10',
                   'check_in_date' => 'required|date_format:Y-m-d',
                   'check_out_date' => 'required',
                   'child_numbers' => 'required|numeric',
                   'adult_numbers' => 'required|numeric',
                ]);
                $roomBook = new RoomBook();
                $roomBook->type = 'external';
                $roomBook->room_id = $room->id;
                $roomBook->full_name = $request->full_name;
                $roomBook->mobile = $request->mobile;
                $roomBook->check_in_date = date('Y-m-d',strtotime($request->check_in_date));
                $roomBook->check_out_date = date('Y-m-d',strtotime($request->check_out_date));
                $roomBook->child_numbers=$request->child_numbers;
                $roomBook->adult_numbers=$request->adult_numbers;
                $roomBook->status='pending';
                if ($roomBook->save()){
                    $room->room_status='Booked';
                    $room->save();
                    return redirect('rooms'.'/'.$accomodation->slug)->with('success','Room No.:'.$room->room_no.' Room is booked successfully ! we wil contact you back soon !');
                }else{
                    return back()->with('error','Something went wrong !');
                }
            }else{
                return redirect('rooms/'.$slug)->with('error','Sorry Room already booked Or Checked in !');
            }
        }else{
            return redirect('rooms/'.$slug)->with('error','Room not found !');
        }
    }
}
