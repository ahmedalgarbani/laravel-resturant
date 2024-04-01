<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UpdateAdminPasswordRequest;
use App\Http\Requests\Admin\UpdateAdminRequest;
use App\Models\User;
use App\Trails\UploadImageTrail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    use UploadImageTrail;

    function index(){
        return view('Admin.profile.index');
    }
    function updateInformation(UpdateAdminRequest $request){
        $user = Auth::user();

        $imagepath = $this->updateImage($request,'avatar');


        $user->name = $request->name;
        $user->email = $request->email;
        $user->avatar = isset($imagepath)? $imagepath : $user->avatar;

            $user->save();

        toastr('the infromation updated successfuly','success');
        return redirect()->back();
    }

    function updatePassword(UpdateAdminPasswordRequest $request){

        $user = Auth::user();

        $user->password = bcrypt($request->password);

        $user->save();

        toastr()->success('the password updated successfuly','Done');
        return redirect()->back();
    }
}
