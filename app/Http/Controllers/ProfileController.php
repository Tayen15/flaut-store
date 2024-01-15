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
        $user = auth()->user();
    
        $rules = [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
        ];
    
        if ($request->filled('password')) {
            $rules['password'] = 'nullable|string|min:8|confirmed';
        }
    
        $validatedData = $request->validate($rules);
        dd($validatedData);
        if ($request->filled('password')) {
            $user->update([
                'name' => $validatedData['name'],
                'email' => $validatedData['email'],
                'password' => Hash::make($validatedData['password']),
            ]);
        } else {
            $user->update([
                'name' => $validatedData['name'],
                'email' => $validatedData['email'],
            ]);
        }
    
        return redirect()->route('dashboard.index')->with('success', 'Profile updated successfully');
    }
    
}
