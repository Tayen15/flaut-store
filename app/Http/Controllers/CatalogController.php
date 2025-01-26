<?php

namespace App\Http\Controllers;

use App\Models\Catalog;
use Illuminate\Http\Request;
use App\Models\CategoriesItemCatalog as CategoriesCatalog;
use App\Models\CategoriesItemCatalog;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class CatalogController extends Controller
{
    public function index(Request $request)
    {
        $query = Catalog::query();
    
        $category = $request->input('category');
        if ($category) {
            $query->where('category', $category);
        }
    
        $searchKeyword = $request->input('search');
        if ($searchKeyword && strlen($searchKeyword) >= 3) {
            $query->where('name', 'like', '%' . $searchKeyword . '%');
        }
    
        $catalogs = $query->get();
    
        return view('catalog.index', compact('catalogs')); 
    }
}
