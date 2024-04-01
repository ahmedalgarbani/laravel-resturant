<?php


namespace App\Trails;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
trait UploadImageTrail
{
        function updateImage(Request $request,$inputName,$oldPath=NULL,$path="/uploads"){
            if($request->hasFile($inputName)){

                $image= $request->{$inputName};
                $ext = $image->getClientOriginalExtension();
                $imageName= 'media_'.uniqid().'.'.$ext;

                $image->move(public_path($path),$imageName);

                if($oldPath && File::exists(public_path($oldPath))){
                    File::delete(public_path($oldPath));
                }

                return $path.'/'.$imageName;
            }
            return NULL;
        }



        function removeImage(string $path){
            if(File::exists(public_path($path))){
                File::delete(public_path($path));
            }
        }
}
