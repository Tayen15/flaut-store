<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Catalog;
use App\Models\News;
use App\Models\User;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $searchKeyword = $request->input('search');
    
        // Pencarian pada tabel Catalog
        $catalogs = Catalog::query()
            ->where('name', 'like', '%' . $searchKeyword . '%')
            ->orWhere('category', 'like', '%' . $searchKeyword . '%')
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
}
