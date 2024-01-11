<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Carousel;

class DashboardController extends Controller
{
    public function index()
    {
        $news = News::all();
        return view('dashboard.index', compact('news'));
    }

    public function createNews()
    {
        return view('dashboard.news.create');
    }

    public function storeNews(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'author' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imagePath = $request->file('image')->store('image/news');
        $imageName = basename($imagePath);

        $validatedData = $request->except('image');
        $validatedData['image'] = $imageName;

        News::create($validatedData);

        return redirect()->route('dashboard.news')->with('success', 'News created successfully');
    }

    public function editNews($id)
    {
        $news = News::findOrFail($id);
        return view('dashboard.news.edit', compact('news'));
    }

    public function updateNews(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'content' => 'required',
            'author' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('image/news');
            $validatedData['image'] = $imagePath;
        }

        News::findOrFail($id)->update($validatedData);

        return redirect()->route('dashboard.news')->with('success', 'News updated successfully');
    }

    public function destroyNews($id)
    {
        News::findOrFail($id)->delete();

        return redirect()->route('dashboard.news')->with('success', 'News deleted successfully');
    }

    public function carouselIndex()
    {
        $carousels = Carousel::all();
        return view('dashboard.carousel.index', compact('carousels'));
    }

    public function carouselCreate()
    {
        return view('dashboard.carousel.create');
    }

    public function carouselStore(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imagePath = $request->file('image')->store('image/carousel');
        $imageName = basename($imagePath);

        Carousel::create([
            'name' => $request->name,
            'image' => $imageName,
        ]);

        return redirect()->route('dashboard.carousel.index')->with('success', 'Carousel item created successfully');
    }
}


