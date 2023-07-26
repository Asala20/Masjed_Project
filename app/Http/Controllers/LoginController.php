<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
        /**
     * Handle an authentication attempt.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
class LoginController extends Controller
{
    public function loginForm()
    {
        return view('pages.singIn');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'name' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('users');
        }

        return back()->withErrors([
            'name' => 'The provided credentials do not match our records.',
            'password' => 'The provided credentials do not match our records.',
        ]);
        
    }
}
