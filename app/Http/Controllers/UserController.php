<?php

namespace App\Http\Controllers;

use App\Events\PrivateMessage;
use App\Http\Requests\UserRequest;
use App\Models\User;
use App\Traits\ApiResponser;
use Exception;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class UserController extends Controller
{
    use ApiResponser;
    /**
     * Display a listing of the resource.
     *
     * @return User[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Http\Response
     */
    public function index()
    {
        return User::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        return User::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     * @throws Exception
     */
    public function show($id)
    {
        if (is_numeric($id)) {
            $user = User::find($id);
            if (!$user) return response()->json(['User not found by ID:' . $id]);
            return $user;
        }

        return response()->json(['User not found by ID:' . $id]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);

        if (!$user) {
            return false;
        }

        $user->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        dd(User::find($id), User::where('id', $id)->exists());
        if (User::where())
        $user = User::find($id);

        if (!$user) {
            return false;
        }

        return $user->delete();
    }
}
