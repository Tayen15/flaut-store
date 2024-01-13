<?php

namespace App\Http\Controllers;

use App\Models\carousels;
use Illuminate\Http\Request;
namespace App\Http\Controllers\Admin;


class CarouselsController extends Controller
{
    public function index(Request $request)
    {
        $query = carousels::query();

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
    
        $carousels = $query->get();
        return view('carousels.index', compact('carousels'));
    }
    public function indexAdmin()
    {
        $carousels = carousels::paginate(10); // Adjust the pagination as needed

        return view('dashboard.carousels.index', compact('carousels'));
    }


    public function create()
    {
        return view('dashboard.carousels.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name' => 'required',
        ]);

        $imagePath = $request->file('image')->store('image/carousels');
        $imageName = basename($imagePath);

        $validatedData = $request->except('image');
        $validatedData['image'] = $imageName;

        carousels::create($validatedData);

        return redirect()->route('dashboard.carousels.index')->with('success', 'carousels item created successfully');
    }

    public function show($id)
    {
        $carousels = carousels::findOrFail($id);
        return view('carousels.show', compact('carousels'));
    }

    public function edit($id)
    {
        $carousels = carousels::findOrFail($id);
        return view('dashboard.carousels.edit', compact('carousels'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'name' => 'required|string|max:255',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('image/carousels');
            $validatedData['image'] = $imagePath;
        }

        carousels::findOrFail($id)->update($validatedData);

        return redirect()->route('dashboard.carousels.index')->with('success', 'carousels item updated successfully');
    }

    public function destroy($id)
    {
        carousels::findOrFail($id)->delete();

        return redirect()->route('dashboard.carousels.index')->with('success', 'carousels item deleted successfully');
    }
}
