<?php

namespace App\Model;

use App\User;
use Illuminate\Database\Eloquent\Model;

class RoomCheck extends Model
{
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
    public function guest(){
        return $this->belongsTo(Guest::class,'guest_id');
    }
    public function room(){
        return $this->belongsTo(Room::class,'room_id');
    }

}
