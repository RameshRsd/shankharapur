<?php

namespace App\Model;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Accommodation extends Model
{
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
    public function rooms(){
        return $this->hasMany(Room::class,'accommodation_id');
    }

    public function availableRooms(){
        return $this->hasMany(Room::class,'accommodation_id')->where('room_status','CheckedOut');
    }

}
