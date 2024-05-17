<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PrivacyPolicy;
use Illuminate\Http\Request;

class PrivacyPolicyController extends Controller
{
    public function index(){
        $privacy = PrivacyPolicy::first();
        return view('Admin.privacy-policy.index',compact('privacy'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'description'=>'required'
        ]);

        PrivacyPolicy::updateOrCreate(
            ['id'=>1],
            [
                'content'=>$request->description,
            ]
        );
        toastr()->success('Updated Successfully !');
        return redirect()->back();

    }
}
