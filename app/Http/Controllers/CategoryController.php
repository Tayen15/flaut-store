<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CategoriesCatalog as Category;
use App\Models\CategoriesItemCatalog as CategoriesItem;

class CategoryController extends Controller
{
    // Menampilkan halaman admin kategori
    public function index()
    {
        $categories = Category::all();
    
        return view('home', compact('categories'));
    }
    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:50',
        ]);
    
        $category = Category::create($validated);
    
        return redirect()->route('categories.index')->with('success', 'Category created successfully!');
    }

    public function storeItem(Request $request)
    {
        $validated = $request->validate([
            'category_id' => 'required|exists:categories_catalogs,id',
            'name' => 'required|string|max:50',
        ]);
    
        $item = CategoriesItem::create($validated);
    
        return redirect()->route('categories.index')->with('success', 'Category item added successfully!');
    }
}
