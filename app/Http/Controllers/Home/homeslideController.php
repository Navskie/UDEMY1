<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HomeSlide;

use Image;

class homeslideController extends Controller
{
    public function homeSlide() {
        $homeslide = HomeSlide::find(1);
        return view('admin.home_slide.home_slide_all', compact('homeslide'));
    }

    public function updateSlide(Request $request) {
        $slide_id = $request->id;

        if ($request->file('home_slide')) {
            $image = $request->file('home_slide');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            
            Image::make($image)->resize(636,852)->save('upload/home_slide/'.$name_gen);

            HomeSlide::findOrFail($slide_id)->update([
                'title' => $request->title,
                'short_title' => $request->short_title,
                'video_url' => $request->video_url,
                'home_slide' => $name_gen,
            ]);

            // alert
            $notification = array(
                'message' => 'Home Slider with Image has been updated',
                'alert-type' => 'success',
            );

            return redirect()->back()->with($notification);
        
        } else {

            HomeSlide::findOrFail($slide_id)->update([
                'title' => $request->title,
                'short_title' => $request->short_title,
                'video_url' => $request->video_url,
            ]);

            // alert
            $notification = array(
                'message' => 'Home Slide Information has been updated',
                'alert-type' => 'success',
            );

            return redirect()->back()->with($notification);

        }


    } // END METHOD
}
