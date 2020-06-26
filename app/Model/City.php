<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    public function district(){
        return  $this->belongsTo(District::class,'district_id');
    }
}
