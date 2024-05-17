<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\frontend\updatePasswordRequest;
use App\Http\Requests\frontend\updateRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    function index(){

    }

    function updateprofile(updateRequest $request){
        $user= auth::user();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();
        toastr('the update is successfully','success');

        return redirect()->back();



    }


    function updatepasswordprofile(updatePasswordRequest $request){
        $user = Auth::user();

        $user->password = bcrypt($request->password);

        $user->save();

        toastr()->success('the password updated successfuly','Done');
        return redirect()->back();
    }


    function updateAvatar(\http\Env\Request $request ){
        dd($request->all());

        return redirect()->back();
    }


}
