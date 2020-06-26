<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class RoomBook extends Model
{
    public function guest(){
        return $this->belongsTo(Guest::class,'guest_id');
    }

}
