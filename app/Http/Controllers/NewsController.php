<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::paginate(6);
        // Tampilkan view untuk publik
        $publicView = view('news.index', compact('news'));

        // Tampilkan view untuk dashboard
        $adminView = view('dashboard.news.index', compact('news'));

        // Kembalikan kedua view sebagai response
        return $publicView->with('adminView', $adminView);
    }

    public function indexAdmin()
    {
        $news = News::paginate(6);
        return view('dashboard.news.index', compact('news'));
    }

    public function create()
    {
        return view('dashboard.news.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'content' => 'nullable',
            'author' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:6144',
        ]);
    
        // Ubah direktori penyimpanan gambar
        $imagePath = $request->file('image')->store('image/news');
        $imageName = basename($imagePath);
    
        $validatedData['image'] = $imageName;
    
        News::create($validatedData);
    
        return redirect()->route('news.index');
    }

    public function show($id)
    {
        $news = News::findOrFail($id);
        return view(['news.index', 'dashboard.news.index'], compact('news'));
    }
    
    public function showAdmin($id)
    {
        $news = News::findOrFail($id);
        return view('dashboard.news.edit', compact('news'));
    }

    public function edit(News $news)
    {
        return view('dashboard.news.edit');
    }

    public function update(Request $request, News $news)
    {
        $news->update($request->all());
        $validatedData = $request->validate([
            'title' => 'required',
            'content' => 'nullable',
            'author' => 'required',
        ]);

        return redirect()->route('news.index');
    }

    public function destroy(News $news)
    {
        $news->delete();
        return redirect()->route('news.index');
    }

    
}
