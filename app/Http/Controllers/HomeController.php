<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Carousel;
use Illuminate\Http\Request;
use App\Models\Catalog;
use App\Models\CategoriesCatalog;

class HomeController extends Controller
{
    public function index()
    {
        $catalogs = Catalog::all();
        $carousel = Carousel::all();
        $categories = CategoriesCatalog::with('items')->get();

        return view('home', compact('catalogs', 'carousel', 'categories'));
    }
}
