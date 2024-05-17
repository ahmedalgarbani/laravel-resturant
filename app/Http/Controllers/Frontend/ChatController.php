<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Chat;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    function sendMessage(Request $request){
            $request->validate([
                'message'=>['required','max:1000'],
                'receiver_id'=>['required','integer']
            ]);
            Chat::create([
                'message'=>$request->message,
                'receiver_id'=>$request->receiver_id,
                'sender_id'=>auth()->user()->id
            ]);

            return response(['message'=>'success']);
    }


    public function getConversation(string $senderId){
        $receiver_id = auth()->user()->id;

        $message = Chat::whereIn('sender_id',[$senderId,$receiver_id])->with(['sender'])->orderBy('created_at','asc')->get();
        return response($message);
    }
}
