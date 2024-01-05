<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class AuthController extends Controller
{
    // ... metode lainnya ...

    public function postLogin(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Jika autentikasi berhasil, alihkan ke halaman utama
            return redirect()->route('index');
        }

        // Jika autentikasi gagal, kembali ke halaman login dengan pesan error
        return redirect()->route('auth.index')->with('error', 'Invalid credentials');
    }

    public function index()
    {
        // Your logic for the index page
        return view('home');
    }
}