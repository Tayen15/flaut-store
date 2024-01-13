<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\AdminLoginRequest;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.index');
    }

    public function postLogin(AdminLoginRequest $request)
    {
        $validated = $request->validated();

        if (!Auth::attempt($validated))
            return back()->with('error', 'Login Failed')->withInput();

        $request->session()->regenerate();

        return view('dashboard.index');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home');
    }
}
