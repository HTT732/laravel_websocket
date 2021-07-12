<?php

namespace App\Http\Controllers\Auth;

use App\Events\NotifyLogin;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Models\User;
use Auth;
use DB;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request) {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            broadcast(new NotifyLogin(Auth::user()->name))->toOthers();
            return redirect()->route('home');
        }

        return back()->withErrors('error', 'Login failed');
    }

    public function logout()
    {
        if (Auth::check()) {
            DB::table('users')->where('id', Auth::id())->update(['active'=>false, 'updated_at'=>now()]);
        }

        Auth::logout();
        return redirect()->route('home');
    }

}
