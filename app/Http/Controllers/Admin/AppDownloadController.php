<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AppDownloadRequest;
use App\Models\AppDownload;
use App\Trails\UploadImageTrail;
use Illuminate\Http\Request;

class AppDownloadController extends Controller
{
    use UploadImageTrail;
    public function index(){
        $appDownload = AppDownload::findOrFail(1);
        return view('Admin.app-download.create',compact('appDownload'));
    }

    public function store(AppDownloadRequest $request){
        $imagePath = $this->updateImage($request,'image',$request->old_image);
        $backgroundPath = $this->updateImage($request,'background',$request->old_background);
        AppDownload::updateOrCreate(
            ['id'=>1],
            [
                'image'=>!empty($imagePath)?$imagePath:$request->old_image,
                'background'=>!empty($backgroundPath)?$backgroundPath:$request->old_background,
                'title'=>$request->title,
                'short_description'=>$request->short_description,
                'play_store_link'=>$request->play_store_link,
                'apple_store_link'=>$request->apple_store_link,
            ]
        );
        toastr()->success('Updated Successfully !!');
        return redirect()->back();
    }


}
