<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    public function country(){
        return $this->belongsTo(Country::class,'country_id');
    }
    public function districts(){
        return $this->hasMany(District::class,'state_id');
    }

}
