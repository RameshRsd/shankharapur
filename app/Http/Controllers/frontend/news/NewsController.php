<?php

namespace App\Http\Controllers\frontend\news;

use App\Http\Controllers\Controller;
use App\Model\Admin;

class NewsController extends Controller
{
    public function index(){
        $info = Admin::find(1);
        $title = 'News & Blogs - '.$info->name.' | Best Memories start here';
        return view('frontend.news.index',compact('title'));
    }

}
