<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    //

    public function showLoginForm()
    {
        return view('auth.login');
    }


    public function login(Request $request)
    {
        $credentials = $reqeust->validate([
            'email' => 'required|email',
            'password' => 'required',

        ]);

        if(Auth::attemp($credentials))
            {
                $request->session()->regenerate();
                return redirect()->intended('/items');
            }

        return bac()->withErrors([

            'email' => 'Invalid Credentials',
        ]);

    }


    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->invalidate();

        return redirect()->route('login');
    }


}
