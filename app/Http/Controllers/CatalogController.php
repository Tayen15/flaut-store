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
    public function indexAdmin()
    {
        $catalogs = Catalog::paginate(10);

        return view('dashboard.catalog.index', compact('catalogs'));
    }


    public function create()
    {
        $categories = Catalog::$categories;
        return view('dashboard.catalog.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'description' => 'nullable',
            'price' => 'required|numeric',
            'category' => 'required|in:' . implode(',', Catalog::$categories),
            'image' => 'image|mimes:jpeg,png,jpg|max:10240',
        ]);

        try {
            $imagePath = $request->file('image');
            $imageName = date('Y-m-d_H:i:s_') . $imagePath->getClientOriginalName();
            $path = 'image/catalog/' . $imageName;

            Storage::disk('public')->put($path, file_get_contents($imagePath));

            $validatedData['image'] = $imageName;

            Catalog::create($validatedData);
            
            return redirect()
                ->route('dashboard.catalog.index')
                ->with('success', 'Catalog item created successfully');            
        } catch (\Throwable $th) {
            return redirect()
                ->route('dashboard.catalog.index')
                ->with('error', 'failed to created catalog item, try again!');
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
            'name' => 'required',
            'description' => 'nullable',
            'price' => 'required|numeric',
            'category' => 'required|in:' . implode(',', Catalog::$categories),
            'image' => 'image|mimes:jpeg,png,jpg|max:10240',
        ]);
    
        $catalog = Catalog::findOrFail($id);

        if ($request->hasFile('image')) {
            if (!Storage::exists("image/catalog/{$catalog->image}")) {
                $deleted = Storage::delete("image/catalog/{$catalog->image}");
        
                if ($deleted) {
                    $imagePath = $request->file('image');
                    $imageName = date('Y-m-d_H:i:s_') . '&&' . $imagePath->getClientOriginalName();
                    $path = 'image/catalog/' . $imageName;
    
                    $check = Storage::disk('public')->put($path, file_get_contents($imagePath));
        
                    if ($check) {
                        $validatedData['image'] = $imageName;
                        $catalog->update($validatedData);
        
                        return redirect()
                            ->route('dashboard.catalog.index')
                            ->with('success', 'Successfully updated Catalog with image');
                    }
        
                    return redirect()
                        ->route('dashboard.catalog.index')
                        ->with('error', 'Failed to update Catalog image');
                }
        
                return redirect()
                    ->route('dashboard.catalog.index')
                    ->with('error', 'Failed to delete old Catalog image');
            }
        }

        // dd($request->all());
        $catalog->update($validatedData);
        return redirect()
            ->route('dashboard.catalog.index')
            ->with('success', 'Successfully updated Catalog without changing image');
    }

    public function destroy($id)
    {
        $catalog = Catalog::findOrFail($id);

        if (Storage::exists("image/catalog/{$catalog->image}")) {
            $deleted = Storage::delete("image/catalog/{$catalog->image}");
    
            if ($deleted) {
                $catalog->delete();

                return redirect()
                    ->route('dashboard.catalog.index')
                    ->with('success', 'Successfully deleted catalog');
            } else {
                return redirect()
                    ->route('dashboard.catalog.index')
                    ->with('error', 'Failed to delete catalog image');
            }
        }
    
        return redirect()
            ->route('dashboard.catalog.index')
            ->with('error', 'Image not found for catalog');
    }
}
