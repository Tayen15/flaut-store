<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CarouselController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\NewsController;

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
// routes/web.php

Route::resource('dashboard', DashboardController::class);

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

Route::get('/dashboard/news', [DashboardController::class, 'news'])->name('dashboard.news');
Route::get('/dashboard/news/create', [DashboardController::class, 'createNews'])->name('dashboard.news.create');
Route::post('/dashboard/news', [DashboardController::class, 'storeNews'])->name('dashboard.news.store');
Route::get('/dashboard/news/{id}/edit', [DashboardController::class, 'editNews'])->name('dashboard.news.edit');
Route::put('/dashboard/news/{id}', [DashboardController::class, 'updateNews'])->name('dashboard.news.update');
Route::delete('/dashboard/news/{id}', [DashboardController::class, 'destroyNews'])->name('dashboard.news.destroy');

Route::get('/dashboard/carousel', [DashboardController::class, 'carouselIndex'])->name('dashboard.carousel');
Route::get('/dashboard/carousel/create', [DashboardController::class, 'carouselCreate'])->name('dashboard.carousel.create');
Route::post('/dashboard/carousel/store', [DashboardController::class, 'carouselStore'])->name('dashboard.carousel.store');
Route::get('/dashboard/carousel/edit/{id}', [DashboardController::class, 'carouselEdit'])->name('dashboard.carousel.edit');
Route::put('/dashboard/carousel/update/{id}', [DashboardController::class, 'carouselUpdate'])->name('dashboard.carousel.update');
Route::delete('/dashboard/carousel/destroy/{id}', [DashboardController::class, 'carouselDestroy'])->name('dashboard.carousel.destroy');

Route::get('/dashboard/catalog', [DashboardController::class, 'catalogIndex'])->name('dashboard.catalog');
Route::get('/dashboard/catalog/create', [DashboardController::class, 'catalogCreate'])->name('dashboard.catalog.create');
Route::post('/dashboard/catalog/store', [DashboardController::class, 'catalogStore'])->name('dashboard.catalog.store');
Route::get('/dashboard/catalog/edit/{id}', [DashboardController::class, 'catalogEdit'])->name('dashboard.catalog.edit');
Route::put('/dashboard/catalog/update/{id}', [DashboardController::class, 'catalogUpdate'])->name('dashboard.catalog.update');
Route::delete('/dashboard/catalog/destroy/{id}', [DashboardController::class, 'catalogDestroy'])->name('dashboard.catalog.destroy');


Route::resource('catalog', CatalogController::class);
Route::get('/catalog', [CatalogController::class, 'index'])->name('catalog.index');

Route::get('/catalog/create', [CatalogController::class, 'create'])->name('catalog.create');
Route::post('/catalog', [CatalogController::class, 'store'])->name('catalog.store');

Route::resource('news', NewsController::class);
Route::get('/news', [NewsController::class, 'index'])->name('news.index');

Route::get('/news/create', [NewsController::class, 'create'])->name('news.create');
Route::post('/news/store', [NewsController::class, 'store'])->name('news.store');

Route::get('/', [CarouselController::class, 'index'])->name('home');
Route::get('/carousel/create', [CarouselController::class, 'create'])->name('carousel.create');
Route::post('/carousel/store', [CarouselController::class, 'store'])->name('carousel.store');


Route::get('/test-database', function () {
    try {
        DB::connection()->getPdo();
        return 'Connected to the database!';
    } catch (\Exception $e) {
        return 'Unable to connect to the database. Error: ' . $e->getMessage();
}});