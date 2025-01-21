<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Catalog;

class HomeController extends Controller
{
    public function index()
    {
        $catalogs = Catalog::all();
        return view('home', compact('catalogs'));
    }
}
