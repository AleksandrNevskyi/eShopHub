<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemsController;
use App\Http\Controllers\CategoriesController;

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

Route::post('/category/{id}/delete', [CategoriesController::class, 'destroy']);

Route::get('/category/{id}/edit', [CategoriesController::class, 'edit']);

Route::post('/category/{id}/update', [CategoriesController::class, 'update']);

Route::get('/category/create', [CategoriesController::class, 'create']);

Route::post('/category/store', [CategoriesController::class, 'store']);