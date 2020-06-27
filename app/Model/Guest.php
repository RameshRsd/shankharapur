<?php

namespace App\Model;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Guest extends Model
{
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
    public function country(){
        return $this->belongsTo(Country::class,'country_id');
    }
    public function state(){
        return $this->belongsTo(State::class,'state_id');
    }
    public function district(){
        return $this->belongsTo(District::class,'district_id');
    }
    public function city(){
        return $this->belongsTo(City::class,'city_id');
    }
    public function roomChecks(){
        return $this->hasMany(RoomCheck::class,'guest_id');
    }
}
