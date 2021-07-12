<?php

namespace App\Http\Controllers;

use App\Events\NotifyLogin;
use App\Models\GroupUser;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Group;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = User::findOrFail(Auth::id());
        $user->active = true;
        $user->updated_at = now();
        $user->save();

        $groups = Group::all();

        $userGroup = User::where('id', Auth::id())->with('groups')->get()->toArray();
        if ($userGroup) {
            $userGroup = $userGroup[0]['groups'];
        } else {
            $userGroup = [];
        }

        $users = User::orderBy('active', 'desc')->get()->except(Auth::id());

        return view('home', compact('users', 'groups', 'userGroup'));
    }
}
