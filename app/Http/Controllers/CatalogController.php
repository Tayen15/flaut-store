<?php

namespace App\Http\Controllers;

use App\Models\Catalog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CatalogController extends Controller
{
    public function index(Request $request)
    {
        $query = Catalog::query();

        // Pencarian
        $searchKeyword = $request->input('search');
        if ($searchKeyword && strlen($searchKeyword) >= 3) {
            $query->where('name', 'like', '%' . $searchKeyword . '%');
        }
    
        // Filter Kategori
        $categories = $request->input('categories', []);
        if (!empty($categories)) {
            $query->whereIn('category', $categories);
        }
    
        $catalogs = $query->get();
        return view('catalog.index', compact('catalogs'));
    }
    public function indexAdmin()
    {
        $catalogs = Catalog::paginate(10); // Adjust the pagination as needed

        return view('dashboard.catalog.index', compact('catalogs'));
    }


    public function create()
    {
        return view('dashboard.catalog.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'description' => 'nullable',
            'price' => 'required|numeric',
            'category' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        try {
            $imagePath = $request->file('image');
            $imageName = date('Y-m-d&&') . $imagePath->getClientOriginalName();
            $path = 'image/catalog/' . $imageName;

            Storage::disk('public')->put($path, file_get_contents($imagePath));

            $validatedData['image'] = $imageName;
            Catalog::create($validatedData);
            
            return redirect()
                ->route('dashboard.catalog.index')
                ->with('success', 'Catalog item created successfully');            
        } catch (\Throwable $th) {
            return redirect()
                ->route('dashboard.news.index')
                ->with('success', 'failed to created catalog item, try again!');
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
        return view('dashboard.catalog.edit', compact('catalog'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('image/catalog');
            $validatedData['image'] = $imagePath;
        }

        Catalog::findOrFail($id)->update($validatedData);

        return redirect()->route('dashboard.catalog.index')->with('success', 'Catalog item updated successfully');
    }

    public function destroy($id)
    {
        Catalog::findOrFail($id)->delete();

        return redirect()->route('dashboard.catalog.index')->with('success', 'Catalog item deleted successfully');
    }
}
