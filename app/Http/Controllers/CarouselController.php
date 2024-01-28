<?php

namespace App\Http\Controllers;

use App\Models\Carousel;
use App\Models\Catalog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class CarouselController extends Controller
{
    public function index()
    {
        $carouselImages = Carousel::inRandomOrder()->take(3)->get();;
        $catalogs = Catalog::inRandomOrder()->take(4)->get();
        return view('home', compact('carouselImages', 'catalogs'));
    }
    
    public function indexAdmin()    
    {
        $carousel = Carousel::all();
        return view('dashboard.carousel.index', compact('carousel'));
    }

    public function create()
    {
        return view('dashboard.carousel.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg|max:10240',
            'name' => 'required',
        ]);
    
        try {
            $currentTime = Carbon::now();
            $formattedTime = $currentTime->format('Y-m-d_His');
        
            $imagePath = $request->file('image')->storeAs('image/carousel', $formattedTime . '_' . $request->file('image')->getClientOriginalName());
            $validatedData['image'] = basename($imagePath);

            Carousel::create($validatedData);
            
            return redirect()
                ->route('dashboard.carousel.index')
                ->with('success', 'Banner Carousel created successfully');            
        } catch (\Throwable $th) {
            return redirect()
                ->route('dashboard.carousel.index')
                ->with('error', 'failed to created Carousel, try again!');
        }
    }

    public function show($id)
    {
        $carousel = Carousel::findOrFail($id);
        return view('carousel.show', compact('carousel'));
    }

    public function edit($id)
    {
        $carousel = Carousel::findOrFail($id);
        return view('dashboard.carousel.edit', compact('carousel'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg|max:10240',
        ]);
    
        $carousel = Carousel::findOrFail($id);

        if ($request->hasFile('image')) {
            if (Storage::exists("image/carousel/{$carousel->image}")) {
                Storage::delete("image/carousel/{$carousel->image}");
            }
        
            $currentTime = Carbon::now();
            $formattedTime = $currentTime->format('Y-m-d_His');
        
            $imagePath = $request->file('image')->storeAs('image/carousel', $formattedTime . '_' . $request->file('image')->getClientOriginalName());
            $validatedData['image'] = basename($imagePath);
        
            $carousel->update($validatedData);
        
            return redirect()
                ->route('dashboard.carousel.index')
                ->with('success', 'Successfully updated carousel with changing image');
        }

        $carousel->update($validatedData);
        return redirect()
            ->route('dashboard.carousel.index')
            ->with('success', 'Successfully updated carousel without changing image');
    }
    
    

    public function destroy($id)
    {
        $carousel = Carousel::findOrFail($id);
    
        if (Storage::exists("image/carousel/{$carousel->image}")) {
            Storage::delete("image/carousel/{$carousel->image}");
        }
    
        $carousel->delete();

        return redirect()
            ->route('dashboard.carousel.index')
            ->with('success', 'Successfully deleted Carousel');
    
    }
}
