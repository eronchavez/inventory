<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LoginRequest; 

class LoginController extends Controller
{
    //

    public function showLoginForm()
    {
        return view('auth.login');
    }


    public function login(loginRequest $request)
    {
        

        if(Auth::attempt($request->validated()))
            {
                $request->session()->regenerate();
                return redirect()->intended('/items');
            }

        return back()->withErrors([

            'email' => 'Invalid Credentials',
        ]);

    }


    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        return redirect()->route('login');
    }


}
