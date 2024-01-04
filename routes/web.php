<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CatalogController;
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

Route::get('/', function () {
    return view('home');
})->name('home');

Route::resource('catalog', CatalogController::class);
Route::get('/catalog', [CatalogController::class, 'index'])->name('catalog.index');

Route::resource('news', NewsController::class);
Route::get('/news', [NewsController::class, 'index'])->name('news.index');

use Illuminate\Support\Facades\DB;

Route::get('/test-database', function () {
    try {
        DB::connection()->getPdo();
        return 'Connected to the database!';
    } catch (\Exception $e) {
        return 'Unable to connect to the database. Error: ' . $e->getMessage();
    }
});

Route::resource('auth', AuthController::class);
Route::get('/auth', [AuthController::class, 'index'])->name('auth.index');
