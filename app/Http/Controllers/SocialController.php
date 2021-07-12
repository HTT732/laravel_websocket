<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;
use Laravel\Socialite\Facades\Socialite;
use Symfony\Component\HttpFoundation\Session\Session;

class SocialController extends Controller
{
    public function facebookRedirect()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function loginWithFacebook()
    {
        try {
            $user = Socialite::driver('facebook')->user();

            return view('info', compact('user'));
        } catch (\Throwable $e) {
            dd($e);
        }
    }

    public function googleRedirect()
    {
        if(!session()->has('pre_url')){
            session()->put('pre_url', URL::previous());
        }else{
            if(URL::previous() != URL::to('login')) session()->put('pre_url', URL::previous());
        }
        return Socialite::driver('google')->redirect();
    }

    public function loginWithGoogle()
    {
        try {
            $user = Socialite::driver('google')->stateless()->user();

            return view('info', compact('user'));
        } catch (\Throwable $e) {
            dd($e);
        }
    }


}
