<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\Models\Catalog;
use App\Models\News;
use App\Models\User;
use App\Models\Carousel;
use App\Models\CategoriesCatalog;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $searchKeyword = $request->input('search');

    
        // Pencarian pada tabel Catalog
        $catalogs = Catalog::query()
        ->where('name', 'like', '%' . $searchKeyword . '%')
        ->orWhereHas('category', function ($query) use ($searchKeyword) {
            $query->where('name', 'like', '%' . $searchKeyword . '%');
        })
        ->get();
    
    
        // Pencarian pada tabel News
        $news = News::query()
            ->where('title', 'like', '%' . $searchKeyword . '%')
            ->orWhere('content', 'like', '%' . $searchKeyword . '%')
            ->get();
    
        // Pencarian pada tabel User
        $users = User::query()
            ->where('name', 'like', '%' . $searchKeyword . '%')
            ->orWhere('email', 'like', '%' . $searchKeyword . '%')
            ->get();
    
        return view('dashboard.index', compact('searchKeyword', 'catalogs', 'news', 'users'));
    }    

    public function getRealTimeChanges()
    {
        $catalogChange = $this->calculateChange(\App\Models\Catalog::class, 'created_at');
        $newsChange = $this->calculateChange(\App\Models\News::class, 'created_at');
        $bannerChange = $this->calculateChange(\App\Models\Carousel::class, 'created_at');
        $userChange = $this->calculateChange(\App\Models\User::class, 'created_at');
    
        return Response::json(compact('catalogChange', 'newsChange', 'bannerChange', 'userChange'));
    }
    
    private function calculateChange($model, $column)
    {
        $now = Carbon::now();
        $lastRecord = $model::latest($column)->first();
    
        if (!$lastRecord) {
            return 0;
        }
    
        $lastRecordCreatedAt = Carbon::parse($lastRecord->$column);
    
        return $now->diffIn($lastRecordCreatedAt);
    }
    
}
