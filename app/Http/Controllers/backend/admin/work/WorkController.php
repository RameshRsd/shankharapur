<?php

namespace App\Http\Controllers\backend\admin\work;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class WorkController extends Controller
{
    public function index(){
        return redirect('admin/work-flows/room-book');
    }
}
