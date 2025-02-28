<?php

use App\Http\Controllers\CarouselController;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Models\Carousel;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::resource('catalog', CatalogController::class);
Route::resource('news', NewsController::class);
Route::resource('carousel', CarouselController::class);
Route::resource('category', CategoryController::class);

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/about', function () { return view('about-us'); })->name('about-us');

Route::get('/contact', function () { return view('contact'); })->name('contact');

Route::get('/news', [NewsController::class, 'index'])->name('news.index');
Route::get('/news/search', [NewsController::class, 'search'])->name('news.search');

Route::get('/test-database', function () {
    try {
        DB::connection()->getPdo();
        return 'Connected to the database!';
    } catch (\Exception $e) {
        return 'Unable to connect to the database. Error: ' . $e->getMessage();
    }
});
