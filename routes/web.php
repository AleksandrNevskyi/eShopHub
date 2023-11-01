<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemsController;

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

Route::get("/items", [ItemsController::class, 'index']);

Route::post('/items/delete/{id}', [ItemsController::class, 'delete']);

Route::get('/items/edit/{id}', [ItemsController::class, 'edit']);

Route::post('/item/update/{id}', [ItemsController::class, 'update']);

Route::get('/item/create', [ItemsController::class, 'create']);

Route::post('/item/new', [ItemsController::class, 'new']);