<?php

// CarouselImageController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CarouselImage;

class CarouselImageController extends Controller
{
    public function create()
    {
        $carouselImages = CarouselImage::all();
        return view('carousel.create');
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'alt_text' => 'required',
        ]);

        $imagePath = $request->file('image')->store('images/carousel');
        $imageName = basename($imagePath);

        $validatedData['image'] = $imageName;
        CarouselImage::create($validatedData);
        return redirect()->route('home');
    }
    public function show(CarouselImage $carouselImage)
    {
        return view('home', compact('carouselImage'));
    }
    public function edit(CarouselImage $carouselImage)
    {
        return view('carousel.edit', compact('carouselImage'));
    }
    public function update(Request $request, CarouselImage $carouselImage)
    {
        $carouselImage->update($request->all());
        return redirect()->route('home');
    }
    public function destroy( CarouselImage $carouselImage)
    {
        $carouselImage->delete();
        return redirect()->route('home');
    }
}
