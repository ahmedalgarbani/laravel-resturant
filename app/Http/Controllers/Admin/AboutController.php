<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AboutRequest;
use App\Models\About;
use App\Models\User;
use App\Notifications\OrderNotification;
use App\Trails\UploadImageTrail;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    use UploadImageTrail;
    public function index(){
        $about = About::first();
        return view('Admin.about.index',compact('about'));
    }
    public function store(AboutRequest $request){

        try {
            $imagePath = $this->updateImage($request,'image',$request->old_image);

            About::updateOrCreate(
                ['id'=>1],
                [
                    'image'=>!empty($imagePath)?$imagePath:$request->old_image,
                    'title'=>$request->title,
                    'main_title'=>$request->main_title,
                    'description'=>$request->description,
                    'video_link'=>$request->video_link,
                ]
            );


            $currentUser = User::where('Role','Admin')->get();
            $lastUser = User::latest()->first();
            $message = "Updated About Section By ".auth()->user()->name;
            $route = 'admin.about.index';

            foreach ($currentUser as $users) {
                $users->notify(new OrderNotification($lastUser,$message,$route));
            }


            toastr()->success('Updated Successfully !');
            return redirect()->back();
        }catch (\Exception $e){
            toastr()->error($e);
            return redirect()->back();
        }
    }


}
