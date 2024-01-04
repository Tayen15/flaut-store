<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.index');
    }

    public function create()
    {
        // Your create logic here
    }

    public function store(Request $request)
    {
        // Your store logic here
    }

    public function show($id)
    {
        // Your show logic here
    }

    public function edit($id)
    {
        // Your edit logic here
    }

    public function update(Request $request, $id)
    {
        // Your update logic here
    }

    public function destroy($id)
    {
        // Your destroy logic here
    }
}
