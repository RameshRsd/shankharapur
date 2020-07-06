<?php

namespace App\Http\Controllers\backend\admin\gallery;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index(){
        return redirect('admin/gallery-manage/images');
    }
}
