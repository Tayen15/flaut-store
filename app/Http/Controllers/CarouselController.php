<?php

namespace App\Http\Controllers;

use App\Models\Carousel;
use Illuminate\Http\Request;

class CarouselController extends Controller
{
    public function index(Request $request)
    {
        $query = Carousel::query();

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
    
        $Carousels = $query->get();
        return view('Carousel.index', compact('Carousels'));
    }
    public function indexAdmin()
    {
        $Carousels = Carousel::paginate(10); // Adjust the pagination as needed

        return view('dashboard.Carousel.index', compact('Carousels'));
    }


    public function create()
    {
        return view('dashboard.Carousel.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name' => 'required',
            
        ]);

        $imagePath = $request->file('image')->store('image/Carousel');
        $imageName = basename($imagePath);

        $validatedData = $request->except('image');
        $validatedData['image'] = $imageName;

        Carousel::create($validatedData);

        return redirect()->route('dashboard.Carousel.index')->with('success', 'Carousel item created successfully');
    }

    public function show($id)
    {
        $Carousel = Carousel::findOrFail($id);
        return view('Carousel.show', compact('Carousel'));
    }

    public function edit($id)
    {
        $Carousel = Carousel::findOrFail($id);
        return view('dashboard.Carousel.edit', compact('Carousel'));
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
            $imagePath = $request->file('image')->store('image/Carousel');
            $validatedData['image'] = $imagePath;
        }

        Carousel::findOrFail($id)->update($validatedData);

        return redirect()->route('dashboard.Carousel.index')->with('success', 'Carousel item updated successfully');
    }

    public function destroy($id)
    {
        Carousel::findOrFail($id)->delete();

        return redirect()->route('dashboard.Carousel.index')->with('success', 'Carousel item deleted successfully');
    }
}
