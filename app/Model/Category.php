<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function gallery(){
        return $this->belongsToMany(Gallery::class,'gallery_categories','category_id','gallery_id');
    }
}
