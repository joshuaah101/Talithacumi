<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\CataloguesController;
// use App\Http\Controllers\CategoriesController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('test', function () {
//     return view('welcome');
// });

Route::get('/', [PagesController::class, 'index']);

// Route::get('/', [CataloguesController::class, 'getBlockCatalog']);
Route::get('/catalog/{category_id}', [PagesController::class, 'catalog']);
Route::get('/about', [PagesController::class, 'aboutPage']);

// Route::get('/catalog/{categories}', [CategoriesController::class, 'getCat']);

// Route::get('cat', [CategoriesController::class, 'getCategories']);
