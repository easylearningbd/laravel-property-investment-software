<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Time;

class PropertyController extends Controller
{
    public function AllTimes(){
        $times = Time::latest()->get();
        return view('admin.backend.time.all_time',compact('times'));
    } 
    //End Method 





}
