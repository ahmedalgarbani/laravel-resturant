<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TermsCondition;
use Illuminate\Http\Request;

class TermsConditionController extends Controller
{
    public function index(){
        $terms = TermsCondition::first();

        return view('Admin.terms-condition.index',compact('terms'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'description'=>'required'
        ]);

        TermsCondition::updateOrCreate(
           ['id'=>1],
           [
               'content'=>$request->description,
           ]
        );
        toastr()->success('Updated Successfully !');
        return redirect()->back();

    }
}
