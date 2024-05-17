<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FooterInfo;
use Illuminate\Http\Request;

class FooterInfoController extends Controller
{
    public function index(){
        $footer = FooterInfo::first();
        return view('Admin.footer-info.index',compact('footer'));
    }

    public function update(Request $request){
        $request->validate([
           'short_description'=>['nullable','max:2000'],
           'email'=>['nullable','email','max:255'],
           'phone'=>['nullable','max:20'],
           'copyright'=>['nullable','max:255'],
           'address'=>['nullable','max:1000'],
        ]);
        FooterInfo::updateOrCreate(
            ['id'=>1],
            [
                'short_description'=>$request->short_description,
                'email'=>$request->email,
                'phone'=>$request->phone,
                'copyright'=>$request->copyright,
                'address'=>$request->address,
            ]
        );

        toastr()->success('Updated Successfully !!');

        return redirect()->back();



    }


}
