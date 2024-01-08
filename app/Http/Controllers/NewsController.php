<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::all();
        return view('news.index', compact('news'));
    }

    public function create()
    {
        return view('news.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'content' => 'nullable',
            'author' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        // Ubah direktori penyimpanan gambar
        $imagePath = $request->file('image')->store('image/news');
        $imageName = basename($imagePath);
    
        $validatedData['image'] = $imageName;
    
        News::create($validatedData);
    
        return redirect()->route('news.index');
    }

    public function show(News $news)
    {
        return view('news.show', compact('news'));
    }

    public function edit(News $news)
    {
        return view('news.edit', compact('news'));
    }

    public function update(Request $request, News $news)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'content' => 'nullable',
            'author' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        // If a new image is uploaded, update the image
        if ($request->hasFile('image')) {
            // Ubah direktori penyimpanan gambar
            $imagePath = $request->file('image')->store('image/news');
            $imageName = basename($imagePath);
            $validatedData['image'] = $imageName;
    
            // Delete the old image file
            if ($news->image) {
                Storage::delete('image/news/' . $news->image);
            }
        }
    
        $news->update($validatedData);
    
        return redirect()->route('news.index');
    }

    public function destroy(News $news)
    {
        $news->delete();
        return redirect()->route('news.index');
    }
}
