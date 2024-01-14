<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::paginate(10);
        return view('news.index', compact('news'));
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
            'image' => 'required|image|mimes:jpeg,png,jpg|max:10240',
        ]);
    
        try {
            $imagePath = $request->file('image');
            $imageName = date('Y-m-d&&') . $imagePath->getClientOriginalName();
            $path = 'image/news/' . $imageName;
            Storage::disk('public')->put($path, file_get_contents($imagePath));
            $validatedData['image'] = $imageName;
            News::create($validatedData);
        
            return redirect()
                ->route('dashboard.news.index')
                ->with('success', 'Succesfully created news');
                
        } catch (\Throwable $th) {
            return redirect()
            ->route('dashboard.news.index')
            ->with('success', 'failed to created news, try again!');
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
            'content' => 'nullable',
            'author' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg|max:10240',
        ]);

        $news = News::findOrFail($id);

        if ($request->hasFile('image')) {
            if (!Storage::exists("image/news/{$news->image}")) {
                $deleted = Storage::delete("image/news/{$news->image}");
        
                if ($deleted) {
                    $imagePath = $request->file('image');
                    $imageName = date('Y-m-d') . '&&' . $imagePath->getClientOriginalName();
                    $path = 'image/news/' . $imageName;
    
                    $check = Storage::disk('public')->put($path, file_get_contents($imagePath));
        
                    if ($check) {
                        $validatedData['image'] = $imageName;
                        $news->update($validatedData);
        
                        return redirect()
                            ->route('dashboard.news.index')
                            ->with('success', 'Successfully updated News with image');
                    }
        
                    return redirect()
                        ->route('dashboard.news.index')
                        ->with('success', 'Failed to update News image');
                }
        
                return redirect()
                    ->route('dashboard.news.index')
                    ->with('success', 'Failed to delete old News image');
            }
        }
        $news->update($validatedData);
        return redirect()
            ->route('dashboard.news.index')
            ->with('success', 'Successfully updated News without changing image');
    }

    public function destroy(News $news, $id)
    {
        if (Storage::exists("image/news/{$news->image}")) {
            $deleted = Storage::delete("image/news/{$news->image}");
    
            if ($deleted) {
                News::findOrFail($id)->delete();
    
                return redirect()
                    ->route('dashboard.news.index')
                    ->with('success', 'Successfully deleted News');
            } else {
                return redirect()
                    ->route('dashboard.news.index')
                    ->with('success', 'Failed to delete News image');
            }
        }
    
        return redirect()
            ->route('dashboard.news.index')
            ->with('success', 'Image not found for News');
    }
}
