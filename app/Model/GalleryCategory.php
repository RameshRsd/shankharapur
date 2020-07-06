<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class GalleryCategory extends Model
{
    public function category(){
        return $this->belongsTo(Category::class,'category_id');
    }
}
