<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        $userLevel = Auth::user()->level;
        $levels = User::query();

        if ($userLevel > 2) {
            $users = $levels->get(); 
        } elseif ($userLevel < 3) {
            $users = $levels->where('level', 1)->get(); 
        } else {
            $users = $levels->get(); 
        }
        return view('dashboard.admin.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.admin.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'level' => 'required|int',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:4',
        ]);

        $validatedData['password'] = bcrypt($request->password);

        User::create($validatedData);

        return redirect()->route('dashboard.admin.index')->with('success', 'User created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::findOrFail($id);
        return view('dashboard.admin.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::findOrFail($id);
        return view('dashboard.admin.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'level' => 'required|int',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'nullable|string|min:4',
        ]);

        if ($request->has('password')) {
            $validatedData['password'] = bcrypt($request->password);
        }

        $user = User::findOrFail($id);
        $user->update($validatedData);

        return redirect()->route('dashboard.admin.index')->with('success', 'User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('dashboard.admin.index')->with('success', 'User deleted successfully');
    }
}
