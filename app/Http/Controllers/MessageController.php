<?php

namespace App\Http\Controllers;

use App\Events\ChatMessage;
use App\Events\PrivateMessage;
use App\Models\Message;
use App\Models\User;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    public function send(Request $request)
    {
        $data = [];
        if ($request->has('id')) {
            $data = $request->all();
            $avatar = User::find($request->id);
            $data['avatar'] = $avatar->avatar;

            $create = [
                'content' => $request->message,
                'user_id' => $request->theyId,
                'sender' => Auth::id()
            ];

            Message::create($create);

//            event(new ChatMessage($data));
            event(new PrivateMessage($data));
        }

        return response()->json([], 200);
    }

    public function chat($id)
    {
        $user = User::findOrFail($id);
        $message = Message::where(['user_id'=>$id, 'sender'=>Auth::id()])
                        ->orWhere(function($query) use($id){
                            $query->where(['sender'=> $id, 'user_id'=>Auth::id()]);
                        })->get();

        return view('chat', ['theyId' => $id, 'message'=>$message, 'user'=>$user]);
    }
}
