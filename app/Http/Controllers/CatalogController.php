<?php

namespace App\Http\Controllers;

use App\Models\Catalog; // Sesuaikan dengan nama model yang Anda gunakan
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    public function index()
    {
        $catalogs = Catalog::all(); // Mengambil semua data dari model Catalog
        return view('catalog.index', compact('catalogs'));
    }

    public function create()
    {
        return view('catalog.create');
    }

    public function store(Request $request)
    {
        // Validasi request jika diperlukan
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Proses penyimpanan gambar jika ada
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('catalog_images');
            $validatedData['image'] = $imagePath;
        }

        // Simpan data ke dalam database
        Catalog::create($validatedData);

        return redirect()->route('catalog.index')->with('success', 'Catalog item created successfully');
    }

    public function show($id)
    {
        $catalog = Catalog::findOrFail($id); // Mengambil data berdasarkan ID
        return view('catalog.show', compact('catalog'));
    }

    public function edit($id)
    {
        $catalog = Catalog::findOrFail($id);
        return view('catalog.edit', compact('catalog'));
    }

    public function update(Request $request, $id)
    {
        // Validasi request jika diperlukan
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Proses penyimpanan gambar jika ada
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('catalog_images');
            $validatedData['image'] = $imagePath;
        }

        // Perbarui data dalam database
        Catalog::findOrFail($id)->update($validatedData);

        return redirect()->route('catalog.index')->with('success', 'Catalog item updated successfully');
    }

    public function destroy($id)
    {
        // Hapus data berdasarkan ID
        Catalog::findOrFail($id)->delete();

        return redirect()->route('catalog.index')->with('success', 'Catalog item deleted successfully');
    }
}
