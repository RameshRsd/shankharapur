<?php

namespace App\Model;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
    public function rooms(){
        return $this->belongsToMany(Room::class,'room_features','feature_id','room_id');
    }

}
