<?php

namespace App\Http\Controllers;

use App\Models\Carousel;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        return view('dashboard.carousel.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg|max:10240',
            'name' => 'required',
        ]);
    
        try {
            $imagePath = $request->file('image');
            $imageName = date('Y-m-d&&') . $imagePath->getClientOriginalName();
            $path = 'image/carousel/' . $imageName;

            Storage::disk('public')->put($path, file_get_contents($imagePath));

            $validatedData['image'] = $imageName;
            Carousel::create($validatedData);
            
            return redirect()
                ->route('dashboard.carousel.index')
                ->with('success', 'Banner Carousel created successfully');            
        } catch (\Throwable $th) {
            return redirect()
                ->route('dashboard.carousel.index')
                ->with('success', 'failed to created Carousel, try again!');
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
            if (!Storage::exists("image/carousel/{$carousel->image}")) {
                $deleted = Storage::delete("image/carousel/{$carousel->image}");
        
                if ($deleted) {
                    $imagePath = $request->file('image');
                    $imageName = date('Y-m-d') . '&&' . $imagePath->getClientOriginalName();
                    $path = 'image/carousel/' . $imageName;
    
                    $check = Storage::disk('public')->put($path, file_get_contents($imagePath));
        
                    if ($check) {
                        $validatedData['image'] = $imageName;
                        $carousel->update($validatedData);
        
                        return redirect()
                            ->route('dashboard.carousel.index')
                            ->with('success', 'Successfully updated carousel with image');
                    }
        
                    return redirect()
                        ->route('dashboard.carousel.index')
                        ->with('success', 'Failed to update carousel image');
                }
        
                return redirect()
                    ->route('dashboard.carousel.index')
                    ->with('success', 'Failed to delete old carousel image');
            }
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
            $deleted = Storage::delete("image/carousel/{$carousel->image}");
    
            if ($deleted) {
                $carousel->delete();
    
                return redirect()
                    ->route('dashboard.carousel.index')
                    ->with('success', 'Successfully deleted Carousel');
            } else {
                return redirect()
                    ->route('dashboard.carousel.index')
                    ->with('success', 'Failed to delete Carousel image');
            }
        }
    
        return redirect()
            ->route('dashboard.carousel.index')
            ->with('success', 'Image not found for Carousel');
    }   
}
