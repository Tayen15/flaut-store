<?php

namespace App\Http\Controllers;

use App\Models\CategoriesCatalog;

class PageController extends Controller
{
    public function about()
    {
        $categories = CategoriesCatalog::with('items')->get();
        return view('about-us', compact('categories'));
    }

    public function contact()
    {
        $categories = CategoriesCatalog::with('items')->get();
        return view('contact', compact('categories'));
    }
}