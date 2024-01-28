<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        return view('dashboard.profile.index');
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        auth()->user()->update([
            'name' => $request->name,
        ]);

        return redirect()->route('dashboard.profile.index')->with('success', 'Profile updated successfully!');
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'password' => 'required|string|min:4|confirmed',
        ]); 
        auth()->user()->update([
            'password' => bcrypt($request->password),
        ]);

        return redirect()->route('dashboard.profile.index')->with('success', 'Password changed successfully!');
    }
    
}
