<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CarouselController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
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

Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/auth', [AuthController::class, 'postLogin'])->name('auth');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::get('/real-time-changes', [DashboardController::class, 'getRealTimeChanges'])->name('dashboard.getRealTimeChanges');

    Route::prefix('dashboard')->group(function () {
        Route::prefix('news')->group(function () {
            Route::get('/', [NewsController::class, 'indexAdmin'])->name('dashboard.news.index');
            Route::get('/create', [NewsController::class, 'create'])->name('dashboard.news.create');
            Route::get('/edit/{id}', [NewsController::class, 'edit'])->name('dashboard.news.edit');
            Route::post('/store', [NewsController::class, 'store'])->name('dashboard.news.store');
            Route::post('/destroy{id}', [NewsController::class, 'destroy'])->name('dashboard.news.destroy');
        });

        // Administrator Routes
        Route::prefix('admin')->group(function () {
            Route::get('/', [AdminController::class, 'index'])->name('dashboard.admin.index');
            Route::get('/create', [AdminController::class, 'create'])->name('dashboard.admin.create');
            Route::get('/edit/{id}', [AdminController::class, 'edit'])->name('dashboard.admin.edit');
            Route::post('/store', [AdminController::class, 'store'])->name('dashboard.admin.store');
            Route::delete('/destroy/{id}', [AdminController::class, 'destroy'])->name('dashboard.admin.destroy'); 
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
            Route::post('/change-password', [ProfileController::class, 'changePassword'])->name('dashboard.profile.change-password');
        });
    });

    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/', [CarouselController::class, 'index'])->name('home');

Route::resource('catalog', CatalogController::class);
Route::resource('news', NewsController::class);
Route::resource('carousel', CarouselController::class);

Route::get('/about-us', function () {
    return view('about-us');
})->name('about-us');

Route::get('/test-database', function () {
    try {
        DB::connection()->getPdo();
        return 'Connected to the database!';
    } catch (\Exception $e) {
        return 'Unable to connect to the database. Error: ' . $e->getMessage();
    }
});
