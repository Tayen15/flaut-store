<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use app\Http\Requests\AdminLoginRequest;

class AuthController extends Controller
{
    public function postLogin(AdminLoginRequest $request)
    {
        $validated = $request->validated();

        if (!Auth::attempt($validated))
            return back()->with('error', 'Login Failed')->withInput();

        $request->session()->regenerate();

        return redirect()->route('home');
    }

    public function index()
    {
        return view('auth.index');
    }
}
