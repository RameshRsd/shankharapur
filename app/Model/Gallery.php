<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    public function category(){
        return $this->belongsToMany(Category::class,'gallery_categories','gallery_id','category_id');
    }
    public function galleryCategories(){
        return $this->hasMany(GalleryCategory::class,'gallery_id');
    }

}
