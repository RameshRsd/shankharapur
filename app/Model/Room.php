<?php

namespace App\Model;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
    public function floor(){
        return $this->belongsTo(Floor::class,'floor_id');
    }
    public function accommodation(){
        return $this->belongsTo(Accommodation::class,'accommodation_id');
    }
    public function features(){
        return $this->belongsToMany(Feature::class,'room_features','room_id','feature_id');
    }
    public function PendingRoomBooks(){
        return  $this->hasMany(RoomBook::class,'room_id')->where('status','pending');
    }
    public function ApprovedRoomBooks(){
        return $this->hasMany(RoomBook::class,'room_id')->where('status','approved');
    }
    public function RejectedRoomBooks(){
        return $this->hasMany(RoomBook::class,'room_id')->where('status','rejected');
    }
    public function roomChecked(){
        return $this->hasMany(RoomCheck::class,'room_id');
    }

}
