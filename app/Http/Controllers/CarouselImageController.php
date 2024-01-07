<?php

// CarouselImageController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CarouselImage;

class CarouselImageController extends Controller
{
    public function index()
    {
<<<<<<< HEAD
        $carouselImage = CarouselImage::all();
        return view('home', compact('carouselImage'));
    }

    public function create()
    {
=======
        $carouselImages = CarouselImage::all();
>>>>>>> 7356f9c5d3c6f705f8e7f2c787ad1dc9685fd180
        return view('carousel.create');
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'alt_text' => 'required',
        ]);

<<<<<<< HEAD
        $imagePath = $request->file('image')->store('image/carousel');
        $imageName = basename($imagePath);

        $validatedData['image'] = $imageName;

        CarouselImage::create($validatedData);

=======
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
>>>>>>> 7356f9c5d3c6f705f8e7f2c787ad1dc9685fd180
        return redirect()->route('home');
    }
}
