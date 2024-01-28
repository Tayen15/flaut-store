<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class NewsController extends Controller
{
    public function index(Request $request)
    {
        $query = News::query();
    
        // Pencarian berdasarkan kata kunci jika ada
        $searchKeyword = $request->input('search');
        if ($searchKeyword && strlen($searchKeyword) >= 3) {
            $query->where(function ($subquery) use ($searchKeyword) {
                $subquery->where('title', 'like', '%' . $searchKeyword . '%')
                         ->orWhere('content', 'like', '%' . $searchKeyword . '%');
            });
        }
    
        $news = $query->get();
        return view('news.index', compact('news'));
    }
    
    public function indexAdmin()
    {
        $news = News::all();
        return view('dashboard.news.index', compact('news'));
    }

    public function create()
    {
        $categories = News::$categories;
        return view('dashboard.news.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'category' => 'required|in:' . implode(',', News::$categories),
            'content' => 'nullable',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:10240',
        ]);
    
        try {
            $currentTime = Carbon::now();
            $formattedTime = $currentTime->format('Y-m-d_His');
        
            $imagePath = $request->file('image')->storeAs('image/news', $formattedTime . '_' . $request->file('image')->getClientOriginalName());
            $validatedData['image'] = basename($imagePath);
            $validatedData['author'] = Auth::user()->name;

    
            News::create($validatedData);
    
            return redirect()
                ->route('dashboard.news.index')
                ->with('success', 'Successfully created news');
        } catch (\Throwable $th) {
            return redirect()
                ->route('dashboard.news.index')
                ->with('error', 'Failed to create news, try again!');
        }

    }

    public function show($id)
    {
        $news = News::findOrFail($id);
        $relatedArticles = News::inRandomOrder()->take(3)->get();

        return view('news.show', compact('news', 'relatedArticles'));
    }

    public function edit($id)
    {
        $news = News::findOrFail($id);
        return view('dashboard.news.edit', compact('news'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'category' => 'required|in:' . implode(',', News::$categories),
            'content' => 'nullable',
            'image' => 'image|mimes:jpeg,png,jpg|max:10240',
        ]);

        $news = News::findOrFail($id);

        if ($request->hasFile('image')) {
            if (Storage::exists("image/news/{$news->image}")) {
                Storage::delete("image/news/{$news->image}");
            }
        
            $currentTime = Carbon::now();
            $formattedTime = $currentTime->format('Y-m-d_His');
        
            $imagePath = $request->file('image')->storeAs('image/news', $formattedTime . '_' . $request->file('image')->getClientOriginalName());
            $validatedData['image'] = basename($imagePath);
        
            $news->update($validatedData);
        
            return redirect()
                ->route('dashboard.news.index')
                ->with('success', 'Successfully updated news with changing image');
        }
        $news->update($validatedData);
        return redirect()
            ->route('dashboard.news.index')
            ->with('success', 'Successfully updated news without changing image');
    }

    public function destroy($id)
    {
        $news = News::findOrFail($id);

        if (Storage::exists("image/news/{$news->image}")) {
            Storage::delete("image/news/{$news->image}");
        }
    
        $news->delete();

        return redirect()
            ->route('dashboard.news.index')
            ->with('success', 'Successfully deleted News');
    }
}
