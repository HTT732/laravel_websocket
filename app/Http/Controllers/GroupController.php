<?php

namespace App\Http\Controllers;

use App\Models\Conversation;
use App\Models\Group;
use App\Models\GroupUser;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    public function join($groupId, $userId)
    {
        if (empty($groupId) || empty($userId)) {
            return back()->withErrors('error', 'Error: join room failed!');
        }

        $group = Group::findOrFail($groupId);

        $user = $group->users()->wherePivot('user_id', $userId);
        if ($user->count() > 0) {
            return redirect()->route('room', ['id'=>$groupId]);
        }

        $add = $group->users()->attach($userId);

        return redirect()->route('room', ['id'=>$groupId]);
    }

    public function index($id)
    {
        $groupId = $id;
        $conversation = Conversation::where('group_id', $id)->with('user')->get();

        return view('room', compact('conversation', 'groupId'));
    }

    public function leave($user_id, $group_id)
    {
        $user = GroupUser::where(['user_id'=> $user_id, 'group_id'=>$group_id]);

        if ($user) {
            $user->delete();
        }

        return redirect()->route('home');
    }

}
