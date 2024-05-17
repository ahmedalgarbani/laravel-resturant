<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\NewsLetterDataTable;
use App\Http\Controllers\Controller;
use App\Mail\newsletter;
use App\Models\Subscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class NewsLetterController extends Controller
{
    public function index(NewsLetterDataTable $dataTable){
        return $dataTable->render('Admin.subscriber.index');
    }

    public function sendMessage(Request $request){
        $request->validate([
           'subject'=>['required','max:255'],
           'message'=>['required']
        ]);
        $subscribers = Subscriber::pluck('email')->toArray();
        Mail::to($subscribers)->send(new newsletter($request->subject,$request->message));

        toastr()->success('News latter sent successfully !!');

        return redirect()->back();
    }
}
