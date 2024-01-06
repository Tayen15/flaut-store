<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\CarouselImageController;

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

Route::group(['middleware' => 'web'], function () {
    Route::get('/auth', [AuthController::class, 'index'])->name('login');
    Route::post('/auth', [AuthController::class, 'postLogin'])->name('auth');


});
Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/about-us', function () {
    return view(('about-us'));
})->name('about-us');

Route::resource('catalog', CatalogController::class);
Route::get('/catalog', [CatalogController::class, 'index'])->name('catalog.index');

Route::get('/catalog/create', [CatalogController::class, 'create'])->name('catalog.create');
Route::post('/catalog', [CatalogController::class, 'store'])->name('catalog.store');

Route::resource('news', NewsController::class);
Route::get('/news', [NewsController::class, 'index'])->name('news.index');

Route::get('/news/create', [NewsController::class, 'create'])->name('news.create');
Route::post('/news', [NewsController::class, 'store'])->name('news.store');

Route::get('/carousel/create', [CarouselImageController::class, 'create'])->name('carousel.create');
Route::post('/carousel/store', [CarouselImageController::class, 'store'])->name('carousel.store');


Route::get('/test-database', function () {
    try {
        DB::connection()->getPdo();
        return 'Connected to the database!';
    } catch (\Exception $e) {
        return 'Unable to connect to the database. Error: ' . $e->getMessage();
}});