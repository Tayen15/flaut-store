<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CarouselImage;

class CarouselImageController extends Controller
{
    public function index()
    {
        $carouselImage = CarouselImage::all();
        return view('home', compact('carouselImage'));
    }

    public function create()
    {
        return view('carousel.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'alt_text' => 'required',
        ]);

        $imagePath = $request->file('image')->store('image/carousel');
        $imageName = basename($imagePath);

        $validatedData['image'] = $imageName;

        CarouselImage::create($validatedData);

        return redirect()->route('home');
    }
}