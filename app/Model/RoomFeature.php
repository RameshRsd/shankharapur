<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class RoomFeature extends Model
{
    public function feature(){
        return $this->belongsTo(Feature::class,'feature_id');
    }
}
