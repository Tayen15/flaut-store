<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CarouselImage;

class CarouselImageController extends Controller
{
    public function create()
    {
        return view('carousel.create');
    }
    public function index()
    {
        $carouselImages = CarouselImage::all();
        return view('home', compact('carouselImages'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'alt_text' => 'required',
        ]);

        $imageName = time().'.'.$request->image->extension();  
        $request->image->move(public_path('images/carousel'), $imageName);
        
        CarouselImage::create([
            'url' => '/images/carousel/'.$imageName,
            'alt_text' => $request->alt_text,
        ]);

        return redirect()->route('home')->with('success', 'Image added successfully');
    }
}