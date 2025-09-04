<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Time;
use App\Models\Location;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Support\Facades\File;

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

    public function StoreLocation(Request $request){

        if ($request->hasFile('image')) {
          $image = $request->file('image');
          $manager = new ImageManager(new Driver());
          $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
          $img = $manager->read($image);
          $img->resize(300,395)->save(public_path('upload/location/'.$name_gen));
          $save_url = 'upload/location/'.$name_gen; 
        }

        Location::create([
            'name' => $request->name,
            'image' => $save_url
        ]);

        $notification = array(
            'message' => 'Location Added Successfully',
            'alert-type' => 'success'
        ); 
        return redirect()->route('all.location')->with($notification); 

    }
       //End Method 

    public function EditLocation($id){
        $location = Location::find($id);
        return view('admin.backend.location.edit_location',compact('location'));
    }
    //End Method 


     public function UpdateLocation(Request $request){

        $location_id = $request->id;
        $location = Location::findOrFail($location_id);

        if ($request->hasFile('image')) {
           
          if (File::exists(public_path($location->image))) {
            File::delete(public_path($location->image));
          }  

          $image = $request->file('image');
          $manager = new ImageManager(new Driver());
          $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
          $img = $manager->read($image);
          $img->resize(300,395)->save(public_path('upload/location/'.$name_gen));
          $save_url = 'upload/location/'.$name_gen;  

        Location::find($location_id)->update([
            'name' => $request->name,
            'image' => $save_url
        ]);

        $notification = array(
            'message' => 'Location Added Successfully',
            'alert-type' => 'success'
        ); 
        return redirect()->route('all.location')->with($notification); 
     
    } else{

        Location::find($location_id)->update([
            'name' => $request->name, 
        ]);

        $notification = array(
            'message' => 'Location Added Successfully',
            'alert-type' => 'success'
        ); 
        return redirect()->route('all.location')->with($notification);  
     } 

    }
       //End Method 



}
