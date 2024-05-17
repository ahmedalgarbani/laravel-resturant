<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ContactRequest;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(){
        $contact = Contact::first();
        return view('Admin.contact.index',compact('contact'));
    }


    public function store(ContactRequest $request){

        Contact::updateOrCreate(
            ['id'=>1],
            [
                'phone_one'=>$request->phone_one,
                'phone_two'=>$request->phone_two,

                'email_one'=>$request->email_one,
                'email_two'=>$request->email_two,

                'address'=>$request->address,
                'map_link'=>$request->map_link,
            ]
        );
        toastr()->success('Updated Successfully !! ');
        return redirect()->back();

    }
}
