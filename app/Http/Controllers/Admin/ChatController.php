<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Chat;
use App\Models\User;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function index(){
        $userId = auth()->user()->id;
        $chatUsers = User::where('id','!=',$userId)
            ->whereHas('chats',function ($query) use ($userId){
                $query->where(function ($subQuery) use ($userId){
                    $subQuery->where('sender_id',$userId)->orWhere('receiver_id',$userId);
                });
            })
            ->orderByDesc('created_at')
            ->distinct()
            ->get();
                return view('Admin.chat.chat',compact('chatUsers'));
    }


    public function getConversation(string $senderId){
            $receiver_id = auth()->user()->id;

            $message = Chat::whereIn('sender_id',[$senderId,$receiver_id])->with(['sender'])->orderBy('created_at','asc')->get();
            return response($message);
    }

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
}
