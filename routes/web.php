<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CarouselController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ProfileController;

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

Route::middleware('guest')->group(function () {
    Route::get('/auth', [AuthController::class, 'index'])->name('login');
    Route::post('/auth', [AuthController::class, 'postLogin'])->name('auth');

    Route::get('/', function () {
        return view('home');
    })->name('home');
    
    Route::get('/about-us', function () {
        return view(('about-us'));
    })->name('about-us');
    
    Route::resource('catalog', CatalogController::class);
    Route::get('/catalog', [CatalogController::class, 'index'])->name('catalog.index');
    Route::get('/catalog/create', [CatalogController::class, 'create'])->name('catalog.create');
    
    Route::resource('news', NewsController::class);
    Route::get('/news', [NewsController::class, 'index'])->name('news.index');
    Route::get('/news/{id}', [NewsController::class, 'show'])->name('news.show');
    
    Route::resource('carousel', CarouselController::class);
    Route::get('/', [CarouselController::class, 'index'])->name('home');
    Route::get('/carousel/create', [CarouselController::class, 'create'])->name('carousel.create');
    
    Route::resource('profile', ProfileController::class);
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

    Route::prefix('dashboard')->group(function () {
        // News Routes
        Route::prefix('news')->group(function () {
            Route::get('/', [NewsController::class, 'indexAdmin'])->name('dashboard.news.index');
            Route::get('/create', [NewsController::class, 'create'])->name('dashboard.news.create');
            Route::get('/edit/{id}', [NewsController::class, 'edit'])->name('dashboard.news.edit');
            Route::post('/store', [NewsController::class, 'store'])->name('dashboard.news.store');
            Route::post('/destroy{id}', [NewsController::class, 'destroy'])->name('dashboard.news.destroy');
        });

        // Catalog Routes
        Route::prefix('catalog')->group(function () {
            Route::get('/', [CatalogController::class, 'indexAdmin'])->name('dashboard.catalog.index');
            Route::get('/create', [CatalogController::class, 'create'])->name('dashboard.catalog.create');
            Route::get('/edit/{id}', [CatalogController::class, 'edit'])->name('dashboard.catalog.edit');
            Route::post('/store', [CatalogController::class, 'store'])->name('dashboard.catalog.store');
            Route::post('/destroy{id}', [CatalogController::class, 'destroy'])->name('dashboard.catalog.destroy');
        });

        Route::prefix('carousel')->group(function () {
            Route::get('/', [CarouselController::class, 'indexAdmin'])->name('dashboard.carousel.index');
            Route::get('/create', [CarouselController::class, 'create'])->name('dashboard.carousel.create');
            Route::get('/edit/{id}', [CarouselController::class, 'edit'])->name('dashboard.carousel.edit');
            Route::post('/store', [CarouselController::class, 'store'])->name('dashboard.carousel.store');
            Route::post('/destroy{id}', [CarouselController::class, 'destroy'])->name('dashboard.carousel.destroy');
        });

        Route::prefix('profile')->group(function () {
            Route::get('/', [ProfileController::class, 'index'])->name('dashboard.profile.index');
            Route::put('/update', [ProfileController::class, 'update'])->name('dashboard.profile.update');
        });
    });

    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});




Route::get('/test-database', function () {
    try {
        DB::connection()->getPdo();
        return 'Connected to the database!';
    } catch (\Exception $e) {
        return 'Unable to connect to the database. Error: ' . $e->getMessage();
}});