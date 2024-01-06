<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function postLogin(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->route('panel.index');
        }

        return back()->with('error', 'Email or Password is wrong!')->withInput();
    }

    public function index()
    {
        return view('auth.index');
    }
}
