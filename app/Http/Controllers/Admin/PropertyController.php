<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Time;
use App\Models\Location;

class PropertyController extends Controller
{
    public function AllTimes(){
        $times = Time::latest()->get();
        return view('admin.backend.time.all_time',compact('times'));
    } 
    //End Method 

    public function AddTimes(){
    return view('admin.backend.time.add_time');
    }
    //End Method 

    public function StoreTimes(Request $request){

        Time::create([
            'time_name' => $request->time_name,
            'time_hour' => $request->time_hour,
        ]);

        $notification = array(
            'message' => 'Time Added Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.times')->with($notification);

    }
    //End Method 

    public function EditTimes($id){
        $times = Time::find($id);
        return view('admin.backend.time.edit_time',compact('times'));
    }
    //End Method 

    public function UpdateTimes(Request $request){

        $time_id = $request->id;

        Time::find($time_id)->update([
            'time_name' => $request->time_name,
            'time_hour' => $request->time_hour,
        ]);

        $notification = array(
            'message' => 'Time Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.times')->with($notification);

    }
    //End Method 

    public function DeleteTimes($id){
      
        Time::find($id)->delete();

        $notification = array(
            'message' => 'Time Deleted Successfully',
            'alert-type' => 'success'
        ); 
        return redirect()->back()->with($notification);

    }
    //End Method 

    ///////////// Location Method //////////////

    public function AllLocation(){
        $location = Location::latest()->get();
        return view('admin.backend.location.all_location',compact('location'));
    } 
    //End Method 

    public function AddLocation(){
    return view('admin.backend.location.add_location');
    }
    //End Method 



}
