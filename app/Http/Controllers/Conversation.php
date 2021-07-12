<?php

namespace App\Http\Controllers;

use App\Events\GroupChat;
use App\Events\PrivateMessage;
use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Conversation as Conver;

class Conversation extends Controller
{
    public function chatRoom(Request $request)
    {
        $data = [];
        if ($request->has('userId')) {
            $data = $request->all();
            $avatar = User::find($request->userId);
            $data['avatar'] = $avatar->avatar;

            $create = [
                'message' => $request->message,
                'user_id' => $request->userId,
                'group_id' => $request->groupId
            ];

            Conver::create($create);

//            event(new ChatMessage($data));
            event(new GroupChat($data));
        }

        return response()->json([], 200);
    }

}
