<?php

namespace App\Http\Controllers;

use App\Models\Carousel;
use Illuminate\Http\Request;

class CarouselController extends Controller
{
    public function index()
    {
        $Carousel = Carousel::paginate(10);
        return view('Carousel.index', compact('Carousel'));
    }

    public function indexAdmin()
    {
        $Carousel = Carousel::paginate(6);
        return view('dashboard.Carousel.index', compact('Carousel'));
    }

    public function create()
    {
        return view('dashboard.Carousel.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:6144',
            'name' => 'required',
        ]);
    
        // Ubah direktori penyimpanan gambar
        $imagePath = $request->file('image')->store('image/Carousel');
        $imageName = basename($imagePath);
    
        $validatedData['image'] = $imageName;
    
        Carousel::create($validatedData);
    
        return redirect()->route('dashboard.Carousel.index');
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
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',

            'name' => 'required',
        ]);

        Carousel::findOrFail($id)->update($validatedData);
        return redirect()
            ->route('dashboard.Carousel.index')
            ->with('success', 'Successfully updated Carousel');
    }

    public function destroy(Carousel $Carousel)
    {
        $Carousel->delete();
        return redirect()
            ->route('dashboard.Carousel.index')
            ->with('success', 'Successfully deleted Carousel');
    }
}
