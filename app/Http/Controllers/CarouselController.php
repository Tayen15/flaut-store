<?php

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
    
    public function indexAdmin()
    {
        $carousel = Carousel::paginate(4);
        return view('dashboard.carousel.index', compact('carousel'));
    }

    public function create()
    {
        return view('carousel.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10240',
            'name' => 'required',
        ]);
    
        $imagePath = $request->file('image')->store('image/carousel');
        $imageName = basename($imagePath);
    
        $validatedData['image'] = $imageName;
    
        Carousel::create($validatedData);
    
        return redirect()->route('home');
    }

    public function show($id)
    {
        $carousel = Carousel::findOrFail($id);
        return view('news.show', compact('carousel'));
    }

    public function edit($id)
    {
        $carousel = Carousel::findOrFail($id);
        return view('dashboard.news.edit', compact('carousel'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'content' => 'nullable',
            'author' => 'required',
        ]);

        Carousel::findOrFail($id)->update($validatedData);
        return redirect()
            ->route('dashboard.news.index')
            ->with('success', 'Successfully updated carousel');
    }

    public function destroy(Carousel $carousel)
    {
        $carousel->delete();
        return redirect()
            ->route('dashboard.news.index')
            ->with('success', 'Successfully deleted carousel');
    }
}

