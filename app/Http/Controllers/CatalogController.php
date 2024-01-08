<?php

namespace App\Http\Controllers;

use App\Models\Catalog;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    public function index()
    {
        $catalogs = Catalog::all();
        return view('catalog.index', compact('catalogs'));
    }

    public function create()
    {
        return view('catalog.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'nullable',
            'price' => 'required|numeric',
            'category' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imagePath = $request->file('image')->store('image/catalog');
        $imageName = basename($imagePath);

        $validatedData = $request->except('image');
        $validatedData['image'] = $imageName;

        Catalog::create($validatedData);

        return redirect()->route('catalog.index')->with('success', 'Catalog item created successfully');
    }

    public function show($id)
    {
        $catalog = Catalog::findOrFail($id);
        return view('catalog.show', compact('catalog'));
    }

    public function edit($id)
    {
        $catalog = Catalog::findOrFail($id);
        return view('catalog.edit', compact('catalog'));
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

        return redirect()->route('catalog.index')->with('success', 'Catalog item updated successfully');
    }

    public function destroy($id)
    {
        Catalog::findOrFail($id)->delete();

        return redirect()->route('catalog.index')->with('success', 'Catalog item deleted successfully');
    }
}
