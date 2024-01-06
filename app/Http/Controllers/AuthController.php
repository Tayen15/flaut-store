<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function postLogin(Request $request)
    {
        $credentials = $request->only('email', 'password');
        $remember = $request->has('remember');

        if (Auth::attempt($credentials, $remember)) {
            return redirect()->route('panel.index');
        }

        return back()->with('error', 'Email or Password is wrong!')->withInput($request->only('email', 'remember'));
    }

    public function index()
    {
        return view('auth.index');
    }
}
