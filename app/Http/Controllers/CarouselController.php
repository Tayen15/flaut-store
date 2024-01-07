<?php

// app/Http/Controllers/CarouselController.php

namespace App\Http\Controllers;

use App\Models\Carousel;
use Illuminate\Http\Request;

class CarouselController extends Controller
{
    public function index()
    {
        $carouselImages = Carousel::all();
        return view('home', compact('carouselImages'));
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

        Carousel::create($validatedData);

        return redirect()->route('home');
    }
}

