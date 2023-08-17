<?php

use Illuminate\Support\Facades\Route;

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
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;

Route::resource('products', ProductController::class);

Route::get('/', [CategoryController::class, 'index'])->name('home');
Route::resource('categories', CategoryController::class);
// Route::get('/', function () {
//     return view('/categories/index');
// });
