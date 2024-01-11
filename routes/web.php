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

// Add custom routes for specific actions
Route::get('/dashboard/news', 'NewsController@index')->name('dashboard.news');
Route::get('/dashboard/catalog', 'CatalogController@index')->name('dashboard.catalog');
Route::get('/dashboard/carousel', 'CarouselController@index')->name('dashboard.carousel');


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