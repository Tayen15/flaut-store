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
    
    public function indexAdmin(Request $request)
    {
        $query = Catalog::query();
    
        $author = $request->input('author');
    
        $isMyCatalog = $author === auth()->user()->name;
    
        if ($author) {
            $query->where('author', $author);
        }
    
        $catalogs = $query->get();
        if ($catalogs->isEmpty()) {
            $message = $isMyCatalog ? 'You have not created any catalog yet.' : 'No catalog found.';
            return view('dashboard.catalog.index', compact('catalogs', 'isMyCatalog', 'message'));
        }

        return view('dashboard.catalog.index', compact('catalogs', 'isMyCatalog'));
    }


    public function create()
    {
        $categories = CategoriesCatalog::all();

        return view('dashboard.catalog.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'description' => 'nullable',
            'price' => 'required|numeric',
            'category_id' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg|max:10240',
        ]);

        try {
            $currentTime = Carbon::now();
            $formattedTime = $currentTime->format('Y-m-d_His');
        
            $imagePath = $request->file('image')->storeAs('image/catalog', $formattedTime . '_' . $request->file('image')->getClientOriginalName());
            $validatedData['image'] = basename($imagePath);
            $validatedData['author'] = Auth::user()->name;
            // dd($validatedData);

            Catalog::create($validatedData);
            
            return redirect()
                ->route('dashboard.catalog.index')
                ->with('success', 'Catalog item created successfully');            
        } catch (\Throwable $th) {
            return redirect()
                ->route('dashboard.catalog.index')
                ->with('error', 'failed to created catalog item, try again! ' . $th);
        }
    }

    public function show($id)
    {
        $catalog = Catalog::findOrFail($id);
        return view('catalog.show', compact('catalog'));
    }

    public function edit($id)
    {
        $catalog = Catalog::findOrFail($id);
        $categories = CategoriesCatalog::all();

        return view('dashboard.catalog.edit', compact('catalog', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'description' => 'nullable',
            'price' => 'required|numeric',
            'category_id' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg|max:10240',
        ]);
    
        $catalog = Catalog::findOrFail($id);

        if ($request->hasFile('image')) {
            if (Storage::exists("image/catalog/{$catalog->image}")) {
                Storage::delete("image/catalog/{$catalog->image}");
            }
        
            $currentTime = Carbon::now();
            $formattedTime = $currentTime->format('Y-m-d_His');
        
            $imagePath = $request->file('image')->storeAs('image/catalog', $formattedTime . '_' . $request->file('image')->getClientOriginalName());
            $validatedData['image'] = basename($imagePath);
        
            $catalog->update($validatedData);
        
            return redirect()
                ->route('dashboard.catalog.index')
                ->with('success', 'Successfully updated catalog with changing image');
        }

        $catalog->update($validatedData);
        return redirect()
            ->route('dashboard.catalog.index')
            ->with('success', 'Successfully updated catalog without changing image');
    }

    public function destroy($id)
    {
        $catalog = Catalog::findOrFail($id);

        if (Storage::exists("image/catalog/{$catalog->image}")) {
            Storage::delete("image/catalog/{$catalog->image}");
        }
    
        $catalog->delete();

        return redirect()
            ->route('dashboard.catalog.index')
            ->with('success', 'Successfully deleted catalog');
    }
}
