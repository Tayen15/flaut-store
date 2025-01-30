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

    public function show($slug)
    {
        $news = News::where('slug', $slug)->firstOrFail();

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

        $relatedArticles = News::where('id', '!=', $news->id)
            ->where(function ($query) use ($news) {
                foreach ($news as $category) {
                    $query->orWhere('category_id', 'like', '%' . trim($category) . '%');
                }
            })
            ->orderBy('published_at', 'desc')
            ->limit(3)
            ->get();

        $recentPosts = News::orderBy('published_at', 'desc')
            ->limit(5)
            ->get();

        // Ambil popular post berdasarkan view_count
        $popularPosts = News::orderBy('view_count', 'desc')
            ->limit(5)
            ->get();


        return view('news.show', compact('news', 'relatedArticles', 'categories', 'recentPosts', 'popularPosts'));
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $results = News::where('title', 'like', "%$query%")
            ->orWhere('content', 'like', "%$query%")
            ->get();

        return view('news.search', compact('results', 'query'));
    }
}
