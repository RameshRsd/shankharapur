<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    public function category(){
        return $this->belongsToMany(Gallery::class,'gallery_categories','gallery_id','category_id');
    }

}
