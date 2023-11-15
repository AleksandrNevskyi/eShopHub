<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemsController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\LocationsController;

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
    return view('welcome');
});

//items
Route::get("/items", [ItemsController::class, 'index']);

Route::post('/items/{id}/delete', [ItemsController::class, 'destroy']);

Route::get('/items/{id}/edit', [ItemsController::class, 'edit']);

Route::post('/items/{id}/update', [ItemsController::class, 'update']);

Route::get('/items/create', [ItemsController::class, 'create']);

Route::post('/items/store', [ItemsController::class, 'store']);

//categories

Route::get('/categories', [CategoriesController::class, 'index']);

Route::post('/categories/{id}/delete', [CategoriesController::class, 'destroy']);

Route::get('/categories/{id}/edit', [CategoriesController::class, 'edit']);

Route::post('/categories/{id}/update', [CategoriesController::class, 'update']);

Route::get('/categories/create', [CategoriesController::class, 'create']);

Route::post('/categories/store', [CategoriesController::class, 'store']);

//locations

Route::get('/locations', [LocationsController::class, 'index']);

Route::post('/locations/{id}/delete', [LocationsController::class, 'destroy']);

Route::get('/locations/{id}/edit', [LocationsController::class, 'edit']);

Route::post('/locations/{id}/update', [LocationsController::class, 'update']);

Route::get('/locations/create', [LocationsController::class, 'create']);

Route::post('/locations/store', [LocationsController::class, 'store']);