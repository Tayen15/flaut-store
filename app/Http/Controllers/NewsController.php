<?php

namespace App\Http\Controllers;

use App\Models\CategoriesCatalog;
use Illuminate\Http\Request;
use App\Models\News;
use App\Models\CategoriesNews;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class NewsController extends Controller
{
    public function index(Request $request)
    {
        $query = News::query()->with('category')->whereHas('status', function ($q) {
            $q->where('status_id', 2); 
        });
        
        $searchKeyword = $request->input('search');
        if ($searchKeyword && strlen($searchKeyword) >= 3) {
            $query->where(function ($subquery) use ($searchKeyword) {
                $subquery->where('title', 'like', '%' . $searchKeyword . '%')
                         ->orWhere('content', 'like', '%' . $searchKeyword . '%');
            });
        }
        
        $news = $query->get();
        $categories = CategoriesCatalog::with('items')->get();

        return view('news.index', compact('news', 'categories'));
    }

    public function show($id)
    {
        $news = News::findOrFail($id);
        $relatedArticles = News::inRandomOrder()->take(3)->get();
        $categories = CategoriesCatalog::with('items')->get();

        $cacheKey = 'news_' . $news->id . '_views';
        $views = Cache::get($cacheKey, 0);
    
        $views += 1;
        Cache::put($cacheKey, $views, now()->addMinutes(10));

        if ($views % 10 === 0) {
            $news->view_count = $views;
            $news->save();
        }

        return view('news.show', compact('news', 'relatedArticles', 'categories'));
    }
}
